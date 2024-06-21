<?php
if (!isset($_COOKIE["logged_in"]) || !$_COOKIE["logged_in"]) {
    header("Location: index.php");
    exit;
}
include "../conn/conn.php";

// Handle delete request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $sql = "DELETE FROM services WHERE id = $delete_id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record deleted successfully');</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && $_POST['submit'] == 'submit') {
    // Set parameters
    $name = $_POST['name'];
    $heading = $_POST['heading'];
    $paragraph = $_POST['paragraph'];
    $sub_paragraph = $_POST['sub_paragraph'];

    // File upload logic
    $upload_dir = 'uploads/';

    $logo = $upload_dir . basename($_FILES["logo"]["name"]);
    $image = $upload_dir . basename($_FILES["image"]["name"]);
    $sub_image = $upload_dir . basename($_FILES["sub_image"]["name"]);

    if (move_uploaded_file($_FILES["logo"]["tmp_name"], $logo) &&
        move_uploaded_file($_FILES["image"]["tmp_name"], $image) &&
        move_uploaded_file($_FILES["sub_image"]["tmp_name"], $sub_image)) {
        
        // Insert data into the database
        $sql = "INSERT INTO services (name, heading, paragraph, sub_paragraph, logo, image, sub_image) 
                VALUES ('$name', '$heading', '$paragraph', '$sub_paragraph', '$logo', '$image', '$sub_image')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Record inserted successfully');</script>";
        } else {
            echo "Error inserting record: " . $conn->error;
        }
    } else {
        echo "Error uploading files.";
    }
}

// Fetch data from the database
$sql = "SELECT * FROM services";
$result = $conn->query($sql);
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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
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
                    <h1 class="h3 mb-4 text-gray-800">Add services </h1>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">services Information</h5>
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name">Service Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="heading">Heading</label>
                                    <input type="text" class="form-control" id="heading" name="heading" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="paragraph">Paragraph</label>
                                    <textarea class="form-control" id="paragraph" name="paragraph" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="sub_paragraph">Sub-Paragraph</label>
                                    <textarea class="form-control" id="sub_paragraph" name="sub_paragraph" rows="3" required></textarea>
                                </div>
                                <hr>
                                <div class="form-group mt-3">
                                    <label for="logo">Service Logo</label>
                                    <input type="file" class="form-control-file" id="logo" name="logo" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="image">Service Image</label>
                                    <input type="file" class="form-control-file" id="image" name="image" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="sub_image">Sub Image</label>
                                    <input type="file" class="form-control-file" id="sub_image" name="sub_image" required>
                                </div>
                                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                    </div>
                    
                    <table id="servicesTable" class="display table table-bordered table-hover mt-5">
                        <thead>
                            <tr>
                                <th>Service Name</th>
                                <th>Heading</th>
                                <th>Paragraph</th>
                                <th>Sub-Paragraph</th>
                                <th>Service Logo</th>
                                <th>Service Image</th>
                                <th>Sub Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <td>" . $row["name"] . "</td>
                                        <td>" . $row["heading"] . "</td>
                                        <td>" . $row["paragraph"] . "</td>
                                        <td>" . $row["sub_paragraph"] . "</td>
                                        <td><img src='" . $row["logo"] . "' alt='Service Logo' height='100' width='100'></td>
                                        <td><img src='" . $row["image"] . "' alt='Service Image' height='100' width='100'></td>
                                        <td><img src='" . $row["sub_image"] . "' alt='Sub Image' height='100' width='100'></td>
                                        <td>
                                            <form method='post' action='' onsubmit='return confirm(\"Are you sure you want to delete this record?\");'>
                                                <input type='hidden' name='delete_id' value='" . $row["id"] . "'>
                                                <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                                            </form>
                                        </td>
                                    </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='8'>No records found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>

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
