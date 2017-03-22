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
        <style>
            table {
                width: 100%;
            }
            table#t01 tr:nth-child(even) {
                background-color: aliceblue;
            }
            table#t01 tr:nth-child(odd) {
                background-color: whitesmoke;
            }
            table, th, td{
                font-family: calibri;
                border: 1px black solid;
                border-collapse: collapse;
            }
            th, td {
                vertical-align: top;
            }
            fieldset{
                background: rgba(153, 204, 255, 0.2);
                border-radius:6px 6px 6px 6px;
            }
        </style>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
        <!--<script src="JS/javascript.js"></script>-->
        <title> ABC Hospital OPD - Delete </title>
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

                <?php
                $servername = "localhost";
                $username = $_SESSION['username']; //Capture username used to log-in from SESSIONS & assign to $username
                $password = $_SESSION['password']; //Capture password used to log-in from SESSIONS & assign to $password
                $dbname = "opd"; //Database name
                
                //Capture inputs from "search.php" & assign them to seperate variables
                $delete = $_POST['deleteid'];

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection is OK, if not => echo "Connection failed" + error message
                if ($conn->connect_error) {
                    die("<p> Connection failed: " . $conn->connect_error) . "</p>";
                }

                //SQL Search querry 
                $sql = "DELETE FROM patientinfo WHERE id = '$delete'";

                if ($conn->query($sql) === TRUE) {
                    echo "<h3> &#9745; Record Delete Successful! </h3>";
                    echo "<fieldset>";
                    echo "<p> Deleted Patient ID = " . $delete . "</p>";
                    echo "</fieldset>";
                    
                } else {
                    echo "<fieldset>";
                    echo "<h3> &#10008; Error </h3>";
                    echo "<p>" . $conn->error . "</p>";
                    echo "</fieldset>";
                }
                ?>
                <br>
                <a href="index.php"><input type="button" value="Home" /></a>
                <a href="search.php"><input type="button" value="Back to Search" /></a>
                <a href="new.php"><input type="button" value="Submit a New Patient" /></a>
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