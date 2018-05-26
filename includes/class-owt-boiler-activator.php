<?php

/**
 * Fired during plugin activation
 *
 * @link       http://onlinewebtutorhub.blogspot.in/
 * @since      1.0.0
 *
 * @package    Owt_Boiler
 * @subpackage Owt_Boiler/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Owt_Boiler
 * @subpackage Owt_Boiler/includes
 * @author     Online Web Tutor <abc@gmail.com>
 */
class Owt_Boiler_Activator {

    public $table;

    public function __construct($table_var) {
        $this->table = $table_var;
    }

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public function activate() {
        global $wpdb;
        require_once ABSPATH . '/wp-admin/includes/upgrade.php';
        if (count($wpdb->get_var("Show tables like ".$this->table->owt_boiler_table())) == 0) {
            $sqlQuery = '
                CREATE TABLE `wp_owt_boiler_table` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `name` varchar(255) DEFAULT NULL,
                `images` longtext,
                `status` int(11) NOT NULL DEFAULT "1",
                `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY (`id`)
               ) ENGINE=InnoDB DEFAULT CHARSET=latin1';
            dbDelta($sqlQuery);
        }
    }

}
