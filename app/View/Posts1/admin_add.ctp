<h1><?php echo __('Admin Add Post'); ?></h1>
<div class="posts form">
<?php echo $this->Form->create('Post'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Post'); ?></legend>
		<div class="deux-column">

			<?php
				echo $this->Form->input('name',array("placehoder"=>__('name')));
				echo $this->Form->input('slug');
				echo $this->Form->input('type',array('value'=>"post",'type'=>'hidden'));
				echo $this->Form->input('online');
				echo $this->Form->input('user_id');
			?>
		</div>
	<?php
		echo $this->Form->input('content');
	?>
	</fieldset>
	<div id="submit">
		<button href="#"><?php echo __('Submit') ; ?></button>
	</div>
<?php echo $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Posts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
