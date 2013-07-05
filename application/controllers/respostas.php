<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Respostas extends CI_Controller {

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

	public function save_resposta_perfil()
	{
		$data['resposta'] 			 = $this->input->get('texto', true);
		$data['tipo_resposta'] 	 = $this->input->get('tipo_resposta', true);
		$data['perfil_resposta'] = $this->input->get('perfil_resposta', true);
		$data['id_pergunta'] 	 = $this->input->get('id_pergunta', true);
		$data['id_quiz'] 		 = $this->input->get('id_quiz', true);

		$create = $this->resposta_model->create($data);

		if($create){
			$retorno = 'sucesso';
			echo $retorno;
		}else{
			$retorno = 'falha';
			echo $retorno;
		}
	}

	public function update_resposta_perfil()
	{
		$id   					 = $this->input->get('id_resposta', true);
		$data['resposta'] 		 = $this->input->get('texto', true);
		$data['tipo_resposta'] 	 = $this->input->get('tipo_resposta', true);
		$data['perfil_resposta'] = $this->input->get('perfil_resposta', true);
		$data['id_pergunta'] 	 = $this->input->get('id_pergunta', true);
		$data['id_quiz'] 		 = $this->input->get('id_quiz', true);

		$update= $this->resposta_model->update($id, $data);

		if($update){
			$retorno = 'sucesso';
			echo $retorno;
		}else{
			$retorno = 'falha';
			echo $retorno;
		}
	}

	public function remove_resposta($id)
	{
		#Se caso a imagem não for a padrão ele precisa remove-la do servidor
		$filtro	 = 'id';
		$id_quiz = $this->input->get('id_quiz');
		#if($resposta){
			$result  = $this->resposta_model->delete($id, $id_quiz, $filtro);
			if($result):
				$this->session->flashdata('retorno', 'Resposta excluida com sucesso!');
				redirect('perguntas/perfil/'.$id_quiz,'refresh');
			else:
				$this->session->flashdata('retorno', 'Falha o excluir a resposta!');
				redirect('perguntas/perfil/'.$id_quiz,'refresh');
			endif;
		#}else{
		#	echo 'Não foi possível excluir a pergunta';
		#}
	}

}

/* End of file perguntas.php */
/* Location: ./application/controllers/perguntas.php */