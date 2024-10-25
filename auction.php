<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'Admin') {
    header("Location: artist_login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Auction</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        label {
            font-size: 16px;
            margin-bottom: 8px;
            display: block;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        button {
            width: 100%;
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
    </style>
</head>
<body>

<h2 style="text-align: center;">Add Auction</h2>

<form action="process_auction.php" method="POST" autocomplete="off">
    <label for="auction_name">Auction Name:</label>
    <input type="text" id="auction_name" name="auction_name" required>

    <label for="auction_date">Auction Date:</label>
    <input type="date" id="auction_date" name="auction_date" required>

    <label for="auction_place">Auction Place:</label>
    <input type="text" id="auction_place" name="auction_place" placeholder="Include Place & Time also here!" required>

    <label for="artworks">Select Artworks:</label>
    <select id="artworks" name="artworks[]" multiple required>
        <!-- This will be populated with artwork options -->
    </select>

    <button type="submit">Add Auction</button>
</form>

<script>
    // Fetch artworks from Firebase and populate the select options
    async function fetchArtworks() {
        const response = await fetch('get_artworks.php');
        const artworks = await response.json();

        const select = document.getElementById('artworks');
        artworks.forEach(artwork => {
            const option = document.createElement('option');
            option.value = artwork.id;
            option.textContent = artwork.description; // Display description or title
            select.appendChild(option);
        });
    }

    fetchArtworks();
</script>

</body>
</html>