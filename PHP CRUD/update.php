<?php 
    include 'db.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id = $_POST["update_id"];

        $title = $_POST["edit_title"];
        $email = $_POST["edit_email"];
        $description = $_POST["edit_description"];
        $name = $_POST["edit_author_name"];

        $sql = "UPDATE newsfeed SET title='$title', description='$description', author_name='$name', author_email='$email'  WHERE id=$id";
        if (mysqli_query($conn,$sql)) {
            header('Location:index.php');
            // echo "Student Addded";
        }
    }

    
?>