var eventos_back = {
	
	init: function()
	{
		$('#btn-esqueci-senha').click(function(e){
			e.preventDefault();
			var email = $('#email-login-recover').val();

			if(email == '' || email == 'email'){
				$('.enviada-erro').show().text('Por favor! Informe um e-mail');
				//$('#email-login-recover').focus(function(){});
			}else{
				eventos_back.recovery(email);
			}

			$('#email-login-recover').focus(function(){
				$('.enviada-erro').hide().text('');
			});

			return false;	
		});

		$('#txt-login').blur(function(){
			var validaEmail = /(^[a-z]([a-z_\.]*)@([a-z_\.]*)([.][a-z]{3})$)|(^[a-z]([a-z_\.]*)@([a-z_\.]*)(\.[a-z]{3})(\.[a-z]{2})*$)/i;

			if($(this).val() == 'email'){
				$('.enviada-erro').show().text('Informe seu e-mail');
			}else if(!validaEmail.test($('#txt-login').val())){
				$('.enviada-erro').show().text('Informe um e-mail válido');
			}else{
				$('.enviada-erro').hide().text('');
				$('#bt-reset-senha').removeAttr('disabled');
			}
		});

		$('#txt-password-repeat').blur(function(){
			if($(this).val() != $('#txt-password').val()){
				$('.enviada-erro').show().text('As senhas precisam ser iguais');
				$('#bt-reset-senha').attr('disabled', true);
			}else{
				$('.enviada-erro').hide().text('');
				$('#bt-reset-senha').removeAttr('disabled');
			}
		});

		$('#bt-reset-senha').click(function(e){
			e.preventDefault();

			var validaEmail = /(^[a-z]([a-z_\.]*)@([a-z_\.]*)([.][a-z]{3})$)|(^[a-z]([a-z_\.]*)@([a-z_\.]*)(\.[a-z]{3})(\.[a-z]{2})*$)/i;
			var email = $('#txt-login').val(), senha = $('#txt-password').val(), senha_repetida = $('txt-password-repeat').val();

			if(email == 'email' || senha == 'senha nova' || senha_repetida == 'repita a senha nova'){
				$('.enviada-erro').show().text('Preencha todos os campos corretamente');
				return false;
			}else{
				document.form_reset_pass.submit();
			}
		});
	},

	recovery: function(email){
		
		$.getJSON(
			'login/recovery',
			{email:email},
			function(e){
				if(e.result == "sucesso"){
					$('#email-recover-div, #bt-esqueci-senha-div').hide();
					$('#status-enviada').show().text('Foi lhe enviado um e-mail com uma url para reconfiguração da senha.');

				}else{
					$('.enviada-erro').show().text(e.erro);
				}
			}
		);
	}
}

jQuery(document).ready(function($) {
	eventos_back.init();
});