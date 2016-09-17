<?php
App::uses('AppController', 'Controller');
/**
 * Menus Controller
 *
 * @property Menu $Menu
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class MenusController extends AppController {
	/**
	* contact
	**/
	public function contact(){
	$this->layout = "home";

	}

	/**
	* offerings
	**/
	public function offerings(){
		$this->layout='home';
	//	$this->loadModel('Type');
	}

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');
/**
 * [menu description]
 * @return [type] [description]
 */
	public function admin_menu(){
		$this->layout='admin';
		$this->Menu->recursive = 0;
		$menus = $this->Menu->find('all',array(
		//	'conditions'=>array('type'=>'post','online'=>1),
			'fields'    =>array('name',"id",'controller','icon')
			));
		return $menus;
	}
/**
 * index method pour tester
 *
 * @return void
 */
	public function index() {
		$this->layout='home';
		$this->Menu->recursive = 0;
		$this->set('menus', $this->Paginator->paginate());
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Menu->recursive = 0;
		$this->set('menus', $this->Paginator->paginate());
	}
/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

	public function view($slug=null) {
		$this->layout='home';
	    if(empty($slug)) {
	        throw new NotFoundException();
	    }
	    $menu = $this->Menu->find('first', array(
	        'conditions' => array('Menu.slug' => $slug),
	    ));
	    if(!$menu){
	        throw new NotFoundException();
	    }
	    if($slug != $menu['Menu']['slug'] || $menu['Menu']['online'] != 1){
			header("Status: 301 Moved Permanently", false, 301);
			$this->redirect($this->referer());
		}
	    $this->set(compact('menu'));
	}
/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Menu->exists($id)) {
			throw new NotFoundException(__('Invalid menu'));
		}
		$options = array('conditions' => array('Menu.' . $this->Menu->primaryKey => $id));
		$this->set('menu', $this->Menu->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Menu->create();
			if ($this->Menu->save($this->request->data)) {
				$this->Flash->success(__('The menu has been saved.'),array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The menu could not be saved. Please, try again.'));
			}
		}
		$users = $this->Menu->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Menu->exists($id)) {
			throw new NotFoundException(__('Invalid menu'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Menu->save($this->request->data)) {
				$this->Flash->success(__('The menu has been saved.'), array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The menu could not be saved. Please, try again.'), array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Menu.' . $this->Menu->primaryKey => $id));
			$this->request->data = $this->Menu->find('first', $options);
		}
		$users = $this->Menu->User->find('list');
		$this->set(compact('users'));
	}
/**
 * admin_enable method
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
public function admin_enable($id=null) {
	$menu = $this->Menu->read(null,$id);
	if (!$id && empty($menu)) {
		$this->Flash->error(__('You must provide a valid ID number to enable a user.',true),array('class'=>'danger','type'=>'sign'));
		$this->redirect(array('action'=>'index'));
	}
	if (!empty($menu)) {
		$menu['Menu']['online'] = 1;
		if ($this->Menu->save($menu)) {
			$this->Flash->success(__('User ID %s has been published.',h($id)));
		} else {
			$this->Flash->error(__('User ID %s was not saved.',h($id)),array('class'=>'danger','type'=>'sign'));
		}
		$this->redirect(array('action'=>'index'));
	} else {
		$this->Flash->error(__('No user by that ID was found.',true),array('class'=>'danger','type'=>'sign'));
		$this->redirect(array('action'=>'index'));
	}
}
/**
 * admin_disable method
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
public function admin_disable($id=null) {
	$menu = $this->Menu->read(null,$id);
	if (!$id && empty($menu)) {
		$this->Flash->error(__('You must provide a valid ID number to enable a user.',true),array('class'=>'danger','type'=>'sign'));
		$this->redirect(array('action'=>'index'));
	}
	if (!empty($menu)) {
		$menu['Menu']['online'] = 0;
		if ($this->Menu->save($menu)) {
			$this->Flash->success(__('User ID %s has been published.',h($id)));
		} else {
			$this->Flash->error(__('User ID %s was not saved.',h($id)),array('class'=>'danger','type'=>'sign'));
		}
		$this->redirect(array('action'=>'index'));
	} else {
		$this->Flash->error(__('No user by that ID was found.',true),array('class'=>'danger','type'=>'sign'));
		$this->redirect(array('action'=>'index'));
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
		$this->Menu->id = $id;
		if (!$this->Menu->exists()) {
			throw new NotFoundException(__('Invalid menu'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Menu->delete()) {
			$this->Flash->success(__('The menu has been deleted.'), array('class' => 'alert alert-success'));
		} else {
			$this->Flash->error(__('The menu could not be deleted. Please, try again.'), array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
