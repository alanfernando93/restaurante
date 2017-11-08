<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class AcordionHelper extends AppHelper{

    public $helpers = array('Html', 'Form');
    /**
     * 
     * @param type $title
     * @param type $controller
     * @param type $dataTarget
     * @return type
     */
    public function item($title, $controller, $dataTarget) {
        return $this->Html->link(
                __($title), array(
            'controller' => $controller,
            'action' => 'index'
                ), array(
            'data-toggle' => 'collapse',
            'data-target' => $dataTarget,
            'class' => 'list-group-item sub-item'
                )
        );
    }

}
