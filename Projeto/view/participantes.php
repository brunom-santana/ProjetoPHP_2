<?php
require '../dao/conectaBanco.php';
require '../view/navbar.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Pagina de Participantes</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h1>Participantes</h1>
                <form method="POST" action="../model/registraParticipante.php">
                    <label class="form-label">Nome:</label>
                    <input class="form-control" type="text" name="nome" required>

                    <label class="form-label">Email:</label>
                    <input class="form-control mb-3" type="email" name="email" required>

                    <button class="btn btn-danger" type="submit">Adicionar Participante</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>