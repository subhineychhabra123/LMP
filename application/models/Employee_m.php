<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_m extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function loggedin ()
	{
		 if($this->session->userdata('user_type') === 'employee' || $this->session->userdata('user_type') === 'manager' ) {
			 return TRUE ;
		 }
		 else
		 {
			 return FALSE ; 
		 }
	}
	public function logout ()
	{
	$this->session->sess_destroy();
	
	}

	public function get_questions($id){

		$this->db->where('questionnaire', $id);
		return $this->db->get('questions')->result();

	}

	public function get_assigned_group($id){

		$groups = array();
	
		$this->db->where('find_in_set("'.$id.'", user_id) <> 0');
		$result = $this->db->get('user_groups')->result();
	
		foreach ($result as $data) {
			# code...
			$groups[] = $data->id ;
		}

		return $groups;
		
	}

	public function get_lesson_by_course($id){

		$this->db->where('course_id', $id);

		return $this->db->get('admin_lesson')->result();
	}

	public function check_completed_lesson($id ,$user_id){

		$this->db->where('lesson', $id);
		$this->db->where('user_id', $user_id);
		$this->db->where('completed', 'completed');
		$result  = $this->db->get('course_progress')->result();

		if(count($result) > 0){
			return true;
		}else{
			return false;
		}
	}

