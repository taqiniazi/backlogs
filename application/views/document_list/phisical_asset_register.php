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
            <li class="breadcrumb-item"><a href="<?php echo base_url('Document') ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('Document_List') ?>">Document</a></li>
                
            </ul>
        </div>
		
		<div class="col-auto float-right ml-auto">
		    <a href="<?php echo base_url('Document_List/category_section/0'); ?>" class="btn add-btn"><i class="fa fa-plus"></i>  Add</a>
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
        <table class="table table-striped no-footer" id="revision_table_datatable" style="width: 100%;">
            <thead>        
                <tr>
					<th>No</th>
                    <th>ASSET TITLE</th>
                    <th>SERIAL NUMBER</th>
                    <th>Date Received</th>
                    <th>Date Put into Service</th>
                    <th>WARRANTY / PRODUCT REVIEW DATE</th>
                    <th>Date Retired from Service</th>
                    <th>OWNER (PERSON RESPONSIBLE)</th>
                </tr>
				 </thead>
				 <tbody>
                    <?php
                        $arr = array("Leica EG1140H Embedding Centre","Leica EG1140C Cooling Plate","Leica HI1210 Waterbath","Olympus BX43 Microscope","Signature slide printer factory", "Signature cassette printer factory");
                        foreach ($arr as $key => $value) {
                            
                            $output = "<tr>";
                            $output.= "<td>".$value."</td>";
                            $output.= "<td>Insert reference e.g. minutes, audit, email</td>";
                            $output.= "<td>Insert details e.g. agreed improvement or requried corrective action</td>";
                            $output.= "<td>27/7/22</td>";
                            $output.= "<td>23/9/22</td>";
                            $output.= "<td> N/A</td>";
                            $output.= "<td></td>";
                            $output.= "<td>Larissa McLeod </td>";
                            $output.= "</tr>";
                            echo $output;
                        }
                    ?>
			                
            </tbody>
        </table> 
    </form>     

                    
        
    
</div>

