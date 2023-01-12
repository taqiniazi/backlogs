function submit_delete_form(){
    $('#delete_pt_frm').submit();
}

function delete_patient(url){ 
    $('#delete_patient_modal').modal('show');        
    if(url=='bulk_delete'){
        //multiple record delete
        $('.patient-delete-btn').attr('href', 'javascript:submit_delete_form()');        
    } else{
        //single record delete
        $('.patient-delete-btn').attr('href', url);
    }
    
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
    $("#add-patient-form").validate({
        rules: {
            first_name: {
                required: true,
            },
            mrn_number: {
                required: true,
            },
            hospital_status: {
                required: true,
            },            
            nhs_number: {
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
                        },
                        pid : function () {
                            return new URLSearchParams(window.location.search).get('p');
                        },
                    }
                }
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
            var form_data = new FormData(form);
            console.log("Submitting form");
            $.ajax({
                async: true,
                type: 'POST',
                url: _base_url + "patient/add_patient",
                data: form_data,
                cache: false,
                processData: false,
                contentType: false,
                success: function (data) {
                    console.log(data);
                    $("#add_patient").modal('hide');
					//location.reload();
                    if(origin == 'http://localhost'){
                        url = origin+'/fnqhpathology/patient?p='+data+'&step=2'; 
                    }else{
                        url = origin+'/patient?p='+data+'&step=2'; 
                    }
                    window.location.href = url;
                    console.log("Form submitted");
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

    if ($("#edit-patient-form").length) {
        $("#edit-patient-form").validate({
            rules: {
                first_name: {
                    required: true,
                },
                nhs_number: {
                    required: false,
                    rangelength: [10, 10],
                    remote: {
                        url: _base_url + "patient/unique_nhs/"+patient_id,
                        type: "get",
                        data: {
                            nhs_number: function () {
                               // return $("#nhs-number-input").val();
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
                }
    
            },
            messages: {
                first_name: "Please enter a name",
                nhs_number: {
                    required: "Please enter the NHS Number",
                    rangelength: "Please enter a valid NHS Number",
                    remote: "Patient already exists"
                },
                dob: "Please enter date of birth"
                
            }
        });
    }
    

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

    var pt = $("#patient-table").DataTable({
        "ajax": {
            "url": _base_url + "patient/get_patients",
            "dataSrc": 'data'
        },
        "processing": true,
        "autoWidth": false,
        "ordering": false,        
        "columns": [
            {
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
            },
            {
                data: 'name'
            },
            {
                data: 'nhs'
            },
            {
                data: 'hospital'
            },
            {
                data: 'dob'
            },
            {
                data: 'gender'
            },
			{
                data: 'Rcount'
            },
            {
                data: 'id',
                render: function (data, type, row, meta) {
                    let view_icon = `<a  href="${_base_url}patient/view/${data}"><i class="fa fa-eye m-r-5"></i></a>`;
                    let delete_icon = '';
                    if (row.Rcount == 0) {
                        delete_icon = `<a  href="javascript:delete_patient(\'${_base_url}patient/view/${data}/delete\')"><i class="fa fa-trash-o m-r-5"></i></a>`;
                    }
                    var edit_icon = `<a  href="${_base_url}patient?p=${data}&step=1&e=1"><i class="fa fa-pencil m-r-5"></i></a>`;
                    let actionHtml = view_icon + edit_icon + delete_icon;
                    let actionHtml1 = '<div class="dropdown dropdown-action">\n' +
                        '<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>\n' +
                        '<div class="dropdown-menu dropdown-menu-right" style="min-width:30px;">\n' +
                        view_icon +
                        edit_icon + 
                        delete_icon +
                        // '<a class="dropdown-item generate_txt_file" href="javascript:void(0);" data-pid="' + data + '"><i class="fa fa-file-code-o m-r-5"></i> Generate HL7</a>\n' +
                        '</div>\n' +
                        '</div>';
                    return actionHtml;
                }
                /*render: function (data, type, row, meta) {
                    var delete_icon = '';
                    if(row.Rcount == 0){
                        delete_icon = `<a class="" href="javascript:delete_patient(\'${_base_url}patient/view/${data}/delete\')"><i class="fa fa-trash-o m-r-5"></i></a>`;   
                    }
                    var edit_icon = `<a class="" href="${_base_url}patient?p=${data}&step=1"><i class="fa fa-pencil m-r-5"></i></a>`;
                    return `<a class="" href="${_base_url}patient/view/${data}"><i class="fa fa-eye m-r-5"></i></a>`+delete_icon + edit_icon;
                }*/
            }
        ],
    });

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

$(document).ready(function(){
    $('#all_patient').change(function(){        
        var all_br = $(this).prop('checked');
        $(".pt_check_box").prop('checked', all_br);        
        if(all_br)
        {
            if($(".pt_check_box:checked").length == 0)
            {
                $('#btn_pt_delete').css('display', 'none');
                message('You can\'t select record to delete.', 'error');
                $('#all_patient').prop('checked', false);
            }else{
                $('#btn_pt_delete').css('display', 'block');
                $('#btn_pt_delete').parent('td').css('display', 'block');
            }
        }else{
            $('#btn_pt_delete').css('display', 'none');
        }
    });

    $(document).change('pt_check_box', function(){
        if($(".pt_check_box:checked").length > 0){
            $('#btn_pt_delete').css('display', 'block');
            $('#btn_pt_delete').parent('td').css('display', 'block');
        }else{
            $('#btn_pt_delete').css('display', 'none');
        }
    });
    
    
})