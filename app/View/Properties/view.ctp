<?php // echo $this->Html->meta(array('name' => 'robots', 'content' =>$property['Property']['robots']),NULL,array("inline"=>false)); ?>
<?php //  $this->Html->meta('description', $this->Text->truncate($property['Property']['description'], 300, array("exact"=>false)),array('inline' => false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:type', 'type' => 'meta', 'content' => "article" ),NULL,array("inline"=>false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:title', 'type' => 'meta', 'content' => $property['Property']['name']),NULL,array("inline"=>false)); ?>
<?php // echo $this->Html->meta(array('property' => 'og:url', 'type' => 'meta', 'content' =>
 // "http://".env('HTTP_HOST')."/property/".$property['Property']['slug'] ),NULL,array("inline"=>false));  ;?>
<?php // echo $this->Html->meta(array('property' => 'og:description', 'type' => 'meta', 'content' =>
	// $this->Text->truncate($property['Property']['description'], 200, array("exact"=>false))),NULL,array("inline"=>false));  ;?>
<?php echo $this->Html->meta(array('name'=>'twitter:card','content'=>"summary"),NULL,array('inline'=>false));  ;?>
<?php echo $this->Html->meta(array('name'=>'twitter:title','content'=>"château de chazeron ".$property['Property']['name']),NULL,array('inline'=>false));  ;?>
<?php // echo $this->Html->meta(array('name'=>'twitter:url','content'=>"http://".env('HTTP_HOST')."/property/".$property['Property']['slug']),NULL,array('inline'=>false)); ?>
<?php // echo $this->Html->meta(array('name' => 'twitter:description','content'=>
// $this->Text->truncate($property['Property']['description'], 160, array("exact"=>false))
// ),NULL,array("inline"=>false)); ;?>
<?php //  echo $this->Html->meta(array('name'=>'twitter:image','content'=>"http://".env('HTTP_HOST')."/img/summary.jpg"),NULL,array('inline'=>false));?>
<?php  echo $this->Html->css(array('flexslider/flexslider'),array('inline'=>false)); ?>
<?php $this->assign('title',$property['Property']['name']);
$this->Html->addCrumb(__('Property'),array("controller"=>"properties","action"=>"index"));
// $this->Html->addCrumb( $property['Property']['name']);
  ?>
<!-- <div class="container container- content"> -->
	<div class=" page-content content view">
		<h3> <?php // echo $property['Property']['name'] ?></h3>
		<p> <?php echo $property['Type']['name'] ?>&nbsp;F&nbsp;<?php echo h($property['Property']['bedrooms']); ?>
		<?php echo $property['Status']['name'] ?>
		<?php echo $this->Number->format($property['Property']['size'],
		array('before'=>false,'places' => 2,'after' => ' m²','escape' => false,'decimals' => '.','thousands' => ',')); ?> <?php echo $property['Area']['name'] ?>
		<span style="float:right;"><?php echo  $this->Number->currency($property['Property']['price'],' €',
		  					 array('wholePosition'=>"after",'thousands'=>'.',"decimals"=>','));?></span>
		 </p>
			<?php // if ($property['Property']['mediaQuantities']>0 ): ?>
			<?php if ($property['Property']['mediaQuantities'] > 0): ?>
				<div id="slider" class="flexslider">
					<ul class="slides">
					<?php foreach (glob('img/properties/'.$property['Property']['id'] .'/*.jpg') as  $v):  ?>
						<li>
							<img src="/<?php echo $v; ?>" alt="">
						</li>
					<?php endforeach ?>
					</ul>
				</div>
				<div id="carousel" class="flexslider">
					<ul class="slides">
						<?php foreach (glob('img/properties/'.$property['Property']['id'] .'/thumbs/*.jpg') as  $v):  ?>
							<li>
								<img src="/<?php echo $v; ?>" alt="">
							</li>
						<?php endforeach ?>
					</ul>
				</div>
				<?php else: ?>
				<figure>
					<?php echo  $this->Html->image("properties/fond.jpg", $options = array()); ?>
				</figure>
			<?php endif ?>
		<h3>Description</h3>
		<p>
		 <?php echo $property['Property']['content'] ?></p> <br>
		<div>
			<h3>Fiche détaillée du bien immobilier </h3>
			<p><b>vue globale</b></p>
			<hr>
			<b>Type d'appartement </b>: F&nbsp;<?php echo h($property['Property']['bedrooms']); ?> <br>
			<b>Surface totale :</b> <?php echo $this->Number->format($property['Property']['size'],
		array('before'=>false,'places' => 2,'after' => ' m²','escape' => false,'decimals' => '.','thousands' => ',')); ?> <br>
			<b>nombre de pièces:</b>&nbsp;<?php echo h($property['Property']['bedrooms']); ?> <br>
			<p><b>Les Plus</p></b> <br>
			<p>
			<?php foreach ($property['Characteristic'] as $characteristic): ?>
				<span class="label label-info" style="margin-right:5px;"><i class="icon-user"></i>
					<?php  echo $characteristic['name'] ;?>
				</span>
			<?php endforeach ?>
			</p>
			<hr>

		</div>
	</div>
<!-- 	<hr class="style-two">
</div> -->
<?php if ($property['Property']['mediaQuantities']>0 ): ?>
<?php echo  $this->Html->script(array("jquery.flexslider-min"),array('inline'=>false)); ?>
	<?=  $this->Html->scriptStart(array('inline'=>false)); ?>
$(window).load(function() {
  // The slider being synced must be initialized first
  $('#carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 200,
    itemMargin: 2,
    asNavFor: '#slider'
  });

  $('#slider').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: true,
    touch: true,
    slideshow: true,
    smoothHeight: true,
    sync: "#carousel"
  });
});
<?=  $this->Html->scriptEnd(); ?>
<?php endif ?>


