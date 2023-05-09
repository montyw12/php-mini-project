<?php

if ($_POST["submit"] ?? false) {

    // Variables
    $insertDataFlag = false;

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
    } else if(isAadharNumberValid($sData["student_aadhar_number"])){
        $msg = "Invalid aadhar number";
    } else if (!filter_var($sData["email_id"], FILTER_VALIDATE_EMAIL)) {
        $msg = "Invalid email address";
    } else {
        $insertDataFlag = true;
    }

    // If flag true then insert data in database
    if($insertDataFlag){
        $msg1 = "DATA INSERTED";
    }

    $msg = base64_encode($msg);
    $msg1 = base64_encode($msg1);
    $a = base64_encode(json_encode($sData));
    header("location: ./../formfillup.php?a=" . $a . "&msg=" . $msg . "&msg1=" . $msg1);
} else {
    echo "INVLID PAGE ACCESS";
}

function isEmpty($a): bool
{
    if (strlen($a) > 0) {
        return true;
    } else {
        return false;
    }
}

function isMobileNumberValid($a): bool
{
    if (strlen($a) == 10) {
        return true;
    } else {
        return false;
    }
}

function isAadharNumberValid($a): bool
{
    if (strlen($a) == 12) {
        return true;
    } else {
        return false;
    }
}
