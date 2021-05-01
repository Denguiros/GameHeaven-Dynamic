<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$err = null;
$succ=null;


/*
            *****PROFILE EDITING ERRORS ******
*/
//Handle password change errors
if(isset($_SESSION["passwordsNotMatch"])){
    $err = "Passwords don't match, please try again";
    unset($_SESSION["passwordsNotMatch"]);
}
if(isset($_SESSION["passwordChanged"])){
    $succ="Password changed successfully";
    unset($_SESSION["passwordChanged"]);
}

if(isset($_SESSION["errorPassChange"])){
    $err="Error changing password, please try again later";
    unset($_SESSION["errorPassChange"]);
}
//Handle profile edit 
if(isset($_SESSION["profileEdited"])){
    $succ="Profile info changed successfully";
    unset($_SESSION["profileEdited"]);
}

if(isset($_SESSION["profileEditError"])){
    $err="Error editing profile info, please try again later";
    unset($_SESSION["profileEditError"]);
}

//Handle profile picture edit
if(isset($_SESSION["profielPicError"])){
    $err = $_SESSION["profielPicError"];
    unset($_SESSION["profielPicError"]);
}

if(isset($_SESSION["profielPicSucc"])){
    $succ = $_SESSION["profielPicSucc"];
    unset($_SESSION["profielPicSucc"]);
}

/*
        ****AUTH ERRORS****
*/

//Handle register errors
if(isset($_SESSION["errorFromProfile"])){

$err = "Please login or register before viewing profile";
unset($_SESSION["errorFromProfile"]);
}

if(isset($_SESSION["successRegister"])){
    $succ =$_SESSION["successRegister"];
    unset($_SESSION["successRegister"]);
}
if(isset($_SESSION["errorRegister"])){

$err = $_SESSION["errorRegister"];
unset($_SESSION["errorRegister"]);
}

//Handle login errors

if(isset($_SESSION["loginSucc"])){
$succ = "Logged in successfully";
unset($_SESSION["loginSucc"]);
}
if(isset($_SESSION["loginErrMail"])){
$err = "Email doesn't exist";
unset($_SESSION["loginErrMail"]);
}

if(isset($_SESSION["loginErrPass"])){
    $err = "Wrong password, please try again";
    unset($_SESSION["loginErrPass"]);
}

if(isset($_SESSION["userNotVerified"])){
    $err="User not verified, please verify your account"."</br><a href="."VerifyUser".">Verify Account<a/>";
    unset($_SESSION["userNotVerified"]);
}

//Handle logout msg
if(isset($_SESSION["logout"])){
$err = "Logged out";
unset($_SESSION["logout"]);
}
if(isset($_SESSION["cartError"])){
$err = $_SESSION["cartError"];
unset($_SESSION["cartError"]);
}



/*
        ***VERIFICATION ERRORS ****
*/

if(isset($_SESSION["verifySucc"])){
    $succ="Account verified, Pease proceed to login";
    unset($_SESSION["verifySucc"]);
}
if(isset($_SESSION["verifyErr"])){
    $err="Account verification failed, please try again later and check your code";
    unset($_SESSION["verifyErr"]);
}
if(isset($_SESSION["verifyExpired"])){
    $err="Verification code expired";
    unset($_SESSION["verifyExpired"]);
}


if(isset($_SESSION["emailResent"])){
    $succ="Email resent, please check your email for verification code";
    unset($_SESSION["emailResent"]);
}


if(isset($_SESSION["emailNoExist"])){
    $err="Email not found, please sign up";
    unset($_SESSION["emailNoExist"]);
}


//Password resetting

if(isset($_SESSION["passReset"])){
    $succ="Email resent, please check your email for new password";
    unset($_SESSION["passReset"]);
}

if(isset($_SESSION["errorRestingPass"])){
    $err="Error occured, please try again later";
    unset($_SESSION["errorRestingPass"]);
}

if(isset($_SESSION["emailNotFound"])){
    $err="Email not found";
    unset($_SESSION["emailNotFound"]);
}
if(isset($_SESSION["pageNotAvailable"])){
    $err="Cannot view this page";
    unset($_SESSION["pageNotAvailable"]);
}
//handle game add
if(isset($_SESSION["gameAdded"])){
   // $succ = $_SESSION["gameAdded"];
    ?>
    <script>
    gameAdded()
    </script>
    <?php 
    unset($_SESSION["gameAdded"]);
}
if(isset($_SESSION["gameAddError"])){
    $err = $_SESSION["gameAddError"];
    unset($_SESSION["gameAddError"]);
}

if(isset($_SESSION["notPub"])){
    $succ = $_SESSION["notPub"];
    unset($_SESSION["notPub"]);
}
if(isset($_SESSION["gameEdited"])){
    $succ = $_SESSION["gameEdited"];
    unset($_SESSION["gameEdited"]);
}



//Publisher errors
if(isset($_SESSION["publisherSucc"])){
    $succ = $_SESSION["publisherSucc"];
    unset($_SESSION["publisherSucc"]);
}

if(isset($_SESSION["notLogged"])){
    $err = $_SESSION["notLogged"];
    unset($_SESSION["notLogged"]);
}

//Buying 

if(isset($_SESSION["buyingSuccess"])){
    $succ = $_SESSION["buyingSuccess"];
    unset($_SESSION["buyingSuccess"]);
}


?>