<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quiz_model extends CI_Model {
	private $table = 'quiz';

    public function get($id = false)
    {
                if($id)
                    $this->db->where('id', $id);
                $get = $this->db->get($this->table);
                if($id)
                    return $get->row_array();
                if($get->num_rows > 0)
                    return $get->result_array();
                return array();
    }

    public function valida_timestamp($id, $time_stamp)
    {
                $this->db->where('id', $id);
                $this->db->where('data_alteracao', $time_stamp);
                return $this->db->get($this->table);
    }

	public function count_rows()
    {
        return $this->db->count_all_results($this->table);
    }
	
	public function get_all($de = 0, $quantidade = 0)
    {                
        #ordenacao
        $this->db->order_by('id', 'DESC');
        # Limite  
        $this->db->limit($quantidade, $de);
        # Executa a consulta
                
        return $this->db->get($this->table);
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

    public function delete($data)
    {
        $this->db->where('id', $data);
        $this->db->delete($this->table);

        return (bool) $this->db->affected_rows(); 
    }
}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */