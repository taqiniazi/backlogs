<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
    .tooltip1 {
        position: relative;
        cursor: pointer;
    }

    .tooltip1 .tooltiptext1 {
        visibility: hidden;
        width: 90px;
        background-color: #02b7f5;
        font-weight: bold;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;

        /* Position the tooltip */
        position: absolute;
        z-index: 1;
        bottom: 100%;
        left: 50%;
        margin-left: -60px;
    }

    .tooltip1:hover .tooltiptext1 {
        visibility: visible;
    }

    .table-responsive {
        overflow-x: hidden;
    }

    .box-setup .col-xl-3 {
        max-width: 25%;
        flex: 0 0 25%;
    }

    #monthaly_task_checklist th input,
    #monthaly_task_checklist #timesheet_body-new input {
        height: 40px;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 0px 5px;
        border: none;
        background: none;
        width: 80%;
    }

    #monthaly_task_checklist thead tr th {
        text-transform: capitalize;
    }

    #monthaly_task_checklist thead tr th .show_date {
        display: block;
    }

    #monthaly_task_checklist #timesheet_body-new input {
        background: transparent;
        max-width: 100%;
    }
	
	#monthaly_task_checklist #timesheet_body-new input:hover {
        border: 1px solid #f7f7f7;
    }

    .avatar {
        height: 32px;
        line-height: 32px;
        margin: 0 5px 0 0;
        width: 32px;
    }

    #monthaly_task_checklist #timesheet_body-new tr td i {
        padding-left: 0px !important;
    }

    #monthaly_task_checklist {
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

    #monthaly_task_checklist thead tr th,
    #monthaly_task_checklist #timesheet_body-new tr td {
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


    #monthaly_task_checklist thead tr th,
    #monthaly_task_checklist #timesheet_body-new tr td {
        font-weight: 400;
        text-align: center !important;
        padding: 20px 10px;
        vertical-align: top;
    }

    #monthaly_task_checklist thead tr th a,
    #monthaly_task_checklist #timesheet_body-new tr td a {
        color: #000;
        font-size: 16px;
        font-weight: 600;
        text-transform: uppercase;
        display: block;
    }

    .month-box {
        display: flex;
        margin-bottom: 15px;
        align-content: center;
        align-items: center;
		border-bottom: solid 1px #CCC;
    }

    .icon-cricle {
        width: 100%;
        max-width: 15px;
    }
</style>


