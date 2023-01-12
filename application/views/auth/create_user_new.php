<style>
    .view_password {
        position: absolute;
        top: 42px;
        right: 30px;
        cursor: pointer;
    }

    .custom-error::after, .custom-success::after {
        top: 42px !important;
    }


    .field-icon {
        position: absolute;
        top: 42px;
        right: 30px;
        cursor: pointer;
    }
</style>
<div class="tg-dbsectionspace tg-haslayout">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="tg-dashboardbox">
                <div class="tg-dashboardboxtitle">
                    <h2>Create New User</h2>
                </div>
                <input type="hidden" id="base_url_value" value="<?php echo base_url(); ?>">
                <input type="hidden" id="csrf_token_name" value="<?php echo $this->security->get_csrf_token_name(); ?>">
                <input type="hidden" id="csrf_token_hash" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type="hidden" id="user_group_id" value="<?php echo $user_group_id; ?>">
                <input type="hidden" id="admin_type" value="<?php echo (!$this->ion_auth->in_group('admin')?"no":"yes"); ?>">
                <div class="tg-editformholder">
                    <div id="infoMessage"><?php echo $message; ?></div>
                    <?php echo form_open_multipart("auth/create_user", array('class' => 'tg-formtheme tg-editform create_user_form','id' => 'create_user_form')); ?>

                    <input type="hidden" id="password_status" value="0">
                    <div class="card mb-4">
                        <div class="card-body">
                            <!-- Profile Picture Input -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="profile-img-wrap edit-img">
                                        <img class="inline-block" id="profile-pic-preview"
                                             src="<?php echo base_url('assets/newtheme/img/profiles/avatar-02.jpg'); ?>"
                                             alt="user">
                                        <div class="fileupload btn">
                                            <span class="btn-text">edit</span>
                                            <input class="upload" type="file" id="profile-pic" name="profile_pic"
                                                   accept="image/*"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- User Personal Information START -->
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-user"></i>
                                            <label>Provider No.</label>
                                            <?php echo form_input(array('type' => 'text', 'name' => 'provider_no', 'id' => 'provider_no', 'value' => '', 'class' => 'form-control', 'placeholder' => 'Provider No.')); ?>
                                            <span class="text-danger"><?php echo form_error('provider_no'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-user"></i>
                                            <label>Given Names</label>
                                            <?php echo form_input(array('type' => 'text', 'name' => 'given_name', 'id' => 'given_name', 'value' => '', 'class' => 'form-control', 'placeholder' => 'Given Name')); ?>
                                            <span class="text-danger"><?php echo form_error('provider_no'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-user"></i>
                                            <label>Title</label>
                                            <Select type="text" name="title" id="title-input" class="form-control">
                                                <option value="Mr.">Mr.</option>
                                                <option value="Mrs.">Mrs.</option>
                                                <option value="Miss.">Miss.</option>
                                            </Select>                                            
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-user"></i>
                                            <label>First Name</label>
                                            <?php echo form_input(array('type' => 'text', 'name' => 'first_name', 'id' => 'first_name', 'value' => '', 'class' => 'form-control', 'placeholder' => 'First Name')); ?>
                                            <span class="text-danger"><?php echo form_error('first_name'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-user"></i>
                                            <label>Last Name</label>
                                            <?php echo form_input(array('type' => 'text', 'name' => 'last_name', 'id' => 'last_name', 'value' => '', 'class' => 'form-control', 'placeholder' => 'Last Name')); ?>
                                            <span class="text-danger"><?php echo form_error('last_name'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-apartment"></i>
                                            <label>Company Name</label>
                                            <?php echo form_input(array('type' => 'text', 'name' => 'company', 'id' => 'company', 'value' => '', 'class' => 'form-control', 'placeholder' => 'Company Name')); ?>
                                            <span class="text-danger"><?php echo form_error('company'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-phone-handset"></i>
                                            <label>Phone</label>
                                            <?php echo form_input(array('type' => 'text', 'name' => 'phone', 'id' => 'phone', 'value' => '', 'class' => 'form-control', 'placeholder' => 'Phone')); ?>
                                            <span class="text-danger"><?php echo form_error('phone'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-apartment"></i>
                                            <label>Address</label>
                                            <textarea class="form-control" name="address" id='address' placeholder="Enter Address"></textarea>                                            
                                            <span class="text-danger"><?php echo form_error('address'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-apartment"></i>
                                            <label>Sub Town</label>
                                            <?php echo form_input(array('type' => 'text', 'name' => 'sub_town', 'id' => 'sub_town', 'value' => '', 'class' => 'form-control', 'placeholder' => 'Enter Sub Town')); ?>
                                            <span class="text-danger"><?php echo form_error('sub_town'); ?></span>
                                        </div>
                                    </div>    
                                    <div class="col-md-2">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-apartment"></i>
                                            <label>State</label>
                                            <?php echo form_input(array('type' => 'text', 'name' => 'state', 'id' => 'state', 'value' => '', 'class' => 'form-control', 'placeholder' => 'Enter State Name')); ?>
                                            <span class="text-danger"><?php echo form_error('sub_town'); ?></span>
                                        </div>

                                    </div>  
                                    <div class="col-md-2">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-apartment"></i>
                                            <label>Postcode</label>
                                            <?php echo form_input(array('type' => 'text', 'name' => 'postcode', 'id' => 'postcode', 'value' => '', 'class' => 'form-control', 'placeholder' => 'Enter Postcode')); ?>
                                            <span class="text-danger"><?php echo form_error('postcode'); ?></span>
                                        </div>

                                    </div>                                
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-envelope"></i>
                                            <label>Email</label>
                                            <?php echo form_input(array('type' => 'text', 'name' => 'email', 'id' => 'email', 'value' => '', 'class' => 'form-control check_email', 'placeholder' => 'Email')); ?>
                                            <span class="text-danger"><?php echo form_error('email'); ?></span>
                                            <span id="email_span" style="display: none;color: red"></span>
                                        </div>
                                        <input type="hidden" name="password_status" id="password_status" value="0"/>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-apartment"></i>
                                            <label>Mobile No.</label>
                                            <?php echo form_input(array('type' => 'text', 'name' => 'mobile_no', 'id' => 'mobile_no', 'value' => '', 'class' => 'form-control', 'placeholder' => 'Enter Mobile No.')); ?>
                                            <span class="text-danger"><?php echo form_error('mobile_no'); ?></span>
                                        </div>
                                    </div>
                                </div>                               


                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group tg-inputwithicon">
                                            <label>User Role</label>
                                            <select class="form-control" name="user_role" id="user_role">
                                                <option value="">Select Role</option>
                                            </select>
                                            <span class="text-danger"><?php echo form_error('user_role'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 user_sub_role" style="display: none">
                                        <div class="form-group tg-inputwithicon">
                                            <label>Sub Role</label>
                                            <select class="form-control" name="user_sub_role" id="user_sub_role">
                                                <option value="">Select Sub Role</option>
                                            </select>
                                            <span class="text-danger"><?php echo form_error('user_sub_role'); ?></span>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group tg-inputwithicon" id="hospital">
                                            <label>Select Group</label>
                                            <select class="select2 form-control" id="Hgroup_id" name="Hgroup_id[]" multiple>
                                                <option value="">Select Group</option>
                                            </select>
                                            <span class="text-danger"><?php echo form_error('user_role'); ?></span>
                                        </div>

                                        <div class="form-group tg-inputwithicon" id="laboratory" style="display:none">
                                            <label>Select laboratory</label>
                                            <select class="form-control" name="agroup_id">
                                                <option value="">Select Laboratory</option>
                                                <?php foreach ($user_roles as $role) { ?>
                                                    <option value="<?php echo $role['group_type']; ?>"><?php echo $role['description']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <span class="text-danger"><?php echo form_error('user_role'); ?></span>
                                        </div>

                                        <div class="form-group tg-inputwithicon" id="pathologist" style="display:none">
                                            <label>Select Pathologist</label>
                                            <select class="form-control" name="agroup_id">
                                                <option value="">Select pathologist</option>
                                                <?php foreach ($user_roles as $role) { ?>
                                                    <option value="<?php echo $role['group_type']; ?>"><?php echo $role['description']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <span class="text-danger"><?php echo form_error('user_role'); ?></span>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-lock"></i>
                                            <label>Password</label>
                                            <?php echo form_input(array('type' => 'password', 'name' => 'password', 'id' => 'password', 'value' => '', 'class' => 'form-control show_pass pr-password check_password', 'placeholder' => 'Password')); ?>
                                            <span class="text-danger"><?php echo form_error('password'); ?></span>
                                            <span id="pass_span" style="display: none;color: red"></span>
                                            <div class="view_password"><i class="fa fa-eye"></i></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-lock"></i>
                                            <label>Confirm Password</label>
                                            <?php echo form_input(array('type' => 'password', 'name' => 'password_confirm', 'id' => 'password_confirm', 'value' => '', 'class' => 'form-control show_pass check_password', 'placeholder' => 'Retype Password')); ?>
                                            <span class="text-danger"><?php echo form_error('password_confirm'); ?></span>
                                            <span id="confirm_span" style="display: none;color: red">Password not matched</span>
                                            <div class="view_password"><i class="fa fa-eye"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-apartment"></i>
                                            <label>Memorable</label>
                                            <?php echo form_input(array('type' => 'password', 'name' => 'memorable', 'id' => 'memorable', 'value' => '', 'class' => 'form-control', 'placeholder' => 'Memorable', 'maxlength' => 10, 'size' => 10)); ?>
                                            <span class="text-danger"><?php echo form_error('memorable'); ?></span>
                                            <span toggle="#memorable" class="fa fa-fw fa-eye field-icon toggle_value"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-apartment"></i>
                                            <label>Practice Code</label>
                                            <?php echo form_input(array('type' => 'text', 'name' => 'practice_code', 'id' => 'practice_code', 'value' => '', 'class' => 'form-control', 'placeholder' => 'Practice Code')); ?>
                                            <span class="text-danger"><?php echo form_error('practice_code'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">                                    
                                    <div class="col-md-6">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-apartment"></i>
                                            <label>Online Claim Type</label>
                                            <?php echo form_input(array('type' => 'text', 'name' => 'online_claim_type', 'id' => 'online_claim_type', 'value' => '', 'class' => 'form-control', 'placeholder' => 'Online Claim Type')); ?>
                                            <span class="text-danger"><?php echo form_error('online_claim_type'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-apartment"></i>
                                            <label>Payee Provider No.</label>
                                            <?php echo form_input(array('type' => 'text', 'name' => 'payee_provider_no', 'id' => 'payee_provider_no', 'value' => '', 'class' => 'form-control', 'placeholder' => 'Payee Provider No.')); ?>
                                            <span class="text-danger"><?php echo form_error('payee_provider_no'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">                                    
                                    <div class="col-md-6">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-apartment"></i>
                                            <label>IHIH Number</label>
                                            <?php echo form_input(array('type' => 'text', 'name' => 'ihih_number', 'id' => 'ihih_number', 'value' => '', 'class' => 'form-control', 'placeholder' => 'IHIH Number')); ?>
                                            <span class="text-danger"><?php echo form_error('ihih_number'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-apartment"></i>
                                            <label>Notes</label>
                                            <textarea class="form-control" name="notes" id='notes' placeholder="Enter Notes"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">                                    
                                    <div class="col-md-3">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-apartment"></i>
                                            <label>Enter By</label>
                                            <?php echo form_input(array('type' => 'text', 'name' => 'enter_by', 'id' => 'enter_by', 'value' => '', 'class' => 'form-control', 'placeholder' => 'Enter By')); ?>
                                            <span class="text-danger"><?php echo form_error('enter_by'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-apartment"></i>
                                            <label>Updated By</label>
                                            <?php echo form_input(array('type' => 'text', 'name' => 'updated_by', 'id' => 'updated_by', 'value' => '', 'class' => 'form-control', 'placeholder' => 'Updated By')); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-apartment"></i>
                                            <label>Enter Date</label>
                                            <?php echo form_input(array('type' => 'date', 'name' => 'enter_date', 'id' => 'enter_date', 'value' => '', 'class' => 'form-control')); ?>                                            
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-apartment"></i>
                                            <label>Update Date</label>
                                            <?php echo form_input(array('type' => 'date', 'name' => 'update_date', 'id' => 'update_date', 'value' => '', 'class' => 'form-control')); ?>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">                                    
                                    <div class="col-md-3">
                                        <div class="form-group tg-inputwithicon">
                                            <i class="lnr lnr-apartment"></i>
                                            <label></label>
                                            <input type="checkbox" name="in_active" value="1"> &nbsp; In-Active                                            
                                        </div>
                                    </div>
                                </div>    
                                <div class="row">
                                    <div class="col-md-7 col-md-offset-6">
                                        <button type="submit" id="user-create-btn" class="btn add-btn mt-5"><i
                                                    class="fa fa-plus"></i> Add User
                                        </button>
                                    </div>
                                </div>

                            </fieldset>
                        </div>
                        <?php echo form_close(); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function show_comp(ids) {
        alert(ids);
    }
</script>