<?php
session_start();
require 'includes/vendor/autoload.php';
include('includes/dbconfig.php');

// use Kreait\Firebase\Factory;

// // Initialize Firebase
// $factory = (new Factory)->withServiceAccount('includes/artgallery-96d08-firebase-adminsdk-ksbrp-777197a270.json');
// $database = $factory->createDatabase();

// Fetch artwork data from the database
$artworksRef = $database->getReference('artworks'); // Adjust the path based on your database structure
$artworks = $artworksRef->getValue();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artwork Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        h1{
            text-align: center;
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 20px; /* Space between images */
            justify-content: center; /* Center the images */
        }

        .artwork {
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
            width: 300px; /* Fixed width for artwork cards */
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .artwork img {
            width: 100%; /* Maintain full width of the card */
            height: 200px; /* Set a fixed height for all images */
            object-fit: cover; /* Ensures the image scales and crops to fit the container */
        }

        .details {
            padding: 15px;
        }

        .details h3 {
            margin: 0 0 10px;
        }

        .details p {
            color: #555;
        }
    </style>
</head>
<body>
    <h1>Artwork Gallery</h1>
    <div class="gallery">
        <?php if ($artworks): ?>
            <?php foreach ($artworks as $artwork): ?>
                <div class="artwork">
                    <img src="<?php echo htmlspecialchars($artwork['image_url']); ?>" alt="<?php echo htmlspecialchars($artwork['artist_name']); ?>">
                    <div class="details">
                        <h3><strong>Artiest Name:</strong><?php echo htmlspecialchars($artwork['artist_name']); ?></h3>
                        <p><strong>Description:</strong><?php echo htmlspecialchars($artwork['description']); ?></p>
                        <!-- <p><strong>Auction Date(on or Before):</strong> <?php echo htmlspecialchars($artwork['auction_date']); ?></p> -->
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No artworks available.</p>
        <?php endif; ?>
    </div>
</body>
</html>
