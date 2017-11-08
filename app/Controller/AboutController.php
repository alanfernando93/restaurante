<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AboutController extends AppController {

    public function index() {
        $about = array('class' => 'active');
        $pageNumber = 'page4';
        $this->set(compact('pageNumber', 'about'));
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }

}
