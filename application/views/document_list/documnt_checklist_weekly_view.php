<?php if ($categories && count($categories) > 0) {

    $my_date = $tdate;
    $week = date("W", strtotime($my_date)); // get week
    $y =    date("Y", strtotime($my_date)); // get year
    $first_date =  date('d-m-Y', strtotime($y . "W" . $week)); //first date 
    $second_date = date("d-m-Y", strtotime("+1 day", strtotime($first_date)));




    //$userinfo = getLoggedInUserProfile(intval($this->ion_auth->user()->row()->id)); 



    foreach ($categories as $key => $category) {
        $day_1 = $day_2 = $day_3 = $day_4 = $day_5 = "";
        $day1Image = $day2Image = $day3Image = $day4Image = $day5Image = base_url($this->ion_auth->user()->row()->profile_picture_path);
        foreach ($result as $key1 => $res) {
            $json_data = (array) json_decode($res['log_data']);
            if ($res['log_date'] == date('Y-m-d', strtotime($y . "W" . $week)))  $day_1 = $json_data[$category->id];
            if ($res['log_date'] == date("Y-m-d", strtotime("+1 day", strtotime($first_date)))) $day_2 = $json_data[$category->id];
            if ($res['log_date'] == date("Y-m-d", strtotime("+2 day", strtotime($first_date)))) $day_3 = $json_data[$category->id];
            if ($res['log_date'] == date("Y-m-d", strtotime("+3 day", strtotime($first_date)))) $day_4 = $json_data[$category->id];
            if ($res['log_date'] == date("Y-m-d", strtotime("+4 day", strtotime($first_date)))) $day_5 = $json_data[$category->id];


            $day1_userid = explode("-", $day_1);
            $userinfo = getLoggedInUserProfile(intval($day1_userid[1]));
            if(empty($userinfo[0]->profile_picture_path)) $day1Image =  base_url($this->ion_auth->user()->row()->profile_picture_path);
            else $day1Image =  base_url($userinfo[0]->profile_picture_path);

            $day2_userid = explode("-", $day_2);
            $userinfo2 = getLoggedInUserProfile(intval($day2_userid[1]));
            if(empty($userinfo2[0]->profile_picture_path)) $day2Image =  base_url($this->ion_auth->user()->row()->profile_picture_path);
            else   $day2Image =  base_url($userinfo2[0]->profile_picture_path);
          

            $day3_userid = explode("-", $day_3);
            $userinfo3 = getLoggedInUserProfile(intval($day3_userid[1]));
            if(empty($userinfo3[0]->profile_picture_path)) $day3Image =  base_url($this->ion_auth->user()->row()->profile_picture_path);
            else $day3Image =  base_url($userinfo3[0]->profile_picture_path);
            

            $day4_userid = explode("-", $day_4);
            $userinfo4 = getLoggedInUserProfile(intval($day4_userid[1]));
            if(empty($userinfo4[0]->profile_picture_path)) $day4Image =  base_url($this->ion_auth->user()->row()->profile_picture_path);
            else $day4Image =  base_url($userinfo4[0]->profile_picture_path);
            

            $day5_userid = explode("-", $day_5);
            $userinfo5 = getLoggedInUserProfile(intval($day5_userid[1]));
            if(empty($userinfo5[0]->profile_picture_path)) $day5Image =  base_url($this->ion_auth->user()->row()->profile_picture_path);
            else  $day5Image =  base_url($userinfo5[0]->profile_picture_path);
          
        }
?>
        <tr>
            <td><?php echo $category->name; ?></td>
            <td style="background-color: <?php echo (date('d-m-Y', strtotime($y . "W" . $week)) == date("d-m-Y")) ? "#00c5fb" : ""; ?> <?php echo (date('d-m-Y', strtotime($y . "W" . $week)) < date("d-m-Y")) ? "#F7F7F7" : ""; ?>;">

                <input disabled="disabled" type='text' value="<?php echo $day1_userid[0] ?>" name="dis_<?php echo date('d-m-Y', strtotime($y . "W" . $week)); ?>[<?php echo $category->id; ?>]" class="timesheet_input_new timesheet_<?php echo date('d-m-Y', strtotime($y . "W" . $week)) ?>">

                <input readonly="readonly" type='hidden' value="<?php echo $day_1 ?>" name="<?php echo date('d-m-Y', strtotime($y . "W" . $week)); ?>[<?php echo $category->id; ?>]" class="timesheet_input timesheet_<?php echo date('d-m-Y', strtotime($y . "W" . $week)) ?>" data-cid="<?php echo $category->id ?>" data-date="<?php echo date('d-m-Y', strtotime($y . "W" . $week)); ?>">

                <!-- <button class="btn btn-info mt-2 update_time" data-get_class="<?php echo date('d-m-Y', strtotime($y . "W" . $week)); ?>[<?php echo $category->id; ?>]">Date</button> -->
                <!-- Hide Images if data not found -->
                <?php if (empty($day_1)) $d = "style=display:none";
                else $d = ''; ?>
                <img class="avatar" title="<?php print $userinfo[0]->first_name; ?> <?php print $userinfo[0]->last_name; ?>" alt="<?php print $userinfo[0]->first_name; ?> <?php print $userinfo[0]->last_name; ?>" src="<?= $day1Image; ?>" <?= $d; ?>>
                
                <i style="cursor:pointer" class="fa fa-check-circle update_time <?= (!empty($day_1) ? 'icon_active' : '') ?>" data-get_class="<?php echo date('d-m-Y', strtotime($y . "W" . $week)); ?>[<?php echo $category->id; ?>]" style="padding-left: 30px;"></i>
               
            </td>
            <td style="background-color: <?php echo (date("d-m-Y", strtotime("+1 day", strtotime($first_date))) == date("d-m-Y")) ? "#00c5fb" : ""; ?> <?php echo (date('d-m-Y', strtotime($y . "W" . $week)) < date("d-m-Y")) ? "#F7F7F7" : ""; ?>;">

                <input disabled type='text' value="<?php echo $day2_userid[0] ?>" name="dis_<?php echo date("d-m-Y", strtotime("+1 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" class="timesheet_input timesheet_<?php echo date("d-m-Y", strtotime("+1 day", strtotime($first_date))) ?>">

                <input readonly="readonly" type='hidden' value="<?php echo $day_2 ?>" name="<?php echo date("d-m-Y", strtotime("+1 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" class="timesheet_input timesheet_<?php echo date("d-m-Y", strtotime("+1 day", strtotime($first_date))) ?>" data-cid="<?php echo $category->id ?>" data-date="<?php echo date("d-m-Y", strtotime("+1 day", strtotime($first_date))); ?>">

                <!-- <button class="btn btn-info mt-2 update_time" data-get_class="<?php echo date("d-m-Y", strtotime("+1 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]">Date</button> -->
                <?php if (empty($day_2)) $d = "style=display:none";
                else $d = ''; ?>
                <img class="avatar" title="<?php print $userinfo2[0]->first_name; ?> <?php print $userinfo2[0]->last_name; ?>" src="<?= $day2Image; ?>" <?= $d; ?>>
                <i style="cursor:pointer" class="fa fa-check-circle update_time <?= (!empty($day_2) ? 'icon_active' : '') ?>" data-get_class="<?php echo date("d-m-Y", strtotime("+1 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" style="padding-left: 30px;"></i>
            </td>
            <td style="background-color: <?php echo (date("d-m-Y", strtotime("+2 day", strtotime($first_date))) == date("d-m-Y")) ? "#00c5fb" : ""; ?> ;">

                <input disabled type='text' value="<?php echo $day3_userid[0] ?>" name="dis_<?php echo date("d-m-Y", strtotime("+2 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" class="timesheet_input timesheet_<?php echo date("d-m-Y", strtotime("+2 day", strtotime($first_date))) ?>" >

                <input readonly='readonly' type='hidden' value="<?php echo $day_3 ?>" name="<?php echo date("d-m-Y", strtotime("+2 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" class="timesheet_input timesheet_<?php echo date("d-m-Y", strtotime("+2 day", strtotime($first_date))) ?>" data-cid=" <?php echo $category->id ?>" data-date="<?php echo date("d-m-Y", strtotime("+2 day", strtotime($first_date))); ?>">

                <!-- <button class="btn btn-info mt-2 update_time" data-get_class="<?php echo date("d-m-Y", strtotime("+2 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]">Date</button> -->
                <?php if (empty($day_3)) $d = "style=display:none";
                else $d = ''; ?>
                <img class="avatar" title="<?php print $userinfo3[0]->first_name; ?> <?php print $userinfo3[0]->last_name; ?>" src="<?= $day3Image; ?>" <?= $d; ?>>
                <i style="cursor:pointer" class="fa fa-check-circle update_time <?= (!empty($day_3) ? 'icon_active' : '') ?>" data-get_class="<?php echo date("d-m-Y", strtotime("+2 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" style="padding-left: 30px;"></i>
            </td>
            <td style="background-color: <?php echo (date("d-m-Y", strtotime("+3 day", strtotime($first_date))) == date("d-m-Y")) ? "#00c5fb" : ""; ?>;">

                <input disabled type='text' value="<?php echo $day4_userid[0] ?>" name="dis_<?php echo date("d-m-Y", strtotime("+3 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" class="timesheet_input timesheet_<?php echo date("d-m-Y", strtotime("+3 day", strtotime($first_date))) ?>">

                <input readonly=" readonly" type='hidden' value="<?php echo $day_4 ?>" name="<?php echo date("d-m-Y", strtotime("+3 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" class="timesheet_input timesheet_<?php echo date("d-m-Y", strtotime("+3 day", strtotime($first_date))) ?>" data-cid=" <?php echo $category->id ?>" data-date="<?php echo date("d-m-Y", strtotime("+3 day", strtotime($first_date))); ?>">

                <!-- <button class="btn btn-info mt-2 update_time" data-get_class="<?php echo date("d-m-Y", strtotime("+3 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]">Date</button> -->
                <?php if (empty($day_4)) $d = "style=display:none";
                else $d = ''; ?>
                <img class="avatar" title="<?php print $userinfo4[0]->first_name; ?> <?php print $userinfo4[0]->last_name; ?>" src="<?= $day4Image; ?>" <?= $d; ?>>
                <i style="cursor:pointer" class="fa fa-check-circle update_time <?= (!empty($day_4) ? 'icon_active' : '') ?>" data-get_class="<?php echo date("d-m-Y", strtotime("+3 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" style="padding-left: 30px;"></i>
            </td>
            <td style="background-color: <?php echo (date("d-m-Y", strtotime("+4 day", strtotime($first_date))) == date("d-m-Y")) ? "#00c5fb" : ""; ?>;">

                <input disabled type='text' value="<?php echo $day5_userid[0] ?>" name="dis_<?php echo date("d-m-Y", strtotime("+4 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" class="timesheet_input timesheet_<?php echo date("d-m-Y", strtotime("+4 day", strtotime($first_date))) ?>">

                <input readonly="readonly" type='hidden' value="<?php echo $day_5 ?>" name="<?php echo date("d-m-Y", strtotime("+4 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" class="timesheet_input timesheet_<?php echo date("d-m-Y", strtotime("+4 day", strtotime($first_date))) ?>" data-cid=" <?php echo $category->id ?>" data-date="<?php echo date("d-m-Y", strtotime("+4 day", strtotime($first_date))); ?>">

                <!-- <button class="btn btn-info mt-2 update_time" data-get_class="<?php echo date("d-m-Y", strtotime("+4 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]">Date</button> -->
                <?php if (empty($day_5)) $d = "style=display:none";
                else $d = ''; ?>
                <img class="avatar" title="<?php print $userinfo5[0]->first_name; ?> <?php print $userinfo5[0]->last_name; ?>" src="<?= $day5Image; ?>" <?= $d; ?>>
                <i style="cursor:pointer" class="fa fa-check-circle update_time <?= (!empty($day_5) ? 'icon_active' : '') ?>" data-get_class="<?php echo date("d-m-Y", strtotime("+4 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" style="padding-left: 30px;"></i>
            </td>
        </tr>
<?php }
} ?>