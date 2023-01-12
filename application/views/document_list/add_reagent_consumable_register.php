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

            <h3 class="page-title"><?php echo (isset($page_title))?$page_title:'Reagent Consumable Section' ?></h3>
            <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('Document') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('Document_List/reagent_consumable_register') ?>">Reagent Consumable List</a></li>
			
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
<input type="hidden" name="reagent_consumable_register_id" value="<?php echo $result['id']; ?>">
<div class="sec_title p_id form-group">
                 
    <div class="border-pd">

        <div class="row">
                                
            <div class="col-md-6">
                <div class="form-group">
                    <label>Reagent Name</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="text" name="reagent_name"  value="<?php echo (isset($result['reagent_name']))?$result['reagent_name']:''; ?>" class="form-control" placeholder="Reagent Name" required>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Date Received</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="date" name="date_received"  value="<?php echo (isset($result['date_received']))?$result['date_received']:''; ?>" class="form-control" placeholder="Date Received" required>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Received By</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="text" name="received_by"  value="<?php echo (isset($result['received_by']))?$result['received_by']:''; ?>" class="form-control" placeholder="Received By" required>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Batch Number</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="text" name="batch_number"  value="<?php echo (isset($result['batch_number']))?$result['batch_number']:''; ?>" class="form-control" placeholder="Batch Number" required>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Expiry Date</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="date" name="expiry_date"  value="<?php echo (isset($result['expiry_date']))?$result['expiry_date']:''; ?>" class="form-control" placeholder="Expiry Date" required>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Date In Use</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="date" name="date_in_use"  value="<?php echo (isset($result['date_in_use']))?$result['date_in_use']:''; ?>" class="form-control" placeholder="Date In Use" required>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Completed Date</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="date" name="completed_date"  value="<?php echo (isset($result['completed_date']))?$result['completed_date']:''; ?>" class="form-control" placeholder="Completed Date" required>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Quality Control Whom</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="text" name="quality_control_whom"  value="<?php echo (isset($result['quality_control_whom']))?$result['quality_control_whom']:''; ?>" class="form-control" placeholder="Quality Control Whom" required>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Quality Control Date</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="date" name="quality_control_date"  value="<?php echo (isset($result['quality_control_date']))?$result['quality_control_date']:''; ?>" class="form-control" placeholder="Quality Control Date" required>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Pass / Fail</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="text" name="pass_fail"  value="<?php echo (isset($result['pass_fail']))?$result['pass_fail']:''; ?>" class="form-control" placeholder="Pass / Fail" required>
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
        <button type="submit" style="margin:10px;" class="btn btn-primary btn-rounded create_new_next_button pull-right" id="create_new_record_btn" name="submit">Submit</button>
    </div>
</form>	
	
	
</div>




