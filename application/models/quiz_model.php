<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quiz_model extends CI_Model {
	private $table = 'quiz';


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
        $data['user_senha'] = md5($data['user_senha']);
                
        $this->db->insert($this->tabela, $data);

        return (bool) $this->db->affected_rows();
    }

    public function update($id, $data)
    {
        if(isset($data['user_senha']))
            $data['user_senha'] = md5($data['user_senha']);
    
        $this->db->where('user_id', $id);

        $this->db->update($this->tabela, $data);

        return (bool) $this->db->affected_rows();
    }

    public function delete($data)
    {
        $this->db->where('user_id', $data);
        $this->db->delete($this->tabela);

        return (bool) $this->db->affected_rows(); 
    }
}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */