<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style type="text/css">
    .personal_table tr td {
        padding: 5px;
    }

    .table thead tr th {
        font-weight: 600;
    }

    .profile-view .profile-basic {
        padding-right: 20px;
    }
    .tb-setup .tab_li a {
    color: #fff;
    background: #03c5fc;
    padding: 10px 12px;
    margin: 10px 5px!important;
    display:inline-block;
}
h4 {
    font-size: 20px;
}
.align-items-center {
    border-bottom: 0px solid #ccc;
    padding: 8px 0px;
    margin: 0px 1px;
}
.checked {
  color: orange;
}
.align-items-center:odd { color:green }
</style>
<div class="page-header">
    <div class="row">
        <div class="col-sm-8">
            <h3 class="page-title">Patient</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url("patient") ?>">Patients</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ul>
        </div>
    </div>
</div>
<div class="card tb-setup">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="tg-editformholder">
                    <div id="exTab1" class="container">
                        <ul class="nav nav-pills mb-0 justify-content-start">
                            <li class="active tab_li">
                                <a href="#1a" data-toggle="tab" id='tb1'>&nbsp;Patient Detail &nbsp;&nbsp;&nbsp;&nbsp;</a>
                            </li>
                            <li class="tab_li"><a href="#2a" data-toggle="tab" id='tb2'>&nbsp;Health Fund Information&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                            <li class="tab_li"><a href="#3a" data-toggle="tab" id='tb3'>&nbsp;Other Detail&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                            <li class="tab_li"><a href="#4a" data-toggle="tab" id='tb4'>&nbsp;Other Identifier&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                            <li class="tab_li"><a href="#5a" data-toggle="tab" id='tb5'>&nbsp;Other Data&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                        </ul>
                        <div class="tab-content clearfix pt-0">
                            <div class="tab-pane active" id="1a">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <!-- Patient Personal Information START -->
                                        <fieldset>
                                          <div class="row">
                                            <div class="col-12 border-bottom mb-3 d-flex">
                                                <h4>Basic Detail </h4>

                                            </div>
                                        </div>
                                        <div class="row">
   <div class="col-2" style="border-right: 1px solid #ededed;">
      <div class="d-flex" style="display:flex; justify-content:center; height:150px;">
         <div class="profile-view" style="width:120px;">
            <div class="profile-img-wrap">
               <div class="profile-img">
                  <!--profile image upload -->
                  <div class="tg-rightarea tg-useruploadimgholder">
                     <div id="plupload-profile-container"></div>
                     <div class="tg-useruploadimg text-center">
                        <img class="profile-pic img-fluid rounded-circle" id="patient-profile-pic" src="<?php echo $profile_picture_path; ?>">
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-5  mt-3">
      <div class="row align-items-center" style="background: #ececec82;">
         <div class="col-6 mb-2">
            <h5 class="mb-0">Hospital Name :</h5>
         </div>
         <div class="col-6 mb-2">
            <h5 class="mb-0">
               <?php foreach ($hospitals as $hospital) :
                  if ($patient['hospital_id'] == $hospital['id']) {
                      echo $hospital['description'];
                  }
                  endforeach; ?>
            </h5>
         </div>
      </div>
      <div class="row align-items-center ">
         <div class="col-6 mb-2">
            <h5 class="mb-0">Name :</h5>
         </div>
         <div class="col-6 mb-2">
            <h5 class="mb-0"><?php echo $patient['first_name'] . " " . $patient['last_name']; ?></h5>
         </div>
      </div>
      <div class="row align-items-center" style="background: #ececec82;">
         <div class="col-6 mb-2">
            <h5 class="mb-0">Email :</h5>
         </div>
         <div class="col-6 mb-2">
            <h5 class="mb-0"><?php echo $patient['email']; ?></h5>
         </div>
      </div>
      <div class="row align-items-center ">
         <div class="col-6 mb-2">
            <h5 class="mb-0">Other Name :</h5>
         </div>
         <div class="col-6 mb-2">
            <h5 class="mb-0"><?php echo $patient['other_name']; ?></h5>
         </div>
      </div>
      <div class="row align-items-center" style="background: #ececec82;">
         <div class="col-6 mb-2">
            <h5 class="mb-0">Nick Name :</h5>
         </div>
         <div class="col-6 mb-2">
            <h5 class="mb-0"><?php echo $patient['nick_name']; ?></h5>
         </div>
      </div>
      <div class="row align-items-center">
         <div class="col-6 mb-2">
            <h5 class="mb-0">MRN Number :</h5>
         </div>
         <div class="col-6 mb-2">
            <h5 class="mb-0"><?php echo $patient['mrn_number']; ?></h5>
         </div>
      </div>
      <div class="row align-items-center" style="background: #ececec82;">
         <div class="col-6 mb-2">
            <h5 class="mb-0">Gender :</h5>
         </div>
         <div class="col-6 mb-2">
            <h5 class="mb-0"><?php echo $patient['gender']; ?></h5>
         </div>
      </div>
   </div>

