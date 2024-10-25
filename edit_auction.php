<?php
session_start();
require __DIR__ . '/includes/vendor/autoload.php';
include("includes/dbconfig.php");

use Kreait\Firebase\Factory;

$auctionId = $_GET['id'];

// Fetch the auction details
$auction = $database->getReference('auctions/' . $auctionId)->getValue();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $auctionName = $_POST['auction_name'];
    $auctionDate = $_POST['auction_date'];
    $auctionPlace = $_POST['auction_place'];

    // Update the auction details
    $database->getReference('auctions/' . $auctionId)->update([
        'auction_name' => $auctionName,
        'auction_date' => $auctionDate,
        'auction_place' => $auctionPlace,
    ]);

    header('Location: view_auctions.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Auction</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        label {
            font-size: 16px;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"], input[type="date"] {
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
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .form-container {
            width: 100%;
            max-width: 400px;
            margin: auto;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Edit Auction</h2>

    <form method="POST">
        <label for="auction_name">Auction Name:</label>
        <input type="text" id="auction_name" name="auction_name" value="<?php echo htmlspecialchars($auction['auction_name'] ?? ''); ?>" required>

        <label for="auction_date">Auction Date:</label>
        <input type="date" id="auction_date" name="auction_date" value="<?php echo htmlspecialchars($auction['auction_date'] ?? ''); ?>" required>

        <label for="auction_place">Auction Place:</label>
        <input type="text" id="auction_place" name="auction_place" value="<?php echo htmlspecialchars($auction['auction_place'] ?? ''); ?>" required>

        <button type="submit">Update Auction</button>
    </form>
</div>

</body>
</html>
