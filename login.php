<?php

require_once("assets/DB.class.php");
require_once("assets/Template.php");

$db = new DB();

session_start();

if (!$db->getConnStatus()) {
  print "An error has occurred with connection\n";
  exit;
}

$page = new Template("Login");
$page->addHeadElement('<link rel="stylesheet" href="./assets/styles/normalize.css">');
$page->addHeadElement('<link rel="stylesheet" type="text/css" href="./assets/styles/styles.css">');
$page->addHeadElement('<link href="https://fonts.googleapis.com/css?family=Krub|PT+Sans|Ubuntu" rel="stylesheet">');
$page->addHeadElement('<script src="./assets/javascript/scripts.js"></script>');
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();


if(isset($_POST["username"]) && isset($_POST["password"])){
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $username = $db->dbEsc($username);
    
    $query = "SELECT *
                    FROM user, role, user2role
                    WHERE user.username='$username' and user.id=user2role.id and user2role.roleid=role.id";
    $userResults = $db->dbCall($query);
    if (sizeof($userResults) > 0) {

        $validPass = password_verify($password, $userResults[0]['userpass']); 
        
        if ($validPass) {
            $_SESSION['user'] = $userResults[0]['realname'];
            $_SESSION['role'] = $userResults[0]['rolename'];
        }
    }
        
}
print '<div class="content">
<header id="header">
    <div>
        <a class="link" href="./index.php">
        <h1 class="siteTitle">
                CNMT Survey
            </h1>
        </a>
    </div>
    <span class="flexSpace"></span>
    <nav>
        <ul>';
            if (isset($_SESSION['user']))
            {
                echo $User = "Welcome " . $_SESSION['user'];
                echo '<li><a class="link navLink" href="./logout.php"><div class="btn btn__text">Logout</div></a></li>';
            }
            else
            {
                echo '<li><a class="link navLink" href="./login.php"><div class="btn btn__text">Login</div></a></li>';
            }
            if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin')) {
                print '<li><a class="link navLink" href="./SurveyData.php"><div class="btn btn__text">DATA</div></a></li>';
            }
    print  '<li><a class="link navLink" href="./privacy.php"><div class="btn btn__text">PRIVACY</div></a></li>
            <li><a class="link navLink" href="./survey.php"><div class="btn btn__text">SURVEY</div></a></li>
            <li><a class="link navLink" href="./searchAlbums.php"><div class="btn btn__text">SEARCH</div></a></li>
        </ul>
    </nav>
    </header>
    <div class="paneContainer">
        <div class="pane">
            <div class="loginContent">';

    
if (isset($_SESSION['user'])) {
    print '<div class="homeContent">
    <h2 class="homeContent__statement">Welcome ' . $_SESSION['user'] . '</h2>
    <hr>
    </div>
    <div class="next">
        <form class="link" action="./index.php">
            <button class="btn btn__elevated forward">Home</button>
            <img alt="Next page arrow" class="next__icon" src="./assets/icons/baseline-navigate_next-24px.svg">
        </form>
    </div>';
} else {

        if(isset($username)) {
            print '<span id="nullInputError" style="display: block;">Incorrect username or password. Please try again</span>';
        } else {
            print '<span id="nullInputError">Please enter your username and password.</span>';
        }
        print '<form name="loginForm"  onsubmit="return validateLogin()" action="./login.php" method="post"  class="question login_element">
            Username: <input type="text" name="username" id="username" autofocus >
			<div class="after"></div>
			
			<br />
			
			Password: <input type="password" name="password" autofocus >
			<div class="after"></div>
			
			<br />
			
			
			<input type="submit" value="LOGIN" id="login_btn_div" class="btn btn__elevated login_btn" >
			
            </form>	
            ';
}
'</div>
</div>
</div>
<script src="./assets/javascript/scripts.js"></script>
</div>';
print $page->getBottomSection();

?>