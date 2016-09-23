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

$cakeDescription = __d('cake_dev', 'Foukis: Admin');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('favicon.ico','/admin2-favicon.ico', array('type' => 'icon'));
		echo $this->Html->meta(array('name' => 'robots', 'content' => 'no index, no follow'));
		echo $this->Html->css('AdminLTE.min');
		//echo $this->Html->css('admin.min');
		echo $this->fetch('css');
	?>
<style>
th a:hover{
text-decoration: none;
}
th a.desc:after	 {
content: ' ⇣';
}
th a.asc:after	 {
content: ' ⇡';
}
</style>
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
						<li class="dropdown">
							<a href="<?= $this->Html->url(array('controller' => 'helps', 'action' => 'index')); ?> " class="dropdown-toogle">
								<i class="icon-help-circled"></i>	Aide
							</a>
						</li>
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toogle" data-toogle="dropdown">
								<?php echo  $this->Html->image("avatars/gravatar_mini.jpg", array('class'=>"user-image",'title'=>"avatar")); ?>
								<span class="hidden-xs">philippe</span>
							</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
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
										<?= $this->Html->link('<i class="icon-user fa-fw"></i> '.__('Account'),
									 	array('controller' => 'users', 'action' => 'account'),
									  	array("class"=>"btn btn-default btn-flat", 'escape'=>false)); ?>
								 	</div>
								 	<div class="pull-right">
								 		<?php echo $this->Html->link('<i class="icon-link-ext"></i> '.__("Logout").'',
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
			<div class="sidebar">
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
    			    <a href="#"><i class="icon-circle text-success"></i> Online</a>
    			  </div>
    			</div>
    			<ul class="sidebar-menu">
    				<li class="header">header</li>
    				<?php  echo $this->element("menu/admin/sidebar") ?>
    			</ul>
			</div>
		</aside>
		<div class="content-wrapper"><?php echo $this->Flash->render(); ?>
			<section class="content-header" >
			    <h1>
			    	<?php  echo $this->fetch('title'); ?>
        			<small><?= isset($actionHeading) ? $actionHeading : "" ; ?></small>
      			</h1>
    			<ol class="breadcrumb">
    			  <li>
    			  	<?php  echo $this->Html->getCrumbs(' </li> <li> ',array('text' => "<i class='icon-gauge'></i>&nbsp;". __('Dashboard'),
    			  	'url' => array('controller' => 'menus', 'action' => 'dashboard',"admin"=>true),'escape' => false)); ?></li>
    			</ol>
			</section>
			<section class="content">

				<?php echo $this->fetch('content'); ?>
			</section>
		</div>
		<footer class="main-footer text-center">
			<div class="pull-right hidden-xs">
				<b>Version</b> <?php echo $cakeVersion; ?>
			</div>
			<strong>Copyright &copy; 2007-<?php echo date('Y'); ?> <a href=""><?php echo env('HTTP_HOST'); ?></a>.</strong> All rights reserved.
		</footer>
	</div>
	<?php echo  $this->Html->script(array('admin.min'));
		  echo $this->fetch('script');?>
</body>
</html>
