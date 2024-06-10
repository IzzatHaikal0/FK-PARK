<?php
    session_start();
    require_once('../Database/DatabaseConn.php');

    // Select the database
    mysqli_select_db($conn, "projectweb") or die(mysqli_error());

    // Get student ID from session
    $student_ID = $_SESSION['SESS_ID'];

    // Get vehicle details from POST
    $vehicle_PlateNum = $_POST["vehicle_PlateNum"];
    $vehicle_Grant = $_POST["vehicle_Grant"];
    $vehicle_Category = $_POST["vehicle_Category"];
    $vehicle_Model = $_POST["vehicle_Model"];
    $vehicle_Year = $_POST["vehicle_Year"];

    // Check if the provided student ID exists
    $checkquery = "SELECT * FROM student WHERE student_ID = '$student_ID'";
    $checkresult = mysqli_query($conn, $checkquery);
    if(mysqli_num_rows($checkresult) == 0) {
        die("Student with ID $student_ID does not exist");
    }

    // Create the SQL query to insert vehicle details
    $query = "INSERT INTO vehicle (vehicle_PlateNum, vehicle_Grant, vehicle_Category, vehicle_Model, vehicle_Year, Student_ID) 
              VALUES ('$vehicle_PlateNum', '$vehicle_Grant', '$vehicle_Category', '$vehicle_Model', '$vehicle_Year', '$student_ID')";

    // Execute the insert query
    $result = mysqli_query($conn, $query);

    // Check if the insertion was successful
    if($result) {
        echo("Data inserted");  
        header("Location: ../Dashboard/DashboardViewStudent.php");
        exit;
    } else {
        die("Insert failed: " . mysqli_error($conn));
    }

    mysqli_close($conn); 
?>
