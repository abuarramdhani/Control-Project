<?php 

class Admincontrol extends CI_Controller
{

	function __construct(){
		parent::__construct();
		$this->load->model('adminmodel');
		$this->load->helper('url');
		$this->load->database();
	}

	function index(){
		$this->load->view('login_v');
	}

	// USER
	function user(){
		$this->load->view('Admin/user');
	}

	function data_user(){
		$data=$this->adminmodel->user_list();
		echo json_encode($data);
	}

	function get_user(){
		$unameuser=$this->input->get('id');
		$data=$this->adminmodel->get_user_by_kode($unameuser);
		echo json_encode($data);
	}

	function simpan_user(){
		$namauser=$this->input->post('namauser');
		$unameuser=$this->input->post('unameuser');
		$passuser=$this->input->post('passuser');
		$jobtituser=$this->input->post('jobtituser');
		$data=$this->adminmodel->simpan_user($namauser,$unameuser,$passuser,$jobtituser);
		echo json_encode($data);
	}

	function update_user(){
		$namauser=$this->input->post('namauser');
		$unameuser=$this->input->post('unameuser');
		$passuser=$this->input->post('passuser');
		$jobtituser=$this->input->post('jobtituser');
		$data=$this->adminmodel->update_user($namauser,$unameuser,$passuser,$jobtituser);
		echo json_encode($data);
	}

	function hapus_user(){
		$unameuser=$this->input->post('kode');
		$data=$this->adminmodel->hapus_user($unameuser);
		echo json_encode($data);
	}

	// CONTAINER
	function cont(){
		$this->load->view('Admin/container');
	}

	function data_cont(){
		$data=$this->adminmodel->cont_list();
		echo json_encode($data);
	}
	
	function get_cont(){
		$nocon=$this->input->get('id');
		$data=$this->adminmodel->get_cont_by_kode($nocon);
		echo json_encode($data);
	}

	function simpan_cont(){
		$nocon=$this->input->post('nocon');
		$sizecon=$this->input->post('sizecon');
		$data=$this->adminmodel->simpan_cont($nocon,$sizecon);
		echo json_encode($data);
	}

	function update_cont(){
		$nocon=$this->input->post('nocon');
		$sizecon=$this->input->post('sizecon');
		$data=$this->adminmodel->update_cont($nocon,$sizecon);
		echo json_encode($data);
	}

	function hapus_cont(){
		$nocon=$this->input->post('kode');
		$data=$this->adminmodel->hapus_cont($nocon);
		echo json_encode($data);
	}

	// AGENT
	function agen(){
		$this->load->view('Admin/agen');
	}

	function data_agen(){
		$data=$this->adminmodel->agen_list();
		echo json_encode($data);
	}

	function get_agen(){
		$creag=$this->input->get('id');
		$data=$this->adminmodel->get_agen_by_kode($creag);
		echo json_encode($data);
	}

	function simpan_agen(){
		$creag=$this->input->post('creag');
		$namag=$this->input->post('namag');
		$adag=$this->input->post('adag');
		$data=$this->adminmodel->simpan_agen($creag,$namag,$adag);
		echo json_encode($data);
	}

	function update_agen(){
		$creag=$this->input->post('creag');
		$namag=$this->input->post('namag');
		$adag=$this->input->post('adag');
		$data=$this->adminmodel->update_agen($creag,$namag,$adag);
		echo json_encode($data);
	}

	function hapus_agen(){
		$creag=$this->input->post('kode');
		$data=$this->adminmodel->hapus_agen($creag);
		echo json_encode($data);
	}

	// SHIP
	function ship(){
		$this->load->view('Admin/ship');
	}

	function data_ship(){
		$data=$this->adminmodel->ship_list();
		echo json_encode($data);
	}

	function get_ship(){
		$creship=$this->input->get('id');
		$data=$this->adminmodel->get_ship_by_kode($creship);
		echo json_encode($data);
	}

	function simpan_ship(){
		$creship=$this->input->post('creship');
		$namaship=$this->input->post('namaship');
		$adship=$this->input->post('adship');
		$data=$this->adminmodel->simpan_ship($creship,$namaship,$adship);
		echo json_encode($data);
	}

	function update_ship(){
		$creship=$this->input->post('creship');
		$namaship=$this->input->post('namaship');
		$adship=$this->input->post('adship');
		$data=$this->adminmodel->update_ship($creship,$namaship,$adship);
		echo json_encode($data);
	}

	function hapus_ship(){
		$creship=$this->input->post('kode');
		$data=$this->adminmodel->hapus_ship($creship);
		echo json_encode($data);
	}

}