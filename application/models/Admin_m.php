<?php 

class Admin_m extends MY_Model {
	protected $_table_name = 'users';
	protected $_order_by = 'user_id';
	protected $_primary_key = 'user_id';
	protected $_primary_filter = 'intval';

function __construct()
{
parent::__construct();
}

/* login form validation rule */
public  $ruels = array(
	'email' => array(
			'field' => 'email', 
			'label' => 'Email', 
			'rules' => 'trim|required|valid_email'
		), 
		'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'trim|required'
		) );
public  $ruels1 = array(
	'email' => array(
			'field' => 'email', 
			'label' => 'Email', 
			'rules' => 'trim|required|callback__unique_email'
		), 
	'first_name' => array(
			'field' => 'first_name', 
			'label' => 'First Name', 
			'rules' => 'trim|required'
		), 
	'last_name' => array(
			'field' => 'last_name', 
			'label' => 'Last Name', 
			'rules' => 'trim|required'
		),
	'password' => array(
		'field' => 'password', 
		'label' => 'Password', 
		'rules' => 'trim|matches[conf_password]|required'
	),
	'conf_password' => array(
				'field' => 'conf_password', 
				'label' => 'Confirm password', 
				'rules' => 'trim|matches[password]')

	 );
public  $ruels2 = array(
	'email' => array(
			'field' => 'email', 
			'label' => 'Email', 
			'rules' => 'trim|required|valid_email'
		), 
	'first_name' => array(
			'field' => 'first_name', 
			'label' => 'First Name', 
			'rules' => 'trim|required'
		), 
	'last_name' => array(
			'field' => 'last_name', 
			'label' => 'Last Name', 
			'rules' => 'trim|required'
		),
	'contact_no' => array(
		'field' => 'contact_no', 
		'label' => 'Contact No', 
		'rules' => 'trim|required'
	));
public $rules3 = array(
				'email' => array(
							'field' => 'email', 
							'label' => 'Email', 
							'rules' => 'trim|required|valid_email'
				)
			);
public $rules4 = array(
			'password' => array(
					'field' => 'password', 
					'label' => 'Password', 
					'rules' => 'trim|matches[confirmpass]|required'
			),
			'confirmpass' => array(
				'field' => 'confirmpass', 
				'label' => 'Confirm password', 
				'rules' => 'trim|matches[password]'
			)

		);
public function users(){
	$data = $this->get();
	return $data ;
}

public function login()
{

$user = $this->get_by(array(
			'email' => $this->input->post('email'),
			'password' => $this->hash($this->input->post('password')),
			'user_status' => 'active'
		
		), TRUE);
		if ($user) {
			// Log in user
			$data = array(
				'fname' =>$user->first_name,
				'email' => $user->email,
				'id' => $user->id,
				'user_type' => $user->user_type,
				'loggedin' => TRUE,
			);
			if($this->input->post('keep_signed_in') === 'yes'){

			}else{
				$this->config->set_item('sess_expiration', 60);
				
				}
			$this->session->set_userdata($data);

			return TRUE ;
		}
		else{
			return FALSE ;
		}
}

/* encrypted passoword generation   function */
public function hash ($string)
	{
		return hash('sha512', $string . config_item('encryption_key'));
	}
	public function loggedin ()
	{
		 if($this->session->userdata('user_type') === 'admin' ) {
			 return TRUE ;
		 }
		 else
		 {
			 return FALSE ; 
		 }
	}
	public function admin_list()
	{
			$data = array('user_type' => 'admin');
		$user = $this->get_by($data);
		return $user ;

	}
	public function get_general_seetings(){
		$result = 	$this->db->get('general_settings')->result();
		return $result ;
	}
	public function user($id = NULL)	
	{	
		if($id == NULL){
			$id = $this->uri->segment(4);
		}		
		$user = $this->get($id);
		return $user;
	}
	public function delete_user()
	{
		$id = $this->uri->segment(4);
		if($_SESSION['id'] == $id )
		{
		return FALSE ;
		}
		$this->delete($id) ;
	}
	// public function update_user ($id= NULL)
	// {
	// 	$is_employe_admin = $this->input->post('is_employe_admin');
	// 	if($is_employe_admin && !empty($is_employe_admin))
	// 	{
	// 		$is_employe_admin ="yes" ;
	// 	}
	// 	else
	// 	{
	// 		$is_employe_admin ="no" ;
	// 	}
	// 	$data = array(
	// 		'first_name' => $this->input->post('firstname'),
	// 		'last_name' => $this->input->post('lastname'),
	// 		'user_type' => $this->input->post('user_type'),
	// 		'mobile_no' => $this->input->post('phone'),
	// 		'email' => $this->input->post('email'),
	// 		'is_employe_admin' => $this->input->post('is_employe_admin')
	// 	);
	// 	if ($this->save($data, $id)) {
	// 		return TRUE ;
	// 	}
	// 	else{
	// 		return FALSE ;
	// 	}
	// }
 public function logout ()
	{

	$this->session->sess_destroy();
	
	}
