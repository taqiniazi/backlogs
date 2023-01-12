<link rel="stylesheet" href="<?php echo base_url('/assets/newtheme/css/bootstrap.min.css'); ?>">
<link href="<?php echo base_url('/assets/css/bootstrap-select.min.css'); ?>" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url('/assets/newtheme/css/font-awesome.min.css'); ?>">
<!-- Lineawesome CSS -->
<link rel="stylesheet" href="<?php echo base_url('/assets/newtheme/css/line-awesome.min.css'); ?>">
<!-- Datatable CSS -->
<link rel="stylesheet" href="<?php echo base_url('/assets/newtheme/css/dataTables.bootstrap4.min.css'); ?>">
<!-- Select2 CSS -->
<link rel="stylesheet" href="<?php echo base_url('/assets/newtheme/css/select2.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('/assets/css/jquery-ui.css'); ?>">
<!-- Stickey CSS -->
<link rel="stylesheet" href="<?php echo base_url('/assets/css/sticky.css'); ?>">
<!-- Main Custom CSS -->
<!-- Tagsinput CSS -->
<link rel="stylesheet" href="<?php echo base_url('/assets/newtheme/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css'); ?>">
<!--Full Calendar CSS Files-->
<link href='<?php echo base_url('assets/newtheme/css/fullcalendar.min.css'); ?>' rel='stylesheet' />
<!--Full Calendar CSS Files-->
<!-- Summernote CSS -->
<link rel="stylesheet" href="<?php echo base_url('/assets/newtheme/plugins/summernote/dist/summernote-bs4.css'); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
<link href="<?php echo base_url('/assets/css/themify-icons.css'); ?>" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/redmond.datepick.css'); ?>">
<!-- Datetimepicker CSS -->
<link rel="stylesheet" href="<?php echo base_url('/assets/subassets/css/new_jquery.datetimepicker.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('/assets/newtheme/css/bootstrap-datetimepicker.min.css') ?>">
<!-- Main CSS -->
<link rel="stylesheet" href="<?php echo base_url('/assets/newtheme/css/dataset.css'); ?>">
<!-- <link rel="stylesheet" href="<?php echo base_url('/assets/newtheme/css/style.css'); ?>"> -->
<script src="<?php echo base_url('/assets/js/patient/patients.js'); ?>"></script>
<style type="text/css">
    label {
        color: black;
    }

    .editPatient {
        height: 100% !important;
        max-height: 100% !important;
    }

    .nav-pills>.active {
        border-bottom: 2px solid #007bff;
        background: #ccc;
    }

    #exTab1 .tab-content {
        color: white;
        padding: 0;
    }

    #exTab2 h3 {
        color: white;
        background-color: #428bca;
        padding: 5px 15px;
    }

    .tg-inputwithicon input {
        padding-left: 32px;
    }

    .tg-inputwithicon i {
        position: absolute;
        left: 0px;

    }

    /* remove border radius for the tab */

    #exTab1 .nav-pills>li>a {
        border-radius: 0;
    }

    /* change border radius for the tab , apply corners on top*/

    #exTab3 .nav-pills>li>a {
        border-radius: 4px 4px 0 0;
    }

    #exTab3 .tab-content {
        color: white;
        border: 1px solid #000;
        padding: 5px 15px;
    }

    #add_patient .card-body {
        padding: 10px;
    }

    #add_patient .form-group {
        margin-bottom: 10px;
    }

    #add_patient .tg-inputwithicon i {
        top: 0px;
        color: #000;
    }
    .tg-uploaduserimg1 {
    position: absolute;
    bottom: 5px;
    right: 3px;
    background: #666;
    width: 30px;
    text-align: center;
    height: 30px;
    border-radius: 50%;
    line-height: 2.1;
    color: #fff;
    z-index: 20;
}
select.form-control {
    height: 39px;
}
.select2-container .select2-selection--single {
    border: 1px solid #ced4da;
    height: 39px;
   
}

