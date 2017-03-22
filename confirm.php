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
        <title> ABC Hospital OPD - New Patient </title>
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
                <h3> &#127381; Patient Details Confirmation </h3>
                <form action="writedb.php" method="POST">
                    <fieldset>
                        <p> Please read carefully & confirm entered details. </p>
                        <table>
                            <tr><td width="250px">1. Title </td><td> : </td><td> <input type="text" name="title" size="30" value="<?php echo $_POST['title'] ?>" readonly> </td></tr>
                            <tr><td>2. Initials </td><td> : </td><td> <input type="text" name="initials" size="30" value="<?php echo $_POST['initials'] ?>" readonly> </td></tr>
                            <tr><td>3. Names Denoted by Initials </td><td> : </td><td> <input type="text" name="othernames" size="30" value="<?php echo $_POST['othernames'] ?>" readonly> </td></tr>
                            <tr><td>4. Last Name </td><td> : </td><td> <input type="text" name="lname" size="30" value="<?php echo $_POST['lname'] ?>" readonly> </td></tr>
                            <tr><td>5. Date of Birth </td><td> : </td><td> <input type="text" name="dob" size="30" value="<?php echo $_POST['dob'] ?>" readonly> </td></tr>
                            <tr><td>6. Sex </td><td> : </td><td> <input type="text" name="sex" size="30" value="<?php echo $_POST['sex'] ?>" readonly> </td></tr>
                            <tr><td>7. Address </td><td> : </td><td> <input type="text" name="home" size="30" value="<?php echo $_POST['home'] ?>" readonly> </td></tr>
                                        <tr><td> </td><td> : </td><td> <input type="text" name="street" size="30" value="<?php echo $_POST['street'] ?>" readonly> </td></tr>
                                        <tr><td> </td><td> : </td><td> <input type="text" name="city" size="30" value="<?php echo $_POST['city'] ?>" readonly> </td></tr>
                            <tr><td>8. NIC Number </td><td> : </td><td> <input type="text" name="nic" size="30" value="<?php echo $_POST['nic'] ?>" readonly> </td></tr>
                            <tr><td>9. Mobile Number </td><td> : </td><td> <input type="tel" name="mobile" size="30" value="<?php echo $_POST['mobile'] ?>" readonly> </td></tr>
                            <tr><td>10. Home Phone </td><td> : </td><td> <input type="tel" name="phone" size="30" value="<?php echo $_POST['phone'] ?>" readonly> </td></tr>
                            <tr><td>11. Email </td><td> : </td><td> <input type="email" name="email" size="30" value="<?php echo $_POST['email'] ?>" readonly> </td></tr>
                        </table>
                    </fieldset>
                    <p> Once confirmed, above details will be submitted and stored in the database. </p>
                    <button onclick="goBack()"> Go Back to Edit </button>
                    <input type="submit" value="Confirm & Submit">
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