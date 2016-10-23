<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class PostsController extends AppController {

/**
 * Components
 *
 * @var array
 */
public $components = array('Paginator', 'Flash', 'Session');

/**
 * [beforeFilter description]
 * @return [type] [description]
 */
// public function beforeFilter() {
//     parent::beforeFilter();
//     $this->Auth->allow('index', 'view');
// }
/**
 * [menu description]
 * @return [type] [description]
 */
public function menu(){
		$posts = $this->Post->find('all',array(
			'conditions'=>array('type'=>'post','online'=>1),
			'fields'    =>array('slug','name',"type")
			));
		return $posts;
	}


/**
* index
**/
public function index(){
	$this->Post->recursive = 0;
	$this->set('posts',$this->Paginator->paginate());

}

/**
* view
**/
public function view($slug=null){
		if(!$slug){
			throw new NotFoundException(__('No pages were found for this ID') ,array('class'=>'danger','type'=>'sign'));
		}
		$post = $this->Post->find('first',array(
			'conditions'=>array('Post.slug'=>$slug	//'type'=>'post'
				),
			'recursive'=>0
			));
		if(empty($post)){
			throw new NotFoundException(__('No pages were found for this ID') ,array('class'=>'danger','type'=>'sign'));
		}
		if($slug != $post['Post']['slug']){
			$this->redirect($post['Post']['link'],301);
		}
		$name = $post['Post']['name'];
		$d['post'] = $post;
		$this->set($d);
		$this->set(compact('name'));

}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->layout = "admin";
		$this->Post->recursive = 0;
		$this->set('posts', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->layout='admin';
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
		$this->set('post', $this->Post->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->layout= "admin";
		if ($this->request->is('post')) {
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Flash->success(__('The post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The post could not be saved. Please, try again.'));
			}
		}
		$users = $this->Post->User->find('list');
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
		$this->layout='admin';
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Post->save($this->request->data)) {
				$this->Flash->success(__('The post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The post could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
			$this->request->data = $this->Post->find('first', $options);
		}
		$users = $this->Post->User->find('list');
		$this->set(compact('users'));
	}

/**
 * [admin_enable description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
public function admin_enable($id=null) {
	$post = $this->Post->read(null,$id);
	if (!$id && empty($post)) {
		$this->Flash->error(__('You must provide a valid ID number to enable a user.',true),array('class'=>'danger','type'=>'sign'));
		$this->redirect(array('action'=>'index'));
	}
	if (!empty($post)) {
		$post['Post']['online'] = 1;
		if ($this->Post->save($post)) {
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
 * [admin_disable description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
public function admin_disable($id=null) {
	$post = $this->Post->read(null,$id);
	if (!$id && empty($post)) {
		$this->Flash->error(__('You must provide a valid ID number to disable a user.',true),array('class'=>'danger','type'=>'sign'));
		$this->redirect(array('action'=>'index'));
	}
	if (!empty($post)) {
		$post['Post']['online'] = 0;
		if ($this->Post->save($post)) {
			$this->Flash->success(__('Post ID %s has been disabled.', h($id)));
		} else {
			$this->Flash->error(__('Post ID %s was not saved.',h($id)),array('class'=>'danger','type'=>'sign'));
		}
		$this->redirect(array('action'=>'index'));
	} else {
		$this->Flash->error(__('No Post by that ID was found.',true),array('class'=>'danger','type'=>'sign'));
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
		$this->layout='admin';
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Post->delete()) {
			$this->Flash->success(__('The post has been deleted.'));
		} else {
			$this->Flash->error(__('The post could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
