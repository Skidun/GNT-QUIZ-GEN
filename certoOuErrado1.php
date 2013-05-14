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
								<div class="input"><input type="text" name="nome" value="Carente" size="" /></div>
								<span class="arrow"></span>
							</div>
							<div class="body">
							
								<div id="perguntas">
								
									<div class="texto">
										<label for="link">Link de referência:</label>
										<div class="input"><input type="text" name="link" value="http://www.gnt.com.br/post-falando-sobre-esse-perfil.html" size="" /></div>
										<label for="texto">Texto do link de referência:</label>
										<div class="input"><input type="text" name="texto" value="Saiba mais" size="" /></div>
									</div>
									<div class="imagem">
										<label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px</span></label>
										<div class="quadro"><img id="alvo0" src="assets/img/backgrounds/imagem.png" /></div>
										
										<form id="fileupload0" action="assets/server/php/" method="POST" enctype="multipart/form-data">
										<span class="btn btn-success fileinput-button">
											<input id="file" type="file"  />
										</span>
										</form>
										
									</div>
								
								</div><!--perguntas-->
								
								<div id="respostas">
								
									<div class="titulo-respostas">Respostas:</div>
									
									<div id="sortable0" class="sorteia">
										
												<div class="header">
													<span class="icon"></span>
													<div class="input"><input type="text" name="nome" value="Só pensa nas coisas que quer fazer sozinha: pedalar, assistir a um filme, cui..." size="" /></div>
													<div class="radio">
														<label for="radio00" class="radioCustom"></label>
														<input type="radio" id="radio00" value="0" name="grupo0" />
														Esta é a resposta correta
													</div>
												</div>
												
												<div class="header">
													<span class="icon"></span>
													<div class="input"><input type="text" name="nome" value="Só pensa nas coisas que quer fazer sozinha: pedalar, assistir a um filme, cui..." size="" /></div>
													<div class="radio">
														<label for="radio10" class="radioCustom"></label>
														<input type="radio" id="radio10" value="1" name="grupo0" />
														Esta é a resposta correta
													</div>
												</div>
										
									</div>
																	
								</div><!--respostas-->
								
							</div>
					</div>
					
				</div><!--accordion-->			

				<div class="holder">
					<a id="nova-pergunta-certo" class="nova-pergunta" href="#"></a>
				</div>

				<a class="proxima-etapa" href="#" rel="link-interno" title="próxima etapa"></a>
			
			</div>
		</div>
		

<?php require_once('footer.php'); ?>