<?php
//ession_save_path($_SERVER['DOCUMENT_ROOT']."/sessiontest/");
session_start();

// remove all session variables
session_unset();

// destroy the session
session_destroy();

header("Location: index.php");
?>
