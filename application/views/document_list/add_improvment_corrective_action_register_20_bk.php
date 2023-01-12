<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
    .edit-icon-top i {
        top: 47px;
    }

    .sec_title.p_id {
        position: relative;
        background: #fff;
        padding: 0px;
        border-bottom: 0;
        margin-bottom: 30px;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
    }

    .sec_title.p_id .info_nndn2 {
        border: 1px solid #eee !important;
    }

    .page-wrapper>.content {
        background: #f5f5f5;
    }

    .sec_title.p_id .info_nndn2 tr td {
        padding: 5px 15px;
    }

    .border-pd {
        padding: 5px 15px;
    }

    .tox-statusbar__branding {
        display: none;
    }

    /* .form-design-action label {
    background: #313f62;
    padding: 10px;
    color: #fff;
    margin-bottom: 20px;
    margin-top: 20px;
}
.form-design-action .dropdown .form-control {
    width: 50%;
} */
    .design-form label {
        display: inline-block;
    }

    .design-form .form-control {
        display: inline-block;
    }

    .design-form .border-set input {
        width: 100%;
        max-width: 425px;
        margin-left: 20px;
    }

    .design-form .border-set .col-md-3 input {
        width: 100%;
        max-width: 300px;
        margin-left: 0px;
        margin-top: 10px;
    }

    .design-form .border-set .col-md-4 select,
    .design-form .border-set .col-md-4 input {
        width: 100%;
        max-width: 424px;
        margin-left: 0px;
        margin-top: 10px;
    }

    .design-form .form-outlay {
        padding: 15px;
        margin-bottom: 15px;
        margin-top: 30px;
        border: 1px solid #ededed;
        box-shadow: 0 1px 1px 0 rgb(0 0 0 / 20%);
    }

    .design-form .form-outlay .heading {
        background: #02bbf7;
        color: #fff;
        padding: 12px;
        width: 100%;
    }

    .design-form ::placeholder {
        /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: #000;
        opacity: 1;
        /* Firefox */
        font-size: 20px;
    }

    .design-form :-ms-input-placeholder {
        /* Internet Explorer 10-11 */
        color: #000;
    }

    .design-form ::-ms-input-placeholder {
        /* Microsoft Edge */
        color: #000;
    }

    .design-form .border-set {
        border-top: 0px solid #000;
        padding-top: 20px;
    }

    .design-form .border-set .left-l::after {
        border-right: 0px solid #000;
        content: "";
        width: 0px;
        height: 81px;
        position: absolute;
        right: 10px;
        top: -21px;
    }

    .design-form .border-set .left-l .form-control {
        width: 100%;
        max-width: 250px;
        margin: 0px 10px;
    }

    .design-form .border-set .left-lr::after {
        border-right: 0px solid #000;
        content: "";
        width: 0px;
        height: 134px;
        position: absolute;
        right: 10px;
        top: -21px;
    }

    .design-form .border-set .left-ltr .form-control {
        width: 100%;
        max-width: 450px;
        margin: 0px 10px;
    }

    .design-form .border-set .bor-l::after {
        border-right: 0px solid #000;
        content: "";
        width: 0px;
        height: 81px;
        position: absolute;
        right: 10px;
        top: -21px;
    }
</style>

<div class="page-header">
    <div class="row align-items-center">
        <div class="col">

            <h3 class="page-title"><?php echo (isset($page_title)) ? $page_title : 'Customer Feedback' ?></h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('Document') ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('Document_List/improvment_corrective_action_register') ?>">Customer Feedback</a></li>

            </ul>
        </div>
    </div>
</div>

<div class="notification">
    <?php if ($this->session->flashdata('success') != '') { ?>
        <div class="success_list">
            <?= $this->session->flashdata('success'); ?>
        </div>
    <?php } ?>
    <?php if ($this->session->flashdata('error') != '') { ?>
        <div class="error_list">
            <?= $this->session->flashdata('error'); ?>
        </div>
    <?php } ?>
</div>

