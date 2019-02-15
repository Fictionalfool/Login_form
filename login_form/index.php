<?php
// Session Management
session_start();
if ($_SERVER[REQUEST_METHOD] == 'POST') {
 // Sanatize Inputs
 $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
 $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

 // Database Connection
 $pdo = new PDO('mysql:host=fictional.emerson.build; dbname=fictiona_userform', 'fictiona_ra', 'jellybelly49');

// Database Query
 $statement = $pdo->query("SELECT * FROM `users` WHERE `username`='$username' AND `password` = SHA1('$password');");
 if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
 $_SESSION['id'] = $row['id'];
 header('Location: protected.php');
 } else {
 $_SESSION['login'] = FALSE;
 $error = "<div><p style=\"color:red\">Sorry, the password is incorrect.</p></div>";
 }
}
?>

<!DOCTYPE html>
<html lang="en">
<style>
        * {
            margin: 0;
            padding: 0;
        }
        .imgbox {
            display: grid;
            height: 100%;
        }
        .center-fit {
            max-width: 100%;
            max-height: 100vh;
            margin: auto;
        }
    </style>
<head>
    <meta charset="utf-8"/>
    <title>Title</title>
    <meta name="description" content="Login form html">
    <meta name="author" content="Ryan Brogan">
    <link rel="stylesheet" href="style/global.css">
</head>

<body>
    <form action="protected.php">
  <div class="imgcontainer">
    <img src="frog_graphic.png" alt="Avatar" class="avatar">
  </div>
<form action="index.php" method="post">
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>

</body>
</html>