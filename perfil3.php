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
							<div class="intro">
								<p>Título do quiz</p>
								<span class="arrow"></span>
							</div>
							<div class="content">
								<!--Tamanho da fonte-->
								<p>Tamanho da fonte:</p>
								<select name="titulo-tamanho" class="default">
									<option value="18px">18px</option>
									<option value="20px" selected="selected">20px</option>
									<option value="22px">22px</option>
								</select>
								<!--passa o valor Tamanho da fonte escondido-->
								<input name="ititulo-tamanho" type="hidden" value="font-size:20px;" />
								<!--Cor da fonte:-->
								<p>Cor da fonte:</p>
								<div class="input-picker"><input id="titulo-cor" type="text" value="333333" /></div>
								<!--Alinhamento:-->
								<p class="alinha">Alinhamento:</p>
								<div class="titulo-alinhamento">
									<div id="left" class="ativo"></div>
									<div id="center"></div>
									<div id="right"></div>
									<div id="justify"></div>
								</div>
								<!--passa o valor Alinhamento escondido-->
								<input name="ititulo-alinhamento" type="hidden" value="text-align:left;" />
							</div>
							<div class="intro">
								<p>Perguntas</p>
								<span class="arrow"></span>
							</div>
							<div class="content">
								<!--Tamanho da fonte-->
								<p>Tamanho da fonte:</p>
								<select name="perguntas-tamanho" class="default">
									<option value="22px">22px</option>
									<option value="24px" selected="selected">24px</option>
									<option value="26px">26px</option>
								</select>
								<!--passa o valor Tamanho da fonte escondido-->
								<input name="iperguntas-tamanho" type="hidden" value="font-size:24px;" />
								<!--Cor da fonte:-->
								<p>Cor da fonte:</p>
								<div class="input-picker"><input id="perguntas-cor" type="text" value="333333" /></div>
								<!--Alinhamento:-->
								<p class="alinha">Alinhamento:</p>
								<div id="alinha-inner" class="perguntas-alinhamento">
									<div id="left" class="ativo"></div>
									<div id="center"></div>
									<div id="right"></div>
									<div id="justify"></div>
								</div>
								<!--passa o valor Alinhamento escondido-->
								<input name="iperguntas-alinhamento" type="hidden" value="text-align:left;" />
							</div>
							
							<!--Link de referência-->
							<div class="intro">
								<p>Link de referência</p>
								<span class="arrow"></span>
							</div>
							<div class="content">
								<!--Tamanho da fonte-->
								<p>Tamanho da fonte:</p>
								<select name="referencia-tamanho" class="default">
									<option value="14px">14px</option>
									<option value="16px" selected="selected">16px</option>
									<option value="18px">18px</option>
								</select>
								<!--passa o valor Tamanho da fonte escondido-->
								<input name="ireferencia-tamanho" type="hidden" value="font-size:24px;" />
								<!--Cor da fonte:-->
								<p>Cor da fonte:</p>
								<div class="input-picker"><input id="referencia-cor" type="text" value="333333" /></div>
								<!--Alinhamento:-->
								<p class="alinha">Alinhamento:</p>
								<div id="alinha-inner" class="referencia-alinhamento">
									<div id="left" class="ativo"></div>
									<div id="center"></div>
									<div id="right"></div>
									<div id="justify"></div>
								</div>
								<!--passa o valor Alinhamento escondido-->
								<input name="iperguntas-alinhamento" type="hidden" value="text-align:left;" />
							</div>
							
							<!--Respostas-->
							<div class="intro">
								<p>Respostas</p>
								<span class="arrow"></span>
							</div>
							<div class="content">
								<!--Tamanho da fonte-->
								<p>Tamanho da fonte:</p>
								<select name="respostas-tamanho" class="default">
									<option value="13px">13px</option>
									<option value="15px" selected="selected">15px</option>
									<option value="17px">17px</option>
								</select>
								<!--passa o valor Tamanho da fonte escondido-->
								<input name="irespostas-tamanho" type="hidden" value="font-size:24px;" />
								<!--Cor da fonte:-->
								<p>Cor da fonte:</p>
								<div class="input-picker"><input id="referencia-cor" type="text" value="333333" /></div>
								<!--Alinhamento:-->
								<p class="alinha">Alinhamento:</p>
								<div id="alinha-inner" class="referencia-alinhamento">
									<div id="left" class="ativo"></div>
									<div id="center"></div>
									<div id="right"></div>
									<div id="justify"></div>
								</div>
								<!--passa o valor Alinhamento escondido-->
								<input name="iperguntas-alinhamento" type="hidden" value="text-align:left;" />
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