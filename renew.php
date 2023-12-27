<?php
session_start();
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> Renew Page </title>
    <script>
        function gett() {
            window.location.href = 'renewal_pass.php';
        }
    </script>
    <style>
        .container {
            position: relative;
            top: 0;
            bottom: 20px;
            left: 0;
            right: 0;
            margin: auto;
            height: 450px;
            max-width: 500px;
            border: 2px solid rgb(1, 1, 1);
            border-radius: 40px;
            padding-left: 20px;

        }

        .img {
            top: 0;
            bottom: 16px;
            left: 0;
            right: 0;
            margin: auto;
            height: 70px;
            width: 70px;
            background-color: white;
            border-radius: 20px;
        }

        .photo {
            top: 0;
            bottom: 16px;
            left: 0;
            right: 0;
            margin-left: 300px;
            height: 80px;
            width: 80px;
            background-color: white;

        }

        .sec {
            display: flex;
            margin-bottom: 20px;
            width: 50%;
        }

        .error {
            color: red;
            display: block;
            position: absolute;
        }
    </style>
</head>

<body>
    <form id="myForm" method="POST" action="renewal_pass.php" enctype="multipart/form-data">
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
                            <div class="sec">
                                <label>phone Number:<?php echo $row['phoneno']; ?> </label></br>
                            </div>
                            <div class="sec">
                                <label>From Destination:<?php echo $row1['fromloc']; ?></label></br>
                            </div>
                            <div class="sec">
                                <label>To Destination:<?php echo $row1['toloc']; ?> </label></br>
                            </div>
                            <h3><label style="color: blue;">Duration:</label></h3>
                            <div>
                                <input type="date" id="numberInput" name="durationno">
                                <label class="label1" style="color:blue;">to</label>
                                <input type="date" id="numberInput" name="duration">

                <?php }
                    }
                }
            } ?>

                            </div></br>
                            <div>
                                <center><button type="submit" name="renew" onclick="window.location.href='renewal_pass.php';">Renew Pass </button>
                                </center>
                            </div>
        </div>
    </form>
</body>

</html>