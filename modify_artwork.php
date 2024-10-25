<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: artist_un.php");
    exit();
}

require __DIR__ . '/includes/vendor/autoload.php';
include("includes/dbconfig.php");

// Get the artwork ID and new data from the POST request
$artworkId = $_POST['artwork_id'];
$newDescription = $_POST['description'];
$newAuctionDate = $_POST['auction_date'];

// Reference to the artwork in Firebase
$reference = $database->getReference('artworks/' . $artworkId);

// Check if artwork exists
$artwork = $reference->getValue();
if ($artwork) {
    // Update the artwork details
    $reference->update([
        'description' => $newDescription,
        'auction_date' => $newAuctionDate
    ]);

    echo "<script>
            alert('Artwork modified successfully!');
            setTimeout(function(){
                window.location.href = 'artistindex.php';
            }, 0000);
            </script>";
                exit();
} else {
    echo "No data to update.";
}
