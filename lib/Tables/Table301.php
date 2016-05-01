<?php

namespace NextBuzz\SEO\Tables;

/**
 * A table that displays 404 data
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
class Table301 extends WPListTable
{

    public function __construct()
    {
        global $status, $page;
        parent::__construct(array(
            'singular' => __('Redirect (301)', 'buzz-seo'), //singular name of the listed records
            'plural'   => __('Redirect (301)', 'buzz-seo'), //plural name of the listed records
            'ajax'     => false        //does this table support ajax?
        ));
    }

    public function display()
    {
        echo '<style type="text/css">';
        echo '.wp-list-table .column-id { width: 5%; }';
        echo '.wp-list-table .column-URI { width: 35%; }';
        echo '.wp-list-table .column-redirect { width: 35%; }';
        echo '.wp-list-table .column-timestamp { width: 15%; }';
        echo '</style>';

        parent::display();
    }

    public function no_items()
    {
        _e('No 301 redirects registered. A website where they are not needed? Wow, awesome!', 'buzz-seo');
    }

    public function column_default($item, $column_name)
    {
        switch ($column_name) {
            case 'URI':
                return "<input type='text' name='redirectFrom[" . $item['ID'] . "]' placeholder='" . esc_attr(__("URI that needs redirection. Field cannot be empty",
                            "buzz-seo")) . "' value='" . esc_attr($item[$column_name]) . "' />";
            case 'redirect':
                return "<input type='text' name='redirectTo[" . $item['ID'] . "]' placeholder='" . esc_attr(home_url()) . "' value='" . esc_attr($item[$column_name]) . "' />";
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
            'timestamp' => array('timestamp', true),
            'redirect'  => array('redirect', false),
        );
        return $sortable_columns;
    }

    public function get_columns()
    {
        $columns = array(
            'cb'        => '<input type="checkbox" />',
            'URI'       => __('Request URI', 'buzz-seo'),
            'redirect'  => __('Redirect URI', 'buzz-seo'),
            'timestamp' => __('Added', 'buzz-seo'),
        );
        return $columns;
    }

    public function usort_reorder($a, $b)
    {
        // If no sort, default to title
        $orderby = (!empty($_GET['orderby']) ) ? $_GET['orderby'] : 'timestamp';
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
            'delete301' => sprintf('<a href="?page=%s&action=%s&ID=%s">' . __("Delete", "buzz-seo") . '</a>',
                $_REQUEST['page'], 'delete301', $item['ID']),
        );
        return sprintf('%1$s %2$s', $this->column_default($item, 'URI'), $this->row_actions($actions));
    }

    public function get_bulk_actions()
    {
        $actions = array(
            'delete301' => __('Delete', 'buzz-seo'),
        );
        return $actions;
    }

    public function column_cb($item)
    {
        return sprintf(
            '<input type="checkbox" name="redirect301[]" value="%s" />', $item['ID']
        );
    }

    public function prepare_items()
    {
        $redirects301 = get_option('_settingsSettingsStatusCodes301', array());
        $data         = array();
        foreach ($redirects301 as $uri => $info) {
            $data[] = array(
                'ID'        => md5($uri),
                'URI'       => $uri,
                'redirect'  => $info['redirect'],
                'timestamp' => $info['timestamp'],
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
        $shouldRedirect  = $this->process_bulk_save();
        $shouldRedirect2 = $this->process_bulk_action();
        if ($shouldRedirect || $shouldRedirect2) {
            wp_redirect(remove_query_arg(array('action', 'ID')) . '&saved=1');
            exit;
        }
    }

    private function process_single_action()
    {
        if (!isset($_GET) || !isset($_GET['action']) || !isset($_GET['ID']) || isset($_GET['saved'])) {
            return;
        }

        $redirects301 = get_option('_settingsSettingsStatusCodes301', array());

        if ('delete301' === $_GET['action']) {
            foreach ($redirects301 as $uri => $info) {
                if (md5($uri) === $_GET['ID']) {
                    unset($redirects301[$uri]);
                }
            }

            // Save new data
            update_option('_settingsSettingsStatusCodes301', $redirects301, false);

            wp_redirect(remove_query_arg(array('action', 'ID')) . '&saved=1');
            exit;
        }
    }

    /**
     * Handle the checkbox changes
     * @return type
     */
    private function process_bulk_action()
    {
        if (!isset($_POST) || !isset($_POST['redirect301'])) {
            return false;
        }

        $redirects301 = get_option('_settingsSettingsStatusCodes301', array());

        // Both convert and delete should remove the item from the 301 list
        if ('delete301' === $this->current_action()) {
            foreach ($redirects301 as $uri => $info) {
                if (in_array(md5($uri), $_POST['redirect301'])) {
                    unset($redirects301[$uri]);
                }
            }

            // Save new data
            update_option('_settingsSettingsStatusCodes301', $redirects301, false);
        }

        return true;
    }

    /**
     * Handle saving of all boxes
     * @return type
     */
    private function process_bulk_save()
    {
        if (!isset($_POST) || !isset($_POST['redirectTo']) || !isset($_POST['redirectFrom'])) {
            return false;
        }

        if (!is_array($_POST['redirectTo']) || !is_array($_POST['redirectFrom'])) {
            return false;
        }

        $redirects301 = get_option('_settingsSettingsStatusCodes301', array());

        foreach ($redirects301 as $uri => $info) {
            $ID = md5($uri);
            if (array_key_exists($ID, $_POST['redirectTo'])) {
                if ($uri === $_POST['redirectFrom'][$ID]) {
                    $redirects301[$uri]['redirect'] = $_POST['redirectTo'][md5($uri)];
                } else {
                    // From has changed
                    $fromTrailing = trailingslashit($_POST['redirectFrom'][$ID]);
                    $redirects301[$fromTrailing] = $redirects301[$uri];
                    $redirects301[$fromTrailing]['redirect'] = $_POST['redirectTo'][md5($uri)];
                    unset($redirects301[$uri]);
                }
            }
        }

        // Save new data
        update_option('_settingsSettingsStatusCodes301', $redirects301, false);

        return true;
    }

}
