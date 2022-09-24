<?php
// start conn
include "conn.php";

$id = $_REQUEST["p_id"];
try {
    // sql to delete a record
    $sql = "DELETE FROM patients WHERE patient_id = $id";

    // use exec() because no results are returned
    $conn->exec($sql);
    // echo $conn->exec($sql);
    // echo "Record deleted successfully";
    header("Location: http://localhost/hospital/overview.php?done=1");
    // exit();
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
