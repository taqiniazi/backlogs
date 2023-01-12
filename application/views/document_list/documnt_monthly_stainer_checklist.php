<?php if ($categories && count($categories) > 0) {

    $my_date = $tdate;
    $week = date("W", strtotime($my_date)); // get week
    $y =    date("Y", strtotime($my_date)); // get year
    $first_date =  date('d-m-Y', strtotime($y . "W" . $week)); //first date 
    $second_date = date("d-m-Y", strtotime("+1 day", strtotime($first_date)));

    $userinfo = getLoggedInUserProfile(intval($this->ion_auth->user()->row()->id));
    $img =  base_url($userinfo[0]->profile_picture_path);
    foreach ($categories as $key => $category) {
        //if ($category->id == 1) continue;
        $day_1 = $day_2 = $day_3 = $day_4 = $day_5 = "";
        foreach ($result as $key1 => $res) {
            $json_data = (array) json_decode($res['log_data']);
            // Monday Data
            if ($res['log_date'] == date('Y-m-d', strtotime($y . "W" . $week))) {
                $mondayDay1 = $json_data[$category->id]->{1};
                $mondayDay2 = $json_data[$category->id]->{2};
                $mondayDay3 = $json_data[$category->id]->{3};
                $mondayDay4 = $json_data[$category->id]->{4};
            }

            if ($res['log_date'] == date("Y-m-d", strtotime("+1 day", strtotime($first_date)))) {
                $tuesdayDay1 = $json_data[$category->id]->{1};
                $tuesdayDay2 = $json_data[$category->id]->{2};
                $tuesdayDay3 = $json_data[$category->id]->{3};
                $tuesdayDay4 = $json_data[$category->id]->{4};
            }

            if ($res['log_date'] == date("Y-m-d", strtotime("+2 day", strtotime($first_date)))) {
                $wednesDay1 = $json_data[$category->id]->{1};
                $wednesDay2 = $json_data[$category->id]->{2};
                $wednesDay3 = $json_data[$category->id]->{3};
                $wednesDay4 = $json_data[$category->id]->{4};
            }

            if ($res['log_date'] == date("Y-m-d", strtotime("+3 day", strtotime($first_date)))) {
                $thursDay1 = $json_data[$category->id]->{1};
                $thursDay2 = $json_data[$category->id]->{2};
                $thursDay3 = $json_data[$category->id]->{3};
                $thursDay4 = $json_data[$category->id]->{4};
            }

            if ($res['log_date'] == date("Y-m-d", strtotime("+4 day", strtotime($first_date)))) {
                $friDay1 = $json_data[$category->id]->{1};
                $friDay2 = $json_data[$category->id]->{2};
                $friDay3 = $json_data[$category->id]->{3};
                $friDay4 = $json_data[$category->id]->{4};
            }
        }
?>
        <tr>
        <td><p style="font-weight: bold;"><?php echo $category->name; ?></p></td>
            <td>
                <!-- Four Textboxes here -->
                <!-- First -->
                <div class="first">
                    <input type='text' value="<?php echo $mondayDay1 ?>" name="<?php echo date('d-m-Y', strtotime($y . "W" . $week)); ?>[<?php echo $category->id; ?>][1]" class="timesheet_input timesheet_<?php echo date('d-m-Y', strtotime($y . "W" . $week)) ?>" data-cid="<?php echo $category->id ?>" data-date="<?php echo date('d-m-Y', strtotime($y . "W" . $week)); ?>">
                    <?php if (empty($mondayDay1)) $d = "style=display:none";
                    else $d = ''; ?>
                    <img class="avatar" src="<?= $img; ?>" <?= $d; ?>>
                    <div class="tooltip1">
                        <img class="icon-cricle update_time_stainer" data-get_class="<?php echo date('d-m-Y', strtotime($y . "W" . $week)); ?>[<?php echo $category->id; ?>]" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                        <span class="tooltiptext1">Click Here</span>
                    </div>
                </div>

                <!-- Second -->
                <div class="first">
                    <input type='text' value="<?php echo $mondayDay2 ?>" name="<?php echo date('d-m-Y', strtotime($y . "W" . $week)); ?>[<?php echo $category->id; ?>][2]" class="timesheet_input timesheet_<?php echo date('d-m-Y', strtotime($y . "W" . $week)) ?>" data-cid="<?php echo $category->id ?>" data-date="<?php echo date('d-m-Y', strtotime($y . "W" . $week)); ?>">
                    <?php if (empty($mondayDay2)) $d = "style=display:none";
                    else $d = ''; ?>
                    <img class="avatar" src="<?= $img; ?>" <?= $d; ?>>
                    <div class="tooltip1">
                        <img class="icon-cricle update_time_stainer" data-get_class="<?php echo date('d-m-Y', strtotime($y . "W" . $week)); ?>[<?php echo $category->id; ?>]" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                        <span class="tooltiptext1">Click Here</span>
                    </div>
                </div>

                <!-- Third -->
                <div class="first">
                    <input type='text' value="<?php echo $mondayDay3 ?>" name="<?php echo date('d-m-Y', strtotime($y . "W" . $week)); ?>[<?php echo $category->id; ?>][3]" class="timesheet_input timesheet_<?php echo date('d-m-Y', strtotime($y . "W" . $week)) ?>" data-cid="<?php echo $category->id ?>" data-date="<?php echo date('d-m-Y', strtotime($y . "W" . $week)); ?>">
                    <?php if (empty($mondayDay3)) $d = "style=display:none";
                    else $d = ''; ?>
                    <img class="avatar" src="<?= $img; ?>" <?= $d; ?>>
                    <div class="tooltip1">
                        <img class="icon-cricle update_time_stainer" data-get_class="<?php echo date('d-m-Y', strtotime($y . "W" . $week)); ?>[<?php echo $category->id; ?>]" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                        <span class="tooltiptext1">Click Here</span>
                    </div>
                </div>

                <!-- Fourth -->
                <div class="first">
                    <input type='text' value="<?php echo $mondayDay4 ?>" name="<?php echo date('d-m-Y', strtotime($y . "W" . $week)); ?>[<?php echo $category->id; ?>][4]" class="timesheet_input timesheet_<?php echo date('d-m-Y', strtotime($y . "W" . $week)) ?>" data-cid="<?php echo $category->id ?>" data-date="<?php echo date('d-m-Y', strtotime($y . "W" . $week)); ?>">
                    <?php if (empty($mondayDay4)) $d = "style=display:none";
                    else $d = ''; ?>
                    <img class="avatar" src="<?= $img; ?>" <?= $d; ?>>
                    <div class="tooltip1">
                        <img class="icon-cricle update_time_stainer" data-get_class="<?php echo date('d-m-Y', strtotime($y . "W" . $week)); ?>[<?php echo $category->id; ?>]" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                        <span class="tooltiptext1">Click Here</span>
                    </div>
                </div>

            </td>
            <td>
                <!-- First -->
                <div class="first">
                    <input type='text' value="<?php echo $tuesdayDay1 ?>" name="<?php echo date("d-m-Y", strtotime("+1 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>][1]" class="timesheet_input timesheet_<?php echo date("d-m-Y", strtotime("+1 day", strtotime($first_date))) ?>" data-cid="<?php echo $category->id ?>" data-date="<?php echo date("d-m-Y", strtotime("+1 day", strtotime($first_date))); ?>">
                    <?php if (empty($tuesdayDay1)) $d = "style=display:none";
                    else $d = ''; ?>
                    <img class="avatar" src="<?= $img; ?>" <?= $d; ?>>
                    <div class="tooltip1">
                        <img class="icon-cricle update_time_stainer" data-get_class="<?php echo date("d-m-Y", strtotime("+1 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                        <span class="tooltiptext1">Click Here</span>
                    </div>
                </div>

                <!-- Second -->
                <div class="first">
                    <input type='text' value="<?php echo $tuesdayDay2 ?>" name="<?php echo date("d-m-Y", strtotime("+1 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>][2]" class="timesheet_input timesheet_<?php echo date("d-m-Y", strtotime("+1 day", strtotime($first_date))) ?>" data-cid="<?php echo $category->id ?>" data-date="<?php echo date("d-m-Y", strtotime("+1 day", strtotime($first_date))); ?>">
                    <?php if (empty($tuesdayDay2)) $d = "style=display:none";
                    else $d = ''; ?>
                    <img class="avatar" src="<?= $img; ?>" <?= $d; ?>>
                    <div class="tooltip1">
                        <img class="icon-cricle update_time_stainer" data-get_class="<?php echo date("d-m-Y", strtotime("+1 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                        <span class="tooltiptext1">Click Here</span>
                    </div>
                </div>

                <!-- Third -->
                <div class="first">
                    <input type='text' value="<?php echo $tuesdayDay3 ?>" name="<?php echo date("d-m-Y", strtotime("+1 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>][3]" class="timesheet_input timesheet_<?php echo date("d-m-Y", strtotime("+1 day", strtotime($first_date))) ?>" data-cid="<?php echo $category->id ?>" data-date="<?php echo date("d-m-Y", strtotime("+1 day", strtotime($first_date))); ?>">
                    <?php if (empty($tuesdayDay3)) $d = "style=display:none";
                    else $d = ''; ?>
                    <img class="avatar" src="<?= $img; ?>" <?= $d; ?>>
                    <div class="tooltip1">
                        <img class="icon-cricle update_time_stainer" data-get_class="<?php echo date("d-m-Y", strtotime("+1 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                        <span class="tooltiptext1">Click Here</span>
                    </div>
                </div>

                <!-- Fourth -->
                <div class="first">
                    <input type='text' value="<?php echo $tuesdayDay4 ?>" name="<?php echo date("d-m-Y", strtotime("+1 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>][4]" class="timesheet_input timesheet_<?php echo date("d-m-Y", strtotime("+1 day", strtotime($first_date))) ?>" data-cid="<?php echo $category->id ?>" data-date="<?php echo date("d-m-Y", strtotime("+1 day", strtotime($first_date))); ?>">
                    <?php if (empty($tuesdayDay4)) $d = "style=display:none";
                    else $d = ''; ?>
                    <img class="avatar" src="<?= $img; ?>" <?= $d; ?>>
                    <div class="tooltip1">
                        <img class="icon-cricle update_time_stainer" data-get_class="<?php echo date("d-m-Y", strtotime("+1 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                        <span class="tooltiptext1">Click Here</span>
                    </div>
                </div>
            </td>
            <td>
                <!-- First -->
                <div class="first">
                    <input type='text' value="<?php echo $wednesDay1 ?>" name="<?php echo date("d-m-Y", strtotime("+2 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>][1]" class="timesheet_input timesheet_<?php echo date("d-m-Y", strtotime("+2 day", strtotime($first_date))) ?> data-cid=" <?php echo $category->id ?>" data-date="<?php echo date("d-m-Y", strtotime("+2 day", strtotime($first_date))); ?>">
                    <?php if (empty($wednesDay1)) $d = "style=display:none";
                    else $d = ''; ?>
                    <img class="avatar" src="<?= $img; ?>" <?= $d; ?>>
                    <div class="tooltip1">
                        <img class="icon-cricle update_time_stainer" data-get_class="<?php echo date("d-m-Y", strtotime("+2 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                        <span class="tooltiptext1">Click Here</span>
                    </div>
                </div>

                <!-- Second -->
                <div class="first">
                    <input type='text' value="<?php echo $wednesDay2 ?>" name="<?php echo date("d-m-Y", strtotime("+2 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>][2]" class="timesheet_input timesheet_<?php echo date("d-m-Y", strtotime("+2 day", strtotime($first_date))) ?> data-cid=" <?php echo $category->id ?>" data-date="<?php echo date("d-m-Y", strtotime("+2 day", strtotime($first_date))); ?>">
                    <?php if (empty($wednesDay2)) $d = "style=display:none";
                    else $d = ''; ?>
                    <img class="avatar" src="<?= $img; ?>" <?= $d; ?>>
                    <div class="tooltip1">
                        <img class="icon-cricle update_time_stainer" data-get_class="<?php echo date("d-m-Y", strtotime("+2 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                        <span class="tooltiptext1">Click Here</span>
                    </div>
                </div>

                <!-- Third -->
                <div class="first">
                    <input type='text' value="<?php echo $wednesDay3 ?>" name="<?php echo date("d-m-Y", strtotime("+2 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>][3]" class="timesheet_input timesheet_<?php echo date("d-m-Y", strtotime("+2 day", strtotime($first_date))) ?> data-cid=" <?php echo $category->id ?>" data-date="<?php echo date("d-m-Y", strtotime("+2 day", strtotime($first_date))); ?>">
                    <?php if (empty($wednesDay3)) $d = "style=display:none";
                    else $d = ''; ?>
                    <img class="avatar" src="<?= $img; ?>" <?= $d; ?>>
                    <div class="tooltip1">
                        <img class="icon-cricle update_time_stainer" data-get_class="<?php echo date("d-m-Y", strtotime("+2 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                        <span class="tooltiptext1">Click Here</span>
                    </div>
                </div>

                <!-- Fourth -->
                <div class="first">
                    <input type='text' value="<?php echo $wednesDay4 ?>" name="<?php echo date("d-m-Y", strtotime("+2 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>][4]" class="timesheet_input timesheet_<?php echo date("d-m-Y", strtotime("+2 day", strtotime($first_date))) ?> data-cid=" <?php echo $category->id ?>" data-date="<?php echo date("d-m-Y", strtotime("+2 day", strtotime($first_date))); ?>">
                    <?php if (empty($wednesDay4)) $d = "style=display:none";
                    else $d = ''; ?>
                    <img class="avatar" src="<?= $img; ?>" <?= $d; ?>>
                    <div class="tooltip1">
                        <img class="icon-cricle update_time_stainer" data-get_class="<?php echo date("d-m-Y", strtotime("+2 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                        <span class="tooltiptext1">Click Here</span>
                    </div>
                </div>
            </td>
            <td>
                <!-- First -->
                <div class="first">
                    <input type='text' value="<?php echo $thursDay1 ?>" name="<?php echo date("d-m-Y", strtotime("+3 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>][1]" class="timesheet_input timesheet_<?php echo date("d-m-Y", strtotime("+3 day", strtotime($first_date))) ?> data-cid=" <?php echo $category->id ?>" data-date="<?php echo date("d-m-Y", strtotime("+3 day", strtotime($first_date))); ?>">
                    <?php if (empty($thursDay1)) $d = "style=display:none";
                    else $d = ''; ?>
                    <img class="avatar" src="<?= $img; ?>" <?= $d; ?>>
                    <div class="tooltip1">
                        <img class="icon-cricle update_time_stainer" data-get_class="<?php echo date("d-m-Y", strtotime("+3 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                        <span class="tooltiptext1">Click Here</span>
                    </div>
                </div>

                <!-- Second -->
                <div class="first">
                    <input type='text' value="<?php echo $thursDay2 ?>" name="<?php echo date("d-m-Y", strtotime("+3 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>][2]" class="timesheet_input timesheet_<?php echo date("d-m-Y", strtotime("+3 day", strtotime($first_date))) ?> data-cid=" <?php echo $category->id ?>" data-date="<?php echo date("d-m-Y", strtotime("+3 day", strtotime($first_date))); ?>">
                    <?php if (empty($thursDay2)) $d = "style=display:none";
                    else $d = ''; ?>
                    <img class="avatar" src="<?= $img; ?>" <?= $d; ?>>
                    <div class="tooltip1">
                        <img class="icon-cricle update_time_stainer" data-get_class="<?php echo date("d-m-Y", strtotime("+3 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                        <span class="tooltiptext1">Click Here</span>
                    </div>
                </div>

                <!-- Third -->
                <div class="first">
                    <input type='text' value="<?php echo $thursDay3 ?>" name="<?php echo date("d-m-Y", strtotime("+3 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>][3]" class="timesheet_input timesheet_<?php echo date("d-m-Y", strtotime("+3 day", strtotime($first_date))) ?> data-cid=" <?php echo $category->id ?>" data-date="<?php echo date("d-m-Y", strtotime("+3 day", strtotime($first_date))); ?>">
                    <?php if (empty($thursDay3)) $d = "style=display:none";
                    else $d = ''; ?>
                    <img class="avatar" src="<?= $img; ?>" <?= $d; ?>>
                    <div class="tooltip1">
                        <img class="icon-cricle update_time_stainer" data-get_class="<?php echo date("d-m-Y", strtotime("+3 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                        <span class="tooltiptext1">Click Here</span>
                    </div>
                </div>

                <!-- Fourth -->
                <div class="first">
                    <input type='text' value="<?php echo $thursDay4 ?>" name="<?php echo date("d-m-Y", strtotime("+3 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>][4]" class="timesheet_input timesheet_<?php echo date("d-m-Y", strtotime("+3 day", strtotime($first_date))) ?> data-cid=" <?php echo $category->id ?>" data-date="<?php echo date("d-m-Y", strtotime("+3 day", strtotime($first_date))); ?>">
                    <?php if (empty($thursDay4)) $d = "style=display:none";
                    else $d = ''; ?>
                    <img class="avatar" src="<?= $img; ?>" <?= $d; ?>>
                    <div class="tooltip1">
                        <img class="icon-cricle update_time_stainer" data-get_class="<?php echo date("d-m-Y", strtotime("+3 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                        <span class="tooltiptext1">Click Here</span>
                    </div>
                </div>
            </td>
            <td>
                <!-- First -->
                <div class="first">
                    <input type='text' value="<?php echo $friDay1 ?>" name="<?php echo date("d-m-Y", strtotime("+4 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>][1]" class="timesheet_input timesheet_<?php echo date("d-m-Y", strtotime("+4 day", strtotime($first_date))) ?> data-cid=" <?php echo $category->id ?>" data-date="<?php echo date("d-m-Y", strtotime("+4 day", strtotime($first_date))); ?>">
                    <?php if (empty($friDay1)) $d = "style=display:none";
                    else $d = ''; ?>
                    <img class="avatar" src="<?= $img; ?>" <?= $d; ?>>
                    <div class="tooltip1">
                        <img class="icon-cricle update_time_stainer" data-get_class="<?php echo date("d-m-Y", strtotime("+4 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                        <span class="tooltiptext1">Click Here</span>
                    </div>
                </div>

                <!-- Second -->
                <div class="first">
                    <input type='text' value="<?php echo $friDay2 ?>" name="<?php echo date("d-m-Y", strtotime("+4 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>][2]" class="timesheet_input timesheet_<?php echo date("d-m-Y", strtotime("+4 day", strtotime($first_date))) ?> data-cid=" <?php echo $category->id ?>" data-date="<?php echo date("d-m-Y", strtotime("+4 day", strtotime($first_date))); ?>">
                    <?php if (empty($friDay2)) $d = "style=display:none";
                    else $d = ''; ?>
                    <img class="avatar" src="<?= $img; ?>" <?= $d; ?>>
                    <div class="tooltip1">
                        <img class="icon-cricle update_time_stainer" data-get_class="<?php echo date("d-m-Y", strtotime("+4 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                        <span class="tooltiptext1">Click Here</span>
                    </div>
                </div>

                <!-- Third -->
                <div class="first">
                    <input type='text' value="<?php echo $friDay3 ?>" name="<?php echo date("d-m-Y", strtotime("+4 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>][3]" class="timesheet_input timesheet_<?php echo date("d-m-Y", strtotime("+4 day", strtotime($first_date))) ?> data-cid=" <?php echo $category->id ?>" data-date="<?php echo date("d-m-Y", strtotime("+4 day", strtotime($first_date))); ?>">
                    <?php if (empty($friDay3)) $d = "style=display:none";
                    else $d = ''; ?>
                    <img class="avatar" src="<?= $img; ?>" <?= $d; ?>>
                    <div class="tooltip1">
                        <img class="icon-cricle update_time_stainer" data-get_class="<?php echo date("d-m-Y", strtotime("+4 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                        <span class="tooltiptext1">Click Here</span>
                    </div>
                </div>

                <!-- Fourth -->
                <div class="first">
                    <input type='text' value="<?php echo $friDay4 ?>" name="<?php echo date("d-m-Y", strtotime("+4 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>][4]" class="timesheet_input timesheet_<?php echo date("d-m-Y", strtotime("+4 day", strtotime($first_date))) ?> data-cid=" <?php echo $category->id ?>" data-date="<?php echo date("d-m-Y", strtotime("+4 day", strtotime($first_date))); ?>">
                    <?php if (empty($friDay4)) $d = "style=display:none";
                    else $d = ''; ?>
                    <img class="avatar" src="<?= $img; ?>" <?= $d; ?>>
                    <div class="tooltip1">
                        <img class="icon-cricle update_time_stainer" data-get_class="<?php echo date("d-m-Y", strtotime("+4 day", strtotime($first_date))); ?>[<?php echo $category->id; ?>]" src="<?php echo base_url('assets/img/icon-cricle.png'); ?>">
                        <span class="tooltiptext1">Click Here</span>
                    </div>
                </div>
            </td>
        </tr>
<?php }
} ?>