<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Juara extends CI_Controller {

  public function __construct(){
    parent::__construct();
    // if(!$this->session->userdata('id_user'))
    //   redirect('login', 'refresh');

  }

  public function index(){
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('pages/juara');
    $this->load->view('template/footer');
  }

  public function getJuara(){
    $id_event = $this->input->post('id_event');
    $data['data'] = $this->db->query("
        SELECT 
        CASE WHEN A.jenis_pertandingan='FINAL' AND B.hasil='MENANG' THEN 'JUARA 1' 
        WHEN A.jenis_pertandingan='FINAL' AND B.hasil='KALAH' THEN 'JUARA 2'
        ELSE 'JUARA 3' END PERINGKAT, C.nm_team
        FROM tb_pertandingan A, tb_dtl_pertandingan B, tb_team C
        WHERE A.id_pertandingan=B.id_pertandingan
        AND B.id_team=C.id_team
        AND A.id_event='".$id_event."'
        AND ((A.jenis_pertandingan='FINAL') OR (A.jenis_pertandingan='PEREBUTAN JUARA 3' AND hasil='MENANG'))
        ORDER BY PERINGKAT
    ")->result();
  	echo json_encode($data);
  }

}