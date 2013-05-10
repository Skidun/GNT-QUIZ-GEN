<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Dashboard Controller.
	 *
	 * Esse controller possui todos os métodos referente à dashboard do sistema
	 * Ele é reponsável por carregar  os quizes na tela inicial após o login
	 * 
	 */

	private $quizes_pagina = 20;

	public function __construct()
	{
		parent::__construct();
		//Carregar o Model Quiz
		$this->load->model('quiz_model');
		if(!$this->session->userdata('logado')){
			redirect('login');
		}
	}
	
	public function index($de_paginacao=0)
	{	
		$data['page_title'] = 'Dashboard';
		# Preparando o limite da paginação
        $de_paginacao = ( $de_paginacao < 0 || $de_paginacao == 1 ) ? 0 : (int) $de_paginacao;
        # Acessa o Model, executa a função get_all() e recebe os quizes    
        $quizes = $this->quiz_model->get_all($de_paginacao, $this->quizes_pagina);        
        $total = $this->quiz_model->count_rows();

        foreach($quizes->result() as $quiz):
        	$tr = '<tr>
						<td>';
			$tr.= '<div class="texto">
						<p>'.$quiz->titulo.'</p>
						<span>tipo: '.$quiz->tipo.' | editado em: '.date('d-m-Y', strtotime($quiz->data)).'</span>
				   </div>
				   <div class="botoes">
						<a class="ver-e-embutir" href="#"></a>
						<ul class="menu-editar">
							<li><div class="editar"></div>
								<ul class="nav2">
									<li><a href="#">nome e tipo</a></a></li>
									<li><a href="#">perfis</a></a></li>
									<li><a href="#">perguntas & respostas</a></a></li>
									<li><a href="#">customizacao</a></a></li>
									<li><a href="#">excluir</a></a></li>
								</ul>
							</li>
						</ul>
					</div>';
			$tr.= '</td>
				</tr>';

			$data['quizes']		 = $tr;						
        endforeach;	
        $numero_links =  $total / $this->quizes_pagina; 
        # Paginação
        $config_paginacao['base_url']   = site_url('dashboard');
        $config_paginacao['total_rows'] = $total;
        $config_paginacao['uri_segment'] = 4;
        $config_paginacao['num_links'] = $numero_links;
        $config_paginacao['per_page'] = $this->quizes_pagina;
        
        $this->pagination->initialize($config_paginacao);
            
        $data['html_paginacao'] = $this->pagination->create_links();
		$this->template->show('home', $data);

	}

	public function create()
	{
		$data['page_title'] = "Cadastrar Novo Quiz";
		$this->template->show('create_quiz', $data);
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */