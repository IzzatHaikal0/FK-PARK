<?php
require_once('../Database/DatabaseConn.php');
session_start();  // Start the session

// Validation error flag
$errflag = false;
$errmsg_arr = [];

// Input Validations
if (empty($_POST['FullName'])) {
    $errmsg_arr[] = 'Login ID missing';
    $errflag = true;
}
if (empty($_POST['ID'])) {
    $errmsg_arr[] = 'Password missing';
    $errflag = true;
}

// If there are input validations, redirect back to the login form
if ($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: LoginView.php");
    exit();
}

mysqli_select_db($conn, "projectweb") or die(mysqli_error($conn));

// Sanitize the input to prevent SQL injection
/*
$student_FullName = mysqli_real_escape_string($conn, $_POST['student_FullName']);
$student_ID = mysqli_real_escape_string($conn, $_POST['student_ID']);
*/
$FullName = mysqli_real_escape_string($conn,$_POST['FullName']);
$ID = mysqli_real_escape_string($conn,$_POST['ID']);
$typeuser = mysqli_real_escape_string($conn, $_POST['typeuser']);

switch ($typeuser) {
    case 'Staff':
        $query = "SELECT * FROM administrator WHERE admin_FullName ='$FullName' AND admin_ID = '$ID'";
        break;
    case 'Student':
        $query = "SELECT * FROM student WHERE student_FullName ='$FullName' AND student_ID='$ID'";
        break;
    case 'Unit Keselamatan Staff':
        $query = "SELECT * FROM uk WHERE UK_FullName ='$FullName' AND UK_ID = '$ID'";
        break;
    default:
        echo("invalid user");
        break;
}

// Query to check the credentials
//$query = "SELECT * FROM student WHERE student_FullName ='$student_FullName' AND student_ID='$student_ID'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

if ($result) {
    if (mysqli_num_rows($result) == 1) {
        // Set session variables
        $_SESSION['typeuser'] = $typeuser;
        $_SESSION['SESS_NAME'] = $FullName;
        $_SESSION['SESS_ID'] = $ID;

        // Redirect based on user type 
        switch ($typeuser) {
            case 'Staff':
                header("location: ../Dashboard/DashboardViewStaff.php");
                break;
            case 'Student':
                header("location: ../Dashboard/DashboardViewStudent.php");
                break;
            case 'Unit Keselamatan Staff':
                header("location: ../Dashboard/DashboardViewUK.php");
                break;
            default:
                header("location: welcome.php");
                break;
        }
    } else { 

        $errmsg_arr[] = 'Invalid username or password';
        //$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
        session_write_close();
        echo "<script type='text/javascript'>
                alert('Invalid username or password');
                window.location.href = 'LoginView.php';
              </script>";
        exit();
    }
} else {
    die("Query failed");
}
?>
