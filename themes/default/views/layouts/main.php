<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php echo ($this->pageTitle); ?></title>
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/libs/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	
	<link rel="shortcut icon" type="image/png" href="" />
	
	<script type="text/javascript">
		var BASE_URL = '<?php echo(Yii::app()->request->baseUrl); ?>';
	</script>
	
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/libs/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/main.js"></script>
</head>
<body>
				
	<div id="main-container">
		<div id="main-content">
			<?php $this->renderPartial('/shared/_messages'); ?>
			<?php echo $content; ?>
		</div>
	</div>
	
</body>
</html>