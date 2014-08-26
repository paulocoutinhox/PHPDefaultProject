<h3>Meus dados</h3>

<?php $this->renderPartial('/shared/_customerProfileMenu'); ?>

<br />
<br />
<br />

<?php $this->renderPartial('/shared/_customerProfileUpdateForm', array('model' => $model)); ?>