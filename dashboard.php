<?php
session_start();
if (!isset($_SESSION['idprofessor'])) {
    header("Location: ./logout.php");
}
$idprofessor = $_SESSION['idprofessor'];
$nomeProfessor = $_SESSION['nome'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard do professor</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/bootstrap.js" defer></script>
    <script src="./js/jQuery.js" defer></script>
    <script src="./js/script.js" defer></script>
    <script src="./js/sweetAlert.js" defer></script>
</head>

<body>
    <div id="navBar" class="bg-bg-body-tertiary">
        <div style=" width: 100%; display: flex; justify-content: space-between;">
            <h3 class="ms-3"><?php echo ($nomeProfessor) ?></h3>
            <a class="btn btn-danger d-flex" href="logout.php">Sair</a>
        </div>
        <nav class="navbar">
            <div class="container-fluid">
            </div>
        </nav>
    </div>
    <div id="conteudo">

    </div>
</body>

</html>