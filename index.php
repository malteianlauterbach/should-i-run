<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Should I run?</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #383838;
            color: #C54D4D;
            font-family: "Anonymous Pro", monospace;
        }

        h1 {
            font-size: 48px;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
            color: #fff;
        }

        input[type="text"] {
            width: 300px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }

        #suggestions {
            border: 1px solid #ccc;
            max-height: 150px;
            overflow-y: auto;
            background: #fff;
            width: calc(100% - 22px);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        #suggestions div {
            padding: 8px;
            cursor: pointer;
        }

        #suggestions div:hover {
            background-color: #f0f0f0;
        }

        #divmap {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 70%;
            height: 70%;
        }

        #svgmap {
            width: 80%;
            height: auto;
            border: none;
        }

        button {
            padding: 10px 20px;
            background-color: #C54D4D;
            color: #fff;
            font-size: 16px;
            border: none;
            cursor: pointer;
            margin-top: 2%;
        }

        button:hover {
            background-color: #c20000;
        }
    </style>
    <script>
        function showSuggestions(value) {
            const countries = [
                "Afghanistan", "Aland Islands", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla",
                "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan",
                "The Bahamas", "Bahrain", "Bangladesh", "Barbados", "Russia", "Belarus", "Belgium", "Belize", "Benin",
                "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Bouvet Island", "Brazil",
                "British Indian Ocean Territory", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Bonaire", "Cambodia",
                "Cameroon", "Canada", "Cabo Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China",
                "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Republic of the Congo",
                "Democratic Republic of the Congo", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba",
                "Cyprus", "Curacao", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador",
                "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)",
                "Faroe Islands", "Fiji", "Finland", "France", "French Guiana", "French Polynesia",
                "French Southern Territories", "Gabon", "The Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece",
                "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea-Bissau", "Guyana",
                "Haiti", "Heard Island & Mcdonald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong",
                "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Isle Of Man",
                "Israel, the West Bank and Gaza", "Italy", "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya",
                "Kiribati", "North Korea (Democratic Peoples Republic of Korea)", "South Korea", "Kuwait",
                "The Kyrgyz Republic", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein",
                "Lithuania", "Luxembourg", "Macau", "North Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives",
                "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico",
                "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique",
                "Burma (Myanmar)", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia",
                "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands",
                "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines",
                "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Rwanda", "Saint Barthelemy",
                "Saint Helena", "Saint Kitts and Nevis", "Saint Lucia", "Sint Maarten", "Saint Pierre And Miquelon",
                "Saint Vincent and The Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia",
                "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Island",
                "Somalia", "South Africa", "South Georgia And Sandwich Isl.", "Spain", "Sri Lanka", "Sudan", "South Sudan",
                "Suriname", "Svalbard And Jan Mayen", "Eswatini", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan",
                "Tanzania", "Thailand", "Timor-Leste", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia",
                "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates",
                "United Kingdom", "United States", "United States Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu",
                "Venezuela", "Vietnam", "British Virgin Islands", "Virgin Islands, U.S.", "Wallis And Futuna",
                "Western Sahara", "Yemen", "Zambia", "Zimbabwe", "Kosovo"
                ];

            const suggestions = document.getElementById('suggestions');
            suggestions.innerHTML = '';

            if (value.length > 0) {
                const matches = countries.filter(country =>
                    country.toLowerCase().startsWith(value.toLowerCase())
                );

                matches.forEach(match => {
                    const div = document.createElement('div');
                    div.textContent = match;
                    div.onclick = () => {
                        document.getElementById('country').value = match;
                        suggestions.innerHTML = '';
                    };
                    suggestions.appendChild(div);
                });
            }
        }

        document.addEventListener('click', (e) => {
            if (!document.getElementById('suggestions').contains(e.target)) {
                document.getElementById('suggestions').innerHTML = '';
            }
        });
    </script>
</head>

