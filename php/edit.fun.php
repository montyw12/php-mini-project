<?php
require_once("./database.config.php");

if($_POST["delete"] ?? false){
    $r_id = $_POST["delete"];
    try {
        $conn = databaseConnector();
        $sqlQuery = "DELETE FROM students WHERE r_id = ?";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sqlQuery)) {
            mysqli_stmt_bind_param($stmt, "i", $r_id);
            mysqli_stmt_execute($stmt);
            $msg1 = "Student's data deleted.";
        } else {
            $msg = "Something went wrong";
        }
        mysqli_stmt_close($stmt);
        databaseConnectorClose($conn);
    } catch (Exception $e) {
        $msg = "Please try again";
    }

    $msg = base64_encode($msg);
    $msg1 = base64_encode($msg1);
    header("location: ./../read.php?a=STUDENT DATA DELETED");


    
} else if ($_POST["update"] ?? false) {

    // Variables
    $r_id = $_POST["update"];
    $updateDataFlag = false;

    // Take all submited post data to sData variable
    $sData = $_POST;

    // Trim all inputed data
    foreach ($sData as $key => $value) {
        $sData[$key] = trim($value);
    }

    // Check if inputed data empty or not and validate data
    if (isEmpty($sData["student_name"])) {
        $msg = "Student name required";
    } else if (isEmpty($sData["father_name"])) {
        $msg = "Father name required";
    } else if (isEmpty($sData["mother_name"])) {
        $msg = "Mother name required";
    } else if (isEmpty($sData["student_aadhar_number"])) {
        $msg = "Aadhar number required";
    } else if (isEmpty($sData["father_mobile_number"])) {
        $msg = "Mobile number required";
    } else if (isEmpty($sData["permanent_address"])) {
        $msg = "Permanent address required";
    } else if (isEmpty($sData["parents_annual_income"])) {
        $msg = "Parent annual income required";
    } else if (isEmpty($sData["tenth_merit_rank"])) {
        $msg = "Tenth merit rank required";
    } else if (isEmpty($sData["email_id"])) {
        $msg = "Email is required";
    } else if (isEmpty($sData["student_whatsapp_number"])) {
        $msg = "Whatsapp number required";
    } else if (isEmpty($sData["birth_date"])) {
        $msg = "birth date required";
    } else if (isMobileNumberValid($sData["father_mobile_number"])) {
        $msg = "Invalid mobile number";
    } else if (isMobileNumberValid($sData["student_whatsapp_number"])) {
        $msg = "Invalid whatsapp number";
    } else if (isAadharNumberValid($sData["student_aadhar_number"])) {
        $msg = "Invalid aadhar number";
    } else if (!filter_var($sData["email_id"], FILTER_VALIDATE_EMAIL)) {
        $msg = "Invalid email address";
    } else {
        $updateDataFlag = true;
    }

    // If flag true then update data in database
    if ($updateDataFlag) {
        try {
            $conn = databaseConnector();
            $sqlQuery = "UPDATE students SET student_name = ?, father_name = ?, mother_name = ?, student_aadhar_number = ?, father_mobile_number = ?, permanent_address = ?, citizen = ?, gender = ?, category_of_admission = ?, parents_annual_income = ?, tenth_merit_rank = ?, student_whatsapp_number = ?, birth_date = ?, religion = ?, email_id = ? WHERE r_id = ?;";
            $stmt = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmt, $sqlQuery)) {
                mysqli_stmt_bind_param($stmt, "sssssssssdissssi", $sData["student_name"], $sData["father_name"], $sData["mother_name"], $sData["student_aadhar_number"], $sData["father_mobile_number"], $sData["permanent_address"], $sData["citizen"], $sData["gender"], $sData["category_of_admission"], $sData["parents_annual_income"], $sData["tenth_merit_rank"], $sData["student_whatsapp_number"], $sData["birth_date"], $sData["religion"], $sData["email_id"], $r_id);
                mysqli_stmt_execute($stmt);
                $msg1 = "Data updated successfully";
            } else {
                $msg = "Something went wrong";
            }
            mysqli_stmt_close($stmt);
            databaseConnectorClose($conn);
        } catch (Exception $e) {
            $msg = "Please try again " . $e->getMessage();
        }
    }

    $msg = base64_encode($msg);
    $msg1 = base64_encode($msg1);
    $a = base64_encode(json_encode($sData));
    header("location: ./../edit.php?a=" . $a . "&msg=" . $msg . "&msg1=" . $msg1);
} else {
    echo "INVALID PAGE ACCESS";
}

function isEmpty($a): bool
{
    if (strlen($a) > 0) {
        return false;
    } else {
        return true;
    }
}

function isMobileNumberValid($a): bool
{
    if (strlen($a) == 10) {
        return false;
    } else {
        return true;
    }
}

function isAadharNumberValid($a): bool
{
    if (strlen($a) == 12) {
        return false;
    } else {
        return true;
    }
}
