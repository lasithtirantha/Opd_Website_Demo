<header>
    <!--Div for Hospital Logo-->
    <div id="logo-hospital">
        <a href="index.php"><img id="img-hospital" alt="Hospital Logo" src="Image\hospital.png" style="float:left"></a>				
    </div>

    <!--Div for OPD Logo-->
    <div id="logo-opd">
        <img id="img-opd" src="Image\logo.png" alt="OPD Logo" style="float:right;padding-top:5px">
    </div>

    <!--Text to Display User Information on right-top corner-->
    <p style="color:white;font-size:16px;text-align:right;padding-right:5px;margin:0px"> 
        <?php
        //If the User is logged In -> Display "Username", Otherwise -> Display "Not Logged In"
        if ($_SESSION['authuser'] == 0) {
            echo 'User : Not Logged In';
        }
        if ($_SESSION['authuser'] == 1) {
            echo 'User : ' . $_SESSION['username'];
        }
        if ($_SESSION['authuser'] == 2) {
            echo 'User : Not Logged In';
        }
        ?>
    </p>
</header>