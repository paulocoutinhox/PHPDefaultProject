<?php

class SiteAuthenticatedController extends SiteController
{

	protected $currentCustomer;
	protected $excludeFromAccessControl = false;

	public function filters()
	{
		return array_merge(parent::filters(),
			array(
				'accessControl',
			)
		);
	}

	public function filterAccessControl($filterChain)
	{
		if ($this->excludeFromAccessControl == false || in_array($this->getAction()->getId(), $this->excludeFromAccessControl) == false)
		{
			if (UserUtil::getDefaultWebUser()->getIsGuest())
			{
				$this->redirect(array('/login'));
			}
			else
			{
				$this->currentCustomer = UserUtil::getDefaultWebUser()->getModel();
			}
		}

		$filterChain->run();
	}

}