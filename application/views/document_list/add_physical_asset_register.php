<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
    .edit-icon-top i {
    top: 47px;
}
.sec_title.p_id{
    position: relative;
    background: #fff;
    padding: 0px;
    border-bottom: 0;
    margin-bottom: 30px;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
}
.sec_title.p_id .info_nndn2{
    border: 1px solid #eee!important;
}
.page-wrapper > .content{
background: #f5f5f5;
}
.sec_title.p_id .info_nndn2 tr td{
    padding: 5px 15px;
}
.border-pd {
    padding: 5px 15px;
}

.tox-statusbar__branding{
	display:none;
}


 </style>   
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">

            <h3 class="page-title"><?php echo (isset($page_title))?$page_title:'Physical Asset Register' ?></h3>
            <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('Document') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('Document_List/physical_asset_register') ?>">Physical Asset Registers</a></li>
			
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
<input type="hidden" name="physical_asset_register_id" value="<?php echo $result['id']; ?>">
<div class="sec_title p_id form-group">
                 
    <div class="border-pd">

        <div class="row">
                                
            <div class="col-md-6">
                <div class="form-group">
                    <label>Asset Title</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="text" name="asset_title"  value="<?php echo (isset($result['asset_title']))?$result['asset_title']:''; ?>" class="form-control" placeholder="Asset Title" required>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Serial Number</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="text" name="serial_number"  value="<?php echo (isset($result['serial_number']))?$result['serial_number']:''; ?>" class="form-control" placeholder="Serial Number" required>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Received Date</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="date" name="date_received"  value="<?php echo (isset($result['date_received']))?$result['date_received']:''; ?>" class="form-control" placeholder="Received Date" required>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Date Put Into Service</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="date" name="date_into_service"  value="<?php echo (isset($result['date_into_service']))?$result['date_into_service']:''; ?>" class="form-control" placeholder="Date Put Into Service" required>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Warranty / Product Review Date</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="date" name="warranty"  value="<?php echo (isset($result['warranty']))?$result['warranty']:''; ?>" class="form-control" placeholder="Warranty" required>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Date Retired from Service</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="date" name="date_retire_service"  value="<?php echo (isset($result['date_retire_service']))?$result['date_retire_service']:''; ?>" class="form-control" placeholder="Date Retired from Service" required>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Owner</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <!-- <input type="text" name="owner"  value="<?php echo (isset($result['owner']))?$result['owner']:''; ?>" class="form-control" placeholder="Owner" required> -->

                    <select class="form-control" name="owner">
                        <?php foreach ($usersList as $key => $value) {
                            if($value->user_id == $result['owner']) $sel = "selected";
                            else $sel = "";
                            echo "<option value=".$value->user_id." $sel>".$value->enc_first_name.' '.$value->enc_last_name."</option>";
                        } ?>
                        
                    </select>


                    <?php echo  form_error('name'); ?>
                </div>
            </div>
                  
        </div>
    </div>
</div>	


    
    <div class="row">           
        <button type="submit" style="margin:10px;" class="btn btn-primary btn-rounded create_new_next_button pull-right" name="submit">Submit</button>
    </div>
</form>	
	
	
</div>




