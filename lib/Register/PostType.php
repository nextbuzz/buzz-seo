<?php

namespace NextBuzz\SEO\Register;

/**
 * A helper class to create Custom Post Types.
 *
 * It handles:
 * - Creation of the post type (with a prefix by default)
 * - Adding templates within the plugin for singles and archives (using setupTemplates method).
 * - Allows basic settings to be set through chaining
 *
 * Note: To make sure all translations are ready this should be called in an init action!
 *
 * Usage (ordinary mode):
 * <code>
 * new \NextBuzz\SEO\Register\PostType('products', array(
 *      'labels'      => array(
 *          'name'          => __('Products'),
 *          'singular_name' => __('Product')
 *      ),
 *      'public'      => true,
 *      'has_archive' => true,
 *  ));
 * </code>
 *
 * Usage (chained mode):
 * <code>
 * \NextBuzz\SEO\Register\PostType::factory('products')
 *      ->setLabels(__('Products'), __('Product'))
 *      ->setPublic(true)
 *      ->setHasArchive(true);
 * </code>
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
class PostType
{

    private $coreFile;
    protected $slug;
    protected $args;

    /**
     * Setup a new posttype
     *
     * @param string $slug The unique slug for this post type.
     * @param array $args
     * @param string $slugPrefix
     */
    public function __construct($slug, $args = array(), $slugPrefix = 'bseo-')
    {
        // Add the slugPrefix to make sure it is a unique posttype.
        $this->slug = $slugPrefix . $slug;

        // Make sure the 'slug' on the frontend does not have the prefix
        if (is_array($args) && $slugPrefix !== '' && !isset($args['rewrite'])) {
            $args['rewrite'] = array(
                'slug' => $slug
            );
        }

        // Set some default values so we don't have to check for them in all set methods
        $defaults   = array(
            'labels' => array(),
        );
        $this->args = array_merge($defaults, $args);

        // Register the post type late in the init process, since it is probably created in a init action as well.
        add_action('init', function() {
            $this->registerCPT();
        }, 99);
    }

    /**
     * Callback tgat registers the actual post type
     */
    private function registerCPT()
    {
        register_post_type($this->slug, $this->args);
    }

    /**
     * Factory to allow chaining
     *
     * @param string $slug The unique slug for this post type.
     * @param array $args
     * @param string $slugPrefix
     */
    public static function factory($slug, $args = array(), $slugPrefix = 'bseo-')
    {
        return new PostType($slug, $args, $slugPrefix);
    }

    /**
     * A plural descriptive name for the post type marked for translation.
     *
     * @param string $label Descriptive name (plural)
     * @return \NextBuzz\SEO\Register\PostType
     */
    public function setLabel($label)
    {
        $this->args['label'] = $label;

        return $this;
    }

    /**
     * An array of labels for this post type.
     * By default, post labels are used for non-hierarchical post types and page labels for hierarchical ones.
     * Default: if empty, 'name' is set to value of 'label', and 'singular_name' is set to value of 'name'.
     *
     * @see https://codex.wordpress.org/Function_Reference/register_post_type
     * @param string|array $labels If (plural) string, and singularName is also used, auto-generates all labels
     * @param string|false $singularName If string and labels is plural string, auto-generates all labels
     * @return \NextBuzz\SEO\Register\PostType
     */
    public function setLabels($labels, $singularName = false)
    {
        if (is_array($labels)) {
            $this->args['labels'] = $labels;
            return $this;
        }

        if (is_string($singularName) && is_string($labels)) {
            $pluralName           = $labels;
            $pluralNameLC         = \NextBuzz\SEO\Utils\StringParser::factory($pluralName)->toLower();
            $singularNameLC       = \NextBuzz\SEO\Utils\StringParser::factory($singularName)->toLower();
            $this->args['labels'] = array(
                'name'                  => $pluralName,
                'singular_name'         => $singularName,
                'menu_name'             => $pluralName,
                'name_admin_bar'        => $singularName,
                'archives'              => sprintf(__('%s Archives', 'treehouse-core'), $singularName),
                'parent_item_colon'     => sprintf(__('Parent %s:', 'treehouse-core'), $singularName),
                'all_items'             => sprintf(__('All %s', 'treehouse-core'), $pluralName),
                'add_new_item'          => sprintf(__('Add New %s', 'treehouse-core'), $singularName),
                'add_new'               => __('Add New', 'treehouse-core'),
                'new_item'              => sprintf(__('New %s', 'treehouse-core'), $singularName),
                'edit_item'             => sprintf(__('Edit %s', 'treehouse-core'), $singularName),
                'update_item'           => sprintf(__('Update %s', 'treehouse-core'), $singularName),
                'view_item'             => sprintf(__('View %s', 'treehouse-core'), $singularName),
                'search_items'          => sprintf(__('Search %s', 'treehouse-core'), $singularName),
                'not_found'             => sprintf(__('No %s found', 'treehouse-core'), $pluralNameLC),
                'not_found_in_trash'    => sprintf(__('No %s found in trash', 'treehouse-core'), $pluralNameLC),
                'featured_image'        => __('Featured Image', 'treehouse-core'),
                'set_featured_image'    => __('Set featured image', 'treehouse-core'),
                'remove_featured_image' => __('Remove featured image', 'treehouse-core'),
                'use_featured_image'    => __('Use as featured image', 'treehouse-core'),
                'insert_into_item'      => sprintf(__('Insert into %s', 'treehouse-core'), $singularNameLC),
                'uploaded_to_this_item' => sprintf(__('Uploaded to this %s', 'treehouse-core'), $singularNameLC),
                'items_list'            => sprintf(__('%s list', 'treehouse-core'), $pluralName),
                'items_list_navigation' => sprintf(__('%s list navigation', 'treehouse-core'), $pluralName),
                'filter_items_list'     => sprintf(__('Filter %s list', 'treehouse-core'), $pluralNameLC),
            );
        }

        return $this;
    }

    /**
     * A short descriptive summary of what the post type is.
     *
     * @param string $description Summary of what the post type is.
     * @return \NextBuzz\SEO\Register\PostType
     */
    public function setDescription($description)
    {
        $this->args['description'] = $description;

        return $this;
    }

    /**
     * Controls how the type is visible to authors (show_in_nav_menus, show_ui) and
     * readers (exclude_from_search, publicly_queryable).
     * Default: false
     *    'true'  - Implies exclude_from_search: false,
     *                      publicly_queryable:  true,
     *                      show_in_nav_menus:   true, and
     *                      show_ui:             true.
     *              The built-in types attachment, page, and post are similar to this.
     *    'false' - Implies exclude_from_search: true,
     *                      publicly_queryable:  false,
     *                      show_in_nav_menus:   false, and
     *                      show_ui: false.
     *              The built-in types nav_menu_item and revision are similar to this.
     *              Best used if you'll provide your own editing and viewing interfaces (or none at all).
     *
     * If no value is specified for exclude_from_search, publicly_queryable, show_in_nav_menus, or show_ui,
     * they inherit their values from public.
     *
     * @param boolean $boolean True or false
     * @return \NextBuzz\SEO\Register\PostType
     */
    public function setPublic($boolean)
    {
        $this->args['public'] = $boolean;

        return $this;
    }

    /**
     * Whether to exclude posts with this post type from front end search results.
     * Default: value of the opposite of public argument
     *       'true'  - site/?s=search-term will not include posts of this post type.
     *       'false' - site/?s=search-term will include posts of this post type.
     *
     * Note: If you want to show the posts's list that are associated to taxonomy's terms, you must set
     * exclude_from_search to false (ie : for call site_domaine/?taxonomy_slug=term_slug or
     * site_domaine/taxonomy_slug/term_slug). If you set to true, on the taxonomy page (ex: taxonomy.php) WordPress
     * will not find your posts and/or pagination will make 404 error...
     *
     * @param boolean $boolean True or false
     * @return \NextBuzz\SEO\Register\PostType
     */
    public function setExcludeFromSearch($boolean)
    {
        $this->args['exclude_from_search'] = $boolean;

        return $this;
    }

    /**
     * Whether queries can be performed on the front end as part of parse_request().
     * Default: value of public argument
     *
     * Note: The queries affected include the following (also initiated when rewrites are handled)
     *     - ?post_type={post_type_key}
     *     - ?{post_type_key}={single_post_slug}
     *     - ?{post_type_query_var}={single_post_slug}
     *
     * Note: If query_var is empty, null, or a boolean FALSE, WordPress will still attempt to interpret it (4.2.2)
     * and previews/views of your custom post will return 404s.
     *
     * @param boolean $boolean True or false
     * @return \NextBuzz\SEO\Register\PostType
     */
    public function setPubliclyQueryable($boolean)
    {
        $this->args['publicly_queryable'] = $boolean;

        return $this;
    }

    /**
     * Whether to generate a default UI for managing this post type in the admin.
     * Default: value of public argument
     *     'false' - do not display a user-interface for this post type
     *     'true'  - display a user-interface (admin panel) for this post type
     *
     * @param boolean $boolean True or false
     * @return \NextBuzz\SEO\Register\PostType
     */
    public function setShowUI($boolean)
    {
        $this->args['show_ui'] = $boolean;

        return $this;
    }

    /**
     * Whether post_type is available for selection in navigation menus.
     * Default: value of public argument
     *
     * @param boolean $boolean True or false
     * @return \NextBuzz\SEO\Register\PostType
     */
    public function setShowInNavMenus($boolean)
    {
        $this->args['show_in_nav_menus'] = $boolean;

        return $this;
    }

    /**
     * Where to show the post type in the admin menu. show_ui must be true.
     * Default: value of show_ui argument
     *     - 'false'       - do not display in the admin menu
     *     - 'true'        - display as a top level menu
     *     - 'some string' - If an existing top level page such as 'tools.php' or 'edit.php?post_type=page', the
     *                       post type will be placed as a sub menu of that.
     *
     * Note: When using 'some string' to show as a submenu of a menu page created by a plugin, this item will
     * become the first submenu item, and replace the location of the top-level link. If this isn't desired,
     * the plugin that creates the menu page needs to set the add_action priority for admin_menu to 9 or lower.
     *
     * @param boolean|string $value True, false or string
     * @return \NextBuzz\SEO\Register\PostType
     */
    public function setShowInMenu($value)
    {
        $this->args['show_in_menu'] = $value;

        return $this;
    }

    /**
     * Whether to make this post type available in the WordPress admin bar.
     * Default: value of the show_in_menu argument
     *
     * @param boolean $boolean True or false
     * @return \NextBuzz\SEO\Register\PostType
     */
    public function setShowInAdminBar($boolean)
    {
        $this->args['show_in_admin_bar'] = $boolean;

        return $this;
    }

    /**
     * The position in the menu order the post type should appear. show_in_menu must be true.
     * Default: null - defaults to below Comments
     *
     * 5   - below Posts
     * 10  - below Media
     * 15  - below Links
     * 20  - below Pages
     * 25  - below comments
     * 60  - below first separator
     * 65  - below Plugins
     * 70  - below Users
     * 75  - below Tools
     * 80  - below Settings
     * 100 - below second separator
     *
     * @param integer $integer Sets the position in the menu
     * @return \NextBuzz\SEO\Register\PostType
     */
    public function setMenuPosition($integer)
    {
        $this->args['menu_position'] = $integer;

        return $this;
    }

    /**
     * The url to the icon to be used for this menu or the name of the icon from the iconfont [1]
     * Default: null - defaults to the posts icon
     *
     * Examples:
     * 'dashicons-video-alt' (Uses the video icon from Dashicons[2])
     * 'get_template_directory_uri() . "/images/cutom-posttype-icon.png"' (Use an image located in the current theme)
     *
     * @param string $icon The url of the icon or the name in the iconfont
     * @return \NextBuzz\SEO\Register\PostType
     */
    public function setMenuIcon($icon)
    {
        $this->args['menu_icon'] = $icon;

        return $this;
    }

    /**
     * Enables post type archives. Will use $post_type as archive slug by default.
     * Default: false
     *
     * @param boolean $boolean True or false
     * @return \NextBuzz\SEO\Register\PostType
     */
    public function setHasArchive($boolean)
    {
        $this->args['has_archive'] = $boolean;

        return $this;
    }

    /**
     * An alias for calling add_post_type_support() directly. As of 3.5, boolean false can be passed as value
     * instead of an array to prevent default (title and editor) behavior.
     * Default: title and editor
     *
     * Possible default values:
     * - title
     * - editor
     * - author
     * - thumbnail
     * - excerpt
     * - trackbacks
     * - custom-fields
     * - comments
     * - revisions
     * - page-attributes
     * - post-formats
     *
     * @param array|false $supports Array of supported items
     * @return \NextBuzz\SEO\Register\PostType
     */
    public function setSupports($supports)
    {
        $this->args['supports'] = $supports;

        return $this;
    }

    /**
     * The string to use to build the read, edit, and delete capabilities. May be passed as an array to allow for
     * alternative plurals when using this argument as a base to construct the capabilities,
     * e.g. array('story', 'stories') the first array element will be used for the singular capabilities and
     * the second array element for the plural capabilities, this is instead of the auto generated version if no
     * array is given which would be "storys". The 'capability_type' parameter is used as a base to construct
     * capabilities unless they are explicitly set with the 'capabilities' parameter.
     * Default: "post"
     *
     * @see https://codex.wordpress.org/Function_Reference/register_post_type
     * @param string|array $capabilityType String or array with capability types
     * @return \NextBuzz\SEO\Register\PostType
     */
    public function setCapabilityType($capabilityType)
    {
        $this->args['capability_type'] = $capabilityType;

        return $this;
    }

    /**
     * An array of the capabilities for this post type.
     * Default: capability_type is used to construct
     *
     * By default, seven keys are accepted as part of the capabilities array:
     * - edit_post, read_post, and delete_post
     *       These three are meta capabilities, which are then generally mapped to corresponding primitive capabilities
     *       depending on the context, for example post being edited/read/deleted and the user or role being checked.
     *       Thus these capabilities would generally not be granted directly to users or roles.
     * - edit_posts - Controls whether objects of this post type can be edited.
     * - edit_others_posts  - Controls whether objects of this type owned by other users can be edited. If the post
     *                        type does not support an author, then this will behave like edit_posts.
     * - publish_posts      - Controls publishing objects of this post type.
     * - read_private_posts - Controls whether private objects can be read.
     *
     * Note 1: those last four primitive capabilities are checked in core in various locations.
     *
     * There are also eight other primitive capabilities which are not referenced directly in core, except in
     * map_meta_cap(), which takes the three aforementioned meta capabilities and translates them into one or more
     * primitive capabilities that must then be checked against the user or role, depending on the context.
     * These additional capabilities are only used in map_meta_cap(). Thus, they are only assigned by default if
     * the post type is registered with the 'map_meta_cap' argument set to true (default is false).
     * - read                   - Controls whether objects of this post type can be read.
     * - delete_posts           - Controls whether objects of this post type can be deleted.
     * - delete_private_posts   - Controls whether private objects can be deleted.
     * - delete_published_posts - Controls whether published objects can be deleted.
     * - delete_others_posts    - Controls whether objects owned by other users can be can be deleted. If the post
     *                            type does not support an author, then this will behave like delete_posts.
     * - edit_private_posts     - Controls whether private objects can be edited.
     * - edit_published_posts   - Controls whether published objects can be edited.
     * - create_posts           - Controls whether new objects can be created
     *
     * @see https://codex.wordpress.org/Function_Reference/register_post_type
     * @param array $capabilities Array with capabilities
     * @return \NextBuzz\SEO\Register\PostType
     */
    public function setCapabilities($capabilities)
    {
        $this->args['capabilities'] = $capabilities;

        return $this;
    }

    /**
     * Whether to use the internal default meta capability handling.
     * Default: null
     *
     * Note: If set it to false then standard admin role can't edit the posts types. Then the edit_post capability
     * must be added to all roles to add or edit the posts types.
     *
     * @param boolean $boolean True or false
     * @return \NextBuzz\SEO\Register\PostType
     */
    public function setMapMetaCap($boolean)
    {
        $this->args['map_meta_cap'] = $boolean;

        return $this;
    }

    /**
     * Whether the post type is hierarchical (e.g. page). Allows Parent to be specified. The 'supports' parameter
     * should contain 'page-attributes' to show the parent select box on the editor page.
     * Default: false
     *
     * @param boolean $boolean True or false
     * @return \NextBuzz\SEO\Register\PostType
     */
    public function setHierarchical($boolean)
    {
        $this->args['hierarchical'] = $boolean;

        return $this;
    }

    /**
     * Provide a callback function that will be called when setting up the meta boxes for the edit form.
     * The callback function takes one argument $post, which contains the WP_Post object for the currently edited post.
     * Do remove_meta_box() and add_meta_box() calls in the callback.
     * Default: None
     *
     * @param function $callback
     * @return \NextBuzz\SEO\Register\PostType
     */
    public function setRegisterMetaBoxCB($callback)
    {
        $this->args['register_meta_box_cb'] = $callback;

        return $this;
    }

    /**
     * An array of registered taxonomies like category or post_tag that will be used with this post type. This can
     * be used in lieu of calling register_taxonomy_for_object_type() directly. Custom taxonomies still need to be
     * registered with register_taxonomy().
     * Default: no taxonomies
     *
     * @param array $taxonomies
     * @return \NextBuzz\SEO\Register\PostType
     */
    public function setTaxonomies($taxonomies)
    {
        $this->args['taxonomies'] = $taxonomies;

        return $this;
    }

    /**
     * Triggers the handling of rewrites for this post type. To prevent rewrites, set to false.
     * Default: true and use $post_type as slug
     *
     * $args array
     *     'slug'       => string Customize the permalink structure slug. Defaults to the $post_type value.
     *                     Should be translatable.
     *     'with_front' => bool Should the permalink structure be prepended with the front base. (example: if your
     *                     permalink structure is /blog/, then your links will be: false->/news/, true->/blog/news/).
     *                     Defaults to true
     *     'feeds'      => bool Should a feed permalink structure be built for this post type.
     *                     Defaults to has_archive value.
     *     'pages'      => bool Should the permalink structure provide for pagination. Defaults to true
     *
     * Note: If registering a post type inside of a plugin, call flush_rewrite_rules() in your activation and
     * deactivation hook (see Flushing Rewrite on Activation below). If flush_rewrite_rules() is not used, then
     * you will have to manually go to Settings > Permalinks and refresh your permalink structure before your
     * custom post type will show the correct structure.
     *
     * @param boolean|array $rewrite array with rewrite stuff
     * @return \NextBuzz\SEO\Register\PostType
     */
    public function setRewrite($rewrite)
    {
        $this->args['rewrite'] = $rewrite;

        return $this;
    }

    /**
     * Sets the query_var key for this post type.
     * Default: true - set to $post_type
     *     'false' - Disables query_var key use. A post type cannot be loaded at /?{query_var}={single_post_slug}
     *     'string' - /?{query_var_string}={single_post_slug} will work as intended.
     *
     * Note: The query_var parameter has no effect if the ‘publicly_queryable’ parameter is set to false. query_var
     * adds the custom post type’s query var to the built-in query_vars array so that WordPress will recognize it.
     * WordPress removes any query var not included in that array.
     *
     * If set to true it allows you to request a custom posts type (book) using this: example.com/?book=life-of-pi
     * If set to a string rather than true (for example ‘publication’), do: example.com/?publication=life-of-pi
     *
     * @param boolean|string $value True or false or string
     * @return \NextBuzz\SEO\Register\PostType
     */
    public function setQueryVar($value)
    {
        $this->args['query_var'] = $value;

        return $this;
    }

    /**
     * Can this post_type be exported.
     * Default: true
     *
     * @param boolean $boolean True or false
     * @return \NextBuzz\SEO\Register\PostType
     */
    public function setCanExport($boolean)
    {
        $this->args['can_export'] = $boolean;

        return $this;
    }

    /**
     * Whether to expose this post type in the REST API.
     * Default: false
     *
     * @param boolean $boolean True or false
     * @return \NextBuzz\SEO\Register\PostType
     */
    public function setShowInRest($boolean)
    {
        $this->args['show_in_rest'] = $boolean;

        return $this;
    }

    /**
     * The base slug that this post type will use when accessed using the REST API.
     * Default: $post_type
     *
     * @param string $restBase Base slug for REST API
     * @return \NextBuzz\SEO\Register\PostType
     */
    public function setRestBase($restBase)
    {
        $this->args['rest_base'] = $restBase;

        return $this;
    }

    /**
     * An optional custom controller to use instead of WP_REST_Posts_Controller. Must be a subclass
     * of WP_REST_Controller.
     * Default: WP_REST_Posts_Controller
     *
     * @param string $restControllerClass Controller class
     * @return \NextBuzz\SEO\Register\PostType
     */
    public function setRestControllerClass($restControllerClass)
    {
        $this->args['rest_controller_class'] = $restControllerClass;

        return $this;
    }

}
