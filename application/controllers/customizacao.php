<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customizacao extends CI_Controller {

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
		$data  				= $this->quiz_model->get($id);
		$data['page_title']	=	'Customização do quiz';
		$this->template->show('customizacao', $data);
	}	

}

/* End of file customizacao.php */
/* Location: ./application/controllers/customizacao.php */