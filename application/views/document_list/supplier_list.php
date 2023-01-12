<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
 
.table-responsive {
	overflow-x: hidden;	
}

</style>
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Supplier List</h3>
            <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('Document_List/forms') ?>">Forms</a></li>
                
            </ul>
        </div>
		
		<div class="col-auto float-right ml-auto">
		    <a href="<?php echo base_url('Document_List/add_supplier_list'); ?>" class="btn add-btn"><i class="fa fa-plus"></i>  Add</a>
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
        <table class="table table-striped no-footer" id="supplier_list" style="width: 100%;">
            <thead>        
                <tr>
					<th>Supplier</th>
                    <th>Contact Name</th>
                    <th>Contact Number</th>
                    <th>Contact Email</th>
                    <th>Products Supplied</th>
                    <th>Action</th>
                </tr>
				 </thead>
				 <tbody>
                    <?php

                        foreach ($supplier_list as $key => $value) {
                            $id = $value['id'];
                            $delete_url = site_url('Document_List/delete_forms/')."?id=$id&action=supplier_list&redirect=supplier_list";
                            $username = $this->Userextramodel->getuserName($value['supplier']);
                            $output = "<tr>";
                            $output.= "<td>".$username->first_name.'  '.$username->last_name."</td>";
                            $output.= "<td>".$value['contact_name']."</td>";
                            $output.= "<td>".$value['contact_number']."</td>";
                            $output.= "<td>".$value['contact_email']."</td>";
                            $output.= "<td>".$value['product_supplied']."</td>";
                            $output.= "<td><a href=".site_url('Document_List/add_supplier_list/')."$id><i class='fa fa-pencil m-r-5'></i>  </a><a href=".$delete_url."><i class='fa fa-trash-o m-r-5'></i></a></td>";
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
      $('#supplier_list').DataTable();
  } );
</script>