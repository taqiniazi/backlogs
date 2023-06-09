<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
    .form_input_container.focused{
        border-color: #00c5fb
    }
</style>
<?php
$src_url = base_url('/assets/subassets/js/jquery-3.2.1.min.js');
$src_url2 =base_url('/assets/js/bootstrap.min.js');
echo "<script src='$src_url'></script>";
echo "<script src='$src_url2'></script>";
?>
<!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/newtheme/css/select2.min.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/newtheme/css/style.css"> -->
<style type="text/css">
    #tinymce p{font-family: "CircularStd" , sans-serif !important; font-size: 18px !important;}
    .custom_list_opi li{margin-bottom: 15px;}
    .custom_list_opi li a.btn.btn-default{
        background: #efefef !important;
    }
    .carousel-inner{padding: 0 !important;}
    .carousel-inner .item a{color: #fff !important}
    .carousel-control{opacity: 1;}
    .carousel-control .glyphicon-chevron-left, .carousel-control .icon-prev,
    .carousel-control .glyphicon-chevron-right, .carousel-control .icon-next {
        font-size: 20px;
        background: #00c5fb;
        line-height: 1.5;
        color: #fff;
        border-radius: 40px;
    }
    .custom_list_opi li a.btn.btn-default:hover,
    .custom_list_opi li a.btn.btn-default:focus{
        background: #ddd !important;
    }
    .microscopy-form-container,
    .tg-tabfieldset .form-group{border:0px !important;}
    .select2-container--default .select2-selection--multiple{height: auto !important;}
    p{
        font-family: 'CircularStd', sans-serif !important;
    }
    .modal-body{
        max-height: 825px !important;
    }
    .checkbox-wrap{margin: 0;}
    .tg-searchrecordoptionvtwo li a{background: transparent;}
    .circle{
        width: 15px;
        height: 15px;
        display: inline-block;
        margin-left: 10px;
        border-radius: 50%;
    }
    .info_nndn2 tbody tr td{
        border-top: 0px !important;
        font-weight: bold;
        padding: 0 5px !important;
    }
    .sec_title.p_id, .sec_title.p_id2,.sec_title.r_id, .sec_title.t_id {
        position: relative;
    }
    .form-group.halfform-group[style="float: right"] .sec_title{
        float: none !important;
        width: 100%;
    }
    .form-group.halfform-group[style="float: right"] .sec_title a{
        float: right;
    }
    .tox .tox-statusbar{display: none !important}
    select.form-control{height: 44px;}
    .vertical-align-p {
        margin: 10px 0 0 -10px;
        font-size: 1.5rem;
    }
    .info_nndn tbody tr td,
    .info_nndn2 tbody tr td{
        border-top: 0px !important;
        font-weight: bold;
    }
    .specimen_content{float: none; border:unset; padding: 15px 0}
    .sec_title.p_id, .sec_title.p_id2,.sec_title.r_id,.sec_title.t_id {
        position: relative;
        background: #fff;
        padding: 20px;
        border: 1px solid #eee;
        border-bottom: 0;
        margin-bottom: 0;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
    }
    #p_id_title,#request_id_title{font-size: 20px;}
    .sec_title.p_id a.checv_up_down, .sec_title.p_id2 a.checv_up_down,
    .sec_title.r_id a.checv_up_down, .sec_title.r_id2 a.checv_up_down,
    .sec_title.t_id  a.checv_up_down{
        position: absolute;
        top: 50%;
        margin-top: -13px;
        right: 25px;
        font-size: 20px;
    }
    .custom_badge_tat .badge {
        min-width: 36px;
        line-height: 28px;
        min-height: 36px;
    }
    ul li.hover_it{position: relative;}
    ul.list-unstyled.hover_cont {
        position: absolute;
        left: -40px;
        width: 200px;
        top: 46px;
        padding: 5px 0;
        display: none;
    }
    ul li.hover_it:hover ul.hover_cont {
        display: block;
    }
    .npr {
        padding-right: 0;
    }
    .new_sel:focus{
        border-color: #006df1
    }

    .circle.circle_blue{
        background: #006df1;
    }
    .circle.circle_green{
        background: #92dd59;
    }
    .circle.circle_yellow{
        background: #f0ce3b;
    }
    .circle.circle_black{
        background: #000;
    }
    .circle.circle_red{
        background: #e74c3c;
    }

    .carousel-control.left, .carousel-control.right{
        background-image: unset !important;
        background-repeat: unset;
    }
    .carousel-control.left{
        left: 10px !important
    }
    .carousel-control.right{
        right: 10px !important
    }
    .carousel-control{
        bottom: unset !important;
        font-size: 32px  !important;
        text-shadow: unset  !important;
        color: #000  !important;
        top: 50%  !important;
        width: auto !important;
        /*left: 0  !important;*/
        transform: translateY(-50%)  !important;
    }
    .p-l-0{
        padding-left: 0;
    }
    .carousel-inner .item a{color: #000;}
    .carousel-inner .item img{
        width: 100%;
        height: 220px;
    }
    .tg-nextecord a i, .tg-previousrecord a i {
        width: 46px;
        height: 46px;
        font-size: 36px;
        line-height: 41px;
    }
    .tg-searchrecord fieldset .form-group .form-control{height: 46px; width: 260px; font-size: 16px;}
    .tg-searchrecord fieldset .form-group i{top: 6px; font-size: 26px;}
    .page-title{
        float: none;
    }
    
    .page-header .breadcrumb {
        color: #6c757d;
        font-size: 16px;
        font-weight: 500;
        margin-bottom: 0;
        display: block;
        padding-left: 0 !important;
        overflow:unset !important; 
    }
    

    .microscopy_title_detail {
        margin-left: 20px;
        margin-bottom: 10px;
        display: inline-block;
    }
    #sendprivatemessage .form-group {
        width: 100%;
    }

    

    .thumbnail p{
        color: #555;
        text-align: center;
        padding: 0 6px;
    }
    .thumbnail_slide {
        padding: 10px 12px;

        min-width: 85px !important;
        width: 123px !important;
        background-color: rgba(250, 250, 250, 1);
        border-radius: 15px;
    }
    .thumbnail_slide label {
        font-size: 1.2rem;
        line-height: 13px; 
    }

    .thumbnail_slide_container {
        max-width: 175px;
    }

    .page-buttons .btn{font-size: 14px;}

    .doctorCard .tg-themeinputbtn {
        padding-left: 22px;
        background: transparent !important;
    }
    .page-header .breadcrumb li:first-child:before{
        display: none;
    }

    .flags-select{
        width: 265px;
    }
    .second-sidebar{
        top: 185px !important;
    }
    .badge-lg, .tg-namelogo{
        margin: 0 5px;
        width:46px;
        height: 46px;
        font-size: 18px;
        line-height: 2.5;
    }
    /*.tg-namelogo{line-height: 2.4}*/

    .nav-tabs{border-bottom: 0px;}
    .nav-tabs a.tg-detailsicon{
        background: #6c757b !important;
        color: #fff !important;
        margin-right: 10px;
    }
    a#show_hidden:hover, a#show_hidden:focus{
        background: #555 !important;
    }
    span.info_lab {
        border: 1px solid #00c5fb;
        min-width: 100px;
        display: inline-block;
        border-radius: 30px;
        padding: 3px 15px 3px 3px;
        margin-left: 5px;
        font-weight: 300;
        font-size: 16px;
    }
    span.info_lab span {
        display: inline-block;
        color: #fff;
        background: #00c5fb;
        border-radius: 30px;
        width: 29px;
        text-align: center;
        font-size: 20px;
    }
    .nav-tabs a.tg-detailsicon .tg-notificationtag{
        background: #6c757b;
        border-color:#6c757b;
        line-height: 26px;
        font-size: 14px;
        width: 30px; 
        height: 30px;
        top: -20px;
        right: -10px; 
    }
    .sec_title, .sec_title a{
        font-size: 20px !important;
        font-weight: 500;
        color: #1f1f1f;
        background: #fff;
        line-height: 1.5;
    }
    .sec_title{padding: 15px;}
    .sec_title a.checv_up_down{float: right;}
    .checv_up_down{
        margin-left: 20px;
    }
    .delete_add_specimen a.tg-detailsicon{
        float: right;
        margin: 0 3px;
    }
    .show{display: block !important;}
    .tg-nameandtrackimg{
        position: absolute;
        top: 0;
        right: 15px;
    }
    .carousel-inner {
        width: 100%;
        max-width: 90%;
        margin: 30px auto;
        padding: 30px 35px 10px;
    }
    .carousel-control-prev, .carousel-control-next{
        width: 50px;
        opacity: 1;
    }
    .carousel-control-prev .fa, .carousel-control-next .fa{
        border: 1px solid #fff;
        font-size: 18px;
        border-radius: 20px;
        padding: 10px 12px;
        color: #222;

    }
    .nothing{
        background: none;
        box-shadow: none;
        padding: 0px;
        border-radius: 0px;
        border:0px;
    }
    .breadcrumb{padding: 0 !important}

    .microscopy-form-container {
        border: 1px solid rgba(230, 230, 230, 1);
        margin-top: 30px;
        width: 100%;
    }
    #macroscopic-description-container {
        height: 320px;
        width: 60%;
    }

    #specimen_macroscopic_description {
        height: 90%;
    }

    @media screen and (min-width: 1600px) {
        body{font-size: 18px;}
        .tg-searchrecordoptionvtwo li a {
            width: 46px;
            height: 46px;
        }

    }
    .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
        color: #fff;
        display: block;
        padding: 0 20px;
        font-size: 15px;
        border-radius: 50px;
        background: #007899 !important;
        line-height: inherit;
    }

    .nav-tabs > li > a {
        color: #fff;
        display: block;
        padding: 0 20px;
        font-size: 15px;
        border-radius: 50px;
        background: #00c5fb;
        line-height: inherit; margin: 10px;
    }

    /*.nav-tabs > li > a:hover {
        background: #007899 !important;
    }*/

    /*.nav-tabs > li > a.active {
        background: #007899 !important;
    }*/
    .tg-themedetailsicon li + li {
        border-left: 1px solid #fff;
    }
