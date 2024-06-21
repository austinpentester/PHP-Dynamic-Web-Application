<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.cymolthemes.com/html/mrhandy/solar/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 May 2024 13:10:16 GMT -->
<?php

include "include/header.php";

?>
<body>

    <!--page start-->
    <div class="page">

        <!--header start-->


        <?php

include "include/nav.php";

?>
        <!--header end-->


        <!-- page-title -->
        <div class="cmt-page-title-row cmt-bgimage-yes cmt-bg cmt-bgcolor-grey">
            <div class="cmt-row-wrapper-bg-layer cmt-bg-layer"></div>
            <div class="cmt-page-title-row-inner">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="page-title-heading">
                                <h2 class="title">About Us</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="index.php">Home</a>
                                </span>
                                <span>About Us</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                    
        </div><!-- page-title end-->

        
    <!--site-main start-->
    <div class="site-main">

<?php
          
                $sql = "SELECT * FROM static_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// Fetch the row
$row = $result->fetch_assoc();


         

?>
        <!--tab-section-->
        <section class="cmt-row tab-section cmt-bgcolor-grey clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="pr-40 res-991-pr-0">
                            <!-- section title -->
                            <div class="section-title with-desc mt-0">
                                <div class="title-header pb-0">
                                    <h2 class="title"><?php echo $row['aboutHeading'] ?></h2>
                                </div>
                                <div class="title-desc">
                                    <p><?php echo $row['main_about'] ?></p>
                                </div>
                            </div><!-- section title end -->
                
                            <div class="res-991-pb-40">
                                <a class="cmt-btn cmt-btn-size-md cmt-btn-shape-round cmt-btn-style-fill cmt-icon-btn-left cmt-btn-color-highlight mt-10 mr-2" href="contact-us.php"><i class="fa fa-headphones"></i>Give us a call</a>
                                
                            </div>
                        </div>
                    </div>                    
                    <div class="col-lg-5">
                       <div class="d-inline-block cmt_single_image-wrapper position-relative">
                            <img class="img-fluid" src="admin/uploads/<?php echo $row['about_image'] ?>" alt="single_02">
                            <div class="d-flex mt_140 ml-90 res-991-m-0 res-991-mt-30 position-relative z-index-2">
                                <div class="pl-5 cmt-bgcolor-skincolor"></div>
                                <div class="d-inline w-100 pl-25 pt-25 pb-15 pr-20 cmt-bgcolor-white text-left box-shadow">
                                    <h4 class="mb-5">We Build for Your Comfort</h4>
                                    <h6>Any Questions? Call:<span class="cmt-textcolor-skincolor"><strong><?php echo $row['number'] ?></strong></span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- row end -->
            </div>
        </section>
        <!--tab-section end-->


        <!--working-section-->

        <!--working-section end-->

<?php }?>
        <!--cta-section-->

        <!--cta-section-->


        <!--team-section-->
        <section class="cmt-row team-section clearfix">
            <div class="container">
                <!-- row -->

                <div class="row">
                    <div class="col-lg-7 col-md-8 col-sm-10 m-auto">
                        <!-- section-title -->
                        <div class="section-title title-style-center_text">
                            <div class="title-header">
                                <h4>Team</h4>
                                <h3>quality stuff</h3>
                                <h2 class="title">Meet Our Professionals</h2>
                            </div>
                        </div><!-- section-title end -->
                    </div>
                </div><!-- row end -->
                <!-- row -->
                <div class="row slick_slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "arrows":false, "autoplay":false, "infinite":true, "responsive": [{"breakpoint":991,"settings":{"slidesToShow": 3}}, {"breakpoint":860,"settings":{"slidesToShow": 2}}, {"breakpoint":560,"settings":{"slidesToShow": 1}}]}'>
                        <?php

                        include 'conn/conn.php';
                        $sql = "SELECT * From team";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {


                        ?>
                <!-- loop start -->

                    <div class="cmt-box-col-wrapper col-lg-4">
                        <!-- featured-imagebox-team -->
                        <div class="featured-imagebox featured-imagebox-team style1">
                            <div class="cmt-box-view-overlay">
                                <div class="featured-thumbnail">
                                    <img class="img-fluid" src="admin/uploads/<?php echo  $row["photo"]; ?>" alt="image"> 
                                </div>
                            </div>
                            <div class="featured-content">
                                <div class="team-position"><?php echo  $row["position"]; ?></div>
                                <div class="featured-title">
                                    <h3><a href="team-details.html"><?php echo  $row["name"]; ?></a></h3>
                                </div>
                                <ul class="cmt_contact_widget_wrapper list-unstyled">
                                    <li class="d-flex align-items-center"><i class="fa fa-phone cmt-textcolor-skincolor mr-3"></i> <?php echo  $row["mobile"]; ?></li>
                                    <li class="d-flex align-items-center"><i class="fa fa-envelope-o cmt-textcolor-skincolor mr-3"></i><a href="mailto:contact@company.com" target="_blank" rel="noopener"><?php echo  $row["email"]; ?></a></li>
                                </ul>
                            </div>
                        </div><!-- featured-imagebox-team end-->
                    </div>
                                    <?php
                        }
                        }
                                    ?>
                <!-- loop end  -->

                  
                   
                    
                </div><!-- row end -->
            </div>
        </section>
        <!--team-section end-->


        <!--client-section-->
        <div class="cmt-row client-section clearfix">
            <div class="container">
                <!-- row -->
                <div class="row text-center">
                    <div class="col-md-12">
                        <!-- slick_slider -->                        
                        <div class="slick_slider slick-slide_ver-sep row" data-slick='{"slidesToShow": 5, "slidesToScroll": 1, "arrows":false, "autoplay":true, "infinite":true, "responsive": [{"breakpoint":1200,"settings":{"slidesToShow": 5}}, {"breakpoint":1024,"settings":{"slidesToShow": 4}}, {"breakpoint":777,"settings":{"slidesToShow": 3}}, {"breakpoint":575,"settings":{"slidesToShow": 2}}]}'>
                             <?php

                                include 'conn/conn.php';
                                $sql = "SELECT * From client_logo";

                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // Output data of each row
                                    while ($row = $result->fetch_assoc()) {


                                ?>


                            <div class="col-lg-12">
                                <div class="client-box">
                                <div class="cmt-client-logo-tooltip" data-tooltip="client-01">
                                    <div class="client-thumbnail">
                                        <img class="img-fluid auto_size" height="84" width="124" src="admin/uploads/<?php echo $row['image'] ?>" alt="image">
                                    </div>
                                </div>
                                </div>
                            </div>


                                    <?php

                                        }}

                                    ?>

                           
                           
                    
                        </div><!-- cmt-client end -->      
                    </div>
                </div><!-- row end -->
            </div>
        </div>
        <!--client-section-->


    </div><!--site-main end-->

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

<!-- Mirrored from www.cymolthemes.com/html/mrhandy/solar/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 May 2024 13:10:20 GMT -->
</html>