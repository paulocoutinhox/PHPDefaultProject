<?php $this->beginWidget('application.modules.admin.components.BoxWidget', array('titulo' => 'Ocorreu um erro ao processar sua solicitação', 'largura' => '100%')); ?>
    
    <h2>Erro: <?php echo $code; ?></h2>

    <div class="error">
    <?php echo CHtml::encode($message); ?>
    </div>
    
<?php $this->endWidget(); ?>