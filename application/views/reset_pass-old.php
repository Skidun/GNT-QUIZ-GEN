<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $title;?></title>
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
                	<h3>Recadastrar senha de usuário</h3>
                	<?php if(isset($error)){?>
                		<div class="alert alert-error">Informe seu e-mail de login e senha</a></div>
                	<?php }?>	
                <div class="well">
                	  	<?php echo form_open('login/reset_pass', array('class'=>'form-inline', 'id'=>'form-login')); ?>	
                		<div class="control-group" id="formulario-login">
                			<div class="control-label">
                				<?php echo form_label('E-mail', 'txt-login', set_value());?>
                                <?php echo form_error('txt-login');?>
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
                                <?php echo form_error('txt-password');?>
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
                            <div class="control-label">
                				<?php echo form_label('Repita a Senha', 'txt-password-repeat');?>
                                <?php echo form_error('txt-password-repeat');?>
                			</div>
                			<div class="controls">
                				<?php
                					$attr_senha_repeat = array(
                						'name' => 'txt-password-repeat',
                						'id'   => 'txt-password-repeat',
                						'value'=> ''
                					);
                					echo form_password($attr_senha_repeat);
                				?>

                                <?php echo form_hidden('recoverKey', $recoverKey);?>
                			</div>
                		</div>
                		<div class="controls">
                				<?php
                					echo form_submit('bt-reset-senha', 'Resetar Senha', 'class = "btn btn-primary" id="bt-reset-senha"');
                					echo ' <a href="'.site_url('login').'" class="btn btn-info" id="bt-esqueci">Fazer login</a>';
                                ?>
                			</div>
                	<?php echo form_close();?>
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
