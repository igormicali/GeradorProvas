<?php 
    include "conexao.php";
    include "cabecalho.php";

if (isset($_POST) && !empty($_POST)) 
{
?>   
<?php
    $pontos = 0;
    foreach($_POST as $chave => $valor)
    {
    ?>
    <div class="card mx-auto mt-3 justify-content-center bg-light" style="width:50%">
    <?php
    $respostaUsuario = $valor;
    $query2 = "select * from alternativas where pergunta_id = ".$chave;
    $resultadoAlternativas = mysqli_query($conexao,$query2);

    $query1 = "select * from perguntas where id = ".$chave;
    $resultadoPerguntas = mysqli_query($conexao,$query1);
    $pergunta = mysqli_fetch_array($resultadoPerguntas);
    echo $pergunta["pergunta"]."<p>";  

    $count = 1;
    ?>
    <div class="d-flex flex-column align-items-center bg-light" style="width:50%">
    <?php
    while ($alternativas2 = mysqli_fetch_array($resultadoAlternativas)) 
    {    

        if ($alternativas2["correta"] == 1)
        {
            if ($respostaUsuario == $count) 
            {
               echo "<p class='text-success'> Parabéns, você acertou: ";
               $pontos++;
            }else
            {
               echo "<p class='text-primary'> Alternativa correta: ";
            }
            
        }else {
            if ($respostaUsuario == $count) {
                echo "<p class='text-danger'> Você assinalou essa -> ";
            }
        }
        echo"".$alternativas2["alternativa"]."<br>";
        ?>
        </p>
    <?php
    $count++;
    }
    echo " <br><br><br>";
    ?>
    </div>
    </div>
    <?php
    }
    ?>
    <div class="card mx-auto justify-content-center bg-light" style="width: 50%; height:600px; margin: 50px 0 50px 0">
    <div class="d-flex flex-column align-items-center">
    <h1>Sua Pontuação</h1>
       <div class="alert alert-success"> <?php echo $pontos ?> </div>
    </div>
    </div>  
<?php  
}
    include "rodape.php" ;
?>