<?php
session_start();
require __DIR__ . '/includes/vendor/autoload.php';
include("includes/dbconfig.php");

use Kreait\Firebase\Factory;

$auctionId = $_GET['id'];

// Delete the auction from the Firebase database
$database->getReference('auctions/' . $auctionId)->remove();

// Redirect back to the auctions page
header('Location: view_auctions.php');
exit();
