<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->helper('string');
		$this->load->model('admin_m');
        $this->load->library('user_agent');
        $this->data['all_category'] = $this->admin_m->all_category();
        $this->data['designation'] = $this->admin_m->get_designation();
		
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function login(){
         
		if( $this->admin_m->loggedin() == FALSE || redirect('admin'));
        $ruels = $this->admin_m->ruels;
      $this->form_validation->set_rules($ruels);
        if ($this->form_validation->run() == TRUE) {
        	     
        	if($this->admin_m->login() == TRUE)
        	{	
        	    $this->session->set_flashdata('success', 'Login Success');
        		  $user_type= $this->session->userdata('user_type');
              if($user_type =="manager"){
               echo  site_url('employee/manager_dashboard');
              }else{
                echo site_url($user_type);
              }
                
        	}
        	else{
	              echo("error");
        	}
        }else{

          redirect('','refresh');
        }
 	}

	public function hash(){
 		$this->load->model('admin_m');
		echo $this->admin_m->hash('pslmp@2020');
	}

	public function logout(){
		$this->load->admin_m->logout();
		 redirect('','refresh');
	}

	public function reset_password(){

		$key = $this->input->post('key');
 		if($key == '')
 		{
 		 
 		 $key = $this->input->get('key');
 		}
 		  $ruels = $this->admin_m->rules4;
      $this->form_validation->set_rules($ruels);

        if ($this->form_validation->run() == TRUE) {
        	if($this->admin_m->key_match($key))
        	{	
        			  $email_addr = $this->admin_m->get_email($key) ;
        			  $email = $email_addr->email ;
        			if($this->admin_m->update_pass($email)){

				$this->email->from('info@zytrio.com', 'Zytrio');
					$this->email->to($email);
					$this->email->subject('Reset Password');
					$this->email->message('Your Password reset sucessfully');
					$this->email->send();
         			}
         		$this->session->set_flashdata('success', 'Your password updated sucessfully');
        		//redirect('admin/reset_password','refresh');
        	}
        	else{
        		$this->session->set_flashdata('error', 'reset password key mismatch ');
        	//redirect('admin/reset_password','refresh');
        	}
        } 
		$this->load->view('reset_pass');
	}

	public function forget_password(){

		 $ruels = $this->admin_m->rules3;
	    $this->form_validation->set_rules($ruels);
	    if ($this->form_validation->run() == TRUE) {
	    	if($this->admin_m->email_match() == TRUE)
	    	{	

	    			$id = random_string('alnum', 16) ;
	    			$url = site_url('admin/reset_password?key='.$id.'');
	    			  $email = $this->input->post('email') ;
	    	if($this->admin_m->reset_pass_key($id , $email)){
				$this->email->from('info@zytrio.com', 'Zytrio');
					$this->email->to($email);
					$this->email->subject('Reset Password');
					$this->email->message('Your Password reset url: '.$url.'');
					$this->email->send();

	    			}

					
	    		$this->session->set_flashdata('success', 'Your password reset link send to  your email address');
	    		// redirect('admin/forget_password','refresh');
	    	}
	    	else{
	    		$this->session->set_flashdata('error', 'No any account associated with this email');
	    	// redirect('admin/forget_password','refresh');
	    	}
	    } 


		$this->load->view('forget_pass');
	}

public function _unique_email ($str)
	{
		//retreving user email information from the User Table
		$this->db->where('email', $this->input->post('email'));
		$user = $this->admin_m->get();
		//checking wether  eamil addresss existing or not and return the value true or false 
		if (count($user)>=1) {

			$this->form_validation->set_message('_unique_email', '%s should be unique');
			return FALSE;
		}
 		return TRUE;
	}
public function admin_employee_list(){
  $this->data['user_type'] = 'Employee';
	$this->data['users'] = $this->admin_m->get_employees_list();
	$this->load->view('admin-user-list', $this->data);
}

