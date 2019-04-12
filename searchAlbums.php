<?php
session_start();

// Don't need to declare these
// $User = '';
// $Loggedin;

//Session is like browser storage, so no need for html here
// $_SESSION['Logout'] = '<li><a class="link navLink" href="./logout.php"><div class="btn btn__text">Logout</div></a></li>';
// $_SESSION['Login'] = '<li><a class="link navLink" href="./login.php"><div class="btn btn__text">LOGIN</div></a></li>';


// 'role' and 'user' are the two session vars I set once a user is logged in.
// so just check role to make sure they exist, and then 'user' is the text for their name

// The conditions need to be within the html
// if (isset($_SESSION['role']))
// {
//     $User = "Welcome " . $_SESSION['user'];
//     $Loggedin = '<li><a class="link navLink" href="./logout.php"><div class="btn btn__text">Logout</div></a></li>';
// }
// else
// {
// 	$Loggedin = '<li><a class="link navLink" href="./logout.php"><div class="btn btn__text">Logout</div></a></li>';
// }


require_once("./assets/Template.php");
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
    <ul>';
    
        if (isset($_SESSION['role']))
        {
            echo $User = "Welcome " . $_SESSION['user'];
            echo '<li><a class="link navLink" href="./logout.php"><div class="btn btn__text">Logout</div></a></li>';
        }
        else
        {
            echo '<li><a class="link navLink" href="./logout.php"><div class="btn btn__text">Logout</div></a></li>';
        }

print  '<li><a class="link navLink" href="./privacy.php"><div class="btn btn__text">PRIVACY</div></a></li>
        <li><a class="link navLink" href="./survey.php"><div class="btn btn__text">SURVEY</div></a></li>
		<li><a class="link navLink" href="./searchAlbums.php"><div class="btn btn__text">SEARCH</div></a></li>
    </ul>
</nav>
</header>
<div class="paneContainer">
<div class="pane">
<div class="searchContent">
    <form id="surveyForm" action="./searchResults.php"
	onsubmit="return isValidSearch();"
    method="POST">
		<h2>Search Your Favorite Album!</h2>
            <span id="nullInputError">Please enter a search keyword.</span>
            <div class="question email">                 
                <input type="text" id="search" name="search" autofocus>
                <div class="after"></div>
            </div>
	    <div class="next formActions">
                <button class="btn btn__elevated" type="submit">SEARCH</button>
            </div>
        </form>
</div>
</div>
<script src="./assets/javascript/scripts.js"></script>
</div>';
print $page->getBottomSection();
?>
