<?php
require __DIR__ . '/includes/vendor/autoload.php';
include("includes/dbconfig.php");

use Kreait\Firebase\Factory;

// Fetch all artworks from the database
$artworks = $database->getReference('artworks')->getValue();

// Prepare data for JSON response
$result = [];
foreach ($artworks as $id => $artwork) {
    $result[] = [
        'id' => $id,
        'description' => $artwork['description'] // You can customize the displayed text
    ];
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($result);
