<?php require_once('header.php'); ?>

						<div id="quizVisualizacao" class="quiz" style="background:#faab2a;">
							<div id="nome" style="font-size:20px; color:#333333; text-align:left;">Que tipo de solteira você é?</div>

							<!-- Slideshow HTML -->
							<div id="slideshow">
							  <div id="slidesContainer">

							    <div class="slide">
									<div id="texto">
										<div class="titulo" style="font-size:24px; color:#333333; text-align:left;">Chegou o fim de semana e você:</div>
										<div class="subtitulo" style="text-align:left"><a href="#" style="font-size:16px; color:#333333;">Texto do link de referência.</a></div>
										<table class="respostas" style="font-size:15px; color:#333333; text-align:left;">
											<tr>
												<td><input type="radio" name="resposta0" value="0" /></td>
												<td>Só pensa nas coisas que quer fazer sozinha: pedalar, assistir a um filme, cuidar da casa...</td>
											</tr>
											<tr>
												<td><input type="radio" name="resposta0" value="1" /></td>
												<td>Liga para os amigos e pergunta se alguém tem um cara interessante. e bonito para te apresentar.</td>
											</tr>
										</table>
									</div>
									<div id="imagem" style="background: #fdd595;">
										<img id="alvo-perguntas" src="assets/img/backgrounds/imagem2.png" />
									</div>
							    </div>

							    <div class="slide">
									<div id="texto">
										<div class="titulo" style="font-size:24px; color:#333333; text-align:left;">Chegou o fim de semana e você:</div>
										<div class="subtitulo" style="text-align:left"><a href="#" style="font-size:16px; color:#333333;">Texto do link de referência.</a></div>
										<table class="respostas" style="font-size:15px; color:#333333; text-align:left;">
											<tr>
												<td><input type="radio" name="resposta1" value="0" /></td>
												<td>Só pensa nas coisas que quer fazer sozinha: pedalar, assistir a um filme, cuidar da casa...</td>
											</tr>
											<tr>
												<td><input type="radio" name="resposta1" value="1" /></td>
												<td>Liga para os amigos e pergunta se alguém tem um cara interessante. e bonito para te apresentar.</td>
											</tr>
										</table>
									</div>
									<div id="imagem" style="background: #fdd595;">
										<img id="alvo-perguntas" src="assets/img/backgrounds/imagem2.png" />
									</div>
							    </div>

							    <div class="slide">
									<div id="texto">
										<div class="titulo" style="font-size: 24px;color: #333333; text-align:left;">Pegadora</div>								
										<div class="resultado">
											<p class="descricao" style="font-size:18px; color:#333333; text-align:left;">Você é a pegadora! Enquanto o 'certo' não aparece, você se diverte com os 'errados'!</p>
											<p class="descricao" style="font-size:18px; color:#333333; text-align:left;">Brincadeiras à parte, você não tem medo de explorar sua sexualidade e seus desejos enquanto não tem um relacionamento sério à vista. O importante é curtir a vida!</p>
											<div class="saibaMais"><a href="#" style="font-size: 15px; color:#333333; text-align:left;">saiba mais</a></div>
										
											<div id="botoesResultado">
												<a href="#" class="anterior" title="jogar novamente" style="color: #ffffff;background-color: #cc1e59;">&laquo; jogar novamente</a>
												<a href="#" class="proximo" title="ver gabarito" style="color: #ffffff;background-color: #cc1e59;">ver gabarito</a>
											</div>
										
										</div>								
									</div>
									<div id="imagem" style="background: #fdd595;">
										<img id="alvo-perguntas" src="assets/img/backgrounds/imagem2.png" />
									</div>
							    </div>

							  </div>
							</div>
							<!-- Slideshow HTML -->

							<div id="botoes">
								<!--Chama slide anterior-->
								<a href="#" id="anterior" class="control" title="Anterior" style="color:#ffffff; background-color:#cc1e59;">&laquo; Anterior</a>
								<!--Chama slide posterior-->
								<a href="#" id="proximo" class="control" title="Próximo" style="color:#ffffff; background-color:#cc1e59;">Próximo &raquo;</a>
								<!--Chama a página de resultado, só aparece ao final do slideshow-->
								<a href="#" id="chamaResultado" title="Próximo" style="color:#ffffff; background-color:#cc1e59;">Resultado &raquo;</a>
							</div>
						</div>

<?php require_once('footer.php'); ?>