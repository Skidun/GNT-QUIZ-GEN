<?php require_once('header.php'); ?>
		
		<?php require_once('topo-dois.php'); ?>
	
		
		<div id="conteudo" class="perfil2">
			<div id="wrap">
			
				<div class="nav-perfil">
					<a class="anterior" href="#"></a>
					<a class="perguntas ativo" href="#"></a>
					<a class="faixasClassificacao" href="#"></a>
					<a class="customizacao" href="#"></a>
					<a class="visualizacao" href="#"></a>
					<a class="proximo" href="#"></a>
				</div>
							
				<div id="accordion2">
					
					<div class="group">
							
							<div class="header">
								<span class="icon"></span>
								<div class="input"><input type="text" name="nome" value="Título" size="" /></div>								
								<span class="arrow"></span>
								<span class="excluir excluir-um"></span>
							</div>
							<div class="body">							
								<div id="perguntas">								
									<div class="texto">
										<label for="link">Link de referência:</label>
										<div class="input"><input type="text" name="link" value="" size="" /></div>
										<label for="texto">Texto do link de referência:</label>
										<div class="input"><input type="text" name="texto" value="" size="" /></div>
									</div>
									<div class="imagem">
										<label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px</span></label>
										
										<form class="fileupload" action="assets/server/php/" method="POST" enctype="multipart/form-data">
											<div class="quadro"><img id="alvo" src="assets/img/backgrounds/imagem.png" name="imagem" /></div>
											<span class="btn btn-success fileinput-button">
												<input id="file" type="file" />
											</span>
										</form>
										
									</div>								
								</div><!--perguntas-->
								
								<div id="respostas">								
									<div class="titulo-respostas">Respostas:</div>
									
									<!--A numeração de identificação de #sortable, dos radios e de cada grupo é gerada dinamicamente e precisa ser salva no BD-->
									<div id="sortable0" class="sorteia">
										
												<div class="header">
													<span class="icon"></span>
													<div class="input"><input type="text" name="nome" value="" size="" /></div>
													<div class="radio">
														<label for="radio00" class="radioCustom"></label>
														<input type="radio" id="radio00" value="0" name="grupo0" />
														Esta é a resposta correta
													</div>
												</div>
												
												<div class="header">													
													<span class="icon"></span>
													<div class="input"><input type="text" name="nome" value="" size="" /></div>
													<div class="radio">
														<label for="radio10" class="radioCustom"></label>
														<input type="radio" id="radio10" value="1" name="grupo0" />
														Esta é a resposta correta
													</div>
												</div>										
									</div>																	
								</div><!--respostas-->								
							</div><!--body-->
							
					</div>
					
				</div><!--accordion-->			

				<div class="holder">
					<a id="nova-pergunta-certo" class="nova-pergunta" href="#"></a>
				</div>

				<a class="proxima-etapa" href="#" rel="link-interno" title="próxima etapa"></a>
			
			</div>
		</div>
		

<?php require_once('footer.php'); ?>