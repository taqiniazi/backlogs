<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style type="text/css">
    label {
        color: black;
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
    top: 15px;
    color: #000;
}
#add_patient .icon-pt i {
    top: 45px;
}
</style>

<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Patients</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>index.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('patient'); ?>">Patients</a></li>
            </ul>
        </div>
        <div class="col-auto float-right ml-auto">
            <?php if ($group_type != 'D') : ?>
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_patient"><i class="fa fa-plus"></i>Patient</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="row mb-3" style="display:none">
    <div class="col text-right">
        <?php foreach ($hospitals as $h) : ?>
            <div data-toggle="tooltip" data-placement="top" title="<?php echo $h['description']; ?>" class="hospital-info"><?php echo $h['first_initial'] . $h['last_initial'] ?></div>
        <?php endforeach; ?>
        <span class="lnr lnr-cross-circle" id="clear-hospital" style="margin-left: 10px; position: relative; top: 4px; cursor: pointer;"></span>
    </div>
</div>
<div class="table-responsive">
    <form action="<?= site_url('patient/delete_bulk_patient'); ?>" method="post" id="delete_pt_frm">
        <input type="hidden" name='<?= $this->security->get_csrf_token_name(); ?>' value='<?= $this->security->get_csrf_hash(); ?>'>
        <table class="table table-striped no-footer" id="patient-table" style="width: 100%;">
            <thead>
                <tr>
                    <th colspan="10" style="padding:8px 0px;">
                        <div class='col-md-2' style="padding:0;">
                            <a href="javascript:delete_patient('bulk_delete');" class="btn btn-danger deletebtn" style='display:none;' id="btn_pt_delete">Delete Selected</a>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th><input type="checkbox" name="all_patient" id="all_patient" class=""></th>
                    <th>ID.</th>
                    <th>Patient</th>
                    <th>Contact Details</th>
                    <th>Hospital</th>
                    <th>Patient IDs</th>
                    <th>Address</th>
                    <th>Records</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </form>

    <div class="panel panel-default" style='display:none;'>
        <div class="panel-body">
            <table class="table table-condensed table-striped">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>Fist Name</th>
                        <th>Last Name</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
                        <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                        <td>Carlos</td>
                        <td>Mathias</td>
                        <td>Leme</td>
                        <td>SP</td>
                        <td>new</td>
                    </tr>
                    <tr>
                        <td colspan="12" class="hiddenRow">
                            <div class="accordian-body collapse" id="demo1">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="info">
                                            <th>Job</th>
                                            <th>Company</th>
                                            <th>Salary</th>
                                            <th>Date On</th>
                                            <th>Date off</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr data-toggle="collapse" class="accordion-toggle" data-target="#demo10">
                                            <td> <a href="#">Enginner Software</a></td>
                                            <td>Google</td>
                                            <td>U$8.00000 </td>
                                            <td> 2016/09/27</td>
                                            <td> 2017/09/27</td>
                                            <td><a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-cog"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="12" class="hiddenRow">
                                                <div class="accordian-body collapse" id="demo10">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <td><a href="#"> XPTO 1</a></td>
                                                                <td>XPTO 2</td>
                                                                <td>Obs</td>
                                                            </tr>
                                                            <tr>
                                                                <th>item 1</th>
                                                                <th>item 2</th>
                                                                <th>item 3 </th>
                                                                <th>item 4</th>
                                                                <th>item 5</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>item 1</td>
                                                                <td>item 2</td>
                                                                <td>item 3</td>
                                                                <td>item 4</td>
                                                                <td>item 5</td>
                                                                <td>
                                                                    <a href="#" class="btn btn-default btn-sm">
                                                                        <i class="glyphicon glyphicon-cog"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Scrum Master</td>
                                            <td>Google</td>
                                            <td>U$8.00000 </td>
                                            <td> 2016/09/27</td>
                                            <td> 2017/09/27</td>
                                            <td>
                                                <a href="#" class="btn btn-default btn-sm">
                                                    <i class="glyphicon glyphicon-cog"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </td>
                    </tr>
                    <tr data-toggle="collapse" data-target="#demo2" class="accordion-toggle">
                        <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                        <td>Silvio</td>
                        <td>Santos</td>
                        <td>São Paulo</td>
                        <td>SP</td>
                        <td>new</td>
                    </tr>
                    <tr>
                        <td colspan="6" class="hiddenRow">
                            <div id="demo2" class="accordian-body collapse">Demo2</div>
                        </td>
                    </tr>
                    <tr data-toggle="collapse" data-target="#demo3" class="accordion-toggle">
                        <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                        <td>John</td>
                        <td>Doe</td>
                        <td>Dracena</td>
                        <td>SP</td>
                        <td> New</td>
                    </tr>
                    <tr>
                        <td colspan="6" class="hiddenRow">
                            <div id="demo3" class="accordian-body collapse">Demo3</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


