<?php
// start conn
include "conn.php";



try {
    // get data from url id 

    $id = $_POST["p-id"];


    $p_name =  $_POST['first_name'] . " " . $_POST['second_name'];
    $p_age =  $_POST['age'];
    $p_address =  $_POST['address'];
    $p_doctor =  $_POST['p-doc'];

    // sql to delete a record
    $sql = "UPDATE patients SET patient_name = '$p_name', patient_age = '$p_age', patient_address = '$p_address', patient_doctor = '$p_doctor' WHERE patient_id=$id";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
    header("Location: http://localhost/hospital/overview.php?code=1");
    // exit();
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
