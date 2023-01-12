$(function(){
    $(document).on('change', '#noOfLable',function(e){
        var repeatValue = $(this).val();
        if(repeatValue === ''){
            repeatValue = 1;
        }
        if(parseInt(repeatValue) === 0){
            repeatValue = 1;
        }
        $('.checboxTextBox').attr('data-repeat', repeatValue);
    });
    setInterval(function(){
        if($('.testsCheckbox:checked').length <= 0){
            $('.checboxTextBox').addClass("inactiveLink");
        }else{
            $('.checboxTextBox').removeClass("inactiveLink");
        }
    },100)
})



function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
function barcode_type(data, atype){
    console.log(data);
    $('#btn_barcode').attr("data-value", data);
    $('#btn_sp_pot').attr("data-value", data);

    $('#btn_download_request_cassete, #btn_download_request_slide').attr("data-values", data['dataValues']);

    var digi_number = $('#digi_number').html();
    var lab_number = data['lab_no'];
    var test = data['test'];
    $('.checboxTextBox').attr('data-blocks',data['blockNo']);
    var dropdownSelector = data['dropdownSelector'];
    var patient_name = $('#pt_first_name').html()+' '+$('#pt_last_name').html();
    var br_html = '';
    var checkbox_html = '';

    $('#br_box').html('');
    $('#checkboxXontainer').html();
    var total_test = data['test'].split(",");
    var tests_txt = '';
    $('#'+dropdownSelector +' > option:selected').each(function() {
    //for(i = 0; i< total_test.length; i++){
        tests_txt += $(this).text() + ',';
        var disabled = '';
        if(data['page'] && data['page'] === 'further_work'){
            disabled = 'disabled';
            $('#lab_number').val(data['lab_no']);
        }
        checkbox_html +='<div id="checkbox_row'+$(this).val()+'"><input class="testsCheckbox" type="checkbox" value="'+$(this).val()+'" id="'+$(this).val()+'" data-label="'+$(this).text()+'"  checked '+disabled+'/><label for="'+$(this).val()+'" style="vertical-align: middle;margin-left: 10px;">'+$(this).text()+'</label></div>';

        br_html += '<br/><div class="main" style="margin: 0 auto; text-align: center; height: 95px !important; width: 95px !important; overflow:hidden;">\
        <center class="center_class">\
            <div class="barcode_wrap" style="border: 1px solid #777;padding: 2px;border-radius: 5px;">\
        <center><img src="#" class="b_img" alt="Barcode" style="max-width: 90px;">\
        <table class="br_table" style="font-size:10px !important;">\
        <tbody>\
        <tr class="normal_print hide" style="line-height: 13px;"><td class="text-center"><center>'+digi_number+'</center></td></tr>\
        <tr  style="line-height: 13px;"><td class="text-center"><center>'+lab_number+'</center></td></tr>\
        <tr style="line-height: 13px;"><td class="text-center"><center>'+patient_name+'></center></td></tr>\
        <tr class="normal_print hide" style="line-height: 13px;"><td class="text-center"><center>'+$(this).text()+'</center></td></tr>\
        <tr class="specimen_print hide" style="line-height: 13px;"><td class="text-center" ><center>'+$('#patientDOB').val()+'</center></td></tr>\
        <tr class="specimen_print hide" style="line-height: 13px;"><td class="text-center" ><center>Specimen 1</center></td></tr>\
        </tbody></table>\
    </center>\
    </div>\
    </center>\
    <div class="col-md-12 text-center hide" id="br_error_box">\
    </div>\
    </div>'
    // }
});
    tests_txt = tests_txt.replace(/,\s*$/, "");
    $('.checboxTextBox').attr('data-tests',tests_txt);
    $('#br_box').html(br_html);
    $('#checkboxXontainer').html(checkbox_html);
    
    $('#br_digi_number').html(digi_number)
    $('#br_lab_number').html(lab_number)
    $('#br_patient').html(patient_name)
    $('#br_test').html(test);

    $('#checkboxXontainer').show();
    $('#btn_download_request_cassete').hide();
        $('#btn_download_request_slide').show();
    if(atype === 2){
        $('#checkboxXontainer').hide();
        $('#btn_download_request_cassete').show();
        $('#btn_download_request_slide').hide();
    }

    $('#noOfLable').val("1");
    $('#barcode_action').modal('show');
}

function barcode_p(row, action_type) {
    $('.normal_print, .specimen_print').addClass('hide');
    if(action_type == 1){
        $('#print_action_type').val("general")
        $('.normal_print').removeClass('hide');
    }else{
        $('#print_action_type').val("sp_pot");
		$('#action_type').val("sp_pot");
		
        $('.specimen_print').removeClass('hide');
    }
    var digi_number = $('#digi_number').html();
    var lab_number = $('#lab_number').val();
    generate_barcode(lab_number, $(row).attr("data-value"), action_type, '');
}

function barcode_modal(data){
    //console.log(data);
    var digi_number = $('#digi_number').html();
    var lab_number = data['lab_no'];
    var test = data['test'];
    var patient_name = $('#pt_first_name').html()+' '+$('#pt_last_name').html();
    $('#br_digi_number').html(digi_number)
    $('#br_lab_number').html(lab_number)
    $('#br_patient').html(patient_name)
    $('#br_test').html(test);
    //$('#barcode_modal').modal('show');

    generate_barcode(lab_number, data,'');
}
function print_barcode_single(div_name){
    var printContents = $('#'+div_name).html();
    $('body').html(printContents);
    window.print();
    setTimeout(function(){
        location.reload();
    },400)
}
function generate_barcode(code, br_data, action_type = 1, mode = '')
{
    if(code != ''){
        $('#br_box').removeClass('hide');
        $('#br_error_box').addClass('hide');
        var br_data = JSON.stringify(br_data);

        var patient_id = $('#ptnt_id').html();

        $.ajax({
            url: '../../GenerateBarcode',
            type: "post",
            data: {[csrf_name]: csrf_hash, 'code' : code, save_it: 1, 'br_data': br_data, 'patient_id' : patient_id, 'action_type' : action_type},
            success: function (response) {
                $('.b_img').attr('src', response);
                $('.request_b_img').val(response);
                setTimeout(function(){
                if(mode === 'single'){
                    print_barcode_single('br_box');
                }else{
                    print_barcode('br_box');
                }
                   
                },500);
                return false;
            },
            error: function(){
                alert('Something went wrong.')
            }
        });
    }else{
        $('#br_box').addClass('hide');
        $('#br_error_box').removeClass('hide');
        $('#br_error_box').html('<center>No Digi Number Found.</center>');
        alert('No Digi Number Found.')
    }
    
}
// $(document).ready(function(){

// });