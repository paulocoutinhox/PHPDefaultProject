<a href="<?php echo Yii::app()->getBaseUrl(true); ?>" title="<?php echo(Yii::app()->name); ?>">
	<img src="<?php echo Yii::app()->getBaseUrl(true); ?>/themes/<?php echo(Yii::app()->theme->getName()); ?>/images/logo.png"/>
</a>

<br />
<br />

<?php echo($model->title); ?>

<br />
<br />

<strong>Data:</strong> <?php echo(date('d/m/Y - H:i:s')); ?>
<br />
<strong>Nome:</strong> <?php echo($form->fromName); ?>
<br />
<strong>E-mail:</strong> <?php echo($form->fromEmail); ?>
<br />
<strong>Mensagem:</strong> 
<br />
<?php echo(nl2br($form->message)); ?>
<br />

<br />
<br />

<?php echo(Yii::app()->name); ?>