public function get_notificatons(){
	return $this->db->get('notification')->result();
}

public function change_user_status($id= NULL , $status = NULL)

{

$data = array(
               'status' => $status
            );
$this->db->where('user_id', $id);
 if($this->db->update('users', $data))
 {
 	return TRUE ;

 } 
 else{
 	return FALSE ;
 }
	
}

public function update_password()
{

$id = $this->session->userdata('id');
$data = array(
'password' => $this->hash($this->input->post('password')) 
);
if ($this->save($data, $id)) {
			return TRUE ;
		}
		else{
			return FALSE ;
		}


}

public function update_email($user_id , $email)
{
$id = $user_id;

$data = array(
'email' => $email
);
if ($this->save($data, $id)) {
			return TRUE ;
		}
		else{
			return FALSE ;
		}

}

public function update_register_otp($otp , $email)
{

$data = array(
'otp' => $otp 
);
$this->db->where('email',$email);
$query =  $this->db->update('users',$data);
$user_id = $this->db->insert_id();
if($query)
{
  return $user_id ;
}
else
{
	return FALSE ;

}

}

public function get_approval_request(){

	$this->db->select('users.*,approval_request.*,manager.id manager_id , manager.first_name m_first_name ,manager.last_name m_last_name');
	$this->db->from('approval_request');
	$this->db->join('users as manager', 'approval_request.request_by = manager.id', 'left');
	$this->db->join('users', 'approval_request.user_id = users.id', 'left');
	$result = $this->db->get()->result();
	return $result;

}

public function get_user_message($id = NULL){

	$this->db->where('user_id', $id);
	return $result = $this->db->get('user_message')->result();
}

public function get_new_job_list(){

	return  $this->db->get('job_request')->result();
}

public function get_group_message($id = NULL){
	$this->db->where('group_id', $id);
	return $result = $this->db->get('group_message')->result();
}

public function update_register_otp_mobile($otp , $mobile)
{

$data = array(
'otp' => $otp 
);
$this->db->where('mobile_no',$mobile);
$query =  $this->db->update('users',$data);
$user_id = $this->db->insert_id();


if($user_id)
{
  return $user_id ;
}
else
{
	if($this->reg_mobile($otp ,$mobile))
	{

		return TRUE;
	}
	else
	{
		return FALSE ;
	}
	

}

}
public function reg_mobile($otp ,$mobile_no)
{
$user = $this->save(array(
      'user_id' => '',
      'first_name' => '',
      'last_name' => '',
      'mobile_no' => $mobile_no,
      'email' => '',
      'password' => '',
      'user_type'=>'patient',
      'status' => 'active',
      'otp'=> $otp,
      'created' => '' ,
      'modified' => '' ,
    ));
}
public function email_match()

{



$user = $this->get_by(array(
			'email' => $this->input->post('email'),
		), TRUE);

		if ($user) {

			return TRUE ;
		}
		else{

			return FALSE ;
		}

}


public function get_user_id($email = NULL)

{

$user = $this->get_by(array(
			'email' => $email,
			'user_type' => 'doctor'
		), TRUE);
		if (is_array($user) && count($user) >0) {

return $user;

		}
		else{

			return FALSE ;
		}

}

public function reset_pass_key($key , $email)
{

$data=array('token'=>$key);
$this->db->where('email',$email);
$this->db->update('users',$data);
return true ;

}

