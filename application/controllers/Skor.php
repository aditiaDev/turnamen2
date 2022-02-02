<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skor extends CI_Controller {

  public function __construct(){
    parent::__construct();
    // if(!$this->session->userdata('id_user'))
    //   redirect('login', 'refresh');

  }

  public function index(){
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('pages/skorTeam');
    $this->load->view('template/footer');
  }

  public function getAllData(){
    $sql = "SELECT id_team, nm_team, SUM(IFNULL(MENANG,0)) MENANG, SUM(IFNULL(KALAH,0)) KALAH, SUM(IFNULL(SERI,0)) SERI, SUM(skor) SKOR FROM(
              SELECT C.id_team, C.nm_team, CASE WHEN B.hasil='MENANG' THEN 1 END MENANG, 
              CASE WHEN B.hasil='KALAH' THEN 1 END KALAH, 
              CASE WHEN B.hasil='SERI' THEN 1 END SERI, B.skor
              FROM tb_pertandingan A, tb_dtl_pertandingan B, tb_team C
              WHERE A.id_pertandingan=B.id_pertandingan
              AND A.jenis_pertandingan='GRUP'
              AND B.id_team=C.id_team
              AND A.id_event='".$this->input->post('id_event')."'
          ) AS ASD
          GROUP BY id_team, nm_team
          ORDER BY SKOR DESC";
  	$data['data'] = $this->db->query($sql)->result();
  	echo json_encode($data);
  }

}