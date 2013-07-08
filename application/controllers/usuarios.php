<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('logado')){
			redirect('login');
		}
	}
	
	public function index()
	{
		$data['usuarios'] = $this->user_model->get();
		$data['page_title'] = 'Todos usuários do sistema';
		$this->template->show('usuarios', $data);
	}

	public function edit($id)
	{
		$data['usuario'] 	 = $this->user_model->get($id);
		$data['page_title']  = 'Editar usuário '.$id;
		$this->template->show('edit_usuario', $data);
	}

	public function create()
	{
		$data['page_title'] = 'Criar novo usuário';
		$this->template->show('create_usuario', $data);
	}

	public function save()
	{
		$this->form_validation->set_rules('nome', 'Nome', 'trim|required');
		$this->form_validation->set_rules('e-mail', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('senha', 'Password', 'trim|required|matches[confirmaSenha]|md5');
		$this->form_validation->set_rules('confirmaSenha', 'Confirma Senha', 'trim|required');
		
	}

}

/* End of file usuarios.php */
/* Location: ./application/controllers/usuarios.php */