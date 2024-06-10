<?php

include '../Dashboard/DashboardViewUK.php'; 

//session_start();

include("../Database/DatabaseConn.php");
mysqli_select_db($conn, "projectweb") or die(mysqli_error($conn));

$UK_ID =$_SESSION['SESS_ID'];

$query = "SELECT * FROM UK where UK_ID = '$UK_ID'";
$result = mysqli_query($conn, $query);

if(!$result){
    die("Error executing query ". mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

$UK_ID = $row['UK_ID'];
$UK_FullName = $row['UK_FullName'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin_FullName = $_POST['admin_FullName'];


    // Use a query to update student data
    $query = "UPDATE UK SET UK_FullName = '$UK_FullName' WHERE UK_ID = '$UK_ID'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script type='text/javascript'> window.location='UKEditProfile.php'; </script>";
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
                        <span class="details">UNIT KESELAMATAN STAFF ID</span>
                        <input type="text" name="UK_ID" value="<?php echo htmlspecialchars($UK_ID); ?>" readonly>
                    </div>
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" name="UK_FullName" value="<?php echo htmlspecialchars($UK_FullName); ?>" required>
                    </div>
                </div>
                <div class="button">
                <input type ="hidden" name="admin_ID" value="<?php echo $UK_ID; ?>">
                    <input type="submit" value="Update">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
