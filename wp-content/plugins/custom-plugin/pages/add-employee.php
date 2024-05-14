<?php
global $wpdb;
$empId = $_GET['empId'];
$table_name = $wpdb->prefix . 'ems_form_data';



if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btn_submit'])) {
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_text_field($_POST['email']);
    $phoneNo = sanitize_text_field($_POST['phoneNo']);
    $gender = sanitize_text_field($_POST['gender']);
    $designation = sanitize_text_field($_POST['designation']);

// Fetch existing data from the database
// $existing_data = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$table_name} WHERE id = %d", $empId), ARRAY_A);
// print_r($_GET);die;
if (isset($_GET['action'])) {
    // echo "yha mil gya";die;
    // Update data if edit parameter is set
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phoneNo = $_POST['phoneNo'];
    $gender = $_POST['gender'];
    $designation = $_POST['designation'];

    $wpdb->update($table_name, array(
        'name' => $name,
        'email' => $email,
        'phoneNo' => $phoneNo,
        'gender' => $gender,
        'designation' => $designation
    ), array(
        'id' => $empId
    ));

    $message = "Updated successfully!";
    $status = "1";
} else {
//   die("fdfdsf");
    $table_name = $wpdb->prefix . 'ems_form_data';

    $wpdb->insert(
        $table_name,
        array(
            'name' => $name,
            'email' => $email,
            'phoneNo' => $phoneNo,
            'gender' => $gender,
            'designation' => $designation
        ),
    );
    $message = "Added Empolyee!";
    $status = "1";
}
}
if (isset($_GET['action']) && isset($_GET['empId'])) {

    if ($_GET['action'] == 'edit') {
        $action = 'edit';
    }


    if ($_GET['action'] == 'view') {
        $action = 'view';
    }
    $employeData = $wpdb->get_row($wpdb->prepare("SELECT * FROM  $table_name  WHERE id = %d", $empId), ARRAY_A);
    // print_r($employeData);
    //   $response = array(
    //       'employeeData' => $employeData,
    //       'action' => $action
    //   );

    //   echo json_encode($response);
    print_r($employeData);
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h1><?php //echo esc_html(get_admin_page_title()); 
                ?></h1>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2><?php if ($action == 'view') {
                            echo "View Employee";
                        } elseif ($action == 'edit') {
                            echo "Update Employee";
                        } else {
                            echo "Add Employee";
                        } ?></h2>
                </div>
                <div class="panel-body">
                    <div id="form-container">

                    </div>

                    <form  action='<?php if ($action == "edit") {
                                                    echo "admin.php?page=employee-system&action=edit&empId=" . $empId;
                                                } else {
                                                    echo "admin.php?page=employee-system";
                                                }
                                                ?>' id="ems-frm-add-empolyeess" method="post">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" required <?php if ($action == 'view') {
                                                            echo "readonly= 'readonly'";
                                                        } ?> class="form-control" id="name" placeholder="Enter name" name="name" value="<?php if ($action == 'view' || $action == 'edit') {
                                                                                                                                                                                                    echo $employeData['name'];
                                                                                                                                                                                                } ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" required <?php if ($action == 'view') {
                                                                echo "readonly= 'readonly'";
                                                            } ?> class="form-control" id="email" placeholder="Enter email" name="email" value="<?php if ($action == 'view' || $action == 'edit') {
                                                                                                                                                                                                        echo $employeData['email'];
                                                                                                                                                                                                    } ?>">
                        </div>
                        <div class="form-group">
                            <label for="phoneNo">Phone NO:</label>
                            <input type="text" required <?php if ($action == 'view') {
                                                            echo "readonly= 'readonly'";
                                                        } ?> class="form-control" id="phoneNo" placeholder="Enter phone number" name="phoneNo" value="<?php if ($action == 'view' || $action == 'edit') {
                                                                                                                                                                                                                    echo $employeData['phoneNo'];
                                                                                                                                                                                                                } ?>">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <select name="gender" id="gender" <?php if ($action == 'view') {
                                                                    echo "disabled";
                                                                } ?> required class="form-control">
                                <option value="">Select Gender</option>
                                <option value="male" <?php if (($action == 'view' || $action == 'edit') && $employeData['gender'] == 'male') echo 'selected'; ?>>Male</option>
                                <option value="female" <?php if (($action == 'view' || $action == 'edit') && $employeData['gender'] == 'female') echo 'selected'; ?>>Female</option>
                                <option value="other" <?php if (($action == 'view' || $action == 'edit') && $employeData['gender'] == 'other') echo 'selected'; ?>>Other</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="designation">Designation:</label>
                            <input type="text" required <?php if ($action == 'view') {
                                                            echo "readonly= 'readonly'";
                                                        } ?> class="form-control" id="designation" placeholder="Enter your designation" name="designation" value="<?php if ($action == 'view' || $action == 'edit') {
                                                                                                                                                                                                                                echo $employeData['designation'];
                                                                                                                                                                                                                            } ?>">
                        </div>
                        <?php if ($action == 'view') {
                            //No Button
                        } elseif ($action == 'edit') {
                        ?>
                            <button type="text" class="btn btn-success" name="btn_submit">Update</button>
                        <?php
                        } else {
                        ?>
                            <button type="text" class="btn btn-success" name="btn_submit">Submit</button>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>