<?php
session_start(); // Start the session (assuming you've implemented login)

// Check if the user is logged in; if not, redirect to the login page
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.html"); // Redirect to the login page
    exit;
}

include 'db.php';

// $user_id = $_SESSION['user_id'];
// $sql = "SELECT * FROM invitations WHERE user_id=$user_id";
// $result = $conn->query($sql);

// // Periksa apakah pengguna memiliki undangan
// if ($result->num_rows > 0) {
//   // Jika pengguna memiliki undangan, tampilkan informasi undangan

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wedding Dashboard</title>
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

    <!--- Boostrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>

    <!--JQUERRY-->
    <script src="landing/js/jquerry.js"></script>
    <script src="dashboard.js"></script>
  </head>
  <body>
    <!-- CONTENT -->
    <div id="dashboard" class="d-flex bg-auth">
      <div
        class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary"
        style="width: 180px; height: 100vh"
      >
        <hr />
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a
              href="/"
              class="nav-link link-body-emphasis active"
              data-section="home"
            >
              Home
            </a>
          </li>
          <li>
            <a
              href="/"
              class="nav-link link-body-emphasis"
              data-section="invitation"
            >
              Invitation
            </a>
          </li>
          <li>
            <a
              href="/"
              class="nav-link link-body-emphasis"
              data-section="guest"
            >
              Guest
            </a>
          </li>
          <li>
            <a
              href="/"
              class="nav-link link-body-emphasis"
              data-section="product"
            >
              Product
            </a>
          </li>
          <li>
            <a
              href="/"
              class="nav-link link-body-emphasis"
              data-section="account"
            >
              Account
            </a>
          </li>
        </ul>
        <hr />
        <center>
          <div>
            <a href="logout.php" class="btn btn-danger">Logout</a>
          </div>
        </center>
      </div>
      <!-- Display content based on the selected section -->
      <div id="dashboard-content" class="flex-grow-1">
        <!-- Content will be dynamically loaded here -->
      </div>
    </div>

    <!-- Add Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.4/umd/popper.min.js"></script>
  </body>
</html>

<?php
// } else {
//     // Jika pengguna belum memiliki undangan, arahkan ke first.php
//     header("Location: first.php");
//     exit();
// }

// $conn->close();
?>