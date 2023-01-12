<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
 
.table-responsive {
	overflow-x: hidden;	
}

#temperature_logbook tbody td label {
    width: 90px;
    margin: 0 5px;
    display: inline-block;
}
.box-setup .col-xl-3 {
        max-width: 20%;
        flex: 0 0 20%;
    }
</style>



<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Customer Feedback</h3>
            <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('Document_List/forms') ?>">&nbsp;&nbsp;&nbsp;&nbsp;Dashboard / Customer Feedback</a></li>                 
            </ul>
        </div>
		
		<div class="col-auto float-right ml-auto">
		    <a href="<?php echo base_url('Document_List/add_improvment_corrective_action_register'); ?>" class="btn add-btn"><i class="fa fa-plus"></i>  Add</a>&nbsp;&nbsp;&nbsp;
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

<div class="table-responsive content container-fluid">
    <form action="<?= site_url('Document_List/delete_bulk_document'); ?>" method="post" id="delete_pt_frm">
    <input type="hidden" name='<?= $this->security->get_csrf_token_name(); ?>' value='<?= $this->security->get_csrf_hash(); ?>'>
        <table class="table table-striped no-footer" id="improvment_corrective" style="width: 100%;">
            <thead>        
                <tr>
					<th>Source</th>
                    <th>Ref.</th>
                    <th>Risk</th>
                    <th>Proposed Date</th>
                    <th>Implementation Date</th>
                    <th>Impact</th>
                    <th>Corrective Action</th>
                    <th>Action</th>
                </tr>
				 </thead>
				 <tbody>
                    <?php
                        foreach ($corrective_actions as $key => $value) {
                            $id = $value['id'];

                            // For status
                            if($value['status'] == 'active') $active = 'selected';
                            elseif($value['status'] == 'inactive') $inActive = 'selected';
                            else {
                                $active = '';
                                $inActive = '';
                            }
                            $status = "<select data-id=$id class='form-control change_status' style='width:auto'><option value='active' $active>Active</option><option value='inactive' $inActive>InActive</option></select>";
                            
                            $delete_url = site_url('Document_List/delete_forms/')."?id=$id&action=corrective_actions&redirect=improvment_corrective_action_register";
                            $username = $this->Userextramodel->getuserName($value['action_owner']);
                            $output = "<tr>";
                            $output.= "<td>".$value['nonconformity']."</td>";
                            $output.= "<td>".$value['reference']."</td>";
                            $output.= "<td>".$value['risk']."</td>";
                            // $output.= "<td>".$username->first_name.'  '.$username->last_name."</td>";
                            $output.= "<td>".$value['proposed_date']."</td>";
                            $output.= "<td>".$value['implementation_date']."</td>";
                            $output.= "<td>".$value['impact']."</td>";
                            $output.= "<td>".$value['corrective_action']."</td>";
                            $output.= "<td><a href=".site_url('Document_List/add_improvment_corrective_action_register/')."$id><i class='fa fa-pencil m-r-5'></i>  </a><a href=".$delete_url."><i class='fa fa-trash-o m-r-5'></i></a></td>";
                            $output.= "</tr>";
                            echo $output;
                        }
                    ?>
			                
            </tbody>
        </table> 
    </form>     

                    
        
    
</div>

<script>
    $('.change_status').on('change', function() {
        var status = this.value;
        var id = $(this).data('id');
        
        $.post( site_url+'Document_List/update_form_status', { status: status, id: id, table: 'corrective_actions', 'csrf_token': $('input[name="csrf_token"]').val() } );
    });

    $(document).ready( function () {
      $('#improvment_corrective').DataTable();
  } );
</script>