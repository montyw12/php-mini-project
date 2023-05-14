<?php

if ($_GET["submit"] ?? false) {

    // Take all submited get data to sData variable
    $sData = $_GET;

    // Trim all inputed data
    foreach ($sData as $key => $value) {
        $sData[$key] = trim($value);
    }

    try {
        $submitDatetime = date("YmdHis");
        require_once("./../php/database.config.php");
        $conn = databaseConnector();
        $sqlQuery = "INSERT INTO students(submit_datetime, student_name, father_name, mother_name, student_aadhar_number, father_mobile_number, permanent_address, citizen, gender, category_of_admission, parents_annual_income, tenth_merit_rank, student_whatsapp_number, birth_date, religion, email_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sqlQuery)) {
            mysqli_stmt_bind_param($stmt, "ssssssssssdissss", $submitDatetime, $sData["student_name"], $sData["father_name"], $sData["mother_name"], $sData["student_aadhar_number"], $sData["father_mobile_number"], $sData["permanent_address"], $sData["citizen"], $sData["gender"], $sData["category_of_admission"], $sData["parents_annual_income"], $sData["tenth_merit_rank"], $sData["student_whatsapp_number"], $sData["birth_date"], $sData["religion"], $sData["email_id"]);
            mysqli_stmt_execute($stmt);
            $outputMsg = "Data inserted.";
        } else {
            $outputMsg = "Something went wrong.";
        }
        mysqli_stmt_close($stmt);
        databaseConnectorClose($conn);
    } catch (Exception $e) {
        $outputMsg = "Exception Msg: " . $e->getMessage();
    }
    echo $outputMsg;
} else {
    echo "INVALID PAGE ACCESS";
}
