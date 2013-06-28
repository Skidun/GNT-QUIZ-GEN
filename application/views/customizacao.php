		<?php $this->template->menu2('customizacao'); ?>
		
		<div id="conteudo">
			<div id="wrap">
			
				<?php $this->template->menu3('customizacao');?>
			
				<div id="perfilCustomizacao" class="item">
				
					<!--Perguntas e respostas-->
					<div class="header">
						<div class="titulo">Perguntas e respostas</div>
						<span class="arrow"></span>
						<?php 
							if($customizacao == NULL){
								#Perguntas e respostas
								$customizacao['titulo_quiz_font_size'] = '20px';
								$customizacao['titulo_quiz_font_color'] = '333333';
								$customizacao['titulo_quiz_align'] = 'left';
								
								$customizacao['pergunta_quiz_font_size'] = '24px';
								$customizacao['pergunta_quiz_font_color'] = '333333';
								$customizacao['pergunta_quiz_align'] = 'left';

								$customizacao['link_ref_pergunta_font_size'] = '16px';
								$customizacao['link_ref_pergunta_font_color'] = '333333';
								$customizacao['link_ref_pergunta_align'] = 'left';

								$customizacao['resposta_pergunta_font_size'] = '15px';
								$customizacao['resposta_pergunta_font_color'] = '333333';
								$customizacao['resposta_pergunta_align'] = 'left';
								$customizacao['resposta_pergunta_bg_color'] = '';

								$customizacao['botao_perguntas_font_color'] = '333333';
								$customizacao['botao_perguntas_bg_color'] = '';

								$customizacao['quiz_bg_img'] = '';
								$customizacao['quiz_bg_color'] = '';

								#Resultados
								$customizacao['resultado_titulo_quiz_font_size'] = '20px';
								$customizacao['resultado_titulo_quiz_font_color'] = '333333';
								$customizacao['resultado_titulo_quiz_align'] = 'left';
								
								$customizacao['resultado_titulo_faixa_font_size'] = '20px';
								$customizacao['resultado_titulo_faixa_font_color'] = '333333';
								$customizacao['resultado_titulo_faixa_align'] = 'left';

								$customizacao['pergunta_quiz_font_color'] = '333333';
								$customizacao['pergunta_quiz_align'] = 'left';

								$customizacao['link_ref_pergunta_font_size'] = '16px';
								$customizacao['link_ref_pergunta_font_color'] = '333333';
								$customizacao['link_ref_pergunta_align'] = 'left';

								$customizacao['resposta_pergunta_font_size'] = '15px';
								$customizacao['resposta_pergunta_font_color'] = '333333';
								$customizacao['resposta_pergunta_align'] = 'left';
								$customizacao['resposta_pergunta_bg_color'] = '';

								$customizacao['botao_perguntas_font_color'] = '333333';
								$customizacao['botao_perguntas_bg_color'] = '';

								$customizacao['quiz_bg_img'] = '';
								$customizacao['quiz_bg_color'] = '';

							}
						?>
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
								<div class="input-picker"><input id="titulo-cor" type="text" id="titulo_quiz_font_color" value="<?php echo $customizacao['titulo_quiz_font_color'];?>" /></div>
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
								<div class="input-picker"><input id="perguntas-cor" type="text" value="<?php echo $customizacao['pergunta_quiz_font_color']?>" /></div>
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
								<div class="input-picker"><input id="referencia-cor" type="text" value="<?php echo $customizacao['link_ref_pergunta_font_color'];?>" /></div>
								<!--Alinhamento:-->
								<p class="alinha">Alinhamento:</p>
								<div id="alinha-inner" class="referencia-alinhamento">
									<div id="left" <?php if($customizacao['link_ref_pergunta_align'] == 'left') echo 'class="ativo"';?>></div>
									<div id="center" <?php if($customizacao['link_ref_pergunta_align'] == 'center') echo 'class="ativo"';?>></div>
									<div id="right" <?php if($customizacao['link_ref_pergunta_align'] == 'right') echo 'class="ativo"';?>></div>
									<div id="justify" <?php if($customizacao['link_ref_pergunta_align'] == 'justify') echo 'class="ativo"';?>></div>
								</div>
								<!--passa o valor Alinhamento escondido-->
								<input name="iperguntas-alinhamento" type="hidden" value="text-align:<?php echo $customizacao['link_ref_pergunta_align'];?>;" />
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
								<div class="input-picker"><input id="respostas-cor" type="text" value="<?php echo $customizacao['resposta_pergunta_font_color'];?>" /></div>
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
								<div class="input-picker"><input id="respostas-cor-fundo" type="text" value="<?php echo $customizacao['resposta_pergunta_bg_color'];?>" /></div>
							</div>
							
							<!--Botões-->
							<div class="intro">
								<p>Botões</p>
								<span class="arrow"></span>
							</div>
							<div class="content">
								<!--Cor da fonte:-->
								<p>Cor da fonte:</p>
								<div class="input-picker"><input id="botoes-cor" type="text" value="<?php echo $customizacao['botao_perguntas_font_color'];?>" /></div>
								<!--Cor de fundo:-->
								<p>Cor de fundo:</p>
								<div class="input-picker"><input id="botoes-cor-fundo" type="text" value="<?php echo $customizacao['botao_perguntas_bg_color'];?>" /></div>
							</div>
							
							<!--Imagem de fundo-->
							<div class="intro">
								<p>Imagem de fundo</p>
								<span class="arrow"></span>
							</div>
							<div class="content">
								<!--Imagem:-->
										<form id="fileupload-perfil-customiza" action="<?php echo base_url();?>assets/server/php/" method="POST" enctype="multipart/form-data">
										<div id="imagem-preview"><img id="alvo-perguntas" src="<?php echo base_url();?>assets/img/backgrounds/preview.png" /></div>
										<span class="btn btn-success fileinput-button">
											<input id="file" type="file"  />
										</span>
										</form>
								<!--Cor de fundo:-->
								<p class="alinha">Cor de fundo:</p>
								<div class="input-picker"><input id="imagem-cor-fundo" type="text" value="" /></div>
							</div>
							
						</div>
						<div id="previewPerguntas" class="preview">
							<div id="nome"><?php  echo $titulo;?></div>
							<div id="texto">
								<div class="titulo"><?php echo $perguntas['pergunta'];?></div>
								<div class="subtitulo"><a href="<?php echo $perguntas['link_referencia'];?>" target="_blank"><?php echo $perguntas['texto_link'];?></a></div>
								<table class="respostas">
									<?php foreach($respostas as $resposta):?>
										<tr>
											<td><input type="radio" name="resposta" value="<?php echo $resposta->perfil_resposta;?>" /></td>
											<td><?php echo $resposta->resposta;?></td>
										</tr>
									<?php endforeach;?>
								</table>
							</div>
							<div id="imagem">
								<img id="alvo-pergunta" src="<?php echo $perguntas['imagem'];?>" />
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
										<form id="fileupload-perfil-customiza-resultados" action="<?php echo base_url();?>assets/server/php/" method="POST" enctype="multipart/form-data">
										<div id="imagem-preview"><img id="alvo-resultados" src="<?php echo base_url();?>assets/img/backgrounds/preview.png" /></div>
										<span class="btn btn-success fileinput-button">
											<input id="file" type="file"  />
										</span>
										</form>
								<!--Cor de fundo:-->
								<p class="alinha">Cor de fundo:</p>
								<div class="input-picker"><input id="imagem-resultados-cor-fundo" type="text" value="" /></div>
							</div>
							
						</div>
						
						<div id="previewResultados" class="preview">
							<div id="nome"><?php echo $titulo;?></div>
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
						</div>
					</div>
					
				</div>
				
				<a class="voltar" href="#" rel="link-interno" title="voltar"></a>
				<a class="proxima-etapa" href="#" rel="link-interno" title="próxima etapa"></a>
			
			</div>
		</div>