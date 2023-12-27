<?php
session_start();
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>www.buspass.com</title>
  <link rel="stylesheet" type="text/css" href="detail.css">
  <script>
    function alert() {
      var username = document.getElementById('username').value;
      var email = document.getElementById('email').value;
      var phnno = document.getElementById('phnno').value;
      var photo = document.getElementById('photo').value;
      var aadhar = document.getElementById('aadhar').value;

      if (username == '') {
        document.getElementById('uname').innerHTML = "please fill the username";
        return false;
      } else {
        document.getElementById('uname').innerHTML = "";
      }
      if (email == '') {
        document.getElementById('emal').innerHTML = "please fill the email";
        return false;
      } else {
        document.getElementById('emal').innerHTML = "";
      }
      if (phnno == '') {
        document.getElementById('phn').innerHTML = "please fill the phonenumber";
        return false;
      } else {
        document.getElementById('phn').innerHTML = "";
      }
      if (photo == '') {
        document.getElementById('phot').innerHTML = "please select photo";
        return false;
      } else {
        document.getElementById('phot').innerHTML = "";
      }
      if (aadhar == '') {
        document.getElementById('aadha').innerHTML = "please fill the aadharnumber";
        return false;
      } else {
        document.getElementById('aadha').innerHTML = "";
      }
    }

    function numberonly(input) {
      var num = /[^0-9]/;
      input.value = input.value.replace(num, "");
      var phoneno = /^\d{10}$/;
      if (input.value.length != phoneno) {
        alert("Enter 10 digits only");
      } else {
        alert("Enter 10 digits only");
      }
    }

    function letteronly(input) {
      var letter = /[^A-Za-z]/;
      input.value = input.value.replace(letter, "");
    }
  </script>
</head>

<body>
  <?php
  if (isset($_SESSION['status']) && $_SESSION != '') {
  ?>
    <strong> Hey!</strong><?php echo $_SESSION['status']; ?>
  <?php
    unset($_SESSION['status']);
  }
  ?>
  <form class="myForm" method="POST" action="register.php" enctype="multipart/form-data">
    <div class="container" style="height: 640px;padding-bottom:20px;padding-top:5px;">
      <center>
        <h1>REGISTRATION FORM</h1>
        <h2 style="color: maroon;"> Welcome <?php echo $_SESSION['name'];
                                            ?></h2>
      </center>
      <center>
        <?php error_reporting(E_ALL);
        ini_set('display_errors', '1');
        $sql = "SELECT * FROM details WHERE username= '$_SESSION[user_name]'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="sec">
              <label>Name:</label></br>
              <input type="text" onkeyup="letteronly(this)" name="name" id="username" required style="display: block;border: 2px solid #ccc;width: 95%;padding: 10px;
	margin: 10px auto;
	border-radius: 5px;" value=<?php echo $row['name']; ?>>
              <div><span class="error" id="uname"></span></div>
            </div></br>
            <div class="sec">
              <label>Email id : </label></br>
              <input type="email" name="email" id="email" required style="display: block;border: 2px solid #ccc;width: 95%;padding: 10px;
	margin: 10px auto;
	border-radius: 5px;" value=<?php echo $row['emailid'] ?>>
              <div><span class="error" id="emal"></span></div>
            </div></br>
            <div class="sec">
              <label>Phone No: </label></br>
              <input type="text" onkeyup="numberonly(this)" value=<?php echo $row['phoneno'] ?> name="phoneno" id="phnno" required style="display: block;border: 2px solid #ccc;width: 95%;padding: 10px;
	margin: 10px auto;
	border-radius: 5px;">
              <div><span class="error" id="phn"></span></div>
            </div></br>
            <div class="sec">
              <label>Photo: </label></br>
              <input type="file" name="photo" id="photo" style="display: block;border: 2px solid #ccc;width: 95%;padding: 10px;
	margin: 10px auto;
	border-radius: 5px;" value=<?php echo $row['photo']; ?>></br>
              <img src="<?php echo  $row['photo']; ?>" width="75" alt="image">
              <div><span class="error" id="phot"></span></div>
            </div></br>
            <div class="sec">
              <label>Aadhar No: </label></br>
              <input type="text" onkeyup="numberonly(this)" value=<?php echo $row['aadharno'] ?> name="aadharno" id="aadhar" required style="display: block;border: 2px solid #ccc;width: 95%;padding: 10px;
	margin: 10px auto;
	border-radius: 5px;">
              <div><span class="error" id="aadha"></span></div>
            </div></br>
      </center>
      <center><button type="submit" name="submit" style="background-color: rgb(0, 0, 200);
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-weight: 550;
    margin-right: 8px;
    margin-left: 10px;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 16px;
    padding-right: 16px;
    transition: opacity 0.15s;
    vertical-align: top;">Submit </button></center>
      </br>
    </div>
  </form></br>
  <div style="display: flex;">
    <button onclick="window.location.href='apply.html';" class="subscribe" style="background-color: rgb(0, 0, 200);
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-weight: 550;
    margin-right: 8px;
    margin-left: 500px;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 16px;
    padding-right: 16px;
    transition: opacity 0.15s;
    vertical-align: top;"> Apply pass</button>
    <!--<center><button type="submit" name="update" onclick="window.location.href='register.php';">Update </button></center>-->
    <button onclick="window.location.href='home.php';" style="background-color: rgb(0, 0, 200);
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-weight: 550;
    margin-right: 8px;
    margin-left: 350px;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 16px;
    padding-right: 16px;
    transition: opacity 0.15s;
    vertical-align: top;"><b>Home</b></button>
  </div>
<?php }
        } else {
          echo "no activity";
        } ?>
<!--<h1> <?php echo $_SESSION['user_name']; ?></h1>-->
</body>

</html>