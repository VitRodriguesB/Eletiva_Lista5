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
  <h1>Lista 5 Exercicio 1</h1>
    
    <form action="exer1.php" method="POST">
        <?php for($i=0;$i<5;$i++): ?>
            <input type="text" name="nome[]" placeholder="Nome"/>
            <input type="number" name="tel[]" placeholder="Telefone"/>
            <br/>
        <?php endfor; ?>
            
        <button type="subit">Enviar</button>

    </form>

    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        try{
            $a = array();
            for($i=0;$i<5;$i++){
                $nome = $_POST['nome'][$i];
                $tel = $_POST['tel'][$i];
                if(!isset($a[$nome])&& !in_array($tel, $a)){ //isset verifica se a variavel foi iniciada
                    //in_array verifica se o valor existe no array
                    $a[$nome] = $tel;
                }
            }
            ksort($a); //ordena o array pela chave
            foreach ($a as $nome => $tel){ //percorre o array
                echo"$nome - $tel <br>";
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