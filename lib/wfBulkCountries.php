<?php
if (!defined('FIREWALL_VERSION')) { exit; }

$wfBulkCountries = array(
"AD" => __("Andorra", 'twodayssss'),
"AE" => __("United Arab Emirates", 'twodayssss'),
"AF" => __("Afghanistan", 'twodayssss'),
"AG" => __("Antigua and Barbuda", 'twodayssss'),
"AI" => __("Anguilla", 'twodayssss'),
"AL" => __("Albania", 'twodayssss'),
"AM" => __("Armenia", 'twodayssss'),
"AO" => __("Angola", 'twodayssss'),
"AQ" => __("Antarctica", 'twodayssss'),
"AR" => __("Argentina", 'twodayssss'),
"AS" => __("American Samoa", 'twodayssss'),
"AT" => __("Austria", 'twodayssss'),
"AU" => __("Australia", 'twodayssss'),
"AW" => __("Aruba", 'twodayssss'),
"AX" => __("Aland Islands", 'twodayssss'),
"AZ" => __("Azerbaijan", 'twodayssss'),
"BA" => __("Bosnia and Herzegovina", 'twodayssss'),
"BB" => __("Barbados", 'twodayssss'),
"BD" => __("Bangladesh", 'twodayssss'),
"BE" => __("Belgium", 'twodayssss'),
"BF" => __("Burkina Faso", 'twodayssss'),
"BG" => __("Bulgaria", 'twodayssss'),
"BH" => __("Bahrain", 'twodayssss'),
"BI" => __("Burundi", 'twodayssss'),
"BJ" => __("Benin", 'twodayssss'),
"BL" => __("Saint Bartelemey", 'twodayssss'),
"BM" => __("Bermuda", 'twodayssss'),
"BN" => __("Brunei Darussalam", 'twodayssss'),
"BO" => __("Bolivia", 'twodayssss'),
"BQ" => __("Bonaire, Saint Eustatius and Saba", 'twodayssss'),
"BR" => __("Brazil", 'twodayssss'),
"BS" => __("Bahamas", 'twodayssss'),
"BT" => __("Bhutan", 'twodayssss'),
"BV" => __("Bouvet Island", 'twodayssss'),
"BW" => __("Botswana", 'twodayssss'),
"BY" => __("Belarus", 'twodayssss'),
"BZ" => __("Belize", 'twodayssss'),
"CA" => __("Canada", 'twodayssss'),
"CC" => __("Cocos (Keeling) Islands", 'twodayssss'),
"CD" => __("Congo, The Democratic Republic of the", 'twodayssss'),
"CF" => __("Central African Republic", 'twodayssss'),
"CG" => __("Congo", 'twodayssss'),
"CH" => __("Switzerland", 'twodayssss'),
"CI" => __("Cote dIvoire", 'twodayssss'),
"CK" => __("Cook Islands", 'twodayssss'),
"CL" => __("Chile", 'twodayssss'),
"CM" => __("Cameroon", 'twodayssss'),
"CN" => __("China", 'twodayssss'),
"CO" => __("Colombia", 'twodayssss'),
"CR" => __("Costa Rica", 'twodayssss'),
"CU" => __("Cuba", 'twodayssss'),
"CV" => __("Cape Verde", 'twodayssss'),
"CW" => __("Curacao", 'twodayssss'),
"CX" => __("Christmas Island", 'twodayssss'),
"CY" => __("Cyprus", 'twodayssss'),
"CZ" => __("Czech Republic", 'twodayssss'),
"DE" => __("Germany", 'twodayssss'),
"DJ" => __("Djibouti", 'twodayssss'),
"DK" => __("Denmark", 'twodayssss'),
"DM" => __("Dominica", 'twodayssss'),
"DO" => __("Dominican Republic", 'twodayssss'),
"DZ" => __("Algeria", 'twodayssss'),
"EC" => __("Ecuador", 'twodayssss'),
"EE" => __("Estonia", 'twodayssss'),
"EG" => __("Egypt", 'twodayssss'),
"EH" => __("Western Sahara", 'twodayssss'),
"ER" => __("Eritrea", 'twodayssss'),
"ES" => __("Spain", 'twodayssss'),
"ET" => __("Ethiopia", 'twodayssss'),
"EU" => __("Europe", 'twodayssss'),
"FI" => __("Finland", 'twodayssss'),
"FJ" => __("Fiji", 'twodayssss'),
"FK" => __("Falkland Islands (Malvinas)", 'twodayssss'),
"FM" => __("Micronesia, Federated States of", 'twodayssss'),
"FO" => __("Faroe Islands", 'twodayssss'),
"FR" => __("France", 'twodayssss'),
"GA" => __("Gabon", 'twodayssss'),
"GB" => __("United Kingdom", 'twodayssss'),
"GD" => __("Grenada", 'twodayssss'),
"GE" => __("Georgia", 'twodayssss'),
"GF" => __("French Guiana", 'twodayssss'),
"GG" => __("Guernsey", 'twodayssss'),
"GH" => __("Ghana", 'twodayssss'),
"GI" => __("Gibraltar", 'twodayssss'),
"GL" => __("Greenland", 'twodayssss'),
"GM" => __("Gambia", 'twodayssss'),
"GN" => __("Guinea", 'twodayssss'),
"GP" => __("Guadeloupe", 'twodayssss'),
"GQ" => __("Equatorial Guinea", 'twodayssss'),
"GR" => __("Greece", 'twodayssss'),
"GS" => __("South Georgia and the South Sandwich Islands", 'twodayssss'),
"GT" => __("Guatemala", 'twodayssss'),
"GU" => __("Guam", 'twodayssss'),
"GW" => __("Guinea-Bissau", 'twodayssss'),
"GY" => __("Guyana", 'twodayssss'),
"HK" => __("Hong Kong", 'twodayssss'),
"HM" => __("Heard Island and McDonald Islands", 'twodayssss'),
"HN" => __("Honduras", 'twodayssss'),
"HR" => __("Croatia", 'twodayssss'),
"HT" => __("Haiti", 'twodayssss'),
"HU" => __("Hungary", 'twodayssss'),
"ID" => __("Indonesia", 'twodayssss'),
"IE" => __("Ireland", 'twodayssss'),
"IL" => __("Israel", 'twodayssss'),
"IM" => __("Isle of Man", 'twodayssss'),
"IN" => __("India", 'twodayssss'),
"IO" => __("British Indian Ocean Territory", 'twodayssss'),
"IQ" => __("Iraq", 'twodayssss'),
"IR" => __("Iran, Islamic Republic of", 'twodayssss'),
"IS" => __("Iceland", 'twodayssss'),
"IT" => __("Italy", 'twodayssss'),
"JE" => __("Jersey", 'twodayssss'),
"JM" => __("Jamaica", 'twodayssss'),
"JO" => __("Jordan", 'twodayssss'),
"JP" => __("Japan", 'twodayssss'),
"KE" => __("Kenya", 'twodayssss'),
"KG" => __("Kyrgyzstan", 'twodayssss'),
"KH" => __("Cambodia", 'twodayssss'),
"KI" => __("Kiribati", 'twodayssss'),
"KM" => __("Comoros", 'twodayssss'),
"KN" => __("Saint Kitts and Nevis", 'twodayssss'),
"KP" => __("North Korea", 'twodayssss'),
"KR" => __("South Korea", 'twodayssss'),
"KW" => __("Kuwait", 'twodayssss'),
"KY" => __("Cayman Islands", 'twodayssss'),
"KZ" => __("Kazakhstan", 'twodayssss'),
"LA" => __("Lao Peoples Democratic Republic", 'twodayssss'),
"LB" => __("Lebanon", 'twodayssss'),
"LC" => __("Saint Lucia", 'twodayssss'),
"LI" => __("Liechtenstein", 'twodayssss'),
"LK" => __("Sri Lanka", 'twodayssss'),
"LR" => __("Liberia", 'twodayssss'),
"LS" => __("Lesotho", 'twodayssss'),
"LT" => __("Lithuania", 'twodayssss'),
"LU" => __("Luxembourg", 'twodayssss'),
"LV" => __("Latvia", 'twodayssss'),
"LY" => __("Libyan Arab Jamahiriya", 'twodayssss'),
"MA" => __("Morocco", 'twodayssss'),
"MC" => __("Monaco", 'twodayssss'),
"MD" => __("Moldova, Republic of", 'twodayssss'),
"ME" => __("Montenegro", 'twodayssss'),
"MF" => __("Saint Martin", 'twodayssss'),
"MG" => __("Madagascar", 'twodayssss'),
"MH" => __("Marshall Islands", 'twodayssss'),
"MK" => __("Macedonia", 'twodayssss'),
"ML" => __("Mali", 'twodayssss'),
"MM" => __("Myanmar", 'twodayssss'),
"MN" => __("Mongolia", 'twodayssss'),
"MO" => __("Macao", 'twodayssss'),
"MP" => __("Northern Mariana Islands", 'twodayssss'),
"MQ" => __("Martinique", 'twodayssss'),
"MR" => __("Mauritania", 'twodayssss'),
"MS" => __("Montserrat", 'twodayssss'),
"MT" => __("Malta", 'twodayssss'),
"MU" => __("Mauritius", 'twodayssss'),
"MV" => __("Maldives", 'twodayssss'),
"MW" => __("Malawi", 'twodayssss'),
"MX" => __("Mexico", 'twodayssss'),
"MY" => __("Malaysia", 'twodayssss'),
"MZ" => __("Mozambique", 'twodayssss'),
"NA" => __("Namibia", 'twodayssss'),
"NC" => __("New Caledonia", 'twodayssss'),
"NE" => __("Niger", 'twodayssss'),
"NF" => __("Norfolk Island", 'twodayssss'),
"NG" => __("Nigeria", 'twodayssss'),
"NI" => __("Nicaragua", 'twodayssss'),
"NL" => __("Netherlands", 'twodayssss'),
"NO" => __("Norway", 'twodayssss'),
"NP" => __("Nepal", 'twodayssss'),
"NR" => __("Nauru", 'twodayssss'),
"NU" => __("Niue", 'twodayssss'),
"NZ" => __("New Zealand", 'twodayssss'),
"OM" => __("Oman", 'twodayssss'),
"PA" => __("Panama", 'twodayssss'),
"PE" => __("Peru", 'twodayssss'),
"PF" => __("French Polynesia", 'twodayssss'),
"PG" => __("Papua New Guinea", 'twodayssss'),
"PH" => __("Philippines", 'twodayssss'),
"PK" => __("Pakistan", 'twodayssss'),
"PL" => __("Poland", 'twodayssss'),
"PM" => __("Saint Pierre and Miquelon", 'twodayssss'),
"PN" => __("Pitcairn", 'twodayssss'),
"PR" => __("Puerto Rico", 'twodayssss'),
"PS" => __("Palestinian Territory", 'twodayssss'),
"PT" => __("Portugal", 'twodayssss'),
"PW" => __("Palau", 'twodayssss'),
"PY" => __("Paraguay", 'twodayssss'),
"QA" => __("Qatar", 'twodayssss'),
"RE" => __("Reunion", 'twodayssss'),
"RO" => __("Romania", 'twodayssss'),
"RS" => __("Serbia", 'twodayssss'),
"RU" => __("Russian Federation", 'twodayssss'),
"RW" => __("Rwanda", 'twodayssss'),
"SA" => __("Saudi Arabia", 'twodayssss'),
"SB" => __("Solomon Islands", 'twodayssss'),
"SC" => __("Seychelles", 'twodayssss'),
"SD" => __("Sudan", 'twodayssss'),
"SE" => __("Sweden", 'twodayssss'),
"SG" => __("Singapore", 'twodayssss'),
"SH" => __("Saint Helena", 'twodayssss'),
"SI" => __("Slovenia", 'twodayssss'),
"SJ" => __("Svalbard and Jan Mayen", 'twodayssss'),
"SK" => __("Slovakia", 'twodayssss'),
"SL" => __("Sierra Leone", 'twodayssss'),
"SM" => __("San Marino", 'twodayssss'),
"SN" => __("Senegal", 'twodayssss'),
"SO" => __("Somalia", 'twodayssss'),
"SR" => __("Suriname", 'twodayssss'),
"ST" => __("Sao Tome and Principe", 'twodayssss'),
"SV" => __("El Salvador", 'twodayssss'),
"SX" => __("Sint Maarten", 'twodayssss'),
"SY" => __("Syrian Arab Republic", 'twodayssss'),
"SZ" => __("Swaziland", 'twodayssss'),
"TC" => __("Turks and Caicos Islands", 'twodayssss'),
"TD" => __("Chad", 'twodayssss'),
"TF" => __("French Southern Territories", 'twodayssss'),
"TG" => __("Togo", 'twodayssss'),
"TH" => __("Thailand", 'twodayssss'),
"TJ" => __("Tajikistan", 'twodayssss'),
"TK" => __("Tokelau", 'twodayssss'),
"TL" => __("Timor-Leste", 'twodayssss'),
"TM" => __("Turkmenistan", 'twodayssss'),
"TN" => __("Tunisia", 'twodayssss'),
"TO" => __("Tonga", 'twodayssss'),
"TR" => __("Turkey", 'twodayssss'),
"TT" => __("Trinidad and Tobago", 'twodayssss'),
"TV" => __("Tuvalu", 'twodayssss'),
"TW" => __("Taiwan", 'twodayssss'),
"TZ" => __("Tanzania, United Republic of", 'twodayssss'),
"UA" => __("Ukraine", 'twodayssss'),
"UG" => __("Uganda", 'twodayssss'),
"UM" => __("United States Minor Outlying Islands", 'twodayssss'),
"US" => __("United States", 'twodayssss'),
"UY" => __("Uruguay", 'twodayssss'),
"UZ" => __("Uzbekistan", 'twodayssss'),
"VA" => __("Holy See (Vatican City State)", 'twodayssss'),
"VC" => __("Saint Vincent and the Grenadines", 'twodayssss'),
"VE" => __("Venezuela", 'twodayssss'),
"VG" => __("Virgin Islands, British", 'twodayssss'),
"VI" => __("Virgin Islands, U.S.", 'twodayssss'),
"VN" => __("Vietnam", 'twodayssss'),
"VU" => __("Vanuatu", 'twodayssss'),
"WF" => __("Wallis and Futuna", 'twodayssss'),
"WS" => __("Samoa", 'twodayssss'),
"XK" => __("Kosovo", 'twodayssss'),
"YE" => __("Yemen", 'twodayssss'),
"YT" => __("Mayotte", 'twodayssss'),
"ZA" => __("South Africa", 'twodayssss'),
"ZM" => __("Zambia", 'twodayssss'),
"ZW" => __("Zimbabwe", 'twodayssss'),
);
