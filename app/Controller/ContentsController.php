<?php
App::uses('AppController', 'Controller');
App::uses('SessionController', 'Controller/Component');

/**
 * Contents Controller
 *
 * @property Content $Content
 * @property PaginatorComponent $Paginator
 */
class ContentsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('RequestHandler', 'Session', 'Cookie');
    public $helpers = array('Html', 'Form', 'Time', 'Js');
    public $uses = array('Content', 'User');
    public $paginate = array(
        'limit' => 3,
        'order' => array(
            'Content.id' => 'asc'
        )
    );

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Content->recursive = 0;
        $this->paginate['Content']['limit'] = 3;
        $this->paginate['Content']['order'] = array('Content.id' => 'asc');
        $this->set('contents', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Content->exists($id)) {
            throw new NotFoundException(__('Invalid content'));
        }
        $options = array('conditions' => array('Content.' . $this->Content->primaryKey => $id));
        $this->set('content', $this->Content->find('first', $options));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view() {
        $lang = SessionComponent::read('Config.language');
        $contents = $this->Content->find('all', array('limit' => 3, 'conditions' => array('Content.lang' => $lang)));
        ?>
        <div class="row">
            <?php foreach ($contents as $content): ?>
                <div class="col-md-4">
                    <h2><?php echo $content['Content']['titulo']; ?></h2>
                    <p><?php echo strCount($content['Content']['descripcion'], 200); ?></p>
                    <p><a class="btn btn-default" href="#" onclick="window.open('<?php echo $content['Content']['url']; ?>');" role="button">View details &raquo;</a></p>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
        $this->autoRender = false;
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Content->create();
            if ($this->Content->save($this->request->data)) {
                $this->Session->setFlash(__('The content has been saved.'), 'default', array('class' => "alert alert-success"));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The content could not be saved. Please, try again.'), 'default', array('class' => "alert alert-danger"));
            }
        }
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Content->exists($id)) {
            throw new NotFoundException(__('Invalid content'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Content->save($this->request->data)) {
                $this->Session->setFlash(__('The content has been saved.'),'default', array('class' => "alert alert-success"));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The content could not be saved. Please, try again.'), 'default', array('class' => "alert alert-danger"));
            }
        } else {
            $options = array('conditions' => array('Content.' . $this->Content->primaryKey => $id));
            $this->request->data = $this->Content->find('first', $options);
        }
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Content->id = $id;
        if (!$this->Content->exists()) {
            throw new NotFoundException(__('Invalid content'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Content->delete()) {
            $this->Session->setFlash(__('The content has been deleted.'),'default', array('class' => "alert alert-success"));
        } else {
            $this->Session->setFlash(__('The content could not be deleted. Please, try again.'),'default', array('class' => "alert alert-danger"));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }

}
