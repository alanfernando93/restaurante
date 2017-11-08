<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $layout = 'web_body';
    public $helpers = array('Html' => array('className' => 'MyHtml'),'Crud','Acordion','Functions');
    public $components = array(
        'Cookie',
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'users',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login'
            ),
            'authorize' => 'Controller',
            'authError' => 'Se presento algun problema'
    ));

    public function beforeFilter() {
        //$locale = Configure::read('Config.language');
        $this->Auth->allow(array('admin_login', 'admin_logout'));
        $this->set('current_user', $this->Auth->user());
        $this->_setLanguage();
        if ((isset($this->params['prefix']) && ($this->params['prefix'] == 'admin'))) {
            $this->layout = 'admin';
        }
    }

    public function isAuthorized($user) {
        if (isset($user['role']) && $user['role'] === 'Administrador') {
            return true;
        }
        return false;
    }

    public function _setLanguage() {
        if (isset($this->params['language'])) {
            switch ($this->params['language']) {
                case "spa":
                    $this->Session->write('Config.language', 'spa');
                    break;
                default:
                    $this->Session->write('Config.language', 'eng');
            }
        }
    }

}