</div>


<div id="add_patient" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">New Patient</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tg-editformholder">
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
                                <?php echo form_open('', array('id' => 'add-patient-form', 'class' => 'tg-formtheme tg-editform create_user_form')); ?>
                                <input type="hidden" name='pid' value='<?= ($_GET['p']) ? $_GET['p'] : '0'; ?>' id="pid>
                                <input type="hidden" name='<?= $this->security->get_csrf_token_name(); ?>' value='<?= $this->security->get_csrf_hash(); ?>'>
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <!-- Patient Personal Information START -->
                                        <fieldset>
                                            <div class="col-md-4 mx-auto text-center">
                                                <img src="<?php echo base_url() ?>assets/img/user.jpg" class="img-fluid rounded-circle" style="height:60px;">
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
                                                        <option value="<?php echo $hospital['id'] ?>" <?php echo ($_GET['p'] && $patient['hospital_id'] == $hospital['id']) ? "selected" : ""; ?>><?php echo $hospital['description']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <?php  ?>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group tg-inputwithicon">

                                                        <Select type="text" name="title" id="title-input" class="form-control">
                                                            <option value="Mr." <?php echo ($_GET['p'] && $patient['title'] == "Mr.") ? "selected" : ""; ?>>Mr.</option>
                                                            <option value="Mrs." <?php echo ($_GET['p'] && $patient['title'] == "Mrs.") ? "selected" : ""; ?>>Mrs.</option>
                                                            <option value="Miss." <?php echo ($_GET['p'] && $patient['title'] == "Miss.") ? "selected" : ""; ?>>Miss.</option>
                                                        </Select>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group tg-inputwithicon">
                                                        <i class="lnr lnr-user"></i>
                                                        <input type="text" name="first_name" id="first-name-input" value="<?php echo ($_GET['p'] && $patient['first_name'] != '') ? $patient['first_name'] : ""; ?>" class="form-control" placeholder="First Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group tg-inputwithicon">
                                                        <i class="lnr lnr-user"></i>
                                                        <input type="text" name="last_name" id="last-name-input" value="<?php echo ($_GET['p'] && $patient['last_name'] != '') ? $patient['last_name'] : ""; ?>" class="form-control" placeholder="Last Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group tg-inputwithicon">
                                                        <i class="lnr lnr-user"></i>
                                                        <input type="text" name="mrn_number" id="mrn_number" value="<?php echo ($_GET['p'] && $patient['mrn_number'] != '') ? $patient['mrn_number'] : ""; ?>" class="form-control" placeholder="MRN Number">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group tg-inputwithicon">
                                                        <i class="lnr lnr-user"></i>
                                                        <input type="text" name="other_name" id="other_name-input" value="<?php echo ($_GET['p'] && $patient['other_name'] != '') ? $patient['other_name'] : ""; ?>" class="form-control" placeholder="Other Name">
                                                    </div>
                                                </div>
                                         
                                                <div class="col-md-4">
                                                    <div class="form-group tg-inputwithicon">
                                                        <i class="lnr lnr-user"></i>
                                                        <input type="text" name="nick_name" id="nick_name-input" value="<?php echo ($_GET['p'] && $patient['nick_name'] != '') ? $patient['nick_name'] : ""; ?>" class="form-control" placeholder="Nick Name">
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
                                                            <option value="Male" <?php echo ($_GET['p'] && $patient['gender'] == "Male") ? "selected" : ""; ?>>Male</option>
                                                            <option value="Female" <?php echo ($_GET['p'] && $patient['gender'] == "Female") ? "selected" : ""; ?>>Female</option>
                                                            <option value="Other" <?php echo ($_GET['p'] && $patient['gender'] == "Other") ? "selected" : ""; ?>>Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group tg-inputwithicon">
                                                        <label for="dob-input">Date of Birth</label>
                                                        <i class="lnr lnr-calendar-full"></i>
                                                        <input type="date" name="dob" id="dob-input" value="<?php echo ($_GET['p'] && $patient['dob'] != '') ? $patient['dob'] : ""; ?>" class="form-control" placeholder="Date Of Birth">
                                                    </div>
                                                </div>
                                            
                                            
                                                <div class="col-md-3" id="password-row">
                                                    <div class="form-group tg-inputwithicon icon-pt" style="margin-top: 32px;">
                                                        <i class="lnr lnr-envelope"></i>
                                                        <input type="email" name="email" id="email-input" value="<?php echo ($_GET['p'] && $patient['email'] != '') ? $patient['email'] : ""; ?>" class="form-control" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group tg-inputwithicon icon-pt" style="margin-top: 32px;">
                                                        <span>
                                                            <i class="lnr lnr-phone-handset"></i>
                                                        </span>
                                                        <input type="text" name="phone" id="phone-input" value="<?php echo ($_GET['p'] && $patient['phone'] != '') ? $patient['phone'] : ""; ?>" class="form-control" placeholder="Phone">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group tg-inputwithicon">
                                                        <label for="Medicare Card Number">Medicare Card Number</label>
                                                        <i class="lnr lnr-license"></i>
                                                        <input type="text" name="medicare_card_no" id="medicare_card_no" value="<?php echo ($_GET['p'] && $patient['medicare_card_no'] != '') ? $patient['medicare_card_no'] : ""; ?>" class="form-control" placeholder="Medicare Card Number">
                                                    </div>
                                                </div>
                                          
                                                <div class="col-md-6">
                                                    <div class="form-group tg-inputwithicon">
                                                        <label for="Medicare Card Number">Hospital Status</label>
                                                        <select name="hospital_status" id="hospital_status" class="form-control">
                                                            <option value="">-Select Hospital Status-</option>
                                                            <option value="A private patient in a private hospital or approved day hospital facility" <?php echo ($_GET['p'] && $patient['hospital_status'] == "A private patient in a private hospital or approved day hospital facility") ? "selected" : ""; ?>>
                                                                A private patient in a private hospital or approved day hospital facility
                                                            </option>
                                                            <option value="A private patient in a recognised hospital" <?php echo  ($_GET['p'] && $patient['hospital_status'] == "A private patient in a recognised hospital") ? "selected":"";?>>
                                                                A private patient in a recognised hospital
                                                            </option>
                                                            <option value="A public patient in a recognised hospital" <?php echo  ($_GET['p'] && $patient['hospital_status'] == "A public patient in a recognised hospital") ? "selected":"";?>>
                                                                A public patient in a recognised hospital
                                                            </option>
                                                            <option value="An outpatient of a recognised hospital" <?php echo  ($_GET['p'] && $patient['hospital_status'] == "An outpatient of a recognised hospital") ? "selected":"";?>>
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
                                            if($_GET['p']){
                                                $addressInfo = explode('\n', $patient['address_1']);
                                            }
                                            ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group tg-inputwithicon">
                                                        <label for="address1-input">Address</label>
                                                        <i class="lnr lnr-apartment"></i>
                                                        <input type="text" name="address1" id="address1-input" value="<?php echo ($_GET['p'] && $addressInfo[0] != '') ? $addressInfo[0] : ""; ?>" class="form-control" placeholder="Address Line 1">
                                                    </div>
                                                </div>
                                          
                                                <div class="col-md-6">
                                                    <div class="form-group tg-inputwithicon icon-pt" style="margin-top:32px;">
                                                        <i class="lnr lnr-apartment"></i>
                                                        <input type="text" name="address2" id="address2-input" value="<?php echo ($_GET['p'] && $addressInfo[1] != '') ? $addressInfo[1] : ""; ?>" class="form-control" placeholder="Address Line 2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group tg-inputwithicon">
                                                        <i class="lnr lnr-map-marker"></i>
                                                        <input type="text" name="city" id="city-input" value="<?php echo ($_GET['p'] && $patient['city'] != '') ? $patient['city'] : ""; ?>" class="form-control" placeholder="City">
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
                                                        <input type="text" name="country" id="country-input" value="<?php echo ($_GET['p'] && $patient['country'] != '') ? $patient['country'] : "Australia"; ?>" class="form-control" placeholder="Country">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group tg-inputwithicon">
                                                        <i class="lnr lnr-pushpin"></i>
                                                        <input type="text" name="post_code" id="post-code-input" value="<?php echo ($_GET['p'] && $patient['post_code'] != '') ? $patient['post_code'] : ""; ?>" class="form-control" placeholder="Post Code">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="home-input">Contact Information</label>
                                                        <input type="text" name="home" id="home-input" value="<?php echo ($_GET['p'] && $patient['home_contact'] != '') ? $patient['home_contact'] : ""; ?>" class="form-control" placeholder="Home Contact Number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group tg-inputwithicon">
                                                        <i class="lnr lnr-apartment"></i>
                                                        <input type="text" name="business_contact" id="business_contact-input" value="<?php echo ($_GET['p'] && $patient['business_contact'] != '') ? $patient['business_contact'] : ""; ?>" class="form-control" placeholder="Business Contact Number">
                                                    </div>
                                                </div>

                                       
                                                <div class="col-md-4">
                                                    <div class="form-group tg-inputwithicon">
                                                        <i class="lnr lnr-apartment"></i>
                                                        <input type="text" name="other" id="other-input" value="<?php echo ($_GET['p'] && $patient['other_contact'] != '') ? $patient['other_contact'] : ""; ?>" class="form-control" placeholder="Other Contact Number">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group tg-inputwithicon">
                                                        <i class="lnr lnr-map-marker"></i>
                                                        <input type="text" name="fax" id="fax-input" value="<?php echo ($_GET['p'] && $patient['fax'] != '') ? $patient['fax'] : ""; ?>" class="form-control" placeholder="Fax">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-success" id="user-create-btn"><?php echo ($_GET['p']) ? "Update" : "Create"; ?></button>
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
                                                <input type="text" name="health_fund_code" id="health_fund_code-input" value="<?php echo ($_GET['p'] && $patient['health_fund_code'] != '') ? $patient['health_fund_code'] : ""; ?>" class="form-control" placeholder="Health Fund Code" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="home-input">Issue Date</label>
                                                <input type="date" name="issue_date" id="issue_date-input" value="<?php echo ($_GET['p'] && $patient['issue_date'] != '') ? $patient['issue_date'] : ""; ?>" class="form-control" placeholder="Issue Date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="home-input">Policy Number</label>
                                                <input type="text" name="policy_number" id="policy_number-input" value="<?php echo ($_GET['p'] && $patient['policy_number'] != '') ? $patient['policy_number'] : ""; ?>" class="form-control" placeholder="Policy Number">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="home-input">UPI</label>
                                                <input type="text" name="upi" id="upi-input" value="<?php echo ($_GET['p'] && $patient['upi'] != '') ? $patient['upi'] : ""; ?>" class="form-control" placeholder="UPI">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="home-input">Expiry Date</label>
                                                <input type="date" name="expiry_date" id="expiry-input" value="<?php echo ($_GET['p'] && $patient['expiry_date'] != '') ? $patient['expiry_date'] : ""; ?>" class="form-control" placeholder="Expiry Date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="home-input">Health Fund Name</label>
                                                <input type="text" name="health_fund_name" id="health_fund_name-input" value="<?php echo ($_GET['p'] && $patient['health_fund_name'] != '') ? $patient['health_fund_name'] : ""; ?>" class="form-control" placeholder="Health Fund Name">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="home-input">Alias Surname</label>
                                                <input type="text" name="alias_surname" id="alias_surname-input" value="<?php echo ($_GET['p'] && $patient['alias_surname'] != '') ? $patient['alias_surname'] : ""; ?>" class="form-control" placeholder="Alias Surname">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="home-input">Alias Given Name</label>
                                                <input type="text" name="alias_name" id="alias_surname-input" value="<?php echo ($_GET['p'] && $patient['alias_name'] != '') ? $patient['alias_name'] : ""; ?>" class="form-control" placeholder="Alias Given Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="pt_id" value="0" class="pt_id" />
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
                                                <input type="text" name="pensioner_card_number" id="pensioner_card_number-input" value="<?php echo ($_GET['p'] && $patient['pensioner_card_number'] != '') ? $patient['pensioner_card_number'] : ""; ?>" class="form-control" placeholder="Pensioner Card Number" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="home-input">Health Care Card Number</label>
                                                <input type="text" name="health_care_card_number" id="health_care_card_number-input" value="<?php echo ($_GET['p'] && $patient['health_care_card_number'] != '') ? $patient['health_care_card_number'] : ""; ?>" class="form-control" placeholder="Health Care Card Number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="home-input">Repat Health Care Card Number</label>
                                                <input type="text" name="repat_health_care_card_number" id="repat_health_care_card_number-input" value="<?php echo ($_GET['p'] && $patient['repat_health_care_card_number'] != '') ? $patient['repat_health_care_card_number'] : ""; ?>" class="form-control" placeholder="Repat Health Care Card Number">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="home-input">Repat Pharmacy Benefits Card Number</label>
                                                <input type="text" name="repat_pharmacy_benefits_card" id="repat_pharmacy_benefits_card number-input" value="<?php echo ($_GET['p'] && $patient['repat_pharmacy_benefits_card'] != '') ? $patient['repat_pharmacy_benefits_card'] : ""; ?>" class="form-control" placeholder="Repat Pharmacy Benefits Card Number">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="home-input">Seniors Health Care Card Number</label>
                                                <input type="text" name="seniors_health_care_card_number" id="seniors_health_care_card_number-input" value="<?php echo ($_GET['p'] && $patient['seniors_health_care_card_number'] != '') ? $patient['seniors_health_care_card_number'] : ""; ?>" class="form-control" placeholder="Seniors Health Care Card Number">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="home-input">Safety Net Entitlement Card Number</label>
                                                <input type="text" name="safety_net_entitlement_card_number_number" id="safety_net_entitlement_card_number-input" value="<?php echo ($_GET['p'] && $patient['safety_net_entitlement_card_number_number'] != '') ? $patient['safety_net_entitlement_card_number_number'] : ""; ?>" class="form-control" placeholder="Safety Net Entitlement Card Number">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="home-input">Safety Net Concession Card Number</label>
                                                <input type="text" name="safety_net_concession_card_number" id="safety_net_concession_card_number-input" value="<?php echo ($_GET['p'] && $patient['safety_net_concession_card_number'] != '') ? $patient['safety_net_concession_card_number'] : ""; ?>" class="form-control" placeholder="Safety Net Concession Card Number">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="home-input">Service Number</label>
                                                <input type="text" name="service_number" id="service_number-input" value="<?php echo ($_GET['p'] && $patient['service_number'] != '') ? $patient['service_number'] : ""; ?>" class="form-control" placeholder="Service Number">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="home-input">Religion</label>
                                                <input type="text" name="religion" id="religion-input" value="<?php echo ($_GET['p'] && $patient['religion'] != '') ? $patient['religion'] : ""; ?>" class="form-control" placeholder="Religion">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="pt_id" value="0" class="pt_id" />
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
                                                <input type="text" name="my_health_record_number" id="my_health_record_number-input" value="<?php echo ($_GET['p'] && $patient['my_health_record_number'] != '') ? $patient['my_health_record_number'] : ""; ?>" class="form-control" placeholder="My Health Record Number" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="home-input">My Health Record Consent Withdrawn</label>
                                                <input type="text" name="my_health_record_consent_withdrawn" id="health_care_card_number-input" value="<?php echo ($_GET['p'] && $patient['my_health_record_consent_withdrawn'] != '') ? $patient['my_health_record_consent_withdrawn'] : ""; ?>" class="form-control" placeholder="My Health Record Consent Withdrawn">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="home-input">Health Data Respository (Indentifier)</label>
                                                <input type="text" name="health_data_respository" id="repat_health_care_card_number-input" value="<?php echo ($_GET['p'] && $patient['health_data_respository'] != '') ? $patient['health_data_respository'] : ""; ?>" class="form-control" placeholder="Health Data Respository">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="pt_id" value="0" class="pt_id" />
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
                                                <input type="checkbox" name="deceased" id="deceased-input" value="<?php echo ($_GET['p'] && $patient['deceased'] != '') ? $patient['deceased'] : "1"; ?>" required <?php echo ($_GET['p'] && $patient['deceased'] === '1') ? "checked":"" ?>><span style="color: #000;">&nbsp;Deceased</span>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <input type="checkbox" name="in_active" id="active-input" value="<?php echo ($_GET['p'] && $patient['in_active'] != '') ? $patient['in_active'] : "1"; ?>" class="" required <?php echo ($_GET['p'] && $patient['in_active'] === '1') ? "checked":"" ?>><span style="color: #000;">&nbsp;In Active</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="home-input">Enter By</label>
                                                <input type="text" name="enter_by" class='form-control' id="entrer_by-input" value="<?php echo ($_GET['p']) ? $patient['enter_by'] : ""; ?>" required placeholder="Enter By">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" name="pt_id" value="0" class="pt_id" />
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

