						<div id="quizVisualizacao" class="quiz questoes" style="background: <?php if($customizacao['quiz_bg_img'] == ''){echo '#'.$customizacao['quiz_bg_color'];}else{echo "url('".base_url()."assets/server/php/files/".$customizacao['quiz_bg_img']."') ".$customizacao['quiz_bg_img_align_horizontal']." ".$customizacao['quiz_bg_img_align_vertical']." ".$customizacao['quiz_bg_img_repeat']." #" .$customizacao['quiz_bg_color'];}?>;">
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
						<div id="quizVisualizacao" class="quiz resultados" style="background: <?php if($customizacao['resultado_bg_img'] == "") {echo "#".$customizacao['resultado_bg_color'];}else{echo "url('".base_url()."assets/server/php/files/".$customizacao['resultado_bg_img']."')".$customizacao['resultado_bg_img_align_horizontal']." ".$customizacao['resultado_bg_img_align_vertical']." ".$customizacao['resultado_bg_img_repeat']." #".$customizacao['resultado_bg_color'].";";}?>">
							<div id="nome" style="font-size: <?php echo $customizacao['resultado_titulo_quiz_font_size'];?>;color: #<?php echo $customizacao['resultado_titulo_quiz_font_color'];?>; text-align:<?php echo $customizacao['resultado_titulo_quiz_align'];?>;"><?php echo $titulo;?></div>
							
							    <div class="slides-resultado">
									<div id="texto">
										<div class="titulo" style="font-size: <?php echo $customizacao['resultado_titulo_faixa_font_size'];?>;color: #<?php echo $customizacao['resultado_titulo_faixa_font_color'];?>; text-align:<?php echo $customizacao['resultado_titulo_faixa_align'];?>;"></div>								
										<div class="saibaMais pontuacao" style="font-size: <?php echo $customizacao['resultado_porcentagem_font_size'];?>;color: #<?php echo $customizacao['resultado_porcentagem_font_color'];?>; text-align:<?php echo $customizacao['resultado_porcentagem_align'];?>;"></div>
										<div class="resultado">
											<p class="descricao" style="font-size:<?php echo $customizacao['resultado_descricao_font_size'];?>; color:#<?php echo $customizacao['resultado_descricao_font_color']?>; text-align:<?php echo $customizacao['resultado_descricao_align'];?>;"></p>
											<div class="saibaMais"><a href="#" target="_blank"  style="font-size: <?php echo $customizacao['resultado_linkref_font_size'];?>; color:#<?php echo $customizacao['resultado_linkref_font_color'];?>; text-align:<?php echo $customizacao['resultado_linkref_align'];?>;"></a></div>
										
											<div id="botoesResultado">
												<a href="#" class="anterior" title="jogar novamente" style="color: #<?php echo $customizacao['resultado_botao_font_color'];?>;background-color: #<?php echo $customizacao['resultado_botao_bg_color'];?>;">&laquo; jogar novamente</a>
												<?php if($tipo != 'perfil'):?>
													<a href="#" class="proximo" title="ver gabarito" style="color: #<?php echo $customizacao['resultado_botao_font_color'];?>;background-color: #<?php echo $customizacao['resultado_botao_bg_color'];?>;">ver gabarito</a>
												<?php endif;?>
											</div>
										
										</div>								
									</div>
									<div id="imagem" style="background: #fdd595;">
										<img id="alvo-perguntas" src="" />
									</div>
							    </div>
								
						</div>
						<!--Fim Resultado-->