<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../Assets/CSS/style.css">
</head>
<body>

<div class="topnav">
    <?php if(empty($_SESSION['username'])) { ?>
    <a class="active" href="login">Login</a>
    <?php } else { ?>
    <a href="logout">Logout</a>
    <?php } ?>
</div>

<div style="padding-left:16px">
