<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perguntas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if(!$this->session->userdata('logado')){
			redirect('login');
		}
		redirect('visualizar-todos-quizes');
	}

	public function perfil($id)
	{
		if(!$this->session->userdata('logado')){
			redirect('login');
		}
		#Resgata informações do quiz de acordo com seu ID que é passado como 3º segmento da URL
		#Também pega os perfis cadastrados para aquele quiz
		#Seta algumas variáveis em branco que serão populadas após o loop da consulta
		#Pega as perguntas que já estão salvas no banco

		$data  			= $this->quiz_model->get($id);
		$perfis 		= $this->perfil_model->get_all($id);
		$option_perfil 	= '';
		$list_perguntas	= '';
		$list_respostas = '';
		$options_select = array();
		$perguntas   	= $this->pergunta_model->get_all($id);
		if($perfis->num_rows() == 0){
			redirect('quiz_tipo/perfil/'.$id);
		}
		#Gera as options de perfis para cada resposta
		foreach($perfis->result() as $perfil){
			$option_perfil .= '<option value="'.$perfil->id.'">'.character_limiter($perfil->titulo, 25).'</option>';
			$options_select[$perfil->id] = character_limiter($perfil->titulo, 25);
		}
		#Gera a listagem de perguntas e suas respostas
		$count = -1;
		if($perguntas->num_rows() > 0){
			foreach($perguntas->result() as $pergunta){
				$count++;
				$list_perguntas .= '
										<div class="group salvo" id="'.$count.'">					
											<div class="header">
												<span class="icon"></span>
												<div class="input"><input type="text" name="nome" id="nome-pergunta-'.$count.'" value="'.$pergunta->pergunta.'" size="" /></div>
												<span class="arrow"></span>
												<a href="'.site_url('remover-pergunta').'/'.$pergunta->id.'" id="pergunta-'.$count.'" rel="'.$pergunta->id_quiz.'" class="excluir excluir-um" title="Excluir esta perguta"></a>
											</div>
											<div class="body">							
												<div id="perguntas">								
													<div class="texto">
														<label for="link">Link de referência:</label>
														<div class="input"><input type="text" name="link" id="link-pergunta-'.$count.'" value="'.$pergunta->link_referencia.'" size="" /></div>
														<label for="texto">Texto do link de referência:</label>
														<div class="input"><input type="text" name="texto" id="texto-pergunta-'.$count.'" value="'.$pergunta->texto_link.'" size="" /></div>
													</div>
													<div class="imagem">
														<label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px<br />Formatos: JPG, PNG e GIF<br />Tamanho: 1MB<br />Nomes sem acentos e caracteres especiais</span></label>
														
														<form class="fileupload" id="form-file-upload-pergunta" action="'.base_url().'assets/server/php/" method="POST" enctype="multipart/form-data">
															<div class="quadro"><img id="alvo-pergunta-'.$count.'" src="'.str_replace('../../', '../../', $pergunta->imagem).'" name="imagem" /></div>
															<span class="btn btn-success fileinput-button">
																<input id="file" type="file" />
															</span>
															<a href="javascript:void(0);" class="excluir excluir-imagem"></a>
														</form>
														<input type="hidden" id="id-pergunta-'.$count.'" name="id-pergunta" value="'.$pergunta->id.'" />
													</div>
												</div><!--perguntas-->
												<input type="hidden" id="id_quiz" name="id_quiz" value="'.$pergunta->id_quiz.'" />

												<div id="respostas">
												
													<div class="titulo-respostas">Respostas:</div>
													
													<div id="sortable'.$count.'" class="sorteia">
												';
				#Faço uma consulta na tabela de respostas para pegar a tabela daquela determinada pergunta e daquele determinado quiz												
				$respostas = $this->resposta_model->get_all($pergunta->id);
				#Contagem inicial de cada loop
				$count_resp= -1;
				#Gerar os box de respostas
				foreach($respostas->result() as $resposta){
					$count_resp++;
					$list_perguntas		.=	'			
																<div class="header">
																	<span class="icon"></span>
																	<a href="'.site_url('remover-resposta').'/'.$resposta->id.'" class="excluir excluir-dois" rel="'.$resposta->id_quiz.'"></a>
																	<div class="input">
																	<input type="text" name="nome-resposta" id="nome-resposta-'.$count_resp.'" value="'.$resposta->resposta.'" size="" />
																	<input type="hidden" name="id-resposta" id="id-resposta-'.$count_resp.'" value="'.$resposta->id.'"/>
																	</div>'.form_dropdown('perfil-resposta', $options_select, $resposta->perfil_resposta, 'class="default" id="perfil-resposta-'.$count_resp.'"').'
																</div>
										';
				}
				#Fecha as listagem de perguntas já com suas respostas inclusas
				$list_perguntas		.=  '													
													</div>

													<a id="nova-resposta-perfil" class="nova-resposta" href="javascript:void(0)"></a>
												</div><!--respostas-->

											</div><!--body-->							
									</div><!--group-->
									<input type="hidden" name="tipo_quiz" id="tipo_quiz" value="'.$this->uri->segment(2).'" />
									';
			}

		}
		#variáveis que serão passadas para a View
		$data['page_title'] 	= ' Perguntas e Respotas do tipo perfil';
		$data['option_perfil'] 	= $option_perfil; 
		$data['perguntas']		= $list_perguntas;
		$data['quantidade']		= $this->pergunta_model->count_rows($id);
		#Chama a view dentro do template
		$this->template->show('perguntas', $data);
	}
	#Método que salva a pergunta do tipo perfil
	public function save_pergunta_perfil()
	{
		if(!$this->session->userdata('logado')){
			redirect('login');
		}
		$data['pergunta'] 		 = $this->input->get('texto', true);
		$data['link_referencia'] = $this->input->get('link_referencia', true);
		$data['texto_link'] 	 = $this->input->get('texto_link', true);
		$data['imagem'] 		 = $this->input->get('imagem', true);
		$data['ordem'] 		 	 = $this->input->get('ordem', true);
		$data['id_quiz'] 		 = $this->input->get('id_quiz', true);

		$create = $this->pergunta_model->create($data);
		if($create){
			#Variáveis necessárias para atualização do time_stamp do quiz	
			$retorno = array('result'=>'sucesso', 'id_pergunta'=> $create);	
			echo json_encode($retorno);
		}else{
			$retorno = array('result'=>'falha');
			echo json_encode($retorno);
		}
			
	}
	#Método que atualiza as perguntas
	public function update_pergunta_perfil()
	{
		if(!$this->session->userdata('logado')){
			redirect('login');
		}
		$id 					 = $this->input->get('id_pergunta', true);
		$data['pergunta'] 		 = $this->input->get('texto', true);
		$data['link_referencia'] = $this->input->get('link_referencia', true);
		$data['texto_link'] 	 = $this->input->get('texto_link', true);
		$data['imagem'] 		 = $this->input->get('imagem', true);
		$data['ordem'] 		 	 = $this->input->get('ordem', true);
		//$data['id_quiz'] 		 = $this->input->get('id_quiz', true);

		$update = $this->pergunta_model->update($id, $data);
		if($update){
			#Variáveis necessárias para atualização do time_stamp do quiz
			$retorno = array('result'=>'sucesso');
			echo json_encode($retorno);
		}else{
			$retorno = array('result'=>'falha');
			echo json_encode($retorno);
		}
	}

	#Método que remove a pergunta
	public function remove_pergunta($id)
	{
		if(!$this->session->userdata('logado')){
			redirect('login');
		}
		#Se caso a imagem não for a padrão ele precisa remove-la do servidor
		if($this->input->get('imagem', true)){
			@$img_perfil	 = explode(',',$this->input->get('imagem'));
			@$dir     = 'assets/server/php/files/';
			@$imagem	 = $img_perfil[1];
			@$remove_imagem = unlink('./'.$dir.$imagem);
		}
		$filtro	 = 'id_pergunta';
		$id_quiz = $this->input->get('id_quiz');
		$resposta= $this->resposta_model->delete($id, $id_quiz, $filtro);
		#if($resposta){
			$result  = $this->pergunta_model->delete($id, $id_quiz);
			if($result):
				$this->session->flashdata('retorno', 'Pergunta excluida com sucesso!');
				redirect('perguntas/perfil/'.$id_quiz,'refresh');
			else:
				$this->session->flashdata('retorno', 'Falha o excluir a pergunta!');
				redirect('perguntas/perfil/'.$id_quiz,'refresh');
			endif;
		#}else{
		#	echo 'Não foi possível excluir a pergunta';
		#}
	}
	#####################################################################
	## Métodos relacionados ao tipo de quiz Certo ou errado
	##
	#####################################################################
	public function faixa($id)
	{
		if(!$this->session->userdata('logado')){
			redirect('login');
		}
		#Resgata informações do quiz de acordo com seu ID que é passado como 3º segmento da URL
		#Também pega os perfis cadastrados para aquele quiz
		#Seta algumas variáveis em branco que serão populadas após o loop da consulta
		#Pega as perguntas que já estão salvas no banco
		$data  			= $this->quiz_model->get($id);
		#$faixas 		= $this->perfil_model->get_all($id);
		$option_perfil 	= '';
		$list_perguntas	= '';
		$list_respostas = '';
		$options_select = array();
		$perguntas   	= $this->pergunta_model->get_all($id);

		#Gera a listagem de perguntas e suas respostas
		$count = -1;
		if($perguntas->num_rows() > 0){
			foreach($perguntas->result() as $pergunta){
				$count++;
				$list_perguntas .= '
										<div class="group salvo" id="'.$count.'">					
											<div class="header">
												<span class="icon"></span>
												<div class="input"><input type="text" name="nome" id="nome-pergunta-'.$count.'" value="'.$pergunta->pergunta.'" size="" /></div>
												<span class="arrow"></span>
												<a href="'.site_url('remover-pergunta-ce').'/'.$pergunta->id.'" id="pergunta-'.$count.'" rel="'.$pergunta->id_quiz.'" class="excluir excluir-pergunta-ce" title="Excluir esta perguta"></a>
											</div>
											<div class="body">							
												<div id="perguntas">								
													<div class="texto">
														<label for="link">Link de referência:</label>
														<div class="input"><input type="text" name="link" id="link-pergunta-'.$count.'" value="'.$pergunta->link_referencia.'" size="" /></div>
														<label for="texto">Texto do link de referência:</label>
														<div class="input"><input type="text" name="texto" id="texto-pergunta-'.$count.'" value="'.$pergunta->texto_link.'" size="" /></div>
													</div>
													<div class="imagem">
														<label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px<br />Formatos: JPG, PNG e GIF<br />Tamanho: 1MB<br />Nomes sem acentos e caracteres especiais</span></label>
														
														<form class="fileupload" id="form-file-upload-pergunta" action="'.base_url().'assets/server/php/" method="POST" enctype="multipart/form-data">
															<div class="quadro"><img id="alvo-pergunta-'.$count.'" src="'.str_replace('../../', '../../', $pergunta->imagem).'" name="imagem" /></div>
															<span class="btn btn-success fileinput-button">
																<input id="file" type="file" />
															</span>
															<a href="javascript:void(0);" class="excluir excluir-imagem"></a>
														</form>
														<input type="hidden" id="id-pergunta-'.$count.'" name="id-pergunta" value="'.$pergunta->id.'" />
													</div>
												</div><!--perguntas-->
												<input type="hidden" id="id_quiz" name="id_quiz" value="'.$pergunta->id_quiz.'" />

												<div id="respostas">
												
													<div class="titulo-respostas">Respostas:</div>
													
													<div id="sortable'.$count.'" class="sorteia">
												';
				#Faço uma consulta na tabela de respostas para pegar a tabela daquela determinada pergunta e daquele determinado quiz												
				$respostas = $this->resposta_model->get_all($pergunta->id);
				#Contagem inicial de cada loop
				$count_resp= -1;
				#Gerar os box de respostas
				foreach($respostas->result() as $resposta){
					$count_resp++;
					$list_perguntas		.=	'			
																<div class="header">
																	<span class="icon"></span>
																	<div class="input">
																		<input type="text" name="nome-resposta" id="nome-resposta-'.$count_resp.'" value="'.$resposta->resposta.'" size="" />
																		<input type="hidden" name="id-resposta" id="id-resposta-'.$count_resp.'" value="'.$resposta->id.'"/>
																	</div>
																	
																	<div class="radio">
											';
					if($resposta->perfil_resposta == '10'){

						$list_perguntas		.=							'<!--<label for="radio10" class="radioCustom"></label>-->
																		<input type="radio" id="radio'.$count_resp.'0" name="grupo'.$count.$count.'" value="'.$resposta->perfil_resposta.'" checked="checked"/>
																		Esta é a resposta correta
																		';
					
					}else{
						$list_perguntas		.=							'<!--<label for="radio10" class="radioCustom"></label>-->
																		 <input type="radio" id="radio'.$count_resp.'0" name="grupo'.$count.$count.'" value="'.$resposta->perfil_resposta.'"/>
																		 Esta é a resposta correta
																		';

														}												
											
					$list_perguntas 	.=	'
																	</div>
																</div>
										';
				}
				#Fecha as listagem de perguntas já com suas respostas inclusas
				$list_perguntas		.=  '													
													</div>

												</div><!--respostas-->

											</div><!--body-->							
									</div><!--group-->
									<input type="hidden" name="tipo_quiz" id="tipo_quiz" value="'.$this->uri->segment(2).'" />
									';
			}

		}
		#variáveis que serão passadas para a View
		$data['page_title'] 	= ' Perguntas e Respotas do tipo Certa ou errada';
		$data['option_perfil'] 	= $option_perfil; 
		$data['perguntas']		= $list_perguntas;
		$data['quantidade']		= $this->pergunta_model->count_rows($id);
		#Chama a view dentro do template
		$this->template->show('perguntas', $data);
	}

	public function apenas_uma($id)
	{
		if(!$this->session->userdata('logado')){
			redirect('login');
		}
		#Resgata informações do quiz de acordo com seu ID que é passado como 3º segmento da URL
		#Também pega os perfis cadastrados para aquele quiz
		#Seta algumas variáveis em branco que serão populadas após o loop da consulta
		#Pega as perguntas que já estão salvas no banco
		$data  			= $this->quiz_model->get($id);
		#$faixas 		= $this->perfil_model->get_all($id);
		$option_perfil 	= '';
		$list_perguntas	= '';
		$list_respostas = '';
		$options_select = array();
		$perguntas   	= $this->pergunta_model->get_all($id);

		#Gera a listagem de perguntas e suas respostas
		$count = -1;
		if($perguntas->num_rows() > 0){
			foreach($perguntas->result() as $pergunta){
				$count++;
				$list_perguntas .= '
										<div class="group salvo" id="'.$count.'">					
											<div class="header">
												<span class="icon"></span>
												<div class="input"><input type="text" name="nome" id="nome-pergunta-'.$count.'" value="'.$pergunta->pergunta.'" size="" /></div>
												<span class="arrow"></span>
												<a href="'.site_url('remover-pergunta-ce').'/'.$pergunta->id.'" id="pergunta-'.$count.'" rel="'.$pergunta->id_quiz.'" class="excluir excluir-pergunta-ce" title="Excluir esta perguta"></a>
											</div>
											<div class="body">							
												<div id="perguntas">								
													<div class="texto">
														<label for="link">Link de referência:</label>
														<div class="input"><input type="text" name="link" id="link-pergunta-'.$count.'" value="'.$pergunta->link_referencia.'" size="" /></div>
														<label for="texto">Texto do link de referência:</label>
														<div class="input"><input type="text" name="texto" id="texto-pergunta-'.$count.'" value="'.$pergunta->texto_link.'" size="" /></div>
													</div>
													<div class="imagem">
														<label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px<br />Formatos: JPG, PNG e GIF<br />Tamanho: 1MB<br />Nomes sem acentos e caracteres especiais</span></label>
														
														<form class="fileupload" id="form-file-upload-pergunta" action="'.base_url().'assets/server/php/" method="POST" enctype="multipart/form-data">
															<div class="quadro"><img id="alvo-pergunta-'.$count.'" src="'.str_replace('../../', '../../', $pergunta->imagem).'" name="imagem" /></div>
															<span class="btn btn-success fileinput-button">
																<input id="file" type="file" />
															</span>
															<a href="javascript:void(0);" class="excluir excluir-imagem"></a>
														</form>
														<input type="hidden" id="id-pergunta-'.$count.'" name="id-pergunta" value="'.$pergunta->id.'" />
													</div>
												</div><!--perguntas-->
												<input type="hidden" id="id_quiz" name="id_quiz" value="'.$pergunta->id_quiz.'" />

												<div id="respostas">
												
													<div class="titulo-respostas">Respostas:</div>
													
													<div id="sortable'.$count.'" class="sorteia">
												';
				#Faço uma consulta na tabela de respostas para pegar a tabela daquela determinada pergunta e daquele determinado quiz												
				$respostas = $this->resposta_model->get_all($pergunta->id);
				#Contagem inicial de cada loop
				$count_resp= -1;
				#Gerar os box de respostas
				foreach($respostas->result() as $resposta){
					$count_resp++;
					$list_perguntas		.=	'			
																<div class="header">
																	<span class="icon"></span>
																	<a href="'.site_url('remover-resposta').'/'.$resposta->id.'" class="excluir excluir-dois" rel="'.$resposta->id_quiz.'"></a>
																	<div class="input">
																		<input type="text" name="nome-resposta" id="nome-resposta-'.$count_resp.'" value="'.$resposta->resposta.'" size="" />
																		<input type="hidden" name="id-resposta" id="id-resposta-'.$count_resp.'" value="'.$resposta->id.'"/>
																	</div>
																	
																	<div class="radio">
											';
					if($resposta->perfil_resposta == '10'){

						$list_perguntas		.=							'<!--<label for="radio10" class="radioCustom"></label>-->
																		<input type="radio" id="radio'.$count_resp.'0" name="grupo'.$count.$count.'" value="'.$resposta->perfil_resposta.'" checked="checked"/>
																		Esta é a resposta correta
																		';
					
					}else{
						$list_perguntas		.=							'<!--<label for="radio10" class="radioCustom"></label>-->
																		 <input type="radio" id="radio'.$count_resp.'0" name="grupo'.$count.$count.'" value="'.$resposta->perfil_resposta.'"/>
																		 Esta é a resposta correta
																		';

														}												
											
					$list_perguntas 	.=	'
																	</div>
																</div>
										';
				}
				#Fecha as listagem de perguntas já com suas respostas inclusas
				$list_perguntas		.=  '													
													</div>
													<a id="nova-resposta-respostaCerta" class="nova-resposta" href="javascript:void(0)"></a>
												</div><!--respostas-->

											</div><!--body-->							
									</div><!--group-->
									<input type="hidden" name="tipo_quiz" id="tipo_quiz" value="'.$this->uri->segment(2).'" />
									';
			}

		}
		#variáveis que serão passadas para a View
		$data['page_title'] 	= ' Perguntas e Respotas do tipo Apenas uma correta';
		$data['option_perfil'] 	= $option_perfil; 
		$data['perguntas']		= $list_perguntas;
		$data['quantidade']		= $this->pergunta_model->count_rows($id);
		#Chama a view dentro do template
		$this->template->show('perguntas', $data);
	}

	#Método que salva a pergunta do tipo Certo ou Errado
	public function save_pergunta_certo_ou_errado()
	{
		if(!$this->session->userdata('logado')){
			redirect('login');
		}
		$data['pergunta'] 		 = $this->input->get('texto', true);
		$data['link_referencia'] = $this->input->get('link_referencia', true);
		$data['texto_link'] 	 = $this->input->get('texto_link', true);
		$data['imagem'] 		 = $this->input->get('imagem', true);
		$data['ordem'] 		 	 = $this->input->get('ordem', true);
		$data['id_quiz'] 		 = $this->input->get('id_quiz', true);

		$create = $this->pergunta_model->create($data);
		if($create){
			#Variáveis necessárias para atualização do time_stamp do quiz	
			$retorno = array('result'=>'sucesso', 'id_pergunta'=> $create);	
			echo json_encode($retorno);
		}else{
			$retorno = array('result'=>'falha');
			echo json_encode($retorno);
		}	
	}

	#Método que atualiza as perguntas
	public function update_pergunta_certo_ou_errado()
	{
		if(!$this->session->userdata('logado')){
			redirect('login');
		}
		$id 					 = $this->input->get('id_pergunta', true);
		$data['pergunta'] 		 = $this->input->get('texto', true);
		$data['link_referencia'] = $this->input->get('link_referencia', true);
		$data['texto_link'] 	 = $this->input->get('texto_link', true);
		$data['imagem'] 		 = $this->input->get('imagem', true);
		$data['ordem'] 		 	 = $this->input->get('ordem', true);
		//$data['id_quiz'] 		 = $this->input->get('id_quiz', true);

		$update = $this->pergunta_model->update($id, $data);
		if($update == TRUE){
			#Variáveis necessárias para atualização do time_stamp do quiz
			$retorno = array('result'=>'sucesso');
			echo json_encode($retorno);
		}else{
			$retorno = array('result'=>'falha');
			echo json_encode($retorno);
		}
	}

	#Método que remove a pergunta
	public function remove_pergunta_ce($id)
	{
		if(!$this->session->userdata('logado')){
			redirect('login');
		}
		#Se caso a imagem não for a padrão ele precisa remove-la do servidor
		if($this->input->get('imagem', true)){
			@$img_perfil	 = explode(',',$this->input->get('imagem'));
			@$dir     = 'assets/server/php/files/';
			@$imagem	 = $img_perfil[1];
			@$remove_imagem = unlink('./'.$dir.$imagem);
		}
		$filtro	 = 'id_pergunta';
		$id_quiz = $this->input->get('id_quiz');
		$resposta= $this->resposta_model->delete($id, $id_quiz, $filtro);
		#if($resposta){
			$result  = $this->pergunta_model->delete($id, $id_quiz);
			if($result):
				$this->session->flashdata('retorno', 'Pergunta excluida com sucesso!');
				redirect('perguntas/certo-ou-errado/'.$id_quiz,'refresh');
			else:
				$this->session->flashdata('retorno', 'Falha o excluir a pergunta!');
				redirect('perguntas/certo-ou-errado/'.$id_quiz,'refresh');
			endif;
		#}else{
		#	echo 'Não foi possível excluir a pergunta';
		#}
	}

	public function resposta_certa($id)
	{
		if(!$this->session->userdata('logado')){
			redirect('login');
		}
		#Resgata informações do quiz de acordo com seu ID que é passado como 3º segmento da URL
		#Também pega os perfis cadastrados para aquele quiz
		#Seta algumas variáveis em branco que serão populadas após o loop da consulta
		#Pega as perguntas que já estão salvas no banco
		$data  			= $this->quiz_model->get($id);
		#$faixas 		= $this->perfil_model->get_all($id);
		$option_perfil 	= '';
		$list_perguntas	= '';
		$list_respostas = '';
		$options_select = array();
		$perguntas   	= $this->pergunta_model->get_all($id);

		#Gera a listagem de perguntas e suas respostas
		$count = -1;
		if($perguntas->num_rows() > 0){
			foreach($perguntas->result() as $pergunta){
				$count++;
				$list_perguntas .= '
										<div class="group salvo" id="'.$count.'">					
											<div class="header">
												<span class="icon"></span>
												<div class="input"><input type="text" name="nome" id="nome-pergunta-'.$count.'" value="'.$pergunta->pergunta.'" size="" /></div>
												<span class="arrow"></span>
												<a href="'.site_url('remover-pergunta-ce').'/'.$pergunta->id.'" id="pergunta-'.$count.'" rel="'.$pergunta->id_quiz.'" class="excluir excluir-pergunta-ce" title="Excluir esta perguta"></a>
											</div>
											<div class="body">							
												<div id="perguntas">								
													<div class="texto">
														<label for="link">Link de referência:</label>
														<div class="input"><input type="text" name="link" id="link-pergunta-'.$count.'" value="'.$pergunta->link_referencia.'" size="" /></div>
														<label for="texto">Texto do link de referência:</label>
														<div class="input"><input type="text" name="texto" id="texto-pergunta-'.$count.'" value="'.$pergunta->texto_link.'" size="" /></div>
													</div>
													<div class="imagem">
														<label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px<br />Formatos: JPG, PNG e GIF<br />Tamanho: 1MB<br />Nomes sem acentos e caracteres especiais</span></label>
														
														<form class="fileupload" id="form-file-upload-pergunta" action="'.base_url().'assets/server/php/" method="POST" enctype="multipart/form-data">
															<div class="quadro"><img id="alvo-pergunta-'.$count.'" src="'.str_replace('../../', '../../', $pergunta->imagem).'" name="imagem" /></div>
															<span class="btn btn-success fileinput-button">
																<input id="file" type="file" />
															</span>
															<a href="javascript:void(0);" class="excluir excluir-imagem"></a>
														</form>
														<input type="hidden" id="id-pergunta-'.$count.'" name="id-pergunta" value="'.$pergunta->id.'" />
													</div>
												</div><!--perguntas-->
												<input type="hidden" id="id_quiz" name="id_quiz" value="'.$pergunta->id_quiz.'" />

												<div id="respostas">
												
													<div class="titulo-respostas">Respostas:</div>
													
													<div id="sortable'.$count.'" class="sorteia">
												';
				#Faço uma consulta na tabela de respostas para pegar a tabela daquela determinada pergunta e daquele determinado quiz												
				$respostas = $this->resposta_model->get_all($pergunta->id);
				#Contagem inicial de cada loop
				$count_resp= -1;
				#Gerar os box de respostas
				foreach($respostas->result() as $resposta){
					$count_resp++;
					$list_perguntas		.=	'			
																<div class="header">
																	<span class="icon"></span>
																	<a href="'.site_url('remover-resposta').'/'.$resposta->id.'" class="excluir excluir-dois" rel="'.$resposta->id_quiz.'"></a>
																	<div class="input">
																		<input type="text" name="nome-resposta" id="nome-resposta-'.$count_resp.'" value="'.$resposta->resposta.'" size="" />
																		<input type="hidden" name="id-resposta" id="id-resposta-'.$count_resp.'" value="'.$resposta->id.'"/>
																	</div>
																	
											';
					if($resposta->perfil_resposta == '10'){

						$list_perguntas		.=							'
																		<div class="checkbox">
																			<input type="checkbox" id="checkbox'.$count_resp.$count.'" checked="checked value="'.$resposta->perfil_resposta.'" name="grupo'.$count.'" />
																			Esta é a resposta correta
																		</div>
																		';
					
					}else{
						$list_perguntas		.=							'
																		<div class="checkbox">
																			<input type="checkbox" id="checkbox'.$count_resp.$count.'" value="'.$resposta->perfil_resposta.'" name="grupo'.$count.'" />
																			Esta é a resposta correta
																		</div>
																		';
					}												
											
					$list_perguntas 	.=	'

																</div>
										';
				}
				#Fecha as listagem de perguntas já com suas respostas inclusas
				$list_perguntas		.=  '													
													</div>
													<a id="nova-resposta-variasRespostas" class="nova-resposta" href="javascript:void(0)"></a>
												</div><!--respostas-->

											</div><!--body-->							
									</div><!--group-->
									<input type="hidden" name="tipo_quiz" id="tipo_quiz" value="'.$this->uri->segment(2).'" />
									';
			}

		}
		#variáveis que serão passadas para a View
		$data['page_title'] 	= ' Perguntas e Respotas do tipo Várias respostas corretas';
		$data['option_perfil'] 	= $option_perfil; 
		$data['perguntas']		= $list_perguntas;
		$data['quantidade']		= $this->pergunta_model->count_rows($id);
		#Chama a view dentro do template
		$this->template->show('perguntas', $data);
	}
	//Action Perguntas do Tipo Enquete
	public function enquete($id)
	{
		if(!$this->session->userdata('logado')){
			redirect('login');
		}
		#Resgata informações do quiz de acordo com seu ID que é passado como 3º segmento da URL
		#Também pega os perfis cadastrados para aquele quiz
		#Seta algumas variáveis em branco que serão populadas após o loop da consulta
		#Pega as perguntas que já estão salvas no banco
		$data  			= $this->quiz_model->get($id);
		#$faixas 		= $this->perfil_model->get_all($id);
		$option_perfil 	= '';
		$list_perguntas	= '';
		$list_respostas = '';
		$options_select = array();
		$perguntas   	= $this->pergunta_model->get_all($id);

		#Gera a listagem de perguntas e suas respostas
		$count = -1;
		if($perguntas->num_rows() > 0){
			foreach($perguntas->result() as $pergunta){
				$count++;
				$list_perguntas .= '
										<div class="group salvo" id="'.$count.'">					
											<div class="header">
												<span class="icon"></span>
												<div class="input"><input type="text" name="nome" id="nome-pergunta-'.$count.'" value="'.$pergunta->pergunta.'" size="" /></div>
												<span class="arrow"></span>
												<a href="'.site_url('remover-pergunta-ce').'/'.$pergunta->id.'" id="pergunta-'.$count.'" rel="'.$pergunta->id_quiz.'" class="excluir excluir-pergunta-ce" title="Excluir esta perguta"></a>
											</div>
											<div class="body">							
												<div id="perguntas">								
													<div class="texto">
														<label for="link">Link de referência:</label>
														<div class="input"><input type="text" name="link" id="link-pergunta-'.$count.'" value="'.$pergunta->link_referencia.'" size="" /></div>
														<label for="texto">Texto do link de referência:</label>
														<div class="input"><input type="text" name="texto" id="texto-pergunta-'.$count.'" value="'.$pergunta->texto_link.'" size="" /></div>
													</div>
													<div class="imagem">
														<label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px<br />Formatos: JPG, PNG e GIF<br />Tamanho: 1MB<br />Nomes sem acentos e caracteres especiais</span></label>
														
														<form class="fileupload" id="form-file-upload-pergunta" action="'.base_url().'assets/server/php/" method="POST" enctype="multipart/form-data">
															<div class="quadro"><img id="alvo-pergunta-'.$count.'" src="'.str_replace('../../', '../../', $pergunta->imagem).'" name="imagem" /></div>
															<span class="btn btn-success fileinput-button">
																<input id="file" type="file" />
															</span>
															<a href="javascript:void(0);" class="excluir excluir-imagem"></a>
														</form>
														<input type="hidden" id="id-pergunta-'.$count.'" name="id-pergunta" value="'.$pergunta->id.'" />
													</div>
												</div><!--perguntas-->
												<input type="hidden" id="id_quiz" name="id_quiz" value="'.$pergunta->id_quiz.'" />

												<div id="respostas">
												
													<div class="titulo-respostas">Respostas:</div>
													
													<div id="sortable'.$count.'" class="sorteia">
												';
				#Faço uma consulta na tabela de respostas para pegar a tabela daquela determinada pergunta e daquele determinado quiz												
				$respostas = $this->resposta_model->get_all($pergunta->id);
				#Contagem inicial de cada loop
				$count_resp= -1;
				#Gerar os box de respostas
				foreach($respostas->result() as $resposta){
					$count_resp++;
					$list_perguntas		.=	'			
																<div class="header">
																	<span class="icon"></span>
																	<a href="'.site_url('remover-resposta').'/'.$resposta->id.'" class="excluir excluir-dois" rel="'.$resposta->id_quiz.'"></a>
																	<div class="input">
																		<input type="text" name="nome-resposta" id="nome-resposta-'.$count_resp.'" class="ponto-resposta-enquete" value="'.$resposta->resposta.'" size="" />
																		<input type="hidden" name="id-resposta" id="id-resposta-'.$count_resp.'" value="'.$resposta->id.'"/>
																	</div>
																	
											';
					if($resposta->perfil_resposta == '10'){

						$list_perguntas		.=							'
																			<input type="hidden" id="checkbox'.$count_resp.$count.'" checked="checked value="'.$resposta->perfil_resposta.'" name="grupo'.$count.'" />

																		';
					
					}else{
						$list_perguntas		.=							'
																			<input type="hidden" id="checkbox'.$count_resp.$count.'" value="'.$resposta->perfil_resposta.'" name="grupo'.$count.'" />

																		';
					}												
											
					$list_perguntas 	.=	'

																</div>
										';
				}
				#Fecha as listagem de perguntas já com suas respostas inclusas
				$list_perguntas		.=  '													
													</div>
													<a id="nova-resposta-enquete" class="nova-resposta" href="javascript:void(0)"></a>
												</div><!--respostas-->

											</div><!--body-->							
									</div><!--group-->
									<input type="hidden" name="tipo_quiz" id="tipo_quiz" value="'.$this->uri->segment(2).'" />
									';
			}

		}
		#variáveis que serão passadas para a View
		$data['page_title'] 	= ' Perguntas e Respotas do tipo Enquete';
		$data['option_perfil'] 	= $option_perfil; 
		$data['perguntas']		= $list_perguntas;
		$data['quantidade']		= $this->pergunta_model->count_rows($id);
		#Chama a view dentro do template
		$this->template->show('perguntas', $data);
	}

	//Action que retorna range final do slider de faixa
	public function qtd_perguntas(){
		$id 	= $this->input->get('id');
		$tipo 	= $this->input->get('tipo');
		if($tipo != 'resposta_certa'){
			if($tipo == 'enquete'){
				$quantidade = $this->resposta_model->count_varias_corretas($id);
				echo $quantidade*10;
			}else{
				$quantidade = $this->pergunta_model->count_rows($id);
				echo $quantidade*10;
			}
		}else{
			$quantidade = $this->resposta_model->count_varias_corretas($id);
			echo $quantidade*10;
		} 
	}
}

/* End of file perguntas.php */
/* Location: ./application/controllers/perguntas.php */