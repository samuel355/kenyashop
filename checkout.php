<?php include_once 'include/head.php' ?>
<?php
    session_start();
    if(!isset($_SESSION['uid'])){
        header("location: login.php");
    }
?>
<body>

<?php // include_once 'include/preloader.php' ?> 

<?php include_once 'include/header.php' ?>


<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">checkout</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="index.php"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="index.php">Shop</a></li>
                    <li>checkout</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
    include_once "php/config.php";
    if(isset($_SESSION['uid'])){
        $sql = "SELECT * FROM users WHERE user_id='$_SESSION[uid]'";
        $query = mysqli_query($con, $sql);
        $user_row=mysqli_fetch_assoc($query);
    }
?>

<section class="checkout-wrapper section">
    <div class="container">
        <form id="checkout-payment-form">
            <div class="row justify-content-center">
                <div class="col-lg-8 order-detail">
                    <div class="checkout-steps-form-style-1">
                        <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Your Personal Details </h6>
                        <section class="checkout-steps-form-content collapse show" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="row">
                                <div class="row">
                                    <div style="display: none;" class="col-md-12 col-12 text-center error-text mb-1 mt-1 alert alert-danger"></div>
                                </div>
                                <div class="col-md-12">
                                    <div class="single-form form-default">
                                        
                                        <div class="row">
                                            <div class="col-md-6 form-input form">
                                                <label>First Name</label>
                                                <input name="first-name" id="first-name" type="text" value="<?php echo $user_row['firstname'] ?>" >
                                            </div>
                                            <div class="col-md-6 form-input form">
                                                <label>Last Name</label>
                                                <input name="last-name" id="last-name" type="text" value="<?php echo $user_row['lastname'] ?>" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="user-unique-id" value="<?php echo $_SESSION['unique_id'] ?>">
                                <div class="col-md-6">
                                    <div class="single-form form-default">
                                        <label>Email Address</label>
                                        <div class="form-input form">
                                            <input name="email" id="email" type="text" value="<?php echo $user_row['email'] ?>" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-default">
                                        <label>Phone Number</label>
                                            <div class="form-input form">
                                            <input id="phone" name="phone" type="number" value="<?php echo $user_row['mobile'] ?>" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="single-form form-default">
                                        <label>Address</label>
                                        <div class="form-input form">
                                            <input id="address" name="address" type="text" value="<?php echo $user_row['address'] ?>" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-default">
                                        <label>City</label>
                                        <div class="form-input form">
                                            <input id="city" name="city" type="text" placeholder="City">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-default">
                                        <label>Country</label>
                                        <div class="form-input">
                                            <select class="form-control" name="country" id="country">
                                                <option value="select"> Select Country</option>
                                                <option data-countryCode="GH" value="Ghana (+233)">Ghana (+233)</option>

                                                <optgroup label="Other countries">
                                                    <option data-countryCode="DZ" value="Algeria (+213)">Algeria (+213)
                                                    </option>
                                                    <option data-countryCode="AD" value="Andorra (+376)">Andorra (+376)
                                                    </option>
                                                    <option data-countryCode="AO" value="Angola (+244)">Angola (+244)</option>
                                                    <option data-countryCode="AI" value="Anguilla (+1264)">Anguilla (+1264)
                                                    </option>
                                                    <option data-countryCode="AG" value="1268">Antigua &amp; Barbuda
                                                        (+1268)</option>
                                                    <option data-countryCode="AR" value="54">Argentina (+54)
                                                    </option>
                                                    <option data-countryCode="AM" value="374">Armenia (+374)
                                                    </option>
                                                    <option data-countryCode="AW" value="297">Aruba (+297)</option>
                                                    <option data-countryCode="AU" value="61">Australia (+61)
                                                    </option>
                                                    <option data-countryCode="AT" value="43">Austria (+43)</option>
                                                    <option data-countryCode="AZ" value="994">Azerbaijan (+994)
                                                    </option>
                                                    <option data-countryCode="BS" value="1242">Bahamas (+1242)
                                                    </option>
                                                    <option data-countryCode="BH" value="973">Bahrain (+973)
                                                    </option>
                                                    <option data-countryCode="BD" value="880">Bangladesh (+880)
                                                    </option>
                                                    <option data-countryCode="BB" value="1246">Barbados (+1246)
                                                    </option>
                                                    <option data-countryCode="BY" value="375">Belarus (+375)
                                                    </option>
                                                    <option data-countryCode="BE" value="32">Belgium (+32)</option>
                                                    <option data-countryCode="BZ" value="501">Belize (+501)</option>
                                                    <option data-countryCode="BJ" value="229">Benin (+229)</option>
                                                    <option data-countryCode="BM" value="1441">Bermuda (+1441)
                                                    </option>
                                                    <option data-countryCode="BT" value="975">Bhutan (+975)</option>
                                                    <option data-countryCode="BO" value="591">Bolivia (+591)
                                                    </option>
                                                    <option data-countryCode="BA" value="387">Bosnia Herzegovina
                                                        (+387)</option>
                                                    <option data-countryCode="BW" value="267">Botswana (+267)
                                                    </option>
                                                    <option data-countryCode="BR" value="55">Brazil (+55)</option>
                                                    <option data-countryCode="BN" value="673">Brunei (+673)</option>
                                                    <option data-countryCode="BG" value="359">Bulgaria (+359)
                                                    </option>
                                                    <option data-countryCode="BF" value="226">Burkina Faso (+226)
                                                    </option>
                                                    <option data-countryCode="BI" value="257">Burundi (+257)
                                                    </option>
                                                    <option data-countryCode="KH" value="855">Cambodia (+855)
                                                    </option>
                                                    <option data-countryCode="CM" value="237">Cameroon (+237)
                                                    </option>
                                                    <option data-countryCode="CA" value="1">Canada (+1)</option>
                                                    <option data-countryCode="CV" value="238">Cape Verde Islands
                                                        (+238)</option>
                                                    <option data-countryCode="KY" value="1345">Cayman Islands
                                                        (+1345)</option>
                                                    <option data-countryCode="CF" value="236">Central African
                                                        Republic (+236)</option>
                                                    <option data-countryCode="CL" value="56">Chile (+56)</option>
                                                    <option data-countryCode="CN" value="86">China (+86)</option>
                                                    <option data-countryCode="CO" value="57">Colombia (+57)</option>
                                                    <option data-countryCode="KM" value="269">Comoros (+269)
                                                    </option>
                                                    <option data-countryCode="CG" value="242">Congo (+242)</option>
                                                    <option data-countryCode="CK" value="682">Cook Islands (+682)
                                                    </option>
                                                    <option data-countryCode="CR" value="506">Costa Rica (+506)
                                                    </option>
                                                    <option data-countryCode="HR" value="385">Croatia (+385)
                                                    </option>
                                                    <option data-countryCode="CU" value="53">Cuba (+53)</option>
                                                    <option data-countryCode="CY" value="90392">Cyprus North
                                                        (+90392)</option>
                                                    <option data-countryCode="CY" value="357">Cyprus South (+357)
                                                    </option>
                                                    <option data-countryCode="CZ" value="42">Czech Republic (+42)
                                                    </option>
                                                    <option data-countryCode="DK" value="45">Denmark (+45)</option>
                                                    <option data-countryCode="DJ" value="253">Djibouti (+253)
                                                    </option>
                                                    <option data-countryCode="DM" value="1809">Dominica (+1809)
                                                    </option>
                                                    <option data-countryCode="DO" value="1809">Dominican Republic
                                                        (+1809)</option>
                                                    <option data-countryCode="EC" value="593">Ecuador (+593)
                                                    </option>
                                                    <option data-countryCode="EG" value="20">Egypt (+20)</option>
                                                    <option data-countryCode="SV" value="503">El Salvador (+503)
                                                    </option>
                                                    <option data-countryCode="GQ" value="240">Equatorial Guinea
                                                        (+240)</option>
                                                    <option data-countryCode="ER" value="291">Eritrea (+291)
                                                    </option>
                                                    <option data-countryCode="EE" value="372">Estonia (+372)
                                                    </option>
                                                    <option data-countryCode="ET" value="251">Ethiopia (+251)
                                                    </option>
                                                    <option data-countryCode="FK" value="500">Falkland Islands
                                                        (+500)</option>
                                                    <option data-countryCode="FO" value="298">Faroe Islands (+298)
                                                    </option>
                                                    <option data-countryCode="FJ" value="679">Fiji (+679)</option>
                                                    <option data-countryCode="FI" value="358">Finland (+358)
                                                    </option>
                                                    <option data-countryCode="FR" value="33">France (+33)</option>
                                                    <option data-countryCode="GF" value="594">French Guiana (+594)
                                                    </option>
                                                    <option data-countryCode="PF" value="689">French Polynesia
                                                        (+689)</option>
                                                    <option data-countryCode="GA" value="241">Gabon (+241)</option>
                                                    <option data-countryCode="GM" value="220">Gambia (+220)</option>
                                                    <option data-countryCode="GE" value="7880">Georgia (+7880)
                                                    </option>
                                                    <option data-countryCode="DE" value="49">Germany (+49)</option>
                                                    <option data-countryCode="GH" value="233">Ghana (+233)</option>
                                                    <option data-countryCode="GI" value="350">Gibraltar (+350)
                                                    </option>
                                                    <option data-countryCode="GR" value="30">Greece (+30)</option>
                                                    <option data-countryCode="GL" value="299">Greenland (+299)
                                                    </option>
                                                    <option data-countryCode="GD" value="1473">Grenada (+1473)
                                                    </option>
                                                    <option data-countryCode="GP" value="590">Guadeloupe (+590)
                                                    </option>
                                                    <option data-countryCode="GU" value="671">Guam (+671)</option>
                                                    <option data-countryCode="GT" value="502">Guatemala (+502)
                                                    </option>
                                                    <option data-countryCode="GN" value="224">Guinea (+224)</option>
                                                    <option data-countryCode="GW" value="245">Guinea - Bissau (+245)
                                                    </option>
                                                    <option data-countryCode="GY" value="592">Guyana (+592)</option>
                                                    <option data-countryCode="HT" value="509">Haiti (+509)</option>
                                                    <option data-countryCode="HN" value="504">Honduras (+504)
                                                    </option>
                                                    <option data-countryCode="HK" value="852">Hong Kong (+852)
                                                    </option>
                                                    <option data-countryCode="HU" value="36">Hungary (+36)</option>
                                                    <option data-countryCode="IS" value="354">Iceland (+354)
                                                    </option>
                                                    <option data-countryCode="IN" value="91">India (+91)</option>
                                                    <option data-countryCode="ID" value="62">Indonesia (+62)
                                                    </option>
                                                    <option data-countryCode="IR" value="98">Iran (+98)</option>
                                                    <option data-countryCode="IQ" value="964">Iraq (+964)</option>
                                                    <option data-countryCode="IE" value="353">Ireland (+353)
                                                    </option>
                                                    <option data-countryCode="IL" value="972">Israel (+972)</option>
                                                    <option data-countryCode="IT" value="39">Italy (+39)</option>
                                                    <option data-countryCode="JM" value="1876">Jamaica (+1876)
                                                    </option>
                                                    <option data-countryCode="JP" value="81">Japan (+81)</option>
                                                    <option data-countryCode="JO" value="962">Jordan (+962)</option>
                                                    <option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
                                                    <option data-countryCode="KE" value="254">Kenya (+254)</option>
                                                    <option data-countryCode="KI" value="686">Kiribati (+686)
                                                    </option>
                                                    <option data-countryCode="KP" value="850">Korea North (+850)
                                                    </option>
                                                    <option data-countryCode="KR" value="82">Korea South (+82)
                                                    </option>
                                                    <option data-countryCode="KW" value="965">Kuwait (+965)</option>
                                                    <option data-countryCode="KG" value="996">Kyrgyzstan (+996)
                                                    </option>
                                                    <option data-countryCode="LA" value="856">Laos (+856)</option>
                                                    <option data-countryCode="LV" value="371">Latvia (+371)</option>
                                                    <option data-countryCode="LB" value="961">Lebanon (+961)
                                                    </option>
                                                    <option data-countryCode="LS" value="266">Lesotho (+266)
                                                    </option>
                                                    <option data-countryCode="LR" value="231">Liberia (+231)
                                                    </option>
                                                    <option data-countryCode="LY" value="218">Libya (+218)</option>
                                                    <option data-countryCode="LI" value="417">Liechtenstein (+417)
                                                    </option>
                                                    <option data-countryCode="LT" value="370">Lithuania (+370)
                                                    </option>
                                                    <option data-countryCode="LU" value="352">Luxembourg (+352)
                                                    </option>
                                                    <option data-countryCode="MO" value="853">Macao (+853)</option>
                                                    <option data-countryCode="MK" value="389">Macedonia (+389)
                                                    </option>
                                                    <option data-countryCode="MG" value="261">Madagascar (+261)
                                                    </option>
                                                    <option data-countryCode="MW" value="265">Malawi (+265)</option>
                                                    <option data-countryCode="MY" value="60">Malaysia (+60)</option>
                                                    <option data-countryCode="MV" value="960">Maldives (+960)
                                                    </option>
                                                    <option data-countryCode="ML" value="223">Mali (+223)</option>
                                                    <option data-countryCode="MT" value="356">Malta (+356)</option>
                                                    <option data-countryCode="MH" value="692">Marshall Islands
                                                        (+692)</option>
                                                    <option data-countryCode="MQ" value="596">Martinique (+596)
                                                    </option>
                                                    <option data-countryCode="MR" value="222">Mauritania (+222)
                                                    </option>
                                                    <option data-countryCode="YT" value="269">Mayotte (+269)
                                                    </option>
                                                    <option data-countryCode="MX" value="52">Mexico (+52)</option>
                                                    <option data-countryCode="FM" value="691">Micronesia (+691)
                                                    </option>
                                                    <option data-countryCode="MD" value="373">Moldova (+373)
                                                    </option>
                                                    <option data-countryCode="MC" value="377">Monaco (+377)</option>
                                                    <option data-countryCode="MN" value="976">Mongolia (+976)
                                                    </option>
                                                    <option data-countryCode="MS" value="1664">Montserrat (+1664)
                                                    </option>
                                                    <option data-countryCode="MA" value="212">Morocco (+212)
                                                    </option>
                                                    <option data-countryCode="MZ" value="258">Mozambique (+258)
                                                    </option>
                                                    <option data-countryCode="MN" value="95">Myanmar (+95)</option>
                                                    <option data-countryCode="NA" value="264">Namibia (+264)
                                                    </option>
                                                    <option data-countryCode="NR" value="674">Nauru (+674)</option>
                                                    <option data-countryCode="NP" value="977">Nepal (+977)</option>
                                                    <option data-countryCode="NL" value="31">Netherlands (+31)
                                                    </option>
                                                    <option data-countryCode="NC" value="687">New Caledonia (+687)
                                                    </option>
                                                    <option data-countryCode="NZ" value="64">New Zealand (+64)
                                                    </option>
                                                    <option data-countryCode="NI" value="505">Nicaragua (+505)
                                                    </option>
                                                    <option data-countryCode="NE" value="227">Niger (+227)</option>
                                                    <option data-countryCode="NG" value="234">Nigeria (+234)
                                                    </option>
                                                    <option data-countryCode="NU" value="683">Niue (+683)</option>
                                                    <option data-countryCode="NF" value="672">Norfolk Islands (+672)
                                                    </option>
                                                    <option data-countryCode="NP" value="670">Northern Marianas
                                                        (+670)</option>
                                                    <option data-countryCode="NO" value="47">Norway (+47)</option>
                                                    <option data-countryCode="OM" value="968">Oman (+968)</option>
                                                    <option data-countryCode="PW" value="680">Palau (+680)</option>
                                                    <option data-countryCode="PA" value="507">Panama (+507)</option>
                                                    <option data-countryCode="PG" value="675">Papua New Guinea
                                                        (+675)</option>
                                                    <option data-countryCode="PY" value="595">Paraguay (+595)
                                                    </option>
                                                    <option data-countryCode="PE" value="51">Peru (+51)</option>
                                                    <option data-countryCode="PH" value="63">Philippines (+63)
                                                    </option>
                                                    <option data-countryCode="PL" value="48">Poland (+48)</option>
                                                    <option data-countryCode="PT" value="351">Portugal (+351)
                                                    </option>
                                                    <option data-countryCode="PR" value="1787">Puerto Rico (+1787)
                                                    </option>
                                                    <option data-countryCode="QA" value="974">Qatar (+974)</option>
                                                    <option data-countryCode="RE" value="262">Reunion (+262)
                                                    </option>
                                                    <option data-countryCode="RO" value="40">Romania (+40)</option>
                                                    <option data-countryCode="RU" value="7">Russia (+7)</option>
                                                    <option data-countryCode="RW" value="250">Rwanda (+250)</option>
                                                    <option data-countryCode="SM" value="378">San Marino (+378)
                                                    </option>
                                                    <option data-countryCode="ST" value="239">Sao Tome &amp;
                                                        Principe (+239)</option>
                                                    <option data-countryCode="SA" value="966">Saudi Arabia (+966)
                                                    </option>
                                                    <option data-countryCode="SN" value="221">Senegal (+221)
                                                    </option>
                                                    <option data-countryCode="CS" value="381">Serbia (+381)</option>
                                                    <option data-countryCode="SC" value="248">Seychelles (+248)
                                                    </option>
                                                    <option data-countryCode="SL" value="232">Sierra Leone (+232)
                                                    </option>
                                                    <option data-countryCode="SG" value="65">Singapore (+65)
                                                    </option>
                                                    <option data-countryCode="SK" value="421">Slovak Republic (+421)
                                                    </option>
                                                    <option data-countryCode="SI" value="386">Slovenia (+386)
                                                    </option>
                                                    <option data-countryCode="SB" value="677">Solomon Islands (+677)
                                                    </option>
                                                    <option data-countryCode="SO" value="252">Somalia (+252)
                                                    </option>
                                                    <option data-countryCode="ZA" value="27">South Africa (+27)
                                                    </option>
                                                    <option data-countryCode="ES" value="34">Spain (+34)</option>
                                                    <option data-countryCode="LK" value="94">Sri Lanka (+94)
                                                    </option>
                                                    <option data-countryCode="SH" value="290">St. Helena (+290)
                                                    </option>
                                                    <option data-countryCode="KN" value="1869">St. Kitts (+1869)
                                                    </option>
                                                    <option data-countryCode="SC" value="1758">St. Lucia (+1758)
                                                    </option>
                                                    <option data-countryCode="SD" value="249">Sudan (+249)</option>
                                                    <option data-countryCode="SR" value="597">Suriname (+597)
                                                    </option>
                                                    <option data-countryCode="SZ" value="268">Swaziland (+268)
                                                    </option>
                                                    <option data-countryCode="SE" value="46">Sweden (+46)</option>
                                                    <option data-countryCode="CH" value="41">Switzerland (+41)
                                                    </option>
                                                    <option data-countryCode="SI" value="963">Syria (+963)</option>
                                                    <option data-countryCode="TW" value="886">Taiwan (+886)</option>
                                                    <option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
                                                    <option data-countryCode="TH" value="66">Thailand (+66)</option>
                                                    <option data-countryCode="TG" value="228">Togo (+228)</option>
                                                    <option data-countryCode="TO" value="676">Tonga (+676)</option>
                                                    <option data-countryCode="TT" value="1868">Trinidad &amp; Tobago
                                                        (+1868)</option>
                                                    <option data-countryCode="TN" value="216">Tunisia (+216)
                                                    </option>
                                                    <option data-countryCode="TR" value="90">Turkey (+90)</option>
                                                    <option data-countryCode="TM" value="7">Turkmenistan (+7)
                                                    </option>
                                                    <option data-countryCode="TM" value="993">Turkmenistan (+993)
                                                    </option>
                                                    <option data-countryCode="TC" value="1649">Turks &amp; Caicos
                                                        Islands (+1649)</option>
                                                    <option data-countryCode="TV" value="688">Tuvalu (+688)</option>
                                                    <option data-countryCode="UG" value="256">Uganda (+256)</option>
                                                    <!-- <option data-countryCode="GB" value="44">UK (+44)</option> -->
                                                    <option data-countryCode="UA" value="380">Ukraine (+380)
                                                    </option>
                                                    <option data-countryCode="AE" value="971">United Arab Emirates
                                                        (+971)</option>
                                                    <option data-countryCode="UY" value="598">Uruguay (+598)
                                                    </option>
                                                    <!-- <option data-countryCode="US" value="1">USA (+1)</option> -->
                                                    <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                                                    <option data-countryCode="VU" value="678">Vanuatu (+678)
                                                    </option>
                                                    <option data-countryCode="VA" value="379">Vatican City (+379)
                                                    </option>
                                                    <option data-countryCode="VE" value="58">Venezuela (+58)
                                                    </option>
                                                    <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                                                    <option data-countryCode="VG" value="84">Virgin Islands -
                                                        British (+1284)</option>
                                                    <option data-countryCode="VI" value="84">Virgin Islands - US
                                                        (+1340)</option>
                                                    <option data-countryCode="WF" value="681">Wallis &amp; Futuna
                                                        (+681)</option>
                                                    <option data-countryCode="YE" value="969">Yemen (North)(+969)
                                                    </option>
                                                    <option data-countryCode="YE" value="967">Yemen (South)(+967)
                                                    </option>
                                                    <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                                                    <option data-countryCode="ZW" value="263">Zimbabwe (+263)
                                                    </option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-default">
                                        <label>Region/State</label>
                                        <div class="form-input form">
                                            <select name="region" id="region" class="form-control">
                                                <option value="select">Select Region</option>
                                                <option value="Ashanti">Ashanti</option>
                                                <option value="Ahafo">Ahafo</option>
                                                <option value="Bono">Bono</option>
                                                <option value="Bono East">Bono East</option>
                                                <option value="Western">Western</option>
                                                <option value="Central">Central</option>
                                                <option value="Greater Accra">Greater Accra</option>
                                                <option value="Eastern">Eastern</option>
                                                <option value="Volta">Volta</option>
                                                <option value="Oti">Oti</option>
                                                <option value="Northern">Northern</option>
                                                <option value="North East">North East</option>
                                                <option value="Upper East">Upper East</option>
                                                <option value="Savannah">Savannah</option>
                                                <option value="Upper West">Upper West</option>
                                                <option value="Western North">Western North</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3 text-center price-table-btn button">
                                    <input type="submit"  class="btn pay-with-stack" value="Proceed to Payment" >
                                </div>
                            </div>
                        </section>
                    </div>
                </div>

                <?php
                    include_once "php/config.php";
                    if(isset($_SESSION['uid'])){
                        $x=0;
                        $sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
                        $query = mysqli_query($con, $sql);

                        while($row=mysqli_fetch_array($query)){
                            $x++;
                            $product_id = $row["product_id"];
                            $product_title = $row["product_title"];
                            $product_price = $row["product_price"];
                            $product_image = $row["product_image"];
                            $cart_item_id = $row["id"];
                            $qty = $row["qty"];
                            $product_price = $qty*$product_price;
                            $total_price=$total_price+$product_price;
                            echo '
                                <input type="hidden" class="form-control"  name="total_count" value="'.$x.'">
                                <input type="hidden" class="form-control"  name="item_name_'.$x.'" value="'.$row["product_title"].'">
                                <input type="hidden" class="form-control"  name="item_number_'.$x.'" value="'.$x.'">
                                <input type="hidden" class="form-control"  name="amount_'.$x.'" value="'.$row["product_price"].'">
                                <input type="hidden" class="form-control"  name="quantity_'.$x.'" value="'.$row["qty"].'">
                            ';
                            $quantity += $row['qty'];
                        }
                    
                    }
                ?>
                <div class="col-lg-4 payment-block" style="display: none;">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-coupon">
                            <p style="display: none;" class="text-center alert alert-danger coupon-error"></p>
                            <p>Apply Coupon to get discount!</p>
                            <div class="single-form form-default">
                                <div class="form-input form">
                                    <input id="coupon" name="coupon" type="text" placeholder="Coupon Code">
                                </div>
                                <div class="button">
                                    <p id="coupon-btn" class="btn"> Apply</p>
                                </div>
                            </div>
                        </div>
                        <div class="checkout-sidebar-price-table mt-30">
                            <h5 class="title text-center" style="color: #e63946; font-weight: bold">PRICE SUMMARY</h5>
                            <div class="sub-total-price">
                                <div class="total-price">
                                    <p class="value">Total Quantity</p>
                                    <p class="price"><?php echo $quantity ?></p>
                                    <input type="hidden" name="quantity" id="quantity" value="<?php echo $quantity ?>">
                                </div>
                                <div class="total-price shipping">
                                    <p class="value">Items Price</p>
                                    <p class="price">GHS. <?php echo number_format($total_price) ?></p>
                                    <input type="hidden" name="item_price" id="item_price" value="<?php echo $total_price ?>">
                                </div>
                                <div class="total-price discount">
                                    <p class="value">Delivery</p>
                                    <p class="price">GHS. 20.00</p>
                                    <input type="hidden" name="delivery" id="delivery" value="20">
                                    <input type="hidden" name="discount" id="discount" >
                                </div>
                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p style="font-weight: bold; color: #e63946;" class="value">Total Price:</p>
                                    <p style="font-weight: bold; color: #e63946;" class="price">GHS. <?php echo number_format($total_price + 10) ?></p>
                                    <input type="hidden" name="total_price" id="total_price" value="<?php echo $total_price + 20 ?>">
                                </div>
                            </div>
                            <div class="price-table-btn button">
                                <input onclick="payWithPaystack()" type="submit" name="checkout-final" class="btn" value="Pay GHS.  <?php echo number_format($total_price +10) ?>" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<?php include_once 'include/footer.php'  ?>

