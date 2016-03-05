<?php

session_start();

ob_start();


//unset($_SESSION["login_user_session_id"]);

unset($_SESSION["id"]);
session_destroy($_SESSION['id']);

unset($_SESSION["user_type"]);
session_destroy($_SESSION['user_type']);


$_SESSION["login_session_msg"] = "You are logged out Successfully";

//echo $_SESSION["login_session_msg"];

header("location:index.php");


?>