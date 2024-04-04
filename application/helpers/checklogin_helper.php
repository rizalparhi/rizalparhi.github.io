<?php 

//menyimpan session ke helper
function checklog(){
    $CI =& get_instance(); //di helper tidak bisa menggunakan $this maka di inisialisasi dengan  $CI =& get_instance();
    $level = $CI->session->userdata('level');
    if(!empty($level)){
        redirect('dashboard');
    } 
}


//untuk mengecek apakah sudah login atau belum jadi ketika si session levelnya 0 maka akan di redirect ke halaman login
function checklogin()
{
    $CI = &get_instance(); //di helper tidak bisa menggunakan $this maka di inisialisasi dengan  $CI =& get_instance();
    $level = $CI->session->userdata('level');
    if (empty($level)) {
        redirect('auth/login');
    } 
}