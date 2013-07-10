<?php $this->template->menu('create_usuario'); ?>
		
		<div id="conteudo">
			<div id="wrap">
				<form class="fUsuario" name="form_cad_usuario" action="<?php echo base_url();?>salvar-usuario" method="post">
				<div class="conteudo-box usuarios">
					<table class="box">
						<thead>
							<tr>
								<td>novo usuário</td>
							</tr>
							<?php if($this->session->flashdata('retorno')):?>
								<tr>
									<td><?php echo $this->session->flashdata('retorno');?></td>
								</tr>
							<?php endif;?>
						</thead>
						<tbody>
							<tr>
								<td>
									<p>Nome:</p>
									<p><?php echo form_error('nome'); ?></p>
									<div class="input"><input type="text" name="nome" value="" /></div>
									<p>E-mail:</p>
									<p><?php echo form_error('email'); ?></p>
									<div class="input"><input type="text" name="email" value="" /></div>
									<p>Senha:</p>
									<p><?php echo form_error('senha'); ?></p>
									<div class="input"><input type="password" name="senha" value="" /></div>
									<p>Repita a senha</p>
									<p><?php echo form_error('confirmaSenha'); ?></p>
									<div class="input"><input type="password" name="confirmaSenha" value="" /></div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<button name="criar-usuario" class="btn-criar-usuario" id="btn-criar-usuario" type="submit"></button>
				</form>
			</div>
		</div>
		
