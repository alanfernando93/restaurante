<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
//require_once APPLIBS.'acordionMenu.php';
$cakeDescription = __d('cake_dev', 'Administracion');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $cakeDescription ?>:
            <?php echo $title_for_layout; ?>
        </title>
        <?php
        echo $this->Html->meta('icon');
        ?>
        <?php
        $css = array(
            'fileinput.min',
            'style.css',
            'bootstrap.min',
            //'jquery-ui.min', 
            'theme',
            'font'
        );
        echo $this->Html->css($css);
        $script = array(
            'jquery.min',
            'bootstrap.min',
            //'jquery-ui.min',
            //'search', 
            'jquery.sheepItPlugin'
        );
        echo $this->Html->script($script);
        ?>
        <script src="<?php echo $this->webroot; ?>js/fileinput.min.js"></script>
        <?php
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>
        <?php echo $this->element('admin_menu'); ?>
        <?php //debug($current_user);  ?>
        <div class="container-fluid">
            <?php echo $this->element('accordion'); ?>
            <div class="col-sm-10 col-md-10">
                <div class="container-fluid well">
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->Session->flash('auth'); ?>
                    <?php echo $this->fetch('content'); ?>
                </div>
            </div>
        </div>
    </body>
    <script>
        $("#photo").fileinput();
    </script>
</html>