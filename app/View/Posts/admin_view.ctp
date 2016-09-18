<div class="posts view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Post'); ?></h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
									<li><?php echo $this->Html->link('<span class="icon-edit"></span>&nbsp;&nbsp;'.__('Edit Post'),
							 array('action' => 'edit', $post['Post']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink('<span class="icon-cancel"></span>&nbsp;&nbsp;'.__('Delete Post'),
								 array('action' => 'delete', $post['Post']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?> </li>
		<li><?php echo $this->Html->link('<span class="icon-list"></span>&nbsp;&nbsp;'.__('List Posts'),
								 array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="icon-plus"></span>&nbsp;&nbsp;'.__('New Post'),
								 array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="icon-list"></span>&nbsp;&nbsp;'.__('List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="icon-plus"></span>&nbsp;&nbsp;'.__('New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<table  class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($post['Post']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($post['Post']['name']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Slug'); ?></th>
		<td>
			<?php echo h($post['Post']['slug']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Content'); ?></th>
		<td>
			<?php echo h($post['Post']['content']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Type'); ?></th>
		<td>
			<?php echo h($post['Post']['type']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($post['Post']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($post['Post']['modified']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Online'); ?></th>
		<td>
			<?php echo h($post['Post']['online']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('User'); ?></th>
		<td>
			<?php echo $this->Html->link($post['User']['name'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Description'); ?></th>
		<td>
			<?php echo h($post['Post']['description']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Robots'); ?></th>
		<td>
			<?php echo h($post['Post']['robots']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Keywords'); ?></th>
		<td>
			<?php echo h($post['Post']['keywords']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

