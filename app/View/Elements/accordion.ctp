<div class="col-sm-2 col-md-2F">
    <div class="panel panel-default">
        <div class="panel-heading">
            Administration Panel
        </div>
        <div id="mainmenu" class="panel-group">
            <div class="panel panel-default">
                <a href="#menupos2" class="list-group-item" data-toggle="collapse" data-parent="#mainmenu"><span class="glyphicon glyphicon-th"></span> <?php print __('Modules'); ?> <span class="glyphicon glyphicon-chevron-down"></span></a>
                <div class="collapse pos-absolute" id="menupos2">
                    <?php echo $this->Acordion->item(__('Categories'), 'categories', '#menupos2'); ?>
                    <?php echo $this->Acordion->item(__('Orders'), 'orders', '#menupos2'); ?>
                    <?php echo $this->Acordion->item(__('Products'), 'products', '#menupos2'); ?>
                    <?php echo $this->Acordion->item(__('Permissions'), 'permissions', '#menupos2'); ?>
                    <?php echo $this->Acordion->item(__('Roles'), 'roles', '#menupos2'); ?>
                    <?php echo $this->Acordion->item(__('Users'), 'users', '#menupos2'); ?>
                </div>
            </div>
            <div class="panel panel-default">
                <a href="#menupos3" class="list-group-item" data-toggle="collapse" data-parent="#mainmenu"><span class="glyphicon glyphicon-user">
                    </span> <?php echo __('Manegement'); ?><span class="glyphicon glyphicon-chevron-down"></span></a>
                <div class="collapse pos-absolute" id="menupos3">
                    <?php echo $this->Acordion->item(__('Settings'), 'settings', '#menupos3'); ?>                                                                   
                </div>
            </div>
            <!--<div class="panel panel-default">
                <a href="#menupos4" class="list-group-item" data-toggle="collapse" data-parent="#mainmenu"><span class="glyphicon glyphicon-file">
                    </span> Reports <span class="glyphicon glyphicon-chevron-down"></span></a>
                <div class="collapse pos-absolute" id="menupos4">
                    <a href="#submenu4" class="list-group-item sub-item" data-toggle="collapse" data-parent="#submenu3">SubPos1 <span class="glyphicon glyphicon-chevron-down"></span></a>
                    <div class="collapse list-group-submenu" id="submenu4">
                        <a href="#" class="list-group-item sub-sub-item" data-parent="#submenu4">SubSubPos1</a>
                        <a href="#" class="list-group-item sub-sub-item" data-parent="#submenu4">SubSubPos2</a>
                        <a href="#" class="list-group-item sub-sub-item" data-parent="#submenu4">SubSubPos3</a>
                        <a href="#" class="list-group-item sub-sub-item" data-parent="#submenu4">SubSubPos4</a>
                    </div>
                    <a href="#" data-toggle="collapse" data-target="#menupos4" class="list-group-item sub-item">SubPos2</a>
                    <a href="#" data-toggle="collapse" data-target="#menupos4" class="list-group-item sub-item">SubPos3</a>
                    <a href="#" data-toggle="collapse" data-target="#menupos4" class="list-group-item sub-item">SubPos4</a>
                    <a href="#" data-toggle="collapse" data-target="#menupos4" class="list-group-item sub-item">SubPos5</a>                                                                    
                </div>
            </div>-->
        </div>
    </div>
</div>