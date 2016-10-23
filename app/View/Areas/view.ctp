<?php  echo $this->assign('title', h($area['Area']['name'])); ?>
 <?php   $this->Html->addCrumb(__('properties'),array('controller'=>"properties",'action'=>'index')); ?>
 <?php   $this->Html->addCrumb(__('areas'),array('controller'=>"areas",'action'=>'index')); ?>
 <?php   $this->Html->addCrumb(h($area['Area']['name'])); ?>
 <div class="index content thumbslist">
  <!-- 	<ul class="tri" >
 		<li>triez par : </li>
 		<li><?php // echo $this->Paginator->sort('price'); ?></li>
 		<li><?php // echo $this->Paginator->sort('size'); ?></li>
 		<li><?php // echo $this->Paginator->sort('area_id'); ?></li>
 		<li><?php // echo $this->Paginator->sort('type_id'); ?></li>
 		<li><?php // echo $this->Paginator->sort('bedrooms'); ?></li>
 		<li><?php // echo $this->Paginator->sort('created'); ?></li>
 		<li><?php // echo $this->Paginator->sort('id'); ?></li>
 	</ul>  -->
 <hr class="hr">
 	<?php if (!empty($area['Property'])): ?>
		<?php foreach ($area['Property'] as $property): ?>
			<a href="<?php echo $this->Html->url(array('controller' => 'properties', 'action' => 'view', $property['id'])); ?>">
				<figure class="media-left" style="min-height: 128px;">
			 	<?php if ($property['mediaQuantities'] > 0): ?>
 				<?php  echo  $this->Html->image("properties/".$property['id']."/thumbs/".$property['id']."-01.jpg",
 					$options = array("class"=>"img-thumbnail","width"=>"192" , "height"=>"128")); ?>
    			<figcaption>
    				<span class="icon-camera">&nbsp;<?php echo h($property['mediaQuantities']); ?></span>
    			</figcaption>
 				<?php else: ?>
 					<?php echo  $this->Html->image('properties/fond_thumb.jpg', $options = array("class"=>"img-thumbnail","width"=>"192" , "height"=>"128")); ?>
 				<figcaption>
 					<span></span>
 				</figcaption>
 				<?php endif ?>
 				</figure>
				<div class="media-body" style="min-height: 128px;">
					<h4><?php echo $property['name'] ?><span><?php echo  $this->Number->currency($property['price'],' €',
		  					 array('wholePosition'=>"after",'thousands'=>'.',"decimals"=>','));?></span></h4>
					<span class="overview"><?php echo ($property['bedrooms']==0) ? " " : __('bedrooms').' '. h($property['bedrooms']) ; ?>
					 <?php echo $this->Number->format($property['size'],
					 array('before'=>false,'places' => 2,'after' => ' m²','escape' => false,'decimals' => '.','thousands' => ',')); ?>
					 <?php echo (empty($property["level"])) ? " " : __('level').' '.h($property['level']); ?></span>
					 <br>
					<?php echo $this->Text->truncate(ltrim(strip_tags($property['content'])), 250, array("exact"=>false)); ?> <br>

				</div>
			</a>
			<hr class="hr">
		<?php endforeach; ?>
	<?php endif; ?>
<!-- 	<div class="paginations">
		<?php // echo $this->element('pagination'); ?>
 	</div> -->
 </div>



