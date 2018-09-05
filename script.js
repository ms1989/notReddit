function setupButtons(){

    if (checkCookie('notRedditUserName')) {

        var name = getCookie('notRedditUserName');
        
        var loginButton = document.getElementById('loginButton');
        loginButton.setAttribute('href', 'logout.php');
        loginButton.setAttribute('onclick', 'logout()');
        loginButton.innerHTML = "Log Out";

        var registerButton = document.getElementById('registerButton');
        registerButton.setAttribute('href', 'profile.php?user=' + name);
        registerButton.innerHTML = getCookie('notRedditUserName');

    }


}

function logout() {
    document.cookie = "notRedditUserName=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";  
}



function hello() {
    document.write("hello");
}

function getLoginButton() {

    //if there is an active session
    //return the profile button

    //else return login button
    var loginButton = document.getElementById('loginButton');
    loginButton.setAttribute('href', 'profile.html');

}

function validate() {

    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    if (username == "peter" && password == "peter") {
        alert("Login good");

    } else {
        alert("login bad");
    }

}

function checkCookie(name) {
    var username = getCookie(name);
    if (username != "") {
        return true;
    } else {
        return false;
    }
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function setupPostingSite(){

    
}


function upvote(rowNum){
    $rowNum = rowNum;

    if (!isset($clicked)) {
        $clicked = true;
        alert("boobs");



    }
    
    



}

