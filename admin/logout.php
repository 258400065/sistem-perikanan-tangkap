<?php
require_once '../config/session.php';

if (is_logged_in()) {
    log_activity($_SESSION['user_id'], 'Logout', 'User logout dari sistem');
    logout();
}

header("Location: ../login.php");
exit();
?>