public function admin_manager_list(){
 $this->data['user_type'] = 'Manager';
    $this->data['users'] = $this->admin_m->get_manager_list();
  
  $this->load->view('admin-user-list', $this->data);
}

public   function go_to_person(){
$this->data['user_type'] = 'Go to Person';
   $this->data['users'] = $this->admin_m->get_go_to_person_list();
  
  $this->load->view('admin-user-list', $this->data);
}

public function change_user_status(){

  $status = $this->uri->segment(3);
  $id = $this->uri->segment(4);
  $data = array('user_status' => $status);
  $this->db->where('id',$id);
  $this->db->update('users', $data);
}

public function send_user_message(){

  if($this->input->post('id')){

    $id = $this->input->post('id');
    $message = $this->input->post('message');
    $data = array('message' => $message,'user_id'=>$id);
    $this->db->insert('user_message', $data);
    
    redirect('admin/send_user_message/'.$id.'','refresh');

  }
  $id = $this->uri->segment(3);
  $this->data['message'] = $this->admin_m->get_user_message($id);
   $this->load->view('send_user_message',$this->data);
}


public function send_group_message(){

  if($this->input->post('id')){

    $id = $this->input->post('id');
    $message = $this->input->post('message');
    $data = array('message' => $message,'group_id'=>$id);
    $this->db->insert('group_message', $data);
    
    redirect('admin/send_group_message/'.$id.'','refresh');

  }
  $id = $this->uri->segment(3);
  $this->data['message'] = $this->admin_m->get_group_message($id);
   $this->load->view('send_group_message',$this->data);
}


public function delte_user_message(){
    $id =  $this->uri->segment(3);
    $user_id = $this->uri->segment(4);
    $this->db->where('id', $id);
    $this->db->delete('user_message');
    redirect('admin/send_user_message/'.$user_id.'','refresh');
}



public function delte_group_message(){
    $id =  $this->uri->segment(3);
    $user_id = $this->uri->segment(4);
    $this->db->where('id', $id);
    $this->db->delete('group_message');
    redirect('admin/send_group_message/'.$user_id.'','refresh');
}

public function admin_user_form(){
	 
	$this->load->view('admin-user-add-new' ,$this->data);
}

public function mapping_employee(){
   $id  = $this->uri->segment(3);
  $this->data['selected_user'] =  $this->admin_m->selected_users_manager_mapping($id);
  if($this->data['selected_user']){
    $users = explode(',', $this->data['selected_user']->users);
  }else{
    $users = array();
  }
   $this->data['users'] = $users ;
   $this->data['get_users_list'] = $this->admin_m->get_users_list();
     $this->load->view('manager-mapping-form', $this->data);
}

