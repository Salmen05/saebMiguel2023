<?php
require_once("./connection.php");
require_once("./function.php");
$idprofessor = $_SESSION['idprofessor'];
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
        <div class="d-flex justify-content-end mb-3">
            <button type="button" class="btn btn-primary" onclick="addTurma();">Adicionar turma</button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Número</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = connect();
                $conn->beginTransaction();
                $select = $conn->prepare("SELECT idturma, nome FROM tbturma WHERE idprofessor = $idprofessor");
                $select->execute();
                $conn->commit();
                if (empty($select)) {
                ?> A tabela está vazia! <?php
                                    } else {
                                        foreach ($select as $table) {
                                            $idturma = $table['idturma'];
                                            $nome = $table['nome'];
                                        ?>
                        <tr>
                            <th scope="row"><?php echo ($idturma) ?></th>
                            <td><?php echo ($nome) ?></td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="deletarTurma(<?php echo ($idturma) ?>)">Excluir</button>
                                <button type="button" class="btn btn-success ms-1" onclick="visualizarTurma(<?php echo ($idturma) ?>)">Visualizar</button>
                            </td>
                        </tr>
                <?php

                                        }
                                    }
                ?>
            </tbody>
        </table>
    </div> <!--//? Modal Add -->
    <div class="modal fade" id="modalAddTurma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formAddTurma" name="formAddTurma">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="addNomeTurma">Nome da turma</label>
                                <input type="text" class="form-control" id="addNomeTurma" name="addNomeTurma">
                            </div>
                            <div class="col-md-12">
                                <input type="hidden" class="form-control" id="idprofessor" name="idprofessor" value="<?php echo ($idprofessor) ?>">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="alert alert-warning alert-dismissible" style="display: none; width: 100%;" role="alert" id="alert">
                        O nome deve conter no mínimo 6 letras!
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="btnAdd">Adicionar</button>
                </div>
            </div>
        </div>
    </div> <!--//! Modal Delete -->
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Você tem certeza?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="bodyModalDelete">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-danger" id="btnModalDeletar">Deletar</button>
                </div>
            </div>
        </div>
    </div>
</body>