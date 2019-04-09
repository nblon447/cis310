<?php
require_once("./assets/Template.php");
$page = new Template("CMNT Survey");
$page->addHeadElement('<link rel="stylesheet" href="./assets/styles/normalize.css">');
$page->addHeadElement('<link rel="stylesheet" type="text/css" href="./assets/styles/styles.css">');
$page->addHeadElement('<link href="https://fonts.googleapis.com/css?family=Krub|PT+Sans|Ubuntu" rel="stylesheet">');
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();
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
            <form id="loginForm" action="./welcome.php"  
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
                    <input type="password" id="email" name="email" autofocus>
                    <!--<label for="email">email@domain.com</label>-->
                    <div class="after"></div>
                </div>
		<div id="login_btn_div">
				<button class="btn btn__elevated login_btn" type="submit" >Login</button>
            	</div>
	    </form>
        </div>
    </div>
</div>
<script src="./assets/javascript/scripts.js"></script>
</div>';
print $page->getBottomSection();
?>

