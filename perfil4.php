<?php require_once('header.php'); ?>

		
		<?php require_once('topo-dois.php'); ?>
		
		<div id="conteudo">
			<div id="wrap">
			
				<div class="nav-perfil">
					<a class="anterior" href="#"></a>
					<a class="perfis" href="#"></a>
					<a class="perguntas" href="#"></a>
					<a class="customizacao" href="#"></a>
					<a class="visualizacao ativo" href="#"></a>
					<a class="proximo" href="#"></a>
				</div>
			
				<div id="perfilCustomizacao" class="item">
				
					<!--Perguntas e respostas-->
					<div class="header">
						<div class="titulo">Perguntas e respostas</div>
						<span class="arrow"></span>
					</div>
					<div class="body">
						
						<div id="previewPerguntas" class="preview">
							<div id="nome">Que tipo de solteira você é?</div>
							<div id="texto">
								<div class="titulo">Chegou o fim de semana e você:</div>
								<div class="subtitulo"><a href="#">Texto do link de referência.</a></div>
								<table class="respostas">
									<tr>
										<td><input type="radio" name="resposta" value="0" /></td>
										<td>Só pensa nas coisas que quer fazer sozinha: pedalar, assistir a um filme, cuidar da casa...</td>
									</tr>
									<tr>
										<td><input type="radio" name="resposta" value="1" /></td>
										<td>Liga para os amigos e pergunta se alguém tem um cara interessante. e bonito para te apresentar.</td>
									</tr>
									<tr>
										<td><input type="radio" name="resposta" value="2" /></td>
										<td>Avisa a todo mundo que vai rolar uma festinha no apê por sua conta.</td>
									</tr>
									<tr>
										<td><input type="radio" name="resposta" value="3" /></td>
										<td>Vai pra balada com as melhores amigas atrás dos gatos.</td>
									</tr>
								</table>
							</div>
							<div id="imagem">
								<img id="alvo-perguntas" src="assets/img/backgrounds/imagem2.png" />
							</div>
							<div id="botoes">
								<a href="#" class="anterior" title="Anterior">&laquo; Anterior</a>
								<a href="#" class="proximo" title="Próximo">Próximo &raquo;</a>
							</div>
						</div>


					</div>
					
				</div>
		
			</div>
		</div>
		

<?php require_once('footer.php'); ?>