</style>
<style type="text/css">
    [class^="ti-"],
    [class*=" ti-"] {
        line-height: inherit;
    }

    #slide-carousel {
        margin-top: 10px;
        margin-bottom: 10px;
        display: none;
    }

    .slick-prev:before,
    .slick-next:before {
        color: black !important;
    }

    .table-view-container {
        background-color: rgb(250, 250, 250);
        width: 100%;
        height: 68px;
        padding: 10px;
        border: 1px solid rgb(180, 180, 180);
    }

    .table-view-heading {
        margin-bottom: 1px;
        font-size: 1.65rem;
        color: rgba(100, 100, 100, 0.8);
        font-weight: bold;
    }

    #table-view-patient .row .col-sm-3, #table-view-request .row .col-sm-3,
    #table-view-test .row .col-sm-3 {
        margin: 0;
        padding: 0;
    }

    #table-view-patient, #table-view-request {
        margin: 10px 10px 10px 20px;
    }
    #table-view-patient fieldset, #table-view-request fieldset {
        margin-bottom: 20px;
    }

    .form_input_container{
        height: 43px; border:1px solid #ddd; border-radius: 5px; padding: 0 15px;
    }

    .form_input {
        display: inline-block;
        width: 82%;
        border: none !important;
        margin-top: -17px !important;
        background-color: transparent !important;
    }

    #edit-view-patient .form-group {
        height: 80px;
    }
    #edit-view-request .form-group {
        height: 80px;
    }


    .radial_btn_container{
        width: 15%;
        margin: 0;
        height: 25px;
        margin-top: 7px;
        display: inline-block;
    }
    li{position: relative;}
    .cust_dd .dropdown-menu{min-width: 570px; padding: 0; top: 0; background: transparent;border-color: transparent; left: -185px !important;}
    .cust_dd .dropdown-menu li{padding: 0;}
    .cust_dd .dropdown-menu li a {
        margin:5px 0 0 5px;
        padding: unset;
        color: #fff;
        font-size: 24px;
        float: left;
        clear: none;
        line-height: 2;
    }
    .cust_dd .dropdown-menu li a:hover,
    .cust_dd .dropdown-menu li a:focus{background: #00c5fb;}

    .table_view_svg {
        margin-top: 8px;
        margin-left: 8px;
    }
    .pDs {
        padding: 5px;
        font-weight: bold;
        font-size: 1.2em;
        border-bottom: 1px solid gainsboro;
        margin-right: 10px; 
    }
    .cDs {
        padding: 5px;
        margin-left: 25px;
    }
</style>
<div class="doctor_record_detail_page">
    <?php
    $record_id = $this->uri->segment(3);
    $doc_id = $this->ion_auth->user()->row()->id;

    if (!empty($record_edit_status)) {
        $user_id = $record_edit_status[0]->user_id_for_edit;
        $edit_timestamp = $record_edit_status[0]->user_record_edit_timestamp;
        /* Get First & Last Name */
        $first_name = '';
        $last_name = '';
        $getdatils = getRecords("AES_DECRYPT(first_name, '" . DATA_KEY . "') AS first_name,AES_DECRYPT(last_name, '" . DATA_KEY . "') AS last_name", "users", array("id" => $doc_id));

        $edit_full_name = $getdatils[0]->first_name . '&nbsp;' . $getdatils[0]->last_name;
    }

    if (!empty($request_query)) {
        $userid = $request_query[0]->request_add_user;
        $record_add_timestamp = $request_query[0]->request_add_user_timestamp;
        $first_name = '';
        $last_name = '';
        $getuserdetails = getRecords("AES_DECRYPT(first_name, '" . DATA_KEY . "') AS first_name,AES_DECRYPT(last_name, '" . DATA_KEY . "') AS last_name", "users", array("id" => $userid));

        $add_full_name = $getuserdetails[0]->first_name . '&nbsp;' . $getuserdetails[0]->last_name;
    }

    $micro_codes_data = array();
    if (!empty($micro_codes)) {
        foreach ($micro_codes as $mi_codes) {
            $micro_codes_data[] = $mi_codes;
        }
    }

    if (!empty($user_id) && $edit_timestamp) {
        ?>
        <div class="col-md-12">
            <span class="user_edit_status">Record Last Edited By : <?php echo $edit_full_name; ?>, At :
                <?php echo date('d-m-Y h:i:s A', $edit_timestamp); ?>
                <span><a href="javascript:;" data-toggle="modal" data-target="#edit_record_history">View History</a></span>
            </span>
        <?php } ?>
        <?php
        if (!empty($userid) && $record_add_timestamp) {
            ?>
            <span class="user_add_report_status">&nbsp; | &nbsp;&nbsp;&nbsp; Record Added By : <?php echo $add_full_name; ?>, At :
                <?php echo date('d-m-Y h:i:s A', $record_add_timestamp); ?></span>
        </div>
    <?php } ?>
    <div id="edit_record_history" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <?php
                    if (!empty($record_edit_status_full)) {
                        foreach ($record_edit_status_full as $value) {
                            $user_id = $value->user_id_for_edit;
                            $edit_timestamp = $value->user_record_edit_timestamp;
                            $getUDetails = getRecords("AES_DECRYPT(first_name, '" . DATA_KEY . "') AS first_name,AES_DECRYPT(last_name, '" . DATA_KEY . "') AS last_name", "users", array("id" => $user_id));
                            $full_name = $getUDetails[0]->first_name . '&nbsp;' . $getUDetails[0]->last_name;
                            ?>
                            <div class="well">Record Last Edited By : <?php echo $full_name; ?>, At :
                                <?php echo date('d-m-Y h:i:s A', $edit_timestamp); ?></div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- <div class="cims_area">
            <div class="tabs_area">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item">
                        <a class="nav-link active" href="#patient_info" data-toggle="tab">
                            <img src="<?php echo base_url() ?>assets/icons/cims_tab1_w.png" class="img-fluid on_active">
                            <img src="<?php echo base_url() ?>assets/icons/cims_tab1.png" class="img-fluid simple">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#investigation" data-toggle="tab">
                            <img src="<?php echo base_url() ?>assets/icons/cims_tab2_w.png" class="img-fluid on_active">
                            <img src="<?php echo base_url() ?>assets/icons/cims_tab2.png" class="img-fluid simple">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#datasetLinks">
                            <img src="<?php echo base_url() ?>assets/icons/cims_tab7_w.png" class="img-fluid on_active">
                            <img src="<?php echo base_url() ?>assets/icons/cims_tab7.png" class="img-fluid simple">
                        </a>
                    </li>
                </ul>
            </div>
        </div> -->







        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                <?php
                if ($this->session->flashdata('specimen_added') != '') {
                    echo $this->session->flashdata('specimen_added');
                }
                ?>
                <div class="tg-breadcrumbarea tg-searchrecordhold">
                    <div class="clearfix"></div>
                    <div class="pull-left" style="padding-left: 15px;">
                        <h3 class="page-title">Records </h3>
                        <ul class="breadcrumb">
              
                            <li class="breadcrumb-item"><a href="<?php echo site_url('/doctor'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:;">Hub List </a></li>
                            <li class="breadcrumb-item active">Records</li>
                        </ul>
                        <?php //echo !empty($breadcrumbs) ? $breadcrumbs : '';   ?>
                    </div>
                    <div class="pul-right tg-rightarea tg-rightsearchrecord">
                        <div class="tg-searchrecordslide">

                            <?php get_next_previous_records($unpublish_list, $record_id, true, 'prev'); ?>
                            <form class="tg-formtheme tg-searchrecord">
                                <fieldset>
                                    <div class="form-group tg-inputicon">
                                        <input type="text" class="form-control typeahead" placeholder="Search Record">
                                        <i class="lnr lnr-magnifier"></i>
                                    </div>
                                </fieldset>
                            </form>
                            <?php get_next_previous_records($unpublish_list, $record_id, true, 'next'); ?>

                        </div>
                        <div class="tg-flagcolor tg-flagcolortopbar">
                            <div class="tg-checkboxgroup">
                                <ul class="list-unstyled">
                                    <li class="hover_it">
                                        <span class="tg-radio tg-flagcolor1">
                                            <?php
                                            $checked = '';
                                            if ($request_query[0]->flag_status === 'flag_blue') {
                                                $checked = 'checked';
                                            }
                                            ?>
                                            <input <?php echo $checked; ?> data-flag="flag_blue" data-serial="<?php echo $request_query[0]->serial_number; ?>" data-recordid="<?php echo $request_query[0]->uralensis_request_id; ?>" class="detail_flag_change" type="radio" id="flag_blue" name="flag_sorting">
                                            <label for="flag_blue" data-toggle="tooltip" data-placement="top" title="This case marked for ready to authorize." class="custom-tooltip"></label>
                                        </span>

                                        <ul class="list-unstyled hover_cont">
                                            <li class="">
                                                <span class="tg-radio tg-flagcolor2">
                                                    <?php
                                                    $checked = '';
                                                    if ($request_query[0]->flag_status === 'flag_green') {
                                                        $checked = 'checked';
                                                    }
                                                    ?>
                                                    <input <?php echo $checked; ?> data-flag="flag_green" data-serial="<?php echo $request_query[0]->serial_number; ?>" data-recordid="<?php echo $request_query[0]->uralensis_request_id; ?>" class="detail_flag_change" type="radio" id="flag_green" name="flag_sorting">
                                                    <label for="flag_green" data-toggle="tooltip" data-placement="top" title="This case marked as new case." class="custom-tooltip"></label>
                                                </span>
                                            </li>
                                            <li class="">
                                                <span class="tg-radio tg-flagcolor3">
                                                    <?php
                                                    $checked = '';
                                                    if ($request_query[0]->flag_status === 'flag_yellow') {
                                                        $checked = 'checked';
                                                    }
                                                    ?>
                                                    <input <?php echo $checked; ?> data-flag="flag_yellow" data-serial="<?php echo $request_query[0]->serial_number; ?>" data-recordid="<?php echo $request_query[0]->uralensis_request_id; ?>" class="detail_flag_change" type="radio" id="flag_yellow" name="flag_sorting">
                                                    <label for="flag_yellow" data-toggle="tooltip" data-placement="top" title="This case marked for review." class="custom-tooltip"></label>
                                                </span>
                                            </li>
                                            <li class="">
                                                <span class="tg-radio tg-flagcolor4">
                                                    <?php
                                                    $checked = '';
                                                    if ($request_query[0]->flag_status === 'flag_black') {
                                                        $checked = 'checked';
                                                    }
                                                    ?>
                                                    <input <?php echo $checked; ?> type="radio" data-flag="flag_black" data-serial="<?php echo $request_query[0]->serial_number; ?>" data-recordid="<?php echo $request_query[0]->uralensis_request_id; ?>" class="detail_flag_change" id="flag_black" name="flag_sorting">
                                                    <label for="flag_black" data-toggle="tooltip" data-placement="top" title="This case marked as complete." class="custom-tooltip"></label>
                                                </span>
                                            </li>
                                            <li class="">
                                                <span class="tg-radio tg-flagcolor5">
                                                    <?php
                                                    $checked = '';
                                                    if ($request_query[0]->flag_status === 'flag_red') {
                                                        $checked = 'checked';
                                                    }
                                                    ?>
                                                    <input <?php echo $checked; ?> data-flag="flag_red" data-serial="<?php echo $request_query[0]->serial_number; ?>" data-recordid="<?php echo $request_query[0]->uralensis_request_id; ?>" class="detail_flag_change" type="radio" id="flag_red" name="flag_sorting">
                                                    <label for="flag_red" data-toggle="tooltip" data-placement="top" title="This case marked as urgent." class="custom-tooltip"></label>
                                                </span>
                                            </li>
                                        </ul>

                                    </li>
                                </ul>  
                            </div>
                        </div>
                        <ul class="tg-searchrecordoption tg-searchrecordoptionvtwo">
                            <li>
                                <a class="custom_badge_tat">
                                    <?php
                                    $now = time();
                                    $date_taken = !empty($request_query[0]->date_taken) ? $request_query[0]->date_taken : '';
                                    $request_date = !empty($request_query[0]->request_datetime) ? $request_query[0]->request_datetime : '';
                                    $tat_date = '';

                                    $tat_settings = uralensis_get_tat_date_settings($request_query[0]->hospital_group_id);
// echo last_query();exit;
// var_dump($tat_settings['ura_tat_date_data']);exit;

                                    if (!empty($tat_settings) && $tat_settings['ura_tat_date_data'] === 'date_sent_touralensis') {
                                        $date_sent_to_uralensis = !empty($request_query[0]->date_sent_touralensis) ? $request_query[0]->date_sent_touralensis : '';
                                        $tat_date = $date_sent_to_uralensis;
                                    } elseif ($tat_settings['ura_tat_date_data'] === 'date_rec_by_doctor') {
                                        $data_rec_by_doctor = !empty($request_query[0]->date_rec_by_doctor) ? $request_query[0]->date_rec_by_doctor : '';
                                        $tat_date = $data_rec_by_doctor;
                                    } elseif ($tat_settings['ura_tat_date_data'] === 'data_processed_bylab') {
                                        $data_processed_bylab = !empty($request_query[0]->data_processed_bylab) ? $request_query[0]->data_processed_bylab : '';
                                        $tat_date = $data_processed_bylab;
                                    } elseif ($tat_settings['ura_tat_date_data'] === 'date_received_bylab') {
                                        $date_received_bylab = !empty($request_query[0]->date_received_bylab) ? $request_query[0]->date_received_bylab : '';
                                        $tat_date = $date_received_bylab;
                                    } elseif ($tat_settings['ura_tat_date_data'] === 'publish_datetime') {
                                        $publish_datetime = !empty($request_query[0]->publish_datetime) ? $request_query[0]->publish_datetime : '';
                                        $tat_date = $publish_datetime;
                                    } else {
                                        if (!empty($date_taken)) {
                                            $tat_date = $date_taken;
                                        } else {
                                            $category = $request_date;
                                        }
                                    }


                                    if (!empty($tat_settings) && empty($tat_date)) {
                                        $record_old_count = 'NR';
                                    } elseif (!empty($tat_settings) && !empty($tat_date)) {
                                        $compare_date = strtotime("$tat_date");
                                        $datediff = $now - $compare_date;
                                        $record_old_count = floor($datediff / (60 * 60 * 24));
                                    } else {
                                        $compare_date = strtotime("$tat_date");
                                        $datediff = $now - $compare_date;
                                        $record_old_count = floor($datediff / (60 * 60 * 24));
                                    }

                                    $badge = '';
                                    if ($record_old_count <= 10) {
                                        $badge = 'bg-success';
                                    } elseif ($record_old_count > 10 && $record_old_count <= 20) {
                                        $badge = 'bg-warning';
                                    } else {
                                        $badge = 'bg-danger';
                                    }
                                    ?>
                                    <span class="badge <?php echo $badge; ?>">
                                        <?php echo $record_old_count; ?>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <figure class="tg-logobar">
                            <?php if (!empty($request_query)) { ?>
                                <span class="tg-namelogo" data-toggle="tooltip" data-placement="top"
                                      title="<?php echo $this->ion_auth->group($request_query[0]->hospital_group_id)->row()->description; ?>"><?php echo $this->ion_auth->group($request_query[0]->hospital_group_id)->row()->first_initial . $this->ion_auth->group($request_query[0]->hospital_group_id)->row()->last_initial; ?></span>
                                  <?php } ?>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tg-haslayout">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                           
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <?php
                    if ($this->session->flashdata('update_report_message') != '') {
                        echo $this->session->flashdata('update_report_message');
                    }
                    ?>
                    <?php
                    if ($this->session->flashdata('update_specimen_message') != '') {
                        echo $this->session->flashdata('update_specimen_message');
                    }
                    ?>
                    <?php
                    if ($this->session->flashdata('final_report_message') != '') {
                        echo $this->session->flashdata('final_report_message');
                    }
                    ?>
                    <?php
                    if ($this->session->flashdata('message_additional') != '') {
                        ?>
                        <p class="bg-success" style="padding:7px;">
                            <?php echo $this->session->flashdata('message_additional'); ?></p>
                    <?php } ?>
                    <?php
                    if ($this->session->flashdata('message_further') != '') {
                        echo $this->session->flashdata('message_further');
                    }
                    if ($this->session->flashdata('message_email_send') != '') {
                        echo $this->session->flashdata('message_email_send');
                    }
                    if ($this->session->flashdata('message_email_not_sent') != '') {
                        echo $this->session->flashdata('message_email_not_sent');
                    }
                    ?>

                    <form class="tg-formtheme" id="doctor_update_personal_record" method="post" style="margin-top: 0">
                        <div class="col-md-12 form-group">
                            <div class="sec_title p_id form-group">

                                <span id="">
                                    Patient ID
                                    <span class="edit_icon pull-right make_editable" style="margin-right: 30px;">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                </span>

                                <!-- <table class="table custom-table info_nndn" style="margin: -15px; display: none">
                                    <tr style="box-shadow:0px 0px 0px 0px !important;">
                                        <td>
                                            <span class="tg-namelogo"><?php echo uralensis_get_user_data($request_query[0]->uralensis_request_id, 'initial'); ?></span>
                                            <span style="display:inline-block; margin-top: 12px;"><?php echo uralensis_get_user_data($request_query[0]->uralensis_request_id, 'fullname'); ?></span>
                                        </td>
                                        <td><span>DOB: <?php echo!empty($request_query[0]->dob) ? date('d-m-Y', strtotime($request_query[0]->dob)) : ''; ?></span></td>
                                        <td><span>NHS: <?php echo $request_query[0]->nhs_number; ?></span></td>
                                        <td>
                                            <span>Gender: <?php $gender = ($request_query[0]->gender == 'Male' ? 'M' : 'F'); ?> 
                                                <?php echo $gender; ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="edit_icon pull-right make_editable" style="margin-right: 40px;">
                                                <i class="fa fa-pencil"></i>
                                            </span>
                                            <span class="btn btn-info btn-sm pull-right btn_save_sec" style="margin-right: 10px; border-radius: 4px;">
                                                <i class="fa fa-save"></i>
                                            </span>
                                        </td>
                                    </tr>
                                </table>  -->

                                <a href="javascript:;" class="checv_up_down"><i class="fa fa-chevron-down"></i></a>

                            </div>
                            <div class="card hidden">
                                <div class="card-body form-group">
                                    <?php
                                    $json = array();

                                    if (!empty($request_query) && is_array($request_query)) {
                                        foreach ($request_query as $row) {
                                            $record_edit_serial = $row->record_edit_status;
                                            $redit_status = unserialize($record_edit_serial);
                                            ?>

                                            <div id="table-view-patient">

                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <span
                                                            class="tg-namelogo"><?php echo uralensis_get_user_data($row->uralensis_request_id, 'initial'); ?></span>
                                                        <div class="tg-nameandtrack">
                                                            <h3><?php echo uralensis_get_user_data($row->uralensis_request_id, 'fullname'); ?>
                                                            </h3>
                                                            <span><?php echo uralensis_get_record_db_detail($row->uralensis_request_id, 'serial_number'); ?>
                                                                <em>|</em>
                                                                <em><?php echo uralensis_get_record_db_detail($row->uralensis_request_id, 'ura_barcode_no'); ?></em>
                                                            </span>
                                                        </div>
                                                        <?php
                                                        $initial = uralensis_get_user_data($row->uralensis_request_id, 'initial');
                                                        $fullname = uralensis_get_user_data($row->uralensis_request_id, 'fullname');
                                                        $serial_number = uralensis_get_record_db_detail($row->uralensis_request_id, 'serial_number');
                                                        $ura_barcode_no = uralensis_get_record_db_detail($row->uralensis_request_id, 'ura_barcode_no');
                                                        $ura_dob = date('d-m-Y', strtotime($request_query[0]->dob));
                                                        $ura_nhs = $request_query[0]->nhs_number;
                                                        $ura_gender = $gender;
                                                        ?>
                                                        <figure class="tg-nameandtrackimg">
                                                            <span> <?php echo uralensis_get_user_data($row->uralensis_request_id, 'gender'); ?></span>
                                                            <span><?php echo uralensis_get_user_data($row->uralensis_request_id, 'age'); ?></span>
                                                        </figure>
                                                    </div>
                                                    <div class="col-sm-8 nopadding">
                                                        <div class="col-sm-6 nopadding" >
                                                            <div class="table-view-container">
                                                                <?php
                                                                $color_status = 'orange';
                                                                if (!empty($redit_status['patient_initial']) && $redit_status['patient_initial'] == '1') {
                                                                    $color_status = 'green';
                                                                } elseif (!empty($redit_status['patient_initial']) && $redit_status['patient_initial'] == '2') {
                                                                    $color_status = 'blue';
                                                                }
                                                                ?>
                                                                <div class="row" data-key="patient_initial">
                                                                    <div class="table_view_svg col-sm-2 change_status_color" style="margin-left: 0">

                                                                        <svg class="svg_patient_initial" width="26" height="26">
                                                                        <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                                        <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                                        </svg>
                                                                    </div>
                                                                    <div class="col-sm-9 ">
                                                                        <div class="table-view-heading">Initials</div>
                                                                        <div class="table-view-content"><?php echo $row->patient_initial; ?></div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 nopadding" >
                                                            <div class="table-view-container">
                                                                <?php
                                                                $color_status = 'orange';
                                                                if (!empty($redit_status['gender']) && $redit_status['gender'] == '1') {
                                                                    $color_status = 'green';
                                                                } elseif (!empty($redit_status['gender']) && $redit_status['gender'] == '2') {
                                                                    $color_status = 'blue';
                                                                }
                                                                ?>
                                                                <div class="row" data-key="gender">
                                                                    <div class="table_view_svg col-sm-2 change_status_color" style="margin-left: 0" >

                                                                        <svg class="svg_gender" width="26" height="26">
                                                                        <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                                        <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                                        </svg>
                                                                    </div>
                                                                    <div class="col-sm-9 ">
                                                                        <div class="table-view-heading">Gender</div>
                                                                        <div class="table-view-content"><?php echo $row->gender; ?></div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4 nopadding" >
                                                        <div class="table-view-container">
                                                            <?php
                                                            $color_status = 'orange';
                                                            if (!empty($redit_status['f_name']) && $redit_status['f_name'] == '1') {
                                                                $color_status = 'green';
                                                            } elseif (!empty($redit_status['f_name']) && $redit_status['f_name'] == '2') {
                                                                $color_status = 'blue';
                                                            }
                                                            ?>
                                                            <div class="row" data-key="f_name">
                                                                <div class="table_view_svg col-sm-2 change_status_color" >

                                                                    <svg class="svg_f_name" width="26" height="26">
                                                                    <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                                    <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                                    </svg>
                                                                </div>
                                                                <div class="col-sm-9 ">
                                                                    <div class="table-view-heading">First Name</div>
                                                                    <div class="table-view-content"><?php echo $row->f_name; ?></div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 nopadding" >
                                                        <div class="table-view-container">
                                                            <?php
                                                            $color_status = 'orange';
                                                            if (!empty($redit_status['sur_name']) && $redit_status['sur_name'] == '1') {
                                                                $color_status = 'green';
                                                            } elseif (!empty($redit_status['sur_name']) && $redit_status['sur_name'] == '2') {
                                                                $color_status = 'blue';
                                                            }
                                                            ?>
                                                            <div class="row" data-key="sur_name">
                                                                <div class="table_view_svg col-sm-2 change_status_color" >

                                                                    <svg class="svg_sur_name" width="26" height="26">
                                                                    <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                                    <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                                    </svg>
                                                                </div>
                                                                <div class="col-sm-9 ">
                                                                    <div class="table-view-heading">Surname</div>
                                                                    <div class="table-view-content"><?php echo $row->sur_name; ?></div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-sm-4 nopadding" >
                                                        <div class="table-view-container">
                                                            <?php
                                                            $color_status = 'orange';
                                                            if (!empty($redit_status['dob']) && $redit_status['dob'] == '1') {
                                                                $color_status = 'green';
                                                            } elseif (!empty($redit_status['dob']) && $redit_status['dob'] == '2') {
                                                                $color_status = 'blue';
                                                            }
                                                            ?>
                                                            <div class="row" data-key="dob">
                                                                <div class="table_view_svg col-sm-2 change_status_color" >

                                                                    <svg class="svg_dob" width="26" height="26">
                                                                    <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                                    <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                                    </svg>
                                                                </div>
                                                                <div class="col-sm-9 ">
                                                                    <div class="table-view-heading">DOB</div>
                                                                    <div class="table-view-content"><?php echo!empty($row->dob) ? date('d-m-Y', strtotime($row->dob)) : ''; ?></div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 nopadding" >
                                                        <div class="table-view-container">
                                                            <?php
                                                            $color_status = 'orange';
                                                            if (!empty($redit_status['nhs_number']) && $redit_status['nhs_number'] == '1') {
                                                                $color_status = 'green';
                                                            } elseif (!empty($redit_status['nhs_number']) && $redit_status['nhs_number'] == '2') {
                                                                $color_status = 'blue';
                                                            }
                                                            ?>
                                                            <div class="row" data-key="nhs_number">
                                                                <div class="table_view_svg col-sm-2 change_status_color" >

                                                                    <svg class="svg_nhs_number" width="26" height="26">
                                                                    <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                                    <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                                    </svg>
                                                                </div>
                                                                <div class="col-sm-9 ">
                                                                    <div class="table-view-heading">NHS No.</div>
                                                                    <div class="table-view-content"><?php echo $row->nhs_number; ?></div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4 nopadding" >
                                                        <div class="table-view-container">
                                                            <?php
                                                            $color_status = 'orange';
                                                            ?>
                                                            <div class="row">
                                                                <div class="table_view_svg col-sm-2" >

                                                                    <svg width="26" height="26">
                                                                    <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                                    <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                                    </svg>
                                                                </div>
                                                                <div class="col-sm-9 ">
                                                                    <div class="table-view-heading">Hospital No.</div>
                                                                    <div class="table-view-content"></div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 nopadding" >
                                                        <div class="table-view-container">
                                                            <?php
                                                            $color_status = 'orange';
                                                            ?>
                                                            <div class="row">
                                                                <div class="table_view_svg col-sm-2" >

                                                                    <svg width="26" height="26">
                                                                    <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                                    <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                                    </svg>
                                                                </div>
                                                                <div class="col-sm-9 ">
                                                                    <div class="table-view-heading">Hospital Code</div>
                                                                    <div class="table-view-content"></div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 nopadding" >
                                                        <div class="table-view-container">
                                                            <?php
                                                            $color_status = 'orange';
                                                            ?>
                                                            <div class="row">
                                                                <div class="table_view_svg col-sm-2" >

                                                                    <svg width="26" height="26">
                                                                    <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                                    <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                                    </svg>
                                                                </div>
                                                                <div class="col-sm-9 ">
                                                                    <div class="table-view-heading">Patient Usual Address</div>
                                                                    <div class="table-view-content"></div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4 nopadding" >
                                                        <div class="table-view-container">
                                                            <?php
                                                            $color_status = 'orange';
                                                            ?>
                                                            <div class="row">
                                                                <div class="table_view_svg col-sm-2" >

                                                                    <svg width="26" height="26">
                                                                    <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                                    <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                                    </svg>
                                                                </div>
                                                                <div class="col-sm-9 ">
                                                                    <div class="table-view-heading">Postcode</div>
                                                                    <div class="table-view-content"></div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>


                                            </div>
                                            <div id="edit-view-patient" style="display: none;">


                                                <fieldset>

                                                    <div class="form-group col-md-4">
                                                        <span
                                                            class="tg-namelogo"><?php echo uralensis_get_user_data($row->uralensis_request_id, 'initial'); ?></span>
                                                        <div class="tg-nameandtrack">
                                                            <h3><?php echo uralensis_get_user_data($row->uralensis_request_id, 'fullname'); ?>
                                                            </h3>
                                                            <span><?php echo uralensis_get_record_db_detail($row->uralensis_request_id, 'serial_number'); ?>
                                                                <em>|</em>
                                                                <em><?php echo uralensis_get_record_db_detail($row->uralensis_request_id, 'ura_barcode_no'); ?></em>
                                                            </span>
                                                        </div>

                                                        <?php
                                                        $initial = uralensis_get_user_data($row->uralensis_request_id, 'initial');
                                                        $fullname = uralensis_get_user_data($row->uralensis_request_id, 'fullname');
                                                        $serial_number = uralensis_get_record_db_detail($row->uralensis_request_id, 'serial_number');
                                                        $ura_barcode_no = uralensis_get_record_db_detail($row->uralensis_request_id, 'ura_barcode_no');
                                                        ?>
                                                        <figure class="tg-nameandtrackimg">
                                                            <span><?php echo uralensis_get_user_data($row->uralensis_request_id, 'gender'); ?></span>
                                                            <span><?php echo uralensis_get_user_data($row->uralensis_request_id, 'age'); ?></span>
                                                        </figure>
                                                    </div>
                                                    <?php
                                                    $color_status = 'orange';
                                                    if (!empty($redit_status['patient_initial']) && $redit_status['patient_initial'] == '1') {
                                                        $color_status = 'green';
                                                    } elseif (!empty($redit_status['patient_initial']) && $redit_status['patient_initial'] == '2') {
                                                        $color_status = 'blue';
                                                    }
                                                    ?>

                                                    <div class="form-group col-md-4">
                                                        <label for="patient_initial">Initial </label>
                                                        <div class="form_input_container" data-key="patient_initial">
                                                            <div class="radial_btn_container change_status_color">
                                                                <svg class="svg_patient_initial" width="26" height="26">
                                                                <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                                <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                                </svg>

                                                            </div>
                                                            <input id="patient_initial" type="text" name="patient_initial" class="form_input" placeholder="Patient Initial" value="<?php echo $row->patient_initial; ?>">
                                                        </div>
                                                        <?php $json['patient_initial'] = $row->patient_initial; ?>
                                                    </div>
                                                    <?php
                                                    $color_status = 'orange';
                                                    if (!empty($redit_status['first_name']) && $redit_status['first_name'] == '1') {
                                                        $color_status = 'green';
                                                    } elseif (!empty($redit_status['first_name']) && $redit_status['first_name'] == '2') {
                                                        $color_status = 'blue';
                                                    }
                                                    ?>

                                                    <div class="form-group col-md-4">
                                                        <label for="first_name">First Name  - CR0060 </label>
                                                        <div class="form_input_container" data-key="f_name">
                                                            <div class="radial_btn_container change_status_color">
                                                                <svg class="svg_f_name" width="26" height="26">
                                                                <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                                <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                                </svg>

                                                            </div>
                                                            <input id="first_name" type="text" name="f_name" class="form_input" placeholder="First Name" value="<?php echo $row->f_name; ?>">
                                                        </div>
                                                        <?php $json['f_name'] = $row->f_name; ?>
                                                    </div>

                                                    <?php
                                                    $color_status = 'orange';
                                                    if (!empty($redit_status['sur_name']) && $redit_status['sur_name'] == '1') {
                                                        $color_status = 'green';
                                                    } elseif (!empty($redit_status['sur_name']) && $redit_status['sur_name'] == '2') {
                                                        $color_status = 'blue';
                                                    }
                                                    ?>

                                                    <div class="form-group col-md-4">
                                                        <label for="sur_name">Surname - CR0050</label>
                                                        <div class="form_input_container" data-key="sur_name">
                                                            <div class="radial_btn_container change_status_color">
                                                                <svg class="svg_sur_name" width="26" height="26">
                                                                <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                                <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                                </svg>

                                                            </div>
                                                            <input id="sur_name" type="text" name="sur_name" class="form_input" placeholder="Surname" value="<?php echo $row->sur_name; ?>">
                                                        </div>
                                                        <!-- <label></label> -->
                                                        <?php $json['sur_name'] = $row->sur_name; ?>
                                                    </div>


                                                    <?php
                                                    $color_status = 'orange';
                                                    if (!empty($redit_status['gender']) && $redit_status['gender'] == '1') {
                                                        $color_status = 'green';
                                                    } elseif (!empty($redit_status['gender']) && $redit_status['gender'] == '2') {
                                                        $color_status = 'blue';
                                                    }
                                                    ?>

                                                    <div class="form-group col-md-4">
                                                        <label for="gender">Gender - CR0080</label>
                                                        <div class="form_input_container" data-key="gender">
                                                            <div class="radial_btn_container change_status_color">
                                                                <svg class="svg_gender" width="26" height="26">
                                                                <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                                <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                                </svg>

                                                            </div>
                                                            <select class="form_input" name="gender" id="gender">
                                                                <?php
                                                                $gender_array = array(
                                                                    'Male' => 'Male',
                                                                    'Female' => 'Female'
                                                                );

                                                                foreach ($gender_array as $key => $gender) {
                                                                    $selected = '';
                                                                    if ($key == $row->gender) {

                                                                        $selected = 'selected';
                                                                    }
                                                                    ?>
                                                                    <option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $gender; ?></option>
                                                                <?php } ?>
                                                            </select>

                                                        </div>
                                                        <label></label>
                                                        <?php $json['gender'] = $row->gender; ?>
                                                    </div>

                                                    <?php
                                                    $color_status = 'orange';
                                                    if (!empty($redit_status['dob']) && $redit_status['dob'] == '1') {
                                                        $color_status = 'green';
                                                    } elseif (!empty($redit_status['dob']) && $redit_status['dob'] == '2') {
                                                        $color_status = 'blue';
                                                    }
                                                    ?>

                                                    <div class="form-group col-md-4">
                                                        <label for="dob">DOB -CR0100</label>
                                                        <div class="form_input_container" data-key="dob">
                                                            <div class="radial_btn_container change_status_color">
                                                                <svg class="svg_dob" width="26" height="26">
                                                                <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                                <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                                </svg>

                                                            </div>
                                                            <input type="text" name="dob" id="dob" class="form_input" placeholder="Date of Birth" value="<?php echo!empty($row->dob) ? date('d-m-Y', strtotime($row->dob)) : ''; ?>" />
                                                        </div>
                                                        <?php $json['dob'] = date('d-m-Y', strtotime($row->dob)); ?>
                                                    </div>

                                                    <?php
                                                    $color_status = 'orange';
                                                    if (!empty($redit_status['nhs_number']) && $redit_status['nhs_number'] == '1') {
                                                        $color_status = 'green';
                                                    } elseif (!empty($redit_status['nhs_number']) && $redit_status['nhs_number'] == '2') {
                                                        $color_status = 'blue';
                                                    }
                                                    ?>

                                                    <div class="form-group col-md-4">
                                                        <label for="nhs_number">NHS No. - CR0010</label>
                                                        <div class="form_input_container" data-key="nhs_number">
                                                            <div class="radial_btn_container change_status_color">
                                                                <svg class="svg_nhs_number" width="26" height="26">
                                                                <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                                <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                                </svg>

                                                            </div>
                                                            <input type="text" class="form_input" id="nhs_number" name="nhs_number" placeholder="Nhs Number" value="<?php echo $row->nhs_number; ?>">
                                                        </div>
                                                        <?php $json['nhs_number'] = $row->nhs_number; ?>
                                                    </div>

                                                    <?php
                                                    $color_status = 'orange';
                                                    ?>
                                                    <div class="form-group col-md-4">
                                                        <label for="hospital_no" class="text-warning">Hospital No.</label>
                                                        <div class="form_input_container" data-key="hospital_no">
                                                            <div class="radial_btn_container">
                                                                <svg width="26" height="26">
                                                                <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                                <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                                </svg>

                                                            </div>
                                                            <input type="text" class="form_input" id="hospital_no" name="hospital_no" placeholder="Hospital No." value="" disabled>
                                                        </div>
                                                    </div>

                                                    <?php
                                                    $color_status = 'orange';
                                                    ?>
                                                    <div class="form-group col-md-4">
                                                        <label for="hospital_code" class="text-warning">Hospital Code</label>
                                                        <div class="form_input_container" data-key="hospital_code">
                                                            <div class="radial_btn_container">
                                                                <svg width="26" height="26">
                                                                <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                                <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                                </svg>

                                                            </div>
                                                            <input type="text" class="form_input" id="hospital_code" name="hospital_code" placeholder="Hospital Code" value="" disabled>
                                                        </div>
                                                    </div>

                                                    <?php
                                                    $color_status = 'orange';
                                                    ?>
                                                    <div class="form-group col-md-4">
                                                        <label for="patient_usual_address" class="text-warning">Patient Usual Address - CR0030</label>
                                                        <div class="form_input_container" data-key="patient_usual_address">
                                                            <div class="radial_btn_container">
                                                                <svg width="26" height="26">
                                                                <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                                <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                                </svg>

                                                            </div>
                                                            <input type="text" class="form_input" id="patient_usual_address" name="patient_usual_address" placeholder="Address" value="" disabled>
                                                        </div>
                                                    </div>

                                                    <?php
                                                    $color_status = 'orange';
                                                    ?>
                                                    <div class="form-group col-md-4">
                                                        <label for="patient_city" class="text-warning">Patient City - CR0030</label>
                                                        <div class="form_input_container" data-key="patient_city">
                                                            <div class="radial_btn_container">
                                                                <svg width="26" height="26">
                                                                <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                                <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                                </svg>

                                                            </div>
                                                            <input type="text" class="form_input" id="patient_city" name="patient_city" placeholder="City" value="" disabled>
                                                        </div>
                                                    </div>


                                                    <?php
                                                    $color_status = 'orange';
                                                    ?>
                                                    <div class="form-group col-md-4">
                                                        <label for="postcode" class="text-warning">Postcode - CR0070</label>
                                                        <div class="form_input_container" data-key="postcode">
                                                            <div class="radial_btn_container">
                                                                <svg width="26" height="26">
                                                                <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                                <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                                </svg>

                                                            </div>
                                                            <input type="text" class="form_input" id="postcode" name="postcode" placeholder="City" value="" disabled>
                                                        </div>
                                                    </div>                                       
                                                    <?php uralensis_get_cost_code_dropdown($row->hospital_group_id, $row); ?>

                                                </fieldset>
                                                <fieldset>

                                                    <?php
                                                    if (!empty($row->cl_detail)) {
                                                        ?>
                                                        <div class="form-group" style="width:100%;">
                                                            <textarea style="height:100px;" class="form-control" required name="cl_detail"
                                                                      id="cl_detail"
                                                                      placeholder="Clinical Detail"><?php echo $row->cl_detail; ?></textarea>
                                                        </div>
                                                    <?php } ?>


                                                </fieldset>

                                            </div>
                                            <?php
                                        }//endforeach
                                    }//endif 
                                    ?>
                                    <?php $json_data = json_encode($json); ?>
                                    <input type="hidden" name="json_edit_data" value='<?php echo $json_data; ?>'>
                                    <input type="hidden" name="record_id" value="<?php echo $record_id; ?>">

                                </div>
                                <div class="clearfix"></div>
                            </div>


                        </div>
                    </form> 
    </div>
    <div class="col-md-6">

        <div class="tg-haslayout uralensis_icons_actions">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 form-group">
                            <div class="sec_title r_id form-group">

                                <span id="">
                                    Request ID
                                    <span class="edit_icon pull-right make_editable" style="margin-right: 40px;">
                                    <i class="fa fa-pencil"></i>
                                </span>
                                </span>
                                
                                <!-- <table class="table custom-table info_nndn2 hidden" style="margin-bottom: 0;">
                                    <tr style="box-shadow:0px 0px 0px 0px !important;">
                                        

                                        <td><span>UL No: <?php echo $row->serial_number; ?></span></td>
                                        <td><span>Track No: --- </span></td>
                                        <td>
                                            <span>Lab No: <?php echo $labNo = $row->lab_number; ?>
                                            </span>
                                        </td>
                                        <td><span>Date Taken: 
                                            <?php
                                                $date_taken = '';
                                                if (!empty($row->date_taken)) {
                                                    $date_taken = date('d-m-Y', strtotime($row->date_taken));
                                                }
                                                ?>

                                            <?php echo $date_taken; ?></span>
                                        </td>
                                        <td>
                                            <span class="edit_icon pull-right make_editable" style="margin-right: 40px;">
                                                <i class="fa fa-pencil"></i>
                                            </span>
                                            <span class="btn btn-info btn-sm pull-right btn_save_sec" style="margin-right: 10px; border-radius: 4px;">
                                                <i class="fa fa-save"></i>
                                            </span>
                                            
                                        </td>
                                    </tr>
                                </table>   -->

                                 <a href="javascript:;" class="checv_up_down"><i class="fa fa-chevron-down"></i></a>

                            </div>

                            <div class="card hidden" style="margin-bottom: 0px; ">
                                <div class="card-body">

                                    <div id="table-view-request">

                                        <div class="row">
                                            <div class="col-sm-4 nopadding">
                                                <div class="table-view-container">
                                                    <?php
                                                    $color_status = 'orange';
                                                    if (!empty($redit_status['serial_number']) && $redit_status['serial_number'] == '1') {
                                                        $color_status = 'green';
                                                    } elseif (!empty($redit_status['serial_number']) && $redit_status['serial_number'] == '2') {
                                                        $color_status = 'blue';
                                                    }
                                                    ?>
                                                    <div class="row" data-key="serial_number">
                                                        <div class="table_view_svg col-sm-2 change_status_color" >

                                                            <svg class="svg_serial_number" width="26" height="26">
                                                            <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                            <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="col-sm-9 ">
                                                            <div class="table-view-heading">UL No.</div>
                                                            <div class="table-view-content"><?php echo $row->serial_number; ?></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-sm-4 nopadding">
                                                <div class="table-view-container">
                                                    <?php
                                                    $color_status = 'orange';
                                                    ?>
                                                    <div class="row">
                                                        <div class="table_view_svg col-sm-2" >

                                                            <svg width="26" height="26">
                                                            <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                            <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="col-sm-9 ">
                                                            <div class="table-view-heading">Track No.</div>
                                                            <div class="table-view-content"></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-sm-4 nopadding">
                                                <div class="table-view-container">
                                                    <?php
                                                    $color_status = 'orange';
                                                    if (!empty($redit_status['lab_number']) && $redit_status['lab_number'] == '1') {
                                                        $color_status = 'green';
                                                    } elseif (!empty($redit_status['lab_number']) && $redit_status['lab_number'] == '2') {
                                                        $color_status = 'blue';
                                                    }
                                                    ?>
                                                    <div class="row" data-key="lab_number">
                                                        <div class="table_view_svg col-sm-2 change_status_color" >

                                                            <svg class="svg_lab_number" width="26" height="26">
                                                            <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                            <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="col-sm-9 ">
                                                            <div class="table-view-heading">Lab No.</div>
                                                            <div class="table-view-content"><?php echo $labNo = $row->lab_number; ?></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="clearfix"></div>

                                            <div class="col-sm-4 nopadding">
                                                <div class="table-view-container">
                                                    <?php
                                                    $color_status = 'orange';
                                                    ?>
                                                    <div class="row">
                                                        <div class="table_view_svg col-sm-2" >

                                                            <svg width="26" height="26">
                                                            <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                            <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="col-sm-9 ">
                                                            <div class="table-view-heading">Specimen Nature</div>
                                                            <div class="table-view-content"></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-4 nopadding">
                                                <div class="table-view-container">
                                                    <?php
                                                    $color_status = 'orange';
                                                    ?>
                                                    <div class="row">
                                                        <div class="table_view_svg col-sm-2" >

                                                            <svg width="26" height="26">
                                                            <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                            <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="col-sm-9 ">
                                                            <div class="table-view-heading">Organisation site identifier</div>
                                                            <div class="table-view-content"></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-sm-4 nopadding">
                                                <div class="table-view-container">
                                                    <?php
                                                    $color_status = 'orange';
                                                    ?>
                                                    <div class="row">
                                                        <div class="table_view_svg col-sm-2" >

                                                            <svg width="26" height="26">
                                                            <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                            <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="col-sm-9 ">
                                                            <div class="table-view-heading">Organisation identifier</div>
                                                            <div class="table-view-content"></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="clearfix"></div>

                                            <div class="col-sm-4 nopadding">
                                                <div class="table-view-container">
                                                    <?php
                                                    $color_status = 'orange';
                                                    if (!empty($redit_status['lab_name']) && $redit_status['lab_name'] == '1') {
                                                        $color_status = 'green';
                                                    } elseif (!empty($redit_status['lab_name']) && $redit_status['lab_name'] == '2') {
                                                        $color_status = 'blue';
                                                    }
                                                    ?>
                                                    <div class="row" data-key="lab_name">
                                                        <div class="table_view_svg col-sm-2 change_status_color" >

                                                            <svg class="svg_lab_name" width="26" height="26">
                                                            <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                            <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="col-sm-9 ">
                                                            <div class="table-view-heading">Lab Name</div>
                                                            <div class="table-view-content"><?php echo getGroupNameById($row->lab_id); ?></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-sm-4 nopadding">
                                                <div class="table-view-container">
                                                    <?php
                                                    $color_status = 'orange';
                                                    if (!empty($redit_status['dermatological_surgeon']) && $redit_status['dermatological_surgeon'] == '1') {
                                                        $color_status = 'green';
                                                    } elseif (!empty($redit_status['dermatological_surgeon']) && $redit_status['dermatological_surgeon'] == '2') {
                                                        $color_status = 'blue';
                                                    }
                                                    ?>
                                                    <div class="row" data-key="dermatological_surgeon">
                                                        <div class="table_view_svg col-sm-2 change_status_color" >

                                                            <svg class="svg_dermatological_surgeon" width="26" height="26">
                                                            <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                            <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="col-sm-9 ">
                                                            <div class="table-view-heading">Dermatological Surgeon</div>
                                                            <div class="table-view-content"><?php echo $row->dermatological_surgeon; ?></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-4 nopadding">
                                                <div class="table-view-container">
                                                    <?php
                                                    $color_status = 'orange';
                                                    if (!empty($redit_status['location']) && $redit_status['location'] == '1') {
                                                        $color_status = 'green';
                                                    } elseif (!empty($redit_status['location']) && $redit_status['location'] == '2') {
                                                        $color_status = 'blue';
                                                    }
                                                    ?>
                                                    <div class="row" data-key="location">
                                                        <div class="table_view_svg col-sm-2 change_status_color" >

                                                            <svg class="svg_location" width="26" height="26">
                                                            <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                            <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="col-sm-9 ">
                                                            <div class="table-view-heading">Location</div>
                                                            <div class="table-view-content"><?php echo $row->location; ?></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-sm-4 nopadding">
                                                <div class="table-view-container">
                                                    <?php
                                                    $color_status = 'orange';
                                                    ?>
                                                    <div class="row">
                                                        <div class="table_view_svg col-sm-2" >

                                                            <svg width="26" height="26">
                                                            <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                            <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="col-sm-9 ">
                                                            <div class="table-view-heading">Surgeon</div>
                                                            <div class="table-view-content"></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-sm-4 nopadding">
                                                <div class="table-view-container">
                                                    <?php
                                                    $color_status = 'orange';
                                                    if (!empty($redit_status['date_taken']) && $redit_status['date_taken'] == '1') {
                                                        $color_status = 'green';
                                                    } elseif (!empty($redit_status['date_taken']) && $redit_status['date_taken'] == '2') {
                                                        $color_status = 'blue';
                                                    }
                                                    ?>
                                                    <div class="row" data-key="date_taken">
                                                        <div class="table_view_svg col-sm-2 change_status_color" >

                                                            <svg class="svg_date_taken" width="26" height="26">
                                                            <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                            <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="col-sm-9 ">
                                                            <div class="table-view-heading">Date Taken</div>
                                                            <?php
                                                            $date_taken = '';
                                                            if (!empty($row->date_taken)) {
                                                                $date_taken = date('d-m-Y', strtotime($row->date_taken));
                                                            }
                                                            ?>
                                                            <div class="table-view-content"><?php echo $date_taken; ?></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-4 nopadding">
                                                <div class="table-view-container">
                                                    <?php
                                                    $color_status = 'orange';
                                                    ?>
                                                    <div class="row">
                                                        <div class="table_view_svg col-sm-2" >

                                                            <svg width="26" height="26">
                                                            <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                            <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="col-sm-9 ">
                                                            <div class="table-view-heading">Pathologist</div>
                                                            <div class="table-view-content"></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-sm-4 nopadding">
                                                <div class="table-view-container">
                                                    <?php
                                                    $color_status = 'orange';
                                                    if (!empty($redit_status['date_received_bylab']) && $redit_status['date_received_bylab'] == '1') {
                                                        $color_status = 'green';
                                                    } elseif (!empty($redit_status['date_received_bylab']) && $redit_status['date_received_bylab'] == '2') {
                                                        $color_status = 'blue';
                                                    }
                                                    ?>
                                                    <div class="row" data-key="date_received_bylab">
                                                        <div class="table_view_svg col-sm-2 change_status_color" >

                                                            <svg class="svg_date_received_bylab" width="26" height="26">
                                                            <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                            <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="col-sm-9 ">
                                                            <div class="table-view-heading">REC LAB</div>
                                                            <?php
                                                            $date_received_bylab = '';
                                                            if (!empty($row->date_received_bylab)) {
                                                                $date_received_bylab = date('d-m-Y', strtotime($row->date_received_bylab));
                                                            }
                                                            ?>
                                                            <div class="table-view-content"><?php echo $date_received_bylab; ?></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-sm-4 nopadding">
                                                <div class="table-view-container">
                                                    <?php
                                                    $color_status = 'orange';
                                                    if (!empty($redit_status['date_sent_touralensis']) && $redit_status['date_sent_touralensis'] == '1') {
                                                        $color_status = 'green';
                                                    } elseif (!empty($redit_status['date_sent_touralensis']) && $redit_status['date_sent_touralensis'] == '2') {
                                                        $color_status = 'blue';
                                                    }
                                                    ?>
                                                    <div class="row" data-key="date_sent_touralensis">
                                                        <div class="table_view_svg col-sm-2 change_status_color" >

                                                            <svg class="svg_date_sent_touralensis" width="26" height="26">
                                                            <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                            <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="col-sm-9 ">
                                                            <div class="table-view-heading">REL LAB</div>
                                                            <?php
                                                            $sent_to_uralensis_date = '';
                                                            if (!empty($row->date_sent_touralensis)) {
                                                                $sent_to_uralensis_date = date('d-m-Y', strtotime($row->date_sent_touralensis));
                                                            } else {
                                                                if (!empty($bck_frm_lab_date_data)) {
                                                                    $sent_to_uralensis_date = date('d-m-Y', strtotime($bck_frm_lab_date_data));
                                                                }
                                                            }
                                                            ?>
                                                            <div class="table-view-content"><?php echo $sent_to_uralensis_date; ?></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-4 nopadding">
                                                <div class="table-view-container">
                                                    <?php
                                                    $color_status = 'orange';
                                                    if (!empty($redit_status['emis_number']) && $redit_status['emis_number'] == '1') {
                                                        $color_status = 'green';
                                                    } elseif (!empty($redit_status['emis_number']) && $redit_status['emis_number'] == '2') {
                                                        $color_status = 'blue';
                                                    }
                                                    ?>
                                                    <div class="row" data-key="emis_number">
                                                        <div class="table_view_svg col-sm-2 change_status_color" >

                                                            <svg class="svg_emis_number" width="26" height="26">
                                                            <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                            <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="col-sm-9 ">
                                                            <div class="table-view-heading">Scanner Type</div>
                                                            <div class="table-view-content"><?php echo $row->emis_number; ?></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-sm-4 nopadding">
                                                <div class="table-view-container">
                                                    <?php
                                                    $color_status = 'orange';
                                                    if (!empty($redit_status['pci_number']) && $redit_status['pci_number'] == '1') {
                                                        $color_status = 'green';
                                                    } elseif (!empty($redit_status['pci_number']) && $redit_status['pci_number'] == '2') {
                                                        $color_status = 'blue';
                                                    }
                                                    ?>
                                                    <div class="row" data-key="pci_number">
                                                        <div class="table_view_svg col-sm-2 change_status_color" >

                                                            <svg class="svg_pci_number" width="26" height="26">
                                                            <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                            <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="col-sm-9 ">
                                                            <div class="table-view-heading">Digi Number</div>
                                                            <div class="table-view-content"><?php echo $row->pci_number; ?></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-4 nopadding">
                                                <div class="table-view-container">
                                                    <?php
                                                    $color_status = 'orange';
                                                    ?>
                                                    <div class="row">
                                                        <div class="table_view_svg col-sm-2" >

                                                            <svg width="26" height="26">
                                                            <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                            <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="col-sm-9 ">
                                                            <div class="table-view-heading">Speciality</div>
                                                            <div class="table-view-content"></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-4 nopadding">                                                <div class="table-view-container">
                                                    <?php
                                                    $color_status = 'orange';
                                                    ?>
                                                    <div class="row">
                                                        <div class="table_view_svg col-sm-2" >

                                                            <svg width="26" height="26">
                                                            <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                            <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="col-sm-9 ">
                                                            <div class="table-view-heading">Specimen No.</div>
                                                            <div class="table-view-content"></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-sm-4 nopadding">
                                                <div class="table-view-container">
                                                    <?php
                                                    $color_status = 'orange';
                                                    ?>
                                                    <div class="row">
                                                        <div class="table_view_svg col-sm-2" >

                                                            <svg width="26" height="26">
                                                            <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                            <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="col-sm-9 ">
                                                            <div class="table-view-heading">Courier No.</div>
                                                            <div class="table-view-content"></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-4 nopadding">
                                                <div class="table-view-container">
                                                    <?php
                                                    $color_status = 'orange';
                                                    ?>
                                                    <div class="row">
                                                        <div class="table_view_svg col-sm-2" >

                                                            <svg width="26" height="26">
                                                            <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                            <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="col-sm-9 ">
                                                            <div class="table-view-heading">Batch No.</div>
                                                            <div class="table-view-content"></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-4 nopadding">
                                                <div class="table-view-container">
                                                    <?php
                                                    $color_status = 'orange';
                                                    if (!empty($redit_status['report_urgency']) && $redit_status['report_urgency'] == '1') {
                                                        $color_status = 'green';
                                                    } elseif (!empty($redit_status['report_urgency']) && $redit_status['report_urgency'] == '2') {
                                                        $color_status = 'blue';
                                                    }
                                                    ?>
                                                    <div class="row" data-key="report_urgency">
                                                        <div class="table_view_svg col-sm-2 change_status_color" >

                                                            <svg class="svg_report_urgency" width="26" height="26">
                                                            <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                            <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="col-sm-9 ">
                                                            <div class="table-view-heading">Status</div>
                                                            <div class="table-view-content"><?php echo $row->report_urgency; ?></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div id="edit-view-request" style="display: none;">
                                    <div class="card-body">
                                        <div class="row">
                                            <?php
                                            $color_status = 'orange';
                                            if (!empty($redit_status['serial_number']) && $redit_status['serial_number'] == '1') {
                                                $color_status = 'green';
                                            } elseif (!empty($redit_status['serial_number']) && $redit_status['serial_number'] == '2') {
                                                $color_status = 'blue';
                                            }
                                            ?>

                                            <div class="form-group col-md-4">
                                                <label for="serial_number">UL No.</label>
                                                <div class="form_input_container" data-key="serial_number">
                                                    <div class="radial_btn_container change_status_color">
                                                        <svg class="svg_serial_number" width="26" height="26">
                                                        <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                        <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                        </svg>

                                                    </div>
                                                    <input id="serial_number" type="text" name="serial_number" class="form_input" placeholder="UL No." value="<?php echo $row->serial_number; ?>">
                                                </div>                                            
                                                <?php $json['serial_number'] = $row->serial_number; ?>
                                            </div>


                                            <?php
                                            $color_status = 'orange';
                                            ?>
                                            <div class="form-group col-md-4">
                                                <label for="track_number" class="text-warning">Track No.</label>
                                                <div class="form_input_container" data-key="track_number">
                                                    <div class="radial_btn_container">
                                                        <svg width="26" height="26">
                                                        <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                        <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                        </svg>

                                                    </div>
                                                    <input type="text" class="form_input" id="track_number" name="track_number" placeholder="Address" value="" disabled>
                                                </div>
                                                <label></label>
                                            </div>

                                            <?php
                                            $color_status = 'orange';
                                            if (!empty($redit_status['lab_number']) && $redit_status['lab_number'] == '1') {
                                                $color_status = 'green';
                                            } elseif (!empty($redit_status['lab_number']) && $redit_status['lab_number'] == '2') {
                                                $color_status = 'blue';
                                            }
                                            ?>

                                            <div class="form-group col-md-4">
                                                <label for="lab_number">Lab No. - CR0010</label>
                                                <div class="form_input_container" data-key="lab_number">
                                                    <div class="radial_btn_container change_status_color">
                                                        <svg class="svg_lab_number" width="26" height="26">
                                                        <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                        <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                        </svg>

                                                    </div>
                                                    <input type="text" class="form_input" id="lab_number" name="lab_number" placeholder="Lab Number" value="<?php echo $row->lab_number; ?>">
                                                </div>
                                                <?php $json['lab_number'] = $row->lab_number; ?>
                                            </div>  
                                            <?php
                                            $color_status = 'orange';
                                            ?>

                                            <div class="form-group col-md-4">
                                                <label for="specimen_nature" class="text-warning">Specimen Nature - Pcr0970</label>
                                                <div class="form_input_container" data-key="specimen_nature">
                                                    <div class="radial_btn_container">
                                                        <svg width="26" height="26">
                                                        <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                        <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                        </svg>

                                                    </div>
                                                    <input type="text" class="form_input" id="specimen_nature" name="specimen_nature" placeholder="Specimen Nature" value="" disabled>
                                                </div>
                                            </div>


                                            <div class="form-group col-md-4">
                                                <label for="organisation_site_identifier" class="text-warning">Organisation site identifier - Pcr0980</label>
                                                <div class="form_input_container" data-key="organisation_site_identifier">
                                                    <div class="radial_btn_container">
                                                        <svg width="26" height="26">
                                                        <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                        <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                        </svg>

                                                    </div>
                                                    <input type="text" class="form_input" id="organisation_site_identifier" name="organisation_site_identifier" placeholder="Organisation site identifier" value="" disabled>
                                                </div>
                                            </div>


                                            <div class="form-group col-md-4">
                                                <label for="organisation_identifier" class="text-warning">Organisation identifier - Pcr0800</label>
                                                <div class="form_input_container" data-key="organisation_identifier">
                                                    <div class="radial_btn_container">
                                                        <svg width="26" height="26">
                                                        <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                        <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                        </svg>

                                                    </div>
                                                    <input type="text" class="form_input" id="organisation_identifier" name="organisation_identifier" placeholder="Organisation Identifier" value="" disabled>
                                                </div>
                                            </div>


                                            <?php
                                            $color_status = 'orange';
                                            if (!empty($redit_status['lab_name']) && $redit_status['lab_name'] == '1') {
                                                $color_status = 'green';
                                            } elseif (!empty($redit_status['lab_name']) && $redit_status['lab_name'] == '2') {
                                                $color_status = 'blue';
                                            }
                                            ?>

                                            <div class="form-group col-md-4">
                                                <label for="lab_name">Lab Name - Pcr0980</label>
                                                <div class="form_input_container" data-key="lab_name">
                                                    <div class="radial_btn_container change_status_color">
                                                        <svg class="svg_lab_name" width="26" height="26">
                                                        <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                        <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                        </svg>

                                                    </div>
                                                    <select class="form_input lab_name" id="lab_name" name="lab_name">
                                                        <option value="0">Choose</option>
                                                        <?php
                                                        $get_lab_names = $this->Doctor_model->getLabNamesFromLabGroups();

                                                        if (!empty($get_lab_names) && is_array($get_lab_names)) :
                                                            foreach ($get_lab_names as $lab_key => $lab_val) {
                                                                $selected = '';
                                                                if ($lab_val['id'] == $row->lab_id) {
                                                                    $selected = 'selected';
                                                                }
                                                                echo '<option data-labnameid="' . $lab_val['id'] . '" ' . $selected . ' value="' . $lab_val['id'] . '">' . ucwords($lab_val['description']) . '</option>';
                                                            }
                                                        endif;
                                                        ?>
                                                        <?php
                                                        $selected = '';
                                                        if ($row->lab_name === 'U') {
                                                            $selected = 'selected';
                                                        }
                                                        ?>
                                                        <option <?php echo $selected; ?> value="U">Other</option>
                                                    </select>
                                                </div>
                                                <?php $json['lab_name'] = $row->lab_name; ?>
                                            </div>

                                            <?php
                                            $color_status = 'orange';
                                            if (!empty($redit_status['dermatological_surgeon']) && $redit_status['dermatological_surgeon'] == '1') {
                                                $color_status = 'green';
                                            } elseif (!empty($redit_status['dermatological_surgeon']) && $redit_status['dermatological_surgeon'] == '2') {
                                                $color_status = 'blue';
                                            }
                                            ?>

                                            <div class="form-group col-md-4">
                                                <label for="dermatological_surgeon">Choose Dermatological Surgeon - Pcr7100</label>
                                                <div class="form_input_container" data-key="dermatological_surgeon">
                                                    <div class="radial_btn_container change_status_color">
                                                        <svg class="svg_dermatological_surgeon" width="26" height="26">
                                                        <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                        <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                        </svg>

                                                    </div>
                                                    <select name="dermatological_surgeon" id="dermatological_surgeon" class="form_input">
                                                        <option value="">Choose</option>
                                                        <?php echo $this->Doctor_model->get_clinician_and_derm($row->hospital_group_id, 'dermatological', $row->dermatological_surgeon); ?>
                                                    </select>
                                                </div>
                                                <?php $json['dermatological_surgeon'] = $row->dermatological_surgeon; ?>
                                            </div>

                                            <?php
                                            $color_status = 'orange';
                                            if (!empty($redit_status['location']) && $redit_status['location'] == '1') {
                                                $color_status = 'green';
                                            } elseif (!empty($redit_status['location']) && $redit_status['location'] == '2') {
                                                $color_status = 'blue';
                                            }
                                            ?>

                                            <div class="form-group col-md-4">
                                                <label for="location">Location</label>
                                                <div class="form_input_container" data-key="location">
                                                    <div class="radial_btn_container change_status_color">
                                                        <svg class="svg_location" width="26" height="26">
                                                        <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                        <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                        </svg>

                                                    </div>
                                                    <input type="text" class="form_input" id="location" name="location" placeholder="Location" value="<?php echo $row->location; ?>">
                                                </div>
                                                <?php $json['location'] = $row->location; ?>
                                            </div>

                                            <?php
                                            $color_status = 'orange';
                                            ?>
                                            <div class="form-group col-md-4">
                                                <label for="surgeon" class="text-warning">Surgeon - CR0030</label>
                                                <div class="form_input_container" data-key="surgeon">
                                                    <div class="radial_btn_container">
                                                        <svg width="26" height="26">
                                                        <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                        <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                        </svg>

                                                    </div>
                                                    <input type="text" class="form_input" id="surgeon" name="surgeon" placeholder="Surgeon" value="" disabled>
                                                </div>
                                            </div>

                                            <?php
                                            $color_status = 'orange';
                                            if (!empty($redit_status['date_taken']) && $redit_status['date_taken'] == '1') {
                                                $color_status = 'green';
                                            } elseif (!empty($redit_status['date_taken']) && $redit_status['date_taken'] == '2') {
                                                $color_status = 'blue';
                                            }
                                            ?>

                                            <div class="form-group col-md-4">
                                                <label for="date_taken">Date Taken - Pcr1010</label>
                                                <div class="form_input_container" data-key="date_taken">
                                                    <div class="radial_btn_container change_status_color">
                                                        <svg class="svg_date_taken" width="26" height="26">
                                                        <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                        <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                        </svg>

                                                    </div>
                                                    <?php
                                                    $date_taken = '';
                                                    if (!empty($row->date_taken)) {
                                                        $date_taken = date('d-m-Y', strtotime($row->date_taken));
                                                    }
                                                    ?>
                                                    <input class="form_input" type="text" name="date_taken" id="datetaken_doctor" placeholder="Date Taken" value="<?php echo $date_taken; ?>" />
                                                </div>
                                                <?php $json['date_taken'] = date('d-m-Y', strtotime($row->date_taken)); ?>
                                            </div>

                                            <?php
                                            $color_status = 'orange';
                                            ?>
                                            <div class="form-group col-md-4">
                                                <label for="pathologist" class="text-warning">Pathologist - Pcr6990</label>
                                                <div class="form_input_container" data-key="pathologist">
                                                    <div class="radial_btn_container">
                                                        <svg width="26" height="26">
                                                        <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                        <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                        </svg>

                                                    </div>
                                                    <input type="text" class="form_input" id="pathologist" name="pathologist" placeholder="pathologist" value="" disabled>
                                                </div>
                                            </div>

                                            <?php
                                            $color_status = 'orange';
                                            if (!empty($redit_status['date_received_bylab']) && $redit_status['date_received_bylab'] == '1') {
                                                $color_status = 'green';
                                            } elseif (!empty($redit_status['date_received_bylab']) && $redit_status['date_received_bylab'] == '2') {
                                                $color_status = 'blue';
                                            }
                                            ?>

                                            <div class="form-group col-md-4">
                                                <label for="date_received_bylab">REC LAB - Pcr0770</label>
                                                <div class="form_input_container" data-key="date_received_bylab">
                                                    <div class="radial_btn_container change_status_color">
                                                        <svg class="svg_date_received_bylab" width="26" height="26">
                                                        <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                        <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                        </svg>

                                                    </div>
                                                    <?php
                                                    $date_received_bylab = '';
                                                    if (!empty($row->date_received_bylab)) {
                                                        $date_received_bylab = date('d-m-Y', strtotime($row->date_received_bylab));
                                                    }
                                                    ?>
                                                    <input class="form_input" type="text" name="date_received_bylab" id="datetaken_doctor" placeholder="REC LAB" value="<?php echo $date_received_bylab; ?>" />
                                                </div>
                                                <?php $json['date_received_bylab'] = date('d-m-Y', strtotime($row->date_received_bylab)); ?>
                                            </div>


                                            <?php
                                            $color_status = 'orange';
                                            if (!empty($redit_status['date_sent_touralensis']) && $redit_status['date_sent_touralensis'] == '1') {
                                                $color_status = 'green';
                                            } elseif (!empty($redit_status['date_sent_touralensis']) && $redit_status['date_sent_touralensis'] == '2') {
                                                $color_status = 'blue';
                                            }
                                            ?>

                                            <div class="form-group col-md-4">
                                                <label for="date_sent_touralensis">REL LAB</label>
                                                <div class="form_input_container" data-key="date_sent_touralensis">
                                                    <div class="radial_btn_container change_status_color">
                                                        <svg class="svg_date_sent_touralensis" width="26" height="26">
                                                        <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                        <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                        </svg>

                                                    </div>
                                                    <?php
                                                    $sent_to_uralensis_date = '';
                                                    if (!empty($row->date_sent_touralensis)) {
                                                        $sent_to_uralensis_date = date('d-m-Y', strtotime($row->date_sent_touralensis));
                                                    } else {
                                                        if (!empty($bck_frm_lab_date_data)) {
                                                            $sent_to_uralensis_date = date('d-m-Y', strtotime($bck_frm_lab_date_data));
                                                        }
                                                    }
                                                    ?>
                                                    <input type="text" name="date_sent_touralensis" class="form_input" id="date_sent_touralensis" placeholder="Uralensis Sent Date" value="<?php echo $sent_to_uralensis_date; ?>" />
                                                </div>
                                                <?php $json['date_sent_touralensis'] = date('d-m-Y', strtotime($sent_to_uralensis_date)); ?>
                                            </div>

                                            <?php
                                            $color_status = 'orange';
                                            if (!empty($redit_status['emis_number']) && $redit_status['emis_number'] == '1') {
                                                $color_status = 'green';
                                            } elseif (!empty($redit_status['emis_number']) && $redit_status['emis_number'] == '2') {
                                                $color_status = 'blue';
                                            }
                                            ?>

                                            <div class="form-group col-md-4">
                                                <label for="emis_number">Scanner Type</label>
                                                <div class="form_input_container" data-key="emis_number">
                                                    <div class="radial_btn_container change_status_color">
                                                        <svg class="svg_emis_number" width="26" height="26">
                                                        <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                        <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                        </svg>

                                                    </div>
                                                    <input id="emis_number" type="text" name="emis_number" class="form_input" placeholder="Scanner Type" value="<?php echo $row->emis_number; ?>">
                                                </div>
                                                <label></label>
                                                <?php $json['emis_number'] = $row->emis_number; ?>
                                            </div>


                                            <?php
                                            $color_status = 'orange';
                                            if (!empty($redit_status['pci_number']) && $redit_status['pci_number'] == '1') {
                                                $color_status = 'green';
                                            } elseif (!empty($redit_status['pci_number']) && $redit_status['pci_number'] == '2') {
                                                $color_status = 'blue';
                                            }
                                            ?>

                                            <div class="form-group col-md-4">
                                                <label for="pci_number">Digi Number - Pcr0950</label>
                                                <div class="form_input_container" data-key="pci_number">
                                                    <div class="radial_btn_container change_status_color">
                                                        <svg class="svg_pci_number" width="26" height="26">
                                                        <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                        <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                        </svg>

                                                    </div>
                                                    <input id="pci_number" type="text" name="pci_number" class="form_input" placeholder="Digi Number" value="<?php echo $row->pci_number; ?>">
                                                </div>
                                                <?php $json['pci_number'] = $row->pci_number; ?>
                                            </div>

                                            <?php
                                            $color_status = 'orange';
                                            ?>
                                            <div class="form-group col-md-4">
                                                <label for="hospital_code" class="text-warning">Hospital Code</label>
                                                <div class="form_input_container" data-key="hospital_code">
                                                    <div class="radial_btn_container">
                                                        <svg width="26" height="26">
                                                        <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                        <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                        </svg>

                                                    </div>
                                                    <input type="text" class="form_input" id="hospital_code" name="hospital_code" placeholder="Hospital Code" value="" disabled>
                                                </div>
                                            </div>

                                            <?php
                                            $color_status = 'orange';
                                            ?>
                                            <div class="form-group col-md-4">
                                                <label for="request_specialty" class="text-warning">Specialty - Pcr7130</label>
                                                <div class="form_input_container" data-key="request_specialty">
                                                    <div class="radial_btn_container">
                                                        <svg width="26" height="26">
                                                        <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                        <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                        </svg>

                                                    </div>
                                                    <input type="text" class="form_input" id="request_specialty" name="request_specialty" placeholder="Specialty" value="" disabled>
                                                </div>
                                            </div>

                                            <?php
                                            $color_status = 'orange';
                                            ?>
                                            <div class="form-group col-md-4">
                                                <label for="specimen_no" class="text-warning">Specimen No. - Pcr6220</label>
                                                <div class="form_input_container" data-key="specimen_no">
                                                    <div class="radial_btn_container">
                                                        <svg width="26" height="26">
                                                        <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                        <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                        </svg>

                                                    </div>
                                                    <input type="text" class="form_input" id="specimen_no" name="specimen_no" placeholder="Specimen No." value="" disabled>
                                                </div>
                                            </div>

                                            <?php
                                            $color_status = 'orange';
                                            ?>
                                            <div class="form-group col-md-4">
                                                <label for="courier_no" class="text-warning">Courier no.</label>
                                                <div class="form_input_container" data-key="courier_no">
                                                    <div class="radial_btn_container">
                                                        <svg width="26" height="26">
                                                        <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                        <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                        </svg>

                                                    </div>
                                                    <input type="text" class="form_input" id="courier_no" name="courier_no" placeholder="Courier no." value="" disabled>
                                                </div>
                                            </div>

                                            <?php
                                            $color_status = 'orange';
                                            ?>
                                            <div class="form-group col-md-4">
                                                <label for="batch_no" class="text-warning">Batch no.</label>
                                                <div class="form_input_container" data-key="batch_no">
                                                    <div class="radial_btn_container">
                                                        <svg width="26" height="26">
                                                        <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                        <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                        </svg>

                                                    </div>
                                                    <input type="text" class="form_input" id="batch_no" name="batch_no" placeholder="Batch no." value="" disabled>
                                                </div>
                                            </div>

                                            <?php
                                            $color_status = 'orange';
                                            if (!empty($redit_status['report_urgency']) && $redit_status['report_urgency'] == '1') {
                                                $color_status = 'green';
                                            } elseif (!empty($redit_status['report_urgency']) && $redit_status['report_urgency'] == '2') {
                                                $color_status = 'blue';
                                            }
                                            ?>

                                            <div class="form-group col-md-4">
                                                <label for="report_urgency">Status</label>
                                                <div class="form_input_container" data-key="report_urgency">
                                                    <div class="radial_btn_container change_status_color">
                                                        <svg class="svg_report_urgency" width="26" height="26">
                                                        <circle cx="13" cy="13" r="12" stroke="<?php echo $color_status; ?>" fill-opacity="0" stroke-width="1"/>
                                                        <circle cx="13" cy="13" r="7" stroke="<?php echo $color_status; ?>" fill="<?php echo $color_status; ?>" stroke-width="2"/>
                                                        </svg>

                                                    </div>
                                                    <select name="report_urgency" class="form_input " id="report_urgency">
                                                        <?php
                                                        $report_urgency = array(
                                                            'Routine' => 'Routine',
                                                            'Urgent' => 'Urgent',
                                                            '2WW' => '2WW'
                                                        );

                                                        foreach ($report_urgency as $key => $urgency) {
                                                            $selected = '';
                                                            if ($key == $row->report_urgency) {
                                                                $selected = 'selected';
                                                            }
                                                            ?>
                                                            <option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $urgency; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <?php $json['report_urgency'] = $row->report_urgency; ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="tg-themedetailsicon">
                            <li>
                                <a href="javascript:void(0);" class="tg-detailsicon" data-toggle="modal" data-target="#view_doc" <?php echo (!empty($files && is_array($files)) ? 'onclick="embed_doc()"' : '') ?> title="Related Documents"><span
                                        title="Related Documents"   class="tg-notificationtag"><?php echo count($files); ?></span>
                                    <i class="ti-eye"></i>
                                </a>
                                <a href="javascript:void(0);" class="tg-detailsicon" data-toggle="modal" data-target="#capture_webcam" id="capture_webcam_img"  title="Capture Image">
                                    <i class="ti-camera"></i>
                                </a>
                                <?php if ($request_query[0]->specimen_update_status == 1) { ?>
                                    <a href="javascript:;" class="tg-detailsicon tg-filtercolors" title="View Report" id="show_pdf_iframe">
                                        <i title="View Report" class="ti-search"></i>
                                    </a>
                                <?php } ?>
                            </li>
                            <li class="dropdown cust_dd">
                                <a href="javascript:;" class="tg-detailsicon dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <?php if ($request_query[0]->specimen_publish_status == 1) { ?>
                                    <a href="<?php echo site_url() . '/doctor/generate_report/' . $request_query[0]->uralensis_request_id; ?>"
                                       target="_blank" class="tg-detailsicon" id="show_pdf_iframe"><i title="View Final PDF" class="ti-notepad"></i></a>
                                   <?php } ?>
                                <a href="<?php echo site_url() . '/doctor/add_further_work/' . $request_query[0]->uralensis_request_id; ?>" class="tg-detailsicon"  title="Add Further Work"><i title="Add Further Work" class="ti-target"></i></a>
                                <a href="javascript:;" class="tg-detailsicon" title="Add to Queue"
                                   data-recordid="<?php echo $request_query[0]->uralensis_request_id; ?>"
                                   id="add_to_authorization"><i title="Add to Queue"
                                                             class="ti-layers"></i></a>
                                <a href="javascript:;" class="tg-detailsicon" data-toggle="modal" title="MDT"
                                   data-target="#mdt_data_modal"><i title="MDT"
                                                                 class="ti-archive"></i></a>
                                <a href="javascript:;" class="tg-detailsicon request_for_opinion" title="Request for opinion">
                                    <i title="Request for opinion" class="ti-pulse"></i></a>
                                <a href="javascript:;" class="tg-detailsicon" data-toggle="modal" title="Assign to other doctor"
                                   data-target="#assign_doctor_modal"><i title="Assign to other doctor" class="ti-support"></i></a>
                                <a href="javascript:;" class="tg-detailsicon" data-toggle="modal" title="Assign as teaching and cpc"
                                   data-target="#teaching_cpc_modal"><i title="Assign as teaching and cpc"
                                                                     class="ti-bell"></i></a>
                                    <?php if ($request_query[0]->specimen_publish_status == 1) { ?>
                                    <a href="javascript:;" class="tg-detailsicon" data-toggle="modal" title="Add Supplementarty Report"
                                       data-target="#add_supplementary"><i title="Add Supplementarty Report" class="ti-plus"></i></a>
                                   <?php } ?>
                                   <?php if ($request_query[0]->additional_data_state === 'in_session') { ?>
                                    <a href="javascript:;" id="publish_supplementary_btn" title="Publish Supplementarty Report"
                                       data-recordid="<?php echo $request_query[0]->uralensis_request_id; ?>"
                                       class="tg-detailsicon"><i title="Publish Supplementarty Report"
                                                              class="ti-check-box"></i></a>
                                    <?php } ?>
                                <a href="javascript:;" class="tg-detailsicon" data-toggle="modal" title="Manage Supplementary"
                                   data-target="#manage_supple"><i title="Manage Supplementary"
                                                                class="ti-wallet"></i></a>
                   
                                <a href="javascript:;" class="tg-detailsicon" data-toggle="collapse" title="Uploaded Documents"
                                   data-target="#relateddocs"><i class="ti-clip" title="Uploaded Documents" ></i></a>
                                <a href="javascript:;" class="tg-detailsicon" data-toggle="modal" title="Record History"
                                   data-target="#rec_history_modal"><i class="ti-folder" title="Record History" ></i></a>
                                   <?php if (!isset($request_query[0]->remote_record) || $request_query[0]->remote_record == NULL || $request_query[0]->remote_record == 0): ?>
                                    <a href="<?php echo base_url('/doctor/doctor_record_detail/' . $request_query[0]->uralensis_request_id . '/bridgehead'); ?>" class="tg-detailsicon" title="Related Records">
                                    <?php elseif ($request_query[0]->remote_record == 1): ?>
                                        <a href="#" class="tg-detailsicon" id="bridgehead-button" title="Related Records">
                                        <?php endif; ?>
                                        <i title="Related Records" ><img width="45px" src="<?php echo base_url('assets/img/box.png'); ?>"></i>
                                    </a>
                                    <!-- Old code 
                                     <a title="Datasets" href="<?php echo site_url('_dataset/breast_cancer_dataset/dashboard/' . $this->uri->segment(3) . '/' . urlencode($initial) . '/' . urlencode($fullname) . '/' . urlencode($serial_number) . '/' . urlencode($ura_barcode_no)) ?>" class="tg-detailsicon">
                                        <i class="ti-harddrive" title="Datasets"></i></a> -->
                                <!--                            <a title="Datasets" href="<?php echo site_url('_dataset/breast_cancer_dataset/dashboard/') ?>" class="tg-detailsicon">
                                                                <i class="ti-harddrive" title="Datasets"></i></a>-->




                                                            <?php
                            //                                $check_record = check_dataset_record($this->uri->segment(3), '');
                                                            //  if ($check_record[0]['dataset_type'] == 'Basal Cell') {
                                                            ?>
                            <!--                                    <a class="tg-detailsicon" title="Datasets"  title="Basal Cell Carcinoma" href="<?php echo site_url('_dataset/basal_cell_dataset/dashboard/' . $this->uri->segment(3) . '/' . urlencode($initial) . '/' . urlencode($fullname) . '/' . urlencode($serial_number) . '/' . urlencode($ura_barcode_no) . '/' . urlencode($ura_dob) . '/' . urlencode($ura_nhs) . '/' . urlencode($ura_gender) . '/' . urlencode($labNo)) ?>"> <i class="ti-harddrive" title="Datasets"></i>  </a>-->
                                                            <?php
                                    // } else {
                                    ?>
                                    <!-- Trigger the modal with a button -->
                                    <a class="tg-detailsicon" title="Datasets" data-toggle="modal" data-target="#datasetLinks"><i class="ti-harddrive" title="Datasets"></i></a>

                                    <!-- Modal -->
                                    <div id="datasetLinks" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Available Datasets</h4>
                                                </div>
                                                <div class="modal-body">

            <!--              <h3><a title="Breast Cancer" href="<?php echo site_url('_dataset/breast_cancer_dataset/dashboard/' . $this->uri->segment(3) . '/' . urlencode($initial) . '/' . urlencode($fullname) . '/' . urlencode($serial_number) . '/' . urlencode($ura_barcode_no)) ?>">
                                     <i class="ti-harddrive" title="Breast Cancer"></i> Breast Cancer</a></h3>
                   <br><h3><a title="Basal Cell Carcinoma" href="<?php echo site_url('_dataset/basal_cell_dataset/dashboard/' . $this->uri->segment(3) . '/' . urlencode($initial) . '/' . urlencode($fullname) . '/' . urlencode($serial_number) . '/' . urlencode($ura_barcode_no)) ?>">
                                     <i class="ti-harddrive" title="Basal Cell Carcinoma"></i> Basal Cell Carcinoma</a></h3>
                                                    -->


                                                    <?php
                //_print_r(get_Datasets());  
                                                    //_print_r($specimen_query);                                  
                                                    ?>

                                                    <ul class="nav nav-tabs" role="tablist">

                                                        <?php
                                                        $sqCount = 1;
                                                        foreach ($specimen_query as $sq) {
                                                            ?>    
                                                            <li role="presentation"><a href="#Specimen<?= $sqCount ?>DS" aria-controls="Specimen<?= $sqCount ?>DS" role="tab" data-toggle="tab">Specimen <?= $sqCount ?></a></li>
                                                            <?php
                                                            $sqCount++;
                                                        }
                                                        ?>    
                                                    </ul>     


                                                    <div class="tab-content">
                                                        <?php
                                                        $sqCountt = 1;
                                                        foreach ($specimen_query as $sq) {
                                                            ?>                 
                                                            <div role="tabpanel" class="tab-pane <?= $sqCountt == 1 ? 'active' : '' ?>" id="Specimen<?= $sqCountt ?>DS"> <?php
                                                                foreach (get_Datasets() as $ds) {
                                                                    if ($ds->parent_dataset_id == 0) {
                                                                        echo "<div class='pDs'><i class='fa fa-chevron-right pDs'></i>" . $ds->dataset_name . "</div>";
                                                                    }
                                                                    if ($ds->parent_dataset_id > 0) {
                                                                        echo "<div class='cDs'><i class='fa fa-chevron-right pDs'></i>";
                                                                        if ($ds->dataset_id == 14) {
                                                                            ?>
                                                                            <a title="Breast Cancer" href="<?php echo site_url('_dataset/breast_cancer_dataset/dashboard/' . $this->uri->segment(3) . '/' . urlencode($initial) . '/' . urlencode($fullname) . '/' . urlencode($serial_number) . '/' . urlencode($ura_barcode_no) . '/' . urlencode($ura_dob) . '/' . urlencode($ura_nhs) . '/' . urlencode($ura_gender) . '/' . urlencode($labNo)) . '/' . $sqCountt ?>"> <?= $ds->dataset_name ?>  </a>

                                                                        <?php } else if ($ds->dataset_id == 18) { ?>
                                                                            <a title="Basal Cell Carcinoma" href="<?php echo site_url('_dataset/basal_cell_dataset/dashboard/' . $this->uri->segment(3) . '/' . urlencode($initial) . '/' . urlencode($fullname) . '/' . urlencode($serial_number) . '/' . urlencode($ura_barcode_no) . '/' . urlencode($ura_dob) . '/' . urlencode($ura_nhs) . '/' . urlencode($ura_gender) . '/' . urlencode($labNo)) . '/' . $sqCountt ?>"> <?= $ds->dataset_name ?>  </a>
                                                                        <?php } else if ($ds->dataset_id == 19) { ?>
                                                                            <a title="Basal Cell Carcinoma" href="<?php echo site_url('_dataset/cutaneous_malignant_melanoma_dataset/dashboard/' . $this->uri->segment(3) . '/' . urlencode($initial) . '/' . urlencode($fullname) . '/' . urlencode($serial_number) . '/' . urlencode($ura_barcode_no) . '/' . urlencode($ura_dob) . '/' . urlencode($ura_nhs) . '/' . urlencode($ura_gender) . '/' . urlencode($labNo)) . '/' . $sqCountt ?>"> <?= $ds->dataset_name ?>  </a>
                                                                        <?php } else if ($ds->dataset_id == 21) { ?>
                                                                            <a title="Basal Cell Carcinoma" href="<?php echo site_url('_dataset/squamous_cell_dataset/dashboard/' . $this->uri->segment(3) . '/' . urlencode($initial) . '/' . urlencode($fullname) . '/' . urlencode($serial_number) . '/' . urlencode($ura_barcode_no) . '/' . urlencode($ura_dob) . '/' . urlencode($ura_nhs) . '/' . urlencode($ura_gender) . '/' . urlencode($labNo)) . '/' . $sqCountt ?>"> <?= $ds->dataset_name ?>  </a>

                                                                            <?php
                                                                        } else {
                                                                            echo $ds->dataset_name;
                                                                        } echo "</div>";
                                                                    }
                                                                }
                                                                ?> 
                                                            </div>              
                                                            <?php
                                                            $sqCountt++;
                                                        }
                                                        ?>                  
                                                    </div>                                 




                                           





                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>        


                                    <?php // }  ?>


                                    </li>
                                  </ul>
                            </li>
                                
                                
                            </li>
                            
                        </ul>
                    </div>
                </div>


                <!-- BCC DATASET VIEW Modal -->
                <div id="bcc_ds_modal_full_view" class="modal fade" role="dialog">
                    <div class="modal-dialog" style="width: 930px;">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title">
                                    <i style="background: #00c5fb;color: white;padding: 10px;border-radius: 30px;font-size: 35px;" class="ti-harddrive" title="Datasets"></i> 
                                    Reporting proforma for cutaneous basal cell carcinoma removed
                                    with therapeutic intent
                                </h2>
                            </div>
                            <div class="modal-body">
                                <?php
                                $initial = uralensis_get_user_data($row->uralensis_request_id, 'initial');
                                $fullname = uralensis_get_user_data($row->uralensis_request_id, 'fullname');
                                $serial_number = uralensis_get_record_db_detail($row->uralensis_request_id, 'serial_number');
                                $ura_barcode_no = uralensis_get_record_db_detail($row->uralensis_request_id, 'ura_barcode_no');
                                $ura_dob = date('d-m-Y', strtotime($request_query[0]->dob));
                                $ura_nhs = $request_query[0]->nhs_number;
                                $ura_gender = $gender;
                        //                            echo '
                        //                                <table class="table custom-table info_nndn" style="margin-bottom: 0;">
                        //                                    <tr style="box-shadow:0px 0px 0px 0px !important;">
                        //                                        <td>
                        //                                            <span class="tg-namelogo">' . uralensis_get_user_data($request_query[0]->uralensis_request_id, 'initial') . '</span>
                        //                                            <span style="display:inline-block; margin-top: 12px;">' . uralensis_get_user_data($request_query[0]->uralensis_request_id, 'fullname') . '</span>
                        //                                        </td>
                        //                                        <td><span>DOB: ' . (!empty($request_query[0]->dob) ? date('d-m-Y', strtotime($request_query[0]->dob)) : '') . '</span></td>
                        //                                        <td><span>NHS: ' . $request_query[0]->nhs_number . '</span></td>
                        //                                        <td>
                        //                                            <span>Gender: ' . ($request_query[0]->gender == 'Male' ? 'M' : 'F') . '</span>
                        //                                        </td>
                        //                                        <td>
                        //                                            <a title="Download Basal Cell Carcinoma" href="' . site_url('/_dataset/gen_pdf/index/' . $this->uri->segment(3) . '/' . urlencode($initial) . '/' . urlencode($fullname) . '/' . urlencode($serial_number) . '/' . urlencode($ura_barcode_no) . '/' . urlencode($ura_dob) . '/' . urlencode($ura_nhs) . '/' . urlencode($ura_gender) . '/' . urlencode($labNo) . $get_bcc_record[$clinical_arr]['patient_specimen']) . '" target="_blank" class="btn btn-primary btn-rounded">
                        //                          <i class="fa fa-floppy-o"></i>
                        //                          </a>
                        //                                        </td>
                        //                                    </tr>
                        //                                </table> ';
                                $html_response = '';
                                $get_bcc_record = get_bcc_dataset_record($this->uri->segment(3), '');

                                $_PDF_html = '';
                                if (!empty($get_bcc_record)) {



                                    $ura_logo = base_url('/application/helpers/tcpdf/uralensis_latest.jpg');

                                    $header_text = <<<EOD
                    
                        <table width="100%">
                            <tr>
                                <td width="25%" align="left">
                                    <img width="180px" src="$ura_logo" />
                                </td>
                                <td width="32%" align="center" style="font-size:20px;"><b>Histopathology Report</b></td>
                                <td width="50%" align="right">
                                    <table style="font-size:12.5px;text-align:left;">
                                        <tr><td width="45%">Serial Number : </td><td><b> $serial_number </b></td></tr>
                                        <tr><td>PCI Number : </td><td><b> $ura_barcode_no </b></td></tr>
                                        <tr><td>Patient Name : </td><td><b> $fullname  </b></td></tr>
                        		<tr><td>LAB Ref : </td><td> $sent_to_uralensis_date </td></tr>
                        		<tr><td>NHS Ref : </td><td> $ura_nhs </td></tr>
                                        <tr><td>Date of Birth : </td><td> $ura_dob </td></tr>
                                        <tr><td>Gender : </td><td> $ura_gender </td></tr>
                                        <tr><td>Clinic Date : </td><td> $date_taken </td></tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        EOD;

                                    echo $header_text;

                                    for ($clinical_arr = 0; $clinical_arr < sizeof($get_bcc_record); $clinical_arr++) {

                                        $html_response = $get_bcc_record[$clinical_arr]['bcc_response_html'];
                                        $data_set = json_decode($get_bcc_record[$clinical_arr]['bcc_data'], true);

                                        $_PDF_html .= $_PDF_head . '<table class="table table-bordered">';
                                        $_PDF_html .= '<h2>Specimen ' . $get_bcc_record[$clinical_arr]['patient_specimen'] . '  <a title="Basal Cell Carcinoma" href="' . site_url('_dataset/basal_cell_dataset/dashboard/' . $this->uri->segment(3) . '/' . urlencode($initial) . '/' . urlencode($fullname) . '/' . urlencode($serial_number) . '/' . urlencode($ura_barcode_no) . '/' . urlencode($ura_dob) . '/' . urlencode($ura_nhs) . '/' . urlencode($ura_gender) . '/' . urlencode($labNo) . $get_bcc_record[$clinical_arr]['patient_specimen']) . '" class="btn btn-primary btn-rounded">
                              <i class="fa fa-pencil"></i>
                              </a>
                              <a onclick="return confirm_delete();" href="' . site_url('_dataset/basal_cell_dataset/removeDatasetbyID/' . $get_bcc_record[$clinical_arr]['dataset_record_id'] . '/' . $get_bcc_record[$clinical_arr]['record_id']) . '" class="btn btn-danger btn-rounded"><i class="fa fa-trash"></i> </a></h2>  <a title="Download Basal Cell Carcinoma" href="' . site_url('/_dataset/gen_excel/index/' . $this->uri->segment(3) . '/' . urlencode($initial) . '/' . urlencode($fullname) . '/' . urlencode($serial_number) . '/' . urlencode($ura_barcode_no) . '/' . urlencode($ura_dob) . '/' . urlencode($ura_nhs) . '/' . urlencode($ura_gender) . '/' . urlencode($labNo) . $get_bcc_record[$clinical_arr]['patient_specimen']) . '" target="_blank" class="btn btn-primary btn-rounded">
                              <i class="fa fa-floppy-o"></i>
                              </a>';
                                        $data_arr = '';

                                        foreach ($data_set as $key => $val) {

                                            if ($this->uri->segment(13) != '') {

                                                if ($this->uri->segment(13) == 'clinical') {
                                                    $data_arr = array('clinicaldimention', 'Specimen_type', 'Incision', 'Excision', 'Punch', 'Curettings', 'Shave', 'CDOther');
                                                }
                                                if ($this->uri->segment(13) == 'macro') {
                                                    $data_arr = array('specimendimention1', 'specimendimention2', 'specimendimention3', 'MDMacroscopic_description', 'Macroscopic');
                                                }
                                                if ($this->uri->segment(13) == 'micro') {
                                                    $data_arr = array('Histological_low', 'n_invasion', 'n_invasion_present', 'n_invasion_yes_m', 'n_Peripheral', 'n_Deep', 'Maximum_Indicate', 'Maximum_Dimention', 'Histological_high', 'n_Histological_Specify_tissue', 'n_bone_minor', 'n_bone_gross', 'n_bone_foraminal');
                                                }
                                            } else {
                                                $data_arr = array('clinicaldimention', 'Specimen_type', 'Incision', 'Excision', 'Punch', 'Curettings', 'Shave', 'CDOther', 'specimendimention1', 'specimendimention2', 'specimendimention3', 'MDMacroscopic_description', 'Macroscopic', 'Histological_low', 'n_invasion', 'n_invasion_present', 'n_invasion_yes_m', 'n_Peripheral', 'n_Deep', 'Maximum_Indicate', 'Maximum_Dimention', 'Histological_high', 'n_Histological_Specify_tissue', 'n_bone_minor', 'n_bone_gross', 'n_bone_foraminal', 'ptnm', 'ptnm_N', 'ptnm_M', 'bcc_comments');
                                            }

                                            if (in_array($key, $data_arr)) {

                                                if ($key == 'clinicaldimention') {
                                                    $key = 'Maximum clinical dimension/diameter';
                                                    $val = $val . ' mm';
                                                }
                                                if ($key == 'Specimen_type') {
                                                    $key = 'Specimen type';
                                                }
                                                if ($key == 'CDOther') {
                                                    $key = 'Other';
                                                }
                                                if ($key == 'specimendimention1') {
                                                    $key = 'Dimension of specimen (Length)';
                                                    $val = $val . ' mm';
                                                }
                                                if ($key == 'specimendimention2') {
                                                    $key = '(Breath)';
                                                    $val = $val . ' mm';
                                                }
                                                if ($key == 'specimendimention3') {
                                                    $key = '(Depth)';
                                                    $val = $val . ' mm';
                                                }
                                                if ($key == 'MDMacroscopic_description') {
                                                    $key = 'Maximum dimension';
                                                    $val = $val . ' mm';
                                                }
                                                if ($key == 'Macroscopic') {
                                                    $key = 'Diameter of lesion';
                                                }
                                                if ($key == 'Histological_low') {
                                                    $key = 'Low risk subtype';
                                                }
                                                if ($key == 'n_invasion') {
                                                    $key = 'Perineural invasion† :**';
                                                }
                                                if ($key == 'n_invasion_present') {
                                                    $key = 'If present: Meets criteria to upstage pT1/pT2 to pT3?**';
                                                }
                                                if ($key == 'n_invasion_yes_m') {
                                                    $key = 'If yes: Named nerve';
                                                }
                                                if ($key == 'n_Peripheral') {
                                                    $key = 'Margins†: (Peripheral)';
                                                }
                                                if ($key == 'n_Deep') {
                                                    $key = 'Margins†: (Deep)';
                                                }
                                                if ($key == 'Maximum_Indicate') {
                                                    $key = 'Maximum dimension/diameter of lesion (Indicate which used)';
                                                }
                                                if ($key == 'Maximum_Dimention') {
                                                    $key = '(Dimension)';
                                                }
                                                if ($key == 'Histological_high') {
                                                    $key = 'High risk if present';
                                                }
                                                if ($key == 'n_Histological_Specify_tissue') {
                                                    $key = 'Specify tissue';
                                                }
                                                if ($key == 'n_bone_minor') {
                                                    $key = 'Minor bone erosion';
                                                }
                                                if ($key == 'n_bone_gross') {
                                                    $key = 'Gross cortical/marrow invasion';
                                                }
                                                if ($key == 'n_bone_foraminal') {
                                                    $key = 'Axial/skull base/foraminal invasion';
                                                }
                                                if ($key == 'ptnm') {
                                                    $key = 'pTNM pT';
                                                }
                                                if ($key == 'ptnm_N') {
                                                    $key = 'pTNM pN';
                                                }
                                                if ($key == 'ptnm_M') {
                                                    $key = 'Distant metastasis M';
                                                }
                                                if ($key == 'bcc_comments') {
                                                    $key = 'COMMENTS';
                                                }


                                                if ($this->uri->segment(13) != '') {

                                                    if ($this->uri->segment(13) == 'clinical') {
                                                        $key == 'Maximum clinical dimension/diameter' ? $_PDF_html .= '<tr style="color:black;font-size:15px;font-weight:bold"><td colspan="2">Clinical Data</td></tr>' : '';
                                                    }
                                                    if ($this->uri->segment(13) == 'macro') {
                                                        $key == 'Dimension of specimen (Length)' ? $_PDF_html .= '<tr style="color:black;font-size:15px;font-weight:bold"><td colspan="2">Macroscopic Description</td></tr>' : '';
                                                    }
                                                    if ($this->uri->segment(13) == 'micro') {
                                                        $key == 'Low risk subtype' || $key == 'High risk if present' ? $_PDF_html .= '<tr style="color:black;font-size:15px;font-weight:bold"><td colspan="2">Microscopic Description / Histological Data</td></tr>' : '';
                                                    }
                                                } else {
                                                    $key == 'Maximum clinical dimension/diameter' ? $_PDF_html .= '<tr style="color:black;font-size:15px;font-weight:bold"><td colspan="2">Clinical Data</td></tr>' : '';
                                                    $key == 'Dimension of specimen (Length)' ? $_PDF_html .= '<tr style="color:black;font-size:15px;font-weight:bold"><td colspan="2">Macroscopic Description</td></tr>' : '';
                                                    $key == 'Low risk subtype' || $key == 'High risk if present' ? $_PDF_html .= '<tr style="color:black;font-size:15px;font-weight:bold"><td colspan="2">Microscopic Description / Histological Data</td></tr>' : '';
                                                    $key == 'Maximum dimension/diameter of lesion (Indicate which used)' ? $_PDF_html .= '<tr style="color:black;font-size:15px;font-weight:bold"><td colspan="2">Maximum dimension/diameter of lesion</td></tr>' : '';
                                                    $key == 'pTNM pT' ? $_PDF_html .= '<tr style="color:black;font-size:15px;font-weight:bold"><td colspan="2">pTNM & COMMENTS</td></tr>' : '';
                                                }



                                                $_PDF_html .= "<tr> <td> $key </td> <td> $val </td> </tr>";
                                            }
                                        }

                                        $_PDF_html .= '</table><tcpdf pagebreak="true"/>';
                                    }
                                }

                                $_PDF_html .= <<<EOD
                    </table>
                EOD;
                                echo $_PDF_html;
                                ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>     

                <div id="relatedrecordscollapse" class="collapse">
                <?php
                $hospital_name = '';
                if (!empty($related_query)) {
                    $hospital_name = $this->ion_auth->group($related_query[0]->hospital_group_id)->row()->description;
                    display_related_posts($related_query, $hospital_name);
                } else {
                    echo '<div class="alert alert-info">Sorry No Related Records Found.</div>';
                }
                ?>
                </div>

                <div id="datasets" class="collapse">
                    <?php set_datasets_data($datasets, $record_id); ?>
                </div>

                <div class="row">
                    <div class="col-md-12">
                    <?php
                    if ($this->session->userdata('id') !== '') {
                        $record_id = $this->session->userdata('id');
                    }
                    ?>
                        <?php
                        if ($this->session->flashdata('upload_error') != '') {
                            echo $this->session->flashdata('upload_error');
                        }
                        ?>
                        <?php
                        if ($this->session->flashdata('upload_success') != '') {
                            echo $this->session->flashdata('upload_success');
                        }
                        ?>
                        <?php
                        if ($this->session->flashdata('delete_file') != '') {
                            echo $this->session->flashdata('delete_file');
                        }
                        ?>
                        <div id="relateddocs" class="collapse">
                            <h3>Related Documents</h3>
                            <div class="well">

                        <?php
                        $attributes = array('class' => 'form-inline');
                        echo form_open_multipart("doctor/do_upload_multiple/" . $record_id, $attributes);
                        ?>
                                <!--<form method="post" class="form-inline" enctype="multipart/form-data" action="<?php //echo base_url('index.php/doctor/do_upload/' . $record_id);       ?>">-->
                                <div class="form-group">
                                    <input required id="upload_user_file" class="form-control" type="file"
                                           multiple="" name="userfile[]" />
                                    <select class="form-control" name="file_tag" id="file_type_uploads" required>
                                        <option value="0">Select File Tag</option>
                                        <option value="file">Request Form</option>
                                        <option value="case">Macro Image</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-default">Upload</button>
                                </form>
                                <div class="related-doc-collapse-section collapse">
                                    <div class="well">
                                        <table class="table table-striped">
                                            <h3>Files</h3>
                                            <tr class="bg-info">
                                                <th>File Name</th>
                                                <th>Type</th>
                                                <th>File Ext</th>
                                                <th>View File</th>
                                                <th>Download File</th>
                                                <th>Uploaded by</th>
                                                <th>Upload On</th>
                                            </tr>
            <?php
            if (isset($files) && is_array($files)) {
                $doctor_id = $this->ion_auth->user()->row()->id;
                $record_id = $this->uri->segment(3);
                foreach ($files as $file) {
                    $file_id = $file->files_id;
                    $file_path = $file->file_path;
                    $session_data = array(
                        'file_path' => $file_path
                    );
                    $file_ext = ltrim($file->file_ext, ".");
                    $modify_ext = strtolower($file_ext);
                    $this->session->set_userdata($session_data);
                    ?>
                                                    <tr>
                                                        <td><?php echo $file->title; ?></td>
                                                        <td><?php
                                                    if ($file->is_image == 1) {
                                                        echo '<img src="' . base_url('assets/img/image_type.png') . '" />';
                                                    } else {
                                                        echo '<img src="' . base_url('assets/img/doc_type.png') . '" />';
                                                    }
                                                    ?>
                                                        </td>
                                                        <td><?php echo $file->file_ext; ?></td>
                                                        <td>
                                                            <a class="hover_image" data-exttype="<?php echo $modify_ext; ?>"
                                                               data-imageurl="<?php echo base_url() . 'uploads/' . $file->file_name; ?>"
                                                               href="<?php echo base_url() . 'uploads/' . $file->file_name; ?>" target="_blank">
                                                                <img src="<?php echo base_url('assets/img/view.png'); ?>" />
            <?php echo ucfirst($file->title); ?>
                                                            </a>
            <?php if ($modify_ext === 'png' || $modify_ext === 'jpg') { ?>
                                                                <div style="display:none;" class="hover_image_frame hover_<?php echo $modify_ext; ?>">
                                                                    <img src="<?php echo base_url() . 'uploads/' . $file->file_name; ?>">
                                                                    <hr>
                                                                    <button class="btn btn-warning" id="close_hover_image">Close</button>
                                                                </div>
            <?php } ?>
            <?php if ($modify_ext === 'pdf' || $modify_ext === 'txt') { ?>
                                                                <div style="display:none;" class="hover_image_frame hover_<?php echo $modify_ext; ?>">
                                                                    <iframe width="700" height="500"
                                                                            src="<?php echo base_url() . 'uploads/' . $file->file_name; ?>"></iframe>
                                                                    <hr>
                                                                    <button class="btn btn-warning" id="close_hover_image">Close</button>
                                                                </div>
            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <a download href="<?php echo base_url() . 'uploads/' . $file->file_name; ?>"
                                                               target="_blank">
                                                                <img src="<?php echo base_url('assets/img/download.png'); ?>" />
            <?php echo ucfirst($file->title); ?>
                                                            </a>
                                                        </td>


                                                        <td><?php echo ucwords($file->user); ?></td>
                                                        <td><?php
                                                        $time = $file->upload_date;
                                                        echo date('M j Y g:i A', strtotime($time));
                                                        ?></td>
                                                    </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="further_work" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Further Work</h4>
                            </div>
                            <div class="modal-body">
                                <div class="fw_msg"></div>
                                <form id="further_work_form" method="post">
                                    <div class="form-group">
            <?php
            $req_id = $this->uri->segment(3);
            $doc_name = $this->session->userdata('doc_name');
            $check_count = 1;
            $hospital_id = $request_query[0]->hospital_group_id;
            $get_cost_codes['cost_codes'] = $this->Doctor_model->get_cost_codes($hospital_id);

            if (!empty($get_cost_codes['cost_codes'])) {
                foreach ($get_cost_codes['cost_codes'] as $codes) {
                    $selected = '';
                    $fw_levels = '';
                    if ($codes->ura_cost_code_type == $request_query[0]->fw_levels) {
                        $selected = 'checked disabled';
                        $fw_levels = $codes->ura_cost_code_type;
                    }
                    if ($codes->ura_cost_code_type == $request_query[0]->fw_immunos) {
                        $selected = 'checked disabled';
                        $fw_levels = $codes->ura_cost_code_type;
                    }
                    if ($codes->ura_cost_code_type == $request_query[0]->fw_imf) {
                        $selected = 'checked disabled';
                        $fw_levels = $codes->ura_cost_code_type;
                    }
                ?>
                                                <input type="hidden" name="<?php echo $codes->ura_cost_code_type; ?>"
                                                       value="<?php echo $fw_levels; ?>">

                                                <label
                                                    for="report_check_<?php echo $check_count; ?>"><?php echo $codes->ura_cost_code_desc; ?></label>
                                                <input id="report_check_<?php echo $check_count; ?>" <?php echo $selected; ?>
                                                       name="<?php echo $codes->ura_cost_code_type; ?>" type="checkbox"
                                                       value="<?php echo $codes->ura_cost_code_type; ?>">
            <?php
            $check_count++;
                    }//endforeach
                }//endif
                ?>
                                                </div>
                                    <div class="form-group">
                                        <label>Further Work Date</label>
                                        <input type="text" value="" readonly class="form-control" name="furtherwork_date"
                                               id="furtherwork_date" placeholder="Further Work Date">
                                        <input type="hidden" value="" name="furtherwork_date" id="further_work_date_hide">
                                    </div>
                                    <div class="form-group">
                                        <label for="further_work">Further Work:</label>
                                        <textarea class="form-control" rows="5" id="further_work"
                                                  name="description"></textarea>
                                    </div>
                                    <input type="hidden" name="record_id" value="<?php echo $req_id; ?>">
                                    <input type="hidden" name="hospital_group_id" value="<?php echo $hospital_id; ?>">
                                    <button type="button" id="fw_submit_btn" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

                <?php
                $record_id = $this->uri->segment(3);
                $user_id = $this->ion_auth->user()->row()->id;
                ?>
                <div id="display_iframe_pdf" class="modal fade display_iframe_pdf" role="dialog" data-backdrop="static"
                     data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <object type="application/pdf"
                                        data="<?php echo site_url() . '/doctor/view_report/' . $record_id; ?>" width="100%"
                                        style="height: 80vh;">No Support</object>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                    <?php if ($request_query[0]->specimen_update_status == 1 && $request_query[0]->specimen_publish_status == 0) { ?>
                                    <a class="pull-left" style="cursor: pointer;" id="pdf-icon">
                                        <img data-toggle="tooltip" data-placement="top" title="Click To Publish This Report"
                                             src="<?php echo base_url('assets/img/pdf.png'); ?>">
                                    </a>
                                <?php } else { ?>
                                    <p class="label label-success pull-left" style="font-size:16px;">Report Already Has Been
                                        Published!</p>
                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                                <?php if ($request_query[0]->specimen_update_status == 1 && $request_query[0]->specimen_publish_status == 0) { ?>
                    <div id="user_auth_popup" class="modal fade user_auth_popup" role="dialog" data-backdrop="static"
                         data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Publish Report</h4>
                                </div>
                                <div class="modal-body">
            <?php if (empty($request_query[0]->mdt_case) && empty($request_query[0]->mdt_case_status)) { ?>
                                        <div class="well">
                                            <p>Please Select One Of The MDT Option.</p>
                                            <button class="btn btn-sm btn-success" id="close_popups_for_mdt">Add MDT</button>
                                        </div>
                                    <?php } ?>
                                    <div id="publish_button"></div>
                                    <div class="publish_report_form">
                                        <form class="form" method="post" id="check_auth_pass_form">
                                    <?php
                                    $split_surname = uralensis_get_record_db_detail($record_id, 'sur_name');
                                    if (!empty($split_surname)) {
                                        ?>
                                                <div class="form-group ura-surname-field" data-recordid="<?php echo $record_id; ?>">
                                                    <p><strong>Enter Surname Letters.</strong></p>
                                                    <p><strong>* </strong><em>Insert Surname from Request Form as final ID
                                                            check.</em></p>
                                                <?php
                                                $dom_array = array();
                                                $splitted_name = str_split(strtolower($split_surname));
                                                $custom_split_data = array();
                                                if (!empty($splitted_name)) {
                                                    foreach ($splitted_name as $key_name => $key_value) {
                                                        $dom_array[] = trim($key_value);
                                                        echo '<input maxlength="1" type="text" data-namekey="' . $key_name . '" data-namevalue="' . $key_value . '" name="checksurname[]"> ';
                                                    }
                                                }
                                                ?>
                                                    <input type="hidden" name="surname_data"
                                                           value='<?php echo count($dom_array) - 1; ?>'>
                                                </div>
                                                <div class="ura-pin-area">
                                                    <div class="form-group ura-password-fields">
                                                        <p>Enter Your Pin To Publish This Report.</p>
                                                        <input autofocus maxlength="1" type="password" id="auth_pass1"
                                                               name="auth_pass1">
                                                        <input maxlength="1" type="password" name="auth_pass2">
                                                        <input maxlength="1" type="password" name="auth_pass3">
                                                        <input maxlength="1" type="password" name="auth_pass4">
                                                        <input name="request_id" type="hidden" value="<?php echo $record_id; ?>">
                                                        <input name="user_id" type="hidden" value="<?php echo $user_id; ?>">
            <?php
            if (empty($request_query[0]->mdt_case) && empty($request_query[0]->mdt_case_status)) {
                echo '<input name="mdt_not_select" type="hidden" value="mdt_uncheck">';
            }
            ?>
                                                    </div>
                                                    <div class="form-group"><button type="button" id="check_pass"
                                                                                    class="btn btn-warning pull-right">Submit</button></div>
                                                </div>
                                                <div class="clearfix"></div>
            <?php
            } else {
                echo 'Please enter the surname first.';
            }
            ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div id="request_for_opinion" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form class="form opinion_cases_form">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <div class="col-md-5">
                                    <h4 class="modal-title">Opinion Request</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="checkbox-wrap checkbox-primary">
                                                Internal
                                                <input type="radio" class="internal_external_radio" name="internal_opnion_request" value="internal" id="internal_opnion_request" checked>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="checkbox-wrap checkbox-primary">External
                                                <input type="radio" class="internal_external_radio" name="internal_opnion_request" value="external" id="external_opnion_request">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="modal-body">
            <!--                            --><?php //echo "<pre>";print_r($all_doctors_list);exit;?>

            <?php $rec_id = $this->uri->segment(3); ?>
            <!--                            <form class="form opinion_cases_form">-->
                                    <input type="hidden" value="<?php echo $specimen_query[0]->patient_initial;?>" name="request_patient_initials" id="request_patient_initials">
                                    <input type="hidden" value="<?php echo $specimen_query[0]->lab_number;?>" name="request_lab_no" id="request_lab_no">
                                    <input type="hidden" value="<?php echo $specimen_query[0]->age;?>" name="request_age" id="request_age">
                                    <input type="hidden" value="<?php echo $specimen_query[0]->dob;?>" name="request_dob" id="request_dob">
                                    <input type="hidden" value="<?php echo $hospital_name;?>" name="request_hospital_name" id="request_hospital_name">
                                    <?php
                                    foreach ($slide_data as $slideData){
                                        foreach ($slideData['slides'] as $singleSlide){
                                            ?>
                                            <input type="hidden" value="<?php echo $singleSlide['url'];?>" name="request_slide_<?php echo $singleSlide['specimen_id']; ?>[]">
                                        <?php }
                                    }
                                    ?>
                                    <div class="form-group" id="opinion_internal_email_div">
                                        <label for="opinion_case_doctors">Choose Doctors</label>
                                        <select name="opinion_case_doctors" id="opinion_case_doctors" class="form-control select_multiple_imgs">
                                            <option value="">Nothing Selected</option>
                                            <?php
                                            if (!empty($all_doctors_list)) {
                                                foreach ($all_doctors_list as $value) {?>
                                                    <option value="<?php echo $value->id; ?>" title="<?php echo $value->profile_picture_path;?>">
                                                        <?php echo $value->first_name . ' ' . $value->last_name; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group" id="opinion_external_email_div" style="display: none;">
                                        <label>Email</label>
                                        <input type="text" value="" readonly class="form-control" name="opinion_external_email"
                                               id="opinion_external_email" placeholder="External Email">
                                    </div>
                                    <div class="form-group">
                                        <label>Opinion Request Date</label>
                                        <input type="text" value="" readonly class="form-control" name="opinion_date"
                                               id="opinion_date" placeholder="Opinion Request Date">
                                        <input type="hidden" value="" name="opinion_date" id="opinion_date_hide">
                                    </div>
                                    <div class="form-group">
                                        <label>Opinion Request Due Date</label>
                                        <input type="text" value="" readonly class="form-control datepicker_new" name="opinion_last_date"
                                               id="opinion_last_date" placeholder="Opinion Request Last Date">
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-2">
                                            <label class="checkbox-wrap checkbox-primary" style="margin: 5px 0;">All
                                                <input type="checkbox" name="external_opnion_request" id="external_opnion_request">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="col-md-4 nopadding-left dropdown">
                                                <label>Specimens</label>
                                                <select class="select2" id="email_request_specimen" name="email_request_specimen">
                                                    <option value="">--Select--</option>
                                                    <option value="48637_1">Specimen 1</option>
                                                    <?php if($specimen_query[0]->lab_number!="PH0002B") {?>
                                                        <option value="48612_2">Specimen 2</option>
                                                    <?php }?>
                        <!--                                                --><?php //$sp_counter=1;foreach ($specimen_query as $spec_date){ ?>
                        <!--                                                    <option value="--><?php //echo $spec_date->specimen_id."_".$sp_counter;?><!--">--><?php //echo "Specimen ".$sp_counter++;?><!--</option>-->
                        <!--                                                --><?php //} ?>
                                                                    </select>
                        <!--                                            --><?php
                        //                                            $counter=1;
                        //                                            foreach ($slide_data as $slideData){
                        //                                                echo "<select class='select2' name='slide_specimen[]'>";
                        //                                                echo "<option value=''>Specimen $counter</option>";
                        //                                                echo "<option value='a'>Specimen $counter</option>";$counter++;
                        //                                                echo "<option value='all'>ALL</option>";
                        //                                                foreach ($slideData['slides'] as $singleSlide){
                        //                                                    ?>
                        <!--                                                    <option value="--><?php //echo $singleSlide['url'];?><!--">--><?php //echo $singleSlide['url'];?><!--</option>-->
                        <!--                                                --><?php //}
                        //                                                echo "</select>";
                        //                                            }
                        //                                            ?>
                                                                </div>
                        <!--                                        <div class="col-md-4 nopadding-left dropdown">-->
                        <!--                                          <button class="btn btn-primary dropdown-toggle btn-rounded btn-block" type="button" data-toggle="dropdown">Specimen 1-->
                        <!--                                          <span class="caret"></span></button>-->
                        <!--                                          <ul class="dropdown-menu">-->
                        <!--                                            <li><a href="#">All</a></li>-->
                        <!--                                            <li><a href="#">Slide 1</a></li>-->
                        <!--                                            <li><a href="#">Slide 2</a></li>-->
                        <!--                                            <li><a href="#">Slide 3</a></li>-->
                        <!--                                          </ul>-->
                        <!--                                        </div>-->
                        <!--                                        <div class="col-md-4 nopadding-left dropdown">-->
                        <!--                                          <button class="btn btn-primary dropdown-toggle btn-rounded btn-block" type="button" data-toggle="dropdown">Specimen 2-->
                        <!--                                          <span class="caret"></span></button>-->
                        <!--                                          <ul class="dropdown-menu">-->
                        <!--                                            <li><a href="#">All</a></li>-->
                        <!--                                            <li><a href="#">Slide 1</a></li>-->
                        <!--                                            <li><a href="#">Slide 2</a></li>-->
                        <!--                                            <li><a href="#">Slide 3</a></li>-->
                        <!--                                          </ul>-->
                        <!--                                        </div>-->
                                            
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="opinion_comment">Opinion Comment</label>
                                        <textarea id="opinion_comment" name="opinion_comment"
                                                  class="form-control"></textarea>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <ul class="list-inline custom_list_opi">
                                                    <li>
                                                        <a href="javascript:;" class="btn btn-default btn-block btn-comment-text">Consensus Opinion</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" class="btn btn-default btn-block btn-comment-text">Difficult Case</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" class="btn btn-default btn-block btn-comment-text">Not sure if benign or malignant</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" class="btn btn-default btn-block btn-comment-text">Looks inflammatory</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" class="btn btn-default btn-block btn-comment-text">Any dysplasia?</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" class="btn btn-default btn-block btn-comment-text">Wonder if malignant</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" class="btn btn-default btn-block btn-comment-text">Thank You</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" class="btn btn-default btn-block btn-comment-text">Think it is benign?</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="record_id" value="<?php echo $rec_id; ?>">
                                    <div class="col-md-6 col-md-offset-3 form-group">
                                        <button type="button" class="btn btn-success btn-lg btn-block assign_to_opinion_case">Assign</button>
                                    </div>
                <!--                            </form>-->
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="assign_doctor_modal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Assign to other doctor</h4>
                            </div>
                            <div class="modal-body">
                                <div class="assign_doctor_and_authorize">
                                    <div class="doctor_assign_msg"></div>
                                    <form id="doctor_assign_form">
                                        <select class="form-control" name="assign_doctor" id="assign_doctor">
                                            <option value="0">Choose Doctor</option>
            <?php
            if (!empty($list_doctors)) {
                foreach ($list_doctors as $value) {
            ?>
                                                    <option value="<?php echo $value->id; ?>">
                                                    <?php echo $value->first_name . ' ' . $value->last_name; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <input type="hidden" name="record_id" value="<?php echo $record_id; ?>">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="teaching_cpc_modal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Education and CPC</h4>
                            </div>
                            <div class="modal-body">
                                <form id="teach_and_mdt_form" class="form teach_and_mdt_form">
                                    <div class="teach_mdt_cpc_msg"></div>
                                    <div class="form-group">
                                        <label for="education_cats">Education</label>
                                        <select name="education_cats" id="education_cats" class="form-control">
                                            <option value="0">Select Education Category</option>
                <?php
                if (!empty($education_cats)) {
                    foreach ($education_cats as $cats) {
                        $selected = '';
                        if ($cats->ura_tec_mdt_id === $request_query[0]->teaching_case) {
                            $selected = 'selected';
                        }
                        echo '<option ' . $selected . ' value="' . $cats->ura_tec_mdt_id . '">' . $cats->ura_tech_mdt_cat . '</option>';
                    }
                }
                ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="cpc_cats">CPC</label>
                                        <select name="cpc_cats" id="cpc_cats" class="form-control">
                                            <option value="0">Select CPC Category</option>
                    <?php
                    if (!empty($cpc_cats)) {
                        foreach ($cpc_cats as $cats) {
                            echo '<option value="' . $cats->ura_tec_mdt_id . '">' . $cats->ura_tech_mdt_cat . '</option>';
                        }
                    }
                    ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="record_id" id="record_id"
                                               value="<?php echo $record_id; ?>">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="record_download_history" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Record Download History</h4>
                            </div>
                            <div class="modal-body">
                                <table class='table table-bordered'>
                                    <tr>
                                        <th>ID</th>
                                        <th>Record</th>
                                        <th>Timestamp</th>
                                    </tr>
                <?php
                if (!empty($download_history)) {
                    foreach ($download_history as $key => $value) {
                        $timestamp = '';
                        if (!empty($value['ura_bulk_report_timestamp'])) {
                            $timestamp = date('d-m-Y H:i:s', $value['ura_bulk_report_timestamp']);
                        }
                        ?>
                                            <tr>
                                                <td><?php echo $value['ura_bulk_report_history']; ?></td>
                                                <td><?php echo $value['ura_bulk_report_record_data']; ?></td>
                                                <td><?php echo $timestamp; ?></td>
                                            </tr>
                <?php
                    }
                }
                ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php record_history($record_history, $userid, $record_add_timestamp, $add_full_name); ?>

                <div id="mdt_data_modal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content" style="float:left;width:100%;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Assign to MDT</h4>
                            </div>
                            <div class="modal-body">
                                <div class="record_detail_page">
                <?php
                $recordid = $this->uri->segment(3);
                display_mdt($mdt_cats, $recordid, $request_query, $mdt_assign_dates);
                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Show this modal when user wants to add message-->
                <div id="mdt_message_modal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content" style="width:100%;float:left;">
                            <div class="modal-header">
                                <h4 class="modal-title">MDT Message</h4>
                            </div>
                            <div class="modal-body">

                                <form class="form" id="mdt_message_form">
                                    <div class="form-group">
                                        <label for="add_mdt_message">Add MDT Message</label>
                                        <textarea class="form-control" id="add_mdt_message" name="mdt_message"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="record_id" value="<?php echo $this->uri->segment(3); ?>">
                                        <button class="btn btn-primary" id="add_mdt_msg_btn">Add Message</button>
                                        <button class="btn btn-warning pull-right" id="leave_mdt_notes_msg_btn">Leave
                                            this.</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Show this modal when user wants to add message-->
                <div id="add_supplementary" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add Supplementary</h4>
                            </div>
                            <div class="modal-body">
                    <?php
                    $attributes = array('id' => 'addiotional', 'class' => 'addiotional');
                    echo form_open(site_url() . "/doctor/additional_work", $attributes);
                    ?>
                                <!-- <form method="post" action="<?php echo site_url('doctor/additional_work'); ?>">-->
                                <div class="form-group">
                                    <label for="additional_work">Add Supplementary Report:</label>
                                    <textarea class="form-control" rows="5" id="additional_work"
                                              name="additional_description"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php show_supplementary_modal($record_id, $supplementary_query); ?>
            </div>
        </div>

    

    <div class="tg-haslayout">
        <div class="container-fluid"  style="">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php
            if (empty($opinion_data)) {
                $opinion_data = array();
            }

            $hospital_id = $request_query[0]->hospital_group_id;
            $get_cost_codes['cost_codes'] = $this->Doctor_model->get_cost_codes_by_block($hospital_id);

            get_specimens($specimen_query, $request_query, $request_query[0]->uralensis_request_id, $get_cost_codes['cost_codes'], $opinion_data, $specimen_accepted_by, $specimen_assisted_by, $specimen_block_checked_by, $specimen_cutup_by, $specimen_labeled_by, $specimen_qcd_by, $slide_data, $specimen_blocks);
            ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php
            if (empty($opinion_data)) {
                $opinion_data = array();
            }
            if (!empty($request_query[0]->comment_section)) {
                comment_section($record_id, $request_query, $opinion_data);
            }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <?php
            if (empty($opinion_data)) {
                $opinion_data = array();
            }

            if (!empty($request_query[0]->special_notes)) {
                if (class_exists('Notes')) {
                    Notes::special_notes($record_id, $request_query, $opinion_data);
                }
            }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php
            if (empty($opinion_data)) {
                $opinion_data = array();
            }
            if (empty($opinion_data_reply['opinion_data_reply'])) {
                $opinion_data_reply = array();
            }
            if (class_exists('Opinion_Cases')) {
                Opinion_Cases::display_comments($record_id, $opinion_data, $opinion_data_reply);
            }
            ?>
        </div>
    </div>
</div>
</div>
    <div class="clearfix"></div>

<div id="view_doc" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        <?php echo form_open_multipart(uri_string(), array('id' => 'edit_cv_appraisal', 'name' => 'edit_cv_appraisal')); ?>
                    <input type="hidden" name="edit_cv_appraisal" value="1">
                    <div class="modal-body" id="doc_embed">
        <?php $file_path = $cv_appr_data['cv_doc_file_name']; ?>

            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <hr>
                    <span id="total_docs" style="float:left; padding: 0px 0px 10px 0px">Total Uploaded Document(s): 0</span>
                </div>
                <div class="col-md-6">
                    <a href="javascript:void(0)" class="btn btn-primary pull-left" id="prev_button">Previous</a>
                </div>
                <div class="col-md-6">
                    <a href="javascript:void(0)" class="btn btn-primary pull-right" id="next_button">Next</a>
                </div>
            </div>
    <?php echo form_close(); ?>
        </div>
    </div>
</div>

<div id="capture_webcam" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <?php echo form_open_multipart("doctor/do_upload_captured/" . $record_id, array('id' => 'form_capture_webcam_image', 'name' => 'form_capture_webcam_image')); ?>
            <div class="modal-body" id="doc_embed">
                <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
                <input type="hidden" name="record_id" id="record_id" value="<?php echo $record_id; ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div id="my_camera"></div>
                        <br/>
                        <input type="button" class="btn btn-primary" value="Take Snapshot" onClick="take_snapshot()">
                        <input type="hidden" name="image" class="image-tag">
                    </div>
                    <div class="col-md-6">
                        <div id="results" style="text-align: center">Your captured image will appear here...</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <hr>
                    <button id="submit_captured_photo" class="btn btn-primary">Save Image</button>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script>
    var micro_data = <?php echo json_encode($micro_codes_data); ?>;
</script>


<script defer type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
    function viewRecord(id) {
        var url = new URL(
                "<?php echo base_url('/doctor/doctor_record_detail/' . $request_query[0]->uralensis_request_id . '/view'); ?>"
                );
        url.searchParams.append('slide', id);
        window.location.href = url.href;
        console.log(url.href);
    }

    $(document).ready(function () {

        var data = JSON.parse('<?php echo json_encode($slide_data); ?>');


        $('.doctor-detail-specimen-tab').click(function () {
            var id = $(this).attr('id');
            var index = id.split("-")[4];
            console.log(index);
            $(".slide-image-container").hide();
            $("#slide-image-container-" + index).show();
        });
        $(".form_input_container input").focusin(function(){
            $(this).parent().addClass("focused");
        });
        $(".form_input_container input").focusout(function(){
            $(this).parent().removeClass("focused");
        });

        $('#slide-carousel').slick({
            slidesToShow: 6,
            slidesToScroll: 6,
        });
        $("#slide-carousel").show();

        $(".thumbnail_slide_img").on('load', function () {
            var height = $(this).height();
            var width = $(this).width();
            if (height == 0)
                return;
            var ratio = height / width;
            if (width > 100) {
                width = 100;
                height = width * ratio;
            }
            $(this).height(height);
            $(this).width(width);
        });

        setTimeout(function () {
            $(".thumbnail_slide_img").each(function () {
                var height = $(this).height();
                var width = $(this).width();
                if (height == 0)
                    return;
                var ratio = height / width;
                if (width > 100) {
                    width = 100;
                    height = width * ratio;
                }
                $(this).height(height);
                $(this).width(width);
            });
        }, 1000);

        setTimeout(function () {
            $("#bridgehead-button").off();
            $("#bridgehead-button").click(function () {
                window.open("<?php echo BRIDGEHEAD_URL . '' . $request_query[0]->nhs_number; ?>", '_blank');
            });
        }, 500);

    });

    function embed_doc() {
        var base_url = '<?php echo base_url(); ?>';
        var files = <?php echo json_encode($files); ?>;
        var total_files = files.length;
        // console.log(files[0]); return false;
        first_file = base_url + 'uploads/' + files[0]['file_name'];


        var embed_div = document.getElementById('doc_embed');
        var total_docs_span = document.getElementById('total_docs');
        total_docs_span.innerHTML = "";
        total_docs_span.innerHTML = "Total Uploaded Document(s): " + total_files;

        embed_div.innerHTML = "";
        embed_div.innerHTML = "<embed src='" + first_file + "' name='embeded_doc'  frameborder='0' width='100%' height='600px'>";

        var i = 0;

        function nextItem() {
            i = i + 1; // increase i by one
            i = i % files.length; // if we've gone too high, start from `0` again
            return base_url + 'uploads/' + files[i]['file_name'];
            // return files[i]; // give us back the item of where we are now
        }

        function prevItem() {
            if (i === 0) { // i would become 0
                i = files.length; // so put it at the other end of the array
            }
            i = i - 1; // decrease by one
            return base_url + 'uploads/' + files[i]['file_name'];
            // return files[i]; // give us back the item of where we are now
        }

        document.getElementById('prev_button').addEventListener(
                'click', // we want to listen for a click
                function (e) { // the e here is the event itself
                    var prev_file = prevItem();
                    embed_div.innerHTML = "";
                    embed_div.innerHTML = "<embed src='" + prev_file + "' name='embeded_doc' type='application/pdf' frameborder='0' width='100%' height='600px'>";

                }
        );

        document.getElementById('next_button').addEventListener(
                'click', // we want to listen for a click
                function (e) { // the e here is the event itself
                    var next_file = nextItem();
                    embed_div.innerHTML = "";
                    embed_div.innerHTML = "<embed src='" + next_file + "' name='embeded_doc' type='application/pdf' frameborder='0' width='100%' height='600px'>";

                }
        );

    }
</script>