<div class="">

    <?php echo form_open('', array('id' => 'add-supplier-form', 'class' => 'tg-formtheme tg-editform create_user_form')); ?>
    <input type="hidden" name="improvment_corrective_action_register_id" value="<?php echo $result['id']; ?>">
    <div class="sec_title p_id form-group form-design-action">

        <div class="border-pd">

            <div class="row">

                <div class="col-md-12 design-form">
                    <div class="form-outlay">
                        <div class="form-group dropdown">
                            <label class="heading mb-30">Nonconformity raised as a result of</label>

                            <select name="nonconformity" class="form-control" required>
                                <option value="Internal audit" <?php if ($result['nonconformity'] == 'Internal audit') echo 'selected'; ?>>Internal audit</option>
                                <option value="Customer/Client complaint" <?php if ($result['nonconformity'] == 'Customer/Client complaint') echo 'selected'; ?>>Customer/Client complaint</option>
                                <option value="Process non-conformity" <?php if ($result['nonconformity'] == 'Process non-conformity') echo 'selected'; ?>>Process non-conformity</option>
                                <option value="Suggestion (improvement)" <?php if ($result['nonconformity'] == 'Suggestion (improvement)') echo 'selected'; ?>>Suggestion (improvement)</option>
                                <option valus="FNQH Incident, indicate number" <?php if ($result['nonconformity'] == 'FNQH Incident, indicate number') echo 'selected'; ?>>FNQH Incident, indicate number</option>
                                <option value="Product non-conformity" <?php if ($result['nonconformity'] == 'Product non-conformity') echo 'selected'; ?>>Product non-conformity</option>
                                <option value="Others">Others</option>
                            </select>


                        </div>
                    </div>
                </div>

                <div class="col-md-12 design-form">
                    <div class="form-outlay">
                        <div class="form-group">
                            <label class="heading">Reference</label>

                            <textarea rows="10" name="reference" class="form-control texteditor" placeholder="Documents used or referred-to (e.g. manuals, procedures, flowcharts, standards, records …)"><?= $result['reference']; ?></textarea>
                            <!-- <input type="text"   value="<?php echo (isset($result['ref'])) ? $result['ref'] : ''; ?>"  placeholder="Reference" required>-->
                            <?php echo  form_error('name'); ?>

                        </div>
                    </div>
                </div>

                <div class="col-md-12 design-form">
                    <div class="form-outlay">
                        <div class="form-group">
                            <label class="heading">Non-Conformity/Capa</label>

                            <textarea rows="10" name="capa" class="form-control texteditor" placeholder="Describe nonconformity, suggestion, complaint, incidentor preventive action."><?= $result['capa']; ?></textarea>
                            <!--<input type="text" name="intiative"  value="<?php echo (isset($result['intiative'])) ? $result['intiative'] : ''; ?>" class="form-control" placeholder="Initiative" required>-->
                            <?php echo  form_error('name'); ?>

                        </div>
                        <div class="row border-set">
                            <div class="col-md-6 left-ltr bor-l">
                                <label>Detected or Observed by</label>
                                <!-- <i class="lnr lnr-apartment"></i> -->
                                <!-- <input type="text" name="action_owner"  value="<?php echo (isset($result['action_owner'])) ? $result['action_owner'] : ''; ?>" class="form-control" placeholder="Action Owner" required> -->
                                <select class="form-control" name="observed_by">
                                    <?php foreach ($usersList as $key => $value) {
                                        if ($value->user_id == $result['observed_by']) $sel = "selected";
                                        else $sel = "";
                                        echo "<option value=" . $value->user_id . " $sel>" . $value->enc_first_name . ' ' . $value->enc_last_name . "</option>";
                                    } ?>

                                </select>
                                <?php echo  form_error('name'); ?>
                            </div>

                            <div class="col-md-6 left-ltr">
                                <label>Risk</label>
                                <!-- <i class="lnr lnr-apartment"></i> -->
                                <!-- <input type="text" name="status"  value="<?php echo (isset($result['status'])) ? $result['status'] : ''; ?>" class="form-control" placeholder="Status" required> -->
                                <select class='form-control' name="risk">
                                    <option value='Unlikely' <?php if ($result['risk'] == 'Unlikely') echo "selected"; ?>>Unlikely</option>
                                    <option value='Minor ' <?php if ($result['risk'] == 'Minor') echo "selected"; ?>>Minor </option>
                                    <!-- <option value='Others ' <?php if ($result['risk'] == 'Others') echo "selected"; ?>>Others </option> -->
                                </select>
                                <?php echo  form_error('name'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-12 design-form">
                <div class="form-outlay">
                    <div class="form-group">
                        <label class="heading">Status</label>
                        <!-- <i class="lnr lnr-apartment"></i> -->
                        <!-- <input type="text" name="status"  value="<?php echo (isset($result['status'])) ? $result['status'] : ''; ?>" class="form-control" placeholder="Status" required> -->
                        <textarea rows="10" name="status" class="form-control texteditor" placeholder="Immediate action – remedial or other"><?= $result['status']; ?></textarea>
                        <?php echo  form_error('name'); ?>
                    </div>
                    <div class="row border-set">
                        <div class="col-md-4 left-lr">
                            <div class="form-group">
                                <label>Proposed by:</label>
                                <!-- <i class="lnr lnr-apartment"></i> -->
                                <select class="form-control" name="proposed_by">
                                    <?php foreach ($usersList as $key => $value) {
                                        if ($value->user_id == $result['proposed_by']) $sel = "selected";
                                        else $sel = "";
                                        echo "<option value=" . $value->user_id . " $sel>" . $value->enc_first_name . ' ' . $value->enc_last_name . "</option>";
                                    } ?>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 left-lr">
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="proposed_date" value="<?php echo (isset($result['proposed_date'])) ? $result['proposed_date'] : ''; ?>" class="form-control" placeholder="Target Date" required>
                                <?php echo  form_error('name'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Implementation date:</label>
                                <input type="date" name="implementation_date" value="<?php echo (isset($result['implementation_date'])) ? $result['implementation_date'] : ''; ?>" class="form-control" placeholder="Target Date" required>
                                <?php echo  form_error('name'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 design-form">
                <div class="form-outlay">
                    <div class="form-group">
                        <label class="heading">Impact</label>
                        
                            <!-- <i class="lnr lnr-apartment"></i> -->
                            <textarea rows="10" name="impact" class="form-control texteditor" placeholder="State the impact of the non-conformity/CAPA"><?= $result['impact'] ?></textarea>
                            <?php echo  form_error('impact'); ?>
                        
                    </div>
                </div>
            </div>

            <div class="col-md-12 design-form">
                <div class="form-outlay">
                    <div class="form-group">
                        <label class="heading">Investigation</label>
                        <!-- <i class="lnr lnr-apartment"></i> -->
                        <textarea rows="10" name="investigation" class="form-control texteditor" placeholder="Cause of nonconformity/CAPA: (investigation shall be conducted initially by staff identifying the nonconformity/CAPA)"><?= $result['investigation'] ?></textarea>
                        <?php echo  form_error('name'); ?>
                    </div>

                    <div class="row border-set">
                        <div class="col-md-4 left-lr">
                            <div class="form-group">
                                <label>Investigated by:</label>
                                <!-- <i class="lnr lnr-apartment"></i> -->
                                <select class="form-control" name="investigated_by">
                                    <?php foreach ($usersList as $key => $value) {
                                        if ($value->user_id == $result['investigated_by']) $sel = "selected";
                                        else $sel = "";
                                        echo "<option value=" . $value->user_id . " $sel>" . $value->enc_first_name . ' ' . $value->enc_last_name . "</option>";
                                    } ?>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 left-lr">
                            <div class="form-group">
                                <label>Investigated start date</label>
                                <!-- <i class="lnr lnr-apartment"></i> -->
                                <input type="date" name="investigation_start" value="<?php echo (isset($result['investigation_start'])) ? $result['investigation_start'] : ''; ?>" class="form-control" placeholder="Target Date" required>
                                <?php echo  form_error('name'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Investigated finish date:</label>
                                <!-- <i class="lnr lnr-apartment"></i> -->
                                <input type="date" name="investigation_finish" value="<?php echo (isset($result['investigation_finish'])) ? $result['investigation_finish'] : ''; ?>" class="form-control" placeholder="Target Date" required>
                                <?php echo  form_error('name'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="col-md-12 design-form">
            <div class="form-outlay">
                <div class="form-group">
                    <label class="heading">CORRECTIVE/PREVENTIVE Action: (Preventive action is only required for potential non-conformities). Fill ONLY EITHER “Corrective Action” OR “Preventive Action</label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label>Corrective Action</label> -->
                                <textarea rows="10" name="corrective_action" class="form-control" placeholder="Corrective Action:"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label>Preventive Action:</label> -->
                                <textarea rows="10" name="preventive_action" class="form-control" placeholder="Preventive Action:"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-set">
                    <div class="col-md-6 left-l">

                        <label>Proposed by:</label>
                        <!-- <i class="lnr lnr-apartment"></i> -->
                        <select class="form-control" name="action_proposed_by">
                            <?php foreach ($usersList as $key => $value) {
                                if ($value->user_id == $result['action_proposed_by']) $sel = "selected";
                                else $sel = "";
                                echo "<option value=" . $value->user_id . " $sel>" . $value->enc_first_name . ' ' . $value->enc_last_name . "</option>";
                            } ?>
                        </select>
                        <label>Date</label>
                        <!-- <i class="lnr lnr-apartment"></i> -->
                        <input type="date" name="action_proposed_date" value="<?php echo (isset($result['action_proposed_date'])) ? $result['action_proposed_date'] : ''; ?>" class="form-control" placeholder="Target Date" required>
                        <?php echo  form_error('name'); ?>
                    </div>

                    <div class="col-md-6">
                        <div>
                            <label>Proposed implementation date:</label>
                            <input type="date" name="proposed_implementation_date" value="<?php echo (isset($result['proposed_implementation_date'])) ? $result['proposed_implementation_date'] : ''; ?>" class="form-control" placeholder="Target Date" required>
                            <?php echo  form_error('name'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Verification Validity -->




        <div class="col-md-12 design-form">
            <div class="form-outlay">
                <div class="form-group">
                    <label class="heading">VERIFICATION OF VALIDITY OF CORRECTIVE or PREVENTIVE ACTION: </label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" name="correactive_checkboxes[]" type="checkbox">
                                    <label class="form-check-label"> Addresses the root cause?</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="correactive_checkboxes[]" type="checkbox">
                                    <label class="form-check-label"> Prevents recurrence?</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="correactive_checkboxes[]" type="checkbox">
                                    <label class="form-check-label">Valid</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="correactive_checkboxes[]" type="checkbox">
                                    <label class="form-check-label">Invalid. Issue new NC/CAPA</label>
                                </div>
                                <div class="">
                                    <label class="form-check-label">Remarks</label>
                                    <textarea rows="3" name="correactive_remark" class="form-control" spellcheck="false"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" name="preventive_checkbox[]" type="checkbox">
                                    <label class="form-check-label"> Addresses the root cause?</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="preventive_checkbox[]" type="checkbox">
                                    <label class="form-check-label"> Prevents recurrence?</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="preventive_checkbox[]" type="checkbox">
                                    <label class="form-check-label">Valid</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="preventive_checkbox[]" type="checkbox">
                                    <label class="form-check-label">Invalid. Issue new NC/CAPA</label>
                                </div>
                                <div class="">
                                    <label class="form-check-label">Remarks</label>
                                    <textarea rows="3" name="preventive_remark" class="form-control" spellcheck="false"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row border-set">
                        <div class="col-md-3 left-lr">
                            <label class="form-check-label">Signature</label>
                            <input type="text" class="form-control" name="corrective_signature">
                        </div>
                        <div class="col-md-3 left-lr">
                            <label class="form-check-label">Date</label>
                            <input type="date" class="form-control" name="corrective_date">
                        </div>
                        <div class="col-md-3 left-lr">
                            <label class="form-check-label">Signature</label>
                            <input type="text" class="form-control" name="preventive_signature">
                        </div>
                        <div class="col-md-3">
                            <label class="form-check-label">Date</label>
                            <input type="date" class="form-control" name="preventive_date">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Follow Up -->

        <div class="col-md-12 design-form">
            <div class="form-outlay">
                <div class="form-group">
                    <label class="heading">FOLLOW-UP OF IMPLEMENTATION CORRECTIVE/PREVENTIVE ACTION TAKEN (If app): </label>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Implementation of corrective action is:</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="implementation_corrective_checkbox[]">
                                    <label class="form-check-label">Implemented</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="implementation_corrective_checkbox[]">
                                    <label class="form-check-label">Not implemented. Issue new NC/CAPA</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="implementation_corrective_checkbox[]">
                                    <label class="form-check-label">With Client</label>
                                </div>
                                <div class="">
                                    <label class="form-check-label">Remarks</label>
                                    <textarea rows="3" name="implementation_corrective_remark" class="form-control" spellcheck="false"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>Implementation of preventive action is:</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="implementation_preventive_checkbox[]">
                                    <label class="form-check-label">Implemented</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="implementation_preventive_checkbox[]">
                                    <label class="form-check-label">Not implemented. Issue new NC/CAPA</label>
                                </div>
                                <br>
                                <div class="">
                                    <label class="form-check-label">Remarks</label>
                                    <textarea rows="3" name="implementation_preventive_remark" class="form-control" spellcheck="false"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row border-set">
                        <div class="col-md-3 left-lr">
                            <label class="form-check-label">Date</label>
                            <input type="date" class="form-control" name="implementation_corrective_date">
                        </div>
                        <div class="col-md-3 left-lr">
                            <label class="form-check-label">Signature</label>
                            <input type="text" class="form-control" name="implementation_corrective_signature">
                        </div>

                        <div class="col-md-3 left-lr">
                            <label class="form-check-label">Date</label>
                            <input type="date" class="form-control" name="implementation_preventive_date">
                        </div>
                        <div class="col-md-3">
                            <label class="form-check-label">Signature</label>
                            <input type="text" class="form-control" name="implementation_preventive_signature">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- EFFECTIVENESS  verification -->
        <div class="col-md-12 design-form">
            <div class="form-outlay">
                <div class="form-group">
                    <label class="heading">VERIFICATION OF EFFECTIVENESS OF IMPLEMENTED CORRECTIVE/PREVENTIVE ACTION:</label>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Corrective action is:</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="verification_corrective_checkbox[]">
                                    <label class="form-check-label">Effective</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="verification_corrective_checkbox[]">
                                    <label class="form-check-label">Not effective. Issue new NC/CAPA</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="verification_corrective_checkbox[]">
                                    <label class="form-check-label">With Client</label>
                                </div>
                                <div class="">
                                    <label class="form-check-label">Remarks</label>
                                    <textarea rows="3" name="verification_corrective_remark" class="form-control" spellcheck="false"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>Preventive Action</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="verification_preventive_checkbox[]">
                                    <label class="form-check-label">Effective</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="verification_preventive_checkbox[]">
                                    <label class="form-check-label">Not effective. Issue new NC/CAPA</label>
                                </div>
                                <br>
                                <div class="">
                                    <label class="form-check-label">Remarks</label>
                                    <textarea rows="3" name="verification_preventive_remark" class="form-control" spellcheck="false"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row border-set">
                        <div class="col-md-3 left-lr">
                            <label class="form-check-label">Date</label>
                            <input type="date" class="form-control" name="verification_corrective_date">
                        </div>
                        <div class="col-md-3 left-lr">
                            <label class="form-check-label">Signature</label>
                            <input type="text" class="form-control" name="verification_corrective_signature">
                        </div>

                        <div class="col-md-3 left-lr">
                            <label class="form-check-label">Date</label>
                            <input type="date" class="form-control" name="verification_preventive_date">
                        </div>
                        <div class="col-md-3">
                            <label class="form-check-label">Signature</label>
                            <input type="text" class="form-control" name="verification_preventive_signature">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <button type="submit" style="margin:10px;" class="btn btn-primary btn-rounded create_new_next_button pull-right" name="submit">Submit</button>
            </div>
        </div>
        </form>


    </div>


    <script src="https://cdn.tiny.cloud/1/f8sp5zqzyxi13z9989lhfjelqs8ghu2obrs2i98ftniu66hx/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            menubar: false,
            selector: '.texteditor',

            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
            plugins: 'print preview importcss tinydrive searchreplace autolink autosave save directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons'
        });
    </script>