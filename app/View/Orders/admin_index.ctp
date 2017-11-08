<?php
$this->Paginator->options(array(
    'update' => '#contenedor',
    'before' => $this->Js->get('#procesando')->effect('fadeIn', array('buffer' => false)),
    'complete' => $this->Js->get('#procesando')->effect('fadeOut', array('buffer' => FALSE))
));
?>

<div id="contenedor">
    <h2><?php echo __('Orders'); ?></h2>
    <div class="row-fluid" style="padding-bottom: 8px;">
        <?php echo Crud::addNew(__('Añadir'), 'add', 'icon-plus-2'); ?>
    </div> 
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-inverse">
                <tr>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('descripcion'); ?></th>                    
                    <th><?php echo $this->Paginator->sort('nroMera', 'Mesa'); ?></th>                  
                    <th><?php echo $this->Paginator->sort('costoTotal'); ?></th>
                    <th><?php echo $this->Paginator->sort('created'); ?></th>
                    <th><?php echo $this->Paginator->sort('modified'); ?></th>
                    <th><?php echo $this->Paginator->sort('user_id'); ?></th>
                    <th class="tableActs"><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo h($order['Order']['id']); ?>&nbsp;</td>
                        <td><?php echo h($order['Order']['descripcion']); ?>&nbsp;</td>
                        <td><?php echo h($order['Order']['nroMesa']); ?>&nbsp;</td>
                        <td><?php echo h($order['Order']['costoTotal']); ?>&nbsp;</td>
                        <td><?php echo h($order['Order']['created']); ?>&nbsp;</td>
                        <td><?php echo h($order['Order']['modified']); ?>&nbsp;</td>
                        <td>
                            <?php echo $this->Html->link($order['User']['username'], array('controller' => 'users', 'action' => 'view', $order['User']['id'])); ?>
                        </td>
                        <td class="tableActs">                     
                            <?php echo Crud::Imag('View', 'view', $order['Order']['id'], "&#xe081;"); ?>
                            <?php echo Crud::Imag('Edit', 'edit', $order['Order']['id'], "&#xe1db;"); ?>
                            <?php echo Crud::Imag('Delete', 'delete', $order['Order']['id'], "&#xe05d;", true); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="progress oculto" id="procesando">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
            <span class="sr-only">100% Complete</span>
        </div>
    </div>
    <?php Paginator::printP(); ?>
    <?php echo $this->Js->writeBuffer(); ?>
</div>