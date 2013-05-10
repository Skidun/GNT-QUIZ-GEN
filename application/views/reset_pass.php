       <div id="inicio">
			<div class="logo"></div>
			<div class="alinha">
				<form class="criar" name="form_reset_pass" action="<?php echo base_url();?>login/reset_pass" method="post">
					<div class="enviada" id="status-enviada"></div>
					<div class="input"><input type="text" name="txt-login" id="txt-login" value="email" size="" /></div>
					<div class="input"><input type="text" name="txt-password" id="txt-password" value="senha nova" size="" /></div>
					<div class="input"><input type="text" name="txt-password-repeat" id="txt-password-repeat" value="repita a senha nova" size="" /></div>
					<input type="hidden" name="recoverKey" value="<?php echo $recoverKey;?>" />
					<div class="enviada-erro"></div>
					<div class="submit salvar"><input type="submit" name="salvar" id="bt-reset-senha" disabled value="" size="" /></div>
					<a class="login-voltar" href="<?php echo site_url('login');?>">Login</a>
				</form>
			</div>
		</div>
