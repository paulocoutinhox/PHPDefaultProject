<!-- messages -->
<?php if(UserUtil::getDefaultWebUser()->hasFlash(Constants::SUCCESS_MESSAGE_ID)):?>
	<p class="alert alert-success">
		<?php echo UserUtil::getDefaultWebUser()->getFlash(Constants::SUCCESS_MESSAGE_ID); ?>
	</p>
<?php endif; ?>

<?php if(UserUtil::getDefaultWebUser()->hasFlash(Constants::ERROR_MESSAGE_ID)):?>
	<p class="alert alert-danger">
		<?php echo UserUtil::getDefaultWebUser()->getFlash(Constants::ERROR_MESSAGE_ID); ?>
	</p>
<?php endif; ?>

<?php if(UserUtil::getDefaultWebUser()->hasFlash(Constants::INFO_MESSAGE_ID)):?>
	<p class="alert alert-warning">
		<?php echo UserUtil::getDefaultWebUser()->getFlash(Constants::INFO_MESSAGE_ID); ?>
	</p>
<?php endif; ?>

<?php if(UserUtil::getDefaultWebUser()->hasFlash(Constants::WARNING_MESSAGE_ID)):?>
	<p class="alert alert-info">
		<?php echo UserUtil::getDefaultWebUser()->getFlash(Constants::WARNING_MESSAGE_ID); ?>
	</p>
<?php endif; ?>

<div style="clear: both"></div>
<!-- end: messages -->