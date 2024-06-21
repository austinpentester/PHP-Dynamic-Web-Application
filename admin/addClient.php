<?php
session_start(); // Start the session

if (!isset($_COOKIE["logged_in"]) || !$_COOKIE["logged_in"]) {
    header("Location: index.php");
    exit;
}
include "../conn/conn.php";

 // Check if the delete button was clicked
 if(isset($_POST['delete_id'])) {
    echo '<script>alert("Are you sure you want to delete?")</script>';
    $delete_id = $_POST['delete_id'];

    // SQL to delete record
    $sql = "DELETE FROM client_logo WHERE id = $delete_id";

    if ($conn->query($sql) === TRUE) {
        // echo "Record deleted successfully";

        $_SESSION['message'] = "Record deleted successfully";
    } else {
        $_SESSION['message'] = "Error deleting record: " . $conn->error;
    }
}




if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && $_POST['submit'] == 'submit') {
    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO client_logo (name, image) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $photo);

    // Set parameters
    $name = $_POST['name'];

    // Check if a file was uploaded
    if (isset($_FILES['file'])) {
        $photo = $_FILES['file']['name']; // Get the filename of the uploaded photo

        // Move uploaded file to a directory
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

        // Execute the statement
        if ($stmt->execute()) {
            $_SESSION['message'] = "Data inserted successfully";
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "No file uploaded";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
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
                    <h1 class="h3 mb-4 text-gray-800">Add Client </h1>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Client Information</h5>
                            <?php
                                if (isset($_SESSION['message'])) {
                                    echo '<div class="alert alert-info" role="alert">' . $_SESSION['message'] . '</div>';
                                    unset($_SESSION['message']);
                                }
                            ?>
                            <form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Client Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="form-group">
        <label for="file">Photo Upload</label>
        <input type="file" class="form-control-file" id="file" name="file" required>
    </div>

    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
</form>

                        </div>
                    </div>
                    

                    <div class="card shadow mt-5 mb-4">
                        <div class="card-header py-3">
                            <!-- <h6 class="m-0 font-weight-bold text-primary">Messages</h6> -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php


                                            // Fetch data from the database
                                                $sql = "SELECT * FROM client_logo";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {
                                                    // Output data of each row
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>" . $row["name"] . "</td>";
                                                        
                                                      
                                                    
                                                        echo "<td><img width='100px' height='100px' src='uploads/" . $row["image"] . "' alt='Employee Photo'></td>";

                                                        echo '<td>
                                                                <form method="post" action="">
                                                                    <input type="hidden" name="delete_id" value="' . $row["id"] . '">
                                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </td>';
                                                        echo "</tr>";
                                                    }
                                                }
                                        ?>
                                        
                                        

                          
                                    </tbody>
                                </table>
                            </div>
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