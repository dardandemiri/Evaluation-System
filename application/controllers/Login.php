<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{
		// session_destroy();
		if ($this->session->userdata('is_logged') == 1) {
			redirect(base_url('Lendet'));
		}else{
			$this->load->view('include/header');
			$this->load->view('login_view');
		}
	}

	public function check()
	{
		$id = $this->input->post('id'); // $_POST['id']
		$pass = md5($this->input->post('pass'));

		$q = $this->db->get_where('studenti', array('ID' => $id, 'Password' => $pass));

		$res = $q->result_array();
		if ($q->num_rows() > 0) {
			$data= array(
                'id' => $id,
                'is_logged'=> 1,
                'semestri' => $res[0]['semestri'],
                'dega' => $res[0]['dega_id']
                );
			print_r($data);
    		$this->session->set_userdata($data);
    	redirect(base_url());
		}else{
			$this->load->view('include/header');
			$this->load->view('login_view');
		}
	}

	public function logout()
	{
		session_destroy();
		redirect(base_url());
	}
}
