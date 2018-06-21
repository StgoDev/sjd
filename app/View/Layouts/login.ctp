<?php
$cakeDescription = __d('cake_dev', '::SIS CORREG::');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>
	</title>
    <meta name="description" content="Corregedoria PMPI">
    <meta name="keywords" content="pmpi corregedoria Teresina Piauí Policia Militar do Piauí"> 	
    <meta name="author" content="Felipe Santiago"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('login','sb-admin-2','bootstrap'));
		//echo $this->Html->script(array('bootstrap.js','sb-admin-2.js'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Droid+Sans+Mono" />
</head>
<body>
	<div id="container">
		<div id="content">
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
</body>
</html>
