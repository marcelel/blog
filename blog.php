<?php require 'menu.php';?>

<?php
if(empty($_GET['nazwa'])){
    echo 'Lista blogów:<br />';
    $directory = "/home/students/l/leksmarc/public_html/php";
    if (is_dir($directory)){
        if ($dh = opendir($directory)){
            while (($blog = readdir($dh)) !== false){
                if ($blog == '.' or $blog == '..') continue;
                if(filetype($blog)==dir){
                    echo '<a href="blog.php?nazwa=' . $blog . '">' . $blog . '</a><br />';
                }
            }
        }
    }
}
elseif(($blog = opendir($_GET['nazwa']))){
    echo $_GET['nazwa'] . "<br>";
    $path = "./" . $_GET['nazwa'] . "/info.txt";
    $info = fopen($path, "r");
    echo fgets($info) . "<br>";
    fgets($info);
    echo fgets($info) . "<br>";
    fclose($info);
    while (($file = readdir($blog)) !== false){
        if ($file == "info.txt") continue;
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        if ($ext == "txt"){
            $postName = explode(".", $file);
            echo "<br>" . $postName[0] . "<br>";
            $path = "./" . $_GET['nazwa'] . "/" . $file;
            $post = fopen($path, "r");  
            echo fgets($post) . "<br>";
            fclose($post);
            for($i=1; $i<=3; $i++){
                $attachment = "./" . $_GET['nazwa'] . "/" . $postName[0] . $i;
                if(file_exists($attachment . ".png")){
                    $attachment = $attachment . ".png";
                    echo '<a href="' . $attachment . '">Załącznik ' . $i. '</a>' . '<br>';
                }
                if(file_exists($attachment . ".jpg")){
                    $attachment = $attachment . ".jpg";
                    echo '<a href="' . $attachment . '">Załącznik ' . $i. '</a>' . '<br>';
                }
                if(file_exists($attachment . ".jpeg")){
                    $attachment = $attachment . ".jpeg";
                    echo '<a href="' . $attachment . '">Załącznik ' . $i. '</a>' . '<br>';
                }
                if(file_exists($attachment . ".gif")){
                    $attachment = $attachment . ".gif";
                    echo '<a href="' . $attachment . '">Załącznik ' . $i. '</a>' . '<br>';
                }           
            }
            echo "<br>" . "Komentarze" . "<br>";
            $dir_path = "/home/students/l/leksmarc/public_html/php/" . $_GET['nazwa'] . "/" . $postName[0] . ".k";
            if(is_dir($dir_path)){
                if($commentDir = opendir($dir_path)){
                    while (($line = readdir($commentDir)) !== false){
                        $ext = pathinfo($line, PATHINFO_EXTENSION);
                        if($ext == "txt"){
                            if($comment = fopen($dir_path . "/" . $line, "r")){
                                while(!feof($comment)){
                                    echo fgets($comment) . "<br>";
                                }
                                echo "<br>";
                            }
                        }
                    }
                }
            }
            echo '<form action="komentFormularz.php" method="post">' . '<input type="hidden" name="blogName" value="' . $_GET['nazwa'] . '">' . '<input type="hidden" name="postName" value="' . $postName[0] . '">' . '<input type="submit" name="submit" value="Dodaj komentarz"></form>' . '<br>';
        }
    }

}
else{
    echo "Nie ma takiego bloga";
}
?>
