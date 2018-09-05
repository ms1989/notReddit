<?php 

session_start();

if (isset($_SESSION['userName'])){

    $postID = $_GET["id"];
    $userID = $_SESSION['userName'];
    
    $pdo = new PDO('mysql:host=localhost;dbname=notreddit', 'root', '');

    $getVote = "SELECT * FROM votes WHERE postID ='$postID' AND userID ='$userID'";
    $vote = $pdo->query($getVote)->fetch();
    
    if (!$vote) {
        /*if there is no existing upvote*/

        $newVote = "INSERT INTO votes (postID, val, userID) VALUES ('$postID', -1, '$userID')";
        $pdo->query($newVote);

        $lowerScore = "UPDATE posts SET score=score-1 WHERE id='$postID'";
        $pdo->query($lowerScore);



    } else {
       /*if there is an existing vote*/

            if ($vote['val'] == -1) {

                $deleteUpvote = "DELETE FROM votes WHERE postID='$postID' AND userID='$userID' AND val=-1";
                $pdo->query($deleteUpvote);

                $increaseScore = "UPDATE posts SET score=score+1 WHERE id='$postID'";
                $pdo->query($increaseScore); 


            } else {
                $deleteUpvote = "DELETE FROM votes WHERE postID='$postID' AND userID='$userID' AND val=1";
                $pdo->query($deleteUpvote);

                $newVote = "INSERT INTO votes (postID, val, userID) VALUES ('$postID', -1, '$userID')";
                $pdo->query($newVote);

                $lowerScore = "UPDATE posts SET score=score-2 WHERE id='$postID'";
                $pdo->query($lowerScore);

            }


    }


    

    header("Location: main.php");
} else {header("Location: error.php?type=login");}

?> 