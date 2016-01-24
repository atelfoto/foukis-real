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

$cakeDescription = __d('cake_dev', 'Foukis Real Estate');
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
		echo $this->Html->css('styles.min');
		echo $this->fetch('meta');
		echo $this->fetch('css');
	?>
</head>
<body id="home">
	<div  class="site-container" id="site-container">
		<header class="header">
			<div class="top-nav">
				<a href="#" class="header__icon" id="header__icon"></a>
				<a href="#" class="header__logo">Logo</a>
				<nav class="menu" >
					<?php echo $this->Html->link("accueil", array('controller' => 'pages', 'action' => 'index')); ?>
					<?php echo $this->element("menu") ?>
					<a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'account', "admin"=>true)); ?>"><?php echo __('account'); ?>
					</a>
				</nav>
				<nav  style="float:right;witdh:50%;">
					<ul class="flag" style="float:right;witdh:50%;">
						<li class="selected">
							<a href="#" class="French"></a>
						</li>
						<li>
							<a href="#" class="English"></a>
						</li>
						<li>
							<a href="#" class="Greek"></a>
						</li>
					</ul>
				</nav>
			</div>
			<!-- <h1><?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1> -->
		</header>
		<div class="site-pusher">
			<div class="site-content" id="container">
			<h1 class='title'><span>Foukis <br> real Estate </span> <small><?php echo __('Real Estate in Greece'); ?></small></h1>
				<div class="container" >
					<!--nocache-->
					<?php echo $this->Flash->render(); ?>
					<!--/nocache-->
					<p class="breadcrumb ">
						<?php   echo $this->Html->getCrumbs(' / ', array(
							'text' => __('home'),
							'url' => array('controller' => 'homes', 'action' => 'index'),
							'escape' => false
							)
						);
						?>/<?php  echo $this->fetch('title'); ?>/<?= isset($name) ? "<small>".$name."</small>" : false ; ?>
					</p>
					<div class="page-header" id="page-header">
						<!-- <h2 class="title"><?php  echo $this->fetch('title'); ?> <?= isset($cat) ? "<small>".$cat."</small>" : false ; ?></h2> -->
						<?= isset($name) ? '<h2 class="title">'. $name."</h2>" : false ; ?>
					</div>
					<?php echo $this->fetch('content'); ?>
					<?php echo $this->element('vegas'); ?>
				</div>
			</div>
			<div class="site-cache" id="site-cache"></div>
			<div  id="container_footer"></div>
		</div>
	</div><?php  echo $this->element('footer-home'); ?>
	<?php echo  $this->Html->script(array('home.min'));
	 echo  $this->Html->script(array('jquery.velocity.min'));
	 echo  $this->Html->script(array('montest'));
	echo $this->fetch('script');?>
</body>
</html>
