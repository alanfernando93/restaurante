<?php
$this->Paginator->options(array(
    'update' => '#contenedor',
    'before' => $this->Js->get('#procesando')->effect('fadeIn', array('buffer' => false)),
    'complete' => $this->Js->get('#procesando')->effect('fadeOut', array('buffer' => FALSE))
));
?>

<div id="contenedor">
    <h2><?php echo __('Roles'); ?></h2>
    <div class="row-fluid" style="padding-bottom: 8px;">
        <?php echo $this->Crud->addNew(__('Añadir'), 'add', 'icon-plus-2'); ?>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-inverse">
                <tr>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('role', 'descripcion'); ?></th>
                    <th><?php echo $this->Paginator->sort('created'); ?></th>
                    <th><?php echo $this->Paginator->sort('modified'); ?></th>
                    <th><?php echo $this->Paginator->sort('permission_id'); ?></th>
                    <th class="tableActs"><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($roles as $role): ?>
                    <tr>
                        <td><?php echo h($role['Role']['id']); ?>&nbsp;</td>
                        <td><?php echo h($role['Role']['role']); ?>&nbsp;</td>
                        <td><?php echo h($role['Role']['created']); ?>&nbsp;</td>
                        <td><?php echo h($role['Role']['modified']); ?>&nbsp;</td>
                        <td>
                            <?php echo $this->Html->link($role['Permission']['permisos'], array('controller' => 'permissions', 'action' => 'view', $role['Permission']['id'])); ?>
                        </td>
                        <td class="tableActs">                     
                            <?php echo $this->Crud->Imag('View', 'view', $role['Role']['id'], "&#xe081;"); ?>
                            <?php echo $this->Crud->Imag('Edit', 'edit', $role['Role']['id'], "&#xe1db;"); ?>
                            <?php echo $this->Crud->Imag('Delete', 'delete', $role['Role']['id'], "&#xe05d;", true); ?>
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
    <?php $this->Crud->printPaginator(); ?>
    <?php echo $this->Js->writeBuffer(); ?>
</div>