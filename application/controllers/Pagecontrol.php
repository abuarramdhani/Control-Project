<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagecontrol extends CI_Controller {

	function __construct()
	{
	parent::__construct();
	$this->load->helper('form');
	$this->load->helper('url');
	$this->load->library('pdf');
	$this->load->model('pagemodel');
	// if($this->session->userdata('masuk') != TRUE){
	// 		$url=base_url();
	// 		redirect($url);
	// 	}
	}

	// LOGIN
	function index(){
		$this->load->view('login_v');
	}

	function login(){
		$username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
		$this->load->model('pagemodel');

		$cek = $this->pagemodel->auth($username , $password);

		if($cek->num_rows() > 0){
			$data=$cek->row_array();
			$this->session->set_userdata('masuk', TRUE);
			if($data['job_tittle']=='OP'){
				$this->session->set_userdata('akses','Operasional');
				$this->session->set_userdata('ses_nama',$data['name']);
				// $this->load->view('dashboard_v');
				redirect('Pagecontrol/dashboardAllDeliv');
			}
			else if($data['job_tittle']=='AP'){
				$this->session->set_userdata('akses','Acount Payable');
				$this->session->set_userdata('ses_nama',$data['name']);
				redirect('Pagecontrol/dashboardAllDeliv');
			}
			else if($data['job_tittle']=='AR'){
				$this->session->set_userdata('akses','Acount Receivable');
				$this->session->set_userdata('ses_nama',$data['name']);
				// $this->load->view('dashboard_v');
				redirect('Pagecontrol/dashboardAllDeliv');
			}
			else if($data['job_tittle']=='Controller'){
				$this->session->set_userdata('akses','Controller');
				$this->session->set_userdata('ses_nama',$data['name']);
				redirect('Pagecontrol/dashboardAllDeliv');
			}
			else if($data['job_tittle']=='Supervisor'){
				$this->session->set_userdata('akses','Supervisor');
				$this->session->set_userdata('ses_nama',$data['name']);
				redirect('Pagecontrol/dashboard');
			}
			else if($data['job_tittle']=='Truck'){
				$this->session->set_userdata('akses','Truck');
				$this->session->set_userdata('ses_nama',$data['name']);
				redirect('Pagecontrol/dashboardAllDeliv');
			}
			else if($data['job_tittle']=='Pajak'){
				$this->session->set_userdata('akses','Pajak');
				$this->session->set_userdata('ses_nama',$data['name']);
				redirect('Pagecontrol/dashPajak');
			}
			else if($data['job_tittle']=='SuperAdmin'){
				$this->session->set_userdata('akses','ADMIN');
				$this->session->set_userdata('ses_nama',$data['name']);
				redirect('Admincontrol/user');
			}	
		}
		else {
			echo $this->session->set_flashdata('msg','Username atau Password Salah!');
			redirect(base_url(), 'refresh');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
	}
	// LOGIN

	function dashboardAllDeliv(){
		if ($this->session->userdata('akses')=='Controller' || $this->session->userdata('akses')=='Acount Receivable' || $this->session->userdata('akses')=='Truck' || $this->session->userdata('akses')=='Operasional' || $this->session->userdata('akses')=='Acount Payable' || $this->session->userdata('akses')=='Pajak' ){
		$this->load->model('pagemodel');
		$data['datahasil'] = $this->pagemodel->getAll();
		$data['dataOP'] = $this->pagemodel->ambilOP();
		$data['dataAR'] = $this->pagemodel->getAR();
		$data['dataAP'] = $this->pagemodel->getAP();
		$data['datatruck'] = $this->pagemodel->getTruck();
		$data['NO'] = $this->pagemodel->getNO();
		$this->load->view('dashboardAll_v', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function dashboard(){
		if ($this->session->userdata('akses')=='Supervisor' ){
		$this->load->model('pagemodel');
		$data['datahasil'] = $this->pagemodel->getAll();
		$data['dataOP'] = $this->pagemodel->ambilOP();
		$data['dataAR'] = $this->pagemodel->getAR();
		$data['dataAP'] = $this->pagemodel->getAP();
		$data['datatruck'] = $this->pagemodel->getTruck();
		$data['NO'] = $this->pagemodel->getNO();
		$this->load->view('dashboard_v', $data);
	}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function deldashboard($imo){
		$this->load->model('pagemodel');
		$where = array('IMO' => $imo);
		$this->pagemodel->delTruck($where, 'truck');
		$this->pagemodel->delAP($where, 'ap');
		$this->pagemodel->delAR($where, 'ar');
		$this->pagemodel->delOP($where, 'op');
		redirect('Pagecontrol/dashboard');
	}

	// OP
	function formOP(){
		if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Operasional'){
		$this->load->helper('url');
		$this->load->model('pagemodel');
		$data['nocon'] = $this->pagemodel->getno_con();
		$this->load->view('createOP_v', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function insertno_con(){
		$this->load->model('pagemodel');
		$hidden_nocon=$this->input->post('hidden_nocon');
		$no_container=$this->input->post('no_container');
		echo json_encode($data);	
	}

	function insertOP(){
		$this->load->model('pagemodel');
		$cek = $this->db->query("SELECT * FROM op where IMO='".$this->input->post('IMO')."'")->num_rows();
		if ($cek<=0) {
		$data = array(
			'IMO' => $this->input->post('IMO'),
			'no_container' => $this->input->post('hidden_nocon'),
			'no_shipment' => $this->input->post('no_shipment'),
			'full_empty' => $this->input->post('full_empty'),
			'no_seal' => $this->input->post('no_seal'),
			'stuff_date' => $this->input->post('stuff_date'),
			'origin_town' => $this->input->post('origin_town'),
			'deliv_date' => $this->input->post('deliv_date'),
			'dest_town' => $this->input->post('dest_town'),
			'vessel_name' => $this->input->post('vessel_name'),
			'arv_at_dest' => $this->input->post('arv_at_dest'),
			'unload_at_conc' => $this->input->post('unload_at_conc')
			);

		$data = $this->pagemodel->Insert('op', $data);
		$this->session->set_flashdata('msg', 
				'<div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    Data Berhasil Ditambahkan!
                </div>');
		redirect('Pagecontrol/dashOP');
		} else
		{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    Mohon Maaf, No. IMO Sudah Ada Datanya!!!
                </div>');
			redirect('Pagecontrol/formAP');
		}
	}

	function dashOP(){
		if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Operasional'){
		$this->load->model('pagemodel');
		$data['dataOP'] = $this->pagemodel->ambilOP();
		$this->load->view('dashboard_OP', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function dashOPAll(){
		if ($this->session->userdata('akses')=='Controller' || $this->session->userdata('akses')=='Acount Payable' || $this->session->userdata('akses')=='Acount Receivable' || $this->session->userdata('akses')=='Truck' || $this->session->userdata('akses')=='Pajak' ){
		$this->load->model('pagemodel');
		$data['dataOP'] = $this->pagemodel->ambilOP();
		$this->load->view('dashboardAll_OP', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function editOP($imo){
		if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Operasional'){
		$this->load->model('pagemodel');
		$data['nocon'] = $this->pagemodel->getno_con();
		$data['editop'] = $this->pagemodel->getOPedit($imo);
		$this->load->view('edit_dashOP', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function simpanOP(){
		$this->load->model('pagemodel');
		$data['editop'] = $this->pagemodel->simpanOP();
		redirect('Pagecontrol/dashOP');
	}
	// OP

	// AR
	function formAR(){
		if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Acount Receivable'){
		$this->load->helper('url');
		$this->load->model('pagemodel');
		$data['noIMO'] = $this->pagemodel->getIMO();
		$this->load->view('createAR_v', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function insertAR(){
		$this->load->model('pagemodel');
		$cek = $this->db->query("SELECT * FROM ar where IMO='".$this->input->post('IMO')."'")->num_rows();
		if ($cek<=0) {
		$data = array(
			'IMO' => $this->input->post('IMO'),
			'name_cust' => $this->input->post('name_cust'),
			'inv_cust' => $this->input->post('inv_cust'),
			'inv_date' => $this->input->post('inv_date'),
			'inv_pay_date' => $this->input->post('inv_pay_date'),
			'no_plug' => $this->input->post('no_plug'),
			'inv_plug_date' => $this->input->post('inv_plug_date'),
			'plug_pay_date' => $this->input->post('plug_pay_date')
			);

		$data = $this->pagemodel->Insert('ar', $data);
		$this->session->set_flashdata('msg', 
				'<div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    Data Berhasil Ditambahkan!
                </div>');
		redirect('Pagecontrol/dashAR');
		} else
		{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    Mohon Maaf, No. IMO Sudah Ada Datanya!!!
                </div>');
			redirect('Pagecontrol/formAR');
		}
	}

	 public function dashAR(){
		if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Acount Receivable'){
		$this->load->model('pagemodel');
		$data['dataAR'] = $this->pagemodel->getAR();
		$this->load->view('dashboard_AR', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function dashARAll(){
		if ($this->session->userdata('akses')=='Controller') {
		$this->load->model('pagemodel');
		$data['dataAR'] = $this->pagemodel->getAR();
		$this->load->view('dashboardAll_AR', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function editAR($imo){
	if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Acount Receivable'){
		$this->load->model('pagemodel');
		$data['editar'] = $this->pagemodel->getARedit($imo);
		$this->load->view('edit_dashAR', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function simpanAR(){
		$this->load->model('pagemodel');
		$data['editar'] = $this->pagemodel->simpanAR();
		redirect('Pagecontrol/dashAR');
	}

	function detCust($imo){
		if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Acount Receivable'){
		$this->load->model('pagemodel');
		$data['detCust'] = $this->pagemodel->getpay($imo);
		$data['hasil']= 0;
		$this->load->view('det_Cust', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function detCustPaid($imo){
		if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Acount Receivable'){
		$this->load->model('pagemodel');
		$data['detCustPaid'] = $this->pagemodel->getpay($imo);
		$data['hasil']= 0;
		$this->load->view('det_CustPaid', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function hitung()
	{
		$bil1 = $this->input->post('bil1');
		$bil2 = $this->input->post('bil2');
		$hitung = $this->input->post('hitung');
		$hasil = 0;
		if($hitung == 'PPN 1%'){
			$hasil = $bil1 + ($bil1*(0.01)) + $bil2 - ($bil1*(0.02));
		}
		if ($hitung == 'PPN 10%') {
			$hasil = $bil1 + ($bil1*(0.1)) + $bil2 - ($bil1*(0.02));
		}
		$nilai['hasil'] = $hasil;
		echo json_encode($nilai);
	}

	function simpandetCust(){
		$IMO=$this->input->post('IMO');
		$this->load->model('pagemodel');
		$pay_inv = $this->input->post('value');
		$data['detCust'] = $this->pagemodel->simpanpayCust($IMO,$pay_inv);
		redirect('Pagecontrol/dashAR');
	}

	function simpandetCustPaid(){
		$IMO=$this->input->post('IMO');
		$this->load->model('pagemodel');
		$pay_inv_paid = $this->input->post('value');
		$data['detCustPaid'] = $this->pagemodel->simpanpayCustPaid($IMO,$pay_inv_paid);
		redirect('Pagecontrol/dashAR');
	}

	function detPlug($imo){
		if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Acount Receivable'){
		$this->load->model('pagemodel');
		$data['detPlug'] = $this->pagemodel->getpay($imo);
		$data['hasil']= 0;
		$this->load->view('det_Plug', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function simpandetPlug(){
		$IMO=$this->input->post('IMO');
		$this->load->model('pagemodel');
		$pay_plug = $this->input->post('value');
		$data['detPlug'] = $this->pagemodel->simpanpayPlug($IMO,$pay_plug);
		redirect('Pagecontrol/dashAR');
	}

	function detPlugPaid($imo){
		if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Acount Receivable'){
		$this->load->model('pagemodel');
		$data['detPlugPaid'] = $this->pagemodel->getpay($imo);
		$data['hasil']= 0;
		$this->load->view('det_PlugPaid', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function simpandetPlugPaid(){
		$IMO=$this->input->post('IMO');
		$this->load->model('pagemodel');
		$pay_plug_paid = $this->input->post('value');
		$data['detPlugPaid'] = $this->pagemodel->simpanpayPlugPaid($IMO,$pay_plug_paid);
		redirect('Pagecontrol/dashAR');
	}
	// AR

	// AP
	function formAP(){
		if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Acount Payable'){
		$this->load->helper('url');
		$this->load->model('pagemodel');
		$data['noIMO'] = $this->pagemodel->getIMO();
		$data['nameAgen'] = $this->pagemodel->getname_agen();
		$data['nameShip'] = $this->pagemodel->getname_ship();
		$this->load->view('createAP_v', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function insertAP(){
		$this->load->model('pagemodel');
		$cek = $this->db->query("SELECT * FROM ap where IMO='".$this->input->post('IMO')."'")->num_rows();
		if ($cek<=0) {
		$data = array(
			'IMO' => $this->input->post('IMO'),
			'name_ag' => $this->input->post('name_ag'),
			'inv_ag' => $this->input->post('inv_ag'),
			'inv_ag_date' => $this->input->post('inv_ag_date'),
			'date_ag' => $this->input->post('date_ag'),
			'rent_genset' => $this->input->post('rent_genset'),
			'inv_genset' => $this->input->post('inv_genset'),
			'inv_genset_date' => $this->input->post('inv_genset_date'),
			'date_genset' => $this->input->post('date_genset'),
			'name_ship' => $this->input->post('name_ship'),
			'inv_ship' => $this->input->post('inv_ship'),
			'inv_ship_date' => $this->input->post('inv_ship_date'),
			'date_ship' => $this->input->post('date_ship'),
			'inv_thc' => $this->input->post('inv_thc'),
			'inv_thc_date' => $this->input->post('inv_thc_date'),
			'date_thc' => $this->input->post('date_thc'),
			'inv_handl' => $this->input->post('inv_handl'),
			'inv_handl_date' => $this->input->post('inv_handl_date'),
			'date_handl' => $this->input->post('date_handl'),
			'inv_plug' => $this->input->post('inv_plug'),
			'inv_plug_date' => $this->input->post('inv_plug_date'),
			'date_plug' => $this->input->post('date_plug'),
			'inv_lain' => $this->input->post('inv_lain'),
			'inv_lain_date' => $this->input->post('inv_lain_date'),
			'date_lain' => $this->input->post('date_lain')
			);
		$data = $this->pagemodel->Insert('ap', $data);

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    Data Berhasil Ditambahkan!
                </div>');
		redirect('Pagecontrol/dashAP');
		} else
		{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    Mohon Maaf, No. IMO Sudah Ada Datanya!!!
                </div>');
			redirect('Pagecontrol/formAP');
	}
		redirect('Pagecontrol/dashboard');
	}

	function dashAP(){
		if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Acount Payable'){
		$this->load->model('pagemodel');
		$data['dataAP'] = $this->pagemodel->getAP();
		$this->load->view('dashboard_AP', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function dashAPAll(){
		if ($this->session->userdata('akses')=='Controller') {
		$this->load->model('pagemodel');
		$data['dataAP'] = $this->pagemodel->getAP();
		$this->load->view('dashboardAll_AP', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function editAP($imo){
	if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Acount Payable'){
		$this->load->model('pagemodel');
		$data['name_agen'] = $this->pagemodel->getname_agen();
		$data['name_ship'] = $this->pagemodel->getname_ship();
		$data['editap'] = $this->pagemodel->getAPedit($imo);
		$this->load->view('edit_dashAP', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function simpanAP(){
		$this->load->model('pagemodel');
		$data['editap'] = $this->pagemodel->simpanAP();
		redirect('Pagecontrol/dashAP');
	} 

	function detAgen($imo){
		if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Acount Receivable'){
		$this->load->model('pagemodel');
		$data['detAgen'] = $this->pagemodel->getpayap($imo);
		$data['hasil']= 0;
		$this->load->view('det_Agen', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function simpandetAgen(){
		$IMO=$this->input->post('IMO');
		$this->load->model('pagemodel');
		$pay_ag = $this->input->post('value');
		$data['detAgen'] = $this->pagemodel->simpanpayAgen($IMO,$pay_ag);
		redirect('Pagecontrol/dashAP');
	}

	function detGenset($imo){
		if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Acount Payable'){
		$this->load->model('pagemodel');
		$data['detGenset'] = $this->pagemodel->getpayap($imo);
		$data['hasil']= 0;
		$this->load->view('det_Genset', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function simpandetGenset(){
		$IMO=$this->input->post('IMO');
		$this->load->model('pagemodel');
		$pay_genset = $this->input->post('value');
		$data['detGenset'] = $this->pagemodel->simpanpayGenset($IMO,$pay_genset);
		redirect('Pagecontrol/dashAP');
	}

	function detShip($imo){
	if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Acount Payable'){
		$this->load->model('pagemodel');
		$data['detShip'] = $this->pagemodel->getpayap($imo);
		$data['hasil']= 0;
		$this->load->view('det_Ship', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function simpandetShip(){
		$IMO=$this->input->post('IMO');
		$this->load->model('pagemodel');
		$pay_ship = $this->input->post('value');
		$data['detShip'] = $this->pagemodel->simpanpayShip($IMO,$pay_ship);
		redirect('Pagecontrol/dashAP');
	}

	function detTHC($imo){
		if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Acount Payable'){
		$this->load->model('pagemodel');
		$data['detTHC'] = $this->pagemodel->getpayap($imo);
		$data['hasil']= 0;
		$this->load->view('det_THC', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function simpandetTHC(){
		$IMO=$this->input->post('IMO');
		$this->load->model('pagemodel');
		$pay_thc = $this->input->post('value');
		$data['detTHC'] = $this->pagemodel->simpanpayTHC($IMO,$pay_thc);
		redirect('Pagecontrol/dashAP');
	}

	function detHandl($imo){
		if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Acount Payable'){
		$this->load->model('pagemodel');
		$data['detHandl'] = $this->pagemodel->getpayap($imo);
		$data['hasil']= 0;
		$this->load->view('det_Handl', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function simpandetHandl(){
		$IMO=$this->input->post('IMO');
		$this->load->model('pagemodel');
		$pay_handl = $this->input->post('value');
		$data['detHandl'] = $this->pagemodel->simpanpayHandl($IMO,$pay_handl);
		redirect('Pagecontrol/dashAP');
	}

	function detPlugap($imo){
		if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Acount Payable'){
		$this->load->model('pagemodel');
		$data['detPlugap'] = $this->pagemodel->getpayap($imo);
		$data['hasil']= 0;
		$this->load->view('det_Plugap', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function simpandetPlugap(){
		$IMO=$this->input->post('IMO');
		$this->load->model('pagemodel');
		$pay_plug = $this->input->post('value');
		$data['detPlugap'] = $this->pagemodel->simpanpayPlugap($IMO,$pay_plug);
		redirect('Pagecontrol/dashAP');
	}

	function detLain($imo){
	if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Acount Payable'){
		$this->load->model('pagemodel');
		$data['detLain'] = $this->pagemodel->getpayap($imo);
		$data['hasil']= 0;
		$this->load->view('det_Lain', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function simpandetLain(){
		$IMO=$this->input->post('IMO');
		$this->load->model('pagemodel');
		$pay_lain = $this->input->post('value');
		$data['detLain'] = $this->pagemodel->simpanpayLain($IMO,$pay_lain);
		redirect('Pagecontrol/dashAP');
	}
	// AP

	//Truck
	function formTruck(){
		if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Truck'){
		$this->load->helper('url');
		$this->load->model('pagemodel');
		$data['noIMO'] = $this->pagemodel->getIMO();
		$this->load->view('createTruck_v', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function insertTruck(){
		$this->load->model('pagemodel');
		$cek = $this->db->query("SELECT * FROM truck where IMO='".$this->input->post('IMO')."'")->num_rows();
		if ($cek<=0) {
		$data = array(
			'IMO' => $this->input->post('IMO'),
			'inv_truck' => $this->input->post('inv_truck'),
			'name' => $this->input->post('name'),
			'date' => $this->input->post('date'),
			'tujuan' => $this->input->post('tujuan'),
			'pesanan' => $this->input->post('pesanan'),
			'no_pol' => $this->input->post('no_pol'),
			'jam' => $this->input->post('jam'),
			'muatan' => $this->input->post('muatan'),
			'ukuran' => $this->input->post('ukuran'),
			'b_jajan' => $this->input->post('b_jajan'),
			'b_kom' => $this->input->post('b_kom'),
			'b_kawal' => $this->input->post('b_kawal'),
			'b_lain' => $this->input->post('b_lain')
			);
		$data = $this->pagemodel->Insert('truck', $data);

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    Data Berhasil Ditambahkan!
                </div>');
		redirect('Pagecontrol/dashTruck');
		} else
		{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    Mohon Maaf, No. IMO Sudah Ada Datanya!!!
                </div>');
			redirect('Pagecontrol/formTruck');
	}
		redirect('Pagecontrol/dashboard');
	}

	function dashTruck(){
		if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Truck'){
		$this->load->model('pagemodel');
		$data['dataTruck'] = $this->pagemodel->getTruck();
		$this->load->view('dashboard_Truck', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function dashTruckAll(){
		if ($this->session->userdata('akses')=='Controller') {
		$this->load->model('pagemodel');
		$data['dataTruck'] = $this->pagemodel->getTruck();
		$this->load->view('dashboardAll_Truck', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function editTruck($imo){
		if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Truck'){
		$this->load->model('pagemodel');
		$data['edittruck'] = $this->pagemodel->getTruckedit($imo);
		$this->load->view('edit_dashTruck', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function simpanTruck(){
		$this->load->model('pagemodel');
		$data['edittruck'] = $this->pagemodel->simpanTruck();
		redirect('Pagecontrol/dashTruck');

	}
	//Truck

	// EXPORT TO EXCEL
	function cetak(){
		$this->load->helper('url');
		$this->load->model('pagemodel');
		$this->load->library("excel");
		$object = new PHPExcel();

		$object->setActiveSheetIndex(0);

		$object->getActiveSheet()->setTitle('Sample Sheet'); 
             
        $object->getActiveSheet()->getStyle("A1:M1")->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '#4169E1')
                    ),
                    'font' => array(
                        'color' => array('rgb' => '#FFFFFF')
                    )
                )
            );
 
        $object->getActiveSheet()->getStyle("N1:W1")->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '#3CB371')
                    ),
                    'font' => array(
                        'color' => array('rgb' => '#FFFFFF')
                    )
                )
            );

        $object->getActiveSheet()->getStyle("Q1")->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '#B0E0E6')
                    ),
                    'font' => array(
                        'color' => array('rgb' => '#FFFFFF')
                    )
                )
            );

        $object->getActiveSheet()->getStyle("R1:AO1")->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '#F4A460')
                    ),
                    'font' => array(
                        'color' => array('rgb' => '#FFFFFF')
                    )
                )
            );
#F4A460
        $object->getActiveSheet()->getStyle("AP1:BB1")->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '#CD5C5C')
                    ),
                    'font' => array(
                        'color' => array('rgb' => '#FFFFFF')
                    )
                )
            );

		$table_columns = array("IMO", "No. & Size Container", "No. Shipment", "Name CUST", "No. Seal", "Full/Empty", "Stuffing Date", "Origin Town", "Destination Town", "Vessel Name", "Delivery From JKT (ETD)", "Arv At Dest (ETA)", "Unload At Conc", 
			//13
			"No. Invoice", "Invoice Date", "Invoice Amount", "Invoice Payment Date", "Invoice Paid Amount", "No. Plug", "invoice Plug Date", "Invoice Plug Amount", "Plug Payment Date", "Plug Paid Amount",
			//10
			"No. Faktur",
			//1
			"name AGEN", "invoice AGEN", "Invoice AGEN Date", "payment AGEN", "Payment Date AGEN", "rental GENSET", "Invoice GENSET", "Invoice GENSET Date", "Payment GENSET", "Payment Date GENSET", "Name SHIP", "Invoice SHIP", "Invoice SHIP Date", "Payment SHIP", "Payment Date SHIP", "Invoice THC", "Invoice THC Date", "Payment THC", "Payment Date THC", "Invoice HANDLING", "Invoice HANDLING Date", "Payment HANDLING", "Payment Date HANDLING", "Invoice PLUG", "Invoice PLUG Date", "Payment PLUG", "Payment Date PLUG", "Invoice LAIN", "Invoice LAIN Date", "Payment LAIN", "Date LAIN", 
			//31
			"Invoice TRUCK", "Name TRUCK", "Date TRUCK", "Tujuan", "Pesanan", "No Polisi", "Jam", "Muatan", "Ukuran", "Biaya Jajan", "Biaya Komisi", "Biaya Kawal", "Biaya Lain");
			//13
		$column = 0;

		foreach($table_columns as $field)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}

		$AllData = $this->pagemodel->getAll();

		$excel_row = 2;

		foreach($AllData as $row)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->IMO);
			$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->no_container);
			$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->no_shipment);
			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->name_cust); 
			$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->no_seal); 
			$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->full_empty); 
			$object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->stuff_date); 
			$object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->origin_town); 
			$object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->dest_town); 
			$object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->vessel_name); 
			$object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->deliv_date); 
			$object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->arv_at_dest);
			$object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->unload_at_conc); 

			$object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->inv_cust);
			$object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row->inv_date);
			$object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row->pay_inv);
			$object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $row->inv_pay_date);
			$object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, $row->pay_inv_paid);
			$object->getActiveSheet()->setCellValueByColumnAndRow(18, $excel_row, $row->no_plug);
			$object->getActiveSheet()->setCellValueByColumnAndRow(19, $excel_row, $row->inv_plug_date);
			$object->getActiveSheet()->setCellValueByColumnAndRow(20, $excel_row, $row->pay_plug );
			$object->getActiveSheet()->setCellValueByColumnAndRow(21, $excel_row, $row->plug_pay_date);
			$object->getActiveSheet()->setCellValueByColumnAndRow(22, $excel_row, $row->pay_plug_paid);

			$object->getActiveSheet()->setCellValueByColumnAndRow(23, $excel_row, $row->no_faktur);

			$object->getActiveSheet()->setCellValueByColumnAndRow(24, $excel_row, $row->name_ag);
			$object->getActiveSheet()->setCellValueByColumnAndRow(25, $excel_row, $row->inv_ag);
			$object->getActiveSheet()->setCellValueByColumnAndRow(26, $excel_row, $row->inv_ag_date);
			$object->getActiveSheet()->setCellValueByColumnAndRow(27, $excel_row, $row->pay_ag);
			$object->getActiveSheet()->setCellValueByColumnAndRow(28, $excel_row, $row->date_ag);

			$object->getActiveSheet()->setCellValueByColumnAndRow(29, $excel_row, $row->rent_genset);
			$object->getActiveSheet()->setCellValueByColumnAndRow(30, $excel_row, $row->inv_genset);
			$object->getActiveSheet()->setCellValueByColumnAndRow(31, $excel_row, $row->inv_genset_date);
			$object->getActiveSheet()->setCellValueByColumnAndRow(32, $excel_row, $row->pay_genset);
			$object->getActiveSheet()->setCellValueByColumnAndRow(33, $excel_row, $row->date_genset);

			$object->getActiveSheet()->setCellValueByColumnAndRow(34, $excel_row, $row->name_ship);
			$object->getActiveSheet()->setCellValueByColumnAndRow(35, $excel_row, $row->inv_ship);
			$object->getActiveSheet()->setCellValueByColumnAndRow(36, $excel_row, $row->inv_ship_date);
			$object->getActiveSheet()->setCellValueByColumnAndRow(37, $excel_row, $row->pay_ship);
			$object->getActiveSheet()->setCellValueByColumnAndRow(38, $excel_row, $row->date_ship);

			$object->getActiveSheet()->setCellValueByColumnAndRow(39, $excel_row, $row->inv_thc);
			$object->getActiveSheet()->setCellValueByColumnAndRow(49, $excel_row, $row->inv_thc_date);
			$object->getActiveSheet()->setCellValueByColumnAndRow(41, $excel_row, $row->pay_thc);
			$object->getActiveSheet()->setCellValueByColumnAndRow(42, $excel_row, $row->date_thc);

			$object->getActiveSheet()->setCellValueByColumnAndRow(43, $excel_row, $row->inv_handl);
			$object->getActiveSheet()->setCellValueByColumnAndRow(44, $excel_row, $row->inv_handl_date);
			$object->getActiveSheet()->setCellValueByColumnAndRow(45, $excel_row, $row->pay_handl);
			$object->getActiveSheet()->setCellValueByColumnAndRow(46, $excel_row, $row->date_handl);

			$object->getActiveSheet()->setCellValueByColumnAndRow(47, $excel_row, $row->inv_plug);
			$object->getActiveSheet()->setCellValueByColumnAndRow(48, $excel_row, $row->inv_plug_date);
			$object->getActiveSheet()->setCellValueByColumnAndRow(49, $excel_row, $row->pay_plug);
			$object->getActiveSheet()->setCellValueByColumnAndRow(50, $excel_row, $row->date_plug);

			$object->getActiveSheet()->setCellValueByColumnAndRow(51, $excel_row, $row->inv_lain);
			$object->getActiveSheet()->setCellValueByColumnAndRow(52, $excel_row, $row->inv_lain_date);
			$object->getActiveSheet()->setCellValueByColumnAndRow(53, $excel_row, $row->pay_lain);
			$object->getActiveSheet()->setCellValueByColumnAndRow(54, $excel_row, $row->date_lain);

			$object->getActiveSheet()->setCellValueByColumnAndRow(55, $excel_row, $row->inv_truck);
			$object->getActiveSheet()->setCellValueByColumnAndRow(56, $excel_row, $row->name);
			$object->getActiveSheet()->setCellValueByColumnAndRow(57, $excel_row, $row->date);
			$object->getActiveSheet()->setCellValueByColumnAndRow(58, $excel_row, $row->tujuan);
			$object->getActiveSheet()->setCellValueByColumnAndRow(59, $excel_row, $row->pesanan);
			$object->getActiveSheet()->setCellValueByColumnAndRow(60, $excel_row, $row->no_pol);
			$object->getActiveSheet()->setCellValueByColumnAndRow(61, $excel_row, $row->jam);
			$object->getActiveSheet()->setCellValueByColumnAndRow(62, $excel_row, $row->muatan);
			$object->getActiveSheet()->setCellValueByColumnAndRow(63, $excel_row, $row->ukuran);
			$object->getActiveSheet()->setCellValueByColumnAndRow(64, $excel_row, $row->b_jajan);
			$object->getActiveSheet()->setCellValueByColumnAndRow(65, $excel_row, $row->b_kom);
			$object->getActiveSheet()->setCellValueByColumnAndRow(66, $excel_row, $row->b_kawal);
			$object->getActiveSheet()->setCellValueByColumnAndRow(67, $excel_row, $row->b_lain);
			$excel_row++;
		}

		$object->getActiveSheet()->getColumnDimension('A')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('C')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('D')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('E')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('F')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('G')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('H')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('I')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('J')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('K')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('L')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('M')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('N')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('O')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('P')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('R')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('S')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('T')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('U')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('V')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('W')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('X')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('Y')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('Z')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('AA')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('AB')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('AC')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('AD')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('AE')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('AF')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('AG')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('AH')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('AI')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('AJ')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('AK')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('AL')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('AM')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('AN')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('AO')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('AP')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('AQ')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('AR')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('AS')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('AT')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('AU')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('AV')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('AW')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('AX')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('AY')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('AZ')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('BA')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('BB')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('BC')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('BD')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('BE')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('BF')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('BG')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('BH')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('BI')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('BJ')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('BK')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('BL')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('BM')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('BN')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('BO')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('BP')->setWidth(20);

		$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Dispotition: attachment;filename="Delivery From JKT.xls"');
		$object_writer->save('php://output');	
	}
		
	// EXPORT TO EXCEL

	//EXPORT TO PDF
    function exportTruck($IMO){
    	$this->load->model('pagemodel');
       	$data = $this->pagemodel->getTruckid($IMO);
       	 foreach ($data as $row) {
        $pdf = new FPDF('L','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        
        // mencetak string 
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(20,5,'NO. IMO : '.$row->IMO);
        $pdf->Cell(150,5,'NO.   :      '.$row->inv_truck,0,1,'R');
        $pdf->Cell(170,5,'TGL. : '.$row->date,0,1,'R');
        $pdf->Ln(1);
        $pdf->SetFont('Arial','B',16);
        // $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(190,5,'SPKs',0,1,'C');

        // $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,5,'SURAT PERINTAH KERJA (SOPIR)',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        // $pdf->Cell(190,7,'Email: rsiasakinaidaman@gmail.com',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,2,'',0,1);
        $pdf->SetFont('Arial','',12);
        // $date= date('l, d  F  Y');
        $pdf->Cell(190,7,'Ditugaskan Kepada :',0,1,'L');
        
            $pdf->SetFont('Arial','',11);
            $pdf->Cell(40,7,'Nama');
            $pdf->Cell(10,7,$row->name);
            $pdf->Cell(60,7,'No. Mobil',0,0,'R');
            $pdf->Cell(30,7,$row->no_pol,0,0,'R');
            $pdf->Ln(5);
            $pdf->Cell(40,7,'Tanggal');
            $pdf->Cell(10,7,$row->date);
            $pdf->Cell(50,7,'Jam',0,0,'R');
            $pdf->Cell(28,7,$row->jam,0,0,'R');
            $pdf->Ln(5);
            $pdf->Cell(40,7,'Tujuan');
            $pdf->Cell(45,7,$row->tujuan);
            $pdf->Ln(5);
            $pdf->Cell(40,7,'Order');
            $pdf->Cell(45,7,$row->pesanan);
            $pdf->Ln(5);
            $pdf->Cell(40,7,'No. Mobil');
            $pdf->Cell(37,7,$row->no_pol);
            $pdf->Ln(5);
            $pdf->Cell(40,7,'Jam');
            $pdf->Cell(35,7,$row->jam); 
            $pdf->Ln(10);
            $pdf->Cell(40,7,'Muatan');
            $pdf->Cell(35,7,$row->muatan); 
            $pdf->Cell(31,7,'Ukuran',0,0,'R');
            $pdf->Cell(22,7,$row->ukuran,0,0,'R');
            $pdf->Ln(5);
            $pdf->Cell(40,7,'Biaya');
            $pdf->Cell(53,7,'a. Uang Jalan',0,0,'L'); 
            $pdf->Cell(30,7,'Rp. '.$row->b_kawal,0,0,'L'); 
            $pdf->Ln(5);
            $pdf->Cell(40,7,'');
            $pdf->Cell(53,7,'a. Komisi',0,0,'L'); 
            $pdf->Cell(30,7,'Rp. '.$row->b_kom,0,0,'L'); 
            $pdf->Ln(5);
            $pdf->Cell(40,7,'');
            $pdf->Cell(53,7,'a. Kawalan',0,0,'L'); 
            $pdf->Cell(30,7,'Rp. '.$row->b_kom,0,0,'L'); 
            $pdf->Ln(5);
            $pdf->Cell(40,7,'');
            $pdf->Cell(53,7,'a. .................',0,0,'L'); 
            $pdf->Cell(30,7,'Rp. '.$row->b_lain,0,0,'L'); 
            $pdf->Ln(12);
        // }

         $pdf->Cell(10,3,'',0,1);

         $pdf->SetFont('Arial','B',10);
        // $pdf->Cell(7,6,'No',1,0);
        $pdf->Cell(45,2,'Sopir',0,0,'C');
        $pdf->Cell(65,2,'Pengurus',0,0,'C');
        $pdf->Cell(35,2,'Disetujui Oleh',0,1,'C');
        $pdf->Ln(10);
        // $no=0;
        $pdf->SetFont('Arial','',10);

        // foreach ($pemeriksaan as $row){ 
         // $no++;
            // $pdf->Cell(7,6, $row->b_lain ,1,0);
            $pdf->Cell(45,2,'_______________',0,0,'C');
            $pdf->Cell(65,2,'_______________',0,0,'C');
            $pdf->Cell(37,2,'_______________',0,1,'C');
        }

        $pdf->Output('');
  }
	//EXPORT TO PDF

  	//dashboard Back
  	function dashboard2(){
  		if ($this->session->userdata('akses')=='Supervisor'){
		$this->load->model('pagemodel');
		$data['datahasil'] = $this->pagemodel->getAll2();
		$data['dataIMO'] = $this->pagemodel->getIMO2();
		$data['dataAP'] = $this->pagemodel->getAP2();
		$data['datatruck'] = $this->pagemodel->getTruck2();
		$this->load->view('dashboard_v2', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function dashboardAll2(){
		if ($this->session->userdata('akses')=='Controller' || $this->session->userdata('akses')=='Operasional' || $this->session->userdata('akses')=='Acount Payable' || $this->session->userdata('akses')=='Acount Receivable' || $this->session->userdata('akses')=='Truck' || $this->session->userdata('akses')=='Pajak' ){
		$this->load->model('pagemodel');
		$data['datahasil'] = $this->pagemodel->getAll2();
		$data['dataIMO'] = $this->pagemodel->getIMO2();
		$data['dataAP'] = $this->pagemodel->getAP2();
		$data['datatruck'] = $this->pagemodel->getTruck2();
		$this->load->view('dashboardAll_v2', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function deldashboard2($imo){
		$this->load->model('pagemodel');
		$where = array('IMO_v2' => $imo);
		$this->pagemodel->delTruck2($where, 'truck2');
		$this->pagemodel->delAP2($where, 'ap2');
		redirect('Pagecontrol/dashboard2');
	}
  	//dashboard Back

  	//AP2
  	function formAP2(){
  		if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Acount Payable') {
		$this->load->helper('url');
		$this->load->model('pagemodel');
		$data['noIMO'] = $this->pagemodel->getIMO();
		$this->load->view('createAP2_v', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function insertAP2(){
		$this->load->model('pagemodel');
		$cek = $this->db->query("SELECT * FROM ap2 where IMO='".$this->input->post('IMO')."'")->num_rows();
		if ($cek<=0) {
		$data = array(
			'IMO' => $this->input->post('IMO'),
			'IMO_v2' => $this->input->post('IMO_v2'),
			'name_cust' => $this->input->post('name_cust'),
			'inv_cust' => $this->input->post('inv_cust'),
			'inv_ag' => $this->input->post('inv_ag'),
			'pay_ag' => $this->input->post('pay_ag'),
			'inv_genset' => $this->input->post('inv_genset'),
			'pay_genset' => $this->input->post('pay_genset'),
			'inv_ship' => $this->input->post('inv_ship'),
			'pay_ship' => $this->input->post('pay_ship')
			);
		$data = $this->pagemodel->Insert('ap2', $data);

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    Data Berhasil Ditambahkan!
                </div>');
		redirect('Pagecontrol/dashAP2');
		} else
		{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    Mohon Maaf, No. IMO Sudah Ada Datanya!!!
                </div>');
			redirect('Pagecontrol/formAP2');
	}
		redirect('Pagecontrol/dashboard2');
	}

	function dashAP2(){
		if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Acount Payable') {
		$this->load->model('pagemodel');
		$data['dataAP'] = $this->pagemodel->getAP2();
		$this->load->view('dashboard_AP2', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function dashAP2All(){
		if ($this->session->userdata('akses')=='Controller') {
		$this->load->model('pagemodel');
		$data['dataAP'] = $this->pagemodel->getAP2();
		$this->load->view('dashboardAll_AP2', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function editAP2($imo){
		if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Acount Payable'){
		$this->load->model('pagemodel');
		$data['editap'] = $this->pagemodel->getAPedit2($imo);
		$this->load->view('edit_dashAP2', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function simpanAP2(){
		$this->load->model('pagemodel');
		$data['editap'] = $this->pagemodel->simpanAP2();
		redirect('Pagecontrol/dashAP2');
	}
  	//AP2

  	//truck2
	function formTruck2(){
		if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Truck'){
		$this->load->helper('url');
		$this->load->model('pagemodel');
		$data['noIMO'] = $this->pagemodel->getIMO2All();
		$this->load->view('createTruck2_v', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

  	function dashTruck2(){
  		if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Truck'){
		$this->load->model('pagemodel');
		$data['dataTruck'] = $this->pagemodel->getTruck2();
		$this->load->view('dashboard_truck2', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function dashTruck2All(){
		if ($this->session->userdata('akses')=='Controller') {
		$this->load->model('pagemodel');
		$data['dataTruck'] = $this->pagemodel->getTruck2();
		$this->load->view('dashboardAll_truck2', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}


	function insertTruck2(){
		$this->load->model('pagemodel');
		$cek = $this->db->query("SELECT * FROM truck2 where IMO_v2='".$this->input->post('IMO_v2')."'")->num_rows();
		if ($cek<=0) {
		$data = array(
			'IMO_v2' => $this->input->post('IMO_v2'),
			'name_truck' => $this->input->post('name_truck'),
			'inv_truck' => $this->input->post('inv_truck'),
			'pay_truck' => $this->input->post('pay_truck')
			
			);
		$data = $this->pagemodel->Insert('truck2', $data);

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    Data Berhasil Ditambahkan!
                </div>');
		redirect('Pagecontrol/dashTruck2');
		} else
		{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    Mohon Maaf, No. IMO Sudah Ada Datanya!!!
                </div>');
			redirect('Pagecontrol/formTruck2');
	}
		redirect('Pagecontrol/dashboard2');
	} 

	function editTruck2($imo){
		if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Truck'){
		$this->load->model('pagemodel');
		$data['edittruck'] = $this->pagemodel->getTruckedit2($imo);
		$this->load->view('edit_dashTruck2', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function simpanTruck2(){
		if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Truck'){
		$this->load->model('pagemodel');
		$data['edittruck'] = $this->pagemodel->simpanTruck2();
		redirect('Pagecontrol/dashTruck2');
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}
  	//truck2

  	//pajak
	function dashPajak(){
		if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Pajak'){
		$this->load->model('pagemodel');
		$data['dataAR'] = $this->pagemodel->getAR();
		$this->load->view('dashboard_Pajak', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function dashPajakAll(){
		if ($this->session->userdata('akses')=='Controller') {
		$this->load->model('pagemodel');
		$data['dataAR'] = $this->pagemodel->getAR();
		$this->load->view('dashboardAll_Pajak', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function editnoFaktur($imo){
		if ($this->session->userdata('akses')=='Supervisor' || $this->session->userdata('akses')=='Pajak'){
		$this->load->model('pagemodel');
		$data['editpajak'] = $this->pagemodel->getnoFaktur($imo);
		$this->load->view('edit_noFaktur', $data);
		}else{
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}

	function simpannoFaktur(){
		$this->load->model('pagemodel');
		$data['editpajak'] = $this->pagemodel->simpannoFaktur();
		redirect('Pagecontrol/dashPajak');
	}
  	//pajak

}
