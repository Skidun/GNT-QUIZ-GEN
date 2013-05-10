<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Skidun Admin</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">

        <!--[if lt IE 9]>
            <script src="js/vendor/html5-3.6-respond-1.1.0.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">Você está usando um navegador<strong>Antigo e vulnerável</strong>. Porfavor <a href="http://browsehappy.com/">atualize seu navegador</a> ou <a href="http://www.google.com/chromeframe/?redirect=true">AtiveGoogle Chrome Frame</a> para melhorar sua experiência np uso da nossa aplicação.</p>
        <![endif]-->
        <div class="container-fluid" id="painel-login">
        	<div class="row-fluid">
                	<h2>Login no sistema</h2>
                	<?php if(isset($error)){?>
                		<div class="alert alert-error">Informe seu e-mail de login e senha</a></div>
                	<?php }
                        if($this->session->flashdata('pass_recovery')){
                            echo '<div class="alert alert-info"><a href="javascript:void()" class="close" data-dismiss="alert">x</a>'.$this->session->flashdata('pass_recovery').'</div>';
                        }
                    ?>	
                <div class="well">
                	<?php if(isset($already_installed) && $already_installed) { ?>
                		<div class="alert alert-info">O sistema já está instaldo <a href="login">Faça o login</a></div>
                	<?php }else{?>
                	<?php if(isset($already_installed) && !$already_installed) { echo form_open('install/run', array('class'=>'form-inline', 'id'=>'form-login'))."<h2>Instalação do sistema</h2>"; }else { echo form_open('login/validate', array('class'=>'form-inline', 'id'=>'form-login')); } ?>	
                		<div class="control-group" id="formulario-login">
                			<div class="control-label">
                				<?php echo form_label('E-mail', 'txt-login');?>
                			</div>
                			<div class="controls">
                				<?php 
                					$attr_login =  array(
                						'name' => 'txt-login',
                						'id'   => 'txt-login',
                						'value'=> ''
                					);
                					echo form_input($attr_login);
                				?>
                			</div>
                			<div class="control-label">
                				<?php echo form_label('Senha', 'txt-password');?>
                			</div>
                			<div class="controls">
                				<?php
                					$attr_senha = array(
                						'name' => 'txt-password',
                						'id'   => 'txt-password',
                						'value'=> ''
                					);
                					echo form_password($attr_senha);
                				?>
                			</div>
                		</div>
                		<div class="controls">
                				<?php
                					if(isset($already_installed) && !$already_installed) {
                						echo form_submit('bt-login', 'Instalar', 'class = "btn btn-danger" id="bt-login"');
                					}else{
                						echo form_submit('bt-login', 'login', 'class = "btn btn-primary" id="bt-login"');
                						echo ' <a href="javascript:void();" class="btn btn-info" id="bt-esqueci">Esqueci minha senha</a>';
                					}	
                				?>
                			</div>
                	<?php echo form_close();?>
                	<?php }?>
                	
                	<form class="form-inline" action="" method="post" id="form-esqueci">
                		<div class="progress progress-striped progress-info active" id="loader-esqueci">
                					<div class="bar" style="width: 100%;">carregando...</div>
                		</div>
                		<div class="alert alert-success" id="alert-lembrar" style="display: none;"><a href="javascript:void();" class="close" id="close-alert-lembrar">&times;</a> Você receberá um e-mail com um link para você redefinir sua senha.</div>
                		<div class="control-group" id="formulario-esqueci-senha">
                			<div class="control-label">
                				<label for="txt-email-login">Email de login</label>
                			</div>
                			<div class="controls">
                				<input type="text" name="txt-email-login-esqueci" id="txt-email-login-esqueci" />
                			</div>
                		</div>
                		<div class="controls">
                				<input type="submit" class="btn btn-danger" id="bt-lembrar" value="Lembrar Senha" />
                		</div>
                	</form>
                </div>
        	</div>

            <hr>

            <footer>
                <p>&copy; Skidun <?php echo date('Y');?></p>
            </footer>

        </div> <!-- /container -->

        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
-->
		<script src="<?php echo base_url();?>assets/js/vendor/jquery-1.9.1.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/vendor/bootstrap.min.js"></script>

        <script src="<?php echo base_url();?>assets/js/plugins.js"></script>
        <script src="<?php echo base_url();?>assets/js/main.js"></script>
    </body>
</html>
