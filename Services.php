<?php
include 'conn/conn.php';




// Check if the service parameter is set
if (isset($_GET['service'])) {
    $name = $_GET['service'];

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("SELECT heading, paragraph, sub_paragraph, logo, image, sub_image FROM services WHERE name = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $heading = $row['heading'];
            $paragraph = $row['paragraph'];
            $sub_paragraph = $row['sub_paragraph'];
            $logo = $row['logo'];
            $image = $row['image'];
            $sub_image = $row['sub_image'];
            $logo = $row['logo'];
        }
    }

    $stmt->close();
} else {
    echo "<p>No service selected.</p>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.cymolthemes.com/html/mrhandy/solar/renewable-resource.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 May 2024 13:10:29 GMT -->
<?php

include "include/header.php";

?>

<body>

    <!--page start-->
    <div class="page">


        <!--header start-->

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
            <?php


        }
            ?>

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
                                        <a class="home-link" href="index.php" title="Solar" rel="home">
                                            <!-- <img id="logo-img" class="img-fluid auto_size" height="42" width="183" src="images/solar-header-logo.svg" alt="logo-img"> -->
                                            <img id="logo-img" class="img-fluid auto_size" height="42" width="183" src="admin/<?php echo $logo ?>" alt="logo-img">

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

                                                    // Fetch data from the database
                                                    $sql = "SELECT name FROM services";
                                                    $result = $conn->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
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
                                        <div class="header_search">
                                            <a href="#" class="btn-default search_btn" rel="noopener" aria-label="search_btn"><i class="fa fa-search"></i></a>
                                            <div class="header_search_content">
                                                <div class="header_search_content_inner">
                                                    <a href="#" class="close_btn"><i class="ti ti-close"></i></a>
                                                    <form id="searchbox" method="get" action="#">
                                                        <input class="search_query" type="text" id="search_query_top" name="s" placeholder="Enter Keyword" value="">
                                                        <button type="submit" class="btn close-search"><i class="ti ti-search"></i></button>
                                                    </form>
                                                </div>
                                            </div>
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


            <!--header end-->


            <!-- page-title -->
            <div class="cmt-page-title-row cmt-bgimage-yes cmt-bg cmt-bgcolor-grey">
                <div class="cmt-row-wrapper-bg-layer cmt-bg-layer"></div>
                <div class="cmt-page-title-row-inner">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-12">
                                <div class="page-title-heading">
                                    <h2 class="title"><?php echo $name ?></h2>
                                </div>
                                <div class="breadcrumb-wrapper">
                                    <span>
                                        <a title="Homepage" href="index.php">Home</a>
                                    </span>
                                    <span><?php echo $name ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- page-title end-->


            <!--site-main start-->
            <div class="site-main">


                <!-- sidebar -->
                <div class="cmt-row sidebar cmt-sidebar-left cmt-bgcolor-white clearfix">
                    <div class="container">
                        <!-- row -->
                        <div class="row">
                            <div class="col-lg-4 widget-area sidebar-left">
                                <aside class="widget widget-nav-menu">
                                    <ul class="widget-menu">
                                        <?php

                                        // Fetch data from the database
                                        $sql = "SELECT name FROM services";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {


                                        ?>
                                                <li class=""><a href="Services.php?service=<?php echo $row['name'] ?>"><?php echo $row['name'] ?></a></li>


                                            <?php
                                            }
                                        }

                                        $sql = "SELECT * FROM static_details";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // Fetch the row
                                            $row = $result->fetch_assoc();


                                            ?>
                                    </ul>
                                </aside>
                                <aside class="widget widget-cta-banner p-0">
                                    <div class="cmt-col-bgcolor-yes cmt-bgcolor-darkgrey inner_pg-col_bg-img5 cmt-col-bgimage-yes cmt-bg pt-200 pl-30 pr-30 pb-30">
                                        <div class="cmt-col-wrapper-bg-layer cmt-bg-layer">
                                            <div class="cmt-col-wrapper-bg-layer-inner"></div>
                                        </div>


                                        <div class="layer-content text-center">
                                            <h4>Have Any Questions? Call Us Today</h4>
                                            <div class="sep_holder">
                                                <div class="sep_line width-100 mt-20 mb-20 res-767-mt-0"></div>
                                            </div>
                                            <ul class="cmt-textcolor-white">
                                                <li>Call:<?php echo $row['number'] ?></li>
                                                <li><a href="mailto:support@sitename.com"><?php echo $row['email'] ?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </aside>
                            <?php
                                        }


                            ?>


                            </div>
                            <div class="col-lg-8 content-area">
                                <article class="cmt-service-single-content-area">
                                    <!-- service-featured-wrapper -->
                                    <div class="cmt-service-featured-wrapper cmt-featured-wrapper">
                                        <div class="cmt_single_image-wrapper mb-35">
                                            <img class="img-fluid" src="admin/<?php echo $image ?>" alt="project-1" style="width: 800px; height: 500px;">

                                        </div>
                                    </div><!-- service-featured-wrapper end -->
                                    <!-- cmt-service-classic-content -->
                                    <div class="cmt-service-classic-content">
                                        <h3><?php echo $heading ?></h3>
                                        <p><?php echo $paragraph ?></p>


                                        <div class="row">
                                            <div class="col-md-12">
                                                <p><?php echo $sub_paragraph ?></p>
                                            </div>
                                           
                                        </div>

                                    </div><!-- cmt-service-classic-content end -->
                                </article>
                            </div>
                        </div><!-- row end -->
                        
                    </div>
                </div>
                <!-- sidebar end -->
            </div><!--site-main end-->

            <div class="container-fluid">


