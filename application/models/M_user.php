<?php 

class M_user extends CI_Model
{
 function getDatauser()
 {
    return $this->db->get('users');
 }

 function insertuser($data)
 {
    $this->db->insert('users',$data);
 }

 function deleteUser($where,$table)
 {
         $this->db->where($where);
         $hapus=$this->db->delete($table);

         if($hapus){
            return 1;
          }else{
            return 0;
          }
}

function btn_edit_user($where,$table)
{
 return $this->db->get_where($table,$where)->result_array();
}

function updateUser($where,$data,$table)
{
        $this->db->where($where);
        $this->db->update($table,$data);
        
}

function cetakIduser()
{

 $this->db->select('RIGHT(users.id_user,2) as id_user',FALSE);
 $this->db->order_by('id_user','DESC');
 $this->db->limit(1);
     
 $sql=$this->db->get('users');

   if($sql->num_rows() <> 0 )
      {
         $data=$sql->row();
         $autonumber = intval($data->id_user)+1;
      }else{
         $autonumber = 1;
      }

      $limit = str_pad($autonumber,3,"0", STR_PAD_LEFT);
      $id_user ="USR".$limit;
      return $id_user;


    }
}