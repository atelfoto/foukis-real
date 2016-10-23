<?php echo $this->assign('title', __('Areas')); ?>
 <?php $this->Html->addCrumb(__('Areas')); ?>
 <div class="areas index content">
	<div class="area-body">
		<ul class="list-area">
			<?php foreach ($areas as $area): ?>
				<li><?php echo $this->Html->link($area['Area']['value'], array('controller' => 'areas', 'action' => 'view',$area['Area']['id'])); ?>
					<span class="badge"><?php echo h($area['Area']['property_count']) ?></span>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<div class="paginations">
		<?php echo $this->element('pagination'); ?>
		<?php  echo $this->element("pagination-counter"); ?>
	</div>
</div><!-- end containing of content -->



