<div class="states view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('State'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit State'), array('action' => 'edit', $state['State']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete State'), array('action' => 'delete', $state['State']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $state['State']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List States'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New State'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Properties'), array('controller' => 'properties', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Property'), array('controller' => 'properties', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($state['State']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($state['State']['name']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Value'); ?></th>
		<td>
			<?php echo h($state['State']['value']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Properties'); ?></h3>
	<?php if (!empty($state['Property'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Id2'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('State Id'); ?></th>
		<th><?php echo __('Area Id'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th><?php echo __('Type Id'); ?></th>
		<th><?php echo __('Characteristic Id'); ?></th>
		<th><?php echo __('DateYear'); ?></th>
		<th><?php echo __('Bedrooms'); ?></th>
		<th><?php echo __('Size'); ?></th>
		<th><?php echo __('Level'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Online'); ?></th>
		<th><?php echo __('Media Id'); ?></th>
		<th><?php echo __('MediaQuantities'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th class="actions"></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($state['Property'] as $property): ?>
		<tr>
			<td><?php echo $property['id']; ?></td>
			<td><?php echo $property['id2']; ?></td>
			<td><?php echo $property['name']; ?></td>
			<td><?php echo $property['content']; ?></td>
			<td><?php echo $property['state_id']; ?></td>
			<td><?php echo $property['area_id']; ?></td>
			<td><?php echo $property['status_id']; ?></td>
			<td><?php echo $property['type_id']; ?></td>
			<td><?php echo $property['characteristic_id']; ?></td>
			<td><?php echo $property['dateYear']; ?></td>
			<td><?php echo $property['bedrooms']; ?></td>
			<td><?php echo $property['size']; ?></td>
			<td><?php echo $property['level']; ?></td>
			<td><?php echo $property['price']; ?></td>
			<td><?php echo $property['online']; ?></td>
			<td><?php echo $property['media_id']; ?></td>
			<td><?php echo $property['mediaQuantities']; ?></td>
			<td><?php echo $property['modified']; ?></td>
			<td><?php echo $property['created']; ?></td>
			<td><?php echo $property['user_id']; ?></td>
			<td><?php echo $property['modified_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'properties', 'action' => 'view', $property['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'properties', 'action' => 'edit', $property['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'properties', 'action' => 'delete', $property['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $property['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Property'), array('controller' => 'properties', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?>	</div>
	</div><!-- end col md 12 -->
</div>
