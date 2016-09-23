<?php
App::uses('AppController', 'Controller');
/**
 * Properties Controller
 *
 * @property Property $Property
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class PropertiesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array( 'Flash', 'Session');

		public function offerings(){
		$this->layout='home';
		$types = $this->Property->Type->find('list');
		$this->set(compact('types'));
	}

/**
* index
**/
// public function index(){
// 		$this->layout = 'home';
// 		$this->Property->recursive = 0;
// 		$name = $property['Property']['name'];
// 		$this->set(array('name','properties', $this->paginate()));

// }

	public function index() {
		$this->layout ='home';
		$this->Property->recursive = 0;
		$this->paginate = array('Property'=>array(
			"limit"=>12,
			'order'=>array(
				'Property.created'=>'desc')
			));
		$d["properties"] = $this->Paginate();
		$this->set($d );
	}
/**
* view
**/

	public function view($id = null) {
		$this->layout = 'home';
		if (!$id) {
			throw new NotFoundException(__('Invalid property'));
		}
		$property = $this->Property->find('first',array(
			'conditions'=>array('Property.id'=>$id	//'type'=>'post'
				),
			'recursive'=>1
			));
		if (empty($property)) {
			throw new NotFoundException("Error Processing Request", 1);

		}
		if($id !=$property['Property']['id']){
			$this->redirect($post['Post']['link'],301);
		}
		$name = $property['Property']['name'];
		$d['property'] = $property;
		$this->set($d);
		//$options = array('conditions' => array('Property.' . $this->Property->primaryKey => $id));
		//$this->set('property', $this->Property->find('first', $options));
		$this->set(compact('name'));

	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Property->recursive = 0;
		$this->paginate = array('Property'=>array(
			"limit"=>10,
			'order'=>array(
				'Property.created'=>'desc')
			));
		$d["properties"] = $this->Paginate();
		$this->set($d );
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Property->exists($id)) {
			throw new NotFoundException(__('Invalid property'));
		}
		$options = array('conditions' => array('Property.' . $this->Property->primaryKey => $id));
		$this->set('property', $this->Property->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Property->create();
			if ($this->Property->save($this->request->data)) {
				$this->Flash->success(__('The property has been saved.'),array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The property could not be saved. Please, try again.'),array('class' => 'alert alert-danger'));
			}
		}
		$states = $this->Property->State->find('list');
		$areas = $this->Property->Area->find('list');
		$statuses = $this->Property->Status->find('list');
		$types = $this->Property->Type->find('list');
		$characteristics = $this->Property->Characteristic->find('list');
		$users = $this->Property->User->find('list');
		$this->set(compact('states', 'areas', 'statuses', 'types', 'characteristics', 'users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Property->exists($id)) {
			throw new NotFoundException(__('Invalid property'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Property->save($this->request->data)) {
				$this->Flash->success(__('The property has been saved.'), array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The property could not be saved. Please, try again.'), array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Property.' . $this->Property->primaryKey => $id));
			$this->request->data = $this->Property->find('first', $options);
		}
		$states = $this->Property->State->find('list');
		$areas = $this->Property->Area->find('list');
		$statuses = $this->Property->Status->find('list');
		$types = $this->Property->Type->find('list');
		$characteristics = $this->Property->Characteristic->find('list');
		$users = $this->Property->User->find('list');
		$this->set(compact('states', 'areas', 'statuses', 'types', 'characteristics', 'users'));
	}
/**
 * admin_enable method
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
public function admin_enable($id=null) {
	$property = $this->Property->read(null,$id);
	if (!$id && empty($property)) {
		$this->Flash->error(__('You must provide a valid ID number to enable a user.',true),array('class'=>'danger','type'=>'sign'));
		$this->redirect(array('action'=>'index'));
	}
	if (!empty($property)) {
		$property['Property']['online'] = 1;
		if ($this->Property->save($property)) {
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
	$property = $this->Property->read(null,$id);
	if (!$id && empty($property)) {
		$this->Flash->error(__('You must provide a valid ID number to enable a user.',true),array('class'=>'danger','type'=>'sign'));
		$this->redirect(array('action'=>'index'));
	}
	if (!empty($property)) {
		$property['Property']['online'] = 0;
		if ($this->Property->save($property)) {
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
		$this->Property->id = $id;
		if (!$this->Property->exists()) {
			throw new NotFoundException(__('Invalid property'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Property->delete()) {
			$this->Flash->success(__('The property has been deleted.'), array('class' => 'alert alert-success'));
		} else {
			$this->Flash->error(__('The property could not be deleted. Please, try again.'), array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
