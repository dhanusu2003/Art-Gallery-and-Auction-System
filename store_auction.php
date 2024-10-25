<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit();
}

require __DIR__ . '/includes/vendor/autoload.php';
include("includes/dbconfig.php");

// Retrieve form data
$auctionName = $_POST['auction_name'];
$auctionDate = $_POST['auction_date'];
$auctionPlace = $_POST['auction_place'];
$artworks = $_POST['artworks']; // Array of artwork IDs

// Create a unique auction ID
$auctionId = uniqid();

// Prepare auction data
$auctionData = [
    'auction_name' => $auctionName,
    'auction_date' => $auctionDate,
    'auction_place' => $auctionPlace,
    'artworks' => $artworks,
];

// Store auction data in the database
$database->getReference('auctions/' . $auctionId)->set($auctionData);

echo "Auction created successfully!";
