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
            fieldset {
                background: rgba(153, 204, 255, 0.2);
                border-radius:6px 6px 6px 6px;
            }
        </style>
        <!--<script src="JS/javascript.js"></script>-->
        <title> ABC Hospital OPD - New Patient </title>
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
                // Capture form inputs from "confirm.php" page & assign them to seperate variables
                $title = $_POST['title'];
                $initials = $_POST['initials'];
                $othernames = $_POST['othernames'];
                $lname = $_POST['lname'];
                $dob = $_POST['dob'];
                $sex = $_POST['sex'];
                $home = $_POST['home'];
                $street = $_POST['street'];
                $city = $_POST['city'];
                $nic = $_POST['nic'];
                $mobile = $_POST['mobile'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];

                // Remove unnecessary characters & assign to a new Validated variables ("V" at the end)
                // $replace_characters = array(" ", ".", ",", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9"); //Characteres to be removed
                // $initials = str_replace($replace_characters, "", $initials);
                // $lname = str_replace($replace_characters, "", $lname);
                //Remove White spaces from both ends
                $othernamesV = trim($othernames, " ");

                // If nic field is blank in database, it will give false results to search function
                // So nic (and email also) should not be blank/NULL
                // Therefore if nic, email field are blank => set nic, email = "N/A" & assign to new Validated variables
                if ($nic == "") {
                    $nic = "N/A";
                }
                if ($mobile == "") {
                    $mobile = "N/A";
                }
                if ($phone == "") {
                    $phone = "N/A";
                }
                if ($email == "") {
                    $email = "N/A";
                }

                $servername = "localhost";
                $username = $_SESSION['username']; //Capture username used to log-in from SESSIONS & assign to $username
                $password = $_SESSION['password']; //Capture password used to log-in from SESSIONS & assign to $password
                $dbname = "opd"; //Database name
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection is OK, if not => echo "Connection failed" + error message
                if ($conn->connect_error) {
                    die("<p> Connection failed: " . $conn->connect_error . "</p>");
                }

                // SQL querry to Insert data in to the table "patientinfo"
                $sql = "INSERT INTO patientinfo (title, initials, othernames, lname, dob, sex, home, street, city, nic, mobile, phone, email, username)
                    VALUES ('$title','$initials','$othernamesV', '$lname', '$dob', '$sex', '$home','$street','$city', '$nic', '$mobile', '$phone', '$email', '$username')";

                if ($conn->query($sql) === TRUE) {
                    $last_id = $conn->insert_id; // Get ID of Entered Record
                    echo "<h3> &#9745; New Record Successful! </h3>";
                    echo '<fieldset>';
                    echo "<p> Patient ID = " . $last_id . "</p>";
                    echo '</fieldset>';
                } else {
                    echo "<h3> &#10008; Error </h3>";
                    echo '<fieldset>';
                    echo "<p>" . $conn->error . "</p>";
                    echo '</fieldset>';
                }
                $conn->close(); //Close connection with the database
                ?>
                <br> <br>
                <a href="new.php"><button> Go Back </button></a>
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