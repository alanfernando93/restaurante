<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CrudHelper extends AppHelper{

    public $helpers = array('Html', 'Form','Paginator');
    /**
     * 
     * @param type $title
     * @param type $link
     * @param type $icon
     * @return type
     */
    public function Imag($title, $action, $data, $icon, $msg = null) {
        $A = array(
            'action' => $action,
            $data
        );
        $B = array(
            'escape' => false,
            'class' => 'btn btn-default imgCrud',
            'title' => $title,
            'data-toggle' => 'tooltip',
            'data-placement' => 'top'
        );
        if (!empty($msg)) {
            return $this->Form->postLink("<span class=\"iconb\" data-icon=\"$icon\"></span>", $A, $B, 'Esta seguro de eliminar?');
        } else {
            return $this->Html->link("<span class=\"iconb\" data-icon=\"$icon\"></span>", $A, $B);
        }
    }

    /**
     * 
     * @param type $title
     * @param type $data
     * @param type $icon
     * @return type
     */
    public function addNew($title, $action, $class) {
        $A = array(
            'action' => $action
        );
        $B = array(
            'escape' => false,
            'class' => 'btn btn-default',
            'title' => $title,
            'data-toggle' => 'tooltip',
            'data-placement' => 'top'
        );
        return $this->Html->link("<span class=\"$class\"></span> " . $title, $A, $B);
    }

    public function message($title, $event = true) {
        $class = "danger";
        if ($event) {
            $class = "success";
        }
        return $this->Session->setFlash(
                        __($title), 'default', array('class' => "alert alert-$class")
        );
    }
    
    public function printPaginator() {
        ?>
        <p>
            <?php
            echo $this->Paginator->counter(array(
                'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
            ));
            ?>	
        </p>
        <nav aria-label="Page navigation">
            <ul class="pager">
                <li><?php echo $this->Paginator->prev('< ' . __('previous'), array('tag' => false), null, array('class' => 'prev disabled')); ?></li>
                <li><?php echo $this->Paginator->numbers(array('separator' => '')); ?></li>
                <li><?php echo $this->Paginator->next(__('next') . ' >', array('tag' => false), null, array('class' => 'next disabled')); ?></li>
            </ul>
        </nav>
        <?php
    }

}
