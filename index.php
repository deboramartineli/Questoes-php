<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ibidiesel</title>
  <link rel="stylesheet" href="./css2/cabecalho.css">
  <link rel="stylesheet" href="./css2/empresas.css">
  <link rel="stylesheet" href="./css2/banner.css">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Questionário on line</a>

  </div>

</nav>


    <?php

    include "conexao.php";

    if (isset($_POST) && !empty($_POST)) {
        $pergunta = $_POST["pergunta"];
        $a = $_POST["A"];
        $b = $_POST["B"];
        $c = $_POST["C"];
        $d = $_POST["D"];
        $e = $_POST["E"];
        $correta = $_POST["correta"];
        if (empty($pergunta)) {
    ?>


             <div class="alert alert-danger" role="alert">
                 Registre sua pergunta
             </div>


    <?php

        }else if (empty($a)) {
   ?>
        <div id="liveAlertPlaceholder"></div>
            <button type="button" class="btn btn-danger" id="liveAlertBtn">
                Você esqueceu de dar a resposta A
            </button>
    <?php

        }else if (empty($b)) {  
    ?>
             <div class="alert alert-danger" role="alert">
                 Inclua todas respostas
             </div>
             <?php

        }else if (empty($c)) {  
    ?>
            <div class="alert alert-danger" role="alert">
                Inclua todas respostas
            </div> 

            <?php

        }else if (empty($d)) {  
    ?>
             <div class="alert alert-danger" role="alert">
                 Inclua todas respostas
             </div>

             <?php

        }else if (empty($e)) {  
    ?>
             <div class="alert alert-danger" role="alert">
                 Inclua todas respostas
             </div>
    <?php
    

        }else if (empty($correta)) {  
    ?>
            <div class="alert alert-danger" role="alert">
                Escolha a resposta correta
            </div>
      
     <?php
        }else{

       


        $query = "insert into questoes (pergunta,a,b,c,d,e,correta) ";
        $query = $query . " values('$pergunta','$a','$b','$c','$d','$e','$correta')";
        $resultado = mysqli_query($conexao, $query);
    }
    }
    ?>
    <a href="./resultado.php">Resultado</a>
    <a href="./questoes.php">Questionário</a>


    <div class="row justify-content-center ">
    
        <div class="col-md-4 col-sm-12 border border-light border-2 ">
            <div class="mb-3 ">
                <form action="./index.php" method="post">
                

                
                    <label>Registre sua pergunta</label>
                    <br>
                    <textarea class="form-label form-control" name="pergunta"></textarea>


                    <br><br>

                    <label>A)</label>
                    <input class="form-check-input" type="radio" name="correta" value="A" />
                    <input class="form-control" type="text" name="A" />

                    <br><br>

                    <label>B)</label>
                    <input class="form-check-input" type="radio" name="correta" value="B" />
                    <input class="form-control" type="text" name="B" />

                    <br><br>

                    <label>C)</label>
                    <input class="form-check-input" type="radio" name="correta" value="C" />
                    <input class="form-control" type="text" name="C" />

                    <br><br>

                    <label>D)</label>
                    <input class="form-check-input" type="radio" name="correta" value="D" />
                    <input class="form-control" type="text" name="D" />

                    <br><br>

                    <label>E)</label>
                    <input class="form-check-input" type="radio" name="correta" value="E" />
                    <input class="form-control" type="text" name="E" />

                    <br><br>

                    <button class="btn btn-success" type="submit">Salvar Pergunta</button>

                </form>
                
            </div>
        </div>
    </div>
    
    <br>
   
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