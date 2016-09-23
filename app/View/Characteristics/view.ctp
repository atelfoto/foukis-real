<?php echo $this->Html->meta(array('name' => 'robots', 'content' =>$characteristic['Characteristic']['robots']),NULL,array("inline"=>false)); ?>
<?php  $this->Html->meta('description', $this->Text->truncate($characteristic['Characteristic']['description'], 300, array("exact"=>false)),array('inline' => false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:type', 'type' => 'meta', 'content' => "article" ),NULL,array("inline"=>false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:title', 'type' => 'meta', 'content' => $characteristic['Characteristic']['name']),NULL,array("inline"=>false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:url', 'type' => 'meta', 'content' =>
"http://".env('HTTP_HOST')."/characteristic/".$characteristic['Characteristic']['slug'] ),NULL,array("inline"=>false));  ;?>
<?php echo $this->Html->meta(array('property' => 'og:description', 'type' => 'meta', 'content' =>
	$this->Text->truncate($characteristic['Characteristic']['description'], 200, array("exact"=>false))),NULL,array("inline"=>false));  ;?>
<?php echo $this->Html->meta(array('name'=>'twitter:card','content'=>"summary"),NULL,array('inline'=>false));  ;?>
<?php echo $this->Html->meta(array('name'=>'twitter:title','content'=>"château de chazeron ".$characteristic['Characteristic']['name']),NULL,array('inline'=>false));  ;?>
<?php echo $this->Html->meta(array('name'=>'twitter:url','content'=>"http://".env('HTTP_HOST')."/characteristic/".$characteristic['Characteristic']['slug']),NULL,array('inline'=>false)); ?>
<?php echo $this->Html->meta(array('name' => 'twitter:description','content'=>
$this->Text->truncate($characteristic['Characteristic']['description'], 160, array("exact"=>false))
),NULL,array("inline"=>false)); ;?>
<?php  echo $this->Html->meta(array('name'=>'twitter:image','content'=>"http://".env('HTTP_HOST')."/img/summary.jpg"),NULL,array('inline'=>false));?>

<?php $this->assign('title',$characteristic['Characteristic']['name']);
$this->Html->addCrumb(__('Characteristic'),array("controller"=>"characteristics","action"=>"index"));
$this->Html->addCrumb( $characteristic['Characteristic']['name']);  ?>
<div class="container container-">
	<div class=" page-content">
		<h2> <?php echo $characteristic['Characteristic']['name'] ?></h2>
		 <?php echo $characteristic['Characteristic']['content'] ?>
	</div>
	<hr class="style-two">
</div>
