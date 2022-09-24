<?php

include "conn.php";
// start conn


try {
    // Create prepared statement
    $sql = "INSERT INTO doctors ( doc_name, doc_age, doc_address, doc_specialty) 
    VALUES (:doc_name, :doc_age, :doc_address , :doc_specialty )";
    $stmt = $conn->prepare($sql);

    // Bind parameters to statement
    $name = $_POST['first_name'] . " " . $_POST['second_name'];
    echo $name;
    $stmt->bindParam(':doc_name', $name);
    $stmt->bindParam(':doc_age', $_POST['age']);
    $stmt->bindParam(':doc_address', $_POST['address']);
    $stmt->bindParam(':doc_specialty', $_POST['specialty']);

    // echo $name;
    $stmt->execute();
    header("Location: http://localhost/hospital/adddoctors.php?done=1");
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    header("Location: http://localhost/hospital/adddoctors.php?done=0");
}

// Close connection
