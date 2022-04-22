<?php
session_start();

if (isset($_SESSION["usernameonnavbar"]) && $_SESSION["usernameonnavbar"] == 'admin'){}
else {
    header("location: ../index.php");
}

$name = $_POST['name'];

$xml = new DOMDocument('1.0', 'utf-8');
$xml-> load('members.xml' ) ;

$xpath = new DOMXPath($xml);

foreach ($xpath->query("/calendar/event['name']") as $node);

{
    $node->parentNode->removeChild ($node);
}

$xml->formatoutput - true;
$xml->save('members.xml');

header('Location: calendar.html');
exit();

?>
