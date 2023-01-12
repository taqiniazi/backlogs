<link rel="canonical" href="https://css-tricks.com/examples/DragAndDropFileUploading/">
<style>
    .container{
        width: 100%;
        text-align: center;
        margin: 0 auto;
    }
    .box {
        font-size: 1.25rem; /* 20 */
        background-color: #c8dadf;
        position: relative;
        padding: 45px 10px;
    }
    
     .box__icon {
        width: 100%;
        height: 80px;
        fill: #92b0b3;
        display: block;
        margin-bottom: 40px;
    }
    
    .box__success {
        -webkit-animation: appear-from-inside .25s ease-in-out;
        animation: appear-from-inside .25s ease-in-out;
    }
    @-webkit-keyframes appear-from-inside
    {
        from	{ -webkit-transform: translateY( -50% ) scale( 0 ); }
        75%		{ -webkit-transform: translateY( -50% ) scale( 1.1 ); }
        to		{ -webkit-transform: translateY( -50% ) scale( 1 ); }
    }
    @keyframes appear-from-inside
    {
        from	{ transform: translateY( -50% ) scale( 0 ); }
        75%		{ transform: translateY( -50% ) scale( 1.1 ); }
        to		{ transform: translateY( -50% ) scale( 1 ); }
    }

    .box__restart
    {
        font-weight: 700;
    }
    .box__restart:focus,
    .box__restart:hover
    {
        color: #39bfd3;
    }

    .js .box__file
    {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }
    .js .box__file + label
    {
        max-width: 80%;
        text-overflow: ellipsis;
        white-space: nowrap;
        cursor: pointer;
        display: inline-block;
        overflow: hidden;
    }
    .js .box__file + label:hover strong,
    .box__file:focus + label strong,
    .box__file.has-focus + label strong
    {
        color: #39bfd3;
    }
    .js .box__file:focus + label,
    .js .box__file.has-focus + label
    {
        outline: 1px dotted #000;
        outline: -webkit-focus-ring-color auto 5px;
    }
    .js .box__file + label *
    {
        /* pointer-events: none; */ /* in case of FastClick lib use */
    }

    .no-js .box__file + label
    {
        display: none;
    }

    .no-js .box__button
    {
        display: block;
    }
    .box__button
    {
        font-weight: 700;
        color: #e5edf1;
        background-color: #39bfd3;
        display: block;
        padding: 8px 16px;
        margin: 40px auto 0;
    }
    .box__button:hover,
    .box__button:focus
    {
        background-color: #0f3c4b;
    }

</style>

<style type="text/css">
	#advance_search_table{display: none;}
	.card-body a{color: #000;}
	
    .dropdown-toggle::after{display: none;}
    .table-hover{
        cursor: pointer;
    }
	.e-avatar{
		width:35px;
		height:35px;
	}
	ul.histo_lab_staus li{
		width: calc(100% / 3);
	}

	.dash-card-content p{
		font-size: 16px;
	}
    td.text-right a.dropdown-item{
        padding: 0;
        display: inline-block;
        width: auto;
    }
</style>
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Network Management</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Dashboard</a></li>
            </ul>
        </div>
       
    </div>
</div>


<div id="upload_request_forms">
    <div class="" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Request Forms</h5>
            </div>
            <div class="modal-body">
                <div class="container" role="main">
                    <form method="post" action="<?= base_url('laboratory/network'); ?>" enctype="multipart/form-data" class="box">
                        <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                        <div class="box__input">
                            <svg class="box__icon" xmlns="http://www.w3.org/2000/svg" width="50" height="43" viewBox="0 0 50 43"><path d="M48.4 26.5c-.9 0-1.7.7-1.7 1.7v11.6h-43.3v-11.6c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v13.2c0 .9.7 1.7 1.7 1.7h46.7c.9 0 1.7-.7 1.7-1.7v-13.2c0-1-.7-1.7-1.7-1.7zm-24.5 6.1c.3.3.8.5 1.2.5.4 0 .9-.2 1.2-.5l10-11.6c.7-.7.7-1.7 0-2.4s-1.7-.7-2.4 0l-7.1 8.3v-25.3c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v25.3l-7.1-8.3c-.7-.7-1.7-.7-2.4 0s-.7 1.7 0 2.4l10 11.6z"/></svg>
                            <input type="file" name="files[]" id="file" class="box__file" multiple required="required">
                            <label for="file"><strong>Choose a file</strong><span class="box__dragndrop"> or drag it here</span>.</label>
                        </div>
                        <button type="submit" class="btn btn-primary submit-btn box__button">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 
<div class="" id="Sops">
    <div class="card card-table flex-fill" style="height: 404px; overflow-y: hide; border: 0;">
        <div class="card-header">
            <h3 class="card-title mb-0">All Uploads</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0">
                    <thead>
                        <tr>
                            <th>File</th>
                            <th>Uploaded By</th>
                            <th>Uploaded On</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($res)) {
                        foreach ($res as $row) {
                           
                                ?>
                                <tr>
                                    <td><?= $row['file_name']; ?></td>
                                    <td><?= $row['user_name']; ?></td>
                                    <td><?= date('d/m/Y H:i:s', strtotime($row['created_at'])); ?></td>
                                </tr>
                            <?php } }  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> -->


<ul class="nav nav-pills mb-3 mt-3" id="pills-tab" role="tablist">
  <li class="nav-item mr-3" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">hl7 Input</button>
  </li>
  <li class="nav-item mr-3" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">hl7 Output</button>
  </li>
  <li class="nav-item mr-3" role="presentation">
    <button class="nav-link" id="pills-contact-tab" data-toggle="pill" data-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">hl7 Imported</button>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
      
<table class="table table-striped custom-table mb-0">
    <thead>
        <tr>
            <th>File Name</th>
            <th>Uploaded Time</th>
        </tr>
    </thead>
    <tbody>
    <?php if (!empty($input)) {
        foreach ($input as $key => $row) { 
           if($key == 0 || $key == 1) continue;
                ?>
                <tr>
                    <td><?= $row; ?></td>
                    <td><?= date("F d Y H:i:s.", filemtime(FCPATH . 'uploads/hl7_input/'.$row)); ?></td>
                </tr>
            <?php } }  ?>
    </tbody>
</table>



  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

  <table class="table table-striped custom-table mb-0">
    <thead>
        <tr>
            <th>File Name</th>
            <th>Uploaded Time</th>
        </tr>
    </thead>
    <tbody>
    <?php if (!empty($output)) {
        foreach ($output as $key => $row) { 
           if($key == 0 || $key == 1) continue;
                ?>
                <tr>
                    <td><?= $row; ?></td>
                    <td><?= date("F d Y H:i:s.", filemtime(FCPATH . 'uploads/hl7_output/'.$row)); ?></td>
                </tr>
            <?php } }  ?>
    </tbody>
</table>

</div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
    <table class="table table-striped custom-table mb-0">
    <thead>
        <tr>
            <th>File Name</th>
            <th>Uploaded Time</th>
        </tr>
    </thead>
    <tbody>
    <?php if (!empty($imported)) {
        foreach ($imported as $key => $row) { 
           if($key == 0 || $key == 1) continue;
                ?>
                <tr>
                    <td><?= $row; ?></td>
                    <td><?= date("F d Y H:i:s.", filemtime(FCPATH . 'uploads/hl7_imported/'.$row)); ?></td>
                </tr>
            <?php } }  ?>
    </tbody>
</table>

</div>
</div>