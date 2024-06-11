<?php
function connect()
{
    try {
        $conn = new PDO("mysql:dbname=saep_db; host=localhost", "root", "");
        $conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    } catch (PDOException $e) {
        $conn = "ERROR - " . $e->getMessage();
    }
    return $conn;
}
