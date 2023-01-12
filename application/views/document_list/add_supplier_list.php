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

            <h3 class="page-title"><?php echo (isset($page_title))?$page_title:'Supplier Section' ?></h3>
            <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('Document') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('Document_List') ?>">Document</a></li>
			
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
<input type="hidden" name="supplier_id" value="<?php echo $result['id']; ?>">
<div class="sec_title p_id form-group">
                 
    <div class="border-pd">

        <div class="row">
                                
            <div class="col-md-6">
                <div class="form-groups">
                    <label>Supplier</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <!-- <input type="text" name="supplier"  value="<?php echo (isset($result['supplier']))?$result['supplier']:''; ?>" class="form-control" placeholder="Supplier" required> -->

                    <select class="form-control" name="supplier">
                        <?php foreach ($usersList as $key => $value) {
                            if($value->user_id == $result['supplier']) $sel = "selected";
                            else $sel = "";
                            echo "<option value=".$value->user_id." $sel>".$value->enc_first_name.' '.$value->enc_last_name."</option>";
                        } ?>
                        
                    </select>


                    <?php echo  form_error('name'); ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-groups">
                    <label>Contact Name</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="text" name="contact_name"  value="<?php echo (isset($result['contact_name']))?$result['contact_name']:''; ?>" class="form-control" placeholder="Contact Name" required>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-groups">
                    <label>Contact Number</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="text" name="contact_number"  value="<?php echo (isset($result['contact_number']))?$result['contact_number']:''; ?>" class="form-control" placeholder="Contact Number" required>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-groups">
                    <label>Contact Email</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="email" name="contact_email"  value="<?php echo (isset($result['contact_email']))?$result['contact_email']:''; ?>" class="form-control" placeholder="Contact Email" required>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-groups">
                    <label>Product Supplied</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="text" name="product_supplied"  value="<?php echo (isset($result['product_supplied']))?$result['product_supplied']:''; ?>" class="form-control" placeholder="Product Supplied" required>
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




