<?php
session_start();
session_destroy();
header("Location: fig3-login.php");
exit();
?>