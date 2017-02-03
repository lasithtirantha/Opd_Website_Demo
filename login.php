<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!--script src="JS/javascript.js"></script-->
        <title> ABC Hospital OPD - Home </title>
    </head>

    <body>
        <header>
            <div id="logo-hospital">
                <a href="index.php"><img id="img-hospital" alt="Hospital Logo" src="Image\hospital.png" style="float:left"></a>				
            </div>
            <div id="logo-opd">
                <img id="img-opd" src="Image\logo.png" alt="OPD Logo" style="float:right;padding-top:5px">
            </div>
        </header>

        <nav>
            <ul id="navmenu">
                <li class="nav" style="float:left;padding-left:25px;"><a href="index.php"> &#127968; HOME</a></li>
                <li class="dropdown"style="float:left"><a href="javascript:void(0)" class="dropbtn"> &#128113; PATIENT </a>
                    <div class="dropdown-content">
                        <a href="new.php"> &#127381; NEW PATIENT </a>
                        <a href="search.php"> &#128269; SEARCH PATIENT </a>
                    </div></li>
                <li class="dropdown" style="float:left"><a href="javascript:void(0)" class="dropbtn"> &#127760; USEFUL LINKS</a>
                    <div class="dropdown-content">
                        <a href="http://health.gov.lk/" target="_blank"> &#10010; MINISTRY OF HEALTH </a>
                        <a href="http://www.epid.gov.lk/" target="_blank"> &#128137; EPID UNIT</a>
                        <a href="http://www.fhb.health.gov.lk/" target="_blank"> &#128106; FHB </a>
                        <a href="http://pgim.cmb.ac.lk/" target="_blank"> &#9877; PGIM </a>
                    </div></li>
                <li class="nav" style="float:left"><a href="about.php"> &#128107; ABOUT US </a></li>
                <li class="nav" style="float:left"><a href="contact.php"> &#128241; CONTACT </a></li>
                <li class="nav" style="float:right;padding-right:25px"><a href="login.php"> &#128100; LOG-IN </a></li>
                <li class="nav" style="float:right"><a href="register.php"> &#128100; REGISTER </a></li>
            </ul>
        </nav>
        <div style="position:relative">
        <aside id="sidebar-l" style="float:left">
            <br>
            <h4 style="text-align:center" class="asideheading"> Related Links </h4>
            <ul style="list-style-image:url('Image/bullet.gif');line-height:25px">
                <li class="aside"> <a href="http://www.health.gov.lk/" target="_blank"> Ministry of Health </a></li>
                <li class="aside"> <a href="http://www.epid.gov.lk/" target="_blank"> Epidemiology Unit </a></li>
                <li class="aside"> <a href="http://www.fhb.health.gov.lk/" target="_blank"> Family Health Bureau </a></li>
                <li class="aside"> <a href="http://www.malariacampaign.gov.lk/" target="_blank"> Anti-malaria Campaign </a></li>
                <li class="aside"> <a href="http://www.nptccd.health.gov.lk/" target="_blank"> Tuberculosis Control Programme </a></li>
                <li class="aside"> <a href="http://www.pgim.cmb.ac.lk/" target="_blank"> PGIM </a></li>
            </ul>
            <br>
            <h4 style="text-align:center" class="asideheading"> Useful Links </h4>
            <ul style="list-style-image:url('Image/bullet.gif');line-height:25px">
                    <li class="aside"> <a href="https://www.google.lk" target="_blank"> Google </a></li>
                    <li class="aside"> <a href="https://www.yahoo.com" target="_blank"> Yahoo! </a></li>
                    <li class="aside"> <a href="https://www.wikipedia.org" target="_blank"> Wikipedia </a></li>
                    <li class="aside"> <a href="https://www.facebook.com" target="_blank"> Facebook </a></li>
                    <li class="aside"> <a href="https://www.twitter.com" target="_blank"> Twitter </a></li>
            </ul>
	</aside>
        
        <section style="padding-left:10px;padding-right:10px">
            <h3> Log-In </h3>

        </section>

        <aside id="sidebar-r" style="float:right">
            <img src="Image/ad1.gif" alt="ad1" style="position:absolute">
	</aside>
        </div>
        <footer>
            <table style="width:100%;text-align:center;position:absolute">
                <tr><td colspan=3 style="font-family:calibri;color:whitesmoke;font-weight:500"> Copyright @ MSc in Biomedical Informatics (7<sup>th</sup> Batch) <br> Postgraduate Institute of Medicine <br> Colombo </td></tr>
                <tr><td style="width:33%"> </td>
                    <td style="width:34%">         
                        <a href="https://www.google.lk/" target="_blank"><img src="Image/google.png" alt="Google Icon" style="width:24px;height:24px"></a>
                        <a href="https://yahoo.com/" target="_blank"><img src="Image/yahoo.png" alt="Yahoo! Icon" style="width:24px;height:24px"></a>
                        <a href="https://www.wikipedia.org/" target="_blank"><img src="Image/wiki.png" alt="Wikipedia Icon" style="width:24px;height:24px"></a>
                        <a href="https://www.facebook.com/" target="_blank"><img src="Image/fb.png" alt="Facebook Icon" style="width:24px;height:24px"></a>
                        <a href="https://twitter.com/" target="_blank"><img src="Image/twitter.png" alt="Twitter Icon" style="width:24px;height:24px"></a>
                        <a href="https://www.youtube.com/" target="_blank"><img src="Image/youtube.png" alt="YouTube Icon" style="width:24px;height:24px"></a></td>
                    <td style="width:33%">  </td></tr>
            </table>
        </footer>
    </body>
</html>