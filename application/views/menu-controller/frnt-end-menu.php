<ul>
<?php if($controller == 'doctor' && $method == 'doctor_record_detail_old'){ ?>
    <li class="menu-title"><span><a href='<?php echo site_url($zeroLevelItem['link'])?>'><?php echo ($zeroLevelItem['icon']!='')?"<i class='".$zeroLevelItem['icon']."'></i>":"";?><?php echo $zeroLevelItem['name']?></a></span>
    <li class="submenu"><a href='javascript:void(0);'><i class="la la-dashboard"></i><span>Previous Case</span></a></li>
    <li class="submenu"><a href='javascript:void(0);'><i class="la la-tasks"></i><span>Next Case</span></a></li>
    <li class="submenu"><a href='javascript:void(0);'><i class="la la la-binoculars"></i><span>Amend Case</span></a></li>
    <li class="submenu"><a href='javascript:void(0);'><i class="la la-edit"></i><span>Reassign</span></a></li>
    <li class="submenu"><a href='javascript:void(0);'><i class="la la-hourglass-half"></i><span>Request</span></a></li>
    <li class="submenu"><a href='javascript:void(0);'><i class="la la-street-view"></i><span>Printable Report</span></a></li>
    <li class="submenu"><a href='javascript:void(0);'><i class="la la-stethoscope"></i><span>Patient History</span></a></li>
<?php } elseif($controller == 'doctor' && $method == 'doctor_record_list'){ ?>
    <li class="menu-title"><span><a href='<?php echo site_url($zeroLevelItem['link'])?>'><?php echo ($zeroLevelItem['icon']!='')?"<i class='".$zeroLevelItem['icon']."'></i>":"";?><?php echo $zeroLevelItem['name']?></a></span>
    <li class="submenu"><a href='javascript:void(0);'><i class="la la-dashboard"></i><span>Groups</span></a></li>
    <li class="submenu"><a href='javascript:void(0);'><i class="la la-tasks"></i><span>Resevoir</span></a></li>
    <li class="submenu"><a href='javascript:void(0);'><i class="la la la-binoculars"></i><span>Find Case</span></a></li>
    <li class="submenu"><a href='javascript:void(0);'><i class="la la-edit"></i><span>Personal Details</span></a></li>
    <li class="submenu"><a href='javascript:void(0);'><i class="la la-hourglass-half"></i><span>Finances</span></a></li>
    <li class="submenu"><a href='javascript:void(0);'><i class="la la-street-view"></i><span>Support</span></a></li>
<?php } else { ?>
    <?php foreach($menuArr as $zeroLevelItem):?>
    <?php if($zeroLevelItem['link']!=''):?>
        <li class="menu-title"><span><a href='<?php echo site_url($zeroLevelItem['link'])?>'><?php echo ($zeroLevelItem['icon']!='')?"<i class='".$zeroLevelItem['icon']."'></i>":"";?><?php echo $zeroLevelItem['name']?></a></span>
    <?php else:?>
        <li class="menu-title"><span><?php echo ($zeroLevelItem['link']!='')?"<i class='".$zeroLevelItem['icon']."'></i>":"";?><?php echo $zeroLevelItem['name']?></span>
    <?php endif;?>
    
    <?php if(!empty($zeroLevelItem['items'])):?>
        <li class="submenu">
            <?php foreach($zeroLevelItem['items'] as $subItems):?>
                <?php if(!empty($subItems['items'])):
                        $data['subItems'] = $subItems;
                        echo $this->load->view('menu-controller/frnt-end-sub-menu',$data,true);
                    ?>
                <?php else:?>
                    <a href="<?php echo ($subItems['link']!='')?site_url($subItems['link']):"#"; ?>"><i class="<?php echo $subItems['icon']; ?>"></i> <span><?php echo $subItems['name']; ?></span></a>
                <?php endif;?>
            <?php endforeach;?> 
        </li>
    <?php endif;?>
<?php endforeach;?>
<?php } ?>

</ul>