<?php include_once 'include/script.php' ?>
<script src="actions.js"></script>
<script src="https://js.paystack.co/v1/inline.js"></script> 

<script>
    const paymentForm = document.getElementById('checkout-payment-form');
    
    var delivery = Number($("#delivery").val());
    var discount = Number($("#discount").val());
    paymentForm.addEventListener("submit", payWithPaystack, false);

    function payWithPaystack(e) {
        e.preventDefault();
        console.log(delivery);
        console.log(discount)
        //create .env
        const apiKey = "pk_test_7ecb0ab49db164af0b248a6e96e6f44cf9a7491b",  // Replace with your public key

            user_id = '<?php echo $_SESSION['uid'] ?>',
            user_unique_id = '<?php echo $_SESSION['unique_id'] ?>',
            first_name = document.getElementById("first-name").value,
            last_name = document.getElementById("last-name").value,
            email = document.getElementById("email").value,
            phone = document.getElementById("phone").value,
            address = document.getElementById("address").value,
            city = document.getElementById("city").value,
            country = document.getElementById("country").value,
            region = document.getElementById("region").value,
            quantity = document.getElementById("quantity").value,
            item_price = document.getElementById("item_price").value,
        total_price = document.getElementById("total_price").value;

        let handler = PaystackPop.setup({
            key: apiKey, 
            email: email,
            amount: document.getElementById("total_price").value * 100,
            currency: 'GHS',
            ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            // label: "Optional string that replaces customer email"
            onClose: function(){
                alert('Transaction was not completed, window closed.');
            },

            callback: function(response){
                const data = response.reference;
                //let message = 'Payment complete! Reference: ' + response.reference;
                //alert(message);
                //window.location.href = 'success-payment.php?successPaid='+data;
                $.ajax({
                    method: 'GET',
                    url: 'php/check-pay.php',
                    data: {
                        ref: data,
                        email: email,
                        user_id: user_id,
                        user_unique_id: user_unique_id,
                        first_name: first_name,
                        last_name: last_name,
                        phone: phone,
                        address: address,
                        city: city,
                        country: country,
                        region: region,
                        quantity: quantity,
                        item_price: item_price,
                        delivery: delivery,
                        discount: discount,
                        total_price: total_price,
                    },

                    success: function(data){
                        if(data === 'success'){
                            window.location.href = 'success-payment.php';
                        }else{
                            console.log(data);
                        }
                    }
                })
               
            }
        });
        handler.openIframe();
    }

    //insert order-data
    $('.pay-with-stack').on('click', function(e){
        e.preventDefault()
        $.ajax({
            url: 'php/order-details.php',
            method: 'POST',
            data: $('#checkout-payment-form').serialize(),

            success: function (data) {
                if(data == 'success'){
                    $('.payment-block').css('display', 'block');
                    $('.order-detail').fadeOut(3000);
                }else{
                    $('.error-text').css('display', 'block');
                    $('.error-text').html(data)
                }
            },
            error: function(err){
                console.log(err)
            }
        });
    })

    //Apply Coupon
    $('#coupon-btn').on('click', function(){
        $('.coupon-error').css('display', 'block');
        $('.coupon-error').html('Wrong coupon code').fadeOut(5000);
    })
</script>
