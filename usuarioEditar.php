<?php require_once('header.php'); ?>

		
		<?php require_once('topo-um.php'); ?>
		
		<div id="conteudo">
			<div id="wrap">
				
				<div class="conteudo-box usuarios">
					<table class="box">
						<thead>
							<tr>
								<td>editar usuário</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									
									<p>Nome:</p>
									<div class="input"><input type="text" name="nome" value="Nome" /></div>
									<p>E-mail:</p>
									<div class="input"><input type="text" name="email" value="E-mail" /></div>
									<p>Senha:</p>
									<div class="input"><input type="password" name="senha" value="Senha" /></div>
									<div class="input"><input type="password" name="confirmaSenha" value="Senha" /></div>
									
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<button class="btn-editar-usuario" type="submit"></button>
				
			</div>
		</div>
		

<?php require_once('footer.php'); ?>