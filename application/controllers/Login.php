<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct(){
    parent::__construct();
    
  }

  public function index(){
    if($this->session->userdata('id_user'))
      redirect('home', 'refresh');

    $this->load->view('login');
  }

  public function login(){
    $this->db->where('username', $this->input->post('username'));  
    $this->db->where('password', $this->input->post('password'));  
    $query = $this->db->get('tb_user');   
    if($query->num_rows() > 0){  
      foreach ($query->result() as $row){   
        $arrdata = array(
          'id_user'=>$row->id_user,
          'hak_akses'=>$row->hak_akses,
          'nm_user'=>$row->nm_user,
        );  
        $this->session->set_userdata($arrdata);
      }

      if($this->session->userdata('hak_akses') == "ADMIN"){
        $url=base_url('home');
      }else{
        $url=base_url('front/addTeam');
      }
      $output = array("status" => "success", "message" => "Login Berhasil", "url" => $url);
    }else{  
      $output = array("status" => "error", "message" => "Login Gagal");  
    }

    echo json_encode($output);
  }

  function logout(){
    $this->session->unset_userdata('id_user');
    $this->session->sess_destroy();
    redirect('/', 'refresh');
  }

  public function register(){
    $this->load->view('register');
  }

  public function signUp(){
    $this->load->library('form_validation');
    $this->form_validation->set_rules('nm_user', 'Nama Pengguna', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_user.username]');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

    if($this->form_validation->run() == FALSE){
      // echo validation_errors();
      $output = array("status" => "error", "message" => validation_errors());
      echo json_encode($output);
      return false;
    }

    $unik = 'US'.date('Ym');
    $kode = $this->db->query("select MAX(id_user) LAST_NO from tb_user WHERE id_user LIKE '".$unik."%'")->row()->LAST_NO;
    
    $urutan = (int) substr($kode, -4);
    $urutan++;
    $kode = $unik . sprintf("%04s", $urutan);

    $dataUser = array(
              "id_user" => $kode,
              "nm_user" => $this->input->post('nm_user'),
              "username" => $this->input->post('username'),
              "password" => $this->input->post('password'),
              "hak_akses" => "PESERTA",
              "status" => "AKTIF",
            );
    $this->db->insert('tb_user', $dataUser);

    $output = array("status" => "success", "message" => "Pembuatan Akun Berhasil");
    echo json_encode($output);
  }

}