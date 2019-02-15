<?php
session_start();
if ($_SESSION['id'] != TRUE) {
 header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8"/>
 <title>Title</title>
 <meta name="description" content="Description">
 <meta name="author" content="Author">
</head>
<body>
<h1>Login Success!</h1>
</body>
</html>