<?php  $posts=$this->requestAction(array('controller'=>'posts','action'=>'menu','admin'=>false)); ?>
<?php foreach ($posts as $k => $v): $v = current($v); ?>
 <li <?php if ($this->request->slug == $v['slug']):?> class="active"<?php endif; ?>><?= $this->Html->link($v['name'], $v['link']); ?></li>
<?php endforeach ?>
<!-- <a href="#">Link</a> -->
<li>
	<a href="#"> <?php echo __('Offerings') ?></a>
</li>
<li>
	<a href="#">Contact Us</a>
</li>
<li>
<?php  echo $this->Html->link("login", array('controller' => 'users', 'action' => 'login')); ?>
</li>
