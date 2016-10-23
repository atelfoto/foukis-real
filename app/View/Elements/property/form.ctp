<?php
	echo  $this->Form->input(ltrim("Property.area_id"), array(
	'empty'=>__('all the areas'),"label"=>array('text'=>__('area'),"class"=>'control-label')
	));
	echo  $this->Form->input(ltrim("Property.state_id"), array(
	'empty'=>__('all the states'),"label"=>array('text'=>__('states'),"class"=>'control-label')
	));
	echo  $this->Form->input(ltrim("Property.type_id"), array(
	'empty'=>__('what type'),"label"=>array('text'=>__('what ?'),"class"=>'control-label')
	));
	echo  $this->Form->input("Property.price", array(
	'placeholder'=>__('price maxi'),"label"=>array('text'=>__('price maxi'),"class"=>'control-label')));
	echo  $this->Form->input("Property.size", array(
	'placeholder'=>__('mini surface'),"label"=>array('text'=>__('mini surface'),"class"=>'control-label')));
	 ?>
