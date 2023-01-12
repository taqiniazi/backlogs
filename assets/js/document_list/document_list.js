function  getSubCategory(catId){
	
	$.ajax({
		async: true,
		type: 'GET',
		url: _base_url + "Document_List/getSubCategory/"+catId,
		data: '',
		cache: false,
		processData: false,
		contentType: false,
		success: function (data) {
            $("#document_subcategy_id-input").show();
            if(data.length > 0) $("#document_subcategy_id-input").html(data);
            else $("#document_subcategy_id-input").hide();
			
		},
		error: function (req, status, err) {
			console.log(status);
			console.log(err);
			$("#add_patient").modal('hide');
		}
	})
	
}

function get_weekly_timesheet(week) {
    var tr = '<tr><td colspan="5" class="text-center"> No Reuqest found.</td></tr>';
    var user_id = $('#pathologist').val();
    var fdate = localStorage.getItem('fdate')
    var tdate = localStorage.getItem('tdate')
    if (week == -1) {
        var tdate = fdate;
        var fdate = new Date(fdate);
        fdate.setDate(fdate.getDate() - 7);
        var fdate = fdate.getFullYear() + "-" + (fdate.getMonth() + 1) + "-" + fdate.getDate();
    } else if (week == 1) {
        var fdate = tdate;
        var tdate = new Date(tdate);
        tdate.setDate(tdate.getDate() + 7);
        var tdate = tdate.getFullYear() + "-" + (tdate.getMonth() + 1) + "-" + tdate.getDate();
    
	 } else if (week == 2) {
        var fdate = $('#s_date').val();
        var tdate = new Date($('#s_date').val());
        tdate.setDate(tdate.getDate() + 7);
        var tdate = tdate.getFullYear() + "-" + (tdate.getMonth() + 1) + "-" + tdate.getDate();
    }

    if($('#s_date').val() == '' && $('#e_date').val() == ''){
        $('#s_date').val(fdate);
        $('#e_date').val(tdate);
    }

    // $('#start_day').html(fdate);
    // $('#end_day').html(tdate);
    localStorage.setItem('fdate', fdate);
    localStorage.setItem('tdate', tdate);
    $.ajax({
        url: `${_base_url}Document_List/get_weekly_timesheet`,
        type: 'post',
        dataType: 'json',
        data: {
            'user_id': user_id,
            'fdate': fdate,
            'tdate': tdate,
            [csrf_name]: csrf_hash
        },
        success: function(response) {
            $('#start_day').html(response.first_date);

            var new_date = response.first_date.split('-');
            var next_date = new_date[2]+'-'+new_date[1]+'-'+new_date[0];
            var n = new Date(next_date);
               
            const monthNames = ["Jan", "Feb", "Mar", "April", "May", "June","July", "Aug", "Sep", "Oct", "Nov", "Dec"];
            $(".show_date").each(function(key ,val) {
                var ud = monthNames[n.getMonth()] +'  '+ n.getUTCDate();
                $(this).text('('+ud+')');
                n.setDate(n.getDate() + 1);
            });
            const fullMonthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
            $(".change_month").text(fullMonthNames[n.getMonth()] +'  '+ n.getFullYear());

            
            $('#end_day').html(response.last_date);
            $('#timesheet_body').html(response.html)
        },
        error: function() {
            $('#timesheet_body').html('')
        }
    });
}

// Weekly timesheet new

function get_weekly_timesheet_new(week) {
    var tr = '<tr><td colspan="5" class="text-center"> No Reqest found.</td></tr>';
    var user_id = $('#pathologist').val();
    var fdate = localStorage.getItem('fdate')
    var tdate = localStorage.getItem('tdate')
    if (week == -1) {
        var tdate = fdate;
        var fdate = new Date(fdate);
        fdate.setDate(fdate.getDate() - 7);
        var fdate = fdate.getFullYear() + "-" + (fdate.getMonth() + 1) + "-" + fdate.getDate();
    } else if (week == 1) {
        var fdate = tdate;
        var tdate = new Date(tdate);
        tdate.setDate(tdate.getDate() + 7);
        var tdate = tdate.getFullYear() + "-" + (tdate.getMonth() + 1) + "-" + tdate.getDate();
    
	 } else if (week == 2) {
        var fdate = $('#s_date').val();
        var tdate = new Date($('#s_date').val());
        tdate.setDate(tdate.getDate() + 7);
        var tdate = tdate.getFullYear() + "-" + (tdate.getMonth() + 1) + "-" + tdate.getDate();
    }

    if($('#s_date').val() == '' && $('#e_date').val() == ''){
        $('#s_date').val(fdate);
        $('#e_date').val(tdate);
    }

    // $('#start_day').html(fdate);
    // $('#end_day').html(tdate);
    localStorage.setItem('fdate', fdate);
    localStorage.setItem('tdate', tdate);
    $.ajax({
        url: `${_base_url}Document_List/get_weekly_timesheet_new`,
        type: 'post',
        dataType: 'json',
        data: {
            'user_id': user_id,
            'fdate': fdate,
            'tdate': tdate,
            [csrf_name]: csrf_hash
        },
        success: function(response) {
            $('#start_day').html(response.first_date);

            var new_date = response.first_date.split('-');
            var next_date = new_date[2]+'-'+new_date[1]+'-'+new_date[0];
            var n = new Date(next_date);
               
            const monthNames = ["Jan", "Feb", "Mar", "April", "May", "June","July", "Aug", "Sep", "Oct", "Nov", "Dec"];
            $(".show_date").each(function(key ,val) {
                var ud = monthNames[n.getMonth()] +'  '+ n.getUTCDate();
                $(this).text('('+ud+')');
                n.setDate(n.getDate() + 1);
            });
            const fullMonthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
            $(".change_month").text(fullMonthNames[n.getMonth()] +'  '+ n.getFullYear());

            
            $('#end_day').html(response.last_date);
            $('#timesheet_body_new').html(response.html)
        },
        error: function() {
            $('#timesheet_body_new').html('')
        }
    });
}


