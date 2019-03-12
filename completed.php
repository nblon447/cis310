<?php

require_once("Template.php");
require_once("DB.class.php");

$page = new Template("CMNT Survey");
$page->addHeadElement('<link rel="stylesheet" href="./assets/styles/normalize.css">');
$page->addHeadElement('<link rel="stylesheet" type="text/css" href="./assets/styles/styles.css">');
$page->addHeadElement('<link href="https://fonts.googleapis.com/css?family=Krub|PT+Sans|Ubuntu" rel="stylesheet">');
$page->finalizeTopSection();
$page->finalizeBottomSection();

$db = new DB();

if (!$db->getConnStatus()) {
  print "An error has occurred with connection\n";
  exit;
}

print $page->getTopSection();

<<<<<<< HEAD
$inputs = array('major','grade','pizza');
$error = false;
foreach($inputs as $field) {
	if(!isset($_POST[$field])) {
		$error = true;
	}
	if(empty($_POST[$field])) {
		$error = true;
	}
}
if($error) {
	print "<p>All form fields required. Please try again.</p>";
} else {
	$major = filter_var($_POST["major"], FILTER_SANITIZE_STRING);
	$grade = filter_var($_POST["grade"], FILTER_SANITIZE_STRING);
	$pizza = filter_var($_POST["pizza"], FILTER_SANITIZE_STRING);
}

if(isset($_SERVER['REMOTE_ADDR'])) {
	$userip = filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP);
}
	
$sql = "INSERT INTO survey (submittime, major, expectedgrade, favetopping, userip)
	VALUES (now(),'$major','$grade','$pizza','$userip')";
	

$db->dbCall($sql);

print '
=======
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
		<li><a class="link navLink" href="./privacy.php"><div class="btn btn__text">PRIVACY</div></a>
		</li>
		<li><a class="link navLink" href="./survey.php"><div class="btn btn__text">SURVEY</div></a></li>
		<li><a class="link navLink" href="./searchAlbums.php"><div class="btn btn__text">SEARCH</div></a></li>
	</ul>
</nav>
</header>
>>>>>>> 04c888186affc3d39a89387dc4c33679c5e29354
<div class="paneContainer">
<div class="pane">
<div class="homeContent">
        <h2 class="homeContent__statement">Thank you for completing the survey!</h2>
    </div>
    <div class="next">
		<form class="link" action="./index.php">
            <button class="btn btn__elevated forward">RETURN HOME</button>
        </form>
    </div>
</div>
</div>';

print $page->getBottomSection();
?>