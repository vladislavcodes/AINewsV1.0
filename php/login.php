<?php
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $db = mysqli_connect('localhost', 'root','', 'users') or die("Ошибка " . mysqli_error($link));
  
    $queryEmail ="SELECT emailUser FROM usersdata";
    $queryPass = "SELECT passwordUser FROM usersdata";

    $resultEmail = mysqli_query($db, $queryEmail) or die("Ошибка " . mysqli_error($db)); 
    $resultPass = mysqli_query($db, $queryPass) or die("Ошибка " . mysqli_error($db));
    $rows = mysqli_num_rows($resultEmail);
  
    while ($row = mysqli_fetch_row($resultEmail)) {
      if($row[0] == $email){
       $resEmail = true;
       break;
      }else{
        $resPass = false;
        echo 'Введите пароль';
      }
    }

    while ($row = mysqli_fetch_row($resultPass)) {
      if(password_verify($password, $row[0])){
       $resPass = true;
       break;
      }else{
        $resPass = false;
      }
    }

    if($resEmail && $resPass){
      echo 'Вы успешно вошли';
    }else{
      echo 'Попроюбуйте еще раз';
    }
  
    
?>