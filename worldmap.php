<?php
$xml = simplexml_load_file('advisory_en.xml');
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
	'IL' => 'Israel, the West Bank and Gaza',
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
	'PS' => 'Palestine',
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

$code_to_country = array_flip($country_codes);
//echo json_encode($code_to_country);
$level_colors = [
    1 => "#ececec",
    2 => "#ececec",
    3 => "#C54D4D",
    4 => "#C54D4D"
];

$country_colors = [];
$missing_countries = []; 

foreach ($xml->Advisory as $advisory) {
    $country_name = (string) $advisory->CountryCode;
    $level = (int) $advisory->Level;
    // Normalize country name: remove spaces, make lowercase
    $normalized_name = preg_replace('/[^A-Za-z]/', '', strtolower($country_name));

    if (array_key_exists($country_name, $country_codes)) {
        $country_code = $country_codes[$country_name];
        $country_colors[$country_code] = $level_colors[$level];
    //    echo $country_code . " " . $level_colors[$level] . "\n";
    } elseif (isset($code_to_country[$country_name])) {
        $country_code = $code_to_country[$country_name];
        $country_colors[$country_code] = $level_colors[$level];
    //    echo $country_code . " " . $level_colors[$level] . "\n";
    } else {
        $missing_countries[] = $country_name;
    }
}

if (!empty($missing_countries)) {
    foreach ($missing_countries as $country) {
        echo " Missing: - $country\n";
    }
}

$svg = file_get_contents('world.svg');

foreach ($country_colors as $code => $color) {
    $reversed_code = $code; // Reverse the country code
    echo "Setting color for $code (or $reversed_code) to $color\n";

    // Match both normal and reversed codes in id, name, or class attributes
    $svg = preg_replace(
        '/(<path[^>]+(?:id|name|class)="(?:' . preg_quote($code, '/') . '|' . preg_quote($reversed_code, '/') . ')"[^>]*?)\s*(fill="[^"]*")?/',
        '$1 fill="' . $color . '" ',
        $svg
    );

    // Match by country name if id, class, or reversed codes did not match
    $country_name = array_search($code, $country_codes);
    if ($country_name) {
        $svg = preg_replace(
            '/(<path[^>]+name="' . preg_quote($country_name, '/') . '"[^>]*?)\s*(fill="[^"]*")?/',
            '$1 fill="' . $color . '" ',
            $svg
        );
    }

    // Debugging: Check if replacements are applied
    if (
        !preg_match('/fill="' . preg_quote($color, '/') . '"/', $svg) &&
        (strpos($svg, $code) === false && strpos($svg, $reversed_code) === false)
    ) {
        echo "Warning: No match found for $code or $reversed_code\n";
    }
}

file_put_contents('world2.svg', $svg);