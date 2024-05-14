jQuery(function () {
    new DataTable('#tbl-employee')
    //Form Validation
    jQuery('#ems-frm-add-empolyee').validate();
});


// jQuery(document).ready(function () {
//     jQuery('#ems-frm-add-empolyee').submit(function (e) {
//         e.preventDefault(); // Prevent the default form submission

//         var pluginUrl = ajaxurl; // Use ajaxurl instead of plugin_data.ajax_url
//         setTimeout(function () {
//             jQuery('#form-container').empty();
//         }, 2000);
//         var name = jQuery.trim(jQuery('#name').val());
//         var email = jQuery.trim(jQuery('#email').val());
//         var phoneNo = jQuery.trim(jQuery('#phoneNo').val());
//         var gender = jQuery('#gender').val();
//         var designation = jQuery.trim(jQuery('#designation').val());

//         if (name === '' || email === '' || phoneNo === '' || gender === '' || designation === '') {
//             // Show error message if any field is blank
//             var errorMessage = '<div class="alert alert-danger" role="alert">Please fill in all fields.</div>';
//             jQuery('#form-container').append(errorMessage); // Append error message to a container
//             return; // Exit the function if validation fails
//         }
//         // Serialize form data
//         var formData = jQuery(this).serialize();

//         // AJAX request
//         jQuery.ajax({
//             url: pluginUrl,
//             type: 'POST',
//             data: {
//                 action: 'custom_form_submit', // Correct action parameter
//                 formData: formData // Send serialized form data
//             },
//             success: function (response) {
//                 var responseData = JSON.parse(response);
//                 console.log(responseData)
//                 if (responseData.message) {
//                     var successMessage = '<div class="alert alert-success" role="alert">' + responseData.message
//                     '</div>';
//                     jQuery('#form-container').append(successMessage); // Prepend success message to a container
//                     jQuery('#ems-frm-add-empolyee')[0].reset();
//                     setTimeout(function () {
//                         jQuery('#form-container').empty();
//                     }, 5000);

//                 } else {
//                     var errorMessage = '<div class="alert alert-danger" role="alert">' + responseData.error

//                     '</div>';
//                     jQuery('#form-container').append(errorMessage); // Prepend success message to a container

//                 }
//             },
//             error: function (xhr, status, error) {
//                 // Handle error
//                 console.error(xhr.responseText);
//                 // You can display an error message or handle errors accordingly
//             }
//         });
//     });
// });

// jQuery(document).ready(function() {
//     // Click event handler for the edit button
//     jQuery('#editButton').click(function() {
//         var id = jQuery(this).data('emp-id');
// alert(id)
//         // AJAX request to fetch data to edit
//         jQuery.ajax({
//             url: 'fetch_data.php',
//             method: 'GET',
//             data: { id: id },
//             success: function(response) {
//                 // Populate the edit form with fetched data
//                 jQuery('#editForm').html(response);
//             },
//             error: function(xhr, status, error) {
//                 console.error(xhr.responseText);
//             }
//         });
//     });

//     // Click event handler for submit button in the edit form
//     jQuery(document).on('click', '#submitEdit', function() {
//         var newData = jQuery('#editData').val();
//         var id = jQuery('#editButton').data('id');

//         // AJAX request to update data
//         jQuery.ajax({
//             url: 'update_data.php',
//             method: 'POST',
//             data: { id: id, newData: newData },
//             success: function(response) {
//                 // Handle success response
//                 console.log(response);
//             },
//             error: function(xhr, status, error) {
//                 console.error(xhr.responseText);
//             }
//         });
//     });
// });




// jQuery(document).ready(function () {
//     // alert("dsfsf")
//     // Attach click event listener to the "Edit" button

//     jQuery('.edit-employee').click(function (e) {

//         function showEditModal(responseData,resdata) {           
//             console.log(resdata)
//             if(resdata == 'view'){
//                 jQuery('h2').text('View Employee');
//                 jQuery('#name').val(responseData.name).prop('readonly', true);
//                 jQuery('#email').val(responseData.email).prop('readonly', true);
//                 jQuery('#phoneNo').val(responseData.phoneNo).prop('readonly', true);
//                 jQuery('#gender').val(responseData.gender).prop('disabled', true);
//                 jQuery('#designation').val(responseData.designation).prop('readonly', true);
//                 jQuery('button[name="btn-submit"]').hide(); // Hide submit button in "view" mode

//             } else {                
//                 jQuery('h2').text('Edit Employee');
//                 jQuery('#name').val(responseData.name).prop('readonly', false);
//                 jQuery('#email').val(responseData.email).prop('readonly', false);
//                 jQuery('#phoneNo').val(responseData.phoneNo).prop('readonly', false);
//                 jQuery('#gender').val(responseData.gender).prop('disabled', false);
//                 jQuery('#designation').val(responseData.designation).prop('readonly', false);
//                 jQuery('button[name="btn-submit"]').show(); // Hide submit button in "view" mode

//             }

//             // Add code to populate other modal fields as needed

//             // Show the modal
//             jQuery('#exampleModalLong').modal('show');
//         }
//         e.preventDefault(); // Prevent the default link behavior
//         var pluginUrl = ajaxurl; // Use ajaxurl instead of plugin_data.ajax_url
//         // jQuery('#editEmployeeModal').modal('show');

//         // Extract the employee ID from the data-emp-id attribute
//         var empId = jQuery(this).data('emp-id');
//         alert(empId)
//         var href = jQuery(this).attr('href');
//         var urlParams = new URLSearchParams(href.split('?')[1]); // Extract query parameters
//         var actions = urlParams.get('action');
//         alert(actions)
//         var actions = urlParams.get('action');
//         // jQuery('.actions').val(actions);
        
    
//         jQuery.ajax({
//             url: pluginUrl, // Use the provided AJAX URL
//             type: 'GET',
//             data: {
//                 action: 'get_employee_data', // Custom AJAX action
//                 empId: empId,// Pass the employee ID
//                 actions: actions
//             },
//             success: function (response) {
                
//                 var responseString = response
//                 var responseData = JSON.parse(responseString);
//                 // console.log(responseData.employeeData);
//                 // console.log(responseData.action);
//                 // var action = responseData.action;
//                 response=responseData.employeeData
//                 resdata = responseData.action
//                 showEditModal(response,resdata);
              
//             },
//             error: function (xhr, status, error) {
//                 // Handle error
//                 console.error(xhr.responseText);
//                 // You can display an error message or handle errors accordingly
//             }
//         });
//     });
// });
// jQuery(document).ready(function(){
//     // Click event listener for the submit button
//     jQuery('button[name="btn-submit"]').click(function(e){
//         e.preventDefault(); // Prevent default form submission
//         alert("update")
//         // Get form data
//         var formData = jQuery('#ems-frm-add-empolyee').serialize();
        
//         // AJAX request to update employee data
//         jQuery.ajax({
//             url: ajaxurl,
//             type: 'POST',
//             data: {
//                 action: 'update_employee_data',
//                 formData: formData
//             },
//             success: function(response){
//                 // Handle success response
//                 console.log(response);
//                 // You can show a success message or perform other actions
//             },
//             error: function(xhr, status, error){
//                 // Handle error
//                 console.error(xhr.responseText);
//                 // You can display an error message or handle errors accordingly
//             }
//         });
//     });
// });
