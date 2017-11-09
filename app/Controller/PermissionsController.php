<?php

App::uses('AppController', 'Controller');

/**
 * Permissions Controller
 *
 * @property Permission $Permission
 * @property PaginatorComponent $Paginator
 */
class PermissionsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('RequestHandler', 'Session');
    public $helpers = array('Html', 'Form', 'Time', 'Js');
    public $paginate = array(
        'limit' => 3,
        'order' => array(
            'Permission.id' => 'asc'
        )
    );

    /**
     * index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Permission->recursive = 0;
        $this->paginate['Permission']['limit'] = 3;
        $this->paginate['Permission']['order'] = array('Permission.id' => 'asc');
        $this->set('permissions', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Permission->exists($id)) {
            throw new NotFoundException(__('Invalid permission'));
        }
        $options = array('conditions' => array('Permission.' . $this->Permission->primaryKey => $id));
        $this->set('permission', $this->Permission->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Permission->create();
            if ($this->Permission->save($this->request->data)) {
                $this->Session->setFlash(__('The permission has been saved.'),'default', array('class' => "alert alert-success"));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The permission could not be saved. Please, try again.'), 'default', array('class' => "alert alert-danger"));
            }
        }
        $roles = $this->Permission->Role->find('list');
        $this->set(compact('roles'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Permission->exists($id)) {
            throw new NotFoundException(__('Invalid permission'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Permission->save($this->request->data)) {
                $this->Session->setFlash(__('The permission has been saved.'),'default', array('class' => "alert alert-success"));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The permission could not be saved. Please, try again.'), 'default', array('class' => "alert alert-danger"));
            }
        } else {
            $options = array('conditions' => array('Permission.' . $this->Permission->primaryKey => $id));
            $this->request->data = $this->Permission->find('first', $options);
        }
        $roles = $this->Permission->Role->find('list');
        $this->set(compact('roles'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Permission->id = $id;
        if (!$this->Permission->exists()) {
            throw new NotFoundException(__('Invalid permission'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Permission->delete()) {
            $this->Session->setFlash(__('The permission has been deleted.'),'default', array('class' => "alert alert-success"));
        } else {
            $this->Session->setFlash(__('The permission could not be deleted. Please, try again.'), 'default', array('class' => "alert alert-danger"));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function beforeFilter() {
        parent::beforeFilter();
    }
}
