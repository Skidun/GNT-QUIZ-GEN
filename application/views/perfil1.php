		<?php $this->template->menu2('perfil1'); ?>
		
		<div id="conteudo">
			<div id="wrap">
			
				<div class="nav-perfil">
					<a class="anterior" href="#"></a>
					<a class="perfis ativo" href="#"></a>
					<a class="perguntas" href="#"></a>
					<a class="customizacao" href="#"></a>
					<a class="visualizacao" href="#"></a>
					<a class="proximo" href="#"></a>
				</div>
							
				<div id="accordion">		
						<div class="group" id="0">
							<div class="header">
								<span class="icon"></span>
								<div class="input"><input type="text" name="nome" id="nome-perfil-0" value="" size="" /></div>
								<span class="arrow"></span>
							</div>
							<div class="body">
								<div class="texto">
									<label for="descricao">Descrição</label>
									<div class="textarea"><textarea name="descricao" id="descricao-perfil-0" cols="" rows=""></textarea></div>
									<label for="link">Link de referência:</label>
									<div class="input"><input type="text" name="link" id="link-perfil-0" value="" size="" /></div>
									<label for="texto">Texto do link de referência:</label>
									<div class="input"><input type="text" name="texto" id="texto-perfil-0" value="" size="" /></div>
								</div>
								<div class="imagem">
									<label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px</span></label>
									
									<form class="fileupload" action="<?php echo base_url();?>assets/server/php/" method="POST" enctype="multipart/form-data">
										<div class="quadro"><img id="alvo-0" src="<?php echo site_url('assets/img/backgrounds/imagem.png');?>" name="imagem" /></div>
										<span class="btn btn-success fileinput-button">
											<input id="file" type="file" id="" />
										</span>
									</form>
									
								</div>
							</div>
						</div>
					
				</div><!--accordion-->
				
				
				<div class="holder">
					<a id="novo-perfil" class="novo-perfil" href="#"></a>
				</div>
				
				<a class="proxima-etapa" id="btn-proxima-etapa-1-perfil" href="#"></a>
			
			</div>
		</div>