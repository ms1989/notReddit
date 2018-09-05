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

        
            <div class="button">Button</div>
            <div class="button">Button</div>
            <div class="button">Button</div>

        </div>

        <div class="contentDisplay"> 
        <p>
        <?php 
                        
                        $type = $_GET['type']; 
                
                        echo '<div class="postTitle"><b>ERROR</b><br></div>';

                        if ($type == 'login') {

                            echo '<div class="textBlock">You need to be logged in to use this feature.</div><br><br>'; 
                    
                        } elseif ($type == 'doubleName') {

                            echo '<div class="textBlock">This name is already taken!</div><br><br>'; 

                        } elseif ($type == 'emptyPassword') {

                            echo '<div class="textBlock">Please enter a valid password.</div><br><br>'; 

                        } elseif ($type == 'wrongPassword') {
                            echo '<div class="textBlock">Wrong password or username.</div><br><br>'; 
                        }
                        
                        else {
                            echo '<div class="textBlock">Unknown Error</div><br><br>';

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


