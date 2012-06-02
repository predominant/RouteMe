<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $this->Html->charset(); ?>
    <title><?php echo $title_for_layout; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Route me - ACT Bus helper thingo">
    <meta name="author" content="Timeless traveller GovHack team - Desmond and Graham">
    <?php
	echo $this->Html->meta('icon');
	echo $this->Html->css('bootstrap.min');
	echo $this->Html->css('routeme');
	echo $this->fetch('css');
	echo $this->Html->css('bootstrap-responsive.min');


	echo $this->fetch('meta');
	echo $this->element('iphone-headers');
	?>
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<?php echo $this->element('navbar'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php echo $this->element('sidebar'); ?>
			<div class="span9">
				<?php echo $this->Session->flash(); ?>
				<?php echo $content_for_layout; ?>
			</div><!--/span-->
		</div><!--/row-->
		<hr/>
		<footer>
			<p>&copy; Desmond and Graham 2012</p>
		</footer>

	</div><!--/.fluid-container-->
	<?php
	echo $this->Html->script(
		array(
			'//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js',
			'bootstrap'
		)
	);
	// echo $this->Html->scriptBlock("if (typeof jQuery == 'undefined') { document.write(unescape('%3Cscript src=\"/js/jquery-1.7.2.min.js\" type=\"text/javascript\"%3E%3C/script%3E')); }");
	echo $this->fetch('script');
	?>
</body>
</html>
