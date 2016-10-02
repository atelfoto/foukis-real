<?php
App::uses('AppModel', 'Model');
class Model extends AppModel{

	function afterFind($results, $primary = false){
		foreach($results as $k => $result){
			if(isset($result[$this->alias]['slug'])){
				$results[$k][$this->alias]['url'] = '/' . $result[$this->alias]['slug'];
			}
		}
		return $results;
	}

   public function afterFind($results, $primary = false){
        foreach($results as $k=>$result){
            if(isset($result[$this->alias]['id'])
            	){
            	$results[$k][$this->alias]['link']  = array('controller' => 'properties', 'action' => 'view', 'id' =>$result[$this->alias]['id']);
               // $results[$k][$this->alias]['photo'] = 'photos/' . ceil($result[$this->alias]['id']/1000) . '/' . $result[$this->alias]['id'] . '.jpg';
               // $results[$k][$this->alias]['meta']  = 'photos/' . ceil($result[$this->alias]['id']/1000) . '/' . $result[$this->alias]['id'] . '_meta.jpg';
               // $results[$k][$this->alias]['thumb'] = 'photos/' . ceil($result[$this->alias]['id']/1000) . '/' . $result[$this->alias]['id'] . '_thumb.jpg';
            }
        }
        return $results;
    }

}
