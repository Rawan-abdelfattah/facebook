  <?php
  $email = $_GET['email'];
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/all.min.css" />
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <title>Posts</title>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light  p-1  ">
      <a class="navbar-brand blue_color fw-bold" style="margin-left:70px; font-size:25px;" href="#">
        <!-- <img src="Facebook.png" class="" style="width: 150px; padding-left:30px;" alt=""> -->

        Posts 
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item active">
            <a class="nav-link" href="successlogin.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="userInfo.php?email=<?php echo $email; ?>">User Info <span
                class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="postspage.php?email=<?php echo $email; ?>">Posts page <span
                class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="friends.php?email=<?php echo $email; ?>">Friends <span
                class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="chat.php?email=<?php echo $email; ?>">Chat <span
                class="sr-only">(current)</span></a>
          </li>
        </ul>
        <a href="index.php" style="padding-right:30px;">
          <button class='btn login_btn text-white' id="btn1">log Out
            <i class="fa-solid fa-right-from-bracket"></i>

          </button>
        </a>
      </div>
    </nav>

    <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3 mt-1">
        <h1 class="blue_color pt-5 fw-bold">Posts</h1>
      </div>
    </div>
  </div>
     

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-6">
        <form method="post" action="postspage.php" class="bg-white shadow p-4 rounded">


        <div class="form-group">
            <label for="name">Post title:</label>
            <input type="text" id="name" name="name" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="post_content">Post Content:</label>
            <textarea id="post_content" name="post_content" rows="5" class="form-control" required></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
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

      console.log(email);
      // Add an event listener to the logout button
      document.getElementById("btn1").addEventListener("click", function () {
        // Delete the information from local storage
        localStorage.removeItem("password");
        localStorage.removeItem("email");
      });
    </script>



  </body>

  </html>
  <!-- isset($_POST['email']) &&  -->
  <?php
if (isset($_POST['name']) && isset($_POST['email']) &&isset($_POST['post_content'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $post_content = $_POST['post_content'];
    
    $conn = new mysqli('localhost', 'root', '', 'facebook1');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } else {
        $query = "INSERT INTO Post (name, email, CreatedBy, date, page_id, total_like, post_content) VALUES ('$name', '$email', 0, CURRENT_TIMESTAMP(6), 0, 0, '$post_content')";
        
        if (mysqli_query($conn, $query)) {
            echo "Post created successfully.";
        } else {
            echo "Error creating post: " . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
}
?>

<?php
// $conn = new mysqli('localhost', 'root', '', 'facebook1');
// if ($conn->connect_error) {
//   die('Connection failed: ' . $conn->connect_errno);
// } else {

//   $req = "SELECT * FROM Post WHERE email ='$email'";
//   $query = mysqli_query($conn, $req);

//   while ($fetch = mysqli_fetch_object($query)) {
//     echo '<div class="container">
//             <div class="row justify-content-center">
//               <div class="col-12 col-md-6 p-5 bg-white shadow gy-4 rounded">
//                 <h4 id="scrollspyHeading1">' . $fetch->name . '</h4>
//                 <p>' . $fetch->post_content . '</p>
//                 <div class="icon blue_color d-flex justify-content-around f-2 m-2">
//                   <i class="fa-regular fa-heart fa-lg p-1"><span>' . $fetch->total_like . '</span></i>
//                   <!-- <i class="fa-solid fa-heart fa-lg"></i> -->
//                   <i class="fa-regular fa-comment fa-lg"></i>
//                   <i class="fa-regular fa-share-from-square fa-lg"></i>
//                 </div>
//                 <span class="text-secondary pb-5">' . $fetch->date . '</span>
//                 <span class="text-secondary pb-5">' . $fetch->CreatedBy . '</span>
//               </div>
//             </div>
//           </div>';
//   }
// }
// if ($fetch = mysqli_fetch_object($query)){
//       echo '<div class="container">
//               <div class="row justify-content-center mt-5">
//                   <div class="col-md-6 bg-white shadow  gy-4 rounded">
//                       <h4 class="m-3 text-danger">Posts not found!</h4>
//                   </div>
//               </div>
//           </div>';
//     }
?>


<?php
$conn = new mysqli('localhost', 'root', '', 'facebook1');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    $req = "SELECT * FROM Post WHERE email ='$email'";
    $query = mysqli_query($conn, $req);

    while ($fetch = mysqli_fetch_object($query)) {
        echo '<div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 p-5 bg-white shadow gy-4 rounded">
                        <h4 id="scrollspyHeading1">' . $fetch->name . '</h4>
                        <p>' . $fetch->post_content . '</p>
                        <div class="icon blue_color d-flex justify-content-around f-2 m-2">
                            <i class="fa-regular fa-heart fa-lg p-3"><span>' . $fetch->total_like . '</span></i>
                            <i class="fa-regular fa-comment fa-lg  p-3"></i>
                            <i class="fa-regular fa-share-from-square fa-lg  p-3"></i>
                            <form action="postspage.php" method="post" class="d-inline">
                                <input type="hidden" name="post_id" value="' . $fetch->page_id . '">
                                <button type="submit" class="btn btn-link text-danger p-0">
                                    <i class="fa-regular  fa-trash-alt fa-xl "></i>
                                </button>
                            </form>
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

<?php
if (isset($_POST['post_id'])) {
    $postId = $_POST['post_id'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'facebook1');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } else {
        // Delete the post with the given ID
        $deleteStmt = $conn->prepare('DELETE FROM Post WHERE page_id = ?');
        $deleteStmt->bind_param('i', $postId);
        $deleteStmt->execute();
        $deleteStmt->close();

        // Redirect back to the page displaying the posts
        header('postspage.php');
        exit();
    }
}
?>


