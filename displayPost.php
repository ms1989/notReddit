<!DOCTYPE html>
<html lang="en">

<head>
    <title>NotReddit</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    

</head>


<body style="background-color: #bec8f4">
    <div class="mainCol"> 
        <div class="header">
            <h1><a href=main.php>NotReddit<a></h1> 
            
        </div>
        <div class="bar">
            <a class="button" href=newPost.php>New Post</a>

            <?php 
                session_start();
                if (!isset($_SESSION['userName'])) {
                    echo '<a class="button" href=newUser.php>Register New User</a>';

                } else {
                    echo '<a class="button" href=main.php>Profile</a>';

                }
            
            ?>


            <?php 
                
                if (!isset($_SESSION['userName'])) {
                    echo '<a class="button" href=loginSite.php>Login</a>';

                } else {
                    echo '<a class="button" href=logout.php>Logout</a>';

                }
            
            ?>

        
            <div class="button">Button1</div>
            <div class="button">Button1</div>
            <div class="button">Button1</div>

        </div>

        <div class="contentDisplay"> 
        <p>
        <?php 
                        $pdo = new PDO('mysql:host=localhost;dbname=notreddit', 'root', '');
                        $id = $_GET['id']; 
                        $sql = "SELECT * FROM posts WHERE id = $id";
                        $post = $pdo->query($sql)->fetch();
                      
                        echo '<div class="postTitle"><b>'.$post['title'].'</b><br>'.'<a class="postTitle" href=profile.php?user='.$post['autor'].'><sub>- '.$post['autor'].'</sub></a>'.'</div>';


                        echo '<div class="textBlock">'.$post['content'].'</div><br><br>';

                        echo '<div class="textBlock">'.'Posted on: '.$post['createdAt'].'</div>';
                    
                    ?>
                
                    </p>

        </div>


        <div class="footer"> 
            <p>Copyright NotReddit Foundation 20017-18. Responsibility for all content lies with its respective creators. Your data may be sold to Russian gangsters.</p>
        </div>                


    </div>
       



</body>

</html>


