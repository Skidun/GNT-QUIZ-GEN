<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resposta_model extends CI_Model {
	private $table = 'respostas';

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
	
	public function get_all($id, $pergunta_id)
    {                
        //$this->db->where('id_quiz', $id);
        $this->db->where('id_pergunta', $pergunta_id);
        $this->db->order_by('ordem', 'ASC');
        $this->db->select('*');
        $this->db->from('respostas');
        $this->db->join('perfil', 'perfil.id = respostas.perfil_resposta');


        return $this->db->get();
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

    public function delete($id, $id_quiz, $filtro)
    {
        $this->db->where('id_quiz', $id_quiz);
        $this->db->where($filtro, $id);
        $this->db->delete($this->table);

        return (bool) $this->db->affected_rows(); 
    }

    public function perfil_delete($id, $id_quiz)
    {
        $this->db->where('id_quiz', $id_quiz);
        $this->db->where('perfil_resposta', $id);
        $this->db->delete($this->table);

        return (bool) $this->db->affected_rows(); 
    }

    public function pergunta_delete($id, $id_quiz)
    {
        $this->db->where('id_quiz', $id_quiz);
        $this->db->where('id_pergunta', $id);
        $this->db->delete($this->table);

        return (bool) $this->db->affected_rows(); 
    }
}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */