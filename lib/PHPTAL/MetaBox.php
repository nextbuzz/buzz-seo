<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
    }

    /**
     * Called on action 'add_meta_boxes'.
     * @param string $post_type
     */
    public function addMetaBoxAction($post_type)
    {
        // Only add the meta box if the correct post type
        if (count($this->postTypes) === 0 || in_array($post_type, $this->postTypes)) {
            add_meta_box(
                $this->name, $this->title, array($this, 'renderMetaBoxContent'), $post_type, $this->context, $this->priority
            );
        }
    }

    /**
     * Render the actual meta box
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
        $data = $_POST[$this->name];

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

}
