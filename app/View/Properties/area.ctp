<?php  echo $this->assign('title', __('area')); ?>
 <?php   $this->Html->addCrumb(__('properties'),array('controller'=>"properties",'action'=>'index')); ?>
 <?php   $this->Html->addCrumb(__('area')); ?>
<div class="index content">
	<ul>
	<?php foreach ($properties as $property): ?>
		<li><?php echo $this->Html->link($property['Area']['name'],
			array('controller' => 'areas', 'action' => 'view', $property['Area']['id'])); ?></li>
	<?php endforeach ?>
	</ul>
</div>
