<?php  echo $this->assign('title', __('I search a property to be bought')); ?>
 <?php  $this->Html->addCrumb(__('Properties')); ?>
<div class="page-header">
	<h2 class="title"> <?php echo __('I search a property to be bought') ; ?></h2>
</div>
<div class="properties index content">
	<?php
    echo $this->Form->create(false, array(
    	'novalidate',
	'inputDefaults' => array(
		'div' => 'form-group',
		'label' => array(
			'class' => 'control-label'
		),
		// "between"=>'<div class="input-group"><div class="input-group-addon">$</div>',
		// "after"=>'</div>',
		//'wrapInput' => 'col col-md-9',
		'class' => 'form-control'
	),
	'class' => 'well form-horizontal'
));
 //    echo  $this->Form->input("Property.name", array(
	// 'placeholder'=>__('name')));
	echo  $this->Form->input("Property.size", array(
	'placeholder'=>__('size')));
	echo  $this->Form->input("Property.price", array(
	'placeholder'=>__('price')));
	echo  $this->Form->input("Property.area_id", array(
	'empty'=>__('choose')
	));
	echo  $this->Form->input("Property.state_id", array(
	'empty'=>__('choose')
	));
	echo  $this->Form->input("Property.type_id", array(
	'empty'=>__('choose')
	));
  ?>
  <?php
    echo '<div class="button text-right">';
    echo $this->Form->button(__('Submit'),array('class'=>"btn btn-primary"));
    echo "</div>";
    echo $this->Form->end();
?>
</div>


	<?php echo $this->element('property/index') ?>



