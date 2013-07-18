						<div id="quizVisualizacao" class="quiz questoes" style="background: <?php if($customizacao['quiz_bg_img'] == ''){echo '#'.$customizacao['quiz_bg_color'];}else{echo 'url('.base_url().'assets/server/php/files/'.$customizacao['quiz_bg_img'].')';}?>;">
							<div id="nome" style="font-size:<?php echo $customizacao['titulo_quiz_font_size'];?>; color:#<?php echo $customizacao['titulo_quiz_font_color'];?>; text-align:<?php echo $customizacao['titulo_quiz_align'];?>;"><?php echo $titulo;?></div>
							<input type="hidden" id="tipo-quiz" name="tipo-quiz" value="<?php echo $tipo;?>" />
							<input type="hidden" id="id-quiz" name="id-quiz" value="<?php echo $id;?>" />

							<!-- Slideshow HTML -->
							<div id="slideshow">
								<div id="slidesContainer">

							    <?php echo $perguntas;?>

								</div>
							</div>
							<!-- Slideshow HTML -->

							<div id="botoes">
								<!--Chama slide anterior-->
								<a href="#" id="anterior" class="control" title="Anterior" style="color:#<?php echo $customizacao['botao_perguntas_font_color'];?>; background-color:#<?php echo $customizacao['botao_perguntas_bg_color'];?>;">&laquo; Anterior</a>
								<!--Chama slide posterior-->
								<a href="#" id="proximo" class="control" title="Próximo" style="color:#<?php echo $customizacao['botao_perguntas_font_color'];?>; background-color:#<?php echo $customizacao['botao_perguntas_bg_color'];?>;">Próximo &raquo;</a>
								<div class="loader" style="text-align: center; display: none;">
									<img src="<?php echo base_url();?>assets/img/ajax-loader.gif" />
								</div>
								<!--Chama a página de resultado, só aparece ao final do slideshow-->
								<a href="#" id="chamaResultado" rel="<?php echo $tipo;?>" title="Próximo" style="color:#<?php echo $customizacao['botao_perguntas_font_color'];?>; background-color:#<?php echo $customizacao['botao_perguntas_bg_color'];?>;">Resultado &raquo;</a>
							</div>
						</div>
						
						<!--Resultado-->
						<div id="quizVisualizacao" class="quiz resultados" style="background:#cc0000;">
							<div id="nome" style="font-size:20px; color:#333333; text-align:left;">Que tipo de solteira você é?</div>
							
							    <div class="slides-resultado">
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
						<!--Fim Resultado-->