<div class="row box-setup">
    <div class="col-md-6 col-sm-6 col-lg-3 col-xl-3">
        <a href="<?php echo base_url('Document_List/labortary_task_checklist'); ?>">
            <div class="card dash-widget">
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
        <a href="<?php echo base_url('Document_List/monthaly_task_checklist_new'); ?>">
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
            <div class="card dash-widget" style="box-shadow: 4px 4px 4px 4px lightblue;">
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
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Monthly Task Checklist</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('Document_List/forms') ?>">Dashboard / Checklist / Monthly Task Checklist</a></li>

                </ul>
            </div>

        </div>
    </div>

    <div class="col-sm-12">

        <div class="table-responsive">

            <form action="" method="POST" id="monthaly_task_checklist">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <input type="hidden" name="current_year" value="<?= date('Y'); ?>">
                <div class="col-auto ml-auto">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card-title title-nav mb-0">
                                <div class="block-r"><a href="javascript:monthaly_task_checklist(-1)"><strong class="left-side"> Prev Year</strong></a></div>
                                <div class="block-r"><a href="javascript:monthaly_task_checklist(1)"><strong class="right-side"> Next Year</strong></a></div>
                                <!-- <div class="block-l"> <a href="#"><strong class="right-today"> Month </strong></a></div> -->
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card-title mb-0 text-center">
                                <h3><b>Year <span class="current_year">2022</span></b></h3>
                            </div>
                        </div>
                        <div class="col-sm-4 flaot-right">
                        </div>
                    </div>
                </div>

                <table class="table no-footer" style="width: 100%;">

                    <tbody id="timesheet_body-new">
                        <?php $this->load->view('document_list/monthly_task_checklist_view'); ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>

    <script>
        $(document).on('click', '.update_time_stainer', function() {
            var class_name = $(this).data('get_class');

            var currentdate = new Date();
            var datetime = //currentdate.getDate() + "-" +
                // (currentdate.getMonth() + 1) + "-" +
                // currentdate.getFullYear() + " " +
                currentdate.getHours() + ":" +
                currentdate.getMinutes()
                // currentdate.getSeconds();
            $(this).closest('.month-box').find('.avatar').show();
            $(this).closest('.month-box').find('.timesheet_input').val(datetime);
            $("#monthaly_task_checklist").submit();
        });
        $(document).on('change', '.timesheet_input', function() {
            $(this).next('img').show();
            $('#monthaly_task_checklist').submit();
        });

        $(document).on('submit', '#monthaly_task_checklist', function(e) {
            e.preventDefault();
            var _this = $(this);
            var form_data = _this.serialize();
            $.ajax({
                url: _base_url + 'Document_List/update_monthly_task_checklist',
                type: "POST",
                global: false,
                dataType: "json",
                data: form_data,
                success: function(data) {
                    jQuery.sticky(data.message, {
                        classList: 'success',
                        speed: 200,
                        autoclose: 5000
                    });
                },
                error: function(err) {
                    jQuery.sticky('Something went wrong.', {
                        classList: 'important',
                        speed: 200,
                        autoclose: 7000
                    });
                }
            });
        })

        function monthaly_task_checklist(e) {
            var year = $(".current_year").text();
            $("input[name='current_year']").val(parseFloat(year) + parseFloat(e));
            var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
                csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
            var dataJson = {
                [csrfName]: csrfHash,
                year: (parseFloat(year) + parseFloat(e))
            };
            $.ajax({
                url: _base_url + 'Document_List/monthly_task_checklist_view',
                type: "POST",
                global: false,
                dataType: "json",
                data: dataJson,
                success: function(response) {
                    $('#timesheet_body-new').html(response.html);
                    $(".current_year").text(response.year);
                },
                error: function(err) {
                    jQuery.sticky('Something went wrong.', {
                        classList: 'important',
                        speed: 200,
                        autoclose: 7000
                    });
                }
            });
        }
    </script>
    <!---
    <table class="table no-footer">
        <thead>
            <tr>
                <th>January</th>
                <th>February</th>
                <th>March</th>
                <th>April</th>
                <th>May</th>
                <th>June</th>
                <th>July</th>
                <th>August</th>
                <th>September</th>
                <th>October</th>
                <th>November</th>
                <th>December</th>

            </tr>

        </thead>
        <tbody>
            <tr>
                <td><a href="javascript:;" data-toggle="modal" data-target="#add_data_checklist" class="btn btn-primary">Add</a></td>
                <td><a href="javascript:;" data-toggle="modal" data-target="#add_data_checklist" class="btn btn-primary">Add</a></td>
                <td><a href="javascript:;" data-toggle="modal" data-target="#add_data_checklist" class="btn btn-primary">Add</a></td>
                <td><a href="javascript:;" data-toggle="modal" data-target="#add_data_checklist" class="btn btn-primary">Add</a></td>
                <td><a href="javascript:;" data-toggle="modal" data-target="#add_data_checklist" class="btn btn-primary">Add</a></td>
                <td><a href="javascript:;" data-toggle="modal" data-target="#add_data_checklist" class="btn btn-primary">Add</a></td>
                <td><a href="javascript:;" data-toggle="modal" data-target="#add_data_checklist" class="btn btn-primary">Add</a></td>
                <td><a href="javascript:;" data-toggle="modal" data-target="#add_data_checklist" class="btn btn-primary">Add</a></td>
                <td><a href="javascript:;" data-toggle="modal" data-target="#add_data_checklist" class="btn btn-primary">Add</a></td>
                <td><a href="javascript:;" data-toggle="modal" data-target="#add_data_checklist" class="btn btn-primary">Add</a></td>
                <td><a href="javascript:;" data-toggle="modal" data-target="#add_data_checklist" class="btn btn-primary">Add</a></td>
                <td><a href="javascript:;" data-toggle="modal" data-target="#add_data_checklist" class="btn btn-primary">Add</a></td>

            </tr>
        </tbody>
    </table>
       
    <div id="add_data_checklist" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-group">

                        <input type="text" name="first_name" id="first-name-input" value="" class="form-control" placeholder="First Name">
                        <br>
                        <input type="text" name="first_name" id="first-name-input" value="" class="form-control" placeholder="Lat Name">
                        <br>
                        <input type="email" name="first_name" id="first-name-input" value="" class="form-control" placeholder="Email">
                        <br>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>  -->