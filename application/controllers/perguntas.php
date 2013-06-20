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
		$data  			= $this->quiz_model->get($id);
		$perfis 		= $this->perfil_model->get_all($id);
		$option_perfil 	= '';
		$list_perguntas	= '';
		$list_respostas = '';
		$perguntas   	= $this->pergunta_model->get_all($id);
		//Gera as options de perfis para cada resposta
		foreach($perfis->result() as $perfil){
			$option_perfil .= '<option value="'.$perfil->id.'">'.$perfil->titulo.'</option>';
		}
		//Gera a listagem de perguntas e suas respostas
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
														<label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px</span></label>
														
														<form class="fileupload" action="'.base_url().'assets/server/php/" method="POST" enctype="multipart/form-data">
															<div class="quadro"><img id="alvo-pergunta-'.$count.'" src="'.str_replace('../../', '../../', $pergunta->imagem).'" name="imagem" /></div>
															<span class="btn btn-success fileinput-button">
																<input id="file" type="file" />
															</span>
														</form>
														<input type="hidden" id="id-pergunta-'.$count.'" name="id-pergunta" value="'.$pergunta->id.'" />
													</div>
												</div><!--perguntas-->
												<input type="hidden" id="id_quiz" name="id_quiz" value="'.$pergunta->id_quiz.'" />
												<div><a href="'.site_url('remover-pergunta').'/'.$pergunta->id.'" id="pergunta-'.$count.'" rel="'.$pergunta->id_quiz.'" class="excluir-pergunta" title="Excluir esta perguta" style="color: red; font-size: 18px;">Excluir pergunta</a></div>

												<div id="respostas">
												
													<div class="titulo-respostas">Respostas:</div>
													
													<div id="sortable'.$count.'" class="sorteia">
												';
				//Faço uma consulta na tabela de respostas para pegar a tabela daquela determinada pergunta e daquele determinado quiz												
				$respostas = $this->resposta_model->get_all($id, $pergunta->id);
				//Contagem inicial de cada loop
				$count_resp= -1;
				//Gerar os box de respostas
				foreach($respostas->result() as $resposta){
					$count_resp++;
					$list_perguntas		.=	'			
																<div class="header">
																	<span class="icon"></span>
																	<div class="input"><input type="text" name="nome" id="nome-resposta-'.$count_resp.'" value="'.$resposta->resposta.'" size="" /></div>
																	<select name="perfil-resposta" id="perfil-resposta-'.$count_resp.'" class="default">
																		<option value='.$resposta->perfil_resposta.'>'.$resposta->titulo.'</option>
																	</select>
																</div>
										';
				}
				//Fecha as listagem de perguntas já com suas respostas inclusas
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

		$data['page_title'] 	= ' Perguntas e Respotas do tipo perfil';
		$data['option_perfil'] 	= $option_perfil; 
		$data['perguntas']		= $list_perguntas;
		$data['quantidade']		= $this->pergunta_model->count_rows($id);
		$this->template->show('perguntas', $data);
	}

	public function save_pergunta_perfil()
	{
		$data['pergunta'] 			 = $this->input->get('texto', true);
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

	public function remove_pergunta($id)
	{
		//Se caso a imagem não for a padrão ele precisa remove-la do servidor
		if($this->input->get('imagem')){
			$img_perfil	 = explode(',',$this->input->get('imagem'));
			$dir     = 'assets/server/php/files/';
			$imagem	 = $img_perfil[1];
			$remove_imagem = unlink('./'.$dir.$imagem);
		}
		$filtro	 = 'id_pergunta';
		$id_quiz = $this->input->get('id_quiz');
		$this->resposta_model->delete($id, $id_quiz, $filtro);
		$result = $this->pergunta_model->delete($id, $id_quiz);
		if($result):
			$this->session->flashdata('retorno', 'Pergunta excluida com sucesso!');
			redirect('perguntas/perfil/'.$id_quiz,'refresh');
		else:
			$this->session->flashdata('retorno', 'Falha o excluir a pergunta!');
			redirect('perguntas/perfil/'.$id_quiz,'refresh');
		endif;	
	}

}

/* End of file perguntas.php */
/* Location: ./application/controllers/perguntas.php */