	<?php $this->template->menu2('faixa_ce'); ?>
		
		<div id="conteudo">
			<div id="wrap">
			
				<?php
					$this->template->menu3('faixa_ce');
				?>
			
				<div id="accordion">
					
					<div class="group">
							<div class="header">
								<span class="icon"></span>
								<div class="input"><input type="text" name="nome" value="" size="" /></div>
								<span class="arrow"></span>
								<span class="excluir excluir-um"></span>
							</div>
							<div class="body">
								<!--O numero de identificacao do slider deve vir salvo do BD, o restante ele calcula dinamicamente para ser salvo-->
								<div class="sliderHolder">
									<input type="text" id="amountIni" class="amountIni1" readonly />
									<input type="text" id="amountFin" class="amountFin1" readonly />		
									<div id="slider1"></div>
								</div>
								<div class="texto">
									<label for="descricao">Descrição</label>
									<div class="textarea"><textarea name="descricao" cols="" rows=""></textarea></div>
									<label for="link">Link de referência:</label>
									<div class="input"><input type="text" name="link" value="" size="" /></div>
									<label for="texto">Texto do link de referência:</label>
									<div class="input"><input type="text" name="texto" value="" size="" /></div>
								</div>
								<div class="imagem">
									<label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px</span></label>
									
										<form class="fileupload" action="<?php echo base_url();?>assets/server/php/" method="POST" enctype="multipart/form-data">
											<div class="quadro"><img id="alvo" src="<?php echo base_url();?>assets/img/backgrounds/imagem.png" name="imagem" /></div>
											<span class="btn btn-success fileinput-button">
												<input id="file" type="file" />
											</span>
										</form>
									
								</div>
							</div>
					</div>	
					
				</div><!--accordion-->
				
				<div class="holder">
					<a id="novaFaixa" class="novaFaixa" href="#"></a>
				</div>
				
				<a class="voltar" href="#"></a>
				<a class="proxima-etapa" href="#"></a>
			
			</div>
		</div>