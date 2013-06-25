		<?php $this->template->menu2('perguntas'); ?>
	
		
		<div id="conteudo" class="perfil2">
			<div id="wrap">
				<?php $this->template->menu3('perguntas'); ?>			
				<div class="titulo-perguntas">Perguntas:</div>
				
				<div id="accordion2">
					<?php
						echo '<input type="hidden" id="data_alteracao" value="'.$data_alteracao.'" />';
						echo '<input type="hidden" id="id_quiz" name="id_quiz" value="'.$id.'" />';
						echo '<input type="hidden" name="tipo_quiz" id="tipo_quiz" value="'.$tipo.'" />';
					?>
					<?php 
						if($quantidade > 0){
							echo $perguntas;
						}else{
					?>
					<div class="group" id="0">					
							<div class="header">
								<span class="icon"></span>
								<div class="input"><input type="text" name="nome" id="nome-pergunta-0" value="" size="" /></div>
								<span class="arrow"></span>
							</div>
							<div class="body">							
								<div id="perguntas">								
									<div class="texto">
										<label for="link">Link de referência:</label>
										<div class="input"><input type="text" name="link" id="link-pergunta-0" value="" size="" /></div>
										<label for="texto">Texto do link de referência:</label>
										<div class="input"><input type="text" name="texto" id="texto-pergunta-0" value="" size="" /></div>
									</div>
									<div class="imagem">
										<label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px</span></label>
										
										<form class="fileupload" action="<?php echo base_url();?>assets/server/php/" method="POST" enctype="multipart/form-data">
											<div class="quadro"><img id="alvo-pergunta-0" src="<?php echo base_url();?>assets/img/backgrounds/imagem.png" name="imagem" /></div>
											<span class="btn btn-success fileinput-button">
												<input id="file" type="file" />
											</span>
										</form>
										<input type="hidden" id="id-pergunta-0" name="id-pergunta" value="" />
									</div>
								</div><!--perguntas-->
								<div id="respostas">
								
									<div class="titulo-respostas">Respostas:</div>
									
									<div id="sortable0" class="sorteia">
										
												<div class="header">
													<span class="icon"></span>
													<div class="input"><input type="text" name="nome" id="nome-resposta-0" value="" size="" /></div>
													<select name="perfil-resposta" id="perfil-resposta-0" class="default">
														<?php echo $option_perfil;?>
													</select>
												</div>
										
									</div>

									<a id="nova-resposta-perfil" class="nova-resposta" href="javascript:void(0)"></a>
								</div><!--respostas-->

							</div><!--body-->							
					</div><!--group-->
					
				<?php } ?>
				</div><!--accordion-->			

				<div class="holder">
					<a id="nova-pergunta-perfil" class="nova-pergunta" href="#"></a>
				</div>
				
				<a class="voltar" href="<?php echo base_url();?>quiz_tipo/<?php echo $tipo;?>/<?php echo $id;?>" rel="link-interno" title="voltar"></a>
				<a class="proxima-etapa" href="<?php echo base_url();?>customizacao/<?php echo $tipo;?>/<?php echo $id;?>" rel="link-interno" id="btn-proxima-etapa-2-perguntas" title="próxima etapa" onclick="return false;"></a>
			
			</div>
		</div>