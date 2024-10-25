<?php

use Firebase\Auth\Token\Exception\InvalidToken;

session_start();
require 'includes/vendor/autoload.php';

include("includes/dbconfig.php");

use Kreait\Firebase\Factory;

// Load Firebase credentials JSON file
$factory = (new Factory)
    ->withServiceAccount('includes/artgallery-96d08-firebase-adminsdk-ksbrp-777197a270.json');

$auth = $factory->createAuth(); 

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $clearTextPassword = $_POST['password'];

    try {
        $user = $auth->getUserByEmail($email); // Get user by email
        try {
            $signInResult = $auth->signInWithEmailAndPassword($email, $clearTextPassword);
            $idTokenString = $signInResult->idToken();

            try {
                
                $tokenParts = explode('.', $idTokenString);
                $tokenPayload = base64_decode($tokenParts[1]);
                $jwtPayload = json_decode($tokenPayload, true);

                // Extract 'sub' claim (user ID)
                $uid = $jwtPayload['sub'];

                $_SESSION['verified_user_id'] = $uid;
                $_SESSION['idTokenString'] = $idTokenString;

                echo "<script>
                alert('Successful Login.');
                setTimeout(function(){
                    window.location.href = 'userindex.php';
                }, 0000);
            </script>";
                exit();
            } catch (\Exception $e) {
                echo 'The token could not be decoded: ' . $e->getMessage();
            }

        } catch (Exception $e) {
            echo "<script>
            alert('Wrong password.');
            setTimeout(function(){
                window.location.href = 'login1.php';
            }, 0000);
        </script>";
        }

    } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
        echo "<script>
        alert('user Not found.');
        setTimeout(function(){
            window.location.href = 'register1.php';
        }, 0000);
    </script>";
    }
}
