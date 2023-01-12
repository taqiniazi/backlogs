<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php 
$user_id = $this->ion_auth->user()->row()->id;
$hospital_user_specimen_data = $this->ion_auth->user($user_id)->row()->hospital_user_specimen_data;
?>
<style type="text/css">
td a.hospital_initials {
    display: block;
    width: 30px;
    height: 30px;
    background: #1b75cd;
    color: #ffffff;
    text-align: center;
    border-radius: 50%;
    line-height: 30px;
    font-size: 11px;
    letter-spacing: -1px;
}
    div.dataTables_wrapper div.dataTables_length select {
        position: absolute;
        top:-62px;
        height: 37px !important;
        width: 50px !important;
        left: 29px;
        padding:0;
    }
    table.dataTable thead > tr > th.sorting_asc, table.dataTable thead > tr > th.sorting_desc, table.dataTable thead > tr > th.sorting, table.dataTable thead > tr > td.sorting_asc, table.dataTable thead > tr > td.sorting_desc, table.dataTable thead > tr > td.sorting{
        padding-right: 15px !important
    }
    .custome_BTN label:focus{
        background: #006df1;
        color: #fff !important;
        border-color: #006df1;
    }
    .breadcrumb{padding: 0 !important}
    .tg-cancel input{
        display: none;
    }

    .tg-cancel label i {
        color: red;
    }

    .tg-cancel label {
        cursor: pointer;
        margin-bottom: 0;
        width: 45px;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 50%;
    }
    .form-width {
    width: 19%;
}
    div#doctor_record_publish_table_filter {
    display: none;
}
div#doctor_record_publish_table_length{
    position: absolute;
}
div.dataTables_wrapper div.dataTables_length select {
    top: -60px;
    left: 0;
}
.dataTables_wrapper .row+.row {
    width: auto;
}
    
    @media screen and (min-width: 1600px) {
        body{font-size: 18px;}
    }
     @media screen and (max-width: 1380px) {
        .tg-cancel label {
            width: 35px;
            padding: 5px;
        }
        div.dataTables_wrapper div.dataTables_length select{top: -59px;}
    }
    .action_th_icon{
        float: right !important;
    }
    @media screen and (max-width: 400px) {
    div.dataTables_wrapper div.dataTables_length select {
    top: -48px;
}
 }
