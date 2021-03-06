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

	// public $viewClass = 'Json';

/**
 * Components
 *
 * @var array
 */
	public $components = array( 'Flash','Session','RequestHandler',"Qimage","Search.Prg","Paginator");

	 // public $paginate = array(
  //       'order' => array(
  //           'Property.area_id' => 'asc'
  //       )
  //   );

	public function offerings(){
		$this->layout='home';
		$types = $this->Property->Type->find('list');
		$statuses = $this->Property->Status->find('list');
		$this->set(compact('types','statuses'));
	}

/**
 * [index description]
 * @return [type] [description]
 */
public function index() {
	$this->Property->recursive = 0;
	$this->Prg->commonProcess(null, array(
		'paramType' => 'querystring'
		));
	$this->Paginator->settings = array(
		'Property' => array(
			'paramType' => 'querystring',
			'conditions' => $this->Property->parseCriteria(
				$this->Prg->parsedParams()
				)
			)
		);
	// $properties = $this->Property->find('list',array(
	// 	'order'=>array("Property.price"=>"asc"),
	// 	'conditions'=>array("Property.online"=>1)));
	$areas = $this->Property->Area->find('list',array(
		'order'=>array('Area.value'=>"asc"),
		"conditions"=>array('Area.online'=>1)));
	$states = $this->Property->State->find('list');
	$statuses = $this->Property->Status->find('list');
	$types = $this->Property->Type->find('list');
	$this->set(compact('areas','states','types','statuses'));
	// $this->paginate = array('Property'=>array(
	// 		//"limit"=>22,
	// 		'conditions'=>array("Property.online"=>1),
	// 		'order'=>array(
	// 			'Property.area_id'=>'asc')
	// 		));
	// 	$d["properties"] = $this->Paginate();
	// 	$this->set($d );
	$this->set('properties', $this->Paginator->paginate(
		array("Property.online"=>1),
		array("order"=>array('Property.price'=>"asc"))
		)
	);
}
/**
 * [area description]
 * @return [type] [description]
 */
	public function area(){
		// $this->Property->recursive = 0;
		// $areas = $this->Property->Area->find('list');
		// $this->set('area');
		$this->Property->recursive = 0;
		$this->paginate = array('Property'=>array(
			"limit"=>22,
			'order'=>array(
				'Property.area_id'=>'asc')
			));
		$d["properties"] = $this->Paginate();
		$this->set($d );
	}

/**
 * [rent description]
 * @return [type] [description]
 */
public function rent() {
	$this->Property->recursive = 0;
	$this->Prg->commonProcess(null, array(
		'paramType' => 'querystring'
		));
	$this->Paginator->settings = array(
		'Property' => array(
			'paramType' => 'querystring',
			'conditions' => $this->Property->parseCriteria(
				$this->Prg->parsedParams()
				)
			)
		);
	$areas = $this->Property->Area->find('list',array(
		'order'=>array('Area.value'=>"asc"),
		"conditions"=>array('Area.online'=>1)));
	$states = $this->Property->State->find('list');
	$statuses = $this->Property->Status->find('list');
	$types = $this->Property->Type->find('list');
	$this->set(compact('areas','states','types','statuses'));
	$this->set('properties', $this->Paginator->paginate(
		array("Property.online"=>1,"Status.value LIKE"=>'ToLet')
		)
	);
}
/**
 * [buy description]
 * @return [type] [description]
 */
