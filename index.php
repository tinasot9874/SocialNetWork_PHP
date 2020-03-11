<?php

    require_once 'includes/config.php';
    require_once 'includes/register.php';
    require_once 'includes/login.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is social network html5 template available in themeforest......"/>
    <meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page"/>
    <meta name="robots" content="index, follow"/>
    <title>Friend Finder | A Complete Social Network  </title>

    <!-- Stylesheets
    ================================================= -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/ionicons.min.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>

    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="images/fav.png"/>
</head>
<body>

<!-- Landing Page Contents
================================================= -->

<div id="lp-register">
    <div class="container wrapper">
        <div class="row">
            <div class="col-sm-5">
                <div class="intro-texts">
                    <h1 class="text-white">Make Cool Friends !!!</h1>
                    <p>Friend Finder is a social network template that can be used to connect people. The template
                        offers Landing pages, News Feed, Image/Video Feed, Chat Box, Timeline and lot more. <br/> <br/>Why
                        are you waiting for? Buy it now.</p>
                    <button class="btn btn-primary">Learn More </button>
                </div>
            </div>
            <div class="col-sm-6 col-sm-offset-1">
                <div class="reg-form-container">

                    <!-- Register/Login Tabs-->
                    <div class="reg-options">
                        <ul class="nav nav-tabs">
                            <li id="register_active" class="active" ><a href="#register" data-toggle="tab">Register</a></li>
                            <li id="login_active"><a href="#login" data-toggle="tab">Login</a></li>
                        </ul><!--Tabs End-->
                    </div>

                    <!--Registration Form Contents-->


                    <div class="tab-content ">
                        <!--Register Form-->
                        <div class="tab-pane active" id="register">
                            <h3>Register Now !!!</h3>
                            <p class="text-muted">Be cool and join today. Meet millions</p>


                            <form action="index.php" name="registration_form" id='registration_form' class="form-inline" method="POST">
                                <div class="row">
                                    <div class="form-group col-xs-6">
                                        <label for="firstname" class="sr-only">First Name</label>
                                        <input id="firstname" class="form-control input-group-lg" type="text"
                                               name="firstname" title="Enter first name" placeholder="First name" value="<?php if (isset($_SESSION['fname'])) echo $_SESSION['fname']; ?>" required/>
                                        <b class="error" style="position: relative;left: 11px;top: 3px;transition: none 0s ease 0s;color: red;">
                                            <?php
                                                if (in_array("Your First name must be between 2 and 25 characters", $error_array))
                                                    echo "Your First name must be between 2 and 25 characters";
                                            ?>
                                        </b>
                                    </div>
                                    <div class="form-group col-xs-6">
                                        <label for="lastname" class="sr-only">Last Name</label>
                                        <input id="lastname" class="form-control input-group-lg" type="text"
                                               name="lastname" title="Enter last name" placeholder="Last name" value="<?php if (isset($_SESSION['lname'])) echo $_SESSION['lname']; ?>" required/>
                                        <b class="error" style="position: relative;left: 11px;top: 3px;transition: none 0s ease 0s;color: red;">
                                        <?php
                                        if (in_array("Your Last name must be between 2 and 25 characters", $error_array))
                                            echo "Your Last name must be between 2 and 25 characters";
                                        ?>
                                        </b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <label for="email" class="sr-only">Email</label>
                                        <input id="email" class="form-control input-group-lg" type="email" name="email"
                                               title="Enter Email" placeholder="Your Email" value="<?php if (isset($_SESSION['email'])) echo $_SESSION['email']; ?>" required/>
                                        <b class="error" style="position: relative;left: 11px;top: 3px;transition: none 0s ease 0s;color: red;">
                                        <?php
                                        if (in_array("Email already in use", $error_array)){
                                            echo "Email already in use";}
                                        if (in_array("Invalid Email! Please check again", $error_array)){
                                            echo "Invalid Email! Please check again";}
                                        ?>
                                        </b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <label for="password" class="sr-only">Password</label>
                                        <input id="password" class="form-control input-group-lg" type="password"
                                               name="password" title="Enter password" placeholder="Password" required/>
                                        <b class="error" style="position: relative;left: 11px;top: 3px;transition: none 0s ease 0s;color: red;">
                                        <?php
                                        if (in_array("Your password can only contain characters and numbers", $error_array)){
                                            echo "Your password can only contain characters and numbers";}
                                        if (in_array("Your password must be between 5 and 30 characters", $error_array)){
                                            echo "Your password must be between 5 and 30 characters";}
                                        ?>
                                        </b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <label for="cfm_password" class="sr-only">Confirm Password</label>
                                        <input id="cfm_password" class="form-control input-group-lg" type="password"
                                               name="cfm_password" title="Enter password" placeholder="Confirm Password" required/>
                                        <b class="error" style="position: relative;left: 11px;top: 3px;transition: none 0s ease 0s;color: red;">
                                        <?php
                                        if (in_array("Password don't match!", $error_array))
                                            echo "Password don't match!";
                                        ?>
                                        </b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <label for="birthday" class="sr-only">Birthday</label>
                                        <input id="birthday" class="form-control input-group-lg" type="date"
                                               name="birthday" title="Enter your birthday"/>
                                    </div>
                                </div>
                                <div class="form-group gender">
                                    <label class="radio-inline">
                                        <input type="radio" name="sex" value="male" checked>Male
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="sex" value="female">Female
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="sex" value="Optional">Optional
                                    </label>
                                </div>
