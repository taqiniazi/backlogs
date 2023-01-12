function  getSubCategory(catId){
	
	$.ajax({
		async: true,
		type: 'GET',
		url: _base_url + "Risk_Register/getSubCategory/"+catId,
		data: '',
		cache: false,
		processData: false,
		contentType: false,
		success: function (data) {
			$("#risk_register_subcategy_id").html(data);
			
		},
		error: function (req, status, err) {
			console.log(status);
			console.log(err);
			
		}
	})
	
}

function delete_record(url){
    $('#delete_record_modal').modal('show');    
    $('.delete_record-btn').attr('href', url);
}


$(document).ready(function () {
        $('#risk_register_datatable1').DataTable({
            ordering: false,
            "processing": true,
            stateSave: true,
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ]
        });
});


$(() => {
  
   
    $("#add-risk-form").validate({
        rules: {
            project_name: {
                required: true,
            },
			project_manager_id: {
                required: true,
            },
			risk_register_category_id: {
                required: true,
            },
			risk_register_subcategy_id: {
                required: true,
            },
			date_raised: {
                required: true,
            },
			likelihood_id: {
                required: true,
            },
			Impact_id: {
                required: true,
            },
			
			severity_id: {
                required: true,
            },
			
			mitigating_actions: {
                required: true,
            },
			
			date_closed: {
                required: true,
            },
			
			status: {
                required: true,
            },
			risk_description: {
                required: true,
            },
			
        },
        messages: {
            first_name: "Please enter a name",
            nhs_number: {
                required: "Please enter the NHS Number",
                rangelength: "Please enter a valid NHS Number"
            },
            dob: "Please enter date of birth",
            email: {
                email: "Please provide a valid email",
                required: "Please provide an email",
                remote: "Patient already exists"
            }
        },
        submitHandler: function (form) {
			
			form.submit();
			
           /* var form_data = new FormData(form);
            console.log("Submitting form");
            $.ajax({
                async: true,
                type: 'POST',
                url: _base_url + "Risk_Register/add_risk_register",
                data: form_data,
                cache: false,
                processData: false,
                contentType: false,
                success: function (data) {
					var dataParse = JSON.parse(data);
					if(dataParse.type=='success'){
						 $('#notification-message').removeClass('alert-danger');
						 $('#notification-message').addClass('alert-success');							
						 $("#notification-message").html(dataParse.msg);
						
						//document.location = "Document_List/document_information/"+dataParse.lastId;

						//location.reload();
						
						
						location.reload();
						//console.log(dataParse.type);
						//$("#add_patient").modal('hide');
					}else{
						 $('#notification-message').removeClass('alert-success');
						 $('#notification-message').addClass('alert-danger');
	
						$("#notification-message").html(dataParse.msg);
					}
                   
                    //$("#add_patient").modal('hide');
					//location.reload();
                    //console.log("Form submitted");
                    //TODO: Update dataTable
                },
                error: function (req, status, err) {
                    console.log(status);
                    console.log(err);
                    $("#add_patient").modal('hide');
                }
            })*/
        }
    });
});