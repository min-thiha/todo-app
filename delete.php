<?php
    require_once "config.php";
    $statement = $pdo->prepare("DELETE FROM todo WHERE id = :id");
    $statement->bindParam(":id", $_GET['id']);
    $statement->execute();
    header("location:index.php");
?>