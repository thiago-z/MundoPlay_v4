<!--

CONEXÃO COM O BANCO DE DADOS

-->

<?php

$strcon = mysqli_connect("localhost", "root", "storn@2016", "cinema_v7");

if (!$strcon){
	die("Não foi possivel conectar ao servidor!");
}


?>