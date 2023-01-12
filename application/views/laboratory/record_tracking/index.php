<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="tg-trackrecords">
    <div class="row">
        <form class="form specimen_tracking_form">
            <div class="col-md-4 col-md-offset-4 specimen_track_search">
                <h3 class="text-center">Specimen Tracking</h3>
                <input class="form-control" type="text" name="barcode_no" placeholder="Tracking No.">
                <div class="row">
                    <div class="col-md-6">
                        <hr>
                        <input class="form-control" type="text" name="tracking_no_ul" placeholder="Tracking No. (UL Number)">
                    </div>
                    <div class="col-md-6">
                        <hr>
                        <input class="form-control" type="text" name="tracking_no_lab" placeholder="Tracking No. (Lab Number)">
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr>
            <div class="col-md-4">
                <div class="book_in_from_clinic text-center"></div>
            </div>
            <div class="col-md-4">
                <div class="book_out_to_lab_primary_release text-center"></div>
            </div>
            <div class="col-md-4">
                <div class="book_out_to_lab_fw_completed text-center"></div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
                <div class="find_barcode_result"></div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12 load-track-record-data"></div>
</div>