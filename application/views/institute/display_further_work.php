<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style type="text/css">
    /*.container-fluid{
        margin-left: 20px;
    }*/
    div.dataTables_wrapper div.dataTables_length select {
        width: 55px;
        display: inline-block;
        padding: 0 5px;
        position: absolute;
        top: -56px;
        /*left: 0;*/
    }

    .tg-cancel input {
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

    div#further_work_table_hospital_filter {
    display: none;
}
    @media screen and (min-width: 1600px) {
        body {
            font-size: 18px;
        }
    }

    @media screen and (max-width: 1580px) {
        .tg-cancel label {
            width: 35px;
            padding: 5px;
        }

        div.dataTables_wrapper div.dataTables_length select {
            top: -59px;
        }
    }
</style>
<div class="content tabelewidth container-fluid publish-record">
<div class="row">
    <div class="speace-setup col-sm-12">
    <h3 class="page-title">Further Work</h3>
</div>
</div>
<div class="row">
        <div class="col-sm-8 col-md-4 col-lg-8">   
            <div class="tg-breadcrumbarea tg-searchrecordhold">
                <ol class="tg-breadcrumb tg-breadcrumbvtwo">
                    <li><a href="javascript:;">Dashboard</a></li>
                    <li><a href="javascript:;" class="active">Further Work</a></li>
                </ol>
            </div>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4">  </div>
    </div>


    <div class="tg-haslayout">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="tg-filterhold">
                    <ul class="tg-filters record-list-filters">
                        <li class="tg-statusbar tg-flagcolor">

                        </li>
                        <li class="tg-statusbar tg-flagcolor" style="padding: 5px">
                            <div class="tg-checkboxgroup tg-checkboxgroupvtwo numbers_check">
                                <span class="tg-radio tg-flagcolor1">
                                    <input class="tat" name="tat" id="tat5" type="radio">
                                    <label for="tat5"><span>&lt;5</span></label>
                                </span>
                                <span class="tg-radio tg-flagcolor2">
                                    <input class="tat" type="radio" name="tat" id="tat10">
                                    <label for="tat10"><span>&lt;10</span></label>
                                </span>
                                <span class="tg-radio tg-flagcolor3">
                                    <input class="tat" type="radio" name="tat" id="tat20">
                                    <label for="tat20"><span>&lt;20</span></label>
                                </span>
                                <span class="tg-radio tg-flagcolor4">
                                    <input class="tat" type="radio" name="tat" id="tat30">
                                    <label for="tat30"><span>&gt;20</span></label>
                                </span>
                                <span class="tg-cancel tg-flagcolor4" style="display: none;">
                                    <input class="tat" type="radio" name="tat" id="all_tat">
                                    <label for="all_tat">
                                        <img src="<?php echo base_url(); ?>assets/img/clearAll.png" class="img-responsive clearAll">
                                    </label>
                                </span>
                            </div>
                        </li>

                        <li class="tg-flagcolor" style="padding: 3px 8px">
                            <div class="tg-checkboxgroup tg-checkboxgroupvtwo flags_check">
                                <?php
                                if ($this->session->userdata('color_code') !== '') {
                                    $session_color = $this->session->userdata('color_code');
                                }
                                ?>
                                <span class="tg-radio tg-flagcolor1 first">

                                    <input type="radio" id="flag_blue" class="flag_status" name="flag_sorting">
                                    <label for="flag_blue"></label>
                                </span>
                                <span class="tg-radio tg-flagcolor2">

                                    <input type="radio" id="flag_green" class="flag_status" name="flag_sorting">
                                    <label for="flag_green"></label>
                                </span>
                                <span class="tg-radio tg-flagcolor3">

                                    <input type="radio" id="flag_yellow" class="flag_status" name="flag_sorting">
                                    <label for="flag_yellow"></label>
                                </span>
                                <span class="tg-radio tg-flagcolor4">

                                    <input type="radio" id="flag_black" class="flag_status" name="flag_sorting">
                                    <label for="flag_black"></label>
                                </span>
                                <span class="tg-radio tg-flagcolor5">

                                    <input type="radio" id="flag_red" class="flag_status" name="flag_sorting">
                                    <label for="flag_red"></label>
                                </span>
                                <span class="tg-cancel tg-flagcolor6" style="display: none">
                                    <input checked type="radio" class="flag_status" name="flag_sorting" id="flag_all">
                                    <label for="falg_all">
                                        <img src="<?php echo base_url(); ?>assets/img/clearAll.png" class="img-responsive clearAll">
                                    </label>
                                </span>
                            </div>
                        </li>

                        <li class="tg-statusbar tg-flagcolor custome-flagcolors">
                            <div class="tg-checkboxgroup tg-checkboxgroupvtwo">

                                <span class="tg-radio tg-flagcolor4" title="Urgent">
                                    <input id="report_urgent" class="report_urgency_status" type="radio" name="report_urgency">
                                    <label for="report_urgent">

                                        <img src="<?php echo base_url('/assets/icons/Urgent-wb.png'); ?>" class="img-responsive uncheck">
                                        <img src="<?php echo base_url('/assets/icons/white/Urgent-wb-white.png'); ?>" class="img-responsive checkd">
                                    </label>
                                </span>

                                <span class="tg-radio tg-flagcolor4" title="Routine">
                                    <input id="report_routine" class="report_urgency_status" type="radio" name="report_urgency">
                                    <label for="report_routine">
                                        <img src="<?php echo base_url('/assets/icons/Rotate.png'); ?>" class="img-responsive uncheck">
                                        <img src="<?php echo base_url('/assets/icons/white/Rotate-white.png'); ?>" class="img-responsive checkd">
                                    </label>
                                </span>

                                <span class="tg-radio tg-flagcolor4" title="2WW">
                                    <input id="report_2ww" class="report_urgency_status" type="radio" name="report_urgency">
                                    <label for="report_2ww">
                                        <img src="<?php echo base_url('/assets/icons/2ww-wc.png'); ?>" class="img-responsive uncheck">
                                        <img src="<?php echo base_url('/assets/icons/white/2ww-wc-white.png'); ?>" class="img-responsive checkd">
                                    </label>
                                </span>

                                <span class="tg-cancel tg-flagcolor4" title="Clear" style="display: none;">
                                    <input id="report_clear" class="report_urgency_status" type="radio" name="report_urgency">
                                    <label for="report_clear">
                                        <img src="<?php echo base_url(); ?>assets/img/clearAll.png" class="img-responsive clearAll">
                                    </label>
                                </span>
                            </div>
                        </li>
                        <li class="tg-statusbar tg-flagcolor custome-flagcolors last pull-right" style="padding: 0 10px;">
                            <button type="submit" class="btn btn-default adv-search" data-toggle="collapse" data-target="#collapse_adv_search"><i class="fa fa-cog"></i></button>
                        </li>
                        <li class="tg-statusbar tg-flagcolor custome-flagcolors pull-right nobefore search_li" style="padding: 0">
                            <div class="input-group">
                                <input id="unpub_custom_filter" type="text" class="form-control" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-success" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="tg-dashboardform tg-haslayout custom-haslayout">
        <div class="collapse" id="collapse_adv_search">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-dashboardformhold">
                        <form class="tg-formtheme" action="<?php echo base_url('index.php/doctor/search_request'); ?>" method="post">
                            <fieldset class="col-md-12">
                                <div class="col-md-3 form-group">
                                    <input class="form-control" type="text" id="adv_search_first_name" name="first_name" placeholder="First Name" value="<?php echo $sr_first_name ?? ''; ?>">
                                </div>
                                <div class="col-md-3  form-group">
                                    <input class="form-control" type="text" id="adv_search_sur_name" name="sur_name" placeholder="Last Name" value="<?php echo $sr_sur_name ?? ''; ?>">
                                </div>
                                <div class="col-md-3 form-group">
                                    <input class="form-control" type="text" id="adv_search_nhs_no" name="nhs_no" placeholder="NHS Number" value="<?php echo $sr_nhs_no ?? ''; ?>">
                                </div>
                                <div class="col-md-3 form-group">
                                    <span class="tg-select">
                                        <select data-placeholder="Gender" id="adv_search_gender" name="gender">
                                            <option value="">Gender</option>
                                            <option value="male" <?php echo (($sr_gender == 'male' ? 'selected' : '')); ?>>Male</option>
                                            <option value="female" <?php echo (($sr_gender == 'female' ? 'selected' : '')); ?>>Female</option>
                                        </select>
                                    </span>
                                </div>

                            </fieldset>
                            <fieldset class="col-md-12" style="padding-top: 10px !important;">
                                <div class="col-md-3 form-group tg-inputicon">
                                    <i class="lnr lnr-calendar-full"></i>
                                    <input type="text" name="dob" id="adv_search_dob" class="form-control unstyled" placeholder="DOB" value="<?php echo $sr_dob ?? ''; ?>">
                                </div>
                                <div class="col-md-3 form-group ">
                                    <input type="text" name="" class="form-control" placeholder="Track No">
                                </div>
                                <div class="col-md-3 form-group ">
                                    <input type="text" name="" class="form-control" placeholder="Lab No">
                                </div>

                                <div class="col-md-3 form-group ">
                                    <span class="tg-select">
                                        <select id="adv_search_speciality" data-placeholder="Speciality" name="specialty">
                                            <option value="">Speciality</option>
                                            <?php foreach ($get_specialties as $spec) { ?>
                                                <option value="<?php echo $spec['specialty']; ?>" <?php echo (($spec['id'] == $sr_specialty ? 'selected' : '')); ?>> <?php echo $spec['specialty']; ?> </option>
                                            <?php } ?>
                                        </select>
                                    </span>
                                </div>
                                <div class="col-md-3 form-group">
                                    <input type="hidden" name="speciality_group_hdn" value="<?php echo $speciality_group_hdn ?? ''; ?>">
                                    <button type="submit" class="btn btn-success btn-search">Advance Search</button>
                                </div>

                            </fieldset>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="collapse_filter_hospital" class="collapse">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-push-2">
                    <div class="tg-dashboardformhold">
                        <div class="tg-titlevtwo">
                            <h3>Filter By Hospital</h3>
                        </div>
                        <form method="post" class="filter_by_hospital_form">
                            <table class="table table-bordered">
                                <tr class="bg-primary">
                                    <th>Choose Clinic</th>
                                </tr>
                                <tr>
                                    <td class="col-md-12">
                                        <select class="form-control filter_by_hospital" name="filter_by_hospital">
                                            <option value="0">Choose Clinic</option>
                                            <?php
                                            if (!empty($get_hospitals)) {
                                                foreach ($get_hospitals as $list_hospitals) {

                                                    echo '<option value="' . $list_hospitals->id . '" >' . $list_hospitals->description . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <div class="pull-right">
                                <button type="button" class="btn btn-warning filter_by_hospital_btn">Filter Result</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="further_work_table_hospital" class="table table-striped custom-table datatable" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Request No</th>
                    <th>Uralensis ID</th>
                    <th>Further Work Detail</th>
                    <th>Doctor Name</th>
                    <th>Further Work Date</th>
                    <th>Status</th>
                    <th>Template</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Request No</th>
                    <th>Uralensis ID</th>
                    <th>Further Work Detail</th>
                    <th>Doctor Name</th>
                    <th>Further Work Date</th>
                    <th>Status</th>
                    <th>Template</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                if (!empty($query)) {
                    $count = 0;
                    foreach ($query as $further) {
                ?>

                        <tr>
                            <td><?php echo intval($further->request_id); ?></td>
                            <td><?php echo html_purify($further->serial_number); ?></td>
                            <td><?php echo html_purify($further->furtherword_description); ?></td>
                            <td><?php echo html_purify($further->first_name) . '&nbsp;' . html_purify($further->last_name); ?></td>
                            <td><?php echo $further->furtherwork_date; ?></td>
                            <td><?php echo html_purify($further->fw_status); ?></td>
                            <td><a href="#" data-toggle="modal" data-target="#fw_modal_<?php echo intval($count); ?>"><img width="24px" src="<?php echo base_url('assets/img/chat_comments.png'); ?>"></a>
                                <div id="fw_modal_<?php echo intval($count); ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Copy Further Work Template</h4>
                                            </div>
                                            <div class="modal-body">
                                                <?php echo $further->fw_preview_template; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                <?php
                        $count++;
                    } //endforeach
                } else {
                    echo '<p class="no_work bg-danger">No Further Work Requested Or Completed Yet!.</div>';
                } //endif
                ?>
            </tbody>
        </table>
        </div>
    </div>
    


</div>