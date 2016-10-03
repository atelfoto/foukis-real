<?php echo $this->assign('title', __('property')); ?>
 <?php $this->Html->addCrumb(__('property'),array('controller'=>'properties','action'=>'index','admin'=>true)); ?>
 <?php $this->Html->addCrumb('upload' ); ?>
 <div class="properties index row">
 	<div class="col-sm-12 page-header">
 		<h3><i class="icon-download"><?php echo __('upload') ?></i></h3>
 	</div>
 	<div class="col-sm-12">
 		<div class="box box primary with-border">
 			<ul class="nav nav-tabs"><li class='pull-right'>
					<?php echo $this->html->link('<i class="icon-cancel-circled" style="color:#f00;">&nbsp;</i>'.__('closed'),
							array('controller'=>'properties','action'=>'index'),
							array('class' => 'btn btn-default','escape'=>false)); ?>
				</li>
				<li class='pull-right'>
					<?php echo $this->Form->button('<i class="icon-ok" style="color:#fff;">&nbsp;</i>'.__('publish'),
			 				array('class' => 'btn btn-success  pull-right')); ?>
				</li>
 			</ul>
 			<div class="box-body">


 			<?php foreach (glob('img/properties/'.$property['Property']['id'].'/*.jpg') as  $v):  ?>
 				<img src="/<?php echo $v; ?>" alt="">



 			 <?php endforeach ?>

 			</div>
 		</div>
 	</div>
 </div>

