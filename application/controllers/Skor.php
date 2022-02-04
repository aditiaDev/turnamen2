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
    if($this->input->post('id_grup') <> ""){
      $q_grup = "AND TB3.id_grup = '".$this->input->post('id_grup')."'";
    }
    $sql = "SELECT TB3.nm_grup,ASD.id_team, nm_team, SUM(IFNULL(MENANG,0)) MENANG, SUM(IFNULL(KALAH,0)) KALAH, SUM(IFNULL(SERI,0)) SERI, SUM(skor) SKOR FROM(
                SELECT A.id_event, C.id_team, C.nm_team, CASE WHEN B.hasil='MENANG' THEN 1 END MENANG, 
                CASE WHEN B.hasil='KALAH' THEN 1 END KALAH, 
                CASE WHEN B.hasil='SERI' THEN 1 END SERI, B.skor
                FROM tb_pertandingan A, tb_dtl_pertandingan B, tb_team C
                WHERE A.id_pertandingan=B.id_pertandingan
                AND A.jenis_pertandingan='GRUP'
                AND B.id_team=C.id_team
                AND A.id_event='".$this->input->post('id_event')."'
            ) AS ASD, tb_jadwal_grup TB2, tb_grup TB3
            WHERE ASD.id_team=TB2.id_team
            AND ASD.id_event=TB2.id_event
            AND TB2.id_grup=TB3.id_grup
            ".@$q_grup."
            GROUP BY ASD.id_event,id_team, nm_team
            ORDER BY SKOR DESC, nm_grup ASC";
  	$data['data'] = $this->db->query($sql)->result();
  	echo json_encode($data);
  }

  public function getGrup(){
    $sql = $this->db->query("SELECT DISTINCT B.id_grup, B.nm_grup FROM tb_jadwal_grup A, tb_grup B
    WHERE A.id_grup=B.id_grup
    AND A.id_event='".$this->input->post('id_event')."'
    ORDER BY B.id_grup")->result_array();
    // print_r($sql);
    echo "<option value=''>ALL</option>";
    foreach($sql as $row){
      echo "<option value='".$row['id_grup']."'>".$row['nm_grup']."</option>";
    }
  }

}