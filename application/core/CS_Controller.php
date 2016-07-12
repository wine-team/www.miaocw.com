<?php
class CS_Controller extends MW_Controller{
	
	public function __construct()
	{
		parent::__construct();
		$frontUser = get_cookie('frontUser') ? get_cookie('frontUser') : $this->cache->memcached->get('frontUser');
		if (!$frontUser) {
			$this->redirect($this->config->passport_url);
		}
	}
}