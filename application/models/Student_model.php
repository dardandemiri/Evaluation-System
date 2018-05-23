<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

	public function get_student($id)
	{
		$q = $this->db->get_where('studenti', array('ID' => $id));
		return $q->result_array();
	}

}

/* End of file student_modell.php */
/* Location: ./application/models/student_modell.php */