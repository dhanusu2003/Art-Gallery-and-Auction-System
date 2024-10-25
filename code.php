<?php
session_start();
require 'includes/vendor/autoload.php';  // Ensure Firebase SDK is autoloaded
include('includes/dbconfig.php');

use Kreait\Firebase\Factory;
use Kreait\Firebase\Exception\Auth\EmailExists;

if(isset($_POST['save_push_data'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role=$_POST['role'];

    // Initialize Firebase Authentication
    $factory = (new Factory)->withServiceAccount('includes/artgallery-96d08-firebase-adminsdk-ksbrp-cfabc12d3f.json');
    $auth = $factory->createAuth();

    try {
        // Create user with email and password
        $userProperties = [
            'email' => $email,
            'emailVerified' => false,
            'password' => $password,
            'displayName' => $username,
            'disabled' => false,
        ];

        $createdUser = $auth->createUser($userProperties);

        // Store user details (excluding password) in Realtime Database
        $data = [
            'username' => $username,
            'email' => $email,
            'password'=>$password,
            'Role'=>$role,
        ];

        $ref = "user/";
        $postdata = $database->getReference($ref)->push($data);

        if($postdata) {
            echo "<script>
            alert('Registration Successfully.');
            setTimeout(function(){
                window.location.href = 'login1.php';
            }, 0000);
        </script>";
            exit();
        } else {
            $_SESSION['status'] = 'Registration Failed'; 
            header("Location: index.php");
            exit();
        }
    } catch (EmailExists $e) {
        // If email already exists, show an alert and redirect after 3 seconds
        echo "<script>
            alert('Email already exists. Please go to the login page.');
            setTimeout(function(){
                window.location.href = 'login1.php';
            }, 0000);
        </script>";
        exit();
    } catch (\Exception $e) {
        $_SESSION['status'] = 'Registration Failed: ' . $e->getMessage();
        header("Location: index.php");
        exit();
    }
}