public function buy() {
	$this->Property->recursive = 0;
	$this->Prg->commonProcess(null, array(
		'paramType' => 'querystring'
		));
	$this->Paginator->settings = array(
		'Property' => array(
			'paramType' => 'querystring',
			'conditions' => $this->Property->parseCriteria(
				$this->Prg->parsedParams()
				)
			)
		);
	$areas = $this->Property->Area->find('list',array(
		'order'=>array('Area.value'=>"asc"),
		'conditions'=>array('Area.online'=>1)));
	$states = $this->Property->State->find('list');
	$statuses = $this->Property->Status->find('list');
	$types = $this->Property->Type->find('list');
	$this->set(compact('areas','states','types','statuses'));
	$this->set('properties', $this->Paginator->paginate(
		array("Property.online"=>1,"Status.value LIKE"=>'ForSale')
		)
	);
}
/**
 * [view description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
	public function view($id = null){
		if(!$id){
			throw new NotFoundException('Aucune page ne correspond à cet ID');
		}
		$property = $this->Property->find('first',array(
			'conditions' => array('Property.id' => $id,
				"Property.online"=>1
				),
			'recursive'  => 1
			)
		);
		if(empty($property)){
			throw new NotFoundException('Aucune page ne correspond à cet ID');
		}
		if($id != $property['Property']['id']){
			$this->redirect($property['Property']['link'],301);
		}
		$name = $property['Property']['name'];
		$d['property'] = $property;
		$this->set($d);
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
			"limit"=>22,
			'order'=>array(
				//'Property.created'=>'desc')
				'Property.area_id'=>'asc')
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
				return $this->redirect(array('action' => 'upload',$this->Property->id));
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
				return $this->redirect(array('action' => "index"));
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
 * [admin_upload description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
	public function admin_upload($id=null){
		$options = array('conditions' => array('Property.' . $this->Property->primaryKey => $id));
		$this->set('property', $this->Property->find('first', $options));
		$dir = WWW_ROOT .'img'.DS.'properties'.DS.$id;
		if(!file_exists($dir))
			mkdir($dir, 0777);
		$dirThumbs = $dir.DS.'thumbs/';
		if(!file_exists($dirThumbs))
			mkdir($dirThumbs,0777);
		if (!empty($this->request->data)) {
			$this->set('_serialize', array('properties'));
			$imageName = $this->request->data['Property']['files'][0]['name'];
			$extension =strtolower(pathinfo($this->request->data['Property']['files'][0]['name'],PATHINFO_EXTENSION));
			if (file_exists($dir.'/'.$imageName)) {
				$imageName = date('His') . $imageName;
			}
			if (!empty($this->request->data['Property']['files'][0]['tmp_name'])&&
				in_array($extension,array('jpg','png','jpeg'))) {
				$j=1;
            	$counts = count(glob($dir.DS.'*.jpg'));
            	$imageName = $counts + 1 ;
            	$imageName = $id.'-'.sprintf('%02d', $imageName).".jpg" ;
				move_uploaded_file($this->request->data['Property']['files'][0]['tmp_name'], $dir.'/'.$imageName);
				list($width, $height) =  getimagesize($dir.'/'.$imageName);
				if ($width > $height) {
					$this->Qimage->resize(array(
						'height' => 133,
						'width' => 200,
						'file' =>  $dir.'/'.$imageName,'output' => $dirThumbs
						)
					);
				}else{
					$this->Qimage->resize(array(
						'height' => 133,
						'width' => 88,
						'file' =>  $dir.'/'.$imageName,
						'output' => $dirThumbs
						)
					);
				}
				$this->Qimage->watermark(array('file' => $dir.'/'.$imageName));
				$this->Flash->success(__('Files saved successfully'),array('class' => 'alert alert-success'));
			}else  if (!empty($this->request->data['Property']['files'][0]['tmp_name'])) {
				$this->Flash->error(__('There was a problem uploading file. Please try again.'));
				}
			return true;
		}
	}

/**
 * [admin_rename description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
	 public function admin_count($id=null){
	 	$dir_content = WWW_ROOT .'img'.DS.'properties'.DS.$id.DS;
	 	$counts = count(glob($dir_content.'*.jpg'));
	 	$this->Property->id = $id;// est nécésaire pour sauvegarder un champ
	 	if ($this->Property->saveField('mediaQuantities',$counts)) {
	 		$this->Flash->success(__('Your pictures has been published in the folder  %s.',h($id)));
	 		return $this->redirect(array('controller'=>'properties','action'=>'index'));
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
			$this->Flash->success(__('User ID %s has been disabled.',h($id)));
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
