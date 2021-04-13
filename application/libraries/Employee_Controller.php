<?php
class Employee_Controller extends MY_Controller
{

	function __construct ()
	{
		parent::__construct();
		$this->data['meta_title'] = 'LMS';
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->library('session');
		$this->load->model('employee_m');
		//$this->load->model('page_m');
		
		// Login check
		$exception_uris = array(
			'employee/login', 
			'employee/logout',
			'employee/register',
			'employee/forget_password',
			'employee/reset_password',
			'employee/hash'
		);
		if (in_array(uri_string(), $exception_uris) == FALSE) {
			if ($this->employee_m->loggedin() == FALSE ) {
	
				redirect('','refresh');
			}
		}
	
	}
}