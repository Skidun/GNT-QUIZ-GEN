						<div id="quizVisualizacao" class="quiz" style="background:#<?php if($customizacao['quiz_bg_img'] == ''){echo $customizacao['quiz_bg_color'];}else{echo 'url('.$customizacao['quiz_bg_img'].')';}?>;">
							<div id="nome" style="font-size:<?php echo $customizacao['titulo_quiz_font_size'];?>; color:#<?php echo $customizacao['titulo_quiz_font_color'];?>; text-align:<?php echo $customizacao['titulo_quiz_align'];?>;"><?php echo $titulo;?></div>
							<input type="hidden" id="tipo-quiz" name="tipo-quiz" value="<?php echo $tipo;?>" />

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
								<!--Chama a página de resultado, só aparece ao final do slideshow-->
								<a href="#" id="chamaResultado" title="Próximo" style="color:#<?php echo $customizacao['botao_perguntas_font_color'];?>; background-color:#<?php echo $customizacao['botao_perguntas_bg_color'];?>;">Resultado &raquo;</a>
							</div>
						</div>