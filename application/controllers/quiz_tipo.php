<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quiz_tipo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('logado')){
			redirect('login');
		}
		$this->load->model('faixa_model');
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
									<label for="descricao">Descrição <div class="limite">Limite de caracteres:<span id="campospan" title="500">500</span></div></label>
									<div class="textarea"><textarea name="descricao" id="descricao-perfil-'.$count.'" cols="" rows="">'.$perfil->descricao.'</textarea></div>
									<label for="link">Link de referência:</label>
									<div class="input"><input type="text" name="link" id="link-perfil-'.$count.'" value="'.$perfil->link_referencia.'" size="" /></div>
									<label for="texto">Texto do link de referência:</label>
									<div class="input"><input type="text" name="texto" id="texto-perfil-'.$count.'" value="'.$perfil->texto_link.'" size="" /></div>
									
								</div>
								<div class="imagem">
									<label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px<br />Formatos: JPG, PNG e GIF<br />Tamanho: 1MB<br />Nomes sem acentos e caracteres especiais</span></label>
									
									<form class="fileupload" action="'.site_url('assets/server/php/').'" method="POST" enctype="multipart/form-data">
										<div class="quadro"><img id="alvo-'.$count.'" src="'.$perfil->imagem.'" name="imagem" /></div>
										<span class="btn btn-success fileinput-button">
											<input id="file" type="file" id="" />
										</span>
										<a href="javascript:void(0);" class="excluir excluir-imagem"></a>
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
		@$img_perfil	 = explode(',',$this->input->get('imagem'));
		@$id_quiz = $this->input->get('id_quiz');
		@$dir     = 'assets/server/php/files/';
		@$imagem	 = $img_perfil[1];

		@$remove_imagem = unlink('./'.$dir.$imagem);

		$this->resposta_model->perfil_delete($id, $id_quiz);
		$result = $this->perfil_model->delete($id, $id_quiz);
		if($result):
			$this->session->flashdata('retorno', 'Perfil Atualizado com sucesso');
			redirect('quiz_tipo/perfil/'.$id_quiz,'refresh');
		endif;	
	}
	#Certo ou errada
	public function faixa($id)
	{
		//$id_quiz = $this->session->flashdata('id_quiz');

		$data  	= $this->quiz_model->get($id);
		$faixas = $this->faixa_model->get_all($id);
		$count 	= -1;
		$grupo 	= '';
		foreach($faixas->result() as $faixa){
			$count++;
			$grupo .= '

					<div class="group salvo">
							<div class="header">
								<span class="icon"></span>
								<div class="input"><input type="text" name="nome" value="'.$faixa->titulo.'" size="" /></div>
								<span class="arrow"></span>
								<a class="excluir excluir-faixa" href="'.site_url('remover-faixa').'/'.$faixa->id.'" rel="'.$faixa->id_quiz.'"></a>
							</div>
							<div class="body">
								<!--O numero de identificacao do slider deve vir salvo do BD, o restante ele calcula dinamicamente para ser salvo-->
								<div class="textoDoSlider">Considere a quantidade de respostas corretas.</div>
								<div class="sliderHolder">
									<input type="text" id="amountIni" class="amountIni'.$count.'" value="'.$faixa->range_de.'" readonly />
									<input type="text" id="amountFin" class="amountFin'.$count.'" value="'.$faixa->range_ate.'" readonly />		
									<div id="slider'.$count.'"></div>
								</div>
								<div class="texto">
									<label for="descricao">Descrição <div class="limite">Limite de caracteres:<span id="campospan" title="500">500</span></div></label>
									<div class="textarea"><textarea name="descricao" cols="" rows="">'.$faixa->descricao.'</textarea></div>
									<label for="link">Link de referência:</label>
									<div class="input"><input type="text" name="link" value="'.$faixa->link_referencia.'" size="" /></div>
									<label for="texto">Texto do link de referência:</label>
									<div class="input"><input type="text" name="texto" value="'.$faixa->texto_link.'" size="" /></div>
									<input type="hidden" id="id-faixa" name="id-faixa" value="'.$faixa->id.'" />
								</div>
								<div class="imagem">
									<label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px<br />Formatos: JPG, PNG e GIF<br />Tamanho: 1MB<br />Nomes sem acentos e caracteres especiais</span></label>
						';
						if($faixa->imagem == ''){			
							$grupo.='	<form class="fileupload" action="'.base_url().'assets/server/php/" method="POST" enctype="multipart/form-data">
											<div class="quadro"><img id="alvo" src="'.base_url().'assets/img/backgrounds/imagem.png" name="imagem" /></div>
											<span class="btn btn-success fileinput-button">
												<input id="file" type="file" />
											</span>
											<a href="javascript:void(0);" class="excluir excluir-imagem"></a>
										</form>
									';
						}else{
							$grupo.= '
									<form class="fileupload" action="'.base_url().'assets/server/php/" method="POST" enctype="multipart/form-data">
										<div class="quadro"><img id="alvo" src="'.$faixa->imagem.'" name="imagem" /></div>
										<span class="btn btn-success fileinput-button">
												<input id="file" type="file" />
										</span>
										<a href="javascript:void(0);" class="excluir excluir-imagem"></a>
									</form>
									';
						}			
			$grupo	.=	'						
								</div>
							</div>
					</div>	
			';

		}

		$data['faixas'] = $grupo;
		$data['quantidade'] = $this->faixa_model->count_rows($id);
		$this->template->show('faixa_ce', $data);
	}

	public function apenas_uma($id)
	{
		//$id_quiz = $this->session->flashdata('id_quiz');

		$data  	= $this->quiz_model->get($id);
		$faixas = $this->faixa_model->get_all($id);
		$count 	= -1;
		$grupo 	= '';
		foreach($faixas->result() as $faixa){
			$count++;
			$grupo .= '

					<div class="group salvo">
							<div class="header">
								<span class="icon"></span>
								<div class="input"><input type="text" name="nome" value="'.$faixa->titulo.'" size="" /></div>
								<span class="arrow"></span>
								<a class="excluir excluir-faixa" href="'.site_url('remover-faixa').'/'.$faixa->id.'" rel="'.$faixa->id_quiz.'"></a>
							</div>
							<div class="body">
								<!--O numero de identificacao do slider deve vir salvo do BD, o restante ele calcula dinamicamente para ser salvo-->
								<div class="textoDoSlider">Considere a quantidade de respostas corretas.</div>
								<div class="sliderHolder">
									<input type="text" id="amountIni" class="amountIni'.$count.'" value="'.$faixa->range_de.'" readonly />
									<input type="text" id="amountFin" class="amountFin'.$count.'" value="'.$faixa->range_ate.'" readonly />		
									<div id="slider'.$count.'"></div>
								</div>
								<div class="texto">
									<label for="descricao">Descrição <div class="limite">Limite de caracteres:<span id="campospan" title="500">500</span></div></label>
									<div class="textarea"><textarea name="descricao" cols="" rows="">'.$faixa->descricao.'</textarea></div>
									<label for="link">Link de referência:</label>
									<div class="input"><input type="text" name="link" value="'.$faixa->link_referencia.'" size="" /></div>
									<label for="texto">Texto do link de referência:</label>
									<div class="input"><input type="text" name="texto" value="'.$faixa->texto_link.'" size="" /></div>
									<input type="hidden" id="id-faixa" name="id-faixa" value="'.$faixa->id.'" />
								</div>
								<div class="imagem">
									<label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px<br />Formatos: JPG, PNG e GIF<br />Tamanho: 1MB<br />Nomes sem acentos e caracteres especiais</span></label>
						';
						if($faixa->imagem == ''){			
							$grupo.='	<form class="fileupload" action="'.base_url().'assets/server/php/" method="POST" enctype="multipart/form-data">
											<div class="quadro"><img id="alvo" src="'.base_url().'assets/img/backgrounds/imagem.png" name="imagem" /></div>
											<span class="btn btn-success fileinput-button">
												<input id="file" type="file" />
											</span>
											<a href="javascript:void(0);" class="excluir excluir-imagem"></a>
										</form>
									';
						}else{
							$grupo.= '
									<form class="fileupload" action="'.base_url().'assets/server/php/" method="POST" enctype="multipart/form-data">
										<div class="quadro"><img id="alvo" src="'.$faixa->imagem.'" name="imagem" /></div>
										<span class="btn btn-success fileinput-button">
												<input id="file" type="file" />
										</span>
										<a href="javascript:void(0);" class="excluir excluir-imagem"></a>
									</form>
									';
						}			
			$grupo	.=	'						
								</div>
							</div>
					</div>	
			';

		}

		$data['faixas'] = $grupo;
		$data['quantidade'] = $this->faixa_model->count_rows($id);
		$this->template->show('faixa_ce', $data);
	}

	public function resposta_certa($id)
	{
		//$id_quiz = $this->session->flashdata('id_quiz');

		$data  	= $this->quiz_model->get($id);
		$faixas = $this->faixa_model->get_all($id);
		$count 	= -1;
		$grupo 	= '';
		foreach($faixas->result() as $faixa){
			$count++;
			$grupo .= '

					<div class="group salvo">
							<div class="header">
								<span class="icon"></span>
								<div class="input"><input type="text" name="nome" value="'.$faixa->titulo.'" size="" /></div>
								<span class="arrow"></span>
								<a class="excluir excluir-faixa" href="'.site_url('remover-faixa').'/'.$faixa->id.'" rel="'.$faixa->id_quiz.'"></a>
							</div>
							<div class="body">
								<!--O numero de identificacao do slider deve vir salvo do BD, o restante ele calcula dinamicamente para ser salvo-->
								<div class="textoDoSlider">Considere a quantidade de respostas corretas.</div>
								<div class="sliderHolder">
									<input type="text" id="amountIni" class="amountIni'.$count.'" value="'.$faixa->range_de.'" readonly />
									<input type="text" id="amountFin" class="amountFin'.$count.'" value="'.$faixa->range_ate.'" readonly />		
									<div id="slider'.$count.'"></div>
								</div>
								<div class="texto">
									<label for="descricao">Descrição <div class="limite">Limite de caracteres:<span id="campospan" title="500">500</span></div></label>
									<div class="textarea"><textarea name="descricao" cols="" rows="">'.$faixa->descricao.'</textarea></div>
									<label for="link">Link de referência:</label>
									<div class="input"><input type="text" name="link" value="'.$faixa->link_referencia.'" size="" /></div>
									<label for="texto">Texto do link de referência:</label>
									<div class="input"><input type="text" name="texto" value="'.$faixa->texto_link.'" size="" /></div>
									<input type="hidden" id="id-faixa" name="id-faixa" value="'.$faixa->id.'" />
								</div>
								<div class="imagem">
									<label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px<br />Formatos: JPG, PNG e GIF<br />Tamanho: 1MB<br />Nomes sem acentos e caracteres especiais</span></label>
						';
						if($faixa->imagem == ''){			
							$grupo.='	<form class="fileupload" action="'.base_url().'assets/server/php/" method="POST" enctype="multipart/form-data">
											<div class="quadro"><img id="alvo" src="'.base_url().'assets/img/backgrounds/imagem.png" name="imagem" /></div>
											<span class="btn btn-success fileinput-button">
												<input id="file" type="file" />
											</span>
											<a href="javascript:void(0);" class="excluir excluir-imagem"></a>
										</form>
									';
						}else{
							$grupo.= '
									<form class="fileupload" action="'.base_url().'assets/server/php/" method="POST" enctype="multipart/form-data">
										<div class="quadro"><img id="alvo" src="'.$faixa->imagem.'" name="imagem" /></div>
										<span class="btn btn-success fileinput-button">
												<input id="file" type="file" />
										</span>
									</form>
									';
						}			
			$grupo	.=	'						
								</div>
							</div>
					</div>	
			';

		}

		$data['faixas'] = $grupo;
		$data['quantidade'] = $this->faixa_model->count_rows($id);
		$this->template->show('faixa_ce', $data);
	}

	public function enquete($id)
	{
		//$id_quiz = $this->session->flashdata('id_quiz');

		$data  	= $this->quiz_model->get($id);
		$faixas = $this->faixa_model->get_all($id);
		$count 	= -1;
		$grupo 	= '';
		foreach($faixas->result() as $faixa){
			$count++;
			$grupo .= '

					<div class="group salvo">
							<div class="header">
								<span class="icon"></span>
								<div class="input"><input type="text" name="nome" value="'.$faixa->titulo.'" size="" /></div>
								<span class="arrow"></span>
								<a class="excluir excluir-faixa" href="'.site_url('remover-faixa').'/'.$faixa->id.'" rel="'.$faixa->id_quiz.'"></a>
							</div>
							<div class="body">
								<!--O numero de identificacao do slider deve vir salvo do BD, o restante ele calcula dinamicamente para ser salvo-->
								<div class="textoDoSlider">Considere a quantidade de respostas corretas como o valor total de pontos possíveis na faixa de classificação. 1 acerto = 1 pontos.</div>
								<div class="sliderHolder">
									<input type="text" id="amountIni" class="amountIni'.$count.'" value="'.$faixa->range_de.'" readonly />
									<input type="text" id="amountFin" class="amountFin'.$count.'" value="'.$faixa->range_ate.'" readonly />		
									<div id="slider'.$count.'"></div>
								</div>
								<div class="texto">
									<label for="descricao">Descrição <div class="limite">Limite de caracteres:<span id="campospan" title="500">500</span></div></label>
									<div class="textarea"><textarea name="descricao" cols="" rows="">'.$faixa->descricao.'</textarea></div>
									<label for="link">Link de referência:</label>
									<div class="input"><input type="text" name="link" value="'.$faixa->link_referencia.'" size="" /></div>
									<label for="texto">Texto do link de referência:</label>
									<div class="input"><input type="text" name="texto" value="'.$faixa->texto_link.'" size="" /></div>
									<input type="hidden" id="id-faixa" name="id-faixa" value="'.$faixa->id.'" />
								</div>
								<div class="imagem">
									<label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px<br />Formatos: JPG, PNG e GIF<br />Tamanho: 1MB<br />Nomes sem acentos e caracteres especiais</span></label>
						';
						if($faixa->imagem == ''){			
							$grupo.='	<form class="fileupload" action="'.base_url().'assets/server/php/" method="POST" enctype="multipart/form-data">
											<div class="quadro"><img id="alvo" src="'.base_url().'assets/img/backgrounds/imagem.png" name="imagem" /></div>
											<span class="btn btn-success fileinput-button">
												<input id="file" type="file" />
											</span>
											<a href="javascript:void(0);" class="excluir excluir-imagem"></a>
										</form>
									';
						}else{
							$grupo.= '
									<form class="fileupload" action="'.base_url().'assets/server/php/" method="POST" enctype="multipart/form-data">
										<div class="quadro"><img id="alvo" src="'.$faixa->imagem.'" name="imagem" /></div>
										<span class="btn btn-success fileinput-button">
												<input id="file" type="file" />
										</span>
									</form>
									';
						}			
			$grupo	.=	'						
								</div>
							</div>
					</div>	
			';

		}

		$data['faixas'] = $grupo;
		$data['quantidade'] = $this->faixa_model->count_rows($id);
		$this->template->show('faixa_ce', $data);
	}

}

/* End of file quiz_tipo.php */
/* Location: ./application/controllers/quiz_tipo.php */