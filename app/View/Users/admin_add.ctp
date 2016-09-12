<?php echo $this->assign('title', __('user')); ?>
 <?php $this->Html->addCrumb(__('user'),array('controller'=>'users','action'=>'index','admin'=>true)); ?></li>
 <?php $this->Html->addCrumb(__('edit') ); ?>
<div class="users box box-primary">
	<?php echo $this->Form->create('User'); ?>
	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;<?php echo __('Add User'); ?></h3>

		<div class="box-tools pull-right">
			<?php echo $this->Form->button('<i class="fa fa-check " style="color:#fff;">&nbsp;</i>'.__('publish'),
									array('class' => 'btn btn-success btn-sm')); ?>
			<?php echo $this->html->link('<i class="fa fa-times-circle fa-lg" style="color:#f00;">&nbsp;</i>'.__('Closed'),
										array('controller'=>'users','action'=>'index'),
									array('class' => 'btn btn-default btn-sm','role'=>'button','escape'=>false)); ?>
			<?php  echo $this->Form->input('active', array('label' =>false));?>
		</div>
	</div>
	<div class="box-body">
			<div class="">
				<div class="tabpanel">
					<div class="tab-content">
						<div class="tab-pane fade in active" role="tabpanel" id="contenu">
							<div class="form-group">
								<?php echo $this->Form->input('name', array('class' => 'form-control',
							 'placeholder' => __('Name')));?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('username', array('class' => 'form-control',
							 'placeholder' => __('Username')));?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('mail', array('class' => 'form-control',
							 'placeholder' => __('Mail')));?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('password', array('class' => 'form-control',
							 'placeholder' => __('Password')));?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('group_id', array('class' => 'form-control',
							 'placeholder' => __('Group Id')));?>
							</div>
						<!-- 	<div class="form-group">
								<?php echo $this->Form->input('firstname', array('class' => 'form-control',
							 'placeholder' => __('Firstname')));?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('lastname', array('class' => 'form-control',
							 'placeholder' => __('Lastname')));?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('avatar', array('class' => 'form-control',
							 'placeholder' => __('Avatar')));?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('role', array('class' => 'form-control',
							 'placeholder' => __('Role')));?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('token', array('class' => 'form-control',
							 'placeholder' => __('Token')));?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('lastlogin', array('class' => 'form-control',
							 'placeholder' => __('Lastlogin')));?>
							</div>-->
					  	</div>
					</div>
				</div>
				<div class="text-right box-footer" style="margin-top:10px;">
					<?php echo $this->Form->submit(__('publish'), array('div'=>false,'class' => 'btn btn-success')); ?>
					<?php echo $this->html->link('<i class="fa fa-times-circle fa-lg" style="color:#f00;">&nbsp;</i>'.__('Closed'),
					array('controller'=>'users','action'=>'index'),
					array('class' => 'btn btn-default','escape'=>false)); ?>
				</div>
				<?php echo $this->Form->end() ?>
			</div>
	</div><!-- end containers -->
</div>
<?php  echo  $this->Html->scriptStart(array('inline'=>false)); ?>
//pour les toogle
  $(function() {
    $('#UserActive').bootstrapToggle({
    size:'small',
    onstyle:'primary',
    offstyle:'danger',
    });
  });
<?= $this->Html->scriptEnd(); ?>
