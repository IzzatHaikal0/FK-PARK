<!DOCTYPE html>
<html>
    <head>
        <link href="../DisplayUser/StudentList_style.css" rel="stylesheet"/>
        <link rel="stylesheet" href="../Dashboard/Dashboard_style.css">

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User List</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    </head>

    <body>
        <?php 
            include '../Dashboard/DashboardViewStaff.php'; 
            include("../Database/DatabaseConn.php");

            mysqli_select_db($conn, "projectweb") or die(mysqli_error());
            $query = "SELECT * from vehicle";
            $result = mysqli_query($conn,$query);

            if(mysqli_num_rows($result) > 0){
            ?>
            
                        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

                        <div class="content">
                        <div class="header">
                            <div class="listbooking">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-uppercase mb-0">Vehicle Information</h5>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="booking-table">
                                        <thead>
                                            <tr>
                                            
                                            <th scope="col" class="border-0 text-uppercase font-medium pl-4">No.</th>
                                            <th scope="col" class="border-0 text-uppercase font-medium pl-4">Student ID</th>
                                            <th scope="col" class="border-0 text-uppercase font-medium">Vehicle Plate Number</th>
                                            <th scope="col" class="border-0 text-uppercase font-medium">Vehicle Grant</th>
                                            <th scope="col" class="border-0 text-uppercase font-medium">Category</th>
                                            <th scope="col" class="border-0 text-uppercase font-medium">Model</th>
                                            <th scope="col" class="border-0 text-uppercase font-medium">Year</th>
                                            <th scope="col" class="border-0 text-uppercase font-medium">Manage</th>
                                            <!--<th scope="col" class="border-0 text-uppercase font-medium"></th>-->
                                            </tr>
                                        </thead>
                                        <?php
                                            while($row = mysqli_fetch_assoc($result)){
                                                $NUMBER = $row["NUMBER"];
                                                $student_ID = $row["student_ID"];
                                                $vehicle_PlateNum = $row["vehicle_PlateNum"];
                                                $vehicle_Grant = $row["vehicle_Grant"];
                                                $vehicle_Category = $row["vehicle_Category"];
                                                $vehicle_Model = $row["vehicle_Model"];
                                                $vehicle_Year = $row["vehicle_Year"];
                                            
                                        ?>

                                        <tbody>
                                            <tr>
                                            <td class="pl-4">
                                                <h5 class="font-medium mb-0"><?php echo $NUMBER;?></h5>
                                            </td>
                                            <td class="pl-4">
                                                <h5 class="font-medium mb-0"><?php echo $student_ID;?></h5>
                                            </td>
                                            <td class="pl-4">
                                                <h5 class="font-medium mb-0"><?php echo $vehicle_PlateNum;?></h5>
                                            </td>
                                        
                                            <td>
                                            <span class="text-muted"><?php echo $vehicle_Grant;?></span>
                                                
                                            </td>
                                            <td>
                                                <span class="text-muted"><?php echo $vehicle_Category;?></span>
                                                
                                            </td>
                                            <td>
                                                <span class="text-muted"><?php echo $vehicle_Model;?></span>
                                                
                                            </td>
                                            <td>
                                                <span class="text-muted"><?php echo $vehicle_Year;?></span>
                                            </td>
                                            
                                           

                                            <td>
                                                <!--
                                                <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle" onclick="location.href='updateUser.php?id=<?php echo $student_ID; ?>'">
                                                    <i class="fa fa-key">Update</i> 
                                                </button>-->
                                                <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2" onclick="location.href='deleteVehicle.php?id=<?php echo $student_ID; ?>'">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>

                                            </td>
                                            </tr>
                                            
                                            <?php
                                        }
                                    }
                                ?>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    

        
    </body>
</html>