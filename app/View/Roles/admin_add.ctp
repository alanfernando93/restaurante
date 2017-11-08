<div class="col-sm-6 col-md-6">
    <?php echo $this->Form->create('Role'); ?>
    <h2><?php echo __('Add Role'); ?></h2>
    <?php
    echo $this->Form->input('descripcion', array(
        'div' => array(
            'class' => 'form-group'
        ),
        'class' => 'form-control',
        'placeholder' => 'descripcion'
    ));
    echo $this->Form->input('permission_id', array(
        'div' => array(
            'class' => 'form-group'
        ),
        'class' => 'form-control'
    ));
    ?>
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