</style>
<style type="text/css">
    .nav-tabs.nav-tabs-solid>li {
        margin-bottom: 6px;
    }

    .nav-tabs.nav-tabs-solid>li>a {
        color: #fff;
        margin-left: 10px;
        font-size: 20px;
        font-family: inherit;
        border-radius: 0px !important;
        padding: 15px 20px;
        float: left;
    }
    .tooltipIcon img {
        max-width: 34px;
        margin-top: 10px;
    }
    
    .btn-link:hover{
        text-decoration: none;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        padding-left: 45px;
    }

    #template_preview .card {
        min-height: 475px;
    }

    .custom_card .card {
        min-height: 597px;
    }

    span.tooltipIcon {
        position: absolute;
        top: 0px;
        left: 17px;
        display: none;
    }

    button.add_temp {
        height: auto;
        right: 0;
        padding: 0 12px;
        width: auto;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .fa-file-o {
        position: absolute;
        left: 20px;
        width: 40px;
        text-align: center;
        font-size: 32px;
        z-index: 99;
        top: 15px;
    }
    .page-header .breadcrumb {
        background-color: transparent;
        color: #6c757d;
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 0;
        padding: 0;
    }

    .page-header .breadcrumb a {
        color: #333;
    }

    .breadcrumb-item.active {
        color: #6c757d;
    }


    #barcode_no {
        height: 50px;
    }

    .nav-tabs.nav-tabs-solid>li>.dropdown-action {
        float: right;
    }

    /*.blue-border {
    border: 1px solid blue !important;
}*/

    .dropdown-menu-right a.dropdown-item {
        background: transparent;
        color: #222;
        font-size: 14px;
    }

    .nav-tabs.nav-tabs-solid>li>a:hover,
    .nav-tabs.nav-tabs-solid>li>a:focus {
        background-color: #00c5fb !important;
        border-color: #00c5fb !important;
        color: #fff !important;
    }

    .list_view {
        display: none;
    }

    .show {
        display: block;
    }

    .hide {
        display: none;
    }

    .cog-class {
        line-height: 1;
        margin-top: 10px;
    }

    .fa-th:before {
        content: "\f00a" !important;
    }

    a.action-icon.dropdown-toggle {
        background: #1b75cd;
        color: #fff;
        padding: 0 10px;
        height: 51px;
        border-radius: 0 !important;
        padding: 13px;
    }

    a.action-icon.dropdown-toggle:hover,
    a.action-icon.dropdown-toggle:focus {
        background-color: #00c5fb !important;
        border-color: #00c5fb !important;
        color: #fff !important;
    }

    .card {
        margin-bottom: 0;
    }

    .accordion-button {
        font-size: 1.5rem;
    }

    #patient-table tbody tr:hover {
        background-color: lightblue;
        cursor: pointer;
    }

    .page-wrapper.sidebar-patient {
        padding: 75px 30px 0;
    }

    .danger-text { 
        color: red;
    }

    #speciality-container {
        display: flex;
        flex-wrap: wrap;
    }

    .speciality-box {
        min-width: 200px;
        margin-right: 20px;
        padding: 20px 25px;
        border-radius: 12px;
        margin-bottom: 50px;
        box-shadow: 5px 5px 20px rgba(200, 200, 200, 0.7);
        cursor: pointer;
    }

    .selected-speciality {
        background-color: lightblue;
    }

    #next-button {
        position:absolute;
        bottom: 0;
        right: 10px;
        display: none;
    }

    .profile-widget{
        padding: 50px 15px;

    }

    .profile-img{
        width: auto;
        height: auto;
        margin-bottom: 20px;
    }

    .danger-text { 
        color: red;
    }

    #speciality-container {
        display: flex;
        flex-wrap: wrap;
    }


    .speciality-box {
        min-width: 200px;
        margin-right: 20px;
        padding: 20px 25px;
        border-radius: 12px;
        margin-bottom: 50px;
        box-shadow: 5px 5px 20px rgba(200, 200, 200, 0.7);
        cursor: pointer;
    }

    .selected-speciality {
        background-color: lightblue;
    }


</style>
<div class="content tablewidth container-fluid publish-record">
<div class="row">
        <div class="speace-setup col-sm-12">
        <h3 class="page-title">Published Report</h3>
</div>
 <br />
 
 </div>
 
