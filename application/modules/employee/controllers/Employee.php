<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends Employee_Controller {
   public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->helper('string');
		$this->load->model('employee_m');
        $this->load->library('user_agent');
        $this->get_course_associated_with_current_user();
        $this->data['p_info'] =  $this->get_p_info();

	}

	public function get_p_info(){

		$id = $this->session->userdata('id');
		$this->db->where('id', $id);
		return $this->db->get('users')->row();
	}
	public function index()
	{
		$this->data['users']= $this->get_all_users();
		$this->data['rewards'] = $this->get_rewards();
		$this->data['quiz_details'] = $this->get_quiz_details();
		$this->load->view('employe-dashboard',$this->data);
	}
    public function update_skip_quest(){

		$course_id = $this->input->post('course_id');

		$this->db->where('module', $course_id);
		$ques = $this->db->get('questionnaire')->row()->id;
		$user_id = $this->session->userdata('id');
		$data  = array('questionnaire_id' =>$ques ,'user_id'=>$user_id );
		$this->db->insert('skip_questionarie', $data);
	}
	public function get_assigned_user_to_manger(){

		$user_type = $this->session->userdata('user_type');
		$id  = $this->session->userdata('id');
		$users  = array();
		if($user_type=="manager"){
			$this->db->where('manager_id', $id);
			$result = $this->db->get('manager_mapping')->row();
			if($result){
			   $users = explode(',', $result->users); 
			}else{
			    
			    $users = array();
			}
			
		}



		return $users ;
	}

	public function get_course_associated_with_current_user($id =NULL){
		if($id == NULL){
			$id = $this->session->userdata('id');
		}
		$group =  $this->employee_m->get_assigned_group($id);
		$course_id =  $this->employee_m->get_assigned_course($group);

	 $this->data['course_ass'] = $this->employee_m->get_course_in_order($course_id);

	}

	public function employee_dashboard()
	{
		$this->data['users']= $this->get_all_users();
		$this->data['rewards'] = $this->get_rewards();
		$this->data['quiz_details'] = $this->get_quiz_details();
		$this->load->view('employe-dashboard',$this->data);
	}

	public function get_all_users(){

		$this->db->where('user_type !=', 'admin');

		return $this->db->get('users')->result();
	}

	public function update_profile(){

		$this->load->view('user-account', $this->data);
	}
    public function logout(){
         $this->load->model('employee_m');
	     $this->load->employee_m->logout();
		 redirect('','refresh');
	}
	public function privacy_policies(){

		$this->load->view('privacy-policies', $this->data);
	}

	public function student_dashboard(){

		$this->load->view('student-course-dashboard', $this->data);
	}
	public function student_account_edit_basic(){
         $this->data['basic_info'] = $this->employee_m->basic_info();
		$this->load->view('user-account', $this->data);
	}

	public function  take_a_quiz(){
		$id =$this->uri->segment(3);
		if($id == ""){
			redirect('employee/student_dashboard','refresh');
		}

		$this->data['questions'] = $this->employee_m->get_questions($id);
		$this->load->view('student-take-quiz', $this->data);

		// $this->load->view('student-exam-quiz', $this->data);
	}

	public function take_quizes(){

		$this->data['questionnaire'] = $this->employee_m->get_take_quiz();

		$this->load->view('quiz-remain-list', $this->data);
	}
    public function student_browse_courses()
	{

		$this->load->view('student-course-dashboard',$this->data);
	}
	 public function student_quiz_result()
	{
		$this->load->view('student-quiz-result');
	}
	 public function g2p_directory()
	{
		$this->data['gtop'] = $this->employee_m->g2p_directory();
		$this->load->view('g2p-directory', $this->data);
	}
	 public function student_view_course()
	{

		$id = $this->uri->segment(3);
		if($id ==""){
			redirect('employee/student_dashboard','refresh');
		}else{
			$lesson_id = $this->uri->segment(4);
			if($lesson_id == ""){
			$get_lession_info = $this->employee_m->get_recent_lession_info($id);
			if($get_lession_info =="NULL"){
				redirect('employee/student_dashboard','refresh');
			}else{
				$lesson_id = $get_lession_info ;
			}
			}
			$this->data['course_details'] = $this->employee_m->get_course_detail($id);
			$this->data['all_lesson'] = $this->employee_m->get_all_lesson($id);
			$this->data['lesson'] =  $this->employee_m->get_lesson($lesson_id);
			$this->data['lesson_meta'] = $this->employee_m->get_lesson_meta($id ,$lesson_id);
			$this->load->view('student-view-course',$this->data);
		}
		
	}
	public function student_view_course2()
	{
		$this->load->view('student-view-course2');
	}

	public function get_video_ended_redirect_link(){

		$course_id = $this->input->post('course_id');
		$lesson = $this->input->post('lesson_id');
		$user_id = $this->session->userdata('id');

		$this->db->where('course', $course_id);
		$this->db->where('lesson', $lesson);
		$this->db->where('user_id', $user_id);
		$result = $this->db->get('course_progress')->row();
		$url = $this->get_quiz_url($course_id , $lesson);
		if($result){
			if($url == NULL){
				$data = array('percentage' => 100 ,'completed'=>'completed');
			}else{
				$data = array('percentage' => 100 ,'completed'=>'progress');
			}
			
			$this->db->where('cp_id', $result->cp_id);
			$this->db->update('course_progress', $data);

		}else{
			if($url == NULL){
			$data = array('percentage' => 100 ,'completed'=>'completed','course'=> $course_id,'lesson'=>$lesson,'user_id'=>$user_id);

			}else{
			$data = array('percentage' => 100 ,'completed'=>'progress','course'=> $course_id,'lesson'=>$lesson,'user_id'=>$user_id);
			}
			$this->db->insert('course_progress', $data);
		}

		
		if($url == NULL){
			$this->db->where('course_id', $course_id);
			$result = $this->db->get('admin_lesson')->result();
			$lessons = array() ;
			if(count($result) > 0){
				foreach ($result as $data) {
					# code...
					$lessons[] = $data->id ;
				} 


				$lesson_count  = count($lessons);
				$key = array_search($lesson, $lessons);
				if($key != $lesson_count-1){

					$nes_lesson_id = $lessons[$key +1];

					$url = site_url('employee/student_view_course/'.$course_id.'/'.$nes_lesson_id.'');
					
				}else{

					$id = $this->session->userdata('id');
					$group =  $this->employee_m->get_assigned_group($id);
					$courses=  $this->employee_m->get_assigned_course($group);
					$index = array_search($course_id, $courses);
					$index = $index+1;
					if($courses[$index]){
						$url = site_url('employee/student_view_course/'.$courses[$index].'');
					}else{

						$url = site_url('employee/student_view_course/'.$courses[$index-1].'');
					}
				}
			}else{
					$id = $this->session->userdata('id');
					$group =  $this->employee_m->get_assigned_group($id);
					$courses=  $this->employee_m->get_assigned_course($group);
					$index = array_search($course_id, $courses);
					$index = $index+1;
					if($courses[$index]){
						$url = site_url('employee/student_view_course/'.$courses[$index].'');
					}else{

						$url = site_url('employee/student_view_course/'.$courses[$index-1].'');
					}
				}
			}

		echo $url;
	}

	public function get_quiz_url($course_id , $lesson_id){

		$this->db->where('module', $course_id);
		$user_id = $this->session->userdata('id');
		$result = $this->db->get('questionnaire')->result();

		if(count($result) > 0){

			$this->db->where('user_id', $user_id);
			$this->db->where('questionnaire_id', $result[0]->id);
			$res = $this->db->get('quiz_attempt')->result();
			if(count($res) == 0){

					if($result[0]->show_after =="after_end" || $result[0]->show_after == $lesson_id){

			return  site_url('employee/take_a_quiz/'.$result[0]->id.'');
			}else{
				return NULL ;
			}
		
			}

		}else{

			return NULL ;
		}
	}
	public function student_view_course3()
	{
		$this->load->view('student-view-course3');
	}

	public function student_view_course4()
	{
		$this->load->view('student-view-course4');
	}

