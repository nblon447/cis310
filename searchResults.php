<?php
require_once("./assets/Template.php");
require_once("./assets/DB.class.php");
$json = file_get_contents("./assets/albumMocks.json");
//$mock = json_decode($json, true);
session_start();

$User = '';
$Loggedin;
$_SESSION['Logout'] = '<li><a class="link navLink" href="./logout.php"><div class="btn btn__text">Logout</div></a></li>';
$_SESSION['Login'] = '<li><a class="link navLink" href="./login.php"><div class="btn btn__text">LOGIN</div></a></li>';

if (isset($_SESSION['Loggedin']))
{
$User = "Welcome " . $_SESSION['user'];
$Loggedin = $_SESSION['Logout'];
}
else
{
	$Loggedin = $_SESSION['Login'];
}

$db = new DB();

if (!$db->getConnStatus()) {
  print "An error has occurred with connection\n";
  exit;
}

$result = '';
$no_result_msg = "<h4> No Results Found! </h4>";

$inputs = array('search');
$error = false;

foreach($inputs as $field) {
	if(!isset($_POST[$field])) {
		$error = true;
	}
	if(empty($_POST[$field])) {
		$error = true;
	}
}

$page = new Template("Search Results");
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
    <ul>';
		echo $Loggedin;
		echo $User;
print  '<li><a class="link navLink" href="./privacy.php"><div class="btn btn__text">PRIVACY</div></a></li>
        <li><a class="link navLink" href="./survey.php"><div class="btn btn__text">SURVEY</div></a></li>
        <li><a class="link navLink" href="./searchAlbums.php"><div class="btn btn__text">SEARCH</div></a></li>
    </ul>
</nav>
</header>
<div class="paneContainer">
    <div class="pane">
    <div class="resultContent">
            <h1 class="privacyContent__title">Album Search Results</h1>
        <table>
        <thead>
            <tr>
                <th>
                    Album Artist
                </th>
                <th>
                    Album Title
                </th>
                <th>
                    Album Length (minutes)
                </th>
            </tr>
        </thead>
        <tbody>';

if($error != true) {

	$name = filter_var($_POST['search'], FILTER_SANITIZE_STRING);
    $query  = "SELECT * FROM album WHERE albumtitle = '$name' OR albumartist = '$name'"; 
    $result = $db->dbCall($query);
		
	if (empty($result)){
		print $no_result_msg;
	}
	else {
        foreach ((array) $result as $record) {
            print "<tr>
            <td>
            {$record['albumartist']}
            </td>
            <td>
            {$record['albumtitle']}
            </td>
            <td class='lengthData'>
            {$record['albumlength']}
            </td>";
        }
    }

} else {
	print $no_result_msg;  
}

print '</tbody>
        </table>
        </div>
        </div>
    </div>
</div>';


?>
