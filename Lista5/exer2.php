<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <div class = "container mt-5">
  <h1>Lista 5 Exercicio 2</h1>
    
    <form action="exer2.php" method="POST">
        <?php for($i=0;$i<5;$i++): ?>
            <input type="text" name="nome[]" placeholder="Nome"/>
            <input type="number" name="nota1[]" placeholder="Nota_1"/>
            <input type="number" name="nota2[]" placeholder="Nota_2"/>
            <input type="number" name="nota3[]" placeholder="Nota_3"/>
            <br/>
        <?php endfor; ?>
            
        <button type="subit">Enviar</button>

    </form>

    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        try{
            $aluno = array();
            for($i=0;$i<5;$i++){
                $nome = $_POST['nome'][$i];
                $nota1 = $_POST['nota1'][$i];
                $nota2 = $_POST['nota2'][$i];
                $nota3 = $_POST['nota3'][$i];
                $media =($nota1+$nota2+$nota3) /3;
                // Adiciona ao array associativo com o nome como chave
                $aluno[$nome]=$media;
            }
            arsort($aluno); //Ordena o array pela média em ordem decrescente
            echo"<h2>Alunos e médias</h2>";
            foreach ($aluno as $nome => $media){
                echo"$nome: ". number_format($media,2)."<br>";
            }

                                                    
        }catch(Exception $e){
            echo $e->getMessage();
        }
        
        }
        

    ?>
    <br>
</div>   



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>