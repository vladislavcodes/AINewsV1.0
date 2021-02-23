<?php
    require_once 'conection.php';

    $name = htmlspecialchars($_POST['name']);   //getting a name;
    $email = htmlspecialchars($_POST['email']); //getting a email; 
    $pass = htmlspecialchars($_POST['password']);   //getting a password;
  
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link)); //output ERROR
 

     
    $query ="INSERT INTO usersdata VALUES('$name', NULL,'$pass')";

     $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
     if($result)
     {
        $connection = true;
     }
    mysqli_close($link); //close link
    include('login.phtml'); //importing a file
?>