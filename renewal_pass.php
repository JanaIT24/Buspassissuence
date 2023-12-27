<?php
session_start();
include "db_conn.php";
error_reporting(E_ALL);
ini_set('display_errors', '1');
if (
    $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['renew']) &&
    isset($_POST['durationno']) && isset($_POST['duration'])
) {
    // Sanitize user input
    $durationno = date('Y-m-d', strtotime($_POST['durationno']));
    $duration =  date('Y-m-d', strtotime($_POST['duration']));

    // Check if user is logged in
    if (isset($_SESSION['user_name'])) {
        $usernames = $_SESSION['user_name'];
        $sql1 = "SELECT name FROM details WHERE username = '$usernames'";
        $result1 = mysqli_query($conn, $sql1);

        if ($result1) {
            if (mysqli_num_rows($result1) > 0) {
                $row = mysqli_fetch_assoc($result1);
                $name = $row['name'];

                $update_query = "UPDATE `apply` SET durationno = '$durationno', duration = '$duration' WHERE `name` = '$name'";
                $update_result = mysqli_query($conn, $update_query);

                if ($update_result) {
                    $update_query1 = "UPDATE `apply` SET cost='40' WHERE `name` = '$name'";
                    $update_result1 = mysqli_query($conn, $update_query1);
                    //echo "Data Updated successfully!";
?>

                    <!DOCTYPE html>
                    <html lang=”en”>

                    <head>
                        <title>Pass</title>
                        <style>
                            .center-content {
                                text-align: center;
                                margin-top: 100px;
                            }
                        </style>
                    </head>

                    <body>
                        <div class="center-content">
                            <img src="qrcode.jpg" width="400" alt="qr"></br></br>
                            <center>
                                <p>30</p>
                            </center>
                            <center><button type="submit" name="submit" onclick="window.location.href='pass.php';">pay and get pass</button></center>
                            <!-- <center><button onclick="window.location.href='pass.php';">pay and get pass</button></center>-->
                        </div>
                    </body>

                    </html>


<?php
                } else {
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