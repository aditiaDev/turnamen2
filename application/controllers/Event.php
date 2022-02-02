<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

  public function __construct(){
    parent::__construct();
    // if(!$this->session->userdata('id_user'))
    //   redirect('login', 'refresh');

  }

  public function index(){
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('pages/event');
    $this->load->view('template/footer');
  }

  public function getAllData(){
  	$data['data'] = $this->db->query("
      SELECT id_event, nm_event, DATE_FORMAT(tgl_event, '%d-%b-%Y') tgl_event, 
      CONCAT(DATE_FORMAT(tgl_start_pendaftaran, '%d-%b-%Y %H:%i'), '<br>Sampai<br>', DATE_FORMAT(tgl_selesai_pendaftaran, '%d-%b-%Y %H:%i')) tgl_pendaftaran,
      status , biaya_pendaftaran
      FROM tb_event
      ORDER BY tgl_event DESC
    ")->result();
  	echo json_encode($data);
  }

  public function addData(){
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('pages/addEvent');
    $this->load->view('template/footer');
  }

  public function saveData(){

    $this->load->library('form_validation');
    $this->form_validation->set_rules('nm_event', 'Nama Event', 'required');
    $this->form_validation->set_rules('tgl_event', 'Tanggal Event', 'required');
    $this->form_validation->set_rules('tgl_pendaftaran', 'Tanggal Pendaftaran', 'required');
    $this->form_validation->set_rules('status', 'Status', 'required');
    $this->form_validation->set_rules('biaya_pendaftaran', 'Biaya Pendaftaran', 'required');
    $this->form_validation->set_rules('min_team', 'min_team', 'required|numeric');
    $this->form_validation->set_rules('max_team', 'max_team', 'required|numeric');
    $this->form_validation->set_rules('jml_team_playoff', 'jml_team_playoff', 'required|numeric');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi Event', 'required');

    if($this->form_validation->run() == FALSE){
      $output = array("status" => "error", "message" => validation_errors());
      echo json_encode($output);
      return false;
    }

    $unik = 'EV'.date('Ym');
    $kode = $this->db->query("select MAX(id_event) LAST_NO from tb_event WHERE id_event LIKE '".$unik."%'")->row()->LAST_NO;
    
    $urutan = (int) substr($kode, -4);
    $urutan++;
    $kode = $unik . sprintf("%04s", $urutan);
    
    $tgl_start = date("Y-m-d H:i:s", strtotime(substr($this->input->post('tgl_pendaftaran'),0,16)));
    $tgl_selesai = date("Y-m-d H:i:s", strtotime(substr($this->input->post('tgl_pendaftaran'),-16)));

    $data = array(
              "id_event" => $kode,
              "nm_event" => $this->input->post('nm_event'),
              "tgl_event" => date("Y-m-d", strtotime($this->input->post('tgl_event'))),
              "tgl_start_pendaftaran" => $tgl_start,
              "tgl_selesai_pendaftaran" => $tgl_selesai,
              "status" => $this->input->post('status'),
              "biaya_pendaftaran" => str_replace(",",".",str_replace(".","",$this->input->post('biaya_pendaftaran'))),
              "deskripsi" => $this->input->post('deskripsi'),
              "min_team" => $this->input->post('min_team'),
              "max_team" => $this->input->post('max_team'),
              "jml_team_playoff" => $this->input->post('jml_team_playoff'),
            );
    $this->db->insert('tb_event', $data);
    $output = array("status" => "success", "message" => "Data Berhasil Disimpan", "DOC_NO" => $kode);
    echo json_encode($output);

  }

  public function deleteData(){
    $this->db->where('id_event', $this->input->post('id_event'));
    $this->db->delete('tb_event');

    $output = array("status" => "success", "message" => "Data Berhasil di Hapus");
    echo json_encode($output);
  }

}