<?php
$userinfo = getLoggedInUserProfile(intval($this->ion_auth->user()->row()->id));
$img =  base_url($userinfo[0]->profile_picture_path);
$yearData = json_decode($data['log_data'], true);


?>
<tr>
    <?php
    $months = array('jan' => 'JANUARY', 'feb' => 'FEBRUARY', 'mar' => 'MARCH', 'apr' => 'APRIL');

    foreach ($months as $key => $value) :
        if(empty($yearData[$key . '1'])) $_1 = 'style=display:none;'; else $_1 = '';
        if(empty($yearData[$key . '2'])) $_2 = 'style=display:none;'; else $_2 = '';
        if(empty($yearData[$key . '3'])) $_3 = 'style=display:none;'; else $_3 = '';
        if(empty($yearData[$key . '4'])) $_4 = 'style=display:none;'; else $_4 = '';
    ?>

        <td>
            <a href="javascript:;" data-toggle="modal" data-target="#add_data_checklist"><?= $value ?></a>
            <div class="month-box">
                <input type="text" value="<?= $yearData[$key . '1'] ?>" name="<?= $key ?>1" class="timesheet_input">
                <img class="avatar" src="<?= $img; ?>" <?=$_1?>>
                <img class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
            </div>
            <div class="month-box"> <input type="text" value="<?= $yearData[$key . '2'] ?>" name="<?= $key ?>2" class="timesheet_input">
                <img class="avatar" src="<?= $img; ?>" <?=$_2?>>
                <img class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
            </div>
            <div class="month-box"> <input type="text" value="<?= $yearData[$key . '3'] ?>" name="<?= $key ?>3" class="timesheet_input">
                <img class="avatar" src="<?= $img; ?>" <?=$_3?>>
                <img class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
            </div>
            <div class="month-box"> <input type="text" value="<?= $yearData[$key . '4'] ?>" name="<?= $key ?>4" class="timesheet_input">
                <img class="avatar" src="<?= $img; ?>" <?=$_4?>>
                <img class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
            </div>
        </td>
    <?php endforeach; ?>

</tr>
<tr>
    <?php
    $months = array('may' => 'MAY', 'jun' => 'JUNE', 'jul' => 'JULY', 'aug' => 'AUGUST');
    foreach ($months as $key => $value) : 
        if(empty($yearData[$key . '1'])) $_1 = 'style=display:none;'; else $_1 = '';
        if(empty($yearData[$key . '2'])) $_2 = 'style=display:none;'; else $_2 = '';
        if(empty($yearData[$key . '3'])) $_3 = 'style=display:none;'; else $_3 = '';
        if(empty($yearData[$key . '4'])) $_4 = 'style=display:none;'; else $_4 = '';
    ?>

        <td><a href="javascript:;" data-toggle="modal" data-target="#add_data_checklist"><?= $value ?></a>
            <div class="month-box"> <input type="text" value="<?= $yearData[$key . '1'] ?>" name="<?= $key ?>1" class="timesheet_input">
                <img class="avatar" src="<?= $img; ?>" <?=$_1?> >
                <img class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
            </div>
            <div class="month-box"> <input type="text" value="<?= $yearData[$key . '2'] ?>" name="<?= $key ?>2" class="timesheet_input">
                <img class="avatar" src="<?= $img; ?>" <?=$_2?>>
                <img class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
            </div>
            <div class="month-box"> <input type="text" value="<?= $yearData[$key . '3'] ?>" name="<?= $key ?>3" class="timesheet_input">
                <img class="avatar" src="<?= $img; ?>" <?=$_3?>>
                <img class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
            </div>
            <div class="month-box"> <input type="text" value="<?= $yearData[$key . '4'] ?>" name="<?= $key ?>4" class="timesheet_input">
                <img class="avatar" src="<?= $img; ?>" <?=$_4?>>
                <img class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
            </div>
        </td>

    <?php endforeach;
    ?>
</tr>
<tr>
    <?php
    $months = array('sep' => 'SEPTEMBER', 'oct' => 'OCTOBER', 'nov' => 'NOVEMBER', 'dec' => 'DECEMBER');

    foreach ($months as $key => $value) :
        if(empty($yearData[$key . '1'])) $_1 = 'style=display:none;'; else $_1 = '';
        if(empty($yearData[$key . '2'])) $_2 = 'style=display:none;'; else $_2 = '';
        if(empty($yearData[$key . '3'])) $_3 = 'style=display:none;'; else $_3 = '';
        if(empty($yearData[$key . '4'])) $_4 = 'style=display:none;'; else $_4 = '';
    ?>

        <td><a href="javascript:;" data-toggle="modal" data-target="#add_data_checklist"><?=$value?></a>
            <div class="month-box"> <input type="text" value="<?= $yearData[$key . '1'] ?>" name="<?= $key ?>1" class="timesheet_input">
                <img class="avatar" src="<?= $img; ?>" <?=$_1?>>
                <img class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
            </div>
            <div class="month-box"> <input type="text" value="<?= $yearData[$key . '2'] ?>" name="<?= $key ?>2" class="timesheet_input">
                <img class="avatar" src="<?= $img; ?>" <?=$_2?>>
                <img class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
            </div>
            <div class="month-box"> <input type="text" value="<?= $yearData[$key . '3'] ?>" name="<?= $key ?>3" class="timesheet_input">
                <img class="avatar" src="<?= $img; ?>" <?=$_3?>>
                <img class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
            </div>
            <div class="month-box"> <input type="text" value="<?= $yearData[$key . '4'] ?>" name="<?= $key ?>4" class="timesheet_input">
                <img class="avatar" src="<?= $img; ?>" <?=$_4?>>
                <img class="icon-cricle update_time_stainer" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
            </div>
        </td>
    <?php endforeach; ?>


</tr>