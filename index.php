<?php
include_once("loginregister/db.php");
// include("loginregister/auth_session.php");

?>
<?php
require 'connection.php';

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $serial = $_POST["serial"];
    $travel_doc = $_POST["travel_doc"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $yell_fev_vacc_no = $_POST["yell_fev_vacc_no"];
    $yellfev_vacc_date = $_POST["yellfev_vacc_date"];
    $evd_vaccin = $_POST["evd_vaccin"];
    $dateofevd_vaccin = $_POST["dateofevd_vaccin"];
    $gender = $_POST["gender"];

    // $languages = $_POST["languages"];
    // $language = "";
    // foreach ($languages as $row) {
    //     $language .= $row . ",";
    // }

    $query = "INSERT INTO tb_data VALUES('', '$name', '$serial', '$travel_doc', '$dob', '$email', '$number', '$yell_fev_vacc_no', '$yellfev_vacc_date', '$evd_vaccin', '$dateofevd_vaccin', '$gender')";
    mysqli_query($conn, $query);
    echo
    "
    <script> alert ('Data Inserted Successfully'); </script>
    ";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ministry of Health and Sanitation</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section id="section-wrapper">
        <div class="box-wrapper">
            <div class="info-wrap">
                <h6 style="font-size: 20px; text-align: center;" class="info-title">Ministry of Health and Sanitation</h6><br>
                <h4 style="text-align: center;">Sierra Leone Portal Health Pillar</h4><br>
                <img src="./img/sl.png" alt="" style="width:100px; height:80px; margin-left:120px;"><br><br>
                <p>Full Name: <?php echo $name ?></p><br>
                <p>Serial: <?php echo $serial ?></p><br>
                <p>Travel Document: <?php echo $travel_doc ?></p><br>
                <p>Date of Birth: <?php echo $dob ?></p><br>
                <p>Email: <?php echo $email ?></p><br>
                <p>Number: <?php echo $number ?></p><br>
                <p>Yellow Fever Vaccine No.: <?php echo $yell_fev_vacc_no ?></p><br>
                <p>Yellow Fever Vaccine Date: <?php echo $yellfev_vacc_date ?></p><br>
                <p>EVD Vaccination: <?php echo $evd_vaccin ?></p><br>
                <p>Date of EVD Vaccin: <?php echo $dateofevd_vaccin ?></p><br>
                <p>Gender: <?php echo $gender ?></p><br><br>


            </div>
            <div class="form-wrap">
                <form action="#" method="POST">

                    <!-- <h2 class="form-title">Send us a message</h2> -->
                    <div class="form-fields">
                        <div class="form-group">
                            <input name="name" type="text" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <input name="serial" type="text" placeholder="Serial Number">
                        </div>
                        <div class="form-group">
                            <input type="text" name="travel_doc" placeholder="Passport / Travel Document">
                        </div>
                        <div class="form-group">
                            <input name="dob" type="text" placeholder="Date of Birth">
                        </div>
                        <div class="form-group">
                            <input name="email" type="text" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input name="number" type="text" placeholder="Mobile Number">
                        </div>
                        <div class="form-group">
                            <input name="yell_fev_vacc_no" type="text" placeholder="Yellow fever Batch No">
                        </div>
                        <div class="form-group">
                            <input name="yellfev_vacc_date" type="text" placeholder="Date of Vaccination">
                        </div>
                        <div class="form-group">
                            <input name="evd_vaccin" type="text" placeholder="Evd Vaccination">
                        </div>
                        <div class="form-group">
                            <input name="dateofevd_vaccin" type="text" placeholder="Date of EVD Vaccination">
                        </div>


                    </div>
                    <label for="" style="margin-left: 20px;">Gender</label><br><br>
                    <input style="margin-left: 20px;" type="radio" name="gender" value="Male" required> Male
                    <input type="radio" name="gender" value="Female"> Female <br><br>
                    <input class="submit-button" type="submit" name="submit"><br><br>
                    <a href="download.php?file=<?php echo $filename; ?>.png ">Download</a>
                </form>
                <?php
                include "phpqrcode/qrlib.php";
                $PNG_TEMP_DIR = 'temp/';
                if (!file_exists($PNG_TEMP_DIR))
                    mkdir($PNG_TEMP_DIR);

                $filename = $PNG_TEMP_DIR . 'test.png';

                if (isset($_POST["submit"])) {
                    $codeString = $_POST["name"] . "\n";
                    $codeString = $_POST["serial"] . "\n";
                    $codeString = $_POST["travel_doc"] . "\n";
                    $codeString = $_POST["dob"] . "\n";
                    $codeString = $_POST["email"] . "\n";
                    $codeString = $_POST["number"] . "\n";
                    $codeString = $_POST["yell_fev_vacc_no"] . "\n";
                    $codeString = $_POST["yellfev_vacc_date"] . "\n";
                    $codeString = $_POST["evd_vaccin"] . "\n";
                    $codeString = $_POST["dateofevd_vaccin"] . "\n";
                    $codeString = $_POST["gender"] . "\n";

                    $filename = $PNG_TEMP_DIR . 'test' .
                        md5($codeString) . '.png';

                    QRcode::png($codeString, $filename);

                    echo '<img src="' . $PNG_TEMP_DIR .
                        basename($filename) . '" /><hr/>';
                    // echo '<a href="download.php?file=">download QR Code</a>';
                }
                ?>
            </div>
        </div>
    </section>

    <script src="main.js"></script>
</body>

</html>