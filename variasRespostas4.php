<?php require_once('header.php'); ?>

		
		<?php require_once('topo-dois.php'); ?>
		
		<div id="conteudo">
			<div id="wrap">
			
				<div class="nav-perfil">
					<a class="anterior" href="#"></a>
					<a class="perguntas" href="#"></a>
					<a class="faixasClassificacao" href="#"></a>
					<a class="customizacao" href="#"></a>
					<a class="visualizacao ativo" href="#"></a>
					<a class="proximo" href="#"></a>
				</div>
			
				<div id="perfilVisualizacao" class="item">
						
						<div class="quiz">
							<div id="nome">Que tipo de solteira você é?</div>
							<div id="texto">
								<div class="titulo">Chegou o fim de semana e você:</div>
								<div class="subtitulo"><a href="#">Texto do link de referência.</a></div>
								<table class="respostas">
									<tr>
										<td><input type="checkbox" name="resposta" value="0" /></td>
										<td>Só pensa nas coisas que quer fazer sozinha: pedalar, assistir a um filme, cuidar da casa...</td>
									</tr>
									<tr>
										<td><input type="checkbox" name="resposta" value="1" /></td>
										<td>Liga para os amigos e pergunta se alguém tem um cara interessante. e bonito para te apresentar.</td>
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
						
						<!--Passa o código escondido numa textarea, para exibir como texto na textarea de baixo-->
						<textarea name="quizCode" id="quizCode" cols="" rows="">
							<iframe src="http://skidun.webfactional.com/app/37" width="620" height="400" scrolling="no" frameborder="0"></iframe>
						</textarea>
						
						<div class="sidebar">
							<p>Pré visualizar:</p>
							<select class="default">
								<option value="0">Pergunta 1: Chegou o fim de seman...</option>
								<option value="1">Pergunta 1: Chegou o fim de seman...</option>
							</select>
							<p>Código para embutir na página:</p>
							<!--Gerador de Código-->
							<div class="textarea"><textarea cols="" rows="" id="codigo" name="codigo" readonly></textarea></div>
							<a href="#" class="copiarCodigo" title="copiar código" rel="link-interno"></a>
						</div>
					
				</div>
		
			</div>
		</div>
		

<?php require_once('footer.php'); ?>