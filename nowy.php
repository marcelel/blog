<?php require 'menu.php';?>

<?php

$blogTitle = ($_POST['blogTitle']);
$login = ($_POST['login']);
$password = ($_POST['password']);
$description = ($_POST['text']);
$sem = sem_get(123);
sem_acquire($sem);
if (!is_dir($blogTitle)){
    mkdir($blogTitle);
    $file = fopen($blogTitle.'/info.txt', 'w');
    fputs($file, $login);
    fputs($file, "\n");
    fputs($file, md5($password));
    fputs($file, "\n");
    fputs($file, $description);
    print_r("Utworzono");
}
else {
    print_r("Blog juz istnieje");
}
sem_release($sem);
?>
