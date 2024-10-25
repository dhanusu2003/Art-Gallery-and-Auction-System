<?php
session_start();
require __DIR__ . '/includes/vendor/autoload.php';
include("includes/dbconfig.php");

use Kreait\Firebase\Factory;

// Fetch all auctions
$auctions = $database->getReference('auctions')->getValue();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Auctions</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 28px;
            margin-bottom: 30px;
        }

        .auction-container {
            background-color: #fff;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        h3 {
            color: #007bff;
            margin-bottom: 15px;
        }

        .action-buttons {
            margin-top: 15px;
            display: flex;
            gap: 10px;
        }

        .edit-btn, .delete-btn {
            padding: 10px 15px;
            font-size: 14px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .edit-btn {
            background-color: #28a745;
        }

        .delete-btn {
            background-color: #dc3545;
        }
    </style>
</head>
<body>

<h2>Auctions</h2>

<?php
if ($auctions) {
    // Loop through each auction
    foreach ($auctions as $auctionId => $auction) {
        echo "<div class='auction-container'>";
        echo "<h3>" . htmlspecialchars($auction['auction_name'] ?? 'Unknown Auction') . "</h3>";
        echo "<p>Date: " . htmlspecialchars($auction['auction_date'] ?? 'Unknown Date') . "</p>";
        echo "<p>Place: " . htmlspecialchars($auction['auction_place'] ?? 'Unknown Place') . "</p>";

        // Action buttons for admin
        echo "<div class='action-buttons'>";
        echo "<a href='edit_auction.php?id=$auctionId' class='edit-btn'>Edit</a>";
        echo "<a href='delete_auction.php?id=$auctionId' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this auction?\");'>Delete</a>";
        echo "</div>";

        echo "</div><hr>";
    }
} else {
    echo "<p>No auctions found.</p>";
}
?>

</body>
</html>
