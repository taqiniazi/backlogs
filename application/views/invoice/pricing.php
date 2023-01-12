<style>
    .iconsss{color: #333}
    #upload_csv{margin-bottom: 20px;}
    #upload_csv label{float: left;font-size: 13px; line-height: 30px;}
    #upload_csv input{float: left; width: 225px; margin-left: 15px;font-size: 13px;}
    .cancel-btnn{border: 1px solid #ccc;
    padding: 5px 10px;
    border-radius: 3px;
    font-size: 14px;
    color: #333;}
    .cancel-btnn:hover{
        border: 1px solid #00c5fb;
        background-color: #00c5fb;
        color: #fff;
    }
    .add-btn{
        font-size: 14px;
        min-width: auto;
    }
</style>
<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Pricing</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Setup Billing Code</li>
            </ul>
        </div>
        <div class="col-auto float-right ml-auto" style="padding-right: 0;">
            <a href="<?php echo base_url(); ?>index.php/invoice/addBillingCode" class="btn add-btn"><i
                        class="fa fa-plus"></i>Add</a>
        </div>
        <div class="col-auto float-right ml-auto">
            <a href="javascript:void(0)" class="btn add-btn" id="show_div"><i class="fa fa-upload"></i>Upload CSV</a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        
        <div class="col-sm-12" style="background-color:#fff; box-shadow:0px 0px 5px #ededed; padding: 20px 20px 15px; display:none" id="upload_csv">
            <form action="" method="" enctype="multipart/form-data">
                <!-- <div class="row">
                    <div class="col-sm-12 float-right col-md-12">
                        <a href="#" id="hide_div" onclick="#">X</a>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            <label>Upload CSV</label>
                            <input type="file" name="upload_csv"/>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group" style="text-align:center; font-size: 14px;">
                            <a href="#"><i class="fa fa-download"></i> Download Sample File</a>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <a href="#" id="hide_div" class="cancel-btnn" onclick="#" style="float: right;">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- <br/></br> -->
<!-- /Page Header -->
<!-- /Search Filter -->
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Code Type</th>
                    <th>Billing Code</th>
                    <th>Code Name</th>
                    <th>Rate</th>
                    <th>Country</th>
                    <th>Description</th>
                    <th class="text-right">Action</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $cnt = 0;
                foreach ($result as $resKey => $resValue) {
                    $cnt++;
                    ?>

                    <tr>
                        <td><?php echo $cnt; ?></td>
                        <td><?php echo $resValue["code_type"]; ?></td>
                        <td><?php echo $resValue["billing_code"]; ?></td>
                        <td><?php echo $resValue["billing_code_name"]; ?></td>
                        <td><?php echo $resValue["billing_rate"]; ?></td>
                        <td><?php echo $resValue["country"]; ?></td>
                        <td><?php echo $resValue["description"]; ?></td>

                        <td class="text-right">
                            <a class="iconsss edit_btn" href="javascript:void(0)" data-id="<?php echo $resValue["id"];?>" data-toggle="modal" data-target="#edit_billing_code_modal"><i class="fa fa-pencil m-r-5"></i> </a>
                            <a class="iconsss delete_btn" href="<?php echo base_url('invoice/deleteBillingCode/'.$resValue["id"]) ?>"><i class="fa fa-trash-o m-r-5"></i> </a>

                            <!-- <div class="dropdown dropdown-action"> -->
                                <!-- <a href="javascript:;" class="action-icon dropdown-toggle" data-toggle="dropdown" -->
                                   <!-- aria-expanded="false"><i class="material-icons">more_vert</i></a> -->
                                <!-- <div class="dropdown-menu dropdown-menu-right">
                                    <textarea id="billing_data_<?php echo $resValue["id"]; ?>" style="display: none"><?php echo json_encode($resValue);?></textarea>
                                        <a class="dropdown-item" href="edit-invoice.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>-->
                                        <!-- <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/billing/view_invoice"><i class="fa fa-eye m-r-5"></i> View</a>
                                        <a class="dropdown-item" href="javascript:;"><i class="fa fa-file-pdf-o m-r-5"></i> Download</a>-->
                                        <!-- <a class="dropdown-item" href="<?php echo base_url("invoice/details/" . $resValue["id"]); ?>"><i class="fa fa-eye m-r-5"></i> View</a> -->
                                        <!-- <a class="dropdown-item edit_btn" href="javascript:void(0)" data-id="<?php echo $resValue["id"];?>" data-toggle="modal" data-target="#edit_billing_code_modal"><i class="fa fa-pencil m-r-5"></i> Edit</a> -->
                                        <!-- <a class="dropdown-item" href="<?php echo base_url('invoice/deleteBillingCode/'.$resValue["id"]) ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a> -->

                                <!-- </div>  -->
                            <!-- </div> -->
                        </td>
                    </tr>

                <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="edit_billing_code_modal" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <?php echo form_open_multipart("", array('id' => 'edit_billing_form')); ?>
            <input type="hidden" id="edit_id" name="edit_id" value="">
            <div class="modal-header">
                <h5 class="modal-title">Billing Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <?php if (isset($message)) { ?>
                            <div id="infoMessage"><?php echo $message; ?></div>
                        <?php } ?>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            <label>Code Type<span class="text-danger">*</span></label>
                            <div class="field_wrapper_codeType">
                                <select class="select" name="code_type" id="code_type">
                                    <?php foreach ($billing_codes as $billKey => $billValue) { ?>
                                        <option value="<?php echo $billValue->name; ?>"><?php echo $billValue->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            <label>Billing Code<span class="text-danger">*</span> </label>
                            <div class="field_wrapper">
                                <input class="form-control" placeholder="Enter Billing Code" name="billing_code" id="billing_code" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            <label>Code Name<span class="text-danger">*</span> </label>
                            <div class="field_wrapper_codeName">
                                <input class="form-control" placeholder="Enter Billing Code Name" type="text" name="billing_code_name" id="billing_code_name" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Rate<span class="text-danger">*</span></label>
                            <input class="form-control" type="number" name="billing_price" id="billing_price" />
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Country<span class="text-danger">*</span></label>
                            <select class="select" name="country" id="country" style="width:50%">
                                <option  value="UK">UK</option>
                                <option value="USA">USA</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea  id= "description" name= "description" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-info btn-rounded btn-lg submit-bill" type="button">Save
                </button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script>
    $("#hide_div").click(function () {
        $("#upload_csv").hide(1000);
    });

    $("#show_div").click(function () {
        $("#upload_csv").show(1000);
    });

    $(document).on("click",".edit_btn",function () {
        var dataId = $(this).attr("data-id");
        var getData = $.parseJSON($("#billing_data_"+dataId).val());
        $("#edit_id").val(dataId);
        $("#code_type").val(getData.code_type);
        $("#billing_code").val(getData.billing_code);
        $("#billing_code_name").val(getData.billing_code_name);
        $("#billing_price").val(getData.billing_rate);
        $("#country").val(getData.country);
        $("#description").val(getData.description);
    });

    $(document).on("click",".submit-bill",function () {
        var baseUrl = '<?php echo base_url();?>';
        $.ajax({
            type: "POST",
            url: baseUrl + '/invoice/editBillingCode',
            data: $("#edit_billing_form").serialize(),
            dataType: "json",
            success: function (response) {
                // console.log(response);return;
                // var specimenId = $('#block_specimen_id').val();
                if (response.status === 'success') {
                    $('#edit_billing_code_modal').modal('hide');
                    // $("#specimen_" + specimenId + " .block_table").append(response.data);
                    $.sticky(response.msg, {
                        classList: 'success',
                        speed: 200,
                        autoclose: 7000
                    });
                    location.reload();
                } else {
                    $.sticky(response.msg, {
                        classList: 'important',
                        speed: 200,
                        autoclose: 7000
                    });
                }
            }
        });
    });



</script>
<!-- /Page Content -->