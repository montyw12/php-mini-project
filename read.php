<?php
try {
    require_once("./php/database.config.php");
    // Connect to database
    $conn = databaseConnector();

    if ($conn != false) {
        // Write sql query
        $sqlQuery = "SELECT * FROM students;";

        // Execute query and store result
        $result = mysqli_query($conn, $sqlQuery);
    } else {
        $msg = "Can't connect to database";
    }
    databaseConnectorClose($conn);
} catch (Exception $e) {
    $msg = "Please try again";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>READ</title>
    <link rel="stylesheet" href="./R/bootstrap.css">
    <link rel="stylesheet" href="./R/datatables.min.css">
    <style>
        * {
            font-size: large;
        }
    </style>
</head>

<body>
    <div class="fluid-container">
        <div class="row">
            <div class="col mt-4">
                <form method="post" action="./php/read.fun.php">
                    <table class="table table-sm table-striped" id="myTable">
                        <thead>
                            <tr class="bg-primary">
                                <th>Student name</th>
                                <th>Father name</th>
                                <th>Mother name</th>
                                <th>Student aadhar no</th>
                            <th>Mobile no</th>
                            <th>Permanent address</th>
                            <th>Citizen</th>
                            <th>Gender</th>
                            <th>Admission</th>
                            <th>Income</th>
                            <th>Merit rank</th>
                            <th>Email</th>
                            <th>Whatsapp no</th>
                            <th>Birth date</th>
                            <th>Religion</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data = mysqli_fetch_assoc($result)) : ?>
                                <tr>
                                    <td><?= $data["student_name"] ?></td>
                                    <td><?= $data["father_name"] ?></td>
                                    <td><?= $data["mother_name"] ?></td>
                                    <td><?= $data["student_aadhar_no"] ?></td>
                                    <td><?= $data["father_mobile_no"] ?></td>
                                    <td><?= $data["permanent_address"] ?></td>
                                    <td><?= $data["citizen"] ?></td>
                                    <td><?= $data["gender"] ?></td>
                                    <td><?= $data["category_of_admission"] ?></td>
                                    <td><?= $data["parents_annual_income"] ?></td>
                                    <td><?= $data["10th_merit_rank"] ?></td>
                                    <td><?= $data["email_id"] ?></td>
                                    <td><?= $data["student_whatsapp_no"] ?></td>
                                    <td><?= $data["birth_date"] ?></td>
                                    <td><?= $data["religion"] ?></td>
                                    <td><Button value="<?= $data["r_id"] ?>" name="edit" class="btn btn-outline-warning ">Edit</Button></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <script src="./R/jquery-3.6.3.js"></script>
    <script src="./R/bootstrap.bundle.js"></script>
    <script src="./R/datatables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
</body>

</html>