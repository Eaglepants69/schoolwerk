<?php
session_start();
session_destroy();
echo 'je bent uitgelogt. <a href="login.php">Ga terug</a>';
// dit logt je uit
?>