<?php
session_start();
if (isset($_POST['page'])) {
    $page = $_POST['page'];
    switch ($page) {
        case 'turma':
            require_once("./turma.php");
            break;
        case 'atividade':
            require_once("./atividade.php");
            break;
    }
}
