<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist Home Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Using Bootstrap for styling -->
    <style>
        body {
            background: linear-gradient(135deg, #f0f4f8, #dfe7fd);
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .dashboard-container {
            background-color: #ffffff;
            padding: 60px;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            max-width: 1000px;
            width: 100%;
            text-align: center;
        }
        .dashboard-container h1 {
            font-size: 2.5rem;
            color: #333;
            font-weight: 600;
            margin-bottom: 50px;
        }
        .dashboard-blocks {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
        }
        .block {
            flex: 1;
            margin: 15px;
            max-width: 300px;
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 15px;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .block:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
        .block a {
            text-decoration: none;
        }
        .dashboard-btn {
            display: inline-block;
            width: 100%;
            padding: 15px;
            font-size: 1.2rem;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .dashboard-btn:focus {
            outline: none;
        }
        .btn-primary {
            background: #3498db;
            color: #fff;
        }
        .btn-primary:hover {
            background: #2980b9;
        }
        .btn-success {
            background: #2ecc71;
            color: #fff;
        }
        .btn-success:hover {
            background: #27ae60;
        }
        .btn-info {
            background: #e67e22;
            color: #fff;
        }
        .btn-info:hover {
            background: #d35400;
        }
        .block h2 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <a href="front.php">
        <button class="btn btn-primary dashboard-btn" style="padding-right: 30px;">Home</button>
    </a>
    <div class="dashboard-container">
        <h1>Welcome to Artist Page</h1>
        <div class="dashboard-blocks">
            <div class="block">
                <h2>Add Art</h2>
                <a href="addarts.php">
                    <button class="btn btn-primary dashboard-btn">Click Here!</button>
                </a>
            </div>
            <div class="block">
                <h2>Manage Arts</h2>
                <a href="artist_un.php">
                    <button class="btn btn-success dashboard-btn">Click Here!</button>
                </a>
            </div>

            <div class="block">
                <h2>View Auctions</h2>
                <a href="view_auctions.php">
                    <button class="btn btn-primary dashboard-btn">Click Here!</button>
                </a>
            </div>
            
        </div>
    </div>
</body>
</html>
