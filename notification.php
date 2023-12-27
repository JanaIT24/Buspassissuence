<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .alert {
            padding: 60px;
            background-color: blue;
            color: white;
            margin-left: 750px;
        }

        .alert1 {
            padding: 60px;
            background-color: green;
            color: white;
            margin-left: 750px;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        p {
            margin-left: 750px;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include "db_conn.php";
    //var_dump($_SESSION['user_name']);
    $sql = "SELECT * FROM details WHERE username= '{$_SESSION['user_name']}'";
    $result = mysqli_query($conn, $sql);
    //var_dump($result);
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $sql2 = "SELECT * FROM `apply` WHERE name= '{$row['name']}'";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2 && mysqli_num_rows($result2) > 0) {
                while ($row1 = mysqli_fetch_assoc($result2)) {
                    if ($row1['uniqueid'] == '') {
    ?>
                        <div>
                            <center>
                                <h2>Notifications</h2>
                            </center>
                            <div class="alert">
                                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                <strong>Sorry!
                                </strong> You have not any notifications Yet
                            </div>
                        </div>
                        <?php
                    } else {
                        $sql3 = "INSERT INTO notify (`uid`,`floc`,`tloc`,`time`,`cost`,`fduration`,`tduration`) VALUES ('{$row1['uniqueid']}','{$row1['fromloc']}','{$row1['toloc']}',NOW(),'{$row1['cost']}','{$row1['durationno']}','{$row1['duration']}')";
                        if (mysqli_query($conn, $sql3)) {
                        ?>
                            <div>
                                <center>
                                    <h2>NOTIFICATION</h2></br></br>
                                </center>
                                <!-- <div class="alert1">
                                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                <strong>Success!</strong>Payment is done Successfully and your Pass is generated
                            </div>--><?php
                                        $sql5 = "SELECT * FROM `notify` WHERE uid= '{$row1['uniqueid']}'";
                                        $result5 = mysqli_query($conn, $sql5);
                                        if ($result5 && mysqli_num_rows($result5) > 0) {
                                            $tagdisplay = false;
                                            while ($row5 = mysqli_fetch_assoc($result5)) {
                                                $query6 = "SELECT fduration FROM notify WHERE uid= '{$row1['uniqueid']}'";
                                                $result6 = mysqli_query($conn, $query6);
                                                if ($row5['uid'] != '' && $row5['cost'] != '' && $row5['fduration'] == $row1['durationno'] && !$tagdisplay) {
                                                    $tagdisplay = true;
                                                    $time = $row5['time'];
                                                    $formattime = date("Y-m-d", strtotime($time)); ?>
                                            <div class="alert1">
                                                <span class="closebtn">&times;</span>
                                                <strong>Success! </strong>Payment is done Successfully and your Pass is generated with PassID <?php echo $row1['uniqueid'] ?>
                                            </div>

                            </div>
                            <div>
                                <p id="demo"><?php echo $formattime ?></p>
                            </div>
                            <!--<script>
                                const d = new Date();
                                document.getElementById("demo").innerHTML = d.toLocaleString(); // Displaying the current date and time
                            </script>-->
                            <?php
                                                } else {
                                                    while ($row6 = mysqli_fetch_assoc($result6)) {
                                                        $lastUpdateTime = strtotime($row6['fduration']);
                                                        $thresholdTime = strtotime('24 hours');
                                                        if ($lastUpdateTime > $thresholdTime) {
                                                            $tagdisplay = true;
                                                            $time1 = $row6['fduration'];
                                                            $formattime1 = date("Y-m-d", strtotime($time1)); ?>
                                    <div class="alert1">
                                        <span class="closebtn">&times;</span>
                                        <strong>Success! </strong>Payment is done Successfully and your Pass is generated with PassID <?php echo $row1['uniqueid'] ?>
                                    </div>

                                    </div>
                                    <div>
                                        <p id="demo"><?php echo $formattime1 ?></p>
                                    </div><?php
                                                        } elseif (!$tagdisplay && $lastUpdateTime < $thresholdTime) {
                                                            $tagdisplay = true;
                                                            $time = $row6['fduration'];
                                                            $formattime = date("Y-m-d", strtotime($time)); ?>
                                    <div class="alert1">
                                        <span class="closebtn">&times;</span>
                                        <strong>Success! </strong>Payment is done Successfully and your Pass is generated with PassID <?php echo $row1['uniqueid'] ?>
                                    </div>

                                    </div>
                                    <div>
                                        <p id="demo"><?php echo $formattime ?></p>
                                    </div><?php
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

                                            ?>
</body>

</html>