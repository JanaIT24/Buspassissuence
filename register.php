<?php
session_start();
include "db_conn.php";
error_reporting(E_ALL);
ini_set('display_errors', '1');
if (isset($_POST['submit']) && isset($_FILES['photo']['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $photo = $_FILES['photo']['name'];
    $aadharno = $_POST['aadharno'];
    $insertimg = "UPDATE  details SET name='$name', emailid='$email',phoneno='$phoneno',photo='$photo',aadharno='$aadharno'  WHERE username='$_SESSION[user_name]'";
    $insert_run = mysqli_query($conn, $insertimg);
    $fetch = "SELECT * FROM `apply` WHERE name='$name'";
    $run = mysqli_query($conn, $fetch);

    if ($insert_run && mysqli_num_rows($run) == '') {
        $que1 = "INSERT INTO `apply` (name) VALUES ('$name')";
        $run = mysqli_query($conn, $que1);
        move_uploaded_file($_FILES["photo"]["tmp_name"], "uploads/" . $_FILES['photo']['name']);
        $_SESSION['status'] = "Your datas inserted Successfully";
        header('location:details.php');
    } elseif ($insert_run) {
        move_uploaded_file($_FILES["photo"]["tmp_name"], "uploads/" . $_FILES['photo']['name']);
        $_SESSION['status'] = "Your datas updated Successfully";
        header('location:details.php');
    } else {
        $_SESSION['status'] = "Datas are not inserted";
        header('location:details.php');
    }
}





/*if (isset($_POSt['update'])) {
    $name = $_POSt['name'];
    $email = $_POSt['email'];
    $phoneno = $_POSt['phoneno'];
    $newphoto = $_FILES['newphoto']['name'];
    $photo = $_POSt['photo'];
    $aadharno = $_POSt['aadharno'];
    if ($newphoto != '') {
        $updatedimg = $newphoto;
    } else {
        $updatedimg = $photo;
    }
    if (file_exists("uploads/" . $_FILES['newphoto']['name'])) {
        $filename = $_FILES['newphoto']['name'];
        $_SESSION['status'] = $filename . "Image already exist";
        header('location:details.php');
    } else {
        $updateimgque = "UPDATE details SET name='$name', emailid='$email',phoneno='$phoneno',photo='$updatedimg',aadharno='$aadharno'  WHERE username='$_SESSION[user_name]'";
        $run = mysqli_query($conn, $updateimgque);


        if ($run) {
            if ($_FILES['newphoto']['name'] != '') {
                move_uploaded_file($_FILES['newphoto']['tmp_name'], "uploads/" . $_FILES['newphoto']['name']);
                unlink("uploads/" . $photo);
            }
            $_SESSION['status'] = "Image updated";
            header('location:details.php');
        } else {
            $_SESSION['status'] = "Image not updated";
            header('location:details.php');
        }
    }
}
?>

























<!--error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
include "db_conn.php";
if (isset($_POST['submit']) && isset($_POST['photo'])) {
$name = $_POST["name"];
$email = $_POST["email"];
$phoneno = $_POST["phoneno"];
$photo = $_POST["photo"];
$aadharno = $_POST["aadharno"];
$username = "$_SESSION[user_name]";
do {
if (empty($name) || empty($email) || empty($phoneno) || empty($aadharno)) {
$errormessage = "All fields are required";
break;
}
$ins = "UPDATE details SET name='$name',emailid='$email',phoneno='$phoneno',photo='$photo',aadharno='$aadharno' WHERE username='$_SESSION[user_name]'";
echo "Data inserted";
echo "$_SESSION[user_name]";
} while (true);
}























/*error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
include "db_conn.php";

$sql = "SELECT * FROM details WHERE username= '$_SESSION[user_name]'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result)) {
echo "Activity " . $row['phoneno'];
echo "name" . $row['name'];
}
} else {
echo "no activity";
}








































/*$mysqli = new mysqli($sname, $unmae, $password, $db_name);
if (isset($_POST['username'])) {
$uname = $_POST['username'];
$que = "SELECT * FROM details WHERE username = $uname";
$stmt = $mysqli->prepare($que);
$stmt->bind_param("s", $uname);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
// User exists, display their data
$user = $result->fetch_assoc();
echo "User Data: ";
echo "Username: " . $user['username'];
echo "Email: " . $user['phoneno'];
}
} else {
echo "User not found. Please register:<br>";
echo '<form action="check.php" method="post">';
    echo 'Name: <input type="text" name="name" value="" readonly><br>';
    echo 'Email: <input type="email" name="email"><br>';
    echo 'Password: <input type="password" name="password"><br>';
    echo '<input type="submit" value="Register">';
    echo '</form>';
}

/*if (isset($_POST['submit'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$phoneno = $_POST['phoneno'];
$photo = $_POST['photo'];
$aadharno = $_POST['aadharno'];
$username = "$_SESSION[user_name]";
$ins = "UPDATE details SET name='$name',emailid='$email',phoneno='$phoneno',photo='$photo',aadharno='$aadharno' WHERE username='$_SESSION[user_name]'";
if ($conn->query($ins) === TRUE) {
echo "Data inserted";
echo "$_SESSION[user_name]";
} else {
echo "error " . $ins . $conn->error;
}
}






































/*$mysqli = new mysqli($sname, $unmae, $password, $db_name);
if (isset($_POST['submit'])) {
if (isset($_SESSION['username']) && !isset($_SESSION['name'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$phoneno = $_POST['phoneno'];
$photo = $_POST['photo'];
$aadharno = $_POST['aadharno'];
$username = "$_SESSION[user_name]";
$ins = "UPDATE details SET name='$name',emailid='$email',phoneno='$phoneno',photo='$photo',aadharno='$aadharno' WHERE username='$_SESSION[user_name]'";
if ($conn->query($ins) === TRUE) {
echo "Data inserted";
echo "$_SESSION[user_name]";
} else {
echo "error " . $ins . $conn->error;
}
}
if (isset($_SESSION['name']) && isset($_SESSION['username'])) {
$userid = $_SESSION['name'];
$activity = "SELECT * FROM details WHERE name=?";
$activitystmt = $mysqli->prepare($activity);
$activitystmt->bind_param('i', $userid);
$activitystmt->execute();
$activityres = $activitystmt->get_result();
echo "welcome, $userid";
echo "hii";
}
$sql = "SELECT username FROM details WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_SESSION['user_name']);
$stmt->execute();
$stmt->bind_result($result);
$stmt->fetch();
if ($_SESSION['user_name'] === $result) {
echo "the user name matches";
$stmt->free_result();
$ins = "UPDATE details SET name='$name',emailid='$email',phoneno='$phoneno',photo='$photo',aadharno='$aadharno' WHERE username='$_SESSION[user_name]'";
if ($conn->query($ins) === TRUE) {
echo "Data inserted";
} else {
echo "error " . $ins . $conn->error;
}
//$stmt->free_result();
} else {
echo "not matched";
}*/