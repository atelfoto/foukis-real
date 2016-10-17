<?php // echo $this->Html->meta(array('name' => 'robots', 'content' =>$property['Property']['robots']),NULL,array("inline"=>false)); ?>
<?php //  $this->Html->meta('description', $this->Text->truncate($property['Property']['description'], 300, array("exact"=>false)),array('inline' => false)); ?>
<?php // echo $this->Html->meta(array('property' => 'og:type', 'type' => 'meta', 'content' => "article" ),NULL,array("inline"=>false)); ?>
<?php // echo $this->Html->meta(array('property' => 'og:title', 'type' => 'meta', 'content' => $property['Property']['name']),NULL,array("inline"=>false)); ?>
<?php // echo $this->Html->meta(array('property' => 'og:url', 'type' => 'meta', 'content' =>
 // "http://".env('HTTP_HOST')."/property/".$property['Property']['slug'] ),NULL,array("inline"=>false));  ;?>
<?php // echo $this->Html->meta(array('property' => 'og:description', 'type' => 'meta', 'content' =>
	// $this->Text->truncate($property['Property']['description'], 200, array("exact"=>false))),NULL,array("inline"=>false));  ;?>
<?php // echo $this->Html->meta(array('name'=>'twitter:card','content'=>"summary"),NULL,array('inline'=>false));  ;?>
<?php // echo $this->Html->meta(array('name'=>'twitter:title','content'=>"château de chazeron ".$property['Property']['name']),NULL,array('inline'=>false));  ;?>
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
	<div class=" page-content content properties-view">
		<p class="properties-title"> <?php echo $property['Type']['name'] ?> <?php echo ($property['Property']['bedrooms']==0) ? " " :  "-<b>".  __('number of rooms')." : </b> ".h($property['Property']['bedrooms']) ; ?>-
		<?php echo $property['Status']['name'] ?>-
		<?php echo $this->Number->format($property['Property']['size'],
		array('before'=>false,'places' => 2,'after' => ' m²','escape' => false,'decimals' => '.','thousands' => ',')); ?> - <?php echo $property['Area']['name'] ?> -
		<?php echo $property['State']['value'] ?>
		<span class="price" style="float:right;"><?php echo  $this->Number->currency($property['Property']['price'],' €',
		  					 array('wholePosition'=>"after",'thousands'=>'.',"decimals"=>','));?></span>
		 </p>
			<?php if ($property['Property']['mediaQuantities'] > 0): ?>
				<div id="slider" class="flexslider">
					<ul class="slides">
					<?php foreach (glob('img/properties/'.$property['Property']['id'] .'/*.jpg') as  $v):  ?>
						<li>
							<img src="/<?php echo $v; ?>" alt="" >
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
					<?php echo  $this->Html->image("properties/fond.jpg", array("width"=>"720px","style"=>"margin:right:auto;margin:left:auto;")); ?>
				</figure>
			<?php endif ?>
		<h3>Description</h3>
		 <?php echo $property['Property']['content'] ?> <br>
		 <div class="properties-fichier">
		 	<h3><?php echo __('details of the overall') ?></h3>
		 	<div>
		 		<p><b><?php echo __('overview') ?></b>
		 			<hr>
		 			<?php if ($property['Property']['bedrooms']==0): ?>

		 			<?php else: ?>
		 				<b> <?php  echo __('type of flat') ?></b>: F<?php  echo h($property['Property']['bedrooms']); ?><br>
		 			<?php endif ?>
		 			<b> <?php echo __('complete surface') ?>  :</b> <?php echo $this->Number->format($property['Property']['size'],
		 			array('before'=>false,'places' => 2,'after' => ' m²','escape' => false,'decimals' => '.','thousands' => ',')); ?>
		 			<?php echo ($property['Property']['bedrooms']==0) ? " " :  "<br><b>".  __('number of rooms')." : </b> ".h($property['Property']['bedrooms']) ; ?><br>
		 			<b> <?php echo __('year building') ?>  :</b>&nbsp;<?php echo h($property['Property']['dateYear']); ?>
		 		</p>
		 		<p><b> <?php echo __('most') ?> </b><br>
		 			<?php foreach ($property['Characteristic'] as $characteristic): ?>
		 				<span class="label label-info" style="margin-right:5px;"><i class="icon-<?php  echo $characteristic['name']; ;?>"></i>
		 					<?php  echo $characteristic['value']; ;?>
		 				</span>
		 			<?php endforeach ?>
		 		</p>
		 	</div>
		 	<div>
		 		<p>
		 			<b> <?php echo __("equipment"); ?></b>
		 			<hr>
		 		</p>

		 	</div>
		 	<div>
		 		<p>
		 			<b> <?php echo __("simulate your monthly payments"); ?></b>
		 			<hr>
		 		</p>


		 	</div>
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


