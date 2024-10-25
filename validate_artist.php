<?php
require __DIR__ . '/includes/vendor/autoload.php';

use Kreait\Firebase\Factory;

include("includes/dbconfig.php");

// $factory = (new Factory)
//     ->withServiceAccount(__DIR__ . '/artgallery-96d08-firebase-adminsdk-ksbrp-cfabc12d3f.json')
//     ->withDatabaseUri('https://artgallery-96d08-default-rtdb.firebaseio.com');

// $database = $factory->createDatabase();

// Get the username from the form
$username = $_POST['username'];

// Reference to the artworks table
$reference = $database->getReference('artworks');

// Retrieve all artwork data
$artworks = $reference->getValue();

$authorized = false;

// Check if the username exists in the artworks table
foreach ($artworks as $artworkId => $artwork) {
    if ($artwork['artist_name'] === $username) {
        $authorized = true;
        break;
    }
}

if ($authorized) {
    // Store the username in session to use in the next steps
    session_start();
    $_SESSION['username'] = $username;
    header("Location: manage_artworks.php");  // Redirect to manage artworks page
    exit();
} else {
    echo "Unauthorized access. Artist name not found.";
}
