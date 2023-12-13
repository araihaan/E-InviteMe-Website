<?php
session_start(); // Start a PHP session
// Connect to the database (similar to your initial code)
$databaseHost = 'localhost';
$databaseName = 'e_inviteme';
$databaseUsername = 'root';
$databasePassword = '';

$conn = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // You should perform validation and sanitation on user input here

    // Query to fetch the hashed password from the database
    $sql = "SELECT id, password FROM users WHERE email = '$email'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $hashedPassword = $row['password'];

        // Verify the hashed password
        if (password_verify($password, $hashedPassword)) {
            // Login successful
            $_SESSION['logged_in'] = true; // Store a flag indicating the user is logged in
            header("Location: dashboard.php"); // Redirect to the dashboard
            exit;
        } else {
            header("Location: login.php"); // Redirect to the login page
            exit;
        }
    } else {
        header("Location: login.php"); // Redirect to the login page
        exit;
    }
}

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: dashboard.php");
    exit;
}


$conn->close();
?>

<!-- HTML -->
<!DOCTYPE html>
<html>
  <head>
    <title>Login E-InviteMe</title>
    <!-- css -->
    <link
      href="landing/css/bootstrap.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="landing/css/materialdesignicons.min.css"
      rel="stylesheet"
      type="text/css"
    />

    <!-- magnific pop-up -->
    <link
      rel="stylesheet"
      type="text/css"
      href="landing/css/magnific-popup.css"
    />

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="landing/css/swiper.min.css" />

    <!--Slider-->
    <link
      rel="stylesheet"
      type="text/css"
      href="landing/css/owl.carousel.css"
    />
    <link rel="stylesheet" type="text/css" href="landing/css/owl.theme.css" />
    <link
      rel="stylesheet"
      type="text/css"
      href="landing/css/owl.transitions.css"
    />
    <link href="landing/css/style.css" rel="stylesheet" type="text/css" />

    <link
      rel="stylesheet"
      href="plugins/floating-whatsapp/floating-wpp.min.css"
    />

    <!-- Material Icon -->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />

    <!--- FONT-ICONS CSS -->
    <link href="css/icons.css" rel="stylesheet" />

    <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    <!-- CONTENT -->
    <div class=".container bg-auth">
      <div class="cont-flex-auth">
        <center>
          <a href="index.html"
            ><img
              src="images/einviteme.png"
              class="logo-dark"
              alt=""
              height="100"
              style="margin-bottom: 30px; margin-top: 20px"
          /></a>
        </center>

        <div class="box-form-auth box-shadow">
          <center>
            <h2>Masuk</h2>
          </center>
          <form method="POST" action="login.php">
            <!-- email -->
            <div class="form-group mt-2">
              <label for="email">Email</label>
              <input
                name="email"
                id="email"
                class="form-control"
                placeholder="pasangan@gmail.com"
                type="email"
                required
                autofocus
              />
            </div>

            <!-- password -->
            <div class="form-group mt-2">
              <label for="password">Password</label>
              <input
                name="password"
                id="password"
                class="form-control"
                placeholder="********"
                type="password"
                required
              />
            </div>

            <!-- remember -->
            <div class="form-group mt-2">
              <div class="row justify-content-between px-3">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    name="remember"
                    id="remember"
                  />

                  <label class="form-check-label" for="remember">
                    Ingat Saya
                  </label>
                </div>

                <div class="form-check">
                  <a href="passwordreset.html">Lupa Password?</a>
                </div>
              </div>
            </div>

            <button
              type="submit"
              class="submitBnt btn btn-block btn-primary btn-round mt-4"
            >
              Masuk
            </button>
          </form>
        </div>

        <p class="txt-daftar">
          Belum Punya Akun ? <a href="register.html"> Daftar Sekarang</a>
        </p>
      </div>
      <p class="footer-auth">Undangan Pernikahan Online - E-InviteMe © 2023</p>
    </div>

    <!-- END CONTENT -->
    <!-- javascript -->
    <script src="landing/js/jquery.min.js"></script>
    <script src="landing/js/bootstrap.bundle.min.js"></script>
    <script src="landing/js/jquery.easing.min.js"></script>
    <script src="landing/js/scrollspy.min.js"></script>
    <!-- olw- carousel -->
    <script src="landing/js/owl.carousel.min.js"></script>
    <!-- Magnific Popup -->
    <script src="landing/js/jquery.magnific-popup.min.js"></script>
    <!-- swipper js -->
    <script src="landing/js/swiper.min.js"></script>
    <script src="landing/js/jquery.mb.YTPlayer.js"></script>
    <!--flex slider plugin-->
    <script src="landing/js/jquery.flexslider-min.js"></script>
    <!-- contact init -->
    <script src="landing/js/contact.init.js"></script>
    <script src="../unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>
    <script src="landing/js/app.js"></script>
  </body>
</html>
