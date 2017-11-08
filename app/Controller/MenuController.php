<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MenuController
 *
 * @author Huayllani
 */
class MenuController extends AppController {

    public function index() {
        $menu = array('class' => 'active');
        $pageNumber = 'page2';
        $this->set(compact('pageNumber', 'menu'));
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

}
