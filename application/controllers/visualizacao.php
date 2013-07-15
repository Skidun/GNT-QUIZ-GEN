<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Visualizacao extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('logado')){
			redirect('login');
		}
		$this->load->model('faixa_model');
	}

	public function index()
	{
		redirect('visualizar-todos-quizes');
	}

	public function perfil($id)
	{
		#Variáveis que abragem todas as etapas do quiz
		$perguntas 			= $this->pergunta_model->get($id);
		$respostas			= @$this->resposta_model->get_all($perguntas['id']);
		$perfis				= @$this->perfil_model->get($id);
		#Array com as informações que são enviados para a view
		$data  					= $this->quiz_model->get($id);
		$data['page_title']		=	'Visualização do quiz '.$data['titulo'];
		if($perfis == NULL){
			redirect('quiz_tipo/perfil/'.$id);
		}elseif($perguntas == NULL || $respostas == NULL){
			redirect('perguntas/perfil/'.$id);
		}
		$this->template->show('visualizador', $data);
	}
	//Gera o resultado do tipo perfil
	public function resultado_perfil()
	{
		#Recebe um array com todas as resposta do usuário
		$resposta_user 	 = $this->input->get('respostas', TRUE);
		#Inicia a variável d contagem x com o valor 0
		$x="";
		#Inicia faz um loop para varrer as respostas do usuário e verificar se existe uma  
		for($i=0;$i<count($resposta_user);$i++){
        	# Se alguma resposta se repetir na maioria dos indices, ela é escolhida como resposta
        	if($x == $resposta_user[$i]) {
        		#Eu pergo o perfil usando como filtro o ID do perfil vencedor
        	}
      		$x = $resposta_user[$i];
      		$resposta_perfil = $this->perfil_model->get_resposta($x);
		}
		#Popula o array Data com os valores do Perfil
		$data['titulo']			= $resposta_perfil['titulo'];
		$data['descricao']		= $resposta_perfil['descricao'];
		$data['link_referencia']= $resposta_perfil['link_referencia'];
		$data['texto_link']		= $resposta_perfil['texto_link'];
		$data['imagem']			= $resposta_perfil['imagem'];
		#PHP gera um JSON do resultado
		echo json_encode($data);
	}

	public function faixa($id)
	{
		#Variáveis que abragem todas as etapas do quiz
		$perguntas 			= $this->pergunta_model->get($id);
		$respostas			= @$this->resposta_model->get_all($perguntas['id']);
		$perfis				= @$this->faixa_model->get($id);
		#Array com as informações que são enviados para a view
		$data  					= $this->quiz_model->get($id);
		$data['page_title']		=	'Visualização do quiz '.$data['titulo'];
		if($perfis == NULL){
			redirect('quiz_tipo/perfil/'.$id);
		}elseif($perguntas == NULL || $respostas == NULL){
			redirect('perguntas/perfil/'.$id);
		}
		$this->template->show('visualizador', $data);
	}
	//Gera o resultado do tipo perfil
	public function resultado_faixa()
	{
		#Recebe um array com todas as resposta do usuário
		$resposta_user 	 = $this->input->get('respostas', TRUE);
		#Inicia a variável d contagem x com o valor 0
		$x="";
		#Inicia faz um loop para varrer as respostas do usuário e verificar se existe uma  
		for($i=0;$i<count($resposta_user);$i++){
        	# Se alguma resposta se repetir na maioria dos indices, ela é escolhida como resposta
        	if($x == $resposta_user[$i]) {
        		#Eu pergo o perfil usando como filtro o ID do perfil vencedor
        	}
      		$x = $resposta_user[$i];
      		$resposta_perfil = $this->perfil_model->get_resposta($x);
		}
		#Popula o array Data com os valores do Perfil
		$data['titulo']			= $resposta_perfil['titulo'];
		$data['descricao']		= $resposta_perfil['descricao'];
		$data['link_referencia']= $resposta_perfil['link_referencia'];
		$data['texto_link']		= $resposta_perfil['texto_link'];
		$data['imagem']			= $resposta_perfil['imagem'];
		#PHP gera um JSON do resultado
		echo json_encode($data);
	}

}

/* End of file customizacao.php */
/* Location: ./application/controllers/customizacao.php */