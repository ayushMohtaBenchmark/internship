<?php
    include 'db.php';
    

    $selectSQL = 'SELECT * FROM student_info';
    $result = mysqli_query($conn,$selectSQL);
    if ($result) {
        while ($row = mysqli_fetch_array($result)) {
            foreach($row as $data){
                echo $data;
            }
        }
    }
    // if (!($selectRes = mysqli_query($conn,$selectSQL))) {
    //     echo 'Retereival of data Failed - #'.mysql_errno().': '.mysql_error();
    // }else{
    //     $row = mysqli_fetch-assoc($selectRes);
    //     echo $row['name'];
    //     echo $row['email'];
    //     echo $row['phone'];
    //     echo $row['place'];
    // }
?>