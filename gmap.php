<?php
session_start();
include "db_conn.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
$sql = "SELECT * FROM details WHERE username= '$_SESSION[user_name]'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $sql2 = "SELECT * FROM `apply` WHERE name= '$row[name]'";
        $result2 = mysqli_query($conn, $sql2);
        if (mysqli_num_rows($result2) > 0) {
            while ($row1 = mysqli_fetch_assoc($result2)) {
                $AdhiyammanCollege = "Adhiyamman College";
                $Attibele = "Attibele";
                $Bathalapalli = "Bathalapalli";
                $HosurBusStand = "Hosur Bus Stand";
                $Dharga = "Dharga";
                $ESI = "ESI";
                $Mookandapalli = "Mookandapalli";
                $OldBusStand = "Old Bus Stand ";
                $TheChennaiSkills = "The Chennai Skills";
                $Zuzuvadi = "Zuzuvadi";
                if ($row1['fromloc'] === $AdhiyammanCollege && $row1['toloc'] === $HosurBusStand || $row1['fromloc'] === $HosurBusStand && $row1['toloc'] === $AdhiyammanCollege) {
                    $loc = "https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d31131.836337201185!2d77.79991445605467!3d12.747339511101316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x3bae70c830f1125f%3A0x55d856c47cfec47a!2sAdhiyamaan%20College%20of%20Engineering%2C%20Kumudepalli%2C%20Hosur%2C%20Tamil%20Nadu!3m2!1d12.715761599999999!2d77.8693593!4m5!1s0x3bae70c555555555%3A0xd2f28d0a0d398894!2sHosur%20Main%20Bus%20Stand%2C%20PRPH%2B33F%2C%20Hosur%2C%2C%20Avalapalli%20Hudco%2C%20Tamil%20Nadu%20635109!3m2!1d12.7351914!2d77.8276848!5e0!3m2!1sen!2sin!4v1698907120392!5m2!1sen!2sin";
                } elseif ($row1['fromloc'] === $AdhiyammanCollege && $row1['toloc'] === $Attibele || $row1['fromloc'] === $Attibele && $row1['toloc'] === $AdhiyammanCollege) {
                    $loc = "https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d31131.836337201185!2d77.79991445605467!3d12.747339511101316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x3bae70c830f1125f%3A0x55d856c47cfec47a!2sAdhiyamaan%20College%20of%20Engineering%2C%20Kumudepalli%2C%20Hosur%2C%20Tamil%20Nadu!3m2!1d12.715761599999999!2d77.8693593!4m5!1s0x3bae71a1362a11cd%3A0x47e9beba6dae0bae!2sAttibele%2C%20Karnataka!3m2!1d12.778963!2d77.7702029!5e0!3m2!1sen!2sin!4v1698906973886!5m2!1sen!2sin";
                } elseif ($row1['fromloc'] === $AdhiyammanCollege && $row1['toloc'] === $Bathalapalli || $row1['fromloc'] === $Bathalapalli && $row1['toloc'] === $AdhiyammanCollege) {
                    $loc = "https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d31131.836337201185!2d77.79991445605467!3d12.747339511101316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x3bae70c830f1125f%3A0x55d856c47cfec47a!2sAdhiyamaan%20College%20of%20Engineering%2C%20Kumudepalli%2C%20Hosur%2C%20Tamil%20Nadu!3m2!1d12.715761599999999!2d77.8693593!4m5!1s0x3bae7768fd0abc99%3A0x8d795dc47f15aa01!2sBathlapalli%2C%20Tamil%20Nadu!3m2!1d12.722142999999999!2d77.8617399!5e0!3m2!1sen!2sin!4v1698907030704!5m2!1sen!2sin";
                } elseif ($row1['fromloc'] === $AdhiyammanCollege && $row1['toloc'] === $OldBusStand || $row1['fromloc'] === $OldBusStand && $row1['toloc'] === $AdhiyammanCollege) {
                    $loc = "https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d31131.836337201185!2d77.79991445605467!3d12.747339511101316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x3bae70c830f1125f%3A0x55d856c47cfec47a!2sAdhiyamaan%20College%20of%20Engineering%2C%20Kumudepalli%2C%20Hosur%2C%20Tamil%20Nadu!3m2!1d12.715761599999999!2d77.8693593!4m5!1s0x3bae77499aaab781%3A0xdb06c1ac5aae7e2e!2sHosur%20Old%20Bus%20Stand%2C%20Hosur%2C%20Tamil%20Nadu!3m2!1d12.728333!2d77.84316299999999!5e0!3m2!1sen!2sin!4v1698907080019!5m2!1sen!2sin";
                } elseif ($row1['fromloc'] === $AdhiyammanCollege && $row1['toloc'] === $ESI || $row1['fromloc'] === $ESI && $row1['toloc'] === $AdhiyammanCollege) {
                    $loc = "https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d31131.836337201185!2d77.79991445605467!3d12.747339511101316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x3bae70c830f1125f%3A0x55d856c47cfec47a!2sAdhiyamaan%20College%20of%20Engineering%2C%20Kumudepalli%2C%20Hosur%2C%20Tamil%20Nadu!3m2!1d12.715761599999999!2d77.8693593!4m5!1s0x3bae70fc1084ce31%3A0xb7624ccf0ef7ed9e!2sESI%20Ring%20Rd%2C%20Hosur%2C%20Tamil%20Nadu!3m2!1d12.7258318!2d77.8150526!5e0!3m2!1sen!2sin!4v1698907252131!5m2!1sen!2sin";
                } elseif ($row1['fromloc'] === $AdhiyammanCollege && $row1['toloc'] === $Dharga || $row1['fromloc'] === $Dharga && $row1['toloc'] === $AdhiyammanCollege) {
                    $loc = "https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d31131.836337201185!2d77.79991445605467!3d12.747339511101316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x3bae70c830f1125f%3A0x55d856c47cfec47a!2sAdhiyamaan%20College%20of%20Engineering%2C%20Kumudepalli%2C%20Hosur%2C%20Tamil%20Nadu!3m2!1d12.715761599999999!2d77.8693593!4m5!1s0x3bae70e64df4d91b%3A0x56108b0f01027eb5!2sDharga%2C%20Tamil%20Nadu!3m2!1d12.7470695!2d77.8211773!5e0!3m2!1sen!2sin!4v1698907164663!5m2!1sen!2sin";
                } elseif ($row1['fromloc'] === $AdhiyammanCollege && $row1['toloc'] === $Mookandapalli || $row1['fromloc'] === $Mookandapalli && $row1['toloc'] === $AdhiyammanCollege) {
                    $loc = "https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d31133.639032267187!2d77.8173723166993!3d12.73266581436043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x3bae70c830f1125f%3A0x55d856c47cfec47a!2sAdhiyamaan%20College%20of%20Engineering%2C%20Kumudepalli%2C%20Hosur%2C%20Tamil%20Nadu!3m2!1d12.715761599999999!2d77.8693593!4m5!1s0x3bae70e36fe2ce25%3A0xe01089ec95c7f4f3!2sMookandapalli%2C%20Tamil%20Nadu!3m2!1d12.7475607!2d77.8052385!5e0!3m2!1sen!2sin!4v1698912751990!5m2!1sen!2sin";
                } elseif ($row1['fromloc'] === $AdhiyammanCollege && $row1['toloc'] === $TheChennaiSkills || $row1['fromloc'] === $TheChennaiSkills && $row1['toloc'] === $AdhiyammanCollege) {
                    $loc = "https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d31133.639032267187!2d77.8173723166993!3d12.73266581436043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x3bae70c830f1125f%3A0x55d856c47cfec47a!2sAdhiyamaan%20College%20of%20Engineering%2C%20Kumudepalli%2C%20Hosur%2C%20Tamil%20Nadu!3m2!1d12.715761599999999!2d77.8693593!4m5!1s0x3a525d97107c892d%3A0x6253f464fd6a2181!2sThe%20Chennai%20Silks%20-%20Velachery%2C%20Velachery%20-%20Tambaram%20Main%20Road%2C%20near%20Velachery%2C%20Bhuvaneshwari%20Nagar%2C%20Velachery%2C%20Chennai%2C%20Tamil%20Nadu!3m2!1d12.9700379!2d80.21905439999999!5e0!3m2!1sen!2sin!4v1698912828082!5m2!1sen!2sin";
                } elseif ($row1['fromloc'] === $AdhiyammanCollege && $row1['toloc'] === $Zuzuvadi || $row1['fromloc'] === $Zuzuvadi && $row1['toloc'] === $AdhiyammanCollege) {
                    $loc = "https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d31133.639032267187!2d77.8173723166993!3d12.73266581436043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x3bae70c830f1125f%3A0x55d856c47cfec47a!2sAdhiyamaan%20College%20of%20Engineering%2C%20Kumudepalli%2C%20Hosur%2C%20Tamil%20Nadu!3m2!1d12.715761599999999!2d77.8693593!4m5!1s0x3bae710aa227ffbb%3A0xa61ee29f4cce292c!2sZuzuvadi%2C%20Tamil%20Nadu!3m2!1d12.768731299999999!2d77.7923735!5e0!3m2!1sen!2sin!4v1698912875342!5m2!1sen!2sin";
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Location</title>
    <link rel="stylesheet" type="text/css" href="buttonstyle.css">
</head>

<body>
    <center>
        <h1>Location</h1>
    </center>
    <center>
        <p> <iframe alt="Weather Image" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="<?php echo $loc; ?>"></iframe></p>
    </center>
    <center> <button class="subscribe" onclick="window.location.href='home.php';">HOME</button></center>
</body>

</html>