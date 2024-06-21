<?php

include "../conn/conn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update']) && $_POST['update'] == 'update') {
    // Check if a new image file was uploaded
    if ($_FILES['headerimage']['size'] > 0) {
        // Move the uploaded file to the target directory
        $target_dir = "uploads/";
        $photo = basename($_FILES["headerimage"]["name"]);
        $target_file = $target_dir . $photo;
        move_uploaded_file($_FILES["headerimage"]["tmp_name"], $target_file);
    } else {
        // No new image uploaded, keep the existing image
        $photo = $image; // Assuming $image holds the filename of the existing image
    }

    $stmt = $conn->prepare("UPDATE slider SET headerimage = ? WHERE id = 8");
    $stmt->bind_param("s", $photo);

    if ($stmt->execute()) {
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit; // Ensure that no further output is generated after the header() call
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
    // You don't need to close the connection if you're going to use it later in your script
}


// Fetch slider information
$sql = "SELECT * FROM slider";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // Output data of the first row (assuming you have only one record)
    $row = $result->fetch_assoc();
  
    $image = $row["headerimage"];

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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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
                    <h1 class="h3 mb-4 text-gray-800">Index Message </h1>









                    <div class="card mt-5">
                        <div class="card-body">
                            <h5 class="card-title">Header Image</h5>
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="file">Photo Upload</label>
                                    <input type="file" class="form-control-file" id="file" name="headerimage">
                                </div>
                                <!-- Hidden input field to store old image filename -->

                                <img src="uploads/<?php echo $image; ?>" height="100px" width="100px" alt="">
                                <button type="submit" name="update" value="update" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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