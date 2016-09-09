<div class="menus view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Menu'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Menu'), array('action' => 'edit', $menu['Menu']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Menu'), array('action' => 'delete', $menu['Menu']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $menu['Menu']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Menus'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Menu'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($menu['Menu']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($menu['Menu']['name']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Slug'); ?></th>
		<td>
			<?php echo h($menu['Menu']['slug']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Alias'); ?></th>
		<td>
			<?php echo h($menu['Menu']['alias']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Controller'); ?></th>
		<td>
			<?php echo h($menu['Menu']['controller']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Content'); ?></th>
		<td>
			<?php echo h($menu['Menu']['content']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Online'); ?></th>
		<td>
			<?php echo h($menu['Menu']['online']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($menu['Menu']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($menu['Menu']['modified']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('User'); ?></th>
		<td>
			<?php echo $this->Html->link($menu['User']['name'], array('controller' => 'users', 'action' => 'view', $menu['User']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Description'); ?></th>
		<td>
			<?php echo h($menu['Menu']['description']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Robots'); ?></th>
		<td>
			<?php echo h($menu['Menu']['robots']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Keywords'); ?></th>
		<td>
			<?php echo h($menu['Menu']['keywords']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

