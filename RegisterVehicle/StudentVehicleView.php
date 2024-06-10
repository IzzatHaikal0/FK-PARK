<?php

include '../Dashboard/DashboardViewStudent.php'; 

//session_start();

include("../Database/DatabaseConn.php");
mysqli_select_db($conn, "projectweb") or die(mysqli_error($conn));

$student_ID =$_SESSION['SESS_ID'];

$query = "SELECT * FROM vehicle where student_ID = '$student_ID'";
$result = mysqli_query($conn, $query);

if(!$result){
    die("Error executing query ". mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

$student_ID = $row['student_ID'];

$vehicle_PlateNum = $row["vehicle_PlateNum"];
$vehicle_Grant = $row["vehicle_Grant"];
$vehicle_Category = $row["vehicle_Category"];
$vehicle_Model = $row["vehicle_Model"];
$vehicle_Year = $row["vehicle_Year"];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $vehicle_PlateNum = $_POST["vehicle_PlateNum"];
    $vehicle_Grant = $_POST["vehicle_Grant"];
    $vehicle_Category = $_POST["vehicle_Category"];
    $vehicle_Model = $_POST["vehicle_Model"];
    $vehicle_Year = $_POST["vehicle_Year"];

    // Use a query to update student data
    $query = "UPDATE vehicle SET vehicle_PlateNum = '$vehicle_PlateNum', vehicle_Grant = '$vehicle_Grant', vehicle_Category = '$vehicle_Category', vehicle_Year = '$vehicle_Year' WHERE student_ID = '$student_ID'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script type='text/javascript'> window.location='StudentVehicleView.php'; </script>";
        exit;
    } else {
        die("Could not execute query in updateUser.php: " . mysqli_error($conn));
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../Dashboard/Dashboard_style.css">
    <link rel="stylesheet" href="RegisterVehicle_style.css">
</head>
<body>

    <div class="container">
        <div class="title">Manage Vehicle Information</div>
        <div class="content">
            <form action="" method="POST">
                        <div class="user-details">
                        <div class="input-box">
                            <span class="details">Vehicle Plate Number</span>
                            <input type="text" name="vehicle_PlateNum" value="<?php echo htmlspecialchars($vehicle_PlateNum); ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Vehicle Category</span>
                            <input type="text" name="vehicle_Category" value="<?php echo htmlspecialchars($vehicle_Category); ?>" required>
                        </div>    
                        <div class="input-box">
                            <span class="details">Vehicle Year</span>
                            <input type="text" name="vehicle_Year" value="<?php echo htmlspecialchars($vehicle_Year); ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Vehicle Model</span>
                            <input type="text" name="vehicle_Model" value="<?php echo htmlspecialchars($vehicle_Model); ?>" required>
                        </div>

                        <div class="input-box">
                            <span class="details">Vehicle Grant</span>
                            <!-- Display the name of the selected file -->
                            <span><?php echo htmlspecialchars($vehicle_Grant); ?></span>
                            <!-- Provide a hidden input field to store the file name -->
                            <input type="hidden" name="current_vehicle_grant" value="<?php echo htmlspecialchars($vehicle_Grant); ?>">
                            <!-- Input field for uploading a new file -->
                            <input type="file" id="vehicleGrant" name="vehicle_Grant" accept=".pdf" required>
                            <!-- Label for the file input -->
                            <label for="vehicleGrant" class="custom-file-upload">Choose New File</label>
                        </div>

                        </div>
                        
                        <div class="button">
                            <input type ="hidden" name="student_ID" value="<?php echo $student_ID; ?>">
                            <input type="submit" value="Register">
                        </div>
            </form>
        </div>
    </div>

</body>

<script>
        document.getElementById('vehicleGrant').addEventListener('change', function() {
            var fileName = this.files[0].name;
            document.querySelector('.custom-file-upload').textContent = fileName;
        });
    </script>
</html>
