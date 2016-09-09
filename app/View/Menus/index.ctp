<?php echo $this->assign('title', __('Menus'));
echo $this->Html->meta(array('name' => 'robots', 'content' => $menu['Menu']['robots']),NULL,array("inline"=>false));
$this->Html->addCrumb(__('Menus')); ?>
 <div class="menus index row">
	<div class="col-md-12 page-header">
		<h2><i class="fa fa-book"></i>&nbsp;<?php echo __('Menus'); ?></h2>
	</div>
	<div class="col-md-12">
		<div class="text-right" style='margin-bottom:10px;'>
			<button class="btn " data-toggle="modal" data-target="#ModalAide">
			<i class="fa fa-question-circle">&nbsp;Help</i>
			</button>
				<?php echo $this->Html->link("<i class='fa fa-plus'></i>". __("Add article"),array('action'=>'add'),
				array('class' =>"btn btn-success ",'escape'=>false)); ?>
		</div>
		<div class="panel table-responsive box-home">
			<table  class="table table-bordered text-center table-striped">
				<thead>
					<tr class="info">
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('name'); ?></th>
						<th><?php echo $this->Paginator->sort('slug'); ?></th>
						<th><?php echo $this->Paginator->sort('alias'); ?></th>
						<th><?php echo $this->Paginator->sort('controller'); ?></th>
						<th><?php echo $this->Paginator->sort('content'); ?></th>
						<th><?php echo $this->Paginator->sort('online'); ?></th>
						<th><?php echo $this->Paginator->sort('created'); ?></th>
						<th><?php echo $this->Paginator->sort('modified'); ?></th>
						<th><?php echo $this->Paginator->sort('user_id'); ?></th>
						<th><?php echo $this->Paginator->sort('description'); ?></th>
						<th><?php echo $this->Paginator->sort('robots'); ?></th>
						<th><?php echo $this->Paginator->sort('keywords'); ?></th>
						<th colspan="3" class="actions"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($menus as $menu): ?>
					<tr>
						<td><?php echo h($menu['Menu']['id']); ?>&nbsp;</td>
						<td><?php echo h($menu['Menu']['name']); ?>&nbsp;</td>
						<td><?php echo h($menu['Menu']['slug']); ?>&nbsp;</td>
						<td><?php echo h($menu['Menu']['alias']); ?>&nbsp;</td>
						<td><?php echo h($menu['Menu']['controller']); ?>&nbsp;</td>
						<td><?php echo h($menu['Menu']['content']); ?>&nbsp;</td>
						<td><?php echo h($menu['Menu']['online']); ?>&nbsp;</td>
						<td><?php echo h($menu['Menu']['created']); ?>&nbsp;</td>
						<td><?php echo h($menu['Menu']['modified']); ?>&nbsp;</td>
						<td><?php echo $this->Html->link($menu['User']['name'],
									array('controller' => 'users', 'action' => 'view', $menu['User']['id'])); ?></td>
						<td><?php echo h($menu['Menu']['description']); ?>&nbsp;</td>
						<td><?php echo h($menu['Menu']['robots']); ?>&nbsp;</td>
						<td><?php echo h($menu['Menu']['keywords']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="fa fa-eye"></span>',
					 array('action' => 'view', $menu['Menu']['id']), array('class'=>'btn btn-default','escape' => false)); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="fa fa-pencil"></span>',
					 array('action' => 'edit', $menu['Menu']['id']), array('class'=>'btn btn-default','escape' => false)); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="fa fa-trash"></span>',
								'#Modal'.$menu['Menu']['id'],
									array('class'=>'btn btn-default btn-remove-modal',
									'escape' => false,
									'data-toggle' =>'modal',
									'role'=>'button',
									'data-uid'=>$menu['Menu']['id']
									)
							 ); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div class="col col-md-12 text-center">
			<?php echo $this->element('pagination'); ?>
			<?php  echo $this->element("pagination-counter"); ?>		</div>
	</div>
</div><!-- end containing of content -->



