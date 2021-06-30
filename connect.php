<?php

    $username = $_POST['uname'];
    $email = $_POST['email'];
    $password = $_POST['pass'];


    // Database Connection

    $conn = new mysqli('localhost', 'root','','db1');
    if ($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into registration (Username, Email, Password) values (?,?,?)");
        $stmt->bind_param("sss", $username, $email, $password);
        $stmt->execute();
        echo "<script>alert('Registration Successfull!');window.location.href='index.html'</script>";
        $stmt->close();
        $conn->close();
    }

?>