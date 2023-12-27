<?php
session_start();
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> Pass</title>
    <link rel="stylesheet" type="text/css" href="passstyle.css">
    <script></script>
</head>


<body></br></br></br></br>
    <form id="myForm" action="home.php" enctype="multipart/form-data">
        <div class="container">
            <?php error_reporting(E_ALL);
            ini_set('display_errors', '1');
            $sql = "SELECT * FROM details WHERE username= '$_SESSION[user_name]'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $sql2 = "SELECT * FROM `apply` WHERE name= '$row[name]'";
                    $result2 = mysqli_query($conn, $sql2);
                    if (mysqli_num_rows($result2) > 0) {
                        while ($row1 = mysqli_fetch_assoc($result2)) { ?>

                            <center>
                                <h3><img src="2jdr.jpg" class="img" alt="description" align="left"><br>2JDR Company of Transporation Service</h3>
                            </center></br>
                            <div class="sec">

                                <label style="margin-top: 50px;">Name:<?php echo $row['name']; ?></label>
                                <img class="photo" src="<?php echo  $row['photo']; ?>" alt="image">
                            </div>
                            <div>
                                <label>phone Number:<?php $spaces = str_repeat("&nbsp", 52);
                                                    echo $row['phoneno'] . $spaces . $row1['uniqueid']; ?> </label></br>
                            </div></br>
                            <div class="sec">
                                <label>From Destination:<?php echo $row1['fromloc']; ?></label></br>
                            </div>
                            <div class="sec">
                                <label>To Destination:<?php echo $row1['toloc']; ?> </label></br>
                            </div>
                            <div class="sec">
                                <label>Duration:<?php echo $row1['durationno'] . "&nbspto&nbsp" . $row1['duration']; ?> </label></br>
                            </div>
                            <div class="sec">
                                <label>Paid Amount(in Rupees): 30 </label></br>
                            </div></br></br>
            <?php }
                    }
                }
            } ?>
            <center><button class="join">HOME</button></center>

        </div>
    </form>
</body>

</html>