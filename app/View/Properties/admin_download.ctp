<?php echo $this->assign('title', __('property')); ?>
 <?php $this->Html->addCrumb(__('property'),array('controller'=>'properties','action'=>'index','admin'=>true)); ?>
 <?php $this->Html->addCrumb('download' ); ?>
<div class="properties index row">
	<div class="col-sm-12 page-header">
		<h3><i class="icon-download"> <?= __('download'); ?></i></h3>
	</div>
	<div class="col-sm-12">
		<div class="box box-primary with-border ">
			<div class=" box-body">
				<?php echo $this->Form->create('Property', array('url'=>array('action'=>"download"),'type'=>'file','multiple')); ?>
					<?php echo $this->Form->input('files.', array('type' => 'file', 'label' => false,  'class' => 'file-loading', 'multiple','data-upload-url'=>"download"));  ?>
						<div class="text-right box-footer" style="margin-top:10px;">
							<?php echo $this->Form->submit(__('publish'), array('div'=>false,'class' => 'btn btn-primary')); ?>
							<?php echo $this->html->link('<i class="icon-cancel-circled" style="color:#f00;">&nbsp;</i>'.__('closed'),
									array('controller'=>'properties','action'=>'index'),
									array('class' => 'btn btn-default','escape'=>false)); ?>
						</div>
				<?php  $this->Form->end(); ?>
			</div>
		</div>
	</div>
</div>


<?php echo  $this->Html->script(array("admin/fileinput/fileinput.min", "admin/fileinput/locale/fr.js") , array('inline'=>false)); ?>

<?=  $this->Html->scriptStart(array('inline'=>false)); ?>
$("#PropertyFiles").fileinput({
	language: "fr",
	removeIcon: '<i class="icon-trash text-danger"></i>',
	uploadIcon: '<i class="icon-up-circled text-info"></i>',
	zoomIcon: '<i class="icon-zoom-in"></i>',
	dragIcon: '<i class="icon-menu"></i>',
	indicatorNew: '<i class="icon-hand-down text-warning"></i>',
	indicatorSuccess: '<i class="glyphicon glyphicon-ok-sign text-success"></i>',
    indicatorError: '<i class="glyphicon glyphicon-exclamation-sign text-danger"></i>',
    indicatorLoading: '<i class="glyphicon glyphicon-hand-up text-muted"></i>',
    previewFileIcon: '<i class="icon-dov-inv"></i>',
    browseIcon: '<i class="icon-folder-open-empty"></i>&nbsp;',
    cancelIcon: '<i class="icon-block"></i>',
    msgValidationErrorIcon: '<i class="glyphicon glyphicon-exclamation-sign"></i> ',
	allowedFileExtensions : ['jpg'],
	showUpload: true,
	showCaption: false,
	class:'file-loading',
	//browseClass: "btn btn-primary ",
});
<?= $this->Html->scriptEnd(); ?>
