<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
    .table-responsive {
        overflow-x: hidden;
    }

    .box-setup .col-xl-3 {
        max-width: 25%;
        flex: 0 0 25%;
    }

    #update_tempearture_timesheet th input,
    #update_tempearture_timesheet #timesheet_body-new input {
        height: 40px;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 0px 5px;
        border: none;
        background: none;
        width: 80%;
		text-align:center;
    }
	
	#update_tempearture_timesheet #timesheet_body-new input:hover {
        
        border: 1px solid #f7f7f7;
        
    }

    #update_tempearture_timesheet thead tr th {
        text-transform: capitalize;
    }

    #update_tempearture_timesheet thead tr th .show_date {
        display: block;
    }

    #update_tempearture_timesheet #timesheet_body-new input {
        background: transparent;
        max-width: 100%;
    }

    .avatar {
        height: 32px;
        line-height: 32px;
        margin: 0 5px 0 0;
        width: 32px;
    }

    #update_tempearture_timesheet #timesheet_body-new tr td i {
        padding-left: 0px !important;
    }

    #update_tempearture_timesheet {
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

    #update_tempearture_timesheet thead tr th,
    #update_tempearture_timesheet #timesheet_body-new tr td {
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

    #timesheet_body-new label:after {
        content: "\f2c8";
        font: normal normal normal 22px/1 FontAwesome;
        margin-left: 8px;
        color: #000000;
    }

    #timesheet_body-new td label {
        width: 115px;
        margin-right: 15px;
        display: inline-flex;
        align-items: center;
    }
    .icon_active label:after{
        color: #03f35f !important;
    }
</style>

