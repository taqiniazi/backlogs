<style>
    .btn.btn-success {
        width: 150px;
    }
</style>
<div class="content container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Tracking Report</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tracking Report</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- Page Header -->

            <!-- /Page Header -->

            <section class="form-group">
                <div class="card profile-box flex-fill">
                    <div class="card-body">
                        <form method="get" action="<?php echo base_url() . "FilterRequests/lab_record_list/" ?>">
                            <div class="row">
                                <div class="input-group mb-3">
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="labno" value="" required
                                            placeholder="Case Number">
                                    </div>
                                    <div class="input-group-prepend">
                                        <button class="btn btn-success" type="submit">Find Case No</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form method="get" action="<?php echo base_url() . "FilterRequests/lab_record_list/" ?>">
                            <div class="row">
                                <div class="input-group mb-3">
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="nhsno" value="" required
                                            placeholder="NHS Number">
                                    </div>
                                    <div class="input-group-prepend">
                                        <button class="btn btn-success" type="submit">Find NHS No</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form method="get" action="<?php echo base_url() . "FilterRequests/lab_record_list/" ?>">
                            <div class="row">
                                <div class="input-group mb-3">
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="patient" value="" required
                                            placeholder="Patients Name">
                                    </div>
                                    <div class="input-group-prepend">
                                        <button class="btn btn-success" type="submit">Find Patient</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form method="get" action="<?php echo base_url() . "FilterRequests/lab_record_list/" ?>">
                            <div class="row">
                                <div class="input-group mb-3">
                                    <div class="col-md-3">
                                        <select type="text" name="group" id="group-input" required
                                            class="form-control select select2-hidden-accessible"
                                            data-select2-id="group-input" tabindex="-1" aria-hidden="true">
                                            <option value="" required>--Select Clinic--</option>
                                            <?php foreach ($hospital_info as $key => $hospital) { ?>
                                                <option value="<?php echo $hospital['group_id'] ?>">
                                                    <?php echo $hospital['description'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="input-group-prepend">
                                        <button class="btn btn-success" type="submit">Find Hospital</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form method="get" action="<?php echo base_url() . "FilterRequests/lab_record_list/" ?>">
                            <div class="row">
                                <div class="input-group mb-3">
                                    <div class="col-md-3">
                                        <div class="tg-inputwithicon">
                                            <i class="lnr lnr-calendar-full"></i>
                                            <input type="date" name="dob" id="dob" value="" required
                                                class="form-control" placeholder="DOB">
                                        </div>
                                    </div>
                                    <div class="input-group-prepend">
                                        <button class="btn btn-success" type="submit">Find DOB</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form method="get" action="<?php echo base_url() . "FilterRequests/lab_record_list/" ?>">
                            <div class="row">
                                <div class="input-group mb-3">
                                    <div class="col-md-3">
                                        <form class="tg-formtheme tg-searchrecord">
                                            <fieldset>
                                                <div class="form-group tg-inputicon">
                                                    <input type="text" class="form-control typeaheadrequest"
                                                        placeholder="Search Record">
                                                    <i class="lnr lnr-magnifier"></i>
                                                </div>
                                            </fieldset>
                                        </form>
                        </form>
                    </div>
                    <!-- <div class="input-group-prepend">
                                        <button class="btn btn-success" type="submit">Go To Case</button>
                                    </div> -->
                </div>
        </div>
        </form>
    </div>
</div>

</div>
</div>
</section>
</div>
</div>
</div>
<script>
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
</script>