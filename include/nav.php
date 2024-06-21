<?php

include 'conn/conn.php';

$sql = "SELECT * FROM static_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the row
    $row = $result->fetch_assoc();


?>


<header id="masthead" class="header cmt-header-style-02 clearfix">
            <!-- top_bar -->
            <div class="top_bar cmt-bgcolor-darkgrey cmt-textcolor-white clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex flex-row align-items-center justify-content-center">
                                <div class="top_bar_contact_item">
                                    <div class="top_bar_icon"><i class="fa fa-phone-square"></i></div><?php echo $row["number"] ?>
                                </div>
                                <div class="top_bar_contact_item">
                                    <div class="top_bar_icon"><i class="fa fa-envelope-o"></i></div><a href="<?php echo $row["email"] ?>"> <?php echo $row["email"] ?></a>
                                </div>
                                <div class="top_bar_contact_item">
                                    <div class="top_bar_icon"><i class="fa fa-clock-o"></i></div><?php echo $row["hours"] ?>
                                </div>
                                <div class="top_bar_contact_item top_bar_social ml-auto">
                                    <ul class="social-icons d-flex">
                                        <li><a target="_blank" href="<?php echo $row["facebook"] ?>" rel="noopener" aria-label="facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a target="_blank" href="<?php echo $row["x"] ?>" rel="noopener" aria-label="twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a target="_blank" href="<?php echo $row['instagram'] ?>" rel="instagram" aria-label="instagram"><i class="fa fa-instagram"></i></a></li>
                                        <li><a target="_blank" href="<?php echo $row["youtube"] ?>" rel="youtube" aria-label="youtube"><i class="fa fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- top_bar end-->


            <!-- site-header-menu -->
            <div id="site-header-menu" class="site-header-menu">
                <div class="site-header-menu-inner cmt-stickable-header">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <!--site-navigation -->
                                <div class="site-navigation d-flex align-items-center justify-content-between">
                                    <!-- site-branding -->
                                    <div class="site-branding mr-auto">
                                        <a class="home-link" href="index.php
                                        
                                        
                                        " title="Solar" rel="home">
                                            <img id="logo-img" class="img-fluid auto_size" height="42" width="183" src="admin/uploads/<?php echo $row["site_logo"] ?>" alt="logo-img">
                                        </a>
                                    </div><!-- site-branding end -->
                                    <div class="btn-show-menu-mobile menubar menubar--squeeze">
                                        <span class="menubar-box">
                                            <span class="menubar-inner"></span>
                                        </span>
                                    </div>
                                    <!-- menu -->
                                    <nav class="main-menu menu-mobile" id="menu">
                                        <ul class="menu">
                                            <li class="menu-item ">
                                                <a href="index.php" class="menu-item">Home</a>
                                            </li>
                              
                                            <li class="menu-item">
                                                <a href="about.php" class="menu-item">About Us</a>
                                                
                                            </li>

                                            <li class="mega-menu-item">
                                                <a href="#" class="mega-menu-link">Services</a>
                                                <ul class="mega-submenu">
                                                <?php


}
?>
                                                <?php

                                                        // Fetch data from the database
                                                        $sql = "SELECT name FROM services";
                                                        $result = $conn->query($sql);

                                                        if ($result->num_rows > 0) {
                                                            while($row = $result->fetch_assoc()) {
                                                                // Assuming service name can be used as a part of the URL or requires URL encoding
                                                                $service_name = htmlspecialchars($row["name"]);
                                                                $service_url = "Services.php?service=" . urlencode($service_name);
                                                                echo "<li><a href='{$service_url}'>{$service_name}</a></li>";
                                                            }
                                                        } else {
                                                            echo "<li><a href='#'>No services available</a></li>";
                                                        }
                                                ?>
                                                    
                                                </ul>
                                            </li>

                                   
                                            <li class="menu-item">
                                                <a href="contact-us.php" class="menu-item">Contact Us</a>
                                                
                                            </li>
                                        </ul>
                                    </nav>
                                    <div class="header_extra d-flex flex-row align-items-center justify-content-end">
                                        <div class="header_btn">
                                            <a class="cmt-btn cmt-btn-size-md cmt-btn-shape-round cmt-btn-style-fill cmt-icon-btn-right cmt-btn-color-highlight" href="contact-us.php">Appointment<i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                        
                                    </div>
                                </div><!-- site-navigation end-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- site-header-menu end-->
        </header>

