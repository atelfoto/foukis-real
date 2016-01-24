<?php  $posts=$this->requestAction(array('controller'=>'posts','action'=>'menu','admin'=>false)); ?>
<?php foreach ($posts as $k => $v): $v = current($v); ?>
 <?= $this->Html->link($v['name'], $v['link']); ?>
<?php endforeach ?>
<!-- <a href="#">Link</a> -->
<a href="#">Offerings</a>
<a href="#">Contact Us</a>
<?php  echo $this->Html->link("login", array('controller' => 'users', 'action' => 'login')); ?>
