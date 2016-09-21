<?php echo $this->assign('title', __('Characteristics')); ?>
 <?php $this->Html->addCrumb(__('Characteristics')); ?>
 <div class="characteristics index row">
	<div class="col-md-12 page-header">
		<h2><i class="icon-characteristics"></i>&nbsp;<?php echo __('Characteristics'); ?></h2>
	</div>
	<div class="col-md-12">
		<div class="text-right" style='margin-bottom:10px;'>
			<button class="btn " data-toggle="modal" data-target="#ModalAide">
			<i class="icon-help-circled">&nbsp;Help</i>
			</button>
				<?php echo $this->Html->link("<i class='icon-plus'></i>". __("Add"),array('action'=>'add'),
				array('class' =>"btn btn-success ",'escape'=>false)); ?>
		</div>
		<div class="panel table-responsive box-home">
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
					<?php foreach ($characteristics as $characteristic): ?>
					<tr>
						<td><?php echo h($characteristic['Characteristic']['id']); ?>&nbsp;</td>
						<td><?php echo h($characteristic['Characteristic']['name']); ?>&nbsp;</td>
						<td><?php echo h($characteristic['Characteristic']['value']); ?>&nbsp;</td>
						<td><?php if($characteristic['Characteristic'][ 'online' ] == 0) {
						echo $this->Html->link('<span class="label label-danger">'.__('Offline').'</span>',
						array('action'=>'enable', $characteristic['Characteristic']['id']),
						array("style"=>"text-decoration:none;","data-toggle"=>"tooltip","data-placement"=>"bottom",
						"title"=>__('Enable this Characteristic'),'escape'=>false));
					}else{
						echo $this->Html->link('<span class="label label-success">'.__('In line').'</span>',
						array('action'=>'disable', $characteristic['Characteristic']['id']),
						array("style"=>"text-decoration:none;","data-toggle"=>"tooltip","data-placement"=>"bottom",
						"title"=>__('Disable this Characteristic'),'escape'=>false));
					}
					?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="icon-eye"></span>',
					 array('action' => 'view', $characteristic['Characteristic']['id']),
					 array('class'=>'btn btn-default','escape' => false,
					 'data-title'=>__('view').' '.$characteristic['Characteristic']['name'],'data-toggle'=>'tooltip','data-placement'=>'bottom')); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="icon-pencil"></span>',
					 array('action' => 'edit',$characteristic['Characteristic']['id'] ),
					 array('class'=>'btn btn-default','escape' => false,
					  'data-title'=>__('edit').' '.$characteristic['Characteristic']['name'],'data-toggle'=>'tooltip','data-placement'=>'bottom')); ?>
						</td>
						<td class="actions">
							<p data-placement='bottom' data-toggle='tooltip' title='<?= __('delete').' '.$characteristic['Characteristic']['name'];?>' class='text-center'>
							<?php echo $this->Html->link('<span class="icon-trash"></span>',$characteristic['Characteristic']['id'],
									array('class'=>'btn btn-default btn-remove-modal',
									'escape' => false,
									'data-toggle' =>'modal',
									'role'=>'button',
									'data-target'=>'#delete'.$characteristic['Characteristic']['id'],
									'data-title'=> __('delete'),
									'data-uid'=>$characteristic['Characteristic']['id']
									)
							 ); ?>
							</p>
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
<?php foreach ($characteristics  as $k => $v): $v = current($v);?><!-- modal supprimer -->
<div class="modal fade" id="delete<?= $v['id']; ?>">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header panel-default">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-toggle="tooltip" data-placement="left" title=" close">&times;</button>
				<h4 ><?php echo __('Remove') ;?></h4>
			</div>
			<div class="modal-body">
				<p> <?php echo __('Are you sure you want to delete'); ?> <b style="color:#f00;">&nbsp;<?php echo $v['name'];?> &nbsp;</b>
					<?php echo __('of your').__('characteristics') ; ?>
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

