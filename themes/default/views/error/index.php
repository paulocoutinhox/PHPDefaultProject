<div style="width: 100%; text-align: center;">
	<h3>Ops! Desculpe, ocorreu um erro em nossa aplicação.</h3>
	<br />
	<img src="<?php echo(Yii::app()->theme->baseUrl); ?>/images/ico_warning.png" alt="Erro na aplicação" />
	<br />
	<br />
	<div class="message">
		Código:  <?php echo $code; ?>
		<br />
		Mensagem: <?php echo $message; ?>
	</div>
	<div class="clear"></div>
</div>