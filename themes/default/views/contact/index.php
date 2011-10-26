<h3><?php echo($model->title); ?></h3>

<?php $this->renderPartial('/shared/_contactForm', array('model' => $model, 'form' => $form)); ?>