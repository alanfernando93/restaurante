<?php
$this->Paginator->options(array(
    'update' => '#contenedor',
    'before' => $this->Js->get('#procesando')->effect('fadeIn', array('buffer' => false)),
    'complete' => $this->Js->get('#procesando')->effect('fadeOut', array('buffer' => FALSE))
));
?>

<div id="contenedor">
    <h2><?php echo __('Contents'); ?></h2>
    <div class="row-fluid" style="padding-bottom: 8px;">
        <?php echo $this->Crud->addNew(__('Añadir'), 'add', 'icon-plus-2'); ?>
    </div>    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-inverse">
                <tr>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('titulo'); ?></th>
                    <th><?php echo $this->Paginator->sort('lang'); ?></th>
                    <th><?php echo $this->Paginator->sort('created'); ?></th>
                    <th><?php echo $this->Paginator->sort('modified'); ?></th>
                    <th class="tableActs"><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contents as $content): ?>
                    <tr>
                        <td><?php echo h($content['Content']['id']); ?>&nbsp;</td>
                        <td><?php echo h($content['Content']['titulo']); ?>&nbsp;</td>
                        <td><?php echo h($content['Content']['lang']); ?>&nbsp;</td>
                        <td><?php echo h($content['Content']['created']); ?>&nbsp;</td>
                        <td><?php echo h($content['Content']['modified']); ?>&nbsp;</td>
                        <td class="tableActs">                     
                            <?php echo $this->Crud->Imag('View', 'view', $content['Content']['id'], "&#xe081;"); ?>
                            <?php echo $this->Crud->Imag('Edit', 'edit', $content['Content']['id'], "&#xe1db;"); ?>
                            <?php echo $this->Crud->Imag('Delete', 'delete', $content['Content']['id'], "&#xe05d;", true); ?>
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