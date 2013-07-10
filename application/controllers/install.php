<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Install extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}	

	public function index()
	{
		$data = array();
		//Checa se existe usuários	
		$users = $this->user_model->get();
		if($users){
			$data['already_installed'] = TRUE;
		}else{
			$data['already_installed'] = FALSE;
		}
		//Load View
		$data['page_title'] = "Instalação";
		$data['emailUsuario'] = '';
		$data['senhaUsuario'] = '';
			
		$this->template->show('login', $data);
	}
	
	public function run()
	{
		//Verifica se existe usuários
		$users = $this->user_model->get();
		if(!$users)
		{
			$insert = array(
			 'email' => $this->input->post('txt-login'),
			 'senha' => $this->input->post('txt-password'),
			);
			$create = $this->user_model->create($insert);
			if($create){
				redirect('login');
			}
		}else{
			redirect('login');
		}
		
		//load view
		#$data['page_title'] = "Login";
		
		#$data['emailUsuario'] = '';
		#$data['senhaUsuario'] = '';
		
		#$this->template->show('login', $data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */