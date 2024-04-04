<?php 

class M_pelanggan extends CI_Model
{
    function getDataPelanggan()
    {

        $cabang=$this->session->userdata('kode_cabang');
        if($cabang != "PST"){
          $this->db->where('pelanggan.kode_cabang',$cabang);
        }
        // JOIN KODE CABANG KE TABLE CABANG FIELD NAMA CABANG('tableCbg','tbPlg.field_kodCbg - tbCbg.fieldkodCbg');
        $this->db->join('cabang','pelanggan.kode_cabang = cabang.kode_cabang');
        return $this->db->get('pelanggan');
    }

    function insertDataPelanggan($data)
    {
        $this->db->insert('pelanggan',$data);
    }

    function hapusDataPelanggan($where,$table)
    {
         $this->db->where($where);
         $hapus=$this->db->delete($table);

         if($hapus){
            return 1;
          }else{
            return 0;
          }
   }
   
   function getEditDataPelanggan($where,$table)
   {
        return $this->db->get_where($table,$where)->result_array();
   }

   function editDataPelanggan($where,$data,$table)
   {
        $this->db->where($where);
        $this->db->update($table,$data);
        
   }

   function cetakKodepelanggan()
    {

      $this->db->select('RIGHT(pelanggan.kode_pelanggan,4) as kode_pelanggan',FALSE);
      $this->db->order_by('kode_pelanggan','DESC');
      $this->db->limit(1);
     
      $sql=$this->db->get('pelanggan');

      if($sql->num_rows() <> 0 )
      {
         $data=$sql->row();
         $autonumber = intval($data->kode_pelanggan)+1;
      }else{
         $autonumber = 1;
      }

      $limit = str_pad($autonumber,5,"0", STR_PAD_LEFT);
      $kode_pelanggan ="PLG".$limit;
      return $kode_pelanggan;

    }
}