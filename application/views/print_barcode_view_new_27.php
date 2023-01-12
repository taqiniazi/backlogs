<?php
if (!empty($records)) { ?>
    <style>
        .main {
          
            text-align: left;
            min-height: 95px !important;
            width: 95px !important;
            overflow: hidden;
        }

        table {
            font-size: 10px !important;
        }
        td{
            line-height: 13px;
        }
        .barcode_wrap {
            border: 1px solid #777;
            padding: 2px;
            border-radius: 5px;
        }

        #barcode_img {
            max-width: 110px;
        }
    </style>

    <?php
    $specimenIndex = 0;
    foreach ($records as $key => $row) {
        $img = './barcodes/' . $row['barcode_image'];
        if($barcode_image){
            $img = $barcode_image;
        }
        if ($row['test'] != '') {
            $tests = explode(",",  $row['test']);
            if($action_type != "" && $action_type == 'sp_pot'){
                $tests = explode(",",  $row['sp_id']);
            }
            foreach ($tests as $key1 => $test) 
			{
                $block_name = '';
                if($action_type != "" && $action_type != 'sp_pot'){
                    $testInfo = explode("_",$test);
                    $sp_data = explode(",",$row['sp_id']);
                    $specimenIndex = array_search($testInfo[1],$sp_data);
                    $specimenIndex = $specimenIndex + 1;
                    $test = $testInfo[0];
                    $block_name = $testInfo[2];
                }else{
                    $specimenIndex = $key1 + 1;
                }
                //if ($test != '') {
                     ?>
                    <div class='main' style="margin-bottom:15px;">
                        <center class='center_class'>
                            <div class="barcode_wrap">
                                <center><img src="<?= $img; ?>" id="barcode_img" alt="Barcode">
                                    <table>
                                        <tbody>
                                            <!-- <tr>
                                                <td class="text-center">
                                                    <center><?= $row['digi_number']; ?></center>
                                                </td>
                                            </tr> -->
                                            <tr>
                                                <td class="text-center">
                                                    <center><?php echo $row['lab_number']; ?></center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <center><?= $row['patient_name']; ?></center>
                                                </td>
                                            </tr>
                                            <?php if($action_type != "" && $action_type == 'sp_pot'){ ?>
                                            <tr>
                                                <td class="text-center" style="display:none">
                                                    <center><?=($test != '') ? $test." ".$block_name: "H&E"." ".$block_name; ?></center>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="text-center">
                                                    <center>Specimen <?=$specimenIndex ?></center>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </center>
                            </div>
                        </center>
                    </div>
                     <?php if($action_type != "" && $action_type == 'sp_pot'){ ?>
                     <div class='main' style="margin-bottom:15px;">
                        <center class='center_class'>
                            <div class="barcode_wrap">
                                <center><img src="<?= $img; ?>" id="barcode_img" alt="Barcode">
                                    <table>
                                        <tbody>
                                            <!-- <tr>
                                                <td class="text-center">
                                                    <center><?= $row['digi_number']; ?></center>
                                                </td>
                                            </tr> -->
                                            <tr>
                                                <td class="text-center">
                                                    <center><?php echo $row['lab_number']; ?></center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <center><?= $row['patient_name']; ?></center>
                                                </td>
                                            </tr>
                                            <?php if($action_type != "" && $action_type == 'sp_pot'){ ?>
                                            <tr>
                                                <td class="text-center" style="display:none">
                                                    <center><?=($test != '') ? $test." ".$block_name: "H&E"." ".$block_name; ?></center>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="text-center">
                                                    <center>Specimen <?=$specimenIndex ?></center>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </center>
                            </div>
                        </center>
                    </div>
                     <?php } ?>                  
            <?php
                //} 
            } ?>
        <?php } else { ?>
            <div class='main' style="margin-bottom:15px;">
                <center class='center_class'>
                    <div class="barcode_wrap">
                        <center><img src="<?= $img; ?>" id="barcode_img" alt="Barcode">
                            <table>
                                <tbody>
                                    <!-- <tr>
                                        <td class="text-center">
                                            <center><?= $row['digi_number']; ?></center>
                                        </td>
                                    </tr> -->
                                    <tr>
                                        <td class="text-center">
                                            <center><?php echo $row['lab_number']; ?></center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <center><?= $row['patient_name']; ?></center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <center>/// <?= $row['test']; ?></center>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </center>
                    </div>
                </center>
            </div>
        <?php } ?>


<?php
    }
}
?>