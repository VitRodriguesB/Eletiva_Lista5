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
    
    <form action="exer4.php" method="POST">
        <?php for($i=0;$i<5;$i++): ?>
            <input type="text" name="nome[]" placeholder="nome"/>
            <input type="number" name="preco[]" placeholder="preco"/>
            <br/>
        <?php endfor; ?>
            
        <button type="subit">Enviar</button>

    </form>

    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        try{
            $itens = array();
            $imposto = 0.0;
            for($i=0;$i<5;$i++){
                $nome = $_POST['nome'][$i];
                $preco = $_POST['preco'][$i];
                $imposto = $preco * 1.25;
                $preco = $imposto;
                $itens[$nome]=$preco;
            }
            asort($itens); //Ordena o array pela média em ordem decrescente
            foreach ($itens as $nome => $preco) {
                echo"$nome - R$ $preco<br>";
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