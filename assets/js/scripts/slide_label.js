function barcodePrint(div_name){
    var printContents = $('#'+div_name).html();
    $('body').html(printContents);
    window.print();
    setTimeout(function(){
        location.reload();
    },400)
}

var print_barcode = function(a_type){
    $('#action_type').val('');
    if(a_type === 2){
        $('#action_type').val('sp_pot');
    }
    $('#br_box').html('');
    //$('#barcode_frm').submit();
    var datastring = $('#barcode_frm').serialize();
    $.ajax({
        type: "POST",
        url: site_url+'GenerateBarcode/bulk_barcode',
        data: datastring, 
        dataType: 'JSON',           
        success: function(response) { 
            var top_pos = 0;
            var left_pos = 0;
            if(response.length > 0 ){

                // $.each(response, function(i, item){
                    $('#br_box').html(response);
                // });  
                setTimeout(function(){
                    barcodePrint('br_box');
                 },500);
            }
            
        }
    });
}
var get_slide_label = function(user_id, date)
{   
    var user_id = $('#filter_user_id').val();
    var date_filter = $('#filter_date').val();    
    var dtable = $('#slide_label_list').DataTable({
        "autoWidth": false,
        "Processing": true,
        "serverSide": true,
        "destroy"   : true,
        "serverSide": true,
        "stateSave" : true,
        // "dom": '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',        
        
        dom: 'Bfrtip',
        buttons: [
        // 'excel', 'csv'
        {
            extend: 'excel',
            exportOptions: {
                columns: [1,2,3,4,5,6]
            }
        },
        {
            extend: 'csv',
            exportOptions: {
            columns: [1,2,3,4,5,6]
            }
        },
        {
            extend: 'pdf',
            exportOptions: {
            columns: [1,2,3,4,5,6]
            }
        },
        ],

        "language": {
            "search": '<span>Search:</span> _INPUT_',
            "searchPlaceholder": 'Type to filter...',
            "lengthMenu": '<span>Show:</span> _MENU_',
            "paginate": { 'first': 'First', 'last': 'Last', 'next': 'Next', 'previous': 'Previous' }
        },
        "ajax": {
            "url": site_url+'slide_label/get_unpublished_data',
            "type": "post",
            "data":{
                [csrf_name]: csrf_hash,
                'user_id' : user_id,
                'date_filter' : date_filter
            }
        },
        "columnDefs": [
        { className:"text-center", "targets": [6, 8] },
        //   { "width": "176px", "targets": 8 },
        ],        
        order: [[1, "desc" ]],        
        columns: [
            {
                data: '',
                orderable: false,
                render: function (data, type, full, meta) {
                    if(full.pSurname.length > 5){
                        //full.pSurname = full.pSurname.substring(0,5) + '*';
						full.pSurname = full.pSurname;
                    }
                    var uniqu_id = 'barcode_'+meta.row;                    
                    hd_html = '<div class="hd_data hide"><input type="hidden" name="lab_id[]" value="'+full.lab_id+'" class="br_data_input" disabled="disabled" />'+
                    '<input type="hidden" name="lab_number[]" value="'+full.lab_no+'" class="br_data_input" disabled="disabled"  />'+
                    '<input type="hidden" name="digi_number[]" value="'+full.lims_no+'" class="br_data_input" disabled="disabled" />'+
                    '<input type="hidden" name="test_id[]" value="'+full.all_test_id+'" class="br_data_input" disabled="disabled" />'+
                    '<input type="hidden" name="test[]" value="'+full.test+'" class="br_data_input" disabled="disabled" />'+
                    '<input type="hidden" name="patient_id[]" value="'+full.patient_id+'" class="br_data_input" disabled="disabled" />'+
                    '<input type="hidden" name="hospital_id[]" value="'+full.hospital_id+'" class="br_data_input" disabled="disabled"/>'+
                    '<input type="hidden" name="patient_name[]" value="'+full.patient+'" class="br_data_input" disabled="disabled" />'+
                    '<input type="hidden" name="specimen_id[]" value="'+full.sp_id+'" class="br_data_input" disabled="disabled" /></div>';
                    return hd_html+'<input type="checkbox" name="request_id[]" id="'+uniqu_id+'" class="br_check_box" value="'+full.rq_id+'" hospital_id="'+full.hospital_id+'" data-values="'+full.lab_no+','+full.pSurname+'" data-blocks="'+full.block_no_list+'" data-tests="'+'test'+full.testids+'"></input>';
                }
            },
            { data: "rq_id", visible: false },
            { data: "lab_no", visible: true },
            { data: "lims_no", visible: true },
            { data: "patient", visible: true },
            { data: "test", visible: true },
            { data: "speciman_no", visible: true },
            { data: "pathologist", visible: true },
            {
                data: '',
                orderable: false,
                render: function (data, type, full, meta) {
                    if(full.br_id > 0)
                        return '<a href="javascript:barcode_modal(\''+full.lims_no+'\', \''+full.lab_no+'\', \''+full.patient+'\', \''+full.test+'\', \''+full.barcode_img+'\')" title="Print Barcode"><i class="fa-2x fa fa-barcode text-success"></i></a>';
                    else
                        return '-';
                }
            }
        ],
        "fnDrawCallback": function (oSettings) {
            $('.expired').closest('tr').addClass('alert-danger');
            $('.expired').closest('tr').attr('title', 'Expire date elapse.');
        },
        /*fnCreatedRow: function (row, data, index) {
            $('td', row).eq(0).html(index + 1);
        }*/
    });
    dtable.search($('#customSearch').val()).draw();
}
var reset_filter = function(){
    $('#filter_user_id').val('All')
    $('#filter_date').val('')
    get_slide_label();
}
$(document).ready(function(){
    // $('#slide_label_list').DataTable().search('string').draw();
    $( "#filter_date" ).daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });    

    $('#filter_date').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        get_slide_label();
    });


    get_slide_label(); // param - 0 - mean all user list    
    
    $('#filter_user_id').on('change', function(){        
        get_slide_label();
    });

    $('#barcode_all').change(function(){
        var all_br = $(this).prop('checked');
        $(".br_check_box").prop('checked', all_br);
        if(all_br){
            $('.br_data_input').prop("disabled", false);
        }else{
            $('.br_data_input').prop("disabled", true);
        }
    })
    setTimeout(function(){
        $('.br_check_box').click(function(){
            var parent_div = $(this).parent().find('.hd_data');
            if($(this).prop('checked'))
                parent_div.find('input[type="hidden"]').prop("disabled", false);
            else{
                parent_div.find('input[type="hidden"]').prop("disabled", true);
            }
            
        });
    },1000)
    $(document).change('.br_check_box', function(){
        var total_len = $(".br_check_box").length;
        var checked_len = $('.br_check_box:checked').length;
        console.log(checked_len +'=='+ total_len)
        if(checked_len == total_len){
            $("#barcode_all").prop('checked', true);
        }else{
            $("#barcode_all").prop('checked', false);
        }
        //        
        if(checked_len == 1){
            $('#btn_barcode').removeClass('hide');
            $('#btn_updated_barcode').removeClass('hide');
            $('#btn_updated_sp_pot').removeClass('hide');
            $('#btn_updated_request').removeClass('hide');
            $('#btn_sp_pot').removeClass('hide');
            $('#btn_sp_request').removeClass('hide');
            $('#btn_download_request').removeClass('hide');
            $('#btn_download_request1').removeClass('hide');
        }else if(checked_len > 1){            
            $('#btn_barcode').removeClass('hide');
            $('#btn_updated_barcode').addClass('hide');
            $('#btn_updated_sp_pot').addClass('hide');
            $('#btn_updated_request').addClass('hide');
            $('#btn_sp_pot').removeClass('hide');
            $('#btn_sp_request').removeClass('hide');
            $('#btn_download_request').removeClass('hide');
            $('#btn_download_request1').removeClass('hide');
        }else{
            $('#btn_barcode').addClass('hide');
            $('#btn_updated_barcode').addClass('hide');
            $('#btn_updated_sp_pot').addClass('hide');
            $('#btn_updated_request').addClass('hide');
            $('#btn_sp_pot').addClass('hide');
            $('#btn_sp_request').addClass('hide');
            $('#btn_download_request').addClass('hide');
            $('#btn_download_request1').addClass('hide');
        }
    });
})


