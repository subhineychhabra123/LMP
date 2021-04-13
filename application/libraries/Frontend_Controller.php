<?php
class Frontend_Controller extends MY_Controller
{

	function __construct ()
	{
		parent::__construct();
		$this->data['meta_title'] = 'Zytrio';
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->library('session');
		$this->load->model('user_m');
		//$this->load->model('page_m');
		
		// Login check
		$exception_uris = array(
			'login', 
			'logout',
			'register',
			'forget_password',
			'reset_password',
			'hash'
		);
		if (in_array(uri_string(), $exception_uris) == FALSE) {
			if ($this->user_m->loggedin_user() == FALSE ) {
				redirect('login');
			}
		}
	
	}
}












