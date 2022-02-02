<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
class Front extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $params = array('server_key' => 'SB-Mid-server-ij2O22aUOUuH5-RZB5Tyyynn', 'production' => false);
    $this->load->library('midtrans');
    $this->midtrans->config($params);
    $this->load->helper('url');
  }

  public function index(){
    $this->load->view('front/index');
  }

  public function showEvent(){
    $tgl_mulai=$this->input->post('tanggal_mulai');
    $tgl_sampai=$this->input->post('tanggal_sampai');
    if($tgl_mulai<>"" AND $tgl_sampai<>""){
      $where_tgl="AND DATE_FORMAT(tgl_event, '%d-%b-%Y') >= '".$this->input->post('tanggal_mulai')."'
                  AND DATE_FORMAT(tgl_event, '%d-%b-%Y') <= '".$this->input->post('tanggal_sampai')."'";
    }
    $rows = $this->db->query("
        SELECT id_event, nm_event, DATE_FORMAT(tgl_event, '%d-%b-%Y') tgl_event, 
        CONCAT(DATE_FORMAT(tgl_start_pendaftaran, '%d-%b-%y %H:%i'), ' - ', DATE_FORMAT(tgl_selesai_pendaftaran, '%d-%b-%y %H:%i')) tgl_pendaftaran,
        status, biaya_pendaftaran
        FROM tb_event
        WHERE 
        status LIKE '%".$this->input->post('status')."%' 
        ".@$where_tgl."
        ORDER BY tgl_event ASC
    ")->result_array();
    $i=0;
    foreach($rows as $row){
      $data[$i]['id_event'] = $row['id_event'];
      $data[$i]['nm_event'] = $row['nm_event'];
      $data[$i]['tgl_event'] = $row['tgl_event'];
      $data[$i]['tgl_pendaftaran'] = $row['tgl_pendaftaran'];
      $data[$i]['biaya_pendaftaran'] = number_format($row['biaya_pendaftaran'],2,',','.');
      $i++;
    }

  	echo json_encode($data);
  }

  public function addTeam(){
    $this->db->where('id_user', $this->session->userdata('id_user'));
    $query = $this->db->get('tb_team');   
    if($query->num_rows() > 0){
      redirect('front/team', 'refresh');
    }

    $this->load->view('front/addTeam');
  }

  private function _do_upload(){
		$config['upload_path']          = 'assets/images/team/';
    $config['allowed_types']        = 'gif|jpg|jpeg|png';
    $config['max_size']             = 5000; //set max size allowed in Kilobyte
    $config['max_width']            = 4000; // set max width image allowed
    $config['max_height']           = 4000; // set max height allowed
    $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

    $this->load->library('upload', $config);

    if(!$this->upload->do_upload('logo')) //upload and validate
    {
      $data['inputerror'] = 'logo';
			$data['message'] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}

  public function saveTeam(){

    $this->load->library('form_validation');
    $this->form_validation->set_rules('nm_team', 'Nama Team', 'required|is_unique[tb_team.nm_team]');
    $this->form_validation->set_rules('alamat_team', 'Alamat Team', 'required');

    if($this->form_validation->run() == FALSE){
      $output = array("status" => "error", "message" => validation_errors());
      echo json_encode($output);
      return false;
    }

    $unik = 'TM'.date('Ym');
    $kode = $this->db->query("select MAX(id_team) LAST_NO from tb_team WHERE id_team LIKE '".$unik."%'")->row()->LAST_NO;
    
    $urutan = (int) substr($kode, -4);
    $urutan++;
    $kode = $unik . sprintf("%04s", $urutan);
    
    $data = array(
              "id_team" => $kode,
              "nm_team" => $this->input->post('nm_team'),
              "alamat_team" => $this->input->post('alamat_team'),
              "id_user" => $this->session->userdata('id_user'),
            );

    if(!empty($_FILES['logo']['name'])){
      $upload = $this->_do_upload();
      $data['logo'] = $upload;
    }

    $this->db->insert('tb_team', $data);
    $output = array("status" => "success", "message" => "Data Berhasil Disimpan", "DOC_NO" => $kode);
    echo json_encode($output);

  }

  public function Team(){
    $data['data'] = $this->db->query("SELECT * FROM tb_team WHERE id_user='".$this->session->userdata('id_user')."'")->result_array();
    $this->load->view('front/team', $data);
  }

  public function dtlEvent($id){
    $data['data'] = $this->db->query("SELECT id_event, nm_event, DATE_FORMAT(tgl_event, '%d-%b-%Y') tgl_event, 
    CONCAT(DATE_FORMAT(tgl_start_pendaftaran, '%d-%b-%y %H:%i'), ' - ', DATE_FORMAT(tgl_selesai_pendaftaran, '%d-%b-%y %H:%i')) tgl_pendaftaran,
    status, biaya_pendaftaran, deskripsi 
    FROM tb_event WHERE id_event='".$id."'")->result_array();
    $this->load->view('front/dtlEvent',$data);
  }

  // public function pembayaran(){
  //   $data['mid'] = $this->midtrans->status('828784954');
  //   $this->load->view('front/pembayaran');
  // }

  public function turnamenku(){
    $data['data'] = $this->db->query("SELECT C.id_event, C.nm_event, DATE_FORMAT(C.tgl_event, '%d-%b-%Y') tgl_event, 
    CONCAT(DATE_FORMAT(C.tgl_start_pendaftaran, '%d-%b-%y %H:%i'), ' - ', DATE_FORMAT(C.tgl_selesai_pendaftaran, '%d-%b-%y %H:%i')) tgl_pendaftaran,
    C.status, C.biaya_pendaftaran FROM tb_pendaftaran A,
    tb_team B, tb_event C
    WHERE A.id_team=B.id_team
    AND A.id_event=C.id_event
    AND A.status_pendaftaran='AKTIF'
    AND B.id_user='".$this->session->userdata('id_user')."'")->result_array();
    $this->load->view('front/turnamenku', $data);
  }

  public function jadwal(){
    
    $this->load->view('front/jadwal');
  }

  public function hasilPertandingan(){
    
    $this->load->view('front/hasilPertandingan');
  }

  public function pembagianGrup(){
    
    $this->load->view('front/pembagianGrup');
  }

  public function peserta(){
    
    $this->load->view('front/peserta');
  }

  public function savePeserta(){
    
    $this->load->library('form_validation');
    $this->form_validation->set_rules('nm_peserta', 'Nama Anggota', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat Anggota', 'required');

    if($this->form_validation->run() == FALSE){
      // echo validation_errors();
      $output = array("status" => "error", "message" => validation_errors());
      echo json_encode($output);
      return false;
    }

    $id_team = $this->db->query("SELECT id_team FROM tb_team WHERE id_user='".$this->session->userdata('id_user')."'")->row()->id_team;
    
    $data = array(
              "nm_peserta" => $this->input->post('nm_peserta'),
              "alamat" => $this->input->post('alamat'),
              "id_team" => $id_team,
            );
    $this->db->insert('tb_peserta', $data);
    $output = array("status" => "success", "message" => "Data Berhasil Disimpan");
    echo json_encode($output);
  }

  public function getPesertaById(){
    $data['data'] = $this->db->query("SELECT * FROM tb_peserta WHERE id_team IN (
      SELECT id_team FROM tb_team WHERE id_user='".$this->session->userdata('id_user')."'
      )")->result();
  	echo json_encode($data);
  }

  public function deletePeserta(){
    $this->db->where('id_peserta', $this->input->post('id_peserta'));
    $this->db->delete('tb_peserta');

    $output = array("status" => "success", "message" => "Data Berhasil di Hapus");
    echo json_encode($output);
  }

}