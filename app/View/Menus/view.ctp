<?php echo $this->Html->meta(array('name' => 'robots', 'content' =>$menu['Menu']['robots']),NULL,array("inline"=>false)); ?>
<?php  $this->Html->meta('description', $this->Text->truncate($menu['Menu']['description'], 300, array("exact"=>false)),array('inline' => false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:type', 'type' => 'meta', 'content' => "article" ),NULL,array("inline"=>false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:title', 'type' => 'meta', 'content' => $menu['Menu']['name']),NULL,array("inline"=>false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:url', 'type' => 'meta', 'content' =>
"http://".env('HTTP_HOST')."/menu/".$menu['Menu']['slug'] ),NULL,array("inline"=>false));  ;?>
<?php echo $this->Html->meta(array('property' => 'og:description', 'type' => 'meta', 'content' =>
	$this->Text->truncate($menu['Menu']['description'], 200, array("exact"=>false))),NULL,array("inline"=>false));  ;?>
<?php echo $this->Html->meta(array('name'=>'twitter:card','content'=>"summary"),NULL,array('inline'=>false));  ;?>
<?php echo $this->Html->meta(array('name'=>'twitter:title','content'=>"château de chazeron ".$menu['Menu']['name']),NULL,array('inline'=>false));  ;?>
<?php echo $this->Html->meta(array('name'=>'twitter:url','content'=>"http://".env('HTTP_HOST')."/menu/".$menu['Menu']['slug']),NULL,array('inline'=>false)); ?>
<?php echo $this->Html->meta(array('name' => 'twitter:description','content'=>
$this->Text->truncate($menu['Menu']['description'], 160, array("exact"=>false))
),NULL,array("inline"=>false)); ;?>
<?php  echo $this->Html->meta(array('name'=>'twitter:image','content'=>"http://".env('HTTP_HOST')."/img/summary.jpg"),NULL,array('inline'=>false));?>

<?php $this->assign('title',$menu['Menu']['name']);
$this->Html->addCrumb(__('Menu'),array("controller"=>"menus","action"=>"index"));
$this->Html->addCrumb( $menu['Menu']['name']);  ?>
<div class="container container-">
	<div class=" page-content">
		<h2> <?php echo $menu['Menu']['name'] ?></h2>
		<?php if ($this->request->slug=='offerings'): ?>
			<?php echo $this->element("menu/offerings") ?>
		<?php elseif ($this->request->slug=='contact'): ?>
			<?php echo $this->element("menu/contact") ?>
		<?php else: ?>
			<?php echo $menu['Menu']['content'] ?>
		<?php endif ?>
	</div>
	<hr class="style-two">
</div>
