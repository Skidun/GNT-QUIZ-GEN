<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customizacao_model extends CI_Model {
	private $table = 'configuracoes';

    public function get($id)
    {
                $this->db->where('id_quiz', $id);
                $get = $this->db->get($this->table);
                
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
	
	public function get_all($pergunta_id)
    {                
        //$this->db->where('id_quiz', $id);
        $this->db->where('id_pergunta', $pergunta_id);
        $this->db->order_by('ordem', 'ASC');
        $this->db->select('*');
        //$this->db->from('respostas');
        //$this->db->join('perfil', 'perfil.id = respostas.perfil_resposta');


        return $this->db->get($this->table);
    }

    public function create($id)
    {                
        //$this->db->insert();
        $this->db->query("INSERT INTO `quiz`.`configuracoes` (`id`, `titulo_quiz_font_size`, `titulo_quiz_font_color`, `titulo_quiz_align`, `pergunta_quiz_font_size`, `pergunta_quiz_font_color`, `pergunta_quiz_align`, `link_ref_pergunta_font_size`, `link_ref_pergunta_font_color`, `link_ref_pergunta_align`, `resposta_pergunta_font_size`, `resposta_pergunta_font_color`, `resposta_pergunta_align`, `resposta_pergunta_bg_color`, `botao_perguntas_font_color`, `botao_perguntas_bg_color`, `quiz_bg_img`, `quiz_bg_color`, `resultado_titulo_quiz_font_size`, `resultado_titulo_quiz_font_color`, `resultado_titulo_quiz_align`, `resultado_titulo_faixa_font_size`, `resultado_titulo_faixa_font_color`, `resultado_titulo_faixa_align`, `resultado_porcentagem_font_size`, `resultado_porcentagem_font_color`, `resultado_porcentagem_align`, `resultado_descricao_font_size`, `resultado_descricao_font_color`, `resultado_descricao_align`, `resultado_linkref_font_size`, `resultado_linkref_font_color`, `resultado_linkref_align`, `resultado_botao_font_color`, `resultado_botao_bg_color`, `resultado_bg_img`, `resultado_bg_color`, `id_quiz`) VALUES (NULL, '20px', '333333', 'left', '24px', '333333', 'left', '16px', '333333', 'left', '15px', '333333', 'left', NULL, 'ffffff', 'cc1e59', NULL, 'faab2a', '20px', '333333', 'left', '24px', '333333', 'left', '18px', '333333', 'left', '18px', '333333', 'left', '15px', '333333', 'left', 'ffffff', 'cc1e59', NULL, 'faab2a', ".$id.");");

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

    public function quiz_delete($id_quiz)
    {
        $this->db->where('id_quiz', $id_quiz);
        $this->db->delete($this->table);

        return (bool) $this->db->affected_rows(); 
    }
}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */