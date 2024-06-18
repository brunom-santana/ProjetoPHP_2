<?php 
require '../dao/conectaBanco.php';
require '../view/participantes.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    if (empty($nome) || empty($email)) {
        echo "Todos os campos são obrigatórios.";
    } else {
        $inserir = "INSERT INTO participantes (nome, email) VALUES ('$nome', '$email')";
        $sql->query($inserir);
        if ($inserir) {
            echo "<strong>Participante adicionado com sucesso.</strong>";
        } else {
            echo "<strong>Erro ao adicionar participante.</strong>";
        }
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM participantes WHERE id = $id";
    $sql->query($delete);
    if ($delete){
        echo "<strong>Participante deletado com sucesso.</strong>";
    } else {
        echo "<strong>Erro ao deletar participante.</strong>";
    }
}

$participantes = $sql->query("SELECT * FROM participantes");
?>
    <h2>Lista de Participantes</h2>
        <ul>
            <?php while ($participante = $participantes->fetch_assoc()): ?>
                <li>
                    <?php echo $participante['nome']; ?> - <?php echo $participante['email']; ?>
                    <a href="?delete=<?php echo $participante['id']; ?>">Deletar</a>
                </li>
            <?php endwhile; ?>
        </ul>