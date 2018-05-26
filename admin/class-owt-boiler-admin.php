<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://onlinewebtutorhub.blogspot.in/
 * @since      1.0.0
 *
 * @package    Owt_Boiler
 * @subpackage Owt_Boiler/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Owt_Boiler
 * @subpackage Owt_Boiler/admin
 * @author     Online Web Tutor <abc@gmail.com>
 */
class Owt_Boiler_Admin {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Owt_Boiler_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Owt_Boiler_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style("bootstrap.min.css", plugin_dir_url(__FILE__) . 'css/bootstrap.min.css', array());
        wp_enqueue_style("jquery.dataTables.min.css", plugin_dir_url(__FILE__) . 'css/jquery.dataTables.min.css', array());
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Owt_Boiler_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Owt_Boiler_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script("bootstrap.min.js", plugin_dir_url(__FILE__) . 'js/bootstrap.min.js', array('jquery'), $this->version, true);
        wp_enqueue_script("jquery.dataTables.min.js", plugin_dir_url(__FILE__) . 'js/jquery.dataTables.min.js', array('jquery'), $this->version, true);
        wp_enqueue_script("jquery.validate.min.js", plugin_dir_url(__FILE__) . 'js/jquery.validate.min.js', array('jquery'), $this->version, true);
        wp_enqueue_script("custom.js", plugin_dir_url(__FILE__) . 'js/custom.js', array('jquery'), $this->version, true);

        wp_localize_script("custom.js", "plugin_vars", array(
            "ajaxurl" => admin_url("admin-ajax.php")
        ));
    }

    public function owt_plugin_menus() {

        add_menu_page("OWT Playlist", "OWT Playlist", "manage_options", "owt-playlist", array($this, "owt_menu_all_playlist"), "dashicons-admin-media", 53);
        add_submenu_page("owt-playlist", "All Playlists", "All Playlists", "manage_options", "owt-playlist", array($this, "owt_menu_all_playlist"));
        add_submenu_page("owt-playlist", "Add Playlist", "Add Playlist", "manage_options", "submenu-second", array($this, "owt_menu_add_playlist"));
    }

    public function owt_menu_all_playlist() {
        include_once OWT_BOILER_PLAGIN_DIR . '/admin/partials/owt-boiler-list-playlist.php';
    }

    public function owt_menu_add_playlist() {
        include_once OWT_BOILER_PLAGIN_DIR . '/admin/partials/owt-boiler-add-playlist.php';
    }

    public function boiler_plugin_ajax_handler() {
        global $wpdb;
        $param = isset($_REQUEST['param']) ? trim($_REQUEST['param']) : "";
        if ($param == "add_playlist") {

            $upd_imges = explode(",", $_REQUEST['upload_img']);
            $images = array();
            foreach ($upd_imges as $image) {
                if (!empty($image)) {
                    array_push($images, $image);
                }
            }

            $wpdb->insert(
                    "wp_owt_boiler_table", array(
                "name" => $_REQUEST['name'],
                "images" => json_encode($images)
                    )
            );

            if ($wpdb->insert_id > 0) {
                echo json_encode(array("status" => 1, "message" => "Value saved"));
            } else {
                echo json_encode(array("status" => 0, "message" => "Value failed to save"));
            }
        }

        wp_die();
    }

}
