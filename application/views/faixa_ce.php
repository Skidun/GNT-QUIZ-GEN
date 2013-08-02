	<?php $this->template->menu2('faixa_ce'); ?>
		
		<div id="conteudo">
			<div id="wrap">
			
				<?php
					$this->template->menu3('faixa_ce');
				?>
			
				<div id="accordion">
					<?php
						echo '<input type="hidden" id="data_alteracao" value="'.$data_alteracao.'" />';
						echo '<input type="hidden" id="id_quiz" name="id_quiz" value="'.$id.'" />';
						echo '<input type="hidden" name="tipo_quiz" id="tipo_quiz" value="'.$tipo.'" />';
					
						if($quantidade == 0){
					?>
					<div class="group">
							<div class="header">
								<span class="icon"></span>
								<div class="input"><input type="text" name="nome" value="Título" size="" /></div>
								<span class="arrow"></span>
								<span class="excluir excluir-um"></span>
							</div>
							<div class="body">
								<!--O numero de identificacao do slider deve vir salvo do BD, o restante ele calcula dinamicamente para ser salvo-->
								<div class="textoDoSlider">Considere a quantidade de respostas corretas como o valor total de pontos possíveis na faixa de classificação. 1 acerto = 1 ponto.</div>
								<div class="sliderHolder">
									<input type="text" id="amountIni" class="amountIni1" readonly />
									<input type="text" id="amountFin" class="amountFin1" readonly />		
									<div id="slider1"></div>
								</div>
								<div class="texto">
									<label for="descricao">Descrição <div class="limite">Limite de caracteres:<span id="campospan" title="500">500</span></div></label>
									<div class="textarea"><textarea name="descricao" cols="" rows=""></textarea></div>
									<label for="link">Link de referência:</label>
									<div class="input"><input type="text" name="link" value="http://" size="" /></div>
									<label for="texto">Texto do link de referência:</label>
									<div class="input"><input type="text" name="texto" value="" size="" /></div>
								</div>
								<div class="imagem">
									<label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px<br />Formatos: JPG, PNG e GIF<br />Tamanho: 1MB<br />Nomes sem acentos e caracteres especiais</span></label>
									
										<form class="fileupload" action="<?php echo base_url();?>assets/server/php/" method="POST" enctype="multipart/form-data">
											<div class="quadro"><img id="alvo" src="<?php echo base_url();?>assets/img/backgrounds/imagem.png" name="imagem" /></div>
											<span class="btn btn-success fileinput-button">
												<input id="file" type="file" />
											</span>
											<a href="javascript:void(0);" class="excluir excluir-imagem"></a>
										</form>
									
								</div>
							</div>
					</div>
					<?php
						}else{
							echo $faixas;
						}
					?>	
					
				</div><!--accordion-->
				
				<div class="holder">
					<a id="novaFaixa" class="novaFaixa" href="#"></a>
				</div>
				
				<a class="voltar" href="<?php echo base_url();?>perguntas/<?php echo $tipo;?>/<?php echo $id;?>"></a>
				<a class="proxima-etapa" id="proxima-etapa-2-faixa-ce" href="<?php echo base_url();?>customizacao/<?php echo $tipo;?>/<?php echo $id;?>"></a>
				<div class="loader" style="float: left; margin: 44px 10px 44px 10px; display: none;">
					<img src="<?php echo base_url();?>assets/img/ajax-loader.gif" />								
				</div>
			</div>
		</div>