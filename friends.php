<?php
$email = $_GET['email'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/all.min.css" />
  <link rel="stylesheet" href="./css/bootstrap.min.css" />
  <link rel="stylesheet" href="./css/style.css" />
  <title>Friends</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top  p-1   " style="margin-bottom:70px;">
    <a class="navbar-brand blue_color fw-bold" style="margin-left:70px; font-size:25px;" href="#">
      <!-- <img src="Facebook.png" class="" style="width: 150px; padding-left:30px;" alt=""> -->

      Friends
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item active">
          <a class="nav-link" href="successlogin.php?email=<?php echo $email; ?>">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="userinfo.php?email=<?php echo $email; ?>">User Info <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="postspage.php?email=<?php echo $email; ?>">Posts page <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="friends.php?email=<?php echo $email; ?>">Friends <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="chat.php?email=<?php echo $email; ?>">Chat <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <a href="index.php" style="padding-right:30px;">
        <button class='btn login_btn text-white ' id='btn1'>log Out
          <i class="fa-solid fa-right-from-bracket"></i>

        </button>
      </a>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3 mt-5">
        <h1 class="blue_color pt-5 fw-bold">Friends</h1>
      </div>
    </div>
  </div>
  <script>
    // Retrieve the email from the local storage
    var email = localStorage.getItem("email");
    var password = localStorage.getItem("password");

    var url = "userinfo.php?email=" + encodeURIComponent(email);
    var currentURL = window.location.href;

    // Check if the current URL already contains the email parameter
    if (currentURL.indexOf("email=") === -1) {
      // Redirect to the URL with the email parameter
      window.location.href = url;
    } else {
      console.log("email parameter already exists in the URL. Additional handling may be required.");

    }


    console.log(password);
    // Add an event listener to the logout button
    document.getElementById("btn1").addEventListener("click", function() {
      // Delete the information from local storage
      localStorage.removeItem("password");
      localStorage.removeItem("email");
    });
  </script>



</body>

</html>

<?php

// $conn = new mysqli('localhost', 'root', '', 'facebook1');
// if ($conn->connect_error) {
//   die('Connection failed: ' . $conn->connect_errno);
// } else {

//   $req = "SELECT * FROM friend WHERE email ='$email'";
//   $query = mysqli_query($conn, $req);

//   while ($fetch = mysqli_fetch_object($query)) {
//     echo'  <div class="container ">
//     <div class="row  justify-content-center p-2">
//       <div class="col-auto bg-white shadow rounded d-flex mt-1 gy-2 p-3  ">
//         <img src="images/guser.png" class="w-25 rounded-circle border " alt="">
//         <div class="text  p-3">
//           <h3>' . $fetch->friend_name . '</h3>
//           <h3>' . $fetch->Time . '</h3>
//           <h5 class="text-secondary">Friend</h5>
//         </div>
//       </div>
//     </div>
  
// ';
//   } 
// }
// if (mysqli_num_rows($query) == 0) {
//   echo '<div class="container">
//           <div class="row justify-content-center mt-5">
//               <div class="col-md-6 bg-white shadow  gy-4 rounded">
//                   <h4 class="m-3 text-danger">Friends not found!</h4>
//               </div>
//           </div>
//       </div>';
// }
?>

<?php
$conn = new mysqli('localhost', 'root', '', 'facebook1');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_errno);
} else {
    $req = "SELECT * FROM friend WHERE email ='$email'";
    $query = mysqli_query($conn, $req);

    while ($fetch = mysqli_fetch_object($query)) {
      echo '
    <div class="container">
        <div class="row justify-content-center p-2">
            <div class="col-md-6 bg-white shadow rounded d-flex mt-1 gy-2 p-3">
                <img src="images/' . $fetch->img_source . '" class="w-25 rounded-circle border" alt="Profile Picture">
                <div class="text p-3">
                    <h3>' . $fetch->friend_name . '</h3>
                    <h3>' . $fetch->Time . '</h3>
                    <h5 class="text-secondary">Friend</h5>
                </div>
                <form method="post" action="friends.php">
                    <input type="hidden" name="friend_id" value="' . $fetch->friend_id . '">
                    <button type="submit" class="btn btn-danger ml-3">Delete</button>
                </form>
            </div>
        </div>
    </div>
';
    }  }

    if (mysqli_num_rows($query) == 0) {
        echo '
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-6 bg-white shadow gy-4 rounded">
                    <h4 class="m-3 text-danger">No Friends found!</h4>
                </div>
            </div>
        </div>
        ';
    }


?>


<?php
if (isset($_POST['friend_id'])) {
    $friendId = $_POST['friend_id'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'facebook1');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } else {
        // Delete the friend with the given ID
        $deleteStmt = $conn->prepare('DELETE FROM friend WHERE friend_id = ?');
        $deleteStmt->bind_param('i', $friendId);
        if ($deleteStmt->execute()) {
            echo 'Friend deleted successfully.';
        } else {
            echo 'Error deleting friend: ' . $deleteStmt->error;
        }
        $deleteStmt->close();
    }
}
?>

