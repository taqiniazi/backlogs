<?php defined('BASEPATH') or exit('No direct script access allowed');

$my_date = date("Y-m-d");
$week = date("W", strtotime($my_date)); // get week
$y =    date("Y", strtotime($my_date)); // get year
$first_date =  date('d-m-Y', strtotime($y . "W" . $week)); //first date 
$last_date = date("d-m-Y", strtotime("+4 day", strtotime($first_date)));
?>
<style>
    .table-responsive {
        overflow-x: hidden;
    }

    #update_timesheet #timesheet_body input {
        height: 40px;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 0px 5px;
        border: none;
        background: none;
    }

    #update_timesheet thead tr th {
        text-transform: capitalize;
    }

    #update_timesheet thead tr th .show_date {
        display: block;
    }

    #update_timesheet #timesheet_body input {
        background: transparent;
        max-width: 100%;
        width: 73%;
		
    }
    .icon_active {
        display: none;
        color: #03ff07 !important;
    }
	
	 #update_timesheet #timesheet_body input:hover {
         border: 1px solid #f7f7f7;
		
    }

    .avatar {
        height: 32px;
        line-height: 32px;
        margin: 0 -1px 0 0;
        width: 32px;
    }

    #update_timesheet #timesheet_body tr td i {
        padding-left: 0px !important;
    }

    #update_timesheet {
        background: #fff;
        box-shadow: 0 0 10px #dbd8d8;
        padding: 5px;
    }

    #revision_table_datatable {
        margin-bottom: 0;
    }

    .table-responsive {
        background: #eee;
        padding: 15px;
    }

    #update_timesheet thead tr th,
    #update_timesheet #timesheet_body tr td {
        border: 1px solid #ddd;
        text-align: center;
    }

    .flaot-right {
        text-align: right;
    }

    .card-title {
        font-size: 22px;
        font-weight: 600;
        padding: 15px;
    }

    .block-l {
        background: #02b7f5;
        font-size: 16px;
        padding: 8px 10px;
        color: #fff;
    }

    .title-nav {
        display: flex;
        align-items: center;
    }

    .title-nav a {
        color: #fff;
    }

    .title-nav .block-r a {
        color: #414141;
        font-size: 16px;
    }

    .block-r {
        background: #ccc;
        padding: 4px 20px;
        margin: 0px 4px;
    }

    thead tr th:first-child,
    tbody tr td:first-child {
        width: 250px;
        text-align: left !important;
    }

    .box-setup .col-xl-3 {
        max-width: 25%;
        flex: 0 0 25%;
    }

    #update_timesheet #timesheet_body .icon-cricle {
        width: 100%;
        max-width: 15px;
    }
</style>

<div class="row box-setup">
    <div class="col-md-6 col-sm-6 col-lg-3 col-xl-3">
        <a href="<?php echo base_url('Document_List/labortary_task_checklist'); ?>">
            <div class="card dash-widget" style="box-shadow: 4px 4px 4px 4px lightblue;">
                <div class="card-body">
                    <!-- <span class="dash-widget-icon"></span> -->
                    <span class="dash-widget-icon">
                        <i class="la la-network-wired"></i>
                    </span>
                    <div class="dash-widget-info">
                        <h3><?= $lab_task;  ?></h3>
                        <span>Laboratory Task Checklist</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-3 col-xl-3">
        <a href="<?php echo base_url('Document_List/labortary_task_checklist_new'); ?>">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon">
                        <img src="<?php echo base_url(); ?>assets/icons/laboratory_icon.png" class="img-fluid" />
                    </span>
                    <div class="dash-widget-info">
                        <h3><?= $mon_sta;  ?></h3>
                        <span>Monthly Stainer Checklist</span>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-sm-6 col-lg-3 col-xl-3">
        <a href="<?php echo base_url('Document_List/monthaly_task_checklist'); ?>">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon">
                        <img src="<?php echo base_url('assets/icons/pathologist.svg'); ?>" class="img-fluid" />
                    </span>
                    <div class="dash-widget-info">
                        <h3></h3>
                        <span>Monthly Task Checklist</span>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- 
        <div class="col-md-6 col-sm-6 col-lg-3 col-xl-3">
        <a href="<?php echo base_url('Document_List/improvment_corrective_action_register'); ?>">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-hospital-o"></i></span>
                    <div class="dash-widget-info">
                        <h3><?= $cor_act;  ?></h3>
                        <span>Non Conformance Form</span>
                    </div>
                </div>
            </div>
            </a>
        </div>
         -->




    <div class="col-md-6 col-sm-6 col-lg-3 col-xl-3">
        <a href="<?php echo base_url('Document_List/temperature_logbook'); ?>">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon">
                        <img src="<?php echo base_url('assets/icons/pathologist.svg'); ?>" class="img-fluid" />
                    </span>
                    <div class="dash-widget-info">
                        <h3><?= $temp;  ?></h3>
                        <span>Temperature Log Book</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
</div>

<div class="content container-fluid">
    <div class="page-header">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Laboratory Task Checklist</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Document_List/forms') ?>">Dashboard / Checklists / Laboratory Task Checklist</a></li>
                        <!-- <li class="breadcrumb-item"><a href="<?php echo base_url('Document_List') ?>">Document</a></li> -->

                    </ul>
                </div>

            </div>
        </div>

    </div>

    <div class="notification">
        <?php if ($this->session->flashdata('message') != '') { ?>
            <div class="success_list">
                <?= $this->session->flashdata('message'); ?>
            </div>
        <?php } ?>
        <?php if ($this->session->flashdata('error') != '') { ?>
            <div class="error_list">
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php } ?>
    </div>

    <div class="table-responsive">

        <form action="<?= site_url('Document_List/update_weekly_timesheetData'); ?>" method="post" id="update_timesheet">
            <div class="col-auto ml-auto">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card-title title-nav mb-0">
                            <div class="block-r"><a href="javascript:get_weekly_timesheet(-1)"><strong class="left-side"> Prev </strong></a></div>
                            <div class="block-r"><a href="javascript:get_weekly_timesheet(1)"><strong class="right-side"> Next </strong></a></div>
                            <div class="block-l"> <a href="javascript:get_weekly_timesheet(2)"><strong class="right-today"> Today </strong></a></div>
                            <input type="hidden" id="s_date" value=""/>
                            <input type="hidden" id="e_date" value=""/>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card-title mb-0 text-center">
                            <h3><b class='change_month'>November</b></h3>
                        </div>
                    </div>
                    <div class="col-sm-4 flaot-right">
                        <!-- <a href="<?php echo base_url('Document_List/category_section/0'); ?>" class="btn add-btn"><i class="fa fa-plus"></i> Add</a> -->
                        <!-- <h3 class="card-title mb-0"> <span id='weekly_static'><span id="start_day"></span> -- <span id="end_day"></span></span></h3> -->
                    </div>
                </div>
            </div>
            <input type="hidden" name='<?= $this->security->get_csrf_token_name(); ?>' value='<?= $this->security->get_csrf_hash(); ?>'>
            <table class="table no-footer" id="revision_table_datatable" style="width: 100%;">
                <thead>
                    <tr>
                        <th></th>
                        <th>Monday<span class='show_date'></span></th>
                        <th>Tuesday<span class='show_date'></span></th>
                        <th>Wednesday<span class='show_date'></span></th>
                        <th>Thursday<span class='show_date'></span></th>
                        <th>Friday<span class='show_date'></span></th>
                    </tr>
                </thead>
                <tbody id="timesheet_body">

                </tbody>
            </table>
        </form>
    </div>