<?php include "conexao.php"; 

$query = "select * from perguntas order by rand() limit 10";
$resultado = mysqli_query($conexao,$query);

while ( $linha = mysqli_fetch_array($resultado) ) 
{
    echo "<p>".$linha["pergunta"]."<br><br>";  
    $query2 = "select * from alternativas where pergunta_id = ".$linha["id"];
  
    $resultadoAlternativas = mysqli_query($conexao,$query2);

    while ($alternativas = mysqli_fetch_array($resultadoAlternativas)) 
    {
        echo $alternativas["alternativa"]."<br>";  
    }
    echo "</p>";
}

?>