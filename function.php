<?php
require_once('./connection.php');
function select($fields, $table)
{
    try {
        $conn = connect();
        $conn->beginTransaction();
        $select = $conn->prepare("SELECT $fields FROM $table");
        $select->execute();
        $conn->commit();
        return $select;
    } catch (PDOException $e) {
        $conn->rollBack();
        echo ('ERROR - ' . $e->getMessage());
    }
}
function delete($table, $where, $id)
{
    try {
        $conn = connect();
        $conn->beginTransaction();
        $delete = $conn->prepare("DELETE FROM $table WHERE $where = $id");
        $delete->execute();
        $conn->commit();
        $response = [
            'message' => 'Delete executado com sucesso.',
            'success' => true,
        ];
        return $response;
    } catch (PDOException $e) {
        $conn->rollBack();
        echo ('ERROR - ' . $e->getMessage());
        $response = [
            'message' => 'Erro ao executar delete.',
            'success' => false,
        ];
        return $response;
    }
}
function selectLogin($fields, $table, $fieldVerifier, $value)
{
    try {
        $conn = connect();
        $conn->beginTransaction();
        $select = $conn->prepare("SELECT $fields FROM $table WHERE $fieldVerifier = :value");
        $select->bindParam(":value", $value);
        $select->execute();
        $conn->commit();
        return $select;
    } catch (PDOException $e) {
        $conn->rollBack();
        echo ('ERROR - ' . $e->getMessage());
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
