<div class="row">
    <div class="container-fluid">
        <h2><?php echo __('Add Product'); ?></h2>
    </div>    
</div>
<div class="row">
    <?php echo $this->Form->create('Product', array('type' => 'file', 'novalidate' => 'novalidate')); ?>
    <div class="col-sm-6 col-md-6">
        <?php
        echo $this->Form->input('nombre', array(
            'div' => array(
                'class' => 'form-group'
            ),
            'class' => 'form-control',
            'placeholder' => 'nombre'
        ));
        echo $this->Form->input('descripcion', array(
            'div' => array(
                'class' => 'form-group'
            ),
            'class' => 'form-control',
            'placeholder' => 'descripcion'
        ));
        echo $this->Form->input('stock', array(
            'div' => array(
                'class' => 'form-group'
            ),
            'class' => 'form-control',
            'type' => 'text',
            'placeholder' => 'stock'
        ));
        echo $this->Form->input('precio', array(
            'div' => array(
                'class' => 'form-group'
            ),
            'class' => 'form-control',
            'placeholder' => 'descripcion'
        ));
        echo $this->Form->input('category_id', array(
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
    </div>
    <div class="col-sm-4 col-md-4">
        <?php
        /*
         * Nota
         * El plugin para esta seccion fue modificado por razones tecnicas
         * para reutilizar debe abrir el archivo fileinput.min.js desde el directorio de script,
         * dirigirse a la linea 100 y columna 3652 (100:3652), una vez ubicado la posicion 
         * cambiar
         * '<!--<button type="button" class="kv-file-upload {uploadClass}" title="{uploadTitle}">{uploadIcon}</button>-->'
         * por
         * '<button type="button" class="kv-file-upload {uploadClass}" title="{uploadTitle}">{uploadIcon}</button>'
         * ====================================================================================
         * o si desea utilizar el archivo por defecto puede descargar el archivo
         * desde :
         * https://github.com/kartik-v/bootstrap-fileinput
         * 
         */
        echo $this->Form->input('photo', array(
            'div' => array(
                'class' => 'form-group'
            ),
            'class' => 'file',
            'data-show-upload' => 'false',
            'data-show-caption' => 'true',
            'data-upload-url' => '#',
            'type' => 'file',
            'id' => 'photo',
            'label' => 'Imagen',
            'name' => ''
        ));
        echo $this->Form->input('photo_dir', array(
            'type' => 'hidden'
        ));
        ?>
    </div>
    <?php
    echo $this->Form->end();
    ?>
</div>