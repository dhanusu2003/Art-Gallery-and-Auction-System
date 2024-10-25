<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(100deg, #f5f7fa, #c3cfe2);
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 10;
        }

        .container {
            background-color: #ffffff;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            /* width: 80%; */
        }

        h2 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
            font-weight: 600;
        }

        hr {
            border: 0;
            height: 1px;
            background: #ddd;
            margin-bottom: 30px;
        }

        .registration-form {
            width: 100%;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            padding: 5px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 70%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease; 
        }

        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 8px rgba(52, 152, 219, 0.5);
        }

        button[type="submit"] {
            padding: 15px 40px;
            background-color: #3498db;
            color: #fff;
            font-size: 1.1rem;
            font-weight: 600;
            border: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #2980b9;
            cursor: pointer;
        }
    </style>
</head>
<body>

<?php include('includes/header.php'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-4">
            <h2 class="text-center">Login Page</h2>
            <hr>
            <form action="logincode2.php" method="POST" class="registration-form" autocomplete="off">
                <center>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Enter Email" required><br>
                    </div>
                
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Enter Password" required><br> 
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </div>

                    <h5>Don't Have an Account then <a href="register2.php">Register</a></h5>
                </center>
            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>

</body>
</html>
