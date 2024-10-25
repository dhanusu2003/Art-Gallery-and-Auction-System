<?php
session_start();
require 'includes/vendor/autoload.php'; 

use Kreait\Firebase\Factory;

if (isset($_POST['upload_artwork'])) {
    
    $artist_name = $_POST['artist_name'];
    $description = $_POST['description'];
    $auction_date = $_POST['auction_date'];

    
    $target_dir = "uploads/"; 
    $target_file = $target_dir . basename($_FILES["artwork_image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $uploadOk = 1;

    
    $check = getimagesize($_FILES["artwork_image"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

   
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    
    if ($_FILES["artwork_image"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    
    if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

   
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["artwork_image"]["tmp_name"], $target_file)) {
            
            $factory = (new Factory)->withServiceAccount('includes/artgallery-96d08-firebase-adminsdk-ksbrp-777197a270.json')
                ->withDatabaseUri('https://artgallery-96d08-default-rtdb.firebaseio.com');
            $database = $factory->createDatabase();

            $data = [
                'artist_name' => $artist_name,
                'description' => $description,
                'auction_date' => $auction_date,
                'image_url' => $target_file 
            ];

            $postdata = $database->getReference('artworks')->push($data);

            if ($postdata) {
                echo "<script>
                alert('Uploaded Successful');
                setTimeout(function(){
                    window.location.href = 'artistindex.php';
                }, 0000);
            </script>";
                exit();
            } else {
                echo "<script>
                alert('Failed to save artwork details in the database.');
                setTimeout(function(){
                    window.location.href = 'upload_process.php';
                }, 0000);
            </script>";
                exit();
            }
            
        } else {
            echo "<script>
                alert('Sorry, there was an error uploading your file.');
                setTimeout(function(){
                    window.location.href = 'upload_process.php';
                }, 0000);
            </script>";
        }
    }
}
