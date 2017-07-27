<?php 
   class Student_controller extends CI_Controller {
	
      function __construct() { 
         parent::__construct(); 
         $this->load->helper('url'); 
         $this->load->database(); 
      } 
  
      public function index() { 
         $query = $this->db->get("student"); 
         $data['records'] = $query->result(); 
			
         $this->load->helper('url'); 
         $this->load->view('student_view',$data); 
      } 
  
      public function add_student_view() { 
         $this->load->helper('form'); 
         $this->load->view('student_add'); 
      } 
  
      public function add_student() { 
         $this->load->model('Student_Model');
			
         $data = array( 
            'roll_no' => $this->input->post('roll_no'), 
            'name' => $this->input->post('name') 
         ); 
			
         $this->Student_Model->insert($data); 
   
         $query = $this->db->get("student"); 
         $data['records'] = $query->result(); 
         $this->load->view('student_view',$data); 
      } 
  
      public function update_student_view() { 
         $this->load->helper('form'); 
         $roll_no = $this->uri->segment('3'); 
         $query = $this->db->get_where("student",array("roll_no"=>$roll_no));
         $data['records'] = $query->result(); 
         $data['old_roll_no'] = $roll_no; 
         $this->load->view('student_edit',$data); 
      } 
  
      public function update_student(){ 
         $this->load->model('Student_Model');
			
         $data = array( 
            'roll_no' => $this->input->post('roll_no'), 
            'name' => $this->input->post('name') 
         ); 
			
         $old_roll_no = $this->input->post('old_roll_no'); 
         $this->Student_Model->update($data,$old_roll_no); 
			
         $query = $this->db->get("student"); 
         $data['records'] = $query->result(); 
         $this->load->view('student_view',$data); 
      } 
  
      public function delete_student() { 
         $this->load->model('Student_Model'); 
         $roll_no = $this->uri->segment('3'); 
         $this->Student_Model->delete($roll_no); 
   
         $query = $this->db->get("student"); 
         $data['records'] = $query->result(); 
         $this->load->view('student_view',$data); 
      } 
   } 
?>