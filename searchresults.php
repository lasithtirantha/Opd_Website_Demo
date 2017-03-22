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
                border-top: 1px black solid;
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
                <h3> &#128269; Search Results </h3>
                <fieldset>
                    <?php
                    $servername = "localhost";
                    $username = $_SESSION['username']; //Capture username used to log-in from SESSIONS & assign to $username
                    $password = $_SESSION['password']; //Capture password used to log-in from SESSIONS & assign to $password
                    $dbname = "opd"; //Database name
                    //Capture inputs from "search.php" & assign them to seperate variables
                    $search1 = $_POST['searchid'];
                    $search2 = $_POST['searchinitials'];
                    $search3 = $_POST['searchlname'];
                    $search4 = $_POST['searchnic'];

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection is OK, if not => echo "Connection failed" + error message
                    if ($conn->connect_error) {
                        die("<p> Connection failed: " . $conn->connect_error) . "</p>";
                    }

                    //SQL Search querry 
                    $sql = "SELECT * FROM patientinfo WHERE id = '$search1' OR initials = '$search2' OR lname = '$search3' OR nic = '$search4' ORDER BY id";
                    $result = mysqli_query($conn, $sql);
                    $row_cnt = $result->num_rows;

                    //Display search results
                    if ($result->num_rows > 0) {
                        echo "<p> Number of Results Found = " . $row_cnt . "</p>";
                        echo '<table id="t01">'; //Insert a table
                        //Table Headers
                        echo "<tr><th> Full Name </th> <th> ID </th> <th> Date of Birth </th> <th> Sex </th> <th> Address </th> <th> NIC </th> <th> Full Details </th></tr>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            $n = 0;
                            $n = $n + $row["id"];
                            echo "<tr>"; //Insert a new row to the table
                            echo "<td>" . $row["othernames"] . " " . $row["lname"] . "</td>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["dob"] . "</td>";
                            echo "<td>" . $row["sex"] . "</td>";
                            echo "<td>" . $row["home"] . "<br>" . $row["street"] . "<br>" . $row["city"] . "</td>";
                            echo "<td>" . $row["nic"] . "</td>";

                            echo '<form action="profile.php" method="POST">';
                            echo '<td><button type="submit" name="patientid" value="' . $n . '"> View Details </button></td>';
                            echo "</form>";
                            echo "</tr>";
                        }
                        echo "</table>"; //End of table
                        echo '<p> Click on "View Details" Button to see Full Details.</p>';
                    } else {
                        echo "<p> No match found. Please try again. </p>";
                    }
                    $conn->close(); //Close connection with the database
                    ?>
                </fieldset>
                <br>
                <button onclick="goBack()">Go Back</button>
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