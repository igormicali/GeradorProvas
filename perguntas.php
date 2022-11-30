<?php
include "cabecalho.php";
include "conexao.php";
    if(isset($_POST) && !empty($_POST)){
        if (empty($_POST["pergunta"])) {
            ?> 
               <div class="alert alert-danger">
               O campo de pergunta não pode estar vazio...
             </div>
           <?php
           }else{
            $pergunta = $_POST["pergunta"];
            $query = "insert into perguntas (pergunta) values('$pergunta')";
            $resultado = mysqli_query($conexao, $query);
            ?>
        <div class="alert alert-success">
           Pergunta registrada com sucesso...
        </div>
<?php
    }
}
if (isset($_GET["sucesso"]) && !empty($_GET["sucesso"])) {
    ?>
        <div class="alert alert-success">
            <?php echo $_GET["sucesso"]; ?>
        </div>
    <?php
    }
$query = "select * from perguntas";
$resultado = mysqli_query($conexao, $query);
?>
<div class="p-3 m-4 mx-auto" style="width: 80%;">
<form action="perguntas.php" method="post">
    <input type = "text" name="pergunta" class="form-control" style="width:25%; font-size:large"/>
    <br>
    <button type = "submit" class="btn btn-secondary"> Salvar </button>
</form>
</div>
<div class="card p-3 m-4 mx-auto " style="width: 80%; background-color:#f8f9fa;">
<table class="table table-bordered table-hover mx-auto" style="width: 75%;">
    <thead>
            <tr>
                <th>Código</th>
                <th>Pergunta</th>
                <th></th>
                <th></th>
            </tr>
    </thead>

    <tbody class="table-group-divider">
        <?php
            while($linha = mysqli_fetch_array($resultado)){
                echo"<tr style = 'border: 1px solid black'>";
                echo"<td>".$linha['id']."</td>";
                echo"<td>".$linha['pergunta']."</td>";
                echo"<td class='bg-secondary bg-gradient' style='text-align:center' > <a style = 'text-decoration: none; color:black ' href='alternativas.php?pergunta_id=".$linha['id']."'> Lista de Alternativas</a> </td>";
                echo"<td class='bg-danger bg-gradient' style='text-align:center'> <a style = 'text-decoration: none; color:black;' href='delete.php?id=".$linha['id']."'> Excluir </a>  </td>";
                echo"</tr>";
            }
        ?>
    </tbody>
</table>
</div>
<?php include "rodape.php" ?>