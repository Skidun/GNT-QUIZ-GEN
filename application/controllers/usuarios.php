<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->form_validation->set_message('required', 'Esse campo é de preenchimento obrigatório');
		$this->form_validation->set_message('valid_email', 'Informe um e-mail válido');
		$this->form_validation->set_message('is_unique', 'Esse e-mail já está cadastrado');
		$this->form_validation->set_message('matches', 'Os valores precisam ser iguais');
		$this->form_validation->set_error_delimiters('<small style="color: #c9451e;">', '</small');

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
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[usuarios.email]');
		$this->form_validation->set_rules('senha', 'Senha', 'trim|required|matches[confirmaSenha]|md5');
		$this->form_validation->set_rules('confirmaSenha', 'Confirma Senha', 'trim|required');

		if($this->form_validation->run() == false){
			$this->template->show('create_usuario');
		}else{
			$data['nome']  = $this->input->post('nome', TRUE);
			$data['email'] = $this->input->post('email', TRUE);
			$data['senha'] = $this->input->post('senha', TRUE);

			$create = $this->user_model->create($data);

			if($create){
				$this->session->set_flashdata('retorno', 'Usuário cadastrado com sucesso');
				redirect('todos-os-usuarios', 'refresh');
			}else{
				$this->session->set_flashdata('retorno', 'Houve um erro ao tentar cadastrar usuário');
				redirect('cadastrar-novo-usuario', 'refresh');
			}
		}		
	}

	public function update()
	{
		$this->form_validation->set_rules('nome', 'Nome', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[usuarios.email]');
		$this->form_validation->set_rules('senha', 'Password', 'trim|required|matches[confirmaSenha]|md5');
		$this->form_validation->set_rules('confirmaSenha', 'Confirma Senha', 'trim|required');

		if($this->form_validation->run() == false){
			$this->template->show('create_usuario');
		}else{
			$data['nome']  = $this->input->post('nome', TRUE);
			$data['email'] = $this->input->post('email', TRUE);
			$data['senha'] = $this->input->post('senha', TRUE);
			$id    		   = $this->input->post('id', TRUE);

			$update = $this->user_model->update($id, $data);

			if($update){
				$this->session->set_flashdata('retorno', 'Usuário atualizado com sucesso');
				redirect('todos-os-usuarios', 'refresh');
			}else{
				$this->session->set_flashdata('retorno', 'Houve um erro ao tentar atualizar o usuário');
				redirect('todos-os-usuarios', 'refresh');
			}
		}	
		
	}

	public function remove($id)
	{
		$remove = $this->user_model->delete($id);
		#if($remove){
			$this->session->set_flashdata('retorno', 'Usuário removido com sucesso');
			redirect('todos-os-usuarios', 'refresh');
		#}
	}

}

/* End of file usuarios.php */
/* Location: ./application/controllers/usuarios.php */