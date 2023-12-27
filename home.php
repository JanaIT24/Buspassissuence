<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>www.Buspasssys.com</title>
        <link rel="stylesheet" type="text/css" href="buttonstyle.css">
    </head>
    <font color="orange" size="5">
        <marquee><b><i>THANKS FOR VISITING OUR WEBSITE</i></b></marquee>
    </font>

    <body background="plain.jpg" link="white">
        <br /> <br /><br />
        <!--<font face="Lato" size="5">
		<img src="F:\Web pages\Web page\Website\logo img.png" height="60px" width="70px">
	</font> -->
        <font face="cinzel" size="4">
            <div style="text-align:center;">

                <a href="#" style="color: black;text-decoration: none;"><b>HOME</b>&nbsp&nbsp</a>


                <a href="article.html" style="color: black;text-decoration: none; "><b>CONTACT US</b> &nbsp&nbsp</a>
                <a href="aboutus.html" style="color: black;text-decoration: none;"><b>ABOUT US</b> &nbsp&nbsp</a>
            </div>
        </font>
        <br /><br />

        <h1 align="center">
            <font color="#FFD700" size="9">
                WELCOME TO SMART BUS PASS SYSTEM<br />
            </font>

        </h1>
        <br><br><br>
        <div class="home-container">
            <center></br><button class="subscribe" onclick="window.location.href='details.php';">New User </button></center></br>
            <center> <button class="subscribe" onclick="window.location.href='apply.html';">Existing User </button></center><br><br>
            <!-- <button type="submit">Renew Bus Pass </button><br>-->
        </div></br></br>
        <div class="container">
            <button class="tweet" onclick="window.location.href='gmap.php';">Location</button></br></br>
            <button class="tweet" onclick="window.location.href='pass.php';">View Pass </button><br><br>
            <button class="tweet" onclick="window.location.href='notification.php';">Notifications </button><br><br>
        </div>
        <br /><br />
        <!-- <hr width="1500px">-->
        <center>
            <b>
                <font face="cinzel" size="4">
                    <a href="about.html" style="color: #013A63;">About Us|
                        <a href="#" style="color:  #013A63;">Contact Us |
                            <a href="#" style="color:  #013A63;"> Privacy Policy |
                                <a href="#" style="color:  #013A63;"> Terms |</a><br />
                                <br /><br /> <br />
                                <font color="darkblue">all@copyrights 2023</font>
                </font>
            </b>
        </center>
    </body>

    </html>
<?php
} else {
    header("Location: index.php");
    exit();
}
?>