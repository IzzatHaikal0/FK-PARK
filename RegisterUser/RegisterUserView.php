<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../Dashboard/Dashboard_style.css">
        <link rel="stylesheet" href="RegisterUser_style.css">
    </head>

    
    <body>
        
        <?php include '../Dashboard/DashboardViewStaff.php'; ?>
        
        <div class="container">
        <div class="title">Register User</div>
            <div class="content">
                <form action="RegisterUserHandler.php" method="POST">
                    <div class="user-details">
                    <div class="input-box">
                        <span class="details">Student ID</span>
                        <input type="text" placeholder="Enter student ID" name="student_ID" required>
                    </div> 
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" placeholder="Enter student name" name="student_FullName" required>
                    </div>     
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" placeholder="Enter student phone number" name="student_PhoneNumber" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Category</span>
                        <input type="text" placeholder="Enter student category" name="student_Category" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" placeholder="Enter student email" name="student_Email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Matric ID</span>
                        <input type="text" placeholder="Enter student matric ID" name="student_matricID" required>
                    </div>
                    <!--<div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" placeholder="Enter student username" name="login_username" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="text" placeholder="Enter student password" name="login_password" required>
                    </div>
                    </div>-->
                    
                    <div class="button">
                    <input type="submit" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>