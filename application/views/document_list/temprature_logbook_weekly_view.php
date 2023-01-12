<?php
$logData = json_decode($result['log_data'], true);

$categories = array("Ambient temperature","Water bath","Fridge","Autoclave");
$uid = $this->ion_auth->user()->row()->id;
foreach($categories as $key=>$value):


?>

<tr>
    <input type="hidden" id="logUserId" value="<?= $uid ?>"/>
    <td>
        <!-- <input type="text" class="form-control temp_input" name='equipment_item' value="<?= $logData['equipment_item'] ?>"> -->
        <?=$value?>
    </td>
    <td>
        <input type="text" class="form-control temp_input" name='range<?=$key?>' value="<?= $logData['range'.$key] ?>">

    </td>
    <td <?= (!empty($logData['monday'.$key])?'class="icon_active"':'') ?>>
        <label>
            <input type="text" class="form-control temp_input" name='monday<?=$key?>' value="<?= $logData['monday'.$key] ?>">
        </label>
        <i class="fa fa-comment view_comments"  name="monday<?=$key?>-com" data-comments="<?= $logData['monday'.$key] ?>-comment" style="cursor:pointer;"></i>
        <input type="hidden" name="monday<?=$key?>-com" value='<?= ($logData['monday'.$key.'-com'] != null) ? $logData['monday'.$key.'-com']: "" ?>'  id="monday<?=$key?>-com"/>
    </td>
    <td <?= (!empty($logData['tuesday'.$key])?'class="icon_active"':'') ?>>
        <label>

            <input type="text" class="form-control temp_input" name='tuesday<?=$key?>' value="<?= $logData['tuesday'.$key] ?>">
        </label>
        <i class="fa fa-comment view_comments"  name="tuesday<?=$key?>-com" data-comments="<?= $logData['tuesday'.$key] ?>-comment" style="cursor:pointer;"></i>
        <input type="hidden" name="tuesday<?=$key?>-com" value='<?= ($logData['tuesday'.$key.'-com'] != null) ? $logData['tuesday'.$key.'-com']: "" ?>'  id="tuesday<?=$key?>-com"/>
    </td>
    <td <?= (!empty($logData['wednesday'.$key])?'class="icon_active"':'') ?>>
        <label>
            <input type="text" class="form-control temp_input" name='wednesday<?=$key?>' value="<?= $logData['wednesday'.$key] ?>">
        </label>
        <i class="fa fa-comment view_comments"  name="wednesday<?=$key?>-com" data-comments="<?= $logData['wednesday'.$key] ?>-comment" style="cursor:pointer;"></i>
        <input type="hidden" name="wednesday<?=$key?>-com" value='<?= ($logData['wednesday'.$key.'-com'] != null) ? $logData['wednesday'.$key.'-com']: "" ?>'  id="wednesday<?=$key?>-com"/>
    </td>
    <td <?= (!empty($logData['thursday'.$key])?'class="icon_active"':'') ?>>
        <label>

            <input type="text" class="form-control temp_input" name='thursday<?=$key?>' value="<?= $logData['thursday'.$key] ?>">
        </label>
        <i class="fa fa-comment view_comments"  name="thursday<?=$key?>-com" data-comments="<?= $logData['thursday'.$key] ?>-comment" style="cursor:pointer;"></i>
        <input type="hidden" name="thursday<?=$key?>-com" value='<?= ($logData['thursday'.$key.'-com'] != null) ? $logData['thursday'.$key.'-com']: "" ?>'  id="thursday<?=$key?>-com"/>
    </td>
    <td <?= (!empty($logData['friday'.$key])?'class="icon_active"':'') ?>>
        <label>

            <input type="text" class="form-control temp_input" name="friday<?=$key?>" value="<?= $logData['friday'.$key] ?>">
        </label>
        <i class="fa fa-comment view_comments"  name="friday<?=$key?>-com" data-comments="<?= $logData['friday'.$key] ?>-comment" style="cursor:pointer;"></i>
        <input type="hidden" name="friday<?=$key?>-com" value='<?= ($logData['friday'.$key.'-com'] != null) ? $logData['friday'.$key.'-com']: "" ?>'  id="friday<?=$key?>-com"/>
    </td>
</tr>

<?php endforeach; ?>