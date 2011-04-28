#! /usr/bin/php
<?php
//Will find out the target name for triggering launch simulator command.
//Assumes: If Resources if found as the folder name, looks up one for the target name
// which should map to the folder name.
$pdPieces = explode('/', ltrim(getenv('TM_PROJECT_DIRECTORY'), '/'));

$last = end($pdPieces);

if('Resources' == $last) {
    $last = prev($pdPieces);
}

echo $last;