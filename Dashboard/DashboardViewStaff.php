<?php 
    session_start();



    // Session check
    if (!isset($_SESSION['SESS_NAME'])) {
        header("location: ../Login/LoginView.php");
        exit();
    }
?>

<!DOCTYPE html>
<!-- Designined by CodingLab - youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Dashboard </title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="Dashboard_style.css" rel="stylesheet"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>

   <body>
        <nav class="navbar">
            <div class="logo_item">
                <i class="bx bx-menu" id="sidebarOpen"></i>
                <img src="../Login/UMPLogo.png" alt=""></i>LETSPARK@FK
                <h1>Welcome, <?php echo htmlspecialchars($_SESSION['SESS_NAME']); ?>!</h1>
            </div>

            <div>
              <ul class="nav__wrapper">
                <li class="nav__item"><a href="../Dashboard/DashboardViewStaff.php">Home</a></li>
                <li class="nav__item"><a href="#">About</a></li>
                <li class="nav__item"><a href="#">Dashboard</a></li>
                <li class="nav__item"><a href="../Login/Logout.php">Logout</a></li>
              </ul>
            </div>

            <div class="navbar_content">
                <i class="bi bi-grid"></i>
                <i class='bx bx-sun' id="darkLight"></i>
                <img src="images/profile.jpg" alt="" class="profile" />
            </div>
        </nav>
      

        <!-- sidebar -->
        <nav class="sidebar">
            <div class="menu_content">
                <ul class="menu_items">
                    
                
                    <li class="item">
                        <a class="nav_link submenu_item" href="../DisplayUser/StaffEditProfile.php" >
                            <span class="navlink_icon">
                                <i class="bx bx-home-alt"></i>
                            </span>
                            <span class="navlink">USER PROFILE</span>
                        </a>
                    </li>
                    <li class="item">
                        <a class="nav_link submenu_item" href="../RegisterUser/RegisterUserView.php" >
                            <span class="navlink_icon">
                                <i class="bx bx-home-alt"></i>
                            </span>
                            <span class="navlink">REGISTER USER</span>
                        </a>
                    </li>
                    <li class="item">
                        <a class="nav_link submenu_item" href="../DisplayUser/DisplayStudentList.php" >
                            <span class="navlink_icon">
                                <i class="bx bx-home-alt"></i>
                            </span>
                            <span class="navlink">STUDENT LIST</span>
                        </a>
                    </li>
                    <li class="item">
                        <a class="nav_link submenu_item" href="../RegisterVehicle/DisplayVehicleStudent.php" >
                            <span class="navlink_icon">
                                <i class="bx bx-home-alt"></i>
                            </span>
                            <span class="navlink">VEHICLE LIST</span>
                        </a>
                    </li>
                    <li class="item">
                        <a class="nav_link submenu_item" href="" >
                            <span class="navlink_icon">
                                <i class="bx bx-home-alt"></i>
                            </span>
                            <span class="navlink">PARKING AREA</span>
                        </a>
                    </li>

                    <li class="item">
                        <div href="#" class="nav_link submenu_item">
                        <span class="navlink_icon">
                            <i class="bx bx-grid-alt"></i>
                        </span>
                        <span class="navlink">PARKING BOOKING</span>
                    </li>
                </ul>

    

                <!-- Sidebar Open / Close -->
                <div class="bottom_content">
                <div class="bottom expand_sidebar">
                    <span> Expand</span>
                    <i class='bx bx-log-in' ></i>
                </div>
                <div class="bottom collapse_sidebar">
                    <span> Collapse</span>
                    <i class='bx bx-log-out'></i>
                </div>
                </div>
            </div>
        </nav>
   </body>

   <script>
        const body = document.querySelector("body");
        const darkLight = document.querySelector("#darkLight");
        const sidebar = document.querySelector(".sidebar");
        const submenuItems = document.querySelectorAll(".submenu_item");
        const sidebarOpen = document.querySelector("#sidebarOpen");
        const sidebarClose = document.querySelector(".collapse_sidebar");
        const sidebarExpand = document.querySelector(".expand_sidebar");
        sidebarOpen.addEventListener("click", () => sidebar.classList.toggle("close"));

        sidebarClose.addEventListener("click", () => {
        sidebar.classList.add("close", "hoverable");
        });
        sidebarExpand.addEventListener("click", () => {
        sidebar.classList.remove("close", "hoverable");
        });

        sidebar.addEventListener("mouseenter", () => {
        if (sidebar.classList.contains("hoverable")) {
            sidebar.classList.remove("close");
        }
        });
        sidebar.addEventListener("mouseleave", () => {
        if (sidebar.classList.contains("hoverable")) {
            sidebar.classList.add("close");
        }
        });

        darkLight.addEventListener("click", () => {
        body.classList.toggle("dark");
        if (body.classList.contains("dark")) {
            document.setI;
            darkLight.classList.replace("bx-sun", "bx-moon");
        } else {
            darkLight.classList.replace("bx-moon", "bx-sun");
        }
        });

        submenuItems.forEach((item, index) => {
        item.addEventListener("click", () => {
            item.classList.toggle("show_submenu");
            submenuItems.forEach((item2, index2) => {
            if (index !== index2) {
                item2.classList.remove("show_submenu");
            }
            });
        });
        });

        if (window.innerWidth < 768) {
        sidebar.classList.add("close");
        } else {
        sidebar.classList.remove("close");
        }

   </script>
</html>
