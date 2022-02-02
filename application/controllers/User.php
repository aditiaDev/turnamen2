<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  public function __construct(){
    parent::__construct();
    // if(!$this->session->userdata('id_user'))
    //   redirect('login', 'refresh');

  }

  public function index(){
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('pages/user');
    $this->load->view('template/footer');
  }

  public function getAllUser(){
  	$data['data'] = $this->db->get('tb_user')->result();
  	echo json_encode($data);
  }

  public function saveData(){
    
    
    $this->load->library('form_validation');
    $this->form_validation->set_rules('nm_user', 'Nama Pengguna', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_user.username]');
    $this->form_validation->set_rules('password', 'password', 'required');
    $this->form_validation->set_rules('hak_akses', 'Level Akses', 'required');
    $this->form_validation->set_rules('status', 'Status Akun', 'required');

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
    
    $data = array(
              "id_user" => $kode,
              "nm_user" => $this->input->post('nm_user'),
              "username" => $this->input->post('username'),
              "password" => $this->input->post('password'),
              "hak_akses" => $this->input->post('hak_akses'),
              "status" => $this->input->post('status'),
            );
    $this->db->insert('tb_user', $data);
    $output = array("status" => "success", "message" => "Data Berhasil Disimpan");
    echo json_encode($output);

  }

  public function updateData(){

    $this->load->library('form_validation');
    $this->form_validation->set_rules('nm_user', 'Nama Pengguna', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'password', 'required');
    $this->form_validation->set_rules('hak_akses', 'Level Akses', 'required');
    $this->form_validation->set_rules('status', 'Status Akun', 'required');

    if($this->form_validation->run() == FALSE){
      // echo validation_errors();
      $output = array("status" => "error", "message" => validation_errors());
      echo json_encode($output);
      return false;
    }

    $data = array(
      "username" => $this->input->post('username'),
      "password" => $this->input->post('password'),
      "hak_akses" => $this->input->post('hak_akses'),
      "status" => $this->input->post('status'),
    );
    $this->db->where('id_user', $this->input->post('id_user'));
    $this->db->update('tb_user', $data);
    if($this->db->error()['message'] != ""){
      $output = array("status" => "error", "message" => $this->db->error()['message']);
      echo json_encode($output);
      return false;
    }
    $output = array("status" => "success", "message" => "Data Berhasil di Update");
    echo json_encode($output);
  }

  public function deleteData(){
    $this->db->where('id_user', $this->input->post('id_user'));
    $this->db->delete('tb_user');

    $output = array("status" => "success", "message" => "Data Berhasil di Hapus");
    echo json_encode($output);
  }

}