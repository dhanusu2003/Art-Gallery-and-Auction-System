<?php
session_start(); // Start the session
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; // Changed variable name to lowercase

    // Check credentials
    if ($username == 'Admin' && $password == 'Admin123@') {
        $_SESSION['username'] = $username; // Store username in session
        echo "<script>
        alert('Successful Login.');
        setTimeout(function(){
            window.location.href = 'adminindex.php';
        }, 0);
        </script>";
        exit();
    } else {
        echo "<script>
        alert('Invalid username or Password.');
        setTimeout(function(){
            window.location.href = 'login3.php';
        }, 0);
        </script>";
        exit();
    }
}
