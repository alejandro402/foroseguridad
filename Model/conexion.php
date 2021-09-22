<?php 

$link = 'mysql:host=localhost;dbname=foroseguridadcol';
$usuario = 'root';
$pass = '';

try {
    $pdo = new PDO($link,$usuario,$pass);
    $pdo->exec("set names utf8");
    //echo "conectado";
} catch (PDOException $e) {
    print "ERROR!: " . $e->getMessage() . "<br/>";
    die();
}

?>