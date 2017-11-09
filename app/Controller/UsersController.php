<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('RequestHandler', 'Session');
    public $helpers = array('Html', 'Form', 'Time', 'Js', 'Crud');
    public $paginate = array(
        'limit' => 3,
        'order' => array(
            'User.id' => 'asc'
        )
    );
    public $uses = array('User', 'Permission');

    /**
     * index method
     *
     * @return void
     */
    public function admin_index() {
        $this->User->recursive = 0;
        $this->paginate['User']['limit'] = 3;
        $this->paginate['User']['order'] = array('User.id' => 'asc');
        $this->set('users', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                print $this->Session->setFlash(__('The user has been saved.'), 'success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'danger');
            }
        }
        $roles = $this->User->Role->find('list');
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
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                echo $this->Session->setFlash(__("The user has been saved."),'default', array('class' => "alert alert-success"));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => "alert alert-danger"));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $roles = $this->User->Role->find('list');
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
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('The user has been deleted.'), 'default', array('class' => "alert alert-success"));
        } else {
            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'), 'default', array('class' => "alert alert-danger"));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * 
     */
    public function admin_login() {
        $this->layout = 'login';
        if ($this->request->is('post')) {
            $password = AuthComponent::password($this->request->data['user']['password']);
            $data = $this->User->find('first', array(
                'fields' => array(
                    'User.username',
                    'User.id',
                    'Role.role',
                    'Role.Permission_id',
                ),
                'conditions' => array(
                    'User.username' => $this->request->data['user']['username'],
                    'User.password' => $password
                )
            ));

            if (!empty($data)) {
                $permiso = $this->Permission->find('first', array(
                    'fields' => array(
                        'Permission.permisos'
                    ),
                    'conditions' => array(
                        'Permission.id' => $data['Role']['Permission_id']
                    )
                ));
                unset($data['Role']['Permission_id']);
                unset($permiso['Permission']['id']);
                $user = array_merge($data['User'], $data['Role'], $permiso['Permission']);
                if ($this->Auth->login($user)) {
                    $this->Session->setFlash(__('Acceso concedido'), 'default', array('class' => "alert alert-success"));
                    return $this->redirect($this->Auth->redirectUrl());
                }
            }
            $this->Session->setFlash(__('Usuario y/o Password invalido'), 'default', array('class' => "alert alert-danger"));
        }
    }

    public function admin_logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function admin_signup() {
        $this->layout = 'login';
    }

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function isAuthorized($user) {
        if ($user['role'] == 'Usuario') {
            $data = explode(',', $user['permisos']);
            foreach ($data as $key => $value) {
                $data[$key] = 'admin_' . $value;
            }
            if (in_array($this->action, $data)) {
                return true;
            } else {
                if ($this->Auth->user('id')) {
                    $this->Session->setFlash(__('Acceso denegado, no cuanta con los permisos necesarios'), 'default', array('class' => "alert alert-danger"));
                }
            }
        }
        return parent::isAuthorized($user);
    }

}
