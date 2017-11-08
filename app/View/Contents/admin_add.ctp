<div class="col-sm-7 col-md-7">
    <?php echo $this->Form->create('Content'); ?>
    <h2><?php echo __('Add Content'); ?></h2>
    <div class="row">
        <div class="col-md-4">
            <?php
            echo $this->Form->input('titulo', array(
                'div' => array(
                    'class' => 'form-group'
                ),
                'label' => __('Title'),
                'class' => 'form-control',
                'placeholder' => 'titulo'
            ));
            ?>
        </div>
        <div class="col-md-5">
            <?php
            echo $this->Form->input('lang', array(
                'div' => array(
                    'class' => 'form-group'
                ),
                'label' => __('Language'),
                'class' => 'form-control',
                'options' => array('spa' => __('Spanish'), 'eng' => __('English')),
                'empty' => '(Select one options)'
            ));
            ?>
        </div>
    </div>
    <div class="row-fluid">
        <?php
        echo $this->Form->input('descripcion', array(
            'div' => array(
                'class' => 'widget'
            ),
            'class' => 'form-control'
        ));
        ?>
    </div><br>
    <div class="row">
        <div class="col-md-9">
            <?php
            echo $this->Form->input('url', array(
                'div' => array(
                    'class' => 'form-group'
                ),
                'label' => __('Web Pages'),
                'class' => 'form-control',
                'placeholder' => __('Web Pages')
            ));
            ?>
        </div>
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
    <?php echo $this->Form->end(); ?>
</div>