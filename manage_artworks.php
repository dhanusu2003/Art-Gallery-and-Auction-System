<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: artist_login.html");
    exit();
}

require __DIR__ . '/includes/vendor/autoload.php';
include("includes/dbconfig.php");

use Kreait\Firebase\Factory;

// Get the username from the session
$username = $_SESSION['username'];

// Reference to the artworks table
$reference = $database->getReference('artworks');

// Retrieve all artwork data
$artworks = $reference->getValue();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Your Artworks</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        .artwork {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        img {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 5px;
            margin-bottom: 10px;
        }
        button {
            margin: 5px 0;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        form {
            display: inline-block;
        }
    </style>
</head>
<body>

<h2>Manage Your Artworks, <?php echo htmlspecialchars($username); ?></h2>
<a href="artistindex.php">
        <button class="artist-page-button">Artist Page</button>
    </a>


<?php
// Check if there are any artworks
if ($artworks) {
    foreach ($artworks as $artworkId => $artwork) {
        if ($artwork['artist_name'] === $username) {
            echo "<div class='artwork'>";
            echo "<p><strong>Description:</strong> " . htmlspecialchars($artwork['description']) . "</p>";
            echo "<p><strong>Auction Date:</strong> " . htmlspecialchars($artwork['auction_date']) . "</p>";
            echo "<img src='" . htmlspecialchars($artwork['image_url']) . "' width='200'><br>";

            // Form to modify artwork
            echo "<form action='modify_artwork_form.php' method='POST'>";
            echo "<input type='hidden' name='artwork_id' value='" . htmlspecialchars($artworkId) . "'>";
            echo "<input type='hidden' name='description' value='" . htmlspecialchars($artwork['description']) . "'>";
            echo "<input type='hidden' name='auction_date' value='" . htmlspecialchars($artwork['auction_date']) . "'>";
            echo "<button type='submit'>Modify</button>";
            echo "</form>";

            // Form to delete artwork
            echo "<form action='delete_artwork.php' method='POST' onsubmit='return confirm(\"Are you sure you want to delete this artwork?\");'>";
            echo "<input type='hidden' name='artwork_id' value='" . htmlspecialchars($artworkId) . "'>";
            echo "<button type='submit' style='background-color: #dc3545;'>Delete</button>";
            echo "</form>";

            echo "</div>";
        }
    }
} else {
    echo "<p>No artworks found for artist: " . htmlspecialchars($username) . "</p>";
}
?>

</body>
</html>
