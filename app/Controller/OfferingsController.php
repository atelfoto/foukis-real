<?php
class OfferingsController extends AppController{
	public $components = array ('Session','Security');
	/**
	 * beforeFilter callback
	 *
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow(array('index'));
	}

	function index(){
		if($this->request->is('post')){
		if (!empty($this->request->data['Offering']['website'])) {
			$this->Session->setFlash(__("Your Mail us is reached."),'flash',array('class'=>"success"));
			$this->request->data = array();
		}else{
 				if($this->Offering->send($this->request->data['Offering'] )){
 					$this->Session->setFlash(__("Thank you.Your Mail Us is reached."),'flash',array('class'=>"success"));
 					$this->request->data = array();
 				} else{
					$this->Session->setFlash(__("Thank you to correct your fields."),"flash",array('class'=>'danger'));
 				}
			}
		}
	}
}
