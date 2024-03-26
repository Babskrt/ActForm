<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lastname = $_POST["lastname"];
    $id = $_POST["id"];

    // $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    try {
    require_once "dbc.inc.php";
        $query = "SELECT * FROM myformdb WHERE lastname = :lastname AND id = :id;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":lastname", $lastname);
        $stmt->bindParam(":id", $id);
        $stmt->execute();


        if ($stmt->rowCount() > 0) {
            session_start();
            $_SESSION["lastname"] = $lastname;
            echo "<script>alert('Sucessfully Login!'); window.location.href='../index.php';</script>";
            die();
        } else {
            echo "<script>alert('Invalid Login Credentials'); window.location.href='../login.php';</script>";
            die();
        }

        $pdo = null;
        $stmt = null;
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
}