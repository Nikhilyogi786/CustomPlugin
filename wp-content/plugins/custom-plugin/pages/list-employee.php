<?php

global $wpdb;
$employee = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}ems_form_data", ARRAY_A)

?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1><?php //echo esc_html(get_admin_page_title()); 
                ?></h1>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
                </div>
                <div class="panel-body">
                    <table class="table" id="tbl-employee">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>#Name</th>
                                <th>#Email</th>
                                <th>#Mobile</th>
                                <th>#Gender</th>
                                <th>#Designation</th>
                                <th>#Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($employee) > 0) {
                                foreach ($employee as $employees) {
                                    // print_r($employees);die;
                            ?>
                                    <tr>
                                        <td><?php echo $employees['id'] ?></td>
                                        <td><?php echo $employees['name'] ?></td>
                                        <td><?php echo $employees['email'] ?></td>
                                        <td><?php echo $employees['phoneNo'] ?></td>
                                        <td><?php echo ucfirst($employees['gender']) ?></td>
                                        <td><?php echo $employees['designation'] ?></td>
                                        <td>
                                            <a href="admin.php?page=employee-system&action=edit&empId=<?php echo $employees['id'] ?>" data-emp-id="<?php echo $employees['id'] ?>" class="btn btn-warning edit-employee">Edit</a>
                                            <a href="admin.php?page=list-employee&action=delete&empId=<?php echo $employees['id'] ?>" class="btn btn-danger">Delete</a>
                                            <a href="admin.php?page=employee-system&action=view&empId=<?php echo $employees['id'] ?>" data-emp-id="<?php echo $employees['id'] ?>" class="btn btn-info edit-employee">View</a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "No User Found!";
                            }

                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Popup modal markup -->

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Launch demo modal
</button> -->

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h1><?php //echo esc_html(get_admin_page_title()); 
                ?></h1>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2><?php // echo esc_html(get_admin_page_title()); ?></h2>
                </div>
                <div class="panel-body">
                <div id="form-container">
                    
                </div>

                    <form  id="ems-frm-add-empolyee">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" required class="form-control" id="name" placeholder="Enter name" name="name" value="<?php print_r ($_GET['action'])?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" required class="form-control" id="email" placeholder="Enter email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="phoneNo">Phone NO:</label>
                            <input type="text" required class="form-control" id="phoneNo" placeholder="Enter phone number" name="phoneNo">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <select name="gender" id="gender" required class="form-control">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation:</label>
                            <input type="text" required class="form-control" id="designation" placeholder="Enter your designation" name="designation">
                        </div>
                        <button type="text" class="btn btn-success" name="btn-submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->