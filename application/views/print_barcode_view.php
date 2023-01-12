<?php
if (!empty($records)) { ?>
    <style>
        .main {

            text-align: left;
            min-height: 95px !important;
            width: 155px !important;
            overflow: hidden !important;
        }

        table {
            font-size: 10px !important;
        }

        td {
            line-height: 13px;
        }

        .barcode_wrap {
            border: 1px solid #777;
            padding: 2px;
            border-radius: 5px;
        }

        #barcode_img {
            max-width: 55px !important;
        }

        .qrlogo {
            max-width: 60px !important;
            max-height: 60px !important;
            object-fit: cover;
            /* mix-blend-mode: multiply; */
        }

        .d-flex {
            display: flex;
            align-items: center;
            justify-content: space-around;
        }
    </style>

    <?php
    $specimenIndex = 0;
    foreach ($records as $key => $row) {
        $img = './barcodes/' . $row['barcode_image'];
        if ($barcode_image) {
            $img = $barcode_image;
        }
        if ($row['test'] != '') {
            $tests = explode(",",  $row['test']);
            foreach ($tests as $key => $test) {
                $block_name = '';
                // if($action_type != ""){
                $testInfo = explode("_", $test);
                $sp_data = explode(",", $row['sp_id']);
                $specimenIndex = array_search($testInfo[1], $sp_data);
                $specimenIndex = $specimenIndex + 1;
                $test = $testInfo[0];
                $block_name = $testInfo[2];
                // }
                //if ($test != '') {
    ?>
                <div class='main' style="margin-bottom:15px;">
                    <center class='center_class'>
                        <div class="barcode_wrap">
                            <center>
                                <div class="d-flex">
                                    <img src="<?= $img; ?>" id="barcode_img" class="imgWrap" alt="Barcode">
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
                                        <?php if ($a_type != 'request') { ?>
                                            <?php if ($action_type != 'sp_pot') { ?>
                                            <tr class="hide">
                                                <td class="text-center">
                                                    <center><?= ($test != '') ? $test . " " . $block_name : "H&E" . " " . $block_name; ?></center>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <?php if ($action_type != "" && $action_type == 'sp_pot') { ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <center>Specimen <?= $specimenIndex ?></center>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                </div>
                                
                            </center>
                        </div>
                    </center>
                </div>
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
                                            <center><?= $row['test']; ?></center>
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