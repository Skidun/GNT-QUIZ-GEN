<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Visualizacao extends CI_Controller {

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

	public function resultado_perfil()
	{
		function key_compare_func($key1, $key2)
		{
		    if ($key1 == $key2)
		        return 0;
		    else if ($key1 > $key2)
		        return 1;
		    else
		        return -1;
		}

		$resposta_perfil = $this->perfil_model->get_all($this->input->get('id_quiz')); 
		$resposta_user 	 = $this->input->get('respostas');
		$perfil 		 = array();
		/*foreach($resposta_perfil->result() as $perfis){
			array_push($perfil, $perfis->id);
		}*/

		$x="";
		for($i=0;$i<count($resposta_user);$i++){

        	if ( $x == $resposta_user[$i] ) {
        		echo $x;
        	}
      		$x = $resposta_user[$i];
		}

	}

}

/* End of file customizacao.php */
/* Location: ./application/controllers/customizacao.php */