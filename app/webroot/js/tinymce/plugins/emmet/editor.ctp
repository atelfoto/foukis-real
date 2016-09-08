<!DOCTYPE html>
<html>
	<head>
		<title>TinyMCE Emmet Plugin</title>
		<link rel="stylesheet" href="css/codemirror.min.css">
	</head>
	<body>
	<h1>montitre</h1>
		<form>
			<textarea id="code" name="code" autofocus></textarea>
		</form>
		<script src="js/codemirror/codemirror.min.js"></script>
		<script src="js/emmet/emmet-full.min.js"></script>
		<script src="js/emmet/emmet-extras.min.js"></script>
	</body>
</html>

<?php echo $this->Html->css(array('codemirror.min'),array('inline'=>false)); ?>
<?php echo  $this->Html->script(array("codemirror/codemirror.min","emmet/emmet-full.min","emmet/emmet-extras.min"), array('inline'=>false)); ?>
