<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulado</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">

</head>
<body>
    
<?php
include "conexao.php";

//$query = "select * from perguntas p inner join alternativas a on (p.id = a.id_pergunta) "

$query = "select * from perguntas";
$resultado = mysqli_query($conexao, $query);
?>
<form action="resultado.php" method="post">

<?php
while($linha = mysqli_fetch_array($resultado))
{
    echo "<h2>".$linha["id"]. "  -  ".$linha["pergunta"]."</h2>";
    $query2 = "select * from alternativas where pergunta_id = ".$linha["id"];
    $resultado2 = mysqli_query($conexao,$query2);
    $contagem = 1;
    while($linha2 = mysqli_fetch_array($resultado2)){
        ?>
            <p>
                <input type="radio" 
                        name="<?php echo $linha["id"];?>" 
                        value="<?php echo $contagem; ?>" >
                        <?php echo $linha2["alternativa"]; ?>
            </p>
        <?php
        $contagem++;
    }

}
?>
<button type="submit">Enviar Questionario</button>
</form>

</body>

</html>