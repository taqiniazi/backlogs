<?php
$userinfo = getLoggedInUserProfile(intval($this->ion_auth->user()->row()->id));
$img =  base_url($userinfo[0]->profile_picture_path);
$yearData = json_decode($data['log_data'], true);

$currentMonth = date('F');

?>
<div id="frame">
    <input type="radio" name="frame" id="frame1" checked />
    <input type="radio" name="frame" id="frame2" />
    <input type="radio" name="frame" id="frame3" />

    <div id="slides">
        <div id="overflow">
            <div class="inner">
                <div class="frame frame_1">
                    <div class="frame-content">
                        <table>
                            <tbody>
                                <tr>
                                    <td width="20%">

                                        <div class="strong_text">
                                            <strong> Distilled Water</strong>

                                            <strong>Ethanol</strong>

                                            <strong> Xylene</strong>

                                            <strong>Acid Alcohol</strong>

                                        </div>
                                    </td>

                                    <?php
                                    $months = array('jan' => 'JANUARY', 'feb' => 'FEBRUARY', 'mar' => 'MARCH', 'apr' => 'APRIL');

                                    foreach ($months as $key => $value) :
                                        if (empty($yearData[$key . '1'])) $_1 = 'style=display:none;';
                                        else $_1 = '';
                                        if (empty($yearData[$key . '2'])) $_2 = 'style=display:none;';
                                        else $_2 = '';
                                        if (empty($yearData[$key . '3'])) $_3 = 'style=display:none;';
                                        else $_3 = '';
                                        if (empty($yearData[$key . '4'])) $_4 = 'style=display:none;';
                                        else $_4 = '';
                                    ?>

                                        <td <?= (strtoupper($currentMonth) == $value ? 'sadas' : '') ?>>
                                            <a href="javascript:;" data-toggle="modal" data-target="#add_data_checklist"><?= $value ?></a>
                                            <div class="month-box">
                                                <input type="text" value="<?= $yearData[$key . '1'] ?>" name="<?= $key ?>1" class="timesheet_input" placeholder="">
                                                <img class="avatar" title="<?php print $userinfo[0]->first_name; ?> <?php print $userinfo[0]->last_name; ?>" src="<?= $img; ?>" <?= $_1 ?>>
                                                <div class="tooltip1">
                                                    <img class="icon-cricle update_time_stainer" style="cursor:pointer" alt="Click To Submit" title="Click To Submit" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                                                    <!--<span class="tooltiptext1">Click Here</span>-->
                                                </div>
                                            </div>
                                            <div class="month-box"> <input type="text" value="<?= $yearData[$key . '2'] ?>" name="<?= $key ?>2" class="timesheet_input" placeholder="">
                                                <img class="avatar" title="<?php print $userinfo[0]->first_name; ?> <?php print $userinfo[0]->last_name; ?>" src="<?= $img; ?>" <?= $_2 ?>>
                                                <div class="tooltip1">
                                                    <img class="icon-cricle update_time_stainer" style="cursor:pointer" alt="Click To Submit" title="Click To Submit" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                                                    <!--<span class="tooltiptext1">Click Here</span>-->
                                                </div>
                                            </div>
                                            <div class="month-box"> <input type="text" value="<?= $yearData[$key . '3'] ?>" name="<?= $key ?>3" class="timesheet_input" placeholder="">
                                                <img class="avatar" title="<?php print $userinfo[0]->first_name; ?> <?php print $userinfo[0]->last_name; ?>" src="<?= $img; ?>" <?= $_3 ?>>
                                                <div class="tooltip1">

                                                    <img class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>"><span class="tooltiptext1">Click Here</span>
                                                </div>
                                            </div>
                                            <div class="month-box"> <input type="text" value="<?= $yearData[$key . '4'] ?>" name="<?= $key ?>4" class="timesheet_input" placeholder="">
                                                <img class="avatar" title="<?php print $userinfo[0]->first_name; ?> <?php print $userinfo[0]->last_name; ?>" src="<?= $img; ?>" <?= $_4 ?>>
                                                <div class="tooltip1">
                                                    <img class="icon-cricle update_time_stainer" style="cursor:pointer" alt="Click To Submit" title="Click To Submit" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                                                    <!--<span class="tooltiptext1">Click Here</span>-->
                                                </div>
                                            </div>
                                        </td>
                                    <?php endforeach; ?>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="frame frame_2">
                    <div class="frame-content">
                        <table>
                            <tbody>
                                <tr>
                                    <td width="20%">

                                        <div class="strong_text">
                                            <strong> Distilled Water</strong>

                                            <strong>Ethanol</strong>

                                            <strong> Xylene</strong>

                                            <strong>Acid Alcohol</strong>

                                        </div>
                                    </td>

                                    <?php
                                    $months = array('may' => 'MAY', 'jun' => 'JUNE', 'jul' => 'JULY', 'aug' => 'AUGUST');
                                    foreach ($months as $key => $value) :
                                        if (empty($yearData[$key . '1'])) $_1 = 'style=display:none;';
                                        else $_1 = '';
                                        if (empty($yearData[$key . '2'])) $_2 = 'style=display:none;';
                                        else $_2 = '';
                                        if (empty($yearData[$key . '3'])) $_3 = 'style=display:none;';
                                        else $_3 = '';
                                        if (empty($yearData[$key . '4'])) $_4 = 'style=display:none;';
                                        else $_4 = '';
                                    ?>

                                        <td <?= (strtoupper($currentMonth) == $value ? 'sadas' : '') ?>>
                                            <a href="javascript:;" data-toggle="modal" data-target="#add_data_checklist"><?= $value ?></a>
                                            <div class="month-box"> <input type="text" value="<?= $yearData[$key . '1'] ?>" name="<?= $key ?>1" class="timesheet_input" placeholder="Warm Water flush of embedding centre">
                                                <img class="avatar" src="<?= $img; ?>" <?= $_1 ?>>
                                                <div class="tooltip1">
                                                    <img class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                                                    <span class="tooltiptext1">Click Here</span>
                                                </div>
                                            </div>
                                            <div class="month-box"> <input type="text" value="<?= $yearData[$key . '2'] ?>" name="<?= $key ?>2" class="timesheet_input" placeholder="Clean and refill wax of embedding centre">
                                                <img class="avatar" src="<?= $img; ?>" <?= $_2 ?>>
                                                <div class="tooltip1">
                                                    <img class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                                                    <span class="tooltiptext1">Click Here</span>
                                                </div>
                                            </div>
                                            <div class="month-box"> <input type="text" value="<?= $yearData[$key . '3'] ?>" name="<?= $key ?>3" class="timesheet_input" placeholder="Clean all stain buckets on stainer">
                                                <img class="avatar" src="<?= $img; ?>" <?= $_3 ?>>
                                                <div class="tooltip1">
                                                    <img class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                                                    <span class="tooltiptext1">Click Here</span>
                                                </div>
                                            </div>
                                            <div class="month-box"> <input type="text" value="<?= $yearData[$key . '4'] ?>" name="<?= $key ?>4" class="timesheet_input" placeholder="Clean all reagent bottles on tissue processor">
                                                <img class="avatar" src="<?= $img; ?>" <?= $_4 ?>>
                                                <div class="tooltip1">
                                                    <img class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                                                    <span class="tooltiptext1">Click Here</span>
                                                </div>
                                            </div>
                                        </td>

                                    <?php endforeach;
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="frame frame_3">
                    <div class="frame-content">
                        <table>
                            <tbody>
                                <tr>
                                    <td width="20%">
                                        <div class="strong_text">

                                            <strong> Distilled Water</strong>

                                            <strong>Ethanol</strong>

                                            <strong> Xylene</strong>

                                            <strong>Acid Alcohol</strong>

                                        </div>
                                    </td>

                                    <?php
                                    $months = array('sep' => 'SEPTEMBER', 'oct' => 'OCTOBER', 'nov' => 'NOVEMBER', 'dec' => 'DECEMBER');

                                    foreach ($months as $key => $value) :
                                        if (empty($yearData[$key . '1'])) $_1 = 'style=display:none;';
                                        else $_1 = '';
                                        if (empty($yearData[$key . '2'])) $_2 = 'style=display:none;';
                                        else $_2 = '';
                                        if (empty($yearData[$key . '3'])) $_3 = 'style=display:none;';
                                        else $_3 = '';
                                        if (empty($yearData[$key . '4'])) $_4 = 'style=display:none;';
                                        else $_4 = '';
                                    ?>

                                        <td <?= (strtoupper($currentMonth) == $value ? 'style=background-color:#00c5fb;' : '') ?>>
                                            <a href="javascript:;" data-toggle="modal" data-target="#add_data_checklist"><?= $value ?></a>
                                            <div class="month-box"> <input type="text" value="<?= $yearData[$key . '1'] ?>" name="<?= $key ?>1" class="timesheet_input" placeholder="Warm Water flush of embedding centre">
                                                <img class="avatar" src="<?= $img; ?>" <?= $_1 ?>>
                                                <div class="tooltip1">
                                                    <img class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                                                    <span class="tooltiptext1">Click Here</span>
                                                </div>
                                            </div>
                                            <div class="month-box"> <input type="text" value="<?= $yearData[$key . '2'] ?>" name="<?= $key ?>2" class="timesheet_input" placeholder="Clean and refill wax of embedding centre">
                                                <img class="avatar" src="<?= $img; ?>" <?= $_2 ?>>
                                                <div class="tooltip1">
                                                    <img class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                                                    <span class="tooltiptext1">Click Here</span>
                                                </div>
                                            </div>
                                            <div class="month-box"> <input type="text" value="<?= $yearData[$key . '3'] ?>" name="<?= $key ?>3" class="timesheet_input" placeholder="Clean all stain buckets on stainer">
                                                <img class="avatar" src="<?= $img; ?>" <?= $_3 ?>>
                                                <div class="tooltip1">
                                                    <img class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                                                    <span class="tooltiptext1">Click Here</span>
                                                </div>
                                            </div>
                                            <div class="month-box"> <input type="text" value="<?= $yearData[$key . '4'] ?>" name="<?= $key ?>4" class="timesheet_input" placeholder="Clean all reagent bottles on tissue processor">
                                                <img class="avatar" src="<?= $img; ?>" <?= $_4 ?>>
                                                <div class="tooltip1">
                                                    <img class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                                                    <span class="tooltiptext1">Click Here</span>
                                                </div>
                                            </div>
                                        </td>
                                    <?php endforeach; ?>


                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="controls">
        <label for="frame1"></label>
        <label for="frame2"></label>
        <label for="frame3"></label>
    </div>
    <div id="bullets">
        <label for="frame1"></label>
        <label for="frame2"></label>
        <label for="frame3"></label>
    </div>
</div>