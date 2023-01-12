<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
 
.table-responsive {
	overflow-x: hidden;	
}

</style>
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Reagent Consumable Register</h3>
            <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('Document_List/forms') ?>">Forms</a></li>
            </ul>
        </div>
		
		<div class="col-auto float-right ml-auto">
		    <a href="<?php echo base_url('Document_List/add_reagent_consumable_register'); ?>" class="btn add-btn"><i class="fa fa-plus"></i>  Add</a>
	    </div>
       
       
    </div>
</div>

<div class="notification">
    <?php if ($this->session->flashdata('message') != '') { ?>
        <div class="success_list">
            <?= $this->session->flashdata('message'); ?>
        </div>
    <?php } ?>
    <?php if ($this->session->flashdata('error') != '') { ?>
        <div class="error_list">
            <?= $this->session->flashdata('error'); ?>
        </div>
    <?php } ?>
</div>

<div class="table-responsive">
    <form action="<?= site_url('Document_List/delete_bulk_document'); ?>" method="post" id="delete_pt_frm">
    <input type="hidden" name='<?= $this->security->get_csrf_token_name(); ?>' value='<?= $this->security->get_csrf_hash(); ?>'>
        <table class="table table-striped no-footer" id="reagent_cons" style="width: 100%;">
            <thead>        
                <tr>
                    <th>Reagent  or Consumable Name</th>
                    <th>Date Received</th>
                    <th>Received By</th>
                    <th>Batch Number</th>
                    <th>Expiry Date</th>
                    <th>Date In use</th>
                    <th>Completed Date</th>
                    <th>Quality Control by whom</th>
                    <th>Date of Quality Control</th>
                    <th>Pass/Fail</th>
                    <th>Owner</th>
                    <th>Actions</th>
                </tr>
				 </thead>
				 <tbody>
                    <?php
                        
                        foreach ($reagent_consumable_register as $key => $value) {
                            $id = $value['id'];
                            $delete_url = site_url('Document_List/delete_forms/')."?id=$id&action=reagent_consumable_register&redirect=reagent_consumable_register";
                            $username = $this->Userextramodel->getuserName($value['owner']);
                            $output = "<tr>";
                            $output.= "<td>".$value['reagent_name']."</td>";
                            $output.= "<td>".$value['date_received']."</td>";
                            $output.= "<td>".$value['received_by']."</td>";
                            $output.= "<td>".$value['batch_number']."</td>";
                            $output.= "<td>".$value['expiry_date']."</td>";
                            $output.= "<td>".$value['date_in_use']."</td>";
                            $output.= "<td>".$value['completed_date']."</td>";
                            $output.= "<td>".$value['quality_control_whom']."</td>";
                            $output.= "<td>".$value['quality_control_date']."</td>";
                            $output.= "<td>".$value['pass_fail']."</td>";
                            $output.= "<td>".$username->first_name.'  '.$username->last_name."</td>";
                            $output.= "<td><a href=".site_url('Document_List/add_reagent_consumable_register/')."$id><i class='fa fa-pencil m-r-5'></i>  </a><a href=".$delete_url."><i class='fa fa-trash-o m-r-5'></i></a></td>";
                            $output.= "</tr>";
                            echo $output;
                        }
                    ?>
			                
            </tbody>
        </table> 
    </form>     

                    
        
    
</div>

<script>
    $(document).ready( function () {
      $('#reagent_cons').DataTable();
  } );
</script>