<!DOCTYPE HTML>
<html>
	<head>
    <body>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
    <p>使用者&nbsp;<?php echo $_SESSION['LoginUser']; ?>&nbsp;已登入</p>
    <input type="submit" value="登出"/>
    <input type="hidden" name="Logout" value="true"/>
</form>


</body>
</head>
<?
session_start();
session_destroy();
header("Location: index.php");


?>