select.form-control {
    height: 39px;
}
select.form-control {
    height: 44px;
}
select.form-control {
    height: 40px;
}
.form-control {
    font-size: 14px;
    color: #666;
   
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    font-size: 14px;
    color: #666;
    line-height: 38px;
}
#exTab1 .nav-pills {
    justify-content: center;
    align-items: center;
    margin-bottom: 15px;
}
#exTab1 .tab_li a {
    color: #fff;
    background: #03c5fc;
    padding: 10px 12px;
    margin: 0px 5px;
}
#exTab1 .nav-pills > .active {
    border-bottom: 0px solid #007bff;
    background: transparent;
}
#exTab1 .nav-pills > .active a {
    background: #00b4f4;
}   
.custom-modal .close {
    background-color: #a0a0a0;
    border-radius: 50%;
    color: #fff;
    font-size: 13px;
    height: 20px;
    line-height: 20px;
    margin: 0;
    opacity: 1;
    padding: 0;
    position: absolute;
    right: 10px;
    top: 10px;
    width: 20px;
    z-index: 99;
}
.btn {
    border-radius: 0px;
    font-size: 16px;
}
@media (min-width: 576px){
    
    .modal-dialog {
        max-width: 500px;
        margin: 1.75rem auto;
    }
}
@media (min-width: 992px){

    .modal-lg, .modal-xl {
        max-width: 920px;
    }
}
.btn-success {
    background-color: #55ce63;
    border: 1px solid #55ce63;
}
.btn-warning {
    background: #ffbc34;
    border: 1px solid #ffbc34;
}
    /* #add_patient .icon-pt i {
        top: 45px;
    } */
