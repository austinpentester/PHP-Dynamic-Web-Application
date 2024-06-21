<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.cymolthemes.com/html/mrhandy/solar/solar-led-projects.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 May 2024 13:10:35 GMT -->
<?php

include "include/header.php";

?>
<body>

    <!--page start-->
    <div class="page">
        

    <?php

include "include/nav.php";

$id = $_GET['project'];

// SQL query to fetch all projects
$sql = "SELECT * FROM project WHERE id=$id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $project_heading = $row['project_heading'];
        $project_image = $row['project_image'];
        $project_name = $row['project_name'];

        $project_categories = $row['categories'];
        $date = $row['date'];
        $client_name=$row['client_name'];
        $project_heading = $row['project_heading'];
        $project_text = $row['project_text'];
        $sub_heading = $row['sub_heading'];
        $sub_text = $row['sub_text'];
        $rate = $row['product_rate'];
        $s_date = $row['product_starting_date'];
        $e_date = $row['product_ending_date'];



    }}

?>


        <!-- page-title -->
        <div class="cmt-page-title-row cmt-bgimage-yes cmt-bg cmt-bgcolor-grey">
            <div class="cmt-row-wrapper-bg-layer cmt-bg-layer"></div>
            <div class="cmt-page-title-row-inner">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="page-title-heading">
                                <h2 class="title"><?php echo $project_heading ?></h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="index.php">Home</a>
                                </span>
                                <span><?php echo $project_heading ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                    
        </div><!-- page-title end-->
        
    <!--site-main start-->
    <div class="site-main">
        
            <!-- project-single-section -->
            <section class="cmt-row project-single-section clearfix">
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cmt-pf-single-content-wrapper-innerbox cmt-pf-view-top-image">
                                <div class="cmt-pf-single-content-wrapper">
                                    <!-- cmt_single_image-wrapper -->
                                    <div class="cmt_single_image-wrapper">
                                        <img class="img-fluid" src="admin/<?php echo $project_image ?>" width="600px" height="600px" alt="portfolio-img">
                                    </div><!-- cmt_single_image-wrapper end -->
                                    <div class="cmt-pf-single-detail-box cmt-bgcolor-darkgrey cmt-textcolor-white">
                                        <h2 class="cmt-pf-detailbox-title">Project Info</h2>
                                        <ul class="cmt-pf-detailbox-list">
                                            <li>
                                                <div class="cmt-pf-data-title">
                                                    <i class="fa fa-tachometer cmt-textcolor-skincolor"></i>Project
                                                </div>
                                                <div class="cmt-pf-data-details"><?php echo $project_name ?></div>
                                            </li>
                                            <li>
                                                <div class="cmt-pf-data-title">
                                                    <i class="fa fa-film cmt-textcolor-skincolor"></i>Categories
                                                </div>
                                                <div class="cmt-pf-data-details"><?php echo $project_categories ?></div>
                                            </li>
                                            <li>
                                                <div class="cmt-pf-data-title">
                                                    <i class="fa fa-calendar cmt-textcolor-skincolor"></i>Product Starting Date
                                                </div>
                                                <div class="cmt-pf-data-details"><?php echo $s_date ?></div>
                                            </li>
                                            <li>
                                                <div class="cmt-pf-data-title">
                                                    <i class="fa fa-calendar cmt-textcolor-skincolor"></i>Product Ending Date
                                                </div>
                                                <div class="cmt-pf-data-details"><?php echo $e_date ?></div>
                                            </li>
                                            <li>
                                                <div class="cmt-pf-data-title">
                                                    <i class="fa fa-user cmt-textcolor-skincolor"></i>Client
                                                </div>
                                                <div class="cmt-pf-data-details"><?php echo $client_name ?></div>
                                            </li>
                                            <li>
                                                <div class="cmt-pf-data-title">
                                                    <i class="fa fa-money cmt-textcolor-skincolor"></i>Rate
                                                </div>
                                                <div class="cmt-pf-data-details"><?php echo '₹'.$rate ?></div>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                                <div class="cmt-pf-single-content-area">
                                    <h2><?php echo $project_heading?></h2>
                                    <p><?php echo $project_text ?></p>



                         

                                    <?php
// SQL query to fetch all projects

$projectId = $_GET['project'];
$sql1 = "SELECT * FROM project WHERE id=$projectId";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();

$value = $row1['project_name'];


$sql = "SELECT * FROM gallery WHERE project_name='$value' ORDER BY RAND() LIMIT 3";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
?>
                                    <div class="row mt-15 mb-15">

                                    <?php 
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="cmt_single_image-wrapper mt-15 mb-15">
                                                <img class="img-fluid" src="admin/uploads/<?php echo $row['image'] ?>" alt="project-4">
                                            </div>
                                        </div>
                                        <?php 
                                    }
                                        ?>
                            
                                    </div>
                           
                                    <?php 
}
                                    ?>

                                    
                  
                                    <div class="row">
                                        <div class="col-12">
                                           <h2><?php echo $sub_heading ?></h2>
                                            <p><?php echo $sub_text ?></p>
                                        </div>
                                        
                                    </div><!-- row end-->                                    
                                </div>
             
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- project-single-section end -->
<!-- show project code  -->

<!-- show project code  -->
<?php

$id = $_GET['project'];
// SQL query to fetch the specific project
$sql = "SELECT * FROM project WHERE id='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

?>

    <!--portfolio_tilte-section-->
    <section class="cmt-row portfolio_tilte-section cmt-bg clearfix">
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
                    $multiple_images = json_decode($row["project_images"]);
                    foreach ($multiple_images as $image) {
                ?>
                    <div class="cmt-box-col-wrapper col-lg-3 col-md-6 col-sm-6">
                        <!-- featured-imagebox -->
                        <div class="featured-imagebox featured-imagebox-portfolio style3">
                            <!-- cmt-box-view-overlay -->
                            <div class="cmt-box-view-overlay cmt-portfolio-box-view-overlay">
                                <!-- featured-thumbnail -->
                                <div class="featured-thumbnail">
                                    <a href="#"><img class="img-fluid" src="admin/<?php echo $image; ?>" alt="image"></a>
                                </div><!-- featured-thumbnail end -->
                                <div class="featured-iconbox cmt-media-link">
                                    <a class="cmt_prettyphoto cmt_image" title="Off Grid Solar System" data-rel="prettyPhoto" href="admin/<?php echo $image; ?>">
                                        <i class="fa fa-search"></i>
                                    </a>
                                    <a href="#" class="cmt_pf_link"><i class="fa fa-link"></i></a>
                                </div>
                            </div><!-- cmt-box-view-overlay end-->
                        </div><!-- featured-imagebox -->
                    </div>
                <?php
                    } // End of foreach loop
                } // End of while loop
                ?>
            </div><!-- row end -->
        </div>
    </section>

<?php } ?>


    </div><!--site-main end-->
    
<?php

include "include/footer.php";

?>

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

<!-- Mirrored from www.cymolthemes.com/html/mrhandy/solar/solar-led-projects.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 May 2024 13:10:37 GMT -->
</html>
