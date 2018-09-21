<?php 

class Adminmodel extends CI_Model
{

	function __construct(){
		parent::__construct();		
	}

	function user_list(){
		$hasil=$this->db->query("SELECT * FROM user");
		return $hasil->result();
	}

	function simpan_user($namauser,$unameuser,$passuser,$jobtituser){
		$hasil=$this->db->query("INSERT INTO user (name,username,password,job_tittle)VALUES('$namauser','$unameuser','$passuser','$jobtituser')");
		return $hasil;
	}

	function get_user_by_kode($unameuser){
		$hsl=$this->db->query("SELECT * FROM user WHERE username='$unameuser'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'name' => $data->name,
					'username' => $data->username,
					'password' => $data->password,
					'job_tittle' => $data->job_tittle,
					);
			}
		}
		return $hasil;
	}

	function update_user($namauser,$unameuser,$passuser,$jobtituser){
		$hasil=$this->db->query("UPDATE user SET name='$namauser',password='$passuser',job_tittle='$jobtituser' WHERE username='$unameuser'");
		return $hasil;
	}

	function hapus_user($unameuser){
		$hasil=$this->db->query("DELETE FROM user WHERE username='$unameuser'");
		return $hasil;
	}

	// AGENT
	function agen_list(){
		$hasil=$this->db->query("SELECT * FROM agent");
		return $hasil->result();
	}

	function simpan_agen($creag,$namag,$adag){
		$hasil=$this->db->query("INSERT INTO agent (credit_code,name_agen,address)VALUES('$creag','$namag','$adag')");
		return $hasil;
	}

	function get_agen_by_kode($creag){
		$hsl=$this->db->query("SELECT * FROM agent WHERE credit_code='$creag'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'credit_code' => $data->credit_code,
					'name_agen' => $data->name_agen,
					'address' => $data->address,
					);
			}
		}
		return $hasil;
	}

	function update_agen($creag,$namag,$adag){
		$hasil=$this->db->query("UPDATE agent SET name_agen='$namag',address='$adag' WHERE credit_code='$creag'");
		return $hasil;
	}

	function hapus_agen($creag){
		$hasil=$this->db->query("DELETE FROM agent WHERE credit_code='$creag'");
		return $hasil;
	}

	// CONTAINER
	function cont_list(){
		$hasil=$this->db->query("SELECT * FROM container");
		return $hasil->result();
	}

	function simpan_cont($nocon,$sizecon){
		$hasil=$this->db->query("INSERT INTO container (no_container,size)VALUES('$nocon','$sizecon')");
		return $hasil;
	}

	function get_cont_by_kode($nocon){
		$hsl=$this->db->query("SELECT * FROM container WHERE no_container='$nocon'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'no_container' => $data->no_container,
					'size' => $data->size,
					);
			}
		}
		return $hasil;
	}

	function update_cont($nocon,$sizecon){
		$hasil=$this->db->query("UPDATE container SET size='$sizecon' WHERE no_container='$nocon'");
		return $hasil;
	}

	function hapus_cont($nocon){
		$hasil=$this->db->query("DELETE FROM container WHERE no_container='$nocon'");
		return $hasil;
	}

	// SHIP
	function ship_list(){
		$hasil=$this->db->query("SELECT * FROM ship");
		return $hasil->result();
	}

	function simpan_ship($creship,$namaship,$adship){
		$hasil=$this->db->query("INSERT INTO ship (credit_code,name_ship,address)VALUES('$creship','$namaship','$adship')");
		return $hasil;
	}

	function get_ship_by_kode($creship){
		$hsl=$this->db->query("SELECT * FROM ship WHERE credit_code='$creship'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'credit_code' => $data->credit_code,
					'name_ship' => $data->name_ship,
					'address' => $data->address,
					);
			}
		}
		return $hasil;
	}

	function update_ship($creship,$namaship,$adship){
		$hasil=$this->db->query("UPDATE ship SET name_ship='$namaship',address='$adship' WHERE credit_code='$creship'");
		return $hasil;
	}

	function hapus_ship($creship){
		$hasil=$this->db->query("DELETE FROM ship WHERE credit_code='$creship'");
		return $hasil;
	}
}