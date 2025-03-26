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
    
    <form action="exer3.php" method="POST">
        <?php for($i=0;$i<5;$i++): ?>
            <input type="number" name="cod[]" placeholder="cod"/>
            <input type="text" name="nome[]" placeholder="nome"/>
            <input type="number" name="preco[]" placeholder="preco"/>
            <br/>
        <?php endfor; ?>
            
        <button type="subit">Enviar</button>

    </form>

    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        try{
            $produto = array();
            $desconto=0;
            for($i=0;$i<5;$i++){
                $codigo = $_POST['cod'][$i];
                $nome = $_POST['nome'][$i];
                $preco = $_POST['preco'][$i];
                if($preco > 100){
                    $desconto = $preco - ($preco * (0.1));
                    $preco = $desconto;
                }
                $produto[$codigo]=['nome'=>$nome,'preco'=>$preco];
            }
            uasort($produto,fn($a,$b) => strcmp($a['nome'], $b['nome']) ); //Ordena o array pela média em ordem decrescente
            foreach ($produto as $codigo => $dados) {
                echo"$dados[nome] - R$ $dados[preco]<br>";
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