<div class="col-5  mt-3">
   <div class="row align-items-center" style="background: #ececec82;">
      <div class="col-6 mb-2">
         <h5 class="mb-0">Date Of Birth :</h5>
      </div>
      <div class="col-6 mb-2">
         <h5 class="mb-0"><?php echo $patient['dob']; ?></h5>
      </div>
   </div>
   <div class="row align-items-center ">
      <div class="col-6 mb-2">
         <h5 class="mb-0">Age :</h5>
      </div>
      <div class="col-6 mb-2">
         <h5 class="mb-0"><?php echo $patient['age'] . "y" ?></h5>
      </div>
   </div>
   <div class="row align-items-center" style="background: #ececec82;">
      <div class="col-6 mb-2">
         <h5 class="mb-0">Phone :</h5>
      </div>
      <div class="col-6 mb-2">
         <h5 class="mb-0"><?php echo $patient['phone']; ?></h5>
      </div>
   </div>
   <div class="row align-items-center ">
      <div class="col-6 mb-2">
         <h5 class="mb-0">Medicare Card Number :</h5>
      </div>
      <div class="col-6 mb-2">
         <h5 class="mb-0"><?php echo $patient['medicare_card_no']; ?></h5>
      </div>
   </div>
   <div class="row align-items-center" style="background: #ececec82;">
      <div class="col-6 mb-2">
         <h5 class="mb-0">Hospital Status :</h5>
      </div>
      <div class="col-6 mb-2">
         <h5 class="mb-0"><?php echo $patient['hospital_status']; ?></h5>
      </div>
   </div>
</div>
</div>
<div class="row mt-3">
   <div class="col-6">
   <div class="border-bottom mb-3 d-flex">
   <h4>Address</h4>
  </div>
      <div class="row align-items-center ">
         <div class="col-4 col-md-4 ">
            <h5 class="mb-0">Address Details :</h5>
         </div>
         <div class="col-8 col-md-8 ">
            <h5 class="mb-0" style="line-height:20px;">
               <?php if (!empty($patient['address_1'])) echo nl2br($patient['address_1']) . ""; ?>
               <?php if (!empty($patient['suburb'])) echo $patient['suburb'] . ",  "; ?>
               <?php if (!empty($patient['state'])) echo $patient['state'] . "<br/>"; ?>
               <div><?php if (!empty($patient['town'])) echo $patient['town'] . ", "; ?>
                  <?php if (!empty($patient['post_code'])) echo $patient['post_code']; ?>
               </div>
            </h5>
         </div>
      </div>
   </div>

   <div class="col-6 col-md-6">
   <div class="border-bottom mb-3 d-flex">
   <h4>Contact Information</h4>
  </div>
    <div class="row align-items-center ">
         <div class="col-6 mb-2">
            <h5 class="mb-0">Mobile Number :</h5>
         </div>
         <div class="col-6 mb-2">
            <h5 class="mb-0"><?php echo $patient['mobile']; ?></h5>
         </div>
      </div>
      <div class="row align-items-center ">
         <div class="col-6 mb-2">
            <h5 class="mb-0">Home Contact Number :</h5>
         </div>
         <div class="col-6 mb-2">
            <h5 class="mb-0"><?php echo $patient['home_contact']; ?></h5>
         </div>
      </div>
      <div class="row align-items-center ">
         <div class="col-6 mb-2">
            <h5 class="mb-0">Business Contact Number :</h5>
         </div>
         <div class="col-6 mb-2">
            <h5 class="mb-0"><?php echo $patient['business_contact']; ?></h5>
         </div>
      </div>
      <div class="row align-items-center ">
         <div class="col-6  mb-2">
            <h5 class="mb-0">Other Contact Number :</h5>
         </div>
         <div class="col-6 mb-2">
            <h5 class="mb-0"><?php echo $patient['other_contact']; ?></h5>
         </div>
      </div>
      <div class="row align-items-center ">
         <div class="col-6 mb-2">
            <h5 class="mb-0">Fax :</h5>
         </div>
         <div class="col-6 mb-2">
            <h5 class="mb-0"><?php echo $patient['fax']; ?></h5>
         </div>
      </div>
