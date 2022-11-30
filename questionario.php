<?php 
    include "conexao.php";
    include "cabecalho.php";

    $query = "select * from perguntas order by rand() limit 10";
    $resultado = mysqli_query($conexao,$query);
?>
    <form action="resultado.php" method="post">
<?php
    while ( $linha = mysqli_fetch_array($resultado) ) 
    {
    ?>
    <div class="card mx-auto mt-3 justify-content-center bg-light" style="width:50%">
        <div class="d-flex flex-column align-items-center bg-light" style="width:50%">
        <?php
                echo "<p>".$linha["pergunta"]."<br><br>";  
                $query2 = "select * from alternativas where pergunta_id = ".$linha["id"];
            
                $resultadoAlternativas = mysqli_query($conexao,$query2);

                $count = 1;
                while ($alternativas = mysqli_fetch_array($resultadoAlternativas)) 
                { ?>
                        <input type="radio" name="<?php echo $alternativas['pergunta_id']?>" value="<?php echo $count ?>"> <?php
                        echo $alternativas["alternativa"]."<br>";
                        $count++;
                        ?>
                <?php
                }
                echo "</p>";
            ?>
        </div>
    </div>
<?php   
    }
?>
    <div class="mx-auto mt-3" style="width:10%">
        <button type="submit">Enviar Questionario</button>
    </div>
</form>    


<?php include "rodape.php" ?>