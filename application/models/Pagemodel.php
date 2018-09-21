<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagemodel extends CI_Model
{
	function auth($username, $password){
		$sql=$this->db->query("SELECT * from user WHERE username='$username' AND password='$password' ");
		return $sql;
	}

	function getAPedit($imo){
        $IMO = $this->db->from('ap')
                              ->join('op','ap.IMO = op.IMO')
                              ->where('ap.IMO',$imo)
                              ->get()
                              ->result();
            return $IMO;
	}

	function simpanAP(){
        $IMO = $this->input->post('IMO');

        $data = array (
        	'IMO' => $_POST['IMO'],
        	'name_ag' => $_POST['name_ag'],
            'inv_ag' => $_POST['inv_ag'],
			'inv_ag_date' => $_POST['inv_ag_date'],
			'date_ag' => $_POST['date_ag'],
			'rent_genset' => $_POST['rent_genset'],
            'inv_genset' => $_POST['inv_genset'],
			'inv_genset_date' => $_POST['inv_genset_date'],
			'date_genset' => $_POST['date_genset'],
			'name_ship' => $_POST['name_ship'],
            'inv_ship' => $_POST['inv_ship'],
			'inv_ship_date' => $_POST['inv_ship_date'],
			'date_ship' => $_POST['date_ship'],
            'inv_thc' => $_POST['inv_thc'],
			'inv_thc_date' => $_POST['inv_thc_date'],
			'date_thc' => $_POST['date_thc'],
            'inv_handl' => $_POST['inv_handl'],
			'inv_handl_date' => $_POST['inv_handl_date'],
			'date_handl' => $_POST['date_handl'],
            'inv_plug' => $_POST['inv_plug'],
			'inv_plug_date' => $_POST['inv_plug_date'],
			'date_plug' => $_POST['date_plug'],
            'inv_lain' => $_POST['inv_lain'],
			'inv_lain_date' => $_POST['inv_lain_date'],
			'date_lain' => $_POST['date_lain']
        	);
        if($IMO){
        	$this->db->where('IMO', $IMO);
            $this->db->update('ap', $data);
        }
        else
        {
        	$this->db->insert('ap', $data);
        }
	}

	function getOPedit($imo){
        $IMO = $this->db->from('op')
                              ->where('op.IMO',$imo)
                              ->get()
                              ->result();
            return $IMO;
	}

	function simpanOP(){
        $IMO = $this->input->post('IMO');
        
        $data = array (
        	'IMO' => $this->input->post('IMO'),
			'no_container' => $_POST['hidden_nocon'],
			'no_shipment' => $_POST['no_shipment'],
            'no_seal' => $_POST['no_seal'],
			'full_empty' => $_POST['full_empty'],
			'stuff_date' => $_POST['stuff_date'],
			'origin_town' => $_POST['origin_town'],
			'deliv_date' => $_POST['deliv_date'],
			'dest_town' => $_POST['dest_town'],
			'vessel_name' => $_POST['vessel_name'],
			'arv_at_dest' => $_POST['arv_at_dest'],
			'unload_at_conc' => $_POST['unload_at_conc']
        	);
        if($IMO){
        	$this->db->where('IMO', $IMO);
            $this->db->update('op', $data);
        }
        else
        {
        	$this->db->insert('op', $data);
        }
	}

    function delTruck($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function delAR($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function delAP($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function delOP($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function delAP2($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function delTruck2($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

	function getARedit($imo){
        $IMO = $this->db->from('ar')
                              ->join('op','ar.IMO = op.IMO')
                              ->where('ar.IMO',$imo)
                              ->get()
                              ->result();
            return $IMO;
	}

	function simpanAR(){
        $IMO = $this->input->post('IMO');
        	
        $data = array (
        	'IMO' => $_POST['IMO'],
			'inv_cust' => $_POST['inv_cust'],
			'name_cust' => $_POST['name_cust'],
			'no_plug' => $_POST['no_plug'],
            'inv_date' => $_POST['inv_date'],
            'inv_pay_date' => $_POST['inv_pay_date'],
            'inv_plug_date' => $_POST['inv_plug_date'],
            'plug_pay_date' => $_POST['plug_pay_date']
        	);

        if($IMO){
        	$this->db->where('IMO', $IMO);
            $this->db->update('ar', $data);
        }
        else
        {
        	$this->db->insert('ar', $data);
        }
	}

	function getTruckedit($imo){
        $IMO = $this->db->from('truck')
                              ->join('op','truck.IMO = op.IMO')
                              ->where('truck.IMO',$imo)
                              ->get()
                              ->result();
            return $IMO;
	}

	function simpanTruck(){
        $IMO = $this->input->post('IMO');
        	
        $data = array (
        	'IMO' => $_POST['IMO'],
        	'inv_truck' => $_POST['inv_truck'],
			'name' => $_POST['name'],
			'date' => $_POST['date'],
			'tujuan' => $_POST['tujuan'],
			'pesanan' => $_POST['pesanan'],
			'no_pol' => $_POST['no_pol'],
			'jam' => $_POST['jam'],
			'muatan' => $_POST['muatan'],
			'ukuran' => $_POST['ukuran'],
			'b_jajan' => $_POST['b_jajan'],
			'b_kom' => $_POST['b_kom'],
			'b_kawal' => $_POST['b_kawal'],
			'b_lain' => $_POST['b_lain']
        	);
        if($IMO){
        	$this->db->where('IMO', $IMO);
            $this->db->update('truck', $data);
        }
        else
        {
        	$this->db->insert('truck', $data);
        }
	}

	function getTruckid($IMO){
		$data = $this->db->from('truck')
    				 ->join('op','truck.IMO=op.IMO')
    				 ->where('truck.IMO', $IMO)
    				->get()
                     ->result();
        return $data;
	}

	function getAll(){
		$this->db->select('*');
		$this->db->from('op');
		$this->db->join('ar', 'op.IMO = ar.IMO');
		$this->db->join('ap', 'op.IMO = ap.IMO');
		$this->db->join('truck', 'op.IMO = truck.IMO');
		$data = $this->db->get();
		return $data->result();
	}


	function ambilOP(){
		$this->db->select('*');
		$this->db->from('op');
		$data = $this->db->get();
		return $data->result();
	}

	function getAR(){
		$this->db->select('*');
		$this->db->from('ar');
		$data = $this->db->get();
		return $data->result();
	}

	function getAP(){
		$this->db->select('*');
		$this->db->from('ap');
		$data = $this->db->get();
		return $data->result();
	}

	function getTruck(){
		$this->db->select('*');
		$this->db->from('truck');
		$data = $this->db->get();
		return $data->result();
	}

	function getNO(){
		$this->db->select('op.no_container');
		$this->db->from('ap');
		$this->db->join('op', 'ap.IMO = op.IMO', 'join');
		$data = $this->db->get();
		return $data->result();
	}

	function getIMO(){
		$this->db->select('op.IMO');
		$this->db->from('op');
		$data = $this->db->get();
		return $data->result();
	}

	public function Insert($table,$data){
		$res = $this->db->insert($table, $data);
		return $res;
	}

	public function ExportExcel(){
        // $query = $this->db->query("SELECT * from eimport");
        $this->db->select('*');
		$this->db->from('op');
		$this->db->join('ar', 'op.IMO = ar.IMO');
		$this->db->join('ap', 'op.IMO = ap.IMO');
		$data = $this->db->get();
		return $data->result();

        // if($data->num_rows() > 0){
        //     foreach($data->result() as $jumlah){
        //         $hasil[] = $jumlah;
        //     }
        //     return $hasil;
        // }
    }

    function getAll2(){
    	$this->db->select('*');
		$this->db->from('op');
		$this->db->join('ap2', 'op.IMO = ap2.IMO');
		$this->db->join('truck2', 'ap2.IMO_v2 = truck2.IMO_v2');
		$data = $this->db->get();
		return $data->result();
    }

    function getAP2(){
		$this->db->select('*');
		$this->db->from('ap2');
		$data = $this->db->get();
		return $data->result();
	}

	function getTruck2(){
		$this->db->select('*');
		$this->db->from('truck2');
		$data = $this->db->get();
		return $data->result();
	}

	function getIMO2(){
		$this->db->select('op.IMO');
		$this->db->from('op');
		$this->db->join('ap2', 'op.IMO = ap2.IMO');
		$data = $this->db->get();
		return $data->result();
	}

	function getIMO2All(){
		$this->db->select('ap2.IMO_v2');
		$this->db->from('ap2');
		$data = $this->db->get();
		return $data->result();
	}

	function getAPedit2($imo){
        $IMO = $this->db->from('ap2')
                              ->where('ap2.IMO_v2',$imo)
                              ->get()
                              ->result();
            return $IMO;
	}

	function simpanAP2(){
        $IMO_v2 = $this->input->post('IMO_v2');
 
        $data = array (
        	'IMO' => $_POST['IMO'],
        	'IMO_v2' => $_POST['IMO_v2'],
        	'name_cust' => $_POST['name_cust'],
			'inv_cust' => $_POST['inv_cust'],
			'inv_ag' => $_POST['inv_ag'],
			'pay_ag' => $_POST['pay_ag'],
			'inv_genset' => $_POST['inv_genset'],
			'pay_genset' => $_POST['pay_genset'],
			'inv_ship' => $_POST['inv_ship'],
			'pay_ship' => $_POST['pay_ship']
        	);
        if($IMO_v2){
        	$this->db->where('IMO_v2', $IMO_v2);
            $this->db->update('ap2', $data);
        }
        else
        {
        	$this->db->insert('ap2', $data);
        }
	}

	function getTruckedit2($imo){
        $IMO = $this->db->from('truck2')
                              ->join('ap2','truck2.IMO_v2 = ap2.IMO_v2')
                              ->where('truck2.IMO_v2',$imo)
                              ->get()
                              ->result();
            return $IMO;
	}

	function simpanTruck2(){
        $IMO = $this->input->post('IMO_v2');
        	
        $data = array (
        	'IMO_v2' => $_POST['IMO_v2'],
			'name_truck' => $_POST['name_truck'],
			'inv_truck' => $_POST['inv_truck'],
			'pay_truck' => $_POST['pay_truck']
			
        	);
        if($IMO){
        	$this->db->where('IMO_v2', $IMO_v2);
            $this->db->update('truck2', $data);
        }
        else
        {
        	$this->db->insert('truck2', $data);
        }
	}

	function getnoFaktur($imo){
        $IMO = $this->db->from('ar')
                              ->where('ar.IMO',$imo)
                              ->get()
                              ->result();
            return $IMO;
	}

	function simpannoFaktur(){
        $IMO = $this->input->post('IMO');
        	
        $data = array (
			'no_faktur' => $_POST['no_faktur']
			
        	);
        if($IMO){
        	$this->db->where('IMO', $IMO);
            $this->db->update('ar', $data);
        }
        else
        {
        	$this->db->insert('ar', $data);
        }
	}

	function getpay($imo){
        $IMO = $this->db->from('ar')
                              ->where('ar.IMO',$imo)
                              ->get()
                              ->result();
            return $IMO;
	}

	function simpanpayCust($IMO,$pay_inv){
        	
        $data = array (
			'pay_inv' => $pay_inv
        	);
        if($IMO){
        	$this->db->where('IMO', $IMO);
            $this->db->update('ar', $data);
        }
        else
        {
        	$this->db->insert('ar', $data);
        }
	}

    function simpanpayCustPaid($IMO,$pay_inv_paid){
            
        $data = array (
            'pay_inv_paid' => $pay_inv_paid
            );
        if($IMO){
            $this->db->where('IMO', $IMO);
            $this->db->update('ar', $data);
        }
        else
        {
            $this->db->insert('ar', $data);
        }
    }

	function simpanpayPlug($IMO,$pay_plug){
        	
        $data = array (
			'pay_plug' => $pay_plug
        	);
        if($IMO){
        	$this->db->where('IMO', $IMO);
            $this->db->update('ar', $data);
        }
        else
        {
        	$this->db->insert('ar', $data);
        }
	}

    function simpanpayPlugPaid($IMO,$pay_plug_paid){
            
        $data = array (
            'pay_plug_paid' => $pay_plug_paid
            );
        if($IMO){
            $this->db->where('IMO', $IMO);
            $this->db->update('ar', $data);
        }
        else
        {
            $this->db->insert('ar', $data);
        }
    }

	function getpayap($imo) {
        $IMO = $this->db->from('ap')
                              ->where('ap.IMO',$imo)
                              ->get()
                              ->result();
            return $IMO;
	}
	

	function simpanpayAgen($IMO,$pay_ag){
        	
        $data = array (
			'pay_ag' => $pay_ag
        	);
        if($IMO){
        	$this->db->where('IMO', $IMO);
            $this->db->update('ap', $data);
        }
        else
        {
        	$this->db->insert('ap', $data);
        }
	}

	function simpanpayGenset($IMO,$pay_genset){
        	
        $data = array (
			'pay_genset' => $pay_genset
        	);
        if($IMO){
        	$this->db->where('IMO', $IMO);
            $this->db->update('ap', $data);
        }
        else
        {
        	$this->db->insert('ap', $data);
        }
	}

	function simpanpayShip($IMO,$pay_ship){
        	
        $data = array (
			'pay_ship' => $pay_ship
        	);
        if($IMO){
        	$this->db->where('IMO', $IMO);
            $this->db->update('ap', $data);
        }
        else
        {
        	$this->db->insert('ap', $data);
        }
	}

	function simpanpayTHC($IMO,$pay_thc){
        	
        $data = array (
			'pay_thc' => $pay_thc
        	);
        if($IMO){
        	$this->db->where('IMO', $IMO);
            $this->db->update('ap', $data);
        }
        else
        {
        	$this->db->insert('ap', $data);
        }
	}

	function simpanpayHandl($IMO,$pay_handl){
        	
        $data = array (
			'pay_handl' => $pay_handl
        	);
        if($IMO){
        	$this->db->where('IMO', $IMO);
            $this->db->update('ap', $data);
        }
        else
        {
        	$this->db->insert('ap', $data);
        }
	}

	function simpanpayPlugap($IMO,$pay_plug){
        	
        $data = array (
			'pay_plug' => $pay_plug
        	);
        if($IMO){
        	$this->db->where('IMO', $IMO);
            $this->db->update('ap', $data);
        }
        else
        {
        	$this->db->insert('ap', $data);
        }
	}

	function simpanpayLain($IMO,$pay_lain){
        	
        $data = array (
			'pay_lain' => $pay_lain
        	);
        if($IMO){
        	$this->db->where('IMO', $IMO);
            $this->db->update('ap', $data);
        }
        else
        {
        	$this->db->insert('ap', $data);
        }
	}

    function getname_agen(){
        $this->db->select('agent.name_agen');
        $this->db->from('agent');
        $data = $this->db->get();
        return $data->result();
    }

    function getname_ship(){
        $this->db->select('ship.name_ship');
        $this->db->from('ship');
        $data = $this->db->get();
        return $data->result();
    }

    function getno_con(){
        $this->db->select('*');
        $this->db->from('container');
        $data = $this->db->get();
        return $data->result();
    }

}