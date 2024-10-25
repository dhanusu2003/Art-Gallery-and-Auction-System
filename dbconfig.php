
<?php
require __DIR__ . '\vendor\autoload.php';

// $auth = $factory->createAuth(); // Initialize Firebase Auth instance


use Kreait\Firebase\Factory;
//use Kreait\Firebase\ServiceAccount;

// Updated ServiceAccount usage
$factory = (new Factory)
    ->withServiceAccount(__DIR__ . '/artgallery-96d08-firebase-adminsdk-ksbrp-777197a270.json')  // Path to the Firebase credentials file
    ->withDatabaseUri('https://artgallery-96d08-default-rtdb.firebaseio.com/'); // Your Firebase Realtime Database URL
// Create the Firebase instance and get the database
$database = $factory->createDatabase();

?>
