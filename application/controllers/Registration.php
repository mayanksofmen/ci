<?php
class Registration extends CI_Controller
{
	
	function __construct() 
	{ 
	    parent::__construct(); 
	    $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation', 'email'));
        $this->load->database();
        $this->load->model('registration_model');
	 } 

    
	  function index()
	  {
        $data['content'] = "signin";

        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
                
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
             // fails
           $this->load->view("template",$data);   
        }
        else
        {

             $email = $this->input->post('email');
             $password = $this->input->post('password');              
             $res= $this->registration_model->login($email,$password);
            if ($res)
            {  
               
                print_r($res);  
                exit;    
            
            } 
            else  
            {
                 $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Invalid Username and Password</div>');
                 redirect('Registration/index');
            }  
                  
              //$this->load->view("template",$data);         	
        } 	
 


	  }

      function signup()
	  {
        $data['content'] = "signup";
        
        $this->form_validation->set_rules('name', 'Name', 'trim|required|alpha|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[registration.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');
        $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'trim|required');
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
             // fails
           $this->load->view("template",$data);   
        }
        else
        {

              $arr = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'mobile_number' => $this->input->post('mobile_number'),
                'is_active' =>'1');
            
            // insert form data into database
             $res= $this->registration_model->insertUser($arr);
            if ($res)
            {  
               $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered!</div>');
                      
            
            } 
            else  
            {
                 $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are not  Registered Please try again later!</div>');
            }  
              redirect('Registration/signup');   
              //$this->load->view("template",$data);         	
        } 	

          
	  
	    }




}

?>