<?php require_once('header.php'); ?>

		
		<?php require_once('topo-dois.php'); ?>
		
		<div id="conteudo">
			<div id="wrap">
			
				<div class="nav-perfil">
					<a class="anterior" href="#"></a>
					<a class="perguntas" href="#"></a>
					<a class="faixasClassificacao" href="#"></a>
					<a class="customizacao ativo" href="#"></a>
					<a class="visualizacao" href="#"></a>
					<a class="proximo" href="#"></a>
				</div>
			
				<div id="perfilCustomizacao" class="item">
				
					<!--Perguntas e respostas-->
					<div class="header">
						<div class="titulo">Perguntas e respostas</div>
						<span class="arrow"></span>
					</div>
					<div class="body">
						<div class="editor">
						
							<!--Título do quiz-->
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
								<div id="alinha-inner" class="titulo-alinhamento">
									<div id="left" class="ativo"></div>
									<div id="center"></div>
									<div id="right"></div>
									<div id="justify"></div>
								</div>
								<!--passa o valor Alinhamento escondido-->
								<input name="ititulo-alinhamento" type="hidden" value="text-align:left;" />
							</div>
							
							<!--Perguntas-->
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
								<div class="input-picker"><input id="respostas-cor" type="text" value="333333" /></div>
								<!--Alinhamento:-->
								<p class="alinha">Alinhamento:</p>
								<div id="alinha-inner" class="respostas-alinhamento">
									<div id="left" class="ativo"></div>
									<div id="center"></div>
									<div id="right"></div>
									<div id="justify"></div>
								</div>
								<!--passa o valor Alinhamento escondido-->
								<input name="irespostas-alinhamento" type="hidden" value="text-align:left;" />
								<!--Cor de fundo:-->
								<p class="alinha">Cor de fundo:</p>
								<div class="input-picker"><input id="respostas-cor-fundo" type="text" value="" /></div>
							</div>
							
							<!--Botões-->
							<div class="intro">
								<p>Botões</p>
								<span class="arrow"></span>
							</div>
							<div class="content">
								<!--Cor da fonte:-->
								<p>Cor da fonte:</p>
								<div class="input-picker"><input id="botoes-cor" type="text" value="333333" /></div>
								<!--Cor de fundo:-->
								<p>Cor de fundo:</p>
								<div class="input-picker"><input id="botoes-cor-fundo" type="text" value="" /></div>
							</div>
							
							<!--Imagem de fundo-->
							<div class="intro">
								<p>Imagem de fundo</p>
								<span class="arrow"></span>
							</div>
							<div class="content">
								<!--Imagem:-->
										<form id="fileupload-perfil-customiza" action="assets/server/php/" method="POST" enctype="multipart/form-data">
										<div id="imagem-preview"><img id="alvo-perguntas" src="assets/img/backgrounds/preview.png" /></div>
										<span class="btn btn-success fileinput-button">
											<input id="file" type="file"  />
										</span>
										</form>
								<!--Cor de fundo:-->
								<p class="alinha">Cor de fundo:</p>
								<div class="input-picker"><input id="imagem-cor-fundo" type="text" value="" /></div>
							</div>
							
						</div>
						
						<div class="preVisu">
							<p>Pré-visualizar:</p>
							<select name="prePerguntas" class="default">
								<option value="1">Chegou o fim de semana:</option>
								<option value="2">Chegou o fim de semana:</option>
							</select>
						</div>
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
					
					<!--Resultados-->
					<div class="header">
						<div class="titulo">Resultados</div>
						<span class="arrow"></span>
					</div>
					<div class="body">
						<div class="editor">
						
							<!--Título do quiz-->
							<div class="intro">
								<p>Título do quiz</p>
								<span class="arrow"></span>
							</div>
							<div class="content">
								<!--Tamanho da fonte-->
								<p>Tamanho da fonte:</p>
								<select name="titulo-resultados-tamanho" class="default">
									<option value="18px">18px</option>
									<option value="20px" selected="selected">20px</option>
									<option value="22px">22px</option>
								</select>
								<!--passa o valor Tamanho da fonte escondido-->
								<input name="ititulo-resultados-tamanho" type="hidden" value="font-size:20px;" />
								<!--Cor da fonte:-->
								<p>Cor da fonte:</p>
								<div class="input-picker"><input id="titulo-resultados-cor" type="text" value="333333" /></div>
								<!--Alinhamento:-->
								<p class="alinha">Alinhamento:</p>
								<div id="alinha-inner" class="titulo-resultados-alinhamento">
									<div id="left" class="ativo"></div>
									<div id="center"></div>
									<div id="right"></div>
									<div id="justify"></div>
								</div>
								<!--passa o valor Alinhamento escondido-->
								<input name="ititulo-resultados-alinhamento" type="hidden" value="text-align:left;" />
							</div>
							
							<!--Título do resultado-->
							<div class="intro">
								<p>Título do resultado</p>
								<span class="arrow"></span>
							</div>
							<div class="content">
								<!--Tamanho da fonte-->
								<p>Tamanho da fonte:</p>
								<select name="perguntas-resultados-tamanho" class="default">
									<option value="22px">22px</option>
									<option value="24px" selected="selected">24px</option>
									<option value="26px">26px</option>
								</select>
								<!--passa o valor Tamanho da fonte escondido-->
								<input name="iperguntas-resultados-tamanho" type="hidden" value="font-size:24px;" />
								<!--Cor da fonte:-->
								<p>Cor da fonte:</p>
								<div class="input-picker"><input id="perguntas-resultados-cor" type="text" value="333333" /></div>
								<!--Alinhamento:-->
								<p class="alinha">Alinhamento:</p>
								<div id="alinha-inner" class="perguntas-resultados-alinhamento">
									<div id="left" class="ativo"></div>
									<div id="center"></div>
									<div id="right"></div>
									<div id="justify"></div>
								</div>
								<!--passa o valor Alinhamento escondido-->
								<input name="iperguntas-resultados-alinhamento" type="hidden" value="text-align:left;" />
							</div>
							
							<!--Acertos-->
							<div class="intro">
								<p>Acertos</p>
								<span class="arrow"></span>
							</div>
							<div class="content">
								<!--Tamanho da fonte-->
								<p>Tamanho da fonte:</p>
								<select name="acertos-tamanho" class="default">
									<option value="16px">16px</option>
									<option value="18px" selected="selected">18px</option>
									<option value="20px">20px</option>
								</select>
								<!--passa o valor Tamanho da fonte escondido-->
								<input name="iacertos-tamanho" type="hidden" value="font-size:18px;" />
								<!--Cor da fonte:-->
								<p>Cor da fonte:</p>
								<div class="input-picker"><input id="acertos-cor" type="text" value="333333" /></div>
								<!--Alinhamento:-->
								<p class="alinha">Alinhamento:</p>
								<div id="alinha-inner" class="acertos-alinhamento">
									<div id="left" class="ativo"></div>
									<div id="center"></div>
									<div id="right"></div>
									<div id="justify"></div>
								</div>
								<!--passa o valor Alinhamento escondido-->
								<input name="iacertos-alinhamento" type="hidden" value="text-align:left;" />
							</div>
							
							<!--Descrição-->
							<div class="intro">
								<p>Descrição</p>
								<span class="arrow"></span>
							</div>
							<div class="content">
								<!--Tamanho da fonte-->
								<p>Tamanho da fonte:</p>
								<select name="descricao-tamanho" class="default">
									<option value="16px">16px</option>
									<option value="18px" selected="selected">18px</option>
									<option value="20px">20px</option>
								</select>
								<!--passa o valor Tamanho da fonte escondido-->
								<input name="idescricao-tamanho" type="hidden" value="font-size:18px;" />
								<!--Cor da fonte:-->
								<p>Cor da fonte:</p>
								<div class="input-picker"><input id="descricao-cor" type="text" value="333333" /></div>
								<!--Alinhamento:-->
								<p class="alinha">Alinhamento:</p>
								<div id="alinha-inner" class="descricao-alinhamento">
									<div id="left" class="ativo"></div>
									<div id="center"></div>
									<div id="right"></div>
									<div id="justify"></div>
								</div>
								<!--passa o valor Alinhamento escondido-->
								<input name="idescricao-alinhamento" type="hidden" value="text-align:left;" />
							</div>
							
							<!--Link de referência-->
							<div class="intro">
								<p>Link de referência</p>
								<span class="arrow"></span>
							</div>
							<div class="content">
								<!--Tamanho da fonte-->
								<p>Tamanho da fonte:</p>
								<select name="referencia-resultados-tamanho" class="default">
									<option value="13px">13px</option>
									<option value="15px" selected="selected">15px</option>
									<option value="17px">17px</option>
								</select>
								<!--passa o valor Tamanho da fonte escondido-->
								<input name="ireferencia-resultados-tamanho" type="hidden" value="font-size:15px;" />
								<!--Cor da fonte:-->
								<p>Cor da fonte:</p>
								<div class="input-picker"><input id="referencia-resultados-cor" type="text" value="333333" /></div>
								<!--Alinhamento:-->
								<p class="alinha">Alinhamento:</p>
								<div id="alinha-inner" class="referencia-resultados-alinhamento">
									<div id="left" class="ativo"></div>
									<div id="center"></div>
									<div id="right"></div>
									<div id="justify"></div>
								</div>
								<!--passa o valor Alinhamento escondido-->
								<input name="ireferencia-resultados-alinhamento" type="hidden" value="text-align:left;" />
							</div>
						
							<!--Botões-->
							<div class="intro">
								<p>Botões</p>
								<span class="arrow"></span>
							</div>
							<div class="content">
								<!--Cor da fonte:-->
								<p>Cor da fonte:</p>
								<div class="input-picker"><input id="botoes-resultados-cor" type="text" value="333333" /></div>
								<!--Cor de fundo:-->
								<p>Cor de fundo:</p>
								<div class="input-picker"><input id="botoes-resultados-cor-fundo" type="text" value="" /></div>
							</div>
							
							<!--Imagem de fundo-->
							<div class="intro">
								<p>Imagem de fundo</p>
								<span class="arrow"></span>
							</div>
							<div class="content">
								<!--Imagem:-->
										<form id="fileupload-perfil-customiza-resultados" action="assets/server/php/" method="POST" enctype="multipart/form-data">
										<div id="imagem-preview"><img id="alvo-resultados" src="assets/img/backgrounds/preview.png" /></div>
										<span class="btn btn-success fileinput-button">
											<input id="file" type="file"  />
										</span>
										</form>
								<!--Cor de fundo:-->
								<p class="alinha">Cor de fundo:</p>
								<div class="input-picker"><input id="imagem-resultados-cor-fundo" type="text" value="" /></div>
							</div>
							
						</div>
						
						<div class="preVisu">
							<p>Pré-visualizar:</p>
							<select name="preResultados" class="default">
								<option value="1">Chegou o fim de semana:</option>
								<option value="2">Chegou o fim de semana:</option>
							</select>
						</div>
						<div id="previewResultados" class="preview">
							<div id="nome">Que tipo de solteira você é?</div>
							<div id="texto">
								<p class="acertos">40 pontos:</p>
								<div class="titulo">Pegadora</div>								
								<div class="resultado">									
									<p class="descricao">Brincadeiras à parte, você não tem medo de explorar sua sexualidade e seus desejos enquanto não tem um relacionamento sério à vista. O importante é curtir a vida!</p>
									<div class="saibaMais"><a href="#">saiba mais</a></div>
								
									<div id="botoesResultado">
										<a href="#" class="anterior" title="jogar novamente">&laquo; jogar novamente</a>
										<a href="#" class="proximo" title="ver gabarito">ver gabarito</a>
									</div>
								
								</div>								
							</div>
							<div id="imagem">
								<img id="alvo-resultados" src="assets/img/backgrounds/imagem2.png" />
							</div>
						</div>
					</div>
					
				</div>
				
				<a class="voltar" href="#" rel="link-interno" title="voltar"></a>
				<a class="proxima-etapa" href="#" rel="link-interno" title="próxima etapa"></a>
			
			</div>
		</div>
		

<?php require_once('footer.php'); ?>