<?php
$this->Paginator->options(array(
    'update' => '#contenedor',
    'before' => $this->Js->get('#procesando')->effect('fadeIn', array('buffer' => false)),
    'complete' => $this->Js->get('#procesando')->effect('fadeOut', array('buffer' => FALSE))
));
?>

<div id="contenedor">
    <h2><?php echo __('Products'); ?></h2>
    <div class="row-fluid" style="padding-bottom: 8px;">
        <?php echo Crud::addNew(__('Add'), 'add', 'icon-plus-2'); ?>
    </div> 
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-inverse">
                <tr>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('nombre'); ?></th>
                    <th><?php echo $this->Paginator->sort('stock'); ?></th>
                    <th><?php echo $this->Paginator->sort('precio'); ?></th>
                    <th><?php echo $this->Paginator->sort('photo'); ?></th>
                    <th><?php echo $this->Paginator->sort('created'); ?></th>
                    <th><?php echo $this->Paginator->sort('modified'); ?></th>
                    <th><?php echo $this->Paginator->sort('category_id'); ?></th>
                    <th class="tableActs"><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo h($product['Product']['id']); ?>&nbsp;</td>
                        <td><?php echo h($product['Product']['nombre']); ?>&nbsp;</td>
                        <td><?php echo h($product['Product']['stock']); ?>&nbsp;</td>
                        <td><?php echo h($product['Product']['precio']); ?>&nbsp;</td>
                        <td><?php echo $this->Html->image('../files/product/photo/' . $product['Product']['photo_dir'] . '/thumb_' . $product['Product']['photo']); ?>&nbsp;</td>
                        <td><?php echo h($product['Product']['created']); ?>&nbsp;</td>
                        <td><?php echo h($product['Product']['modified']); ?>&nbsp;</td>
                        <td>
                            <?php echo $this->Html->link($product['Category']['descripcion'], array('controller' => 'categories', 'action' => 'view', $product['Category']['id'])); ?>
                        </td>
                        <td class="tableActs">                     
                            <?php echo Crud::Imag('View', 'view', $product['Product']['id'], "&#xe081;"); ?>
                            <?php echo Crud::Imag('Edit', 'edit', $product['Product']['id'], "&#xe1db;"); ?>
                            <?php echo Crud::Imag('Delete', 'delete', $product['Product']['id'], "&#xe05d;", true); ?>
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