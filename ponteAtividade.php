<?php
require_once("./connection.php");
require_once("./function.php");
$idturma = $_POST['idturma'];
$conn = connect();
?>

<head>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <script src="./js/bootstrap.js" defer></script>
    <script src="./js/jQuery.js" defer></script>
    <script src="./js/script.js" defer></script>
    <script src="./js/sweetAlert.js" defer></script>
</head>

<body>
    <div class="container mt-3">
        <div class="d-flex mb-4" style="justify-content: space-between;">
            <button type="button" class="btn btn-primary" onclick="carregarConteudo('turma')">Voltar</button>
            <button type="button" class="btn btn-primary">Cadastrar atividade</button>
        </div>
        <p><b>Turma: </b><?php
                            $conn->beginTransaction();
                            $selectNomeTurma = $conn->prepare("SELECT nome FROM tbturma WHERE idturma = $idturma");
                            $selectNomeTurma->execute();
                            $conn->commit();
                            if ($selectNomeTurma->rowCount() > 0) {
                                foreach ($selectNomeTurma as $row) {
                                    $nomeTurma = $row['nome'];
                                    echo ($nomeTurma);
                                }
                            }
                            ?></p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Número</th>
                    <th scope="col">Nome</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn->beginTransaction();
                $select = $conn->prepare("SELECT idatividade, nome FROM tbatividade WHERE idturma = $idturma");
                $select->execute();
                $conn->commit();
                if ($select->rowCount() > 0) {
                    foreach ($select as $row) {
                        $idatividade = $row['idatividade'];
                        $nome = $row['nome'];
                ?>
                        <tr>
                            <th scope="row"><?php echo ($idatividade) ?></th>
                            <td><?php echo ($nome) ?></td>
                        </tr>
                    <?php }
                } else { ?>
            </tbody>
        </table>
    <?php echo ('<center><h3>Nenhuma atividade encontrada!</h3></center>');
                } ?>
    </div>
</body>