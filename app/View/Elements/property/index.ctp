 <div class="index content">
 	<ul class="tri" >
 		<li>triez par : </li>
 		<li><?php echo $this->Paginator->sort('price'); ?></li>
 		<li><?php echo $this->Paginator->sort('size'); ?></li>
 		<li><?php echo $this->Paginator->sort('area_id'); ?></li>
 		<li><?php echo $this->Paginator->sort('type_id'); ?></li>
 		<li><?php echo $this->Paginator->sort('bedrooms'); ?></li>
 		<li><?php echo $this->Paginator->sort('created'); ?></li>
 		<li><?php echo $this->Paginator->sort('id'); ?></li>
 	</ul>
 	<hr>
	<p style="float: left;"> <?php echo __("There are %s announcements corresponding to your research.",
		$this->Paginator->counter(array('format' =>'<strong>'. __('{:count}')."</strong>"))); ?></p>
 	<div class="paginations" ">

		<?php echo $this->element('pagination'); ?>
 	</div>
	<?php foreach ($properties as $property): ?>
 	<div class="box-thumbnail">
 		<div class="thumbnail" >
 			<h4> <b><?php echo  $this->Number->currency($property['Property']['price'],' €',
				 array('wholePosition'=>"after",'thousands'=>'.',"decimals"=>','));?></b>/
				 <?php if ($property['Status']['name']=="To Let"): ?>
				 	<?php echo __('month') ?>
				 <?php else: ?>
				 	<?php echo $property['Status']['name']; ?>
				 <?php endif ?>
			</h4>
 			<figure>
 			<?php if ($property['Property']['mediaQuantities'] > 0): ?>
 				<?php  echo  $this->Html->image("properties/".$property['Property']['id']."/thumbs/".$property['Property']['id']."-01.jpg", $options = array("class"=>"img-thumbnail"),array("style"=>'max-height::125px;')); ?>
 			<?php else: ?>
 				<?php echo  $this->Html->image('properties/fond_thumb.jpg', $options = array("class"=>"img-thumbnail")); ?>
 			<?php endif ?>
 			</figure>
 			<h4 class="area"><?php echo $property['Area']['name']; ?></h4>
 			<div class="caption-left">
 				<p> <span class="display:inline-block">
 				<?php echo $this->Text->truncate($property['Type']['name'], 10); ?>
 				<?php if ($property['Property']['bedrooms']==0): ?>
 				<?php else: ?>
 					&nbsp;F<?php echo h($property['Property']['bedrooms']); ?>
 				<?php endif ?>
 				</span>
				</p>
 				<p><?php echo $this->Number->format($property['Property']['size'],array('before'=>false,
						'places' => 2,'after' => ' m²','escape' => false,'decimals' => '.','thousands' => ',')); ?>
				</p>
 			</div>
 			<div class="caption-right">
 				<a href="<?php  echo $this->Html->url($property['Property']['link']); ?>" class="btn">
 					<p><span class="icon-zoom-in" style="display: inline-block;"></span><br>
 					 <small style="font-size: 75%;"><?php  echo __('see detail') ?></small></p>
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



