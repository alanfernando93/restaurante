<?php

App::uses('AppController', 'Controller');

/**
 * Orders Controller
 *
 * @property Order $Order
 * @property PaginatorComponent $Paginator
 */
class OrdersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $uses = array('Order', 'MetaOrder');
    public $components = array('RequestHandler', 'Session');
    public $helpers = array('Html', 'Form', 'Time', 'Js');
    public $paginate = array(
        'limit' => 3,
        'order' => array(
            'Order.id' => 'asc'
        )
    );

    /**
     * index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Order->recursive = 0;
        $this->paginate['Order']['limit'] = 3;
        $this->paginate['Order']['order'] = array('Order.id' => 'asc');
        $this->set('orders', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Order->exists($id)) {
            throw new NotFoundException(__('Invalid order'));
        }
        $options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
        $this->set('order', $this->Order->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $reg = array();
            $i = 0;
            $this->request->data['Order']['user_id'] = $this->Auth->user('id');
            $MetaOrder = $this->request->data['Order']['MetaOrder'];
            unset($this->request->data['Order']['MetaOrder']);
            $costoTotal = 0;
            try {
                foreach ($MetaOrder as $key => $value) {
                    $reg[$i]['MetaOrder']['product_id'] = $value['product_id'];
                    $reg[$i]['MetaOrder']['cantidad'] = $value['cantidad'];
                    $reg[$i]['MetaOrder']['precio'] = $value['precio'];
                    $reg[$i]['MetaOrder']['precioTotal'] = $value['precioTotal'];
                    $costoTotal += $value['precioTotal'];
                    ++$i;
                }
                $this->request->data['Order']['costoTotal'] = $costoTotal;
                $this->Order->create();
                $this->Order->save($this->request->data);
                $i = 0;
                foreach ($MetaOrder as $key => $value) {
                    $reg[$i]['MetaOrder']['order_id'] = $this->Order->id;
                    ++$i;
                }
                //debug($reg);
                //die();
                foreach ($reg as $value) {
                    $this->MetaOrder->create();
                    $this->MetaOrder->save($value);
                }
                Crud::message('The pedido has been saved.');
                return $this->redirect(array('action' => 'index'));
            } catch (Exception $ex) {
                Crud::message('The pedido could not be saved. Please, try again.');
            }
        }
        $users = $this->Order->User->find('list');
        $products = $this->MetaOrder->Product->find('all', array(
            'fields' => array(
                'Product.id',
                'Product.nombre',
                'Product.precio'
        )));
        $this->set(compact('users', 'products'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Order->exists($id)) {
            throw new NotFoundException(__('Invalid order'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $reg = array();
            $i = 0;
            $this->request->data['Order']['user_id'] = $this->Auth->user('id');
            $MetaOrder = $this->request->data['Order']['MetaOrder'];
            //debug($MetaOrder);
            unset($this->request->data['Order']['MetaOrder']);
            //debug($this->request->data);
            $costoTotal = 0;
            try {
                foreach ($MetaOrder as $key => $value) {
                    if (!empty($value['id'])) {
                        $reg[$i]['MetaOrder']['id'] = $value['id'];
                    }
                    $reg[$i]['MetaOrder']['product_id'] = $value['product_id'];
                    $reg[$i]['MetaOrder']['cantidad'] = $value['cantidad'];
                    $reg[$i]['MetaOrder']['precio'] = $value['precio'];
                    $reg[$i]['MetaOrder']['precioTotal'] = $value['precioTotal'];
                    $reg[$i]['MetaOrder']['order_id'] = $id;
                    $costoTotal += $value['precioTotal'];
                    ++$i;
                }
                $this->request->data['Order']['costoTotal'] = $costoTotal;
                $this->Order->create();
                $this->Order->save($this->request->data);
                //debug($reg);
                //die();
                foreach ($reg as $value) {
                    $this->MetaOrder->create();
                    $this->MetaOrder->save($value);
                }
                Crud::message('The pedido has been saved.');
                return $this->redirect(array('action' => 'index'));
            } catch (Exception $ex) {
                Crud::message('The pedido could not be saved. Please, try again.');
            }
        } else {
            $options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
            $this->request->data = $this->Order->find('first', $options);
        }
        $users = $this->Order->User->find('list');
        $metaOrders = $this->MetaOrder->find('all', array(
            'conditions' => array(
                'order_id' => $id
            )
        ));
        $products = $this->MetaOrder->Product->find('all', array(
            'fields' => array(
                'Product.id',
                'Product.nombre',
                'Product.precio'
        )));
        $this->set(compact('users', 'products', 'metaOrders'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Order->id = $id;
        if (!$this->Order->exists()) {
            throw new NotFoundException(__('Invalid order'));
        }
        $MetaOrders = $this->MetaOrder->find('all', array('conditions' => array('order_id' => $id)));
        //debug($MetaOrders);
        //die();
        try {
            $this->request->onlyAllow('post', 'delete');
            foreach ($MetaOrders as $MetaOrder) {
                $this->MetaOrder->id = $MetaOrder['MetaOrder']['id'];
                $this->MetaOrder->delete();
            }
            $this->Order->delete();
            print Crud::message('The order has been deleted.');
        } catch (Exception $ex) {
            print Crud::message('The order could not be deleted. Please, try again.', false);
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function beforeFilter() {
        parent::beforeFilter();
    }

}
