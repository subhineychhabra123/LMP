<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		 
	}

	public function index()
	{	
	  $this->data['result'] = "";
	  $this->load->view('index', $this->data);
			 
    }
    public function event_details(){
    	$this->data['result'] = "";
    	$this->load->view('event-details',$this->data);
    }
	public function iacts(){

		$this->load->view('iacts');
	}
	public function peters_day(){

		$this->load->view('peters-day', $this->data);
	}
	public function international_events(){

		$this->load->view('international-events', $this->data);
	}
	public function zumba(){

		$this->load->view('zumba', $this->data);
	}	 
 	
}
/* End of file Frontend.php */
/* Location: ./application/modules/frontend/controllers/Frontend.php */
