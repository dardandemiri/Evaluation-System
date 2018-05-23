<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profesori_model extends CI_Model {

	function get_all()
	{
		return $this->db->get('profesori');
	}

	function get_prof($id)
	{
		$this->db->where('ID', $id);
		return $this->db->get('profesori');
	}

}

/* End of file Profesori_model.php */
/* Location: ./application/models/Profesori_model.php */