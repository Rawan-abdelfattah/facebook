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
  <title>Chat</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top  p-1  ">
    <a class="navbar-brand blue_color fw-bold" style="margin-left:70px; font-size:25px;" href="#">
      <!-- <img src="Facebook.png" class="" style="width: 150px; padding-left:30px;" alt=""> -->

      Chat
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item active">
          <a class="nav-link" href="successlogin.php?email=<?php echo $email; ?>">Home <span
              class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="userinfo.php?email=<?php echo $email; ?>">User Info <span
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
        <button class='btn login_btn text-white ' id='btn1'>log Out
          <i class="fa-solid fa-right-from-bracket"></i>

        </button>
      </a>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3 mt-5">
        <h1 class="blue_color pt-5 fw-bold">Chat</h1>
        <div id="chat-messages" class="my-4"></div>
        <form id="chat-form" method="post" action="chat.php">
          <div class="input-group">
            <input type="text" class="form-control" id="message-input" placeholder="Type a message" name="message">
            <button type="submit" class="btn btn-primary">Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    // Retrieve the password from the local storage

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
    document.getElementById("btn1").addEventListener("click", function () {
      // Delete the information from local storage
      localStorage.removeItem("password");
      localStorage.removeItem("email");
    });


    $(document).ready(function () {
      // Load initial messages
      loadMessages();

      // Submit the chat form
      $('#chat-form').submit(function (e) {
        e.preventDefault();
        var message = $('#message-input').val();

        if (message !== '') {
          $.post('send_message.php', {
            message: message
          }, function (data) {
            // Clear the input field
            $('#message-input').val('');

            // Load updated messages
            loadMessages();
          });
        }
      });

      // Load messages from the server
      function loadMessages() {
        $.get('get_messages.php', function (data) {
          $('#chat-messages').html(data);
        });
      }

      // Poll for new messages every 3 seconds
      setInterval(loadMessages, 3000);
    });
  </script>



</body>

</html>
<?php
if (isset($_POST['message'])) {
  $message = $_POST['message'];

  // database connection
  $conn = new mysqli('localhost', 'root', '', 'facebook1');
  if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_errno);
  } else {
    // Insert the message into the database
    $query = "INSERT INTO messages (message) VALUES ('$message')";
    $conn->query($query);

    // Retrieve all messages from the database
    $query = "SELECT * FROM messages";
    $result = $conn->query($query);

    // Generate HTML for all messages
    $html = '';
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $message = $row['message'];
        $html .= '<p>' . $message . '</p>';
      }
    } else {
      $html = '<p>No messages yet.</p>';
    }

    // Send the generated HTML as the response
    echo $html;
  }
}

?>