<?php


include "conn.php";

try {
    // Create prepared statement
    $sql = "INSERT INTO patients ( patient_name, patient_age, patient_address, patient_doctor) 
    VALUES (:patient_name, :age, :p_address , :patient_doctor )";
    $stmt = $conn->prepare($sql);

    // Bind parameters to statement
    $name = $_POST['first_name'] . " " . $_POST['second_name'];
    echo $name;
    $stmt->bindParam(':patient_name', $name);
    $stmt->bindParam(':age', $_POST['age']);
    $stmt->bindParam(':p_address', $_POST['address']);
    $stmt->bindParam(':patient_doctor', $_POST['p-doc']);

    // echo $name;
    $stmt->execute();
    header("Location: http://localhost/hospital/addpatients.php?done=1");
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    header("Location: http://localhost/hospital/addpatients.php?done=0");
}

// Close connection
