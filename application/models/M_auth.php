<?php 

class M_auth extends CI_Model
{
    function getlogin($username,$password)
    {
      return  $this->db->get_where('users',array('username'=>$username,'password'=>$password));
    }
}