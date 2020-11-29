<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model
{

 public function login_user($username, $password)
 {
    $this->db->select('*');
   $this->db->from('user');
   $this->db->where(array('username' => $username,
                            'password' =>$password));
                            
    return $this->db->get()->row();
   //$email=set_value('email');
   //$pass=set_value('password');
   //$result= $this->db
               //->where('email',$email)
               //->where('password',md5($password))
               //->limit(1)
               //->get_where('user');
   //if($result->num_rows()> 0){
       //return $result->row();
  // }else{
      // return FALSE;
  // }
    
 }  
 public function lupapwd()
    {
        $email=set_value('email');
       
        $result= $this->db
                    ->where('email',$email)
                    ->limit(1)
                    ->get_where('user');
        if($result->num_rows()> 0){
            return $result->row();
        }else{
            return FALSE;
        }
    }
    public function gantipwd ($data)
    {
        $this->db->where('id_user',$data['id_user']);
        $this->db->update('user',$data);
    } 
    
    

}

/* End of file M_auth.php */
