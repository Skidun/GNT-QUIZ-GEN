<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quiz extends CI_Controller {

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
		if(!$this->session->userdata('logado')){
			redirect('login');
		}
		$this->load->model('faixa_model');
	}
	
	public function index()
	{
		$this->all();
	}

	public function all($de_paginacao=0)
	{	
		$data['page_title'] = 'Dashboard';
		# Preparando o limite da paginação
        $de_paginacao = ( $de_paginacao < 0 || $de_paginacao == 1 ) ? 0 : (int) $de_paginacao;
        # Acessa o Model, executa a função get_all() e recebe os quizes    
        $quizes = $this->quiz_model->get_all($de_paginacao, $this->quizes_pagina);        
        $total = $this->quiz_model->count_rows();
		$tr = '';
        foreach($quizes->result() as $quiz){
        	$tr .= '<tr>
						<td>';
			$tr .= '<div class="texto">
						<p>'.$quiz->titulo.'</p>
						<span>tipo: '.$quiz->tipo.' | editado em: '.date('d-m-Y', strtotime($quiz->data_alteracao)).'</span>
				   </div>
				   <div class="botoes">
						<a class="ver-e-embutir" href="'.site_url("visualizacao/".$quiz->tipo."/".$quiz->id).'"></a>
						<ul class="menu-editar">
							<li><div class="editar"></div>
								<ul class="nav2">
									<li><a href="'.site_url('editar-quiz').'/'.$quiz->id.'">nome</a></a></li>
									';
									switch ($quiz->tipo) {
										case 'perfil':
					$tr .=					'<li><a href="'.site_url('quiz_tipo').'/'.$quiz->tipo.'/'.$quiz->id.'">perfis</a></a></li>
											 <li><a href="'.site_url('perguntas').'/'.$quiz->tipo.'/'.$quiz->id.'">perguntas & respostas</a></a></li>';
										break;

										default:
					$tr .=					'<li><a href="'.site_url('perguntas').'/'.$quiz->tipo.'/'.$quiz->id.'">perguntas & respostas</a></a></li>
											 <li><a href="'.site_url('quiz_tipo').'/'.$quiz->tipo.'/'.$quiz->id.'">faixas de classificação</a></a></li>';
											break;
									}
					$tr .=		'	<li><a href="'.site_url('customizacao/'.$quiz->tipo.'/'.$quiz->id).'">customizacao</a></a></li>
									<li><a href="'.site_url('remover-quiz').'/'.$quiz->id.'" id="btn-excluir-quiz">excluir</a></a></li>
								</ul>
							</li>
						</ul>
					</div>';
			$tr .= '</td>
				</tr>';							
       	}
       	$data['quizes']	= $tr;

        $numero_links =  $total / $this->quizes_pagina; 
        # Paginação
        $config_paginacao['base_url']   = site_url('visualizar-todos-quizes');
        $config_paginacao['total_rows'] = $total;
        $config_paginacao['uri_segment'] = 2;
        $config_paginacao['num_links'] = $numero_links;
        $config_paginacao['per_page'] = $this->quizes_pagina;
        
        $this->pagination->initialize($config_paginacao);
            
        $data['html_paginacao'] = $this->pagination->create_links();
		

		$this->template->show('home', $data);

	}
	//Chama view que Cria novo view
	public function create()
	{
		$data['page_title'] = "Cadastrar Novo Quiz";
		$this->template->show('create_quiz', $data);
	}
	//Chama view que edita o Quiz
	public function edit($id)
	{
		$data['page_title'] = "Editar Quiz $id";
		$data = $this->quiz_model->get($id);
		$this->template->show('edit_quiz', $data);
	}
	//Salva o Quiz cadastrado no banco de dados
	public function save()
	{
		$this->form_validation->set_rules('titulo', 'Titulo', 'trim|required|max_length[140]|xss_clean');
		
		if(!$this->form_validation->run()){
			$this->template->show('create_quiz');
		}else{
			$data['titulo'] 		= $this->input->post('titulo', TRUE);
			$data['tipo']   		= $this->input->post('tipo', TRUE);
			$data['data_criacao']   = date('Y-m-d H:i:s'); 
			$data['data_alteracao'] = date('Y-m-d H:i:s');
			$data['id_usuario']    	= $this->session->userdata('id');

			$result = $this->quiz_model->create($data);

			if($result){
				$query = $this->db->get('quiz');
		        // Retorna o último ID inserido
		        $last = $query->last_row('array');

		        $id = $last['id'];
		        //Cria a customização Default de todos os quizes
		        $this->customizacao_model->create($id);
		        //Verifica o tipo do quiz para
		        switch ($this->input->post('tipo', TRUE)) {
		        	case 'perfil':
		        		//$this->session->set_flashdata('id_quiz', $id);
		        		redirect("quiz_tipo/perfil/".$id);
		        		break;
		        	
		        	case 'certo-ou-errado':
		        		//$this->session->set_flashdata('id_quiz', $id);
		        		redirect('perguntas/certo-ou-errado/'.$id);
		        		break;
		        	
		        	case 'resposta_certa':
		        		$this->session->set_flashdata('id_quiz', $id);
		        		redirect('perguntas/resposta_certa/'.$id);
		        		break;

		        	case 'apenas_uma':
		        		$this->session->set_flashdata('id_quiz', $id);
		        		redirect('perguntas/apenas_uma/'.$id);
		        		break;		
		        }
			}
		}
	}
	//Faz update do quiz
	public function update()
	{
		$this->form_validation->set_rules('titulo', 'Titulo', 'trim|required|max_length[140]|xss_clean');
		$data['titulo'] 		= $this->input->post('titulo', TRUE);
		$data['data_alteracao'] = date('Y-m-d H:i:s');
		$data['id_usuario']    	= $this->session->userdata('id');
		
		if(!$this->form_validation->run()){
			$this->template->show('edit_quiz');
		}else{
			$result = $this->quiz_model->update($this->input->post('id'), $data);

			if($result){
				$this->session->set_flashdata('update-ok', 'Quiz '.$data['titulo'].' foi alterado com sucesso');
				redirect('visualizar-todos-quizes', 'refresh');
			}
		}
	}

	public function show_quiz($id){
		$customizacao 				= $this->customizacao_model->get($id);
		$perguntas 					= $this->pergunta_model->get_all($id);
		$perfis						= $this->perfil_model->get($id);
		$html_perguntas = '';
		$html_resposta  = '';
		$count_resposta = -1;
		#HTML das Tabelas
		foreach($perguntas->result() as $pergunta){
			$count_resposta++;
			$html_perguntas .= '
									<div class="slide">
									<div id="texto">
										<div class="titulo" style="font-size:'.$customizacao['pergunta_quiz_font_size'].'; color:#'.$customizacao['pergunta_quiz_font_color'].'; text-align:'.$customizacao['pergunta_quiz_align'].';">'.$pergunta->pergunta.'</div>
										<div class="subtitulo" style="text-align:'.$customizacao['link_ref_pergunta_align'].'"><a href="'.$pergunta->link_referencia.'" target="_blank" style="font-size:'.$customizacao['link_ref_pergunta_font_size'].'; color:#'.$customizacao['link_ref_pergunta_font_color'].';">'.$pergunta->texto_link.'</a></div>
										<table class="respostas" style="font-size:'.$customizacao['resposta_pergunta_font_size'].'; color:#'.$customizacao['resposta_pergunta_font_color'].'; text-align:'.$customizacao['resposta_pergunta_align'].';">
										';
						$respostas					= $this->resposta_model->get_all($pergunta->id);
						foreach($respostas->result() as $resposta):
							if($resposta->tipo_resposta != 'resposta_certa'){				
								$html_perguntas.='
													<tr>
														<td><input type="radio" name="resposta'.$count_resposta.'" value="'.$resposta->perfil_resposta.'" /></td>
														<td>'.$resposta->resposta.'</td>
													</tr>
												';
							}else{
								$html_perguntas.='
													<tr>
														<td><input type="checkbox" name="resposta'.$count_resposta.'" value="'.$resposta->perfil_resposta.'" /></td>
														<td>'.$resposta->resposta.'</td>
													</tr>
												';
							}
						endforeach;											
			$html_perguntas	.=	'
										</table>
									</div>
								';
								if($pergunta->imagem == base_url().'assets/img/backgrounds/imagem.png' || $pergunta->imagem == '../../assets/img/backgrounds/imagem.png'){
			$html_perguntas .=	'
									</div>
								';
								}else{
			$html_perguntas .=	'
								<div id="imagem" style="background: #fdd595;">
										<img id="alvo-perguntas" src="'.$pergunta->imagem.'" />
									</div>
							    </div>
								';
			}
		}
		#Array com as informações que são enviados para a view
		$data  						= $this->quiz_model->get($id);
		$data['customizacao']		= $customizacao;
		$data['perguntas']  		= $html_perguntas;
		$data['respostas']  		= $respostas->result();
		$data['perfis'] 			= $perfis;
		$data['page_title']			=	'Visualizar Quiz';
		/*if($perfis == NULL){
			redirect('quiz_tipo/perfil/'.$id);
		}elseif($perguntas == NULL || $respostas == NULL){
			redirect('perguntas/perfil/'.$id);
		}*/
		$this->template->show('visualizacao', $data);
	}

	public function remove($id)
	{
		$data = $id;
		$this->perfil_model->quiz_delete($data);
		$this->faixa_model->quiz_delete($data);
		$this->pergunta_model->quiz_delete($data);
		$this->resposta_model->quiz_delete($data);
		$this->customizacao_model->quiz_delete($data);
		$result =  $this->quiz_model->delete($data);

		if($result){
			$this->session->set_flashdata('delete-ok', 'Quiz '.$id.' foi excluido');
			redirect('visualizar-todos-quizes', 'refresh');
		}
	}

	#Valida o time stamp do quiz
	public function valida_timestamp()
	{
		$id 		= $this->input->get('id',true);
		$time_stamp = $this->input->get('data_alteracao', true);

		$query = $this->quiz_model->valida_timestamp($id, $time_stamp);
		
		if($query->num_rows > 0){
			echo "ok";
		}else{
			echo "fail";
		}
	}
	#Update Time Stamp
	public function update_timestamp()
	{
		$id 					= $this->input->get('id_quiz', true);
		$data['data_alteracao'] = date('Y-m-d H:i:s');
		$data['id_usuario']    	= $this->session->userdata('id');
		
		$result = $this->quiz_model->update($id, $data);
			if($result){
				echo 'ok';
			}else{
				echo 'falha';
			}
		
	}
	#show base_url
	public function show_base_url()
	{
		echo base_url();
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */