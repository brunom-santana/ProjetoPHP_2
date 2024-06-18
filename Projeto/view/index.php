<?php require 'navbar.php' ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .titulo {
            background-size: cover;
            text-align: center;
            padding: 100px 0;
            margin-bottom: 0;
        }
        .event-card {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="titulo">
        <div class="container">
            <h1>Próximos Eventos</h1>
            <p class="lead">Confira os eventos que estão por vir!</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
        <div class="col-md-4">
                <div class="event-card">
                    <div class="card-body">
                    <?php
                        require '../dao/conectaBanco.php';


                        $evento = "SELECT `nome`, `local`, `data` FROM `eventos`";
                        $resultado = mysqli_query($sql, $evento);

                        if($resultado){
                            while($linha = mysqli_fetch_assoc($resultado)){
                                $nome = $linha['nome'];
                                $local = $linha['local'];
                                $data = $linha['data'];

                                echo "<h3>$nome</h3>";
                                echo "Data: $data";
                                echo "<p>Local: $local.</p>";
                                
                            }
                        }
                        $sql->close();
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
