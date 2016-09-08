tinyMCE.init({
	selector: ".textarea1",
	// mode:"exact",
	height:'500',
		elements:"contenu",
	entity_encoding : "raw",
	encoding: "UTF-8",
	theme: "modern",
	language :"fr_FR",
	resize: "none",
	plugins: [
		"advlist autolink lists link image charmap  preview hr anchor pagebreak",
		"searchreplace wordcount visualblocks  ",
		"insertdatetime media nonbreaking save table contextmenu directionality",
		"template paste textcolor  code "
		],
	spellchecker_languages : "English=en,French=fr",
	toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | ",
	toolbar2: " preview code | forecolor backcolor  | spellchecker media image | link unlink anchor | tableau visualblocks hr mybutton ",
			plugin_preview_width: 1170,
			code_dialog_height: 550,
			code_dialog_width: 900,
		image_advtab: true,
		paste_remove_styles : true,
		visualblocks_default_state: true,
		image_explorer :['<?php echo $this->Html->url(array('controller'=>'medias','action'=>'index', $this->request->data['Activity']['id'])); ?>'],
		image_edit :'<?= $this->Html->url(array('controller'=>'medias','action'=>'show')); ?>',
		content_css : '<?= $this->Html->url('/css/wysiwyg.css'); ?>',
		 table_appearance_options: false,
		// table_grid: false,
//    setup: function (editor) {
//  	editor.addButton('tableau', {
//  		text: 'Tableau',
//  		icon: false,
//  		onclick: function () {
//  			editor.insertContent('<div class="panel-body table-responsive"><table><thead><tr><th></th></tr></thead><tbody><tr><td></td></tr></tbody></table></div><div></div>');
//			}
//		});
//	},
	 setup: function(editor) {
		editor.addButton('mybutton', {
			type: 'menubutton',
			text: 'bootstrap',
			icon: false,
			menu: [{
				text: 'table',
				onclick: function() {
					editor.insertContent('<div class="panel-body table-responsive">insert table</div><div></div>');
				}
			}, {
				text: 'panel',
				onclick: function() {
					editor.insertContent('<div class="panel panel-default"><div class="panel-heading">heading</div><div class="panel-body">content</div><div class="panel-footer">footer</div></div>');
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
				{title: 'Test template 1', content: 'Test 1'},
				{title: 'Test template 2', content: 'Test 2'},
		],
		relative_urls: false,
});

