<?php
session_start();
include "db_conn.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Apply Pass</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        select {
            position: relative;
            font-family: Arial;
            background-color: whitesmoke;
            color: black;
            height: 100%;
            width: 100%;
            border-color: 5px gray;
            border-radius: 3px;
            padding-bottom: 5px;
            padding-top: 5px;
            margin-left: 10px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .container {
            display: flex;
            border: 1px gray;
        }

        .dropdown {
            margin-top: 10px;
            padding: 8px;
        }

        .label1 {
            margin-top: 10px;
        }

        .button-33 {
            background-color: orangered;
            border-radius: 100px;
            box-shadow: 2px 2px 5px #333;
            color: black;
            cursor: pointer;
            display: inline-block;
            font-family: CerebriSans-Regular, -apple-system, system-ui, Roboto, sans-serif;
            padding: 7px 20px;
            text-align: center;
            text-decoration: none;
            transition: all 250ms;
            border: 0;
            font-size: 16px;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            font-weight: bold;
            margin-right: 50%;
        }

        .button-33:hover {
            box-shadow: rgba(44, 187, 99, .35) 0 -25px 18px -14px inset, rgba(44, 187, 99, .25) 0 1px 2px, rgba(44, 187, 99, .25) 0 2px 4px, rgba(44, 187, 99, .25) 0 4px 8px, rgba(44, 187, 99, .25) 0 8px 16px, rgba(44, 187, 99, .25) 0 16px 32px;
            transform: scale(1.05) rotate(-1deg);
        }
    </style>
    <script>
        function move() {
            window.location.href = 'pay.php';
        }

        function randnum() {


        }
    </script>
</head>

<body style="background-color:darkseagreen7;">
    <form action="pay.php" method="POST">
        <?php error_reporting(E_ALL);
        ini_set('display_errors', '1');
        $sql = "SELECT * FROM details WHERE username= '$_SESSION[user_name]'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <h2>Apply For Pass</h2>
                <h3 style="color: black;">
                    <lable> Name:<?php echo $row['name']; ?></lable>
                </h3>
                <div class="custom_select" style="width: 200px;">
                    <h3><label style="color: black;">From:</label></h3>
                    <select name="from">
                        <option>Select Any Location</option>
                        <option>Adhiyamman College </option>
                        <option>Attibele </option>
                        <option>Bathalapalli </option>
                        <option>Hosur Bus Stand</option>
                        <option>Dharga </option>
                        <option>ESI </option>
                        <option>Mookandapalli </option>
                        <option>Old Bus Stand </option>
                        <option>The Chennai Skills</option>
                        <option>Zuzuvadi </option>
                    </select>
                </div>
                <div class="custom_select" style="width: 200px;">
                    <h3><label style="color: black;">To:</label></h3>
                    <select name="to">
                        <option>Select Any Location</option>
                        <option>Adhiyamman College </option>
                        <option>Attibele </option>
                        <option>Bathalapalli </option>
                        <option>Hosur Bus Stand</option>
                        <option>Dharga </option>
                        <option>ESI </option>
                        <option>Mookandapalli </option>
                        <option>Old Bus Stand </option>
                        <option>The Chennai Skills</option>
                        <option>Zuzuvadi </option>
                    </select>
                </div>
                <div>
                    <h3><label style="color: black;">Duration:</label></h3>
                    <div class="container" style="font-weight: bold;">
                        <input type="date" id="numberInput" name="durationno" style="font-weight: bold;">
                        <label class="label1" style="color:black;">to</label>
                        <input type="date" id="numberInput" name="duration" style="font-weight: bold;">


                    </div>

                </div>
                <div>
                    <center><button type="submit" name="submit" onclick="randnum()" class="button-33">Apply </button></center>
                </div>

        <?php }
        } ?>

    </form>
</body>

</html>