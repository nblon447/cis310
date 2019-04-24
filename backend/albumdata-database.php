<?php 
require_once("../assets/DB.class.php");
$response = [];
$postData = json_decode($_POST['data'], true);
echo "ferda";
if(isset($postData["search"])){
    $db = new DB();
    if (!$db->getConnStatus()) {
        print "An error has occurred with connection\n";
        exit;
    }

    $album = filter_var($postData['search'], FILTER_SANITIZE_STRING);
    $album = $db->dbEsc($album);

    $query  = "SELECT * FROM album WHERE albumtitle = '$album' OR albumartist = '$album'"; ;
	echo "ferda";
    $response = $db->dbCall($query);
    print json_encode($response, true);
    }

}
?>