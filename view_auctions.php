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
            letter-spacing: 1px;
        }

        .auction-container {
            background-color: #fff;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
        }

        .auction-container:hover {
            transform: translateY(-5px);
        }

        h3 {
            color: #007bff;
            margin-bottom: 15px;
            font-size: 22px;
            font-weight: 600;
        }

        p {
            color: #555;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .artwork-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 15px;
        }

        .artwork-card {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            flex: 1 1 calc(30% - 20px); /* 3 items per row */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            text-align: center; /* Center content in the artwork card */
        }

        .artwork-card:hover {
            transform: scale(1.05);
        }

        .artwork-img {
            width: 100%;
            max-width: 250px; /* Increase size for better clarity */
            height: auto;
            border-radius: 8px;
            object-fit: cover;
            margin-bottom: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            display: block;
            margin-left: auto;
            margin-right: auto; /* Center the image */
        }

        .no-artwork {
            color: #d9534f; /* Danger color */
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .artwork-card {
                flex: 1 1 calc(45% - 20px); /* 2 items per row on tablet */
            }
        }

        @media (max-width: 480px) {
            .artwork-card {
                flex: 1 1 100%; /* 1 item per row on mobile */
            }
        }
    </style>
</head>
<body>

<h2>Auctions</h2>
<h4 style="text-align: right;">For More Details Contact:</h4>
<h4 style="text-align: right;">9996548600</h4>

<?php
if ($auctions) {
    // Loop through each auction
    foreach ($auctions as $auctionId => $auction) {
        echo "<div class='auction-container'>";
        echo "<h3>" . htmlspecialchars($auction['auction_name'] ?? 'Unknown Auction') . "</h3>";
        echo "<p>Date: " . htmlspecialchars($auction['auction_date'] ?? 'Unknown Date') . "</p>";
        echo "<p>Place: " . htmlspecialchars($auction['auction_place'] ?? 'Unknown Place') . "</p>";

        // Fetch associated artworks
        echo "<h4>Artworks:</h4>";

        if (!empty($auction['artworks'])) {
            echo "<div class='artwork-container'>";
            foreach ($auction['artworks'] as $artworkId) {
                // Fetch artwork details from Firebase
                $artwork = $database->getReference('artworks/' . $artworkId)->getValue();

                // If artwork is found, display details
                if ($artwork) {
                    echo "<div class='artwork-card'>";
                    echo "<img class='artwork-img' src='" . htmlspecialchars($artwork['image_url'] ?? 'placeholder.jpg') . "' alt='Artwork Image'>";
                    echo "<p>Description: " . htmlspecialchars($artwork['description'] ?? 'No description available') . "</p>";
                    echo "</div>";
                } else {
                    echo "<p class='no-artwork'>Artwork not found for ID: " . htmlspecialchars($artworkId) . "</p>";
                }
            }
            echo "</div>";
        } else {
            echo "<p>No artworks associated with this auction.</p>";
        }
        echo "</div><hr>";
    }
} else {
    echo "<p>No auctions found.</p>";
}
?>

</body>
</html>
