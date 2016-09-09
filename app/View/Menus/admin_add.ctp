<?php echo $this->assign('title', __('menu')); ?>
 <?php $this->Html->addCrumb(__('menu'),array('controller'=>'menus','action'=>'index','admin'=>true)); ?>
 <?php $this->Html->addCrumb('edit' ); ?>
<div class="menus index row">
	<div class="col-md-12 page-header">
		<h2><i class="fa fa-book"></i>&nbsp;<?php echo __('Admin Add Menu'); ?>		</h2>
	</div>
	<div class="col-md-12 col-lg-10 col-lg-offset-1">
		<div class=" box-home">
			<div class="well">
				<?php echo $this->Form->create('Menu',(array('novalidate'))); ?>
				<div class="tabpanel">
					<nav class="navbar">
				    	<div class="collapse navbar-collapse">
							<ul class="nav navbar-nav" role="tablist">
						 		<li role="presentation" class="active">
						 			<a href="#contenu" role="tab" data-toggle="tab" aria-controls="contenu">contenu</a>
						 		</li>
						 		<li role="presentation">
						 			<a href="#publication" role="tab" data-toggle="tab" aria-controls="publication">publication</a>
						 		</li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li>
									<?php echo $this->Form->input('online', array('label' => false)); ?>
								</li>
								<li>
									<?php echo $this->Form->button('<i class="fa fa-check fa-lg" style="color:#fff;">&nbsp;</i>'.__('publish'),
							 array('class' => 'btn btn-success btn-lg')); ?>
								</li>
								<li>
									<?php echo $this->html->link('<i class="fa fa-times-circle fa-lg" style="color:#f00;">&nbsp;</i>'.__('Closed'),
							array('controller'=>'menus','action'=>'index'),
							array('class' => 'btn btn-default','type'=>'button','escape'=>false)); ?>
								</li>
							</ul>
						</div>
					</nav>
					<div class="tab-content">
						<div class="tab-pane fade in active" role="tabpanel" id="contenu">
							<div class="form-group">
								<?php echo $this->Form->input('name', array('class' => 'form-control',
							 'placeholder' => __('Name')));?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('slug', array('class' => 'form-control',
							 'placeholder' => __('Slug')));?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('alias', array('class' => 'form-control',
							 'placeholder' => __('Alias')));?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('controller', array('class' => 'form-control',
							 'placeholder' => __('Controller'),"div"=>"maclass"));?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('content', array('class' => 'form-control',
							 'placeholder' => __('Content')));?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('user_id', array('class' => 'form-control',
							 'placeholder' => __('User Id')));?>
							</div>
					  	</div>
					  	<div class="tab-pane fade" role="tabpanel" id="publication">
							<div class="form-group">
								<?php echo $this->Form->input('description', array('class' => 'form-control',
							 'placeholder' => __('Description')));?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('robots', array('class' => 'form-control',
							 'placeholder' => __('Robots')));?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('keywords', array('class' => 'form-control',
							 'placeholder' => __('Keywords')));?>
							</div>
					  	</div>
					</div>
				</div>
				<div class="text-right" style="margin-top:10px;">
					<?php echo $this->Form->submit(__('publish'), array('div'=>false,'class' => 'btn btn-primary')); ?>
					<?php echo $this->html->link('<i class="fa fa-times-circle fa-lg" style="color:#f00;">&nbsp;</i>'.__('Closed'),
					array('controller'=>'menus','action'=>'index'),
					array('class' => 'btn btn-default','escape'=>false)); ?>
				</div>
				<?php echo $this->Form->end() ?>
			</div>
		</div>
	</div><!-- end containers -->
</div>
<?php  echo $this->Html->script(array('tinymce/tinymce.min','bootstrap-toggle'),array('inline'=>false)); ?>

<?php echo  $this->Html->scriptStart(array('inline'=>false)); ?>
//pour les tabs
$('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
});
//pour les toogle
  $(function() {
    $('#MenuOnline').bootstrapToggle({
		size:'large',
		onstyle: 'primary',
		offstyle:'danger',
    });
  });

//pour les meta description
$(document).ready(function(e) {
  $('#metadescription').keyup(function() {
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
