<?php  $posts=$this->requestAction(array('controller'=>'posts','action'=>'menu','admin'=>false)); ?>
<?php foreach ($posts as $k => $v): $v = current($v); ?>
 <?= $this->Html->link($v['name'], $v['link']); ?>
<?php endforeach ?>
