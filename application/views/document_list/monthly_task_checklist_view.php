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
                                            <strong> Warm Water flush of embedding centre</strong>

                                            <strong> Clean and refill wax of embedding centre</strong>

                                            <strong> Clean all stain buckets on stainer</strong>

                                            <strong>Clean all reagent bottles on tissue processor</strong>

                                        </div>
                                    </td>

                                    <?php
                                    $months = array('jan' => 'JANUARY', 'feb' => 'FEBRUARY', 'mar' => 'MARCH', 'apr' => 'APRIL');

                                    foreach ($months as $key => $value) :
                                        if (empty($yearData[$key . '1'])){
                                            $_1 = 'style=display:none;';
                                            $img1 = $img;
                                            $uname1 = $userinfo[0]->first_name." ".$userinfo[0]->last_name;
                                        } else{
                                            $_1 = '';
                                            $logInfo = explode("U-", $yearData[$key . '1']);
                                            if(count($logInfo) > 1){
                                                $userinfo = getLoggedInUserProfile(intval($logInfo[1]));
                                                $img1 =  base_url($userinfo[0]->profile_picture_path);
                                                $uname1 = $userinfo[0]->first_name." ".$userinfo[0]->last_name;
                                            }
                                        }
                                        if (empty($yearData[$key . '2'])) {
                                            $_2 = 'style=display:none;';
                                            $img2 = $img;
                                            $uname2 = $userinfo[0]->first_name." ".$userinfo[0]->last_name;
                                        }else {
                                            $_2 = '';
                                            $logInfo = explode("U-", $yearData[$key . '2']);
                                            if(count($logInfo) > 1){
                                                $userinfo = getLoggedInUserProfile(intval($logInfo[1]));
                                                $img2 =  base_url($userinfo[0]->profile_picture_path);
                                                $uname2 = $userinfo[0]->first_name." ".$userinfo[0]->last_name;
                                            }
                                        }   
                                        if (empty($yearData[$key . '3'])){
                                            $_3 = 'style=display:none;';
                                            $img3 = $img;
                                            $uname3 = $userinfo[0]->first_name." ".$userinfo[0]->last_name;
                                        } else{
                                            $_3 = '';
                                            $logInfo = explode("U-", $yearData[$key . '3']);
                                            if(count($logInfo) > 1){
                                                $userinfo = getLoggedInUserProfile(intval($logInfo[1]));
                                                $img3 =  base_url($userinfo[0]->profile_picture_path);
                                                $uname3 = $userinfo[0]->first_name." ".$userinfo[0]->last_name;
                                            }
                                        }
                                        if (empty($yearData[$key . '4'])) {
                                            $_4 = 'style=display:none;';
                                            $img4 = $img;
                                            $uname4 = $userinfo[0]->first_name." ".$userinfo[0]->last_name;
                                        }else{
                                            // echo $yearData[$key . '4'];exit;
                                            $_4 = '';
                                            $logInfo = explode("U-", $yearData[$key . '4']);
                                            if(count($logInfo) > 1){
                                                $userinfo = getLoggedInUserProfile(intval($logInfo[1]));
                                                $img4 =  base_url($userinfo[0]->profile_picture_path);
                                                $uname4 = $userinfo[0]->first_name." ".$userinfo[0]->last_name;
                                            }
                                        }
                                        
                                    ?>

                                        <td <?= (strtoupper($currentMonth) == $value ? 'sadas' : '') ?>>
                                            <a href="javascript:;" data-toggle="modal" data-target="#add_data_checklist"><?= $value ?></a>
                                            <div class="month-box">
                                                <input readonly="readonly" type="text" value="<?= explode("U-",$yearData[$key . '1'])[0] ?>"  class="dis-timesheet_input">
                                                <input readonly="readonly" type="hidden" value="<?= $yearData[$key . '1'] ?>" name="<?= $key ?>1" class="timesheet_input">
                                                <img title="<?php print $uname1; ?>" class="avatar" src="<?= $img1; ?>" <?= $_1 ?>>
                                                <div class="tooltip1">
                                                    <img title="Click To Submit" style="cursor:pointer" class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                                                    <!--<span class="tooltiptext1">Click Here</span>-->
                                                </div>
                                            </div>
                                            <div class="month-box"> 
                                                <input readonly="readonly" type="text" value="<?= explode("U-",$yearData[$key . '2'])[0] ?>"  class="dis-timesheet_input">
                                                <input readonly="readonly" type="hidden" value="<?= $yearData[$key . '2'] ?>" name="<?= $key ?>2" class="timesheet_input">
                                                <img title="<?php print $uname2; ?>" class="avatar" src="<?= $img2; ?>" <?= $_2 ?>>
                                                <div class="tooltip1">
                                                    <img title="Click To Submit" style="cursor:pointer" class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                                                    <!--<span class="tooltiptext1">Click Here</span>-->
                                                </div>
                                            </div>
                                            <div class="month-box"> 
                                                <input readonly="readonly" type="text" value="<?= explode("U-",$yearData[$key . '3'])[0] ?>"  class="dis-timesheet_input">
                                                <input readonly="readonly" type="hidden" value="<?= $yearData[$key . '3'] ?>" name="<?= $key ?>3" class="timesheet_input">
                                                <img title="<?php print $uname3; ?>" class="avatar" src="<?= $img3; ?>" <?= $_3 ?>>
                                                <div class="tooltip1">

                                                    <img title="Click To Submit" style="cursor:pointer" class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                                                    <!--<span class="tooltiptext1">Click Here</span>-->
                                                </div>
                                            </div>
                                            <div class="month-box"> 
                                                <input readonly="readonly" type="text" value="<?= explode("U-",$yearData[$key . '4'])[0] ?>" class="dis-timesheet_input">
                                                <input readonly="readonly" type="hidden" value="<?= $yearData[$key . '4'] ?>" name="<?= $key ?>4" class="timesheet_input">
                                                <img title="<?php print $uname4; ?>" class="avatar" src="<?= $img4; ?>" <?= $_4 ?>>
                                                <div class="tooltip1">
                                                    <img title="Click To Submit" style="cursor:pointer" class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
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
                                            <strong> Warm Water flush of embedding centre</strong>

                                            <strong> Clean and refill wax of embedding centre</strong>

                                            <strong> Clean all stain buckets on stainer</strong>

                                            <strong>Clean all reagent bottles on tissue processor</strong>

                                        </div>
                                    </td>

                                    <?php
                                    $months = array('may' => 'MAY', 'jun' => 'JUNE', 'jul' => 'JULY', 'aug' => 'AUGUST');
                                    foreach ($months as $key => $value) :
                                        if (empty($yearData[$key . '1'])){
                                            $_1 = 'style=display:none;';
                                            $img1 = $img;
                                            $uname1 = $userinfo[0]->first_name." ".$userinfo[0]->last_name;
                                        } else{
                                            $_1 = '';
                                            $logInfo = explode("U-", $yearData[$key . '1']);
                                            if(count($logInfo) > 1){
                                                $userinfo = getLoggedInUserProfile(intval($logInfo[1]));
                                                $img1 =  base_url($userinfo[0]->profile_picture_path);
                                                $uname1 = $userinfo[0]->first_name." ".$userinfo[0]->last_name;
                                            }
                                        }
                                        if (empty($yearData[$key . '2'])) {
                                            $_2 = 'style=display:none;';
                                            $img2 = $img;
                                            $uname2 = $userinfo[0]->first_name." ".$userinfo[0]->last_name;
                                        }else {
                                            $_2 = '';
                                            $logInfo = explode("U-", $yearData[$key . '2']);
                                            if(count($logInfo) > 1){
                                                $userinfo = getLoggedInUserProfile(intval($logInfo[1]));
                                                $img2 =  base_url($userinfo[0]->profile_picture_path);
                                                $uname2 = $userinfo[0]->first_name." ".$userinfo[0]->last_name;
                                            }
                                        }   
                                        if (empty($yearData[$key . '3'])){
                                            $_3 = 'style=display:none;';
                                            $img3 = $img;
                                            $uname3 = $userinfo[0]->first_name." ".$userinfo[0]->last_name;
                                        } else{
                                            $_3 = '';
                                            $logInfo = explode("U-", $yearData[$key . '3']);
                                            if(count($logInfo) > 1){
                                                $userinfo = getLoggedInUserProfile(intval($logInfo[1]));
                                                $img3 =  base_url($userinfo[0]->profile_picture_path);
                                                $uname3 = $userinfo[0]->first_name." ".$userinfo[0]->last_name;
                                            }
                                        }
                                        if (empty($yearData[$key . '4'])) {
                                            $_4 = 'style=display:none;';
                                            $img4 = $img;
                                            $uname4 = $userinfo[0]->first_name." ".$userinfo[0]->last_name;
                                        }else{
                                            // echo $yearData[$key . '4'];exit;
                                            $_4 = '';
                                            $logInfo = explode("U-", $yearData[$key . '4']);
                                            if(count($logInfo) > 1){
                                                $userinfo = getLoggedInUserProfile(intval($logInfo[1]));
                                                $img4 =  base_url($userinfo[0]->profile_picture_path);
                                                $uname4 = $userinfo[0]->first_name." ".$userinfo[0]->last_name;
                                            }
                                        }
                                    ?>

                                        <td <?= (strtoupper($currentMonth) == $value ? 'sadas' : '') ?>>
                                            <a href="javascript:;" data-toggle="modal" data-target="#add_data_checklist"><?= $value ?></a>
                                            <div class="month-box"> 
                                                <input readonly="readonly" type="text" value="<?= explode("U-",$yearData[$key . '1'])[0] ?>" class="dis-timesheet_input">
                                                <input readonly="readonly" type="hidden" value="<?= $yearData[$key . '1'] ?>" name="<?= $key ?>1" class="timesheet_input">
                                                <img title="<?php print $uname1; ?>" class="avatar" src="<?= $img1?>" <?= $_1 ?>>
                                                <div class="tooltip1">
                                                    <img class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                                                    <span class="tooltiptext1">Click Here</span>
                                                </div>
                                            </div>
                                            <div class="month-box"> 
                                                <input readonly="readonly" type="text" value="<?= explode("U-",$yearData[$key . '2'])[0] ?>" class="dis-timesheet_input">
                                                <input readonly="readonly" type="hidden" value="<?= $yearData[$key . '2'] ?>" name="<?= $key ?>2" class="timesheet_input">
                                                <img title="<?php print $uname2; ?>" class="avatar" src="<?= $img2; ?>" <?= $_2 ?>>
                                                <div class="tooltip1">
                                                    <img class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                                                    <span class="tooltiptext1">Click Here</span>
                                                </div>
                                            </div>
                                            <div class="month-box"> 
                                                <input readonly="readonly" type="text" value="<?= explode("U-",$yearData[$key . '3'])[0] ?>" class="dis-timesheet_input">
                                                <input readonly="readonly" type="hidden" value="<?= $yearData[$key . '3'] ?>" name="<?= $key ?>3" class="timesheet_input">
                                                <img title="<?php print $uname3; ?>" class="avatar" src="<?= $img3; ?>" <?= $_3 ?>>
                                                <div class="tooltip1">
                                                    <img class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                                                    <span class="tooltiptext1">Click Here</span>
                                                </div>
                                            </div>
                                            <div class="month-box"> 
                                                <input readonly="readonly" type="text" value="<?= explode("U-",$yearData[$key . '4'])[0] ?>" class="dis-timesheet_input">
                                                <input readonly="readonly" type="hidden" value="<?= $yearData[$key . '4'] ?>" name="<?= $key ?>4" class="timesheet_input">
                                                <img title="<?php print $uname4; ?>" class="avatar" src="<?= $img4; ?>" <?= $_4 ?>>
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

                                            <strong> Warm Water flush of embedding centre</strong>

                                            <strong> Clean and refill wax of embedding centre</strong>

                                            <strong> Clean all stain buckets on stainer</strong>

                                            <strong>Clean all reagent bottles on tissue processor</strong>

                                        </div>
                                    </td>

                                    <?php
                                    $months = array('sep' => 'SEPTEMBER', 'oct' => 'OCTOBER', 'nov' => 'NOVEMBER', 'dec' => 'DECEMBER');

                                    foreach ($months as $key => $value) :
                                        if (empty($yearData[$key . '1'])){
                                            $_1 = 'style=display:none;';
                                            $img1 = $img;
                                            $uname1 = $userinfo[0]->first_name." ".$userinfo[0]->last_name;
                                        } else{
                                            $_1 = '';
                                            $logInfo = explode("U-", $yearData[$key . '1']);
                                            if(count($logInfo) > 1){
                                                $userinfo = getLoggedInUserProfile(intval($logInfo[1]));
                                                $img1 =  base_url($userinfo[0]->profile_picture_path);
                                                $uname1 = $userinfo[0]->first_name." ".$userinfo[0]->last_name;
                                            }
                                        }
                                        if (empty($yearData[$key . '2'])) {
                                            $_2 = 'style=display:none;';
                                            $img2 = $img;
                                            $uname2 = $userinfo[0]->first_name." ".$userinfo[0]->last_name;
                                        }else {
                                            $_2 = '';
                                            $logInfo = explode("U-", $yearData[$key . '2']);
                                            if(count($logInfo) > 1){
                                                $userinfo = getLoggedInUserProfile(intval($logInfo[1]));
                                                $img2 =  base_url($userinfo[0]->profile_picture_path);
                                                $uname2 = $userinfo[0]->first_name." ".$userinfo[0]->last_name;
                                            }
                                        }   
                                        if (empty($yearData[$key . '3'])){
                                            $_3 = 'style=display:none;';
                                            $img3 = $img;
                                            $uname3 = $userinfo[0]->first_name." ".$userinfo[0]->last_name;
                                        } else{
                                            $_3 = '';
                                            $logInfo = explode("U-", $yearData[$key . '3']);
                                            if(count($logInfo) > 1){
                                                $userinfo = getLoggedInUserProfile(intval($logInfo[1]));
                                                $img3 =  base_url($userinfo[0]->profile_picture_path);
                                                $uname3 = $userinfo[0]->first_name." ".$userinfo[0]->last_name;
                                            }
                                        }
                                        if (empty($yearData[$key . '4'])) {
                                            $_4 = 'style=display:none;';
                                            $img4 = $img;
                                            $uname4 = $userinfo[0]->first_name." ".$userinfo[0]->last_name;
                                        }else{
                                            // echo $yearData[$key . '4'];exit;
                                            $_4 = '';
                                            $logInfo = explode("U-", $yearData[$key . '4']);
                                            if(count($logInfo) > 1){
                                                $userinfo = getLoggedInUserProfile(intval($logInfo[1]));
                                                $img4 =  base_url($userinfo[0]->profile_picture_path);
                                                $uname4 = $userinfo[0]->first_name." ".$userinfo[0]->last_name;
                                            }
                                        }
                                    ?>

                                        <td <?= (strtoupper($currentMonth) == $value ? 'style=background-color:#00c5fb;' : '') ?>>
                                            <a href="javascript:;" data-toggle="modal" data-target="#add_data_checklist"><?= $value ?></a>
                                            <div class="month-box"> 
                                                <input readonly="readonly" type="text" value="<?= explode("U-",$yearData[$key . '1'])[0] ?>" class="dis-timesheet_input">
                                                <input readonly="readonly" type="hidden" value="<?= $yearData[$key . '1'] ?>" name="<?= $key ?>1" class="timesheet_input">
                                                <img title="<?php print $uname1; ?>" class="avatar" src="<?= $img1; ?>" <?= $_1 ?>>
                                                <div class="tooltip1">
                                                    <img class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                                                    <span class="tooltiptext1">Click Here</span>
                                                </div>
                                            </div>
                                            <div class="month-box"> 
                                                <input readonly="readonly" type="text" value="<?= explode("U-",$yearData[$key . '2'])[0] ?>" class="dis-timesheet_input">
                                                <input readonly="readonly" type="hidden" value="<?= $yearData[$key . '2'] ?>" name="<?= $key ?>2" class="timesheet_input">
                                                <img title="<?php print $uname2; ?>" class="avatar" src="<?= $img2; ?>" <?= $_2 ?>>
                                                <div class="tooltip1">
                                                    <img class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                                                    <span class="tooltiptext1">Click Here</span>
                                                </div>
                                            </div>
                                            <div class="month-box"> 
                                                <input readonly="readonly" type="text" value="<?= explode("U-",$yearData[$key . '3'])[0] ?>" class="dis-timesheet_input">
                                                <input readonly="readonly" type="hidden" value="<?= $yearData[$key . '3'] ?>" name="<?= $key ?>3" class="timesheet_input">
                                                <img title="<?php print $uname3; ?>" class="avatar" src="<?= $img3; ?>" <?= $_3 ?>>
                                                <div class="tooltip1">
                                                    <img class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                                                    <span class="tooltiptext1">Click Here</span>
                                                </div>
                                            </div>
                                            <div class="month-box"> 
                                                <input readonly="readonly" type="text" value="<?= explode("U-",$yearData[$key . '4'])[0] ?>" class="dis-timesheet_input">
                                                <input readonly="readonly" type="hidden" value="<?= $yearData[$key . '4'] ?>" name="<?= $key ?>4" class="timesheet_input">
                                                <img title="<?php print $uname4; ?>" class="avatar" src="<?= $img4; ?>" <?= $_4 ?>>
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