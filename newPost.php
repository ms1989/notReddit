<!DOCTYPE html>
<html lang="en">

<head>
    <title>NotReddit</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    

</head>


<body onload="setupButtons()" style="background-color: #bec8f4">
    <div class="mainCol"> 
        <div class="header">
        <h1><a href=main.php>NotReddit<a></h1> 
            
        </div>
        <div class="bar">
            <a class="button" href=main.php>Main</a>

            <a id="registerButton" class="button" href=newUser.php>Register New User</a>

            <a id="loginButton" class="button" href=loginSite.php>Login</a>

        
            <div class="button">Button1</div>
            <div class="button">Button1</div>
            <div class="button">Button1</div>

        </div>

        <div class="contentDisplay"> 

        <div class="newPostBox">

            <form class="postForm" action="addPost.php" id="postForm" method="post">
            <input type="text" name="title" value="Title" class="inputLine" /><br/>
            </form>
            <textarea style="text-aling: left;" rows="25" cols="100" name="content" form="postForm" class="postBox">Post Content</textarea>
        
            <input type="Submit" value="Submit Post" form="postForm" class="postButton"/>';

        </div>      
                    
                
        </div>


        <div class="footer"> 
            <p>Copyright NotReddit Foundation 20017-18. Responsibility for all content lies with its respective creators. Your data may be sold to Russian gangsters.</p>
        </div>                


    </div>
       



</body>

</html>