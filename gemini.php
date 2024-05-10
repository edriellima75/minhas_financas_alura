<?php
session_start();
include("./gemini/autoload.php");
use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;
include("./config.php");

//adicione sua chave api gemini
$chave = "cole_sua_chave_api";

#Recebendo dados

if(empty($_POST["renda_atual"])){
	echo "Você precisa utilizar o formulario para enviar requisições...";
	exit;
}

$renda_atual = valid($_POST["renda_atual"]);
$divida_atual = valid($_POST["divida_atual"]);
$economia_atual = valid($_POST["economia_atual"]);
$objetivo_atual = valid($_POST["objetivo_atual"]);
$usuario = valid($_POST["usuario"]);
if(!empty($usuario)){
	$_SESSION["usuario"] = $usuario;
}else{
	$usuario = "Você";
}
$linguagem = valid($_POST["linguagem"]);
if(!empty($linguagem)){
	$_SESSION["linguagem"] = $linguagem;
}else{
	$linguagem = "Técnica";
}
$tamanho = valid($_POST["tamanho"]);
if(!empty($tamanho)){
	$_SESSION["tamanho"] = $tamanho;
}else{
	$tamanho = "5000";
}

$comando = 

"Meu nome é ".$usuario." minha situação atual:

Minha renda principal provém de 
"

.$renda_atual." no momento estou 

".$divida_atual.", e 

".$economia_atual." durante o mês, tenho o objetivo de 

".$despesas_variaveis.".

Faça uma conclusão sobre minha situação em linguagem ".$linguagem." e me sugira como alcançar meus sonhos.
";



$chars = "até ".$tamanho." chars";



$client = new Client($chave);

$response = $client->geminiPro()->generateContent(

    new TextPart($comando.' '.$chars),

);


$resposta = $response->text();

//formatando resposta

$resposta = str_replace("**","<br/>",$resposta);
$resposta = str_replace("*","<br/><br/>",$resposta);

echo "<span>".$resposta."</span>";

 ?>

