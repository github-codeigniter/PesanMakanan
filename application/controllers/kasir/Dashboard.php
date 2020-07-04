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
			'data'	=> $this->Modeldata->get_pelanggan(),
		);

		$this->load->view("home", $data);
	}

	public function bayar($id)
	{
		$id = $this->uri->segment(4);
		$data = array(
			'bayar' => $this->Modeldata->bayar($id)
		);
		$this->load->view('bayar', $data);
	}

	public function update(){
		$id = $this->input->post("id");
		$data = array(

			'status' => $this->input->post("status"),
		);

		$this->Modeldata->update($id, $data);

		// $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.</div>');
		redirect('kasir/dashboard');

	}
	
}