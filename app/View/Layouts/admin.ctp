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
		echo $this->Html->css('admin.min');
		echo $this->fetch('meta');
		echo $this->fetch('css');
	?>
</head>
<body id="home">
	<div  class="site-container">
		<header class="header">
			<a href="#" class="header__icon" id="header__icon"></a>
			<a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'index', 'admin'=>false)); ?>" class="header__logo">Logo</a>
			<nav class="menu">
				<?php echo $this->Html->link('post', array('controller' => 'posts', 'action' => 'index',"admin"=>true)); ?>
				<?php echo $this->Html->link(__('account'), array('controller' => 'users', 'action' => 'account')); ?>


				<!-- <ul class="flag">
					<li>
						<a href="#" class="French"></a>
					</li>
					<li>
						<a href="#" class="English"></a>
					</li>
					<li>
						<a href="#" class="Greek"></a>
					</li>
				</ul> -->
			</nav>
			<!-- <h1><?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1> -->
		</header>
		<div class="site-pusher">
			<div class="site-content" >
				<div class="container" id="container">
					<?php echo $this->Flash->render(); ?>
					<?php echo $this->fetch('content'); ?>
					<div id="container_footer"></div>
				</div>
				<?php echo $this->element('footer'); ?>
				<div class="site-cache" id="site-cache"></div>
			</div>

		</div>
	</div>
	<?php // echo $this->element('sql_dump'); ?>
	<?php echo  $this->Html->script(array('home.min'));
		  echo $this->fetch('script');?>
</body>
</html>
