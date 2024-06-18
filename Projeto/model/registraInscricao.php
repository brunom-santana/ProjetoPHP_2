<?php
require '../dao/conectaBanco.php';
require '../view/inscricoes.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $evento_id = $_POST['evento_id'];
    $participante_id = $_POST['participante_id'];

    if (empty($evento_id) || empty($participante_id)) {
        echo "Todos os campos são obrigatórios.";
    } else {
        $inserir = "INSERT INTO inscricoes (evento_id, participante_id) VALUES ('$evento_id', '$participante_id')";
        $sql->query($inserir);
        if ($inserir) {
            echo "Inscrição adicionada com sucesso.";
        } else {
            echo "Erro ao adicionar inscrição.";
        }
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM inscricoes WHERE id = $id";
    $sql->query($delete);
    if ($delete) {
        echo "Inscrição deletada com sucesso.";
    } else {
        echo "Erro ao deletar inscrição.";
    }
}

$inscricoes = $sql->query("SELECT i.id, e.nome AS evento, p.nome AS participante FROM inscricoes i 
JOIN eventos e ON i.evento_id = e.id 
JOIN participantes p ON i.participante_id = p.id");
?>
    <h2>Lista de Inscrições</h2>
    <ul>
        <?php while ($inscricao = $inscricoes->fetch_assoc()): ?>
            <li>
                <?php echo $inscricao['evento']; ?> - <?php echo $inscricao['participante']; ?>
                <a href="?delete=<?php echo $inscricao['id']; ?>">Deletar</a>
            </li>
        <?php endwhile; ?>
    </ul>