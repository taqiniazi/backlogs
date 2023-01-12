<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Page Header -->
<style type="text/css">
    body {
        font-size: 16px;
    }

    .nav-tabs .nav-link {
        min-width: 80px;
        text-align: center;
    }

    table.dataTable thead th:after,
    table.dataTable thead th:before {
        display: none !important;
    }

    .d-block {
        font-weight: 600;
        font-size: 13px;
    }

    .enquireCaed .card-body {
        padding: 10px 1rem;
    }

    .enquireCaed .card-body .text-success {
        font-size: 13px;
    }

    .focus-label {
        font-size: 16px;
    }

    .tg-formtheme {
        width: 100%;
        float: left;
    }

    table.dataTable thead>tr>th {
        font-weight: 600 !important;
    }

    .tg-select {
        /*color: #666;*/
        color: #000;
        float: left;
        width: 100%;
        position: relative;
        text-transform: uppercase;
    }

    .tg-select select {
        z-index: 1;
        width: 100%;
        position: relative;
        appearance: none;
        -moz-appearance: none;
        -webkit-appearance: none;
    }

    .tg-select:after {
        top: 0;
        right: 10px;
        z-index: 2;
        color: #666;
        display: block;
        content: '\f107';
        position: absolute;
        text-align: center;
        font-size: inherit;
        line-height: 3;
        font-family: 'FontAwesome';
    }

    .tg-flagcolor .tg-radio input[type=radio],
    .tg-filtercolors .tg-checkbox input[type=checkbox] {
        display: none;
    }

    .tg-flagcolor span.tg-radio,
    .tg-filtercolors span.tg-radio {
        position: relative;
    }

    .tg-filterradios fieldset .tg-radio input {
        display: none;
    }

    .tg-filterradios fieldset .tg-radio {
        position: relative;
    }

    .tg-formtheme fieldset {
        border: 0;
        margin: 0;
        padding: 0;
        width: 100%;
        float: left;
        position: relative;
    }

    .tg-radio input[type=radio]+label:before,
    .tg-checkbox input[type=checkbox]+label:before {
        top: 4px;
        left: 0;
        color: #373542;
        font-size: 14px;
        line-height: 14px;
        content: '\f096';
        position: absolute;
        font-family: 'FontAwesome';
    }

    .tg-filterradios .tg-radio,
    .tg-filterradios .tg-radio label,
    .tg-checkbox,
    .tg-checkbox label {
        margin: 0;
        width: auto;
        float: left;
        position: relative;
    }

    .tg-flagcolor .tg-checkboxgroup .tg-flagcolor2 input[type=radio]:checked+label:before {
        background: #92dd59;
    }

    .tg-statusbar.tg-flagcolor .tg-checkboxgroup span input[type=radio]+label:before {
        display: none;
    }

    .tg-statusbar.tg-flagcolor .tg-checkboxgroup span input[type=radio]:checked+label,
    .tg-statusbar.tg-flagcolor .tg-checkboxgroup span input[type=radio]:checked+label span {
        color: #fff;
        background: #337ab7;
        border-color: #337ab7;
    }

    .tg-statusbar.tg-flagcolor .tg-checkboxgroup .tg-radio label {
        height: 36px;
        width: 36px;
        text-align: center;
        border-radius: 50%;
        position: relative;
        top: 0;
        left: 0;
        color: #555;
        display: inline-block;
        vertical-align: middle;
        border: 1px solid #ddd;
        padding: 0;
        font-size: 16px;
        line-height: 2;
    }

    .tg-statusbar.tg-flagcolor .tg-checkboxgroup span input[type=radio]:checked+label {
        background: #006df1;
        color: #fff;
        border-color: #006df1;
    }

    .tg-statusbar.tg-flagcolor .tg-checkboxgroup span input[type=radio]:checked+label span {
        background: transparent;
    }

    @media screen and (min-width: 1600px) {

        body,
        .form-focus .select2-container--default .select2-selection--single .select2-selection__rendered,
        .form-focus .focus-label {
            font-size: 18px;
        }

        .form-focus.select-focus .focus-label {
            font-size: 14px;
        }

    }

    .nav-tabs.nav-tabs-solid.nav-tabs-rounded {
        border-radius: 0px !important;
    }

    .nav-tabs.nav-tabs-solid.nav-tabs-rounded>li>a {
        border-radius: 0px !important;
    }

    .enquiresTab .tab-pane h2 {
        font-size: 16px;
    }

    .enquiresTab .tab-pane .dt-buttons {
        float: left;
    }

    .enquiresTab .tab-pane .dt-buttons button {
        border-radius: 4px;
        border: 1px solid #00c5fb;
        font-size: 13px;
        padding: 4px 20px;
        background-color: #00c5fb;
        color: #fff;
    }

    .enquiresTab .tab-pane .dt-buttons button:hover {
        background-color: #00b7ed;
        border: 1px solid #00b7ed;
    }

    .enquireCaed .card-body {
        padding: 10px 1rem;
    }

    .enquireCaed .card-body h3 {
        font-size: 16px;
    }

    .enquireCaed .card-body .justify-content-between,
    .enquireCaed .card-body .progress {
        margin-bottom: 10px !important;
    }

    body {
        font-size: 15px;
    }

    .searchalignment {
        display: flex;
        width: 100%;
        align-content: center;
        justify-content: flex-start;
        align-items: center;
    }

    .searchalignment input {
        max-width: 700px;
    }

    .searchalignment button {
        height: 42px;
        margin-left: 15px;
    }

    .searchalignment .submit-section {
        margin-top: 0;
    }
