<?php

namespace NextBuzz\SEO\Tables;

/**
 * A table that displays 404 data
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
class Table404 extends WPListTable
{

    public function __construct()
    {
        global $status, $page;
        parent::__construct(array(
            'singular' => __('Not Found (404)', 'buzz-seo'), //singular name of the listed records
            'plural'   => __('Not Found (404)', 'buzz-seo'), //plural name of the listed records
            'ajax'     => false        //does this table support ajax?
        ));
    }

    public function display()
    {
        echo '<style type="text/css">';
        echo '.wp-list-table .column-id { width: 5%; }';
        echo '.wp-list-table .column-URI { width: 75%; }';
        echo '.wp-list-table .column-timestamp { width: 15%; }';
        echo '.wp-list-table .column-count { width: 5%; }';
        echo '</style>';

        parent::display();
    }

    public function no_items()
    {
        _e('No 404 errors registered. Good job!', 'buzz-seo');
    }

    public function column_default($item, $column_name)
    {
        switch ($column_name) {
            case 'URI':
            case 'count':
                return $item[$column_name];
            case 'timestamp':
                return date_i18n(get_option('date_format') . ' ' . get_option('time_format'),
                    intval($item[$column_name]));
            default:
                return print_r($item, true); //Show the whole array for troubleshooting purposes
        }
    }

    public function get_sortable_columns()
    {
        $sortable_columns = array(
            'URI'       => array('URI', false),
            'timestamp' => array('timestamp', false),
            'count'     => array('count', true),
        );
        return $sortable_columns;
    }

    public function get_columns()
    {
        $columns = array(
            'cb'        => '<input type="checkbox" />',
            'URI'       => __('Request URI', 'buzz-seo'),
            'timestamp' => __('Last request', 'buzz-seo'),
            'count'     => __('Count', 'buzz-seo'),
        );
        return $columns;
    }

    public function usort_reorder($a, $b)
    {
        // If no sort, default to title
        $orderby = (!empty($_GET['orderby']) ) ? $_GET['orderby'] : 'count';
        // If no order, default to asc
        $order   = (!empty($_GET['order']) ) ? $_GET['order'] : 'desc';
        // Determine sort order
        $result  = strcmp($a[$orderby], $b[$orderby]);
        // Send final sort direction to usort
        return ( $order === 'asc' ) ? $result : -$result;
    }

    public function column_URI($item)
    {
        $actions = array(
            'convert' => sprintf('<a href="?page=%s&action=%s&ID=%s">' . __("Convert to 301", "buzz-seo") . '</a>',
                $_REQUEST['page'], 'convert', $item['ID']),
            'delete'  => sprintf('<a href="?page=%s&action=%s&ID=%s">' . __("Delete", "buzz-seo") . '</a>',
                $_REQUEST['page'], 'delete', $item['ID']),
        );
        return sprintf('%1$s %2$s', $item['URI'], $this->row_actions($actions));
    }

    public function get_bulk_actions()
    {
        $actions = array(
            'convert' => __('Convert to 301', 'buzz-seo'),
            'delete'  => __('Delete', 'buzz-seo'),
        );
        return $actions;
    }

    public function column_cb($item)
    {
        return sprintf(
            '<input type="checkbox" name="error404[]" value="%s" />', $item['ID']
        );
    }

    public function prepare_items()
    {
        $errors404 = get_option('_settingsSettingsStatusCodes404', array());
        $data      = array();
        foreach ($errors404 as $uri => $info) {
            $data[] = array(
                'ID'        => md5($uri),
                'URI'       => $uri,
                'timestamp' => $info['timestamp'],
                'count'     => $info['count'],
            );
        }

        $columns               = $this->get_columns();
        $hidden                = array();
        $sortable              = $this->get_sortable_columns();
        $this->_column_headers = array($columns, $hidden, $sortable);
        usort($data, array(&$this, 'usort_reorder'));

        $per_page        = 25;
        $current_page    = $this->get_pagenum();
        $total_items     = count($data);
        // only ncessary because we have sample data
        $currentPageData = array_slice($data, ( ( $current_page - 1 ) * $per_page), $per_page);
        $this->set_pagination_args(array(
            'total_items' => $total_items, //WE have to calculate the total number of items
            'per_page'    => $per_page                     //WE have to determine how many items to show on a page
        ));
        $this->items     = $currentPageData;

        // Handle bulk action
        $this->process_single_action();
        $this->process_bulk_action();
    }

    private function process_single_action()
    {
        if (!isset($_GET) || !isset($_GET['action']) || !isset($_GET['ID']) || isset($_GET['saved'])) {
            return;
        }

        $errors404 = get_option('_settingsSettingsStatusCodes404', array());

        if ('delete' === $_GET['action'] || 'convert' === $_GET['action']) {
            $convertUri = false;
            foreach ($errors404 as $uri => $info) {
                if (md5($uri) === $_GET['ID']) {
                    $convertUri = trailingslashit($uri);
                    unset($errors404[$uri]);
                }
            }

            // Save new data
            update_option('_settingsSettingsStatusCodes404', $errors404, false);
        }

        // Convert should as well add the item to the 301 list
        if ('convert' === $_GET['action']) {
            $redirects301 = get_option('_settingsSettingsStatusCodes301', array());

            if (!isset($redirects301[$convertUri])) {
                $redirects301[$uri] = array(
                    'redirect'  => '',
                    'timestamp' => time(),
                );
            }

            // Save new data
            update_option('_settingsSettingsStatusCodes301', $redirects301, false);
        }

        if ('delete' === $_GET['action'] || 'convert' === $_GET['action']) {
            wp_redirect($_SERVER['REQUEST_URI'] . '&saved=1');
            exit;
        }
    }

    private function process_bulk_action()
    {
        if (!isset($_POST) || !isset($_POST['error404'])) {
            return;
        }

        $errors404 = get_option('_settingsSettingsStatusCodes404', array());

        // Both convert and delete should remove the item from the 404 list
        $addToConvert = array();
        if ('delete' === $this->current_action() || 'convert' === $this->current_action()) {
            foreach ($errors404 as $uri => $info) {
                if (in_array(md5($uri), $_POST['error404'])) {
                    $addToConvert[] = trailingslashit($uri);
                    unset($errors404[$uri]);
                }
            }

            // Save new data
            update_option('_settingsSettingsStatusCodes404', $errors404, false);
        }

        // Convert should as well add the item to the 301 list
        if ('convert' === $this->current_action()) {
            $redirects301 = get_option('_settingsSettingsStatusCodes301', array());

            foreach ($addToConvert as $uri) {
                if (!isset($redirects301[$uri])) {
                    $redirects301[$uri] = array(
                        'redirect'  => '',
                        'timestamp' => time(),
                    );
                }
            }

            // Save new data
            update_option('_settingsSettingsStatusCodes301', $redirects301, false);
        }

        wp_redirect($_SERVER['REQUEST_URI'] . '&saved=1');
    }

}
