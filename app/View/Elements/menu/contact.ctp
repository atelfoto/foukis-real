<!-- <h1>contact</h1> -->
<!-- <div class=""> -->
<?php echo $this->Form->create(false, array(
	'novalidate' => true,
	'inputDefaults' => array(
		'div' => 'form-group',
		'label' => array(
			'class' => 'control-label'
		),
	//	'wrapInput' => 'col col-md-9',
		'class' => 'form-control'
	),
	'class' => 'well form-horizontal'
)); ?>
	<?php echo  $this->Form->input("name", array(
	'placeholder'=>__('name'))); ?>
	<?php echo $this->Form->input('email', array(
		'placeholder' => 'Email'
	)); ?>
	<?php echo  $this->Form->input("phone", array(
	'placeholder'=>__('phone'))); ?>
	<?php echo  $this->Form->input("subject", array(
	'placeholder'=>__('subject'))); ?>
	<?php echo  $this->Form->input("message", array(
	'placeholder'=>__('Enter your message...'),
	'type'=>'textarea',
	)); ?>
	<?= $this->Form->input('website', array(
	'label'=>false)); ?>
	<div class="button text-right">
	<?php echo $this->Form->button("submit", array(
	'class'=>"btn btn-primary")); ?>
	</div>
<?php echo $this->Form->end(); ?>
<!-- </div> -->
