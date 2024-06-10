<?php
include ("../Database/DatabaseConn.php");

// Select the database
mysqli_select_db($conn, "projectweb") or die(mysqli_error($conn));

// Ensure you use the correct parameter name
$student_ID = $_GET['id'];


// Use prepared statements to delete the student record
$query = "DELETE FROM vehicle WHERE student_ID = '$student_ID'";
$result = mysqli_query($conn,$query) or die("could not delete");

if($result){
    echo "<script type='text/javascript'> window.location='DisplayVehicleStudent.php';</script>";
}else{
    echo "Error: " .mysqli_error($conn);
}


$conn->close();
?>
