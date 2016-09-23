<?php echo $this->assign('title', __('States')); ?>
 <?php $this->Html->addCrumb(__('States')); ?>
 <div class="states index row">
	<div class="col-md-12 page-header">
		<h2><i class="fa fa-book"></i>&nbsp;<?php echo __('States'); ?></h2>
	</div>
	<div class="col-md-12">
		<div class="text-right" style='margin-bottom:10px;'>
			<button class="btn " data-toggle="modal" data-target="#ModalAide">
			<i class="fa fa-question-circle">&nbsp;Help</i>
			</button>
				<?php echo $this->Html->link("<i class='icon-plus'></i>". __("Add article"),array('action'=>'add'),
				array('class' =>"btn btn-success ",'escape'=>false)); ?>
		</div>		<div class="panel table-responsive box-home">
			<table  class="table table-bordered text-center table-striped">
				<thead>
					<tr class="info">
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('name'); ?></th>
						<th><?php echo $this->Paginator->sort('value'); ?></th>
						<th><?php echo $this->Paginator->sort('online'); ?></th>
						<th colspan="3" class="actions"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($states as $state): ?>
					<tr>
						<td><?php echo h($state['State']['id']); ?>&nbsp;toto</td>
						<td><?php echo h($state['State']['name']); ?>&nbsp;toto</td>
						<td><?php echo h($state['State']['value']); ?>&nbsp;toto</td>
						<td><?php echo h($state['State']['online']); ?>&nbsp;toto</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="fa fa-eye"></span>',
					 array('action' => 'view', $state['State']['id']), array('class'=>'btn btn-default','escape' => false)); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="fa fa-pencil"></span>',
					 array('action' => 'edit', $state['State']['id']), array('class'=>'btn btn-default','escape' => false)); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="fa fa-trash"></span>',
								'#Modal'.$state['State']['id'],
									array('class'=>'btn btn-default btn-remove-modal',
									'escape' => false,
									'data-toggle' =>'modal',
									'role'=>'button',
									'data-uid'=>$state['State']['id']
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



