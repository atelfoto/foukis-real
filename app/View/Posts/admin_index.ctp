<?php echo $this->assign('title', __('Posts')); ?>
 <?php $this->Html->addCrumb(__('Posts')); ?>
 <div class="posts index row">
	<div class="col-md-12 page-header">
		<h2><i class="fa fa-book"></i>&nbsp;<?php echo __('Posts'); ?></h2>
	</div>
	<div class="col-md-12">
		<div class="text-right" style='margin-bottom:10px;'>
			<button class="btn " data-toggle="modal" data-target="#ModalAide">
			<i class="fa fa-question-circle">&nbsp;Help</i>
			</button>
				<?php echo $this->Html->link("<i class='fa fa-plus'></i>". __("Add"),array('action'=>'add'),
				array('class' =>"btn btn-success ",'escape'=>false)); ?>
		</div>		<div class="panel table-responsive box-home">
			<table  class="table table-bordered text-center table-striped">
				<thead>
					<tr class="info">
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('name'); ?></th>
						<th><?php echo $this->Paginator->sort('slug'); ?></th>
						<th><?php echo $this->Paginator->sort('type'); ?></th>
						<th><?php echo $this->Paginator->sort('created'); ?></th>
						<th><?php echo $this->Paginator->sort('modified'); ?></th>
						<th><?php echo $this->Paginator->sort('online'); ?></th>
						<th><?php echo $this->Paginator->sort('user_id'); ?></th>
						<th colspan="3" class="actions"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($posts as $post): ?>
					<tr>
						<td><?php echo h($post['Post']['id']); ?>&nbsp;</td>
						<td><?php echo h($post['Post']['name']); ?>&nbsp;</td>
						<td><?php echo h($post['Post']['slug']); ?>&nbsp;</td>
						<td><?php echo h($post['Post']['type']); ?>&nbsp;</td>
						<td><?php echo h($post['Post']['created']); ?>&nbsp;</td>
						<td><?php echo h($post['Post']['modified']); ?>&nbsp;</td>
						<td><?php if($post['Post'][ 'online' ] == 0) {
										echo $this->Html->link('<span class="label label-danger">'.__('Offline').'</span>',
										array('action'=>'enable', $post['Post']['id']),
										array("style"=>"text-decoration:none;","data-toggle"=>"tooltip","data-placement"=>"bottom",
											 "title"=>__('Enable this Post'),'escape'=>false));
										}else{
											echo $this->Html->link('<span class="label label-success">'.__('In line').'</span>',
											array('action'=>'disable', $post['Post']['id']),
											array("style"=>"text-decoration:none;","data-toggle"=>"tooltip","data-placement"=>"bottom",
												"title"=>__('Disable this Post'),'escape'=>false));
												}
								?>
						<?php // echo h($post['Post']['online']); ?>&nbsp;</td>
						<td><?php echo $this->Html->link($post['User']['name'],
									array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?></td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="fa fa-eye"></span>',
					 array('action' => 'view', $post['Post']['id']), array('class'=>'btn btn-default','escape' => false)); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="fa fa-pencil"></span>',
					 array('action' => 'edit', $post['Post']['id']), array('class'=>'btn btn-default','escape' => false)); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="fa fa-trash"></span>',
								'#Modal'.$post['Post']['id'],
									array('class'=>'btn btn-default btn-remove-modal',
									'escape' => false,
									'data-toggle' =>'modal',
									'role'=>'button',
									'data-uid'=>$post['Post']['id']
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
<?php foreach ($posts  as $k => $v): $v = current($v);?><!-- modal supprimer -->
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
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Cancel') ?></button>
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