function barcode_modal(digi_no, lab_no, patient, test, image){    
    //$.post(site_url+'Slide_label/get_barcode_data', { 'request_id':request_id, test_id : test_id, [csrf_name]: csrf_hash, },function(data) {}, 'JSON');
    $('#br_digi_number').html(digi_no)
    $('#br_lab_number').html(lab_no)
    $('#br_patient').html(patient)
    if(test != 'null'){
       $('#br_test').html(test);
    }else{
        $('#br_test').html("H&E");
    }    
    $('#barcode_img').attr('src', 'barcodes/'+image);
    $('#barcode_modal').modal('show');
    //print_barcode('br_box');
    var printContents = $('#br_box').html();
    $('body').html(printContents);        
    setTimeout(function(){
        window.print();
        location.reload();
    },200)
}
var get_real_data= function(request_id){
    $.get(site_url+'Slide_label/get_request_data', { 'request_id':request_id },function(data) {
        if(data){            
            $("#ex_lab_no").html(data.lab_number)
            $("#ex_patient_name").html(data.first_name+' '+data.last_name)
            $("#ex_nhs_no").html(data.nhs_number)
            $("#ex_dob").html(data.birth_date);
            if(data.dob != '0000-00-00'){ 
                $("#ex_age").html(data.pt_age) 
            }
            else{
                $("#ex_age").html('0 Years');
            }
            $("#ex_gender").html(data.gender)
            $("#ex_lab_no2").html(data.lab_no2)
            $("#ex_contact_no").html(data.phone)
        }
    }, 'JSON');
}
function format_barcode(){    
    var hospital_id = $('.br_check_box:checked').attr('hospital_id')
    var request_id = $('.br_check_box:checked').val()    
    $('.tmp_title').hide();
    $('.save_template').addClass('hide');
    $('.print_barcode').removeClass('hide');
    br_template_modal(hospital_id);
    get_real_data(request_id);
}

