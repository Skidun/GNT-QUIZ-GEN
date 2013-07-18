        <div id="inicio">
			<div class="logo"></div>
			<div class="alinha">
				<form class="login" action="<?php if($already_installed){ echo base_url()."login/validate";}else{echo base_url()."install/run";}?>" method="post">
					<div class="input"><input type="text" name="txt-login" value="email" size="" /></div>
					<div class="input"><input type="text" name="txt-password" value="senha" id="senha-login" size="" /></div>
					<div class="enviada-erro" <?php if(isset($error)){echo 'style="display:block;"';}?>><?php if(isset($error)){echo "E-mail ou senha informados estão incorretos.";}?></div>
					<div class="submit"><input type="submit" name="entrar" value="" size="" /></div>
					<a class="esqueceu" href="javascript:void(0);">Esqueceu a senha?</a>
				</form>
				<form class="esqueci" action="#" method="post">
					<div class="enviada" id="status-enviada">Verificação enviada!</div>
					<div class="input" id="email-recover-div"><input type="text" name="email" value="email" id="email-login-recover" size="" /></div>
					<div class="enviada-erro"></div>
					<div class="submit" id="bt-esqueci-senha-div"><input type="submit" class="submit" name="entrar" value="" size="" onclick="return false;" id="btn-esqueci-senha" /></div>
					<a class="login-voltar" href="javascript:void(0);">Login</a>
				</form>
		
			</div>
		</div>
