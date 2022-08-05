<?php
// データベースに接続
function connectDB() {
    $param = 'mysql:dbname=ec_sitedb;host=localhost';
    try {
        $pdo = new PDO($param, 'root', 'password');
        return $pdo;

    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}
?>