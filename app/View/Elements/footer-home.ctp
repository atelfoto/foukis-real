<footer  id="footer">
<ul class="stretch">
	<li class='stretch-container'>
	<a href="<?php echo $this->Html->url(array('controller' => 'properties', 'action' => 'buy')); ?>">
		<div class='stretch-offset'>
	<span class="icon-home-1" ></span>
	<p><?php echo __('buy'); ?></p>
		</div>
	</a>
	</li>
	<li class='stretch-container'>
	<a href="<?php echo $this->Html->url(array('controller' => 'properties', 'action' => 'rent')); ?>">
		<div class='stretch-offset'>
		<span class="icon-building-filled" aria-hidden="true"></span>
		<p><?php echo __('rent') ?></p>
		</div>
	</a>
	</li>
	<li class='stretch-container'>
	<a href="<?php echo $this->Html->url(array('controller' => 'properties', 'action' => 'index')); ?>">
		<div class='stretch-offset'>
		<span class="icon-money" aria-hidden="true"></span>
		<p><?php echo __('all') ?></p>
		</div>
	</a>
	</li>
	<li class='stretch-container'>
	<a href="">
		<div class='stretch-offset'>
		<span class="icon-money" aria-hidden="true"></span>
		<p><?php echo __('businesses') ?></p>
		</div>
	</a>
	</li>
	<li class='stretch-container'>
	<a href="<?php echo $this->Html->url(array('controller' => 'properties', 'action' => 'offerings')); ?>">
		<div class='stretch-offset'>
		<span class="icon-money" aria-hidden="true"></span>
		<p><?php echo __('offerings') ?></p>
		</div>
	</a>
	</li>
</ul>
	<p>
		<strong><small><em>Copyright &copy; 2007-<?php echo date('Y'); ?> <a href=""><?php echo env('HTTP_HOST'); ?></a></em></small></strong> All rights reserved.
	</p>
</footer>
