<?php

if ($_GET["delete"] ?? false) {
    $r_id = $_GET["delete"];
    try {
        require_once("./database.config.php");
        $conn = databaseConnector();
        $sqlQuery = "DELETE FROM students WHERE r_id = ?";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sqlQuery)) {
            mysqli_stmt_bind_param($stmt, "i", $r_id);
            mysqli_stmt_execute($stmt);
            $outputMsg = "Data deleted.";
        } else {
            $outputMsg = "Something went wrong";
        }
        mysqli_stmt_close($stmt);
        databaseConnectorClose($conn);
    } catch (Exception $e) {
        $outputMsg = "Please try again";
    }
    echo $outputMsg;
} else {
    echo "INVALID PAGE ACCESS";
}
