<?php 

$userName = $_POST["userName"];
$password = $_POST["password"];

$pdo = new PDO('mysql:host=localhost;dbname=notreddit', 'root', '');

$sql = "SELECT * FROM users WHERE name='$userName'";
$matchedUser = $pdo->query($sql)->fetch();


if(password_verify($password, $matchedUser["password"])) {
    setcookie("notRedditUserName", $userName, 0);
    session_start();
    $_SESSION['userName'] = $userName;


    
    header("Location: main.php");


} else {
    header("Location: error.php?type=wrongPassword");
}


function alert($string) {
    echo "<script type='text/javascript'>alert(".$string.");</script>";

}
?>