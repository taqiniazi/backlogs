<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
    /* New Css Start */
    #frame {
        position: relative;
        margin: 0 auto;
        width: 100%;
        max-width: 100%;
        text-align: center;
    }

    #frame input[type=radio] {
        display: none;
    }

    #frame label {
        cursor: pointer;
        text-decoration: none;
    }

    #slides {
        position: relative;
        z-index: 1;
    }

    #overflow {
        width: 100%;
        overflow: hidden;
    }

    #frame1:checked~#slides .inner {
        margin-left: 0;
    }

    #frame2:checked~#slides .inner {
        margin-left: -100%;
    }

    #frame3:checked~#slides .inner {
        margin-left: -200%;
    }

    #slides .inner {
        transition: margin-left 800ms cubic-bezier(0.770, 0.000, 0.175, 1.000);
        width: 400%;
        line-height: 0;
        height: 300px;
    }

    #slides .frame {
        width: 25%;
        float: left;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        color: #FFF;
    }

    #controls {
        margin: -180px 0 0 0;
        width: 10%;
        height: 36px;
        z-index: 3;
        position: absolute;
        top: -14%;
        left: 45%;
        right: auto;
        text-align: center;
        margin: auto;
    }

    #controls label {
        transition: opacity 0.2s ease-out;
        display: none;
        width: 50px;
        height: 50px;
        opacity: 1;
    }

    #controls label:hover {
        opacity: 1;
    }

    #frame1:checked~#controls label:nth-child(2),
    #frame2:checked~#controls label:nth-child(3),
    #frame3:checked~#controls label:nth-child(1) {
        background: url('<?= site_url(); ?>assets/icons/track.svg') no-repeat;
        float: right;
        transform: rotate(45deg);
        margin: 0 -50px 0 0;
        display: block;
    }

    #frame1:checked~#controls label:nth-last-child(1),
    #frame2:checked~#controls label:nth-last-child(3),
    #frame3:checked~#controls label:nth-last-child(2) {
        background: url('<?= site_url(); ?>assets/icons/track.svg') no-repeat;
        float: left;
        transform: rotate(225deg);
        margin: 0 0 0 -50px;
        display: block;
    }

    #bullets {
        margin: 150px 0 0;
        text-align: center;
    }

    #bullets label {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 100%;
        background: #ccc;
        margin: 0 10px;
    }

    #frame1:checked~#bullets label:nth-child(1),
    #frame2:checked~#bullets label:nth-child(2),
    #frame3:checked~#bullets label:nth-child(3) {
        background: #444;
    }

    @media screen and (max-width: 900px) {

        #frame1:checked~#controls label:nth-child(2),
        #frame2:checked~#controls label:nth-child(3),
        #frame3:checked~#controls label:nth-child(1),
        #frame1:checked~#controls label:nth-last-child(2),
        #frame2:checked~#controls label:nth-last-child(3),
        #frame3:checked~#controls label:nth-last-child(1) {
            margin: 0;
        }

        #slides {
            max-width: calc(100% - 140px);
            margin: 0 auto;
        }
    }

    /* New Css End */
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
        padding: 10px 0;

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

    #frame th input,
    #frame input {
        height: 40px;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 0px 5px;
        border: none;
        background: none;
        width: 80%;
    }

    #frame thead tr td {
        text-transform: capitalize;
    }

    #frame thead tr th .show_date {
        display: block;
    }

    #frame input {
        background: transparent;
        max-width: 100%;
    }

    #frame input:hover {
        border: 1px solid #f7f7f7;
    }

    .avatar {
        height: 32px;
        line-height: 32px;
        margin: 0 5px 0 0;
        width: 32px;
    }

    #frame tr td i {
        padding-left: 0px !important;
    }

    #frame {
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

    #frame tr th,
    #frame tr td {
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


    #frame thead tr th,
    #frame tr td {
        font-weight: 400;
        text-align: center !important;
        padding: 20px 10px;
        vertical-align: top;
    }

    #frame thead tr th a,
    #frame tr td a {
        color: #000;
        font-size: 16px;
        font-weight: 600;
        text-transform: uppercase;
        display: block;
    }

    .month-box {
        display: flex;
        margin-bottom: 15px;
        margin-top: 10px;
        align-content: center;
        align-items: center;
        border-bottom: solid 1px #CCC;
    }

    #frame td strong {
        height: 57px;
        color: #000;
        line-height: 24px;
        display: block;
        border: 1px solid #ccc;
        font-size: 11px;
        text-align: left;
        padding-bottom: 5px;
        font-weight: 600;
        padding-top: 20px;
        padding-left: 5px;

    }

    .strong_text strong {
        border-top: 0px solid !important;
        border-left: 0px solid !important;
        border-right: 0px solid !important;
    }

    .icon-cricle {
        width: 100%;
        max-width: 15px;
    }

    .strong_text {
        margin-top: -9px;

    }

    .frame-content {
        width: 100%;
    }

    #frame table {
        width: 100%;
    }

    .block-left {
        width: 100%;
        max-width: 40px;
        position: absolute;
        top: 0px;
        left: 30px;
        height: 40px;
    }

    .block-left a {
        color: #2dc6fb;
        background: #cdf4fe;
        padding: 3px 12px;
        border-radius: 50px;
        height: 40px;
        width: 40px;
        font-size: 32px;
    }

    .block-right {
        width: 100%;
        max-width: 40px;
        position: absolute;
        top: 0px;
        right: 30px;
        height: 40px;
    }

    .block-right a {
        color: #2dc6fb;
        background: #cdf4fe;
        padding: 3px 12px;
        border-radius: 50px;
        height: 40px;
        width: 40px;
        font-size: 32px;
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

                            </div>
                        </div>
                        <div class="col-sm-4">

                            <div class="card-title mb-0 text-center">
                                <div class="block-left"><a href="javascript:monthaly_task_checklist(-1)"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></div>
                                <h3><b>Year <span class="current_year">2022</span></b></h3>
                                <div class="block-right"><a href="javascript:monthaly_task_checklist(1)"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
                            </div>

                        </div>
                        <div class="col-sm-4 flaot-right">
                        </div>
                    </div>
                </div>


                <div class="year_data">
                    <?php $this->load->view('document_list/monthly_task_checklist_view'); ?>

                </div>
            </form>
            <input type="hidden" id="loginUid" value="U-<?php echo $this->ion_auth->user()->row()->id ?>"/>
        </div>
    </div>
    <script>
        function formatAMPM(date) {
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var ampm = hours >= 12 ? 'PM' : 'AM';
            return ampm;
        }

        $(document).on('click', '.update_time_stainer', function() {
            var class_name = $(this).data('get_class');

            var currentdate = new Date();
            var datetime = currentdate.getDate() + "-" +
                (currentdate.getMonth() + 1) + "-" +
                currentdate.getFullYear() + " " +
                formatAMPM(currentdate)
            // currentdate.getSeconds();
            $(this).closest('.month-box').find('.avatar').show();
            $(this).closest('.month-box').find('.timesheet_input').val(datetime + $('#loginUid').val());
            $(this).closest('.month-box').find('.dis-timesheet_input').val(datetime);
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
                    $('.year_data').html(response.html);
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