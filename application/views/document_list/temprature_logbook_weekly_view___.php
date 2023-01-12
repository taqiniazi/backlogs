<?php
$logData = json_decode($result['log_data'], true);
$currentdate = date('d-m-Y');

$FirstDay = substr($weekdate,0,10);


if(strtotime(date('d-m-Y',strtotime($FirstDay))) < strtotime(date("d-m-Y"))) $monday = 0; else $monday=1;
if(strtotime(date("d-m-Y",strtotime("+1 day", strtotime($FirstDay)))) < strtotime(date("d-m-Y"))) $tuesday = 0; else $tuesday = 1;
if(strtotime(date("d-m-Y",strtotime("+2 day", strtotime($FirstDay)))) < strtotime(date("d-m-Y"))) $wednesday = 0; else $wednesday = 1;
if(strtotime(date("d-m-Y",strtotime("+3 day", strtotime($FirstDay)))) < strtotime(date("d-m-Y"))) $thursday = 0; else $thursday = 1;
if(strtotime(date("d-m-Y",strtotime("+4 day", strtotime($FirstDay)))) < strtotime(date("d-m-Y"))) $friday = 0;  else $friday = 1;

?>
<tr>
    <td>
        <!-- <input type="text" class="form-control temp_input" name='equipment_item' value="<?= $logData['equipment_item'] ?>"> -->
        Ambient temperature
    </td>
    <td>
        <input type="text" class="form-control temp_input" name='range' value="<?= $logData['range'] ?>">
    </td>
    <td style="background-color:<?= ($currentdate == date('d-m-Y',strtotime($FirstDay)))?'#00c5fb':''; ?>; <?= ($monday)?'':'background-color: #ddd;pointer-events:none;'; ?> ">
        <label>
            <input type="text" class="form-control temp_input" name='monday' value="<?= $logData['monday'] ?>">
        </label>
    </td>
    <td style="background-color:<?= ($currentdate == date('d-m-Y',strtotime("+1 day",strtotime($FirstDay)))  )?'#00c5fb':''; ?>; <?= ($tuesday)?'':'background-color: #ddd;pointer-events:none;'; ?>">
        <label>

            <input type="text" class="form-control temp_input" name='tuesday' value="<?= $logData['tuesday'] ?>">
        </label>
    </td>
    <td style="background-color:<?= ($currentdate == date('d-m-Y',strtotime("+2 day",strtotime($FirstDay)))   )?'#00c5fb':''; ?>; <?= ($wednesday)?'':'background-color: #ddd;pointer-events:none;'; ?>">
        <label>
            <input type="text" class="form-control temp_input" name='wednesday' value="<?= $logData['wednesday'] ?>">

        </label>
    </td>
    <td style="background-color:<?= ($currentdate == date('d-m-Y',strtotime("+3 day",strtotime($FirstDay)))   )?'#00c5fb':''; ?>; <?= ($thursday)?'':'background-color: #ddd;pointer-events:none;'; ?>">
        <label>

            <input type="text" class="form-control temp_input" name='thursday' value="<?= $logData['thursday'] ?>">
        </label>
    </td>
    <td style="background-color:<?= ($currentdate == date('d-m-Y',strtotime("+4 day",strtotime($FirstDay)))   )?'#00c5fb':''; ?>; <?= ($friday)?'':'background-color: #ddd;pointer-events:none;'; ?>">
        <label>

            <input type="text" class="form-control temp_input" name="friday" value="<?= $logData['friday'] ?>">
        </label>
    </td>
</tr>


<tr>
    <td>
        <!-- <input type="text" class="form-control temp_input" name='equipment_item1' value="<?= $logData['equipment_item1'] ?>"> -->
        Water bath
    </td>
    <td>
        <input type="text" class="form-control temp_input" name='range1' value="<?= $logData['range1'] ?>">
    </td>
    <td style="background-color:<?= ($currentdate == date('d-m-Y',strtotime($FirstDay))  )?'#00c5fb':''; ?>; <?= ($monday)?'':'background-color: #ddd;pointer-events:none;'; ?>">
        <label>
            <input type="text" class="form-control temp_input" name='monday1' value="<?= $logData['monday1'] ?>">

        </label>
    </td>
    <td style="background-color:<?= ($currentdate == date('d-m-Y',strtotime("+1 day",strtotime($FirstDay))) )?'#00c5fb':''; ?>; <?= ($tuesday)?'':'background-color: #ddd;pointer-events:none;'; ?>">
        <label>
            <input type="text" class="form-control temp_input" name='tuesday1' value="<?= $logData['tuesday1'] ?>">

        </label>
    </td>
    <td style="background-color:<?= ($currentdate == date('d-m-Y',strtotime("+2 day",strtotime($FirstDay)))   )?'#00c5fb':''; ?>; <?= ($wednesday)?'':'background-color: #ddd;pointer-events:none;'; ?>">
        <label>
            <input type="text" class="form-control temp_input" name='wednesday1' value="<?= $logData['wednesday1'] ?>">

        </label>
    </td>
    <td style="background-color:<?= ($currentdate == date('d-m-Y',strtotime("+3 day",strtotime($FirstDay)))   )?'#00c5fb':''; ?>; <?= ($thursday)?'':'background-color: #ddd;pointer-events:none;'; ?>">
        <label>
            <input type="text" class="form-control temp_input" name='thursday1' value="<?= $logData['thursday1'] ?>">

        </label>
    </td>
    <td style="background-color:<?= ($currentdate == date('d-m-Y',strtotime("+4 day",strtotime($FirstDay)))  )?'#00c5fb':''; ?>; <?= ($friday)?'':'background-color: #ddd;pointer-events:none;'; ?>">
        <label>

            <input type="text" class="form-control temp_input" name="friday1" value="<?= $logData['friday1'] ?>">
        </label>
    </td>
</tr>