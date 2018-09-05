<!DOCTYPE html>
<html lang="en">

<head>
    <title>NotReddit</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="script.js"></script>

</head>


<body onload="setupButtons()" style="background-color: #bec8f4">
    
    <div class="mainCol"> 
        <div class="header">
            <h1><a href=main.php>NotReddit<a></h1> 
            
        </div>
        <div class="bar">
            <a class="button" href=newPost.php>New Post</a>
            <a id="registerButton" class="button" href=newUser.php>Register New User</a>
            <a id="loginButton" class="button" href=loginSite.php>Login</a>     
            <div class="button">Button</div>
            <div class="button">Button</div>
            <div class="button">Button</div>

        </div>

        <div class="subHeader">
                <?php 
                    if (empty($_GET['page'])) {
                        $page = 0;
                        $lim = 5;
                        $nextPage = $page+1;
                        echo '<a class="scrollButton" href=main.php?page='.$nextPage.'><p>Next Page <b>></b></p></a>';
                        
                    } else {
                        $page = 5*$_GET['page'];
                        $lim = ($page*5)+5;

                        if ($_GET['page'] == 1) {
                            $nextPage = $_GET['page']+1;

                            echo '<a class="scrollButton" href=main.php?><p><b><</b> Previous Page</p></a>    ';
                            echo '<a class="scrollButton" href=main.php?page='.$nextPage.'><p>Next Page <b>></b></p></a>';

                        } else {
                            $nextPage = $_GET['page']+1;
                            $previousPage = $_GET['page']-1;

                            echo '<a class="scrollButton" href=main.php?page='.$previousPage.'><p><b><</b> Previous Page</p></a>    ';
                            echo '<a class="scrollButton" href=main.php?page='.$nextPage.'><p>Next Page <b>></b></p></a>';

                        }

                       




                    }


                ?>
        </div>

        <div class="contentDisplay"> 
        <p>
                        <?php 
                        session_start();
                        $pdo = new PDO('mysql:host=localhost;dbname=notreddit', 'root', '');

                    
                        
                        $getPosts = "SELECT * FROM posts LIMIT $page,$lim";

                        

                        foreach ($pdo->query($getPosts) as $row) {
                             

                            echo '<div class="postBox">
                            
                            <div class="postScore">'.$row['score'].'</div>
                            
                            <div class="upDown">';

                                    
                                    
                                    if (!isset($_SESSION['userName'])) {
                                        echo '<a class="vote" href=upvotePost.php?id='.$row['id'].'>😊</a> </br>';
                                        echo    '<a class="vote" href=downvotePost.php?id='.$row['id'].'>😠</a>';
                    
                                    } else {

                                        $user=$_SESSION['userName'];
                                        
                                        $getUpvote = "SELECT * FROM votes WHERE userID='$user' AND postID=$row[id] AND val=1";
                                        $upVote = $pdo->query($getUpvote)->fetch();

                                        if (!$upVote) {
                                            echo '<a class="vote" onclick="upvote()" href=upvotePost.php?id='.$row['id'].'>😊</a> </br>';
                                        } else {
                                            echo '<a class="vote" href=upvotePost.php?id='.$row['id'].'>😁</a> </br>';
                                        }

                                        $getDownvote = "SELECT * FROM votes WHERE userID='$user' AND postID=$row[id] AND val=-1";
                                        $downVote = $pdo->query($getDownvote)->fetch();

                                        if (!$downVote) {
                                            echo '<a class="vote" href=downvotePost.php?id='.$row['id'].'>😠</a>';
                                        } else {
                                            echo '<a class="vote" href=downvotePost.php?id='.$row['id'].'>😡</a>';
                                        }

                                        
                    
                                    }
                                
                            


                            


                            echo    '</div>
                                    <div class="innerPostBox">
                                    <a class="post" href=displayPost.php?id='.$row['id'].'>'.$row['title'].'</a></br>
                                    <sub><a class="subText" href=profile.php?user='.$row['author'].'>'.$row['author'].': '.$row['createdAt'].'</sub></a>
                                    </div>
                                    
                            </div>'; 

                            

                        }

                    
                
                
                
                        ?>
                    </p>

        </div>


        <div class="footer"> 
            <p>Copyright NotReddit Foundation 20017-18. Responsibility for all content lies with its respective creators. Your data may be sold to Russian gangsters.</p>
        </div>                


    </div>
       



</body>

</html>