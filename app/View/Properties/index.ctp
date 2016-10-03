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
 		<li><span class="label label-warning"><?php echo $this->Paginator->sort('id'); ?></span></li>
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
 			<?php if ($property['Property']['mediaQuantities'] > 0): ?>
 				<?php  echo  $this->Html->image('properties/2/thumbs/10002_1l.jpg', $options = array("class"=>"img-thumbnail")); ?>
 			<?php else: ?>
 				<?php echo  $this->Html->image('properties/fond_thumb.jpg', $options = array("class"=>"img-thumbnail")); ?>
 			<?php endif ?>
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
 				<a href="<?php  echo $this->Html->url($property['Property']['link']); ?>" class="btn">
 					<span class="icon-info"></span><br>
 					<p> <small><?php  echo __('see detail') ?></small></p>
 				</a>
 			</div>
 		</div>
 	</div>
 	<?php endforeach ?>
 	<div class="paginations">
		<?php echo $this->element('pagination'); ?>
		<?php  echo $this->element("pagination-counter"); ?>
 	</div>
</div>



