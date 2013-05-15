$(function(){

	/*Limpa onfocus, retorna onblur*/
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
	
	$('.esqueci input[type="submit"]').click(function(){
		$('.enviada').show();
		$('.esqueci .input').hide();
	});
	
	$('.esqueci .login-voltar').click(function(){
		$('form.esqueci').slideUp(200);
		$('form.login').delay(400).slideDown(200);
	});
	
	$('input[type="text"][name="senha-nova"],input[type="text"][name="repita"]').focus(function(){
		$(this).attr('type','password');
	});
	
	//Todos os quizes
	/*Paginacao*/
	$('.carregar-mais').click(function(){
		/*simula carregamento de 10 links*/
		for (var i=0;i<9;i++)
		{
			var titulo	 					= 'Quiz de maquiagem';
			var tipo 						= 'várias respostas corretas';
			var dataEdicao 					= '13/11/2012';
			var linkVerEmbutir 			= '#';
			var linkNomeTipo 			= '#';
			var linkPerfis 				= '#';
			var linkPerguntasRespostas 	= '#';
			var linkCustomizacao 			= '#';
			var linkExcluir 				= '#';
			$('.box tbody').append('<tr><td><div class="texto"><p>'+titulo+'</p><span>tipo: '+tipo+' | editado em: '+dataEdicao+'</span></div><div class="botoes"><a class="ver-e-embutir" href="'+linkVerEmbutir+'"></a><ul class="menu-editar"><li><div class="editar"></div><ul class="nav2"><li><a href="'+linkNomeTipo+'">nome e tipo</a></a></li><li><a href="'+linkPerfis+'">perfis</a></a></li><li><a href="'+linkPerguntasRespostas+'">perguntas & respostas</a></a></li><li><a href="'+linkCustomizacao+'">customizacao</a></a></li><li><a href="'+linkExcluir+'">excluir</a></a></li></ul></li></ul></div></td></tr>');
		}
		/*scrolla pro fim da página*/
		$('html, body').animate({scrollTop:$(document).height()}, 1000);
		return false;
	});
	
	//Novo Quiz
	$('.default').dropkick();

	/*Accordion*/
	 $( "#accordion,#accordion2" )
	.accordion({
		active: false,
		header: "> div > .header",
		heightStyle: "content"
	})
	.sortable({
		axis: "y",
		handle: ".header",
		stop: function( event, ui ) {
		// IE doesn't register the blur when sorting
		// so trigger focusout handlers to remove .ui-state-focus
		ui.item.children( ".header" ).triggerHandler( "focusout" );
		}
	});

	/*Sortables, conta quantos tem na página e gera por id dinamicamente*/
	var contadorSorteia = $('.sorteia').length;
	for(i=0 ; i<contadorSorteia ; i++){
		$("#sortable"+i).sortable();
	}
		
	/*File Upload de Todas as Páginas*/
		$('.fileupload').each(function () {
			$(this).fileupload({
				done: function (e, data) {
					var filess= data.files[0];
					var filenam = filess.name;
					$(this).find('#alvo').attr('src','assets/server/php/files/'+filenam);
				}
			});
		});
	
	//Perfil 3
	/*perguntas*/
	$('#fileupload-perfil-customiza')
   .fileupload({
        url: 'assets/server/php/',
        dataType: 'json',
        done: function (e, data) {			
            $.each(data.result.files, function (index, file) {
				$('img#alvo-perguntas').attr('src','assets/server/php/files/'+file.name);
            });
        }
    });
	/*resultados*/
	$('#fileupload-perfil-customiza-resultados')
   .fileupload({
        url: 'assets/server/php/',
        dataType: 'json',
        done: function (e, data) {			
            $.each(data.result.files, function (index, file) {
				$('img#alvo-resultados').attr('src','assets/server/php/files/'+file.name);
            });
        }
    });
			
	/* botao novo perfil*/
	$("#novo-perfil").click(function(){
		$('#accordion').append('<div class="header"><span class="icon"></span><div class="input"><input type="text" name="nome" value="" size=""/></div><span class="arrow"></span></div><div class="body"><div class="texto"><label for="descricao">Descrição</label><div class="textarea"><textarea name="descricao" cols="" rows=""></textarea></div><label for="link">Link de referência:</label><div class="input"><input type="text" name="link" value="" size=""/></div><label for="texto">Texto do link de referência:</label><div class="input"><input type="text" name="texto" value="" size=""/></div></div><div class="imagem"><label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px</span></label><form class="fileupload" action="assets/server/php/" method="POST" enctype="multipart/form-data"><div class="quadro"><img id="alvo" src="assets/img/backgrounds/imagem.png" name="imagem"/></div><span class="btn btn-success fileinput-button"><input id="file" type="file"/></span></form></div></div>');
		/*bota o accordion no esquema*/
		$( "#accordion" ).accordion('destroy');
		$( "#accordion" ).accordion({			
			active: ($('.header').length-1),
			header: ".header"			
		});
		/*tem que resetar o fileupload e chamar de novo*/		
		$('.fileupload').bind('fileuploaddestroy');
		$('.fileupload').each(function () {
			$(this).fileupload({
				done: function (e, data) {
					var filess= data.files[0];
					var filenam = filess.name;
					$(this).find('#alvo').attr('src','assets/server/php/files/'+filenam);
				}
			});
		});		
		/*scrolla pro fim da página*/
		$('html, body').animate({scrollTop:$(document).height()}, 1000);
		return false;
	});
	
	//Perfil > perguntas e respostas
	/*botão nova resposta*/
	$(document).on('click','#nova-resposta-perfil',function(){
		//gera uma combinacao unica de numero para o novo select[name], assim não dá conflito
		//por exemplo, resposta-21, é o select do grupo 2(#sortable2) e o segundo select desse grupo
		var respostaNumero = $(this).parent().find('.sorteia').attr('id').slice(-1);
		var grupoNumero = $(this).parent().find(".header").length;
		$(this).parent().find('.sorteia').append('<div class="header"><span class="icon"></span><div class="input"><input type="text" name="nome" value="" size=""/></div><select name="resposta-'+respostaNumero+grupoNumero+'" class="default"><option value="1">Amiga de todos</option><option value="2">Pegadora</option><option value="3">Amiga de todos</option><option value="4">Pegadora</option></select></div>');
		//coloca o novo select no esquema
		$('.default').dropkick();
		return false;
	});
	/*botão nova pergunta*/
	$(document).on('click','#nova-pergunta-perfil',function(){
		//gera uma combinacao unica de numero para o novo select[name], assim não dá conflito
		//por exemplo, resposta-21, é o select do grupo 2(#sortable2) e o segundo select desse grupo
		$("#accordion2 .group").append('<div class="header"><span class="icon"></span><div class="input"><input type="text" name="nome" value="" size=""/></div><span class="arrow"></span></div><div class="body"><div id="perguntas"><div class="texto"><label for="link">Link de referência:</label><div class="input"><input type="text" name="link" value="" size=""/></div><label for="texto">Texto do link de referência:</label><div class="input"><input type="text" name="texto" value="" size=""/></div></div><div class="imagem"><label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px</span></label><form class="fileupload" action="assets/server/php/" method="POST" enctype="multipart/form-data"><div class="quadro"><img id="alvo" src="assets/img/backgrounds/imagem.png" name="imagem"/></div><span class="btn btn-success fileinput-button"><input id="file" type="file"/></span></form></div></div><div id="respostas"><div class="titulo-respostas">Respostas:</div><div id="sortable'+($(".sorteia").length+1)+'" class="sorteia"><div class="header"><span class="icon"></span><div class="input"><input type="text" name="nome" value="" size=""/></div><select name="resposta-'+($(".sorteia").length+1)+'0" class="default"><option value="1">Amiga de todos</option><option value="2">Pegadora</option></select></div></div><a id="nova-resposta-perfil" class="nova-resposta" href="javascript:void(0)"></a></div></div>');
		//coloca o novo elemento de accordion no esquema
		$("#accordion2").accordion('destroy').sortable('destroy');
		$("#accordion2").accordion({active:$("#accordion2 .sorteia").length-1,header:"> div > .header"}).sortable({axis:"y",handle:".header",stop:function(event,ui){ui.item.children(".header").triggerHandler("focusout")}});
		//coloca o novo select no esquema
		$('.default').dropkick();
		//calcula quantos sortables tem e carrega
		var length = $(".sorteia").length;
		for( i=0; i < length; i++){
			$("#sortable"+i).sortable();
		}
		/*tem que resetar o fileupload e chamar de novo*/		
			$('.fileupload').bind('fileuploaddestroy');
			$(".fileupload").each(function(){$(this).fileupload({done:function(e,t){var n=t.files[0];var r=n.name;$(this).find("#alvo").attr("src","assets/server/php/files/"+r)}})})
		//scrolla pro fim da página
		$('html, body').animate({scrollTop:$(document).height()}, 1000);
		return false;
	});

	//Editor de Texto
	////Accordion Externo
	$('#perfilCustomizacao').accordion({ header: ".header" , icons: false , heightStyle:"content" , active:0 });
	////Accordion Interno
	$('.editor').accordion({ header: ".intro" , icons: false , heightStyle:"content" , active:0 });
	////Tamanho da fonte
	//////Perguntas
	$('#dk_container_titulo-tamanho a').click(function(){
		$('input[name="ititulo-tamanho"]').val('font-size:'+$(this).text()+';');
		$('#previewPerguntas #nome').css('font-size',$(this).text());
	});
	$('#dk_container_perguntas-tamanho a').click(function(){
		$('input[name="iperguntas-tamanho"]').val('font-size:'+$(this).text()+';');
		$('#previewPerguntas .titulo').css('font-size',$(this).text());
	});
	$('#dk_container_referencia-tamanho a').click(function(){
		$('input[name="ireferencia-tamanho"]').val('font-size:'+$(this).text()+';');
		$('#previewPerguntas .subtitulo a').css('font-size',$(this).text());
	});
	$('#dk_container_respostas-tamanho a').click(function(){
		$('input[name="irespostas-tamanho"]').val('font-size:'+$(this).text()+';');
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
		images:{clientPath: 'assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#previewPerguntas #nome').css('color','#'+all.hex);
			$(this).css('background-color','transparent');
			}
	);
	$('#perguntas-cor').jPicker({
		images:{clientPath: 'assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#previewPerguntas .titulo').css('color','#'+all.hex);
			$(this).css('background-color','transparent');
			}
	);
	$('#referencia-cor').jPicker({
		window:{ position:{ x: 'screenCenter' , y: ($(this).offset.top - $(window).scrollTop()) + $(this).height() } },
		images:{clientPath: 'assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#previewPerguntas .subtitulo a').css('color','#'+all.hex);
			$(this).css('background-color','transparent');
			}
	);
	$('#botoes-cor').jPicker({
		window:{ position:{ x: 'screenCenter' , y: ($(this).offset.top - $(window).scrollTop()) + $(this).height() } },
		images:{clientPath: 'assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#botoes a').css('color','#'+all.hex);
			$(this).css('background-color','transparent');
			}
	);
	$('#botoes-cor-fundo').jPicker({
		window:{ position:{ x: 'screenCenter' , y: ($(this).offset.top - $(window).scrollTop()) + $(this).height() } },
		images:{clientPath: 'assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#botoes a').css('background-color','#'+all.hex);
			$(this).css('background-color','transparent');
			}
	);
	$('#respostas-cor').jPicker({
		window:{ position:{ x: 'screenCenter' , y: ($(this).offset.top - $(window).scrollTop()) + $(this).height() } },
		images:{clientPath: 'assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#previewPerguntas .respostas').css('color','#'+all.hex);
			$(this).css('background-color','transparent');
			}
	);
	$('#respostas-cor-fundo').jPicker({
		window:{ position:{ x: 'screenCenter' , y: ($(this).offset.top - $(window).scrollTop()) + $(this).height() } },
		images:{clientPath: 'assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#previewPerguntas .respostas').css('background-color','#'+all.hex);
			$(this).css('background-color','transparent');
			}
	);
	$('#imagem-cor-fundo').jPicker({
		window:{ position:{ x: 'screenCenter' , y: ($(this).offset.top - $(window).scrollTop()) + $(this).height() } },
		images:{clientPath: 'assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#previewPerguntas #imagem').css('background-color','#'+all.hex);
			$(this).css('background-color','transparent');
			}
	);
	//////Resultados
	$('#titulo-resultados-cor').jPicker({
		window:{ position:{ x: 'screenCenter' , y: ($(this).offset.top - $(window).scrollTop()) + $(this).height() } },
		images:{clientPath: 'assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#previewResultados #nome').css('color','#'+all.hex);
			$(this).css('background-color','transparent');
			}
	);
	$('#perguntas-resultados-cor').jPicker({
		window:{ position:{ x: 'screenCenter' , y: ($(this).offset.top - $(window).scrollTop()) + $(this).height() } },
		images:{clientPath: 'assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#previewResultados .titulo').css('color','#'+all.hex);
			$(this).css('background-color','transparent');
			}
	);
	$('#acertos-cor').jPicker({
		window:{ position:{ x: 'screenCenter' , y: ($(this).offset.top - $(window).scrollTop()) + $(this).height() } },
		images:{clientPath: 'assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#previewResultados .acertos').css('color','#'+all.hex);
			$(this).css('background-color','transparent');
			}
	);
	$('#descricao-cor').jPicker({
		window:{ position:{ x: 'screenCenter' , y: ($(this).offset.top - $(window).scrollTop()) + $(this).height() } },
		images:{clientPath: 'assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#previewResultados .descricao').css('color','#'+all.hex);
			$(this).css('background-color','transparent');
			}
	);
	$('#referencia-resultados-cor').jPicker({
		window:{ position:{ x: 'screenCenter' , y: ($(this).offset.top - $(window).scrollTop()) + $(this).height() } },
		images:{clientPath: 'assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#previewResultados .saibaMais a').css('color','#'+all.hex);
			$(this).css('background-color','transparent');
			}
	);
	$('#botoes-resultados-cor').jPicker({
		window:{ position:{ x: 'screenCenter' , y: ($(this).offset.top - $(window).scrollTop()) + $(this).height() } },
		images:{clientPath: 'assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#botoesResultado a').css('color','#'+all.hex);
			$(this).css('background-color','transparent');
			}
	);
	$('#botoes-resultados-cor-fundo').jPicker({
		window:{ position:{ x: 'screenCenter' , y: ($(this).offset.top - $(window).scrollTop()) + $(this).height() } },
		images:{clientPath: 'assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#botoesResultado a').css('background-color','#'+all.hex);
			$(this).css('background-color','transparent');
			}
	);
	$('#imagem-resultados-cor-fundo').jPicker({
		window:{ position:{ x: 'screenCenter' , y: ($(this).offset.top - $(window).scrollTop()) + $(this).height() } },
		images:{clientPath: 'assets/img/jpicker/'}
	},
		function(color, context)
			{
			var all = color.val('all');
			$('#previewResultados #imagem').css('background-color','#'+all.hex);
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
		$('input[name="irespostas-alinhamento"]').val('text-align:'+this.id+';');
		$('#previewPerguntas .respostas').css('text-align',this.id);
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

	//Gerador de Código
	var code = $("textarea#quizCode").val();
	$('textarea#codigo').val($.trim(code));
	
	$(".copiarCodigo").zclip({
		path: "assets/js/ZeroClipboard.swf",
		copy:$('textarea#codigo').val(),
		afterCopy:function(){
			alert('Copiado para a área de transferência!');
		}
	});
	
	//Certo ou Errado > perguntas e respostas
	/*radiobutton, vê quantos tem na página e gera por id dinamicamente*/
    var ids = $.map($('input[type="radio"]'), function(elt) {
		$( "#"+elt.id ).button();
	});
	
	/*botão nova resposta*/
	$(document).on('click','#nova-pergunta-certo',function(){
			var tamanho = $(".sorteia").length;
			//gera uma combinacao unica de numero para o novo select[name], assim não dá conflito
			//por exemplo, resposta-21, é o select do grupo 2(#sortable2) e o segundo select desse grupo
			$("#accordion2 .group").append('<div class="header"><span class="icon"></span><div class="input"><input type="text" name="nome" value="" size=""/></div><span class="arrow"></span></div><div class="body"><div id="perguntas"><div class="texto"><label for="link">Link de referência:</label><div class="input"><input type="text" name="link" value="" size=""/></div><label for="texto">Texto do link de referência:</label><div class="input"><input type="text" name="texto" value="" size=""/></div></div><div class="imagem"><label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px</span></label><form class="fileupload" action="assets/server/php/" method="POST" enctype="multipart/form-data"><div class="quadro"><img id="alvo" src="assets/img/backgrounds/imagem.png" name="imagem"/></div><span class="btn btn-success fileinput-button"><input id="file" type="file"/></span></form></div></div><div id="respostas"><div class="titulo-respostas">Respostas:</div><div id="sortable'+tamanho+'" class="sorteia"><div class="header"><span class="icon"></span><div class="input"><input type="text" name="nome" value="" size=""/></div><div class="radio"><label for="radio'+(tamanho+1)+tamanho+'" class="radioCustom"></label><input type="radio" id="radio'+(tamanho+1)+tamanho+'" value="0" name="grupo'+tamanho+'"/>Esta é a resposta correta</div></div><div class="header"><span class="icon"></span><div class="input"><input type="text" name="nome" value="" size=""/></div><div class="radio"><label for="radio'+(tamanho+2)+tamanho+'" class="radioCustom"></label><input type="radio" id="radio'+(tamanho+2)+tamanho+'" value="1" name="grupo'+tamanho+'"/>Esta é a resposta correta</div></div></div></div></div>');
			//coloca o novo elemento de accordion no esquema
			$("#accordion2").accordion('destroy').sortable('destroy');
			$("#accordion2").accordion({active:$("#accordion2 .sorteia").length-1,header:"> div > .header"}).sortable({axis:"y",handle:".header",stop:function(event,ui){ui.item.children(".header").triggerHandler("focusout")}});
			//coloca o novo radio no esquema
			$( "#radio"+(tamanho+1)+tamanho ).button();
			$( "#radio"+(tamanho+2)+tamanho ).button();
			//calcula quantos sortables tem e carrega
			var length = $(".sorteia").length;
			for( i=0; i < length; i++){
				$("#sortable"+i).sortable();
			}
			/*tem que resetar o fileupload e chamar de novo*/		
			$('.fileupload').bind('fileuploaddestroy');
			$(".fileupload").each(function(){$(this).fileupload({done:function(e,t){var n=t.files[0];var r=n.name;$(this).find("#alvo").attr("src","assets/server/php/files/"+r)}})})
			//scrolla pro fim da página
			$('html, body').animate({scrollTop:$(document).height()}, 1000);
			return false;
		});
	//Certo ou Errado 2
	$( "#slider" ).slider({
			range: true,
			min: 0,
			max: 50,
			values: [ 10, 40 ],
			slide: function( event, ui ) {
				$( ".amountIni0" ).val( ui.values[ 0 ] + "pts" );
				$( ".amountFin0" ).val( ui.values[ 1 ] + "pts" );
			}
		});
	 $( ".amountIni0" ).val( $( "#slider" ).slider( "values", 0 ) + "pts" );
	 $( ".amountFin0" ).val( $( "#slider" ).slider( "values", 1 ) + "pts" );
	 ////Nova Faixa
	$("#novaFaixa").click(function(){
		$('#accordion .group').append('<div class="header"><span class="icon"></span><div class="input"><input type="text" name="nome" value="Carente" size=""/></div><span class="arrow"></span></div><div class="body"><div class="sliderHolder"><input type="text" id="amountIni" class="amountIni'+($('.group').length)+'"/><input type="text" id="amountFin" class="amountFin'+($('.group').length)+'"/><div id="slider'+($('.group').length)+'"></div></div><div class="texto"><label for="descricao">Descrição</label><div class="textarea"><textarea name="descricao" cols="" rows=""></textarea></div><label for="link">Link de referência:</label><div class="input"><input type="text" name="link" value="" size=""/></div><label for="texto">Texto do link de referência:</label><div class="input"><input type="text" name="texto" value="" size=""/></div></div><div class="imagem"><label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px</span></label><div class="quadro"><img id="alvo" src="assets/img/backgrounds/imagem.png" name="imagem"/></div><span class="btn btn-success fileinput-button"><input id="fileupload" type="file"/></span></div></div>');
		//novo slider
		$( "#slider"+($('.group').length) ).slider({
					range: true,
					min: 0,
					max: 50,
					values: [ 10, 40 ],
					slide: function( event, ui ) {
						$( ".amountIni"+($('.group').length) ).val( ui.values[ 0 ] + "pts" );
						$( ".amountFin"+($('.group').length) ).val( ui.values[ 1 ] + "pts" );
					}
				});
		 $( ".amountIni"+($('.group').length) ).val( $( "#slider"+($('.group').length) ).slider( "values", 0 ) + "pts" );
		 $( ".amountFin"+($('.group').length) ).val( $( "#slider"+($('.group').length) ).slider( "values", 1 ) + "pts" );		
		//scrolla pro fim da página
		$( "#accordion" ).accordion('destroy');
		$( "#accordion" ).accordion({
			active: $('.group').length,
			header: "> div > .header"			
		});
		$('html, body').animate({scrollTop:$(document).height()}, 1000);
		return false;
	});
	
	//Resposta Certa > perguntas e respostas
	/*botão nova resposta*/
	$(document).on('click','#nova-resposta-respostaCerta',function(){
		//gera uma combinacao unica de numero para o novo select[name], assim não dá conflito
		//por exemplo, resposta-21, é o select do grupo 2(#sortable2) e o segundo select desse grupo
		var respostaNumero = $(this).parent().find('.sorteia').attr('id').slice(-1);
		var grupoNumero = $(this).parent().find(".header").length;
		$(this).parent().find('.sorteia').append('<div class="header"><span class="icon"></span><div class="input"><input type="text" name="nome" value="" size=""/></div><div class="radio"><label for="radio'+grupoNumero+respostaNumero+'" class="radioCustom"></label><input type="radio" id="radio'+grupoNumero+respostaNumero+'" value="'+grupoNumero+'" name="grupo'+respostaNumero+'"/>Esta é a resposta correta</div></div>');
		//coloca o novo radio no esquema
		$( "#radio"+grupoNumero+respostaNumero ).button();
		return false;
	});
	/*botão nova pergunta*/
	$(document).on('click','#nova-pergunta-respostaCerta',function(){
		//gera uma combinacao unica de numero para o novo select[name], assim não dá conflito
		//por exemplo, resposta-21, é o select do grupo 2(#sortable2) e o segundo select desse grupo
		var grupoNumero = $('.group').last().find(".header").length;
		$("#accordion2 .group").append('<div class="header"><span class="icon"></span><div class="input"><input type="text" name="nome" value="" size=""/></div><span class="arrow"></span></div><div class="body"><div id="perguntas"><div class="texto"><label for="link">Link de referência:</label><div class="input"><input type="text" name="link" value="" size=""/></div><label for="texto">Texto do link de referência:</label><div class="input"><input type="text" name="texto" value="" size=""/></div></div><div class="imagem"><label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px</span></label><form class="fileupload" action="assets/server/php/" method="POST" enctype="multipart/form-data"><div class="quadro"><img id="alvo" src="assets/img/backgrounds/imagem.png" name="imagem"/></div><span class="btn btn-success fileinput-button"><input id="file" type="file"/></span></form></div></div><div id="respostas"><div class="titulo-respostas">Respostas:</div><div id="sortable'+$(".sorteia").length+'" class="sorteia"><div class="header"><span class="icon"></span><div class="input"><input type="text" name="nome" value="" size=""/></div><div class="radio"><label for="radio0'+$(".sorteia").length+'" class="radioCustom"></label><input type="radio" id="radio0'+$(".sorteia").length+'" value="0" name="grupo'+$(".sorteia").length+'"/>Esta é a resposta correta</div></div></div><a id="nova-resposta-respostaCerta" class="nova-resposta" href="javascript:void(0)"></a></div></div>');
		//coloca o novo elemento de accordion no esquema
		$("#accordion2").accordion('destroy').sortable('destroy');
		$("#accordion2").accordion({active:$("#accordion2 .sorteia").length-1,header:"> div > .header"}).sortable({axis:"y",handle:".header",stop:function(event,ui){ui.item.children(".header").triggerHandler("focusout")}});
		//coloca o novo radio no esquema
		$( "#radio0"+($(".sorteia").length-1) ).button();
			//calcula quantos sortables tem e carrega
			var length = $(".sorteia").length;
			for( i=0; i < length; i++){
				$("#sortable"+i).sortable();
			}
		/*tem que resetar o fileupload e chamar de novo*/		
			$('.fileupload').bind('fileuploaddestroy');
			$(".fileupload").each(function(){$(this).fileupload({done:function(e,t){var n=t.files[0];var r=n.name;$(this).find("#alvo").attr("src","assets/server/php/files/"+r)}})})
		//scrolla pro fim da página
		$('html, body').animate({scrollTop:$(document).height()}, 1000);
		return false;
	});
	
	//Varias Respostas > perguntas e respostas
	//$( "#checkbox00,#checkbox10,#checkbox01" ).button();
	/*checkbox, vê quantos tem na página e gera por id dinamicamente*/
    var ids = $.map($('input[type="checkbox"]'), function(elt) {
		$( "#"+elt.id ).button();
	});	
	/*botao nova resposta*/
	$(document).on('click','#nova-resposta-variasRespostas',function(){
		//gera uma combinacao unica de numero para o novo select[name], assim não dá conflito
		//por exemplo, resposta-21, é o select do grupo 2(#sortable2) e o segundo select desse grupo
		var respostaNumero = $(this).parent().find('.sorteia').attr('id').slice(-1);
		var grupoNumero = $(this).parent().find(".header").length;
		$(this).parent().find('.sorteia').append('<div class="header"><span class="icon"></span><div class="input"><input type="text" name="nome" value="" size=""/></div><div class="checkbox"><label for="checkbox'+grupoNumero+respostaNumero+'" class="checkboxCustom"></label><input type="checkbox" id="checkbox'+grupoNumero+respostaNumero+'" value="'+grupoNumero+'" name="grupo'+respostaNumero+'"/>Esta é a resposta correta</div></div>');
		//coloca o novo checkbox no esquema
		$( "#checkbox"+grupoNumero+respostaNumero ).button();
		return false;
	});
	/*botao nova pergunta*/
	$(document).on('click','#nova-pergunta-variasRespostas',function(){
		//gera uma combinacao unica de numero para o novo select[name], assim não dá conflito
		//por exemplo, resposta-21, é o select do grupo 2(#sortable2) e o segundo select desse grupo
		var grupoNumero = $('.group').last().find(".header").length;
		$("#accordion2 .group").append('<div class="header"><span class="icon"></span><div class="input"><input type="text" name="nome" value="" size=""/></div><span class="arrow"></span></div><div class="body"><div id="perguntas"><div class="texto"><label for="link">Link de referência:</label><div class="input"><input type="text" name="link" value="" size=""/></div><label for="texto">Texto do link de referência:</label><div class="input"><input type="text" name="texto" value="" size=""/></div></div><div class="imagem"><label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px</span></label><form class="fileupload" action="assets/server/php/" method="POST" enctype="multipart/form-data"><div class="quadro"><img id="alvo" src="assets/img/backgrounds/imagem.png" name="imagem"/></div><span class="btn btn-success fileinput-button"><input id="file" type="file"/></span></form></div></div><div id="respostas"><div class="titulo-respostas">Respostas:</div><div id="sortable'+$(".sorteia").length+'" class="sorteia"><div class="header"><span class="icon"></span><div class="input"><input type="text" name="nome" value="" size=""/></div><div class="checkbox"><label for="checkbox0'+$(".sorteia").length+'" class="checkboxCustom"></label><input type="checkbox" id="checkbox0'+$(".sorteia").length+'" value="0" name="grupo'+$(".sorteia").length+'"/>Esta é a resposta correta</div></div></div><a id="nova-resposta-variasRespostas" class="nova-resposta" href="javascript:void(0)"></a></div></div>');
		//coloca o novo elemento de accordion no esquema
		$("#accordion2").accordion('destroy').sortable('destroy');
		$("#accordion2").accordion({active:$("#accordion2 .sorteia").length-1,header:"> div > .header"}).sortable({axis:"y",handle:".header",stop:function(event,ui){ui.item.children(".header").triggerHandler("focusout")}});
		//coloca o novo checkbox no esquema
		$( "#checkbox0"+($(".sorteia").length-1) ).button();
		//calcula quantos sortables tem e carrega
		var length = $(".sorteia").length;
		for( i=0; i < length; i++){
			$("#sortable"+i).sortable();
		}
		/*tem que resetar o fileupload e chamar de novo*/		
			$('.fileupload').bind('fileuploaddestroy');
			$(".fileupload").each(function(){$(this).fileupload({done:function(e,t){var n=t.files[0];var r=n.name;$(this).find("#alvo").attr("src","assets/server/php/files/"+r)}})})
		//scrolla pro fim da página
		$('html, body').animate({scrollTop:$(document).height()}, 1000);
		return false;
	});
	
});