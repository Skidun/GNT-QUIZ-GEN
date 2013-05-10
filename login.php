<?php require_once('header.php'); ?>
        <div id="inicio">
			<div class="logo"></div>
			<div class="alinha">
				<form class="login" action="#" method="post">
					<div class="input"><input type="text" name="email" value="email" size="" /></div>
					<div class="input"><input type="text" name="senha" value="senha" size="" /></div>
					<div class="submit"><input type="submit" name="entrar" value="" size="" onclick="return false;" /></div>
					<a class="esqueceu" href="javascript:void(0);">Esqueceu a senha?</a>
				</form>
				<form class="esqueci" action="#" method="post">
					<div class="enviada">Verificação enviada!</div>
					<div class="input"><input type="text" name="email" value="email" size="" /></div>
					<div class="submit"><input type="submit" name="entrar" value="" size="" onclick="return false;" /></div>
					<a class="login-voltar" href="javascript:void(0);">Login</a>
				</form>
			</div>
		</div>
<?php require_once('footer.php'); ?>