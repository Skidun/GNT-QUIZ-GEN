$(function(){

	/*Limpa onfocus, retorna onblur*/
	if($('input[type="text"]').val() == '' || $('input[type="text"]').val() == 'Preencha esse campo' || $('input[type="text"]').val() == 'email'){
		$('input[type="text"]').on({
			focus: function(){
				var $this = $(this);
				if($this.val() === $this[0].defaultValue) $this.val('');
			},
			blur: function(){
				var $this = $(this);
				if($this.val() === '') $this.val($this[0].defaultValue);
			}
		});
	}
	/*Borda Arredondada no IE*/
	if (window.PIE) {
			$('.nav2 , .input , .dk_options_inner , .dk_container , .dk_toggle , .input-picker').each(function() {
				PIE.attach(this);
			});
		}

	//Página Inicial
	$('.esqueceu').click(function(){
		$('form.login').slideUp(200);
		$('form.esqueci').delay(400).slideDown(200);
	});
	/*
	$('.esqueci input[type="submit"]').click(function(){
		$('.enviada').show();
		$('.esqueci .input').hide();
	});
	*/
	$('.esqueci .login-voltar').click(function(){
		$('.enviada-erro').text('');
		$('form.esqueci').slideUp(200);
		$('form.login').delay(400).slideDown(200);
	});

	$('input[type="text"][name="senha-nova"],input[type="text"][name="repita"]').focus(function(){
		$(this).attr('type','password');
	});
	
	//Novo Quiz
	$('.default').dropkick();
	$('select[name="perfil-resposta"]').dropkick();
	$('.dk_container').show();
	/*Accordion*/
	delete($.ui.accordion.prototype._keydown);
	 $( "#accordion, #accordion2" )
	.accordion({
		active: false,
		header: "> div > .header",
		heightStyle: "content",
		collapsible: true
	})
	.sortable({
		axis: "y",
		handle: ".header",
		stop: function( event, ui ) {
			// IE doesn't register the blur when sorting
			// so trigger focusout handlers to remove .ui-state-focus
			ui.item.children( ".header" ).triggerHandler( "focusout" );
			$(this).find('.group').addClass('edit');
		}
	});

	/*Sortables, conta quantos tem na página e gera por id dinamicamente*/
	var contadorSorteia = $('.sorteia').length;
	for(i=0 ; i<contadorSorteia ; i++){
		$("#sortable"+i).sortable({stop: function(event, ui){$(this).parents('.group').removeClass('edit').addClass('edit');}});
	}
		
	/*File Upload de Todas as Páginas*/
	$('.fileupload').each(function (index) {
			$(this).fileupload({
				done: function (e, data) {
						var filess= data.files[0];
						var filenam = filess.name;

						var chamaString = JSON.parse(data.result);
						console.log( chamaString.files[0].name );
						
						$(this).find('img#alvo-'+index).attr('src','../../assets/server/php/files/'+chamaString.files[0].name);
						$(this).find('img#alvo').attr('src','../../assets/server/php/files/'+chamaString.files[0].name);
						
						$('img.carregando').remove();
				},
				progressall: function (e, data) {
					$('img#alvo-'+index).parent().append('<img src="../../assets/img/ajax-loader.gif" alt="carregando..." class="carregando"> ');
				}				

			});
	});

	$('.fileupload#form-file-upload-pergunta').each(function (index) {
		$(this).fileupload({
			done: function (e, data) {
				var filess= data.files[0];
				var filenam = filess.name;
				
				var chamaString = JSON.parse(data.result);
				console.log( chamaString.files[0].name );
					
				$(this).find('img#alvo-pergunta-'+index).attr('src','../../assets/server/php/files/'+chamaString.files[0].name);
				$('img.carregando').remove();

				},
			progressall: function (e, data) {
				$('img#alvo-pergunta-'+index).parent().append('<img src="../../assets/img/ajax-loader.gif" alt="carregando..." class="carregando"> ');
			}
		});
	});
	
	//Perfil
	$('.group').find('input[name="nome"], input[name="nome-pergunta"]').focus(function(){
		if(this.value == 'Título' || this.value == 'Pergunta'){
			this.value='';
		}
	});
	$('.group').find('input[name="nome"]').blur(function(){
		if(this.value == ''){
			this.value='Título';
		}
	});
	$('.group').find('input[name="nome-pergunta"]').blur(function(){
		if(this.value == ''){
			this.value='Pergunta';
		}
	});
	/*perguntas*/
	$('#fileupload-perfil-customiza')
   .fileupload({
        url: '../../assets/server/php/index2.php',
        dataType: 'json',
        done: function (e, data) {			
            $.each(data.result.files, function (index, file) {
				$('#previewPerguntas').attr('style', "background-image: url('../../assets/server/php/files/"+file.name+"');");
				$('img#alvo-perguntas').attr('src','../../assets/server/php/files/'+file.name);
				$('#bg_image_pergunta').val(file.name);
				$('img.carregando').remove();
				$('input:radio[name="repete-imagem-perguntas"]').change(function(){
					$('#previewPerguntas').css('background-repeat', this.value);
					console.log(this.value);
				});
				$('input:radio[name="alinhaH-imagem-perguntas"]').change(function(){
						$('#previewPerguntas').css('background-position-x', this.value);
						console.log(this.value);
					});
				$('input:radio[name="alinhaV-imagem-perguntas"]').change(function(){
						$('#previewPerguntas').css('background-position-y', this.value);
						console.log(this.value);
					});
	            });

        },
        progressall: function (e, data) {
            $('img#alvo-perguntas').parent().append('<img src="../../assets/img/ajax-loader.gif" alt="carregando..." class="carregando"> ');
        }
    });
	/*resultados*/
	$('#fileupload-perfil-customiza-resultados')
   .fileupload({
        url: '../../assets/server/php/index2.php',
        dataType: 'json',
        done: function (e, data) {			
            $.each(data.result.files, function (index, file) {
				$('img#alvo-resultados').attr('src','../../assets/server/php/files/'+file.name);
				$('#previewResultados').attr('style', "background-image: url('../../assets/server/php/files/"+file.name+"');");
				$('#bg_image_resultado').val(file.name);
				$('img.carregando').remove();
				$('input:radio[name="repete-imagem"]').change(function(){
					$('#previewResultados').css('background-repeat', this.value);
					console.log(this.value);
				});
				$('input:radio[name="alinhaH-imagem"]').change(function(){
						$('#previewResultados').css('background-position-x', this.value);
						console.log(this.value);
					});
				$('input:radio[name="alinhaV-imagem"]').change(function(){
						$('#previewResultados').css('background-position-y', this.value);
						console.log(this.value);
					});
	            });
        },
        progressall: function (e, data) {
            $('img#alvo-resultados').parent().append('<img src="../../assets/img/ajax-loader.gif" alt="carregando..." class="carregando"> ');
        }
    });
			
	/* botao novo perfil*/

	$("#novo-perfil").click(function(){
		var count = $('.group').length;
		var id = count++;
		$('#accordion').append(
			'<div class="group" id="'+id+'">'+
				'<div class="header">'+
					'<span class="icon"></span>'+
					'<div class="input"><input type="text" name="nome" id="nome-perfil-'+id+'"  value="Título" size=""/></div>'+
					'<span class="arrow"></span>'+
					'<span class="excluir excluir-um"></span>'+
				'</div>'+
				'<div class="body">'+
					'<div class="texto">'+
						'<label for="descricao">Descrição <div class="limite">Limite de caracteres:<span id="campospan" title="500">500</span></div></label>'+
						'<div class="textarea"><textarea name="descricao" id="descricao-perfil-'+id+'" cols="" rows=""></textarea></div>'+
						'<label for="link">Link de referência:</label>'+
						'<div class="input"><input type="text" name="link" id="link-perfil-'+id+'" value="http://" size=""/></div>'+
						'<label for="texto">Texto do link de referência:</label>'+
						'<div class="input"><input type="text" name="texto" id="texto-perfil-'+id+'" value="" size=""/></div>'+
					'</div>'+
					'<div class="imagem">'+
						'<label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px<br />Formatos: JPG, PNG e GIF<br />Tamanho: 1MB<br />Nomes sem acentos e caracteres especiais</span></label>'+
						'<form class="fileupload" action="../../assets/server/php/" method="POST" enctype="multipart/form-data">'+
							'<div class="quadro">'+
								'<img id="alvo-'+id+'" src="../../assets/img/backgrounds/imagem.png" name="imagem"/>'+
							'</div>'+
							'<span class="btn btn-success fileinput-button"><input id="file" type="file"/></span>'+
							'<a href="javascript:void(0);" class="excluir excluir-imagem"></a>'+
						'</form>'+
					'</div>'+
				'</div>'+
			'</div>');		
		/*bota o accordion no esquema*/
		$( "#accordion" ).accordion('destroy').sortable('destroy');		
		$( "#accordion" ).accordion({active:($('.header').length-1),header: "> div > .header",heightStyle: "content",collapsible: true}).sortable({axis: "y",handle: ".header",stop: function( event, ui ) {ui.item.children( ".header" ).triggerHandler( "focusout" );}});
		/*tem que resetar o fileupload e chamar de novo*/		
		$('.fileupload').bind('fileuploaddestroy');
		$('.fileupload').each(function (index) {
			$(this).fileupload({
				done: function (e, data) {
					var filess= data.files[0];
					var filenam = filess.name;					
					var chamaString = JSON.parse(data.result);
					console.log( chamaString.files[0].name );					
					
					$(this).find('#alvo-'+index).attr('src','../../assets/server/php/files/'+chamaString.files[0].name);
					$('img.carregando').remove();
				},
				progressall: function (e, data) {
					$('#alvo-'+index).parent().append('<img src="../../assets/img/ajax-loader.gif" alt="carregando..." class="carregando"> ');
				}
			});
		});
		$('.group').find('input[name="nome"]').focus(function(){
			if(this.value == 'Título'){
				this.value='';
			}
		});
		$('.group').find('input[name="nome"]').blur(function(){
			if(this.value == ''){
				this.value='Título';
			}
		});		
		/*scrolla pro fim da página*/
		$('.excluir-um').click(function(){ $(this).parents('.group').remove(); });
		$('html, body').animate({scrollTop:$(document).height()}, 1000);
		//Remove Imagens dos elementos
		$('.excluir-imagem').on('click', function(e){
			e.preventDefault();
			var box_img = $(this).siblings('.quadro');
			var imagem  = $(this).siblings('.quadro').find('img').attr('src');
			var img_id  = $(this).siblings('.quadro').find('img').attr('id');  
			$.ajax({
				url: '../../quiz/show_base_url',
				async: false,
				success: function(e){
					var base_url = e;
					if(imagem == base_url+'assets/img/backgrounds/imagem.png' || imagem == '../../assets/img/backgrounds/imagem.png'){
						alert('Não existe imagem para ser excluida');
					}else{
						$.ajax({
							url: base_url+'quiz/remove_image',
							data: {imagem:imagem},
							async: false,
							success: function(e){
								$(box_img).remove('img');
								$(box_img).html('<img id="'+img_id+'" src="../../assets/img/backgrounds/imagem.png">');
							}
						});
					}
				}
			});
		});
		//Chama contador de caracteres
		$('textarea[name="descricao"]').contadorDeCaracteres();
		return false;
	});
	
	//Perfil > perguntas e respostas
	/*botão nova resposta*/
	$(document).on('click','#nova-resposta-perfil',function(){
		//var count = $('.header').length;
		var count = $('.header').length - 1;
		var id = count++;
		var perfil = $('#id_quiz').val();
		//gera uma combinacao unica de numero para o novo select[name], assim não dá conflito
		//por exemplo, resposta-21, é o select do grupo 2(#sortable2) e o segundo select desse grupo
		var respostaNumero = $(this).parent().find('.sorteia').attr('id').slice(-1);
		var grupoNumero = $(this).parent().find(".header").length;
		var option = $('select[name="perfil-resposta"]').html();
		$('select[name=perfil-resposta]').removeData("dropkick");
		//$('#dk_container_perfil-resposta-'+id).remove();		
		$(this).parent().find('.sorteia').append('<div class="header novo"><span class="icon"></span><a href="" class="excluir excluir-dois"></a><div class="input"><input type="text" name="nome-resposta" id="nome-resposta-'+id+'" rel="'+id+'" value="" size=""/></div><select name="perfil-resposta" id="perfil-resposta-'+id+'" class="default">'+option+'</select></div>');
		//coloca o novo select no esquema
		$('select[name="perfil-resposta"]').dropkick();
		if($(this).parents('.group').hasClass('salvo')){
			$(this).parents('.group').removeClass('edit');
			$(this).parents('.group').addClass('edit');
		}
		$('.excluir-um').click(function(){ $(this).parents('.group').remove(); });
		$('.excluir-dois').click(function(){ $(this).parents('.header').remove(); return false;});  
		return false;
	});
	/*botão nova pergunta*/
	$(document).on('click','#nova-pergunta-perfil',function(){
		var count = $('.group').length;
		var id = count++;
		var id_resposta = $('.header').length;
		var option = $('#perfil-resposta-0').html();
		//gera uma combinacao unica de numero para o novo select[name], assim não dá conflito
		//por exemplo, resposta-21, é o select do grupo 2(#sortable2) e o segundo select desse grupo
		$("#accordion2").append(
			'<div class="group" id="'+id+'">'+
				'<div class="header">'+
					'<span class="icon"></span>'+
					'<div class="input"><input type="text" name="nome" id="nome-pergunta-'+id+'" value="Pergunta" size=""/></div>'+
					'<span class="arrow"></span>'+
					'<a href="#" class="excluir excluir-um"></a>'+
				'</div>'+
				'<div class="body">'+
					'<div id="perguntas">'+
						'<div class="texto">'+
							'<label for="link">Link de referência:</label>'+
							'<div class="input"><input type="text" name="link" id="link-pergunta-'+id+'" value="http://" size=""/></div>'+
							'<label for="texto">Texto do link de referência:</label>'+
							'<div class="input"><input type="text" name="texto" id="texto-pergunta-'+id+'" value="" size=""/></div>'+
						'</div>'+
						'<div class="imagem">'+
							'<label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px<br />Formatos: JPG, PNG e GIF<br />Tamanho: 1MB<br />Nomes sem acentos e caracteres especiais</span></label>'+
							'<form class="fileupload" action="../../assets/server/php/" method="POST" enctype="multipart/form-data">'+
								'<div class="quadro"><img id="alvo-pergunta-'+id+'" src="../../assets/img/backgrounds/imagem.png" name="imagem"/></div>'+
								'<span class="btn btn-success fileinput-button"><input id="file" type="file"/></span>'+
								'<a href="javascript:void(0);" class="excluir excluir-imagem"></a>'+
							'</form>'+
							'<input type="hidden" id="id-pergunta-'+id+'" name="id-pergunta" value="" />'+
						'</div>'+
					'</div>'+
					'<div id="respostas">'+
						'<div class="titulo-respostas">Respostas:</div>'+
						'<div id="sortable'+$(".sorteia").length+'" class="sorteia">'+
							'<div class="header">'+
								'<span class="icon"></span>'+
								'<a href="" class="excluir excluir-dois"></a>'+
								'<div class="input"><input type="text" name="nome-resposta" id="nome-resposta-'+$('.header').length+'" rel="'+$('.header').length+'" value="" size=""/></div>'+
								'<select name="perfil-resposta" id="perfil-resposta-'+id_resposta+'" class="default">'+option+'</select>'+
							'</div>'+
						'</div>'+
						'<a id="nova-resposta-perfil" class="nova-resposta" href="javascript:void(0)"></a>'+
					'</div>'+
				'</div>'+
			'</div>');
		//coloca o novo elemento de accordion no esquema
		$("#accordion2").accordion('destroy').sortable('destroy');
		//$('select[name=perfil-resposta]').removeData("dropkick");
		//$('#dk_container_perfil-resposta-'+id).remove();	
		$("#accordion2").accordion({active:$("#accordion2 .sorteia").length-1,header:"> div > .header",collapsible: true}).sortable({axis:"y",handle:".header",stop:function(event,ui){ui.item.children(".header").triggerHandler("focusout")}});
		//coloca o novo select no esquema
		$('select[name="perfil-resposta"]').dropkick();
		//calcula quantos sortables tem e carrega
		var length = $(".sorteia").length;
		for( i=0; i < length; i++){
			$("#sortable"+i).sortable();
		}
		/*tem que resetar o fileupload e chamar de novo*/		
		$('.fileupload').bind('fileuploaddestroy');
		$(".fileupload").each(function(){
			$(this).fileupload({
				done:function(e,data){
					var n=data.files[0];
					var r=n.name;
					
						var chamaString = JSON.parse(data.result);
						console.log( chamaString.files[0].name );					
					
					$(this).find("#alvo-pergunta-"+id).attr("src","../../assets/server/php/files/"+chamaString.files[0].name);
					$('img.carregando').remove();
				},
				progressall: function (e, data) {
					$("#alvo-pergunta-"+id).parent().append('<img src="../../assets/img/ajax-loader.gif" alt="carregando..." class="carregando"> ');
				}
			})
		});
		//scrolla pro fim da página
		$('html, body').animate({scrollTop:$(document).height()}, 1000);
		$('.excluir-um').click(function(){ $(this).parents('.group').remove(); });
		$('.excluir-dois').click(function(){ $(this).parents('.header').remove(); return false;});

		$('.group').find('input[name="nome"], input[name="nome-pergunta"]').focus(function(){
			if(this.value == 'Pergunta'){
				this.value='';
			}
		});
		$('.group').find('input[name="nome"], input[name="nome-pergunta"]').blur(function(){
			if(this.value == ''){
				this.value='Pergunta';
			}
		});
		//Remove Imagens dos elementos
		$('.excluir-imagem').on('click', function(e){
			e.preventDefault();
			var box_img = $(this).siblings('.quadro');
			var imagem  = $(this).siblings('.quadro').find('img').attr('src');
			var img_id  = $(this).siblings('.quadro').find('img').attr('id');  
			$.ajax({
				url: '../../quiz/show_base_url',
				async: false,
				success: function(e){
					var base_url = e;
					if(imagem == base_url+'assets/img/backgrounds/imagem.png' || imagem == '../../assets/img/backgrounds/imagem.png'){
						alert('Não existe imagem para ser excluida');
					}else{
						$.ajax({
							url: base_url+'quiz/remove_image',
							data: {imagem:imagem},
							async: false,
							success: function(e){
								$(box_img).remove('img');
								$(box_img).html('<img id="'+img_id+'" src="../../assets/img/backgrounds/imagem.png">');
							}
						});
					}
				}
			});
		});

		return false;
		
	});

	//Editor de Texto
	////Accordion Externo
	$('#perfilCustomizacao').accordion({ header: ".header" , icons: false , heightStyle:"content" , active:0, collapsible: true });
	////Accordion Interno
	$('.editor').accordion({ header: ".intro" , icons: false , heightStyle:"content" , active:0, collapsible: true });
	////Tamanho da fonte
	//////Perguntas
	$('#dk_container_titulo-tamanho a').click(function(){
		$('input[name="ititulo-tamanho"]').val('font-size:'+$(this).text()+';');
		$('input[name="ititulo-tamanho"]').attr('rel', $(this).text());
		$('#previewPerguntas #nome').css('font-size',$(this).text());
	});
	$('#dk_container_perguntas-tamanho a').click(function(){
		$('input[name="iperguntas-tamanho"]').val('font-size:'+$(this).text()+';');
		$('input[name="iperguntas-tamanho"]').attr('rel', $(this).text());
		$('#previewPerguntas .titulo').css('font-size',$(this).text());
	});
	$('#dk_container_referencia-tamanho a').click(function(){
		$('input[name="ireferencia-tamanho"]').val('font-size:'+$(this).text()+';');
		$('input[name="ireferencia-tamanho"]').attr('rel', $(this).text());
		$('#previewPerguntas .subtitulo a').css('font-size',$(this).text());
	});
	$('#dk_container_respostas-tamanho a').click(function(){
		$('input[name="irespostas-tamanho"]').val('font-size:'+$(this).text()+';');
		$('input[name="irespostas-tamanho"]').attr('rel', $(this).text());
		$('#previewPerguntas .respostas').css('font-size',$(this).text());
	});
	//////Resultados
	$('#dk_container_titulo-resultados-tamanho a').click(function(){
		$('input[name="ititulo-resultados-tamanho"]').val('font-size:'+$(this).text()+';');
		$('#previewResultados #nome').css('font-size',$(this).text());
	});
	$('#dk_container_perguntas-resultados-tamanho a').click(function(){
		$('input[name="iperguntas-resultados-tamanho"]').val('font-size:'+$(this).text()+';');
		$('#previewResultados .titulo').css('font-size',$(this).text());
	});
	$('#dk_container_acertos-tamanho a').click(function(){
		$('input[name="iacertos-tamanho"]').val('font-size:'+$(this).text()+';');
		$('#previewResultados .acertos').css('font-size',$(this).text());
	});
	$('#dk_container_descricao-tamanho a').click(function(){
		$('input[name="idescricao-tamanho"]').val('font-size:'+$(this).text()+';');
		$('#previewResultados .descricao').css('font-size',$(this).text());
	});
	$('#dk_container_referencia-resultados-tamanho a').click(function(){
		$('input[name="ireferencia-resultados-tamanho"]').val('font-size:'+$(this).text()+';');
		$('#previewResultados .saibaMais a').css('font-size',$(this).text());
	});
	////JPicker
	//////Perguntas
	$('#titulo-cor').jPicker({
		images:{clientPath: '../../assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#previewPerguntas #nome').css({color: all && '#' + all.hex || 'transparent'}); 
			$(this).css('background-color','transparent');
			}
	);
	$('#perguntas-cor').jPicker({
		images:{clientPath: '../../assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#previewPerguntas .titulo').css({color: all && '#' + all.hex || 'transparent'});
			$(this).css('background-color','transparent');
			}
	);
	$('#referencia-cor').jPicker({
		window:{ position:{ x: 'screenCenter' , y: ($(this).offset.top - $(window).scrollTop()) + $(this).height() } },
		images:{clientPath: '../../assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#previewPerguntas .subtitulo a').css({color: all && '#' + all.hex || 'transparent'});
			$(this).css('background-color','transparent');
			}
	);
	$('#botoes-cor').jPicker({
		window:{ position:{ x: 'screenCenter' , y: ($(this).offset.top - $(window).scrollTop()) + $(this).height() } },
		images:{clientPath: '../../assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#botoes a').css({color: all && '#' + all.hex || 'transparent'});
			$(this).css('background-color','transparent');
			}
	);
	$('#botoes-cor-fundo').jPicker({
		window:{ position:{ x: 'screenCenter' , y: ($(this).offset.top - $(window).scrollTop()) + $(this).height() } },
		images:{clientPath: '../../assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#botoes a').css({backgroundColor: all && '#' + all.hex || 'transparent'});
			$(this).css('background-color','transparent');
			}
	);
	$('#respostas-cor').jPicker({
		window:{ position:{ x: 'screenCenter' , y: ($(this).offset.top - $(window).scrollTop()) + $(this).height() } },
		images:{clientPath: '../../assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#previewPerguntas .respostas td').css({color: all && '#' + all.hex || 'transparent'});
			$(this).css('background-color','transparent');
			}
	);
	$('#respostas-cor-fundo').jPicker({
		window:{ position:{ x: 'screenCenter' , y: ($(this).offset.top - $(window).scrollTop()) + $(this).height() } },
		images:{clientPath: '../../assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#previewPerguntas .respostas td').css({backgroundColor: all && '#' + all.hex || 'transparent'});
			$(this).css('background-color','transparent');
			}
	);
	$('#imagem-cor-fundo').jPicker({
		window:{ position:{ x: 'screenCenter' , y: ($(this).offset.top - $(window).scrollTop()) + $(this).height() } },
		images:{clientPath: '../../assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#previewPerguntas').css({backgroundColor: all && '#' + all.hex || 'transparent'});
			$(this).css('background-color','transparent');
			}
	);
	//////Resultados
	$('#titulo-resultados-cor').jPicker({
		window:{ position:{ x: 'screenCenter' , y: ($(this).offset.top - $(window).scrollTop()) + $(this).height() } },
		images:{clientPath: '../../assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#previewResultados #nome').css({color: all && '#' + all.hex || 'transparent'});
			$(this).css('background-color','transparent');
			}
	);
	$('#perguntas-resultados-cor').jPicker({
		window:{ position:{ x: 'screenCenter' , y: ($(this).offset.top - $(window).scrollTop()) + $(this).height() } },
		images:{clientPath: '../../assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#previewResultados .titulo').css({color: all && '#' + all.hex || 'transparent'});
			$(this).css('background-color','transparent');
			}
	);
	$('#acertos-cor').jPicker({
		window:{ position:{ x: 'screenCenter' , y: ($(this).offset.top - $(window).scrollTop()) + $(this).height() } },
		images:{clientPath: '../../assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#previewResultados .acertos').css({color: all && '#' + all.hex || 'transparent'});
			$(this).css('background-color','transparent');
			}
	);
	$('#descricao-cor').jPicker({
		window:{ position:{ x: 'screenCenter' , y: ($(this).offset.top - $(window).scrollTop()) + $(this).height() } },
		images:{clientPath: '../../assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#previewResultados .descricao').css({color: all && '#' + all.hex || 'transparent'});
			$(this).css('background-color','transparent');
			}
	);
	$('#referencia-resultados-cor').jPicker({
		window:{ position:{ x: 'screenCenter' , y: ($(this).offset.top - $(window).scrollTop()) + $(this).height() } },
		images:{clientPath: '../../assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#previewResultados .saibaMais a').css({color: all && '#' + all.hex || 'transparent'});
			$(this).css('background-color','transparent');
			}
	);
	$('#botoes-resultados-cor').jPicker({
		window:{ position:{ x: 'screenCenter' , y: ($(this).offset.top - $(window).scrollTop()) + $(this).height() } },
		images:{clientPath: '../../assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#botoesResultado a').css({color: all && '#' + all.hex || 'transparent'});
			$(this).css('background-color','transparent');
			}
	);
	$('#botoes-resultados-cor-fundo').jPicker({
		window:{ position:{ x: 'screenCenter' , y: ($(this).offset.top - $(window).scrollTop()) + $(this).height() } },
		images:{clientPath: '../../assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#botoesResultado a').css({backgroundColor: all && '#' + all.hex || 'transparent'});
			$(this).css('background-color','transparent');
			}
	);
	$('#imagem-resultados-cor-fundo').jPicker({
		window:{ position:{ x: 'screenCenter' , y: ($(this).offset.top - $(window).scrollTop()) + $(this).height() } },
		images:{clientPath: '../../assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#previewResultados').css({backgroundColor: all && '#' + all.hex || 'transparent'});
			$(this).css('background-color','transparent');
			}
	);
	////Alinhamento
	//////Perguntas
	$('.titulo-alinhamento div').click(function(){
		$(this).siblings().removeClass('ativo');
		$(this).addClass('ativo');
		$('input[name="ititulo-alinhamento"]').val('text-align:'+this.id+';');
		$('#previewPerguntas #nome').css('text-align',this.id);
	});
	$('.perguntas-alinhamento div').click(function(){
		$(this).siblings().removeClass('ativo');
		$(this).addClass('ativo');
		$('input[name="iperguntas-alinhamento"]').val('text-align:'+this.id+';');
		$('#previewPerguntas .titulo').css('text-align',this.id);
	});
	$('.referencia-alinhamento div').click(function(){
		$(this).siblings().removeClass('ativo');
		$(this).addClass('ativo');
		$('input[name="ireferencia-alinhamento"]').val('text-align:'+this.id+';');
		$('#previewPerguntas .subtitulo').css('text-align',this.id);
	});
	$('.respostas-alinhamento div').click(function(){
		$(this).siblings().removeClass('ativo');
		$(this).addClass('ativo');
		switch(this.id){
			case 'left':
				$('#previewPerguntas .respostas').css('margin-left',0);
			break;
			case 'center':
				$('#previewPerguntas .respostas').css('margin', '19px auto');
			break;
			case 'right':
				$('#previewPerguntas .respostas').css('margin-right', 0);
			break;
			case 'justify':
				$('#previewPerguntas .respostas').css('margin-left',0);
				$('#previewPerguntas .respostas td').css('text-align', this.id);
			break;				
		}
		$('input[name="irespostas-alinhamento"]').val('text-align:'+this.id+';');
		
	});
	//Posicinamento do Backgound das Perguntas
	$('input:radio[name="repete-imagem-perguntas"]').change(function(){
		$('#previewPerguntas').css('background-repeat', this.value);
		console.log(this.value);
	});
	$('input:radio[name="alinhaH-imagem-perguntas"]').change(function(){
		$('#previewPerguntas').css('background-position-x', this.value);
		console.log(this.value);
	});
	$('input:radio[name="alinhaV-imagem-perguntas"]').change(function(){
		$('#previewPerguntas').css('background-position-y', this.value);
		console.log(this.value);
	});
	//////Resultados
	$('.titulo-resultados-alinhamento div').click(function(){
		$(this).siblings().removeClass('ativo');
		$(this).addClass('ativo');
		$('input[name="ititulo-resultados-alinhamento"]').val('text-align:'+this.id+';');
		$('#previewResultados #nome').css('text-align',this.id);
	});
	$('.perguntas-resultados-alinhamento div').click(function(){
		$(this).siblings().removeClass('ativo');
		$(this).addClass('ativo');
		$('input[name="iperguntas-resultados-alinhamento"]').val('text-align:'+this.id+';');
		$('#previewResultados .titulo').css('text-align',this.id);
	});
	$('.acertos-alinhamento div').click(function(){
		$(this).siblings().removeClass('ativo');
		$(this).addClass('ativo');
		$('input[name="iacertos-alinhamento"]').val('text-align:'+this.id+';');
		$('#previewResultados .acertos').css('text-align',this.id);
	});
	$('.descricao-alinhamento div').click(function(){
		$(this).siblings().removeClass('ativo');
		$(this).addClass('ativo');
		$('input[name="idescricao-alinhamento"]').val('text-align:'+this.id+';');
		$('#previewResultados .descricao').css('text-align',this.id);
	});
	$('.referencia-resultados-alinhamento div').click(function(){
		$(this).siblings().removeClass('ativo');
		$(this).addClass('ativo');
		$('input[name="ireferencia-resultados-alinhamento"]').val('text-align:'+this.id+';');
		$('#previewResultados .saibaMais').css('text-align',this.id);
	});
	//Configuração de alinhamento de imagem de fundo perguntas
	$('input:radio[name="repete-imagem-perguntas"]').change(function(){
		$('#previewPerguntas').css('background-repeat', this.value);
		console.log(this.value);
	});

	$('input:radio[name="alinhaH-imagem-perguntas"]').change(function(){
		$('#previewPerguntas').css('background-position-x', this.value);
		console.log(this.value);
	});

	$('input:radio[name="alinhaV-imagem-perguntas"]').change(function(){
		$('#previewPerguntas').css('background-position-y', this.value);
		console.log(this.value);
	});
	//Configuração de alinhamento de imagem de fundo Resultados
	$('input:radio[name="repete-imagem"]').change(function(){
		$('#previewResultados').css('background-repeat', this.value);
		console.log(this.value);
	});
	
	$('input:radio[name="alinhaH-imagem"]').change(function(){
		$('#previewResultados').css('background-position-x', this.value);
		console.log(this.value);
	});
	$('input:radio[name="alinhaV-imagem"]').change(function(){
		$('#previewResultados').css('background-position-y', this.value);
		console.log(this.value);
	});	

	//Gerador de Código
	var code = $("textarea#quizCode").val();
	$('textarea#codigo').val($.trim(code));
	
	$(".copiarCodigo").zclip({
		path: "../../assets/js/ZeroClipboard.swf",
		copy:$('textarea#codigo').val(),
		afterCopy:function(){
			alert('Copiado para a área de transferência!');
		}
	});
	
	//Certo ou Errado > perguntas e respostas
	/*radiobutton, vê quantos tem na página e gera por id dinamicamente*/
    var ids = $.map($('input[type="radio"]'), function(elt) {
		//$( "#"+elt.id ).button();
	});
	
	/*botão nova pergunta*/
	$(document).on('click','#nova-pergunta-certo',function(){
			$.ajax({
				url: '../../quiz/show_base_url',
				async: false,
				success: function(e){
					var base_url = e;
					var count = $('.group').length;
					var id = count++;
					var id_resposta = $('.header').length;
					var tamanho = $(".sorteia").length;

					//gera uma combinacao unica de numero para o novo select[name], assim não dá conflito
					//por exemplo, resposta-21, é o select do grupo 2(#sortable2) e o segundo select desse grupo
					$("#accordion2").append(
						'<div class="group">'+
							'<div class="header">'+
								'<span class="icon"></span>'+
								'<div class="input"><input type="text" name="nome" id="nome-pergunta-'+id+'" value="Pergunta" size=""/></div>'+
								'<span class="arrow"></span>'+
								'<a class="excluir excluir-um"></a>'+
							'</div>'+
							'<div class="body">'+
								'<div id="perguntas">'+
									'<div class="texto">'+
										'<label for="link">Link de referência:</label>'+
										'<div class="input"><input type="text" name="link" id="link-pergunta-'+id+'" value="http://" size=""/></div>'+
										'<label for="texto">Texto do link de referência:</label>'+
										'<div class="input"><input type="text" name="texto" id="texto-pergunta-'+id+'" value="" size=""/></div>'+
									'</div>'+
									'<div class="imagem">'+
										'<label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px<br />Formatos: JPG, PNG e GIF<br />Tamanho: 1MB<br />Nomes sem acentos e caracteres especiais</span></label>'+
										'<form class="fileupload" action="'+base_url+'assets/server/php/" method="POST" enctype="multipart/form-data">'+
											'<div class="quadro"><img id="alvo-pergunta-'+id+'" src="'+base_url+'assets/img/backgrounds/imagem.png" name="imagem" id="alvo-pergunta-'+id+'"/></div>'+
											'<span class="btn btn-success fileinput-button"><input id="file" type="file"/></span>'+
											'<a href="javascript:void(0);" class="excluir excluir-imagem"></a>'+
										'</form>'+
									'</div>'+
								'</div>'+
								'<div id="respostas">'+
									'<div class="titulo-respostas">Respostas:</div>'+
									'<div id="sortable'+tamanho+'" class="sorteia">'+
										'<div class="header">'+
											'<span class="icon"></span>'+
											'<a class="excluir excluir-dois"></a>'+
											'<div class="input"><input type="text" name="nome-resposta" id="" value="" size=""/></div>'+
											'<div class="radio">'+
												'<!--<label for="radio'+(tamanho+1)+tamanho+'" class="radioCustom"></label>-->'+
												'<input type="radio" id="radio'+(tamanho+1)+tamanho+'" value="0" name="grupo'+tamanho+'"/>Esta é a resposta correta'+
											'</div>'+
										'</div>'+
										'<div class="header">'+
											'<span class="icon"></span>'+
											'<a class="excluir excluir-dois"></a>'+
											'<div class="input"><input type="text" name="nome-resposta" value="" size=""/></div>'+
											'<div class="radio">'+
												'<!--<label for="radio'+(tamanho+2)+tamanho+'" class="radioCustom"></label>-->'+
												'<input type="radio" id="radio'+(tamanho+2)+tamanho+'" value="" name="grupo'+tamanho+'"/>Esta é a resposta correta'+
											'</div>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>'+
						'</div>');
					//coloca o novo elemento de accordion no esquema
					$("#accordion2").accordion('destroy').sortable('destroy');
					$("#accordion2").accordion({active:$("#accordion2 .sorteia").length-1,header:"> div > .header",collapsible: true}).sortable({axis:"y",handle:".header",stop:function(event,ui){ui.item.children(".header").triggerHandler("focusout")}});
					//coloca o novo radio no esquema
					//$( "#radio"+(tamanho+1)+tamanho ).button();
					//$( "#radio"+(tamanho+2)+tamanho ).button();
					//calcula quantos sortables tem e carrega
					var length = $(".sorteia").length;
					for( i=0; i < length; i++){
						$("#sortable"+i).sortable();
					}
					/*tem que resetar o fileupload e chamar de novo*/		
					$('.fileupload').bind('fileuploaddestroy');
					$(".fileupload").each(function(){
						$(this).fileupload({
							done:function(e,data){
								var n=data.files[0];
								var r=n.name;
								
								var chamaString = JSON.parse(data.result);
								console.log( chamaString.files[0].name );								
								
								$(this).find("#alvo-pergunta-"+id).attr("src","../../assets/server/php/files/"+chamaString.files[0].name);
								$('img.carregando').remove();
							},
							progressall: function (e, data) {
								$("#alvo-pergunta-"+id).parent().append('<img src="../../assets/img/ajax-loader.gif" alt="carregando..." class="carregando"> ');
							}
						})
					});
					//Atribui valor 10 ao value checado
					$('input:radio').on('click', function(){
						$('input:radio').val(0)
						$('input:radio:checked').val('10');
					});
					//scrolla pro fim da página
					$('html, body').animate({scrollTop:$(document).height()}, 1000);

					$('.group').find('input[name="nome"], input[name="nome-pergunta"]').focus(function(){
						if(this.value == 'Pergunta'){
							this.value='';
						}
					});
					$('.group').find('input[name="nome"], input[name="nome-pergunta"]').blur(function(){
						if(this.value == ''){
							this.value='Pergunta';
						}
					});

					$('.excluir-um').click(function(){ $(this).parents('.group').remove(); });
					$('.excluir-dois').click(function(){ $(this).parents('.header').remove(); return false;});

					//Remove Imagens dos elementos
					$('.excluir-imagem').on('click', function(e){
						e.preventDefault();
						var box_img = $(this).siblings('.quadro');
						var imagem  = $(this).siblings('.quadro').find('img').attr('src');
						var img_id  = $(this).siblings('.quadro').find('img').attr('id');  
						$.ajax({
							url: '../../quiz/show_base_url',
							async: false,
							success: function(e){
								var base_url = e;
								if(imagem == base_url+'assets/img/backgrounds/imagem.png' || imagem == '../../assets/img/backgrounds/imagem.png'){
									alert('Não existe imagem para ser excluida');
								}else{
									$.ajax({
										url: base_url+'quiz/remove_image',
										data: {imagem:imagem},
										async: false,
										success: function(e){
											$(box_img).remove('img');
											$(box_img).html('<img id="'+img_id+'" src="../../assets/img/backgrounds/imagem.png">');
										}
									});
								}
							}
						});
					});
					return false;
				}
			})
			
		});
	//Certo ou Errado > faixas de classificacao
	/*calcula quantos sliders tem e imprime*/
	var tipo_quiz_slider = $('#tipo_quiz').val();
	var id_quiz_slider	 = $('#id_quiz').val();
	$.ajax({
		url: '../../perguntas/qtd_perguntas',
		async: false,
		data: {tipo:tipo_quiz_slider, id:id_quiz_slider},
		success: function(data){
			var calculaSlider = $('.header').length;	
			for(i=0 ; i<calculaSlider ; i++){
				$( "#slider"+calculaSlider ).slider({
						range: true,
						min: 0,
						max: data/10,
						step: 1,
						values: [ 0, 1 ],
						slide: function( event, ui ) {
							$( ".amountIni"+calculaSlider ).val( ui.values[ 0 ]);
							$( ".amountFin"+calculaSlider ).val( ui.values[ 1 ]);
						}
					});
				 $( ".amountIni"+calculaSlider ).val( $( "#slider"+calculaSlider ).slider( "values", 0 ));
				 $( ".amountFin"+calculaSlider ).val( $( "#slider"+calculaSlider ).slider( "values", 1 ));
			 }
		}
	});
	 /*botao faixas de classificacao*/
	$("#novaFaixa").click(function(){
		$.ajax({
			url: '../../quiz/show_base_url',
			async: false,
			success: function(e){
				var base_url =  e;
				var tamanho = $('.header').length;
				$('#accordion').append(
					'<div class="group">'+
						'<div class="header">'+
							'<span class="icon"></span>'+
							'<div class="input"><input type="text" name="nome" value="Título" size=""/></div>'+
							'<span class="arrow"></span>'+
							'<span class="excluir excluir-um"></span>'+
						'</div>'+
						'<div class="body">'+
							'<div class="textoDoSlider">Considere a quantidade de respostas corretas.</div>'+
							'<div class="sliderHolder">'+
								'<input type="text" id="amountIni" class="amountIni'+(tamanho+1)+'" readonly/>'+
								'<input type="text" id="amountFin" class="amountFin'+(tamanho+1)+'" readonly/>'+
								'<div id="slider'+(tamanho+1)+'"></div>'+
							'</div>'+
							'<div class="texto">'+
								'<label for="descricao">Descrição <div class="limite">Limite de caracteres:<span id="campospan" title="500">500</span></div></label>'+
								'<div class="textarea">'+
									'<textarea name="descricao" cols="" rows=""></textarea>'+
								'</div>'+
								'<label for="link">Link de referência:</label>'+
								'<div class="input"><input type="text" name="link" value="http://" size=""/></div>'+
								'<label for="texto">Texto do link de referência:</label>'+
								'<div class="input"><input type="text" name="texto" value="" size=""/></div>'+
							'</div>'+
							'<div class="imagem">'+
								'<label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px<br />Formatos: JPG, PNG e GIF<br />Tamanho: 1MB<br />Nomes sem acentos e caracteres especiais</span></label>'+
								'<form class="fileupload" action="'+base_url+'assets/server/php/" method="POST" enctype="multipart/form-data">'+
									'<div class="quadro"><img id="alvo" src="'+base_url+'assets/img/backgrounds/imagem.png" name="imagem"/></div>'+
									'<span class="btn btn-success fileinput-button"><input id="file" type="file"/></span>'+
									'<a href="javascript:void(0);" class="excluir excluir-imagem"></a>'+
								'</form>'+
							'</div>'+
						'</div>'+
					'</div>');
				/*novo slider*/
				var tipo_quiz_slider = $('#tipo_quiz').val();
				var id_quiz_slider	 = $('#id_quiz').val();
				$.ajax({
					url: '../../perguntas/qtd_perguntas',
					async: false,
					data: {tipo:tipo_quiz_slider, id:id_quiz_slider},
					success: function(data){
						$( "#slider"+(tamanho+1) ).slider({
									range: true,
									min: 0,
									max: data/10,
									step: 1,
									values: [ 0, 1 ],
									slide: function( event, ui ) {
										$( ".amountIni"+(tamanho+1) ).val( ui.values[ 0 ]);
										$( ".amountFin"+(tamanho+1) ).val( ui.values[ 1 ]);
									}
								});
						 $( ".amountIni"+(tamanho+1) ).val( $( "#slider"+(tamanho+1) ).slider( "values", 0 ));
						 $( ".amountFin"+(tamanho+1) ).val( $( "#slider"+(tamanho+1) ).slider( "values", 1 ));
					}
				});		 
				 
				//coloca o novo elemento de accordion no esquema
				$( "#accordion" ).accordion('destroy');
				$( "#accordion" ).accordion({
					active: tamanho,
					header: "> div > .header",
					collapsible: true
				});
				/*tem que resetar o fileupload e chamar de novo*/		
					$('.fileupload').bind('fileuploaddestroy');
					$(".fileupload").each(function(){
						$(this).fileupload({
							done:function(e,data){
								var n=data.files[0];
								var r=n.name;
								
								var chamaString = JSON.parse(data.result);
								console.log( chamaString.files[0].name );								
								
								$(this).find("#alvo").attr("src",""+base_url+"assets/server/php/files/"+chamaString.files[0].name);
								$('img.carregando').remove();
							},
							progressall: function (e, data) {
								$("#alvo").parent().append('<img src="../../assets/img/ajax-loader.gif" alt="carregando..." class="carregando"> ');
							}
						})
					})
				//scrolla pro fim da página
				$('html, body').animate({scrollTop:$(document).height()}, 1000);
				
				$('.excluir-um').click(function(){ $(this).parents('.group').remove(); });
				$('.excluir-dois').click(function(){ $(this).parents('.header').remove(); return false;});
				
				$('.group').find('input[name="nome"], input[name="nome-pergunta"]').focus(function(){
					if(this.value == 'Título'){
						this.value='';
					}
				});
				$('.group').find('input[name="nome"], input[name="nome-pergunta"]').blur(function(){
					if(this.value == ''){
						this.value='Título';
					}
				});
				//Remove Imagens dos elementos
				$('.excluir-imagem').on('click', function(e){
					e.preventDefault();
					var box_img = $(this).siblings('.quadro');
					var imagem  = $(this).siblings('.quadro').find('img').attr('src');
					var img_id  = $(this).siblings('.quadro').find('img').attr('id');  
					$.ajax({
						url: '../../quiz/show_base_url',
						async: false,
						success: function(e){
							var base_url = e;
							if(imagem == base_url+'assets/img/backgrounds/imagem.png' || imagem == '../../assets/img/backgrounds/imagem.png'){
								alert('Não existe imagem para ser excluida');
							}else{
								$.ajax({
									url: base_url+'quiz/remove_image',
									data: {imagem:imagem},
									async: false,
									success: function(e){
										$(box_img).remove('img');
										$(box_img).html('<img id="'+img_id+'" src="../../assets/img/backgrounds/imagem.png">');
									}
								});
							}
						}
					});
				});
				$(function(){
					$('#accordion .header input[name="nome"], #accordion .header .input input[name="nome"], #accordion2 .header input[name="nome"], #accordion2 .header input[name="nome-pergunta"]').click(function(e){
						//$(this).parents('.header').next('.body').slideDown();
						e.stopPropagation();
					});
				});
				return false;
			}
		});
		//Chama contador de caracteres
		$('textarea[name="descricao"]').contadorDeCaracteres();	
	});
	
	//Resposta Certa > perguntas e respostas
	/*botão nova resposta*/
	$(document).on('click','#nova-resposta-respostaCerta',function(){
		//gera uma combinacao unica de numero para o novo select[name], assim não dá conflito
		//por exemplo, resposta-21, é o select do grupo 2(#sortable2) e o segundo select desse grupo
		var respostaNumero = $(this).parent().find('.sorteia').attr('id').slice(-1);
		var grupoNumero = $(this).parent().find(".header").length;
		$(this).parent().find('.sorteia').append('<div class="header novo"><span class="icon"></span><a class="excluir excluir-dois"></a><div class="input"><input type="text" name="nome-resposta" value="" size=""/></div><div class="radio"><input type="radio" id="radio'+grupoNumero+respostaNumero+'" value="'+grupoNumero+'" name="grupo'+respostaNumero+'"/> Esta é a resposta correta</div></div>');
		//coloca o novo radio no esquema
		//$( "#radio"+grupoNumero+respostaNumero ).button();
		$(this).parents('.group').removeClass('edit');
		$(this).parents('.group').addClass('edit');
		$('.excluir-um').click(function(){ $(this).parents('.group').remove(); });
		$('.excluir-dois').click(function(){ $(this).parents('.header').remove(); });
		$('input:radio').on('click', function(){
			$('input:radio').val(0)
			$('input:radio:checked').val('10');
		});  
		return false;
	});
	/*botão nova pergunta*/
	$(document).on('click','#nova-pergunta-respostaCerta',function(){
		$.ajax({
				url: '../../quiz/show_base_url',
				async: false,
				success: function(e){
					var base_url = e;
					var count = $('.group').length;
					var id = count++;
					var id_resposta = $('.header').length;
					var tamanho = $(".sorteia").length;
					//gera uma combinacao unica de numero para o novo select[name], assim não dá conflito
					//por exemplo, resposta-21, é o select do grupo 2(#sortable2) e o segundo select desse grupo
					var grupoNumero = $('.group').last().find(".header").length;
					$("#accordion2").append(
						'<div class="group">'+
							'<div class="header">'+
								'<span class="icon"></span>'+
								'<div class="input"><input type="text" name="nome" id="nome-pergunta-'+id+'" value="Pergunta" size=""/></div>'+
								'<span class="arrow"></span>'+
								'<a class="excluir excluir-um"></a>'+
							'</div>'+
							'<div class="body">'+
								'<div id="perguntas">'+
									'<div class="texto">'+
										'<label for="link">Link de referência:</label>'+
										'<div class="input"><input type="text" name="link" id="link-pergunta-'+id+'" value="http://" size=""/></div>'+
										'<label for="texto">Texto do link de referência:</label>'+
										'<div class="input"><input type="text" name="texto" id="texto-pergunta-'+id+'" value="" size=""/></div>'+
									'</div>'+
									'<div class="imagem">'+
										'<label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px<br />Formatos: JPG, PNG e GIF<br />Tamanho: 1MB<br />Nomes sem acentos e caracteres especiais</span></label>'+
										'<form class="fileupload" action="'+base_url+'assets/server/php/" method="POST" enctype="multipart/form-data">'+
											'<div class="quadro"><img id="alvo-pergunta-'+id+'" src="'+base_url+'assets/img/backgrounds/imagem.png" name="imagem"/></div>'+
											'<span class="btn btn-success fileinput-button"><input id="file" type="file"/></span>'+
											'<a href="javascript:void(0);" class="excluir excluir-imagem"></a>'+
										'</form>'+
									'</div>'+
								'</div>'+
								'<div id="respostas">'+
									'<div class="titulo-respostas">Respostas:</div><div id="sortable'+$(".sorteia").length+'" class="sorteia">'+
										'<div class="header">'+
											'<span class="icon"></span>'+
											'<a class="excluir excluir-dois"></a>'+
											'<div class="input"><input type="text" name="nome-resposta" value="" size=""/></div>'+
											'<div class="radio"><input type="radio" id="radio0'+$(".sorteia").length+'" value="0" name="grupo'+$(".sorteia").length+'"/> Esta é a resposta correta</div>'+
										'</div>'+
									'</div>'+
									'<a id="nova-resposta-respostaCerta" class="nova-resposta" href="javascript:void(0)"></a>'+
								'</div>'+
							'</div>'+
						'</div>');
					//coloca o novo elemento de accordion no esquema
					$("#accordion2").accordion('destroy').sortable('destroy');
					$("#accordion2").accordion({active:$("#accordion2 .sorteia").length-1,header:"> div > .header",collapsible: true}).sortable({axis:"y",handle:".header",stop:function(event,ui){ui.item.children(".header").triggerHandler("focusout")}});
					//coloca o novo radio no esquema
					//$( "#radio0"+($(".sorteia").length-1) ).button();
						//calcula quantos sortables tem e carrega
						var length = $(".sorteia").length;
						for( i=0; i < length; i++){
							$("#sortable"+i).sortable();
						}
					/*tem que resetar o fileupload e chamar de novo*/		
						$('.fileupload').bind('fileuploaddestroy');
						$(".fileupload").each(function(index){
							$(this).fileupload({
								done:function(e,data){
									var n=data.files[0];
									var r=n.name;
									
									var chamaString = JSON.parse(data.result);
									console.log( chamaString.files[0].name );									
									
									$(this).find("#alvo-pergunta-"+index).attr("src","../../assets/server/php/files/"+chamaString.files[0].name);
									$('img.carregando').remove();
								},
								progressall: function (e, data) {
									$("#alvo-pergunta-"+index).parent().append('<img src="../../assets/img/ajax-loader.gif" alt="carregando..." class="carregando"> ');
								}
							})
						})
					$('.group').find('input[name="nome"], input[name="nome-pergunta"]').focus(function(){
					if(this.value == 'Pergunta'){
						this.value='';
					}
					});
					$('.group').find('input[name="nome"], input[name="nome-pergunta"]').blur(function(){
						if(this.value == ''){
							this.value='Pergunta';
						}
					});	
					//scrolla pro fim da página
					$('html, body').animate({scrollTop:$(document).height()}, 1000);
					$('.excluir-um').click(function(){ $(this).parents('.group').remove(); });
					$('.excluir-dois').click(function(){ $(this).parents('.header').remove(); });
					//Remove Imagens dos elementos
					$('.excluir-imagem').on('click', function(e){
						e.preventDefault();
						var box_img = $(this).siblings('.quadro');
						var imagem  = $(this).siblings('.quadro').find('img').attr('src');
						var img_id  = $(this).siblings('.quadro').find('img').attr('id');  
						$.ajax({
							url: '../../quiz/show_base_url',
							async: false,
							success: function(e){
								var base_url = e;
								if(imagem == base_url+'assets/img/backgrounds/imagem.png' || imagem == '../../assets/img/backgrounds/imagem.png'){
									alert('Não existe imagem para ser excluida');
								}else{
									$.ajax({
										url: base_url+'quiz/remove_image',
										data: {imagem:imagem},
										async: false,
										success: function(e){
											$(box_img).remove('img');
											$(box_img).html('<img id="'+img_id+'" src="../../assets/img/backgrounds/imagem.png">');
										}
									});
								}
							}
						});
					});
					return false;
				}
		});		
	});
	
	//Varias Respostas > perguntas e respostas
	//$( "#checkbox00,#checkbox10,#checkbox01" ).button();
	/*checkbox, vê quantos tem na página e gera por id dinamicamente
    var ids = $.map($('input[type="checkbox"]'), function(elt) {
		$( "#"+elt.id ).button();
	});*/
	/*botao nova resposta*/
	$(document).on('click','#nova-resposta-variasRespostas',function(){
		//gera uma combinacao unica de numero para o novo select[name], assim não dá conflito
		//por exemplo, resposta-21, é o select do grupo 2(#sortable2) e o segundo select desse grupo
		var respostaNumero = $(this).parent().find('.sorteia').attr('id').slice(-1);
		var grupoNumero = $(this).parent().find(".header").length;
		$(this).parent().find('.sorteia').append('<div class="header novo"><span class="icon"></span><a class="excluir excluir-dois"></a><div class="input"><input type="text" name="nome-resposta" value="" size=""/></div><div class="checkbox"><input type="checkbox" id="checkbox'+grupoNumero+respostaNumero+'" value="0" name="grupo'+respostaNumero+'"/> Esta é a resposta correta</div></div>');
		//coloca o novo checkbox no esquema
		//$( "#checkbox"+grupoNumero+respostaNumero ).button();
		$(this).parents('.group').removeClass('edit');
		$(this).parents('.group').addClass('edit');
		$('.group').each(function(index){
			$(this).find('input:checkbox').on('click', function(){
				$('input:checkbox').val(0)
				$('input:checkbox:checked').val('10');
			});
		});

		return false;
	});
	/*botao nova pergunta*/
	$(document).on('click','#nova-pergunta-variasRespostas',function(){
		$.ajax({
				url: '../../quiz/show_base_url',
				async: false,
				success: function(e){
					var base_url = e;
					var count = $('.group').length;
					var id = count++;
					var id_resposta = $('.header').length;
					var tamanho = $(".sorteia").length;
					//gera uma combinacao unica de numero para o novo select[name], assim não dá conflito
					//por exemplo, resposta-21, é o select do grupo 2(#sortable2) e o segundo select desse grupo
					var grupoNumero = $('.group').last().find(".header").length;
					$("#accordion2").append(
						'<div class="group">'+
							'<div class="header">'+
								'<span class="icon"></span>'+
								'<div class="input"><input type="text" name="nome-pergunta" id="nome-pergunta-'+id+'" value="Pergunta" size=""/></div>'+
								'<span class="arrow"></span>'+
								'<a class="excluir excluir-um"></a>'+
							'</div>'+
							'<div class="body">'+
								'<div id="perguntas">'+
									'<div class="texto">'+
										'<label for="link">Link de referência:</label>'+
										'<div class="input"><input type="text" name="link-pergunta" id="link-pergunta-'+id+'" value="http://" size=""/></div>'+
										'<label for="texto">Texto do link de referência:</label>'+
										'<div class="input"><input type="text" name="texto-pergunta" id="texto-pergunta-'+id+'" value="" size=""/></div>'+
									'</div>'+
									'<div class="imagem">'+
										'<label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px<br />Formatos: JPG, PNG e GIF<br />Tamanho: 1MB<br />Nomes sem acentos e caracteres especiais</span></label>'+
										'<form class="fileupload" action="'+base_url+'assets/server/php/" method="POST" enctype="multipart/form-data">'+
											'<div class="quadro"><img id="alvo-pergunta-'+id+'" src="'+base_url+'assets/img/backgrounds/imagem.png" name="imagem"/></div>'+
											'<span class="btn btn-success fileinput-button"><input id="file" type="file"/></span>'+
											'<a href="javascript:void(0);" class="excluir excluir-imagem"></a>'+
										'</form>'+
									'</div>'+
								'</div>'+
								'<div id="respostas">'+
									'<div class="titulo-respostas">Respostas:</div>'+
									'<div id="sortable'+$(".sorteia").length+'" class="sorteia">'+
										'<div class="header">'+
											'<span class="icon"></span>'+
											'<a class="excluir excluir-dois"></a>'+
											'<div class="input"><input type="text" name="nome-resposta" value="" size=""/></div>'+
											'<div class="checkbox">'+
												'<input type="checkbox" id="checkbox0'+$(".sorteia").length+'" value="0" name="grupo'+$(".sorteia").length+'"/> Esta é a resposta correta'+
											'</div>'+
										'</div>'+
									'</div>'+
									'<a id="nova-resposta-variasRespostas" class="nova-resposta" href="javascript:void(0)"></a>'+
								'</div>'+
							'</div>'+
						'</div>');
					//coloca o novo elemento de accordion no esquema
					$("#accordion2").accordion('destroy').sortable('destroy');
					$("#accordion2").accordion({active:$("#accordion2 .sorteia").length-1,header:"> div > .header",collapsible: true}).sortable({axis:"y",handle:".header",stop:function(event,ui){ui.item.children(".header").triggerHandler("focusout")}});
					//coloca o novo checkbox no esquema
					//$( "#checkbox0"+($(".sorteia").length-1) ).button();
					//calcula quantos sortables tem e carrega
					var length = $(".sorteia").length;
					for( i=0; i < length; i++){
						$("#sortable"+i).sortable();
					}
					/*tem que resetar o fileupload e chamar de novo*/		
						$('.fileupload').bind('fileuploaddestroy');
						$(".fileupload").each(function(){
							$(this).fileupload({
								done:function(e,data){
									var n=data.files[0];
									var r=n.name;
									
									var chamaString = JSON.parse(data.result);
									console.log( chamaString.files[0].name );									
									
									$(this).find("#alvo-pergunta-"+id).attr("src",base_url+"assets/server/php/files/"+chamaString.files[0].name);
									$('img.carregando').remove();
								},
								progressall: function (e, data) {
									$("#alvo-pergunta-"+id).parent().append('<img src="../../assets/img/ajax-loader.gif" alt="carregando..." class="carregando"> ');
								}
							})
						})
					//scrolla pro fim da página
					$('html, body').animate({scrollTop:$(document).height()}, 1000);
					$('.excluir-um').click(function(){ $(this).parents('.group').remove(); });
					$('.excluir-dois').click(function(){ $(this).parents('.header').remove(); return false;});
					$('.group').each(function(index){
						$(this).find('input:checkbox').on('click', function(){
							$('input:checkbox').val(0)
							$('input:checkbox:checked').val('10');
						});
					});

					$('.group').find('input[name="nome"], input[name="nome-pergunta"]').focus(function(){
						if(this.value == 'Pergunta'){
							this.value='';
						}
					});
					$('.group').find('input[name="nome"], input[name="nome-pergunta"]').blur(function(){
						if(this.value == ''){
							this.value='Pergunta';
						}
					});
					//Remove Imagens dos elementos
					$('.excluir-imagem').on('click', function(e){
						e.preventDefault();
						var box_img = $(this).siblings('.quadro');
						var imagem  = $(this).siblings('.quadro').find('img').attr('src');
						var img_id  = $(this).siblings('.quadro').find('img').attr('id');  
						$.ajax({
							url: '../../quiz/show_base_url',
							async: false,
							success: function(e){
								var base_url = e;
								if(imagem == base_url+'assets/img/backgrounds/imagem.png' || imagem == '../../assets/img/backgrounds/imagem.png'){
									alert('Não existe imagem para ser excluida');
								}else{
									$.ajax({
										url: base_url+'quiz/remove_image',
										data: {imagem:imagem},
										async: false,
										success: function(e){
											$(box_img).remove('img');
											$(box_img).html('<img id="'+img_id+'" src="../../assets/img/backgrounds/imagem.png">');
										}
									});
								}
							}
						});
					});
					return false;
				}
		});		
	});
	/*botao nova resposta*/
	$(document).on('click','#nova-resposta-enquete',function(){
		//gera uma combinacao unica de numero para o novo select[name], assim não dá conflito
		//por exemplo, resposta-21, é o select do grupo 2(#sortable2) e o segundo select desse grupo
		var respostaNumero = $(this).parent().find('.sorteia').attr('id').slice(-1);
		var grupoNumero = $(this).parent().find(".header").length;
		$(this).parent().find('.sorteia').append('<div class="header novo"><span class="icon"></span><a class="excluir excluir-dois"></a><div class="input"><input type="text" name="nome-resposta" class="ponto-resposta-enquete" value="" size=""/></div><input type="hidden" id="checkbox'+grupoNumero+respostaNumero+'" value="10" name="grupo'+respostaNumero+'"/></div>');
		$(this).parents('.group').removeClass('edit');
		$(this).parents('.group').addClass('edit');
		$('.excluir-dois').click(function(){ $(this).parents('.header').remove(); return false;});

		return false;
	});
	
});

