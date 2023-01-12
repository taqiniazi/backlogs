<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php

/**
 * Record History
 * @param type $record_history
 */
function record_history($record_history, $userid, $record_add_timestamp, $add_full_name) {
    ob_start();
    ?>
    <div id="rec_history_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Record History</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">


                <div class="" style="display:none;width:100%" id="dv_lab_rec_history">
                    <div class="qr_code_area">
                    <!-- To be worked on future when dynamically generated QR code is displayed -->
                    <div class="image" id="qrcode-container" style="display: none;">
                        <img src="<?php echo base_url() ?>assets/img/qr_big.png" class="img-fluid">
                    </div>
                    <?php
                    if (!empty($userid) && $record_add_timestamp) {
                        ?>
                        <div class="user_add_report_status">Record Added By : <?php echo $add_full_name; ?>, At : <?php echo date('d-m-Y h:i:s A', $record_add_timestamp); ?></div>
                    <?php } ?>
                    <table class="table custom-table" id="record-history-table">
                        <thead>
                        <!-- <tr>
                            <th id="record-history-table-heading" colspan="5" style="font-size: 20px; padding: 10px;">
                            Record History
                            </th>
                        </tr> -->
                        <tr>
                            <th>Ref</th>
                            <th>Date</th>
                            <!-- <th>Time</th> -->
                            <th>Status</th>
                            <th>User ID</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    </div>
                </div>

                    
                    <?php if (!empty($record_history)) { ?>
                        <?php
                        $counter = 1;
                        foreach ($record_history as $history) 
						{
                            $change_class = 'style="background: #666699; padding: 7px; color: #fff; font-size: 15px; font-weight: bold; margin: 0 0 10px 0;"';
                            if ($history['rec_history_status'] === 'view') {
                                $change_class = 'style="background: #009999; padding: 7px; color: #fff; font-size: 15px; font-weight: bold; margin: 0 0 10px 0;"';
                            } elseif ($history['rec_history_status'] === 'publish') {
                                $change_class = 'style="background: #70db70; padding: 7px; color: #fff; font-size: 15px; font-weight: bold; margin: 0 0 10px 0;"';
                            } elseif ($history['rec_history_status'] === 'fw_add') {
                                $change_class = 'style="background: #e67300; padding: 7px; color: #fff; font-size: 15px; font-weight: bold; margin: 0 0 10px 0;"';
                            } elseif ($history['rec_history_status'] === 'supple_add') {
                                $change_class = 'style="background: #cc00cc; padding: 7px; color: #fff; font-size: 15px; font-weight: bold; margin: 0 0 10px 0;"';
                            } elseif ($history['rec_history_status'] === 'supple_publish') {
                                $change_class = 'style="background: #ccccff; padding: 7px; color: #fff; font-size: 15px; font-weight: bold; margin: 0 0 10px 0;"';
                            } elseif ($history['rec_history_status'] === 'unpublish') {
                                $change_class = 'style="background: #999966; padding: 7px; color: #fff; font-size: 15px; font-weight: bold; margin: 0 0 10px 0;"';
                            }
                            ?>
                            
                            <?php
                            $counter++;
                        }
                        ?>
                    <?php } else { ?>
                        <!--<div class="bg-warning" style="padding: 7px;">Sorry no history recorded yet.</div>-->
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <?php
    echo ob_get_clean();
}
?>