<?php require_once('header.php'); ?>

		
		<?php require_once('topo-dois.php'); ?>
		
		<div id="conteudo">
			<div id="wrap">
			
				<div class="nav-perfil">
					<a class="anterior" href="#"></a>
					<a class="perfis" href="#"></a>
					<a class="perguntas" href="#"></a>
					<a class="customizacao ativo" href="#"></a>
					<a class="visualizacao" href="#"></a>
					<a class="proximo" href="#"></a>
				</div>
			
				<div id="perfilCustomizacao" class="item">
					<div class="header">
						<div class="titulo">Perguntas e respostas</div>
					</div>
					<div class="body">
						<div class="editor">
							<div class="intro">Título do quiz</div>
							<div class="content">
								<!--Tamanho da fonte-->
								<p>Tamanho da fonte:</p>
								<select name="titulo-tamanho" class="default">
									<option value="18px">18px</option>
									<option value="20px" selected="selected">20px</option>
									<option value="22px">22px</option>
								</select>
								<!--passa o valor Tamanho da fonte escondido-->
								<input name="ititulo-tamanho" type="hidden" value="" />
								<!--Cor da fonte:-->
								<p>Cor da fonte:</p>
								
							</div>
						</div>
						<div class="preview">
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
								<img id="alvo" src="assets/img/backgrounds/imagem2.png" />
							</div>
							<div id="botoes">
								<a href="#" class="anterior" title="Anterior">&raquo; Anterior</a>
								<a href="#" class="proximo" title="Próximo">Próximo &laquo;</a>
							</div>
						</div>
					</div>
				</div>
				
				<a class="voltar" href="#" rel="link-interno" title="voltar"></a>
				<a class="proxima-etapa" href="#" rel="link-interno" title="próxima etapa"></a>
			
			</div>
		</div>
		

<?php require_once('footer.php'); ?>