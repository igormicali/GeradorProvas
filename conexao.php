<?php
$Servidor = "localhost";
$User = "root";
$Senha = "";
$banco = "gerador_prova";
// $Servidor = "201.55.32.20:6033";
// $User = "pw_user";
// $Senha = "Fatec@123";
// $banco = "pw_user_db";

$conexao = mysqli_connect($Servidor, $User, $Senha);
mysqli_select_db($conexao, $banco);
?>