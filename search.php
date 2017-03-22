<?php
session_start();

//if $_SESSION['authuser'] is not set -> set to 0
if (!isset($_SESSION['authuser'])) {
    $_SESSION['authuser'] = 0;
}

//if authuser not equal to 1 -> redirect to login page
if ($_SESSION['authuser'] == 0) {
    header("Location:login.php");
    exit();
}
if ($_SESSION['authuser'] == 2) {
    header("Location:login.php");
    exit();
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!--script src="JS/javascript.js"></script-->
        <style>
            td{
                font-family: calibri;
            }
            fieldset{
                background: rgba(153, 204, 255, 0.2);
                border-radius:6px 6px 6px 6px;
            }
        </style>
        <title> ABC Hospital OPD - Search </title>
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
                <h3> &#128269; Search Patient </h3>
                <fieldset>
                    <form action="searchresults.php" method="post">
                        <p> Please fill following field/fields as in Examples to Search. </p>
                        <table>
                            <tr> <td> <p style="font-family:calibri;"> Patient ID   </p> </td> <td> <input type="search" name="searchid" placeholder="eg: 1" autofocus> </td> </tr>
                            <tr> <td> <p style="font-family:calibri;"> Initials     </p> </td> <td> <input type="search" name="searchinitials" placeholder="eg: WAD"> </td> </tr>
                            <tr> <td> <p style="font-family:calibri;"> Last Name    </p> </td> <td> <input type="search" name="searchlname" placeholder="eg: Silva"> </td> </tr>
                            <tr> <td> <p style="font-family:calibri;"> NIC Number   </p> </td> <td> <input type="search" name="searchnic" placeholder="eg: 850011234V"> </td> </tr>
                        </table>
                        <br>
                        <input type="submit" value="Search" style="text-align:center">
                        <p></p>
                    </form>
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