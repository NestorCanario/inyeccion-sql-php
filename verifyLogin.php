<?php 
    $email = $_POST["email"];
    #"admin_01@gmail.com ' OR 1=1--"; 
    $pass = $_POST["password"];
    #"abc123zxy";
    
    $SQLite = new SQLite3("./Login.db");
    $query = $SQLite->query("SELECT * FROM users WHERE email='$email' AND password='$pass' ");
    
    $data = $query->fetchArray(SQLITE3_ASSOC);
    if( $data && $data["email"] && $data["password"] ){
        session_start();
        $_SESSION["email"] = $data["email"];
        $_SESSION["password"] = $data["password"];
        header("location: index.php");
    }else {
        header("location: login.php?code=404&message=User not found");
    }
?>