public function admin_add_new_user(){
	            $config['upload_path']  = './admin-assets/images/all-users/';
                $config['allowed_types']   = 'gif|jpg|png|jpeg';
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('photo'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('upload_form', $error);
                    if($this->admin_m->users_signup() == TRUE){
                      $this->session->set_flashdata('success' , 'Successfully Added');
                      redirect('admin/admin_user_form','refresh');
                    } else{
                        $this->session->set_flashdata('error' , 'Something going wrong');
                        redirect('admin/admin_user_form','refresh');
                    }
 	                }
	                else
	                {
                    $data =  $this->upload->data();
                    $file_name = $data["file_name"];
                     if($this->admin_m->users_signup($file_name) == TRUE){
                      $this->session->set_flashdata('success' , 'Successfully Added');
                      redirect('admin/admin_user_form','refresh');
                    } else{
                    	  $this->session->set_flashdata('error', 'Something going wrong Or Email id already exist');
                    	  redirect('admin/admin_user_form','refresh');
                    }
                }
     //redirect('admin/admin_user_list','refresh'); 
 } 
 public function view_user(){
      
     $this->data['get_single_user'] = $this->admin_m->get_user_view();
     $this->load->view('view_user', $this->data);
 }

 public function edit_manager_mapping(){

    $id = $this->input->post('id');
    $users = $this->input->post('users[]');
    $users = implode(',', $users);

 $this->db->where('manager_id', $id);
    $result = $this->db->get('manager_mapping')->result();

    if(count($result) > 0 ){
      $data= array('users'=>$users);
      $this->db->where('manager_id', $id);
      $this->db->update('manager_mapping', $data);

    }else{

      $data = array('users'=>$users,'manager_id'=> $id);

      $this->db->insert('manager_mapping', $data);
    }

    redirect('admin/mapping_employee/'.$id.'','refresh');
 }
 public function update_user(){
               if($_FILES["photo"]['name'] != ""){
                
                $config['upload_path']  = './admin-assets/images/all-users/';
                $config['allowed_types']   = 'gif|jpg|png';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('photo'))
                {
                   $data =  $this->upload->data();
                    $file_name = $data["file_name"];
                     if($this->admin_m->update_user($file_name) == TRUE){
                      $this->session->set_flashdata('success' , 'Successfully Updated');
                       $urlss = $this->agent->referrer();
                    	  redirect($urlss,'refresh');
                        
                    } else{
                    	  $this->session->set_flashdata('error', 'Something going wrong Or Email id already exist');
                    	  $urlss = $this->agent->referrer();
                    	  redirect($urlss,'refresh');
                    } 
 	            }
	       else {
                   $error = array('error' => $this->upload->display_errors());
                    $this->load->view('upload_form', $error);
                    if($this->admin_m->update_user() == TRUE){
                      $this->session->set_flashdata('success' , 'Successfully Updated');
                     $urlss = $this->agent->referrer();
                    	  redirect($urlss,'refresh');
                    } else{
                        $this->session->set_flashdata('error' , 'Something going wrong');
                        $urlss = $this->agent->referrer();
                        redirect($urlss,'refresh');
                    }
                }
               } else{
               	 
                    if($this->admin_m->update_user() == TRUE){
                      $this->session->set_flashdata('success' , 'Successfully Updated');
                     $urlss = $this->agent->referrer();
                    	  
                    	  redirect($urlss,'refresh');
                    } else{
                        $this->session->set_flashdata('error' , 'Something going wrong');
                        $urlss = $this->agent->referrer();
                        redirect($urlss,'refresh');
                    }
               }
                
 } 
 public function get_all_users_list(){
 	 $result = $this->admin_m->get_all_users_list();
 	 header('Content-Type: application/x-json; charset=utf-8');
	 echo(json_encode($result));
   }
 public function groups_list(){
 	 $this->data['get_group_list'] = $this->admin_m->get_group_list();

     $this->load->view('admin-group-list', $this->data);

   }
 public function groups_form(){

  $id  = $this->uri->segment(3);
  $this->data['selected_user'] =  $this->admin_m->selected_group($id);
  if($this->data['selected_user']){
    $users = explode(',', $this->data['selected_user']->user_id);
  }else{
    $users = array();
  }
   $this->data['users'] = $users ;
 	 $this->data['get_users_list'] = $this->admin_m->get_all_user_list();
     $this->load->view('groups', $this->data);

   }

   public function groups_tag_form(){

  $id  = $this->uri->segment(3);
  $this->data['selected_group_tag'] =  $this->admin_m->selected_group_tag($id);
  if($this->data['selected_group_tag']){
    $tags = explode(',', $this->data['selected_group_tag']->tags);
  }else{
    $tags = array();
  }
   $this->data['tags'] = $tags ;
   $this->data['get_tag_list'] = $this->admin_m->get_tag_list();
     $this->load->view('group-tag', $this->data);

   }

   public function update_groups_tag(){
    $id = $this->input->post('id');

   $tags =  $this->input->post('tags[]');

   $tags = implode(',', $tags) ;

   $data = array('tags'=> $tags);

   $this->db->where('group_id', $id);
  $result =  $this->db->get('group_assign_tag')->result();
  if(count($result) > 0 ){

    $this->db->where('group_id', $id);
    $this->db->update('group_assign_tag', $data);



  }else{

    $data = array('group_id'=>$id , 'tags'=>$tags);
    $this->db->insert('group_assign_tag', $data);
  }

  redirect('admin/groups_tag_form/'.$id.'','refresh');

   }
 public function add_groups(){
                     
                     $id = $this->input->post('id');
                     if($this->admin_m->add_groups() == TRUE){
                      $this->session->set_flashdata('success' , 'Successfully Added');
                      if($id){
                        redirect('admin/groups_form/'.$id.'','refresh');
                      }else{
                        redirect('admin/groups_form','refresh');
                      }
                      
                    } else{
                    	  $this->session->set_flashdata('error', 'Something going wrong Or Group name Already exist');
                    	  if($id){
                        redirect('admin/groups_form/'.$id.'','refresh');
                      }else{
                        redirect('admin/groups_form','refresh');
                      }
                    }
                
     //redirect('admin/admin_user_list','refresh'); 
 } 
 public function add_new_course_form(){
   $this->data['groups'] = $this->admin_m->get_group_list();
   $this->data['all_tags'] = $this->admin_m->all_tags();
   $this->data['all_category'] = $this->admin_m->all_category();
  $this->load->view('admin-add-new-course',$this->data);
 }
 public function add_new_course(){
   $this->data['all_tags'] = $this->admin_m->all_tags();
   $this->data['all_category'] = $this->admin_m->all_category();
	              $config['upload_path']  = './admin-assets/images/course/';
                $config['allowed_types']   = 'gif|jpg|png';
                $this->load->library('upload', $config);
                
                if (!$this->upload->do_upload('images'))
                {
                	 if($this->admin_m->add_new_course() == FALSE){		                    
		                      $this->session->set_flashdata('error', 'Something going wrong ');
		                      redirect('admin/add_new_course_form','refresh');
		                }
                     
                }
	     else
	             {
                  $data1 =  $this->upload->data();
                  $file_name1 = $data1["file_name"];
 		         if($this->admin_m->add_new_course( $file_name1) == TRUE){
		                    $this->session->set_flashdata('success' , 'Successfully Added');
		                    redirect('admin/add_new_course_form','refresh');
		           } 
		       else{
		               $this->session->set_flashdata('error', 'Something going wrong ');
		               redirect('admin/add_new_course_form','refresh');
		            }

          }

               
     //redirect('admin/admin_user_list','refresh'); 
 } 
    public function admin_view_course(){
    	$this->data['all_course_list'] = $this->admin_m->all_course_list();
        $this->load->view('admin-view-course',$this->data);
    }

    public function admin_edit_course(){
  $this->data['groups'] = $this->admin_m->get_group_list();
   $this->data['all_tags'] = $this->admin_m->all_tags();
   $this->data['all_category'] = $this->admin_m->all_category();
        $this->data['single_course'] = $this->admin_m->single_course();
         

        $this->data['list_lesson'] = $this->admin_m->list_lesson($this->uri->segment(3));
        // $this->data['selected_lesson'] = $this->admin_m->selected_lesson();
        $this->load->view('admin-edit-course',$this->data);
    }
    public function delete_course(){
    	$id = $this->uri->segment(3);
    	$this->db->where('id', $id);
    	$this->db->delete('admin_course');
    	redirect('admin/admin_view_course','refresh');
    } 
    public function view_all_category(){
        $this->data['all_category'] = $this->admin_m->all_category();
        $this->load->view('admin-view-category',$this->data);
    }

    public function designation(){

      $this->data['designation'] =  $this->admin_m->get_designation();

      $this->load->view('designation', $this->data);
    }

    public function delete_designation(){

      $id  = $this->uri->segment(3);
      $this->db->where('id', $id);
      $this->db->delete('designation');
      redirect('admin/designation','refresh');
    }

    public function admin_designation_form()
    {

        if($this->uri->segment(3) != ""){
            $this->data['designation'] = $this->admin_m->get_designation_single();
        }else{
            $this->data['designation'] = "";
        }
        $this->load->view('admin-add-designation',$this->data);


    }


    public function delete_Notification(){

        $id  = $this->uri->segment(3);
      $this->db->where('id', $id);
      $this->db->delete('designation');
      redirect('admin/admin_engine_add_notification','refresh');

    }


    public function admin_category_form(){
        if($this->uri->segment(3) != ""){
            $this->data['single_category'] = $this->admin_m->single_category();
        }else{
            $this->data['single_category'] = "";
        }
        $this->load->view('admin-add-category',$this->data);
    }

    public function add_new_designation(){

     $id = $this->input->post('ids');
     $designation_name = $this->input->post('designation_name');
     if($id == ""){
      $data = array('designation_name' => $designation_name);
      $this->db->insert('designation', $data);
     }
     else{
      $data = array('designation_name' => $designation_name);
      $this->db->where('id', $id);
      $this->db->update('designation', $data);
     }
     $this->session->set_flashdata('success' , 'Successfully Added');



     redirect('admin/designation','refresh');

    }
    public function add_new_category(){
        $id = $this->input->post('ids');
        if($id != ""){
        if($this->admin_m->add_new_category($id) == TRUE){
               $this->session->set_flashdata('success' , 'Successfully Added');
               redirect('admin/admin_category_form','refresh');
            } 
        else{
                $this->session->set_flashdata('error', 'Something going wrong Or category name already exist');
                redirect('admin/admin_category_form','refresh');
           }
       }else{
          if($this->admin_m->add_new_category() == TRUE){
               $this->session->set_flashdata('success' , 'Successfully Added');
               redirect('admin/admin_category_form','refresh');
            } 
         else{
                $this->session->set_flashdata('error', 'Something going wrong Or category name already exist');
                redirect('admin/admin_category_form','refresh');
           }
       }
    }
    public function delete_category(){
        $id = $this->uri->segment(3);
        $this->db->where('id', $id);
        
         if($this->db->delete('admin_category')){
               $this->session->set_flashdata('success' , 'Successfully Deleted');
               redirect('admin/view_all_category','refresh');
            } 
        else{
                $this->session->set_flashdata('error', 'Something going wrong');
                redirect('admin/view_all_category','refresh');
           }
        
    } 
   
    public function view_all_tags(){
        $this->data['all_tags'] = $this->admin_m->all_tags();
        $this->load->view('admin-view-tags',$this->data);
    }
     public function admin_tag_form(){
        if($this->uri->segment(3) != ""){
            $this->data['single_tag'] = $this->admin_m->single_tag();
        }else{
            $this->data['single_tag'] = "";
        }
        $this->load->view('admin-add-tags',$this->data);
    }
     public function add_new_Tags(){
        $id = $this->input->post('ids');
        if($id != ""){
        if($this->admin_m->add_new_Tags($id) == TRUE){
               $this->session->set_flashdata('success' , 'Successfully Added');
               redirect('admin/admin_tag_form','refresh');
            } 
        else{
                $this->session->set_flashdata('error', 'Something going wrong Or Tag name already exist');
                redirect('admin/admin_tag_form','refresh');
           }
       }else{
          if($this->admin_m->add_new_Tags() == TRUE){
               $this->session->set_flashdata('success' , 'Successfully Added');
               redirect('admin/admin_tag_form','refresh');
            } 
         else{
                $this->session->set_flashdata('error', 'Something going wrong Or Tag name already exist');
                redirect('admin/admin_tag_form','refresh');
           }
       }
    }
   public function delete_tag(){
        $id = $this->uri->segment(3);
        $this->db->where('id', $id);
        
         if($this->db->delete('admin_tags')){
               $this->session->set_flashdata('success' , 'Successfully Deleted');
               redirect('admin/view_all_tags','refresh');
            } 
        else{
                $this->session->set_flashdata('error', 'Something going wrong');
                redirect('admin/view_all_tags','refresh');
           }
     } 
   public function update_course_simple_info(){
          $id = $this->input->post('ids');
        if($this->admin_m->update_course_simple_info($id) == TRUE){
               $this->session->set_flashdata('success' , 'Successfully Updated');
               $urlss = $this->agent->referrer();
               redirect($urlss,'refresh');
            } 
        else{
               $this->session->set_flashdata('error', 'Something going wrong');
               $urlss = $this->agent->referrer();
               redirect($urlss,'refresh');
           }
   }
  public function submit_lesson(){
                
                $config['upload_path']  = './admin-assets/images/course/';
                $config['allowed_types']   = 'gif|jpg|png|mp4|m4a|f4v|flv';
                $this->load->library('upload', $config);
                
                if (!$this->upload->do_upload('photo'))
                {
          
                    $file_name1 ="";
                 }
            else   
               {
                 $data1 =  $this->upload->data();
                   
                    $file_name1 = $data1["file_name"];
               }
             
               if (!$this->upload->do_upload('course_video'))
                {
          
                    $file_name2 ="";
                  
                 }
            else   
               {
                 $data2 =  $this->upload->data();
                   
                    $file_name2 = $data2["file_name"];
               }
                 
             if($this->admin_m->submit_lesson( $file_name1 ,$file_name2) == TRUE){
                   $this->session->set_flashdata('success' , 'Successfully Added');
                   $urlss = $this->agent->referrer();
                   redirect($urlss,'refresh');
               } 
           else{
                   $this->session->set_flashdata('error', 'Something going wrong Or Lesson already exist');
                   $urlss = $this->agent->referrer();
                   redirect($urlss,'refresh');
                }
           
    } 
  public function course_select_lesson(){

        if($this->admin_m->course_select_lesson() == TRUE){
               $this->session->set_flashdata('success' , 'Successfully Submited');
               $urlss = $this->agent->referrer();
               redirect($urlss,'refresh');
            } 
        else{
               $this->session->set_flashdata('error', 'Something going wrong');
               $urlss = $this->agent->referrer();
               redirect($urlss,'refresh');
           }
  }
 public function admin_approval(){

    $this->data['approval_request'] = $this->admin_m->get_approval_request() ;
     $this->load->view('admin-approval',$this->data);

 }
 public function admin_view_lesson(){

     $this->data['view_lesson'] = $this->admin_m->admin_view_lesson(); 
   //  var_dump($this->data); exit();
     $this->load->view('admin-edit-lesson', $this->data);

 }

 public function change_app_stauts(){

  $status = $this->uri->segment(3);
   $id = $this->uri->segment(4);
  
  $data  = array('status' => $status);
  $this->db->where('ap_id', $id);
  $this->db->update('approval_request', $data);
  redirect('admin/admin_approval','refresh');
 }
 public function admin_create_question(){
$id = $this->uri->segment(3);
  if($id){
    $this->db->where('id', $id);
$questionnaire = $this->db->get('questionnaire')->row();

  }
  else{
$questionnaire =  (object) array('id' => '','title'=>'' ,'description'=>'' ,'module'=>'' ,'show_after' =>'');
  }

  $this->data['questionnaire'] = $questionnaire ;

$this->data['all_course_list'] = $this->admin_m->all_course_list();
$this->data['questions'] = $this->admin_m->get_questions($id);
     $this->load->view('admin-create-question' ,$this->data);
 }

 public function create_survey(){



 }

 public function list_survey(){


 }

 public function list_questionnaire(){

  $this->data['questionnaire']= $this->db->get('questionnaire')->result(); 

  $this->load->view('list-questionnaire', $this->data);
 }

 public function delete_questionnaire(){

 $id =  $this->uri->segment(3);
 $this->db->where('id', $id);
 $this->db->delete('questionnaire');

 redirect('admin/list_questionnaire','refresh');
 }

 public function add_questionnaire(){

  $id =  $this->input->post('id');
  $description = $this->input->post('description');  
  $module  =  $this->input->post('module');
  $selected_lesson =  $this->input->post('selected_lesson');
  $title =  $this->input->post('title');
 $data = array('title' =>$title ,'description'=> $description ,'module'=>$module,'show_after'=> $selected_lesson);
  if(!$id){
    $this->db->insert('questionnaire', $data);
     $id  = $this->db->insert_id();
    redirect('admin/admin_create_question/'.$id.'','refresh');

  }else{
    $this->db->where('id', $id);
    $this->db->update('questionnaire', $data);

     redirect('admin/admin_create_question/'.$id.'','refresh');
  }


 }

 public function get_course(){
  $course_id =  $this->input->post('course_id');

  $this->db->where('course_id', $course_id);
  $result = $this->db->get('admin_lesson')->result();

  if(count($result) > 0){

    foreach ($result as $data) {
      # code...

      echo '<option value="'.$data->id.'">'.$data->title.'</option>';
    }

  }
  else{

    echo '<option selected value="after_end">Completing selected module</option>';
  }

 }
 public function admin_report_user_activity(){
     $this->load->view('admin-report-user-activity');
 }
 public function admin_report_manager_mapping(){
     $this->load->view('admin-report-manager-mapping');
 }
 public function admin_report_course_statistics(){
     $this->load->view('admin-report-course-statistics');
 }
 public function admin_report_survey_statistics(){
     $this->load->view('admin-report-survey-statistics');
 }
 public function admin_engine_add_notification(){


$this->data['notification'] = $this->admin_m->get_notification();
  $this->data['groups'] = $this->admin_m->get_group_list();
     $this->load->view('admin-engine-add-notification',$this->data);
 }

 public function add_new_notification(){

  $config['upload_path']  = './admin-assets/images/';
    $config['allowed_types']   = 'gif|jpg|png';
    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('document'))
      {
         $file_name = '';
        $this->session->set_flashdata('error', 'Something going wrong ');

      }else{
        $data1 =  $this->upload->data();
        $file_name = $data1["file_name"];
      }  
      $subject = $this->input->post('subject');
      $groups = $this->input->post('groups[]');

      $groups = implode(',', $groups);
      $information  = $this->input->post('information');

      $data  = array('information'=>$information ,'groups'=> $groups,'subject' =>$subject ,'file'=>$file_name);

      $this->db->insert('notification', $data);
      redirect('admin/admin_engine_add_notification','refresh');
 }

 public function new_job_request(){

  $this->data['new_jobs'] = $this->admin_m->get_new_job_list()  ;

  $this->load->view('admin-new-job-request',$this->data);

 }


 public function delete_job_request(){

  $id  = $this->uri->segment(3);
  $this->db->where('id', $id);
  $this->db->delete('job_request');
  redirect('admin/new_job_request','refresh');
 }
 public function admin_engine_add_event(){

    $this->data['events'] =  $this->admin_m->get_events();
     $this->load->view('admin-engine-add-event', $this->data);

 }
 public function add_event(){
  $config['upload_path']  = './admin-assets/images/';
    $config['allowed_types']   = 'gif|jpg|png';
    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('images'))
      {
         $file_name = '';
        $this->session->set_flashdata('error', 'Something going wrong ');

      }else{
        $data1 =  $this->upload->data();
        $file_name = $data1["file_name"];
      }
      $event_title = $this->input->post('event_title');
      $category = $this->input->post('category');
      $event_date = $this->input->post('event_date');
      $event_time = $this->input->post('event_time');
      $location = $this->input->post('location');
      $description = $this->input->post('description');

      $data =array('event_title' => $event_title ,'category' => $category ,'event_date' => $event_date ,'event_time' => $event_time ,'location'=>$location, 'description'=> $description,'images'=>$file_name);

      $this->db->insert('events', $data);
      $this->session->set_flashdata('success', 'New Event added successfully');

      redirect('admin/admin_engine_add_event','refresh');
 }

 public function delete_event(){
  $id = $this->uri->segment(3);
  $this->db->where('id', $id);
  $this->db->delete('events');
  redirect('admin/admin_engine_add_event','refresh');
 }
 public function admin_engine_add_job_opening(){

  $this->data['new_opening'] = $this->admin_m->get_new_opening();
     $this->load->view('admin-engine-add-job-opening',$this->data);
 }

 public function add_job_opening(){

    $config['upload_path']  = './admin-assets/images/';
    $config['allowed_types']   = 'gif|jpg|png';
    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('document'))
      {

         echo $this->upload->display_errors();
         $file_name = '';
        $this->session->set_flashdata('error', 'Something going wrong ');

      }else{
        $data1 =  $this->upload->data();
        $file_name = $data1["file_name"];
      }
      $title = $this->input->post('title');
      $category = $this->input->post('category');
      $experience = $this->input->post('experience');
      $skill = $this->input->post('skill');
      $description = $this->input->post('description');

      $data =array('title' => $title ,'category' => $category ,'experience' => $experience ,'skill' => $skill ,'description'=>$description, 'images'=>$file_name);

      $this->db->insert('new_opening', $data);
      $this->session->set_flashdata('success', 'New Job added successfully');

      redirect('admin/admin_engine_add_job_opening','refresh');

 }

 public function delete_new_job_opening(){

    $id = $this->uri->segment(3);
    $this->db->where('id', $id);
    $this->db->delete('new_opening');
    redirect('admin/admin_engine_add_job_opening','refresh');
 }


 public function add_questions(){

  $id = $this->input->post('id');
  $questionnaire =  $this->input->post('questionnaire');
  $question =$this->input->post('questions');
  $option_one =$this->input->post('option_one');
  $option_two =$this->input->post('option_two');
  $option_three =$this->input->post('option_three');
  $option_four =$this->input->post('option_four');
  $answer = $this->input->post('answer');
  $data = array('questions' => $question ,'option_one' =>$option_one ,'option_two'=> $option_two ,'questionnaire' => $questionnaire ,'option_three' => $option_three ,'option_four' => $option_four ,'answer' => $answer);

  if(!$id){

    $this->db->insert('questions', $data);

  }else{
    $this->db->where('id', $id);
    $this->db->update('questions', $data);
  }

  redirect('admin/admin_create_question/'.$questionnaire.'','refresh');

 }
  public function edit_lesson(){
                
                $config['upload_path']  = './admin-assets/images/course/';
                $config['allowed_types']   = 'gif|jpg|png|mp4|m4a|f4v|flv';
                $this->load->library('upload', $config);
                
                if (!$this->upload->do_upload('photo'))
                {
          
                    $file_name1 ="";
                 }
            else   
               {
                 $data1 =  $this->upload->data();
                   
                    $file_name1 = $data1["file_name"];
               }
             
               if (!$this->upload->do_upload('course_video'))
                {
          
                    $file_name2 ="";
                  
                 }
            else   
               {
                 $data2 =  $this->upload->data();
                   
                    $file_name2 = $data2["file_name"];
               }
                 
             if($this->admin_m->edit_lesson( $file_name1 ,$file_name2) == TRUE){
                   $this->session->set_flashdata('success' , 'Successfully Added');
                   $urlss = $this->agent->referrer();
                   redirect($urlss,'refresh');
               } 
           else{
                   $this->session->set_flashdata('error', 'Something going wrong Or Lesson already exist');
                   $urlss = $this->agent->referrer();
                   redirect($urlss,'refresh');
                }
           
    } 

}

/* End of file Admin.php */
/* Location: ./application/modules/Admin/controllers/Admin.php */
 