</div>

                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="2a">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <!-- Patient Personal Information START -->
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-12 border-bottom mb-3 d-flex">
                                                    <h4>Health Fund Information</h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mt-1">
                                                    <div class="row align-items-center" style="background: #ececec82;">
                                                        <div class="col-4 mb-2">
                                                            <h5 class="mb-0">Health Fund Code</h5>
                                                        </div>
                                                        :
                                                        <div class="col-7 mb-2">
                                                            <h5 class="mb-0"><?php echo $patient['health_fund_code']; ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mt-1">
                                                    <div class="row align-items-center" style="background: #ececec82;">
                                                        <div class="col-4 mb-2">
                                                            <h5 class="mb-0">Issue Date</h5>
                                                        </div>
                                                        :
                                                        <div class="col-7 mb-2">
                                                            <h5 class="mb-0"><?php echo $patient['issue_date']; ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mt-1">
                                                    <div class="row align-items-center">
                                                        <div class="col-4 mb-2">
                                                            <h5 class="mb-0">Policy Number</h5>
                                                        </div>
                                                        :
                                                        <div class="col-7 mb-2">
                                                            <h5 class="mb-0"><?php echo $patient['policy_number']; ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mt-1">
                                                    <div class="row align-items-center ">
                                                        <div class="col-4 mb-2">
                                                            <h5 class="mb-0">UPI</h5>
                                                        </div>
                                                        :
                                                        <div class="col-7 mb-2">
                                                            <h5 class="mb-0"><?php echo $patient['upi']; ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mt-1">
                                                    <div class="row align-items-center" style="background: #ececec82;">
                                                        <div class=" col-4 mb-2">
                                                            <h5 class="mb-0">Expiry Date</h5>
                                                        </div>
                                                        :
                                                        <div class=" col-7 mb-2">
                                                            <h5 class="mb-0"><?php echo $patient['expiry_date']; ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mt-1">
                                                    <div class="row align-items-center" style="background: #ececec82;">
                                                        <div class="col-4 mb-2">
                                                            <h5 class="mb-0">Health Fund Name</h5>
                                                        </div>
                                                        :
                                                        <div class="col-7 mb-2">
                                                            <h5 class="mb-0"><?php echo $patient['health_fund_name']; ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mt-3">
                                                    <div class="row align-items-center ">
                                                        <div class="col-4 mb-2">
                                                            <h5 class="mb-0">Alias Surname</h5>
                                                        </div>
                                                        :
                                                        <div class="col-7 mb-2">
                                                            <h5 class="mb-0"><?php echo $patient['alias_surname']; ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mt-3">
                                                    <div class="row align-items-center ">
                                                        <div class=" col-4 mb-2">
                                                            <h5 class="mb-0">Alias Given Name</h5>
                                                        </div>
                                                        :
                                                        <div class="col-7 mb-2">
                                                            <h5 class="mb-0"><?php echo $patient['alias_name']; ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="3a">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <!-- Patient Personal Information START -->
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4>Other Detail</h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mt-3">
                                                    <div class="row align-items-center" style="background: #ececec82;">
                                                        <div class="col-5 mb-2">
                                                            <h5 class="mb-0">Pensioner Card Number</h5>
                                                        </div>
                                                        :
                                                        <div class="col-6 mb-2">
                                                            <h5 class="mb-0"><?php echo $patient['pensioner_card_number']; ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mt-3">
                                                    <div class="row align-items-center" style="background: #ececec82;">
                                                        <div class="col-5 mb-2">
                                                            <h5 class="mb-0">Health Care Card Number</h5>
                                                        </div>
                                                        :
                                                        <div class="col-6 mb-2">
                                                            <h5 class="mb-0"><?php echo $patient['health_care_card_number']; ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mt-3">
                                                    <div class="row align-items-center ">
                                                        <div class="col-5 mb-2">
                                                            <h5 class="mb-0">Repat Health Care Card Number</h5>
                                                        </div>
                                                        :
                                                        <div class="col-6 mb-2">
                                                            <h5 class="mb-0"><?php echo $patient['repat_health_care_card_number']; ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mt-3">
                                                    <div class="row align-items-center">
                                                        <div class="col-5 mb-2">
                                                            <h5 class="mb-0">Repat Pharmacy Benefits Card Number</h5>
                                                        </div>
                                                        :
                                                        <div class="col-6 mb-2">
                                                            <h5 class="mb-0"><?php echo $patient['repat_pharmacy_benefits_card']; ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mt-3">
                                                    <div class="row align-items-center" style="background: #ececec82;">
                                                        <div class="col-5 mb-2">
                                                            <h5 class="mb-0">Seniors Health Care Card Number</h5>
                                                        </div>
                                                        :
                                                        <div class="col-6 mb-2">
                                                            <h5 class="mb-0"><?php echo $patient['seniors_health_care_card_number']; ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mt-3">
                                                    <div class="row align-items-center" style="background: #ececec82;">
                                                        <div class="col-5 mb-2">
                                                            <h5 class="mb-0">Safety Net Entitlement Card Number</h5>
                                                        </div>
                                                        :
                                                        <div class="co-6 mb-2">
                                                            <h5 class="mb-0"><?php echo $patient['safety_net_entitlement_card_number_number']; ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mt-3">
                                                    <div class="row align-items-center ">
                                                        <div class="col-5 mb-2">
                                                            <h5 class="mb-0">Safety Net Concession Card Number</h5>
                                                        </div>
                                                        :
                                                        <div class="col-6 mb-2">
                                                            <h5 class="mb-0"><?php echo $patient['safety_net_concession_card_number']; ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mt-3">
                                                    <div class="row align-items-center ">
                                                        <div class="col-5 mb-2">
                                                            <h5 class="mb-0">Service Number</h5>
                                                        </div>
                                                        :
                                                        <div class="col-6 mb-2">
                                                            <h5 class="mb-0"><?php echo $patient['service_number']; ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mt-3">
                                                    <div class="row align-items-center" style="background: #ececec82;">
                                                        <div class="col-5 mb-2">
                                                            <h5 class="mb-0">Religion</h5>
                                                        </div>
                                                        :
                                                        <div class="col-6 mb-2">
                                                            <h5 class="mb-0"><?php echo $patient['religion']; ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="4a">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <!-- Patient Personal Information START -->
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4>Other Identifier</h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mt-3">
                                                    <div class="row align-items-center ">
                                                        <div class="col-5 ">
                                                            <h5 class="mb-0">My Health Record Number</h5>
                                                        </div>
                                                        :
                                                        <div class=" col-6 ">
                                                            <h5 class="mb-0"><?php echo $patient['my_health_record_number']; ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mt-3">
                                                    <div class="row align-items-center ">
                                                        <div class="col-5 col-md-6">
                                                            <h5 class="mb-0">My Health Record Consent Withdrawn</h5>
                                                        </div>
                                                        :
                                                        <div class="col-6 col-md-5">
                                                            <h5 class="mb-0"><?php echo $patient['my_health_record_consent_withdrawn']; ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mt-3">
                                                    <div class="row align-items-center ">
                                                        <div class="col-5 ">
                                                            <h5 class="mb-0">Health Data Respository (Indentifier)</h5>
                                                        </div>
                                                        :
                                                        <div class=" col-6">
                                                            <h5 class="mb-0"><?php echo $patient['health_data_respository']; ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="5a">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <!-- Patient Personal Information START -->
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4>Other Data</h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mt-3">
                                                    <div class="row align-items-center ">
                                                        <div class="col-4 mb-2">
                                                            <h5 class="mb-0">Deceased</h5>
                                                        </div>
                                                        :
                                                        <div class="col-7 mb-2">
                                                            <h5 class="mb-0"><?php echo ($_GET['p'] && $patient['deceased'] === '1') ? "Yes" : "-" ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mt-3">
                                                    <div class="row align-items-center ">
                                                        <div class="col-4 mb-2">
                                                            <h5 class="mb-0"> In Active</h5>
                                                        </div>
                                                        :
                                                        <div class="col-7 mb-2">
                                                            <h5 class="mb-0"><?php echo ($_GET['p'] && $patient['in_active'] === '1') ? "Yes" : "-" ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mt-3">
                                                    <div class="row align-items-center ">
                                                        <div class="col-4 mb-2">
                                                            <h5 class="mb-0">Enter By</h5>
                                                        </div>
                                                        :
                                                        <div class="col-7 mb-2">
                                                            <h5 class="mb-0"><?php echo $patient['enter_by']; ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="profile-view">
                    <div class="profile-img-wrap">
                        <div class="profile-img">
                            <!--profile image upload -->