<div class="row box-setup">
    <div class="col-md-6 col-sm-6 col-lg-3 col-xl-3">
        <a href="<?php echo base_url('Document_List/labortary_task_checklist'); ?>">
            <div class="card dash-widget">
                <div class="card-body">
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


    <div class="col-md-6 col-sm-6 col-lg-3 col-xl-3">
        <a href="<?php echo base_url('Document_List/temperature_logbook'); ?>">
            <div class="card dash-widget" style="box-shadow: 4px 4px 4px 4px lightblue;">
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
                <h3 class="page-title">Temperature Log Book</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('Document_List/forms') ?>">Dashboard / Checklists /Temperature Log Book</a></li>
                </ul>
            </div>

        </div>
    </div>

    <div class="col-sm-12">
        <div class="row">
            <div class="table-responsive">
                <form action="#" method="POST" id="update_tempearture_timesheet">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                    <input type="hidden" name="week_date" id="week_date" value="">
                    <div class="col-auto ml-auto">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="card-title title-nav mb-0">
                                    <div class="block-r"><a href="javascript:temprature_logs(-1)"><strong class="left-side"> Prev</strong></a></div>
                                    <div class="block-r"><a href="javascript:temprature_logs(1)"><strong class="right-side"> Next</strong></a></div>
                                    <!-- <div class="block-l"> <a href="#"><strong class="right-today"> Month </strong></a></div> -->
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card-title mb-0 text-center">
                                    <h3><b><span class='change_month'></span></b></h3>
                                </div>
                            </div>
                            <div class="col-sm-4 flaot-right">
                            </div>
                        </div>
                    </div>
                    <table class="table no-footer" id="revision_table_datatable" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Item of Equipment</th>
                                <th>Req'd Temperature Range ((℃))</th>
                                <th>Monday<span class="show_date"></span></th>
                                <th>Tuesday<span class="show_date"></span></th>
                                <th>Wednesday<span class="show_date"></span></th>
                                <th>Thursday<span class="show_date"></span></th>
                                <th>Friday<span class="show_date"></span></th>
                            </tr>
                        </thead>
                        <tbody id="timesheet_body-new">
                            <?php //$this->load->view('document_list/temprature_logbook_weekly_view'); 
                            ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <div id="flag_comment_model" class="flag_comment_model modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Comment</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="flag_msg"></div>
                    <form method="post" class="form flag_comments" id="flag_comments_form_<?= $flag_count; ?>">
                        <div class="form-group">
                            <textarea name="flag_comment" id="flag_comment" rows="5" class="form-control flag_comment"></textarea>
                            <input type="hidden" name="record_id" value="<?php echo $row->uralensis_request_id; ?>">
                            <input type="hidden" name="data_section" value="1" />
                        </div>
                        <a class="btn btn-primary flag_comments_save_record_list" id="flag_comments_save" href="javascript:;">Save Comments</a>
                    </form>
                    <br>
                    <p><h4 class="modal-title">Comments</h4></p>
                    <table class="table table-striped manage_supple_table">
                        <tbody>
                            <tr class="commentWrap">
                                <th>User</th>
                                <th>Date & Time</th>
                                <th>Comment</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var curr = new Date; // get current date
            var first = curr.getDate() - curr.getDay() + 1;
            var last = first + 4;
            var firstday = new Date(curr.setDate(first)).toLocaleDateString("en-US", {
                year: "numeric",
                month: "2-digit",
                day: "2-digit"
            });
            var lastday = new Date(curr.setDate(last)).toLocaleDateString("en-US", {
                year: "numeric",
                month: "2-digit",
                day: "2-digit"
            });
            $("#week_date").val(firstday + '-' + lastday);

            // Update table data when load
            var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
                csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
            var dataJson = {
                [csrfName]: csrfHash,
                weekdate: firstday + '-' + lastday
            };
            $.ajax({
                url: _base_url + 'Document_List/get_temprature_logs_weekly',
                type: "POST",
                global: false,
                dataType: "json",
                data: dataJson,
                success: function(response) {
                    $('#timesheet_body-new').html(response.html);
                },
                error: function(err) {}
            });
        });

        $(document).on('click','.flag_comments_save_record_list',function(){
            var inputName = $(this).attr('data-name');
            var comments = $('#flag_comment').val();
            var d = new Date;
            dformat = [d.getFullYear(), d.getMonth()+1,
                    d.getDate(),
                    ].join('-')+' '+
                    [d.getHours(),
                    d.getMinutes(),
                    d.getSeconds()].join(':');
            if(comments.trim() != ''){
                if($('#'+inputName).val() != ''){
                    defaultComment = JSON.parse($('#'+inputName).val());
                    defaultComment.push({comment : comments, created:dformat,uId:$('#logUserId').val()});
                }else{
                    defaultComment = [];
                    defaultComment.push({comment : comments, created:dformat,uId:$('#logUserId').val()});
                }
                $('#'+inputName).val(JSON.stringify(defaultComment));
                $('#'+inputName).parent().find('.temp_input').trigger('change');
                $('#flag_comment_model').modal('hide');
            }
        });

        $(document).on('click', '.view_comments', function(){
            $('.dynamicComRow').remove();
            $('#flag_comment').val('');
            var name = $(this).attr('name');
            $('.flag_comments_save_record_list').attr('data-name', name);
            var existingComments = $('#'+name).val();
            
            $('#flag_comment_model').modal('show');
            var html = '';
            if(existingComments != ''){
                var comments = JSON.parse(existingComments);
                
                var cnt = 0;
                for(var i = comments.length - 1; i >= 0 ;i--){
                    cnt ++;
                    html += '<tr class="dynamicComRow"><td>'+cnt+'</td><td>'+comments[i].created+'</td><td>'+comments[i].comment+'</td></tr>'
                    console.log(comments[i].comment);
                }
            }else{
                html += '<tr class="dynamicComRow"><td colspan="3" style="color:red">No comments yet</td></tr>'
            }
            $('.commentWrap').after(html);
        });


        $(document).on('change', '.temp_input', function() {
            if($(this).val() != '') $(this).parent().parent().addClass('icon_active');
            else $(this).parent().parent().removeClass('icon_active');
            $('#update_tempearture_timesheet').submit();
        });

        $(document).on('submit', '#update_tempearture_timesheet', function(e) {
            e.preventDefault();
            var _this = $(this);
            var form_data = _this.serialize();
            $.ajax({
                url: _base_url + 'Document_List/update_temprature_logs_weekly',
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

        function temprature_logs(e) {
            var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
                csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

            var fullWeekDate = $("#week_date").val();
            if (e == '+1') {
                var firstday = new Date(fullWeekDate.substr(0, 10));
                firstday.setDate(firstday.getDate() + 7);
                var lastday = new Date(fullWeekDate.substr(11, 10));
                lastday.setDate(lastday.getDate() + 7);

                wd = firstday.toLocaleDateString("en-US", {
                    year: "numeric",
                    month: "2-digit",
                    day: "2-digit"
                }) + '-' + lastday.toLocaleDateString("en-US", {
                    year: "numeric",
                    month: "2-digit",
                    day: "2-digit"
                });


            } else if (e == '-1') {

                var firstday = new Date(fullWeekDate.substr(0, 10));
                firstday.setDate(firstday.getDate() - 7);
                var lastday = new Date(fullWeekDate.substr(11, 10));
                lastday.setDate(lastday.getDate() - 7);
                wd = firstday.toLocaleDateString("en-US", {
                    year: "numeric",
                    month: "2-digit",
                    day: "2-digit"
                }) + '-' + lastday.toLocaleDateString("en-US", {
                    year: "numeric",
                    month: "2-digit",
                    day: "2-digit"
                });

            }
            var dataJson = {
                [csrfName]: csrfHash,
                weekdate: wd
            };
            $.ajax({
                url: _base_url + 'Document_List/get_temprature_logs_weekly',
                type: "POST",
                global: false,
                dataType: "json",
                data: dataJson,
                success: function(response) {
                    $('#timesheet_body-new').html(response.html);
                    $("#week_date").val(wd);

                    const monthNames = ["Jan", "Feb", "Mar", "April", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"];
                    var n = new Date(response.next_date);
                    $(".show_date").each(function(key, val) {
                        var ud = monthNames[n.getMonth()] + '  ' + n.getDate();
                        $(this).text('(' + ud + ')');
                        n.setDate(n.getDate() + 1);
                    });

                    const fullMonthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                    $(".change_month").text(fullMonthNames[n.getMonth()] + '  ' + n.getFullYear());
                },
                error: function(err) {}
            });
        }
    </script>