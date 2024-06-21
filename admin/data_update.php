<?php
// Ensure no output before the headers are sent
ob_start();

// Check if the user is logged in
if (!isset($_COOKIE["logged_in"]) || !$_COOKIE["logged_in"]) {
    header("Location: index.php");
    exit();
}

include "../conn/conn.php";

// Define variables to store fetched data
$mobileNumber = $email = $facebookLink = $xLink = $youtubeLink = $linkedIn = $instagramLink = $address = $about = $hours = $site_logo = "";

// Fetch data from the database
$sql = "SELECT * FROM static_details WHERE id = 1"; // Ensure that you fetch the specific row by its ID
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $mobileNumber = $row["number"];
    $email = $row["email"];
    $facebookLink = $row["facebook"];
    $xLink = $row["x"];
    $youtubeLink = $row["youtube"];
    $linkedIn = $row["linkedIn"];
    $instagramLink = $row["instagram"];
    $address = $row["address"];
    $about = $row["about"];
    $hours = $row["hours"];
    $site_logo = $row['site_logo'];
    $siteTittle = $row['siteTittle'];
    $favIcon = $row['favIcon'];
    
    $map = $row['map'];
}

// Check if the form is submitted
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ses1']) && $_POST['ses1'] == 'ses1') {
    // Get form data
    $mobileNumber = $_POST['number'];
    $email = $_POST['email'];
    $facebookLink = $_POST['facebook'];
    $xLink = $_POST['x'];
    $youtubeLink = $_POST['youtube'];
    $linkedIn = $_POST['linkedIn'];
    $instagramLink = $_POST['instagram'];
    $address = $_POST['address'];
    $about = $_POST['about'];
    $hours = $_POST['hours'];
    $site_logo = $_POST['current_site_logo'];
    $siteTittle = $_POST['siteTittle'];
    if(isset($_POST['favIcon'])){
        $favIcon = $_POST['favIcon'];
    }
    $map = $_POST['map'];

    // Check if a new file is uploaded for the site logo
    if (isset($_FILES['site_logo']) && $_FILES['site_logo']['error'] == UPLOAD_ERR_OK) {
        // Update site_logo only if a new file is uploaded
        $site_logo = $_FILES['site_logo']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["site_logo"]["name"]);
        move_uploaded_file($_FILES["site_logo"]["tmp_name"], $target_file);
    }



    if (isset($_FILES['favIcon']) && $_FILES['favIcon']['error'] == UPLOAD_ERR_OK) {
        // Update favIcon only if a new file is uploaded
        $favIcon = $_FILES['favIcon']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["favIcon"]["name"]);
        move_uploaded_file($_FILES["favIcon"]["tmp_name"], $target_file);
    } else {
        // If no new file is uploaded, retain the old favicon file name
        $favIcon = $_POST['current_favIcon'];
    }
    


    // Update database
    $sql = "UPDATE static_details SET number='$mobileNumber', email='$email', facebook='$facebookLink', x='$xLink', youtube='$youtubeLink', linkedIn='$linkedIn', instagram='$instagramLink', address='$address', about='$about', hours='$hours', siteTittle='$siteTittle', map='$map'";

    // Update site_logo only if a new file is uploaded
    if (isset($_FILES['site_logo']) && $_FILES['site_logo']['error'] == UPLOAD_ERR_OK) {
        $sql .= ", site_logo='$site_logo'";
    }
        // Update site_logo only if a new file is uploaded
        if (isset($_FILES['favIcon']) && $_FILES['favIcon']['error'] == UPLOAD_ERR_OK) {
            $sql .= ", favIcon='$favIcon'";
        }

    $sql .= " WHERE id = 1";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the desired page after successful update
 
    } else {
        echo "Error updating record: " . $conn->error;
    }
}


ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SB Admin 2 - Blank</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include 'include/sidebar.php'; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include 'include/topbar.php'; ?>
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">About Company Details</h1>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Contact Information</h5>
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name">Mobile number</label>
                                    <input type="text" class="form-control" id="name" name="number" value="<?php echo $mobileNumber; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="name">Hours</label>
                                    <input type="text" class="form-control" id="name" name="hours" value="<?php echo $hours; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="map">Map Link</label>
                                    <input type="text" class="form-control" name="map" id="map" value="<?php echo $map; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="tit">Site Tittle</label>
                                    <input type="text" class="form-control" name="siteTittle" id="tit" value="<?php echo $siteTittle; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="phone">FaceBook Link</label>
                                    <input type="tel" class="form-control" id="phone" name="facebook" value="<?php echo $facebookLink; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="phone">X Link</label>
                                    <input type="tel" class="form-control" id="phone" name="x" value="<?php echo $xLink; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="phone">You Tube Link</label>
                                    <input type="tel" class="form-control" id="phone" name="youtube" value="<?php echo $youtubeLink; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Linked In</label>
                                    <input type="tel" class="form-control" name="linkedIn" id="phone" value="<?php echo $linkedIn; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Instagram Link</label>
                                    <input type="tel" class="form-control" name="instagram" id="phone" value="<?php echo $instagramLink; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="message">Address</label>
                                    <textarea class="form-control" id="message" name="address" rows="3"><?php echo $address; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="About">About For Footer</label>
                                    <textarea class="form-control" id="About" name="about" rows="3"><?php echo $about; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="site_logo">Site Logo</label>
                                    <input type="file" class="form-control-file" id="site_logo" name="site_logo">
                                    <input type="hidden" name="current_site_logo" value="<?php echo $site_logo; ?>">
                                </div>
                                <img src="uploads/<?php echo $site_logo; ?>" height="100px" width="100px" alt="">

                                <!-- code for fav icon -->
                                <div class="form-group">
                                    <label for="favIcon">Fav Icon</label>
                                    <input type="file" class="form-control-file" id="favIcon" name="favIcon">
                                    <input type="hidden" name="current_favIcon" value="<?php echo $favIcon; ?>">
                                </div>
                                <img src="uploads/<?php echo $favIcon; ?>" height="100px" width="100px" alt="">
                                <button type="submit" name="ses1" value="ses1" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>
