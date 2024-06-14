<?php
require_once('./function.php');
ob_start();
if (isset($_POST['idturma'])) {
    $idturma = $_POST['idturma'];
    $data = delete('tbturma', 'idturma', $idturma);
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);
ob_end_flush();
