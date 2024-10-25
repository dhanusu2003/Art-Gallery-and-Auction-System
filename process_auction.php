<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'Admin') {
    header("Location: artist_login.html");
    exit();
}

require __DIR__ . '/includes/vendor/autoload.php';
include("includes/dbconfig.php");

use Kreait\Firebase\Factory;

// Create a new auction
$auctionName = $_POST['auction_name'];
$auctionDate = $_POST['auction_date'];
$auctionPlace = $_POST['auction_place'];
$selectedArtworks = $_POST['artworks'];

// Create auction ID
$auctionId = "auction_" . uniqid(); // Generate a unique auction ID

// Store auction details in the database
$database->getReference('auctions/' . $auctionId)
    ->set([
        'auction_name' => $auctionName,
        'auction_date' => $auctionDate,
        'auction_place' => $auctionPlace,
        'artworks' => $selectedArtworks // Store selected artworks
    ]);

// Optionally, associate artworks with the auction in the artworks node
foreach ($selectedArtworks as $artworkId) {
    $database->getReference('artworks/' . $artworkId)
        ->update(['auction_id' => $auctionId]); // Update artwork with auction ID
}

echo "Auction added successfully!";
