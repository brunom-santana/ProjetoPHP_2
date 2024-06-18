<?php
require '../dao/conectaBanco.php';
require '../view/eventos.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $data = $_POST['data'];
    $local = $_POST['local'];

    if (empty($nome) || empty($data) || empty($local)) {
        echo "Todos os campos são obrigatórios.";
    } else {
        $inserir = "INSERT INTO eventos (nome, data, local) VALUES ('$nome', '$data', '$local')";
        $sql->query($inserir);
        if ($inserir) {
            echo "Evento adicionado com sucesso.";
        } else {
            echo "Erro ao adicionar evento.";
        }
        
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM eventos WHERE id = $id";
    $sql->query($delete);
    if ($delete) {
        echo "Evento deletado com sucesso.";
    } else {
        echo "Erro ao deletar evento.";
    }

}
$eventos = $sql->query("SELECT * FROM eventos");
?>
    <h2>Lista de Eventos</h2>
    <ul>
        <?php while ($evento = $eventos->fetch_assoc()): ?>
            <li>
                <?php echo $evento['nome']. " ". $evento['data']. " ". $evento['local'];?>
                <a href="?delete=<?php echo $evento['id']; ?>">Deletar</a>
            </li>
        <?php endwhile; ?>
    </ul>
<?php 
$eventos->close();
?>
