<?php
    // $name = htmlspecialchars($_POST['name']);   //getting a name;
    // $email = htmlspecialchars($_POST['email']); //getting a email; 
    // $pass = htmlspecialchars($_POST['password']);   //getting a password;
    

    $db = mysqli_connect('localhost', 'root','', 'users') or die("Ошибка " . mysqli_error($link)); // подключение к БД datateacher

    $name = mysqli_real_escape_string($db, $_POST['name']); // получаем данные из формы 
    $email = mysqli_real_escape_string($db, $_POST['email']); //получаем данные из формы 
    $password = mysqli_real_escape_string($db, $_POST['password']); //получаем данные из формы 

    // $user_check_query = "SELECT * FROM usersdata WHERE nameUser='$name' OR passwordUser='$password' LIMIT 1"; 
    // $result = mysqli_query($db, $user_check_query);
    // $user = mysqli_fetch_assoc($result);

    $query = "INSERT INTO usersdata  VALUES('$name', '$email', '$password')";
    mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));

    include('login.phtml'); //importing a file
?>