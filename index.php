<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/all.min.css" />
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <title>log In</title>
</head>

<body>
    <div class="container ">
        <div class="row ">
            <div class="col-md-12 text-center  ">
                <div class="text mt-3">
                    <h1 class="blue_color_h1">facebook</h1>
                    <h2 class="w-50 mx-auto">
                        Facebook helps you connect and share with the people in your life.
                    </h2>
                </div>
            </div>
            <div class="col-auto  m-auto my-4 text-center  p-5">
                <div class="form-control shadow  bg-white ">
                    <form class="" action="index.php" method="post" autocomplete="">

                        <div class="alert alert-danger mt-3" role="alert" id='alert' style="display:none;">
                        </div>
                        <!-- <div class="alert alert-success mt-3" role="alert" id='success_alert' style="display:none;">
                        This is a success alert—check it out!
                        </div> -->
                        <p class="error"></p>
                        <input type="email" placeholder="Email address or phone number" class=" form-control mt-2" name="email" id="email" required />
                        <input type="password" placeholder="Password " class=" form-control mt-2" name="password" id="password" required />
                        <!-- <a href="/login"> -->
                        <button class=" btn text-white mt-2 login_btn form-control p-2">
                            Log in
                        </button>
                        <!-- </a> -->
                        <h6 class="blue_color mt-3">Forgotten password?</h6>
                        <hr />

                    </form>
                    <a href="createAccount.php">
                        <button class="btn text-white create_btn mt-2  mb-2  " type="submit" action='createAccount.html'>
                            Create new account
                        </button>
                    </a>

                </div>
                <h6 class="mt-2">
                    Create a Page for a celebrity, brand or business.
                </h6>
            </div>
        </div>
    </div>

    <!-- <form class="" action="login_process.php" method="post" autocomplete=""> -->
  

    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.6.4.min.js"></script>
    <script src="./js/main.js"></script>
</body>

</html>
<?php
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // database connection
    $conn = new mysqli('localhost', 'root', '', 'facebook1');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_errno);
    } else {
        $stm = $conn->prepare('SELECT * FROM login WHERE email = ?');
        $stm->bind_param('s', $email);
        $stm->execute();
        $stm_result = $stm->get_result();
        if ($stm_result->num_rows > 0) {
            $data = $stm_result->fetch_assoc();
            if ($data['password'] === $password) {
                // Store data in local storage
                echo '<script>
                    localStorage.setItem("email", "' . $email . '");
                    localStorage.setItem("password", "' . $password . '");
                    window.location.href = "successlogin.php";
                </script>';
            } else {
                echo '<script>
                    document.getElementById("alert").style.display = "block";
                    document.getElementById("alert").innerHTML = "Invalid Password";
                </script>';
            }
        } else {
            echo '<script>
                document.getElementById("alert").innerHTML = "Invalid Email";
                document.getElementById("alert").style.display = "block";
            </script>';
        }
        $stm->close();
        $conn->close();
    }
} else {
}
?>
