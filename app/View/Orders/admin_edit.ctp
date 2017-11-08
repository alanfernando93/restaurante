<div class="col-sm-6 col-md-6">
    <?php
    echo $this->Form->create('Order');
    echo $this->Form->input('id');
    ?>
    <h2><?php echo __('Add Order'); ?></h2>
    <div class="row">
        <div class="col-md-4">
            <?php
            echo $this->Form->input('descripcion', array(
                'div' => array(
                    'class' => 'form-group'
                ),
                'class' => 'form-control',
                'placeholder' => 'descripcion'
            ));
            ?>
        </div>
        <div class="col-md-3">
            <?php
            echo $this->Form->input('nroMesa', array(
                'div' => array(
                    'class' => 'form-group'
                ), 'class' => 'form-control'
            ));
            ?>
        </div>
    </div>
    <div class="row">
        <!-- Controls -->
        <div id="sheepItForm_controls">
            <div class="btn btn-default" id="sheepItForm_add">
                <a id="order"><span>Add</span></a>
            </div>
            <div class="btn btn-default" id="sheepItForm_remove_last">
                <a id="order"><span>Remove</span></a>
            </div>
            <div class="btn btn-default" id="sheepItForm_remove_all">
                <a id="order"><span>Remove all</span></a>
            </div>
        </div><!-- /Controls -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th> <?php echo __('Product'); ?></th>
                    <th><?php echo __('Cantidad'); ?></th>
                    <th><?php echo __('Precio'); ?></th> 
                    <th><?php echo __('Total'); ?></th> 
                    <th><?php echo __('Actions'); ?></th>   
                </tr>
            </thead>
            <tbody id="sheepItForm">
                <?php
                $i = 0;
                foreach ($metaOrders as $metaOrder):
                    ?>
                    <tr>
                        <td>
                            <?php
                            echo $this->Form->hidden(NULL, array(
                                'value' => $metaOrder['MetaOrder']['id'],
                                'name' => 'data[Order][MetaOrder][#' . $i . '#][id]'
                            ));
                            ?>
                            <select name="data[Order][MetaOrder][#<?php echo $i; ?>#][product_id]" onchange="generar(this);" class="form-control" id="sheepItForm_#<?php echo $i; ?>#_product_id">
                                <option value="-1">--Seleccionar--</option>
                                <?php foreach ($products as $product): ?>
                                    <option value="<?php echo $product['Product']['id']; ?>" id="<?php echo $product['Product']['precio']; ?>" <?php print ($metaOrder['MetaOrder']['product_id'] == $product['Product']['id']) ? 'selected' : '' ; ?>><?php echo $product['Product']['nombre']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->input('cantidad', array(
                                'onchange' => 'operar(this);',
                                'class' => 'form-control',
                                'type' => 'number',
                                'style' => 'width:80px;',
                                'label' => FALSE,
                                'div' => FALSE,
                                'value' => $metaOrder['MetaOrder']['cantidad'],
                                'id' => 'sheepItForm_#' . $i . '#_cantidad',
                                'name' => 'data[Order][MetaOrder][#' . $i . '#][cantidad]'
                            ));
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->hidden('precio', array(
                                'value' => $metaOrder['MetaOrder']['precio'],
                                'id' => 'sheepItForm_#' . $i . '#_precio',
                                'name' => 'data[Order][MetaOrder][#' . $i . '#][precio]'
                            ));
                            echo $this->Form->label('precio', $metaOrder['MetaOrder']['precio']);
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->hidden('precioTotal', array(
                                'value' => $metaOrder['MetaOrder']['precioTotal'],
                                'id' => 'sheepItForm_#' . $i . '#_costoTotal',
                                'name' => 'data[Order][MetaOrder][#' . $i . '#][precioTotal]'
                            ));
                            echo $this->Form->label('precioTotal', $metaOrder['MetaOrder']['precioTotal']);
                            ?>
                        </td>
                        <td><a id="sheepItForm_remove_current"><?php echo $this->Html->image('cross.png', array('class' => 'delete', 'width' => '28', 'height' => '28', 'border' => '0')); ?> </a></td>
                    </tr>
                    <?php
                    $i++;
                endforeach;
                ?>
                <tr id="sheepItForm_template">
                    <td>
                        <select name="data[Order][MetaOrder][#index#][product_id]" onchange="generar(this);" class="form-control" id="sheepItForm_#index#_product_id">
                            <option value="-1">--Seleccionar--</option>
                            <?php foreach ($products as $product): ?>
                                <option value="<?php echo $product['Product']['id']; ?>" id="<?php echo $product['Product']['precio']; ?>"><?php echo $product['Product']['nombre']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->input('cantidad', array(
                            'onchange' => 'operar(this);',
                            'class' => 'form-control',
                            'type' => 'number',
                            'style' => 'width:80px;',
                            'label' => FALSE,
                            'div' => FALSE,
                            'id' => 'sheepItForm_#index#_cantidad',
                            'name' => 'data[Order][MetaOrder][#index#][cantidad]'
                        ));
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->hidden('precio', array(
                            'id' => 'sheepItForm_#index#_precio',
                            'name' => 'data[Order][MetaOrder][#index#][precio]'
                        ));
                        echo $this->Form->label('precio', '');
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->hidden('precioTotal', array(
                            'id' => 'sheepItForm_#index#_costoTotal',
                            'name' => 'data[Order][MetaOrder][#index#][precioTotal]'
                        ));
                        echo $this->Form->label('precioTotal', '');
                        ?>
                    </td>
                    <td><a id="sheepItForm_remove_current" href="#"><?php echo $this->Html->image('cross.png', array('class' => 'delete', 'width' => '28', 'height' => '28', 'border' => '0')); ?> </a></td>
                </tr>
                <!-- No forms template -->
                <tr id="sheepItForm_noforms_template">
                    <td colspan="4">
                        No records
                    </td>
                </tr><!-- /No forms template-->
            </tbody>
        </table>        
    </div>
    <div class="row">
        <div class="col-md-4">
            <?php
            echo $this->Form->input('Guardar Registro', array(
                'class' => 'btn btn-success',
                'type' => 'submit',
                'label' => false
                    )
            );
            ?>
        </div>
        <div class="col-md-3">
            <?php
            echo $this->Html->link('Cancelar', array('action' => 'index'), array('class' => 'btn btn-danger'));
            ?>
        </div>        
    </div>
    <?php
    echo $this->Form->end();
    ?> 
</div>