<?php

require_once("assets/DB.class.php");
require_once("assets/Template.php");
session_start();

$page = new Template("Survey Data");
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

$query = "SELECT * FROM survey";

$result = $db->dbCall($query);

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
    <ul>';
        if (isset($_SESSION['user']))
        {
            echo "Welcome " . $_SESSION['user'];
            echo '<li><a class="link navLink" href="./logout.php"><div class="btn btn__text">Logout</div></a></li>';
        }
        else
        {
            echo '<li><a class="link navLink" href="./login.php"><div class="btn btn__text">Login</div></a></li>';
        }

print  '<li><a class="link navLink" href="./privacy.php"><div class="btn btn__text">PRIVACY</div></a></li>
        <li><a class="link navLink" href="./survey.php"><div class="btn btn__text">SURVEY</div></a></li>
		<li><a class="link navLink" href="./searchAlbums.php"><div class="btn btn__text">SEARCH</div></a></li>
    </ul>
</nav>
</header>';
if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
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
} else if (isset($_SESSION['role']) && $_SESSION['role'] == 'user') {
print '<br />
	<br />
	<h3>You do not have permission to view this page!</h3>';
} else if (!isset($_SESSION['role'])) {
	print '<br />
	<br />
	<h3>Please log in to view this page!</h3>';
}
print $page->getBottomSection();