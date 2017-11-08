<div class="main">
    <div class="wrapper">
        <h1><a href="index.html">El Salesianito<span>.bo</span></a></h1>
        <nav>
            <ul class="menu">
                <li><?php echo $this->Html->link(__('Home'), array('controller' => 'welcome', 'action' => 'display'), !empty($welcome) ? $welcome : null); ?></li>
                <li><?php echo $this->Html->link(__('Menu'), array('controller' => 'Menu'), !empty($menu) ? $menu : null); ?></li>
                <li><?php echo $this->Html->link(__('Catalogue'), array('controller' => 'Catalogue'), !empty($catalogue) ? $catalogue : null); ?></li>
                <li><?php echo $this->Html->link(__('About as'), array('controller' => 'About'), !empty($about) ? $about : null); ?></li>
                <li><?php echo $this->Html->link(__('Contact'), array('controller' => 'Contact'), !empty($contact) ? $contact : null); ?></li>
                <li><?php echo $this->Html->link('Login', array('admin' => true, 'prefix' => 'admin', 'controller' => 'users', 'action' => 'login')); ?></li>
            </ul>
        </nav>
    </div>
</div>