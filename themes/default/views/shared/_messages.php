<!-- messages -->
<?php if(UserUtil::getDefaultWebUser()->hasFlash(Constants::SUCCESS_MESSAGE_ID)):?>
	<div class="msg_success">
		<?php echo UserUtil::getDefaultWebUser()->getFlash(Constants::SUCCESS_MESSAGE_ID); ?>
	</div>
<?php endif; ?>

<?php if(UserUtil::getDefaultWebUser()->hasFlash(Constants::ERROR_MESSAGE_ID)):?>
	<div class="msg_error">
		<?php echo UserUtil::getDefaultWebUser()->getFlash(Constants::ERROR_MESSAGE_ID); ?>
	</div>
<?php endif; ?>

<?php if(UserUtil::getDefaultWebUser()->hasFlash(Constants::INFO_MESSAGE_ID)):?>
	<div class="msg_info">
		<?php echo UserUtil::getDefaultWebUser()->getFlash(Constants::INFO_MESSAGE_ID); ?>
	</div>
<?php endif; ?>

<?php if(UserUtil::getDefaultWebUser()->hasFlash(Constants::WARNING_MESSAGE_ID)):?>
	<div class="msg_notice">
		<?php echo UserUtil::getDefaultWebUser()->getFlash(Constants::WARNING_MESSAGE_ID); ?>
	</div>
<?php endif; ?>

<div style="clear: both"></div>
<!-- end: messages -->