<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

  public function __construct(){
    parent::__construct();
    // if(!$this->session->userdata('id_user'))
    //   redirect('login', 'refresh');

  }

  public function index(){
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('pages/team');
    $this->load->view('template/footer');
  }

  public function getAllData(){
  	$data['data'] = $this->db->get('tb_team')->result();
  	echo json_encode($data);
  }

  public function getDataPeserta(){
    $data = $this->db->query("
                SELECT * FROM tb_user WHERE hak_akses='PESERTA' 
                AND status='AKTIF' AND id_user NOT IN (SELECT DISTINCT id_user FROM tb_team)
            ")->result_array();
    echo json_encode($data);
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

  public function saveData(){

    $this->load->library('form_validation');
    $this->form_validation->set_rules('nm_team', 'Nama Team', 'required|is_unique[tb_team.nm_team]');
    $this->form_validation->set_rules('alamat_team', 'Alamat Team', 'required');
    $this->form_validation->set_rules('id_user', 'User', 'required');

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
              "id_user" => $this->input->post('id_user'),
            );

    if(!empty($_FILES['logo']['name'])){
      $upload = $this->_do_upload();
      $data['logo'] = $upload;
    }

    $this->db->insert('tb_team', $data);
    $output = array("status" => "success", "message" => "Data Berhasil Disimpan", "DOC_NO" => $kode);
    echo json_encode($output);

  }

  public function deleteData(){
    $this->db->where('id_team', $this->input->post('id_team'));
    $this->db->delete('tb_team');

    $output = array("status" => "success", "message" => "Data Berhasil di Hapus");
    echo json_encode($output);
  }

}