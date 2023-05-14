<?php

if ($_GET["select"] ?? false) {
    $r_id = $_GET["select"];

    try {
        require_once("./../php/database.config.php");
        $conn = databaseConnector();
        $sqlQuery = "SELECT * FROM students WHERE r_id = ?";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sqlQuery)) {
            mysqli_stmt_bind_param($stmt, "i", $r_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $data = mysqli_fetch_assoc($result);
            $outputMsg = json_encode($data);
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
