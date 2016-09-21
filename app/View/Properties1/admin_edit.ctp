<?php echo $this->assign('title', __('property')); ?>
 <?php $this->Html->addCrumb(__('property'),array('controller'=>'properties','action'=>'index','admin'=>true)); ?>
 <?php $this->Html->addCrumb('edit' ); ?>
<div class="properties index row">
	<div class="col-sm-12 page-header">
		<h3><i class="icon-properties"></i>&nbsp;<?php echo __('Admin Edit Property'); ?>		</h3>
	</div>
	<div class="col-sm-12">
		<div class="box box-primary  with-border nav-tabs-custom">
			<?php echo $this->Form->create('Property',array(
				'novalidate'=>true,
				'inputDefaults'=>array(
				'div'=>'form-group',
				'label'=>array('class'=>'control-label'),
				'after'=>'</div>',
				'error'=>array('attributes' => array('wrap' => 'span', 'class' => 'help-block text-danger')),
				'class'=>'form-control'),
				'class'=>'')); ?>
			<ul class="nav nav-tabs" role="tablist">
		 		<li role="presentation" class="active">
		 			<a href="#contenu" role="tab" data-toggle="tab" aria-controls="contenu">contenu</a>
		 		</li>
		 		<li role="presentation">
		 			<a href="#publication" role="tab" data-toggle="tab" aria-controls="publication">publication</a>
		 		</li>
				<li class='pull-right'>
					<?php echo $this->html->link('<i class="icon-cancel-circled" style="color:#f00;">&nbsp;</i>'.__('closed'),
							array('controller'=>'properties','action'=>'index'),
							array('class' => 'btn btn-default','escape'=>false)); ?>
				</li>
				<li class='pull-right'>
					<?php echo $this->Form->button('<i class="icon-ok" style="color:#fff;">&nbsp;</i>'.__('publish'),
			 				array('class' => 'btn btn-success  pull-right')); ?>
				</li>
				<li class='pull-right'>
					<?php echo $this->Form->input('online', array('label' => false,'div'=>array('class'=>'pull-right'),
							'after'=>false)); ?>
				</li>
			</ul>
			<div class="tab-content box-body">
				<div class="tab-pane fade in active" role="tabpanel" id="contenu">
					<?php echo $this->Form->input('id', array('class' => 'form-control',
							 'placeholder' => __('Id'),
							 'between'=>'<div class="input-group"><div class="input-group-addon"><i class="icon-id"></i></div>'
							 ));?>
					<?php echo $this->Form->input('id2', array('class' => 'form-control',
							 'placeholder' => __('Id2'),
							 'between'=>'<div class="input-group"><div class="input-group-addon"><i class="icon-id2"></i></div>'
							 ));?>
					<?php echo $this->Form->input('name', array('class' => 'form-control',
							 'placeholder' => __('Name'),
							 'between'=>'<div class="input-group"><div class="input-group-addon"><i class="icon-name"></i></div>'
							 ));?>
					<?php echo $this->Form->input('content', array('class' => 'form-control',
							 'placeholder' => __('Content'),
							 'between'=>'<div class="input-group"><div class="input-group-addon"><i class="icon-content"></i></div>'
							 ));?>
					<?php echo $this->Form->input('state_id', array('class' => 'form-control',
							 'placeholder' => __('State Id'),
							 'between'=>'<div class="input-group"><div class="input-group-addon"><i class="icon-state_id"></i></div>'
							 ));?>
					<?php echo $this->Form->input('area_id', array('class' => 'form-control',
							 'placeholder' => __('Area Id'),
							 'between'=>'<div class="input-group"><div class="input-group-addon"><i class="icon-area_id"></i></div>'
							 ));?>
					<?php echo $this->Form->input('status_id', array('class' => 'form-control',
							 'placeholder' => __('Status Id'),
							 'between'=>'<div class="input-group"><div class="input-group-addon"><i class="icon-status_id"></i></div>'
							 ));?>
					<?php echo $this->Form->input('type_id', array('class' => 'form-control',
							 'placeholder' => __('Type Id'),
							 'between'=>'<div class="input-group"><div class="input-group-addon"><i class="icon-type_id"></i></div>'
							 ));?>
					<?php echo $this->Form->input('characteristic_id', array('class' => 'form-control',
							 'placeholder' => __('Characteristic Id'),
							 'between'=>'<div class="input-group"><div class="input-group-addon"><i class="icon-characteristic_id"></i></div>'
							 ));?>
					<?php echo $this->Form->input('characteristic_property_id', array('class' => 'form-control',
							 'placeholder' => __('Characteristic Property Id'),
							 'between'=>'<div class="input-group"><div class="input-group-addon"><i class="icon-characteristic_property_id"></i></div>'
							 ));?>
					<?php echo $this->Form->input('dateYear', array('class' => 'form-control',
							 'placeholder' => __('DateYear'),
							 'between'=>'<div class="input-group"><div class="input-group-addon"><i class="icon-dateYear"></i></div>'
							 ));?>
					<?php echo $this->Form->input('bedrooms', array('class' => 'form-control',
							 'placeholder' => __('Bedrooms'),
							 'between'=>'<div class="input-group"><div class="input-group-addon"><i class="icon-bedrooms"></i></div>'
							 ));?>
					<?php echo $this->Form->input('size', array('class' => 'form-control',
							 'placeholder' => __('Size'),
							 'between'=>'<div class="input-group"><div class="input-group-addon"><i class="icon-size"></i></div>'
							 ));?>
					<?php echo $this->Form->input('level', array('class' => 'form-control',
							 'placeholder' => __('Level'),
							 'between'=>'<div class="input-group"><div class="input-group-addon"><i class="icon-level"></i></div>'
							 ));?>
					<?php echo $this->Form->input('price', array('class' => 'form-control',
							 'placeholder' => __('Price'),
							 'between'=>'<div class="input-group"><div class="input-group-addon"><i class="icon-price"></i></div>'
							 ));?>
					<?php echo $this->Form->input('media_id', array('class' => 'form-control',
							 'placeholder' => __('Media Id'),
							 'between'=>'<div class="input-group"><div class="input-group-addon"><i class="icon-media_id"></i></div>'
							 ));?>
					<?php echo $this->Form->input('mediaQuantities', array('class' => 'form-control',
							 'placeholder' => __('MediaQuantities'),
							 'between'=>'<div class="input-group"><div class="input-group-addon"><i class="icon-mediaQuantities"></i></div>'
							 ));?>
					<?php echo $this->Form->input('user_id', array('class' => 'form-control',
							 'placeholder' => __('User Id'),
							 'between'=>'<div class="input-group"><div class="input-group-addon"><i class="icon-user_id"></i></div>'
							 ));?>
					<?php echo $this->Form->input('modified_by', array('class' => 'form-control',
							 'placeholder' => __('Modified By'),
							 'between'=>'<div class="input-group"><div class="input-group-addon"><i class="icon-modified_by"></i></div>'
							 ));?>
				</div>
				<div class="tab-pane fade" role="tabpanel" id="publication">

				</div>
			</div>
			<div class="text-right box-footer" style="margin-top:10px;">
				<?php echo $this->Form->submit(__('publish'), array('div'=>false,'class' => 'btn btn-primary')); ?>
				<?php echo $this->html->link('<i class="icon-cancel-circled" style="color:#f00;">&nbsp;</i>'.__('closed'),
						array('controller'=>'properties','action'=>'index'),
						array('class' => 'btn btn-default','escape'=>false)); ?>
			</div>
			<?php echo $this->Form->end() ?>
		</div>
	</div><!-- end containers -->
</div>
<?php echo  $this->Html->scriptStart(array('inline'=>false)); ?>
//pour les tabs
$('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
});
//pour les toogle
  $(function() {
    $('#PropertyOnline').bootstrapToggle({
		size:'small',
		onstyle: 'primary',
		offstyle:'danger',
    });
  });
 <?= $this->Html->scriptEnd(); ?>