<?php
$email = $_GET['email'];

?>
<?php
// $password = $_GET['password'];
// $conn = new mysqli('localhost', 'root', '', 'facebook');
// if ($conn->connect_error) {
//   die('Connection failed: ' . $conn->connect_errno);
// } else {

//   $req = "SELECT * FROM Post WHERE password ='$password'";
//   $query = mysqli_query($conn, $req);

//   if ($fetch = mysqli_fetch_object($query)) {
//     echo '      <div class="container p-3">
//         <div class="row justify-content-center">
//           <div class="col-12 col-md-6 p-5 bg-white shadow gy-4 rounded" >
//             <h4 id="scrollspyHeading1">'.$fetch->Title.'</h4>
//             <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe,
//                minima accusantium nobis officiis corrupti distinctio perferendis doloribus modi molestiae velit corporis adipisci voluptatum consequatur harum autem 
//                delectus. Ea, corporis nemo?</p>
//                <div class="icon blue_color d-flex justify-content-around f-2 m-2">
//                <i class="fa-regular fa-heart fa-lg p-1"><span>'.$fetch->Likes.'</span></i> 
//                <!-- <i class="fa-solid fa-heart fa-lg"></i> -->
//                <i class="fa-regular fa-comment fa-lg"></i>
//                <i class="fa-regular fa-share-from-square fa-lg"></i>
               
//               </div>
//               <span class="text-secondary pb-5">'.$fetch->DateOfCreation.'</span>


              
//           </div>
//           </div>
//           </div>
//           ';
//   } else {
//     echo '<div class="container">
//             <div class="row justify-content-center mt-5">
//                 <div class="col-md-6 bg-white shadow  gy-4 rounded">
//                     <h4 class="m-3 text-danger">User not found!</h4>
//                 </div>
//             </div>
//         </div>';
//   }
// }
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
  <title>User Info</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top p-1 ">
    <a class="navbar-brand blue_color fw-bold " style=" margin-left:70px; font-size:25px;" href="#">
      <!-- <img src="Facebook.png" class="" style="width: 150px; padding-left:30px;" alt=""> -->

      User Info
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
          <a class="nav-link" href="userinfo.php">User Info <span class="sr-only">(current)</span></a>
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
        <h1 class="blue_color pt-5 fw-bold">User Info</h1>
      </div>
    </div>
  </div>

  <script>
    // Retrieve the password from the local storage

    var email = localStorage.getItem("email");
var password = localStorage.getItem("password");

var url = "userinfo.php?email=" + encodeURIComponent(email);
var currentURL = window.location.href;

// Check if the current URL already contains the password parameter
if (currentURL.indexOf("email=") === -1) {
  // Redirect to the URL with the password parameter
  window.location.href = url;
} else {
  console.log("Email parameter already exists in the URL. Additional handling may be required.");
 
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
$conn = new mysqli('localhost', 'root', '', 'facebook1');
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_errno);
} else {
  $req = "SELECT * FROM users WHERE email = '$email'";
  $query = mysqli_query($conn, $req);

  if ($fetch = mysqli_fetch_object($query)) {
    echo '
    <div class="container">
      <div class="row justify-content-center mt-1">
        <div class="col-6 bg-white shadow gy-4 rounded">
          <div class="img text-center pt-2">
            <img src="';

    // Condition to display different photos based on gender
    if ($fetch->gender == 'f') {
      echo 'images/guser.png';
    } else {
      echo 'images/vector-users-icon.jpg';
    }

    echo '" class="shadow w-25 rounded img-thumbnail" alt="">
            <h4 class="m-3 text-secondary">About</h4>
            
            <p>' . $fetch->about . '</p>
          </div>
          <h4 class="m-3">First Name: ' . $fetch->fname . '</h4>
          <hr>
          <h4 class="m-3">Last Name: ' . $fetch->sname . '</h4>
          <hr>
          <h4 class="m-3">Birth of Date: ' . $fetch->day . '/' . $fetch->month . '/' . $fetch->year . '</h4>
          <hr>
          <h4 class="m-3">Phone Number: ' . $fetch->mobile . '</h4>
        </div>
      </div>
    </div>';
  } else {
    echo '
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-md-6 bg-white shadow gy-4 rounded">
          <h4 class="m-3 text-danger">User not found!</h4>
        </div>
      </div>
    </div>';
  }
}
?>
