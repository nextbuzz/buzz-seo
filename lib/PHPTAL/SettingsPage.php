<?php

namespace NextBuzz\SEO\PHPTAL;

/**
 * Create a settings page using TAL
 *
 * Note: form data is saved as metadata if the post name equals the tplName,
 * so all data to be saved should have a input name like name='DemoBox[key]' if the tpl name is DemoBox
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
class SettingsPage extends Template
{
    protected $options;
    private $name;

    /**
     * Constructor
     * @param string $tplName The name of the Template file (without .xml)
     */
    public function __construct($tplName)
    {
        parent::__construct($tplName);

        $this->name = $tplName;

        $this->saveSettingsAction();

        // Add a nonce field so we can check for it later.
        $this->setTalData('settingsNonce', wp_nonce_field(strtolower($this->name) . '_settings', strtolower($this->name) . '_settings_nonce', true, false));

        // Get previously saved metadata for this box if any
        $this->options = get_option('_settings' . $this->name, true);

        if (isset($this->options) && is_array($this->options)) {
            $this->setTalData($this->options);
        }
    }

    public static function factory($tplName = false)
    {
        return new static($tplName);
    }

    public function render()
    {
        $this->echoExecute();
    }

    /**
     * This method is called on saving the post containing the MetaBox.
     * @param integer $post_id
     */
    public function saveSettingsAction()
    {
        /*
         * We need to verify this came from the our screen and with proper authorization,
         * because save_post can be triggered at other times.
         */

        // Check if our nonce is set.
        $nonceCheck = strtolower($this->name) . '_settings_nonce';
        if (!isset($_POST[$nonceCheck])) {
            return;
        }

        $nonce = $_POST[$nonceCheck];

        // Verify that the nonce is valid.
        if (!wp_verify_nonce($nonce, strtolower($this->name) . '_settings')) {
            $this->setTalData('errorMessage', __("Nonce value is invalid.", "buzz-seo"));
            return false;
        }

        $this->setTalData('message', __("Settings saved.", "buzz-seo"));

        /* OK, its safe for us to save the data now. */

        // Sanitize the user input.
        $data = $this->stripslashes($_POST[$this->name]);

        if (is_array($data)) {
            $this->sanatizeArray($data);

            // Update the meta data for this box
            update_option('_settings' . $this->name, $data);
        } else {
            update_option('_settings' . $this->name, array());
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

    private function stripslashes($data)
    {
        if (is_array($data)) {
            foreach ($data as &$value)
            {
                if (is_string($value)) {
                    $value = stripslashes($value);
                }
                if (is_array($value)) {
                    $value = $this->stripslashes($value);
                }
            }
        }

        return $data;
    }

}
