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
            'plural' => __('Not Found (404)', 'buzz-seo'), //plural name of the listed records
            'ajax' => false        //does this table support ajax?
        ));
    }

    public function no_items()
    {
        _e('No 404 errors registered yet. Good job!', 'buzz-seo');
    }

    public function column_default($item, $column_name)
    {
        switch ($column_name) {
            case 'URI':
            case 'count':
                return $item[$column_name];
            default:
                return print_r($item, true); //Show the whole array for troubleshooting purposes
        }
    }

    public function get_sortable_columns()
    {
        $sortable_columns = array(
            'URI' => array('URI', false),
            'count' => array('count', true),
        );
        return $sortable_columns;
    }

    public function get_columns()
    {
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'URI' => __('Request URI', 'buzz-seo'),
            'count' => __('Count', 'buzz-seo'),
        );
        return $columns;
    }

    public function usort_reorder($a, $b)
    {
        // If no sort, default to title
        $orderby = (!empty($_GET['orderby']) ) ? $_GET['orderby'] : 'count';
        // If no order, default to asc
        $order = (!empty($_GET['order']) ) ? $_GET['order'] : 'desc';
        // Determine sort order
        $result = strcmp($a[$orderby], $b[$orderby]);
        // Send final sort direction to usort
        return ( $order === 'asc' ) ? $result : -$result;
    }

    public function column_booktitle($item)
    {
        $actions = array(
            'edit' => sprintf('<a href="?page=%s&action=%s&book=%s">Edit</a>', $_REQUEST['page'], 'edit', $item['ID']),
            'delete' => sprintf('<a href="?page=%s&action=%s&book=%s">Delete</a>', $_REQUEST['page'], 'delete', $item['ID']),
        );
        return sprintf('%1$s %2$s', $item['booktitle'], $this->row_actions($actions));
    }

    public function get_bulk_actions()
    {
        $actions = array(
            'convert' => __('Convert to 301', 'buzz-seo'),
            'delete' => __('Delete', 'buzz-seo'),
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
        $data = array();
        foreach ($errors404 as $uri => $info)
        {
            $data[] = array(
                'ID' => md5($uri),
                'URI' => $uri,
                'count' => $info['count'],
            );
        }

        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
        $this->_column_headers = array($columns, $hidden, $sortable);
        usort($data, array(&$this, 'usort_reorder'));

        $per_page = 25;
        $current_page = $this->get_pagenum();
        $total_items = count($data);
        // only ncessary because we have sample data
        $currentPageData = array_slice($data, ( ( $current_page - 1 ) * $per_page), $per_page);
        $this->set_pagination_args(array(
            'total_items' => $total_items, //WE have to calculate the total number of items
            'per_page' => $per_page                     //WE have to determine how many items to show on a page
        ));
        $this->items = $currentPageData;

        // Handle bulk action
        $this->process_bulk_action();
    }

    private function process_bulk_action()
    {
        if (!isset($_POST) || !isset($_POST['error404'])) {
            return;
        }
        
        $bulkitems = array();
        foreach($this->items as $item) {
            if (in_array($item['ID'], $_POST['error404'])) {
                $bulkitems[] = $item;
            }
        }
        
        //Detect when a bulk action is being triggered... 
        if ('delete' === $this->current_action()) {
            wp_die('TODO: Delete items');
        }

        if ('convert' === $this->current_action()) {
            wp_die('TODO: Convert items');
        }
    }

}
