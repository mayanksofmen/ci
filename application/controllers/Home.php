<?php
class Home extends CI_Controller
{
	
	function __construct() 
	{ 
	    parent::__construct(); 
	    $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation', 'email'));
        $this->load->database();
        $this->load->model('home_model');
        $this->load->library('pagination');
	 } 

    
	  function index()
	  {
        /*if($this->session->userdata('logged_in'))
        {    
          $data['content'] = "user_view";
          //$userinfo = $this->home_model->get_usercontents(); 
         //$data['userinfo'] = $userinfo;
          
         } 
         else
           $data['content'] = "login";    

          $config["base_url"] = base_url()."index.php/Home/index";
          $config["total_rows"] = $this->home_model->record_count();
          $config["per_page"] = 10;
          $config["uri_segment"] = 3;
          $choice = $config["total_rows"] / $config["per_page"];
          $config["num_links"] = round($choice);

          $this->pagination->initialize($config);
          $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
          $data['userinfo'] = $this->home_model->fetch_userdata($config["per_page"], $page);
          $data["pagination_link"] = $this->pagination->create_links();
        
         $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email');
         $this->form_validation->set_rules('password', 'Password', 'trim|required');
                
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
             // fails
           $this->load->view("template1",$data);   
        }
        else
        {

             $email = $this->input->post('email');
             $password = $this->input->post('password');              
             $res= $this->home_model->login($email,$password);
            if ($res)
            {  
              
             $session_data = array('id' => $res[0]->id,
              'name' => $res[0]->name,
               'email' =>$res[0]->email,
                'role' =>$res[0]->role);
              $this->session->set_userdata('logged_in', $session_data);
              //$userinfo = $this->home_model->get_usercontents();
              //$data['userinfo'] = $userinfo;
              $data['content'] = "user_view"; 
              $this->load->view("template1",$data); 
             
            } 
            else  
            {
                 $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Invalid Email and Password</div>');
                 redirect('Home/index');
            }  
                  
              //$this->load->view("template",$data);            
        } */  
        
      } 	
   

    function registration()
    {
        $data['content'] = "registration";
          
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');
        $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'numeric|trim|required');
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
             // fails
           $this->load->view("template1",$data);   
        }
        else
        {

              $arr = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'mobile_number' => $this->input->post('mobile_number'),
                'is_active' =>'1',
                'role' =>'user');
            
            // insert form data into database
             $res= $this->home_model->insertUser($arr);
            if ($res)
            {  
               $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered!</div>');
                      
            
            } 
            else  
            {
                 $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are not  Registered Please try again later!</div>');
            }  
                redirect('home/registration');   
              //$this->load->view("template",$data);            
        }      
              
         
        
    }

   
    function add_user()
    {
      
      

      if($this->input->post())
      {


          $arr = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'mobile_number' => $this->input->post('mobile_number'),
                'is_active' =>'1',
                'role' =>'user');

            
            // insert form data into database
           
             $res= $this->home_model->insertUser($arr);
            if ($res)
            {  
               
              echo "1";
              exit;             
            
            } 
            else  
            {
              echo "0";
              exit;
            }   


      }

      $data['content'] = "add_user";
      $this->load->view("template1",$data);

    }
    
    
     function edit_user($id=0)
    {
    
       $res= $this->home_model->get_usercontents_data($id);
       $data['userinfo']=$res;
       if($this->input->post()) 
       {
                $id = $this->input->post('id'); 
                 $arr = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'mobile_number' => $this->input->post('mobile_number'),
                'is_active' =>'1',
                'role' =>'user');

                 

                 $res= $this->home_model->update_usercontents($id,$arr);
                  if ($res)
                  {  
                     
                    echo "1";
                    exit;             
                  
                  } 
                  else  
                  {
                    echo "0";
                    exit;
                  }   
       

       } 
       

       $data['content'] = "edit_user";
       $this->load->view("template1",$data);

    }

    function logout()
    {
        $session_data = array('id' => '',
              'name' => '',
               'email' =>'',
                'role' =>'');
              $this->session->unset_userdata('logged_in', $session_data);
              /*$data['content'] = "login"; 
              $this->load->view("template1",$data);  */
               redirect('Home/index');    
     
      

    }   


    function userinfo_delete()
    {
        $id= $this->input->post('id');  
        $res= $this->home_model-> delete_usercontents($id);
        echo $res;
    }  

   function email_check()
   {
     
     if($this->input->post())
     {
      
       $email = $this->input->post('email');
       $res= $this->home_model-> email_check($email);
       if($res)
        echo 'true'; 
       else
        echo  'false';  
       
     } 

   }

   function email_check_edit()
   {

    if($this->input->post())
     {
      
       $email = $this->input->post('email');
       $id = $this->input->post('id');
       $res= $this->home_model-> email_check_edit($id,$email);
       if($res)
        echo 'true'; 
       else
        echo  'false';  
       
     } 
   }


}

  

?>