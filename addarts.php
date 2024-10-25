<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Artwork</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="date"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        textarea {
            resize: vertical; /* Allows resizing vertically */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Upload Artwork</h1>
        <form action="upload_process.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <label for="artist_name">User Name:</label>
            <input type="text" id="artist_name" name="artist_name"  required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required placeholder="Mention the date & your Description"></textarea>

            <label for="auction_date">Auction Date:</label>
            <input type="date" id="auction_date" name="auction_date" required placeholder="On or Before">

            <label for="artwork_image">Upload Image:</label>
            <input type="file" id="artwork_image" name="artwork_image" accept="image/*" required>

            <button type="submit" name="upload_artwork">Upload Artwork</button>
        </form>
    </div>
</body>
</html>
