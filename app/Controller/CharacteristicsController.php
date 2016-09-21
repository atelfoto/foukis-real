<?php
App::uses('AppController', 'Controller');
/**
 * Characteristics Controller
 *
 * @property Characteristic $Characteristic
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class CharacteristicsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Characteristic->recursive = 0;
		$this->set('characteristics', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Characteristic->exists($id)) {
			throw new NotFoundException(__('Invalid characteristic'));
		}
		$options = array('conditions' => array('Characteristic.' . $this->Characteristic->primaryKey => $id));
		$this->set('characteristic', $this->Characteristic->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Characteristic->create();
			if ($this->Characteristic->save($this->request->data)) {
				$this->Flash->success(__('The characteristic has been saved.'),array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The characteristic could not be saved. Please, try again.'),array('class' => 'alert alert-danger'));
			}
		}
		$properties = $this->Characteristic->Property->find('list');
		$this->set(compact('properties'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Characteristic->exists($id)) {
			throw new NotFoundException(__('Invalid characteristic'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Characteristic->save($this->request->data)) {
				$this->Flash->success(__('The characteristic has been saved.'), array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The characteristic could not be saved. Please, try again.'), array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Characteristic.' . $this->Characteristic->primaryKey => $id));
			$this->request->data = $this->Characteristic->find('first', $options);
		}
		$properties = $this->Characteristic->Property->find('list');
		$this->set(compact('properties'));
	}
/**
 * admin_enable method
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
public function admin_enable($id=null) {
	$characteristic = $this->Characteristic->read(null,$id);
	if (!$id && empty($characteristic)) {
		$this->Flash->error(__('You must provide a valid ID number to enable a user.',true),array('class'=>'danger','type'=>'sign'));
		$this->redirect(array('action'=>'index'));
	}
	if (!empty($characteristic)) {
		$characteristic['Characteristic']['online'] = 1;
		if ($this->Characteristic->save($characteristic)) {
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
	$characteristic = $this->Characteristic->read(null,$id);
	if (!$id && empty($characteristic)) {
		$this->Flash->error(__('You must provide a valid ID number to enable a user.',true),array('class'=>'danger','type'=>'sign'));
		$this->redirect(array('action'=>'index'));
	}
	if (!empty($characteristic)) {
		$characteristic['Characteristic']['online'] = 0;
		if ($this->Characteristic->save($characteristic)) {
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
		$this->Characteristic->id = $id;
		if (!$this->Characteristic->exists()) {
			throw new NotFoundException(__('Invalid characteristic'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Characteristic->delete()) {
			$this->Flash->success(__('The characteristic has been deleted.'), array('class' => 'alert alert-success'));
		} else {
			$this->Flash->error(__('The characteristic could not be deleted. Please, try again.'), array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