public function key_match($key)
{
	if($key != ''){
$user = $this->get_by(array(
			'token' => $key,
		), TRUE);
		if ($user) {

			return TRUE ;

		}
		else{

			return FALSE ;
		}
	}

	else
	{
		return FALSE ;
	}
}

public function reg_otp_match($key)
{
if($key != ''){
$user = $this->get_by(array(
			'otp' => $key,
		), TRUE);
		if (count($user)) {

			return TRUE ;

		}
		else{

			return FALSE ;
		}
	}

	else
	{
		return FALSE ;
	}

}

public function  get_email($key)
{

$this->db->select('email');
$this->db->where('token', $key);
$query = $this->db->get('users');
return $query->row();

}

public function update_pass($email = NULL , $password =NULL)
{
	if($password !=NULL && $email != NULL){
$data=array('token'=>'',
'password' => $this->hash($password)
);
	}else{
		$data=array('token'=>'',
'password' => $this->hash($this->input->post('password'))
);
	}

$this->db->where('email',$email);
$result = $this->db->update('users',$data);
return $result ;

}

public function update_otp($key)
{

$data=array('status'=>'active'
);
$this->db->where('otp',$key);
$this->db->update('users',$data);
return true ;

}
 
public function users_signup($file_name = NULL){
 	$password = $this->input->post('pass');
	$hash_password = $this->hash($password);
 	$email = $this->input->post('email');
 	$this->db->where('email', $email);
	$query = $this->db->get('users');
	$count = $query->num_rows();

	if($count == 0){
		if($file_name != ""){
				 $data = array(
						'first_name' => $this->input->post('fname'),
						'last_name' => $this->input->post('lname'),
						'email' => $this->input->post('email'),
						'password' => $hash_password,
						'dob' => $this->input->post('dob'),
						'user_type' => $this->input->post('user_type'),
						'user_status' => 'active',
						'profile_image' => $file_name,
						'go_to_person' =>$this->input->post('go_to_person'),
						'designation' => $this->input->post('designation'),
		 			    );
		}else{
			 $data = array(
				'first_name' => $this->input->post('fname'),
				'last_name' => $this->input->post('lname'),
				'email' => $this->input->post('email'),
				'password' => $hash_password,
				'dob' => $this->input->post('dob'),
				'user_type' => $this->input->post('user_type'),
				'user_status' => 'active',
				'go_to_person' =>$this->input->post('go_to_person'),
				'designation' => $this->input->post('designation')
  			    );
		}
 	   $result = $this->db->insert('users', $data);
 	   return  TRUE ;
	    }
	else{
		   return  False ;
 	    }  
  }
  public function get_employees_list(){
   	$this->db->where('user_type', 'employee');
  	$result = $this->db->get('users')->result();
  	return $result;
  }
  public function get_go_to_person_list(){

   	$this->db->where('go_to_person', 'yes');
  	$result = $this->db->get('users')->result();
  	return $result;
  }
  public function get_manager_list(){
  		$this->db->where('user_type', 'manager');
     	$result = $this->db->get('users')->result();
     	return $result;
  }
  public function get_user_view(){
  	$id = $this->uri->segment(3);
  	$this->db->where('id', $id);
  	$result = $this->db->get('users')->row();
  	return $result;
  }
  public function get_users_list(){


  	    $this->db->where('user_type !=', 'admin');
     	$result = $this->db->get('users')->result();
     	return $result;
  }

  public function get_all_user_list(){


  	    $this->db->where('user_type !=', 'admin');
     	$result = $this->db->get('users')->result();
     	return $result;
  }

   public function get_tag_list(){
     	$result = $this->db->get('admin_tags')->result();
     	return $result;
  }

  public function selected_group($id = NULL){
  	$this->db->select('*');
  	$this->db->from('user_groups');
  	$this->db->where('id', $id);
  	$result  = $this->db->get()->row();

  	return $result;
  }

  public function selected_users_manager_mapping($id = NULL){

  	$this->db->select('*');
  	$this->db->where('manager_id', $id);
  	$this->db->from('manager_mapping');
  	return $this->db->get()->row();

  }

  public function selected_group_tag($id = NULL){

  	$this->db->select('*');
  	$this->db->from('group_assign_tag');
  	$this->db->where('group_id', $id);
  	$result  = $this->db->get()->row();

  	return $result;
  }
   public function get_all_users_list(){
   	  $name = array();
  	  $result = $this->db->get('users')->result();
  	  foreach ($result as  $value) {
  	  	 $name[] =$value->first_name;
  	  }
  	  
      return  json_encode($name);;
  }
  public function update_user($file_name= NULL){
  	$ids = $this->input->post('ids');

   
		if($file_name != ""){
			 $data = array(
					'first_name' => $this->input->post('fname'),
					'last_name' => $this->input->post('lname'),					 
					'dob' => $this->input->post('dob'),
					'user_type' => $this->input->post('user_type'),
					'user_status' => 'active',
					'profile_image' => $file_name,
					'go_to_person' =>  $this->input->post('go_to_person'),
					'designation' => $this->input->post('designation'),
	 			    );
		}
	else{
			 $data = array(
				'first_name' => $this->input->post('fname'),
				'last_name' => $this->input->post('lname'),	
				'dob' => $this->input->post('dob'),
				'user_type' => $this->input->post('user_type'),
				'user_status' => $this->input->post('sts'),
				'go_to_person' =>  $this->input->post('go_to_person'),
				'designation' => $this->input->post('designation')
  			    );
		}
		$this->db->where('id', $ids);
 	   $result = $this->db->update('users', $data);
 	   return  TRUE ;
	   
  }
  public function time_diffrent($str_time = NULL){
 	$date1 = strtotime($str_time);  
    $date2 = strtotime(date('Y-m-d H:i:s'));  
  
			// Formulate the Difference between two dates 
			$diff = abs($date2 - $date1);  
			  
			  
			// To get the year divide the resultant date into 
			// total seconds in a year (365*60*60*24) 
			$years = floor($diff / (365*60*60*24));  
			  
			  
			// To get the month, subtract it with years and 
			// divide the resultant date into 
			// total seconds in a month (30*60*60*24) 
			$months = floor(($diff - $years * 365*60*60*24) 
			                               / (30*60*60*24));  
			  
			  
			// To get the day, subtract it with years and  
			// months and divide the resultant date into 
			// total seconds in a days (60*60*24) 
			$days = floor(($diff - $years * 365*60*60*24 -  
			             $months*30*60*60*24)/ (60*60*24)); 
			  
			  
			// To get the hour, subtract it with years,  
			// months & seconds and divide the resultant 
			// date into total seconds in a hours (60*60) 
			$hours = floor(($diff - $years * 365*60*60*24  
			       - $months*30*60*60*24 - $days*60*60*24) 
			                                   / (60*60));  
			  
			  
			// To get the minutes, subtract it with years, 
			// months, seconds and hours and divide the  
			// resultant date into total seconds i.e. 60 
			$minutes = floor(($diff - $years * 365*60*60*24  
			         - $months*30*60*60*24 - $days*60*60*24  
			                          - $hours*60*60)/ 60);  
			  
			  
			// To get the minutes, subtract it with years, 
			// months, seconds, hours and minutes  
			$seconds = floor(($diff - $years * 365*60*60*24  
			         - $months*30*60*60*24 - $days*60*60*24 
			                - $hours*60*60 - $minutes*60));  
			  
			// Print the result 
			// printf("%d y, %d mon, %d d, %d hrs, "
			//      . "%d min, %d sec", $years, $months, 
			//              $days, $hours, $minutes, $seconds);  
			printf("%d hrs,". "%d min, %d sec", $hours, $minutes, $seconds); 
			 }
    public function add_groups(){
 	 
 	$id = $this->input->post('id');
 	$gname = $this->input->post('gname');



		if($id =="")
		{
			$data = array(
				'group_name' => $this->input->post('gname'),
				'user_id' => implode(',', $this->input->post('users')),
				 
  			    );
		    $result = $this->db->insert('user_groups', $data);
	 	   return  TRUE ;
	    }else{
			$data = array(
				'group_name' => $this->input->post('gname'),
				'user_id' => implode(',', $this->input->post('users')),
				 
  			    );
			$this->db->where('id', $id);
		    $result = $this->db->update('user_groups', $data);
	 	   return  TRUE ;

	    }
		
 			 
	
  }


  public function get_notification(){

  	return $this->db->get('notification')->result();
  }

  public function get_designation(){

  	return $this->db->get('designation')->result();
  }
  public function get_group_list(){
  	   
     	$result = $this->db->get('user_groups')->result();
     	return $result;
  }
  public function group_user_list($ids=NULL){
      	$this->db->where('id', $ids);
     	$result = $this->db->get('users')->row();
     	return $result;
  }
  public function add_new_course($img = NULL){

  	
            
	             	$groups = $this->input->post('groups[]');
	             	$groups = implode(',', $groups);
	             	$tags = $this->input->post('tags[]');
	             	$tags = implode(',', $tags);
                    $data = array(
					'preview_img' => $img,
					'title' => $this->input->post('title'),	
					'groups' => $groups,
					'duration' => $this->input->post('duration'),
					'descri' => $this->input->post('descri'),
					'tags' =>$tags ,
					'category' => $this->input->post('category'),
					'course_seq_cats' =>$this->input->post('course_seq_cats')

	 			    );
                     $result = $this->db->insert('admin_course', $data);
 	                 return  TRUE ;
                 
    
      } 
     public function all_course_list(){
         $result = $this->db->get('admin_course')->result();
     	 return $result;
      }

      public function get_questions($id){

      $this->db->where('questionnaire', $id);
      return $this->db->get('questions')->result();

      }

     public function add_new_category($id = NULL){

      if($id != ""){
      	         $this->db->where('id', $id);
                 $data = array( 'category' =>  $this->input->post('cname'));
				 $result = $this->db->update('admin_category',$data);
			 	 return  TRUE ;
          }
      else{
		        $cname = $this->input->post('cname');
			 	$this->db->where('category', $cname);
				$query = $this->db->get('admin_category');
				$count = $query->num_rows();
		 		if($count == 0){
			 			 $data = array(
							'category' =>  $this->input->post('cname'),
		  	  			    );
				    $result = $this->db->insert('admin_category',$data);
			 	   return  TRUE ;
				    }
				else{
					   return  False ;
			 	    } 
		  }
	 	
       }
      public function all_category(){
          $result = $this->db->get('admin_category')->result();
     	  return $result;
      }
      public function single_category(){
      	$ids = $this->uri->segment(3);
      	$this->db->where('id', $ids);
     	$result = $this->db->get('admin_category')->row();
     	return $result;
      }

      public function get_designation_single(){

      	$ids = $this->uri->segment(3);
      	$this->db->where('id', $ids);
     	$result = $this->db->get('designation')->row();
     	return $result;

      }



       public function single_tag(){
      	$ids = $this->uri->segment(3);
      	$this->db->where('id', $ids);
     	$result = $this->db->get('admin_tags')->row();
     	return $result;
      }
      public function add_new_Tags($id = NULL){

      if($id != ""){
      	        $this->db->where('id', $id);
                 $data = array( 'tags' =>  $this->input->post('tags'));
				 $result = $this->db->update('admin_tags',$data);
			 	 return  TRUE ;
          }
      else{
		        $tags = $this->input->post('tags');
			 	$this->db->where('tags', $tags);
				$query = $this->db->get('admin_tags');
				$count = $query->num_rows();
		 		if($count == 0){
			 			 $data = array(
							'tags' =>  $this->input->post('tags'),
		  	  			    );
				    $result = $this->db->insert('admin_tags',$data);
			 	   return  TRUE ;
				    }
				else{
					   return  False ;
			 	    } 
		  }
	 	
       }
       public function all_tags(){
          $result = $this->db->get('admin_tags')->result();
     	  return $result;
      }

      public function get_new_opening(){

      	return $this->db->get('new_opening')->result();

      }
      public function get_events(){

      	return $this->db->get('events')->result();
      }
      public function single_course(){
      	$id = $this->uri->segment(3);
      	$this->db->where('id', $id);
      	$result = $this->db->get('admin_course')->row();
     	return $result ;
      }
      public function update_course_simple_info($id = NULL){
       	      $this->db->where('id', $id);
                 $data = array( 
                 	  'title' =>  $this->input->post('title09'),
                 	  'category' =>  $this->input->post('course'),
                 	  'groups' =>  implode(',',$this->input->post('groups')),
                 	  'tags' =>  implode(',',$this->input->post('tags')),
                 	  'duration' =>  $this->input->post('duration'),
                 	  'descri' =>  $this->input->post('descri'),
                 	  'start_date' =>  $this->input->post('start_time'),
                 	  'course_seq_cats' => $this->input->post('course_seq_cats'),
                 	  'end_date' =>  $this->input->post('end_time'),
                 	   );
				 $result = $this->db->update('admin_course',$data);
			 	 return  TRUE ;
      }
     public function submit_lesson($imgs=NULL ,$video =NULL) {
	    $title = $this->input->post('title');
	 	$this->db->where('title', $title);
		$query = $this->db->get('admin_lesson');
		$count = $query->num_rows();

	if($count == 0){
                $data = array( 
		                 	  'title' =>  $this->input->post('title'),
		                 	  'video' =>  $video,
		                 	  'img' => $imgs,
		                 	  'subscript' =>$this->input->post('subscript'),
		                 	  'course_duration' => $this->input->post('course_duration'),
		                 	  'course_id' => $this->input->post('id')
		                 	  );
				 $result = $this->db->insert('admin_lesson',$data);
			 	 return  TRUE ;
      } else{ return  FALSE; }
      }
     public function list_lesson($single_id = NULL){
     	  $this->db->where('course_id', $single_id);
     	  $result = $this->db->get('admin_lesson')->result();
     	  return $result;
     } 
	 public function course_select_lesson(){
	       	$course_id = $this->input->post('course_id');
	       	$this->db->where('id', $course_id);
	       	$lesson = $this->input->post('lesson');

	       	$lesson = implode(',', 	$lesson);
            $data = array( 
		                  'lesson_id' =>  $lesson,
 		                 );
		   $result = $this->db->update('admin_course',$data);
		  if($result){  return TRUE; } else{ return FALSE; }
	  } 
	 public function selected_lesson(){
	 	$array = array();
        $id = $this->uri->segment(3);
        $this->db->where('id', $id);
        $result = $this->db->get('admin_course')->row();
        $lession = $result->lesson_id;
        $current_id = explode(',', $lession);
         
        foreach ($current_id as  $value) {
        	
        	//$array[] = $value;
        	$this->db->where('id', $value);
        	$array[] = $this->db->get('admin_lesson')->row();

        }
        return $array;
	 }
	 public function admin_view_lesson(){
	 	$id = $this->uri->segment(3);
	 	$this->db->where('id', $id);
        $result = $this->db->get('admin_lesson')->row();
         return $result;
	 }
  public function edit_lesson($imgs=NULL ,$video =NULL) {
	    $id = $this->input->post('id'); 
	if($imgs == "" && $video == ""){
                $data = array( 
		                 	  'title' =>  $this->input->post('title'),
		                 	 
		                 	  'subscript' =>$this->input->post('descri'),
		                 	  'course_duration' => $this->input->post('duration'),
		                 	 
		                 	  );
				
      }
      elseif ($imgs == "" && $video != "") {
            $data = array( 
		                 	  'title' =>  $this->input->post('title'),
		                 	  'video' =>  $video,
		                 	 
		                 	  'subscript' =>$this->input->post('descri'),
		                 	  'course_duration' => $this->input->post('duration'),
		                 	 
		                 	  );
      } 
       elseif ($imgs != "" && $video != "") {
            $data = array( 
		                 	  'title' =>  $this->input->post('title'),
		                 	  'video' =>  $video,
		                 	  'img' => $imgs,
		                 	  'subscript' =>$this->input->post('descri'),
		                 	  'course_duration' => $this->input->post('duration'),
		                 	 
		                 	  );
      } 
       elseif ($imgs != "" && $video == "") {
            $data = array( 
		                 	  'title' =>  $this->input->post('title'),
		                 	  
		                 	  'img' => $imgs,
		                 	  'subscript' =>$this->input->post('descri'),
		                 	  'course_duration' => $this->input->post('duration'),
		                 	 
		                 	  );
      } 
       $this->db->where('id', $id);
       $result = $this->db->update('admin_lesson',$data);
			 	 return  TRUE ;
      }
   }

/* admin login function */


 ?>