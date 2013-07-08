<?php $this->template->menu('create_usuario'); ?>
		
		<div id="conteudo">
			<div id="wrap">
				<form class="fUsuario" name="form_cad_usuario" action="salvar-usuario" method="post">
				<div class="conteudo-box usuarios">
					<table class="box">
						<thead>
							<tr>
								<td>novo usuário</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<p>Nome:</p>
									<div class="input"><input type="text" name="nome" value="" /></div>
									<p>E-mail:</p>
									<div class="input"><input type="text" name="email" value="" /></div>
									<p>Senha:</p>
									<div class="input"><input type="password" name="senha" value="" /></div>
									<p>Repita a senha</p>
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
		
