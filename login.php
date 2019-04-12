<?php
<<<<<<< HEAD
session_start();
require_once("./assets/Template.php");
$page = new Template("CMNT Survey");
=======
require_once("assets/DB.class.php");
require_once("assets/Template.php");

$db = new DB();

if (!$db->getConnStatus()) {
  print "An error has occurred with connection\n";
  exit;
}

$page = new Template("Login");
>>>>>>> bbb343fbb7ef42afcf83f4fba4051d34cff8d6c0
$page->addHeadElement('<link rel="stylesheet" href="./assets/styles/normalize.css">');
$page->addHeadElement('<link rel="stylesheet" type="text/css" href="./assets/styles/styles.css">');
$page->addHeadElement('<link href="https://fonts.googleapis.com/css?family=Krub|PT+Sans|Ubuntu" rel="stylesheet">');
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();
print '<div class="content">
<!-- <<<<<<< HEAD -->
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
    <ul>
        <li><a class="link navLink" href="./privacy.php"><div class="btn btn__text">PRIVACY</div></a></li>
        <li><a class="link navLink" href="./survey.php"><div class="btn btn__text">SURVEY</div></a></li>
		<li><a class="link navLink" href="./searchAlbums.php"><div class="btn btn__text">SEARCH</div></a></li>
    </ul>
</nav>
</header>
<div class="paneContainer">
    <div class="pane">
        <div class="loginContent">
            <form id="loginForm" action="./welcome.php" onsubmit="return LoginValidation();" method="POST">
				<div class="question login_element">
                <p>Username:</p>                    
                    <input type="text" id="username" name="username" autofocus>
                    <label for="email">email@domain.com</label>
                    <div class="after"></div>
                </div>
				<div class="question login_element">
                <p>Password:</p>                    
                    <input type="password" id="passwd" name="passwd" autofocus>
                    <!--<label for="email">email@domain.com</label>-->
                    <div class="after"></div>
                </div>
		<div id="login_btn_div">
				<button class="btn btn__elevated login_btn" type="submit" >Login</button>
            	</div>
	    </form>
        </div>
=======
    <header id="header">
    <div>
        <a class="link" href="./index.php">
            <h1 class="siteTitle">
                CNMT Survey
            </h1>
        </a>
>>>>>>> bbb343fbb7ef42afcf83f4fba4051d34cff8d6c0
    </div>
    <span class="flexSpace"></span>
    <nav>
        <ul>
            <li><a class="link navLink" href="./privacy.php"><div class="btn btn__text">PRIVACY</div></a></li>
            <li><a class="link navLink" href="./survey.php"><div class="btn btn__text">SURVEY</div></a></li>
            <li><a class="link navLink" href="./searchAlbums.php"><div class="btn btn__text">SEARCH</div></a></li>
        </ul>
    </nav>
    </header>
    <div class="paneContainer">
        <div class="pane">
            <div class="loginContent">';

if(isset($_POST["username"]) && isset($_POST["password"])){

    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $username = $db->dbEsc($username);
    
    $query = "SELECT *
                    FROM user, role, user2role
                    WHERE user.username='$username' and user.id=user2role.id and user2role.roleid=role.id";

    $userResults = $db->dbCall($query);

    $validPass = password_verify($password, $userResults[0]['userpass']); 
    
    if ($validPass) {
        $_SESSION['user'] = $userResults[0]['realname'];
        $_SESSION['role'] = $userResults[0]['rolename'];
        
        // Below is functionality to redirect user on login. Seems like desired behavior. 
        // I haven't figured out how to get it working yet. 
        // Think it needs full paths, which we can probably get 
        // programatically through some php super global. Up to you guys if you want to do it this
        // way or give user a welcome and let them navigate wherever

        // if($_SESSION['role'] === "admin") {
        //     header("Location: /surveyData.php");
        // } else {
        //     header("Location: /searchAlbums.php");
        // }
        // die();
    }
        
}
    

if (isset($_SESSION['user'])) {
    print '<p>LOGGED IN VIEW PLACEHOLDER USER/ROLE:  '. $_SESSION['user'] . ' / ' . $_SESSION['role'] . '</p>';
} else {
    print '<form id="loginForm" action="./login.php"  
                onsubmit="return LoginValidation();" 
                method="POST">
                    <div class="question login_element">
                    <p>Username:</p>                    
                        <input type="text" id="username" name="username" autofocus>
                        <label for="email">email@domain.com</label>
                        <div class="after"></div>
                    </div>
                    <div class="question login_element">
                    <p>Password:</p>                    
                        <input type="password" id="password" name="password" autofocus>
                        <div class="after"></div>
                    </div>
                    <div id="login_btn_div">
                        <button class="btn btn__elevated login_btn" type="submit" >Login</button>
                    </div>
        </form>';
}

'</div>
</div>
</div>
<script src="./assets/javascript/scripts.js"></script>
</div>';

print $page->getBottomSection();
?>