<body>
    <h1>Should I run from...</h1>
    <form method="POST">
        <input type="text" id="country" name="country" placeholder="Enter a country" required oninput="showSuggestions(this.value)">
        <div id="suggestions"></div>
        <button type="submit">Check</button>
        <button onclick="window.location.href='https://www.berlinstory-news.de/datenschutzerklaerung/'">Legal & Privacy</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $inputCountry = ($_POST['country']);
        $country_codes = [
            'AF' => 'Afghanistan',
            'AX' => 'Aland Islands',
            'AL' => 'Albania',
            'DZ' => 'Algeria',
            'AS' => 'American Samoa',
            'AD' => 'Andorra',
            'AO' => 'Angola',
            'AI' => 'Anguilla',
            'AQ' => 'Antarctica',
            'AG' => 'Antigua and Barbuda',
            'AR' => 'Argentina',
            'AM' => 'Armenia',
            'AW' => 'Aruba',
            'AU' => 'Australia',
            'AT' => 'Austria',
            'AZ' => 'Azerbaijan',
            'BS' => 'The Bahamas',
            'BH' => 'Bahrain',
            'BD' => 'Bangladesh',
            'BB' => 'Barbados',
            'RU' => 'Russia',
            'BY' => 'Belarus',
            'BE' => 'Belgium',
            'BZ' => 'Belize',
            'BJ' => 'Benin',
            'BM' => 'Bermuda',
            'BT' => 'Bhutan',
            'BO' => 'Bolivia',
            'BA' => 'Bosnia and Herzegovina',
            'BW' => 'Botswana',
            'BV' => 'Bouvet Island',
            'BR' => 'Brazil',
            'IO' => 'British Indian Ocean Territory',
            'BN' => 'Brunei',
            'BG' => 'Bulgaria',
            'BF' => 'Burkina Faso',
            'BI' => 'Burundi',
            'BQ' => 'Bonaire',
            'KH' => 'Cambodia',
            'CM' => 'Cameroon',
            'CA' => 'Canada',
            'CV' => 'Cabo Verde',
            'KY' => 'Cayman Islands',
            'CF' => 'Central African Republic',
            'TD' => 'Chad',
            'CL' => 'Chile',
            'CN' => 'China',
            'CX' => 'Christmas Island',
            'CC' => 'Cocos (Keeling) Islands',
            'CO' => 'Colombia',
            'KM' => 'Comoros',
            'CG' => 'Republic of the Congo',
            'CD' => 'Democratic Republic of the Congo',
            'CK' => 'Cook Islands',
            'CR' => 'Costa Rica',
            'CI' => 'Cote d\'Ivoire',
            'HR' => 'Croatia',
            'CU' => 'Cuba',
            'CY' => 'Cyprus',
            'CW' => 'Curacao',
            'CZ' => 'Czech Republic',
            'DK' => 'Denmark',
            'DJ' => 'Djibouti',
            'DM' => 'Dominica',
            'DO' => 'Dominican Republic',
            'EC' => 'Ecuador',
            'EG' => 'Egypt',
            'SV' => 'El Salvador',
            'GQ' => 'Equatorial Guinea',
            'ER' => 'Eritrea',
            'EE' => 'Estonia',
            'ET' => 'Ethiopia',
            'FK' => 'Falkland Islands (Malvinas)',
            'FO' => 'Faroe Islands',
            'FJ' => 'Fiji',
            'FI' => 'Finland',
            'FR' => 'France',
            'GF' => 'French Guiana',
            'PF' => 'French Polynesia',
            'TF' => 'French Southern Territories',
            'GA' => 'Gabon',
            'GM' => 'The Gambia',
            'GE' => 'Georgia',
            'DE' => 'Germany',
            'GH' => 'Ghana',
            'GI' => 'Gibraltar',
            'GR' => 'Greece',
            'GL' => 'Greenland',
            'GD' => 'Grenada',
            'GP' => 'Guadeloupe',
            'GU' => 'Guam',
            'GT' => 'Guatemala',
            'GG' => 'Guernsey',
            'GN' => 'Guinea',
            'GW' => 'Guinea-Bissau',
            'GY' => 'Guyana',
            'HT' => 'Haiti',
            'HM' => 'Heard Island & Mcdonald Islands',
            'VA' => 'Holy See (Vatican City State)',
            'HN' => 'Honduras',
            'HK' => 'Hong Kong',
            'HU' => 'Hungary',
            'IS' => 'Iceland',
            'IN' => 'India',
            'ID' => 'Indonesia',
            'IR' => 'Iran',
            'IQ' => 'Iraq',
            'IE' => 'Ireland',
            'IM' => 'Isle Of Man',
            'PS' => 'Israel, the West Bank and Gaza',
            'IT' => 'Italy',
            'JM' => 'Jamaica',
            'JP' => 'Japan',
            'JE' => 'Jersey',
            'JO' => 'Jordan',
            'KZ' => 'Kazakhstan',
            'KE' => 'Kenya',
            'KI' => 'Kiribati',
            'KP' => 'North Korea (Democratic Peoples Republic of Korea)',
            'KR' => 'South Korea',
            'KW' => 'Kuwait',
            'KG' => 'The Kyrgyz Republic',
            'LA' => 'Laos',
            'LV' => 'Latvia',
            'LB' => 'Lebanon',
            'LS' => 'Lesotho',
            'LR' => 'Liberia',
            'LY' => 'Libya',
            'LI' => 'Liechtenstein',
            'LT' => 'Lithuania',
            'LU' => 'Luxembourg',
            'MO' => 'Macau',
            'MK' => 'North Macedonia',
            'MG' => 'Madagascar',
            'MW' => 'Malawi',
            'MY' => 'Malaysia',
            'MV' => 'Maldives',
            'ML' => 'Mali',
            'MT' => 'Malta',
            'MH' => 'Marshall Islands',
            'MQ' => 'Martinique',
            'MR' => 'Mauritania',
            'MU' => 'Mauritius',
            'YT' => 'Mayotte',
            'MX' => 'Mexico',
            'FM' => 'Micronesia',
            'MD' => 'Moldova',
            'MC' => 'Monaco',
            'MN' => 'Mongolia',
            'ME' => 'Montenegro',
            'MS' => 'Montserrat',
            'MA' => 'Morocco',
            'MZ' => 'Mozambique',
            'MM' => 'Burma (Myanmar)',
            'NA' => 'Namibia',
            'NR' => 'Nauru',
            'NP' => 'Nepal',
            'NL' => 'Netherlands',
            'AN' => 'Netherlands Antilles',
            'NC' => 'New Caledonia',
            'NZ' => 'New Zealand',
            'NI' => 'Nicaragua',
            'NE' => 'Niger',
            'NG' => 'Nigeria',
            'NU' => 'Niue',
            'NF' => 'Norfolk Island',
            'MP' => 'Northern Mariana Islands',
            'NO' => 'Norway',
            'OM' => 'Oman',
            'PK' => 'Pakistan',
            'PW' => 'Palau',
            'PA' => 'Panama',
            'PG' => 'Papua New Guinea',
            'PY' => 'Paraguay',
            'PE' => 'Peru',
            'PH' => 'Philippines',
            'PN' => 'Pitcairn',
            'PL' => 'Poland',
            'PT' => 'Portugal',
            'PR' => 'Puerto Rico',
            'QA' => 'Qatar',
            'RE' => 'Reunion',
            'RO' => 'Romania',
            'RW' => 'Rwanda',
            'BL' => 'Saint Barthelemy',
            'SH' => 'Saint Helena',
            'KN' => 'Saint Kitts and Nevis',
            'LC' => 'Saint Lucia',
            'MF' => 'Sint Maarten',
            'PM' => 'Saint Pierre And Miquelon',
            'VC' => 'Saint Vincent and The Grenadines',
            'WS' => 'Samoa',
            'SM' => 'San Marino',
            'ST' => 'Sao Tome and Principe',
            'SA' => 'Saudi Arabia',
            'SN' => 'Senegal',
            'RS' => 'Serbia',
            'SC' => 'Seychelles',
            'SL' => 'Sierra Leone',
            'SG' => 'Singapore',
            'SK' => 'Slovakia',
            'SI' => 'Slovenia',
            'SB' => 'Solomon Island',
            'SO' => 'Somalia',
            'ZA' => 'South Africa',
            'GS' => 'South Georgia And Sandwich Isl.',
            'ES' => 'Spain',
            'LK' => 'Sri Lanka',
            'SD' => 'Sudan',
            'SS' => 'South Sudan',
            'SR' => 'Suriname',
            'SJ' => 'Svalbard And Jan Mayen',
            'SZ' => 'Eswatini',
            'SE' => 'Sweden',
            'CH' => 'Switzerland',
            'SY' => 'Syria',
            'TW' => 'Taiwan',
            'TJ' => 'Tajikistan',
            'TZ' => 'Tanzania',
            'TH' => 'Thailand',
            'TL' => 'Timor-Leste',
            'TG' => 'Togo',
            'TK' => 'Tokelau',
            'TO' => 'Tonga',
            'TT' => 'Trinidad and Tobago',
            'TN' => 'Tunisia',
            'TR' => 'Turkey',
            'TM' => 'Turkmenistan',
            'TC' => 'Turks and Caicos Islands',
            'TV' => 'Tuvalu',
            'UG' => 'Uganda',
            'UA' => 'Ukraine',
            'AE' => 'United Arab Emirates',
            'GB' => 'United Kingdom',
            'US' => 'United States',
            'UM' => 'United States Outlying Islands',
            'UY' => 'Uruguay',
            'UZ' => 'Uzbekistan',
            'VU' => 'Vanuatu',
            'VE' => 'Venezuela',
            'VN' => 'Vietnam',
            'VG' => 'British Virgin Islands',
            'VI' => 'Virgin Islands, U.S.',
            'WF' => 'Wallis And Futuna',
            'EH' => 'Western Sahara',
            'YE' => 'Yemen',
            'ZM' => 'Zambia',
            'ZW' => 'Zimbabwe',
            'XK' => 'Kosovo'
        ];


        $advisoryUrl = 'advisory_en.xml';
        $advisories = simplexml_load_file($advisoryUrl);

        $levelMessages = [
            1 => "Exercise normal caution",
            2 => "Exercise heightened caution",
            3 => "Exercise extreme caution",
            4 => "Extraordinary danger. Exercise maximum caution"
        ];

        $reversed_country_codes = array_flip($country_codes);
if (array_key_exists($inputCountry, $reversed_country_codes)) {
    $countryCode = $reversed_country_codes[$inputCountry];
    foreach ($advisories->Advisory as $advisory) {
        if ((string)$advisory->CountryCode === $countryCode) {
            $level = (int)$advisory->Level;
            $message = $levelMessages[$level] ?? "Unknown level";
            $date = (string)$advisory->Date;

            if ($level === 1 || $level === 2) {
                echo "<p style='color: #69c54d; font-size: 36px; text-align: center;'>NO</p>";
            } elseif ($level === 3) {
                echo "<p style='color: #ff6600; font-size: 36px; text-align: center;'>Maybe</p>";
            } elseif ($level === 4) {
                echo "<p style='color: #C54D4D; font-size: 36px; text-align: center;'>YES</p>";
            }
            echo "<p>Advisory for <strong>$inputCountry</strong>:<br> ";
            echo "<strong>Level:</strong> $level ($message)<br>";
            echo "<strong>Date Issued:</strong> $date</p>";
            return;
        }
    }
}
    }

    ?>
    <div id="divmap">
        <object id="svgmap" type="image/svg+xml" data="world2.svg"></object>
    </div>
</body>

</html>
