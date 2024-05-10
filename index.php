<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Importando Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Importando materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/base.css"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<meta name="theme-color" content="#000"/>
	<meta name="aple-mobile-web-app-status-bar-style" content="#000"/>
	<meta name="msapplication-navbutton-color" content="#000"/>
    <title>Minhas Finanças</title>
</head>
<body>
<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
		
	<script>
	  $('.fixed-action-btn').floatingActionButton({
    toolbarEnabled: true
  });
	</script>
	<div class="fixed-action-btn" style="bottom: 77px;">
  <a class="btn-floating btn-medium red">
    <i class="medium material-icons">apps</i>
  </a>
	
	<ul class="tabs tabs-fixed-width tab-demo z-depth-1" id="menu">
        <li class="tab col s2" style="overflow:unset;margin-left:40px;"><a href="#aba1"><b style="color:white"><i class="small material-icons" style="color:#fff">description</i></b></a></li>
        <li class="tab col s2" style="overflow:unset;"><a class="active" href="#aba2"><b style="color:white"><i class="small material-icons" style="color:#fff">monetization_on</i></b></a></li>
        <li class="tab col s2" style="overflow:unset;"><a href="#aba3"><b style="color:white"><i class="small material-icons" style="color:#fff">build</i></b></a></li>

    </ul>
	 </div>
		  
		  <div class="col s12 background">
		  
		  <div id="aba1" class="col s12">
		  
		  <div class="caixa">
		  <h5>Descrição do projeto</h5>
		  <pre></pre>
		  
		  <p align="left">
		  Esse projeto foi desenvolvido dia 09/05/2024 durante o Curso apresentado pela Alura.
		  O desafio que foi proposto era a criação de um sistema utilizando
		  a api IA gemini do google.<br/>
		  <br/>
		De princípio pensei em criar um sistema para mostrar aos usuários como a IA pode
		entender suas realidades financeiras e sugerir ações práticas.
		<br/><br/>
		Pensei em criar um sistema que pudesse receber os dados financeiros dos clientes, mas 
		estudando um pouco mais a fundo encontrei a seguinte realidade:<br/><br/>
		  Segundo dados do SPC Brasil, 58% dos Brasileiros não se dedicam com suas finanças.
		  <br/><br/>
		  Sendo assim, se a ferramenta solicita-se dados financeiros, a maior parte do público
		  ficaria sem utilizar nosso sistema por não terem seus próprios dados financeiros.
		  <br/><br/>
		  Em busca de uma solução ultilizando a api gemini, 4 perguntas foram suficientes para analisar e sugerir
		  aos usuários medidas para melhorar suas situações financeiras e alcançar seus objetivos.
		  </p>
		  
		  </div>
		  
		  </div>
		  
		  <div id="aba2" class="col s12">
		  		  		  
		  <!--criando formulario-->
		  <div class="caixa">
		  
		  <p class="center"><img src="imagens/logo.png" style="width:250px"></p>
		  		  
		  <p>Qual é a sua fonte de renda principal?</p>
		  <select id="renda_atual" class="select">
		  <option value="Trabalho assalariado">Trabalho assalariado</option>
		  <option value="Trabalho autônomo">Trabalho autônomo</option>
		  <option value="Aposentadoria">Aposentadoria</option>
		  <option value="Investimentos">Investimentos</option>
		  <option value="Outros meios de renda">Outros</option>
		  </select><br/>
		  
		  
		  
		  <p>Qual é o seu nível de endividamento atual?</p>
		  <select id="divida_atual" class="select">
		  <option value="Sem Nenhuma dívida">Sem dívidas</option>
		  <option value="Com Dívidas controladas">Baixo</option>
		  <option value="Com Algumas dívidas">Medio</option>
		  <option value="Com Muitas dívidas">Alto</option>
		  </select>
		  
		  <p>Quanto você consegue economizar durante o mês?</p>
		  <select id="economia_atual" class="select">
		  <option value="Não consigo economizar nada">Nada</option>
		  <option value="Economizo muito pouco">Muito pouco</option>
		  <option value="Economizo acima de 10% do que ganho">Acima de 10%</option>
		  <option value="Economizo acima de 20% do que ganho">Acima de 20$</option>
		  </select>
		  
		  <p>Qual é o seu principal objetivo financeiro no momento?</p>
		  <select id="objetivo_atual" class="select">
		  <option value="Economizar para emergência">Economizar para emergência</option>
		  <option value="Pagar Dívidas">Pagar minhas dívidas</option>
		  <option value="Investir para o futuro">Investir</option>
		  <option value="Comprar bens materiais">Comprar bens materiais</option>
		  </select>
		  		  
			<button class="botao" id="res">Analisar</button>
			  
			
			</div>
			
			<!--resposta do prompt-->
			<div id="resposta" style="color:white;"></div>
			  
		  </div>
		  
		  <div id="aba3" class="col s12">
		  
		  <div class="caixa">
		  <h5>Preferências</h5>
		  <pre></pre>
		  
		  <p>Como gostaria de ser chamado(a):</p>
		  <input type="text" value="<?php if(isset($_SESSION["usuario"])){ echo $_SESSION["usuario"];} ?>" id="usuario" class="b3"/><br/>
		  
		  <p>Escolha um tipo de linguagem:</p>
		  <select id="linguagem" class="select">
		  <option value="Técnica" <?php if(isset($_SESSION["linguagem"]) && $_SESSION["linguagem"] == "Técnica"){ echo "selected"; } ?>>Técnica</option>
		  <option value="Popular" <?php if(isset($_SESSION["linguagem"]) && $_SESSION["linguagem"] == "Popular"){ echo "selected"; } ?>>Popular</option>
		  <option value="Caipira" <?php if(isset($_SESSION["linguagem"]) && $_SESSION["linguagem"] == "Caipira"){ echo "selected"; } ?>>Caipira</option>
		  </select>
		  
		  <p>Escolha o tamanho da resposta:</p>
		  <select id="tamanho" class="select">
		  <option value="500" <?php if(isset($_SESSION["tamanho"]) && $_SESSION["tamanho"] == "500"){ echo "selected"; } ?>>Curta</option>
		  <option value="1000" <?php if(isset($_SESSION["tamanho"]) && $_SESSION["tamanho"] == "1000"){ echo "selected"; } ?>>Rápida</option>
		  <option value="5000" <?php if(isset($_SESSION["tamanho"]) && $_SESSION["tamanho"] == "5000"){ echo "selected"; } ?>>Completa</option>
		  </select>
		  
		  </div>
		  
		  </div>
		  

		</div>

<script>
$(document).ready(function(){
		$("#res").on('click',function(){
				$.ajax({
			
			url:'gemini.php',
			type:'POST',			
			data:{
			renda_atual:$("#renda_atual").val(),
			divida_atual:$("#divida_atual").val(),
			economia_atual:$("#economia_atual").val(),
			objetivo_atual:$("#objetivo_atual").val(),
			usuario:$("#usuario").val(),
			linguagem:$("#linguagem").val(),
			tamanho:$("#tamanho").val(),
			
			},
			beforeSend: function(){
				$("#resposta").html('<div class="progress"><div class="indeterminate"></div></div>');
			},
			success: function(data)
			{
				$("#resposta").html(data);
            },
			error: function(data){
			$("#resposta").html("Não conseguimos processar os dados!");
			}
		});
		
		
	});
});
</script>


</body>
</html>
