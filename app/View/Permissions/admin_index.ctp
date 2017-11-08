<?php
$this->Paginator->options(array(
    'update' => '#contenedor',
    'before' => $this->Js->get('#procesando')->effect('fadeIn', array('buffer' => false)),
    'complete' => $this->Js->get('#procesando')->effect('fadeOut', array('buffer' => FALSE))
));
?>

<div id="contenedor">
    <h2><?php echo __('Permissions'); ?></h2>
    <div class="row-fluid" style="padding-bottom: 8px;">
        <?php echo Crud::addNew(__('Añadir'), 'add', 'icon-plus-2'); ?>
    </div> 
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-inverse">
                <tr>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('permisos', 'Descripcion'); ?></th>
                    <th><?php echo $this->Paginator->sort('created'); ?></th>
                    <th><?php echo $this->Paginator->sort('modified'); ?></th>
                    <th class="tableActs"><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($permissions as $permission): ?>
                    <tr>
                        <td><?php echo h($permission['Permission']['id']); ?>&nbsp;</td>
                        <td><?php echo h($permission['Permission']['permisos']); ?>&nbsp;</td>
                        <td><?php echo h($permission['Permission']['created']); ?>&nbsp;</td>
                        <td><?php echo h($permission['Permission']['modified']); ?>&nbsp;</td>
                        <td class="tableActs">                     
                            <?php echo Crud::Imag('View', 'view', $permission['Permission']['id'], "&#xe081;"); ?>
                            <?php echo Crud::Imag('Edit', 'edit', $permission['Permission']['id'], "&#xe1db;"); ?>
                            <?php echo Crud::Imag('Delete', 'delete', $permission['Permission']['id'], "&#xe05d;", true); ?>
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
