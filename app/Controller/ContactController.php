<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContactController
 *
 * @author Huayllani
 */
class ContactController extends AppController {

    public function index() {
        $contact = array('class' => 'active');
        $pageNumber = 'page6';
        $this->set(compact('pageNumber', 'contact'));
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }

}
