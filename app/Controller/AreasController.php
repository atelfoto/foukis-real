<?php
App::uses('AppController', 'Controller');
/**
 * Areas Controller
 *
 * @property Area $Area
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class AreasController extends AppController {

//	public $name = "Property.online";

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/**
* index
**/
	public function index(){

		$this->Area->recursive = 1;
		$this->paginate = array('Area'=>array(
			'limit'=>50
			)
		);
		 $properties = $this->Area->Property->find('list',array(
		 	'conditions'=>array("Property.online"=>1)));
		 // $d['property']= $properties;
		 //  $this->set($d);
		 // debug($d);
		 // die();
		// debug($properties);
		 $this->set(compact('properties'));
		// $this->set('properties',$this->Paginator->paginate(
		// 	array("Property.online"=>1)));
		$areas = $this->Area->find('list');
		//debug($areas);die();
		$this->set('areas', $this->Paginator->paginate(
			array("Area.online"=>1)));
		$this->loadModel('Type');
		// $types = $this->Area->Type->find('list',array(
		// 	'conditions'=>array("Type.online"=>1)));
		// $this->set('types',$this->Paginator->paginate(
		// 	array('Type.online'=>1)));

	}
/**
 * [admin_view description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
	public function view($id = null) {
		//$this->Area->recursive = 0;
		if (!$this->Area->exists($id)) {
			throw new NotFoundException(__('Invalid area'));
		}
		$this->loadModel('Characteristic');
		$characteristics = $this->Characteristic->find('list');
		$this->set(compact('characteristics'));
		$this->paginate = array('Property'=>array(
			"limit"=>1,
			//'conditions'=>array("Area.online"=>1),
			'order'=>array(
				'Property.id'=>'asc')
			));
		$d["property"] = $this->Paginate();
		$this->set($d );
		$options = array('conditions' => array('Area.' . $this->Area->primaryKey => $id));
		$this->set('area', $this->Area->find('first', $options));

	}
// public function view($id=null){
// 		if(!$id){
// 			throw new NotFoundException(__('No pages were found for this ID') ,array('class'=>'danger','type'=>'sign'));
// 		}
// 		$area = $this->Area->find('first',array(
// 			'conditions'=>array('Area.id'=>$id	//'type'=>'post'
// 				),
// 			'recursive'=>0
// 			));
// 		if(empty($area)){
// 			throw new NotFoundException(__('No pages were found for this ID') ,array('class'=>'danger','type'=>'sign'));
// 		}
// 		if($id != $area['Area']['id']){
// 			$this->redirect($area['Area']['link'],301);
// 		}
// 		$name = $area['Area']['name'];
// 		$d['area'] = $area;
// 		$this->set($d);
// 		$this->set(compact('name'));
// }
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Area->recursive = 0;
		$this->paginate = array('Area'=>array(
			"limit"=>20,
			'order'=>array(
				'Area.value'=>'asc')
			));
		$d["areas"] = $this->Paginate();
		$this->set($d );
		//$this->set('areas', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Area->exists($id)) {
			throw new NotFoundException(__('Invalid area'));
		}
		$this->loadModel('Characteristic');
		$characteristics = $this->Characteristic->find('list');
		$this->set(compact('characteristics'));
		$options = array('conditions' => array('Area.' . $this->Area->primaryKey => $id));
		$this->set('area', $this->Area->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Area->create();
			if ($this->Area->save($this->request->data)) {
				$this->Flash->success(__('The area has been saved.'),array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The area could not be saved. Please, try again.'),array('class' => 'alert alert-danger'));
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
		$this->layout='admin';
		if (!$this->Area->exists($id)) {
			throw new NotFoundException(__('Invalid area'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Area->save($this->request->data)) {
				$this->Flash->success(__('The area has been saved.'), array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The area could not be saved. Please, try again.'), array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Area.' . $this->Area->primaryKey => $id));
			$this->request->data = $this->Area->find('first', $options);
		}
	}
/**
 * admin_enable method
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
public function admin_enable($id=null) {
	$area = $this->Area->read(null,$id);
	if (!$id && empty($area)) {
		$this->Flash->error(__('You must provide a valid ID number to enable a user.',true),array('class'=>'danger','type'=>'sign'));
		$this->redirect(array('action'=>'index'));
	}
	if (!empty($area)) {
		$area['Area']['online'] = 1;
		if ($this->Area->save($area)) {
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
	$area = $this->Area->read(null,$id);
	if (!$id && empty($area)) {
		$this->Flash->error(__('You must provide a valid ID number to enable a user.',true),array('class'=>'danger','type'=>'sign'));
		$this->redirect(array('action'=>'index'));
	}
	if (!empty($area)) {
		$area['Area']['online'] = 0;
		if ($this->Area->save($area)) {
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
		$this->Area->id = $id;
		if (!$this->Area->exists()) {
			throw new NotFoundException(__('Invalid area'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Area->delete()) {
			$this->Flash->success(__('The area has been deleted.'), array('class' => 'alert alert-success'));
		} else {
			$this->Flash->error(__('The area could not be deleted. Please, try again.'), array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
