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
        <title> ABC Hospital OPD - Help </title>
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
                <h3> &#128218; Guide to Insert Data </h3>
                <p> Please adhere to following format when inserting data.<br>
                    <br>
                <b>1. Initials </b><br>
                Use only Block letters without spaces or any other characters.<br>
                <br>
                <b>2. Names denoted by Initials </b><br>
                Use Block letters to start each name. Can use spaces, but numbers or any other characters are not allowed.<br>
                <br>
                <b>3. Last Name/ Surname </b><br>
                First letter should be a Block letter. Can use spaces, but numbers or any other characters are not allowed.<br>
                <br>
                <b>4. Date of Birth </b><br>
                If your browser gives a date picker, select it from it. Otherwise enter in YYYY-MM-DD format.<br>
                <br>
                <b>5. NIC Number </b><br>
                10 or 12 digit number with "V/v" or "X/x" at the end.<br>
                <br>
                <b>6. Mobile/Phone Number </b><br>
                10 digit local number starting with zero.<br>
                </p>
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