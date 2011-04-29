#! /usr/bin/php
<?php
//Will find out the target name for triggering launch simulator command.
//Assumes: If Resources if found as the folder name, looks up one for the target name
// which should map to the folder name.
$pdPieces = explode('/', ltrim(getenv('TM_PROJECT_DIRECTORY'), '/'));

$projectName = end($pdPieces);

if('Resources' == $projectName) {
    unset($pdPieces[count($pdPieces) - 1]);
    $projectName = end($pdPieces);
}
$projectDirectory = '/'.implode('/', $pdPieces);

$xml = simplexml_load_file($projectDirectory.'/tiapp.xml');

$projectId = $xml->id;

$out = <<< OUTPUT
$projectName
$projectDirectory
$projectId
OUTPUT;
print $out;?>