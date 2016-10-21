<?php  echo $this->assign('title', __('I search a property to be bought')); ?>
 <?php  $this->Html->addCrumb(__('Properties')); ?>
<div class="index content properties">
	<?php
    echo $this->Form->create(false, array(
    	'novalidate',
    	'inputDefaults' => array(
    		'div' => 'form-group',
    		'label' => array(
    			'class' => 'control-label'
    			),
    		'class' => 'form-control','required'=>false
    		),
    	'class' => 'well form-horizontal'
    	)
    );
    ?>
    <div class="properties-body">
    <?php
    echo $this->element('property/form');
	 echo  $this->Form->input('Property.bedrooms',array(
	 	"empty"=>"rooms mini",
	 	"options" => array(0,1,2,3,4,5),
	 	"label"=>array('text'=>"mini rooms","class"=>"control-label")));
 	?>
	</div>
  <?php

    echo '<div class="button text-right">';
	// echo  $this->Form->input("Property.status_id", array(
	// 'value'=>'ForSale','after'=>false,'required'=>false,"style"=>"display:none","label"=>array("style"=>"display:none")	));
    echo $this->Form->button(__('search'),array('class'=>"btn btn-primary"));
    echo "</div>";
    echo $this->Form->end();
?>
</div>
<?php echo $this->element('property/index') ?>



