<?php

include 'conn/conn.php';

$sql = "SELECT * FROM static_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the row
    $row = $result->fetch_assoc();
    $email = $row["email"];
    $address = $row["address"];
    $number = $row["number"];
}    
?>

<footer class="footer cmt-bgcolor-darkgrey cmt-textcolor-white clearfix">
    <div class="second-footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                    <div class="widget widget_text clearfix">
                        <div class="footer-logo">
                            <img id="footer-logo-img" class="img-fluid auto_size" height="39" width="170" src="admin/uploads/<?php echo $row["site_logo"] ?>" alt="image">
                        </div>
                        <div class="textwidget widget-text">
                            <p><?php echo $row["about"] ?></p>
                        </div>
                        <div class="cmt-horizontal_sep width-100 mt-20 mb-30"></div>
                        <div class="social-icons">
                            <ul class="list-inline cmt-textcolor-skincolor">
                                <li><a target="_blank" href="<?php echo $row["facebook"] ?>" rel="noopener" aria-label="facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a target="_blank" href="<?php echo $row["x"] ?>" rel="noopener" aria-label="twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a target="_blank" href="<?php echo $row["youtube"] ?>" rel="noopener" aria-label="youtube"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a target="_blank" href="<?php echo $row['instagram'] ?>" rel="instagram" aria-label="instagram"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                    <div class="widget widget_nav_menu clearfix">
                        <h3 class="widget-title">About</h3>
                        <ul id="menu-footer-services">
                        <?php
                // SQL query to fetch random 6 gallery images
                $sql = "SELECT * FROM services";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                            <li><a href="Services.php?service=<?php  echo $row['name'] ?>"><?php echo $row['name'] ?></a></li>
                 <?php } }?>
                        </ul>
                    </div>
                </div>
                <?php
                // SQL query to fetch random 6 gallery images
                $sql = "SELECT * FROM gallery ORDER BY RAND() LIMIT 6";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                    <div class="widget style2 widget-out-link clearfix">
                        <h3 class="widget-title">Follow instagram</h3>
                        <div class="images-gellary">
                            <ul>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                <li><a target="_blank"  href="<?php echo $row['section'] ?>" ><img class="img-fluid" src="admin/uploads/<?php echo $row['image'] ?>" alt="gallery_img"></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                    <div class="widget widget_contact clearfix">
                        <h3 class="widget-title">Contact us</h3>
                        <p>Call or Email us regarding questions or issues.</p>
                        <ul class="widget_contact_wrapper">
                            <li><i class="fa fa-phone"></i><?php echo $number ?></li>
                            <li><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo $email ?>" target="_blank"><?php echo $email ?></a></li>
                            <li><i class="fa fa-map-marker"></i><?php echo $address ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-footer-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright text-center">
                        <span>Copyright &copy; <span id="current-year"></span>. All rights reserved. Powered By <a href="#" class="cmt-textcolor-highlight" target="_blank" rel="noopener">KSKM TECHNOVA PRIVATE LIMITED</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    document.getElementById('current-year').appendChild(document.createTextNode(new Date().getFullYear()));
</script>


