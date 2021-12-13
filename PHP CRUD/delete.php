<?php 
    include 'db.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id = $_POST["delete_id"];

        $sql = "DELETE from newsfeed where id=$id";
        if (mysqli_query($conn,$sql)) {
            echo "<script> alert('Student Deleted 🧑‍🎓')</script>";
            // echo "Student Addded";
        }
    }

    header('Location:index.php');
?>