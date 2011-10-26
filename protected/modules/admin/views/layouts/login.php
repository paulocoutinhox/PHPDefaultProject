<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/blueprint/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/blueprint/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/blueprint/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/login/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/custom/form.css" />

	<title><?php echo CHtml::encode(Yii::app()->name); ?> - Administrativo</title>
</head>

<body>

<!-- PÁGINA -->
<div class="container" id="page">

    <!-- LOGO -->
	<div id="logo">&nbsp;</div>
    <!-- FIM: LOGO -->

    <!-- CONTEÚDO -->
    <div id="content">
            
        <?php $this->renderPartial('/shared/_messages'); ?>
		<?php echo $content; ?>
                   
	</div>
     <!-- FIM: CONTEÚDO -->

	<!-- FOOTER -->
	<div id="footer" style="border: 0 none;">
		<a href="http://www.prsolucoes.com" target="_blank"><?php echo(Yii::app()->params['poweredText']); ?></a>
	</div>
    <!-- FIM: FOOTER -->

</div>
<!-- FIM: PÁGINA -->

</body>
</html>