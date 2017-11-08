<?php

App::uses('AppModel', 'Model');

/**
 * Product Model
 *
 * @property Category $Category
 * @property User $User
 * @property Purchase $Purchase
 */
class Product extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'descripcion';
    public $actsAs = array(
        'Upload.Upload' => array(
            'photo' => array(
                'fields' => array(
                    'dir' => 'photo_dir'
                ),
                'thumbnailMethod' => 'php',
                'thumbnailSizes' => array(
                    'vga' => '640x480',
                    'thumb' => '100x100'
                ),
                'deleteOnUpdate' => true,
                'deleteFolderOnDelete' => true
            )
        )
    );

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'descripcion' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'stock' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'precio' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'money' => array(
                'rule' => array('decimal'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'photo' => array(
            'uploadError' => array(
                'rule' => 'uploadError',
                'message' => 'Algo anda mal, intente nuevamente',
                'on' => 'create'
            ),
            'isUnderPhpSizeLimit' => array(
                'rule' => 'uploadError',
                'message' => 'Algo anda mal, intente nuevamente',
                'on' => 'create'
            ),
            'isUnderPhpSizeLimit' => array(
                'rule' => 'isUnderPhpSizeLimit',
                'message' => 'Archivo excede el límite de tamaño de archivo de subida'
            ),
            'isValidMimeType' => array(
                'rule' => array('isValidMimeType', array('image/jpeg', 'image/png'), false),
                'message' => 'La imagen no es jpg ni png',
            ),
            'isBelowMaxSize' => array(
                'rule' => array('isBelowMaxSize', 1048576),
                'message' => 'El tamaño de imagen es demasiado grande'
            ),
            'isValidExtension' => array(
                'rule' => array('isValidExtension', array('jpg', 'png'), false),
                'message' => 'La imagen no tiene la extension jpg o png'
            ),
            'checkUniqueName' => array(
                'rule' => array('checkUniqueName'),
                'message' => 'La imagen ya se encuentra registrada',
                'on' => 'update'
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'MetaOrder' => array(
            'className' => 'MetaOrder',
            'foreignKey' => 'product_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

    function checkUniqueName($data) {
        $isUnique = $this->find('first', array('fields' => array('Product.photo'), 'conditions' => array('Product.photo' => $data['photo'])));
        return !empty($isUnique) ? false : true;
    }

}
