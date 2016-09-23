<?php // echo $this->assign('title', __('Properties')); ?>
 <?php $this->Html->addCrumb(__('Properties')); ?>
 	<div class="page-header">
		<h2 class="title"> <?php echo __('Properties') ; ?></h2>
	</div>
 <div class="properties index content">
 	<ul class="tri" >
 		<li>triez par :</li>
 		<li><span class="label label-warning"><?php echo $this->Paginator->sort('price'); ?></span></li>
 		<li><span class="label label-warning"><?php echo $this->Paginator->sort('size'); ?></span></li>
 		<li><span class="label label-warning"><?php echo $this->Paginator->sort('area_id'); ?></span></li>
 		<li><span class="label label-warning"><?php echo $this->Paginator->sort('bedrooms'); ?></span></li>
 		<li><span class="label label-warning"><?php echo $this->Paginator->sort('created'); ?></span></li>
 		</ul>
 		<hr>
	<?php foreach ($properties as $property): ?>
 	<div class="box-thumbnail">
 		<div class="thumbnail" >
 			<h4><?php echo  $this->Number->currency($property['Property']['price'],' €',
				 array('wholePosition'=>"after",'thousands'=>'.',"decimals"=>','));?>&nbsp;/&nbsp;
				 <?php if ($property['Status']['name']=="To Let"): ?>
				 	<?php echo __('month') ?>
				 <?php else: ?>
				 	<?php echo $property['Status']['name']; ?>
				 <?php endif ?>
			</h4>
 			<figure>
 				<img src="http://dummyimage.com/200x150/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image">
 			</figure>
 			<h4 class="area"><?php echo $property['Area']['name']; ?></h4>
 			<div class="caption-left">
 				<p><?php echo h($property['Type']['name']); ?>&nbsp;F:&nbsp;
					<?php echo h($property['Property']['bedrooms']); ?>
				</p>
 				<p><?php echo $this->Number->format($property['Property']['size'],array('before'=>false,
						'places' => 2,'after' => ' m²','escape' => false,'decimals' => '.','thousands' => ',')); ?>
				</p>
 			</div>
 			<div class="caption-right">
 				<?php echo $this->Html->link('<span class="icon-info"></span><br><p> <small>voir Détail</small></p>',
 				 array('controller' => 'properties', 'action' => 'view',$property['Property']['id']),array('escape'=>false)); ?>
 			</div>
 		</div>
 	</div>
 	<?php endforeach ?>
 	<div class="paginations">
		<?php echo $this->element('pagination'); ?>
		<?php  echo $this->element("pagination-counter"); ?>
 	</div>
</div>


<!-- </div> --><!-- end containing of content -->



