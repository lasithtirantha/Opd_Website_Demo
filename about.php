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
        <!--script src="JS/javascript.js"></script-->
        <style>
            th, td{
                font-family: calibri;
            }
            fieldset{
                background: rgba(153, 204, 255, 0.2);
                border-radius:6px 6px 6px 6px;
            }
        </style>
        <title> ABC Hospital OPD - About Us </title>
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
                <h3> &#128107; Details of Developers </h3>
                <fieldset>
                    <img src="Image/group.jpg" alt="group_photo" style="width:100%;opacity:0.95;box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);">
                    <table>
                        <tr><th style="text-align:left;padding-left:5px;font-size:20px;font-weight:300px"> Advisor </th></tr>
                        <tr><td style="padding-left:15px;font-size:18px"> Dr. Priyanga Senanayake </td></tr>
                    </table>
                    <br>
                    <table>
                        <tr><th style="text-align:left;padding-left:5px;font-size:20px;font-weight:300px"> Group Members </th></tr>
                        <tr><td style="padding-left:15px;font-size:18px"> Dr. Lasith Ihalagamage </td></tr>
                        <tr><td style="padding-left:15px;font-size:18px"> Dr. Chinthaka Jayarathne </td></tr>
                        <tr><td style="padding-left:15px;font-size:18px"> Dr. Chulaka Jayaweera </td></tr>
                        <tr><td style="padding-left:15px;font-size:18px"> Dr. Nimashi Katuwawala </td></tr>
                        <tr><td style="padding-left:15px;font-size:18px"> Dr. Amila Liyanage </td></tr>
                    </table>
                </fieldset>
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