<?php
session_start();

//if $_SESSION['authuser'] is not set -> set to 0
if (!isset($_SESSION['authuser'])) {
    $_SESSION['authuser'] = 0;
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!--<script src="JS/javascript.js"></script>-->
        <title> ABC Hospital OPD - Home </title>
    </head>

    <body>
        <?php
        //Header
        require_once 'headerInc.php';

        //Horizontal Navigation Bar
        require_once 'navInc.php';
        ?>

        <!--Div for Sidebar on Left + Middle Section + Sidebar on Right-->
        <div style="position:relative">
            <?php
            //Left Aside
            require_once 'asideLeftInc.php';
            ?>

            <section style="padding-left:10px;padding-right:10px">
                <h3> &#127968; Welcome to the OPD Patient Information System </h3>
                <p id="greeting" style="color:red"></p>
                <script>
                    if (new Date().getHours() < 12) {
                        document.getElementById("greeting").innerHTML = "Good Morning...!";
                    } else if (new Date().getHours() < 15) {
                        document.getElementById("greeting").innerHTML = "Good Afternoon...!";
                    } else {
                        document.getElementById("greeting").innerHTML = "Good Evening...!";
                    }
                </script>
                <p> This web programme is created for an exercise in Web Development <br> by a group of  
                    students who are following a MSc course in Biomedical <br> Informatics at Postgraduate  
                    Institute of Medicine, <br> University of Colombo, Sri Lanka.</p>
                <p>This DEMO web programme allows users to store <br> patient information in the system for easy retrieval <br> 
                    in future needs.</p>
                <p>You need to Log-In to "Enter" or "View" Patient <br> details.</p>
                <p>Your feedbacks are highly appreciated.</p>

                <p><b>Thank You.</b><br><br> Developer Group <br> Biomedical Informatics 7<sup>th</sup> Batch <br> PGIM </p>
            </section>

            <?php
            //Right Aside
            require_once 'asideRightInc.php';
            ?>
        </div>

        <?php
        //Footer
        require_once 'footerInc.php';
        ?>
    </body>
</html>