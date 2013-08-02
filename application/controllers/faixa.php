<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faixa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if(!$this->session->userdata('logado')){
			redirect('login');
		}
		//Carrega o Model de faixa
		$this->load->model('faixa_model');
	}

	public function index()
	{
		
	}

	public function save_faixa()
	{
		$data['range_de']		=	$this->input->get('range_de', true)*10;
		$data['range_ate']		=	$this->input->get('range_ate', true)*10;
		$data['titulo']			=	$this->input->get('titulo', 	true);
		$data['descricao']		=	$this->input->get('descricao', true);
		$data['link_referencia']=	$this->input->get('link_referencia', true);
		$data['texto_link']		=	$this->input->get('texto_link', true);
		$data['imagem']			=	$this->input->get('imagem', true);
		$data['id_quiz']		=	$this->input->get('id_quiz', true);

		$create = $this->faixa_model->create($data);
		if($create){
			echo 'sucesso';
		}else{
			echo 'falha';
		}
	}

	public function update_faixa($id)
	{
		$data['range_de']		=	$this->input->get('range_de', true);
		$data['range_ate']		=	$this->input->get('range_ate', true);
		$data['titulo']			=	$this->input->get('titulo', 	true);
		$data['descricao']		=	$this->input->get('descricao', true);
		$data['link_referencia']=	$this->input->get('link_referencia', true);
		$data['texto_link']		=	$this->input->get('texto_link', true);
		$data['imagem']			=	$this->input->get('imagem', true);
		$data['id_quiz']		=	$this->input->get('id_quiz', true);

		$update = $this->faixa_model->update($id, $data);
		if($update){
			echo 'sucesso';
		}else{
			echo 'falha';
		}
	}

	public function remove_faixa($id){
		@$img_perfil	 = explode(',',$this->input->get('imagem'));
		@$id_quiz = $this->input->get('id_quiz');
		@$dir     = 'assets/server/php/files/';
		@$imagem	 = $img_perfil[1];

		@$remove_imagem = unlink('./'.$dir.$imagem);

		$result = $this->faixa_model->delete($id, $id_quiz);
		if($result):
			$this->session->flashdata('retorno', 'Faixa removida com sucesso');
			redirect('quiz_tipo/certo-ou-errado/'.$id_quiz,'refresh');
		endif;
	}

}

/* End of file faixa.php */
/* Location: ./application/controllers/faixa.php */