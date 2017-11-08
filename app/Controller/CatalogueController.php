<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CatalogueController
 *
 * @author Huayllani
 */
class CatalogueController extends AppController {

    //put your code here

    public function index() {
        $catalogue = array('class' => 'active');
        $pageNumber = 'page3';
        $this->set(compact('pageNumber', 'catalogue'));
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }

}
