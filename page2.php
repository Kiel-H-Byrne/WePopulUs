<?php
session_start();
// page2.php

echo 'Welcome to page #2 <br />';
$vars=array($_SESSION);
foreach($_SESSION as $key=>$value)
    {
    // and print out the values
    echo 'The value of $_SESSION['."'".$key."'".'] is '."'".$value."'".' <br />';
    }

// Works if session cookie was accepted
echo '<br /><a href="index.php">Home</a>';

/*
$xml = new SimpleXMLElement('<variables/>');
array_walk_recursive($vars, array ($xml, 'addChild'));
print $xml->asXML();
/**/

session_destroy();
?>