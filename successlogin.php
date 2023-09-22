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
  <title>Home page</title>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light p-1 ">
    <a class="navbar-brand" href="#">
      <img src="images/Facebook.png" class="" style="width: 150px; margin-left:50px;" alt="">
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


    console.log(email);
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
//   $req = "SELECT * FROM users WHERE email = '$email'";
//   $query = mysqli_query($conn, $req);

//   if ($fetch = mysqli_fetch_object($query)) {
//     echo '
//     <div class="container">
//       <div class="row justify-content-center mt-5">
//         <div class="col-6 bg-white shadow gy-4 rounded text-center">
//           <img src="images/guser.png" class="w-25 rounded-circle border my-3" alt="">
//           <div class="text p-2">
//             <h5 class="text-secondary">User</h5>
//             <h3>' . $fetch->fname . '</h3>
//           </div>
//         </div>
//       </div>
//     </div>';
//   } else {
//     echo '
//     <div class="container">
//       <div class="row justify-content-center mt-5">
//         <div class="col-md-6 bg-white shadow gy-4 rounded text-center">
//           <h4 class="my-3 text-danger">User not found!</h4>
//         </div>
//       </div>
//     </div>';
//   }
// }
?>
<?php
$conn = new mysqli('localhost', 'root', '', 'facebook1');
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_errno);
} else {
  $req = "SELECT * FROM users WHERE email = '$email'";
  $query = mysqli_query($conn, $req);

  if ($fetch = mysqli_fetch_object($query)) {
    echo '
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-6 bg-white shadow gy-4 rounded text-center">
          <img src="';

    // Condition to display different photos based on gender
    if ($fetch->gender == 'f') {
      echo 'images/guser.png';
    } else {
      echo 'images/vector-users-icon.jpg';
    }

    echo '" class="w-25 rounded-circle border my-3" alt="">
          <div class="text p-2">
            <h5 class="text-secondary">User</h5>
            <h3>' . $fetch->fname . '</h3>
          </div>
        </div>
      </div>
    </div>';
  } else {
    echo '
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-md-6 bg-white shadow gy-4 rounded text-center">
          <h4 class="my-3 text-danger">User not found!</h4>
        </div>
      </div>
    </div>';
  }
}
?>


<?php
$conn = new mysqli('localhost', 'root', '', 'facebook1');
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_errno);
} else {
  $req = "SELECT * FROM Post WHERE email = '$email'";
  $query = mysqli_query($conn, $req);
  while ($fetch = mysqli_fetch_object($query)) {

    echo '
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-8 m-3 p-5 bg-white shadow gy-4 rounded">
          <h4 id="scrollspyHeading1">' . $fetch->name . '</h4>
          <p>'. $fetch->post_content . '</p>
          <div class="icon blue_color d-flex justify-content-around f-2 m-2">
            <i class="fa-regular fa-heart fa-lg p-1"><span>' . $fetch->total_like . '</span></i> 
            <i class="fa-regular fa-comment fa-lg"></i>
            <i class="fa-regular fa-share-from-square fa-lg"></i>
          </div>
          <span class="text-secondary pb-5">' . $fetch->date . '</span>
          <span class="text-secondary pb-5">' . $fetch->CreatedBy . '</span>
        </div>
      </div>
    </div>';
  }  
}
if (mysqli_num_rows($query) == 0) {
    echo '<div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-6 bg-white shadow  gy-4 rounded">
                    <h4 class="m-3 text-danger">Posts not found!</h4>
                </div>
            </div>
        </div>';
}
?>