<div class="row">
         <div class="col-md-6 col-sm-6 col-lg-3 col-xl-3">
         <a href="<?php echo base_url('Document_List/labortary_task_checklist'); ?>">
            <div class="card dash-widget">
                <div class="card-body">
                    <!-- <span class="dash-widget-icon"></span> -->
                   <span class="dash-widget-icon">
                   <i class="la la-network-wired"></i>
                    </span>
                    <div class="dash-widget-info">
                        <h3><?= $lab_task;  ?></h3>
                        <span>Laboratory Task Checklist</span>
                    </div>
                </div>
            </div>
            </a>
        </div> 
        <div class="col-md-6 col-sm-6 col-lg-3 col-xl-3">
        <a href="<?php echo base_url('Document_List/improvment_corrective_action_register'); ?>">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-hospital-o"></i></span>
                    <div class="dash-widget-info">
                        <h3><?= $cor_act;  ?></h3>
                        <span>Corrective Action Register</span>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3 col-xl-3">
        <a href="<?php echo base_url('Document_List/monthaly_stainer_checklist'); ?>">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon">
                        <img src="<?php echo base_url();?>assets/icons/laboratory_icon.png" class="img-fluid"/>
                    </span>
                    <div class="dash-widget-info">
                        <h3><?= $mon_sta;  ?></h3>
                        <span>Monthaly Stainer Checklist</span>
                    </div>
                </div>
            </div>
            </a>
        </div>
     
        <div class="col-md-6 col-sm-6 col-lg-3 col-xl-3">
        <a href="<?php echo base_url('Document_List/monthaly_task_checklist'); ?>">
            <div class="card dash-widget">
                <div class="card-body">
                <span class="dash-widget-icon">
                    <img src="<?php echo base_url('assets/icons/pathologist.svg'); ?>" class="img-fluid"/>
                </span>
                    <div class="dash-widget-info">
                        <h3>12</h3>
                        <span>Monthaly Task Checklist</span>                   
                    </div>
                </div>
            </div>
            </a>
        </div>

        <div class="col-md-6 col-sm-6 col-lg-3 col-xl-3">
        <a href="<?php echo base_url('Document_List/physical_asset_register'); ?>">
            <div class="card dash-widget">
                <div class="card-body">
                <span class="dash-widget-icon">
                    <img src="<?php echo base_url('assets/icons/pathologist.svg'); ?>" class="img-fluid"/>
                </span>
                    <div class="dash-widget-info">
                        <h3><?= $phy_ass;  ?></h3>
                        <span>Physical Asset Register</span>                   
                    </div>
                </div>
            </div>
            </a>
        </div>

        <div class="col-md-6 col-sm-6 col-lg-3 col-xl-3">
        <a href="<?php echo base_url('Document_List/reagent_consumable_register'); ?>">
            <div class="card dash-widget">
                <div class="card-body">
                <span class="dash-widget-icon">
                    <img src="<?php echo base_url('assets/icons/pathologist.svg'); ?>" class="img-fluid"/>
                </span>
                    <div class="dash-widget-info">
                        <h3><?= $rea_con;  ?></h3>
                        <span>Reagent Consumable Register</span>                   
                    </div>
                </div>
            </div>
            </a>
        </div>

        <div class="col-md-6 col-sm-6 col-lg-3 col-xl-3">
        <a href="<?php echo base_url('Document_List/supplier_list'); ?>">
            <div class="card dash-widget">
                <div class="card-body">
                <span class="dash-widget-icon">
                    <img src="<?php echo base_url('assets/icons/pathologist.svg'); ?>" class="img-fluid"/>
                </span>
                    <div class="dash-widget-info">
                        <h3><?= $sup_lis;  ?></h3>
                        <span>Supplier List</span>                   
                    </div>
                </div>
            </div>
            </a>
        </div>

        <div class="col-md-6 col-sm-6 col-lg-3 col-xl-3">
        <a href="<?php echo base_url('Document_List/temperature_logbook'); ?>">
            <div class="card dash-widget">
                <div class="card-body">
                <span class="dash-widget-icon">
                    <img src="<?php echo base_url('assets/icons/pathologist.svg'); ?>" class="img-fluid"/>
                </span>
                    <div class="dash-widget-info">
                        <h3><?= $temp;  ?></h3>
                        <span>Temperature Log Book</span>                   
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>
</div>