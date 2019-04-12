<?php

require_once("./assets/Template.php");

$User='';
$Passwd='';
$User = $_POST['username'];

$page = new Template("CMNT Survey");
$page->addHeadElement('<link rel="stylesheet" href="./assets/styles/normalize.css">');
$page->addHeadElement('<link rel="stylesheet" type="text/css" href="./assets/styles/styles.css">');
$page->addHeadElement('<link href="https://fonts.googleapis.com/css?family=Krub|PT+Sans|Ubuntu" rel="stylesheet">');
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();

print '<header id="header">
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
    <div class="homeContent">
        <h2 class="homeContent__statement">'; echo "Welcome " . $User; 
print'</h2>
        <hr>
    </div>
    <div class="next">
		<form class="link" action="./index.php">
            <button class="btn btn__elevated forward">Home</button>
			<img alt="Next page arrow" class="next__icon" src="./assets/icons/baseline-navigate_next-24px.svg">
        </form>
    </div>
</div>
</div>';

session_start();
$_SESSION['user'] = $User;
$_SESSION['Loggedin'];
if (isset($_SESSION['user']))
{
$_SESSION['Loggedin'] = 1;
}

print $page->getBottomSection();
?>