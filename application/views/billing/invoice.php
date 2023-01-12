<style>
td.text-right a.dropdown-item{
	display: inline-block;
	width: auto;
	padding: 0;
}


</style>
<!-- Page Header -->
<div class="page-header">
	<div class="row align-items-center">
		<div class="col">
			<h3 class="page-title">Invoices</h3>
			<ul class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url();?>">Dashboard</a></li>
				<li class="breadcrumb-item active">Invoices</li>
			</ul>
		</div>
		<div class="col-auto float-right ml-auto">
			<a href="<?php echo base_url();?>index.php/billing/create_invoice" class="btn add-btn"><i class="fa fa-plus"></i> Create Invoice</a>
		</div>
	</div>
</div>
<!-- /Page Header -->

<!-- Search Filter -->
<div class="row filter-row">
	<div class="col-sm-6 col-md-3">  
		<div class="form-group form-focus">
			<div class="cal-icon">
				<input class="form-control floating datetimepicker" type="text">
			</div>
			<label class="focus-label">From</label>
		</div>
	</div>
	<div class="col-sm-6 col-md-3">  
		<div class="form-group form-focus">
			<div class="cal-icon">
				<input class="form-control floating datetimepicker" type="text">
			</div>
			<label class="focus-label">To</label>
		</div>
	</div>
	<div class="col-sm-6 col-md-3"> 
		<div class="form-group form-focus select-focus">
			<select class="select floating"> 
				<option>Select Status</option>
				<option>Pending</option>
				<option>Paid</option>
				<option>Partially Paid</option>
			</select>
			<label class="focus-label">Status</label>
		</div>
	</div>
	<div class="col-sm-6 col-md-3">  
		<a href="javascript:;" class="btn btn-success btn-block"> Search </a>  
	</div>     
</div>
<!-- /Search Filter -->

<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-striped custom-table mb-0">
				<thead>
					<tr>
						<th>#</th>
						<th>Invoice Number</th>
						<th>Client</th>
						<th>Created Date</th>
						<th>Due Date</th>
						<th>Amount</th>
						<th>Status</th>
						<th class="text-right">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($invoice_data as $key => $value) :
				//$counter = 1;

				 ?>
				
					<tr>
						<td><?php echo $key; ?></td>
						<td><a href="<?php echo base_url();?>index.php/billing/view_invoice">#<?php echo $value['ura_barcode_no']; ?></a></td>
						<td><?php echo $value['first_name'].' '.$value['last_name']; ?></td>
						<td><?php echo $value['date_sent_touralensis'];?></td>
						<td><?php echo $value['date_rec_by_doctor'];?></td>
						<td><?php echo $value['amount']; ?></td>
						<td>
						<?php if ($value['payment_status'] == 1) 
							echo "<span class='badge bg-inverse-success'>Paid</span>";
							else 
							echo "<span class='badge bg-inverse-danger'>Not Paid</span>";

						 ?>
							
						</td>
						<td class="text-right">
							<a class="dropdown-item" href="edit-invoice.html"><i class="fa fa-pencil m-r-5"></i></a>
							<a class="dropdown-item" href="<?php echo base_url();?>index.php/billing/view_invoice"><i class="fa fa-eye m-r-5"></i> </a>
							<a class="dropdown-item" href="javascript:;"><i class="fa fa-file-pdf-o m-r-5"></i> </a>
							<a class="dropdown-item" href="javascript:;"><i class="fa fa-trash-o m-r-5"></i> </a>
							<!-- <div class="dropdown dropdown-action">
								<a href="javascript:;" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="edit-invoice.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
									<a class="dropdown-item" href="<?php echo base_url();?>index.php/billing/view_invoice"><i class="fa fa-eye m-r-5"></i> View</a>
									<a class="dropdown-item" href="javascript:;"><i class="fa fa-file-pdf-o m-r-5"></i> Download</a>
									<a class="dropdown-item" href="javascript:;"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
								</div>
							</div> -->
						</td>
					</tr>
					<?php  endforeach; ?>
					
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- /Page Content -->