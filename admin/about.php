<?php

session_start(); // Start the session
if (!isset($_COOKIE["logged_in"]) || !$_COOKIE["logged_in"]) {
    header("Location: index.php");
    exit;
}

include "../conn/conn.php";

// Define variables to store fetched data
$mobileNumber = $email = $phone = $facebookLink = $xLink = $youtubeLink = $linkedIn = $instagramLink = $address = "";

// Fetch data from the database
$sql = "SELECT * FROM static_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the first row of data (assuming only one row is retrieved)
    $row = $result->fetch_assoc();

    // Assign fetched data to variables
    $mobileNumber = $row["number"];
    $email = $row["email"];
    $facebookLink = $row["facebook"];
    $xLink = $row["x"];
    $youtubeLink = $row["youtube"];
    $linkedIn = $row["linkedIn"];
    $instagramLink = $row["instagram"];
    $address = $row["address"];
    $about = $row["about"];

    $main_about = $row['main_about'];
    $aboutHeading = $row['aboutHeading'];
    $about_image = $row['about_image'];
}


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
    include 'include/sidebar.php';
?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'include/topbar.php' ?>
                <!-- End of Topbar -->



                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">About Company Details</h1>
                    <div class="card mt-5">
                        <div class="card-body">
                            <h5 class="card-title">Information</h5>

                            <?php
// Check if the form is submitted
if (isset($_POST['about']) && $_POST['about'] == 'about') {
    // Get form data
    $aboutHeading = $_POST['aboutHeading'];
    $main_about = $_POST['main_about'];

    // Check if a new file is uploaded
    if (isset($_FILES['about_image']) && $_FILES['about_image']['error'] == UPLOAD_ERR_OK) {
        // Get the filename of the uploaded photo
        $photo = $_FILES['about_image']['name'];

        // Move uploaded file to a directory
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["about_image"]["name"]);
        move_uploaded_file($_FILES["about_image"]["tmp_name"], $target_file);
    } else {
        // Use the existing image if no new file was uploaded
        $photo = $_POST['current_about_image'];
    }

    // Update database
    $sql = "UPDATE static_details SET main_about='$main_about', aboutHeading='$aboutHeading', about_image='$photo' WHERE id = 1"; // Assuming you have an 'id' column for unique identification
    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Update successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>
<?php
                                if (isset($_SESSION['message'])) {
                                    echo '<div class="alert alert-info" role="alert">' . $_SESSION['message'] . '</div>';
                                    unset($_SESSION['message']);
                                }
                            ?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="phone">About Heading</label>
        <input type="tel" class="form-control" name="aboutHeading" id="phone" value="<?php echo $aboutHeading; ?>">
    </div>

    <div class="form-group">
        <label for="About">About</label>
        <textarea class="form-control" id="About" name="main_about" rows="3"><?php echo $main_about; ?></textarea>
    </div>

    <div class="form-group">
        <label for="about_image">About Image</label>
        <input type="file" class="form-control-file" id="about_image" name="about_image">
        <input type="hidden" name="current_about_image" value="<?php echo $about_image; ?>">
    </div>
    <img src="uploads/<?php echo $about_image; ?>" height="100px" width="100px" alt="">
    <button type="submit" name="about" value="about" class="btn btn-primary">Update</button>
</form>

                        </div>
                    </div>
                    

            


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>