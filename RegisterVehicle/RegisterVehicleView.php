<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../Dashboard/Dashboard_style.css">
        <link rel="stylesheet" href="RegisterVehicle_style.css">
    </head>

    
    <body>
        
        <?php include '../Dashboard/DashboardViewStudent.php'; ?>
        
        <div class="container">
        <div class="title">Register Vehicle</div>
            <div class="content">
                <form action="RegisterVehicleHandler.php" method="POST">
                    <div class="user-details">
                    <div class="input-box">
                        <span class="details">Vehicle Category</span>
                        <input type="text" placeholder="Enter vehicle category" name="vehicle_Category" required>
                    </div>    
                    <div class="input-box">
                        <span class="details">Vehicle Year</span>
                        <input type="text" placeholder="Enter vehicle year" name="vehicle_Year" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Vehicle Model</span>
                        <input type="text" placeholder="Enter vehicle model" name="vehicle_Model" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Vehicle Plate Number</span>
                        <input type="text" placeholder="Enter vehicle plate number" name="vehicle_PlateNum" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Vehicle Grant</span>
                        <input type="file" id="vehicleGrant" name="vehicle_Grant" required>
                        <label for="vehicleGrant" class="custom-file-upload">Submit vehicle grant</label>
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