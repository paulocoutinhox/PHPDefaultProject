<img src="<?php echo Yii::app()->getBaseUrl(true); ?>/themes/<?php echo(Yii::app()->theme->getName()); ?>/images/logo.png"/>

<br />
<br />

Olá <?php echo($model->name); ?>,

<br />
<br />

Clique no link abaixo para iniciar o processo de recuperação de senha:

<br />
<br />

<a href="<?php echo Yii::app()->getBaseUrl(true); ?>/recoveryPassword/index/token/<?php echo($token); ?>">
	<?php echo Yii::app()->getBaseUrl(true); ?>/recoveryPassword/index/token/<?php echo($token); ?>
</a>

<br />
<br />
<br />

<?php echo(Yii::app()->name); ?>