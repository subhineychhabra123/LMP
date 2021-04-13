<?php 
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Deals extends REST_Controller {

	function __construct($config = 'rest')

	    {
		include ''.APPPATH.'libraries/Requests.php';
		Requests::register_autoloader();
		header('Access-Control-Allow-Origin: *');
	    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	    header("Access-Control-Allow-Headers: *");
	        // Construct the parent class
	        parent::__construct();
	        $this->load->model('deals_api_m');
	        $this->load->model('deals_m');
	        $this->load->helper('string');
	        $this->load->model('user_m');

	    }


	   public  function get_vendors_post(){

	   		$limit = $this->post('limit');
	   		$offset =  $this->post('offset');
	   		$result  = $this->deals_api_m->get_vendor_list($limit , $offset);
	   		$this->response($result, REST_Controller::HTTP_OK);
	    }

	     public  function get_freelancers_post(){

	   		$limit = $this->post('limit');
	   		$offset =  $this->post('offset');
	   		$result  = $this->deals_api_m->get_freelancer_list($limit , $offset);
	   		$this->response($result, REST_Controller::HTTP_OK);
	    }


	    public function get_freelancer_details_post(){

	    	$id = $this->post('id');
	    	$result['deals'] = $this->deals_m->get_freelancer_delals($id);
	    	$result['freelancer_details'] = $this->deals_api_m->get_vendor_details($id);
			$result['packages'] = $this->deals_m->get_freelancer_packages($id);
			$result['related_deals'] = $this->deals_m->get_related_freelancer_deals($id);
			$this->response($result, REST_Controller::HTTP_OK);

	    }

	     public function get_vendor_details_post(){

	    	$id = $this->post('id');
	    	$this->result['deals'] = $this->deals_m->get_vendor_delals($id);
	    	$this->result['vendor_details'] = $this->deals_api_m->get_vendor_details($id);
			$this->result['packages'] = $this->deals_m->get_vendor_packages($id);
			$this->result['related_deals'] = $this->deals_m->get_related_vendor_deals($id);
			$this->response($this->result, REST_Controller::HTTP_OK);

	    }


	   public function get_vendor_deals_details_post(){

	    	$id = $this->post('id');
	    	$result['details'] = $this->deals_api_m->vendor_deal_details($id);
	    	$result['packages'] = $this->deals_m->get_vendor_packages($id);
			$result['related_deals'] = $this->deals_m->get_related_vendor_deals($id);
			$this->response($result, REST_Controller::HTTP_OK);

	    }



	    public function get_freelancer_deals_details_post(){

	    	$id = $this->post('id');
	    	$result['details'] = $this->deals_api_m->freelancer_deal_details($id);
	    	$result['packages'] = $this->deals_m->get_freelancer_packages($id);
			$result['related_deals'] = $this->deals_m->get_related_freelancer_deals($id);
			$this->response($result, REST_Controller::HTTP_OK);

	    }


	    public function get_all_cats_post(){

	    	$result =  $this->db->get('categories')->result();
	    	$this->response($result, REST_Controller::HTTP_OK);

	    }

	    public function get_vendor_deals_by_cats_post(){
	    	$id = $this->post('cats_id');
			$limit = $this->post('limit');
				$offset = $this->post('offset');
	    	$result =  $this->deals_api_m->get_vendor_deals_by_cats($id , $limit,$offset);
	    	$this->response($result, REST_Controller::HTTP_OK);

	    }

	    public function get_freelancer_deals_by_cats_post(){
		    $id = $this->post('cats_id');
			$limit = $this->post('limit');
			$offset = $this->post('offset');
	    	$result =  $this->deals_api_m->get_freelancer_deals_by_cats($id ,$limit,$offset);
	    	$this->response($result, REST_Controller::HTTP_OK);
	    }


	    public function get_search_val_post(){
	    $term = $this->post('term');
		$loc = $this->post('loc');
		$headers = array('Accept' => 'application/json');
		$lat_lang = Requests::get('https://maps.googleapis.com/maps/api/geocode/json?address='.$loc.'&key=AIzaSyCgZEciTNFqZ0os8lbm0GrOWv5l19KLlco', $headers);
		$lat_lang = json_decode($lat_lang->body) ;
		$lat = $lat_lang->results[0]->geometry->location->lat ;
		$lng = $lat_lang->results[0]->geometry->location->lng ;
		$miles =  20 ;
		$this->db->select("vendor.*, ( 3959 * acos( cos( radians($lat) ) * cos( radians( loc_lat ) ) * cos( radians( loc_long ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( loc_lat ) ) ) ) AS distance");                 
		$this->db->having('distance <= ' . $miles);
		$this->db->order_by('distance');
		$vendor_result = $this->db->get('vendor')->result();

		$vendors = array();
		foreach ($vendor_result as $datas) {

			# code...
			$vendors[] = $datas->vendor_id ;

		}

		$this->db->select("freelancer.*, ( 3959 * acos( cos( radians($lat) ) * cos( radians( loc_lat ) ) * cos( radians( loc_long ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( loc_lat ) ) ) ) AS distance");                 
		$this->db->having('distance <= ' . $miles);
		$this->db->order_by('distance');
		$freelancer_result = $this->db->get('freelancer')->result();

		$freelancer = array();

		foreach ($freelancer_result as $datas) {

			# code...
			$freelancer[] = $datas->freelance_id ;

		}
		$result = array();
		$result['category'] = array();
		$result['freelancer_deals'] = array();
		$result['vendor_deals'] = array();
		$result['vendors'] = array();
		$result['freelancer'] = array();
		$result['vendor_product']= array();
		$this->db->like('category_name', $term, 'BOTH');
		$this->db->limit(4);
		$category_name = $this->db->get('categories')->result();

		foreach ($category_name as $datas) {

			array_push($result['category'], array('cats_id' => $datas->cats_id ,'cats_name' =>$datas->category_name));
			# code...
		}
		if(!empty($freelancer)){
			$this->db->like('deals_name', $term, 'BOTH');
			$this->db->limit(4);
			$this->db->where_in('freelancer_id', $freelancer);
			$freelancer_deals = $this->db->get('freelancer_deals')->result();

			foreach ($freelancer_deals as $datas) {
				array_push($result['freelancer_deals'], array('freelancer_deal_id' => $datas->fd_id,'deals_name' =>$datas->deals_name));
			}
		}
		
		if(!empty($vendors)){
			$this->db->where_in('vendor_id', $vendors);
			$this->db->or_like('deals_name', $term, 'BOTH');
			$this->db->limit(4);
			$vendor_deals = $this->db->get('vendor_deals')->result();

			foreach ($vendor_deals as $datas) {
				array_push($result['vendor_deals'], array('vendor_deal_id' => $datas->vd_id,'deals_name' =>$datas->deals_name));
			}
		
		

		$modified_term = str_replace(' ', '', $term);

		$this->db->select('vendor.* , users.first_name ,users.last_name');
		$this->db->from('vendor');
		
		$this->db->join('users', 'vendor.user_id = users.id', 'left');
		$this->db->limit(4);
		$this->db->where_in('vendor.vendor_id', $vendors);
		$this->db->like('vendor.vendor_slug', $modified_term, 'BOTH');
		$this->db->or_like('vendor.long_desc', $term, 'BOTH');
		$vendor = $this->db->get()->result();
		foreach ($vendor as $datas) {
			array_push($result['vendors'], array('vendor_id' => $datas->vendor_id ,'vendor_name' =>''.$datas->first_name.' '.$datas->last_name.''));
		}
	}
       


	if(!empty($freelancer)){
		$this->db->select('freelancer.* , users.first_name ,users.last_name');
		$this->db->from('freelancer');
		$this->db->limit(4);
		$this->db->join('users', 'freelancer.user_id = users.id', 'left');
		$this->db->where_in('freelancer.freelancer_id', $freelancer);
		$this->db->like('freelancer.freelance_slug', $modified_term, 'BOTH');
		$this->db->or_like('freelancer.long_disc', $term, 'BOTH');


		$freelancer = $this->db->get()->result();
		foreach ($freelancer as $datas) {
			array_push($result['freelancer'], array('freelancer_id' => $datas->freelance_id ,'freelancer_name' =>''.$datas->first_name.' '.$datas->last_name.''));
		}
	}

	if(!empty($vendor)){

		$this->db->like('product_name', $term, 'BOTH');
		$this->db->limit(4);
		$this->db->where_in('vendor_id', $vendors);
		$products = $this->db->get('products')->result();

		foreach ($products as $datas) {

			array_push($result['vendor_product'], array('product_id' => $datas->id ,'product_name' =>''.$datas->product_name.''));
			# code...
		}
	}
	$this->response($result, REST_Controller::HTTP_OK);
	}
    public function get_today_deals_post(){
 	    	 
 	    	$limit = $this->post('limit');
			$offset = $this->post('offset');
	    	$result =  $this->deals_api_m->get_today_deals($limit,$offset);
	    	$this->response($result, REST_Controller::HTTP_OK);
	    	 
	    }
	public function  portfolio_gallery_post(){
            $user_id = $this->post('user_id');
            $result =  $this->deals_api_m->portfolio_gallery($user_id);
	    	$this->response($result, REST_Controller::HTTP_OK);
	}
	public function all_deals_post(){
            $limit = $this->post('limit');
			$offset = $this->post('offset');
            $result =  $this->deals_api_m->all_deals($limit,$offset);
	    	$this->response($result, REST_Controller::HTTP_OK);
	}
	public function freelancer_deals_details_post(){
            $user_id = $this->post('freelancer_id');
            $result =  $this->deals_api_m->freelancer_deals_details($user_id);
	    	$this->response($result, REST_Controller::HTTP_OK);
	}
	public function vendor_deals_details_post(){
            $user_id = $this->post('vendor_id');
            $result =  $this->deals_api_m->vendor_deals_details($user_id);
	    	$this->response($result, REST_Controller::HTTP_OK);
	}
	public function get_deals_by_cats_post(){

	    	$id = $this->post('cats_id');
			$limit = $this->post('limit');
			$offset = $this->post('offset');
	    	$result['vendor'] =  $this->deals_api_m->get_vendor_deals_by_cats($id , $limit,$offset);
	    	$result['freelancer'] =  $this->deals_api_m->get_freelancer_deals_by_cats($id ,$limit,$offset);
	    	$this->response($result, REST_Controller::HTTP_OK);
 	    }
 	public function mobile_app_bnr_get(){
            $result =  $this->deals_api_m->mobile_app_bnr();
	    	$this->response($result, REST_Controller::HTTP_OK);
	}
	public function update_vendor_profile_post(){
            $user_id = $this->post('vendor_id');
             $data = array(
          	'vendor_location' => $this->post('Address'),
          	'country' => $this->post('country'),
          	'state' => $this->post('state'),
          	'zipcode' => $this->post('zipcode'),          	
          	'short_desc' => $this->post('short_desc'),
          	'long_desc' => $this->post('long_desc'),          	
          	'loc_lat' => $this->post('loc_lat'),
          	'loc_long' => $this->post('loc_long'),
          	'phone_no' => $this->post('phone_no'),
          	'Parking' => $this->post('Parking'),
          	'website' => $this->post('website'),
          	'facebook' => $this->post('facebook'),
          	'instagram' => $this->post('instagram'),
          	'twitter' => $this->post('twitter'),
          	'pinterest' => $this->post('pinterest'),
          	'youtube' => $this->post('youtube'),
            'sun' => $this->post('sun'),
          	'mon' => $this->post('mon'),
          	'tue' => $this->post('tue'),
          	'wed' => $this->post('wed'),
          	'thu' => $this->post('thu'),
          	'fri' => $this->post('fri'),
          	'sat' => $this->post('sat'),
              );
             
            $result =  $this->deals_api_m->vendor_update_profile($user_id, $data);
	    	$this->response($result, REST_Controller::HTTP_OK);
	}
	public function change_user_password_post(){
		 $password = $this->post('pass');
         $email = $this->post('email');
		if($password != ""){
         	$this->user_m->update_pass($email ,$password);
         	$result = "Password has been changed successfully";
         } 
        $this->response($result, REST_Controller::HTTP_OK);
	}
	public function update_user_profile_post(){
         $user_id = $this->post('u_id');
     	 $data = array(
			          	'first_name' => $this->post('first_name'),
			          	'last_name' => $this->post('last_name'),
			          	 
			          	'gender' => $this->post('gender'),
			          	'profession' => $this->post('profession'),          	
			          	'state' => $this->post('state'),
			          	'city' => $this->post('city'),
			          	'country' => $this->post('country'),
			          	'zip' => $this->post('zip'),
			          	'address_1' => $this->post('address_1'),
			          	'address_2' => $this->post('address_2'),
                     );
            $result =  $this->deals_api_m->update_user_profile($user_id, $data);
	    	$this->response($result, REST_Controller::HTTP_OK);
     }

     public function get_user_profile_details_post(){
        	$user_id = $this->post('user_id');
     		$this->db->where('id', $user_id);
            $result = $this->db->get('users')->row();
            unset($result->password);
	    	$this->response($result, REST_Controller::HTTP_OK);
     }


    public function process_freelancer_payment_post(){
    	$user_id = $this->post('user_id');
		$first_name = $this->post('first_name');
		$last_name = $this->post('last_name');
		$phone_no = $this->post('phone_no');
		$freelancer_id = $this->post('freelancer_id');
		$package_id = $this->post('package_id');
		$service_id = $this->post('service_id');
		$deals_id = $this->post('deals_id');
		$states = $this->post('states');
		$city = $this->post('city');
		$address = $this->post('address');
		$pincode = $this->post('pincode');
		$date = $this->post('date');
		$date = date("yyyy-mm-dd", strtotime($date));
		$time = $this->post('time');
		$payment_mode = $this->post('payment_mode');
		$data = array('first_name' =>$first_name ,'last_name'=>$last_name ,'phone_no' =>$phone_no ,'freelancer_id'=> $freelancer_id ,'deals_package_id'=>$package_id,'deals_id'=>$deals_id ,'user_id'=>$user_id ,'service_id'=>$service_id ,'state'=>$states ,'city'=>$city ,'address_one'=>$address,'pin_code'=>$pincode,'booking_date'=>$date ,'booking_time'=>$time ,'payment_method'=>$payment_mode);
		$this->db->insert('orders', $data);
		$id = $this->db->insert_id();
		$result =  array('order_id' =>$id);
		$this->response($result, REST_Controller::HTTP_OK);

	}


	public function process_vendor_payment_post(){

		$user_id = $this->post('user_id');
		$first_name = $this->post('first_name');
		$last_name = $this->post('last_name');
		$phone_no = $this->post('phone_no');
		$vendor_id = $this->post('vendor_id');
		$package_id = $this->post('package_id');
		$service_id = $this->post('service_id');
		$deals_id = $this->post('deals_id');
		$states = $this->post('states');
		$city = $this->post('city');
		$address = $this->post('address');
		$pincode = $this->post('pincode');
		$payment_mode = $this->post('payment_mode');
		$data = array('first_name' =>$first_name ,'last_name'=>$last_name ,'phone_no' =>$phone_no ,'vendor_id'=> $vendor_id ,'user_id'=>$user_id ,'deals_package_id'=>$package_id,'deals_id'=>$deals_id ,'service_id'=>$service_id ,'state'=>$states ,'city'=>$city ,'address_one'=>$address,'pin_code'=>$pincode,'payment_method'=>$payment_mode);
		$this->db->insert('orders', $data);
		$id = $this->db->insert_id();
		$result =  array('order_id' =>$id);
		$this->response($result, REST_Controller::HTTP_OK);
	}

	public function order_status_post(){
		$order_id = $this->post('order_id');
		$order_status = $this->post('order_status');
		$data =array('order_status' =>$order_status);
		$this->db->where('order_id', $order_id);
		$result = $this->db->update('orders', $data);
		$this->response($result, REST_Controller::HTTP_OK);

	}

	public function get_time_slot_post(){

		$date = $this->post('date');
		$freelancer_id = $this->post('freelancer_id');
		$this->db->where('freelancer_id', $freelancer_id);
		$result = $this->db->get('avail_time')->row();
		$nameOfDay = date('D', strtotime($date));
		$html = array();
		if($result){
			if($nameOfDay =="Sun"){
				$avail_time = $result->sunday_avail_time;
			}elseif($nameOfDay =="Mon"){
				$avail_time = $result->monday_avail_time;
			}elseif($nameOfDay =="Tue"){
				$avail_time = $result->tuesday_avail_time;
			}elseif($nameOfDay =="Wed"){
				$avail_time = $result->wednesday_avail_time;
			}elseif($nameOfDay =="Thu"){
				$avail_time = $result->thrusday_avail_time;
			}elseif($nameOfDay =="Fri"){
				$avail_time = $result->friday_avail_time;
			}elseif($nameOfDay =="Sat"){
				$avail_time = $result->saturday_avail_time;
			}
			$avail_time = unserialize($avail_time);

			$time_slot = $result->time_slot;
			$diff = 60-$time_slot;
			$starttime = '00:00';  // your start time
			$endtime = '23:'.$diff.'';  // End time
			$duration = $time_slot ;  // split by 30 mins
			 
			$options = array ();
			$start_time    = strtotime ($starttime); //change to strtotime
			$end_time      = strtotime ($endtime); //change to strtotime
			$add_mins  = $duration * 60;
			while ($start_time <= $end_time) // loop between time
			{
			   $options[] = date ("H:i", $start_time);
			   $start_time += $add_mins; // to check endtie=me
			}
			$avail_slot = array();
			$html = array();
			foreach ($avail_time as $data) {
				# code...
				$avail_slot[] = $options[$data];
			}

			foreach ($avail_slot as $data) {
				# code...
				$html[]= $data;
			}
		}else{

			$time_slot = 30 ;
			$diff = 60-$time_slot;
			$starttime = '00:00';  // your start time
			$endtime = '23:'.$diff.'';  // End time
			$duration = $time_slot ;  // split by 30 mins
			 
			$options = array ();
			$start_time    = strtotime ($starttime); //change to strtotime
			$end_time      = strtotime ($endtime); //change to strtotime
			$add_mins  = $duration * 60;
			while ($start_time <= $end_time) // loop between time
			{
			   $options[] = date ("H:i", $start_time);
			   $start_time += $add_mins; // to check endtie=me
			}
			$html = array();
			foreach ($options as $data) {
				# code...
				$html[] = $data;
			}
			
		}
		$this->response($html, REST_Controller::HTTP_OK);
	}

	public function get_states_post(){

		$states = $this->user_m->get_us_states();
		$this->response($states, REST_Controller::HTTP_OK);
	}

	public function get_cities_post(){

		$cities = array();
		$id = $this->post('state_id');
		$this->db->where('ID_STATE', $id);
		$result = $this->db->get('US_CITIES')->result();
		foreach ($result as $data) {
			# code...
			$cities[$data->ID] = $data->CITY ;
		}

		$this->response($cities, REST_Controller::HTTP_OK);
	}


	public function get_freelancers_orders_post(){

		$freelancer_id = $this->input->post('freelancer_id');
		$date = $this->input->post('date');
		if($date){
			$date = date("yyyy-mm-dd", strtotime($date));
			$this->db->where('booking_date', $date);
		}
		$this->db->where('freelancer_id', $freelancer_id);
		$this->db->where('order_status', 'conform');
		$result = $this->db->get('orders')->result();
		$this->response($result, REST_Controller::HTTP_OK);
		
	}

	public function get_user_orders_post(){

		$user_id = $this->post('user_id');
		$date = $this->post('date');
		if($date){
			$date = date("yyyy-mm-dd", strtotime($date));
			$this->db->where('booking_date', $date);
		}
		$this->db->where('user_id', $user_id);
		$result = $this->db->get('orders')->result();
		$this->response($result, REST_Controller::HTTP_OK);

	}

		public function get_user_order_details_post(){

		$user_id = $this->post('user_id');
		$order_id = $this->post('order_id');
		$this->db->where('user_id', $user_id);
		$this->db->where('order_id', $order_id);
		$result = $this->db->get('orders')->result();
		$this->response($result, REST_Controller::HTTP_OK);

	}


	public function get_hot_deals_post(){
		$this->db->order_by('fd_id','RANDOM');
		$this->db->limit(16);
		$result =$this->db->get('freelancer_deals')->result();
		$this->response($result, REST_Controller::HTTP_OK);
	}

	public function update_lat_lang_post(){

		$freelancer_id = $this->post('freelancer_id');
		$latitude = $this->post('latitude');
		$longitude = $this->post('longitude');

		$data = array('freelancer_id' =>$freelancer_id ,'latitude'=>$latitude,'longitude'=> $longitude);

		$this->db->insert('freelancer_lat_long', $data);
		$this->response('Data updated Successfully', REST_Controller::HTTP_OK);
	}


	public function get_updated_lat_lang_post(){

		$freelancer_id = $this->input->post('freelancer_id');
		$this->db->where('freelancer_id', $freelancer_id);
		$this->db->limit(10);
		$result = $this->db->get('freelancer_lat_long')->result();
		$this->response($result, REST_Controller::HTTP_OK);
	}

	public function freelancer_status_post(){

		$online_status = $this->post('online_status');
		$freelancer_id = $this->post('freelancer_id');

		$data = array('is_it_online' =>$online_status );
		$this->db->where('freelancer_id', $freelancer_id);
		$this->db->update('freelancer_lat_long', $data);
		$this->response("freelancer status updated", REST_Controller::HTTP_OK);
	}





}


      
