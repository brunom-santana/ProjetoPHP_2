<?php
require '../dao/conectaBanco.php';
require '../view/navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gerenciar Inscrições</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1>Inscrições</h1>
    <form method="POST" action="../model/registraInscricao.php">
        <label>Evento:</label>
        <select name="evento_id" required>
            <?php
            $eventos = $sql->query("SELECT id, nome FROM eventos");
            while ($evento = $eventos->fetch_assoc()): ?>
                <option value="<?php echo $evento['id']; ?>"><?php echo $evento['nome']; ?></option>
            <?php endwhile; ?>
        </select>
        <label>Participante:</label>
        <select name="participante_id" required>
            <?php
            $participantes = $sql->query("SELECT id, nome FROM participantes");
            while ($participante = $participantes->fetch_assoc()): ?>
                <option value="<?php echo $participante['id']; ?>"><?php echo $participante['nome']; ?></option>
            <?php endwhile; ?>
        </select>
        <button type="submit">Adicionar Inscrição</button>
    </form>
</body>
</html>
