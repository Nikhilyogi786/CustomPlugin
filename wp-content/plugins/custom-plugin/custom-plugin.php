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

// Instantiate the plugin class
$custom_plugin = new Custom_Plugin();

// Privacy Notice
function cp_privacy_notice()
{
    echo '<div class="updated"><p>This plugin collects some data to provide its functionality. For more information, please review our <a href="#">privacy policy</a>.</p></div>';
}
add_action('admin_notices', 'cp_privacy_notice');


register_activation_hook(__FILE__, "ems_create_table");

//Create table
function ems_create_table()
{
    global $wpdb;
    $table_prefix = $wpdb->prefix;
    $sql = "
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
    include_once ABSPATH . "wp-admin/includes/upgrade.php";
    dbDelta($sql);
}

register_deactivation_hook(__FILE__, "ems_drop_table");

//Drop table hooks
function ems_drop_table()
{
    global $wpdb;
    $table_prefix = $wpdb->prefix;
    $sql = "DROP TABLE IF EXISTS {$table_prefix}ems_form_data";
    $wpdb->query($sql);
}

add_action("admin_enqueue_scripts", "ems_add_plugin_assets");

function ems_add_plugin_assets()
{
    //Styles css 
    wp_enqueue_style("ems-bootstrap-css", EMS_PLUGIN_URL . "css/bootstrap.min.css", array(), "1.0.0", "all");
    wp_enqueue_style("ems-datatable-css", EMS_PLUGIN_URL . "css/dataTables.dataTables.min.css", array(), "1.0.0", "all");

    //Custom css
    wp_enqueue_style("ems-custom-css", EMS_PLUGIN_URL . "css/custom.css", array(), "1.0.0", "all");

    //Script js
    wp_enqueue_script("ems-bootstrap-js", EMS_PLUGIN_URL . "js/bootstrap.min.js", array('jquery'), "1.0.0", "all");
    wp_enqueue_script("ems-datatable-js", EMS_PLUGIN_URL . "js/dataTables.min.js", array('jquery'), "1.0.0", "all");
    wp_enqueue_script("ems-validate-js", EMS_PLUGIN_URL . "js/jquery.validate.min.js", array('jquery'), "1.0.0", "all");

    //Custom js
    wp_enqueue_script("ems-custom-js", EMS_PLUGIN_URL . "js/custom.js", array('jquery'), "1.0.0", "all");

    // Localize script with plugin URL
    wp_localize_script("ems-custom-js", "plugin_data", array("ajax_url" => admin_url("admin-ajax.php"),));
}


// add_action('wp_ajax_custom_form_submit', 'custom_form_submit_callback');
// add_action('wp_ajax_nopriv_custom_form_submit', 'custom_form_submit_callback');

// function custom_form_submit_callback()
// {  
//     if (isset($_POST['formData']) && !empty($_POST['formData'])) {
//         // Parse the URL-encoded string into an associative array
//         parse_str($_POST['formData'], $form_data);

//         // Access individual form fields
//         $name = isset($form_data['name']) ? sanitize_text_field($form_data['name']) : '';
//         $email = isset($form_data['email']) ? sanitize_email($form_data['email']) : '';
//         $phoneNo = isset($form_data['phoneNo']) ? sanitize_text_field($form_data['phoneNo']) : '';
//         $gender = isset($form_data['gender']) ? sanitize_text_field($form_data['gender']) : '';
//         $designation = isset($form_data['designation']) ? sanitize_text_field($form_data['designation']) : '';

//         // Now you can use the form data as needed
//         // For example, you can insert it into the database
        
//         global $wpdb;
//         // $table_name = $wpdb->prefix . 'ems_form_data';

//         // $wpdb->insert(
//         //     $table_name,
//         //     array(
//         //         'name' => $name,
//         //         'email' => $email,
//         //         'phoneNo' => $phoneNo,
//         //         'gender' => $gender,
//         //         'designation' => $designation
//         //     ),
//         //     array(
//         //         '%s',
//         //         '%s',
//         //         '%s',
//         //         '%s',
//         //         '%s'
//         //     )
//         // );
//         $the_last_inserted_id = $wpdb->insert_id;
//         if ($the_last_inserted_id > 0) {
//             echo json_encode(array('message' => 'Data received successfully.'));
//         } else {
//             echo json_encode(array('error' => 'Form Data is missing or empty!'));
//         }

//     }
//     wp_die();
// }

add_action('wp_ajax_get_employee_data', 'get_employee_data_callback');
add_action('wp_ajax_nopriv_get_employee_data', 'get_employee_data_callback');
//Array ( [action] => get_employee_data [empId] => 46 [actions] => edit )
// function get_employee_data_callback(){
    
//     global $wpdb;
//     $empId =$_GET['empId'];
//     $table_name = $wpdb->prefix . 'ems_form_data';

//     if(isset($_GET['actions']) && isset($_GET['empId'])){

//         if($_GET['actions'] == 'edit'){
//             $action = 'edit';
           
//         }


//         if($_GET['actions'] == 'view'){
//             $action = 'view';

//         }
//         $employeData = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM  $table_name  WHERE id = %d",$empId),ARRAY_A);
//         // print_r($employeData);
//         $response = array(
//             'employeeData' => $employeData,
//             'action' => $action
//         );
        
//         echo json_encode($response);
//         die;

//   }
// }