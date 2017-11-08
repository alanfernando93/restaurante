<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Paginator {

    public function printP() {
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
