<?php echo $this->assign('title', __('Users')); ?>
 <?php $this->Html->addCrumb(__('Users')); ?>
 <div class="users index row">
	<div class="col-md-12 page-header">
		<h2><i class="fa fa-book"></i>&nbsp;<?php echo __('Users'); ?></h2>
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
			<table id="exemple"  class="table table-bordered text-center table-striped display">
				<thead>
					<tr class="info">
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('name'); ?></th>
						<th><?php echo $this->Paginator->sort('username'); ?></th>
						<th><?php echo $this->Paginator->sort('mail'); ?></th>
						<th><?php echo $this->Paginator->sort('group_id'); ?></th>
						<th><?php echo $this->Paginator->sort('firstname'); ?></th>
						<th><?php echo $this->Paginator->sort('lastname'); ?></th>
						<th><?php echo $this->Paginator->sort('active'); ?></th>
						<th><?php echo $this->Paginator->sort('created'); ?></th>
						<th><?php echo $this->Paginator->sort('modified'); ?></th><!--
						<th><?php // echo $this->Paginator->sort('role'); ?></th> -->
						<th><?php echo $this->Paginator->sort('lastlogin'); ?></th>
						<th colspan="3" class="actions"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($users as $user): ?>
					<tr>
						<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['mail']); ?>&nbsp;</td>
						<td><?php echo $this->Html->link($user['Group']['name'],
						array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?></td>
						<td><?php echo h($user['User']['firstname']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['lastname']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['active']); ?>&nbsp;</td>
						<td><?php  echo $this->Time->format($user['User']['created'], '%A %e %B, %Y'); ?>&nbsp;</td>
						<td><?php echo h($user['User']['modified']); ?>&nbsp;</td><!--
						<td><?php // echo h($user['User']['role']); ?>&nbsp;</td> -->
						<td><?php echo h($user['User']['lastlogin']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="fa fa-eye"></span>',
					 array('action' => 'view', $user['User']['id']), array('class'=>'btn btn-default','escape' => false)); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="fa fa-pencil"></span>',
					 array('action' => 'edit', $user['User']['id']), array('class'=>'btn btn-default','escape' => false)); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="fa fa-trash"></span>',
								'#Modal'.$user['User']['id'],
									array('class'=>'btn btn-default btn-remove-modal',
									'escape' => false,
									'data-toggle' =>'modal',
									'role'=>'button',
									'data-uid'=>$user['User']['id']
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
			<?php  echo $this->element("pagination-counter"); ?>
		</div>
	</div>
</div><!-- end containing of content -->
<?php foreach ($users  as $k => $v): $v = current($v);?><!-- modal supprimer -->
<div class="modal fade" id="Modal<?= $v['id']; ?>">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header panel-default">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-toggle="tooltip" data-placement="left" title="  Press Esc to close">&times;</button>
				<h4 ><?php echo __('Remove Post') ?></h4>
			</div>
			<div class="modal-body">
				<p> <?php echo __('Are you sure you want to delete'); ?> <b style="color:#f00;">&nbsp;<?php echo $v['name'];?> &nbsp;</b>
					<?php echo __('of your Articles') ?>
					<span class="label-uname strong"></span> ?
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
				<?php echo __('Cancel') ?>
				</button>
					<?php  echo $this->Form->postLink(__('Delete'),array('action' => 'delete',	$v['id']),
							array('class' => 'btn btn-danger delete-user-link')) ?>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endforeach ?><!-- fin modal supprimer -->
<div class="modal fade" id="ModalAide"> <!-- modal Aide -->
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header panel-default">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-remove-sign" style="color:#f00;"></i></button>
					<h4 id="myModalLabel">Help</h4>
			</div>
			<div class="modal-body">
				<p></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Closed</button>
			</div>
		</div><!-- /.modal-aide-content -->
	</div><!-- /.modal-aide-dialog -->
</div><!-- /.modal-aide -->
<?php  $this->Html->script(array("admin.min"), array('inline'=>false)); ?>

