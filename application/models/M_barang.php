<?php 

class M_barang extends CI_Model
{
    function getDataBarang()
    {
        return $this->db->get('barang_master')->result();

    }

    function getDataBarangHarga()
    {
        return $this->db->get('barang_harga');
    }
    
    function cetakKodebarang()
    {

      $this->db->select('RIGHT(barang_master.kode_barang,5) as kode_barang',FALSE);
      $this->db->order_by('kode_barang','DESC');
      $this->db->limit(1);
     
      $sql=$this->db->get('barang_master');

      if($sql->num_rows() <> 0 )
      {
         $data=$sql->row();
         $autonumber = intval($data->kode_barang)+1;
      }else{
         $autonumber = 1;
      }

      $limit = str_pad($autonumber,5,"0", STR_PAD_LEFT);
      $kode_barang ="BR".$limit;
      return $kode_barang;


    }

    function insertbarang($data)
    {
        $this->db->insert('barang_master',$data);
    }
    
    function hapus_barang($where,$table)
    {
         $this->db->where($where);
         $hapus=$this->db->delete($table);

         if($hapus){
            return 1;
          }else{
            return 0;
          }
   }

   function btn_edit_barang($where,$table)
   {
        return $this->db->get_where($table,$where)->result_array();
   }

   function update_barang($where,$data,$table)
   {
        $this->db->where($where);
        $this->db->update($table,$data);
        
   }
    // ------------------------------------ HARGA ---------------------------- 
     function getDataHarga()
    {


         $cabang=$this->session->userdata('kode_cabang');//ini JTK kode cabang yang loginya
    
         if($cabang == "JTK"){

         $this->db->where_in('barang_harga.kode_cabang',[$cabang,"GDG","GDG2"]);
         

         }elseif($cabang != "PST"){
         $this->db->where('barang_harga.kode_cabang',$cabang);
          
         };

        $this->db->join('barang_master','barang_harga.kode_barang = barang_master.kode_barang');
        return $this->db->get('barang_harga')->result();

    }

    function insertharga($data)
    {
        $this->db->insert('barang_harga',$data);
    }

    function editHarga($where,$table)
    {

        return $this->db->get_where($table,$where)->result_array();
    }

    function updateDataHarga($where,$data,$table)
    { 
        $this->db->where($where);
        $this->db->update($table,$data);
        
    }

    function hapusDataHarga($where,$table)
    {
         $this->db->where($where);
         $hapus=$this->db->delete($table);

         if($hapus){
            return 1;
          }else{
            return 0;
          }

    }
    // update stok barang ketika trasnsaksi Berhasil
  function updateStokbarang($where,$data,$table)
   {
        $this->db->where($where);
        $this->db->update($table,$data); 
   }

  function getDatasupplier()
  {
     return $this->db->get('supplier');
  }

  function hapusDataSupplier($where,$table)
  {
     $this->db->where($where);
     $hapus=$this->db->delete($table);

         if($hapus){
            return 1;
          }else{
            return 0;
          }

  }

  function tambahDatasupplier($data)
  {
      $this->db->insert('supplier',$data);
  }

  function btnEditDataSupplier($where,$table)
  {
     return $this->db->get_where($table,$where)->result_array();
  }

  function editDataSupplier($where,$data,$table)
  {
        $this->db->where($where);
        $this->db->update($table,$data);
  }

  function barangMasuk($data1)
  {
     $this->db->insert('barang_masuk',$data1);
  }


  function getDataBarangMasuk()
  {
    return $this->db->get('barang_masuk');
   
  }

  function getDataBarangInput($where,$table)
  {
    return $this->db->get_where($table,$where);
  }

  function getDataBarangKeluar()
  {
    return $this->db->get('view_barang_keluar');
  }

}   