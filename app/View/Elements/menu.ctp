<?php  $posts=$this->requestAction(array('controller'=>'posts','action'=>'menu','admin'=>false)); ?>
<?php foreach ($posts as $k => $v): $v = current($v); ?>
<li <?php if ($this->request->slug == $v['slug']):?> class="active"<?php endif; ?>> <?php  echo "\n\t\t\t\t\t\t" ?>
 	<?= $this->Html->link($v['name'], $v['link']); ?><?php  echo "\n\t\t\t\t\t\t" ?>
</li><?php  echo "\n\t\t\t\t\t\t" ?>
<?php endforeach ?>
<li <?php if($this->request->slug =='offerings'):?> class="active"<?php endif; ?>>
							<?php echo $this->Html->link(__('offerings'), array('controller' => 'menus', 'action' => 'offerings'));
							echo "\n"; ?>
						</li>
						<li <?php if($this->request->slug =='contact'):?> class="active"<?php endif; ?>>
							<?php echo $this->Html->link(_('contact us'), array('controller' => 'menus', 'action' => 'contact'));
							echo "\n"; ?>
						</li>
						<li <?php if ($this->request->controller == "users" && $this->request->action=="login"):?> class="active"<?php endif; ?>>
						<?php  echo $this->Html->link("login", array('controller' => 'users', 'action' => 'login'));
						echo "\n"; ?>
						</li>