// Monthly Stainer Code
function monthly_stainer_checklist(week) {
    var tr = '<tr><td colspan="5" class="text-center"> No Reuqest found.</td></tr>';
    var user_id = $('#pathologist').val();
    var fdate = localStorage.getItem('fdate')
    var tdate = localStorage.getItem('tdate')
    if (week == -1) {
        var tdate = fdate;
        var fdate = new Date(fdate);
        fdate.setDate(fdate.getDate() - 7);
        var fdate = fdate.getFullYear() + "-" + (fdate.getMonth() + 1) + "-" + fdate.getDate();
    } else if (week == 1) {
        var fdate = tdate;
        var tdate = new Date(tdate);
        tdate.setDate(tdate.getDate() + 7);
        var tdate = tdate.getFullYear() + "-" + (tdate.getMonth() + 1) + "-" + tdate.getDate();
    }

    // $('#start_day').html(fdate);
    // $('#end_day').html(tdate);
    localStorage.setItem('fdate', fdate);
    localStorage.setItem('tdate', tdate);
    $.ajax({
        url: `${_base_url}Document_List/monthly_stainer_checklist`,
        type: 'post',
        dataType: 'json',
        data: {
            'user_id': user_id,
            'fdate': fdate,
            'tdate': tdate,
            [csrf_name]: csrf_hash
        },
        success: function(response) {
            $('#start_day').html(response.first_date);

            var new_date = response.first_date.split('-');
            var next_date = new_date[2]+'-'+new_date[1]+'-'+new_date[0];
            var n = new Date(next_date);
               
            const monthNames = ["Jan", "Feb", "Mar", "April", "May", "June","July", "Aug", "Sep", "Oct", "Nov", "Dec"];
            $(".show_date").each(function(key ,val) {
                var ud = monthNames[n.getMonth()] +'  '+ n.getUTCDate();
                $(this).text('('+ud+')');
                n.setDate(n.getDate() + 1);
            });
            const fullMonthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
            $(".change_month").text(fullMonthNames[n.getMonth()] +'  '+ n.getFullYear());

            
            $('#end_day').html(response.last_date);
            $('#monthly_timesheet_body').html(response.html)
        },
        error: function() {
            $('#monthly_timesheet_body').html('')
        }
    });
}

function submit_delete_form(){
    $('#delete_pt_frm').submit();
}

function delete_document(url){ 
    $('#delete_patient_modal').modal('show');        
    if(url=='bulk_delete'){
        //multiple record delete
        $('.patient-delete-btn').attr('href', 'javascript:submit_delete_form()');        
    } else{
        //single record delete
        $('.patient-delete-btn').attr('href', url);
    }
    
}



function active_document(url){ 
    $('#active_modal').modal('show');
    $('.active-btn').attr('href', url);
    
}

function inactive_document(url){ 
    $('#inactive_modal').modal('show');
    $('.inactive-btn').attr('href', url);
    
}

function publish_document(url){ 
    $('#publish_modal').modal('show');
    $('.publish-btn').attr('href', url);
    
}




function delete_record(url){ 
    $('#delete_record_modal').modal('show');        
    
   $('.delete_record-btn').attr('href', url);
    
    
}



function delete_document_shared(url){ 
    $('#delete_patient_modal').modal('show');        
    if(url=='bulk_delete'){
        //multiple record delete
        $('.patient-delete-btn').attr('href', 'javascript:submit_delete_form()');        
    } else{
        //single record delete
        $('.patient-delete-btn').attr('href', url);
    }
    
}

function document_comments(document_id){	
	$("#document_id").val(document_id);
	$('#comments_modal').modal('show');
	
}