var print_custom_barcode = function(){
    if($('#template_form input[type=checkbox]:checked').length == 0){
        message('You must have to select atlest one label to print on Barcode.', 'info');
    }
    else
    {
        var datastring = $('#template_form, #barcode_frm').serialize();
        $.ajax({
            type: "POST",
            url: site_url+'GenerateBarcode/print_custom_barcode',
            data: datastring,            
            dataType: 'json',
            success: function(response) {                
                if(response.status){                    
                    $('#ex_barcode_img').attr('src', response.barcode_image)
                    $('#ex_lab_no').html(response.lab_number)
                    $('#ex_patient_name').html(response.patient_name)
                    $('#ex_nhs_no').html(response.nhs_no)
                    $('#ex_dob').html(response.dob)
                    $('#ex_age').html(response.age)
                    $('#ex_gender').html(response.gender)
                    $('#ex_lab_no2').html(response.lab_no2)
                    $('#ex_contact_no').html(response.contact_no)
                    
                    var printContents = $('#custom_br_box').html();
                    $('body').html(printContents);
                    setTimeout(function(){
                        window.print();
                        location.reload();
                    },100)       
                }else if(!response.status){
                    alert(response.message)
                    //message(response.message, 'error'); 
                }else{
                    alert('Something went wrong, Please try again')
                }
            },
            error: function() {
                alert('Something went wrong'); 
            }
        });
    }
}
var specimen_pot_print = function(){
    $('#action_type').val('sp_pot');
    setTimeout(function(){
        $('#barcode_frm').submit();
    },100);
    
}

var download_barcode = function(action){
    var download_string = '';
    $('#downloadFile').attr('href',"#");
    $('.br_check_box').each(function () {
        if(this.checked){
            // download_string =  download_string + $(this).attr('data-values');
            var blocks = $(this).attr('data-blocks');
            var tests = $(this).attr('data-tests');
            blocks = blocks.split(",");
            tests = tests.split(",");
            for(var i =0; i< blocks.length;i++){
                var str = '';
                if(action === 1)
				{
                    str = $(this).attr('data-values') + ',' + blocks[i] +  ',' + tests[i];
                    if(!download_string.includes(str)){
                       download_string += $(this).attr('data-values') + ',' + blocks[i] +  ',' + tests[i] + '\n';
					    // download_string += $(this).attr('data-values') + ',' + blocks[i] + '\n';
                    }
                }
				else{
                    str = $(this).attr('data-values') + ',' + blocks[i];
                    if(!download_string.includes(str)){
                        download_string +=  '!,' + $(this).attr('data-values') + ',' + blocks[i] + '\n';
                    }   
                }
                // if(action === 1){
                //     download_string +=  $(this).attr('data-values') + ',' + blocks[i] +  ',' + tests[i] + '\n';
                // }else{
                //     download_string +=  $(this).attr('data-values') + ',' + blocks[i] + '\n';
                // }
                
            }
        }
    });
    download_string = download_string.substring(0, download_string.lastIndexOf("\n"));
    // $('#downloadFile').attr("download", "barcodes_"+Date.now()+".txt");
    // $('#downloadFile').attr('href','data:application/octet-stream;charset=utf-8;base64,'+btoa(download_string));
    // $('#downloadFile').get(0).click();
    $.ajax({
        type: "POST",
        url: site_url+'slide_label/DownloadBarcodeTextFile',
        data: {[csrf_name]: csrf_hash, action : action, file_name : "barcodes_"+Date.now()+".txt", fileContent : download_string}, 
        dataType: 'JSON',           
        success: function(response) { 
            alert(response.message);
        }
    });
}

