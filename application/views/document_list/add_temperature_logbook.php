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

            <h3 class="page-title"><?php echo (isset($page_title))?$page_title:'Temperature LogBook' ?></h3>
            <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('Document') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('Document_List/temperature_logbook') ?>">Temperature LogBook</a></li>
			
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
<input type="hidden" name="temperature_logbook_id" value="<?php echo $result['id']; ?>">
<div class="sec_title p_id form-group">
                 
    <div class="border-pd">

        <div class="row">
                                
            <div class="col-md-6">
                <div class="form-group">
                    <label>Item of Equipment</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="text" name="equipment_item"  value="<?php echo (isset($result['equipment_item']))?$result['equipment_item']:''; ?>" class="form-control" placeholder="Equipment Item" required>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Req'd temperature range (deg C)</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="text" name="temperature_range"  value="<?php echo (isset($result['temperature_range']))?$result['temperature_range']:''; ?>" class="form-control" placeholder="Temperature Range" required>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>
            
            <div class="col-md-12">
            <label>Measured Temperature</label>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label>Monday</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="text" name="monday"  value="<?php echo (isset($result['monday']))?$result['monday']:''; ?>" class="form-control" placeholder="Monday" required>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Tuesday</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="text" name="tuesday"  value="<?php echo (isset($result['tuesday']))?$result['tuesday']:''; ?>" class="form-control" placeholder="Tuesday" required>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Wednesday</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="text" name="wednesday"  value="<?php echo (isset($result['wednesday']))?$result['wednesday']:''; ?>" class="form-control" placeholder="Wednesday" required>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Thursday</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="text" name="thursday"  value="<?php echo (isset($result['thursday']))?$result['thursday']:''; ?>" class="form-control" placeholder="Thursday" required>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Friday</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="text" name="friday"  value="<?php echo (isset($result['friday']))?$result['friday']:''; ?>" class="form-control" placeholder="Friday" required>
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




