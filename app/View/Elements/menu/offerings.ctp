<div class="box">
<?php echo $this->Form->create(false, array(
	'novalidate' => true,
	'inputDefaults' => array(
		'div' => 'form-group',
		'label' => array(
			'class' => 'col col-md-3 control-label'
		),
		'wrapInput' => 'col col-md-9',
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
	<?php echo  $this->Form->input("property_id", array(
	'placeholder'=>__('property type'),
	'class'=>"form-control")); ?>
	<?php echo  $this->Form->input("size", array(
		"placholder"=>__('size'),
		'type'=>'number'
	)); ?>
	<?php echo $this->Form->year("year", "1900",date('Y'), array(
	"placeholder"=>__('year'),
	"class"=>__('form-control'))); ?>
	<?php echo  $this->Form->input('price', array(
	'placeholder'=>__('price'),
	"class"=>'form-control'
	)); ?>
		<?php echo  $this->Form->input("address", array(
	'placeholder'=>__('Enter your address...'),
	'type'=>'textarea',
	'style'=>'width:100%'
	)); ?>
	<?php echo  $this->Form->input("message", array(
	'placeholder'=>__('Enter your message...'),
	'type'=>'textarea',
	'style'=>'width:100%'
	)); ?>
	<div class="button text-right">
	<?php echo $this->Form->button("submit", array(
	'class'=>"btn btn-primary")); ?>
		<?php // echo $this->Form->submit('Sign in', array(
			//'div' => 'col col-md-9 col-md-offset-3',
			// 'class' => 'btn btn-primary'
		//)); ?>
	</div>
<?php echo $this->Form->end(); ?>
</div>


