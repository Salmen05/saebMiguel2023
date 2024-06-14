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
            <button type="button" class="btn btn-primary" onclick="addAtividade();">Adicionar atividade</button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Número</th>
                    <th scope="col">Nome</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                </tr>
            </tbody>
        </table>
</body>