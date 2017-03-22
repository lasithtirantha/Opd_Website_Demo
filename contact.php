<?php
//if $_SESSION['authuser'] is not set -> set to 0
session_start();
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
        <title> ABC Hospital OPD - Contact </title>
        <style>
            fieldset{
                background: rgba(153, 204, 255, 0.2);
                border-radius:6px 6px 6px 6px;
            }
            td, th {
                font-family: calibri;
                vertical-align: top;
            }
            td{
                font-weight: 500;
            }
        </style>
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
                <h3> &#128241; Contact Information </h3>
                <fieldset>
                    <table style="line-height:30px">
                        <tr><th style="text-align:left;"> NAME </th><td> : </td><td style="padding-left: 10px"> ABC Hospital (PVT) Ltd., Colombo. </td> <td rowspan="11" style="width:50%"> <img src="Image/location.jpg" alt="location" style="margin:auto;width:100%;border:2px solid gray;box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2)"> </td></tr>
                        <tr></tr>
                        <tr><th style="text-align:left;"> ADDRESS </th><td> : </td><td style="padding-left: 10px"> No. 101/1A, </br> Kinsey Road, </br> Colombo 08. </td></tr>
                        <tr></tr>
                        <tr><th style="text-align:left;"> PHONE </th><td> : </td><td style="padding-left: 10px"> +94 112 123456 <br> +94 112 123457 </td></tr>
                        <tr></tr>
                        <tr><th style="text-align:left;"> FAX </th><td> : </td><td style="padding-left: 10px"> +94 112 123458 </td></tr>
                        <tr></tr>
                        <tr><th style="text-align:left;"> EMAIL </th><td> : </td><td style="padding-left: 10px"> abchospitalcmb@gmail.com </br> abchospitalcmb@yahoo.com </td></tr>
                        <tr></tr>
                        <tr><th style="text-align:left;"> WEB </th><td> : </td><td style="padding-left: 10px"> abchospital.lk </td></tr>
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