<div class="row">
    <div class="col-md-12">

        <?php foreach ($query1 as $row) : ?>
           
            <table class="table table-bordered">
                <tr class="info">
                    
                    <th >LAB No: <?php echo $row->lab_number; ?></th>
                    
                    <th >Request Date : <?php echo $row->date_received_bylab; ?></th>
                    
                    <th >Published Date: <?php echo $row->publish_datetime; ?></th>
                    <th> <?php
                if ($row->status == 0) :
                    echo '<span>In Progress <img src="' . base_url('/assets/img/fail.gif') . '"></span> ';
                else :
                    echo '<span style="color:green;">Published <img src="' . base_url('/assets/img/success.gif') . '"></span> <br>';
                endif;
                ?></th>
                </tr>
               
                <tr>
                <td class="active"><strong>Patient.</strong></td>
                    <td><?php echo $row->f_name; ?> <?php echo $row->sur_name; ?></td>
                    <td class="active"><strong>Patient Initial</strong></td>
                    <td><?php echo $row->patient_initial; ?></td>
                    

                </tr>
                <tr>
                    <td class="active"><strong>Gender</strong></td>
                    <td><?php echo $row->gender; ?></td>
                    <td class="active"><strong>Date of Birth</strong></td>
                    <td><?php echo $row->dob; ?></td>

                </tr>
                <tr>
                    <td class="active"><strong>Lab Name</strong></td>
                    <td><?php echo $row->lab_name; ?></td>
 <td class="active"><strong>Lab Receiving Date</strong></td>
                    <td><?php echo $row->date_received_bylab; ?></td>
                </tr>
               
               
                <!--<tr>
                    <td class="active"><strong>Received By Lab</strong></td>
                    <td><?php echo $row->date_sent_touralensis; ?></td>
                    <td class="active"><strong>Pathologist</strong></td>
                    <td><?php echo $row->clrk; ?></td>

                </tr>-->
                <tr>
                    <td class="active"><strong>Date Taken</strong></td>
                    <td><?php echo $row->date_taken; ?></td>
                    <td class="active"><strong>Report Urgency</strong></td>
                    <td><?php echo $row->report_urgency; ?></td>

                </tr>
                <tr>
                    <td  class="active"><strong>Clinical Details</strong></td>
                    <td><?php
            $count = 1;
            foreach ($query2 as $C_row) {
                ?><?php $Cdetails= $C_row->specimen_clinical_history; } print $Cdetails;?></td>
                    <td  class="active"></td>
                    <td></td>
                </tr>
            </table>
            <?php
        endforeach;
        ?>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            
            <?php
            $count = 1;
            foreach ($query2 as $row) {
                ?>
                <div class="panel panel-info">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $count; ?>" aria-expanded="true" aria-controls="collapseOne">
                                <strong>Specimen <?php echo $count; ?></strong>
                            </a>
                        </h4>
                    </div>
                    <div id="<?php echo $count; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <?php if($hospital_user_specimen_data !== 'on') { ?>
                                <tr>
                                    <td style="width:20%;" class="active"><strong>Specimen Site (T Code)</strong></td>
                                    <td style="width:40%;"><?php echo $row->specimen_site; ?></td>
                                    <td style="width:20%;" class="active"><strong>Specimen Procedure (P Code)</strong></td>
                                    <td style="width:40%;"><?php echo $row->specimen_procedure; ?></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td style="width:20%;" class="active"><strong>Specimen Type</strong></td>
                                    <td style="width:20%;"><?php echo $row->specimen_type; ?></td>
                                    <td class="active"><strong>Specimen Slides</strong></td>
                                    <td><?php echo $row->specimen_slides; ?></td>
                                </tr>
                                <?php if($hospital_user_specimen_data !== 'on') { ?>
                                <tr>
                                    <td class="active"><strong>Specimen Block</strong></td>
                                    <td><?php echo $row->specimen_block; ?></td>
                                    <td class="active"><strong>Specimen Block Type</strong></td>
                                    <td><?php echo $row->specimen_block_type; ?></td>

                                </tr>
                                <?php } ?>
                                <tr>
                                    <td class="active"><strong>Specimen Macroscopic Description</strong></td>
                                    <td><?php echo $row->specimen_macroscopic_description; ?></td>
                                    <?php if($hospital_user_specimen_data !== 'on') { ?>
                                    <td class="active"><strong>Specimen Microscopic Code</strong></td>
                                    <td><?php echo $row->specimen_microscopic_code; ?></td>
                                    <?php } ?>
                                </tr>
                                <?php if($hospital_user_specimen_data !== 'on') { ?>
                                <tr>
                                    <td class="active"><strong>Specimen Microscopic Description</strong></td>
                                    <td><?php echo $row->specimen_microscopic_description; ?></td>
                                    <td class="active"><strong>Specimen Snomed Code</strong></td>
                                    <td><?php echo $row->specimen_snomed_code; ?></td>
                                </tr>
                                <?php } ?>
                                <?php if($hospital_user_specimen_data !== 'on') { ?>
                                <tr>
                                    <td class="active"><strong>Specimen Snomed Description</strong></td>
                                    <td><?php echo $row->specimen_snomed_description; ?></td>
                                    <td class="active"><strong>Specimen RCPath Code</strong></td>
                                    <td><?php echo $row->specimen_rcpath_code; ?></td>
                                </tr>
                                <?php } ?>
                                <?php if($hospital_user_specimen_data !== 'on') { ?>
                                <tr>
                                    <td  class="active"><strong>Specimen Diagnosis</strong></td>
                                    <td><?php echo $row->specimen_diagnosis_description; ?></td>
                                    <td  class="active"><strong>Specimen Cancer Register</strong></td>
                                    <td><?php echo $row->specimen_cancer_register; ?></td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
                <?php
                $count++;
            }
            ?>
        </div>
    </div>


</div>
