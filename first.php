<!-- first.php -->
<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Periksa apakah pengguna sudah memiliki undangan
$sql_check_invitation = "SELECT id FROM invitations WHERE user_id=$user_id";
$result_check_invitation = $conn->query($sql_check_invitation);

if ($result_check_invitation->num_rows > 0) {
    // Jika pengguna sudah memiliki undangan, arahkan ke dashboard.php
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data dari formulir
    $mempelai_pria = $_POST['mempelai_pria'];
    $orangtuapria = $_POST['orangtuapria'];
    $mempelai_wanita = $_POST['mempelai_wanita'];
    $orangtuawanita = $_POST['orangtuawanita'];
    $event_date = $_POST['event_date'];
    $venue = $_POST['venue'];

    // Tangkap data foto mempelai
    $pria_photo = $_FILES['pria_photo']['name'];
    $wanita_photo = $_FILES['wanita_photo']['name'];

    // Direktori penyimpanan foto
    $upload_dir = "uploads/";

    // Memindahkan file foto ke direktori uploads
    move_uploaded_file($_FILES['pria_photo']['tmp_name'], $upload_dir . $pria_photo);
    move_uploaded_file($_FILES['wanita_photo']['tmp_name'], $upload_dir . $wanita_photo);

    // Masukkan data ke dalam tabel invitations
    $sql = "INSERT INTO invitations (user_id, mempelai_pria, orangtuapria, mempelai_wanita, orangtuawanita, event_date, venue, pria_photo, wanita_photo) VALUES ($user_id, '$mempelai_pria', '$orangtuapria', '$mempelai_wanita', '$orangtuawanita', '$event_date', '$venue', '$pria_photo', '$wanita_photo')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Invitation added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Setelah menyimpan undangan, arahkan pengguna ke dashboard.php
    header("Location: dashboard.php");
    exit();

}

$conn->close();
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First Invitation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Fill in Your First Invitation</h1>

    <form action="first.php" method="post" enctype="multipart/form-data">
        <label for="mempelai_pria">Nama Lengkap Mempelai Pria:</label>
        <input type="text" id="mempelai_pria" name="mempelai_pria" placeholder="Nama Pria" required>

        <label for="orangtuapria">Nama Orang Tua Pria:</label>
        <input type="text" id="orangtuapria" name="orangtuapria" placeholder="Bapak Pria &amp; Ibu Pria" required>

        <label for="mempelai_wanita">Nama Lengkap Mempelai Wanita:</label>
        <input type="text" id="mempelai_wanita" name="mempelai_wanita" placeholder="Nama Wanita" required>

        <label for="orangtuawanita">Nama Orang Tua Wanita:</label>
        <input type="text" id="orangtuawanita" name="orangtuawanita" placeholder="Bapak Wanita &amp; Ibu Wanita" required>

        <label for="event_date">Event Date:</label>
        <input type="date" id="event_date" name="event_date" required>

        <label for="venue">Venue:</label>
        <input type="text" id="venue" name="venue" required>

        <label for="pria_photo">Photo Mempelai Pria:</label>
        <input type="file" id="pria_photo" name="pria_photo" accept="image/*" required>

        <label for="wanita_photo">Photo Mempelai Wanita:</label>
        <input type="file" id="wanita_photo" name="wanita_photo" accept="image/*" required>

        <button type="submit">Save Invitation</button>
    </form>
</body>
</html> -->

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
    <div class= ".container bg-auth">        
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

        <div class="box-form-auth box-shadow .container">
            <center>
            <h2>Masuk</h2>
            </center>
            <form method="POST" action="first.php">
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

            <button
                type="submit"
                class="submitBnt btn btn-block btn-primary btn-round mt-4"
            >
                Masuk
            </button>
            </form>
        </div>        
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