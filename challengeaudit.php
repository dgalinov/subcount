<?php
// Connect to the file that access to BD
require("db_connection.php");
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
        <meta name="robots" content="noindex">
        <title>TELANTO</title>
        <meta property="og:title" content="TELANTO - The Global Academic Business Network">
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://telanto.com">
        <meta property="og:image" content="https://abc.telanto.com/assets/img/telanto_shareimage.jpg">
        <meta property="og:description" content="Connecting company projects to students anywhere in the world">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:url" content="https://telanto.com">
        <meta name="twitter:title" content="TELANTO - The Global Academic Business Network">
        <meta name="twitter:description" content="Connecting company projects to students anywhere in the world">
        <meta name="twitter:image" content="https://abc.telanto.com/assets/img/telanto_shareimage.jpg">
        <meta name="twitter:site" content="@telanto">
        <link rel="apple-touch-icon" sizes="180x180" href="https://abc.telanto.com/assets/img/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="https://abc.telanto.com/assets/img/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="https://abc.telanto.com/assets/img/favicon-194x194.png" sizes="194x194">
        <link rel="icon" type="image/png" href="https://abc.telanto.com/assets/img/android-chrome-192x192.png"
              sizes="192x192 /">
        <link rel="icon" type="image/png" href="https://abc.telanto.com/assets/img/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="https://abc.telanto.com/assets/img/manifest.json">
        <link rel="mask-icon" href="https://abc.telanto.com/assets/img/safari-pinned-tab.svg" color="#08c">
        <meta name="theme-color" content="#08c">
        <meta name="msapplication-navbutton-color" content="#08c">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <link rel="apple-touch-startup-image" href="ihttps://abc.telanto.com/assets/img/android-chrome-192x192.png">
        <meta name="apple-mobile-web-app-status-bar-style" content="#08c">
        <link rel="shortcut icon" type="image/x-icon" href="https://abc.telanto.com/assets/img/favicon.ico">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
              integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
              crossorigin="anonymous">
        <script src="ckeditor/ckeditor.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <script src="js/multiselect.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
        <link rel="stylesheet" type="text/css" media="screen"
              href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="./css/prettify-1.0.css" rel="stylesheet">
        <link href="./css/base.css" rel="stylesheet">
        <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css"
              rel="stylesheet">
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
        <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            // This is the script of the date picker, calendar
            document.addEventListener('DOMContentLoaded', function () {
                $(function () {
                    $("#datepicker").datepicker();
                });
            });

        </script>
    </head>
    <body>
    <?php

    // When you introduce information you automatic reload the page to see the new content, but doesn't work.

    /*if ($_POST) {
        $url = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header("Location: " . $url);
    }*/
    ?>
    <!-- Horizontal menu that have the routes of the diferent websides with button create New Email and button Show History -->
    <div class="topnavS" id="myTopnavS">
        <a href="index.php">Newsletter</a>
        <a class="active" href="challengeaudit.php">Challenge Audit</a>
        <a href="webinars.php">Webinars</a>
        <a href="blog.php">Blog</a>
        <a href="Now.php">Now</a>
        <!-- Button of the Popup of Show History -->
        <a id="myBtn2">Show History</a>
        <div id="myModal2" class="modal2">
            <div class="modal-content">
                <div class="modal2-header">
                    <span class="close2">&times;</span>
                    <h2>History</h2>
                </div>
                <div class="modal2-body">
                    <table class='table'>
                        <thead class="thead-dark">
                        <tr>
                            <th scope='col'>ID</th>
                            <th scope='col'>TIME</th>
                            <th scope='col'>FROM</th>
                            <th scope='col'>TO</th>
                            <th scope='col'>SUBJECT</th>
                            <th scope='col'>CONTENT</th>
                        </tr>
                        </thead>
                        <?php
                        $queryShow = "SELECT * FROM challengeAuditRecords";

                        if (!$resultShow = mysqli_query($con, $queryShow)) {
                            exit(mysqli_error($con));
                        } else {
                            while ($rowShow = mysqli_fetch_assoc($resultShow)) {
                                echo "
                
                    <tbody>
                        <tr>
                            <th scope='row'>" . $rowShow['id'] . "</th>
                            <td>" . $rowShow['timeInserted'] . "</td>
                            <td>" . $rowShow['sendFrom'] . "</td>
                            <td>" . $rowShow['sendTo'] . "</td>
                            <td>" . $rowShow['subject'] . "</td>
                            <td>" . $rowShow['content'] . "</td>
                        </tr>
                    
                ";
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal2-footer">
                    <h3></h3>
                </div>
            </div>
        </div>
        <script>
            var modal2 = document.getElementById('myModal2');
            var btn2 = document.getElementById("myBtn2");
            var span2 = document.getElementsByClassName("close2")[0];
            btn2.onclick = function () {
                modal2.style.display = "block";
            }
            span2.onclick = function () {
                modal2.style.display = "none";
            }
            window.onclick = function (event) {
                if (event.target == modal2) {
                    modal2.style.display = "none";
                }
            }
        </script>
        <!-- Button of the Popup of New Email -->
        <a id="myBtn">New Email</a>
        <div id="myModal" class="modal">
            <div class="modal-content" id="NewEmailStyle">
                <div class="modal-header">
                    <h2>Email Register</h2>
                    <span class="close">&times;</span>
                </div>
                <div class="modal-body">
                    <form method="post" action="index.php">
                        <input type="text" id="fname" name="emailSS" placeholder="Input email" class="EMAILStyle">
                        <input type="password" id="fname" name="passwordSS" placeholder="Input password"
                               class="PSSWStyle">
                        <input type="submit" class="buttonSaveSequence" name="action" value="New Email">
                    </form>
                </div>
                <div class="modal-footer">
                    <h3></h3>
                </div>
            </div>
        </div>
        <script>
            var modal = document.getElementById('myModal');
            var btn = document.getElementById("myBtn");
            var span = document.getElementsByClassName("close")[0];
            btn.onclick = function () {
                modal.style.display = "block";
            }
            span.onclick = function () {
                modal.style.display = "none";
            }
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <!-- Button Create Campaign, is a popup -->
    <div id="myModal3" class="modal3">
        <div class="modal-content" id="NewEventStyle">
            <div class="modal3-header">
                <span class="close3">&times;</span>
                <h2>Create Campaign</h2>
            </div>
            <div class="modal3-body">
                <form method="post" action="index.php">
                    <input type="text" id="fname" name="NameEvent" placeholder="Input Name Event"
                           class="EventoCreating">
                    <input type="submit" class="buttonSaveSequence" name="action" value="New">
                </form>
            </div>
            <div class="modal3-footer">
                <h3></h3>
            </div>
        </div>
    </div>
    <!-- Show the div for creating of new step -->
    <div class="sidenav">
        <a id="myBtn3">New Campaign</a>
        <a id='myBtn3' onclick='newStep()'>New Step</a>
        <script>
            var modal3 = document.getElementById('myModal3');
            var btn3 = document.getElementById("myBtn3");
            var span3 = document.getElementsByClassName("close3")[0];
            btn3.onclick = function () {
                modal3.style.display = "block";
            }
            span3.onclick = function () {
                modal3.style.display = "none";
            }
            window.onclick = function (event) {
                if (event.target == modal3) {
                    modal3.style.display = "none";
                }
            }
        </script>
        <?php
        $query = "SELECT * FROM challengeAuditMail ORDER BY id DESC";
        $queryButton = "SELECT * FROM challengeAuditEvents ORDER BY id DESC";
        if (!$resultButton = mysqli_query($con, $queryButton)) {
            exit(mysqli_error($con));
        } else {
            if (mysqli_num_rows($resultButton) > 0) {
                while ($rowButton = mysqli_fetch_assoc($resultButton)) {
                    echo "<button class='dropdown-btn'>" . $rowButton['evento'] . "<i class='fa fa-caret-down'></i> </button><div class='dropdown-container'>";
                    if (!$result = mysqli_query($con, $query)) {
                        exit(mysqli_error($con));
                    } else {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $idComparado = $row['id'];
                                // Show the list of events
                                if ($row['evento'] == $rowButton['evento']) {
                                    echo "<a  onclick='onStepClicked($idComparado)'>" . $row['subject'] . "</a>";
                                }
                            }
                            echo "<input type='hidden' id='stepsNum' value='" . mysqli_num_rows($result) . "'>";
                        }
                    }
                    echo "</div>";
                }
            }
        }
        ?>
    </div>
    <!-- Script display and show div -->
    <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
    </script>
    <!-- MENU OF THE FILTERS -->
    <div class="main">
        <div class="container">
            <form method="post" action="index.php">
                <div class="row">
                    <div class="col-">
                        <!-- Change the format of the sequence -->
                        <div class="selectDateDay">
                            <label>
                                <select id="hideDateDay" name="dateDay">
                                    <option onclick="showDay()" value="DayChoose">Day</option>
                                    <option onclick="showDate()" value="DateChoose">Date</option>
                                </select>
                            </label>
                        </div>

                    </div>
                    <div class="col-">
                        <div id="hiddenDay">
                            <!-- Selector of the days of the week -->
                            <label for="dias"><select id="dias" name="dias[]" class="selectpicker" multiple
                                                      data-live-search="true">
                                    <?php
                                    $mSelected = $tSelected = $wSelected = $thSelected = $fSelected = $sSelected = $suSelected = "";
                                    $query = "SELECT days FROM challengeAuditCron ";
                                    if (!$result = mysqli_query($con, $query)) {
                                        exit(mysqli_error($con));
                                    } else {
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                // The last update this will show it
                                                $arrayDias = explode(",", $row['days']);
                                                if (in_array("Monday", $arrayDias)) {
                                                    $mSelected = "selected='selected'";
                                                } else {
                                                    $mSelected = "";
                                                }
                                                if (in_array("Tuesday", $arrayDias)) {
                                                    $tSelected = "selected='selected'";
                                                } else {
                                                    $tSelected = "";
                                                }
                                                if (in_array("Wednesday", $arrayDias)) {
                                                    $wSelected = "selected='selected'";
                                                } else {
                                                    $wSelected = "";
                                                }
                                                if (in_array("Thursday", $arrayDias)) {
                                                    $thSelected = "selected='selected'";
                                                } else {
                                                    $thSelected = "";
                                                }
                                                if (in_array("Friday", $arrayDias)) {
                                                    $fSelected = "selected='selected'";
                                                } else {
                                                    $fSelected = "";
                                                }
                                                if (in_array("Saturday", $arrayDias)) {
                                                    $sSelected = "selected='selected'";
                                                } else {
                                                    $sSelected = "";
                                                }
                                                if (in_array("Sunday", $arrayDias)) {
                                                    $suSelected = "selected='selected'";
                                                } else {
                                                    $suSelected = "";
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                    <option <?php echo $mSelected ?> value="Monday">Monday</option>
                                    <option <?php echo $tSelected ?> value="Monday">Tuesday</option>
                                    <option <?php echo $wSelected ?> value="Monday">Wednesday</option>
                                    <option <?php echo $thSelected ?> value="Monday">Thursday</option>
                                    <option <?php echo $fSelected ?> value="Monday">Friday</option>
                                    <option <?php echo $sSelected ?> value="Monday">Saturday</option>
                                    <option <?php echo $suSelected ?> value="Monday">Sunday</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="col-">
                        <div id="hiddenDate">
                            <!-- You have a input area to introduce by text the date or click que icon of calendar to show a calendar and choose the day/month/year -->
                            <label for="datepicker" class="datePickLabel">
                                <input type="text" id="datepicker" name="dateBBB">
                                <img src="https://proxy.duckduckgo.com/iu/?u=http%3A%2F%2Fedgefunders.org%2Fwp-content%2Fuploads%2F2016%2F07%2FICEF_icon-calendar.png&f=1"
                                     id="input_img" alt="icon" width="52em" height="44em">
                            </label>
                        </div>
                    </div>
                    <div class="col-">
                        <div class="form-group">
                            <!-- Select the Hour and Minuts (This format is changed in SendMailerChallengeAudit.php or other) the format is "11:02 PM"-->
                            <div class='input-group date' id='datetimepicker3'>
                                <input type='text' id="timename" name="tpick" class="form-control" value="
                                <?php
                                $query = "SELECT timePicker FROM challengeAuditCron ";
                                if (!$result = mysqli_query($con, $query)) {
                                    exit(mysqli_error($con));
                                } else {
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo $row['timePicker'];
                                        }
                                    }
                                }
                                ?>"/>
                                <span class="input-group-addon" style="background: #fff; border: none;">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                            </div>
                        </div>
                        <!-- Script of the time picker -->
                        <script type="text/javascript">
                            $(function () {
                                $('#datetimepicker3').datetimepicker({
                                    format: 'LT'
                                });
                            });
                        </script>
                    </div>

                    <div class="col-">
                        <label for="mails">
                            <!-- Selector of the email from -->
                            <select id="mails" name="mails[]" class="selectpicker" <!--multiple--> data-live-search="true">
                            <?php
                            $query = "SELECT * FROM emails ORDER BY id DESC";
                            if (!$result = mysqli_query($con, $query)) {
                                exit(mysqli_error($con));
                            } else {
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if ($row['email'] == "challengeaudit@telanto.com") {
                                            // This default set the email you will see
                                            echo "<option selected='selected'>" . $row['email'] . "</option>";
                                        } else {
                                            echo "<option>" . $row['email'] . "</option>";
                                        }
                                    }
                                }
                            }

                            ?>
                            </select>
                        </label>
                    </div>
                    <div class="col-">
                        <label for="mails">
                            <!-- MULTI-SELECT OF INDUSTRY -->
                            <select id="industry" name="industry[]" class="selectpicker" multiple
                                    data-live-search="true" title="Industry">
                                <option value="Primary/Secondary Education">Primary/Secondary Education</option>
                                <option value="Higher Education">Higher Education</option>
                                <option value="Education Management">Education Management</option>
                                <option value="Research">Research</option>
                                <option value="E-Learning">E-Learning</option>
                                <option value="Farming">Farming</option>
                                <option value="Ranching">Ranching</option>
                                <option value="Dairy">Dairy</option>
                                <option value="Fishery">Fishery</option>
                                <option value="Automotive">Automotive</option>
                                <option value="Aviation & Aerospace">Aviation & Aerospace</option>
                                <option value="Airlines/Aerospace">Airlines/Aerospace</option>
                                <option value="Chemicals">Chemicals</option>
                                <option value="Construction">Construction</option>
                                <option value="Building Materials">Building Materials</option>
                                <option value="Architecture & Planning">Architecture & Planning</option>
                                <option value="Civil Engineering">Civil Engineering</option>
                                <option value="Mechanical or Industrial Engineering">Mechanical or Industrial
                                    Engineering
                                </option>
                                <option value="Glass, Ceramics & Concrete">Glass, Ceramics & Concrete</option>
                                <option value="Industrial Automation">Industrial Automation</option>
                                <option value="Cosmetics">Cosmetics</option>
                                <option value="Apparel & Fashion">Apparel & Fashion</option>
                                <option value="Sporting Goods">Sporting Goods</option>
                                <option value="Tobacco">Tobacco</option>
                                <option value="Supermarkets">Supermarkets</option>
                                <option value="Food Production">Food Production</option>
                                <option value="Consumer Electronics">Consumer Electronics</option>
                                <option value="Consumer Goods">Consumer Goods</option>
                                <option value="Furniture">Furniture</option>
                                <option value="Retail">Retail</option>
                                <option value="Food & Beverages">Food & Beverages</option>
                                <option value="Electrical/Electronic MAnufacturing">Electrical/Electronic
                                    MAnufacturing
                                </option>
                                <option value="Wholesale">Wholesale</option>
                                <option value="Wine and Spirits">Wine and Spirits</option>
                                <option value="Luxury Good & Jewelry">Luxury Good & Jewelry</option>
                                <option value="Packaging and Containers">Packaging and Containers</option>
                                <option value="Defense & Space">Defense & Space</option>
                                <option value="Banking">Banking</option>
                                <option value="Insurance">Insurance</option>
                                <option value="Financial Services">Financial Services</option>
                                <option value="Investment Banking">Investment Banking</option>
                                <option value="Investment Management">Investment Management</option>
                                <option value="Accounting">Accounting</option>
                                <option value="Venture Capital & Private Equity">Venture Capital & Private Equity
                                </option>
                                <option value="Capital Markets">Capital Markets</option>
                                <option value="Medical Practice">Medical Practice</option>
                                <option value="Hospital & Health Care">Hospital & Health Care</option>
                                <option value="Pharmaceuticals">Pharmaceuticals</option>
                                <option value="Veterinary">Veterinary</option>
                                <option value="Medical Devices">Medical Devices</option>
                                <option value="Health,Wellness and Fitness">Health,Wellness and Fitness</option>
                                <option value="Alternative Medicine">Alternative Medicine</option>
                                <option value="Mental Health Care">Mental Health Care</option>
                                <option value="Computer Hardware">Computer Hardware</option>
                                <option value="Computer Software">Computer Software</option>
                                <option value="Computer Networking">Computer Networking</option>
                                <option value="Internet">Internet</option>
                                <option value="Semiconductors">Semiconductors</option>
                                <option value="Biotechnology">Biotechnology</option>
                                <option value="Information Technology and Services">Information Technology and
                                    Services
                                </option>
                                <option value="Nanotechnology">Nanotechnology</option>
                                <option value="Computer & Network Security">Computer & Network Security</option>
                                <option value="Wireless">Wireless</option>
                                <option value="Human Resources">Human Resources</option>
                                <option value="Import and Export">Import and Export</option>
                                <option value="Law Practice">Law Practice</option>
                                <option value="Legal Services">Legal Services</option>
                                <option value="Alternative Dispute Resolution">Alternative Dispute Resolution</option>
                                <option value="Logistics and Supply Chain">Logistics and Supply Chain</option>
                                <option value="Machinery">Machinery</option>
                                <option value="Shipbuilding">Shipbuilding</option>
                                <option value="Textiles">Textiles</option>
                                <option value="Paper & Forest Products">Paper & Forest Products</option>
                                <option value="Railroad Manufacture">Railroad Manufacture</option>
                                <option value="Plastics">Plastics</option>
                                <option value="Business Supplies and Equipment">Business Supplies and Equipment</option>
                                <option value="Marketing and Advertising">Marketing and Advertising</option>
                                <option value="Market Research">Market Research</option>
                                <option value="Public Relations and Communications">Public Relations and
                                    Communications
                                </option>
                                <option value="Events Services">Events Services</option>
                                <option value="Mining & Metals">Mining & Metals</option>
                                <option value="Oil & Energy">Oil & Energy</option>
                                <option value="Management Consulting">Management Consulting</option>
                                <option value="Environment Services">Environment Services</option>
                                <option value="Individual & Family Services">Individual & Family Services</option>
                                <option value="Consumer Services">Consumer Services</option>
                                <option value="Program Development">Program Development</option>
                                <option value="Staffing and Recruiting">Staffing and Recruiting</option>
                                <option value="Professional Training & Coaching">Professional Training & Coaching
                                </option>
                                <option value="Translation and Localization">Translation and Localization</option>
                                <option value="Security and Investigations">Security and Investigations</option>
                                <option value="Facilities Servies">Facilities Servies</option>
                                <option value="Outsourcing/Offshoring">Outsourcing/Offshoring</option>
                                <option value="Military">Military</option>
                                <option value="Legislative Office">Legislative Office</option>
                                <option value="Judiciary">Judiciary</option>
                                <option value="International Affairs">International Affairs</option>
                                <option value="Government Administration">Government Administration</option>
                                <option value="Executive Office">Executive Office</option>
                                <option value="Law Enforcement">Law Enforcement</option>
                                <option value="Public Safety">Public Safety</option>
                                <option value="Public Policy">Public Policy</option>
                                <option value="Religious Institutions">Religious Institutions</option>
                                <option value="Civic & Social Organization">Civic & Social Organization</option>
                                <option value="Non-Profit Organization Management">Non-Profit Organization Management
                                </option>
                                <option value="Fund-Raising">Fund-Raising</option>
                                <option value="Political Organization">Political Organization</option>
                                <option value="Think Tanks">Think Tanks</option>
                                <option value="Philanthropy">Philanthropy</option>
                                <option value="International Trade and Development">International Trade and
                                    Development
                                </option>
                                <option value="Government Relations">Government Relations</option>
                                <option value="Real Estate">Real Estate</option>
                                <option value="Commercial Real Estate">Commercial Real Estate</option>
                                <option value="Renewables & Environment">Renewables & Environment</option>
                                <option value="Entertainment">Entertainment</option>
                                <option value="Gambling & Casinos">Gambling & Casinos</option>
                                <option value="Sports">Sports</option>
                                <option value="Motion Pictures and Film">Motion Pictures and Film</option>
                                <option value="Broadcast Media">Broadcast Media</option>
                                <option value="Museums ad Institutions">Museums ad Institutions</option>
                                <option value="Fine Art">Fine Art</option>
                                <option value="Performing Arts">Performing Arts</option>
                                <option value="Recreatingal Facilities and Services">Recreatingal Facilities and
                                    Services
                                </option>
                                <option value="Newspapers">Newspapers</option>
                                <option value="Publishing">Publishing</option>
                                <option value="Printing">Printing</option>
                                <option value="Information Services">Information Services</option>
                                <option value="Libraries">Libraries</option>
                                <option value="Design">Design</option>
                                <option value="Writing and Editing">Writing and Editing</option>
                                <option value="Computer Games">Computer Games</option>
                                <option value="Arts and Crafts">Arts and Crafts</option>
                                <option value="Online Media">Online Media</option>
                                <option value="Music">Music</option>
                                <option value="Media Production">Media Production</option>
                                <option value="Animation">Animation</option>
                                <option value="Photography">Photography</option>
                                <option value="Graphic Design">Graphic Design</option>
                                <option value="Telecommunications">Telecommunications</option>
                                <option value="Package/Freight Delivery">Package/Freight Delivery</option>
                                <option value="Transportation/Trucking/Railroad">Transportation/Trucking/Railroad
                                </option>
                                <option value="Warehousing">Warehousing</option>
                                <option value="Maritime">Maritime</option>
                                <option value="Leisure, Travel & Tourism">Leisure, Travel & Tourism</option>
                                <option value="Hospitality">Hospitality</option>
                                <option value="Restaurants">Restaurants</option>
                                <option value="Utilities">Utilities</option>
                            </select>
                        </label>
                    </div>
                    <div class="col-">
                        <label for="mails">
                            <!-- MULTI-SELECT OF PREFERENCES -->
                            <select id="preferences" name="preferences[]" class="selectpicker" multiple
                                    data-live-search="true" title="Preferences">
                                <option disabled class="CantChoose">Management</option>
                                <option value="Strategic / Digital Transformation">Strategic / Digital Transformation
                                </option>
                                <option value="New Business Development & Entrepreneurship">New Business Development &
                                    Entrepreneurship
                                </option>
                                <option value="Business Model Innovation">Business Model Innovation</option>
                                <option value="Innovation Management">Innovation Management</option>
                                <option value="Business Planning & Consulting">Business Planning & Consulting</option>
                                <option value="Industry 4.0">Industry 4.0</option>
                                <option value="Internationalization & Growth Strategy">Internationalization & Growth
                                    Strategy
                                </option>
                                <option value="Law & Tax">Law & Tax</option>
                                <option disabled class="CantChoose">Sustainability</option>
                                <option value="Circular Economy">Circular Economy</option>
                                <option value="Social Enterprise / Innovation">Social Enterprise / Innovation</option>
                                <option value="Sustainable Entrepreneurship">Sustainable Entrepreneurship</option>
                                <option value="Smart City / Building">Smart City / Building</option>
                                <option value="Environment & Corporate Social Responsibility">Environment & Corporate
                                    Social Responsibility
                                </option>
                                <option disabled class="CantChoose">Marketing</option>
                                <option value="New Product / Service Development">New Product / Service Development
                                </option>
                                <option value="Consumer Behaviour 4.0">Consumer Behaviour 4.0</option>
                                <option value="Communication & Advertising">Communication & Advertising</option>
                                <option value="New Market Entry / New Product Launch">New Market Entry / New Product
                                    Launch
                                </option>
                                <option value="Brand Management">Brand Management</option>
                                <option value="Media - Gaming - Entertainment">Media - Gaming - Entertainment</option>
                                <option disabled class="CantChoose">Computer Science</option>
                                <option value="Security - Cybersecurity & IT">Security - Cybersecurity & IT</option>
                                <option value="Project & Service Management">Project & Service Management</option>
                                <option value="Experience & Product Design">Experience & Product Design</option>
                                <option value="App & Platform Development">App & Platform Development</option>
                                <option value="Building Information Modeling">Building Information Modeling</option>
                                <option value="Blockchain">Blockchain</option>
                                <option value="Hard- & Software IoT">Hard- & Software IoT</option>
                                <option value="Virtual & Augmented Reality">Virtual & Augmented Reality</option>
                                <option disabled class="CantChoose">Human Resources</option>
                                <option value="Future of Work">Future of Work</option>
                                <option value="Learning & Development">Learning & Development</option>
                                <option value="Employer Branding - Acquisition & Retention">Employer Branding -
                                    Acquisition & Retention
                                </option>
                                <option value="Employee Engagement">Employee Engagement</option>
                                <option value="Health & Safety">Health & Safety</option>
                                <option value="Organizational Design">Organizational Design</option>
                                <option disabled class="CantChoose">Data Science</option>
                                <option value="Machine Learning">Machine Learning</option>
                                <option value="Artificial Intelligence">Artificial Intelligence</option>
                                <option value="Data Modeling & Visualization">Data Modeling & Visualization</option>
                                <option value="Business Data Management & Analysis">Business Data Management &
                                    Analysis
                                </option>
                                <option value="Decision Support Systems">Decision Support Systems</option>
                                <option disabled class="CantChoose">Finance</option>
                                <option value="Cryptocurrency">Cryptocurrency</option>
                                <option value="International Trade & Finances">International Trade & Finances</option>
                                <option value="Accounting & Corporate Finance">Accounting & Corporate Finance</option>
                                <option value="Procurement">Procurement</option>
                                <option disabled class="CantChoose">Engineering</option>
                                <option value="Robotics & Drones">Robotics & Drones</option>
                                <option value="Autonomous vehicles">Autonomous vehicles</option>
                                <option value="Electric / Hybrid engine">Electric / Hybrid engine</option>
                                <option value="Chemical process optimization">Chemical process optimization</option>
                                <option value="Biotechnical / -medical Engineering">Biotechnical / -medical
                                    Engineering
                                </option>
                                <option value="Pharmacology Research">Pharmacology Research</option>
                                <option value="Wearables - Materials & Process Design">Wearables - Materials & Process
                                    Design
                                </option>
                                <option value="Biostatistics">Biostatistics</option>
                                <option value="Emerging Technology Evaluation & Management">Emerging Technology
                                    Evaluation & Management
                                </option>
                                <option value="Energy & Clean-tech">Energy & Clean-tech</option>
                                <option value="Aero- / Space Technology">Aero- / Space Technology</option>
                                <option disabled class="CantChoose">Logistics, Supply Chain &
                                    Operations
                                </option>
                                <option value="Logistics & Transportation">Logistics & Transportation</option>
                                <option value="Closed-loop supply chain & Remanufacturing">Closed-loop supply chain &
                                    Remanufacturing
                                </option>
                                <option value="Forecast - Demand - Inventory">Forecast - Demand - Inventory</option>
                                <option value="Supply Chain Management">Supply Chain Management</option>
                                <option value="Operations & Plant simulation">Operations & Plant simulation</option>
                                <option value="Supplier Networks">Supplier Networks</option>
                            </select>
                        </label>
                    </div>
                    <div class="col-">
                        <label for="eventoChoose">
                            <div class="dropdown bootstrap-select">
                                <!-- Event Selector -->
                                <select id="eventoChoose" name="eventoChoose" class="selectpicker">
                                    <?php
                                    $query = "SELECT * FROM challengeAuditEvents";
                                    $eventoSelected = "";
                                    if (!$result = mysqli_query($con, $query)) {
                                        exit(mysqli_error($con));
                                    } else {
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option>" . $row['evento'] . "</option>";
                                                $eventoSelected = $row['evento'];
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                        </label>
                    </div>
                    <div id="hiddenStep">
                        <div class="col-">
                            <label for="stepChoose">
                                <!-- Step chooser, only appear when date format is selected -->
                                <select id="stepChoose" name="stepChoose" class="selectpicker">
                                    <?php
                                    $query = "SELECT * FROM challengeAuditMail";
                                    if (!$result = mysqli_query($con, $query)) {
                                        exit(mysqli_error($con));
                                    } else {
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option>" . $row['subject'] . "</option>";
                                            }
                                        }
                                    }

                                    ?>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="col-">
                        <!-- Button submit of the filter (its an update) -->
                        <input type="submit" class="buttonSaveSequence" name="action" value="Add Filter">
                    </div>
                </div>
        </div>
        <section class="indent-1">
            <form action="index.php" method="post">
                <section class="sectionMails" id="new">
                    <label for="event">
                        <!-- Show all the events that ar introduced in a SELECT -->
                        <select id="event" name="Eventos" class="custom-select">
                            <?php
                            $query = "SELECT * FROM challengeAuditEvents";
                            if (!$result = mysqli_query($con, $query)) {
                                exit(mysqli_error($con));
                            } else {
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option>" . $row['evento'] . "</option>";
                                    }
                                }
                            }
                            ?>
                        </select>
                    </label>
                    <!-- Text Area of the Subject -->
                    <p>Email Subject</p>
                    <label class='labelEmail'>
                        <textarea class='labelEmail' name="subject" id="NewLabelEmail"></textarea>
                    </label>
                    <!-- Email text area of the content with custom parameters(template -- CKEDITOR) -->
                    <p>Email Content</p>
                    <label class='labelEmail'>
                        <textarea class="ckeditor" name="content"></textarea>
                    </label>
                    <input type="submit" class="buttonStartSave" name="action" value="Create">
                </section>
            </form>
            <?php
            // SHOW THE STEP WITH THE TEXT AREAS FIELD COMPLETED BY THE INFORMATION INTRODUCED (The id is very important to follow the order of AI)
            $idComparar = "";
            $query = "SELECT * FROM challengeAuditMail ";
            if (!$result = mysqli_query($con, $query)) {
                exit(mysqli_error($con));
            } else {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $idComparar = $row['id'];
                        echo "
                        <form action='index.php' method='post'>
                        <section style='width: 90%;display:none;' class='sectionMails' id='" . $idComparar . "'>
                                <div id='" . $idComparar . "'>
                                    <p>Email Subject</p>
                                    <label class='labelEmail'>
                                        <textarea class='labelEmail' id='ExistLabelEmail' name='subject_" . $row['id'] . "'>" . $row['subject'] . "</textarea>
                                    </label>
                                    <p>Email Content</p>
                                    <label class='labelEmail'>
                                        <textarea class='ckeditor' name='content_" . $row['id'] . "'>" . $row['content'] . "</textarea>
                                    </label>
                                    <br>
                                    <input type='submit' class='buttonStartSave' name='action' value='Save'>
                                    <input type='hidden' name='action' value='" . $row['id'] . "'>
                                </div>
                        </section>
                        </form>
                         ";
                    }
                    echo "<input type='hidden' value='" . mysqli_num_rows($result) . "' id='actualStep' name='actualStep'>";
                }
            }
            ?>
            <script>
                var stepsNum = document.getElementById("stepsNum").value;
                onStepClicked("new");
                <!-- Show hide steps -->
                function onStepClicked(id) {
                    if (id != "new") {
                        document.getElementById("new").style.display = "none";
                    }
                    var i;
                    for (i = 1; i < stepsNum + 1; i++) {
                        if (i != id) {
                            document.getElementById(i).style.display = "none";
                        } else {
                            document.getElementById(i).style.display = "block";
                            document.getElementById("actualStep").value = id;
                        }
                    }
                }
                <!-- Div of new step show -->
                function newStep() {
                    document.getElementById("new").style.display = "block";
                    var i;
                    for (i = 1; i < stepsNum + 1; i++) {
                        document.getElementById(i).style.display = "none";
                    }
                }
            </script>
        </section>
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("myTopnavS");
            if (x.className === "topnavS") {
                x.className += " responsive";
            } else {
                x.className = "topnavS";
            }
        }
        // Show format when day is selected and hide other
        function showDay() {
            var x = document.getElementById("hiddenDay");
            var y = document.getElementById("hiddenDate");
            var z = document.getElementById("hiddenStep");
            x.style.display = "block";
            y.style.display = "none";
            z.style.display = "none";
        }
        // Show format when date is selected and hide other
        function showDate() {
            var x = document.getElementById("hiddenDay");
            var y = document.getElementById("hiddenDate");
            var z = document.getElementById("hiddenStep");
            y.style.display = "block";
            x.style.display = "none";
            z.style.display = "block";
        }
    </script>
    </body>
    </html>
