<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid nuevo">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="" onclick="window.open('<?php print $this->webroot; ?>')"><?php print __d('admin', "El Salesianito"); ?></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo!empty($current_user) ? $current_user['username'] : ''; ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Page 1-1</a></li>
                        <li><a href="#">Page 1-2</a></li>
                        <li><?php echo $this->Html->link($this->Html->tag('span', ' Logout', array('class' => 'glyphicon glyphicon-log-in')), array('controller' => 'users', 'action' => 'logout'), array('escape' => false)); ?></li>
                    </ul>
                </li>                
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>