<!-- <?php echo form_open_multipart('/patient/view/' . $patient['id'] . '/update/picture', array('id' => 'edit_profile_picture', 'class' => 'form tg-formtheme tg-editform')); ?>
                            <div class="tg-rightarea tg-useruploadimgholder">
                                <div id="plupload-profile-container"></div>
                                <div class="tg-useruploadimg">
                                    <img class="profile-pic" id="patient-profile-pic" src="<?php echo $profile_picture_path; ?>">
                                </div>
                            </div> -->
<!-- profile image upload-->
<!-- <div id="profile-picture-picker" class="tg-uploaduserimg tg-uploaduserimg1">
                                <a id="profile_image_uplaod" class="">
                                    <!-- <span>Upload Profile</span> -->
<!-- <i class="fa fa-camera upload-button"></i>
                                </a>
                            </div>
                            <input class="file-upload" type="file" id="txt_profile_pic" name="profile_pic" accept="image/*" />
                            <button class="btn btn-sm btn-info" id="update_profile_picture">Update</button>
                            <?php echo form_close(); ?>
                        </div> -->
<!-- </div> -->
<!-- <div class="profile-basic">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="profile-info-left">
                                    <h3 class="user-name m-t-0 mb-0"><?php echo $patient['first_name'] . " " . $patient['last_name']; ?></h3>
                                    <p class="small doj text-muted"><?php echo $patient['age'] . "y" ?> <span class="ml-2"><?php echo $patient['gender']; ?></span> </p> -->
<!-- <p>NHS: <strong><?php //echo $patient['nhs_format']; 
                        ?></strong></p> -->
<!-- <h4><?php echo $patient['description'] ?></h4>
                                </div>
                            </div> -->