<!-- show project code  -->
<?php

$service = $_GET['service'];
// SQL query to fetch all projects
$sql = "SELECT * FROM project WHERE categories='$service'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

?>


        <!--portfolio_tilte-section-->
        <section class="cmt-row portfolio_tilte-section cmt-bg  clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section title -->
                        <div class="section-title style2">
                            <div class="title-header">

                                <h3>RECENT PROJECTS</h3>
                                <h2 class="title">Our Products</h2>
                            </div>
                            
                        </div><!-- section title end -->
                        <div class="pb-90"></div>
                    </div>
                </div>
            </div>
        </section>
        <!--portfolio_tilte-section end-->




        <!--portfolio_row-section-->
        <section class="cmt-row portfolio_row-section mt_160 clearfix">
            <div class="container-fluid">
                <div class="row cmt-boxes-spacing-30px slick_slider slick-dots-style3 ml_40 mr_40" data-slick='{"slidesToShow": 4, "slidesToScroll": 4, "arrows":false, "dots":true, "autoplay":false, "infinite":true}'>
                   
                    
                    <?php
                        while ($row = $result->fetch_assoc()) {
                            $project = htmlspecialchars($row["id"]);
                            $url = "project.php?project=" . urlencode($project);
                    ?>
                   

                    <div class="cmt-box-col-wrapper col-lg-3 col-md-6 col-sm-6">
                        <!-- featured-imagebox -->
                        <div class="featured-imagebox featured-imagebox-portfolio style3">
                            <!-- cmt-box-view-overlay -->
                            <div class="cmt-box-view-overlay cmt-portfolio-box-view-overlay"><!-- featured-thumbnail -->
                                <div class="featured-thumbnail">
                                    <a href="#"> <img class="img-fluid" src="admin/<?php echo $row['project_image'] ?>" alt="image"></a>
                                </div><!-- featured-thumbnail end -->
                                <div class="featured-iconbox cmt-media-link">
                                    <a class="cmt_prettyphoto cmt_image" title="Off Grid Solar System" data-rel="prettyPhoto" href="images/portfolio/project-6-1200x800.jpg">
                                        <i class="fa fa-search"></i>
                                    </a>
                                    <a href="<?php echo $url ?>" class="cmt_pf_link"><i class="fa fa-link"></i></a>
                                </div>
                            </div><!-- cmt-box-view-overlay end-->
                        </div><!-- featured-imagebox -->
                    </div>

                    <?php }?>

                </div><!-- row end -->
            </div>
        </section>


        <?php } ?>
        </div>
            <!--footer start-->
            <?php

            include "include/footer.php";

            ?>
            <!--footer end-->

            <!--back-to-top start-->
            <a id="totop" href="#top">
                <i class="fa fa-angle-up"></i>
            </a>
            <!--back-to-top end-->

    </div><!-- page end -->


    <!-- Javascript -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/jquery-migrate-1.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.js"></script>
    <script src="js/jquery-waypoints.js"></script>
    <script src="js/jquery-validate.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/imagesloaded.min.js"></script>
    <script src="js/jquery-isotope.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/numinate.min.js"></script>
    <script src="js/circle-progress.min.js"></script>
    <script src="js/main.js"></script>
    <!-- Javascript end-->

</body>

<!-- Mirrored from www.cymolthemes.com/html/mrhandy/solar/renewable-resource.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 May 2024 13:10:29 GMT -->

</html>