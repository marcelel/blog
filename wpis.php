<?php require 'menu.php';?>

<?php
$directory = "/home/students/l/leksmarc/public_html/php";
$login = ($_POST['login']);
$password = ($_POST['password']);
if($password != NULL){
    $password = md5($password);
}
    $isAdded = FALSE;
    if (is_dir($directory)){
        if ($dh = opendir($directory)){
            while (($file = readdir($dh)) !== false){
                if(filetype($file)==dir){
                    $blog = opendir($file);
                    while (($line = readdir($blog)) !== false){
                        if($line=="info.txt"){
                            $path = "./" . $file . "/info.txt";
                            $info = fopen($path, "r");
                            $infoLog = fgets($info);
                            $infoPass = fgets($info);
                            fclose($handle);
                            if ($login != NULL && $password != NULL && ($login + " ") == $infoLog && ($password + " ") == $infoPass)
                            {
                                $date = ($_POST['date']);
                                $dateArray = explode("-", $date);
                                $time = ($_POST['time']);
                                $timeArray = explode(":", $time);
                                $sec = date('s');
                                $fileName = $dateArray[0] . $dateArray[1] . $dateArray[2] . $timeArray[0] . $timeArray[1] . $sec;
                                $uniqueNumber = 0;
                                while (($lineComment = readdir($blog)) !== false){
                                    if(strpos($lineComment, $fileName)){
                                        $uniqueNumber = $uniqueNumber + 1;
                                    }
                                }
                                $attachmentName = $fileName;
                                if($uniqueNumber != 0){
                                    $attachmentName = $fileName . $uniqueNumber;
                                    $fileName = $file . "/" . $fileName . $uniqueNumber . ".txt";
                                }
                                else{
                                    $attachmentName = $fileName;
                                    $fileName = $file . "/" . $fileName . ".txt";
                                }
                                $postFile = fopen($fileName, 'w');
                                fputs($postFile, ($_POST['text']));
                                print_r("Wpis dodany");
                                $isAdded = TRUE;
                                for($i=1; $i<=3; $i++)
                                {
                                    $uploadedFile = "attachment" . $i;
                                    $filename = $_FILES[$uploadedFile]['name'];
                                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                                    $targetFile = "./" . $file . "/" . $attachmentName . $i . '.' . $ext;
                                    if($ext == "jpg" || $ext == "png" || $ext == "jpeg" || $ext == "gif"){
                                        move_uploaded_file($_FILES[$uploadedFile]["tmp_name"], $targetFile);
                                    }
                                }
                            }
                        }
                    }
                    
                }
            }
        }
    }
    if(!$isAdded){
        print_r("Wpis niedodany");
    }
closedir($dh);

?>