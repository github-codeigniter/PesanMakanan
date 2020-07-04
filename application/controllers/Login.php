<?php

/**
 * 
 */
class Login extends CI_Controller
{	
	function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('ModelData');
	}

	public function index()
	{
		//$this->load->view("login");

		if($this->ModelData->is_logged_in())
            {
                //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
                if($this->session->userdata("role") == "kasir"){
                            redirect('kasir/dashboard');
                        }else{
                            redirect('pelayan/dashboard');
                        }

            }else{

                //jika session belum terdaftar

                //set form validation
                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');

                //set message form validation
                // $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                //     <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

                //cek validasi
                if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
                $username = $this->input->post("username", TRUE);
                $password = MD5($this->input->post('password', TRUE));

                //checking data via model
                $checking = $this->ModelData->check_login('user', array('username' => $username), array('password' => $password));

                //jika ditemukan, maka create session
                if ($checking != FALSE) {
                    foreach ($checking as $user) {

                        $session_data = array(
                            'id'	=> $user->id,
							'role'		=> $user->role,
							'username'	=> $user->username,
							'password'	=> $user->password,
							'nama'	=> $user->nama
                        );
                        //set session userdata
                        $this->session->set_userdata($session_data);

                        //redirect berdasarkan level user
                        if($this->session->userdata("role") == "kasir"){
                            redirect('kasir/dashboard');
                        }else{
                            redirect('pelayan/dashboard');
                        }

                    }
                }else{
                    $this->load->view('login');
                }

            }else{
                //$data["title"] = "Login"; 
                $this->load->view('login');
            }

        }
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}