<?php // echo $this->Html->css(array('fileinput.min'),array('inline'=>false)); ?>
<?php  echo $this->set('title_for_layout',__('Account'));  ?>
<div class="row">
 	<div class="col-md-12 col-lg-offset-3 col-lg-6">
 		<div class="page-header">
		 	<h1><?php  echo __('Account'); ?></h1>
		</div>
 		<div class="panel panel-info box-home">
 			<div class="panel-heading">
 				<h1 class="panel-title">&nbsp;</h1>
 			</div>
 			<div class="panel-body row">
 				<div class="col-md-4 text-center">
 					<?php  if ($this->Session->read('Auth.User.avatar')==1):?>
 							<?=  $this->Html->image($this->Session->read('Auth.User.avatari') . '?' . rand(),array('class'=>'img-thumbnail')); ?>
 						<?php else: ?>
 							<?=  $this->Html->image('avatars/gravatar.jpg',array('class'=>"img-thumbnail")); ?>
 					<?php  endif ?>
 					<?=  $this->Form->create('User',array('type'=>'file','class'=>'form-horizontal')); ?>
 					<div class="form-group form-inline" style="margin-top:10px;">
 						<?php  echo  $this->Form->input('avatarf',array('label'=>false,'type'=>"file",
 						"required"=>false)); ?>
 						<p class="help-block"><?php echo __("Select a file from your computer") ?></p>
 					</div>
 				</div>
 				<fieldset class="col-md-7 ">
 					<div class="form-group">
 						<?=  $this->Form->input('username', array('label'=>__('Username'),'id'=>'disabledTextInput','class'=>'disabled form-control',
 						'disabled'=>true, 'readonly'=> true,'value'=>$this->Session->read('Auth.User.username'))); ?>
 					</div>
 					<div class="form-group"><?=  $this->Form->input('name', array('label'=> __('Name') ,'class'=>'form-control')); ?></div>
 					<div class="form-group"><?=  $this->Form->input('firstname', array('label'=>__('firstname') ,"class"=>'form-control')); ?></div>
 					<div class="form-group"><?=  $this->Form->input('mail', array('label'=>__('email') ,"class"=>'form-control')); ?></div>
 					<div class="form-group"><?php  echo  $this->Form->input('password', array('label'=>array("text"=>__('password') ,"class"=>'form-label'),
 					"class"=>"form-control",'value'=>$this->Session->read('Auth.User.password'))); ?></div>
 					<!-- <div class="form-group"><?php //  echo  $this->Form->input('password2', array('label'=>array("text"=>__('confirm password') ,"class"=>'form-label'),
 					// 'type'=>"password",'class'=>"form-control")); ?></div> -->
 					<hr class="" style="padding-bottom:20px;">
 					<div class="button text-right">
 						<button  type="submit" class="btn btn-primary"><i class="fa fa fa-check fa-lg" style="color:#fff;">&nbsp;</i><?= __('Change'); ?> </button>
 						<button  type="reset" class="btn btn-primary"> <?= __('Reset'); ?></button>
 					</div>
 				</fieldset>
 				<?=  $this->Form->end(); ?>
 			</div>
 		</div>
 	</div>
</div>
<?php echo  $this->Html->script(array("admin/fileinput/canvas-to-blob.min","admin/fileinput/fileinput.min", "admin/fileinput/locale/fr.js") , array('inline'=>false)); ?>
<?=  $this->Html->scriptStart(array('inline'=>false)); ?>
$("#UserAvatarf").fileinput({
	language: "fr",
	allowedFileExtensions : ['jpg'],
	showUpload: false,
	showCaption: false,
	browseClass: "btn btn-primary ",
    resizeImage: true,
    maxImageHeight: 217,
});
<?= $this->Html->scriptEnd(); ?>
