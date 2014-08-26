<a href="<?php echo Yii::app()->getBaseUrl(true); ?>" title="<?php echo(Yii::app()->name); ?>">
	<img src="<?php echo Yii::app()->getBaseUrl(true); ?>/themes/<?php echo(Yii::app()->theme->getName()); ?>/images/logo.png"/>
</a>

<br />
<br />

Parabéns <?php echo($model->name); ?>,

<br />
<br />

Seu cadastro foi realizado com sucesso, seja bem vindo.

<br />
<br />

Clique no link abaixo para ativar sua conta.

<br />
<br />

<a href="<?php echo Yii::app()->getBaseUrl(true); ?>/register/activate/token/<?php echo($token); ?>">
	<?php echo Yii::app()->getBaseUrl(true); ?>/register/activate/token/<?php echo($token); ?>
</a>

<br />
<br />
<br />

<?php echo(Yii::app()->name); ?>