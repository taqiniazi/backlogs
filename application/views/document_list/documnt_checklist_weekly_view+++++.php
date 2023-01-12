<?php if ($categories && count($categories) > 0) {

$my_date = $tdate; 
$week = date("W", strtotime($my_date)); // get week
$y =    date("Y", strtotime($my_date)); // get year
$first_date =  date('d-m-Y',strtotime($y."W".$week)); //first date 
$second_date = date("d-m-Y",strtotime("+1 day", strtotime($first_date)));

$userinfo = getLoggedInUserProfile(intval($this->ion_auth->user()->row()->id)); 
$img =  base_url($userinfo[0]->profile_picture_path);
    foreach ($categories as $key => $category) {
            $day_1 = $day_2 = $day_3 = $day_4 = $day_5 = ""; 
            foreach($result as $key1 => $res){
                $json_data = (array) json_decode($res['log_data']);
                if($res['log_date'] == date('Y-m-d',strtotime($y."W".$week)))  $day_1 = $json_data[$category->id];
                if($res['log_date'] == date("Y-m-d",strtotime("+1 day", strtotime($first_date)))) $day_2 = $json_data[$category->id];
                if($res['log_date'] == date("Y-m-d",strtotime("+2 day", strtotime($first_date)))) $day_3 = $json_data[$category->id];
                if($res['log_date'] == date("Y-m-d",strtotime("+3 day", strtotime($first_date)))) $day_4 = $json_data[$category->id];
                if($res['log_date'] == date("Y-m-d",strtotime("+4 day", strtotime($first_date)))) $day_5 = $json_data[$category->id];
            }
        ?>
        <tr>
            <td><?php echo $category->name; ?></td>
            <td>
                <input type='text' value="<?php echo $day_1 ?>" name="<?php echo date('d-m-Y',strtotime($y."W".$week)); ?>[<?php echo $category->id; ?>]" class="timesheet_input timesheet_<?php echo date('d-m-Y',strtotime($y."W".$week)) ?>" data-cid="<?php echo $category->id ?>"  data-date="<?php echo date('d-m-Y',strtotime($y."W".$week)); ?>">
                <!-- <button class="btn btn-info mt-2 update_time" data-get_class="<?php echo date('d-m-Y',strtotime($y."W".$week)); ?>[<?php echo $category->id; ?>]">Date</button> -->
                <!-- Hide Images if data not found -->
                <?php if(empty($day_1)) $d = "style=display:none"; else $d = ''; ?>
                <img class="avatar" src="<?= $img; ?>" <?= $d; ?>>
                <i class="fa fa-check-circle update_time" data-get_class="<?php echo date('d-m-Y',strtotime($y."W".$week)); ?>[<?php echo $category->id; ?>]" style="padding-left: 30px;"></i>
            </td>
            <td>
                <input type='text' value="<?php echo $day_2 ?>" name="<?php echo date("d-m-Y",strtotime("+1 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" class="timesheet_input timesheet_<?php echo date("d-m-Y",strtotime("+1 day", strtotime($first_date))) ?>" data-cid="<?php echo $category->id ?>"  data-date="<?php echo date("d-m-Y",strtotime("+1 day", strtotime($first_date))); ?>">
                <!-- <button class="btn btn-info mt-2 update_time" data-get_class="<?php echo date("d-m-Y",strtotime("+1 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]">Date</button> -->
                <?php if(empty($day_2)) $d = "style=display:none"; else $d = ''; ?>
                <img class="avatar" src="<?= $img; ?>" <?= $d; ?>>
                <i class="fa fa-check-circle update_time" data-get_class="<?php echo date("d-m-Y",strtotime("+1 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" style="padding-left: 30px;"></i>
            </td>
            <td>
                <input type='text' value="<?php echo $day_3 ?>" name="<?php echo date("d-m-Y",strtotime("+2 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" class="timesheet_input timesheet_<?php echo date("d-m-Y",strtotime("+2 day", strtotime($first_date))) ?> data-cid="<?php echo $category->id ?>"  data-date="<?php echo date("d-m-Y",strtotime("+2 day", strtotime($first_date))); ?>">
                <!-- <button class="btn btn-info mt-2 update_time" data-get_class="<?php echo date("d-m-Y",strtotime("+2 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]">Date</button> -->
                <?php if(empty($day_3)) $d = "style=display:none"; else $d = ''; ?>
                <img class="avatar" src="<?= $img; ?>" <?= $d; ?>>
                <i class="fa fa-check-circle update_time" data-get_class="<?php echo date("d-m-Y",strtotime("+2 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" style="padding-left: 30px;"></i>
            </td>
            <td>
                <input type='text' value="<?php echo $day_4 ?>" name="<?php echo date("d-m-Y",strtotime("+3 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" class="timesheet_input timesheet_<?php echo date("d-m-Y",strtotime("+3 day", strtotime($first_date))) ?> data-cid="<?php echo $category->id ?>"  data-date="<?php echo date("d-m-Y",strtotime("+3 day", strtotime($first_date))); ?>">
                <!-- <button class="btn btn-info mt-2 update_time" data-get_class="<?php echo date("d-m-Y",strtotime("+3 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]">Date</button> -->
                <?php if(empty($day_4)) $d = "style=display:none"; else $d = ''; ?>
                <img class="avatar" src="<?= $img; ?>" <?= $d; ?>>
                <i class="fa fa-check-circle update_time" data-get_class="<?php echo date("d-m-Y",strtotime("+3 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" style="padding-left: 30px;"></i>
            </td>
            <td>
                <input type='text' value="<?php echo $day_5 ?>" name="<?php echo date("d-m-Y",strtotime("+4 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" class="timesheet_input timesheet_<?php echo date("d-m-Y",strtotime("+4 day", strtotime($first_date))) ?> data-cid="<?php echo $category->id ?>"  data-date="<?php echo date("d-m-Y",strtotime("+4 day", strtotime($first_date))); ?>">
                <!-- <button class="btn btn-info mt-2 update_time" data-get_class="<?php echo date("d-m-Y",strtotime("+4 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]">Date</button> -->
                <?php if(empty($day_5)) $d = "style=display:none"; else $d = ''; ?>
                <img class="avatar" src="<?= $img; ?>" <?= $d; ?>>
                <i class="fa fa-check-circle update_time" data-get_class="<?php echo date("d-m-Y",strtotime("+4 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" style="padding-left: 30px;"></i>
            </td>
        </tr>
<?php }
} ?>