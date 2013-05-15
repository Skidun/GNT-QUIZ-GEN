<?php require_once('header.php'); ?>

		
		<?php require_once('topo-dois.php'); ?>
		
		<div id="conteudo">
			<div id="wrap">
			
				<div class="nav-perfil">
					<a class="anterior" href="#"></a>
					<a class="perfis ativo" href="#"></a>
					<a class="perguntas" href="#"></a>
					<a class="customizacao" href="#"></a>
					<a class="visualizacao" href="#"></a>
					<a class="proximo" href="#"></a>
				</div>
				
				<form name="perfilPerfis" method="" action="">
			
				<div id="accordion">
					
					<div class="group">
							<div class="header">
								<span class="icon"></span>
								<div class="input"><input type="text" name="nome" value="Carente" size="" /></div>
								<span class="arrow"></span>
							</div>
							<div class="body">
								<div class="texto">
									<label for="descricao">Descrição</label>
									<div class="textarea"><textarea name="descricao" cols="" rows="">Você é a amiga da galera! Seu tempo livre é todo dedicado a amigos e pessoas queridas, por isso você nem acha que precisa gastar os neurônios pensando em como fazer para encontrar um namorado. Solidão? Que nada!</textarea></div>
									<label for="link">Link de referência:</label>
									<div class="input"><input type="text" name="link" value="http://www.gnt.com.br/post-falando-sobre-esse-perfil.html" size="" /></div>
									<label for="texto">Texto do link de referência:</label>
									<div class="input"><input type="text" name="texto" value="Saiba mais" size="" /></div>
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
							</div>
							
							<div class="header">
								<span class="icon"></span>
								<div class="input"><input type="text" name="nome" value="" size="" /></div>
								<span class="arrow"></span>
							</div>
							<div class="body">
								<div class="texto">
									<label for="descricao">Descrição</label>
									<div class="textarea"><textarea name="descricao" cols="" rows=""></textarea></div>
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
							</div>
							
					</div>	

					
				</div><!--accordion-->
				
				</form>

				<div class="holder">
					<a id="novo-perfil" class="novo-perfil" href="#"></a>
				</div>
				
				<a class="proxima-etapa" href="#"></a>
			
			</div>
		</div>
		

<?php require_once('footer.php'); ?>