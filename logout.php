<?php
session_start();

unset($_SESSION["user_id"]);
unset($_SESSION["username"]);
unset($_SESSION["place_of_birth"]);
unset($_SESSION["school"]);
unset($_SESSION["contact_info"]);
unset($_SESSION["email"]);
unset($_SESSION["image"]);

header("location: login.php");
exit();
?>