<!-- <div class="col-md-7 pl-0">
                                <div class="personal-info">
                                    <table class="table table-borderless personal_table">
                                        <tr>
                                            <td>Patient ID</td>
                                            <td><?php echo implode(", ", array($patient['p_id_1'], $patient['p_id_2'])); ?></td>
                                            <td>Date Of Birth</td>
                                            <td><?php echo $patient['dob']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>NHS No.</td>
                                            <td><?php echo $patient['nhs_format']; ?></td>
                                            <td>Email</td>
                                            <td><?php echo $patient['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td><?php echo $patient['phone']; ?></td>
                                            <td>Address</td>
                                            <td>
                                                <?php if (!empty($patient['address_1'])) echo nl2br($patient['address_1']) . "<br/>"; ?>
                                                <?php if (!empty($patient['city'])) echo $patient['city'] . ",  "; ?>
                                                <?php if (!empty($patient['state'])) echo $patient['state'] . "<br/>"; ?>
                                                <div><?php if (!empty($patient['country'])) echo $patient['country'] . ", "; ?>
                                                    <?php if (!empty($patient['post_code'])) echo $patient['post_code']; ?></div>
                                            </td>
                                        </tr>
                                    </table>
                                </div> -->
<!-- <ul class="personal-info thumb_view">
                                    <li>
                                        <div class="title">Patient ID</div>
                                        <div class="text"><?php echo $patient['pid']; ?></div>
                                    </li>
                                    <li>
                                        <div class="title">Date Of Birth</div>
                                        <div class="text"><?php echo $patient['dob']; ?></div>
                                    </li>
                                    <li>
                                        <div class="title">Age</div>
                                        <div class="text"><?php echo $patient['age']; ?></div>
                                    </li>
                                    <li>
                                        <div class="title">Gender</div>
                                        <div class="text"><?php echo $patient['gender']; ?></div>
                                    </li>
                                    <li>
                                        <div class="title">NHS</div>
                                        <div class="text"><?php echo $patient['nhs_format']; ?></div>
                                    </li>
                                    <li>
                                        <div class="title">Email</div>
                                        <div class="text"><?php echo $patient['email']; ?></div>
                                    </li>
                                    <li>
                                        <div class="title">Phone</div>
                                        <div class="text"><?php echo $patient['phone']; ?></div>
                                    </li>
                                    <li>
                                        <div class="title">Address</div>
                                        <div class="text">
                                            <?php if (!empty($patient['address_1'])) echo nl2br($patient['address_1']) . "<br/>"; ?>
                                            <?php if (!empty($patient['city'])) echo $patient['city'] . ",  "; ?>
                                            <?php if (!empty($patient['state'])) echo $patient['state'] . "<br/>"; ?>
                                            <?php if (!empty($patient['country'])) echo $patient['country'] . ", "; ?>
                                            <?php if (!empty($patient['post_code'])) echo $patient['post_code']; ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="title"></div>
                                        <div class="text"></div>
                                    </li>
                                </ul> -->
<!-- </div>
                        </div>
                    </div>
                    <div class="pro-edit"><a data-target="#edit_patient" data-toggle="modal" class="edit-icon" href="javascript:void(0);"><i class="fa fa-pencil"></i></a></div>
                </div>
            </div>
        </div>
    </div>
</div>  -->
<h3>Records</h3>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table custom-table" id="patient-records-table" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Specimen Type</th>
                        <th>LabNo.</th>
                        <!-- <th>Specialty</th> -->
                        <!--<th>Pathologist</th>
                         <th>PCI No.</th> -->
                        <!-- <th>LabNo.<br>Rel Date.</th> -->
                        <th>Rel Date.</th>

                        <th class="status_up">
                        Requester
                        </th>
                        <th>TAT</th>
                        <th>
                            <img data-toggle="tooltip" title="Urgency" src="<?php echo base_url('/assets/icons/Reported--UnReported.png'); ?>" class="img-responsive">
                            <img data-toggle="tooltip" title="Flag" src="<?php echo base_url('/assets/icons/flag-skyblue.png'); ?>" class="img-responsive">
                            <img data-toggle="tooltip" title="Microscopic" src="<?php echo base_url('/assets/icons/VSlides.png'); ?>" class="img-responsive">
                            <img data-toggle="tooltip" title="Comments" src="<?php echo base_url('/assets/icons/Comments.png'); ?>" class="img-responsive">
                        </th>
                        <th class="text-right">
                            <img data-toggle="tooltip" title="Actions" src="<?php echo base_url('/assets/icons/Actions-Blue.png'); ?>" class="img-responsive pull-right">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($records as $rec) : ?>
                        <?php
                        $assign_user_info = getLoggedInUserProfile(intval($rec['users_id']));
                        $specialty = get_record_specialty($rec['uralensis_request_id']);
                        $lab_release_date = '';
                        if (!empty($rec['date_received_bylab'])) {
                            $lab_release_date = date('d-m-Y', strtotime($rec['date_received_bylab']));
                        }
                        $urgency_class = '';
                        $urgency_title = '';
                        if (!empty($rec['report_urgency']) && $rec['report_urgency'] === 'Urgent') {
                            $urgency_class = 'urgent-wb';
                            $urgency_title = 'Urgent';
                        } elseif (!empty($rec['report_urgency']) && $rec['report_urgency'] === '2WW') {
                            $urgency_class = 'two_ww';
                            $urgency_title = '2WW';
                        } else {
                            $urgency_class = 'routine';
                            $urgency_title = 'Routine';
                        }
                        $has_slide = request_has_slides($rec['uralensis_request_id']);
                        $flag_count = 11;
                        ?>
                        <tr>
                            <td><?php echo $rec['spec_grp_name'] ?></td>
                            <td><?php echo $rec['serial_number'] ?></td>
                            <!-- <td><?php echo $specialty; ?></td> -->
                          <!--  <td>
                            <?php 
                            $decryptedDetails = $this->Userextramodel->getUserDecryptedDetailsByid($rec['doctor_id']);
                            $profile_picture_path  = $decryptedDetails->profile_picture_path;
                            $img = get_profile_picture($profile_picture_path, $decryptedDetails->first_name, $decryptedDetails->last_name);
                            $rname = $rec['doctor_first_name']." ".$rec['doctor_last_name'];?>
                            <img src="<?php echo $img ?>" class='avatar' title="<?php echo $rname ?>">
                                 <?php echo $rec['doctor_first_name'] . ' ' . $rec['doctor_last_name']; ?></td> -->
                            <!-- <td><?php echo $rec['pci_number']; ?></td> -->
                            <!-- <td><?php echo $rec['lab_number']; ?><br /> <?php echo $lab_release_date; ?> </td> -->
                            <td><?php echo $lab_release_date; ?> </td>
                            


                            <td class="">
                            <img class="avatar" src="<?php echo get_profile_picture($assign_user_info[0]->profile_picture_path, $assign_user_info[0]->first_name, $assign_user_info[0]->last_name); ?>" title="<?= $assign_user_info[0]->first_name. " ". $assign_user_info[0]->last_name; ?>">
                                <!-- <div class="comments_icon">
                                    <a style="color:#000;" href="javascript:;" id="show_comments_list" class="show_comments_record_list" data-recordid="<?php echo $rec['uralensis_request_id']; ?>" data-modalid="<?php echo $flag_count; ?>">
                                        <!-- <i class="lnr lnr-file-empty" style=""></i> -->
                                        <!-- <span class="badge  badge-info">With Doctor</span> -->
                                        
                                    </a>
                                </div> 
                                <div id="display_comments_list-<?php echo $flag_count; ?>" class="modal fade display_comments_list" role="dialog" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Flag Comments</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="display_flag_msg"></div>
                                                <div class="flag_comments_dynamic_data"></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a class="custom_badge_tat">
                                    <?php
                                    $now = time();
                                    $date_taken = !empty($rec['date_taken']) ? $rec['date_taken'] : '';
                                    $request_date = !empty($rec['request_datetime']) ? $rec['request_datetime'] : '';
                                    $tat_date = '';

                                    $tat_settings = uralensis_get_tat_date_settings($rec['hospital_group_id']);

                                    if (!empty($tat_settings) && $tat_settings['ura_tat_date_data'] === 'date_sent_touralensis') {
                                        $date_sent_to_uralensis = !empty($rec['date_sent_touralensis']) ? $rec['date_sent_touralensis'] : '';
                                        $tat_date = $date_sent_to_uralensis;
                                    } elseif ($tat_settings['ura_tat_date_data'] === 'date_rec_by_doctor') {
                                        $data_rec_by_doctor = !empty($rec['date_rec_by_doctor']) ? $rec['date_rec_by_doctor'] : '';
                                        $tat_date = $data_rec_by_doctor;
                                    } elseif ($tat_settings['ura_tat_date_data'] === 'data_processed_bylab') {
                                        $data_processed_bylab = !empty($rec['data_processed_bylab']) ? $rec['data_processed_bylab'] : '';
                                        $tat_date = $data_processed_bylab;
                                    } elseif ($tat_settings['ura_tat_date_data'] === 'date_received_bylab') {
                                        $date_received_bylab = !empty($rec['date_received_bylab']) ? $rec['date_received_bylab'] : '';
                                        $tat_date = $date_received_bylab;
                                    } elseif ($tat_settings['ura_tat_date_data'] === 'publish_datetime') {
                                        $publish_datetime = !empty($rec['publish_datetime']) ? $rec['publish_datetime'] : '';
                                        $tat_date = $publish_datetime;
                                    } else {
                                        if (!empty($date_taken)) {
                                            $tat_date = $date_taken;
                                        } else {
                                            $tat_date = $request_date;
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
                            </td>
                            <td class="flag_column text-center">
                                <div class="<?php echo $urgency_class; ?>" data-toggle="tooltip" data-placement="top" title="<?php echo $urgency_title; ?>" style="font-size:18px;"></div>
                                <div class="hover_flags">
                                    <div class="flag_images">
                                        <?php if ($rec['flag_status'] === 'flag_red') { ?>
                                            <img data-toggle="tooltip" data-placement="top" title="This case marked as urgent." class="report_selected_flag" src="<?php echo base_url('assets/img/flag_lg_red.png'); ?>">
                                        <?php } elseif ($rec['flag_status'] === 'flag_yellow') { ?>
                                            <img class="report_selected_flag" src="<?php echo base_url('assets/img/flag_lg_yellow.png'); ?>">
                                        <?php } elseif ($rec['flag_status'] === 'flag_blue') { ?>
                                            <img data-toggle="tooltip" data-placement="top" title="This case marked for Pre-Authorization." class="report_selected_flag" src="<?php echo base_url('assets/img/flag_lg_blue.png'); ?>">
                                        <?php } elseif ($rec['flag_status'] === 'flag_black') { ?>
                                            <img data-toggle="tooltip" data-placement="top" title="This case marked as further work." class="report_selected_flag" src="<?php echo base_url('assets/img/flag_lg_black.png'); ?>">
                                        <?php } elseif ($rec['flag_status'] === 'flag_gray') { ?>
                                            <img data-toggle="tooltip" data-placement="top" title="This case marked as awaiting reviews." class="report_selected_flag" src="<?php echo base_url('assets/img/flag_lg_gray.png'); ?>">
                                        <?php } else { ?>
                                            <img data-toggle="tooltip" data-placement="top" title="This case marked as released." class="report_selected_flag" src="<?php echo base_url('assets/img/flag_lg_green.png'); ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div><img <?php if ($has_slide) echo 'onclick = "window.location.href = \'' . base_url() . 'doctor/doctor_record_detail/' . $rec['uralensis_request_id'] . '/view\'"' ?> src="<?php if ($has_slide) echo base_url('/assets/icons/vslideico_green.png');
                                                                                                                                                                                                                else echo base_url('/assets/icons/vslideico.png'); ?>" style="<?php if ($has_slide) echo 'width: 25px; cursor: pointer;' ?>" class="img-responsive vslideico"></div>
                                <div class="comments_icon">
                                    <a style="color:#000;" href="javascript:void(0);" class="display_comment_box" data-recordid="<?php echo $rec['uralensis_request_id']; ?>" data-modalid="<?php echo $flag_count; ?>">
                                        <i class="lnr lnr-bubble"></i>
                                    </a>
                                </div>
                                <!--<div id="flag_comment_model-<?php /*echo $flag_count; */ ?>" class="flag_comment_model modal fade" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Flag Reason Comment</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="flag_msg"></div>
                                                <form class="form flag_comments" id="flag_comments_form">
                                                    <div class="form-group">
                                                        <textarea name="flag_comment" id="flag_comment" class="form-control flag_comment"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <hr>
                                                        <input type="hidden" name="record_id" value="<?php /*//echo $rec['uralensis_request_id']; */ ?>">
                                                        <a class="btn btn-primary flag_comments_save_record_list" id="flag_comments_save" href="javascript:;">Save Comments</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
                            </td>
                            <td style="text-align:right; padding-right: 10px;">
                                <?php $request_type = '';
                                if ($rec['speciality_group_id'] == '2') {
                                    $request_type = '/postmortem';
                                } elseif ($rec['speciality_group_id'] == '3') {
                                    $request_type = '/virology';
                                }
                                ?>
                                <a class="edit-icon" href="<?php echo site_url() . '/doctor/doctor_record_detail_old/' . $rec['uralensis_request_id'] . $request_type; ?>"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="flag_comment_model" class="flag_comment_model modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-left">Flag Reason Comment</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="flag_msg"></div>
                <form class="form flag_comments" id="flag_comments_form">
                    <div class="form-group">
                        <textarea name="flag_comment" id="flag_comment" class="form-control flag_comment"></textarea>
                    </div>
                    <div class="form-group">
                        <hr>
                        <input type="hidden" name="record_id" id="record_id" value="<?php //echo $rec['uralensis_request_id']; 
                                                                                    ?>">
                        <a class="btn btn-primary flag_comments_save_record_list" href="javascript:void(0);">Save Comments</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="edit_patient" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit Patient</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tg-editformholder">
                    <?php echo form_open(base_url('patient/view/' . $patient['id'] . '/update/profile'), array('id' => 'edit-patient-form', 'class' => 'tg-formtheme tg-editform create_user_form')); ?>
                    <div class="card mb-4">
                        <div class="card-body">
                            <!-- Patient Personal Information START -->
                            <fieldset>
                                <div class="form-group">

                                    <label>Select Hospital</label>
                                    <select type="text" name="group" id="group-input" value="" class="form-control select">
                                        <?php foreach ($hospitals as $hospital) : ?>
                                            <option value="<?php echo $hospital['id'] ?>" <?php if ($hospital['id'] == $patient['hos_id']) { ?> selected="selected" <?php }
                                                                                                                                                                    ?>><?php echo $hospital['description']; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-user"></i>
                                            <input type="text" name="first_name" id="first-name-input" value="<?php echo $patient['first_name']; ?>" class="form-control" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-user"></i>
                                            <input type="text" name="last_name" id="last-name-input" value="<?php echo $patient['last_name']; ?>" class="form-control" placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-license"></i>
                                            <input type="text" name="nhs_number" id="nhs-number-input" value="<?php echo $patient['nhs_number']; ?>" class="form-control" placeholder="NHS Number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-license"></i>
                                            <input type="text" name="hospital_id" id="hospital-id-input" value="<?php echo $patient['hos_id']; ?>" class="form-control" placeholder="Hospital No">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender-input">Gender</label>
                                            <select name="gender" id="gender-input" class="form-control">
                                                <option <?php echo $patient['gender'] === 'Male' ? "selected" : ""; ?> value="Male">Male</option>
                                                <option <?php echo $patient['gender'] === 'Female' ? "selected" : ""; ?> value="Female">Female</option>
                                                <option <?php echo $patient['gender'] === 'Other' ? "selected" : ""; ?> value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group tg-inputwithicon">
                                            <label for="dob-input">Date of Birth</label>
                                            <i class="lnr lnr-calendar-full"></i>
                                            <input type="date" name="dob" id="dob-input" value="<?php echo $patient['dob_format']; ?>" class="form-control" placeholder="Date Of Birth">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="password-row">
                                    <div class="col-md-6">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-envelope"></i>
                                            <input type="email" name="email" id="email-input" value="<?php echo $patient['email']; ?>" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group tg-inputwithicon">
                                            <span>
                                                <i class="lnr lnr-phone-handset"></i>
                                            </span>
                                            <input type="text" name="phone" id="phone-input" value="<?php echo $patient['phone']; ?>" class="form-control" placeholder="Phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group tg-inputwithicon">
                                            <label for="address1-input">Patient ID</label>
                                            <i class="lnr lnr-apartment"></i>
                                            <input type="text" name="p_id_1" id="p_id_1" value="<?php echo $patient['p_id_1']; ?>" class="form-control" placeholder="Patient ID 1">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group tg-inputwithicon">

                                            <i class="lnr lnr-apartment"></i>
                                            <input type="text" name="p_id_2" id="p_id_2" value="<?php echo $patient['p_id_2']; ?>" class="form-control" placeholder="Patient ID 2">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group tg-inputwithicon">
                                            <label for="address1-input">Address</label>
                                            <i class="lnr lnr-apartment"></i>
                                            <input type="text" name="address1" id="address1-input" value="<?php echo $patient['address_1']; ?>" class="form-control" placeholder="Address Line 1">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-map-marker"></i>
                                            <input type="text" name="city" id="city-input" value="<?php echo $patient['city']; ?>" class="form-control" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-map"></i>
                                            <input type="text" name="state" id="state-input" value="<?php echo $patient['state']; ?>" class="form-control" placeholder="State">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-earth"></i>
                                            <input type="text" name="country" id="country-input" value="<?php echo $patient['country']; ?>" class="form-control" placeholder="Country">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-pushpin"></i>
                                            <input type="text" name="post_code" id="post-code-input" value="<?php echo $patient['post_code']; ?>" class="form-control" placeholder="Post Code">
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
            </div>
        </div>
    </div>
</div>
<script>
    var patient_id = "<?php echo $patient['id'] ?>";
    $(document).ready(function() {
        $(document).on('click', '.display_comment_box', function() {
            let recordID = $(this).attr('data-recordid');
            $('#flag_comment_model').find('#record_id').val(recordID);
            $('#flag_comment_model').modal('show');
        });

        $(document).on('click', '.flag_comments_save_record_list', function(e) {
            e.preventDefault();
            var _this = $(this);
            var form_data = $('#flag_comment_model').find('#flag_comments_form').serialize();
            $.ajax({
                url: '<?php echo base_url('/patient/save_flag_comments'); ?>',
                type: 'POST',
                global: false,
                dataType: 'json',
                data: form_data,
                success: function(data) {
                    $('#flag_comment_model').modal('hide');
                    if (data.type === 'error') {
                        $.sticky(data.msg, {
                            classList: 'important',
                            speed: 200,
                            autoclose: 7000
                        });
                    } else {
                        $.sticky(data.msg, {
                            classList: 'success',
                            speed: 200,
                            autoclose: 7000
                        });
                        /*window.setTimeout(function () {
                            window.location.reload();
                        }, 3000);*/
                    }
                }
            });
        });
        $('#tb1').click(function() {
            $('.tab_li').removeClass('active');
            $('#tb1').parent('li').addClass('active');
            $('#1a').show();
            $('#2a, #3a, #4a, #5a').hide();
        });
        $('#tb2').click(function() {
            $('.tab_li').removeClass('active');
            $('#tb2').parent('li').addClass('active');
            $('#2a').show();
            $('#1a, #3a, #4a, #5a').hide();

        });
        $('#tb3').click(function() {
            $('.tab_li').removeClass('active');
            $('#tb3').parent('li').addClass('active');
            $('#3a').show();
            $('#1a, #2a, #4a, #5a').hide();
        });
        $('#tb4').click(function() {
            $('.tab_li').removeClass('active');
            $('#tb4').parent('li').addClass('active');
            $('#4a').show();
            $('#1a, #2a, #3a, #5a').hide();
        });
        $('#tb5').click(function() {
            $('.tab_li').removeClass('active');
            $('#tb5').parent('li').addClass('active');
            $('#5a').show();
            $('#1a, #2a, #3a, #4a').hide();
        });
    });
</script>