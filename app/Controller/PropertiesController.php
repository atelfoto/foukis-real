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
				return $this->redirect(array('action' => 'download',$id));
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
* admin_download
**/
// public function admin_download(){
// 	$this->Property->create();

// }

// public function admin_download(){
// 	if(!empty($this->request->data)){
// 		/*  Start code for o Uploading images*/
// 		// debug($this->request->data);die();
// 		foreach ($this->request->data as $result) {
// 			$name = $result['name'];
//           if( !empty($name)){     // Check For Empty Values
//           	$tmprary_name = $result['tmp_name'];
//           	$temp = explode(".", $name);
//           	$newfilename = uniqid(). '.' . end($temp);
//           	if (move_uploaded_file($tmprary_name , $target_dir.$newfilename)) {
//           		echo "The file ". basename( $name). " has been successfully uploaded.<BR/>";
//           	}else {
//           		echo "Sorry, there was an error uploading your file.<br/>";
//           	}
//           }
//       }
//   }
// }
/**
* admin_download
**/
public function admin_download($id=null){
	if ($this->request->is('ajax')) {
		$this->layout = false;
		//	$this->set('ajax', 0);


	if (!empty($this->request->data)) {
		debug($this->request->data);
		debug($this->request->data['Property']);
		debug($this->request->data['Property']['files']);
		//$tmp_name=$this->request->data['Property']['files'][0]['tmp_name'];//mauvais en unique
		$uploadFolder = 'img/properties/';
		debug($uploadFolder);
		$image = $this->request->data['Property']['files'][0]['name'];// mauvais unique marche avec [0] en multiple
		debug($image);
		$uploadPath = WWW_ROOT. $uploadFolder;
		debug($uploadPath);
		if (!empty($this->request->data['Property']['files'][0]['tmp_name'])) {// mauvais unique marche avec [0] en multiple
			debug($this->request->data['Property']['files'][0]['name']);// mauvais unique marche avec [0] en multiple
			//die();
			move_uploaded_file($this->request->data['Property']['file'][0]['name'], $uploadPath.'/'.$image);
		}


		if (move_uploaded_file($image['name'], $full_image_path)) {
			$this->Flash->success(__('The property has been saved.'), array('class' => 'alert alert-success'));
			//$this->Flash->success('File saved successfully',array('class' => 'alert alert-success'));
			return $this->redirect(array('action' => 'index'));
		}else {
			$this->Flash->error(__('The property could not be saved. Please, try again.'), array('class' => 'alert alert-danger'));
		//	$this->Flash->error('There was a problem uploading file. Please try again.', array('class' => 'alert alert-danger'));
		}
	}else{
		//$this->Flash->error('Error uploading file.', array('class' => 'alert alert-danger'));
	}

}


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
