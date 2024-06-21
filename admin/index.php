<?php
include "../conn/conn.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $input_username = $_POST["username"];
    $input_password = $_POST["password"];

    // Query to retrieve username and password from the database
    $sql = "SELECT * FROM admin_login WHERE username = '$input_username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User found, verify password
        $row = $result->fetch_assoc();
        $stored_password = $row["password"];

        if ($input_password === $stored_password) {
            // Password matches, set cookie to remember login state
            setcookie("logged_in", true, time() + (86400 * 30), "/"); // 86400 = 1 day

            // Redirect to dashboard or homepage
            header("Location: dashboard.php");
            exit;
        } else {
            $error_message = "Invalid username or password";
        }
    } else {
        $error_message = "User not found";
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

    <title>Admin Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fc;
        }

        .bg-white {
            background-color: #fff !important;
        }

        .shadow-lg {
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
        }

        .login-container {
            max-width: 450px;
            margin: 0 auto;
            padding-top: 100px;
        }

        .login-card {
            border: none;
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <div class="container login-container">
        <div class="card login-card shadow-lg bg-white">
            <div class="card-body">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Admin Login</h1>
                </div>
                <form class="user" method="post" action="">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Username..." name="username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label" for="customCheck">Remember Me</label>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
                    <hr>
                    <?php if (isset($error_message)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error_message; ?>
                        </div>
                    <?php } ?>
                </form>
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
