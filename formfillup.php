<?php
if($_GET["a"] ?? false){
    $a = json_decode(base64_decode($_GET["a"]));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./R/bootstrap.css">
    <style>
        * {
            font-size: large;
        }
    </style>
    <title>FORMFILLUP</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <form method="post" action="./php/formfillup.fun.php">
                <div class="col-12">
                    <div class="my-3">
                        <label class="form-lable">Student name</label>
                        <input class="form-control mt-1" type="text" name="student_name" placeholder="student name" value="<?= $a->student_name ?? "" ?>">
                    </div>
                    <div class="my-3">
                        <label class="form-lable">Father name</label>
                        <input class="form-control mt-1" type="text" name="father_name" placeholder="father name" required>
                    </div>
                    <div class="my-3">
                        <label class="form-lable">Mother name</label>
                        <input class="form-control mt-1" type="text" name="mother_name" placeholder="mother name">
                    </div>
                    <div class="my-3">
                        <label class="form-lable">Student aadhar number</label>
                        <input class="form-control mt-1" type="number" name="student_aadhar_number" placeholder="student aadhar number">
                    </div>
                    <div class="my-3">
                        <label class="sr-only">Father mobile no</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">+91</div>
                            </div>
                            <input class="form-control" type="tel" name="father_mobile_no" placeholder="father mobile no">
                        </div>
                    </div>
                    <div class="my-3">
                        <label class="form-lable">Permanant address</label>
                        <textarea class="form-control mt-1" name="permanant_address" placeholder="permanant address"></textarea>
                    </div>
                    <div class="my-3">
                        <label class="form-lable">Citizen</label>
                        <select class="form-select mt-1" name="citizen">
                            <option value="urban">Urban</option>
                            <option value="rural">rural</option>
                        </select>
                    </div>
                    <div class="my-3">
                        <label class="form-lable">Gender</label>
                        <select class="form-select mt-1" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="my-3">
                        <label class="form-lable">Category of admission</label>
                        <select class="form-select mt-1" name="category_of_admission">
                            <option value="diploma">Diploma</option>
                            <option value="be">BE</option>
                            <option value="bcom">Bcom</option>
                            <option value="bca">BCA</option>
                            <option value="btech">BTech</option>
                        </select>
                    </div>
                    <div class="my-3">
                        <label class="form-lable">Parents annual income</label>
                        <input class="form-control mt-1" type="number" name="parents_annual_income" placeholder="parents annual income">
                    </div>
                    <div class="my-3">
                        <label class="form-lable">10th Merit Rank</label>
                        <input class="form-control mt-1" type="number" name="10th_merit_rank" placeholder="10th merit rank">
                    </div>
                    <div class="my-3">
                        <label class="form-lable">Email Id</label>
                        <input class="form-control mt-1" type="email" name="email_id" placeholder="email id">
                    </div>
                    <div class="my-3">
                        <label class="form-lable">Student Whatsapp Number</label>
                        <input class="form-control mt-1" type="tel" name="student_whatsapp_number" placeholder="student whatsapp number">
                    </div>
                    <div class="my-3">
                        <label class="form-lable">Birth Date</label>
                        <input class="form-control mt-1" type="date" name="birth_date" placeholder="birth date">
                    </div>
                    <div class="my-3">
                        <label class="form-lable">Religion</label>
                        <select class="form-select mt-1" name="religion">
                            <option value="hindu">Hindu</option>
                            <option value="muslim">Muslim</option>
                            <option value="christi">Christi</option>
                            <option value="judaism">Judaism</option>
                            <option value="sikhism">Sikhism</option>
                            <option value="shuddhism">Shuddhism</option>
                        </select>
                    </div>
                    <div class="my-3">
                        <button class="btn btn-primary mt-1" name="submit" value="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="./R/jquery-3.6.3.js"></script>
    <script src="./R/bootstrap.bundle.js"></script>
</body>

</html>