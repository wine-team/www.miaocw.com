<?php
class CS_Controller extends MW_Controller{
	
	public function __construct()
	{
		parent::__construct();
		$frontUser = get_cookie('frontUser');
		if (!$frontUser) {
			$this->redirect($this->config->passport_url);
		}
	}
}