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
		#Calcula os valores iguais da array
		$calculo = array_count_values($resposta_user);
		#Pega o perfil que foi respondido mais vezes
		$maior = max($calculo);
		#Como o $maior retorna value mas o ID do perfil é uma Key, precisamos pegar a Key que tem o value $maior
		$x = array_keys($calculo, $maior);
		#Inicia a variável d contagem x com o valor 
		$resposta_perfil = $this->perfil_model->get_resposta($x[0]);
		#Popula o array Data com os valores do Perfil
		$data['titulo']			= $resposta_perfil['titulo'];
		$data['descricao']		= $resposta_perfil['descricao'];
		$data['link_referencia']= $resposta_perfil['link_referencia'];
		$data['texto_link']		= $resposta_perfil['texto_link'];
		$data['imagem']			= $resposta_perfil['imagem'];
		$data['id']				= $resposta_perfil['id'];
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
			switch ($data['tipo']) {
				case 'certa-ou-errada':
					redirect('quiz_tipo/certa-ou-errada/'.$id);
					break;
				default:
					redirect('quiz_tipo/resposta_certa/'.$id);
					break;
			}
			
		}elseif($perguntas == NULL || $respostas == NULL){
			switch ($data['tipo']) {
				case 'certa-ou-errada':
					redirect('perguntas/certa-ou-errada/'.$id);
					break;
				default:
					redirect('perguntas/resposta_certa/'.$id);
					break;
			}
		}
		$this->template->show('visualizador', $data);
	}
	#Action que chama a visualização do quiz de tipo Enquete
	public function enquete($id)
	{
		#Variáveis que abragem todas as etapas do quiz
		$perguntas 			= $this->pergunta_model->get($id);
		$respostas			= @$this->resposta_model->get_all($perguntas['id']);
		$perfis				= @$this->faixa_model->get($id);
		#Array com as informações que são enviados para a view
		$data  					= $this->quiz_model->get($id);
		$data['page_title']		=	'Visualização do quiz '.$data['titulo'];
		if($perfis == NULL){
			switch ($data['tipo']) {
				case 'certa-ou-errada':
					redirect('quiz_tipo/certa-ou-errada/'.$id);
					break;
				default:
					redirect('quiz_tipo/enquete/'.$id);
					break;
			}
			
		}elseif($perguntas == NULL || $respostas == NULL){
			switch ($data['tipo']) {
				case 'certa-ou-errada':
					redirect('perguntas/certa-ou-errada/'.$id);
					break;
				default:
					redirect('perguntas/enquete/'.$id);
					break;
			}
		}
		$this->template->show('visualizador', $data);
	}
	//Gera o resultado do tipo certa-ou-errada
	public function resultado_faixa()
	{
		#Recebe um array com todas as resposta do usuário
		$resposta_user 	  = $this->input->get('respostas', TRUE);
		$id 		      = $this->input->get('id_quiz', TRUE);
		#Aqui eu pego todos as faixas desses quiz
		$faixas_respostas = $this->faixa_model->get_all($id);
		#Crio uma array vazia na qual será populada pelos pelos ranges de cada faixa
		$faixas = array();
		#Pontuação recebida do js $resposta_urser que é somada e gerada um número único
		$pontuacao		  = array_sum($resposta_user);
		#Realizo um loop nas repostas de faixas que vieram do banco onde a cada iterão é adicionado na array $faixas
		#o valor de range_de e valor de range_ate separados por "-" 
		foreach($faixas_respostas->result() as $faixa){
			array_push($faixas, $faixa->range_de.'-'.$faixa->range_ate);
		}
		# Essa será a variável que será enviada para a $resposta_faixa (Que trará o resultado), por enquanto ela tá vazia
		$filtro = '';
		#Loop no array $faixas
		foreach($faixas as $cada_faixa){
			#Essa variável é um array na qual é quebrado o valor inicial do valor final da array $cada_faixa ($faixas)
			$numero_junto = explode('-', $cada_faixa);
			#Primeiro número do range
			$numero_inicio= $numero_junto[0];
			#numero final do range
			$numero_fim	  = $numero_junto[1];
			#A varíavel $range cria um array com um range entre o número incial e numero final da faixa de classificação
			$range = range($numero_inicio, $numero_fim);
			#Se a pontuação recebida do js (as respostas do usuário) estiver no range
			if(in_array($pontuacao/2, $range)){	
				#Ele pega o numero final e seta na variável $filtro, assim sempre teremos um valor que já existe em algum ponto da faixa de classificação
				#Ou range_de ou range_ate
				$filtro = $numero_fim;
				break;
			}
		};
		#Inicia faz um loop para varrer as respostas do usuário e verificar se existe uma  
		$resposta_faixa = $this->faixa_model->get_resposta($id, $filtro);

		#Popula o array Data com os valores do Perfil
		$data['titulo']			= $resposta_faixa['titulo'];
		$data['descricao']		= $resposta_faixa['descricao'];
		$data['link_referencia']= $resposta_faixa['link_referencia'];
		$data['texto_link']		= $resposta_faixa['texto_link'];
		$data['imagem']			= $resposta_faixa['imagem'];
		$data['pontuacao']		= $pontuacao/2;
		#PHP gera um JSON do resultado
		echo json_encode($data);
	}

	public function apenas_uma($id)
	{
		#Variáveis que abragem todas as etapas do quiz
		$perguntas 			= $this->pergunta_model->get($id);
		$respostas			= @$this->resposta_model->get_all($perguntas['id']);
		$perfis				= @$this->faixa_model->get($id);
		#Array com as informações que são enviados para a view
		$data  					= $this->quiz_model->get($id);
		$data['page_title']		=	'Visualização do quiz '.$data['titulo'];
		if($perfis == NULL){
			redirect('quiz_tipo/apenas_uma/'.$id);
		}elseif($perguntas == NULL || $respostas == NULL){
			redirect('perguntas/apenas_uma/'.$id);
		}
		$this->template->show('visualizador', $data);
	}
	//Gera o resultado do tipo Apenas uma correta
	public function resultado_apenas_uma()
	{
		#Recebe um array com todas as resposta do usuário
		$resposta_user 	  = $this->input->get('respostas', TRUE);
		$id 		      = $this->input->get('id_quiz', TRUE);
		#Aqui eu pego todos as faixas desses quiz
		$faixas_respostas = $this->faixa_model->get_all($id);
		#Crio uma array vazia na qual será populada pelos pelos ranges de cada faixa
		$faixas = array();
		#Pontuação recebida do js $resposta_urser que é somada e gerada um número único
		$pontuacao		  = array_sum($resposta_user);
		#Realizo um loop nas repostas de faixas que vieram do banco onde a cada iterão é adicionado na array $faixas
		#o valor de range_de e valor de range_ate separados por "-" 
		foreach($faixas_respostas->result() as $faixa){
			array_push($faixas, $faixa->range_de.'-'.$faixa->range_ate);
		}
		# Essa será a variável que será enviada para a $resposta_faixa (Que trará o resultado), por enquanto ela tá vazia
		$filtro = '';
		#Loop no array $faixas
		foreach($faixas as $cada_faixa){
			#Essa variável é um array na qual é quebrado o valor inicial do valor final da array $cada_faixa ($faixas)
			$numero_junto = explode('-', $cada_faixa);
			#Primeiro número do range
			$numero_inicio= $numero_junto[0];
			#numero final do range
			$numero_fim	  = $numero_junto[1];
			#A varíavel $range cria um array com um range entre o número incial e numero final da faixa de classificação
			$range = range($numero_inicio, $numero_fim);
			#Se a pontuação recebida do js (as respostas do usuário) estiver no range
			if(in_array($pontuacao/2, $range)){	
				#Ele pega o numero final e seta na variável $filtro, assim sempre teremos um valor que já existe em algum ponto da faixa de classificação
				#Ou range_de ou range_ate
				$filtro = $numero_fim;
				break;
			}
		}
		#Inicia faz um loop para varrer as respostas do usuário e verificar se existe uma  
		$resposta_faixa = $this->faixa_model->get_resposta($id, $filtro);

		#Popula o array Data com os valores do Perfil
		$data['titulo']			= $resposta_faixa['titulo'];
		$data['descricao']		= $resposta_faixa['descricao'];
		$data['link_referencia']= $resposta_faixa['link_referencia'];
		$data['texto_link']		= $resposta_faixa['texto_link'];
		$data['imagem']			= $resposta_faixa['imagem'];
		$data['pontuacao']		= $pontuacao/2;
		#PHP gera um JSON do resultado
		echo json_encode($data);
	}

	//Gera o resultado do tipo Apenas uma correta
	public function resultado_resposta_certa()
	{
		#Recebe um array com todas as resposta do usuário
		$resposta_user 	  = $this->input->get('respostas', TRUE);
		$id 		      = $this->input->get('id_quiz', TRUE);
		#Aqui eu pego todos as faixas desses quiz
		$faixas_respostas = $this->faixa_model->get_all($id);
		#Crio uma array vazia na qual será populada pelos pelos ranges de cada faixa
		$faixas = array();
		#Pontuação recebida do js $resposta_urser que é somada e gerada um número único
		$pontuacao		  = array_sum($resposta_user);
		#Realizo um loop nas repostas de faixas que vieram do banco onde a cada iterão é adicionado na array $faixas
		#o valor de range_de e valor de range_ate separados por "-" 
		foreach($faixas_respostas->result() as $faixa){
			array_push($faixas, $faixa->range_de.'-'.$faixa->range_ate);
		}
		# Essa será a variável que será enviada para a $resposta_faixa (Que trará o resultado), por enquanto ela tá vazia
		$filtro = '';
		#Loop no array $faixas
		foreach($faixas as $cada_faixa){
			#Essa variável é um array na qual é quebrado o valor inicial do valor final da array $cada_faixa ($faixas)
			$numero_junto = explode('-', $cada_faixa);
			#Primeiro número do range
			$numero_inicio= $numero_junto[0];
			#numero final do range
			$numero_fim	  = $numero_junto[1];
			#A varíavel $range cria um array com um range entre o número incial e numero final da faixa de classificação
			$range = range($numero_inicio, $numero_fim);
			#Se a pontuação recebida do js (as respostas do usuário) estiver no range
			if(in_array($pontuacao/2, $range)){	
				#Ele pega o numero final e seta na variável $filtro, assim sempre teremos um valor que já existe em algum ponto da faixa de classificação
				#Ou range_de ou range_ate
				$filtro = $numero_fim;
				break;
			}
		};
		#Inicia faz um loop para varrer as respostas do usuário e verificar se existe uma  
		$resposta_faixa = $this->faixa_model->get_resposta($id, $filtro);

		#Popula o array Data com os valores do Perfil
		$data['titulo']			= $resposta_faixa['titulo'];
		$data['descricao']		= $resposta_faixa['descricao'];
		$data['link_referencia']= $resposta_faixa['link_referencia'];
		$data['texto_link']		= $resposta_faixa['texto_link'];
		$data['imagem']			= $resposta_faixa['imagem'];
		$data['pontuacao']		= $pontuacao/2;
		#PHP gera um JSON do resultado
		echo json_encode($data);
	}

	//Gera o resultado do tipo Apenas uma correta
	public function resultado_enquete()
	{
		#Recebe um array com todas as resposta do usuário
		$resposta_user 	  = $this->input->get('respostas', TRUE);
		$id 		      = $this->input->get('id_quiz', TRUE);
		#Aqui eu pego todos as faixas desses quiz
		$faixas_respostas = $this->faixa_model->get_all($id);
		#Crio uma array vazia na qual será populada pelos pelos ranges de cada faixa
		$faixas = array();
		#Pontuação recebida do js $resposta_urser que é somada e gerada um número único
		$pontuacao		  = array_sum($resposta_user);
		#Realizo um loop nas repostas de faixas que vieram do banco onde a cada iterão é adicionado na array $faixas
		#o valor de range_de e valor de range_ate separados por "-" 
		foreach($faixas_respostas->result() as $faixa){
			array_push($faixas, $faixa->range_de.'-'.$faixa->range_ate);
		}
		# Essa será a variável que será enviada para a $resposta_faixa (Que trará o resultado), por enquanto ela tá vazia
		$filtro = '';
		#Loop no array $faixas
		foreach($faixas as $cada_faixa){
			#Essa variável é um array na qual é quebrado o valor inicial do valor final da array $cada_faixa ($faixas)
			$numero_junto = explode('-', $cada_faixa);
			#Primeiro número do range
			$numero_inicio= $numero_junto[0];
			#numero final do range
			$numero_fim	  = $numero_junto[1];
			#A varíavel $range cria um array com um range entre o número incial e numero final da faixa de classificação
			$range = range($numero_inicio, $numero_fim);
			#Se a pontuação recebida do js (as respostas do usuário) estiver no range
			if(in_array($pontuacao, $range)){	
				#Ele pega o numero final e seta na variável $filtro, assim sempre teremos um valor que já existe em algum ponto da faixa de classificação
				#Ou range_de ou range_ate
				$filtro = $numero_fim;
				break;
			}
		};
		#Inicia faz um loop para varrer as respostas do usuário e verificar se existe uma
		$resposta_faixa = $this->faixa_model->get_resposta($id, $filtro);
		#Calculo de Percentual
		$numTotal		= $this->resposta_model->count_varias_corretas($id)*10;
		$percentual		= ($pontuacao * 100)/$numTotal; 
		

		#Popula o array Data com os valores do Perfil
		$data['titulo']			= $resposta_faixa['titulo'];
		$data['descricao']		= $resposta_faixa['descricao'];
		$data['link_referencia']= $resposta_faixa['link_referencia'];
		$data['texto_link']		= $resposta_faixa['texto_link'];
		$data['imagem']			= $resposta_faixa['imagem'];
		$data['filtro']			= $filtro;
		$data['pontuacao']		= round($percentual);
		#PHP gera um JSON do resultado
		echo json_encode($data);
	}

}

/* End of file customizacao.php */
/*Seu nível de conhecimento do assunto é de 10% */
/* Location: ./application/controllers/customizacao.php */