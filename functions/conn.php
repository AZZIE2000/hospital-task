<?php try {
    $conn = new PDO("mysql:host=localhost;dbname=hospital", "root", "root");
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "okay";
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}


function mama()
{
    echo "mama";
}