<div class="modal custom-modal fade" id="delete_patient_modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete Patient</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <div class="col-6">
                            <a href="javascript:void(0);" class="btn btn-primary continue-btn patient-delete-btn">Delete</a>
                        </div>
                        <div class="col-6">
                            <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var p_id = "<?php if ($_GET['p']) echo $this->input->get('p');
                else echo 0; ?>";
    var step = "<?php if ($_GET['step']) echo $this->input->get('step');
                else echo 1; ?>";
    $(document).ready(function() {
        if (p_id > 0) {

            $('.tab_li').removeClass('active');
            $('.pt_id').val(p_id);
        }
        if (step == 1 && p_id > 0) {
            setTimeout(function() {
                $('#tb1').click();
                $('#add_patient').modal('show');
            }, 100)
        }
        if (step == 2) {
            setTimeout(function() {
                $('#tb2').click();
                $('#add_patient').modal('show');
            }, 100)
        }
        if (step == 3) {
            setTimeout(function() {
                $('#tb3').click();
                $('#add_patient').modal('show');
            }, 100)
        }
        if (step == 4) {
            setTimeout(function() {
                $('#tb4').click();
                $('#add_patient').modal('show');
            }, 100)
        }
        if (step == 5) {
            setTimeout(function() {
                $('#tb5').click();
                $('#add_patient').modal('show');
            }, 100)
        }
    })

    $('#tb1').click(function() {
        $('.tab_li').removeClass('active');
        $('#tb1').parent('li').addClass('active');
        $('#1a').show();
        $('#2a, #3a, #4a, #5a').hide();
    });
    $('#tb2').click(function() {
        if (p_id > 0) {
            $('.tab_li').removeClass('active');
            $('#tb2').parent('li').addClass('active');
            $('#2a').show();
            $('#1a, #3a, #4a, #5a').hide();
        } else {
            alert('Please complete first step');
        }

    });
    $('#tb3').click(function() {
        if (p_id > 0) {
            $('.tab_li').removeClass('active');
            $('#tb3').parent('li').addClass('active');
            $('#3a').show();
            $('#1a, #2a, #4a, #5a').hide();
        } else {
            alert('Please complete first step');
        }

    });
    $('#tb4').click(function() {
        if (p_id > 0) {
            $('.tab_li').removeClass('active');
            $('#tb4').parent('li').addClass('active');
            $('#4a').show();
            $('#1a, #2a, #3a, #5a').hide();
        } else {
            alert('Please complete first step');
        }
    });
    $('#tb5').click(function() {
        if (p_id > 0) {
            $('.tab_li').removeClass('active');
            $('#tb5').parent('li').addClass('active');
            $('#5a').show();
            $('#1a, #2a, #3a, #4a').hide();
        } else {
            alert('Please complete first step');
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
                    url = origin + '/fnqhpathology/patient?p=' + p_id + '&step=3';
                } else {
                    url = origin + '/patient?p=' + p_id + '&step=3';
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
                    url = origin + '/fnqhpathology/patient?p=' + p_id + '&step=4';
                } else {
                    url = origin + '/patient?p=' + p_id + '&step=4';
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
                    url = origin + '/fnqhpathology/patient?p=' + p_id + '&step=5';
                } else {
                    url = origin + '/patient?p=' + p_id + '&step=5';
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
                    url = origin + '/fnqhpathology/patient';
                } else {
                    url = origin + '/patient';
                }
                message('Updated Successfully.', 'success');
                setTimeout(function() {
                    window.location.href = url;
                }, 1000);

            },
            error: function(req, status, err) {
                alert('Something went worng');
            }
        })
    })
</script>