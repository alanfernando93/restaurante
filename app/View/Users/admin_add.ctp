<div class="col-sm-12 col-md-12">
    <?php echo $this->Form->create('User'); ?>
    <h2><?php echo __('Add User'); ?></h2>
    <div class="row">
        <div class="col-md-4">
            <?php
            echo $this->Form->input('username', array(
                'div' => array(
                    'class' => 'form-group'
                ),
                'class' => 'form-control',
                'placeholder' => 'username'
            ));
            ?>
        </div>
        <div class="col-md-3">
            <?php
            echo $this->Form->input('password', array(
                'div' => array(
                    'class' => 'form-group'
                ),
                'class' => 'form-control',
                'placeholder' => 'password'
            ));
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?php
            echo $this->Form->input('nombre', array(
                'div' => array(
                    'class' => 'form-group'
                ),
                'class' => 'form-control',
                'placeholder' => 'nombre'
            ));
            ?>
        </div>
        <div class="col-md-4">
            <?php
            echo $this->Form->input('apellidos', array(
                'div' => array(
                    'class' => 'form-group'
                ),
                'class' => 'form-control',
                'placeholder' => 'apellidos'
            ));
            ?>
        </div>
        <div class="col-md-5">
            <?php
            echo $this->Form->input('direccion', array(
                'div' => array(
                    'class' => 'form-group'
                ),
                'class' => 'form-control',
                'placeholder' => 'direccion'
            ));
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <?php
            echo $this->Form->input('email', array(
                'div' => array(
                    'class' => 'form-group'
                ),
                'class' => 'form-control',
                'placeholder' => 'email'
            ));
            ?>
        </div>
        <div class="col-md-4">
            <?php
            echo $this->Form->input('status', array(
                'div' => array(
                    'class' => 'form-group'
                ),
                'class' => 'form-control',
                'placeholder' => 'status'
            ));
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?php
            echo $this->Form->input('telefono', array(
                'div' => array(
                    'class' => 'form-group'
                ),
                'class' => 'form-control',
                'placeholder' => 'telefono'
            ));
            ?>
        </div>
        <div class="col-md-2">
            <?php
            echo $this->Form->input('role_id', array(
                'div' => array(
                    'class' => 'form-group'
                ),
                'class' => 'form-control'
            ));
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <?php
            echo $this->Form->input('Guardar Registro', array(
                'class' => 'btn btn-success',
                'type' => 'submit',
                'label' => false
                    )
            );
            ?>
        </div>
        <div class="col-md-2">
            <?php
            echo $this->Html->link('Cancelar', array('action' => 'index'), array('class' => 'btn btn-danger'));
            ?>
        </div>        
    </div>
    <?php
    echo $this->Form->end();
    ?>
</div>