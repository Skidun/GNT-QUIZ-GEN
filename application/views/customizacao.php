		<?php $this->template->menu2('customizacao'); ?>
		
		<div id="conteudo">
			<div id="wrap">
			
				<?php $this->template->menu3('customizacao');?>
			
				<div id="perfilCustomizacao" class="item">
					<input type="hidden" name="data_alteracao" id="data_alteracao" value="<?php echo $data_alteracao;?>" />
					<input type="hidden" name="id-config" id="id-config" value="<?php echo $customizacao['id'];?>" />
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
								<?php 
									$options_titulo_tamanho = array('18px'=>'18px', '20px'=>'20px', '22px'=>'22px');
									echo form_dropdown('titulo-tamanho', $options_titulo_tamanho, $customizacao['titulo_quiz_font_size'], ' class="default"');
								?>
								<!--passa o valor Tamanho da fonte escondido-->
								<input name="ititulo-tamanho" type="hidden" value="font-size:<?php echo $customizacao['titulo_quiz_font_size'];?>" />
								<!--Cor da fonte:-->
								<p>Cor da fonte:</p>
								<div class="input-picker"><input id="titulo-cor" name="titulo-cor" type="text" id="titulo_quiz_font_color" value="<?php echo $customizacao['titulo_quiz_font_color'];?>" /></div>
								<!--Alinhamento:-->
								<p class="alinha">Alinhamento:</p>
								<div id="alinha-inner" class="titulo-alinhamento">
									<div id="left" <?php if($customizacao['titulo_quiz_align'] == 'left') echo 'class="ativo"';?>></div>
									<div id="center" <?php if($customizacao['titulo_quiz_align'] == 'center') echo 'class="ativo"';?>></div>
									<div id="right" <?php if($customizacao['titulo_quiz_align'] == 'right') echo 'class="ativo"';?>></div>
									<div id="justify" <?php if($customizacao['titulo_quiz_align'] == 'justify') echo 'class="ativo"';?>></div>
								</div>
								<!--passa o valor Alinhamento escondido-->
								<input name="ititulo-alinhamento" id="titulo_quiz_align" type="hidden" value="text-align: <?php echo $customizacao['titulo_quiz_align']?>;" />
							</div>
							
							<!--Perguntas-->
							<div class="intro">
								<p>Perguntas</p>
								<span class="arrow"></span>
							</div>
							<div class="content">
								<!--Tamanho da fonte-->
								<p>Tamanho da fonte:</p>
								<?php 
									$options_pergunta_tamanho = array('18px'=>'18px','20px'=>'20px','22px'=>'22px', '24px'=>'24px', '26px'=>'26px');
									echo form_dropdown('perguntas-tamanho', $options_pergunta_tamanho, $customizacao['pergunta_quiz_font_size'], ' class="default" ');
								?>
								<!--passa o valor Tamanho da fonte escondido-->
								<input name="iperguntas-tamanho" type="hidden" value="font-size:<?php echo $customizacao['pergunta_quiz_font_size'];?>" />
								<!--Cor da fonte:-->
								<p>Cor da fonte:</p>
								<div class="input-picker"><input id="perguntas-cor" name="perguntas-cor" type="text" value="<?php echo $customizacao['pergunta_quiz_font_color']?>" /></div>
								<!--Alinhamento:-->
								<p class="alinha">Alinhamento:</p>
								<div id="alinha-inner" class="perguntas-alinhamento">
									<div id="left" <?php if($customizacao['pergunta_quiz_align'] == 'left') echo 'class="ativo"';?>></div>
									<div id="center" <?php if($customizacao['pergunta_quiz_align'] == 'center') echo 'class="ativo"';?>></div>
									<div id="right" <?php if($customizacao['pergunta_quiz_align'] == 'right') echo 'class="ativo"';?>></div>
									<div id="justify" <?php if($customizacao['pergunta_quiz_align'] == 'justify') echo 'class="ativo"';?>></div>
								</div>
								<!--passa o valor Alinhamento escondido-->
								<input name="iperguntas-alinhamento" type="hidden" value="text-align:<?php echo $customizacao['pergunta_quiz_align'];?>" />
							</div>
							
							<!--Link de referência-->
							<div class="intro">
								<p>Link de referência</p>
								<span class="arrow"></span>
							</div>
							<div class="content">
								<!--Tamanho da fonte-->
								<p>Tamanho da fonte:</p>

								<?php 
									$options_link_tamanho = array('14px'=>'14px','16px'=>'16px','18px'=>'18px');
									echo form_dropdown('referencia-tamanho', $options_link_tamanho, $customizacao['link_ref_pergunta_font_size'], ' class="default" ');
								?>
								<!--passa o valor Tamanho da fonte escondido-->
								<input name="ireferencia-tamanho" type="hidden" value="font-size:<?php echo $customizacao['link_ref_pergunta_font_size'];?>;" />
								<!--Cor da fonte:-->
								<p>Cor da fonte:</p>
								<div class="input-picker"><input id="referencia-cor" name="referencia-cor" type="text" value="<?php echo $customizacao['link_ref_pergunta_font_color'];?>" /></div>
								<!--Alinhamento:-->
								<p class="alinha">Alinhamento:</p>
								<div id="alinha-inner" class="referencia-alinhamento">
									<div id="left" <?php if($customizacao['link_ref_pergunta_align'] == 'left') echo 'class="ativo"';?>></div>
									<div id="center" <?php if($customizacao['link_ref_pergunta_align'] == 'center') echo 'class="ativo"';?>></div>
									<div id="right" <?php if($customizacao['link_ref_pergunta_align'] == 'right') echo 'class="ativo"';?>></div>
									<div id="justify" <?php if($customizacao['link_ref_pergunta_align'] == 'justify') echo 'class="ativo"';?>></div>
								</div>
								<!--passa o valor Alinhamento escondido-->
								<input name="iperguntas-alinhamento" id="referencia-alinhamento" type="hidden" value="text-align:<?php echo $customizacao['link_ref_pergunta_align'];?>;" />
							</div>
							
							<!--Respostas-->
							<div class="intro">
								<p>Respostas</p>
								<span class="arrow"></span>
							</div>

							<div class="content">
								<!--Tamanho da fonte-->
								<p>Tamanho da fonte:</p>

								<?php 
									$options_resposta_tamanho = array('13px'=>'13px','15px'=>'15px','17px'=>'17px');
									echo form_dropdown('respostas-tamanho', $options_resposta_tamanho, $customizacao['resposta_pergunta_font_size'], ' class="default" ');
								?>
								<!--passa o valor Tamanho da fonte escondido-->
								<input name="irespostas-tamanho" type="hidden" value="font-size:<?php echo $customizacao['resposta_pergunta_font_size'];?>;" />
								<!--Cor da fonte:-->
								<p>Cor da fonte:</p>
								<div class="input-picker"><input id="respostas-cor" name="respostas-cor" type="text" value="<?php echo $customizacao['resposta_pergunta_font_color'];?>" /></div>
								<!--Alinhamento:-->
								<p class="alinha">Alinhamento:</p>
								<div id="alinha-inner" class="respostas-alinhamento">
									<div id="left" <?php if($customizacao['resposta_pergunta_align'] == 'left') echo 'class="ativo"';?>></div>
									<div id="center" <?php if($customizacao['resposta_pergunta_align'] == 'center') echo 'class="ativo"';?>></div>
									<div id="right" <?php if($customizacao['resposta_pergunta_align'] == 'right') echo 'class="ativo"';?>></div>
									<div id="justify" <?php if($customizacao['resposta_pergunta_align'] == 'justify') echo 'class="ativo"';?>></div>
								</div>
								<!--passa o valor Alinhamento escondido-->
								<input name="irespostas-alinhamento" type="hidden" value="text-align:<?php echo $customizacao['resposta_pergunta_align'];?>;" />
								<!--Cor de fundo:-->
								<p class="alinha">Cor de fundo:</p>
								<div class="input-picker"><input id="respostas-cor-fundo" name="respostas-cor-fundo" type="text" value="<?php echo $customizacao['resposta_pergunta_bg_color'];?>" /></div>
							</div>
							
							<!--Botões-->
							<div class="intro">
								<p>Botões</p>
								<span class="arrow"></span>
							</div>
							<div class="content">
								<!--Cor da fonte:-->
								<p>Cor da fonte:</p>
								<div class="input-picker"><input id="botoes-cor" name="botoes-cor" type="text" value="<?php echo $customizacao['botao_perguntas_font_color'];?>" /></div>
								<!--Cor de fundo:-->
								<p>Cor de fundo:</p>
								<div class="input-picker"><input id="botoes-cor-fundo" name="botoes-perguntas-cor-fundo" type="text" value="<?php echo $customizacao['botao_perguntas_bg_color'];?>" /></div>
							</div>
							
							<!--Imagem de fundo-->
							<div class="intro">
								<p>Imagem de fundo</p>
								<span class="arrow"></span>
							</div>
							<div class="content">
								<!--Imagem:-->
										<form id="fileupload-perfil-customiza" action="<?php echo base_url();?>assets/server/php/" method="POST" enctype="multipart/form-data">
										<div id="imagem-preview"><img id="alvo-perguntas" src="<?php if($customizacao['resultado_bg_img'] == "") {echo base_url().'assets/img/backgrounds/preview.png';}else{echo base_url()."assets/server/php/files/".$customizacao['quiz_bg_img'];}?>" /></div>
										<span class="btn btn-success fileinput-button">
											<input id="file" type="file"  />
										</span>
										</form>
										<input type="hidden" name="bg_image_pergunta" id="bg_image_pergunta" value="<?php echo $customizacao['quiz_bg_img'];?>" />
								<!--Cor de fundo:-->
								<p class="alinha">Cor de fundo:</p>
								<div class="input-picker"><input id="imagem-cor-fundo" name="imagem-cor-fundo" type="text" value="<?php echo $customizacao['quiz_bg_color'];?>" /></div>
							</div>
							
						</div>
						<div id="previewPerguntas" class="preview" style="background: <?php if($customizacao['resultado_bg_img'] == "") {echo "#".$customizacao['quiz_bg_color'];}else{echo "url(".base_url()."assets/server/php/files/".$customizacao['quiz_bg_img'].") top center !important;";}?>">
							<div id="nome"><?php  echo $titulo;?></div>
							<div id="texto">
								<?php
									if($perguntas == NULL){
								?>
								<div class="titulo">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.?</div>
								<div class="subtitulo"><a href="#" target="_blank">Link referência</a></div>
								<?php 
									}else{
								?>
								<div class="titulo"><?php echo $perguntas['pergunta'];?></div>
								<div class="subtitulo"><a href="<?php echo $perguntas['link_referencia'];?>" target="_blank"><?php echo $perguntas['texto_link'];?></a></div>
								<?php }?>
								<table class="respostas">
									<?php 
										if($respostas == NULL){
											echo '
													<tr>
														<td><input type="radio" name="resposta" value="#" /></td>
														<td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</td>
													</tr>
													<tr>
														<td><input type="radio" name="resposta" value="#" /></td>
														<td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</td>
													</tr>
													<tr>
														<td><input type="radio" name="resposta" value="#" /></td>
														<td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</td>
													</tr>

											';
										}else{
										foreach($respostas as $resposta):
									?>
										<tr>
											<td><input type="radio" name="resposta" value="<?php echo $resposta->perfil_resposta;?>" /></td>
											<td><?php echo $resposta->resposta;?></td>
										</tr>
									<?php endforeach;}?>
								</table>
							</div>
							<div id="imagem">
								<img id="alvo-pergunta" src="<?php if($perguntas == NULL){echo base_url()."assets/img/backgrounds/imagem2.png";}else{echo $perguntas['imagem'];}?>" />
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
								<?php 
									$options_titulo_resultados_tamanho = array('18px'=>'18px','20px'=>'20px','22px'=>'22px');
									echo form_dropdown('titulo-resultados-tamanho', $options_titulo_resultados_tamanho, $customizacao['resultado_titulo_quiz_font_size'], ' class="default" ');
								?>
								<!--passa o valor Tamanho da fonte escondido-->
								<input name="ititulo-resultados-tamanho" type="hidden" value="font-size:<?php echo $customizacao['resultado_titulo_quiz_font_size']; ?>;" />
								<!--Cor da fonte:-->
								<p>Cor da fonte:</p>
								<div class="input-picker"><input id="titulo-resultados-cor" name="titulo-resultados-cor" type="text" value="<?php echo $customizacao['resultado_titulo_quiz_font_color'];?>" /></div>
								<!--Alinhamento:-->
								<p class="alinha">Alinhamento:</p>
								<div id="alinha-inner" class="titulo-resultados-alinhamento">
									<div id="left" <?php if($customizacao['resultado_titulo_quiz_align']   == 'left') echo 'class="ativo"';?>></div>
									<div id="center" <?php if($customizacao['resultado_titulo_quiz_align'] == 'center') echo 'class="ativo"';?>></div>
									<div id="right" <?php if($customizacao['resultado_titulo_quiz_align']  == 'right') echo 'class="ativo"';?>></div>
									<div id="justify" <?php if($customizacao['resultado_titulo_quiz_align']== 'justify') echo 'class="ativo"';?>></div>
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
								<?php 
									$options_perguntas_resultados_tamanho = array('18px'=>'18px','20px'=>'20px','22px'=>'22px', '24px'=>'24px', '26px'=>'26px');
									echo form_dropdown('perguntas-resultados-tamanho', $options_perguntas_resultados_tamanho, $customizacao['resultado_titulo_faixa_font_size'], ' class="default" ');
								?>
								<!--passa o valor Tamanho da fonte escondido-->
								<input name="iperguntas-resultados-tamanho" type="hidden" value="font-size:<?php echo $customizacao['resultado_titulo_faixa_font_size']; ?>;" />
								<!--Cor da fonte:-->
								<p>Cor da fonte:</p>
								<div class="input-picker"><input id="perguntas-resultados-cor" name="perguntas-resultados-cor" type="text" value="<?php echo $customizacao['resultado_titulo_faixa_font_color'];?>" /></div>
								<!--Alinhamento:-->
								<p class="alinha">Alinhamento:</p>
								<div id="alinha-inner" class="perguntas-resultados-alinhamento">
									<div id="left" <?php if($customizacao['resultado_titulo_faixa_align']   == 'left') echo 'class="ativo"';?>></div>
									<div id="center" <?php if($customizacao['resultado_titulo_faixa_align'] == 'center') echo 'class="ativo"';?>></div>
									<div id="right" <?php if($customizacao['resultado_titulo_faixa_align']  == 'right') echo 'class="ativo"';?>></div>
									<div id="justify" <?php if($customizacao['resultado_titulo_faixa_align']== 'justify') echo 'class="ativo"';?>></div>
								</div>
								<!--passa o valor Alinhamento escondido-->
								<input name="iperguntas-resultados-alinhamento" type="hidden" value="text-align:<?php echo $customizacao['resultado_titulo_faixa_align'];?>;" />
							</div>
							
							<!--Acertos-->
							<div class="intro">
								<p>Acertos</p>
								<span class="arrow"></span>
							</div>
							<div class="content">
								<!--Tamanho da fonte-->
								<p>Tamanho da fonte:</p>
								<?php 
									$options_acertos_tamanho = array('18px'=>'18px','20px'=>'20px','22px'=>'22px', '24px'=>'24px', '26px'=>'26px');
									echo form_dropdown('acertos-tamanho', $options_acertos_tamanho, $customizacao['resultado_porcentagem_font_size'], ' class="default" ');
								?>
								<!--passa o valor Tamanho da fonte escondido-->
								<input name="iacertos-tamanho" type="hidden" value="font-size:18px;" />
								<!--Cor da fonte:-->
								<p>Cor da fonte:</p>
								<div class="input-picker"><input id="acertos-cor" name="acertos-cor" type="text" value="333333" /></div>
								<!--Alinhamento:-->
								<p class="alinha">Alinhamento:</p>
								<div id="alinha-inner" class="acertos-alinhamento">
									<div id="left" <?php if($customizacao['resultado_porcentagem_align']   == 'left') echo 'class="ativo"';?>></div>
									<div id="center" <?php if($customizacao['resultado_porcentagem_align'] == 'center') echo 'class="ativo"';?>></div>
									<div id="right" <?php if($customizacao['resultado_porcentagem_align']  == 'right') echo 'class="ativo"';?>></div>
									<div id="justify" <?php if($customizacao['resultado_porcentagem_align']== 'justify') echo 'class="ativo"';?>></div>
								</div>
								<!--passa o valor Alinhamento escondido-->
								<input name="iacertos-alinhamento" type="hidden" value="text-align:<?php echo $customizacao['resultado_porcentagem_align'];?>;" />
							</div>
							
							<!--Descrição-->
							<div class="intro">
								<p>Descrição</p>
								<span class="arrow"></span>
							</div>
							<div class="content">
								<?php 
									$options_descricao_tamanho = array('16px'=>'16px', '18px'=>'18px','20px'=>'20px','22px'=>'22px', '24px'=>'24px');
									echo form_dropdown('descricao-tamanho', $options_descricao_tamanho, $customizacao['resultado_descricao_font_size'], ' class="default" ');
								?>
								<!--Tamanho da fonte-->
								<p>Tamanho da fonte:</p>
								<!--passa o valor Tamanho da fonte escondido-->
								<input name="idescricao-tamanho" type="hidden" value="font-size:<?php echo $customizacao['resultado_descricao_font_size'];?>;" />
								<!--Cor da fonte:-->
								<p>Cor da fonte:</p>
								<div class="input-picker"><input id="descricao-cor" name="descricao-cor" type="text" value="<?php echo $customizacao['resultado_descricao_font_color'];?>" /></div>
								<!--Alinhamento:-->
								<p class="alinha">Alinhamento:</p>
								<div id="alinha-inner" class="descricao-alinhamento">
									<div id="left" <?php if($customizacao['resultado_descricao_align']   == 'left') echo 'class="ativo"';?>></div>
									<div id="center" <?php if($customizacao['resultado_descricao_align'] == 'center') echo 'class="ativo"';?>></div>
									<div id="right" <?php if($customizacao['resultado_descricao_align']  == 'right') echo 'class="ativo"';?>></div>
									<div id="justify" <?php if($customizacao['resultado_descricao_align']== 'justify') echo 'class="ativo"';?>></div>
								</div>
								<!--passa o valor Alinhamento escondido-->
								<input name="idescricao-alinhamento" type="hidden" value="text-align:<?php echo $customizacao['resultado_descricao_align'];?>;" />
							</div>
							
							<!--Link de referência-->
							<div class="intro">
								<p>Link de referência</p>
								<span class="arrow"></span>
							</div>
							<div class="content">
								<!--Tamanho da fonte-->
								<p>Tamanho da fonte:</p>
								<?php 
									$options_referencia_resultados_tamanho = array('13px'=>'13px', '15px'=>'15px','17px'=>'17px');
									echo form_dropdown('referencia-resultados-tamanho', $options_referencia_resultados_tamanho, $customizacao['resultado_linkref_font_size'], ' class="default" ');
								?>
								<!--passa o valor Tamanho da fonte escondido-->
								<input name="ireferencia-resultados-tamanho" type="hidden" value="font-size:<?php echo $customizacao['resultado_linkref_font_size'];?>;" />
								<!--Cor da fonte:-->
								<p>Cor da fonte:</p>
								<div class="input-picker"><input id="referencia-resultados-cor" name="referencia-resultados-cor" type="text" value="<?php echo $customizacao['resultado_linkref_font_color']?>" /></div>
								<!--Alinhamento:-->
								<p class="alinha">Alinhamento:</p>
								<div id="alinha-inner" class="referencia-resultados-alinhamento">
									<div id="left" <?php if($customizacao['resultado_linkref_align']   == 'left') echo 'class="ativo"';?>></div>
									<div id="center" <?php if($customizacao['resultado_linkref_align'] == 'center') echo 'class="ativo"';?>></div>
									<div id="right" <?php if($customizacao['resultado_linkref_align']  == 'right') echo 'class="ativo"';?>></div>
									<div id="justify" <?php if($customizacao['resultado_linkref_align']== 'justify') echo 'class="ativo"';?>></div>
								</div>
								<!--passa o valor Alinhamento escondido-->
								<input name="ireferencia-resultados-alinhamento" type="hidden" value="text-align:<?php echo $customizacao['resultado_linkref_align'];?>;" />
							</div>
						
							<!--Botões-->
							<div class="intro">
								<p>Botões</p>
								<span class="arrow"></span>
							</div>
							<div class="content">
								<!--Cor da fonte:-->
								<p>Cor da fonte:</p>
								<div class="input-picker"><input id="botoes-resultados-cor" name="botoes-resultados-cor" type="text" value="<?php echo $customizacao['resultado_botao_font_color'];?>" /></div>
								<!--Cor de fundo:-->
								<p>Cor de fundo:</p>
								<div class="input-picker"><input id="botoes-resultados-cor-fundo" name="botoes-resultados-cor-fundo" type="text" value="<?php echo $customizacao['resultado_botao_bg_color'];?>" /></div>
							</div>
							
							<!--Imagem de fundo-->
							<div class="intro">
								<p>Imagem de fundo</p>
								<span class="arrow"></span>
							</div>
							<div class="content">
								<!--Imagem:-->
										<form id="fileupload-perfil-customiza-resultados" action="<?php echo base_url();?>assets/server/php/index2.php" method="POST" enctype="multipart/form-data">
										<div id="imagem-preview"><img id="alvo-resultados" src="<?php if($customizacao['resultado_bg_img'] == "") {echo base_url().'assets/img/backgrounds/preview.png';}else{echo base_url()."assets/server/php/files/".$customizacao['resultado_bg_img'];}?>" /></div>
										<span class="btn btn-success fileinput-button">
											<input id="file" type="file"  />
										</span>
										</form>
										<input type="hidden" name="bg_image_resultado" id="bg_image_resultado" value="<?php echo $customizacao['resultado_bg_img'];?>"/>
								<!--Cor de fundo:-->
								<p class="alinha">Cor de fundo:</p>
								<div class="input-picker"><input id="imagem-resultados-cor-fundo" name="imagem-resultados-cor-fundo" type="text" value="<?php echo $customizacao['resultado_bg_img'];?>" /></div>
							</div>
							
						</div>
						
						<div id="previewResultados" class="preview">
							<div id="nome"><?php echo $titulo;?></div>
							<?php 
								if($perfis != null){
							?>
							<div id="texto">
								<div class="titulo"><?php echo $perfis['titulo'];?></div>								
								<div class="resultado">
									<p class="descricao"><?php echo $perfis['descricao'];?></p>
									<div class="saibaMais"><a href="<?php echo $perfis['link_referencia'];?>"><?php echo $perfis['texto_link'];?></a></div>
								
									<div id="botoesResultado">
										<a href="#" class="anterior" title="jogar novamente">&laquo; jogar novamente</a>
										<a href="#" class="proximo" title="ver gabarito">ver gabarito</a>
									</div>
								
								</div>								
							</div>
							<div id="imagem">
								<!--<img id="alvo--" src="<?php echo base_url();?>assets/img/backgrounds/imagem2.png" />-->
								<img id="alvo--" src="<?php echo $perfis['imagem'];?>" />
							</div>
							<?php
								}else{
							?>
							<div id="texto">
								<div class="titulo">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</div>								
								<div class="resultado">
									<p class="descricao">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
									<div class="saibaMais"><a href="#">Link referência</a></div>
								
									<div id="botoesResultado">
										<a href="#" class="anterior" title="jogar novamente">&laquo; jogar novamente</a>
										<a href="#" class="proximo" title="ver gabarito">ver gabarito</a>
									</div>
								
								</div>								
							</div>
							<div id="imagem">
								<img id="alvo--" src="<?php echo base_url();?>assets/img/backgrounds/imagem2.png" />
							</div>
							<?php }?>	

						</div>
					</div>
					
				</div>
				<div id="retorno"></div>
				<?php if($perguntas == NULL){?>
					<a class="voltar" href="<?php echo base_url();?>quiz_tipo/<?php echo $tipo;?>/<?php echo $id;?>" rel="link-interno" title="voltar"></a>
				<?php }else{?>
				<a class="voltar" href="#" rel="link-interno" title="voltar"></a>
				<a class="proxima-etapa" href="<?php echo base_url();?>visualizacao/<?php echo $tipo;?>/<?php echo $id;?>" rel="link-interno" id="btn-proxima-etapa-3-customizacao" title="próxima etapa"></a>
				<?php }?>
			</div>
		</div>