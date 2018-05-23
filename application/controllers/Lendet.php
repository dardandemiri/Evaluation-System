<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lendet extends CI_Controller {

	public function index()
	{
		$this->load->model('Lendet_model');
		$this->load->model('Student_model');
		if ($this->session->userdata('is_logged') == 1) {
			$student_data = $this->session->userdata();
			// print_r($student_data);
			$data['id'] = $student_data['id'];
			$data['studenti'] = $this->Student_model->get_student($data['id']);
			$data['lendet'] =	$this->Lendet_model->get_rated_exams($student_data);
			$data['lendet_pavlersuar'] = $this->Lendet_model->get_not_rated_exams($student_data);

			$this->load->view('include/header');
			$this->load->view('Lendet_view', $data);
		}else{
			$this->load->view('include/header');
			$this->load->view('login_view');
		}
	}

	public function get($lenda_id)
	{
		$this->load->model('Pyetjet_model','pyetjet');
		$data['lenda_id'] = $lenda_id;
		$data['pyetjet'] = $this->pyetjet->get();
		$this->load->view('include/header');
		$this->load->view('formulari_view', $data);
	}

	public function paraqit_lendet()
	{
		$this->load->model('Lendet_model', 'Lendet');
		$student_data = $this->session->userdata();
			// print_r($student_data);
			$student_id = $student_data['id'];

		$test = $this->input->post('lendet');
		
		if( $test != 0)
		{
			foreach ($this->input->post('lendet') as $value) 
			{
				// the $value has the lenda id
				// check if the exam is rated true or false
				$check = $this->Lendet->check_if_exam_is_rated($value, $student_id);

				if($check){
					// if its rated paraqit
					echo '<br />Paraqitur lenden me ID: '.$value;
				}
				echo '.<br /><br /> Lidhja me SEMS behet nga Administratort e UPZ. <br /><br />ID e lendes perdoret per te paraqitur lenden me ID perkatse ne SEMS. ';
			}
		}else {
			redirect('Lendet','refresh');
		}

		echo '<button method="POST" action="'. base_url('Lendet') . '> Kthehu mbrapa  </button>';

	}

	public function save_formular()
	{
		$total = $this->input->post('total_answers');
		$lenda_id = $this->input->post('landa_id');	

		// check if the student is loggedin
		if ($this->session->userdata('is_logged') == 1) {
			$data = array(
				'landa_id'	=>	$lenda_id,
				'studenti_id' => $this->session->userdata('id'),
				'anonim'	=>	$this->input->post('anonim')
			);
			$this->db->insert('vlersimi_lendes', $data);
			$vlersimi_lendes_id = $this->db->insert_id();
			$this->db->where('ID', $lenda_id);
			$this->db->update('lendet', array('statusi' => 1));

			for ($i=0; $i <= $total; $i++) 
			{ 
				$pytja_id = $this->input->post('pytja'.$i);
				$nota = $this->input->post('vlersimi'.$i); //$_POST['vlersimi'.$i]

				$add = array(
					'pytja_id' => $pytja_id, 
					'vlersimi_lendes_id' => $vlersimi_lendes_id,
					'nota_pytjes'	=>	$nota
				);

				$this->db->insert('pergjigjet_pytjeve', $add);
			}

		}else{
			redirect(base_url(),'refresh');
		}
		redirect(base_url(),'refresh');
		echo 'OK';
	}

}
