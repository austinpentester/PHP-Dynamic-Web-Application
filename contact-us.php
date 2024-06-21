<?php

include "conn/conn.php";

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $name = $conn->real_escape_string($_POST['name']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert data into database
    $sql = "INSERT INTO getInTouch (name, phone, email, message) VALUES ('$name', '$phone', '$email', '$message')";
    
    $alertType = "success";
    $alertMessage = "Message Send Successfully";
    if ($conn->query($sql) === TRUE) {
 
        header("Location: contact-us.php?submit");
    } else {
        $alertType = "danger";
        $alertMessage = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();



?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.cymolthemes.com/html/mrhandy/solar/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 May 2024 13:10:55 GMT -->
<?php

include "include/header.php";

?>
<body>

    <!--page start-->
    <div class="page">
        

        <!--header start-->
        <?php

include "include/nav.php";



$sql = "SELECT * FROM static_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the row
    $row = $result->fetch_assoc();



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
                                <h2 class="title">Contact Us</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="index.php">Home</a>
                                </span>
                                <span>Contact Us 1</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                    
        </div><!-- page-title end-->

        
    <!--site-main start-->
    <div class="site-main">


        <section class="cmt-row contact-section clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row no-gutters">
                            <div class="col-lg-1 col-md-1 col-sm-2">
                                <div class="cmt-col-bgcolor-yes cmt-bg cmt-bgcolor-white pt-25 pb-25 mt-100 res-575-mt-0 box-shadow">
                                    <div class="cmt-col-wrapper-bg-layer cmt-bg-layer"></div>
                                    <div class="layer-content">
                                        <div class="contact-block text-center">
                                            <div class="cmt-social-links-wrapper">
                                                <ul class="social-icons d-sm-block">
                                                    <li class="social-facebook">
                                                        <a target="_blank" href="<?php echo $row["facebook"] ?>" class="tooltip-top" data-tooltip="Facebook"><i class="fa fa-facebook"></i></a>
                                                    </li>
                                                    <li class="social-twitter">
                                                        <a target="_blank" href="<?php echo $row["x"] ?>" class="tooltip-top" data-tooltip="X"><i class="fa fa-twitter"></i></a>
                                                    </li>
                                                    <li class="social-instagram">
                                                        <a target="_blank" href="<?php echo $row["instagram"] ?>" class="tooltip-top" data-tooltip="Instagram"><i class="fa fa-instagram"></i></a>
                                                    </li>
                                                    <li class="social-youtube">
                                                        <a target="_blank" href="<?php echo $row["youtube"] ?>" class="tooltip-top" data-tooltip="youtube"><i class="fa fa-youtube"></i></a>
                                                    </li>
                                           
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-11 col-sm-10">
                                <div class="cmt-col-bgcolor-yes cmt-bg cmt-bgcolor-white spacing-11 box-shadow">
                                    <div class="cmt-col-wrapper-bg-layer cmt-bg-layer"></div>
                                    <div class="layer-content">
                                        <div class="cmt-col-bgcolor-yes cmt-bg cmt-bgcolor-grey spacing-12">
                                            <div class="cmt-col-wrapper-bg-layer cmt-bg-layer"></div>
                                            <div class="layer-content">
                                                <!-- section title -->
                                                <div class="section-title with-desc mt-0">
                                                <?php
                                                    if(isset($_GET['submit'])){
                                                    ?>
                                                <div class="alert alert-success" role="alert">
                                                        
                                           
                                                      <p>Message Send Successfully</p>  
                                                  
                                                </div>
                                                <?php
                                                  }
                                                  ?>
                                                    <div class="title-header pb-0">
                                                        <h2 class="title">Get In Touch</h2>
                                                    </div>
                                                    <div class="title-desc"><p>Call or Email us regarding questions or issues</p></div>
                                                </div><!-- section title end -->
                                                <form id="contact_form_2" class="contact_form_2 wrap-form clearfix" method="post" action="contact-us.php">
                                                    <label>
                                                        <span class="text-input"><input name="name" type="text" value="" placeholder="Your Name" required="required"></span>
                                                    </label>
                                                    <label>
                                                        <span class="text-input"><input name="phone" type="text" value="" placeholder="Phone no." required="required"></span>
                                                    </label>
                                                    <label>
                                                        <span class="text-input"><input name="email" type="email" value="" placeholder="E-mail address" required="required"></span>
                                                    </label>
                                                    <label>
                                                        <span class="text-input"><textarea name="message" cols="40" rows="4" placeholder="Message" required="required"></textarea></span>
                                                    </label>
                                                    <div class="text-center">
                                                        <button type="submit" class="submit cmt-btn cmt-btn-size-md cmt-btn-shape-round cmt-btn-style-border cmt-btn-color-dark text-center">Submit Quote</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-12">
                                 <!--google_map-->
                                <div id="google_map" class="google_map mt-100 res-991-mt-50">
                                    <div class="map_container">
                                        <div id="map">
                                            <iframe src="<?php echo $row["map"] ?>" width="100%" height="450"></iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb_15 pt-20 pl-40 res-991-pl-0">
                                    <div class="row cmt-vertical_sep">
                                        <div class="col-lg-6 col-md-5 col-sm-6">
                                            <!--  featured-icon-box --> 
                                            <div class="featured-icon-box icon-align-before-content icon-ver_align-top style7">
                                                <div class="featured-icon pt-5">
                                                    <div class="cmt-icon cmt-icon_element-fill cmt-icon_element-color-grey cmt-icon_element-size-md cmt-icon_element-style-round">
                                                        <i class="cmt-textcolor-skincolor ti ti-email"></i>
                                                    </div>
                                                </div>
                                                <div class="featured-content">
                                                    <div class="featured-title">
                                                        <h3>Email Address</h3>
                                                    </div>
                                                    <div class="featured-desc">
                                                        <p><?php echo $row["email"] ?></p>
                                                       
                                                    </div>
                                                </div>
                                            </div><!--  featured-icon-box END -->
                                        </div>
                                        <div class="col-lg-6 col-md-5 col-sm-6">
                                            <!--  featured-icon-box --> 
                                            <div class="featured-icon-box icon-align-before-content icon-ver_align-top style7 pl-30 res-991-pl-0">
                                                <div class="featured-icon pt-5">
                                                    <div class="cmt-icon cmt-icon_element-fill cmt-icon_element-color-grey cmt-icon_element-size-md cmt-icon_element-style-round">
                                                        <i class="cmt-textcolor-skincolor ti ti-location-pin"></i>
                                                    </div>
                                                </div>
                                                <div class="featured-content">
                                                    <div class="featured-title">
                                                        <h3>Our Address</h3>
                                                    </div>
                                                    <div class="featured-desc">
                                                        <p><?php echo $row["address"] ?></p>
                                                        
                                                    </div>
                                                </div>
                                            </div><!--  featured-icon-box END -->
                                        </div>                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!--cta-section-->
        <section class="cmt-row cta-section pt-70 pb-70 cmt-bgimage-yes inner_pg-bg-img1 cmt-bg cmt-bgcolor-grey clearfix">
            <div class="cmt-row-wrapper-bg-layer cmt-bg-layer"></div>
            <div class="container"><!--container-->
                <div class="row"><!--row-->
                    <div class="col-lg-8 m-auto">
                        <div class="col-title text-center">
                            <div class="cmt-icon cmt-icon_element-border cmt-icon_element-color-highlight cmt-icon_element-size-lg cmt-icon_element-style-rounded">
                                <i class="themifyicon ti-headphone-alt"></i>
                            </div>
                            <!-- section title -->
                            <div class="section-title mt-0">
                                <div class="title-header">
                                    <h2 class="title">Call us On: <?php echo $row["number"] ?></h2>
                                </div>
                                <div class="title-desc"><h6>Address: <?php echo $row["address"] ?></h6></div>
                            </div><!-- section title end -->
                            <a class="cmt-btn cmt-btn-size-md cmt-btn-shape-round cmt-btn-style-border cmt-icon-btn-right cmt-btn-color-highlight" href="contact-us.php">Contact us<i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--cta-section-->


        <!-- services-section -->
      
        <!-- services-section end -->


    </div><!--site-main end-->
    

        <!--footer start-->
        <?php
}
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

<!-- Mirrored from www.cymolthemes.com/html/mrhandy/solar/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 May 2024 13:10:55 GMT -->
</html>
