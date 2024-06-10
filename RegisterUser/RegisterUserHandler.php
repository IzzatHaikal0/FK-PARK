<?php
    
    require_once('../Database/DatabaseConn.php');

        
    mysqli_select_db($conn, "projectweb") or die(mysqli_error());

            $student_ID = $_POST["student_ID"];
            $student_FullName = $_POST["student_FullName"];
            $student_PhoneNumber = $_POST["student_PhoneNumber"];
            $student_Category = $_POST["student_Category"];
            $student_Email = $_POST["student_Email"];
            $student_matricID = $_POST["student_matricID"];
            //$login_username = $_POST["login_username"];
            //$login_password = $_POST["login_password"];

            // to create a query to be executed in sql
            $query = "insert into student values( '$student_ID', '$student_FullName', '$student_PhoneNumber', '$student_Category', '$student_Email', '$student_matricID')"  
            or die(mysqli_connect_error());
    
            // to run sql query in database
            $result = mysqli_query($conn, $query);

            //Check whether the insert was successful or not
                if($result) 
                {
                    echo("Data insert");  
                    header("Location: ../Dashboard/DashboardViewStaff.php");
                    exit;
                }
                else 
                {
                    die("Insert failed");
                }

            mysqli_close($link); 
?>