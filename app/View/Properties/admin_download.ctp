<?php echo $this->assign('title', __('property')); ?>
 <?php $this->Html->addCrumb(__('property'),array('controller'=>'properties','action'=>'index','admin'=>true)); ?>
 <?php $this->Html->addCrumb('download' ); ?>
<div class="properties index row">
	<div class="col-sm-12 page-header">
		<h3><i class="icon-download"> <?= __('download'); ?></i></h3>
	</div>
	<div class="col-sm-12">
		<div class="box box-primary with-border ">
			<ul class="nav nav-tabs">
				<li class="pull-right">
					<?php echo $this->html->link('<i class="icon-cancel-circled" style="color:#f00;">&nbsp;</i>'.__('closed'),
							array('controller'=>'properties','action'=>'index'),
							array('class' => 'btn btn-default','escape'=>false)); ?>
				</li>
			</ul>
			<div class=" box-body">
				<?php echo $this->Form->create('Property', array('url'=>array('action'=>"download"),'type'=>'file')); ?>
					<?php echo $this->Form->input('files.', array('type' => 'file', 'label' => false,  'class' => 'file', 'multiple','data-upload-url'=>"download"));  ?>
				<?php echo  $this->Form->end(); ?>
			</div>
		</div>
	</div>
</div>


<?php echo  $this->Html->script(array("admin/fileinput/canvas-to-blob.min","admin/fileinput/fileinput.min", "admin/fileinput/locale/fr.js") , array('inline'=>false)); ?>

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
    //initialPreviewConfig:[{
    //with:120px,
    //}],
	allowedFileExtensions : ['jpg'],
	uploadAsync : true ,
	showUpload: true,
	showCaption: true,
	showBrowse : true ,
    browseOnZoneClick : true,
    minFileCount: 1,
    maxFileCount:10,
    autoReplacs :true,
    showAjaxErrorDetails:true,
    resizeImage: true,
    maxImageWidth: 900,
	class:'file-loading',
	//browseClass: "btn btn-primary ",
});
<?= $this->Html->scriptEnd(); ?>

