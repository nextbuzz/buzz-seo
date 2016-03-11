<?php

namespace NextBuzz\SEO\PHPTAL;

/**
 * Create an admin MetaBox using TAL
 *
 * Note: form data is saved as metadata if the post name equals the tplName,
 * so all data to be saved should have a input name like name='DemoBox[key]' if the tpl name is DemoBox
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
class MetaBox extends Template
{

    private $postTypes = array();
    private $name;
    private $context;
    private $priority;
    private $title;
    private $requiredFields = array();
    private $recommendedFields = array();
    private $errorMessageIndex = '';
    private $recMessageIndex = '';

    /**
     * Constructor
     * @param string $tplName The name of the Template file (without .xml)
     * @param string $title The title of the Meta Box (should be translated)
     * @param array $postTypes The post types to limit the meta box to, empty array for all post types
     * @param string $context The position of the meta box (default, side, advanced)
     * @param string $priority The priority of the metabox (low, default, high)
     */
    public function __construct($tplName, $title, $postTypes = array(), $context = 'advanced', $priority = 'default')
    {
        parent::__construct($tplName);

        $this->postTypes = $postTypes;
        $this->name = $tplName;
        $this->title = $title;
        $this->context = $context;
        $this->priority = $priority;

        add_action('add_meta_boxes', array($this, 'addMetaBoxAction'));
        add_action('save_post', array($this, 'savePostAction'));

        // Save filter and create admin notices for errors
        add_filter('wp_insert_post_data', array($this, 'validateRequired'));
        add_action('admin_notices', array($this, 'showAdminNoticeRequiredFields'));
    }

    /**
     * Called on action 'add_meta_boxes'.
     *
     * @access private
     * @param string $post_type
     */
    public function addMetaBoxAction($post_type)
    {
        // If this is a hidden post_type, we don't add anything
        $obj = get_post_type_object($post_type);
        if (is_null($obj) || !$obj->public) {
            return;
        }

        // Only add the meta box if the correct post type
        if (count($this->postTypes) === 0 || in_array($post_type, $this->postTypes)) {
            wp_enqueue_media();
            add_meta_box(
                $this->name, $this->title, array($this, 'renderMetaBoxContent'), $post_type, $this->context, $this->priority
            );
        }
    }

    /**
     * Render the actual meta box
     *
     * @access private
     * @param object $post The current post
     */
    public function renderMetaBoxContent($post)
    {
        // Add a nonce field so we can check for it later.
        wp_nonce_field(strtolower($this->name) . '_metabox', strtolower($this->name) . '_metabox_nonce');

        // Get previously saved metadata for this box if any
        $data = get_post_meta($post->ID, '_metabox' . $this->name, true);

        if (isset($data) && is_array($data)) {
            $this->setTalData($data);
        }
        $this->echoExecute();
    }

    /**
     * This method is called on saving the post containing the MetaBox.
     *
     * @access private
     * @param integer $post_id
     */
    public function savePostAction($post_id)
    {
        /*
         * We need to verify this came from the our screen and with proper authorization,
         * because save_post can be triggered at other times.
         */

        // Check if our nonce is set.
        $nonceCheck = strtolower($this->name) . '_metabox_nonce';
        if (!isset($_POST[$nonceCheck])) {
            return $post_id;
        }

        $nonce = $_POST[$nonceCheck];

        // Verify that the nonce is valid.
        if (!wp_verify_nonce($nonce, strtolower($this->name) . '_metabox')) {
            return $post_id;
        }

        // If this is an autosave, our form has not been submitted,
        // so we don't want to do anything.
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }

        // Check the user's permissions.
        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                return $post_id;
            }
        } else {
            if (!current_user_can('edit_post', $post_id)) {
                return $post_id;
            }
        }

        /* OK, its safe for us to save the data now. */

        // Sanitize the user input.
        $data = isset($_POST[$this->name]) ? $_POST[$this->name] : false;

        if (is_array($data)) {
            $this->sanatizeArray($data);

            // Update the meta data for this box
            update_post_meta($post_id, '_metabox' . $this->name, $data);
        }
    }

    private function sanatizeArray($data)
    {
        if (is_array($data)) {
            foreach ($data as &$value)
            {
                if (is_string($value)) {
                    $value = sanitize_text_field($value);
                }
                if (is_array($value)) {
                    $value = $this->sanatizeArray($value);
                }
            }
        }

        return $data;
    }

    /**
     * Add required (non empty) fields
     *
     * @param $required string|array Keynames of metabox fields that cannot be empty
     * @param $errorMessage string with error or false if $required param is an array
     */
    public function setRequired($required, $errorMessage = false)
    {
        if (!is_array($required)) {
            $this->requiredFields[] = array('field' => $required, 'error' => $errorMessage);
            return;
        }

        foreach ($required as $req => $errorMessage)
        {
            $this->setRequired($req, $errorMessage);
        }
    }

    /**
     * Add recommended (non empty) fields
     *
     * @param $recommended string|array Keynames of metabox fields that cannot be empty
     * @param $errorMessage string with error or false if $required param is an array
     */
    public function setRecommended($recommended, $errorMessage = false)
    {
        if (!is_array($recommended)) {
            $this->recommendedFields[] = array('field' => $recommended, 'error' => $errorMessage);
            return;
        }

        foreach ($recommended as $req => $errorMessage)
        {
            $this->setRecommended($req, $errorMessage);
        }
    }

    /**
     * Validate fielddata
     *
     * @access private
     * @param string $data The post data
     * @return string
     */
    public function validateRequired($data)
    {
        // Don't want to do this on autosave
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $data;
        }

        // If this is a hidden post_type, we don't add anything
        $obj = get_post_type_object($data['post_type']);
        if (is_null($obj) || !$obj->public) {
            return $data;
        }

        // Get the post data belonging to this metabox
        $currentBoxData = isset($_POST[$this->name]) ? $_POST[$this->name] : array();

        $ok = true;
        $this->errorMessageIndex = '';
        $post_thumb = isset($_POST['post_ID']) ? get_post_meta($_POST['post_ID'], '_thumbnail_id', true) : '';
        foreach ($this->requiredFields as $index => $req)
        {
            if ($req['field'] === 'thumbnail' && strlen($post_thumb) === 0) {
                $ok = false;
                $this->errorMessageIndex .= $index . '-';
            } elseif ($req['field'] !== 'thumbnail' && (!isset($currentBoxData[$req['field']]) || empty($currentBoxData[$req['field']]))) {
                $ok = false;
                $this->errorMessageIndex .= $index . '-';
            }
        }

        $okReccommended = true;
        $this->recMessageIndex = '';
        foreach ($this->recommendedFields as $index => $req)
        {
            if (!isset($currentBoxData[$req['field']]) || empty($currentBoxData[$req['field']])) {
                $okReccommended = false;
                $this->recMessageIndex .= $index . '-';
            }
        }

        if (!$okReccommended) {
            add_filter('redirect_post_location', function($loc) {
                return add_query_arg($this->name . 'RecNotice', substr($this->recMessageIndex, 0, -1), $loc);
            });
        }

        if (!$ok) {
            // Revert to draft
            $data['post_status'] = 'draft';

            add_filter('redirect_post_location', function($loc) {
                return add_query_arg($this->name . 'Notice', substr($this->errorMessageIndex, 0, -1), $loc);
            });

            // Remove the publish success message
            add_filter('redirect_post_location', array($this, 'removeMessage'));
        }

        return $data;
    }

    /**
     * Remove the succesfully published message when there is a validation error
     *
     * @access private
     * @param type $location
     * @return type
     */
    public function removeMessage($location)
    {
        return remove_query_arg('message', $location);
    }

    /**
     * Show admin errors for missing required fields
     * @access private
     */
    public function showAdminNoticeRequiredFields()
    {
        if (isset($_GET[$this->name . 'Notice'])) {
            $errors = explode('-', $_GET[$this->name . 'Notice']);
            echo '<div class="notice-error notice"><ul>';
            foreach ($errors as $index)
            {
                echo '<li>' . $this->requiredFields[$index]['error'] . '</li>';
            }
            echo '</ul></div>';
        }

        if (isset($_GET[$this->name . 'RecNotice'])) {
            $errors = explode('-', $_GET[$this->name . 'RecNotice']);
            echo '<div class="notice notice-warning is-dismissible"><ul>';
            foreach ($errors as $index)
            {
                echo '<li>' . $this->recommendedFields[$index]['error'] . '</li>';
            }
            echo '</ul></div>';
        }
    }

}