</style>

<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Report Incident</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Report Incident</li>
            </ul>
        </div>

    </div>
</div>
<!-- /Page Header -->
<?php
if ($this->session->flashdata('inserted') === true) {
?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success  alert-dismissible" role="alert">
                <strong><?php echo $this->session->flashdata('tckSuccessMsg'); ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
    </div>
<?php
}
?>
<?php
if ($this->session->flashdata('error') === true) {
?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible" role="alert">
                <strong><?php echo $this->session->flashdata('tckSuccessMsg'); ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
    </div>
<?php
}
?>


<!-- Search Filter -->

<!-- /Search Filter -->

<div class="row">

    <div id="add_ticket" class="col-sm-12">
        <div class="col-sm-12" role="document">
            <div class="modal-content" style="width:100%">
                <div class="modal-header">
                    <h2 class="modal-title">Add Incident</h5>

                </div>
                <div class="modal-body">
                    <?php
                    if (isset($error) && $error === true) {
                    ?>
                        <div class="row">
                            <div class="alert alert-danger show">
                                <?php
                                if (isset($errorMsgs) && !empty($errorMsgs)) {
                                    foreach ($errorMsgs as $msg) {
                                ?>
                                        <p><?php echo $msg; ?></p>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    $attributes = array('method' => 'POST', 'enctype' => "multipart/form-data");
                    echo form_open("Incident_Ledger/report_incident/", $attributes);

                    ?>
                    <input type="hidden" name='save_type' value='add' />
                    <input type="hidden" name='is_lab' value='<?php echo (($isUserLab) ? 1 : 0); ?>>' />
                    <div class="row">

                        <!--<div class="col-sm-3">
                            <div class="form-group">
                                <label>Location</label>
                                <select name='category_id' class="select" required>
                                    <?php if (count($category_list) > 0) {
                                        foreach ($category_list as $cat) { ?>
                                            <option value="<?= $cat['id']; ?>"><?= $cat['title']; ?></option>
                                        <?php }
                                    } else { ?>
                                        <option value=""> No records </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>-->
                        <?php
                        
                        $userinfo = getLoggedInUserProfile(intval($this->ion_auth->user()->row()->id));
                        ?>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Raised by </label>
                                <input class="form-control" type="text" id='product' name='product' value="<?= $userinfo[0]->first_name . ' ' . $userinfo[0]->last_name  ?>" required>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Location</label>
                                <input class="form-control" type="text" id='product' name='location' required>

                            </div>
                        </div>


                    </div>
                    <?php if ($isUserLab) { ?>
                        <div class="row" style="display:none">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Laboratories</label>
                                    <select id='user_lab_id' name='user_lab_id' class="select">
                                        <?php foreach ($userLabs as $labData) { ?>
                                            <option value="<?php echo $labData->id; ?>"><?php echo $labData->name; ?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Incident details<em class='text-danger'>*</em></label>
                                <textarea class="form-control" rows="10" id='ticket_message' name='ticket_message'></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Persons involved</label>
                                <!-- TODO: Add profile picture avatar to select option -->
                                <!-- Populated through script in js/auth/ticket/ticket.js -->
                                <select name="assignee[]" id="add-assignee" class="form-control" multiple="multiple" required>
                                    <option value="">--Select User--</option>
                                    <?php foreach ($usersList as $userL) { ?>
                                        <option value="<?php echo $userL['id']; ?>"><?php echo $userL['first_name'] . " " . $userL['last_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>


                    </div>
                    <div>
                        <div class="form-group">
                            <label>Reason for Raising Incident<em class='text-danger'>*</em></label>
                            <input class="form-control" type="text" name='ticket_subject' id='ticket_subject' required>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Action taken</label>
                            <select name="ticket_action" class="form-control action_taken">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            <input type="hidden" name="ticket_reply_thru" value="pathhub">
                            <input type="hidden" name="ticket_priority" value="normal">
                            <input type="hidden" name="ticket_sms_alert" value="no">
                        </div>
                    </div>




                    <div class="row comment">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Comment (If action taken yes)</label>
                                <textarea class="form-control" rows="7" name='comment'></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="submit-section">
                        <button class="btn btn-primary tck-smbt-btn" type='submit'>Create Request</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Ticket Modal -->

    <!-- Edit Ticket Modal -->
    <div id="edit_ticket" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Incident</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id='edt_modal_bdy'>
                    <div class="text-center">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Ticket Modal -->

    <!-- Delete Ticket Modal -->
    <div class="modal custom-modal fade" id="delete_ticket" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Incident</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <a href="javascript:void(0);" class="btn btn-primary continue-btn tckt-del-btn">Delete</a>
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
    <script>
        <?php

        if (isset($showDiag) && $showDiag == 'addDiag') {
        ?>var dialogType = 'addDiag';
        <?php
        }

        if (isset($showDiag) && $showDiag == 'editDiag') {
        ?>
            var dialogType = 'editDiag';
            <?php
            ?>
            var attachmentID = '<?php echo $attachmentID; ?>';
        <?php
        }

        ?>
    </script>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        // Change value in action taken dropdwon
        $(".action_taken").change(function(){
            if($(this).val() == "Yes") $(".comment").show();
            else $(".comment").hide();
        });
        $('#add-assignee').select2();
        $('#add_category_form').validate({
            rules: {
                cat_title: {
                    required: true
                }
            }
        });
        $(document).on('click', '.edit_cat', function() {
            let cId = $(this).attr('data-cat-id');
            let cTitle = $(this).attr('data-cat-title');
            $(document).find('#manage_category').find('#cat_id').val(cId);
            $(document).find('#manage_category').find('#cat_title').val(cTitle);
        });
        $(document).on('click', '.edit_template', function() {
            let id = $(this).attr('data-id');
            if (id > 0) {
                $.ajax({
                    url: '<?= base_url('/laboratory/get_template_data'); ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'id': id
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            let modal = $(document).find('#edit_template_modal');
                            let arr = response.data;
                            modal.find('#elt_id').val(arr.id);
                            modal.find('#elt_group_id').val(arr.group_id);
                            modal.find('#elt_template_name').val(arr.template_name);
                            modal.find('#elt_category_id').val(arr.category_id).trigger('change');
                            modal.find('#elt_hospital_id').val(arr.hospital_id).trigger('change');
                            modal.find('#elt_header').text(arr.header);
                            modal.find('#elt_footer').text(arr.footer);
                            modal.find('#profile-pic-preview').attr('src', '<?= base_url('/'); ?>' + arr.logo_path);
                            modal.modal('show');
                        } else {
                            jQuery.sticky(response.msg, {
                                classList: 'important',
                                speed: 200,
                                autoclose: 5000
                            });
                        }
                    }
                });
            }
        });
        $(document).on('change', '.set_as_default', function() {
            let id = $(this).attr('data-id');
            if (id > 0) {
                $.ajax({
                    url: '<?= base_url('/laboratory/set_default_template'); ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'id': id
                    },
                    success: function(response) {
                        jQuery.sticky(response.msg, {
                            classList: response.type,
                            speed: 200,
                            autoclose: 5000
                        });
                    }
                });
            }
        });
    });
</script>