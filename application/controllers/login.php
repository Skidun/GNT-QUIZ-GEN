<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}	

	public function index()
	{
		$data['page_title'] = "Instalação";
		$data['email'] = '';
		$data['senha'] = '';
			
		$this->template->show('login', $data);
	}
	//Login
	public function validate()
	{
		//Recupera os valores de usuário e senha dos inputs
		$emailUsuario = $this->input->post('txt-login');
		$senhaUsuario = $this->input->post('txt-password');
		$result = $this->user_model->validate($emailUsuario, $senhaUsuario);
		if($result)
		{
			$this->session->set_userdata(array(
				'logado' 	=> TRUE,
				'id'	=> $result['id'],
				'nome' => $result['nome'],
				'email'=> $result['email'],
			));
			redirect('quiz');
		}
		
		//load view
		$data['page_title'] = "Login";
		
		$data['email'] = $emailUsuario;
		$data['senha'] = '';
		
		$data['error'] = TRUE;
		
		$this->template->show('login', $data);
	}
	//Logout
	public function logout()
	{
		$this->session->unset_userdata('logado');
		
		redirect('login');
	}

	//Chama form reset pass
	public function resetPass()
	{
		$data['title'] = 'Recuparação de senha';
		$data['recoverKey'] = $this->uri->segment(3);

		$this->template->show('reset_pass', $data);

	}
	//Reseta a senha
	public function reset_pass()
	{
		$this->form_validation->set_rules('txt-login', 'E-mail ', 'trim|required|valid_email');
        $this->form_validation->set_rules('txt-password', 'Senha', 'trim|required');
        $this->form_validation->set_rules('txt-password-repeat', 'Repita a senha', 'trim|required|matches[txt-password]');
        $this->form_validation->set_rules('recoverKey', 'recoverKey', 'trim|required');
        $recoverKey = $this->input->post('recoverKey');
        if($this->form_validation->run() == false){
        	redirect('login/resetPass/'.$recoverKey);
        }else{
        	$email      	= $this->input->post('txt-login');
        	$data['senha']	= md5($this->input->post('txt-password'));

        	$result = $this->user_model->reset_pass($email, $recoverKey, $data);

        	if($result){
        		$this->session->set_flashdata('pass_recovery', 'Sua senha foi salva com sucesso');
        		redirect('login', 'refresh');
        	}else{
        		$this->session->set_flashdata('pass_recovery', 'Houve um erro ao tentar resetar sua senha tente novamente');
        		redirect('login', 'refresh');
        	}
        }
	}

	//Recovery Password
	public function recovery()
	{
		$email =  $this->input->get('email');
		$data['recoverKey'] = md5(time().date('Y-m-d'));

		$result = $this->user_model->recovery($email, $data);

		if($result){
			//Antes desse ponto ele irá enviar o códgio por e-mail mas como o teste é local.
			echo json_encode(array('result' => 'sucesso', 'recoverKey' => $data['recoverKey']));
		}else{
			echo json_encode(array('result' => 'falha', 'erro' => 'E-mail não pertence a nenhum usuário'));
		}
	}

	//Restrict Área: verify if user are logged
	public function restrict()
	{
		if(!$this->session->userdata('logado')){
			redirect('login');
		}else{
			redirect('visualizar-todos-quizes');
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */