<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo esc_html(get_admin_page_title()); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo EMS_PLUGIN_URL ?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo EMS_PLUGIN_URL ?>css/dataTables.dataTables.min.css">
</head>

<body>

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
                        <tr>
                            <td>1</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                            <td>8005603512</td>
                            <td>Male</td>
                            <td>Php Developers</td>
                            <td>
                                <a href="#" class="btn btn-warning">Edit</a>
                                <a href="#" class="btn btn-danger">View</a>
                                <a href="#" class="btn btn-info">Edit</a>
                            </td>
                        </tr>                       
                    </tbody>
                </table>
            </div>
        </div>

        </div>

       </div>

    </div>
    <script src="<?php echo EMS_PLUGIN_URL ?>js/jquery.min.js"></script>
    <script src="<?php echo EMS_PLUGIN_URL ?>js/bootstrap.min.js"></script>
    <script src="<?php echo EMS_PLUGIN_URL ?>js/dataTables.min.js"></script>
    <script>
        $(function(){
            new DataTable('#tbl-employee')
        });
    </script>
</body>

</html>