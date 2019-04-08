<?php

require_once("assets/DB.class.php");
require_once("assets/Template.php");

$page = new Template("Survey Data");
$page->addHeadElement('<link rel="stylesheet" href="./assets/styles/normalize.css">');
$page->addHeadElement('<link rel="stylesheet" type="text/css" href="./assets/styles/styles.css">');
$page->addHeadElement('<link href="https://fonts.googleapis.com/css?family=Krub|PT+Sans|Ubuntu" rel="stylesheet">');
$page->finalizeTopSection();
$page->finalizeBottomSection();

session_start();

$db = new DB();

if (!$db->getConnStatus()) {
  print "An error has occurred with connection\n";
  exit;
}

$query = "SELECT * FROM survey";

$result = $db->dbCall($query);

print $page->getTopSection();
if ($_SESSION['role'] = 'admin') {
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
</header>';
print '<br />';
print '<br />';
print '<br />';
print "<table>";
print "<tr>";
print "<th>ID</th>";
print "<th>Time</th>";
print "<th>Major</th>";
print "<th>Grade</th>";
print "<th>Topping</th>";
print "<th>IP Address</th>";
print "</tr>";
foreach($result as $resultArray) {
	print "<tr>";
	foreach($resultArray as $key => $value) {
		print "<td>".$value."</td>";
	}
	print "</tr>";
}
print "</table>";
} else {
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
<br />
<br />
<h3>You do not have permission to view this page!</h3>';
}
print $page->getBottomSection();