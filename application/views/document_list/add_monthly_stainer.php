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
            <li class="breadcrumb-item"><a href="<?php echo base_url('Document_List/monthaly_stainer_checklist') ?>">Monthly Stainer Checklist</a></li>
			
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
<input type="hidden" name="monthly_stainer_id" value="<?php echo $result['id']; ?>">
<div class="sec_title p_id form-group">
                 
    <div class="border-pd">

        <div class="row">
                                
            <div class="col-md-6">
                <div class="form-group">
                    <label>Source</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="text" name="source"  value="<?php echo (isset($result['source']))?$result['source']:''; ?>" class="form-control" placeholder="Source" required>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Reference</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="text" name="ref"  value="<?php echo (isset($result['ref']))?$result['ref']:''; ?>" class="form-control" placeholder="Reference" required>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Initiative</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="text" name="intiative"  value="<?php echo (isset($result['intiative']))?$result['intiative']:''; ?>" class="form-control" placeholder="Initiative" required>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Action Owner</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <select name="action_owner" class="form-control" require>
                        <option value="">--Select Owner--</option>
                        <?php foreach($user_info as $key => $user){?>
                            <option value="<?php echo $user['id'] ?>" <?php echo ($result['action_owner'] && $result['action_owner'] == $user['id'])?"selected":""; ?>><?php echo $user['first_name']." ".$user['last_name']; ?></option>
                        <?php } ?>
                    </select>
                    <!-- <input type="text" name="action_owner"  value="<?php echo (isset($result['action_owner']))?$result['action_owner']:''; ?>" class="form-control" placeholder="Action Owner" required> -->
                    <?php echo  form_error('name'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Target Date</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="date" name="target_date"  value="<?php echo (isset($result['target_date']))?$result['target_date']:''; ?>" class="form-control" placeholder="Target Date" required>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Status</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <select name="status" class="form-control" require>
                            <option value="Open" <?php echo ($result['status'] && $result['status'] == 'Open')?"selected":""; ?>>Open</option>
                            <option value="Close" <?php echo ($result['status'] && $result['status'] == 'Close')?"selected":""; ?>>Close</option>
                    </select>
                    <?php echo  form_error('name'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Comment</label>
                    <!-- <i class="lnr lnr-apartment"></i> -->
                    <input type="text" name="comment"  value="<?php echo (isset($result['comment']))?$result['comment']:''; ?>" class="form-control" placeholder="Comment" required>
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