/*Calcula o tamanho do Iframe*/
jQuery.fn.alturaIframe = function(){
	return this.each(function(){
		var altura = $('iframe').contents().find('#quizVisualizacao').height();
		$(this).attr('height',altura);
	});
};

//Existe um bug nesse calcula na maioria das vezes não seta altura no ifrime precisei retirar altura para testar os meus ajustes.
//$('iframe.janela').alturaIframe();

//Lógica do slideshow da Visualização
$(document).ready(function(){
  var currentPosition = 0;
  var slideWidth = 620;
  var slides = $('.slide');
  var numberOfSlides = slides.length;
  
  // Remove scrollbar in JS
  $('#slidesContainer').css('overflow', 'hidden');
  
  // Wrap all .slides with #slideInner div
  slides
  .wrapAll('<div id="slideInner"></div>')
  // Float left to display horizontally, readjust .slides width
  .css({
    'float' : 'left',
    'width' : slideWidth
  });
  
  // Set #slideInner width equal to total width of all slides
  $('#slideInner').css({
  	'width': slideWidth * numberOfSlides,
  	'height': $('.slide').height()
	});

  // Hide left arrow control on first load
  manageControls(currentPosition);

  // Create event listeners for .controls clicks
  $('.control')
    .bind('click', function(){

    if ($('input[name=resposta'+ currentPosition +']:checked').length) {

	    // Determine new position
	      currentPosition = ($(this).attr('id')=='proximo') 
	    ? currentPosition+1 : currentPosition-1;
	  
	      // Hide / show controls
	      manageControls(currentPosition);
	      // Move slideInner using margin-left
	      $('#slideInner').animate({
	        'marginLeft' : slideWidth*(-currentPosition)
	      },200);
	      $('.slide').fadeOut(20).delay(160).fadeIn(20);

  	}else{
  		alert('Marque pelo menos uma resposta.');
  	}

    });
  
  // manageControls: Hides and shows controls depending on currentPosition
  function manageControls(position){
    // Hide left arrow if position is first slide
    if(position==0){ $('#anterior').hide() }
    else{ $('#anterior').show(); $('.slide').removeClass('visivel'); }
    // Hide right arrow if position is last slide
    if(position==numberOfSlides-1){ $('#proximo').hide(); $('#chamaResultado').show();  } 
    else{ $('#proximo').show(); $('#chamaResultado').hide(); }
    }

     $('#chamaResultado').bind('click',function(){
    	if ($('input[name=resposta'+ currentPosition +']:checked').length) {
	    	//se estiver tudo ok, libera o resultado
		      $('#quizVisualizacao.questoes').hide();
			  $('#quizVisualizacao.resultados').show();
		      $('#botoes').remove();
			
			var resposta = new Array();
			var id       = $('#id-quiz').val();
			if($('#tipo-quiz').val() == 'certo-ou-errado'){
				var tipo     = 'faixa';	
			}else{
				var tipo     = $('#tipo-quiz').val();
			}

			$('.loader').show();

			if($('#tipo-quiz').val() != 'resposta_certa' && $('#tipo-quiz').val() != 'enquete'){
				$('input:radio:checked').each(function(){
					//resposta.push(this);
					resposta.push($(this).val());
				});
			}else{
				$('input:checkbox:checked').each(function(){
					//resposta.push(this);
					resposta.push($(this).val());
				 });
			}

			$('input:radio:checked').each(function(){
			//resposta.push(this);
				resposta.push($(this).val());
			});
			console.log(resposta);
					$.ajax({
						url: '../../visualizacao/resultado_'+tipo,
						dataType: 'JSON',
						async: false,
						data: {respostas:resposta, id_quiz:id},
						success: function(e){
							$('.loader').fadeOut();
							$('.slides-resultado #texto .titulo').text(e.titulo);
							if(tipo != 'perfil'){
								if(tipo == 'enquete'){
									var acertos = e.pontuacao;
									$('.slides-resultado #texto .pontuacao').text(acertos+" %.");
								}else{
									var acertos = (e.pontuacao/10);
									$('.slides-resultado #texto .pontuacao').text("Você fez "+acertos+" ponto(s).");
								}
							}
							$('.slides-resultado #texto .resultado .descricao').text(e.descricao);
							$('.slides-resultado #texto .resultado .saibaMais a').attr('href', e.link_referencia).text(e.texto_link);
							//$('iframe.janela').alturaIframe();
							if(e.imagem == '' || e.imagem == '../../assets/img/backgrounds/imagem.png' || e.imagem == 'http://gntquizgen.tk/homolog/assets/img/backgrounds/imagem.png' || e.imagem == 'http://gntquizgen.tk/sistema/assets/img/backgrounds/imagem.png'){
								$('.slides-resultado #imagem').remove();
								$('.slides-resultado #texto').css('width','580px');
							}else{
								$('.slides-resultado #imagem img#alvo-perguntas').attr('src', e.imagem).show();
							}

					      	$('#botoesResultado .anterior').click(function(){ location.reload(true) });
					      	$('#botoesResultado .proximo').click(function(){ 

								$('#quizVisualizacao.questoes').show();
								$('#quizVisualizacao.resultados').hide();
								$('#slideInner').css('margin-left','0');
								//$('input[type="radio"][value="10"] , input[type="checkbox"][value="10"]').parent().next().css('text-decoration','underline');
								$('input[type="radio"] , input[type="checkbox"]').attr('disabled', 'disabled');
								$('input[type="radio"][value="0"] , input[type="checkbox"][value="0"]').each(function(){
									$(this).parent().next().css({
										'opacity':'0.5',
										'-moz-opacity': '0.5',
										'-khtml-opacity': '0.5'
									});
								});
								$('#quizVisualizacao').append(
									'<div id="botoes">'+
										'<a href="#" id="anterior" class="control" title="Anterior" style="color:#ffffff; background-color:#cc1e59;">&laquo; Anterior</a>'+
										'<a href="#" id="proximo" class="control" title="Próximo" style="color:#ffffff; background-color:#cc1e59;">Próximo &raquo;</a>'+
										'<a href="#" id="chamaResultado" title="Próximo" style="color:#ffffff; background-color:#cc1e59;">Resultado &raquo;</a>'+
									'</div>');
								var currentPosition = 0;
								$('#anterior').hide();

								$('.control')
									.bind('click', function(){		
										// Determine new position
										  currentPosition = ($(this).attr('id')=='proximo') 
										? currentPosition+1 : currentPosition-1;
									  
										  // Hide / show controls
										  manageControls(currentPosition);
										  // Move slideInner using margin-left
										  $('#slideInner').animate({
											'marginLeft' : slideWidth*(-currentPosition)
										  },200);
										  $('.slide').fadeOut(20).delay(160).fadeIn(20);
										  
								});		  
								
								$('#chamaResultado').bind('click',function(){
									  $('#quizVisualizacao.questoes').hide();
									  $('#quizVisualizacao.resultados').show();
									  $('#botoes').remove();			
								});								
							
							});
						}
					});
	    }else{ alert('Marque pelo menos uma resposta.'); } 

    });
});

