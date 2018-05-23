<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/zgjedhja_view');
	}

	public function lendet()
	{
		$this->load->model('Lendet_model');
		$data['deget'] = $this->Lendet_model->get_deget();
		$data['lendet'] = $this->Lendet_model->get_lendet();
		$data['dega_name'] = 'Te gjitha deget';

		$this->load->view('include/header');
		$this->load->view('pasqyra_lendeve', $data);
	}

	public function profesoret()
	{
		$this->load->model('Profesori_model', 'prof');
		// $data['deget'] = $this->Lendet_model->get_deget();
		// $data['lendet'] = $this->Lendet_model->get_lendet();
		$data['dega_name'] = 'Te gjitha deget';
		$data['profesoret'] = $this->prof->get_all()->result();
 
		$this->load->view('include/header');
		$this->load->view('admin/profesoret_view', $data);
	}

	public function profesori($id = null)
	{
		$this->load->model('Profesori_model', 'prof');
		$this->load->model('Lendet_model', 'lendet');
		// $this->load->library('lendet');

		if($id != null)
			$data['profesori'] = $this->prof->get_prof($id);
		else
			redirect(base_url('profesoret'));

		$data['profesori'] = $this->prof->get_prof($id)->result();
		//merr te gjitha lendet 
		$lendet = $this->lendet->get_prof_lendet($id)->result_array();
		
		$mesatarja = 0;
		for ($i=0; $i < count($lendet); $i++) { 
			$pergjigjet = $this->lendet->get_mesataren($lendet[$i]['ID'])->result_array();
			if(count($pergjigjet) != 0){
				for ($j=0; $j < count($pergjigjet); $j++) { 
					$mesatarja += $pergjigjet[$j]['nota_pytjes'];
				}
				$mesatarja = $mesatarja / count($pergjigjet);
				$lendet[$i]['mesatarja'] = $mesatarja;
				
			}else{
				$lendet[$i]['mesatarja'] = 0;
			}
			$mesatarja = 0;
		}

		$data['lendet'] = $lendet;
		$this->load->view('include/header');
		$this->load->view('admin/prof_view', $data);
	}

	public function filter()
	{
		$dega = $this->input->post('filter');
		if($dega == 0) $dega=null;
		$this->load->model('Lendet_model');
		$data['deget'] = $this->Lendet_model->get_deget();
		$data['lendet'] = $this->Lendet_model->get_lendet($dega);
		if ($dega == null) {
			$data['dega_name'] = 'Te gjitha deget';
		}else{
			$data['dega_name'] = $this->Lendet_model->get_degen($dega);
		}
		$this->load->view('include/header');
		$this->load->view('pasqyra_lendeve', $data);
	}

	public function statistika($id)
	{
		$this->load->model('Lendet_model');
		$data['pytjet']	= $this->Lendet_model->statistika_per_lenden($id);
		$data['pytjetc']= $this->Lendet_model->numro_pyetjet();
		$data['profi']= $this->Lendet_model->detajet_per_lenden_profin($id);
		$this->load->view('include/header');
		$this->load->view('admin/statistikat_view', $data);
	}



	function add_pyetje()
	{
		$this->load->model('Pyetjet_model');

		$this->Pyetjet_model->shto_pyetje();

		redirect(base_url('Admin'),'refresh');
	}

	function shto_pytje()
	{
		$this->load->view('include/header');
		$this->load->view('shto_pytje');
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */