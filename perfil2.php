<?php require_once('header.php'); ?>
		
		<?php require_once('topo-dois.php'); ?>
	
		
		<div id="conteudo" class="perfil2">
			<div id="wrap">
			
				<div class="nav-perfil">
					<a class="anterior" href="#"></a>
					<a class="perfis" href="#"></a>
					<a class="perguntas ativo" href="#"></a>
					<a class="customizacao" href="#"></a>
					<a class="visualizacao" href="#"></a>
					<a class="proximo" href="#"></a>
				</div>
			
				<div class="titulo-perguntas">Perguntas:</div>
				
				<div id="accordion2">
					
					<div class="group">
					
							<div class="header">
								<span class="icon"></span>
								<div class="input"><input type="text" name="nome" value="" size="" /></div>
								<span class="arrow"></span>
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
									
									<div id="sortable0" class="sorteia">
										
												<div class="header">
													<span class="icon"></span>
													<div class="input"><input type="text" name="nome" value="" size="" /></div>
													<select name="resposta-00" class="default">
														<option value="1">Amiga de todos</option>
														<option value="2">Pegadora</option>
													</select>
												</div>
												
												<div class="header">
													<span class="icon"></span>
													<div class="input"><input type="text" name="nome" value="" size="" /></div>
													<select name="resposta-10" class="default">
														<option value="1">Amiga de todos</option>
														<option value="2">Pegadora</option>
													</select>
												</div>
										
									</div>

									<a id="nova-resposta-perfil" class="nova-resposta" href="javascript:void(0)"></a>
																	
								</div><!--respostas-->								
							</div><!--body-->
							
					</div>

				</div><!--accordion-->			

				<div class="holder">
					<a id="nova-pergunta-perfil" class="nova-pergunta" href="#"></a>
				</div>
				
				<a class="voltar" href="#" rel="link-interno" title="voltar"></a>
				<a class="proxima-etapa" href="#" rel="link-interno" title="próxima etapa"></a>
			
			</div>
		</div>
		

<?php require_once('footer.php'); ?>