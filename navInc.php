<nav>
    <!--Unordered List for Horizontal Navigation Menu-->
    <ul id="navmenu">
        <li class="nav" style="float:left;padding-left:25px;"><a href="index.php"> &#127968; HOME</a></li>
        <li class="dropdown"style="float:left"><a href="javascript:void(0)" class="dropbtn"> &#128113; PATIENT </a>
            <div class="dropdown-content">
                <a href="new.php"> &#127381; NEW PATIENT </a>
                <a href="search.php"> &#128269; SEARCH PATIENT </a>
            </div></li>
        <li class="dropdown" style="float:left"><a href="javascript:void(0)" class="dropbtn"> &#127760; WEB LINKS</a>
            <div class="dropdown-content">
                <a href="http://health.gov.lk/" target="_blank"> &#10010; MINISTRY OF HEALTH </a>
                <a href="http://www.epid.gov.lk/" target="_blank"> &#128137; EPID UNIT</a>
                <a href="http://www.fhb.health.gov.lk/" target="_blank"> &#128106; FHB </a>
                <a href="http://pgim.cmb.ac.lk/" target="_blank"> &#9877; PGIM </a>
            </div></li>
        <li class="nav" style="float:left"><a href="about.php"> &#128107; ABOUT US </a></li>
        <li class="nav" style="float:left"><a href="contact.php"> &#128241; CONTACT </a></li>
        <li class="nav" style="float:right;padding-right:25px"><a href="login.php"> &#128100; 
                <?php
                // to show log in or out according to the whether logged in or not
                if ($_SESSION['authuser'] == 0) {
                    echo 'LOG IN';
                }
                if ($_SESSION['authuser'] == 1) {
                    echo 'LOG OUT';
                }
                if ($_SESSION['authuser'] == 2) {
                    echo 'LOG IN';
                }
                ?> </a></li>
        <li class="nav" style="float:right"><a href="help.php"> &#128218; HELP </a></li>
    </ul>
</nav>