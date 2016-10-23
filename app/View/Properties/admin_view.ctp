 <?php $this->Html->addCrumb(__('property'),array('controller'=>'properties','action'=>'index','admin'=>true)); ?>
 <?php $this->Html->addCrumb($property['Property']['id']); ?>
<div class="properties view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Property'); ?></h1>
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
								<li><?php echo $this->Html->link('<span class="icon-edit"></span>&nbsp;&nbsp;'.__('Edit Property'),
									array('action' => 'edit', $property['Property']['id']), array('escape' => false)); ?>
								</li>
								<li><?php echo $this->Form->postLink('<span class="icon-cancel"></span>&nbsp;&nbsp;'.__('Delete Property'),
									array('action' => 'delete', $property['Property']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $property['Property']['id'])); ?> </li>
								<li><?php echo $this->Html->link('<span class="icon-list"></span>&nbsp;&nbsp;'.__('List Properties'),
									array('action' => 'index'), array('escape' => false)); ?>
								</li>
								<li><?php echo $this->Html->link('<span class="icon-plus"></span>&nbsp;&nbsp;'.__('New Property'),
									array('action' => 'add'), array('escape' => false)); ?>
								</li>
								<li><?php echo $this->Html->link('<span class="icon-list"></span>&nbsp;&nbsp;'.__('List States'),
									array('controller' => 'states', 'action' => 'index'), array('escape' => false)); ?>
								</li>
								<li><?php echo $this->Html->link('<span class="icon-plus"></span>&nbsp;&nbsp;'.__('New State'),
									array('controller' => 'states', 'action' => 'add'), array('escape' => false)); ?>
								</li>
								<li><?php echo $this->Html->link('<span class="icon-list"></span>&nbsp;&nbsp;'.__('List Areas'),
									array('controller' => 'areas', 'action' => 'index'), array('escape' => false)); ?>
								</li>
								<li><?php echo $this->Html->link('<span class="icon-plus"></span>&nbsp;&nbsp;'.__('New Area'),
									array('controller' => 'areas', 'action' => 'add'), array('escape' => false)); ?>
								</li>
								<li><?php echo $this->Html->link('<span class="icon-list"></span>&nbsp;&nbsp;'.__('List Statuses'),
									array('controller' => 'statuses', 'action' => 'index'), array('escape' => false)); ?>
								</li>
								<li><?php echo $this->Html->link('<span class="icon-plus"></span>&nbsp;&nbsp;'.__('New Status'),
									array('controller' => 'statuses', 'action' => 'add'), array('escape' => false)); ?>
								</li>
								<li><?php echo $this->Html->link('<span class="icon-list"></span>&nbsp;&nbsp;'.__('List Types'),
									array('controller' => 'types', 'action' => 'index'), array('escape' => false)); ?>
								</li>
								<li><?php echo $this->Html->link('<span class="icon-plus"></span>&nbsp;&nbsp;'.__('New Type'),
									array('controller' => 'types', 'action' => 'add'), array('escape' => false)); ?>
								</li>
								<li><?php echo $this->Html->link('<span class="icon-list"></span>&nbsp;&nbsp;'.__('List Characteristics'),
									array('controller' => 'characteristics', 'action' => 'index'), array('escape' => false)); ?>
								</li>
								<li><?php echo $this->Html->link('<span class="icon-plus"></span>&nbsp;&nbsp;'.__('New Characteristic'),
									array('controller' => 'characteristics', 'action' => 'add'), array('escape' => false)); ?>
								</li>
								<li><?php echo $this->Html->link('<span class="icon-list"></span>&nbsp;&nbsp;'.__('List Users'),
									array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?>
								</li>
								<li><?php echo $this->Html->link('<span class="icon-plus"></span>&nbsp;&nbsp;'.__('New User'),
									array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?>
								</li>
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
							<?php echo h($property['Property']['id']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Name'); ?></th>
						<td>
							<?php echo h($property['Property']['name']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Content'); ?></th>
						<td>
							<?php echo h(strip_tags($property['Property']['content'])); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('State'); ?></th>
						<td>
							<?php echo $this->Html->link($property['State']['name'], array('controller' => 'states', 'action' => 'view', $property['State']['id'])); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Area'); ?></th>
						<td>
							<?php echo $this->Html->link($property['Area']['name'], array('controller' => 'areas', 'action' => 'view', $property['Area']['id'])); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Status'); ?></th>
						<td>
							<?php echo $this->Html->link($property['Status']['name'], array('controller' => 'statuses', 'action' => 'view', $property['Status']['id'])); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Type'); ?></th>
						<td>
							<?php echo $this->Html->link($property['Type']['name'], array('controller' => 'types', 'action' => 'view', $property['Type']['id'])); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Characteristic') ?></th>
						<td>
						<?php if (!empty($property['Characteristic'])): ?>
							<?php foreach ($property['Characteristic'] as $characteristic): ?>
								<?php echo $this->Html->link($characteristic['value'], array('controller' => 'characteristics', 'action' => 'view', $characteristic['id']), array('escape' => false)); ?> <?php echo " - " ?>
							<?php endforeach ?>
						<?php endif; ?>
						</td>
					</tr>
					<tr>
						<th><?php echo __('DateYear'); ?></th>
						<td>
							<?php echo h($property['Property']['dateYear']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Bedrooms'); ?></th>
						<td>
							<?php echo h($property['Property']['bedrooms']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Size'); ?></th>
						<td>
							<?php echo h($property['Property']['size']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Level'); ?></th>
						<td>
							<?php echo h($property['Property']['level']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Price'); ?></th>
						<td>
							<?php echo h($property['Property']['price']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Online'); ?></th>
						<td>
							<?php echo h($property['Property']['online']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Media Id'); ?></th>
						<td>
							<?php echo h($property['Property']['media_id']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('MediaQuantities'); ?></th>
						<td>
							<?php echo h($property['Property']['mediaQuantities']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Modified'); ?></th>
						<td>
							<?php echo h($property['Property']['modified']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Created'); ?></th>
						<td>
							<?php echo h($property['Property']['created']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('User'); ?></th>
						<td>
							<?php echo $this->Html->link($property['User']['name'], array('controller' => 'users', 'action' => 'view', $property['User']['id'])); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Modified By'); ?></th>
						<td>
							<?php echo h($property['Property']['modified_by']); ?>
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
	<h3><?php echo __('Related Characteristics'); ?></h3>
	<?php if (!empty($property['Characteristic'])): ?>
	<table  class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Value'); ?></th>
		<th><?php echo __('Online'); ?></th>
		<th class="actions"></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($property['Characteristic'] as $characteristic): ?>
		<tr>
			<td><?php echo $characteristic['id']; ?></td>
			<td><?php echo $characteristic['name']; ?></td>
			<td><?php echo $characteristic['value']; ?></td>
			<td><?php echo $characteristic['online']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link('<span class="icon-search"></span>', array('controller' => 'characteristics', 'action' => 'view', $characteristic['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link('<span class="icon-edit"></span>', array('controller' => 'characteristics', 'action' => 'edit', $characteristic['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink('<span class="icon-cancel-circled"></span>', array('controller' => 'characteristics', 'action' => 'delete', $characteristic['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $characteristic['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link('<span class="icon-plus"></span>&nbsp;&nbsp;'.__('New Characteristic'), array('controller' => 'characteristics', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?>	</div>
	</div><!-- end col md 12 -->
</div>
