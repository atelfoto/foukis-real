<?php  $menus=$this->requestAction(array('controller'=>'menus','action'=>'menu','admin'=>true)); ?>
<?php foreach ($menus as $k => $v): $v = current($v);?>
	<li class="treeview <?php if ($this->request->controller ==$v['controller']):?>active<?php endif; ?>">
		<a href="#"><i class="icon-<?= $v['controller'];?>"></i>&nbsp;
		<span><?= $v['controller']; ?>
		</h3></span> <i class="icon-angle-left pull-right"></i></a>
		<ul class="treeview-menu">
			<li <?php if ($this->request->controller ==$v['controller'] && $this->request->action =='admin_index'):?> class="active"<?php endif; ?>>
			<?php  echo $this->Html->link("<i class='icon-circle-empty'></i>".__("{$v['controller']} manager"),
			array('controller' => $v['controller'], 'action' => 'index'),array('escape'=>false));?>
			</li>
			<li <?php if ($this->request->controller ==$v['controller'] && $this->request->action =='admin_edit'):?> class="active"<?php  endif; ?>>
				<?= $this->Html->link("<i class='icon-circle-empty'></i>".__("add"),
				array('controller' => $v['controller'], 'action' => 'add'),array('escape'=>false)); ?>
			</li>
    	</ul>
    </li>
<?php endforeach ?> <?php  ?>
