<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faixa_model extends CI_Model {
	private $table = 'faixa';

    public function get($id = false)
    {
                if($id)
                    $this->db->where('id_quiz', $id);
                $get = $this->db->get($this->table);
                if($id)
                        return $get->row_array();
                if($get->num_rows > 0)
                    return $get->result_array();
                return array();
    }

	public function count_rows($id)
    {
        $this->db->where('id_quiz', $id);
        return $this->db->count_all_results($this->table);
    }
	
	public function get_all($id)
    {                
        $this->db->where('id_quiz', $id);
        $this->db->order_by('ordem', 'ASC');

        return $this->db->get($this->table);
    }

    public function get_resposta($id)
    {                
        $this->db->where('id', $id);
        $get = $this->db->get($this->table);
            
        return $get->row_array();
        if($get->num_rows > 0)
            return $get->result_array();
        return array();
    }

    public function create($data)
    {                
        $this->db->insert($this->table, $data);

        return (bool) $this->db->affected_rows();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);

        $this->db->update($this->table, $data);

        return (bool) $this->db->affected_rows();
    }

    public function delete($id, $id_quiz)
    {
        $this->db->where('id', $id)->where('id_quiz', $id_quiz);
        $this->db->delete($this->table);

        return (bool) $this->db->affected_rows(); 
    }

    public function quiz_delete($id)
    {
        $this->db->where('id_quiz', $id);
        $this->db->delete($this->table);

        return (bool) $this->db->affected_rows(); 
    }
}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */