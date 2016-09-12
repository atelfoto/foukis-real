<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->meta(array('name' => 'robots', 'content' => 'no index, no follow'));
		echo $this->Html->css('admin.min');
		echo $this->fetch('css');
	?>
</head>
<body class="skin-blue">
	<div  class="wrapper">
		<header class="main-header">
			<?= $this->Html->link(__("Foukis Real Estate"), array("controller"=>"pages","action" =>"index","admin"=>false ),
			array("class"=>"logo header__logox" , "data-toggle"=>"tooltip","data-placement"=>"bottom",'title'=>'Aller sur le site')); ?>
			<nav class="navbar navbar-static-top">
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" data-placement="bottom"  role="button" title="réduire le menu">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toogle" data-toogle="dropdown">
								<?php echo  $this->Html->image("avatars/gravatar_mini.jpg", array('class'=>"user-image",'title'=>"avatar")); ?>
								<span class="hidden-xs">philippe</span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-header">
									<?php echo  $this->Html->image("avatars/gravatar_thumb.jpg", array("class"=>"img-circle center-block", 'title'=>'avatar')); ?>
									<!-- <img src="" alt=""> -->
									<p>
										philippe
										<small><?php echo __('Member since'); ?>&nbsp; </small>
									</p>
								</li>
								<li class="user-body">
								</li>
								<li class="user-footer">
									<div class="pull-left">
										<?= $this->Html->link('<i class="fa fa-user fa-fw"></i> '.__('Account'),
									 	array('controller' => 'users', 'action' => 'account'),
									  	array("class"=>"btn btn-default btn-flat", 'escape'=>false)); ?>
								 	</div>
								 	<div class="pull-right">
								 		<?php echo $this->Html->link('<i class="glyphicon glyphicon-new-window fa-fw"></i> '.__("Logout").'',
								 		array('controller' => 'users', 'action' => 'logout','admin'=>true),
								 		array('escape'=>false,"class"=>"btn btn-default btn-flat")); ?>
								 	</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<aside class="main-sidebar">
			<section class="sidebar">
    			<div class="user-panel">
    			  <div class="pull-left image">
    			  	<?php echo  $this->Html->image("avatars/gravatar_mini.jpg",
    			  	array('class'=>'img-circle center-block',
    			  			'alt'=> __('user image'),
    			  			'title'=>'avatar')); ?>
    			    <!-- <img src="pages/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->
    			  </div>
    			  <div class="pull-left info">
    			    <p>philippe</p>
    			    <!-- Status -->
    			    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    			  </div>
    			</div>
    			<ul class="sidebar-menu">
    				<li class="header">header</li>
    				<li class="treeview <?php if ($this->request->controller =='menus'):?>active<?php endif; ?>">
						<a href="#"><i class="fa fa-share-alt"></i><span><?= __('menus');?></span> <i class="fa fa-angle-left pull-right"></i></a>
						<ul class="treeview-menu">
							<li <?php if ($this->request->controller =='menus' && $this->request->action =='admin_index'):?> class="active"<?php endif; ?>>
							<?php  echo $this->Html->link("<i class='fa fa-circle-o'></i>".__("menus manager"),
							array('controller' => 'menus', 'action' => 'index'),array('escape'=>false));?>
							</li>
							<li <?php if ($this->request->controller =='menus' && $this->request->action =='admin_edit'):?> class="active"<?php  endif; ?>>
								<?= $this->Html->link("<i class='fa fa-circle-o'></i>".__("add new menu"),
								array('controller' => 'menus', 'action' => 'add'),array('escape'=>false)); ?>
							</li>
    					</ul>
    				</li>
    				<li class="treeview <?php if ($this->request->controller =='posts'):?>active<?php endif; ?>">
						<a href="#"><i class="fa fa-share-alt"></i><span><?= __('posts');?></span> <i class="fa fa-angle-left pull-right"></i></a>
						<ul class="treeview-menu">
							<li <?php if ($this->request->controller =='posts' && $this->request->action =='admin_index'):?> class="active"<?php endif; ?>>
							<?php  echo $this->Html->link("<i class='fa fa-circle-o'></i>".__("menus manager"),
							array('controller' => 'posts', 'action' => 'index'),array('escape'=>false));?>
							</li>
							<li <?php if ($this->request->controller =='posts' && $this->request->action =='admin_edit'):?> class="active"<?php  endif; ?>>
								<?= $this->Html->link("<i class='fa fa-circle-o'></i>".__("add new posts"),
								array('controller' => 'posts', 'action' => 'add'),array('escape'=>false)); ?>
							</li>
    					</ul>
    				</li>
    			</ul>
			</section>
		</aside>
		<div class="content-wrapper">
			<section class="content-header" >
			    <h1>
			    	<?php  echo $this->fetch('title'); ?>
        			<small><?= isset($actionHeading) ? $actionHeading : "" ; ?></small>
      			</h1>
    			<ol class="breadcrumb">
    			  <li>
    			  	<?php echo $this->Html->getCrumbs(' </li> <li> ',array('text' => "<i class='fa fa-dashboard'></i>&nbsp;". __('Dashboard'),
    			  	'url' => array('controller' => 'dashboards', 'action' => 'index',"admin"=>true),'escape' => false)); ?>
    			</ol>
			</section>
			<section class="content" id="">
				<?php echo $this->Flash->render(); ?>
				<?php echo $this->fetch('content'); ?>
			</section>
		</div>
		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> <?php echo $cakeVersion; ?>
			</div>
			<strong>Copyright &copy; 2014-<?php echo date('Y'); ?> <a href=""><?php echo env('HTTP_HOST'); ?></a>.</strong> All rights reserved.
		</footer>
	</div>
	<?php echo  $this->Html->script(array('admin.min'));
		  echo $this->fetch('script');?>
</body>
</html>