public function get_video_progress_data(){


	$lesson = $this->input->post('lesson_id');
		$course_id = $this->input->post('course_id');
		$video_time = $this->input->post('video_time');
		$vid_duration = $this->input->post('total_duration');

	
		$user_id = $this->session->userdata('id');
		$this->db->where('user_id', $user_id);
		$this->db->where('lesson', $lesson);
		$this->db->where('course', $course_id);
		$result = $this->db->get('course_progress')->result();
		if(count($result) > 0){

			echo $result[0]->percentage ;
		}else{
			echo '0';
		}
}

	public function update_progress_log(){

		$lesson = $this->input->post('lesson_id');
		$course_id = $this->input->post('course_id');
		$video_time = $this->input->post('video_time');
		$vid_duration = $this->input->post('total_duration');

	
		$user_id = $this->session->userdata('id');
		$this->db->where('user_id', $user_id);
		$this->db->where('lesson', $lesson);
		$this->db->where('course', $course_id);
		$result = $this->db->get('course_progress')->result();
		if(count($result) > 0){
				$percentage =  round($video_time/$vid_duration*100) ;
					$now = date('Y-m-d H:i:s');
		$data = array('user_id'=>$user_id,'lesson'=>$lesson,'course'=> $course_id,'video_play_duration' => $video_time ,'percentage'=>$percentage ,'updated_at' =>$now);
		$this->db->where('user_id', $user_id);
		$this->db->where('lesson', $lesson);
		$this->db->where('course', $course_id);
		$this->db->update('course_progress', $data);
		}else{
			$data = array('user_id'=>$user_id,'lesson'=>$lesson,'course'=> $course_id,'completed'=>'progress','video_play_duration' => $video_time,'percentage'=> 0);
			$this->db->insert('course_progress', $data);
		}
	}

	public function submit_quiz(){

		// var_dump($_POST);
		$data = array();
			$questionnaire = $this->input->post("ids");
	
		$this->db->where('questionnaire', $questionnaire);
		$result = $this->db->get('questions')->result();
		// var_dump($result);
		$i = 0 ; 
		foreach ($result as $data) {
			# code...
			if($_POST[$data->id] == $data->answer){

				$i+=1;
			}
		}
		
		$user_id = $this->session->userdata('id');
		$total_ques = count($_POST)-1;

		$point =  $i/$total_ques*10 ;

	

		$quiz_attempt_data = array('questionnaire_id'=>$questionnaire,'user_id' =>$user_id ,'total_question' =>$total_ques,'total_no' => $point, 'total_correct_answer' =>$i);
		$this->db->insert('quiz_attempt', $quiz_attempt_data);
		$qa_id = $this->db->insert_id() ;
		$qr_data = array();
		foreach ($_POST as $key => $value) {
			# code...
			if($key != "ids"){

				$qr_data[] = array('qa_id' =>$qa_id ,'question_id' =>$key ,'answer' => $value);
			}
		}
		$this->db->insert_batch('quiz_response', $qr_data);

		$this->db->where('questionnaire_id', $questionnaire);
		$attempt_count = $this->db->get('quiz_attempt')->result();

		if(count($result)> 0 ){
			$rewads =  $point / count($attempt_count) ;
			$this->db->where('user_id', $user_id);
			$this->db->where('questionnaire_id', $qa_id);
			$reward_counts = $this->db->get('rewards')->result();

			if(count($reward_counts)> 0){
				$reward_data =  array('rewards'=>$rewads);
				$this->db->where('user_id', $user_id);
				$this->db->where('questionnaire_id', $questionnaire);
				$this->db->update('rewards', $reward_data);

			}else{

				$reward_data =  array('user_id'=>$user_id,'questionnaire_id'=>$questionnaire,'rewards'=>$rewads);
				$this->db->insert('rewards', $reward_data);
			}
		}

		$this->data['qa_id'] =  $qa_id ;
		$this->data['total_scored'] = $point;
		$this->data['total_questions'] = $total_ques;
		$this->data['total_correct_answer'] = $i ;
		$this->db->where('user_id', $user_id);
		$this->db->where('questionnaire_id', $questionnaire);
		$this->db->delete('skip_questionarie');
		redirect('employee/student_quiz_results/'.$qa_id.'','refresh');
	}

	public function student_view_course5()
	{
		$this->load->view('student-view-course5');
	}

	public function quiz_result(){

		$this->load->view('quiz-result', $this->data);
	}

	public function student_quiz_results(){

		$id = $this->uri->segment(3);
		$user_id = $this->session->userdata('id');
	$qa_details =	$this->data['qa_details'] = $this->employee_m->get_qa_details($id , $user_id);
		$this->data['qr_details'] = $this->employee_m->get_qr_details($id , $user_id);
		$this->data['rewards'] = $this->employee_m->get_rewards($qa_details->questionnaire_id , $user_id);

		$this->load->view('student-quiz-result', $this->data);


	}

	public function student_quiz_list(){

		$this->data['quiz_his'] = $this->employee_m->get_quiz_history();
		$this->load->view('student-quiz-list', $this->data);

	}


	 public function course_extent()
	{
		$this->load->view('manager-course-extent');
	}
    public function manager_dashboard()
	{
		$users = $this->get_assigned_user_to_manger();

		$this->data['users'] = $this->get_users_details($users);

		$this->data['rewards'] = $this->get_rewards();
		$this->data['quiz_details'] = $this->get_quiz_details();
		$this->load->view('manager-dashboard',$this->data);
	}

	public function get_quiz_details($user_id = NULL){
		if($user_id == NULL){
			$user_id =  $this->session->userdata('id');
		}
		
		$this->db->select('quiz_attempt.*,questionnaire.*');
		$this->db->from('quiz_attempt');
		$this->db->join('questionnaire', 'quiz_attempt.questionnaire_id = questionnaire.id', 'left');
		$this->db->where('quiz_attempt.user_id', $user_id);
		$this->db->group_by('quiz_attempt.questionnaire_id');
		$this->db->order_by('quiz_attempt.qa_id', 'desc');
		return $this->db->get()->result();
	}

	public function get_rewards(){
		$id =  $this->session->userdata('id');
		$this->db->select('rewards.*,questionnaire.*');
		$this->db->from('rewards');
		$this->db->join('questionnaire', 'rewards.questionnaire_id = questionnaire.id', 'left');
		$this->db->where('rewards.user_id', $id);
		return $result = $this->db->get()->result();
	}

	

	public function get_users_details($users){
	    $data =  array();
    if(count($users) > 0 ){
        	$this->db->where_in('id', $users);
		return $this->db->get('users')->result();
    }else{
        
        return $data ;
    }
	
	}
	public function manager_list_of_employee()
	{
		$this->data['mag_emp_lst'] = $this->employee_m->manager_list_of_employee();
		$this->load->view('manager-list-of-employee', $this->data);
	}
    public function profile_view_course()
	{

		$id= $this->uri->segment(3);
		$this->data['user'] = $this->get_user_details($id);
		$this->get_course_associated_with_current_user($id);
		$this->load->view('employee-profile-view-course',$this->data);
	}
	public function employee_profile_view_test()
	{
		$id= $this->uri->segment(3);
		$this->data['user'] = $this->get_user_details($id);
		// $this->data['rewards'] = $this->get_rewards();
		$this->data['quiz_details'] = $this->get_quiz_details($id);
		$this->load->view('employee-profile-view-test',$this->data);
	}
	public function get_user_details($id){
		$this->db->where('id', $id);
		return $this->db->get('users')->row();

	}
	public function employee_profile_view_overview()
	{
		$this->load->view('employee-profile-view-overview');
	}
    
	public function manager(){
       $this->data['emp_req_list'] = $this->employee_m->emp_req_list();
       $this->load->view('manager-add-employee-request', $this->data);
	}

	public function create_a_survey(){

		$this->load->view('create-a-survey', $this->data);
	}

	public function update_password(){
		$pass = $this->input->post('password');
		$confrom_pass =$this->input->post('confrom-password');

		if($pass == $confrom_pass){

			$id = $this->session->userdata('id');
			$this->load->model('admin_m');
			$org_pass = $this->admin_m->hash($pass);

			$data = array('password' =>$org_pass);
			$this->db->where('id', $id);
			$result = $this->db->update('users', $data);
			$this->session->set_flashdata('success', 'password updated successfully');

			if($this->session->userdata('user_type') =="manager"){
				 $urlss = $this->agent->referrer();
                 redirect($urlss,'refresh');
			}else{
				 $urlss = $this->agent->referrer();
                 redirect($urlss,'refresh');
			}
			
		}else{

			$this->session->set_flashdata('error', 'password Mismatch');
			 $urlss = $this->agent->referrer();
                        redirect($urlss,'refresh');
		}


	}


	// public function hash(){
 // 		$this->load->model('admin_m');
	// 	echo $this->admin_m->hash('123456');
	// }


	public function leave_policy(){

		$this->load->view('privacy-policies', $this->data);
	}

	public function perfermonace_management_process(){

		$this->load->view('perfermonace_management_process', $this->data);
	}

	public function prevention_of_sexual_harassment(){
		
		$this->load->view('prevention_of_sexual_harassment', $this->data);
	}

	public function probation_process(){

		$this->load->view('probation_process', $this->data);
	}
	public function get_user_result(){
		$result = $this->employee_m->get_user_result();
 	    header('Content-Type: application/x-json; charset=utf-8');
	    echo(json_encode($result));
	}
	public function send_request(){
		$result = $this->employee_m->send_request();
 	    header('Content-Type: application/x-json; charset=utf-8');
	    echo(json_encode($result));
	}
	public function delete_request(){
		//$result = $this->employee_m->delete_request();
		if($this->employee_m->delete_request() == TRUE){
               $this->session->set_flashdata('success' , 'Successfully Deleted');
                
               redirect('employee/manager','refresh');
            } 
        else{
               $this->session->set_flashdata('error', 'Something going wrong');
               
               redirect('employee/manager','refresh');
           }
 	   //  header('Content-Type: application/x-json; charset=utf-8');
	    // echo(json_encode($result));
	}
    public function send_file_to_emp(){
    	
        $config['upload_path']  = './admin-assets/images/all-users/';
                $config['allowed_types']   = 'gif|jpg|png';
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('photo'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('upload_form', $error);
                    $this->session->set_flashdata('error' , 'Something going wrong');
                       $urlss = $this->agent->referrer();
                       redirect($urlss,'refresh');
                    
 	            }
	        else
	             {
                    $data =  $this->upload->data();
                    $file_name = $data["file_name"];
                     if($this->employee_m->send_file_to_emp($file_name) == TRUE){
                      $this->session->set_flashdata('success' , 'Successfully sent');
                       $urlss = $this->agent->referrer();
                       redirect($urlss,'refresh');
                    } else{
                    	  $this->session->set_flashdata('error', 'Something going wrong');
                    	  $urlss = $this->agent->referrer();
                       redirect($urlss,'refresh');
                    }
                }
    	 
    }

	
}

/* End of file Employee.php */
/* Location: ./application/modules/employee/Employee.php */