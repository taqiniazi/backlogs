<style>
    .trackBtnWrap {
        display: flex;
        flex-direction: row;
    }

    .trackBtnWrap .trackBtn {
        margin: 10px;
    }


    .containertrack {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 22px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default checkbox */
    .containertrack input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    /* Create a custom checkbox */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #eee;
    }


    /* On mouse-over, add a grey background color */
    .containertrack:hover input~.checkmark {
        background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .containertrack input:checked~.checkmark {
        background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .containertrack input:checked~.checkmark:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .containertrack .checkmark:after {
        left: 9px;
        top: 5px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
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
            <form method="get" action="<?php echo base_url()."TrackingReport/lab_record_list/" ?>">

            <section class="form-group">
                <div class="card profile-box flex-fill">
                    <div class="card-body">
                        <div class="trackBtnWrap">
                            <div class="trackBtn">
                                <label class="containertrack">Published Reports
                                    <input type="radio" checked="checked" name="reportType" value="published">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="trackBtn">
                                <label class="containertrack">Published & UnPublished Reports
                                    <input type="radio" name="reportType" value="all">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <h1>Select Fields</h1>
                                     <div class="col-md-4">
                                    <label class="containertrack">Lab No
                                        <input type="checkbox" name="fields[labNo]" values="labNo" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="containertrack">Clinic
                                        <input type="checkbox" name="fields[clinic]" values="clinic" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="containertrack">Speciality
                                        <input type="checkbox" name="fields[speciality]" values="speciality" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="containertrack">Courier No
                                        <input type="checkbox" name="fields[courierNo]" values="courierNo" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="containertrack">Patient
                                        <input type="checkbox" name="fields[patient]" values="patient" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    </div>
                                     <div class="col-md-4">
                                    <label class="containertrack">DOB
                                        <input type="checkbox" name="fields[dob]" values="dob" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="containertrack">TAT
                                        <input type="checkbox" name="fields[tat]" values="tat" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="containertrack">Pathologist
                                        <input type="checkbox" name="fields[pathologist]" values="pathologist" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="containertrack">Added By
                                        <input type="checkbox" name="fields[addedby]" values="addedby" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="containertrack">Requested Date
                                        <input type="checkbox" name="fields[requestedDate]" values="requestedDate" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="containertrack">Published Date
                                        <input type="checkbox" name="fields[publishedDate]" values="publishedDate" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label><strong>Choose date from</strong></label>
                                <div class="form-group tg-inputwithicon">
                                    <i class="lnr lnr-calendar-full"></i>
                                    <input type="date" name="start" id="dob-start" value="" class="form-control" placeholder="Choose date from">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label><strong>Choose date to</strong></label>
                                <div class="form-group tg-inputwithicon">
                                    <i class="lnr lnr-calendar-full"></i>
                                    <input type="date" name="end" id="dob-end" value="" class="form-control" placeholder="Choose date to">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label><strong>Choose Clinic</strong></label>
                                <div class="form-group tg-inputwithicon">
                                    <select type="text" name="group" id="group-input" value="" class="form-control select select2-hidden-accessible" data-select2-id="group-input" tabindex="-1" aria-hidden="true">
                                        <option value="">--Select Clinic--</option>
                                        <?php foreach ($hospital_info as $key => $hospital) { ?>
                                            <option value="<?php echo $hospital['group_id'] ?>"><?php echo $hospital['description'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 text-center" >
                                <button class="btn btn-success" style="" type="submit">Generate Report</button>
                            </div>
                            <div>

                            </div>
                        </div>

                    </div>
                </div>
            </section>
            </form>
        </div>
    </div>
</div>