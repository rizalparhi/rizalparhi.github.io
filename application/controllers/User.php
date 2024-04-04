<?php 

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checklogin();
        $this->load->model('M_barang');
        $this->load->model('M_cabang');
        $this->load->model('M_user');


        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
        
    }

    function index()
    {
        // Membuat id User Otomatis ----------------------------------
          $data=array(
            'id_user'=>$this->M_user->cetakIduser()
          );
        // ------------------------------------------------------------- 

        $data['user']=$this->M_user->getDatauser()->result(); 
        $data['cabang']=$this->M_cabang->getdataCabang()->result();
        // $data['id_user']=$this->M_user->cetakIduser()->result();
        $this->load->view('user/v_user',$data);  
        
    } 
    
    function simpanUser()
    {

        // $this->form_validation->set_rules('id_user','id user','required');
        $this->form_validation->set_rules('nama_lengkap','nama lengkap','required');
        $this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('password','password','required');
        $this->form_validation->set_rules('level','level','required');
        $this->form_validation->set_rules('kode_cabang','kode cabang','required');


        $nama_lengkap=$this->input->post('nama_lengkap');
        $no_hp=$this->input->post('no_hp');
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $level=$this->input->post('level');
        $kode_cabang=$this->input->post('kode_cabang');


        $data=array(
           'id_user' => $this->M_user->cetakIduser(),
           'nama_lengkap' => $nama_lengkap,
           'no_hp' => $no_hp,
           'username' => $username,
           'password' => $password,
           'level' => $level,
           'kode_cabang' => $kode_cabang
        );

        if($this->form_validation->run() !=false){
             $this->M_user->insertuser($data);
             $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
             <i class="far fa-thumbs-up"> </i>   <i class="far fa-users"></i> 
              Data User Berhasil Di Tambahkan
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
             redirect('user/index'); 
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
         
               <i class="far  fa-times-circle"></i>   Data User Gagal Di Tambahkan, Pastikan tidak ada data yang kosong!!
             
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('user/index');
             
        }

    }


    function hapusUser($id_user)
    {
        $where=array('id_user'=>$id_user);
        $hapus=$this->M_user->deleteUser($where,'users');

        if($hapus==1){
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible" role="alert">
              Data User Berhasil Di Hapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
          redirect('user/index');
        };

    }  

    function btn_edit_user($id_user)
    {
        $where=array('id_user'=>$id_user);
        $data['user']=$this->M_user->btn_edit_user($where,'users');
        $data['cabang']=$this->M_cabang->getdataCabang()->result();

        $this->load->view('user/editUser',$data);
    }

    function updateDatauser()
    {
        $this->form_validation->set_rules('id_user','id user','required');
        $this->form_validation->set_rules('nama_lengkap','nama lengkap','required');
        $this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('password','password','required');
        $this->form_validation->set_rules('level','level','required');
        $this->form_validation->set_rules('kode_cabang','kode cabang','required');


        
        $id_user=$this->input->post('id_user');
        $nama_lengkap=$this->input->post('nama_lengkap');
        $no_hp=$this->input->post('no_hp');
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $level=$this->input->post('level');
        $kode_cabang=$this->input->post('kode_cabang');

        $data=array(
           'id_user' => $id_user,
           'nama_lengkap' => $nama_lengkap,
           'no_hp' => $no_hp,
           'username' => $username,
           'password' => $password,
           'level' => $level,
           'kode_cabang' => $kode_cabang
        );


         $where=array('id_user'=>$id_user);

        if($this->form_validation->run() !=false){
            $this->M_user->updateUser($where,$data,'users');

            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="far fa-thumbs-up"></i>
            Data User Berhasil Di Ubah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('user/index');
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
         
               <i class="far fa-ban"></i>   Data User Gagal Di Ubah, Pastikan tidak ada data yang kosong!!
             
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('user/index');
             
        }
    }
}


