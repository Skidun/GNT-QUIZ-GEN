<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
** Controller que contem os tipos de Quizes e redireciona-os para suas respectivas views com seus respectivos atributos
** O model desse controller está sendo carregado no config/autoload.php
**/

class Quiz_tipo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('logado')){
			redirect('login');
		}
	}

	public function index()
	{
		
	}

	public function get_perfil()
	{	
		$id = $this->input->get('id');
		$perfis = $this->perfil_model->get_all($id);
		$option_perfil = '';

		foreach($perfis->result() as $perfil){
			$option_perfil .= '<option value="'.$perfil->id.'">'.$perfil->titulo.'</option>';
		}

		echo $option_perfil;
	}

	public function perfil($id)
	{
		//$id_quiz = $this->session->flashdata('id_quiz');

		$data  	= $this->quiz_model->get($id);
		$perfis = $this->perfil_model->get_all($id);
		$count = -1;
		$grupo = '';
		foreach($perfis->result() as $perfil){
			$count++;
			$grupo .= '

					<div class="group salvo" id="'.$count.'">
							<div class="header">
								<span class="icon"></span>
								<div class="input"><input type="text" name="nome" id="nome-perfil-'.$count.'" value="'.$perfil->titulo.'" size="" /></div>
								<span class="arrow"></span>
								<a href="'.site_url('remover-perfil/'.$perfil->id).'" id="'.$count.'" class="excluir excluir-um remover-perfil" rel="'.$perfil->id_quiz.'"></a>
							</div>
							<div class="body">
								<div class="texto">
									<label for="descricao">Descrição</label>
									<div class="textarea"><textarea name="descricao" id="descricao-perfil-'.$count.'" cols="" rows="">'.$perfil->descricao.'</textarea></div>
									<label for="link">Link de referência:</label>
									<div class="input"><input type="text" name="link" id="link-perfil-'.$count.'" value="'.$perfil->link_referencia.'" size="" /></div>
									<label for="texto">Texto do link de referência:</label>
									<div class="input"><input type="text" name="texto" id="texto-perfil-'.$count.'" value="'.$perfil->texto_link.'" size="" /></div>
									
								</div>
								<div class="imagem">
									<label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px</span></label>
									
									<form class="fileupload" action="'.site_url('assets/server/php/').'" method="POST" enctype="multipart/form-data">
										<div class="quadro"><img id="alvo-'.$count.'" src="'.$perfil->imagem.'" name="imagem" /></div>
										<span class="btn btn-success fileinput-button">
											<input id="file" type="file" id="" />
										</span>
									</form>
									<input type="hidden" name="id-perfil-'.$count.'" id="id-perfil-'.$count.'" value="'.$perfil->id.'" />
								</div>
							</div>
						</div>
			';

		}

		$data['perfis'] = $grupo;
		$data['quantidade'] = $this->perfil_model->count_rows($id);
		$this->template->show('perfil1', $data);
	}

	public function save_perfil()
	{
		$data['titulo'] 			= $this->input->get('titulo');
		$data['descricao'] 			= $this->input->get('descricao');
		$data['link_referencia'] 	= $this->input->get('link_referencia');
		$data['texto_link'] 		= $this->input->get('texto_link');
		$data['imagem'] 			= $this->input->get('imagem');
		$data['ordem'] 				= $this->input->get('ordem');
		$data['id_quiz'] 			= $this->input->get('id_quiz');

		$result  = $this->perfil_model->create($data);
		if($result){
			echo json_encode(array('result' => 'sucesso'));
		}else{
			echo json_encode(array('result' => 'falha'));
		}
	}

	public function update_perfil()
	{
		$id 					 	= $this->input->get('id');
		$data['titulo'] 			= $this->input->get('titulo');
		$data['descricao'] 			= $this->input->get('descricao');
		$data['link_referencia'] 	= $this->input->get('link_referencia');
		$data['texto_link'] 		= $this->input->get('texto_link');
		$data['imagem'] 			= $this->input->get('imagem');
		$data['ordem'] 				= $this->input->get('ordem');

		$result  = $this->perfil_model->update($id, $data);
		if($result){
			echo 'sucesso';
		}else{
			echo 'falha';
		}
	}

	public function remove_perfil($id)
	{
		$img_perfil	 = explode(',',$this->input->get('imagem'));
		$id_quiz = $this->input->get('id_quiz');
		$dir     = 'assets/server/php/files/';
		$imagem	 = $img_perfil[1];

		$remove_imagem = unlink('./'.$dir.$imagem);

		$this->resposta_model->perfil_delete($id, $id_quiz);
		$result = $this->perfil_model->delete($id, $id_quiz);
		if($result):
			$this->session->flashdata('retorno', 'Perfil Atualizado com sucesso');
			redirect('quiz_tipo/perfil/'.$id_quiz,'refresh');
		endif;	
	}

}

/* End of file quiz_tipo.php */
/* Location: ./application/controllers/quiz_tipo.php */