function commentStatus(did,statu){
	
	$.ajax({
		async: true,
		type: 'GET',
		url: _base_url + "Document_List/updateCommetsStatus/"+did+"/"+statu,
		data: '',
		cache: false,
		processData: false,
		contentType: false,
		success: function (data) {
			
			
			
		},
		error: function (req, status, err) {
			console.log(status);
			console.log(err);
			
		}
	})
	
	
}





function share_document(id){ 
 
   
	$.ajax({
		async: true,
		type: 'GET',
		url: _base_url + "Document_List/getUsersByDocumentIdByAjax/"+id,
		data: '',
		cache: false,
		processData: false,
		contentType: false,
		success: function (data) {
			
			$("#document_id").val(id);
			$("#add_user").html(data);
			$('#share_document').modal('show'); 
			
			
		},
		error: function (req, status, err) {
			
		}
	})

	
}


function showImage(src, target) {
    var fr = new FileReader();
    // when image is loaded, set the src of the image where you want to display it
    fr.onload = function (e) {
        target.src = this.result;
    };
    src.addEventListener("change", function () {
        // fill fr with image data    
        fr.readAsDataURL(src.files[0]);
    });
}


function document_shared_view(file_name){
   	
	$.ajax({
		async: true,
		type: 'GET',
		url: _base_url + "pdf/Document/index/"+file_name,
		data: '',
		cache: false,
		processData: false,
		contentType: false,
		success: function (data) {
			$('#view_doc').modal('show'); //#toolbar=0'
			var embed_div = document.getElementById('doc_embed');
			embed_div.innerHTML="";
			embed_div.innerHTML = "<embed src='"+data+"' name='embeded_doc' type='application/pdf' frameborder='0' width='100%' height='400px'>";
			
			
		},
		error: function (req, status, err) {
			console.log(status);
			console.log(err);
			$("#add_patient").modal('hide');
		}
	})
	
	
}

function document_shared_view_pdf(file_name){

	$.ajax({
		async: true,
		type: 'GET',
		url: _base_url + "Document_List/view_pdf/"+file_name,
		data: '',
		cache: false,
		processData: false,
		contentType: false,
		success: function (data) {
            if(data == 0) alert("Please Upload a PDF in this document");
            else {
                $('#view_doc').modal('show'); //#toolbar=0'
                var embed_div = document.getElementById('doc_embed');
                embed_div.innerHTML="";
                embed_div.innerHTML = "<embed src='"+data+"' name='embeded_doc' type='application/pdf' frameborder='0' width='100%' height='400px'>";

            }


		},
		error: function (req, status, err) {
			console.log(status);
			console.log(err);
			$("#add_patient").modal('hide');
		}
	})


}

function document_shared_download(file_name){
  
	
	$.ajax({
		async: true,
		type: 'GET',
		url: _base_url + "pdf/Document/viewPdf/"+file_name,
		data: '',
		cache: false,
		processData: false,
		contentType: false,
		success: function (data) {
		
			var link = document.createElement('a');
			link.href = data;
			link.download = "file_" + new Date() + ".pdf";
			link.click();
			link.remove();
			
			
			
		},
		error: function (req, status, err) {
			console.log(status);
			console.log(err);
			$("#add_patient").modal('hide');
		}
	})
	
	
}

function formatAMPM(date) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = hours + ':' + minutes + ' ' + ampm;
    return strTime;
  }


