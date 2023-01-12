<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <style>
        .main {
            margin: 0 auto;
            text-align: center;            
            min-height:95px !important;
            width: 95px !important;
            overflow:hidden;                
        }
        table{
            font-size:10px !important;
        } 
        .barcode_wrap{
            border: 0px solid #777;padding: 2px;border-radius: 0px;
        }   
        #barcode_img{ max-width: 90px; }    
        </style> -->
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
                max-width: 90px;
            }
        </style>
        <script type='text/javascript'>            
            window.print();
            setTimeout(function(){                
                var domain = location.host
                if(domain == 'localhost'){
                    $url = 'http://'+domain+'/fnqhpathology/Slide_label';
                }else{
                    $url = 'http://'+domain+'/Slide_label';
                }
                window.location.href = $url;
            },400)
        </script>
    </head>
    <body style="text-align:left; margin:0px; padding:0px">
        <?php        
        if(!empty($sp_data)){
            foreach($sp_data as $row)
            {
                $img = '../barcodes/'.$row['barcode_img'];
                ?>
                <div class='main' style="margin-bottom:15px;">
                        <center class='center_class'>
                            <div class="barcode_wrap">
                                <center><img src="<?= $img; ?>" id="barcode_img" alt="Barcode">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">
                                                    <center><?php echo $row['first_name'].' '.$row['last_name']; ?></center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <center><?= $row['dob']; ?></center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <center><?= $row['specimen']; ?></center>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </center>
                            </div>
                        </center>
                    </div>
                <?php 
            }
        }else{
            echo '<center>No thing to print</center>';
        }
        ?>                
    </body>
</html>
