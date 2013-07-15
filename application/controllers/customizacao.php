<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customizacao extends CI_Controller {

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
		$data['customizacao']	= $this->customizacao_model->get($id);
		$data['perguntas']  	= $perguntas;
		$data['respostas']  	= $respostas->result();
		$data['perfis'] 		= $perfis;
		$data['page_title']		=	'Customização do quiz';
		if($perfis == NULL){
			redirect('quiz_tipo/perfil/'.$id);
		}elseif($perguntas == NULL || $respostas == NULL){
			redirect('perguntas/perfil/'.$id);
		}
		$this->template->show('customizacao', $data);
	}

	public function faixa($id)
	{
		#Variáveis que abragem todas as etapas do quiz
		$perguntas 			= $this->pergunta_model->get($id);
		$respostas			= @$this->resposta_model->get_all($perguntas['id']);
		$perfis				= @$this->faixa_model->get($id);
		#Array com as informações que são enviados para a view
		$data  					= $this->quiz_model->get($id);
		$data['customizacao']	= $this->customizacao_model->get($id);
		$data['perguntas']  	= $perguntas;
		$data['respostas']  	= $respostas->result();
		$data['perfis'] 		= $perfis;
		$data['page_title']		=	'Customização do quiz';
		if($perguntas == NULL){
			redirect('perguntas/certo-ou-errado/'.$id);
		}
		$this->template->show('customizacao', $data);
	}

	public function apenas_uma($id)
	{
		#Variáveis que abragem todas as etapas do quiz
		$perguntas 			= $this->pergunta_model->get($id);
		$respostas			= @$this->resposta_model->get_all($perguntas['id']);
		$perfis				= @$this->faixa_model->get($id);
		#Array com as informações que são enviados para a view
		$data  					= $this->quiz_model->get($id);
		$data['customizacao']	= $this->customizacao_model->get($id);
		$data['perguntas']  	= $perguntas;
		$data['respostas']  	= $respostas->result();
		$data['perfis'] 		= $perfis;
		$data['page_title']		=	'Customização do quiz';
		if($perguntas == NULL){
			redirect('perguntas/certo-ou-errado/'.$id);
		}
		$this->template->show('customizacao', $data);
	}
	
	function multiexplode ($delimiters,$string)
	{
    	$ready = str_replace($delimiters, $delimiters[0], $string);
    	$launch = explode($delimiters[0], $ready);
    	return  $launch;
	}

	public function update()
	{
		#Quebrar variáveis de alinhamento
		$titulo_alinhamento 				= $this->multiexplode(array('text-align:', ';'), $this->input->get('titulo_alinhamento', TRUE));
		$perguntas_alinhamento 				= $this->multiexplode(array('text-align:', ';'), $this->input->get('perguntas_alinhamento', TRUE));
		$referencia_alinhamento 			= $this->multiexplode(array('text-align:', ';'), $this->input->get('referencia_alinhamento', TRUE));
		$resposta_alinhamento 				= $this->multiexplode(array('text-align:', ';'), $this->input->get('resposta_alinhamento', TRUE));
		$titulo_quiz_resultados_alinhamento	= $this->multiexplode(array('text-align:', ';'), $this->input->get('titulo_quiz_resultados_alinhamento', TRUE));
		$titulo_resultados_alinhamento		= $this->multiexplode(array('text-align:', ';'), $this->input->get('titulo_resultados_alinhamento', TRUE));
		$acertos_alinhamento				= $this->multiexplode(array('text-align:', ';'), $this->input->get('acertos_alinhamento', TRUE));
		$descricao_alinhamento				= $this->multiexplode(array('text-align:', ';'), $this->input->get('descricao_alinhamento', TRUE));
		$referencia_resultados_alinhamento	= $this->multiexplode(array('text-align:', ';'), $this->input->get('referencia_resultados_alinhamento', TRUE));
		#Variáveis que serão atualizadas no banco

		$id											=	$this->input->get('id_config', TRUE);
		$data['titulo_quiz_font_size']				=	$this->input->get('titulo_tamanho', TRUE);
		$data['titulo_quiz_font_color']				=	$this->input->get('titulo_cor', TRUE);
		$data['titulo_quiz_align']					=	$titulo_alinhamento[1];
		$data['pergunta_quiz_font_size']			=	$this->input->get('pergunta_tamanho', TRUE);
		$data['pergunta_quiz_font_color']			=	$this->input->get('pergunta_cor', TRUE);
		$data['pergunta_quiz_align']				=	$perguntas_alinhamento[1];
		$data['link_ref_pergunta_font_size']		=	$this->input->get('referencia_tamanho', TRUE);
		$data['link_ref_pergunta_font_color']		=	$this->input->get('referencia_cor', TRUE);
		$data['link_ref_pergunta_align']			=	$referencia_alinhamento[1];
		$data['resposta_pergunta_font_size']		=	$this->input->get('resposta_tamanho', TRUE);
		$data['resposta_pergunta_font_color']		=	$this->input->get('resposta_cor', TRUE);
		$data['resposta_pergunta_align']			=	$resposta_alinhamento[1];
		$data['resposta_pergunta_bg_color']			=	$this->input->get('resposta_cor_fundo', TRUE);
		$data['botao_perguntas_font_color']			=	$this->input->get('botoes_cor', TRUE);
		$data['botao_perguntas_bg_color']			=	$this->input->get('botoes_cor_fundo', TRUE);
		$data['quiz_bg_img']						=	$this->input->get('pergunta_imagem_fundo', TRUE);
		$data['quiz_bg_color']						=	$this->input->get('pergunta_cor_fundo', TRUE);
		$data['resultado_titulo_quiz_font_size']	=	$this->input->get('titulo_quiz_resultados_tamanho', TRUE);
		$data['resultado_titulo_quiz_font_color']	=	$this->input->get('titulo_quiz_resultados_cor', TRUE);
		$data['resultado_titulo_quiz_align']		=	$titulo_quiz_resultados_alinhamento[1];
		$data['resultado_titulo_faixa_font_size']	=	$this->input->get('titulo_resultatados_tamanho', TRUE);
		$data['resultado_titulo_faixa_font_color']	=	$this->input->get('titulo_resultados_cor', TRUE);
		$data['resultado_titulo_faixa_align']		=	$titulo_resultados_alinhamento[1];
		$data['resultado_porcentagem_font_size']	=	$this->input->get('acertos_tamanho', TRUE);
		$data['resultado_porcentagem_font_color']	=	$this->input->get('acertos_cor', TRUE);
		$data['resultado_porcentagem_align']		=	$acertos_alinhamento[1];
		$data['resultado_descricao_font_size']		=	$this->input->get('descricao_tamanho', TRUE);
		$data['resultado_descricao_font_color']		=	$this->input->get('descricao_cor', TRUE);
		$data['resultado_descricao_align']			=	$descricao_alinhamento[1];
		$data['resultado_linkref_font_size']		=	$this->input->get('referencia_resultados_tamanho', TRUE);
		$data['resultado_linkref_font_color']		=	$this->input->get('referencia_resultados_cor', TRUE);
		$data['resultado_linkref_align']			=	$referencia_resultados_alinhamento[1];
		$data['resultado_botao_font_color']			=	$this->input->get('botoes_resultados_cor', TRUE);
		$data['resultado_botao_bg_color']			=	$this->input->get('botoes_resultados_cor_fundo', TRUE);
		$data['resultado_bg_img']					=	$this->input->get('imagem_resultados_fundo', TRUE);
		$data['resultado_bg_color']					=	$this->input->get('resultados_cor_fundo', TRUE);
		$id_quiz									=	$this->input->get('id_quiz', TRUE);

		$update = $this->customizacao_model->update($id, $data);

		if($update){
			echo 'sucesso';
		}else{
			echo 'falha';
		}
	}

}

/* End of file customizacao.php */
/* Location: ./application/controllers/customizacao.php */