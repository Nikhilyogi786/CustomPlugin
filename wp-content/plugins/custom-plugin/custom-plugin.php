<?php
/*
 * Plugin Name: Employee Management System
 * Description: This is a CRUD Employee Management System.
 * Plugin URI: https://example.com/custom-plugin
 * Author: Sample User
 * Author URI: https://example.com
 * Version: 1.0
 * Requires at least: 6.5.2
 * Requires PHP: 7.4 / 8.3
 */

define('EMS_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('EMS_PLUGIN_URL', plugin_dir_url(__FILE__));

class Custom_Plugin
{

    public function __construct()
    {
        //Calling action hook add menu
        add_action('admin_menu', array($this, 'add_admin_menu'));
    }

    public function add_admin_menu()
    {
        // Add menu
        add_menu_page('Employee System | Employee Management System', 'Employee System', 'manage_options', 'employee-system', array($this, 'ems_crud_system'), 'dashicons-format-chat');
        // Sub menu
        add_submenu_page('employee-system', 'Add Employee', 'Add Employee', 'manage_options', 'employee-system', array($this, 'ems_crud_system'));

        add_submenu_page('employee-system', 'List Employee', 'List Employee', 'manage_options', 'list-employee', array($this, 'ems_list_employee'));
    }
    // Menu handle callback
    public function ems_crud_system()
    {
        // echo EMS_PLUGIN_PATH."pages/add-employee.php";
        include_once(EMS_PLUGIN_PATH . "pages/add-employee.php");
    }

    public function ems_list_employee()
    {
        include_once(EMS_PLUGIN_PATH . "pages/list-employee.php");

    }
}
register_activation_hook(__FILE__,"ems_create_table");

function ems_create_table(){
    global $wpdb;
    $table_prefix = $wpdb->prefix;
    $sql="
    CREATE TABLE {$table_prefix}ems_form_data (
        `id` int NOT NULL AUTO_INCREMENT,
        `name` varchar(120) DEFAULT NULL,
        `email` varchar(80) DEFAULT NULL,
        `phoneNo` varchar(50) DEFAULT NULL,
        `gender` enum('male','female','other') DEFAULT NULL,
        `designation` varchar(50) DEFAULT NULL,
        PRIMARY KEY (`id`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
      
    ";
    include_once ABSPATH. "wp-admin/includes/upgrade.php";
    dbDelta($sql);
}
// Instantiate the plugin class
$custom_plugin = new Custom_Plugin();

// Privacy Notice
function cp_privacy_notice()
{
    echo '<div class="updated"><p>This plugin collects some data to provide its functionality. For more information, please review our <a href="#">privacy policy</a>.</p></div>';
}
add_action('admin_notices', 'cp_privacy_notice');
?>
