$(document).ready(function () 
{
    // $(document).on('click',".internal_external_radio", function () {
    //     alert($(this).val());
    //     if($(this).val()=="internal"){
    //         $("#opinion_internal_email_div").show();
    //         $("#opinion_external_email_div").hide();
    //     } else {
    //         $("#opinion_external_email_div").show();
    //         $("#opinion_internal_email_div").hide();
    //     }
    // });

    $(document).on('click',".btn-comment-text", function () {
        var preText = $("#opinion_comment").val();
        preText += " "+$(this).text();
        $("#opinion_comment").val(preText);
    });
    $(document).on('click',".opinion_accept_status_btn", function () {
        $(this).closest(".update_opinion").submit();
    });	
	
	$(document).on('click',"#save_patient2", function () 
	{
		alert("yes");
        //$(this).closest(".update_opinion").submit();
    });		
});


