<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perguntas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('logado')){
			redirect('login');
		}
	}

	public function index()
	{
		redirect('visualizar-todos-quizes');
	}

	public function perfil($id)
	{
		$data  	= $this->quiz_model->get($id);
		$perfis = $this->perfil_model->get_all($id);
		$option_perfil = '';
		foreach($perfis->result() as $perfil){
			$option_perfil .= '<option value="'.$perfil->id.'">'.$perfil->titulo.'</option>';
		}

		$data['page_title'] 	= ' Perguntas e Respotas do tipo perfil';
		$data['option_perfil'] 	= $option_perfil; 
		$this->template->show('perguntas', $data);
	}

	public function save_pergunta_perfil()
	{
		$data['texto'] 			 = $this->input->get('texto', true);
		$data['link_referencia'] = $this->input->get('link_referencia', true);
		$data['texto_link'] 	 = $this->input->get('texto_link', true);
		$data['imagem'] 		 = $this->input->get('imagem', true);
		$data['id_quiz'] 		 = $this->input->get('id_quiz', true);

		$create = $this->pergunta_model->create($data);

		if($create){
			$this->db->where('id_quiz', $this->input->get('id_quiz', true));
			$query = $this->db->get('perguntas');
			$last = $query->last_row('array');
			$id_pergunta = $last['id'];
			$retorno = array('result'=>'sucesso', 'id_pergunta'=> $id_pergunta);
			echo json_encode($retorno);
		}
	}

}

/* End of file perguntas.php */
/* Location: ./application/controllers/perguntas.php */