$(() => {
    var countries_suggestions = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: {
            url: 'https://raw.githubusercontent.com/twitter/typeahead.js/gh-pages/data/countries.json',
            transform: function (data) { // we modify the prefetch response
                var newData = []; // here to match the response format 
                data.forEach(function (item) { // of the remote endpoint
                    newData.push({
                        'name': item
                    });
                });
                return newData;
            }
        },
        identify: function (response) {
            if (response == null) return '';
            return response.name;
        }
    });


    var d = new Date();
        var tdate = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();
        oneWeekAgo = d.setDate(d.getDate() - 7);
        myDate = new Date(oneWeekAgo);
        var fdate = myDate.getFullYear() + "-" + (myDate.getMonth() + 1) + "-" + myDate.getDate();
        localStorage.setItem('fdate', fdate);
        localStorage.setItem('tdate', tdate);
        get_weekly_timesheet(0);
		get_weekly_timesheet_new(0);
        monthly_stainer_checklist(0);


 $(document).on('change', '.timesheet_input_new', function() {

            if($(this).val() != '') $(this).next().next().addClass('icon_active');
            else $(this).next().next().removeClass('icon_active');

            $(this).next('img').show();
            $('#update_timesheet_new').submit();
        });

        $(document).on('change', '.timesheet_input', function() {
			
			if($(this).val() != '') $(this).next().next().addClass('icon_active');
            else $(this).next().next().removeClass('icon_active');
			
            $(this).next('img').show();
            $('#update_timesheet').submit();
            $("#monthly_stainer_checklist").submit();
        });

        $(document).on('click', '.update_time', function() {
            var class_name = $(this).data('get_class');

            var currentdate = new Date(); 
            var datetime = currentdate.getDate() + "-"
                + (currentdate.getMonth()+1)  + "-" 
                + currentdate.getFullYear() + " "  
                + currentdate.getHours() + ":"  
                + currentdate.getMinutes();

            var selectedTime = formatAMPM(currentdate);
           // $("input[name='"+class_name+"']") .val(datetime);
            //$("input[name='"+class_name+"']") .val(selectedTime);
			$("input[name='"+class_name+"']") .val(selectedTime+"-"+user_id);
			$("input[name='dis_"+class_name+"']") .val(selectedTime);
            $("input[name='actual_"+class_name+"']") .val(datetime);
            $("input[name='"+class_name+"']").next('img').show();
			
            $('#update_timesheet').submit();
			 $('#update_timesheet_new').submit();
			 
			  // Change icon color
            if($(this).parent().find('.timesheet_input_new').val() != '') $(this).addClass('icon_active');
            else $(this).removeClass('icon_active');
        });
		
		
		 $(document).on('submit', '#update_timesheet_new', function(e) {
            e.preventDefault();
            var _this = $(this);
            var form_data = _this.serialize();
            $.ajax({
                url: _base_url + '/Document_List/update_weekly_timesheetData_new',
                type: "POST",
                global: false,
                dataType: "json",
                data: form_data,
                success: function(data) {
                    jQuery.sticky(data.message, {classList: 'success', speed: 200, autoclose: 5000});
                },
                error: function (err) {
                    jQuery.sticky('Something went wrong.', {classList: 'important', speed: 200, autoclose: 7000});
                }
            });
        })

        $(document).on('submit', '#update_timesheet', function(e) {
            e.preventDefault();
            var _this = $(this);
            var form_data = _this.serialize();
            $.ajax({
                url: _base_url + '/Document_List/update_weekly_timesheetData',
                type: "POST",
                global: false,
                dataType: "json",
                data: form_data,
                success: function(data) {
                    jQuery.sticky(data.message, {classList: 'success', speed: 200, autoclose: 5000});
                },
                error: function (err) {
                    jQuery.sticky('Something went wrong.', {classList: 'important', speed: 200, autoclose: 7000});
                }
            });
        })

        $(document).on('click', '.update_time_stainer', function() {
            var class_name = $(this).data('get_class');
        
            var currentdate = new Date(); 
            var datetime = currentdate.getDate() + "-"
                + (currentdate.getMonth()+1)  + "-" 
                + currentdate.getFullYear() + " "  
                + currentdate.getHours() + ":"  
                + currentdate.getMinutes() + ":" 
                + currentdate.getSeconds();
            $(this).closest('.first').find('.avatar').show();
            $(this).closest('.first').find('.timesheet_input').val(datetime);
            $("#monthly_stainer_checklist").submit();
        });

        $(document).on('submit', '#monthly_stainer_checklist', function(e) {
            e.preventDefault();
            var _this = $(this);
            var form_data = _this.serialize();
            $.ajax({
                url: _base_url + '/Document_List/update_monthaly_stainer_checklist',
                type: "POST",
                global: false,
                dataType: "json",
                data: form_data,
                success: function(data) {
                    jQuery.sticky(data.message, {classList: 'success', speed: 200, autoclose: 5000});
                },
                error: function (err) {
                    jQuery.sticky('Something went wrong.', {classList: 'important', speed: 200, autoclose: 7000});
                }
            });
        })

    $('#country-input').typeahead({
        minLength: 2,
        highlight: true
    }, {
        name: 'countries',
        source: countries_suggestions, // suggestion engine is passed as the source
        display: function (item) { // display: 'name' will also work
            return item.name;
        },
        limit: 5,
        templates: {
            suggestion: function (item) {
                return '<div class="country-suggestion">' + item.name + '</div>';
            }
        }
    });
	
    $("#add-document-form").validate({
        rules: {
            document_number: {
                required: true,
            },
			document_title: {
                required: true,
            },
			document_category_id: {
                required: true,
            },
			date_of_1_issue: {
                required: true,
            },
			date_of_current_issue: {
                required: true,
            },
			live_revision_number: {
                required: true,
            },
			status: {
                required: true,
            },
			
			location: {
                required: true,
            },
			
			interval_months: {
                required: true,
            },
			
			revised_review_date: {
                required: true,
            },
			
			obsolete_document_owner: {
                required: true,
            },
			issued_to: {
                required: true,
            },
			
			documents: {
                required: true,
            },
			footer: {
                required: true,
            },
			disclaimer: {
                required: true,
            },
			content: {
                required: true,
            },
			
			
         /*   nhs_number: {
                required: false,
                rangelength: [10, 10],
                remote: {
                    url: "patient/unique_nhs",
                    type: "get",
                    data: {
                        nhs_number: function () {
                            return $("#nhs-number-input").val();
                        },
                        group_id: function () {
                            return $(`#group-input`).val();
                        }
                    }
                }
            },
            dob: {
                required: true,
                date: true
            },
            email: {
                email: true,
                required: false,
                remote: {
                    url: "patient/unique_email",
                    type: "get",
                    data: {
                        email: function () {
                            return $("#email-input").val();
                        },
                        group_id: function () {
                            return $(`#group-input`).val();
                        }
                    }
                }
            },*/

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
			
            /*var form_data = new FormData(form);
            console.log("Submitting form");
            $.ajax({
                async: true,
                type: 'POST',
                url: _base_url + "Document_List/add_document",
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
						
						document.location = "Document_List/document_information/"+dataParse.lastId;

						//location.reload();
						
						
						//location.reload();
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
	
	
	
	
	    $("#share-document-form").validate({
        rules: {
            to_user_id: {
                required: true,
            },
			
        },
        messages: {
            userId: "Please enter a user",
            
        },
        submitHandler: function (form) {
            var form_data = new FormData(form);
            console.log("Submitting form");
            $.ajax({
                async: true,
                type: 'POST',
                url: _base_url + "Document_List/share_document",
                data: form_data,
                cache: false,
                processData: false,
                contentType: false,
                success: function (data) {
					var dataParse = JSON.parse(data);
					if(dataParse.type=='success'){
						$('#notification-message1').show();
						 $('#notification-message1').removeClass('alert-danger');
						 $('#notification-message1').addClass('alert-success');							
						 $("#notification-message1").html(dataParse.msg);
						  setTimeout(function (){
							$('.notification1').hide(9000);
							
						}, 5000);
										
						
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
            })
        }
    });
	
	
	
	
	
	$("#comments-send-form").validate({
        rules: {
            comments: {
                required: true,
            },
			
        },
        messages: {
            comments: "Please enter a comments",
            
        },
        submitHandler: function (form) {
            var form_data = new FormData(form);
            console.log("Submitting form");
            $.ajax({
                async: true,
                type: 'POST',
                url: _base_url + "Document_List/comments_send",
                data: form_data,
                cache: false,
                processData: false,
                contentType: false,
                success: function (data) {
					var dataParse = JSON.parse(data);
					if(dataParse.type=='success'){
						$('#notification-message1').show();
						 $('#notification-message1').removeClass('alert-danger');
						 $('#notification-message1').addClass('alert-success');							
						 $("#notification-message1").html(dataParse.msg);
						  setTimeout(function (){
							$('.notification1').hide(9000);
							
						}, 5000);
										
						
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
            })
        }
    });
	
	
	
	
	

   

    $("select#group-input").select2({
        width: "100%"
    });


    $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var hospital = data[3];
            var current_hospital = $(".hospital-info-active").attr('data-original-title');

            if (typeof current_hospital === 'undefined' || current_hospital === null || current_hospital.length === 0) {
                return true;
            } else {
                if (current_hospital == hospital) {
                    return true;
                }
                return false;
            }
        }

    ); 
	//table.ajax.reload();
    // $('#document-list-table thead tr')
    //     .clone(true)
    //     .addClass('filters')
    //     .appendTo('#document-list-table thead');
    var pt = $("#document-list-table").DataTable({
        "ajax": {
            "url": _base_url + "Document_List/get_document_list/"+searchtype,
            "dataSrc": 'data'
        },
		
		"createdRow": function( row, data, dataIndex ) {
			console.log(data.id);
			if ( data.rowClss == "row_red" ) {       
				$(row).addClass('row_red');
			}
			
			if ( data.rowClss == "row_orange" ) {       
				$(row).addClass('row_orange');
			}
			
			if ( data.rowClss == "row_green" ) {       
				$(row).addClass('row_green');
			}
			
			
			
		},
    
        "processing": true,
        "autoWidth": false,
        "ordering": true,
        initComplete: function () {
            var api = this.api();
 
            // For each column
            api
                .columns()
                .eq(0)
                .each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" class="form-control" placeholder="' + title + '" />');
 
                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                          
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();
 
                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();
 
                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
        },
        "columns": [
           /* {
                data: '',
                render: function (data, type, row, meta) {                                        
                    var check_box = '-';
                    if(row.Rcount == 0){                        
                        var check_box = '<input type="checkbox" name="patient_id[]" class="pt_check_box" value="'+row.id+'" >';
                    }
                    return check_box;
                }
            },
            {
                data: 'id'
            },*/
            {
                data: 'document_number'
            },
            /*{
                data: 'document_title'
            },*/
            {
                data: '',
                render: function (data, type, row, meta) {                                        
                    var img = '-';
                                           
                        var img = '<img style="border-radius: 50%;" width="30" height="30" src="'+row.document_owner+'" >';
                    
                    return img;
                }
            },
            {
                data: 'document_category'
            },
			{
                data: 'document_subcategory'
            },
            {
                data: 'date_of_1_issue'
            },
			{
                data: 'date_of_current_issue'
            },
			
			
			{
                data: 'live_revision_number'
            },
			{
                data: 'status'
            },
			{
                data: 'location'
            },
			{
                data: 'type'
            },
			{
                data: 'interval_months'
            },
			{
                data: 'viewCout',
				 render: function (data, type, row, meta) { 
					var view_count = `<a class=""  href="${_base_url}/Document_List/document_viewer/${row.id}">${row.viewCout}</a>`;
					 return view_count;
				 }
				
				
            },
			{
                data: 'date_of_next_review'
            },
			
			
            {
                data: 'id',
                render: function (data, type, row, meta) {                    
                     var delete_icon = '';
					 var pdf_icon = '';
					 var share_icon = '';
					 var list_icon = '';
					 var activeInactive = '';
					 var publish ='';
                    if(row.Rcount == 0){
                        
						
						//pdf_icon = `<a class="" target="_new" href="${_base_url}pdf/Document/index/${data}"><i class="fa fa-file-pdf-o m-r-5"></i></a>`;
						
						pdf_icon = `<a class="" href="javascript:javascript:document_shared_view_pdf(\'${data}\')"><i class="fa fa-file-pdf-o m-r-5"></i></a>`;	
						

						
						share_icon = `<a class="" href="javascript:share_document(\'${data}\')"><i class="fa fa-share-square-o m-r-5"></i></a>`;
						
						list_icon =`<a class="" href="${_base_url}Document_List/document_revision/${data}"><i class="fa fa-list-alt m-r-5"></i></a>`;
						
                        if (row.document_published == 0) {
                            // Show delete icon
                            delete_icon = `<a class="" href="javascript:delete_document(\'${_base_url}Document_List/view/${data}/delete\')"><i class="fa fa-trash-o m-r-5"></i></a>`;
                        }
                        else {
                            delete_icon = '';
                        }
				        delete_icon = `<a class="" href="javascript:delete_document(\'${_base_url}Document_List/view/${data}/delete\')"><i class="fa fa-trash-o m-r-5"></i></a>`;

						//activeInactive=`<input type="checkbox" checked  data-toggle="toggle" data-on="Active" data-off="InActive">`;
						if(row.document_status==1){
							activeInactive=`<a  title="Active" class="" href="javascript:inactive_document(\'${_base_url}Document_List/statusChange/${data}/0\')"><i class="fa fa-toggle-on m-r-5"></i></a>`;
						}else{
							activeInactive=`<a  title="Inactive" class="" href="javascript:active_document(\'${_base_url}Document_List/statusChange/${data}/1\')"><i class="fa fa-toggle-off m-r-5"></i></a>`;						
						}
						
						publish =`<a  title="Publish" class="" href="javascript:publish_document(\'${_base_url}Document_List/publishDocument/${data}/1\')"><i class="fa fa-calendar-check-o m-r-5"></i></a>`;
						
						
						var comments = `<a class="" href="javascript:document_comments_owner(\'${data}\')"><i class="fa fa-comments-o m-r-5"></i></a>`;
						
						var comments =`<a class="" href="${_base_url}Document_List/commments/${data}"><i class="fa fa-comments-o m-r-5"></i></a>`;
						
						
                    }					
					
                    return `<a class="" href="${_base_url}Document_List/document_section/${data}"><i class="fa fa-edit m-r-5"></i></a> `+pdf_icon+share_icon+list_icon+activeInactive+publish+comments+delete_icon;
                }
            }
        ],
    });
	
	
	
	
	  var pt = $("#publeshed-list-table").DataTable({
        "ajax": {
            "url": _base_url + "Document_List/get_publeshed_list/"+searchtype,
            "dataSrc": 'data'
        },
		
		"createdRow": function( row, data, dataIndex ) {
			console.log(data.id);
			if ( data.rowClss == "row_red" ) {       
				$(row).addClass('row_red');
			}
			
			if ( data.rowClss == "row_orange" ) {       
				$(row).addClass('row_orange');
			}
			
			if ( data.rowClss == "row_green" ) {       
				$(row).addClass('row_green');
			}
			
			
			
		},
    
        "processing": true,
        "autoWidth": false,
        "ordering": false,        
        "columns": [
           /* {
                data: '',
                render: function (data, type, row, meta) {                                        
                    var check_box = '-';
                    if(row.Rcount == 0){                        
                        var check_box = '<input type="checkbox" name="patient_id[]" class="pt_check_box" value="'+row.id+'" >';
                    }
                    return check_box;
                }
            },
            {
                data: 'id'
            },*/
            {
                data: 'document_number'
            },
            /*{
                data: 'document_title'
            },*/
            {
                data: '',
                render: function (data, type, row, meta) {                                        
                    var img = '-';
                                           
                        var img = '<img style="border-radius: 50%;" width="30" height="30" src="'+row.document_owner+'" >';
                    
                    return img;
                }
            },
            {
                data: 'document_category'
            },
			
            {
                data: 'date_of_1_issue'
            },
			{
                data: 'date_of_current_issue'
            },
			
			
			{
                data: 'live_revision_number'
            },
			{
                data: 'status'
            },
			{
                data: 'location'
            },
			{
                data: 'type'
            },
			{
                data: 'interval_months'
            },
			{
                data: 'viewCout',
				 render: function (data, type, row, meta) {   
					var view_count = `<a class=""  href="${_base_url}/Document_List/document_viewer/${row.id}">${row.viewCout}</a>`;
					 return view_count;
				 }
				
				
            },
			{
                data: 'date_of_next_review'
            },
			
			
            {
                data: 'id',
                render: function (data, type, row, meta) {                    
                     var pdf_icon = '';
					 var share_icon = '';
					 var list_icon = '';
					 var activeInactive = '';
				
                    if(row.Rcount == 0){
                       
						
						pdf_icon = `<a class="" href="javascript:document_shared_view(\'${data}\')"><i class="fa fa-file-pdf-o m-r-5"></i></a>`;	
						

						
						share_icon = `<a class="" href="javascript:share_document(\'${data}\')"><i class="fa fa-share-square-o m-r-5"></i></a>`;
						
						list_icon =`<a class="" href="${_base_url}Document_List/document_revision/${data}"><i class="fa fa-list-alt m-r-5"></i></a>`;
						
						
						//comments = `<a class="" href="javascript:document_comments(\'${data}\')"><i class="fa fa-comments-o m-r-5"></i></a>`;
						
						
						
                    }					
					
                    return pdf_icon+share_icon+list_icon;
                }
            }
        ],
    });
	
	
	
	
	
	/// share from table start 
	
	 var sharedFrom = $("#shared-list-table").DataTable({
        "ajax": {
            "url": _base_url + "Document_List/get_sharedfrom_list",
            "dataSrc": 'data'
        },
        "processing": true,
        "autoWidth": false,
        "ordering": false,        
        "columns": [
           /* {
                data: '',
                render: function (data, type, row, meta) {                                        
                    var check_box = '-';
                    if(row.Rcount == 0){                        
                        var check_box = '<input type="checkbox" name="patient_id[]" class="pt_check_box" value="'+row.id+'" >';
                    }
                    return check_box;
                }
            },
            {
                data: 'id'
            },*/
            {
                data: 'document_number'
            },
           /* {
                data: 'document_title'
            },*/
            {
                data: '',
                render: function (data, type, row, meta) {                                        
                    var img = '-';
                                           
                        var img = '<img style="border-radius: 50%;" width="30" height="30" src="'+row.document_owner+'" >';
                    
                    return img;
                }
            },
            {
                data: 'document_category'
            },
			
            {
                data: 'date_of_1_issue'
            },
			{
                data: 'date_of_current_issue'
            },
			
			
			{
                data: 'live_revision_number'
            },
			{
                data: 'status'
            },
			{
                data: 'location'
            },
			{
                data: 'type'
            },
			{
                data: 'interval_months'
            },
			{
                data: 'date_of_next_review'
            },
			{
                data: 'description'
            },
			
			
            {
                data: 'id',
                render: function (data, type, row, meta) {
							
                     var delete_icon = '';
					 var pdf_icon = '';
					 var  pdf_icon_d ='';
					 var pdf_edit ='';
					
					if(row.delete_permission == 1){
                        delete_icon = `<a class="" href="javascript:delete_document_shared(\'${_base_url}Document_List/delete_shared/${data}\')"><i class="fa fa-trash-o m-r-5"></i></a>`;
					}
					if(row.view_permission == 1){
						pdf_icon = `<a class="" href="javascript:document_shared_view(\'${row.document_id}\')"><i class="fa fa-eye m-r-5"></i></a>`;						 
					}
					if(row.download_permission == 1){
						pdf_icon_d = `<a class="" href="javascript:document_shared_download(\'${row.document_id}\')"><i class="fa fa-download m-r-5"></i></a>`;
					}
					
					if(row.edit_permission == 1){
						pdf_edit = `<a class="" href="javascript:document_shared_view(\'${row.document_id}\')"><i class="fa fa-edit m-r-5"></i></a>`;
					}
					
					
					
                    return pdf_icon+pdf_icon_d+pdf_edit+delete_icon;
                }
            }
        ],
    });
	
	/// share from table end  
	
	// shared to start  
	 var sharedFrom = $("#sharedto-list-table").DataTable({
        "ajax": {
            "url": _base_url + "Document_List/get_sharedto_list",
            "dataSrc": 'data'
        },
        "processing": true,
        "autoWidth": false,
        "ordering": false,        
        "columns": [
           /*{
                data: '',
                render: function (data, type, row, meta) {                                        
                    var check_box = '-';
                    if(row.Rcount == 0){                        
                        var check_box = '<input type="checkbox" name="patient_id[]" class="pt_check_box" value="'+row.id+'" >';
                    }
                    return check_box;
                }
            },
            {
                data: 'id'
            },*/
            {
                data: 'document_number'
            },
            /*{
                data: 'document_title'
            },*/
            {
                data: '',
                render: function (data, type, row, meta) {                                        
                    var img = '-';
                                           
                        var img = '<img style="border-radius: 50%;" width="30" height="30" src="'+row.document_owner+'" >';
                    
                    return img;
                }
            },
            {
                data: 'document_category'
            },
			
            {
                data: 'date_of_1_issue'
            },
			{
                data: 'date_of_current_issue'
            },
			
			
			{
                data: 'live_revision_number'
            },
			{
                data: 'status'
            },
			{
                data: 'location'
            },
			{
                data: 'type'
            },
			{
                data: 'interval_months'
            },
			{
                data: 'date_of_next_review'
            },
			{
                data: 'description'
            },
			
            {
                data: 'id',
                render: function (data, type, row, meta) {                    
                     var delete_icon = '';
					 var pdf_icon = '';
					 var  pdf_icon_d ='';
					 var pdf_edit ='';
					
					if(row.delete_permission == 1){
                        delete_icon = `<a class="" href="javascript:delete_document_shared(\'${_base_url}Document_List/delete_shared/${data}\')"><i class="fa fa-trash-o m-r-5"></i></a>`;
					}
					if(row.view_permission == 1){
						pdf_icon = `<a class="" href="javascript:document_shared_view(\'${row.document_id}\')"><i class="fa fa-eye m-r-5"></i></a>`;						 
					}
					if(row.download_permission == 1){
						pdf_icon_d = `<a class="" href="javascript:document_shared_download(\'${row.document_id}\')"><i class="fa fa-download m-r-5"></i></a>`;
					}
					
					if(row.edit_permission == 1){
						//pdf_edit = `<a class="" href="javascript:document_shared_view(\'${row.document_id}\')"><i class="fa fa-edit m-r-5"></i></a>`;
						
						
						pdf_edit = `<a class="" href="${_base_url}Document_List/document_share_section/${row.document_id}"><i class="fa fa-edit m-r-5"></i></a>`;
						
						
					}
					
					var comments = `<a class="" href="javascript:document_comments(\'${row.document_id}\')"><i class="fa fa-comments-o m-r-5"></i></a>`;
					
					
                    return pdf_icon+pdf_icon_d+pdf_edit+delete_icon+comments;
                }
            }
        ],
    });
	
	// shared to end
	
	
	
	
	

    $("#patient-records-table").DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": "_all"
        }]
    });


    $(".hospital-info").on('click', function () {
        $(".hospital-info").removeClass('hospital-info-active');
        $(this).addClass('hospital-info-active');
        pt.draw();
    });

    $("#clear-hospital").on('click', function () {
        $(".hospital-info").removeClass('hospital-info-active');
        pt.draw();
    });

    $("#profile-picture-picker").on("click", function () {
        $("#txt_profile_pic").click();
    });

    if ($("#txt_profile_pic").length && $("#patient-profile-pic").length) {
        showImage($("#txt_profile_pic").get(0), $("#patient-profile-pic").get(0));
    }

    $("#txt_profile_pic").on("change", function() {
        $("#update_profile_picture").show();
    });


    // Fix icon position with label
    if ($(".tg-inputwithicon").length) {
        $(".tg-inputwithicon").each(function() {
            if ($(this).find("label").length) {
                $(this).find("i").css({"top": "44px"});
            }
        });
    }


    $("#edit_profile_picture").on("submit", function(e) {
        e.preventDefault();
        var form_data = new FormData(this);
        $.ajax({
            async: true,
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: form_data,
            cache: false,
            processData: false,
            contentType: false,
            enctype: 'multipart/form-data',
            success: function (data) 
			{
                console.log("Form submitted");
            },
            error: function (req, status, err) 
			{
                var msg = req.responseText;
                console.log(msg);
            }
        });
    });

});



    $(document).click('.remove_bedge', function(){
		
		//var $this = $(this);
		//console.log($this);
		
		/*if($(".pt_check_box:checked").length > 0){
            $('#btn_pt_delete').css('display', 'block');
            $('#btn_pt_delete').parent('td').css('display', 'block');
        }else{
            $('#btn_pt_delete').css('display', 'none');
        }*/
    
	});
	
	
	
	

    
    
