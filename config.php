<?php

#Verificando se o usuario tentou confundir a gemini com equações ou parametros fora do contexto
function valid($dados){
	if(empty($dados)){
		$dados = "Prefiro não dizer";
		return $dados;
	}else{
		$dados = addcslashes($dados, '<>;_+=-}{]\/?!\'"~');
        return $dados;
		}
}

?>