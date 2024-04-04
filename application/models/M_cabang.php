<?php 

class M_cabang extends CI_Model
{
    function getDataCabang()
    {  
     return $this->db->get('cabang');
    }

    function tambahDataCabang($data)
    {
        $this->db->insert('cabang',$data);
    }

    function hapusDataCabang($where,$table)
    {
         $this->db->where($where);
         $hapus=$this->db->delete($table);

         if($hapus){
            return 1;
          }else{
            return 0;
          }

    }
    function btnEditCabang($where,$table)
    {
        return $this->db->get_where($table,$where)->result_array();
    }

   function editDataCabang($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
        
    }
}    