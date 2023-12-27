<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
include "db_conn.php";

if (
    $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && isset($_POST['from']) && isset($_POST['to']) &&
    isset($_POST['durationno']) && isset($_POST['duration'])
) {
    // Sanitize user inputs
    $from =  $_POST['from'];
    $to = $_POST['to'];
    $durationno = date('Y-m-d', strtotime($_POST['durationno']));
    $duration =  date('Y-m-d', strtotime($_POST['duration']));

    // Check if user is logged in
    if (isset($_SESSION['user_name'])) {
        $username = $_SESSION['user_name'];
        $sql = "SELECT name FROM details WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $name = $row['name'];

                $update_query = "UPDATE `apply` SET fromloc = '$from', toloc = '$to', durationno = '$durationno', duration = '$duration' WHERE `name` = '$name'";
                $update_result = mysqli_query($conn, $update_query);

                if ($update_result) {
                    $que = "SELECT uniqueid FROM `apply` WHERE name='$name'";
                    $run = mysqli_query($conn, $que);
                    if ($run) {
                        if ((mysqli_num_rows($run) > 0)) {
                            $row3 = mysqli_fetch_assoc($run);
                            $uniqueid = $row3['uniqueid'];
                            if ($row3['uniqueid'] == '') {
                                $uniqueid = "2JDR" . (mt_rand(10, 100));
                                $update_uqid = "UPDATE `apply` SET uniqueid='$uniqueid' WHERE `name` = '$name'";
                                $update_result = mysqli_query($conn, $update_uqid);
                                echo $uniqueid . "Data inserted successfully!";
                            } else {
                                echo  "Datas are updated Successfully";
                            }
                        } else {
                            echo "data not fetched";
                        }
                    } else {
                        echo "Unique ID Already exists" . $uniqueid;
                    }


?>

                    <!DOCTYPE html>
                    <html lang=”en”>

                    <head>
                        <title>Pay</title>
                        <style>
                            .center-content {
                                text-align: center;
                                margin-top: 150px;
                            }
                        </style>

                    </head>

                    <body>

                        <div class="center-content">
                            <img src="qrcode.png" width="450" alt="qr"></br></br>
                            <center> <button onclick="window.location.href='pass.php';">pay and get pass</button></center>
                        </div>
                    </body>

                    </html>


<?php } else {
                    echo "Error updating data: " . mysqli_error($conn);
                }
            } else {
                echo "No user details found.";
            }
        } else {
            echo "Query failed: " . mysqli_error($conn);
        }
    } else {
        echo "User not logged in.";
    }
} else {
    echo "Invalid request.";
} ?>