<?php 
    include 'db.php';
    
    $title = $email = $name = $description = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST["title"];
        $description = $_POST["description"];
        $name = $_POST["name"];
        $email = $_POST["email"];

        // file upload
        $file_name = $_FILES["photo"]["name"];
        $file_type = $_FILES["photo"]["type"];
        $file_size = $_FILES["photo"]["size"];
        $file_tmp_name = $_FILES["photo"]["tmp_name"];
        $file_error = $_FILES["photo"]["error"];
        $uploaddir = 'uploads/';
        $stem=substr($file_name,0,strpos($file_name,'.'));
        $extension = substr($file_name, strpos($file_name,'.'), strlen($file_name)-1);
        $uploadfile = $uploaddir . $stem.$extension;


        if (!empty($title)) {
            if (!empty($description)) {
                if (!empty($name)) {
                    if (!empty($email)) {

                        move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);

                        $sql = "INSERT INTO newsfeed(title,description,author_name,author_email,image)
                                values('$title','$description','$name','$email','$file_name')";
                        if (mysqli_query($conn,$sql)) {
                            echo "<script> alert('Student Added 🧑‍🎓')</script>";
                            // echo "Student Addded";
                        }
                    }else {
                        echo "<script> alert('place cannot be empty')</script>";
                    }
                }else {
                    "<script>alert('phone number cannot be empty')</script>";
                }
            }else {
                echo "<script> alert('Email cannot be empty')</script>";
            }
        }else {
            echo "<script> alert('Name Cannot be Empty!')</script>";
        }


        
    }

    header('Location:index.php');
?>