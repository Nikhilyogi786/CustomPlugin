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
                    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>
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
                                            <a href="#" class="btn btn-warning">View</a>
                                            <a href="#" class="btn btn-danger">Delete</a>
                                            <a href="#" class="btn btn-info">Edit</a>
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