<?php  $posts=$this->requestAction(array('controller'=>'posts','action'=>'menu','admin'=>false)); ?>
<?php foreach ($posts as $k => $v): $v = current($v); ?>
 <li <?php if ($this->request->slug == $v['slug']):?> class="active"<?php endif; ?>><?= $this->Html->link($v['name'], $v['link']); ?></li>
<?php endforeach ?>
<!-- <a href="#">Link</a> -->
<li <?php if($this->request->action =='offerings'):?> class="active"<?php endif; ?>>
	<?php echo $this->Html->link(__('offerings'), array('controller' => 'menus', 'action' => 'offerings')); ?>
</li>
<li <?php if($this->request->action =='contact'):?> class="active"<?php endif; ?>>
	<?php echo $this->Html->link(_('contact us'), array('controller' => 'menus', 'action' => 'contact')); ?>
</li>
<li <?php if ($this->request->controller == "users" && $this->request->action=="login"):?> class="active"<?php endif; ?>>
<?php  echo $this->Html->link("login", array('controller' => 'users', 'action' => 'login')); ?>
</li>
