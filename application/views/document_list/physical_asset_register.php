<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
 
.table-responsive {
	overflow-x: hidden;	
}

</style>
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Physical Asset Register</h3>
            <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('Document_List/forms') ?>">Forms</a></li>
                
            </ul>
        </div>
		
		<div class="col-auto float-right ml-auto">
		    <a href="<?php echo base_url('Document_List/add_physical_asset_register'); ?>" class="btn add-btn"><i class="fa fa-plus"></i>  Add</a>
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
        <table class="table table-striped no-footer" id="physical_asset" style="width: 100%;">
            <thead>        
                <tr>
                    <th>ASSET TITLE</th>
                    <th>SERIAL NUMBER</th>
                    <th>Date Received</th>
                    <th>Date Put into Service</th>
                    <th>WARRANTY / PRODUCT REVIEW DATE</th>
                    <th>Date Retired from Service</th>
                    <th>OWNER (PERSON RESPONSIBLE)</th>
                    <th>Action</th>
                </tr>
				 </thead>
				 <tbody>
                    <?php
                       
                        foreach ($physical_asset_register as $key => $value) {
                            $id = $value['id'];
                            $delete_url = site_url('Document_List/delete_forms/')."?id=$id&action=physical_asset_register&redirect=physical_asset_register";
                            // Get username
                            $username = $this->Userextramodel->getuserName($value['owner']);
                            $output = "<tr>";
                            $output.= "<td>".$value['asset_title']."</td>";
                            $output.= "<td>".$value['serial_number']."</td>";
                            $output.= "<td>".$value['date_received']."</td>";
                            $output.= "<td>".$value['date_into_service']."</td>";
                            $output.= "<td>".$value['warranty']."</td>";
                            $output.= "<td>".$value['date_retire_service']."</td>";
                            $output.= "<td>".$username->first_name.'  '.$username->last_name."</td>";
                            $output.= "<td><a href=".site_url('Document_List/add_physical_asset_register/')."$id><i class='fa fa-pencil m-r-5'></i>  </a><a href=".$delete_url."><i class='fa fa-trash-o m-r-5'></i></a></td>";
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
      $('#physical_asset').DataTable();
  } );
</script>