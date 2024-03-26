<?php
require_once 'config.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $id = $_POST["id"];

    $_SESSION['inputs'] = [
        'firstname' => $firstname,
        'lastname' => $lastname,
        'id' => $id
    ];
            if(empty($firstname)) {
                $_SESSION['errors']['firstname'] = "Firstname is a required field.";
            }
            if(empty($lastname)) {
                $_SESSION['errors']['lastname'] = "Lastname is a required field.";
            }
            if(empty($id)) {
                $_SESSION['errors']['id'] = "ID no. is a required field.";
            }
            if(isset($_SESSION['errors'])) {
            header('Location: ../register.php');
            exit();
        }

        try {
            require_once "dbc.inc.php";

        $query = "INSERT INTO users (firstname, lastname, id) VALUES (:firstname, :lastname, :id);";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":firstname", $firstname);
        $stmt->bindParam(":lastname", $lastname);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location: ../register.php");
        die();


    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../register.php");
    exit();
}