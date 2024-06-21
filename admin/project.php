<?php
if (!isset($_COOKIE["logged_in"]) || !$_COOKIE["logged_in"]) {
    header("Location: index.php");
    exit;
}
include "../conn/conn.php";

// Handle delete request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $sql = "DELETE FROM project WHERE id = $delete_id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record deleted successfully');</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && $_POST['submit'] == 'submit') {
    $product_name = isset($_POST['project_name']) ? $_POST['project_name'] : '';
    $categories = isset($_POST['categories']) ? $_POST['categories'] : '';
    $project_heading = isset($_POST['project_heading']) ? $_POST['project_heading'] : '';
    $product_rate = isset($_POST['product_rate']) ? $_POST['product_rate'] : '';
    $product_starting_date = isset($_POST['product_starting_date']) ? $_POST['product_starting_date'] : '';
    $product_ending_date = isset($_POST['product_ending_date']) ? $_POST['product_ending_date'] : '';
    $client = isset($_POST['client_name']) ? $_POST['client_name'] : '';
    $paragraph = isset($_POST['project_text']) ? $_POST['project_text'] : '';

    $upload_dir = 'uploads/';
    $single_image_path = '';
    $multiple_images = [];

    // Handle single image upload
    if (!empty($_FILES['single_image']['name'])) {
        $single_image_name = basename($_FILES['single_image']['name']);
        $single_image_path = $upload_dir . $single_image_name;

        if (!move_uploaded_file($_FILES['single_image']['tmp_name'], $single_image_path)) {
            echo "<script>alert('Error uploading file: $single_image_name');</script>";
            $single_image_path = '';
        }
    }

    // Handle multiple images upload
    foreach ($_FILES['multiple_images']['tmp_name'] as $key => $tmp_name) {
        $image_name = basename($_FILES['multiple_images']['name'][$key]);
        $image_path = $upload_dir . $image_name;

        if (move_uploaded_file($tmp_name, $image_path)) {
            $multiple_images[] = $image_path;
        } else {
            echo "<script>alert('Error uploading file: $image_name');</script>";
        }
    }

    $multiple_images_json = json_encode($multiple_images);

    $sql = "INSERT INTO project (project_name, project_heading, categories, client_name, date, project_text, product_rate, product_starting_date, product_ending_date, project_image, project_images) 
            VALUES ('$product_name', '$project_heading', '$categories', '$client', NOW(), '$paragraph', '$product_rate', '$product_starting_date', '$product_ending_date', '$single_image_path', '$multiple_images_json')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record inserted successfully');</script>";
    } else {
        echo "Error inserting record: " . $conn->error;
    }
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
        <?php include 'include/sidebar.php'; ?>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php include 'include/topbar.php'; ?>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Add Product</h1>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Product Information</h5>
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" class="form-control" id="name" name="project_name" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputGroupSelect01">Product Categories</label>
                                    <select class="form-control" id="inputGroupSelect01" name="categories">
                                        <option selected>Choose...</option>
                                        <?php
                                        $sql = "SELECT * FROM services";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {    
                                                echo "<option value='".$row['name']."'>".$row['name']."</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="heading">Product Heading</label>
                                    <input type="text" class="form-control" id="heading" name="project_heading" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="heading">Product Rate</label>
                                    <input type="text" class="form-control" id="heading" name="product_rate" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="heading">Product Starting Date</label>
                                    <input type="date" class="form-control" id="heading" name="product_starting_date" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="heading">Product Ending Date</label>
                                    <input type="date" class="form-control" id="heading" name="product_ending_date" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="client">Product Client</label>
                                    <input type="text" class="form-control" id="client" name="client_name" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="paragraph">Description</label>
                                    <textarea class="form-control" id="paragraph" name="project_text" rows="3" required></textarea>
                                </div>
                                <hr>
                                <div class="form-group mt-3">
                                    <label for="single_image">Product Image (Single)</label>
                                    <input type="file" class="form-control-file" id="single_image" name="single_image">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="multiple_images">Product Images (Multiple)</label>
                                    <input type="file" class="form-control-file" id="multiple_images" name="multiple_images[]" multiple>
                                </div>
                                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                    <table id="servicesTable" class="display table table-bordered table-hover mt-5">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Product Categories</th>
                                <th>Product Heading</th>
                                <th>Product Rate</th>
                                <th>Product Starting Date</th>
                                <th>Product Ending Date</th>
                                <th>Product Client</th>
                                <th>Description</th>
                                <th>Single Image</th>
                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Fetch all data from the "project" table
                            $sql = "SELECT * FROM project";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <td>" . $row["project_name"] . "</td>
                                        <td>" . $row["categories"] . "</td>
                                        <td>" . $row["project_heading"] . "</td>
                                        <td>" . $row["product_rate"] . "</td>
                                        <td>" . $row["product_starting_date"] . "</td>
                                        <td>" . $row["product_ending_date"] . "</td>
                                        <td>" . $row["client_name"] . "</td>
                                        <td>" . $row["project_text"] . "</td>
                                        <td><img src='" . $row["project_image"] . "' width='100'></td>
                                        
                                        <td>
                                            <form method='post' action='' onsubmit='return confirm(\"Are you sure you want to delete this record?\");'>
                                                <input type='hidden' name='delete_id' value='" . $row["id"] . "'>
                                                <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                                            </form>
                                        </td>
                                    </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='11'>No records found</td></tr>";
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
