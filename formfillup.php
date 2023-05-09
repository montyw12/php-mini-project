<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./R/bootstrap.css">
    <style>
        *{
            font-size: large;
        }
    </style>
    <title>FORMFILLUP</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="my-3">
                    <label class="form-lable">Student name:</label>
                    <input class="form-control mt-1" type="text" name="student_name" placeholder="student name">
                </div>
                <div class="my-3">
                    <label class="form-lable">Father name:</label>
                    <input class="form-control" type="text" name="father_name" placeholder="father name">
                </div>
                

            </div>
        </div>
    </div>
    <form>
        <label>Mother name:</label>
        <input type="text" name="mother_name" placeholder="mother_name">
        <label>Student aadhar number:</label>
        <input type="number" name="student_aadhar_number" placeholder="student_aadhar_number">
        <label>Father mobile no:</label>
        <input type="tel" name="father_mobile_no" placeholder="father_mobile_no">
        <label>Permanant address:</label>
        <textarea name="permanant_address" placeholder="permanant_address"></textarea>
        <label>Citizen:</label>
        <select name="citizen">
            <option value="urban">Urban</option>
            <option value="rural">rural</option>
        </select>
        <label>Gender:</label>
        <select name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
        <label>Category of admission:</label>
        <select name="category_of_admission">
            <option value="diploma">Diploma</option>
            <option value="be">BE</option>
            <option value="bcom">Bcom</option>
            <option value="bca">BCA</option>
            <option value="btech">BTech</option>
        </select>
        <label>Parents annual income:</label>
        <input type="number" name="parents_annual_income" placeholder="parents_annual_income">
        <label>10th Merit Rank:</label>
        <input type="number" name="10th_merit_rank" placeholder="10th_merit_rank">
        <label>Email Id:</label>
        <input type="email" name="email_id" placeholder="email_id">
        <label>Student Whatsapp Number:</label>
        <input type="tel" name="student_whatsapp_number" placeholder="student_whatsapp_number">
        <label>Birth Date:</label>
        <input type="date" name="birth_date" placeholder="birth_date">
        <label>Religion:</label>
        <select name="religion">
            <option value="hindu">Hindu</option>
            <option value="muslim">Muslim</option>
            <option value="christi">Christi</option>
            <option value="judaism">Judaism</option>
            <option value="sikhism">Sikhism</option>
            <option value="shuddhism">Shuddhism</option>
        </select>
        <button name="submit" value="submit">Submit</button>
    </form>
    <script src="./R/jquery-3.6.3.js"></script>
    <script src="./R/bootstrap.bundle.js"></script>
</body>

</html>