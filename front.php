<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Auction Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #fdfbfb, #ebedee);
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }
      
        .navbar {
            display: flex;
            justify-content: space-around;
            align-items: center;
            background-color: #3498db;
            padding: 15px;
            color: white;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: 500;
            padding: 10px 20px;
        }
        .navbar a:hover {
            background-color: #2980b9;
            border-radius: 5px;
        }
        .main-content {
            text-align: center;
            margin-top: 20px;
        }
        .main-image {
            width:350px;
            height: 350px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
            margin-top: 20px;
        }
        h1 {
            color: #2c3e50;
            font-weight: 500;
        }
    </style>
</head>
<body>

    
    <div class="navbar">
        <a href="login3.php">Admin Dashboard</a>
        <a href="login2.php">Artist Dashboard</a>
        <a href="login1.php">User Dashboard</a>
    </div>

    <div class="main-content">
        <h1>Welcome to the Art Auction Platform</h1>
        <marquee><h3 style="color: #2c3e50;">An auction is where value meets passion</h3></marquee>
        <img src="image-removebg-preview.png" alt="Art Gallery" class="main-image">
    </div>

</body>
</html>
