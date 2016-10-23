<?php  echo $this->assign('title', h($type['Type']['name'])); ?>
 <?php   $this->Html->addCrumb(__('properties'),array('controller'=>"properties",'action'=>'index')); ?>
 <?php   $this->Html->addCrumb(h($type['Type']['value'])); ?>
 <div class="index content thumbslist">
 <hr class="hr">
 	<?php if (!empty($type['Property'])): ?>
		<?php foreach ($type['Property'] as $property): ?>
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
					<h4><?php echo $property['name'] ?></h4>
					<?php echo ($property['bedrooms']==0) ? " " : __('bedrooms').' '. h($property['bedrooms']) ; ?>
					 <?php echo $this->Number->format($property['size'],
					 array('before'=>false,'places' => 2,'after' => ' m²','escape' => false,'decimals' => '.','thousands' => ',')); ?>
					 <?php echo (empty($property["level"])) ? " " : __('level').' '.h($property['level']); ?>
					 <br>
					<?php echo $this->Text->truncate(ltrim(strip_tags($property['content'])), 200, array("exact"=>false)); ?> <br>
					<?php echo  $this->Number->currency($property['price'],' €',
		  					 array('wholePosition'=>"after",'thousands'=>'.',"decimals"=>','));?>
				</div>
			</a>
			<hr class="hr">
		<?php endforeach; ?>
	<?php endif; ?>
 </div>
