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
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		echo $this->Html->css('styles.min');
		echo $this->fetch('css');
	?>
<style>
ul.tri li a.desc, ul.tri li a{
	margin-left: 5px;
	background-color: #777;
	padding: .2em .6em .3em;
    font-size: 75%;
    line-height: 1;
    color: #fff;
    vertical-align: baseline;
    border-radius: .25em;
}
ul.tri li a.desc, ul.tri li a.asc{
background-color: #f0ad4e;
}
ul.tri li a.desc:after	 {
content: ' ⇣';
}
ul.tri li a.asc:after	 {
content: ' ⇡';
}
</style>
</head>
<body id="home">
	<div  class="site-container" id="site-container">
		<header class="header">
			<div class="top-nav">
				<a href="#" class="header__icon" id="header__icon"></a>
				<a href="#" class="header__logo">Foukis real Estate </a>
				<nav class="menu" >
					<ul class="nav">
						<li <?php if ($this->request->controller =='pages' && $this->request->action =='index' ):?> class="active"<?php endif; ?>>
							<?php echo $this->Html->link('<span class="icon-home-1"  aria-hidden="true"></span>' ,
							 array('controller' => 'pages', 'action' => 'index'),
							 array('escape'=>false,'class'=>'home')
							 );
							echo "\n";
							//echo "\n</li>"
							 ?>
						</li>
						<?php echo $this->element("menu"); ?>
					</ul>
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
		</header>
		<div class="site-pusher">
			<div class="site-content" id="container">
			<h1 class='title'><span>Foukis <br> real Estate </span> <small><?php echo __('Real Estate in Greece'); ?></small></h1>
				<div class="container" >
					<!--nocache-->
					<?php echo $this->Flash->render(); ?>
					<!--/nocache-->
					<?php if ($this->request->controller=='pages' || $this->request->controller=='users' ): ?>

					<?php else: ?>
					<p class="breadcrumb ">
						<?php   echo $this->Html->getCrumbs(' / ', array(
							'text' => '<span class="icon-home-1"  aria-hidden="true"></span>' ,
							'url' => array('controller' => 'pages', 'action' => 'index'),
							'escape' => false,'title'=> __('home')
							)
						);
						?>
					</p>
					<div class="page-header" id="page-header">
						<h2 class="title"><?php  echo $this->fetch('title'); ?></h2>
					</div>
					<?php endif ?>
					<?php echo $this->fetch('content'); ?>
					<?php echo $this->element('vegas'); ?>
				</div>
			</div>
			<div class="site-cache" id="site-cache"></div>
			<div  id="container_footer"></div>
		</div>
	</div><?php  echo $this->element('footer-home'); ?>
	<?php echo  $this->Html->script(array('home.min'));
	echo $this->fetch('script');?>
</body>
</html>
