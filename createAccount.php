    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/all.min.css">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">
        <title>Create Account</title>
    </head>

    <body>
        <div class="container ">
            <div class="row ">
                <div class="col-6  m-auto mt-5 p-3 bg-white shadow">
                    <div>
                        <h1>Sign Up</h1>
                        <h6 class="text-secondary">It's quick and easy.</h6>
                        <hr />
                    </div>
                    <form action="createAccount.php" class="" method="post" autocomplete='off'>
                        <div class="row">
                            <div class="alert alert-danger mt-3 " role="alert" id='alert' style="display:none;">
                            </div>
                            <div class="alert alert-success mt-3 " role="alert" id='alertSuccess' style="display:none;">
                            </div>
                            <div class="col col-md-6">
                                <input type="text" placeholder="First name" class="form-control m-2" id="fname" name="fname" required />
                            </div>
                            <div class="col col-md-6">
                                <input type="text" name="sname" placeholder="Surname" class="form-control m-2" id="sname" required />
                            </div>
                        </div>
                        <input type="email" placeholder="Email address" class="form-control m-2" id="email" name="email" required />
                        <input type="text" placeholder="Mobile number" class="form-control m-2" id="mobile" name="mobile" required />
                        <input type="password" placeholder="Password" class="form-control m-2 " id="password" name="password" minlength="10" required />
                        <input type="password" placeholder="Confirm password" class="form-control m-2 " id="confirmpassword" name="confirmpassword" minlength="10" required />
                        <div class="row m-1">
                            <label for="" class="text-secondary m-2">
                                Date of birth
                            </label>

                            <div class="col-4">
                                <select class="form-control " id="" name='day' required>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                    <option>13</option>
                                    <option>14</option>
                                    <option>15</option>
                                    <option>16</option>
                                    <option>17</option>
                                    <option>18</option>
                                    <option>19</option>
                                    <option>20</option>
                                    <option>21</option>
                                    <option>22</option>
                                    <option>23</option>
                                    <option>24</option>
                                    <option>25</option>
                                    <option>26</option>
                                    <option>27</option>
                                    <option>28</option>
                                    <option>29</option>
                                    <option>30</option>
                                    <option>31</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <select class="form-control" id="" name="month" required>
                                    <option>Jan</option>
                                    <option>Feb</option>
                                    <option>Mar</option>
                                    <option>Apr</option>
                                    <option>May</option>
                                    <option>Jun</option>
                                    <option>Jul</option>
                                    <option>Aug</option>
                                    <option>Sep</option>
                                    <option>Oct</option>
                                    <option>Nov</option>
                                    <option>Dec</option>
                                </select>
                            </div>
                            <div class="col-4 ">
                                <select class="form-control" id="" name="year" required>
                                    <option>2002</option>
                                    <option>2003</option>
                                    <option>2004</option>
                                    <option>2005</option>
                                    <option>2006</option>
                                    <option>2007</option>
                                    <option>2008</option>
                                    <option>2009</option>
                                    <option>2010</option>
                                    <option>2011</option>
                                    <option>2012</option>
                                    <option>2013</option>
                                    <option>2014</option>
                                    <option>2015</option>
                                </select>
                            </div>
                        </div>

                        <div class="row m-1">
                            <label for="" class="text-secondary m-2">
                                Gender
                            </label>
                            <div class="col-4">
                                <div>
                                    <label class="form-check-label m-1  form-control" htmlFor="exampleRadios2">
                                        female
                                        <input class="form-check-input m-1" type="radio" id="exampleRadios2" defaultValue="f" defaultChecked value="f" name="gender" required />
                                    </label>


                                </div>
                            </div>
                            <div class="col-4">
                                <div>
                                    <label class="form-check-label m-1  form-control" htmlFor="exampleRadios1">
                                        male
                                        <input class="form-check-input m-1" type="radio" id="exampleRadios1" defaultValue="m" name="gender" value="m" required />
                                    </label>

                                </div>
                            </div>
                            <div class="col-4">
                                <div>


                                </div>
                            </div>
                        </div>

                        <p class="text-secondary m-2 small ">
                            People who use our service may have uploaded your contact
                            information to Facebook. Learn more. By clicking Sign Up, you
                            agree to our Terms, Privacy Policy and Cookies Policy. You may
                            receive SMS notifications from us and can opt out at any time.
                        </p>
                        <div class="text-center"> <label class="form-conrtrol m-2 fw-bold fs-4" for="">about</label>
                        </div>

                        <textarea placeholder="About" class="form-control m-2" id="about" name="about" minlength="10" required>
                </textarea>


                        <a href="/regestration">
                            <button class="btn text-white create_btn mt-4  form-control" type="submit" name="submit">
                                Sign Up
                            </button>
                        </a>
                    </form>

                    <a href="index.php">
                        <button class='btn login_btn text-white mt-3 '>log In</button>
                    </a>


                </div>
            </div>
        </div>

        <script src="./js/bootstrap.bundle.min.js"></script>
        <script src="./js/jquery-3.6.4.min.js"></script>
        <script src="./js/main.js"></script>

    </body>

    </html>
    <?php
    // require 'config.php';

    if (
        isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmpassword'])
        && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['day']) && isset($_POST['month'])
        && isset($_POST['year']) && isset($_POST['gender']) && isset($_POST['about'])
    ) {
        $fname = $_POST['fname'];
        $surname = $_POST['sname'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $day = $_POST['day'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        $gender = $_POST['gender'];
        $about = $_POST['about'];
        $conn = new mysqli('localhost', 'root', '', 'facebook1');
        if ($conn->connect_error) {
            die('connection failed : ' + $conn->connect_errno);
        } else {
            // Fix the SQL query syntax and parameterize the values to prevent SQL injection
            // email = '$fname' OR
            $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
            $duplicate2 = mysqli_query($conn, "SELECT * FROM login WHERE email = '$email'");

            if (mysqli_num_rows($duplicate) > 0 || mysqli_num_rows($duplicate2) > 0) {
                echo '<script>
                        document.getElementById("alert").style.display = "block";
                        document.getElementById("alert").innerHTML = "Email has already been taken.";
                    </script>';
            } else {
                if ($password == $confirmpassword) {
                    $query = "INSERT INTO users (fname, sname, email, password, day, month, year, gender, mobile,about) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
                    $stmt = mysqli_prepare($conn, $query);
                    mysqli_stmt_bind_param($stmt, 'ssssssssss', $fname, $surname, $email, $password, $day, $month, $year, $gender, $mobile, $about);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);
                    // $conn->close();

                    $query2 = "INSERT INTO login (email, password) VALUES (?, ?)";
                    $stmt2 = mysqli_prepare($conn, $query2);
                    mysqli_stmt_bind_param($stmt2, 'ss', $email, $password);
                    mysqli_stmt_execute($stmt2);
                    mysqli_stmt_close($stmt2);
                    $conn->close();


                    echo '<script>
                        document.getElementById("alertSuccess").style.display = "block";
                        document.getElementById("alertSuccess").innerHTML = "You created a new account.";
                    </script>';
                    // echo '<script>     window.location.href = "successlogin.php" </script>   ';


                    // Corrected the 'alter' typo to 'alert'
                } else {
                    echo '<script>
                        document.getElementById("alert").innerHTML = "Password does not match.";
                        document.getElementById("alert").style.display = "block";
                    </script>';
                    // Corrected the 'alter' typo to 'alert'
                }
            }
        }
    }
    ?>
