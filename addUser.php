<?php 

$userName = $_POST["userName"];
$password = trim($_POST["password"]);

$pdo = new PDO('mysql:host=localhost;dbname=notreddit', 'root', '');

$sql = "SELECT * FROM users WHERE name='$userName'";

$matchedUser = $pdo->query($sql)->fetch();

if ($matchedUser) {
    header("Location: error.php?type=doubleName");

} else {

    if (strlen($password) > 0) {

        $enc = password_hash($password, PASSWORD_DEFAULT);

        $statement = $pdo->prepare("INSERT INTO users (name, password) VALUES (?, ?)");

        $statement->execute(array($userName, $enc));

        header("Location: main.php"); 
    } else {
        header("Location: error.php?type=emptyPassword");

    }

}





?> 