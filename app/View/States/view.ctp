<?php echo $this->Html->meta(array('name' => 'robots', 'content' =>$state['State']['robots']),NULL,array("inline"=>false)); ?>
<?php  $this->Html->meta('description', $this->Text->truncate($state['State']['description'], 300, array("exact"=>false)),array('inline' => false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:type', 'type' => 'meta', 'content' => "article" ),NULL,array("inline"=>false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:title', 'type' => 'meta', 'content' => $state['State']['name']),NULL,array("inline"=>false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:url', 'type' => 'meta', 'content' =>
"http://".env('HTTP_HOST')."/state/".$state['State']['slug'] ),NULL,array("inline"=>false));  ;?>
<?php echo $this->Html->meta(array('property' => 'og:description', 'type' => 'meta', 'content' =>
	$this->Text->truncate($state['State']['description'], 200, array("exact"=>false))),NULL,array("inline"=>false));  ;?>
<?php echo $this->Html->meta(array('name'=>'twitter:card','content'=>"summary"),NULL,array('inline'=>false));  ;?>
<?php echo $this->Html->meta(array('name'=>'twitter:title','content'=>"château de chazeron ".$state['State']['name']),NULL,array('inline'=>false));  ;?>
<?php echo $this->Html->meta(array('name'=>'twitter:url','content'=>"http://".env('HTTP_HOST')."/state/".$state['State']['slug']),NULL,array('inline'=>false)); ?>
<?php echo $this->Html->meta(array('name' => 'twitter:description','content'=>
$this->Text->truncate($state['State']['description'], 160, array("exact"=>false))
),NULL,array("inline"=>false)); ;?>
<?php  echo $this->Html->meta(array('name'=>'twitter:image','content'=>"http://".env('HTTP_HOST')."/img/summary.jpg"),NULL,array('inline'=>false));?>

<?php $this->assign('title',$state['State']['name']);
$this->Html->addCrumb(__('State'),array("controller"=>"states","action"=>"index"));
$this->Html->addCrumb( $state['State']['name']);  ?>
<div class="container container-">
	<div class=" page-content">
		<h2> <?php echo $state['State']['name'] ?></h2>
		 <?php echo $state['State']['content'] ?>
	</div>
	<hr class="style-two">
</div>
