<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php echo ($this->pageTitle); ?></title>
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/libs/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/libs/bootstrap/css/bootstrap-theme.min.css" />
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	
	<link rel="shortcut icon" type="image/png" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.png" />
	
	<script type="text/javascript">
		var APP_BASE_URL     = '<?php echo(Yii::app()->request->baseUrl); ?>';
		var APP_ABSOLUTE_URL = '<?php echo(Yii::app()->request->getBaseUrl(true)); ?>';
	</script>
	
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/libs/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/main.js"></script>
</head>
<body>

	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo($this->createUrl('/home/index')); ?>"><?php echo ($this->pageTitle); ?></a>
			</div>
		</div>
	</nav>

	<div class="container">
		<?php $this->renderPartial('/shared/_messages'); ?>
		<?php echo $content; ?>
	</div>

</body>
</html>