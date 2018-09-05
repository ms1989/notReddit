<?php 

session_start();

if (isset($_SESSION['userName'])){

    $title = $_POST["title"];
    $userName = $_SESSION['userName'];
    $content = $_POST["content"];

    $pdo = new PDO('mysql:host=localhost;dbname=notreddit', 'root', '');


    $statement = $pdo->prepare("INSERT INTO posts (title, content, author) VALUES (?, ?, ?)");

    $statement->execute(array($title, $content, $userName));

    header("Location: main.php");
} else {header("Location: error.php?type=login");}

?> 