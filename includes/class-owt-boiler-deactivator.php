<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://onlinewebtutorhub.blogspot.in/
 * @since      1.0.0
 *
 * @package    Owt_Boiler
 * @subpackage Owt_Boiler/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Owt_Boiler
 * @subpackage Owt_Boiler/includes
 * @author     Online Web Tutor <abc@gmail.com>
 */
class Owt_Boiler_Deactivator {

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
    public function deactivate() {
        global $wpdb;
        $wpdb->query("DROP Table IF EXISTS ".$this->table->owt_boiler_table());
    }

}