<!--                                <div class="row">-->
<!--                                    <div class="form-group col-xs-6">-->
<!--                                        <label for="city" class="sr-only">City</label>-->
<!--                                        <input id="city" class="form-control input-group-lg reg_name" type="text"-->
<!--                                               name="city" title="Enter city" placeholder="Your city" value="--><?php //if (isset($_SESSION['city'])) echo $_SESSION['city']; ?><!--"/>-->
<!--                                    </div>-->
<!--                                    <div class="form-group col-xs-6">-->
<!--                                        <label for="country" class="sr-only"></label>-->
<!--                                        <select name="country" class="form-control" id="country" >-->
<!--                                            <option value="country" disabled selected>Country</option>-->
<!--                                            <option value="AFG">Afghanistan</option>-->
<!--                                            <option value="ALA">Aland Islands</option>-->
<!--                                            <option value="ALB">Albania</option>-->
<!--                                            <option value="DZA">Algeria</option>-->
<!--                                            <option value="ASM">American Samoa</option>-->
<!--                                            <option value="AND">Andorra</option>-->
<!--                                            <option value="AGO">Angola</option>-->
<!--                                            <option value="AIA">Anguilla</option>-->
<!--                                            <option value="ATA">Antarctica</option>-->
<!--                                            <option value="ATG">Antigua and Barbuda</option>-->
<!--                                            <option value="ARG">Argentina</option>-->
<!--                                            <option value="ARM">Armenia</option>-->
<!--                                            <option value="ABW">Aruba</option>-->
<!--                                            <option value="AUS">Australia</option>-->
<!--                                            <option value="AUT">Austria</option>-->
<!--                                            <option value="AZE">Azerbaijan</option>-->
<!--                                            <option value="BHS">Bahamas</option>-->
<!--                                            <option value="BHR">Bahrain</option>-->
<!--                                            <option value="BGD">Bangladesh</option>-->
<!--                                            <option value="BRB">Barbados</option>-->
<!--                                            <option value="BLR">Belarus</option>-->
<!--                                            <option value="BEL">Belgium</option>-->
<!--                                            <option value="BLZ">Belize</option>-->
<!--                                            <option value="BEN">Benin</option>-->
<!--                                            <option value="BMU">Bermuda</option>-->
<!--                                            <option value="BTN">Bhutan</option>-->
<!--                                            <option value="BOL">Bolivia, Plurinational State of</option>-->
<!--                                            <option value="BES">Bonaire, Sint Eustatius and Saba</option>-->
<!--                                            <option value="BIH">Bosnia and Herzegovina</option>-->
<!--                                            <option value="BWA">Botswana</option>-->
<!--                                            <option value="BVT">Bouvet Island</option>-->
<!--                                            <option value="BRA">Brazil</option>-->
<!--                                            <option value="IOT">British Indian Ocean Territory</option>-->
<!--                                            <option value="BRN">Brunei Darussalam</option>-->
<!--                                            <option value="BGR">Bulgaria</option>-->
<!--                                            <option value="BFA">Burkina Faso</option>-->
<!--                                            <option value="BDI">Burundi</option>-->
<!--                                            <option value="KHM">Cambodia</option>-->
<!--                                            <option value="CMR">Cameroon</option>-->
<!--                                            <option value="CAN">Canada</option>-->
<!--                                            <option value="CPV">Cape Verde</option>-->
<!--                                            <option value="CYM">Cayman Islands</option>-->
<!--                                            <option value="CAF">Central African Republic</option>-->
<!--                                            <option value="TCD">Chad</option>-->
<!--                                            <option value="CHL">Chile</option>-->
<!--                                            <option value="CHN">China</option>-->
<!--                                            <option value="CXR">Christmas Island</option>-->
<!--                                            <option value="CCK">Cocos (Keeling) Islands</option>-->
<!--                                            <option value="COL">Colombia</option>-->
<!--                                            <option value="COM">Comoros</option>-->
<!--                                            <option value="COG">Congo</option>-->
<!--                                            <option value="COD">Congo, the Democratic Republic of the</option>-->
<!--                                            <option value="COK">Cook Islands</option>-->
<!--                                            <option value="CRI">Costa Rica</option>-->
<!--                                            <option value="CIV">C�te d'Ivoire</option>-->
<!--                                            <option value="HRV">Croatia</option>-->
<!--                                            <option value="CUB">Cuba</option>-->
<!--                                            <option value="CUW">Cura�ao</option>-->
<!--                                            <option value="CYP">Cyprus</option>-->
<!--                                            <option value="CZE">Czech Republic</option>-->
<!--                                            <option value="DNK">Denmark</option>-->
<!--                                            <option value="DJI">Djibouti</option>-->
<!--                                            <option value="DMA">Dominica</option>-->
<!--                                            <option value="DOM">Dominican Republic</option>-->
<!--                                            <option value="ECU">Ecuador</option>-->
<!--                                            <option value="EGY">Egypt</option>-->
<!--                                            <option value="SLV">El Salvador</option>-->
<!--                                            <option value="GNQ">Equatorial Guinea</option>-->
<!--                                            <option value="ERI">Eritrea</option>-->
<!--                                            <option value="EST">Estonia</option>-->
<!--                                            <option value="ETH">Ethiopia</option>-->
<!--                                            <option value="FLK">Falkland Islands (Malvinas)</option>-->
<!--                                            <option value="FRO">Faroe Islands</option>-->
<!--                                            <option value="FJI">Fiji</option>-->
<!--                                            <option value="FIN">Finland</option>-->
<!--                                            <option value="FRA">France</option>-->
<!--                                            <option value="GUF">French Guiana</option>-->
<!--                                            <option value="PYF">French Polynesia</option>-->
<!--                                            <option value="ATF">French Southern Territories</option>-->
<!--                                            <option value="GAB">Gabon</option>-->
<!--                                            <option value="GMB">Gambia</option>-->
<!--                                            <option value="GEO">Georgia</option>-->
<!--                                            <option value="DEU">Germany</option>-->
<!--                                            <option value="GHA">Ghana</option>-->
<!--                                            <option value="GIB">Gibraltar</option>-->
<!--                                            <option value="GRC">Greece</option>-->
<!--                                            <option value="GRL">Greenland</option>-->
<!--                                            <option value="GRD">Grenada</option>-->
<!--                                            <option value="GLP">Guadeloupe</option>-->
<!--                                            <option value="GUM">Guam</option>-->
<!--                                            <option value="GTM">Guatemala</option>-->
<!--                                            <option value="GGY">Guernsey</option>-->
<!--                                            <option value="GIN">Guinea</option>-->
<!--                                            <option value="GNB">Guinea-Bissau</option>-->
<!--                                            <option value="GUY">Guyana</option>-->
<!--                                            <option value="HTI">Haiti</option>-->
<!--                                            <option value="HMD">Heard Island and McDonald Islands</option>-->
<!--                                            <option value="VAT">Holy See (Vatican City State)</option>-->
<!--                                            <option value="HND">Honduras</option>-->
<!--                                            <option value="HKG">Hong Kong</option>-->
<!--                                            <option value="HUN">Hungary</option>-->
<!--                                            <option value="ISL">Iceland</option>-->
<!--                                            <option value="IND">India</option>-->
<!--                                            <option value="IDN">Indonesia</option>-->
<!--                                            <option value="IRN">Iran, Islamic Republic of</option>-->
<!--                                            <option value="IRQ">Iraq</option>-->
<!--                                            <option value="IRL">Ireland</option>-->
<!--                                            <option value="IMN">Isle of Man</option>-->
<!--                                            <option value="ISR">Israel</option>-->
<!--                                            <option value="ITA">Italy</option>-->
<!--                                            <option value="JAM">Jamaica</option>-->
<!--                                            <option value="JPN">Japan</option>-->
<!--                                            <option value="JEY">Jersey</option>-->
<!--                                            <option value="JOR">Jordan</option>-->
<!--                                            <option value="KAZ">Kazakhstan</option>-->
<!--                                            <option value="KEN">Kenya</option>-->
<!--                                            <option value="KIR">Kiribati</option>-->
<!--                                            <option value="PRK">Korea, Democratic People's Republic of</option>-->
<!--                                            <option value="KOR">Korea, Republic of</option>-->
<!--                                            <option value="KWT">Kuwait</option>-->
<!--                                            <option value="KGZ">Kyrgyzstan</option>-->
<!--                                            <option value="LAO">Lao People's Democratic Republic</option>-->
<!--                                            <option value="LVA">Latvia</option>-->
<!--                                            <option value="LBN">Lebanon</option>-->
<!--                                            <option value="LSO">Lesotho</option>-->
<!--                                            <option value="LBR">Liberia</option>-->
<!--                                            <option value="LBY">Libya</option>-->
<!--                                            <option value="LIE">Liechtenstein</option>-->
<!--                                            <option value="LTU">Lithuania</option>-->
<!--                                            <option value="LUX">Luxembourg</option>-->
<!--                                            <option value="MAC">Macao</option>-->
<!--                                            <option value="MKD">Macedonia, the former Yugoslav Republic of</option>-->
<!--                                            <option value="MDG">Madagascar</option>-->
<!--                                            <option value="MWI">Malawi</option>-->
<!--                                            <option value="MYS">Malaysia</option>-->
<!--                                            <option value="MDV">Maldives</option>-->
<!--                                            <option value="MLI">Mali</option>-->
<!--                                            <option value="MLT">Malta</option>-->
<!--                                            <option value="MHL">Marshall Islands</option>-->
<!--                                            <option value="MTQ">Martinique</option>-->
<!--                                            <option value="MRT">Mauritania</option>-->
<!--                                            <option value="MUS">Mauritius</option>-->
<!--                                            <option value="MYT">Mayotte</option>-->
<!--                                            <option value="MEX">Mexico</option>-->
<!--                                            <option value="FSM">Micronesia, Federated States of</option>-->
<!--                                            <option value="MDA">Moldova, Republic of</option>-->
<!--                                            <option value="MCO">Monaco</option>-->
<!--                                            <option value="MNG">Mongolia</option>-->
<!--                                            <option value="MNE">Montenegro</option>-->
<!--                                            <option value="MSR">Montserrat</option>-->
<!--                                            <option value="MAR">Morocco</option>-->
<!--                                            <option value="MOZ">Mozambique</option>-->
<!--                                            <option value="MMR">Myanmar</option>-->
<!--                                            <option value="NAM">Namibia</option>-->
<!--                                            <option value="NRU">Nauru</option>-->
<!--                                            <option value="NPL">Nepal</option>-->
<!--                                            <option value="NLD">Netherlands</option>-->
<!--                                            <option value="NCL">New Caledonia</option>-->
<!--                                            <option value="NZL">New Zealand</option>-->
<!--                                            <option value="NIC">Nicaragua</option>-->
<!--                                            <option value="NER">Niger</option>-->
<!--                                            <option value="NGA">Nigeria</option>-->
<!--                                            <option value="NIU">Niue</option>-->
<!--                                            <option value="NFK">Norfolk Island</option>-->
<!--                                            <option value="MNP">Northern Mariana Islands</option>-->
<!--                                            <option value="NOR">Norway</option>-->
<!--                                            <option value="OMN">Oman</option>-->
<!--                                            <option value="PAK">Pakistan</option>-->
<!--                                            <option value="PLW">Palau</option>-->
<!--                                            <option value="PSE">Palestinian Territory, Occupied</option>-->
<!--                                            <option value="PAN">Panama</option>-->
<!--                                            <option value="PNG">Papua New Guinea</option>-->
<!--                                            <option value="PRY">Paraguay</option>-->
<!--                                            <option value="PER">Peru</option>-->
<!--                                            <option value="PHL">Philippines</option>-->
<!--                                            <option value="PCN">Pitcairn</option>-->
<!--                                            <option value="POL">Poland</option>-->
<!--                                            <option value="PRT">Portugal</option>-->
<!--                                            <option value="PRI">Puerto Rico</option>-->
<!--                                            <option value="QAT">Qatar</option>-->
<!--                                            <option value="REU">R�union</option>-->
<!--                                            <option value="ROU">Romania</option>-->
<!--                                            <option value="RUS">Russian Federation</option>-->
<!--                                            <option value="RWA">Rwanda</option>-->
<!--                                            <option value="BLM">Saint Barth�lemy</option>-->
<!--                                            <option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>-->
<!--                                            <option value="KNA">Saint Kitts and Nevis</option>-->
<!--                                            <option value="LCA">Saint Lucia</option>-->
<!--                                            <option value="MAF">Saint Martin (French part)</option>-->
<!--                                            <option value="SPM">Saint Pierre and Miquelon</option>-->
<!--                                            <option value="VCT">Saint Vincent and the Grenadines</option>-->
<!--                                            <option value="WSM">Samoa</option>-->
<!--                                            <option value="SMR">San Marino</option>-->
<!--                                            <option value="STP">Sao Tome and Principe</option>-->
<!--                                            <option value="SAU">Saudi Arabia</option>-->
<!--                                            <option value="SEN">Senegal</option>-->
<!--                                            <option value="SRB">Serbia</option>-->
<!--                                            <option value="SYC">Seychelles</option>-->
<!--                                            <option value="SLE">Sierra Leone</option>-->
<!--                                            <option value="SGP">Singapore</option>-->
<!--                                            <option value="SXM">Sint Maarten (Dutch part)</option>-->
<!--                                            <option value="SVK">Slovakia</option>-->
<!--                                            <option value="SVN">Slovenia</option>-->
<!--                                            <option value="SLB">Solomon Islands</option>-->
<!--                                            <option value="SOM">Somalia</option>-->
<!--                                            <option value="ZAF">South Africa</option>-->
<!--                                            <option value="SGS">South Georgia and the South Sandwich Islands</option>-->
<!--                                            <option value="SSD">South Sudan</option>-->
<!--                                            <option value="ESP">Spain</option>-->
<!--                                            <option value="LKA">Sri Lanka</option>-->
<!--                                            <option value="SDN">Sudan</option>-->
<!--                                            <option value="SUR">Suriname</option>-->
<!--                                            <option value="SJM">Svalbard and Jan Mayen</option>-->
<!--                                            <option value="SWZ">Swaziland</option>-->
<!--                                            <option value="SWE">Sweden</option>-->
<!--                                            <option value="CHE">Switzerland</option>-->
<!--                                            <option value="SYR">Syrian Arab Republic</option>-->
<!--                                            <option value="TWN">Taiwan, Province of China</option>-->
<!--                                            <option value="TJK">Tajikistan</option>-->
<!--                                            <option value="TZA">Tanzania, United Republic of</option>-->
<!--                                            <option value="THA">Thailand</option>-->
<!--                                            <option value="TLS">Timor-Leste</option>-->
<!--                                            <option value="TGO">Togo</option>-->
<!--                                            <option value="TKL">Tokelau</option>-->
<!--                                            <option value="TON">Tonga</option>-->
<!--                                            <option value="TTO">Trinidad and Tobago</option>-->
<!--                                            <option value="TUN">Tunisia</option>-->
<!--                                            <option value="TUR">Turkey</option>-->
<!--                                            <option value="TKM">Turkmenistan</option>-->
<!--                                            <option value="TCA">Turks and Caicos Islands</option>-->
<!--                                            <option value="TUV">Tuvalu</option>-->
<!--                                            <option value="UGA">Uganda</option>-->
<!--                                            <option value="UKR">Ukraine</option>-->
<!--                                            <option value="ARE">United Arab Emirates</option>-->
<!--                                            <option value="GBR">United Kingdom</option>-->
<!--                                            <option value="USA">United States</option>-->
<!--                                            <option value="UMI">United States Minor Outlying Islands</option>-->
<!--                                            <option value="URY">Uruguay</option>-->
<!--                                            <option value="UZB">Uzbekistan</option>-->
<!--                                            <option value="VUT">Vanuatu</option>-->
<!--                                            <option value="VEN">Venezuela, Bolivarian Republic of</option>-->
<!--                                            <option value="VNM">Viet Nam</option>-->
<!--                                            <option value="VGB">Virgin Islands, British</option>-->
<!--                                            <option value="VIR">Virgin Islands, U.S.</option>-->
<!--                                            <option value="WLF">Wallis and Futuna</option>-->
<!--                                            <option value="ESH">Western Sahara</option>-->
<!--                                            <option value="YEM">Yemen</option>-->
<!--                                            <option value="ZMB">Zambia</option>-->
<!--                                            <option value="ZWE">Zimbabwe</option>-->
<!--                                        </select>-->
<!--                                    </div>-->
<!--                                </div>-->
                                <div class="row" style="float: right;">
                                <p class="trigger_loginform"><a href="#login" data-toggle="tab" aria-expanded="true">Already have an account?</a></p>
                                <button type="submit" name="register" class="btn btn-primary">Register Now</button>
                                </div>
                                <div class="row">
                                    <b class="error" style="position: relative;left: 11px;top: 3px;transition: none 0s ease 0s;">
                                        <?php
                                        if (in_array("<span style='color: #4cae4c;'>You're all set! Go ahead and login!</span>", $error_array))
                                            echo "<span style='color: #4cae4c;'>You're all set! Go ahead and login!</span>";
                                        ?>
                                    </b>
                                </div>
                            </form><!--Register Now Form Ends-->

                        </div><!--Registration Form Contents Ends-->

                        <!--Login-->
                        <div class="tab-pane " id="login">
                            <h3>Login</h3>
                            <p class="text-muted">Log into your account</p>

                            <!--Login Form-->
                            <form action="index.php" name="Login_form" id='Login_form' method="POST">
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <label for="my-email" class="sr-only">Email</label>
                                        <input id="my-email" class="form-control input-group-lg" type="email"
                                               name="log_email" title="Enter Email" placeholder="Your Email" required/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <label for="my-password" class="sr-only">Password</label>
                                        <input id="my-password" class="form-control input-group-lg" type="password"
                                               name="log_password" title="Enter password" placeholder="Password" required/>
                                    </div>
                                </div>
                                <b class="error" style="position: relative;left: 11px;top: 3px;transition: none 0s ease 0s; color: red">
                                    <?php
                                    if (in_array("Email or password was incorrect", $error_array))
                                        echo "Email or password was incorrect";
                                    ?>
                                </b>
                                <p><a href="#">Forgot Password?</a></p>
                                <button id="login_button" type="submit" name="login" class="btn btn-primary">Login Now</button>
                            </form><!--Login Form Ends-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-6">

                <!--Social Icons-->
                <ul class="list-inline social-icons">
                    <li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
                    <li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
                    <li><a href="#"><i class="icon ion-social-googleplus"></i></a></li>
                    <li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
                    <li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>






<!--preloader-->
<div id="spinner-wrapper">
    <div class="spinner"></div>
</div>


<!-- Scripts
================================================= -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.appear.min.js"></script>
<script src="js/jquery.incremental-counter.js"></script>
<script src="js/script.js"></script>
<script> // Add class active for login
    $(document).ready(function () {
        $('.trigger_loginform').click(function () {
            $('#login_active').addClass("active");
            $('#register_active').removeClass("active");
        });
    });

</script>
<?php
if(isset($_POST['login'])) {
    echo '
        <script>
         $(document).ready(function () {
            console.log("asdadads");
            $("#login").addClass("active");
            $("#login_active").addClass("active");
            $("#register").removeClass("active");
            $("#register_active").removeClass("active");      
        });    
        </script>
    ';
}
?>
</body>
</html>
