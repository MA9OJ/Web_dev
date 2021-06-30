<?php

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];


    // Database Connection

    $conn = new mysqli('localhost', 'root','','db1');
    if ($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into Enteries (Name, email, message) values (?,?,?)");
        $stmt->bind_param("sss", $name, $email, $message);
        $stmt->execute();
        echo "<script>alert('Feed Back Sent!!');window.location.href='index.html'</script>";
        $stmt->close();
        $conn->close();
    }

?>