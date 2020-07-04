<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Dashboard extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Modeldata');
	}

	public function index()
	{
		$data = array(
			'data_makanan'	=> $this->Modeldata->get_makanan(),
		);

		$this->load->view("home", $data);
	}

	public function minuman()
	{
		$data = array(
			'data_minuman'	=> $this->Modeldata->get_minuman(),
		);

		$this->load->view("minuman", $data);
	}



	public function viewData($id)
	{
		$id = $this->uri->segment(4);
		$data = array(
			'makanan' => $this->Modeldata->view($id)
		);
		$this->load->view('view', $data);
	}

	public function viewData2($id)
	{
		$id = $this->uri->segment(4);
		$data = array(
			'minuman' => $this->Modeldata->view2($id)
		);
		$this->load->view('view2', $data);
	}

	public function simpan(){
		$data = array(
			//'no_pesanan'=> uniqid(),
			'no_pesanan' 	=> $this->input->post("no_pesanan"),
			'makanan' 	=> $this->input->post("makanan"),
			'total' 	=> $this->input->post("total"),
			'jumlah' 	=> $this->input->post("jumlah"),
			'status' 	=> $this->input->post("status"),
			'tanggal' 	=> $this->input->post("tanggal"),
			
		);

		$this->Modeldata->simpan($data);
		redirect('pelayan/dashboard');
	}

	public function simpan2(){
		$data = array(
			//'no_pesanan'=> uniqid(),
			'no_pesanan' 	=> $this->input->post("no_pesanan"),
			'total' 	=> $this->input->post("total"),
			'minuman' 	=> $this->input->post("minuman"),
			'jumlah' 	=> $this->input->post("jumlah"),
			'status' 	=> $this->input->post("status"),
			'tanggal' 	=> $this->input->post("tanggal"),
			
		);

		$this->Modeldata->simpan($data);
		redirect('pelayan/dashboard/minuman');
	}	
}