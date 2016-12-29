<?php require 'menu.php';?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Blog</title>
</head>
<body>
    <h1> Dodaj komentarz </h1>
    <form action="koment.php" method="POST">
        <p>
            Tekst: <textarea rows="10" cols="50" name="text">
                </textarea>
        </p>
        <p>
            Rodzaj komentarza:
            <select name="commentType">
                <option value="positive">Pozytywny</option>
                <option value="neutral">Neutralny</option>
                <option value="negativ">Negatywny</option>
            </select>
        </p>
        <p>
            Imię/pseudonim: <input type="text" name="name"> 
        </p>
        <p>
            <input type="submit">
            <input type="reset">
        </p>
        <input type="hidden" name="blogName" value="<?php echo $_POST['blogName'] ?>">
        <input type="hidden" name="postName" value="<?php echo $_POST['postName'] ?>">
    </form>
</body>
</html>

