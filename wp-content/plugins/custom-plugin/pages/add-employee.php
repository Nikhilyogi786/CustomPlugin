<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h1><?php //echo esc_html(get_admin_page_title()); 
                ?></h1>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>
                </div>
                <div class="panel-body">
                <div id="form-container">
                    
                </div>

                    <form  id="ems-frm-add-empolyee">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" required class="form-control" id="name" placeholder="Enter name" name="name">
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
