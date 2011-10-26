<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?php echo ($this->pageTitle); ?></title>
	
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/blueprint/screen.css" media="screen, projection" />	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/blueprint/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/blueprint/ie.css" media="screen, projection" />
	<![endif]-->
	
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/scripts/fancybox/jquery.fancybox.css" />
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/custom/pager.css" />
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/custom/form.css" />
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/custom/main.css" />
	
	<link rel="shortcut icon" type="image/png" href="" />
	
	<script type="text/javascript">
		var BASE_URL = '<?php echo(Yii::app()->request->baseUrl); ?>';
	</script>
	
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/scripts/jquery/jquery.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/scripts/fancybox/jquery.fancybox.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/scripts/jquery/jquery.form.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/scripts/jquery/jquery.maskedinput.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/scripts/main.js"></script>
	
</head>
<body>
				
	<div id="container">
		<div id="content">
			<?php $this->renderPartial('/shared/_messages'); ?>
			<?php echo $content; ?>
		</div>
	</div>
	
</body>
</html>