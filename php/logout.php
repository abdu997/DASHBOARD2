<?php
session_start();
session_destroy();
$home_url = '../login.html';
header('Location: ' . $home_url);
?>