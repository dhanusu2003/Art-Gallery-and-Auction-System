<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: artist_login.html");
    exit();
}

// Check if the artwork ID is set
if (!isset($_POST['artwork_id'])) {
    die("Artwork ID not provided.");
}

$artworkId = $_POST['artwork_id'];
$description = isset($_POST['description']) ? $_POST['description'] : '';
$auction_date = isset($_POST['auction_date']) ? $_POST['auction_date'] : '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Artwork</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        textarea, input[type="date"], button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 16px;
            outline: none;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        input[type="date"]:focus, textarea:focus {
            border-color: #4CAF50;
        }
    </style>
</head>
<body>

<!-- <h2>Modify Artwork</h2> -->

<form action="modify_artwork.php" method="POST">
    <input type="hidden" name="artwork_id" value="<?php echo htmlspecialchars($artworkId); ?>">
    
    <label for="description">Description:</label>
    <textarea id="description" name="description" required><?php echo htmlspecialchars($description); ?></textarea><br><br>
    
    <label for="auction_date">Auction Date:</label>
    <input type="date" id="auction_date" name="auction_date" value="<?php echo htmlspecialchars($auction_date); ?>" required><br><br>
    
    <button type="submit">Update</button>
</form>

</body>
</html>
