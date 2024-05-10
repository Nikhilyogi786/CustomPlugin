jQuery(function () {
    new DataTable('#tbl-employee')
    //Form Validation
    jQuery('#ems-frm-add-empolyee').validate();
});


jQuery(document).ready(function () {
    jQuery('#ems-frm-add-empolyee').submit(function (e) {
        e.preventDefault(); // Prevent the default form submission

        var pluginUrl = ajaxurl; // Use ajaxurl instead of plugin_data.ajax_url
        setTimeout(function () {
            jQuery('#form-container').empty();
        }, 2000);
        var name = jQuery.trim(jQuery('#name').val());
        var email = jQuery.trim(jQuery('#email').val());
        var phoneNo = jQuery.trim(jQuery('#phoneNo').val());
        var gender = jQuery('#gender').val();
        var designation = jQuery.trim(jQuery('#designation').val());

        if (name === '' || email === '' || phoneNo === '' || gender === '' || designation === '') {
            // Show error message if any field is blank
            var errorMessage = '<div class="alert alert-danger" role="alert">Please fill in all fields.</div>';
            jQuery('#form-container').append(errorMessage); // Append error message to a container
            return; // Exit the function if validation fails
        }
        // Serialize form data
        var formData = jQuery(this).serialize();

        // AJAX request
        jQuery.ajax({
            url: pluginUrl,
            type: 'POST',
            data: {
                action: 'custom_form_submit', // Correct action parameter
                formData: formData // Send serialized form data
            },
            success: function (response) {
                var responseData = JSON.parse(response);
                console.log(responseData)
                if (responseData.message) {
                    var successMessage = '<div class="alert alert-success" role="alert">' + responseData.message
                    '</div>';
                    jQuery('#form-container').append(successMessage); // Prepend success message to a container
                    jQuery('#ems-frm-add-empolyee')[0].reset();
                    setTimeout(function () {
                        jQuery('#form-container').empty();
                    }, 5000);

                } else {
                    var errorMessage = '<div class="alert alert-danger" role="alert">' + responseData.error

                    '</div>';
                    jQuery('#form-container').append(errorMessage); // Prepend success message to a container

                }
            },
            error: function (xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
                // You can display an error message or handle errors accordingly
            }
        });
    });
});
