<?php echo $this->assign('title', __('property')); ?>
 <?php $this->Html->addCrumb(__('property'),array('controller'=>'properties','action'=>'index','admin'=>true)); ?>
 <?php $this->Html->addCrumb('edit' ); ?>
<div class="properties index row">
	<div class="col-sm-12 page-header">
		<h3><i class="icon-property"></i>&nbsp;<?php echo __('Admin Edit Property'); ?>		</h3>
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
			 				array('class' => 'btn btn-success btn-sm pull-right')); ?>
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
					<?php echo $this->Form->input('characteristics_id', array('class' => 'form-control',
							 'placeholder' => __('Characteristics Id'),
							 'between'=>'<div class="input-group"><div class="input-group-addon"><i class="icon-characteristics_id"></i></div>'
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
<?php  echo $this->Html->script(array('tinymce/tinymce.min'),array('inline'=>false)); ?>
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
//pour le textarea
tinyMCE.init({
	selector: "#PropertyContent",
	height:'500',
    elements:"contenu",
	entity_encoding : "raw",
	encoding: "UTF-8",
	theme: "modern",
	language :"fr_FR",
  	skin: "lightgray-gradient",
  	browser_spellcheck: true,
  	elementpath: true,
    media_live_embeds: true,
    plugin_preview_width: 1170,
    paste_remove_styles : true,
    visualblocks_default_state: true,
    visual_table_class: 'table table-striped',
    relative_urls: false,
    spellchecker_languages : "English=en,French=fr",
    code_dialog_height: 550,
  	code_dialog_width: 900,
  	fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',

    image_advtab: true,
	resize: "none",
	// mode:"exact",

	plugins: [
		"advlist autolink lists link image charmap  preview hr anchor pagebreak",
		"searchreplace wordcount visualblocks code ",
		"media nonbreaking save table contextmenu ",
		"template paste textcolor spellchecker emmet"
		],

	toolbar1: " undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link unlink anchor ",
	toolbar2: " preview code | forecolor backcolor | spellchecker media image |  visualblocks hr bootstrap fontsizeselect template",

 table_class_list: [
    {title: 'None', value: ''},
    {title: 'table-striped', value: 'table table-striped'},
    {title: 'table-hover', value: 'table table-hover'},
    {title: 'table-hover', value: 'table table-bordered'},
    {title: 'table-condensed', value: 'table table-condensed'}
  ],
  table_appearance_options: false,
    image_explorer :'<?php echo $this->Html->url(array('controller'=>'medias','action'=>'index', $this->request->data['Property']['id'])); ?>',
    image_edit :'<?= $this->Html->url(array('controller'=>'medias','action'=>'show')); ?>',
    content_css : '<?= $this->Html->url('/css/wysiwyg.css'); ?>',
    table_appearance_options: false,
    // table_grid: false,
setup: function(editor) {
    editor.addButton('bootstrap', {
      type: 'menubutton',
      text: 'bootstrap',
      icon: false,
      menu: [{
        text: 'table',
        onclick: function() {
          editor.insertContent('<div class="table-responsive">insert table</div><div></div>');
        }
      },{
        text: 'panel',
        onclick: function() {
          editor.insertContent('<div class="panel panel-default"><div class="panel-heading">heading</div><div class="panel-body">content</div><div class="panel-footer">footer</div></div>');
        }
      },{
      	text: 'video',
      	onclick: function(){
      	editor.insertContent('<div class="embed-responsive embed-responsive-16by9"><iframe src="" width="640" height="360" ></iframe></div><div><p>&nbsp;</p></div>');
      	}
      }]
    });
  },
  	table_class_list: [
    {title: 'None', value: ''},
    {title: 'table-striped', value: 'table table-striped'},
    {title: 'table-hover', value: 'table table-hover'},
    {title: 'table-bordered', value: 'table table-bordered'},
    {title: 'table-condensed', value: 'table table-condensed'}
  ],
templates: [
 {title: 'panel-tableau',
  content: '<div class="panel panel-default"><div class="panel-heading"><h3>insert</h3></div>&nbsp;<div class="panel-footer">footer</div></div>'},
 {title: 'table',
  content: '<div class="table-responsive">insert table</div><div>suite</div>'},
 {title: 'video',
 "description": "description de mon template",
  content: '<div class="embed-responsive embed-responsive-16by9"><iframe src="" width="640" height="360" ></iframe></div><div><p>insert</p></div>'},
 {title: 'test',
 "description": "description de mon templatetest",
 "url": "/development.html"},
    ],
template_popup_height: 500,
template_popup_width: 900,
});

function send_to_editor(content){
	var ed = tinyMCE.activeEditor;
	ed.execCommand('mceInsertContent',false,content);
};

//pour les meta description
$(document).ready(function(e) {
  $('#PropertyDescription').keyup(function() {
    var nombreCaractere = $(this).val().length;
    var nombreMots = jQuery.trim($(this).val()).split(' ').length;
    if($(this).val() === '') {
     	nombreMots = 0;
    }
    var msg = ' ' + nombreMots + ' mot(s) | ' + nombreCaractere + ' Caractere(s) / 160';
    $('#compteur').text(msg);
    if (nombreCaractere > 160) { $('#compteur').addClass("mauvais"); } else { $('#compteur').removeClass("mauvais"); }
  })
});
<?= $this->Html->scriptEnd(); ?>