<?php
if ($_POST) {
    // This post is for the Creation of new step
    if ($_POST['action'] == 'Create') {
        if (!empty($_POST['subject'])) {
            if (!empty($_POST['content'])) {
                $content = $_POST['content'];
                $subject = $_POST['subject'];
                $evento = $_POST['Eventos'];
                $query = mysqli_query($con, "INSERT INTO challengeAuditMail(evento, content, subject) VALUES ('$evento','$content', '$subject')");
            }
        }
    }
    // This post is for the update of X step
    if ($_POST['action']) {
        if (!empty($_POST['subject_' . $_POST['action']])) {
            if (!empty($_POST['content_' . $_POST['action']])) {
                $actualStep = $_POST['action'];
                $query = "UPDATE challengeAuditMail SET subject = '" . $_POST['subject_' . $actualStep] . "', content = '" . $_POST['content_' . $actualStep] . "' WHERE id = " . $actualStep;
                if ($result = mysqli_query($con, $query)) {

                } else {
                    echo "ERROR WHILE UPDATING" . mysqli_error($con);
                }
            }
        }
    }
    // This post is for the creation of new email
    if ($_POST['action'] == 'New Email') {
        $emailA = $_POST['emailSS'];
        $passwordA = $_POST['passwordSS'];
        if (!empty($emailA)) {
            if (preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $emailA)) {
                if (!empty($passwordA)) {
                    if ((strlen($_POST["passwordSS"]) >= '8') && (preg_match("#[0-9]+#", $passwordA)) && (preg_match("#[A-Z]+#", $passwordA)) && (preg_match("#[a-z]+#", $passwordA))) {
                        $query = "INSERT INTO `emails`(`email`,`password`) VALUES ('$emailA','$passwordA');";
                        if ($result = mysqli_query($con, $query)) {
                            echo "New email succesfully created";
                        }
                    } else {
                        echo "Password must be valid!";
                    }
                } else {
                    echo "Password can't be null!";
                }
            } else {
                echo "Email is not valid!";
            }
        } else {
            echo "Email can't be null!";
        }
    }
    // Update or add the filter selected
    if ($_POST['action'] == 'Add Filter') {
        $timeP = $_POST['tpick'];

        $preferences = array(
            implode(",", $_POST['dias'])
        );
        $preferences = array_filter($preferences, 'strlen');
        $preferences = implode(",", $preferences);

        $preferencesEmails = array(
            implode(",", $_POST['mails'])
        );

        $preferencesEmails = array_filter($preferencesEmails, 'strlen');

        $preferencesEmails = implode(",", $preferencesEmails);
        $dateFormated = explode("/", $_POST['dateBBB']);
        $preferencesSS = array(
            implode(",", $_POST['preferences']));

        $preferencesSS = array_filter($preferencesSS, 'strlen');

        $preferencesSS = implode(",", $preferencesSS);
        $preferencesSS = "";
        $preferencesZZ = array(
            implode(",", $_POST['industry']));

        $preferencesZZ = array_filter($preferencesZZ, 'strlen');

        $preferencesZZ = implode(",", $preferencesZZ);
        $eventPost = $_POST['eventoChoose'];

        $stepPost = $_POST['stepChoose'];

        $queryA = "SELECT * FROM challengeAuditCron ";
        if (!$result = mysqli_query($con, $queryA)) {
            exit(mysqli_error($con));
        } else {
            if (mysqli_num_rows($result) > 0) {
                echo "Entra al DateChooser";
                // Check if its day selected
                if ($_POST['dateDay'] == 'DayChoose') {
                    echo "Entra dentro del date chgooser";
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['event'] == $eventPost) {
                            $query = "UPDATE challengeAuditCron SET event = '$eventPost' ,days = '$preferences',datePicker='0000-00-00' ,dateFormat='day', timePicker = '$timeP', emails = '$preferencesEmails', industry = '$preferencesZZ', preferences = '$preferencesSS' ";
                            //var_dump($con);
                            echo "PRUEBA";
                        } else {
                            $query = "INSERT INTO challengeAuditCron (event, days, dateFormat, timePicker, emails, preferences, industry) VALUES ('$eventPost', '$preferences', 'day', '$timeP', '$preferencesEmails', '$preferencesSS', '$preferencesZZ') ";
                            //var_dump($query);
                            echo "Entra en el INSERT !!!!!!";
                        }
                    }
                } else if ($_POST['dateDay'] == 'DateChoose') { // Check if its date selected
                    while ($row = mysqli_fetch_assoc($result)) {
                        //echo "Entra en el While!!!!!";
                        if ($row['step'] == $stepPost) {
                            $query = "UPDATE challengeAuditCron SET event = '$eventPost',step = '$stepPost' , datePicker='$dateFormated[2]-$dateFormated[0]-$dateFormated[1]' , dateFormat='date', timePicker = '$timeP', emails = '$preferencesEmails', industry = '$preferencesZZ', preferences = '$preferencesSS'";
                            //var_dump($con);
                        } else {
                            $query = "INSERT INTO challengeAuditCron(event, step, datePicker, dateFormat, timePicker, emails, preferences, industry) VALUES ('$eventPost', '$stepPost', '$dateFormated[2]-$dateFormated[0]-$dateFormated[1]', 'date', '$timeP', '$preferencesEmails', '$preferencesSS', '$preferencesZZ') ";
                            //var_dump($con);
                            //echo "Entra en el INSERT !!!!!!";
                        }
                    }
                } else {
                    echo "ERROR WITH THE CHOICE";
                    var_dump($con);
                }
            }
        }
        // Execute the query
        $query = mysqli_query($con, $query);
    } else {
        var_dump($con);
        echo "No funciona";
    }
    // Post of the new Event
    if ($_POST['action'] == 'New') {
        if (!empty($_POST['NameEvent'])) {
            $nameEvent = $_POST['NameEvent'];
            $query = mysqli_query($con, "INSERT INTO challengeAuditEvents(evento) VALUES ('$nameEvent')");
        }
    }

    // When you introduce information you automatic reload the page to see the new content, but doesn't work.
    //header('Location: ' . $_SERVER['PHP_SELF']);
}