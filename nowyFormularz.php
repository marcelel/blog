<?php require 'menu.php';?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Blog</title>
</head>
<body>
    <h1> Stworz blog </h1>
    <form action="nowy.php" method="POST">
        <p>
            Tytuł: <input type="text" name="blogTitle"> 
        </p>
        <p>
            Login: <input type="text" name="login"> 
        </p>
        <p>
            Hasło: <input type="password" name="password"> 
        </p>
        <p>
            Tekst: <textarea rows="10" cols="50" name="text">
                </textarea>
        </p>
        <p>
            <input type="submit">
            <input type="reset">
        </p>
    </form>
</body>
</html> 