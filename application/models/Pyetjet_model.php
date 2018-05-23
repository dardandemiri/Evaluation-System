<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pyetjet_model extends CI_Model {

	function get()
	{
		$q = $this->db->get('pytjet');
		return $q->result();	
	}

	function shto_pyetje()
	{
		
		$data = array(
        	'pytja' => $this->input->post('pytja')
		);

		return $this->db->insert('pytjet', $data);
	}

}

/* End of file pyetjet_model.php */
/* Location: ./application/models/pyetjet_model.php */