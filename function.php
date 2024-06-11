<?php
require_once('./connection.php');
function updateFiveValues($table, $fields, $id, )
{
    try {
        $conn = connect();
        $conn->beginTransaction();
        $update = $conn->prepare("UPDATE $table SET $fields WHERE id = :id");
        $update->bindParam(":valueOne", $valueOne);
        $update->bindParam(":valueTwo", $valueTwo);
        $update->bindParam(":valueThree", $valueThree);
        $update->bindParam(":valueFour", $valueFour);
        $update->bindParam(":valueFive", $valueFive);
        $update->bindParam(":idtask", $id);
        $update->execute();
        $conn->commit();
        $response = [
            'message' => 'Edição executada com sucesso.',
            'success' => true,
        ];
        return $response;
    } catch (PDOException $e) {
        $conn->rollBack();
        echo ('ERROR - ' . $e->getMessage());
        $response = [
            'message' => 'Erro ao executar edição.',
            'success' => false,
        ];
        return $response;
    }
}
function insertOneField($table, $fields, $valueOne)
{
    try {
        $conn = connect();
        $conn->beginTransaction();
        $insert = $conn->prepare("INSERT INTO $table ($fields) VALUES (:valueOne)");
        $insert->bindParam(":valueOne", $valueOne);
        $insert->execute();
        $conn->commit();
        $response = [
            'message' => 'Inserção executada com sucesso.',
            'success' => true,
        ];
        return $response;
    } catch (PDOException $e) {
        $conn->rollBack();
        echo ('ERROR - ' . $e->getMessage());
        $response = [
            'message' => 'Erro ao executar inserção.',
            'success' => false,
        ];
        return $response;
    }
    $conn = null;
}
function insertTwoFields($table, $fields, $valueOne, $valueTwo)
{
    try {
        $conn = connect();
        $conn->beginTransaction();
        $insert = $conn->prepare("INSERT INTO $table ($fields) VALUES (:valueOne, :valueTwo)");
        $insert->bindParam(":valueOne", $valueOne);
        $insert->bindParam(":valueTwo", $valueTwo);
        $insert->execute();
        $conn->commit();
        $response = [
            'message' => 'Inserção executada com sucesso.',
            'success' => true,
        ];
        return $response;
    } catch (PDOException $e) {
        $conn->rollBack();
        echo ('ERROR - ' . $e->getMessage());
        $response = [
            'message' => 'Erro ao executar inserção.',
            'success' => false,
        ];
        return $response;
    }
    $conn = null;
}
function insertThreeFields($table, $fields, $valueOne, $valueTwo, $valueThree)
{
    try {
        $conn = connect();
        $conn->beginTransaction();
        $insert = $conn->prepare("INSERT INTO $table ($fields) VALUES (:valueOne, :valueTwo, :valueThree)");
        $insert->bindParam(":valueOne", $valueOne);
        $insert->bindParam(":valueTwo", $valueTwo);
        $insert->bindParam(":valueThree", $valueThree);
        $insert->execute();
        $conn->commit();
        $response = [
            'message' => 'Inserção executada com sucesso.',
            'success' => true,
        ];
        return $response;
    } catch (PDOException $e) {
        $conn->rollBack();
        echo ('ERROR - ' . $e->getMessage());
        $response = [
            'message' => 'Erro ao executar inserção.',
            'success' => false,
        ];
        return $response;
    }
    $conn = null;
}
function insertFourFields($table, $fields, $valueOne, $valueTwo, $valueThree, $valueFour)
{
    try {
        $conn = connect();
        $conn->beginTransaction();
        $insert = $conn->prepare("INSERT INTO $table ($fields) VALUES (:valueOne, :valueTwo, :valueThree, :valueFour)");
        $insert->bindParam(":valueOne", $valueOne);
        $insert->bindParam(":valueTwo", $valueTwo);
        $insert->bindParam(":valueThree", $valueThree);
        $insert->bindParam(":valueFour", $valueFour);
        $insert->execute();
        $conn->commit();
        $response = [
            'message' => 'Inserção executada com sucesso.',
            'success' => true,
        ];
        return $response;
    } catch (PDOException $e) {
        $conn->rollBack();
        echo ('ERROR - ' . $e->getMessage());
        $response = [
            'message' => 'Erro ao executar inserção.',
            'success' => false,
        ];
        return $response;
    }
    $conn = null;
}
