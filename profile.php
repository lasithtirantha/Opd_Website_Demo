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
            table#t01 {
                width: 60%;
                line-height: 150%;
            }
            table, th, td{
                font-family: calibri;
                /*                border: 1px black solid;
                                border-collapse: collapse;*/
            }
            th, td {
                vertical-align: top;
            }
            th {
                text-align: left;
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
                <?php
                $servername = "localhost";
                $username = $_SESSION['username']; //Capture username used to log-in from SESSIONS & assign to $username
                $password = $_SESSION['password']; //Capture password used to log-in from SESSIONS & assign to $password
                $dbname = "opd"; //Database name
                
                //Capture inputs from "searchdb.php" & assign them to seperate variables
                $patientid = $_POST['patientid'];

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection is OK, if not => echo "Connection failed" + error message
                if ($conn->connect_error) {
                    die("<p> Connection failed: " . $conn->connect_error) . "</p>";
                }

                //SQL Search querry 
                $sql = "SELECT * FROM patientinfo WHERE id = '$patientid'";
                $result = mysqli_query($conn, $sql);

                //Display search results
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<h3> &#128100; " . $row["othernames"] . " " . $row["lname"] . "</h3>";
                    echo "<fieldset>";
                    echo '<table id="t01"> <br>';

                    echo "<tr> <th> Title </th>         <td> : </td> <td>" . $row["title"] . "</td> </tr>";
                    echo "<tr> <th> Full Name </th>     <td> : </td> <td>" . $row["othernames"] . " " . $row["lname"] . "</td> </tr>";
                    echo "<tr> <th> Patient ID </th>    <td> : </td> <td>" . $row["id"] . "</td> </tr>";
                    echo "<tr> <th> Date of Birth </th> <td> : </td> <td>" . $row["dob"] . "</td> </tr>";
                    echo "<tr> <th> Sex </th>           <td> : </td> <td>" . $row["sex"] . "</td> </tr>";
                    echo "<tr> <th> Address </th>       <td> : </td> <td>" . $row["home"] . "<br>" . $row["street"] . "<br>" . $row["city"] . "</td> </tr>";
                    echo "<tr> <th> NIC Number </th>    <td> : </td> <td>" . $row["nic"] . "</td> </tr>";
                    echo "<tr> <th> Mobile Number </th> <td> : </td> <td>" . $row["mobile"] . "</td> </tr>";
                    echo "<tr> <th> Phone Number </th>      <td> : </td> <td>" . $row["phone"] . "</td> </tr>";
                    echo "<tr> <th> Email Address </th>     <td> : </td> <td>" . $row["email"] . "</td> </tr>";
                    echo "<tr> <th> Registered Date </th>   <td> : </td> <td>" . $row["regdate"] . "</td> </tr>";
                    echo "<tr> <th> Registered by </th>     <td> : </td> <td>" . $row["username"] . "</td> </tr>";
                    echo "</table> <br>"; //End of table
                    echo "</fieldset>";
                }

                $conn->close(); //Close connection with the database
                ?>
                <br>
                <table style="width:auto"><tr>
                        <td><button onclick="goBack()"> Go Back</button></td>
                        <td><a href="search.php"> <input type="button" value="Back to Search" /></a></td>
                        <td><form action="delete.php" method="POST"> <button type="submit" onclick="return confirm('WARNING.!!! \nAre you sure you want to DELETE this patient? \nThis can not be undone')" name="deleteid" value="<?php echo $patientid ?>"> Delete this Patient </button> </form></td>
                        <td><form action="edit.php" method="POST"> <button type="submit" onclick="return confirm('WARNING.!!! \nAre you sure you want to EDIT this patient?')" name="editid" value="<?php echo $patientid ?>"> Edit this Patient </button> </form></td>
                </tr></table>
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