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
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="./dashboard.php">Início</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Listas
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" onclick="carregarConteudo('turma');">Turmas</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="carregarConteudo('atividade');">Atividades</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div id="conteudo">

    </div>
</body>

</html>