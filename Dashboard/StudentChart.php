<?php 


include("../Database/DatabaseConn.php");
mysqli_select_db($conn, "projectweb") or die(mysqli_error($conn));

// Fetch the number of students in each category
$sql_undergrads = "SELECT COUNT(*) AS undergrads_count FROM student WHERE student_Category = 'UNDERGRADS'";
$sql_postgrads = "SELECT COUNT(*) AS postgrads_count FROM student WHERE student_Category = 'POSTGRADS'";

$result_undergrads = $conn->query($sql_undergrads);
$result_postgrads = $conn->query($sql_postgrads);

$undergrads_count = 0;
$postgrads_count = 0;

if ($result_undergrads->num_rows > 0) {
    $row = $result_undergrads->fetch_assoc();
    $undergrads_count = $row['undergrads_count'];
}

if ($result_postgrads->num_rows > 0) {
    $row = $result_postgrads->fetch_assoc();
    $postgrads_count = $row['postgrads_count'];
}

$total_count = $undergrads_count + $postgrads_count;
$undergrads_percentage = ($undergrads_count / $total_count) * 100;
$postgrads_percentage = ($postgrads_count / $total_count) * 100;

$conn->close();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Pie Chart</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .piechart {
            width: 400px; /* Increase width */
            height: 400px; /* Increase height */
            border-radius: 50%;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .piechart .undergrads,
        .piechart .postgrads {
            position: absolute;
            width: 200%;
            height: 200%;
            border-radius: 50%;
            clip-path: polygon(50% 50%, 50% 0%, 100% 0%, 100% 100%);
        }

        .piechart .undergrads {
            background-color: pink;
            transform: rotate(<?php echo $undergrads_percentage * 3.6; ?>deg);
            clip-path: polygon(50% 50%, 50% 0%, 100% 0%, 100% 100%);
        }

        .piechart .postgrads {
            background-color: blue;
            transform: rotate(<?php echo $postgrads_percentage * 3.6; ?>deg);
            clip-path: polygon(50% 50%, 50% 0%, 0% 0%, 0% 100%);
        }

        .piechart .label {
            position: absolute;
            width: 100%;
            text-align: center;
            font-size: 14px;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
    
    <?php include '../Dashboard/DashboardViewUK.php';  ?>

    <div class="piechart">
        <div class="undergrads"></div>
        <div class="postgrads"></div>
        <div class="label">UNDERGRADS: <?php echo $undergrads_count; ?><br>POSTGRADS: <?php echo $postgrads_count; ?></div>
    </div>
</body>
</html>
