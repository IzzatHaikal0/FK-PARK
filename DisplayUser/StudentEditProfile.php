<?php

include '../Dashboard/DashboardViewStudent.php'; 

//session_start();

include("../Database/DatabaseConn.php");
mysqli_select_db($conn, "projectweb") or die(mysqli_error($conn));

$student_ID =$_SESSION['SESS_ID'];

$query = "SELECT * FROM student where student_ID = '$student_ID'";
$result = mysqli_query($conn, $query);

if(!$result){
    die("Error executing query ". mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

$student_ID = $row['student_ID'];

$student_FullName = $row['student_FullName'];
$student_PhoneNumber = $row['student_PhoneNumber'];
$student_Category = $row['student_Category'];
$student_Email = $row['student_Email'];
$student_MatricID = $row['student_MatricID'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_FullName = $_POST['student_FullName'];
    $student_PhoneNumber = $_POST['student_PhoneNumber'];
    $student_Category = $_POST['student_Category'];
    $student_Email = $_POST['student_Email'];
    $student_MatricID = $_POST['student_matricID'];

    // Use a query to update student data
    $query = "UPDATE student SET student_FullName = '$student_FullName', student_PhoneNumber = '$student_PhoneNumber', student_Category = '$student_Category', student_Email = '$student_Email', student_MatricID = '$student_MatricID' WHERE student_ID = '$student_ID'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script type='text/javascript'> window.location='StudentEditProfile.php'; </script>";
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
    <link rel="stylesheet" href="../RegisterUser/RegisterUser_style.css">
</head>
<body>

    <div class="container">
        <div class="title">Update User Information</div>
        <div class="content">
            <form action="" method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Student ID</span>
                        <input type="text" name="student_ID" value="<?php echo htmlspecialchars($student_ID); ?>" readonly>
                    </div>
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" name="student_FullName" value="<?php echo htmlspecialchars($student_FullName); ?>" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" name="student_PhoneNumber" value="<?php echo htmlspecialchars($student_PhoneNumber); ?>" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Category</span>
                        <input type="text" name="student_Category" value="<?php echo htmlspecialchars($student_Category); ?>" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" name="student_Email" value="<?php echo htmlspecialchars($student_Email); ?>" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Matric ID</span>
                        <input type="text" name="student_matricID" value="<?php echo htmlspecialchars($student_MatricID); ?>" required>
                    </div>
                </div>
                <div class="button">
                <input type ="hidden" name="student_ID" value="<?php echo $student_ID; ?>">
                    <input type="submit" value="Update">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
