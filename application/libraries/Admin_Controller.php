<?php
class Admin_Controller extends MY_Controller
{

	function __construct ()
	{
		parent::__construct();
		$this->data['meta_title'] = 'LMS';
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->library('session');
		$this->load->model('admin_m');
		//$this->load->model('page_m');
		
		// Login check
		$exception_uris = array(
			'admin/login', 
			'admin/logout',
			'admin/register',
			'admin/forget_password',
			'admin/reset_password',
			'admin/hash'
		);
		if (in_array(uri_string(), $exception_uris) == FALSE) {
			if ($this->admin_m->loggedin() == FALSE ) {
	
				redirect('admin/login','refresh');
			}
		}
	
	}
}