//Impede o accordion de fechar quando clica no titulo
$(function(){
	$('#accordion .header input[name="nome"], #accordion .header .input input[name="nome"], #accordion2 .header input[name="nome"], #accordion2 .header input[name="nome-pergunta"]').click(function(e){
		//$(this).parents('.header').next('.body').slideDown();
		e.stopPropagation();
	});
});

//Contador de caracteres
(function($){
	$.fn.contadorDeCaracteres = function(){
		return this.each(function(){

			/*
				Keyup é um evento que é disparado sempre que o usuário tirou o dedo da tecla.
				Ou seja, não queremos fazer nada quando o usuário clica, somente quando ele solta
				a tecla.
			*/
			$('textarea[name="descricao"]').keyup(function(event){
		 
				// abaixo algumas variáveis que iremos utilizar.
		 
				// pega a span onde esta a quantidade máxima de caracteres.
				var target    = $(this).parents('.texto').find('#campospan');
		 
				// pego pelo atributo title a quantidade maxima permitida.
				var max        = target.attr('title');
		 
				// tamanho da string dentro da textarea.
				var len     = $(this).val().length;
		 
				// quantidade de caracteres restantes dentro da textarea.
				var remain    = max - len;
		 
				// caso a quantidade dentro da textarea seja maior que
				// a quantidade maxima.
				if(len > max)
				{
					// abaixo vamos pegar tudo que tiver na string e limitar
					// a quantidade de caracteres para o máximo setado.
					// isso significa que qualquer coisa que seja maior que
					// o máximo será cortado.
					var val = $(this).val();
					$(this).val(val.substr(0, max));
		 
					// setamos o restante para 0.
					remain = 0;
				}
		 
				// atualizamos a quantidade de caracteres restantes.
				target.html(remain);
		 
			});
		
		});
	};
}(jQuery));

$('textarea[name="descricao"]').contadorDeCaracteres();
