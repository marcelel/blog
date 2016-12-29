<?php require 'menu.php';?>

<?php

$commentDirName = ($_POST['blogName']) . "/" . ($_POST['postName']) . ".k";
if (!is_dir($commentDirName)){
    mkdir($commentDirName);
}
$commentDir = opendir($commentDirName);
$i = 0;
while (($flesNumber = readdir($commentDir)) !== false){
    if ($flesNumber == '.' or $flesNumber == '..') continue;
    $i++;
}
$flesNumber = fopen($commentDirName . '/' . $i . '.txt', 'w');
fputs($flesNumber, ($_POST['commentType']));
fputs($flesNumber, "\n");
fputs($flesNumber, date("Y-m-d") . ", " . date("h:i:s"));
fputs($flesNumber, "\n");
fputs($flesNumber, ($_POST['name']));
fputs($flesNumber, "\n");
fputs($flesNumber, ($_POST['text']));
fclose($flesNumber);
echo "Dodano komentarz";
?>
