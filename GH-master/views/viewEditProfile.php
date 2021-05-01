
<?php
    $this->_t="Editing ".(htmlentities($user->user_username) ?? htmlentities($user->user_first_name) ??"")."'s Profile";
?>



<div class="container profile profile-view" id="profile" style="margin-top:5%">


        <div class="form-row profile-row">
            <div class="col-md-4 relative">
                <form action="" method="POST" name="editPicture" enctype="multipart/form-data">

                <div class="avatar" style="width:300px;height:300px;">
                    <?php if($user->user_profile_picture == null){
                        ?>
                        <img src="<?php echo(GameHeaven) ?>/views/assets/img/unknown_user.jpg" style="object-fit:fill;width:100%;height:100%;" class="rounded-circle" id="imgPrvw" title="Choose a rouded image ! ">
                        <?php
                    }else{
                        ?>
                        <img src="<?php echo(GameHeaven."users/$user->user_id/$user->user_profile_picture") ?>" style="object-fit:fill;width:100%;height:100%;" class="rounded-circle" id="imgPrvw" title="Choose a rouded image ! ">
                        
                        <?php
                    } ?>
                </div>
                <input style="margin-left:-2em;" type="file" class="form-control" name="profileImage" id="imgInp" accept="image/*" title="Choose a rouded image ! " require/>
                <div class="row no-gutters">
                        <div class="col content-center" >
                            <button style="width: 100%;margin-left:-2em;" class="btn btn-danger form-btn" type="submit" name="editPicture">Edit Picture</button>
                        </div>
                </div>
                </form>
            </div>
    
            <div class="col-md-8">
            <form action="" method="POST" name="editProfile">
                <h1 style="color:red;">Profile </h1>

                <hr class="idk">

                <div class="form-row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group"><label>First name </label>
                            <input class="form-control" type="text" name="firstname" value="<?php echo(htmlentities($user->user_first_name) ?? "") ?>" /></div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group"><label>Last name </label>
                            <input class="form-control" type="text" name="lastname" value="<?php echo(htmlentities($user->user_last_name) ?? "") ?>" /></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group"><label>User name </label>
                            <input class="form-control" type="text" name="pseudo" value="<?php echo(htmlentities($user->user_username)) ?>" /></div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group"><label>Location </label></div>
                        <div class="ui-select">
                            <select name="country" class="location border rounded" style="width:100%;" id="countries" >
                                <option value="none">Select a country</option>
                                <option value="AF" data-capital="Kabul">Afghanistan</option>
                                <option value="AX" data-capital="Mariehamn">Aland Islands</option>
                                <option value="AL" data-capital="Tirana">Albania</option>
                                <option value="DZ" data-capital="Algiers">Algeria</option>
                                <option value="AS" data-capital="Pago Pago">American Samoa</option>
                                <option value="AD" data-capital="Andorra la Vella">Andorra</option>
                                <option value="AO" data-capital="Luanda">Angola</option>
                                <option value="AI" data-capital="The Valley">Anguilla</option>
                                <option value="AG" data-capital="St. John's">Antigua and Barbuda</option>
                                <option value="AR" data-capital="Buenos Aires">Argentina</option>
                                <option value="AM" data-capital="Yerevan">Armenia</option>
                                <option value="AW" data-capital="Oranjestad">Aruba</option>
                                <option value="AU" data-capital="Canberra">Australia</option>
                                <option value="AT" data-capital="Vienna">Austria</option>
                                <option value="AZ" data-capital="Baku">Azerbaijan</option>
                                <option value="BS" data-capital="Nassau">Bahamas</option>
                                <option value="BH" data-capital="Manama">Bahrain</option>
                                <option value="BD" data-capital="Dhaka">Bangladesh</option>
                                <option value="BB" data-capital="Bridgetown">Barbados</option>
                                <option value="BY" data-capital="Minsk">Belarus</option>
                                <option value="BE" data-capital="Brussels">Belgium</option>
                                <option value="BZ" data-capital="Belmopan">Belize</option>
                                <option value="BJ" data-capital="Porto-Novo">Benin</option>
                                <option value="BM" data-capital="Hamilton">Bermuda</option>
                                <option value="BT" data-capital="Thimphu">Bhutan</option>
                                <option value="BO" data-capital="Sucre">Bolivia</option>
                                <option value="BA" data-capital="Sarajevo">Bosnia and Herzegovina</option>
                                <option value="BW" data-capital="Gaborone">Botswana</option>
                                <option value="BR" data-capital="Brasília">Brazil</option>
                                <option value="IO" data-capital="Diego Garcia">British Indian Ocean Territory</option>
                                <option value="BN" data-capital="Bandar Seri Begawan">Brunei Darussalam</option>
                                <option value="BG" data-capital="Sofia">Bulgaria</option>
                                <option value="BF" data-capital="Ouagadougou">Burkina Faso</option>
                                <option value="BI" data-capital="Bujumbura">Burundi</option>
                                <option value="CV" data-capital="Praia">Cabo Verde</option>
                                <option value="KH" data-capital="Phnom Penh">Cambodia</option>
                                <option value="CM" data-capital="Yaoundé">Cameroon</option>
                                <option value="CA" data-capital="Ottawa">Canada</option>
                                <option value="KY" data-capital="George Town">Cayman Islands</option>
                                <option value="CF" data-capital="Bangui">Central African Republic</option>
                                <option value="TD" data-capital="N'Djamena">Chad</option>
                                <option value="CL" data-capital="Santiago">Chile</option>
                                <option value="CN" data-capital="Beijing">China</option>
                                <option value="CX" data-capital="Flying Fish Cove">Christmas Island</option>
                                <option value="CC" data-capital="West Island">Cocos (Keeling) Islands</option>
                                <option value="CO" data-capital="Bogotá">Colombia</option>
                                <option value="KM" data-capital="Moroni">Comoros</option>
                                <option value="CK" data-capital="Avarua">Cook Islands</option>
                                <option value="CR" data-capital="San José">Costa Rica</option>
                                <option value="HR" data-capital="Zagreb">Croatia</option>
                                <option value="CU" data-capital="Havana">Cuba</option>
                                <option value="CW" data-capital="Willemstad">Curaçao</option>
                                <option value="CY" data-capital="Nicosia">Cyprus</option>
                                <option value="CZ" data-capital="Prague">Czech Republic</option>
                                <option value="CI" data-capital="Yamoussoukro">Côte d'Ivoire</option>
                                <option value="CD" data-capital="Kinshasa">Democratic Republic of the Congo</option>
                                <option value="DK" data-capital="Copenhagen">Denmark</option>
                                <option value="DJ" data-capital="Djibouti">Djibouti</option>
                                <option value="DM" data-capital="Roseau">Dominica</option>
                                <option value="DO" data-capital="Santo Domingo">Dominican Republic</option>
                                <option value="EC" data-capital="Quito">Ecuador</option>
                                <option value="EG" data-capital="Cairo">Egypt</option>
                                <option value="SV" data-capital="San Salvador">El Salvador</option>
                                <option value="GQ" data-capital="Malabo">Equatorial Guinea</option>
                                <option value="ER" data-capital="Asmara">Eritrea</option>
                                <option value="EE" data-capital="Tallinn">Estonia</option>
                                <option value="ET" data-capital="Addis Ababa">Ethiopia</option>
                                <option value="FK" data-capital="Stanley">Falkland Islands</option>
                                <option value="FO" data-capital="Tórshavn">Faroe Islands</option>
                                <option value="FM" data-capital="Palikir">Federated States of Micronesia</option>
                                <option value="FJ" data-capital="Suva">Fiji</option>
                                <option value="FI" data-capital="Helsinki">Finland</option>
                                <option value="MK" data-capital="Skopje">Former Yugoslav Republic of Macedonia</option>
                                <option value="FR" data-capital="Paris">France</option>
                                <option value="PF" data-capital="Papeete">French Polynesia</option>
                                <option value="GA" data-capital="Libreville">Gabon</option>
                                <option value="GM" data-capital="Banjul">Gambia</option>
                                <option value="GE" data-capital="Tbilisi">Georgia</option>
                                <option value="DE" data-capital="Berlin">Germany</option>
                                <option value="GH" data-capital="Accra">Ghana</option>
                                <option value="GI" data-capital="Gibraltar">Gibraltar</option>
                                <option value="GR" data-capital="Athens">Greece</option>
                                <option value="GL" data-capital="Nuuk">Greenland</option>
                                <option value="GD" data-capital="St. George's">Grenada</option>
                                <option value="GU" data-capital="Hagåtña">Guam</option>
                                <option value="GT" data-capital="Guatemala City">Guatemala</option>
                                <option value="GG" data-capital="Saint Peter Port">Guernsey</option>
                                <option value="GN" data-capital="Conakry">Guinea</option>
                                <option value="GW" data-capital="Bissau">Guinea-Bissau</option>
                                <option value="GY" data-capital="Georgetown">Guyana</option>
                                <option value="HT" data-capital="Port-au-Prince">Haiti</option>
                                <option value="VA" data-capital="Vatican City">Holy See</option>
                                <option value="HN" data-capital="Tegucigalpa">Honduras</option>
                                <option value="HK" data-capital="Hong Kong">Hong Kong</option>
                                <option value="HU" data-capital="Budapest">Hungary</option>
                                <option value="IS" data-capital="Reykjavik">Iceland</option>
                                <option value="IN" data-capital="New Delhi">India</option>
                                <option value="ID" data-capital="Jakarta">Indonesia</option>
                                <option value="IR" data-capital="Tehran">Iran</option>
                                <option value="IQ" data-capital="Baghdad">Iraq</option>
                                <option value="IE" data-capital="Dublin">Ireland</option>
                                
                                <option value="IM" data-capital="Douglas">Isle of Man</option>
                                <option value="IT" data-capital="Rome">Italy</option>
                                <option value="JM" data-capital="Kingston">Jamaica</option>
                                <option value="JP" data-capital="Tokyo">Japan</option>
                                <option value="JE" data-capital="Saint Helier">Jersey</option>
                                <option value="JO" data-capital="Amman">Jordan</option>
                                <option value="KZ" data-capital="Astana">Kazakhstan</option>
                                <option value="KE" data-capital="Nairobi">Kenya</option>
                                <option value="KI" data-capital="South Tarawa">Kiribati</option>
                                <option value="KW" data-capital="Kuwait City">Kuwait</option>
                                <option value="KG" data-capital="Bishkek">Kyrgyzstan</option>
                                <option value="LA" data-capital="Vientiane">Laos</option>
                                <option value="LV" data-capital="Riga">Latvia</option>
                                <option value="LB" data-capital="Beirut">Lebanon</option>
                                <option value="LS" data-capital="Maseru">Lesotho</option>
                                <option value="LR" data-capital="Monrovia">Liberia</option>
                                <option value="LY" data-capital="Tripoli">Libya</option>
                                <option value="LI" data-capital="Vaduz">Liechtenstein</option>
                                <option value="LT" data-capital="Vilnius">Lithuania</option>
                                <option value="LU" data-capital="Luxembourg City">Luxembourg</option>
                                <option value="MO" data-capital="Macau">Macau</option>
                                <option value="MG" data-capital="Antananarivo">Madagascar</option>
                                <option value="MW" data-capital="Lilongwe">Malawi</option>
                                <option value="MY" data-capital="Kuala Lumpur">Malaysia</option>
                                <option value="MV" data-capital="Malé">Maldives</option>
                                <option value="ML" data-capital="Bamako">Mali</option>
                                <option value="MT" data-capital="Valletta">Malta</option>
                                <option value="MH" data-capital="Majuro">Marshall Islands</option>
                                <option value="MQ" data-capital="Fort-de-France">Martinique</option>
                                <option value="MR" data-capital="Nouakchott">Mauritania</option>
                                <option value="MU" data-capital="Port Louis">Mauritius</option>
                                <option value="MX" data-capital="Mexico City">Mexico</option>
                                <option value="MD" data-capital="Chișinău">Moldova</option>
                                <option value="MC" data-capital="Monaco">Monaco</option>
                                <option value="MN" data-capital="Ulaanbaatar">Mongolia</option>
                                <option value="ME" data-capital="Podgorica">Montenegro</option>
                                <option value="MS" data-capital="Little Bay, Brades, Plymouth">Montserrat</option>
                                <option value="MA" data-capital="Rabat">Morocco</option>
                                <option value="MZ" data-capital="Maputo">Mozambique</option>
                                <option value="MM" data-capital="Naypyidaw">Myanmar</option>
                                <option value="NA" data-capital="Windhoek">Namibia</option>
                                <option value="NR" data-capital="Yaren District">Nauru</option>
                                <option value="NP" data-capital="Kathmandu">Nepal</option>
                                <option value="NL" data-capital="Amsterdam">Netherlands</option>
                                <option value="NZ" data-capital="Wellington">New Zealand</option>
                                <option value="NI" data-capital="Managua">Nicaragua</option>
                                <option value="NE" data-capital="Niamey">Niger</option>
                                <option value="NG" data-capital="Abuja">Nigeria</option>
                                <option value="NU" data-capital="Alofi">Niue</option>
                                <option value="NF" data-capital="Kingston">Norfolk Island</option>
                                <option value="KP" data-capital="Pyongyang">North Korea</option>
                                <option value="MP" data-capital="Capitol Hill">Northern Mariana Islands</option>
                                <option value="NO" data-capital="Oslo">Norway</option>
                                <option value="OM" data-capital="Muscat">Oman</option>
                                <option value="PK" data-capital="Islamabad">Pakistan</option>
                                <option value="PW" data-capital="Ngerulmud">Palau</option>
                                <option value="PA" data-capital="Panama City">Panama</option>
                                <option value="PG" data-capital="Port Moresby">Papua New Guinea</option>
                                <option value="PY" data-capital="Asunción">Paraguay</option>
                                <option value="PE" data-capital="Lima">Peru</option>
                                <option value="PH" data-capital="Manila">Philippines</option>
                                <option value="PN" data-capital="Adamstown">Pitcairn</option>
                                <option value="PL" data-capital="Warsaw">Poland</option>
                                <option value="PT" data-capital="Lisbon">Portugal</option>
                                <option value="PR" data-capital="San Juan">Puerto Rico</option>
                                <option value="QA" data-capital="Doha">Qatar</option>
                                <option value="CG" data-capital="Brazzaville">Republic of the Congo</option>
                                <option value="RO" data-capital="Bucharest">Romania</option>
                                <option value="RU" data-capital="Moscow">Russia</option>
                                <option value="RW" data-capital="Kigali">Rwanda</option>
                                <option value="BL" data-capital="Gustavia">Saint Barthélemy</option>
                                <option value="KN" data-capital="Basseterre">Saint Kitts and Nevis</option>
                                <option value="LC" data-capital="Castries">Saint Lucia</option>
                                <option value="VC" data-capital="Kingstown">Saint Vincent and the Grenadines</option>
                                <option value="WS" data-capital="Apia">Samoa</option>
                                <option value="SM" data-capital="San Marino">San Marino</option>
                                <option value="ST" data-capital="São Tomé">Sao Tome and Principe</option>
                                <option value="SA" data-capital="Riyadh">Saudi Arabia</option>
                                <option value="SN" data-capital="Dakar">Senegal</option>
                                <option value="RS" data-capital="Belgrade">Serbia</option>
                                <option value="SC" data-capital="Victoria">Seychelles</option>
                                <option value="SL" data-capital="Freetown">Sierra Leone</option>
                                <option value="SG" data-capital="Singapore">Singapore</option>
                                <option value="SX" data-capital="Philipsburg">Sint Maarten</option>
                                <option value="SK" data-capital="Bratislava">Slovakia</option>
                                <option value="SI" data-capital="Ljubljana">Slovenia</option>
                                <option value="SB" data-capital="Honiara">Solomon Islands</option>
                                <option value="SO" data-capital="Mogadishu">Somalia</option>
                                <option value="ZA" data-capital="Pretoria">South Africa</option>
                                <option value="KR" data-capital="Seoul">South Korea</option>
                                <option value="SS" data-capital="Juba">South Sudan</option>
                                <option value="ES" data-capital="Madrid">Spain</option>
                                <option value="LK" data-capital="Sri Jayawardenepura Kotte, Colombo">Sri Lanka</option>
                                <option value="PS" data-capital="Ramallah">State of Palestine</option>
                                <option value="SD" data-capital="Khartoum">Sudan</option>
                                <option value="SR" data-capital="Paramaribo">Suriname</option>
                                <option value="SZ" data-capital="Lobamba, Mbabane">Swaziland</option>
                                <option value="SE" data-capital="Stockholm">Sweden</option>
                                <option value="CH" data-capital="Bern">Switzerland</option>
                                <option value="SY" data-capital="Damascus">Syrian Arab Republic</option>
                                <option value="TW" data-capital="Taipei">Taiwan</option>
                                <option value="TJ" data-capital="Dushanbe">Tajikistan</option>
                                <option value="TZ" data-capital="Dodoma">Tanzania</option>
                                <option value="TH" data-capital="Bangkok">Thailand</option>
                                <option value="TL" data-capital="Dili">Timor-Leste</option>
                                <option value="TG" data-capital="Lomé">Togo</option>
                                <option value="TK" data-capital="Nukunonu, Atafu,Tokelau">Tokelau</option>
                                <option value="TO" data-capital="Nukuʻalofa">Tonga</option>
                                <option value="TT" data-capital="Port of Spain">Trinidad and Tobago</option>
                                <option value="TN" data-capital="Tunis">Tunisia</option>
                                <option value="TR" data-capital="Ankara">Turkey</option>
                                <option value="TM" data-capital="Ashgabat">Turkmenistan</option>
                                <option value="TC" data-capital="Cockburn Town">Turks and Caicos Islands</option>
                                <option value="TV" data-capital="Funafuti">Tuvalu</option>
                                <option value="UG" data-capital="Kampala">Uganda</option>
                                <option value="UA" data-capital="Kiev">Ukraine</option>
                                <option value="AE" data-capital="Abu Dhabi">United Arab Emirates</option>
                                <option value="GB" data-capital="London">United Kingdom</option>
                                <option value="US" data-capital="Washington, D.C.">United States of America</option>
                                <option value="UY" data-capital="Montevideo">Uruguay</option>
                                <option value="UZ" data-capital="Tashkent">Uzbekistan</option>
                                <option value="VU" data-capital="Port Vila">Vanuatu</option>
                                <option value="VE" data-capital="Caracas">Venezuela</option>
                                <option value="VN" data-capital="Hanoi">Vietnam</option>
                                <option value="VG" data-capital="Road Town">Virgin Islands (British)</option>
                                <option value="VI" data-capital="Charlotte Amalie">Virgin Islands (U.S.)</option>
                                <option value="EH" data-capital="Laayoune">Western Sahara</option>
                                <option value="YE" data-capital="Sana'a">Yemen</option>
                                <option value="ZM" data-capital="Lusaka">Zambia</option>
                                <option value="ZW" data-capital="Harare">Zimbabwe</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group"><label>Email </label><input class="form-control" type="email" autocomplete="off" required name="email" value="<?php echo(htmlentities($user->user_email) ?? "") ?>" /></div>


                <hr class="idk">
                <div class="translate">
                    <div class="form-row">
                        <div class="col-md-12 content-right">
                            <button class="btn btn-danger form-btn" type="submit" name="editProfile">SAVE </button>
                            <button class="btn btn-dark form-btn" type="reset">CANCEL </button></div>
                    </div>
                </div>
                </form>
            </div>

        </div>
    


    
    <form method="POST" action="">
        <div class="form-row profile-row">
            <div class="col-md-4 relative">
                <div class="avatar">

                </div></div>
            <div class="col-md-8">
                <h1 style="color:red;">Change Password</h1>
                <hr class="idk">
              
                <div class="form-row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group"><label>New password </label>
                        <input class="form-control" type="password" name="newPass" autocomplete="off" required /></div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group"><label>Confirm New Password</label>
                        <input class="form-control" type="password" name="confirmPass" autocomplete="off" required /></div>
                    </div>
                </div>
                <hr class="idk">
                <div class="translate">
                    <div class="form-row">
                        <div class="col-md-12 content-right">
                            <button class="btn btn-danger form-btn" type="submit" name="updateUserPassword">SAVE </button>
                            <button class="btn btn-dark form-btn" type="reset">CANCEL </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>




<script type="text/javascript">
var cn = "<?php echo($user->user_country); ?>";

var select = document.getElementById('countries');
var option;

for (var i=0; i<select.options.length; i++) {
    
option = select.options[i];
    if(option.value == cn){
        option.setAttribute('selected', true);
        
    }
 
}
</script>
