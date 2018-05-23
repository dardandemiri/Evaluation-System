<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lendet_model extends CI_Model {

	function get_prof_lendet($prof_id)
	{
		$this->db->where('prof_id', $prof_id);
		return $this->db->get('lendet');
	}

	function get_all($studenti)
	{
		// print_r($studenti);
		// $this->db->join('lenda_per_degen', 'lenda_per_degen.dega_id'); 	
		$this->db->join('lenda_per_degen', 'lenda_per_degen.landa_id = lendet.ID');
		$q = $this->db->get_where('lendet',array('lenda_per_degen.semestri' => $studenti['semestri'], 'lenda_per_degen.dega_id'=> $studenti['dega']));
		return $q->result();
	}

	function get_lendet($dega = null)
	{
		$this->db->select('lendet.ID as lenda_id, lendet.*, lenda_per_degen.*, deget.*, profesori.Emri as profi, profesori.Titulli as titulli');
		$this->db->join('lenda_per_degen', 'lenda_per_degen.landa_id = lendet.ID'); //
		$this->db->join('deget', 'deget.ID = lenda_per_degen.dega_id');
		$this->db->join('profesori', 'profesori.ID = lendet.prof_id');

		if ($dega != null) {
			$q = $this->db->get_where('lendet', array('deget.ID' => $dega));
		}else{
			$q = $this->db->get('lendet');
		}

		return $q->result();
	}

	function get_deget()
	{
		$q = $this->db->get('deget');
		return $q->result();
	}

	function get_mesataren($lenda_id)
	{
		return $this->db->query("
			SELECT pp.nota_pytjes 
			FROM pergjigjet_pytjeve as pp, lendet as l, vlersimi_lendes as vl
			WHERE l.ID = vl.landa_id
			AND pp.vlersimi_lendes_id = vl.ID
			AND l.ID = $lenda_id
		");
		

		// return $this->db->get();
	}

	function get_degen($id)
	{
		$q = $this->db->get_where('deget', array('ID' => $id));
		$q = $q->result_array();
		return $q[0]['name'];
	}

	function statistika_per_lenden($lenda_id)
	{
		$this->db->join('vlersimi_lendes', 'vlersimi_lendes.landa_id = lendet.ID');
		$this->db->join('pergjigjet_pytjeve', 'pergjigjet_pytjeve.vlersimi_lendes_id = vlersimi_lendes.ID');
		$this->db->join('pytjet', 'pytjet.ID = pergjigjet_pytjeve.pytja_id');
		$q = $this->db->get_where('lendet', array('lendet.ID' => $lenda_id));
		
		return $q->result_array();
	}

	function detajet_per_lenden_profin($lenda_id)
	{
		$this->db->select('profesori.* , lendet.Emri as lenda');
		$this->db->join('profesori', 'profesori.ID = lendet.prof_id');
		$q = $this->db->get_where('lendet', array('lendet.ID' => $lenda_id));
		return $q->result_array();
	}

	function numro_pyetjet()
	{
		$q = $this->db->get('pytjet');
		return $q->num_rows();
	}

	function get_not_rated_exams($student_info)
	{
		$id = $student_info['id'];
		$dega_id = $student_info['dega'];
		$semestri = $student_info['semestri'];
		$q = $this->db->query('SELECT * FROM lendet, lenda_per_degen WHERE lendet.ID NOT IN (SELECT landa_id FROM vlersimi_lendes WHERE studenti_id = '.$id.') AND lenda_per_degen.landa_id = lendet.ID AND lenda_per_degen.dega_id = '.$dega_id.' AND lenda_per_degen.semestri = '.$semestri);
		return $q->result();
	}

	function get_rated_exams($student_info)
	{
		$id = $student_info['id'];
		$dega_id = $student_info['dega'];
		$semestri = $student_info['semestri'];
		$q = $this->db->query('SELECT * FROM lendet, lenda_per_degen WHERE lendet.ID IN (SELECT landa_id FROM vlersimi_lendes WHERE studenti_id = '.$id.') AND lenda_per_degen.landa_id = lendet.ID AND lenda_per_degen.dega_id = '.$dega_id.' AND lenda_per_degen.semestri = '.$semestri);
		return $q->result();
	}

	function get_lendet_of_student($student_id, $semestri, $dega_id)
	{
		$this->db->join('vlersimi_lendes', 'vlersimi_lendes.');
	}

	function check_if_exam_is_rated($lenda_id, $student_id)
	{
		$this->db->where('landa_id', $lenda_id);
		$this->db->where('studenti_id', $student_id);
		$q = $this->db->get('vlersimi_lendes');
		if($q->num_rows() > 0)
		{
			return true;
		}else{
			return false;
		}
	}



}

/* End of file lendet_model.php */
/* Location: ./application/models/lendet_model.php */