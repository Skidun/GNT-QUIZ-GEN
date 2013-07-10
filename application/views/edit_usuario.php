<?php $this->template->menu('create_usuario'); ?>
		
		<div id="conteudo">
			<div id="wrap">
				<form class="fUsuario" name="form_edit_usuario" action="<?php echo base_url();?>alterar-usuario" method="post">
				<div class="conteudo-box usuarios">
					<table class="box">
						<thead>
							<tr>
								<td>Editar usuário</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<p>Nome:</p>
									<p><?php echo form_error('nome'); ?></p>
									<div class="input"><input type="text" name="nome" value="<?php echo $usuario['nome'];?>" /></div>
									<p>E-mail:</p>
									<p><?php echo form_error('email'); ?></p>
									<div class="input"><input type="text" name="email" value="<?php echo $usuario['email'];?>" /></div>
									<p>Senha:</p>
									<p><?php echo form_error('senha'); ?></p>
									<div class="input"><input type="password" name="senha" value="" /></div>
									<p>Repita a senha</p>
									<p><?php echo form_error('confirmaSenha'); ?></p>
									<div class="input"><input type="password" name="confirmaSenha" value="" /></div>
									<input type="hidden" name="id" value="<?php echo $usuario['id'];?>" />
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<button name="criar-usuario" class="btn-editar-usuario" id="btn-editar-usuario" type="submit"></button>
				</form>
			</div>
		</div>
		
