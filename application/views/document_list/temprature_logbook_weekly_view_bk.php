<?php
$logData = json_decode($result['log_data'], true);

$categories = array("Ambient temperature","Water bath","Fridge","Autoclave");

foreach($categories as $key=>$value):


?>

<tr>
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
    </td>
    <td <?= (!empty($logData['tuesday'.$key])?'class="icon_active"':'') ?>>
        <label>

            <input type="text" class="form-control temp_input" name='tuesday<?=$key?>' value="<?= $logData['tuesday'.$key] ?>">
        </label>
    </td>
    <td <?= (!empty($logData['wednesday'.$key])?'class="icon_active"':'') ?>>
        <label>
            <input type="text" class="form-control temp_input" name='wednesday<?=$key?>' value="<?= $logData['wednesday'.$key] ?>">

        </label>
    </td>
    <td <?= (!empty($logData['thursday'.$key])?'class="icon_active"':'') ?>>
        <label>

            <input type="text" class="form-control temp_input" name='thursday<?=$key?>' value="<?= $logData['thursday'.$key] ?>">
        </label>
    </td>
    <td <?= (!empty($logData['friday'.$key])?'class="icon_active"':'') ?>>
        <label>

            <input type="text" class="form-control temp_input" name="friday<?=$key?>" value="<?= $logData['friday'.$key] ?>">
        </label>
    </td>
</tr>

<?php endforeach; ?>