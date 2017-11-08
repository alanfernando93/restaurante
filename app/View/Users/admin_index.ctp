<div id="contenedor">
    <h2><?php echo __('Users'); ?></h2>
    <div class="row-fluid" style="padding-bottom: 8px;">
        <?php echo $this->Crud->addNew(__('Añadir'), 'add', 'icon-plus-2'); ?>
    </div>    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-inverse">
                <tr>
                    <th><?php echo $this->Paginator->sort('id', 'ID'); ?></th>
                    <th><?php echo $this->Paginator->sort('username'); ?></th>
                    <th><?php echo $this->Paginator->sort('nombre', 'Nombre Completo'); ?></th>
                    <th><?php echo $this->Paginator->sort('direccion'); ?></th>
                    <th><?php echo $this->Paginator->sort('status'); ?></th>
                    <th><?php echo $this->Paginator->sort('telefono'); ?></th>
                    <th><?php echo $this->Paginator->sort('created'); ?></th>
                    <th><?php echo $this->Paginator->sort('modified'); ?></th>
                    <th class="tableActs"><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['nombre'] . " " . $user['User']['apellidos']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['direccion']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['status']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['telefono']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['created']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
                        <td class="tableActs">                     
                            <?php echo $this->Crud->Imag('View', 'view', $user['User']['id'], "&#xe081;"); ?>
                            <?php echo $this->Crud->Imag('Edit', 'edit', $user['User']['id'], "&#xe1db;"); ?>
                            <?php echo $this->Crud->Imag('Delete', 'delete', $user['User']['id'], "&#xe05d;", true); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php $this->Crud->printPaginator(); ?>
    <?php echo $this->Js->writeBuffer(); ?>
</div>