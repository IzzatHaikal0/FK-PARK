<?php

include '../Dashboard/DashboardViewStaff.php'; 

//session_start();

include("../Database/DatabaseConn.php");
mysqli_select_db($conn, "projectweb") or die(mysqli_error($conn));

$admin_ID =$_SESSION['SESS_ID'];

$query = "SELECT * FROM administrator where admin_ID = '$admin_ID'";
$result = mysqli_query($conn, $query);

if(!$result){
    die("Error executing query ". mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

$admin_ID = $row['admin_ID'];
$admin_FullName = $row['admin_FullName'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin_FullName = $_POST['admin_FullName'];


    // Use a query to update student data
    $query = "UPDATE administrator SET admin_FullName = '$admin_FullName' WHERE admin_ID = '$admin_ID'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script type='text/javascript'> window.location='StaffEditProfile.php'; </script>";
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
                        <span class="details">Staff ID</span>
                        <input type="text" name="admin_ID" value="<?php echo htmlspecialchars($admin_ID); ?>" readonly>
                    </div>
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" name="admin_FullName" value="<?php echo htmlspecialchars($admin_FullName); ?>" required>
                    </div>
                </div>
                <div class="button">
                <input type ="hidden" name="admin_ID" value="<?php echo $admin_ID; ?>">
                    <input type="submit" value="Update">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
