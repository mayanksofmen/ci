<?php
class Home_model extends CI_Model
{
    function __construct()
    {
       
        parent::__construct();
    }
    
    //insert into user table
    function insertUser($data)
    {
        return $this->db->insert('user', $data);
    }
    
    

      function login($email, $password)
     {
       $this -> db -> select('*');
       $this -> db -> from('user');
       $this -> db -> where('email', $email);
       $this -> db -> where('password', $password);
       $this -> db -> limit(1);

       $query = $this -> db -> get();

       if($query -> num_rows() == 1)
       {
         return $query->result();
       }
       else
       {
         return false;
       }
     } 

       
      public function record_count() 
      {
        return $this->db->count_all("user");
      }
   
     public function fetch_userdata($limit, $start) 
     {
        $this->db->limit($limit, $start);
        $query = $this->db->get("user");

        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
            return $data;
        }
        return false;
     }


      function get_usercontents() {
        $this->db->select('*');
        $this->db->from('user');

        $query = $this->db->get();
        return $result = $query->result();
     }
    //activate user account
 
      function delete_usercontents($id)
      {
         $this->db->where('id', $id);
         $this->db->delete('user');
         return true;   
      }

      function get_usercontents_data($id) {
       
       $this -> db -> select('*');
       $this -> db -> from('user');
       $this -> db -> where('id', $id);
       $query = $this -> db -> get();
       return $query->result();

      }  


      function update_usercontents($id,$data){
      $this->db->where('id', $id);
     return $this->db->update('user', $data);
}


    function email_check($email)
   {
     
       $this->db-> select('*');
       $this->db->from('user');
       $this->db->where('email',$email);
       $query = $this -> db -> get();
      
       if($query->num_rows()>0)
         return false;
        else
         return true;    
       
     

   }

  function email_check_edit($id,$email)
  {
    
      $this->db-> select('*');
      $this->db->from('user');
      $this->db->where('email',$email);
      $this->db->where('id!=',$id);
      $query = $this -> db -> get();
      
       if($query->num_rows()>0)
         return false;
        else
         return true;    


  }



}


?>