public function get_assigned_course($group){

		$course = array();
// $xyz = implode(',', $group);
foreach ($group as $key => $value) {
			
	$this->db->where('find_in_set("'.$value.'", groups) <> 0');
	$result = $this->db->get('admin_course')->result();

		foreach ($result as $data) {
			# code...
			$course[] = $data->id;
		}
	}

	return $course;
	}

	public function get_course_in_order($course_id){
		if(count($course_id)>0){
			$this->db->where_in('id', $course_id);
		$this->db->order_by('course_seq_cats', 'ASC');
		$result  = $this->db->get('admin_course')->result();
		return $result ;
		}else{
			return ;
		}
		
	}
	// public function get_course_by_assigned_by_group($group_id){

	// 	$this->db->where_in('Field / comparison', $Value);

	// $this->db->get('Table', limit, offset);

	// }
	public function get_qa_details($id , $user_id){

		$this->db->select('quiz_attempt.*,questionnaire.*,questionnaire.id questionnaire_id');
		$this->db->from('quiz_attempt');
		$this->db->join('questionnaire', 'quiz_attempt.questionnaire_id = questionnaire.id', 'left');
		$this->db->where('quiz_attempt.qa_id', $id);
		return $this->db->get()->row();
	}

	public function get_qr_details($id ,$user_id){
		$this->db->select('quiz_response.*,quiz_response.answer qr_answer,questions.*');
		$this->db->from('quiz_response');
		$this->db->join('questions', 'quiz_response.question_id = questions.id', 'left');
		$this->db->where('quiz_response.qa_id', $id);
		return $this->db->get()->result();
	}

	public function get_quiz_history(){

		$this->db->select('quiz_attempt.*,questionnaire.*,MAX(quiz_attempt.qa_id)');
		$this->db->from('quiz_attempt');
		$this->db->join('questionnaire', 'quiz_attempt.questionnaire_id = questionnaire.id', 'left');
		$user_id = $this->session->userdata('id');
		$this->db->group_by('quiz_attempt.questionnaire_id');
		$this->db->where('quiz_attempt.user_id', $user_id);
		$this->db->order_by('MAX(quiz_attempt.qa_id)', 'ASC');
		return $this->db->get()->result();
	}

	public function get_rewards($id ,$user_id){

		$this->db->where('user_id', $user_id);
		$this->db->where('questionnaire_id', $id);
		return $this->db->get('rewards')->row();

	}
	public function get_user_rewards_point($id){

		$this->db->where('user_id', $id);
		$result = $this->db->get('rewards')->result();
		$total_rewards=  0; 
		foreach ($result as $data) {
			# code...
			$total_rewards += $data->rewards ;
		}
		return $total_rewards ;
	}
	public function get_course_status($id , $user_id =NULL){
		$this->db->where('course', $id);
		$this->db->where('completed', 'completed');
		if($user_id == NULL){
			$user_id = $this->session->userdata('id');
		}
		
		$this->db->where('user_id', $user_id);
		$result_cp = $this->db->get('course_progress')->result();

		$this->db->where('course_id', $id);
		$result_l = $this->db->get('admin_lesson')->result();

		if(count($result_cp) == count($result_l)){

			return "completed";
		}else{
			return "incompleted";
		}
	}
	public function get_course_progress_details($id , $user_id = NULL){
		if($user_id == NULL){
			$user_id = $this->session->userdata('id');
		}
		
		$datas = array();
		$this->db->where('course', $id);
		$this->db->where('user_id', $user_id);
		$this->db->order_by('updated_at', 'DESC');
		$result = $this->db->get('course_progress')->result();

		if(count($result) > 0 ){

			$datas['progress_per'] = $result[0]->percentage;
			$datas['module_status']= $result[0]->completed;
			$this->db->where('id', $result[0]->lesson);
			$results = $this->db->get('admin_lesson')->row();
				$datas['lesson_name'] = $results->title;


		}else{
			$this->db->where('course_id', $id);
			$this->db->order_by('id', 'ASC');
			$result = $this->db->get('admin_lesson')->result();

			if(count($result)>0){
				$result = $result[0];
				$datas['lesson_name'] = $result->title;
				$datas['progress_per'] = '0';
				$datas['module_status']= "not_started";
			}else{
				$datas['lesson_name'] = 'No lesson added to this module';
				$datas['progress_per'] = '0';
				$datas['module_status']= "not_started";

			}

			
		}
return $datas;
	}


	public function get_recent_lession_info($id){

		$this->db->where('course', $id);
		$this->db->order_by('updated_at', 'desc');
		$result = $this->db->get('course_progress')->result();
		if(count($result) > 0 ){
			return $result[0]->lesson ; 
		}else{

		$this->db->where('course_id', $id);
		$result = $this->db->get('admin_lesson')->result();
		if(count($result) > 0 ) {

			return $result[0]->id ;

		}else{
			return 'NULL' ;
		}

		}

		
	}

	public function get_all_lesson($id){

		$this->db->where('course_id', $id);
		$result = $this->db->get('admin_lesson')->result();
		return $result ;

	}

	public function get_lesson($id){


			$this->db->where('id', $id);
		$result  = $this->db->get('admin_lesson')->row();
		return $result ;

	}

	public function get_lesson_meta($course_id , $lesson_id){
		$user_id = $this->session->userdata('id');
		$this->db->where('user_id', $user_id);
		$this->db->where('course', $course_id);
		$this->db->where('lesson', $lesson_id);
		return $this->db->get('course_progress')->row();
	}

	public function get_course_detail($id){

		$this->db->where('id', $id);
		return $this->db->get('admin_course')->row();
	}

	public function get_users_assigned_to_manager(){

		$users =array();

		$id = $this->session->userdata('id');
		$this->db->where('manager_id', $id);
		$result = $this->db->get('manager_mapping')->row();
		if($result){

			$users = explode(',', $result->users);

		}else{
			return $users;
		}
	}
	public function get_user_result(){
		$email = $this->input->post('email');
		$this->db->where('email', $email);
		$result = $this->db->get('users')->row();
		 
     	return $result;
	}
	public function g2p_directory(){
		
		$this->db->where('go_to_person', 'yes');
		$result = $this->db->get('users')->result();
     	return $result;
	}
	public function send_request(){

		$this->db->where('user_id', $this->input->post('u_id'));
		$result = $this->db->get('approval_request')->row();
     	
          if($result == ''){
          	$data = array(
				'request_by' => $this->input->post('req_by'),
				'status' => 'pending',
				'user_id' => $this->input->post('u_id'),
  			    );
		  $result = $this->db->insert('approval_request', $data);

		  return 'Sent Successfully';
		}else{
            return 'Already Sent';
		 
	       }
		}
	public function emp_req_list(){
		$id = $this->session->userdata('id');
		$this->db->where('request_by', $id);
		$result = $this->db->get('approval_request')->result();
		 $result1 =array();
		foreach ($result as $value) {
			 $ids = $value->user_id; 
 			 $this->db->where('id', $ids);
			 $result1[] = $this->db->get('users')->row();
 		    }
		 
     	return $result1;
	}
	public function user_status_ap($idss = NULL, $req_by = NULL){
		 
		$this->db->where('user_id', $idss);
		$this->db->where('request_by', $req_by);
		$result = $this->db->get('approval_request')->row();		 
     	return $result;
	}
    public function delete_request(){
		$id = $this->input->post('req_id');
		$this->db->where('ap_id', $id);
		$result = $this->db->delete('approval_request');
      	 if($result){  return TRUE; } else{ return FALSE; }
	}

	public function get_take_quiz(){
		$user_id = $this->session->userdata('id');

		$this->db->select('skip_questionarie.*,questionnaire.*');
		$this->db->from('skip_questionarie');
		$this->db->join('questionnaire', 'skip_questionarie.questionnaire_id = questionnaire.id', 'left');
		$this->db->where('skip_questionarie.user_id', $user_id);
		return $this->db->get()->result();
	}
	public function basic_info(){
		$id = $this->session->userdata('id');
		$this->db->where('id', $id);
		$result = $this->db->get('users')->row();
		return $result;
	}
	public function manager_list_of_employee(){
		$result1 = array();
		$id = $this->session->userdata('id');
		$this->db->where('request_by', $id);
		$this->db->where('status', 'approved');
		$result = $this->db->get('approval_request')->result();
		foreach ($result as $value) {
			 $ids = $value->user_id; 
 			 $this->db->where('id', $ids);
			 $result1[] = $this->db->get('users')->row();
 		    }
		 
     	return $result1;
		 
	}
	public function send_file_to_emp($file_name=NULL){
		$send_by = $this->session->userdata('id');
		$uid = implode(',',$this->input->post('send_files'));
		$newuid = explode(',', $uid);
		foreach ($newuid as  $user_id) {
			$data = array(
				'send_by' => $send_by,
				'user_id' => $user_id,
				'files' => $file_name,
  			    );
		  $result = $this->db->insert('attach_file_user', $data);
          
		}
		if($result){
		           return TRUE;
				}else{
				   return FALSE;
				}
		
	}

}

/* End of file Employee_m.php */
/* Location: ./application/models/Employee_m.php */