</style>
<div class="modal-dialog modal-dialog-centered modal-lg" role="document" data-backdrop="static">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Edit Patient</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body editPatient">
            <div class="">
                <div id="exTab1" class="container">
                    <ul class="nav nav-pills">
                        <li class="active tab_li">
                            <a href="#1a" data-toggle="tab" id='tb1'>&nbsp;Patient Detail &nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </li>
                        <li class="tab_li"><a href="#2a" data-toggle="tab" id='tb2'>&nbsp;Health Fund Information&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                        <li class="tab_li"><a href="#3a" data-toggle="tab" id='tb3'>&nbsp;Other Detail&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                        <li class="tab_li"><a href="#4a" data-toggle="tab" id='tb4'>&nbsp;Other Identifier&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                        <li class="tab_li"><a href="#5a" data-toggle="tab" id='tb5'>&nbsp;Other Data&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                    </ul>
                    <div class="tab-content clearfix">
                        <div class="tab-pane active" id="1a">
                            <?php echo form_open_multipart('', array('id' => 'record-add-patient-form', 'class' => 'tg-formtheme create_user_form')); ?>
                            <input type="hidden" name='pid' value='<?= $patient['id'] ?>' id="pid" class="pt_id">
                            <input type="hidden" name='rid' value='<?= $recordId ?>' id="rid">
                            <input type="hidden" name='<?= $this->security->get_csrf_token_name(); ?>' value='<?= $this->security->get_csrf_hash(); ?>'>
                            <div class="card mb-4">
                                <div class="card-body">
                                    <!-- Patient Personal Information START -->
                                    <fieldset>
                                        <div class="col-12">
                                            <!-- <div class="d-flex" style="display:flex; justify-content:center; height:150px;">
                                                <div class="profile-view" style="width:120px;">
                                                    <div class="profile-img-wrap">
                                                        <div class="profile-img">
                                                            <div class="tg-rightarea tg-useruploadimgholder">
                                                                <div id="plupload-profile-container"></div>
                                                                <div class="">
                                                                    <img class="profile-pic img-fluid rounded-circle" id="patient-profile-pic" src="<?php echo ($profile_picture_path) ? $profile_picture_path : base_url() . "assets/img/user.jpg"; ?>">
                                                                </div>
                                                            </div>
                                                            <div id="profile-picture-picker" class="tg-uploaduserimg tg-uploaduserimg1">
                                                                    <a id="profile_image_uplaod" class="">
                                                                        <i class="fa fa-camera upload-button"></i>
                                                                    </a>
                                                                </div>
                                                            <input class="file-upload" type="file" id="txt_profile_pic" name="profile_pic" accept="image/*" />
                                                        </div>
                                                    </div>
                                                </div>

                                            </div> -->
                                        </div>
                                        <div class="form-group">
                                            <?php
                                            //print $group_type."========";

                                            if ($group_type == 'H') { ?>
                                                <input type="hidden" id="group-input" name="group" value="<?php echo $hospitals[0]['id']; ?>">
                                                <input type="text" readonly disabled name="group-text" value="<?php echo $hospitals[0]['description']; ?>" class="form-control">
                                            <?php }
                                            ?>
                                            <label>Select Hospital</label>
                                            <select type="text" name="group" id="group-input" value="" class="form-control select">
                                                <?php foreach ($hospitals as $hospital) : ?>
                                                    <option value="<?php echo $hospital['id'] ?>" <?php echo ($patient['hospital_id'] == $hospital['id']) ? "selected" : ""; ?>><?php echo $hospital['description']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php  ?>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group tg-inputwithicon">

                                                    <Select type="text" name="title" id="title-input" class="form-control">
                                                        <option value="Mr." <?php echo ($patient['title'] == "Mr.") ? "selected" : ""; ?>>Mr.</option>
                                                        <option value="Mrs." <?php echo ($patient['title'] == "Mrs.") ? "selected" : ""; ?>>Mrs.</option>
                                                        <option value="Miss." <?php echo ($patient['title'] == "Miss.") ? "selected" : ""; ?>>Miss.</option>
                                                    </Select>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group tg-inputwithicon">
                                                    <i class="lnr lnr-user"></i>
                                                    <input type="text" name="first_name" id="first-name-input" value="<?php echo ($patient['first_name'] != '') ? $patient['first_name'] : ""; ?>" class="form-control" placeholder="First Name">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group tg-inputwithicon">
                                                    <i class="lnr lnr-user"></i>
                                                    <input type="text" name="last_name" id="last-name-input" value="<?php echo ($patient['last_name'] != '') ? $patient['last_name'] : ""; ?>" class="form-control" placeholder="Last Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group tg-inputwithicon">
                                                    <i class="lnr lnr-user"></i>
                                                    <input type="text" name="mrn_number" id="mrn_number" value="<?php echo ($patient['mrn_number'] != '') ? $patient['mrn_number'] : ""; ?>" class="form-control" placeholder="MRN Number">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group tg-inputwithicon">
                                                    <i class="lnr lnr-user"></i>
                                                    <input type="text" name="other_name" id="other_name-input" value="<?php echo ($patient['other_name'] != '') ? $patient['other_name'] : ""; ?>" class="form-control" placeholder="Other Name">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group tg-inputwithicon">
                                                    <i class="lnr lnr-user"></i>
                                                    <input type="text" name="nick_name" id="nick_name-input" value="<?php echo ($patient['nick_name'] != '') ? $patient['nick_name'] : ""; ?>" class="form-control" placeholder="Nick Name">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group tg-inputwithicon">
                                                            <i class="lnr lnr-license"></i>
                                                            <input type="text" name="nhs_number" id="nhs-number-input" value="" class="form-control" placeholder="NHS Number">
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group tg-inputwithicon">
                                                            <i class="lnr lnr-license"></i>
                                                            <input type="text" name="hospital_id" id="hospital-id-input" value="" class="form-control" placeholder="Hospital No">
                                                        </div>
                                                    </div>
                                                </div>-->
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="gender-input">Gender</label>
                                                    <select name="gender" id="gender-input" value="" class="form-control">
                                                        <option value="Male" <?php echo ($patient['gender'] == "Male") ? "selected" : ""; ?>>Male</option>
                                                        <option value="Female" <?php echo ($patient['gender'] == "Female") ? "selected" : ""; ?>>Female</option>
                                                        <option value="Other" <?php echo ($patient['gender'] == "Other") ? "selected" : ""; ?>>Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 ">
                                                <div class="form-group tg-inputwithicon">
                                                    <label for="dob-input">Date of Birth</label>
                                                    <i class="lnr lnr-calendar-full" style="top: 27px;"></i>
                                                    <input type="date" name="dob" id="dob-input" value="<?php echo ($patient['dob'] != '') ? $patient['dob'] : ""; ?>" class="form-control" placeholder="Date Of Birth">
                                                </div>
                                            </div>


                                            <div class="col-md-3" id="password-row">
                                                <div class="form-group tg-inputwithicon icon-pt" style="margin-top: 32px;">
                                                    <i class="lnr lnr-envelope"></i>
                                                    <input type="email" name="email" id="email-input" value="<?php echo ($patient['email'] != '') ? $patient['email'] : ""; ?>" class="form-control" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group tg-inputwithicon icon-pt" style="margin-top: 32px;">

                                                    <i class="lnr lnr-phone-handset"></i>

                                                    <input type="text" name="phone" id="phone-input" value="<?php echo ($patient['phone'] != '') ? $patient['phone'] : ""; ?>" class="form-control" placeholder="Phone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group tg-inputwithicon">
                                                    <label for="Medicare Card Number">Medicare Card Number</label>
                                                    <i class="lnr lnr-license" style="top: 28px !important;"></i>
                                                    <input type="text" name="medicare_card_no" id="medicare_card_no" value="<?php echo ($patient['medicare_card_no'] != '') ? $patient['medicare_card_no'] : ""; ?>" class="form-control" placeholder="Medicare Card Number">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group tg-inputwithicon">
                                                    <label for="Medicare Card Number">Hospital Status</label>
                                                    <select name="hospital_status" id="hospital_status" class="form-control">
                                                        <option value="">-Select Hospital Status-</option>
                                                        <option value="A private patient in a private hospital or approved day hospital facility" <?php echo ($patient['hospital_status'] == "A private patient in a private hospital or approved day hospital facility") ? "selected" : ""; ?>>
                                                            A private patient in a private hospital or approved day hospital facility
                                                        </option>
                                                        <option value="A private patient in a recognised hospital" <?php echo ($patient['hospital_status'] == "A private patient in a recognised hospital") ? "selected" : ""; ?>>
                                                            A private patient in a recognised hospital
                                                        </option>
                                                        <option value="A public patient in a recognised hospital" <?php echo ($patient['hospital_status'] == "A public patient in a recognised hospital") ? "selected" : ""; ?>>
                                                            A public patient in a recognised hospital
                                                        </option>
                                                        <option value="An outpatient of a recognised hospital" <?php echo ($patient['hospital_status'] == "An outpatient of a recognised hospital") ? "selected" : ""; ?>>
                                                            An outpatient of a recognised hospital
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group tg-inputwithicon">
                                                            <label for="address1-input">Patient ID</label>
                                                            <i class="lnr lnr-apartment"></i>
                                                            <input type="text" name="p_id_1" id="p_id_1" value="" class="form-control" placeholder="Patient ID 1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group tg-inputwithicon">
                                               
                                                            <i class="lnr lnr-apartment"></i>
                                                            <input type="text" name="p_id_2" id="p_id_2" value="" class="form-control" placeholder="Patient ID 2">
                                                        </div>
                                                    </div>
                                                </div> -->
                                        <?php
                                        // if ($_GET['p']) {
                                        $addressInfo = explode('\n', $patient['address_1']);
                                        // }
                                        ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group tg-inputwithicon">
                                                    <label for="address1-input">Address</label>
                                                    <i class="lnr lnr-apartment" style="top: 28px !important;"></i>
                                                    <input type="text" name="address1" id="address1-input" value="<?php echo ($addressInfo[0] != '') ? $addressInfo[0] : ""; ?>" class="form-control" placeholder="Address Line 1">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group tg-inputwithicon icon-pt" style="margin-top:32px;">
                                                    <i class="lnr lnr-apartment"></i>
                                                    <input type="text" name="address2" id="address2-input" value="<?php echo ($addressInfo[1] != '') ? $addressInfo[1] : ""; ?>" class="form-control" placeholder="Address Line 2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group tg-inputwithicon">
                                                    <i class="lnr lnr-map-marker"></i>
                                                    <input type="text" name="suburb" id="suburb-input" value="<?php echo ($patient['suburb'] != '') ? $patient['suburb'] : ""; ?>" class="form-control" placeholder="Suburb">
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-6">
                                                        <div class="form-group tg-inputwithicon">
                                                            <i class="lnr lnr-map"></i>
                                                            <input type="text" name="state" id="state-input" value="" class="form-control" placeholder="State">
                                                        </div>
                                                    </div>-->


                                            <div class="col-md-4">
                                                <div class="form-group tg-inputwithicon">
                                                    <i class="lnr lnr-earth"></i>
                                                    <input type="text" name="town" id="town-input" value="<?php echo ($patient['town'] != '') ? $patient['town'] : ""; ?>" class="form-control" placeholder="state">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group tg-inputwithicon">
                                                    <i class="lnr lnr-pushpin"></i>
                                                    <input type="text" name="post_code" id="post-code-input" value="<?php echo ($patient['post_code'] != '') ? $patient['post_code'] : ""; ?>" class="form-control" placeholder="Post Code">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="home-input">Contact Information</label>
                                                    <input type="text" name="home" id="home-input" value="<?php echo ($patient['home_contact'] != '') ? $patient['home_contact'] : ""; ?>" class="form-control" placeholder="Home Contact Number">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group tg-inputwithicon">
                                                    <input type="text" name="mobile" id="mobile-input" value="<?php echo ($patient['mobile'] != '') ? $patient['mobile'] : ""; ?>" class="form-control" placeholder="Mobile Number" style="margin-top: 35px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group tg-inputwithicon">
                                                    <i class="lnr lnr-apartment"></i>
                                                    <input type="text" name="business_contact" id="business_contact-input" value="<?php echo ($patient['business_contact'] != '') ? $patient['business_contact'] : ""; ?>" class="form-control" placeholder="Business Contact Number">
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-group tg-inputwithicon">
                                                    <i class="lnr lnr-apartment"></i>
                                                    <input type="text" name="other" id="other-input" value="<?php echo ($patient['other_contact'] != '') ? $patient['other_contact'] : ""; ?>" class="form-control" placeholder="Other Contact Number">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group tg-inputwithicon">
                                                    <i class="lnr lnr-map-marker"></i>
                                                    <input type="text" name="fax" id="fax-input" value="<?php echo ($patient['fax'] != '') ? $patient['fax'] : ""; ?>" class="form-control" placeholder="Fax">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success" id="user-create-btn">Update</button>
                                            <button class="btn btn-warning" id="user-form-clear-btn" type="button">Clear</button>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="2a">
                            <form action="#" method="post" id='fund_form'>
                                <input type="hidden" name='<?= $this->security->get_csrf_token_name(); ?>' value='<?= $this->security->get_csrf_hash(); ?>'>

                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Health Fund Information</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="home-input">Health Fund Code</label>
                                            <input type="text" name="health_fund_code" id="health_fund_code-input" value="<?php echo ($patient['health_fund_code'] != '') ? $patient['health_fund_code'] : ""; ?>" class="form-control" placeholder="Health Fund Code" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="home-input">Issue Date</label>
                                            <input type="date" name="issue_date" id="issue_date-input" value="<?php echo ($patient['issue_date'] != '') ? $patient['issue_date'] : ""; ?>" class="form-control" placeholder="Issue Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="home-input">Policy Number</label>
                                            <input type="text" name="policy_number" id="policy_number-input" value="<?php echo ($patient['policy_number'] != '') ? $patient['policy_number'] : ""; ?>" class="form-control" placeholder="Policy Number">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="home-input">UPI</label>
                                            <input type="text" name="upi" id="upi-input" value="<?php echo ($patient['upi'] != '') ? $patient['upi'] : ""; ?>" class="form-control" placeholder="UPI">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="home-input">Expiry Date</label>
                                            <input type="date" name="expiry_date" id="expiry-input" value="<?php echo ($patient['expiry_date'] != '') ? $patient['expiry_date'] : ""; ?>" class="form-control" placeholder="Expiry Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="home-input">Health Fund Name</label>
                                            <input type="text" name="health_fund_name" id="health_fund_name-input" value="<?php echo ($patient['health_fund_name'] != '') ? $patient['health_fund_name'] : ""; ?>" class="form-control" placeholder="Health Fund Name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="home-input">Alias Surname</label>
                                            <input type="text" name="alias_surname" id="alias_surname-input" value="<?php echo ($patient['alias_surname'] != '') ? $patient['alias_surname'] : ""; ?>" class="form-control" placeholder="Alias Surname">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="home-input">Alias Given Name</label>
                                            <input type="text" name="alias_name" id="alias_surname-input" value="<?php echo ($patient['alias_name'] != '') ? $patient['alias_name'] : ""; ?>" class="form-control" placeholder="Alias Given Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="pt_id" value="<?= $patient['id'] ?>" class="pt_id" />
                                    <input type="hidden" name='rid' value='<?= $recordId ?>' id="rid">
                                    <button type="submit" name="save" class="btn btn-success">save</button>
                                </div>

                            </form>
                        </div>
                        <div class="tab-pane" id="3a">

                            <form action="#" method="post" id='other_detail_form'>
                                <input type="hidden" name='<?= $this->security->get_csrf_token_name(); ?>' value='<?= $this->security->get_csrf_hash(); ?>'>

                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Other Detail</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="home-input">Pensioner Card Number</label>
                                            <input type="text" name="pensioner_card_number" id="pensioner_card_number-input" value="<?php echo ($patient['pensioner_card_number'] != '') ? $patient['pensioner_card_number'] : ""; ?>" class="form-control" placeholder="Pensioner Card Number" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="home-input">Health Care Card Number</label>
                                            <input type="text" name="health_care_card_number" id="health_care_card_number-input" value="<?php echo ($patient['health_care_card_number'] != '') ? $patient['health_care_card_number'] : "NA"; ?>" class="form-control" placeholder="Health Care Card Number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="home-input">Repatriation Health Care Card Number</label>
                                            <input type="text" name="repat_health_care_card_number" id="repat_health_care_card_number-input" value="<?php echo ($patient['repat_health_care_card_number'] != '') ? $patient['repat_health_care_card_number'] : "NA"; ?>" class="form-control" placeholder="Repatriation Health Care Card Number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="home-input">Repatriation Pharmacy Benefits Card Number</label>
                                            <input type="text" name="repat_pharmacy_benefits_card" id="repat_pharmacy_benefits_card number-input" value="<?php echo ($patient['repat_pharmacy_benefits_card'] != '') ? $patient['repat_pharmacy_benefits_card'] : "NA"; ?>" class="form-control" placeholder="Repatriation Pharmacy Benefits Card Number">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="home-input">Seniors Health Care Card Number</label>
                                            <input type="text" name="seniors_health_care_card_number" id="seniors_health_care_card_number-input" value="<?php echo ($patient['seniors_health_care_card_number'] != '') ? $patient['seniors_health_care_card_number'] : "NA"; ?>" class="form-control" placeholder="Seniors Health Care Card Number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="home-input">Safety Net Entitlement Card Number</label>
                                            <input type="text" name="safety_net_entitlement_card_number_number" id="safety_net_entitlement_card_number-input" value="<?php echo ($patient['safety_net_entitlement_card_number_number'] != '') ? $patient['safety_net_entitlement_card_number_number'] : "NA"; ?>" class="form-control" placeholder="Safety Net Entitlement Card Number">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="home-input">Safety Net Concession Card Number</label>
                                            <input type="text" name="safety_net_concession_card_number" id="safety_net_concession_card_number-input" value="<?php echo ($patient['safety_net_concession_card_number'] != '') ? $patient['safety_net_concession_card_number'] : "NA"; ?>" class="form-control" placeholder="Safety Net Concession Card Number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="home-input">Service Number</label>
                                            <input type="text" name="service_number" id="service_number-input" value="<?php echo ($patient['service_number'] != '') ? $patient['service_number'] : "NA"; ?>" class="form-control" placeholder="Service Number">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="home-input">Religion</label>
                                            <input type="text" name="religion" id="religion-input" value="<?php echo ($patient['religion'] != '') ? $patient['religion'] : "NA"; ?>" class="form-control" placeholder="Religion">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="pt_id" value="<?= $patient['id'] ?>" class="pt_id" />
                                    <input type="hidden" name='rid' value='<?= $recordId ?>' id="rid">
                                    <button type="submit" name="save" class="btn btn-success">Save</button>
                                </div>

                            </form>
                        </div>
                        <div class="tab-pane" id="4a">

                            <form action="#" method="post" id='identifier_form'>
                                <input type="hidden" name='<?= $this->security->get_csrf_token_name(); ?>' value='<?= $this->security->get_csrf_hash(); ?>'>

                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Other Identifier</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="home-input">My Health Record Number</label>
                                            <input type="text" name="my_health_record_number" id="my_health_record_number-input" value="<?php echo ($patient['my_health_record_number'] != '') ? $patient['my_health_record_number'] : ""; ?>" class="form-control" placeholder="My Health Record Number" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="home-input">My Health Record Consent Withdrawn</label>
                                            <input type="text" name="my_health_record_consent_withdrawn" id="health_care_card_number-input" value="<?php echo ($patient['my_health_record_consent_withdrawn'] != '') ? $patient['my_health_record_consent_withdrawn'] : ""; ?>" class="form-control" placeholder="My Health Record Consent Withdrawn">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="home-input">Health Data Respository (Indentifier)</label>
                                            <input type="text" name="health_data_respository" id="repat_health_care_card_number-input" value="<?php echo ($patient['health_data_respository'] != '') ? $patient['health_data_respository'] : ""; ?>" class="form-control" placeholder="Health Data Respository">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="pt_id" value="<?= $patient['id'] ?>" class="pt_id" />
                                    <input type="hidden" name='rid' value='<?= $recordId ?>' id="rid">
                                    <button type="submit" name="save" class="btn btn-success">Save</button>
                                </div>

                            </form>
                        </div>
                        <div class="tab-pane" id="5a">

                            <form action="#" method="post" id='other_data_form'>
                                <input type="hidden" name='<?= $this->security->get_csrf_token_name(); ?>' value='<?= $this->security->get_csrf_hash(); ?>'>

                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Other Data</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="">
                                            <!-- <label for="home-input">Deceased</label> -->
                                            <input type="checkbox" name="deceased" id="deceased-input" value="<?php echo ($patient['deceased'] != '') ? $patient['deceased'] : "1"; ?>" required <?php echo ($patient['deceased'] === '1') ? "checked" : "" ?>><span style="color: #000;">&nbsp;Deceased</span>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <input type="checkbox" name="in_active" id="active-input" value="<?php echo ($patient['in_active'] != '') ? $patient['in_active'] : "1"; ?>" class="" required <?php echo ($patient['in_active'] === '1') ? "checked" : "" ?>><span style="color: #000;">&nbsp;In Active</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="home-input">Enter By</label>
                                            <input type="text" name="enter_by" class='form-control' id="entrer_by-input" value="<?php echo ($patient['enter_by'] != '') ? $patient['enter_by'] : ""; ?>" required placeholder="Enter By">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="pt_id" value="<?= $patient['id'] ?>" class="pt_id" />
                                    <input type="hidden" name='rid' value='<?= $recordId ?>' id="rid">
                                    <button type="submit" name="save" class="btn btn-success">Save</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function() {
        if ($(".tg-inputwithicon").length) {
        $(".tg-inputwithicon").each(function() {
            if ($(this).find("label").length) {
                $(this).find("i").css({"top": "28px"});
            }
        });
    }
        $("#record-add-patient-form").validate({
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
                            nhs_number: function() {
                                return $("#nhs-number-input").val();
                            },
                            group_id: function() {
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
                    // remote: {
                    //     url: _base_url + "patient/unique_email",
                    //     type: "get",
                    //     data: {
                    //         email: function() {
                    //             return $("#email-input").val();
                    //         },
                    //         group_id: function() {
                    //             return $(`#group-input`).val();
                    //         },
                    //         pid: function() {
                    //             return $('#pid').val();
                    //         },
                    //     }
                    // }
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
            submitHandler: function(form) {
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
                    success: function(data) {
                        var origin = window.location.origin;
                        if (origin == 'http://localhost') {
                            url = origin + '/fnqhpathology/doctor/doctor_record_detail_old/' + $('#rid').val();
                        } else {
                            url = origin + '/doctor/doctor_record_detail_old/' + $('#rid').val();
                        }
                        window.location.href = url;
                    },
                    error: function(req, status, err) {
                        console.log(status);
                        console.log(err);
                        $("#add_patient").modal('hide');
                    }
                })
            }
        });

        $("#fund_form").submit(function(e) {
        e.preventDefault();

        var form_data = $('#fund_form').serialize();
        $.ajax({
            async: true,
            type: 'POST',
            url: _base_url + "patient/update_health_info",
            data: form_data,
            success: function(data) {
                var origin = window.location.origin;
                if (origin == 'http://localhost') {
                    url = origin + '/fnqhpathology/doctor/doctor_record_detail_old/' + $('#rid').val();
                } else {
                    url = origin + '/doctor/doctor_record_detail_old/' + $('#rid').val();
                }
                window.location.href = url;
            },
            error: function(req, status, err) {
                alert('Something went worng');
            }
        })
    })

    $("#other_detail_form").submit(function(e) {
        e.preventDefault();

        var form_data = $('#other_detail_form').serialize();
        $.ajax({
            async: true,
            type: 'POST',
            url: _base_url + "patient/update_other_info",
            data: form_data,
            success: function(data) {
                var origin = window.location.origin;
                if (origin == 'http://localhost') {
                    url = origin + '/fnqhpathology/doctor/doctor_record_detail_old/' + $('#rid').val();
                } else {
                    url = origin + '/doctor/doctor_record_detail_old/' + $('#rid').val();
                }
                window.location.href = url;
            },
            error: function(req, status, err) {
                alert('Something went worng');
            }
        })
    })
    $("#identifier_form").submit(function(e) {
        e.preventDefault();

        var form_data = $('#identifier_form').serialize();
        $.ajax({
            async: true,
            type: 'POST',
            url: _base_url + "patient/update_other_identifier",
            data: form_data,
            success: function(data) {
                var origin = window.location.origin;
                if (origin == 'http://localhost') {
                    url = origin + '/fnqhpathology/doctor/doctor_record_detail_old/' + $('#rid').val();
                } else {
                    url = origin + '/doctor/doctor_record_detail_old/' + $('#rid').val();
                }
                window.location.href = url;
            },
            error: function(req, status, err) {
                alert('Something went worng');
            }
        })
    })
    $("#other_data_form").submit(function(e) {
        e.preventDefault();

        var form_data = $('#other_data_form').serialize();
        $.ajax({
            async: true,
            type: 'POST',
            url: _base_url + "patient/update_other_data",
            data: form_data,
            success: function(data) {
                var origin = window.location.origin;
                if (origin == 'http://localhost') {
                    url = origin + '/fnqhpathology/doctor/doctor_record_detail_old/' + $('#rid').val();
                } else {
                    url = origin + '/doctor/doctor_record_detail_old/' + $('#rid').val();
                }
                window.location.href = url;
            },
            error: function(req, status, err) {
                alert('Something went worng');
            }
        })
    })

    })
</script>