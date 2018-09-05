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

        <div class="contentDisplay"> 
        <p>
        <?php 
                        session_start();
                        $pdo = new PDO('mysql:host=localhost;dbname=notreddit', 'root', '');
                        $user = $_GET['user'];
                        
                        echo '<div class="postTitle"><b>'.$user.'</b></div>';

                        $getPosts = "SELECT * FROM posts WHERE author = '$user'";

                        foreach ($pdo->query($getPosts) as $row) {
                            echo '<div class="profileBox">
                                    
                                    
                                    <a class="post" href=displayPost.php?id='.$row['id'].'>'.$row['title'].'</a></br>
                                    <sub><a class="subText" href=profile.php?user='.$row['author'].'>'.$row['author'].': '.$row['createdAt'].'</sub></a>
                                    
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
