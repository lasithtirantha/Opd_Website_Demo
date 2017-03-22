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
$servername = "localhost";
$username = $_SESSION['username']; //Capture username used to log-in from SESSIONS & assign to $username
$password = $_SESSION['password']; //Capture password used to log-in from SESSIONS & assign to $password
$dbname = "opd"; //Database name
//Capture inputs from "search.php" & assign them to seperate variables
$editid = $_POST['editid'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection is OK, if not => echo "Connection failed" + error message
if ($conn->connect_error) {
    die("<p> Connection failed: " . $conn->connect_error) . "</p>";
}

//SQL Search querry 
$sql = "SELECT * FROM patientinfo WHERE id = '$editid'";
$result = mysqli_query($conn, $sql);

//Assign details to variables
while ($row = mysqli_fetch_assoc($result)) {
    $title = $row["title"];
    $initials = $row["initials"];
    $othernames = $row["othernames"];
    $lname = $row["lname"];
    $dob = $row["dob"];
    $sex = $row["sex"];
    $home = $row["home"];
    $street = $row["street"];
    $city = $row["city"];
    $nic = $row["nic"];
    $mobile = $row["mobile"];
    $phone = $row["phone"];
    $email = $row["email"];
}
?>

    <!DOCTYPE html>

    <html>
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" type="text/css" href="css/style.css">
            <!--script src="JS/javascript.js"></script-->
            <title> ABC Hospital OPD - Edit </title>
            <style>
                td {
                    font-family: calibri;
                }
                fieldset {
                    background: rgba(153, 204, 255, 0.2);
                    border-radius:6px 6px 6px 6px;
                }
            </style>
            <script>
                function goBack() {
                    window.history.back();
                }
            </script>
    <!--        <script>
                function confirmBox() {
                    confirm("Are you sure? This will create a new entry.!");
                }
            </script>-->
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
                    <h3> &#127381; Edit Patient Details </h3>
                    <form action="editdb.php" method="POST">
                        <fieldset>
                            <p> Edit required fields. Title, Date of Birth & Sex has to be filled again.</p>
                        <table>
                            <tr><td width="250px">1. Title </td>        <td> : </td><td> <select name="title" autofocus> <option selected disabled> Choose here </option><option value="Mr">Mr</option> <option value="Mrs">Mrs</option> <option value="Miss">Miss</option> <option value="Mast">Mast</option> <option value="Baby">Baby</option> <option value="Dr">Dr</option> <option value="Rev">Rev</option> </select> </td></tr>
                            <tr><td>2. Initials* </td>                  <td> : </td><td> <input type="text" name="initials" pattern="[A-Z]{1,10}" placeholder="eg: WAD" title="CAPITAL Letters ONLY, No Spaces, Max = 10" size="30" value="<?php echo $initials ?>" required> </td></tr>
                            <tr><td>3. Names Denoted by Initials* </td> <td> : </td><td> <input type="text" name="othernames" pattern="[A-Za-z ]{1,45}" placeholder="eg: Wasala Arachchige Don" title="Capital or Simple Letters, Spaces Only, Please fill First Letter of each Name Should in Capital,  Max = 45" size="30" value="<?php echo $othernames ?>" required> </td></tr>
                            <tr><td>4. Last Name* </td>                 <td> : </td><td> <input type="text" name="lname" pattern="[A-Z][A-Za-z]{1,45}" placeholder="eg: Silva" title="Capital or Simple Letters Only, FIRST Letter MUST be Capital, No Spaces, Max = 45" size="30" value="<?php echo $lname ?>" required> </td></tr>
                            <tr><td>5. Date of Birth* </td>             <td> : </td><td> <input type="date" name="dob" placeholder="Eg: 1970-01-01" required> </td></tr>
                            <tr><td>6. Sex* </td>                       <td> : </td><td> <input type="radio" name="sex" value="Male" required> Male <input type="radio" name="sex" value="Female" required> Female </td></tr>
                            <tr><td>7. Address </td>                    <td> : </td><td> <input type="text" name="home" placeholder="eg: No.112/1A" title="Address Line 01" size="30" value="<?php echo $home?>"> </td></tr>
                                        <tr><td></td>                   <td> : </td><td> <input type="text" name="street" placeholder="eg: Pubudu Mawatha " title="Address Line 02" size="30" value="<?php echo $street ?>"> </td></tr>
                                        <tr><td></td>                   <td> : </td><td> <input type="text" name="city" placeholder="eg: Maharagama" title="Address Line 03" size="30" value="<?php echo $city ?>"> </td></tr>
                            <tr><td>8. NIC Number </td>                 <td> : </td><td> <input type="text" name="nic" pattern="\d{9}[VvXx]|\d{11}[VvXx]|N/A" placeholder="eg: 99xxxxxxxV/2000xxxxxxxV" title="10 or 12 Length Number, Last Character Must be V or X" size="30" value="<?php echo $nic ?>"> </td></tr>
                            <tr><td>9. Mobile Number </td>              <td> : </td><td> <input type="tel" name="mobile" pattern="07[0-9]{8}|N/A" placeholder="eg: 0777123456" title="10 Digit Number, Start with 07xxxxxxxx" size="30" value="<?php echo $mobile ?>"> </td></tr>
                            <tr><td>10. Home Phone </td>                <td> : </td><td> <input type="tel" name="phone" pattern="0[0-9]{9}|N/A" placeholder="eg: 0112123456" title="10 Digit Number, Start with 0xxxxxxxxx" size="30" value="<?php echo $phone ?>"> </td></tr>
                            <tr><td>11. Email </td>                     <td> : </td><td> <input type="email" name="email" placeholder="eg: example@mail.com" size="30" value="<?php echo $email ?>"> </td></tr>
                            
                        </table>
                        </fieldset>
                        <p> If email is N/A, you need to enter a new or else just delete it. </p>
                        <button onclick="goBack()"> Go Back </button>
                        <button type="submit" name="editid" value="<?php echo $editid ?>" > Confirm Edit </button>
                    </form>
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