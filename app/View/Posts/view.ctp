<?php  echo $this->Html->meta(array('name' => 'robots', 'content' =>$post['Post']['robots']),NULL,array("inline"=>false)); ?>
<?php   $this->Html->meta('description', $this->Text->truncate($post['Post']['description'], 300, array("exact"=>false)),array('inline' => false));
echo $this->Html->meta(array('name' => 'keywords', 'content' => $post['Post']['keywords']),false,array('inline'=>false));
?>
<?php  echo $this->assign('title', $post['Post']['name']); ?>
 <?php  $this->Html->addCrumb($post['Post']['name']); ?>
<div class="content post">
	<?= $post['Post']['content']; ?>
</div>

