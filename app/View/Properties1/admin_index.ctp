<?php echo $this->assign('title', __('Properties')); ?>
 <?php $this->Html->addCrumb(__('Properties')); ?>
 <div class="properties index row">
	<div class="col-md-12 page-header">
		<h2><i class="icon-properties"></i>&nbsp;<?php echo __('Properties'); ?></h2>
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
						<th><?php echo $this->Paginator->sort('id2'); ?></th>
						<th><?php echo $this->Paginator->sort('name'); ?></th>
						<th><?php echo $this->Paginator->sort('content'); ?></th>
						<th><?php echo $this->Paginator->sort('state_id'); ?></th>
						<th><?php echo $this->Paginator->sort('area_id'); ?></th>
						<th><?php echo $this->Paginator->sort('status_id'); ?></th>
						<th><?php echo $this->Paginator->sort('type_id'); ?></th>
						<th><?php echo $this->Paginator->sort('characteristic_id'); ?></th>
						<th><?php echo $this->Paginator->sort('characteristic_property_id'); ?></th>
						<th><?php echo $this->Paginator->sort('dateYear'); ?></th>
						<th><?php echo $this->Paginator->sort('bedrooms'); ?></th>
						<th><?php echo $this->Paginator->sort('size'); ?></th>
						<th><?php echo $this->Paginator->sort('level'); ?></th>
						<th><?php echo $this->Paginator->sort('price'); ?></th>
						<th><?php echo $this->Paginator->sort('online'); ?></th>
						<th><?php echo $this->Paginator->sort('media_id'); ?></th>
						<th><?php echo $this->Paginator->sort('mediaQuantities'); ?></th>
						<th><?php echo $this->Paginator->sort('modified'); ?></th>
						<th><?php echo $this->Paginator->sort('created'); ?></th>
						<th><?php echo $this->Paginator->sort('user_id'); ?></th>
						<th><?php echo $this->Paginator->sort('modified_by'); ?></th>
						<th>&nbsp;</th>
					<th colspan="3" class="actions"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($properties as $property): ?>
					<tr>
						<td><?php echo h($property['Property']['id']); ?>&nbsp;</td>
						<td><?php echo h($property['Property']['id2']); ?>&nbsp;</td>
						<td><?php echo h($property['Property']['name']); ?>&nbsp;</td>
						<td><?php echo h($property['Property']['content']); ?>&nbsp;</td>
						<td><?php echo $this->Html->link($property['State']['name'],
									array('controller' => 'states', 'action' => 'view', $property['State']['id'])); ?></td>
						<td><?php echo $this->Html->link($property['Area']['name'],
									array('controller' => 'areas', 'action' => 'view', $property['Area']['id'])); ?></td>
						<td><?php echo $this->Html->link($property['Status']['name'],
									array('controller' => 'statuses', 'action' => 'view', $property['Status']['id'])); ?></td>
						<td><?php echo $this->Html->link($property['Type']['name'],
									array('controller' => 'types', 'action' => 'view', $property['Type']['id'])); ?></td>
						<td><?php echo $this->Html->link($property['Characteristic']['name'],
									array('controller' => 'characteristics', 'action' => 'view', $property['Characteristic']['id'])); ?></td>
						<td><?php echo $this->Html->link($property['CharacteristicProperty']['name'],
									array('controller' => 'characteristic_properties', 'action' => 'view', $property['CharacteristicProperty']['id'])); ?></td>
						<td><?php echo h($property['Property']['dateYear']); ?>&nbsp;</td>
						<td><?php echo h($property['Property']['bedrooms']); ?>&nbsp;</td>
						<td><?php echo h($property['Property']['size']); ?>&nbsp;</td>
						<td><?php echo h($property['Property']['level']); ?>&nbsp;</td>
						<td><?php echo h($property['Property']['price']); ?>&nbsp;</td>
						<td><?php echo h($property['Property']['online']); ?>&nbsp;</td>
						<td><?php echo h($property['Property']['media_id']); ?>&nbsp;</td>
						<td><?php echo h($property['Property']['mediaQuantities']); ?>&nbsp;</td>
						<td><?php echo h($property['Property']['modified']); ?>&nbsp;</td>
						<td><?php echo h($property['Property']['created']); ?>&nbsp;</td>
						<td><?php echo $this->Html->link($property['User']['name'],
									array('controller' => 'users', 'action' => 'view', $property['User']['id'])); ?></td>
						<td><?php echo h($property['Property']['modified_by']); ?>&nbsp;</td>
						<td><?php if($property['Property'][ 'online' ] == 0) {
						echo $this->Html->link('<span class="label label-danger">'.__('Offline').'</span>',
						array('action'=>'enable', $property['Property']['id']),
						array("style"=>"text-decoration:none;","data-toggle"=>"tooltip","data-placement"=>"bottom",
						"title"=>__('Enable this Property'),'escape'=>false));
					}else{
						echo $this->Html->link('<span class="label label-success">'.__('In line').'</span>',
						array('action'=>'disable', $property['Property']['id']),
						array("style"=>"text-decoration:none;","data-toggle"=>"tooltip","data-placement"=>"bottom",
						"title"=>__('Disable this Property'),'escape'=>false));
					}
					?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="icon-eye"></span>',
					 array('action' => 'view', $property['Property']['id']),
					 array('class'=>'btn btn-default','escape' => false,
					 'data-title'=>__('view').' '.$property['Property']['name'],'data-toggle'=>'tooltip','data-placement'=>'bottom')); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="icon-pencil"></span>',
					 array('action' => 'edit',$property['Property']['id'] ),
					 array('class'=>'btn btn-default','escape' => false,
					  'data-title'=>__('edit').' '.$property['Property']['name'],'data-toggle'=>'tooltip','data-placement'=>'bottom')); ?>
						</td>
						<td class="actions">
							<p data-placement='bottom' data-toggle='tooltip' title='<?= __('delete').' '.$property['Property']['name'];?>' class='text-center'>
							<?php echo $this->Html->link('<span class="icon-trash"></span>',$property['Property']['id'],
									array('class'=>'btn btn-default btn-remove-modal',
									'escape' => false,
									'data-toggle' =>'modal',
									'role'=>'button',
									'data-target'=>'#delete'.$property['Property']['id'],
									'data-title'=> __('delete'),
									'data-uid'=>$property['Property']['id']
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
<?php foreach ($properties  as $k => $v): $v = current($v);?><!-- modal supprimer -->
<div class="modal fade" id="delete<?= $v['id']; ?>">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header panel-default">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-toggle="tooltip" data-placement="left" title=" close">&times;</button>
				<h4 ><?php echo __('Remove') ;?></h4>
			</div>
			<div class="modal-body">
				<p> <?php echo __('Are you sure you want to delete'); ?> <b style="color:#f00;">&nbsp;<?php echo $v['name'];?> &nbsp;</b>
					<?php echo __('of your').__('properties') ; ?>
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

