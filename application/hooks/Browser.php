<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Browser extends CI_Controller
{
    public function check_browser()
    {
        $this->load->library('user_agent');
        if ($this->agent->is_mobile()) {
        	redirect($this->config->m_base_url);
        }
    }
}
