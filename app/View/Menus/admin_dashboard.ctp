<?php // $menus=$this->requestAction(array('controller'=>'menus','action'=>'menu','admin'=>true)); ?>
 <div class="menus index row">
	<div class="col-md-12 page-header">
		<h2><i class="icon-menus"></i>&nbsp;<?php echo __('dashboard'); ?></h2>
	</div>
</div>
<div class="row">
<?php //foreach ($menus as $k => $v): $v = current($v);?>
<?php //endforeach ?>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3><?php echo $users_count.'/'.$users_total; ?>
				</h3>
				<p> <?php  echo __('users'); ?><?php // echo $v['controller']; ?></p>
			</div>
			<div class="icon ">
				<i class="icon-users "></i>
			</div>
			<a href="<?php echo $this->Html->url(array('controller' => "users", 'action' => 'index', "admin"=>true));?>" class="small-box-footer">
				<?php echo __('users'); //echo __(' %s',$v['controller']); ?> <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3><?php  echo $posts_count."/".$posts_total; ?>
				</h3>
				<p> <?php echo __('posts'); ?></p>
			</div>
			<div class="icon ">
				<i class="icon-posts"></i>
			</div>
			<a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'index', "admin"=>true)); ?>" class="small-box-footer"><?php echo __('posts'); ?> <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3><?php  echo $properties_count.'/'.$properties_total; ?>
				</h3>
				<p> <?php echo __('properties'); ?></p>
			</div>
			<div class="icon ">
				<i class="icon-properties"></i>
			</div>
			<a href="<?php echo $this->Html->url(array('controller' => 'properties', 'action' => 'index', "admin"=>true)); ?>" class="small-box-footer"><?php echo __('properies'); ?> <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-green">
			<div class="inner">
				<h3><?php  echo $menus_count.'/'.$menus_total; ?>
				</h3>
				<p> <?php echo __('menus'); ?></p>
			</div>
			<div class="icon ">
				<i class="icon-menus"></i>
			</div>
			<a href="<?php echo $this->Html->url(array('controller' => 'menus', 'action' => 'index', "admin"=>true)); ?>" class="small-box-footer"><?php echo __('properies'); ?> <i class="icon-menus"></i></a>
		</div>
	</div>

</div>