var download_request_barcode = function(row, action, generationMode){
    var download_string = '';
    $('#downloadFile').attr('href',"#");
    // download_string =  download_string + $(this).attr('data-values');
    var blocks = $(row).attr('data-blocks');
    var tests = $(row).attr('data-tests');
    blocks = blocks.split(",");
    tests = tests.split(",");
    var blocks_name = '';
    if(generationMode === 'single'){
        if(parseInt($(row).attr('data-repeat')) === 0){
            var rowLength = 1;
        }else{
            var rowLength = parseInt($(row).attr('data-repeat'));
        }
        for(var j = 0; j < rowLength; j++){
            blocks_name = $(row).attr('data-blocks');
            if(action === 1){
                for(var i = 0; i < tests.length; i++){
                    $('.testsCheckbox:checked').each(function(){
                        if($(this).attr('data-label') === tests[i]){
                            if(action === 1){
 //download_string += $(row).attr('data-values') + ',' + $(row).attr('data-blocks')+  ',' + tests[i] +  ',' + 'FNQH' + '\n';
 download_string += $(row).attr('data-values') + ',' + $(row).attr('data-blocks')+  ',' + tests[i] + '\n';
                            }else{
                                var str = '!,'+ $(row).attr('data-values') + ',' + $(row).attr('data-blocks') + '\n';
                                // if(!download_string.includes(str)){
                                    download_string +=  '!,'+ $(row).attr('data-values') + ',' + $(row).attr('data-blocks') + '\n';
                                // }
                            }
                        }
                    });
                }
            }else{
                download_string +=  '!,'+ $(row).attr('data-values') + ',' + $(row).attr('data-blocks') + '\n';
            }
        }
    }else{
        for(var i =0; i< blocks.length;i++){
            var str = '';
            if(action === 1)
            {
                // var testInfo = tests[i].split("_");
                str = $(row).attr('data-values') + ',' + blocks[i] +  ',' + tests[i];
                if(!download_string.includes(str))
                {
                   //download_string +=  $(row).attr('data-values') + ',' + blocks[i] +  ',' + tests[i] +  ',' + 'FNQH' + '\n';
				   download_string +=  $(row).attr('data-values') + ',' + blocks[i] +  ',' + tests[i] + '\n';
                    // download_string +=  $(row).attr('data-values') + ',' + blocks[i]  + '\n';
                }
            }
            else
            {
                str = $(row).attr('data-values') + ',' + blocks[i];
                if(!download_string.includes(str)){
                    download_string +=  '!,'+ $(row).attr('data-values') + ',' + blocks[i] + '\n';
                }   
            }
            
        }
    }
    download_string = download_string.substring(0, download_string.lastIndexOf("\n"));
    // $('#downloadFile').attr("download", $('#lab_number').val()+"_"+Date.now()+".txt");
    // $('#downloadFile').attr('href','data:application/octet-stream;charset=utf-8;base64,'+btoa(download_string));

    $.ajax({
        type: "POST",
        url: site_url+'slide_label/DownloadBarcodeTextFile',
        data: {[csrf_name]: csrf_hash, action : action, file_name : $('#lab_number').val()+"_"+Date.now()+".txt", fileContent : download_string,requestId : $('#requestId').val(), blocks_name : blocks_name}, 
        dataType: 'JSON',           
        success: function(response) { 
            if(generationMode === 'single'){
                //update_block_history_table();
            }
            alert(response.message);
        }
    });

    // $('#downloadFile').get(0).click();
}

var LoadFurtherWorkData = function(data){
    var fwId = data.fw_id;
    var labNumber = data.lab_number;
    var request_id = data.request_id;
    var id = data.id;
    var pSurname = data.pSurname;
    var test_name = data.test_name;
    $('.furtherInfoWrapper').html('');
    var flag = 1;
    if($('.dynamicFurther').length > 0){
        var fid = $('.dynamicFurther').attr("data-fid");
        console.log(fid + "==>" + fwId,"asdasd");
        if(parseInt(fid) != parseInt(fwId)){
            $('.dynamicFurther').remove();
        }else{
            flag = 0;
            $('.dynamicFurther').remove();
        }
    }else{
        flag = 1;
        $('.dynamicFurther').remove();
    }
    if(flag == 1){
        $.ajax({
            type: "POST",
            url: site_url+'doctor/LoadFurtherWorkData',
            data: {[csrf_name]: csrf_hash, fwId : fwId, labNumber: labNumber, filterStatus : $('#FilterTests').val(), request_id : request_id, id: id, pSurname : pSurname, test_name : test_name}, 
            dataType: 'JSON',           
            success: function(response) { 
                $('#further_'+fwId).after(response);
                $('.dynamicFurther').fadeIn(500, function() {
                    //$('.dynamicFurther').show();
                });
            }
        });
    }
    
}
