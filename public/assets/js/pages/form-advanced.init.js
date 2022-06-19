!(function (t) {
    "use strict";
    function e() {}
    (e.prototype.initSelect2 = function () {
        t('[data-toggle="select2"]').select2();
    }),
        (e.prototype.initSwitchery = function () {
            t('[data-plugin="switchery"]').each(function (e, a) {
                new Switchery(a, t(a).data());
            });
        }),
        (e.prototype.initMultiSelect = function () {
            0 < t('[data-plugin="multiselect"]').length && t('[data-plugin="multiselect"]').multiSelect(t(this).data());
        }),
        (e.prototype.initTouchspin = function () {
            var n = {};
            t('[data-toggle="touchspin"]').each(function (e, a) {
                var i = t.extend({}, n, t(a).data());
                t(a).TouchSpin(i);
            });
        }),
        (e.prototype.init = function () {
            this.initSelect2(),
                this.initSwitchery(),
                this.initMultiSelect(),
                this.initTouchspin(),
                window.addEventListener("resize", function () {
                    var e = document.body.querySelectorAll("span"),
                        a = e[e.length - 1];
                    "-99999px" == a.style.top && a.remove();
                });
        }),
        (t.FormAdvanced = new e()),
        (t.FormAdvanced.Constructor = e);
})(window.jQuery),
    (function () {
        "use strict";
        window.jQuery.FormAdvanced.init();
    })(),
    $(function () {
        "use strict";
        var o = $.map(countries, function (e, a) {
            return { value: e, data: a };
        });

            // $("#autocomplete-ajax").autocomplete({
            //     lookup: o,
            //     lookupFilter: function (e, a, i) {
            //         return new RegExp("\\b" + $.Autocomplete.utils.escapeRegExChars(i), "gi").test(e.value);
            //     },
            //     onSelect: function (e) {
            //         $("#selction-ajax").html("You selected: " + e.value + ", " + e.data);
            //     },
            //     onHint: function (e) {
            //         $("#autocomplete-ajax-x").val(e);
            //     },
            //     onInvalidateSelection: function () {
            //         $("#selction-ajax").html("You selected: none");
            //     },
            // });
        var e = $.map(
                [
                    "Anaheim Ducks",
                    "Atlanta Thrashers",
                    "Boston Bruins",
                    "Buffalo Sabres",
                    "Calgary Flames",
                    "Carolina Hurricanes",
                    "Chicago Blackhawks",
                    "Colorado Avalanche",
                    "Columbus Blue Jackets",
                    "Dallas Stars",
                    "Detroit Red Wings",
                    "Edmonton OIlers",
                    "Florida Panthers",
                    "Los Angeles Kings",
                    "Minnesota Wild",
                    "Montreal Canadiens",
                    "Nashville Predators",
                    "New Jersey Devils",
                    "New Rork Islanders",
                    "New York Rangers",
                    "Ottawa Senators",
                    "Philadelphia Flyers",
                    "Phoenix Coyotes",
                    "Pittsburgh Penguins",
                    "Saint Louis Blues",
                    "San Jose Sharks",
                    "Tampa Bay Lightning",
                    "Toronto Maple Leafs",
                    "Vancouver Canucks",
                    "Washington Capitals",
                ],
                function (e) {
                    return { value: e, data: { category: "NHL" } };
                }
            ),
            a = $.map(
                [
                    "Atlanta Hawks",
                    "Boston Celtics",
                    "Charlotte Bobcats",
                    "Chicago Bulls",
                    "Cleveland Cavaliers",
                    "Dallas Mavericks",
                    "Denver Nuggets",
                    "Detroit Pistons",
                    "Golden State Warriors",
                    "Houston Rockets",
                    "Indiana Pacers",
                    "LA Clippers",
                    "LA Lakers",
                    "Memphis Grizzlies",
                    "Miami Heat",
                    "Milwaukee Bucks",
                    "Minnesota Timberwolves",
                    "New Jersey Nets",
                    "New Orleans Hornets",
                    "New York Knicks",
                    "Oklahoma City Thunder",
                    "Orlando Magic",
                    "Philadelphia Sixers",
                    "Phoenix Suns",
                    "Portland Trail Blazers",
                    "Sacramento Kings",
                    "San Antonio Spurs",
                    "Toronto Raptors",
                    "Utah Jazz",
                    "Washington Wizards",
                ],
                function (e) {
                    return { value: e, data: { category: "NBA" } };
                }
            ),
            i = e.concat(a);
        // $("#autocomplete").devbridgeAutocomplete({
        //     lookup: i,
        //     minChars: 1,
        //     onSelect: function (e) {
        //         $("#selection").html("You selected: " + e.value + ", " + e.data.category);
        //     },
        //     showNoSuggestionNotice: !0,
        //     noSuggestionNotice: "Sorry, no matching results",
        //     groupBy: "category",
        // }),
        //     $("#autocomplete-custom-append").autocomplete({ lookup: o, appendTo: "#suggestions-container" }),
        //     $("#autocomplete-dynamic").autocomplete({ lookup: o });
    });
var countries = {
    AD: "Andorra",
    A2: "Andorra Test",
    AE: "United Arab Emirates",
    AF: "Afghanistan",
    AG: "Antigua and Barbuda",
    AI: "Anguilla",
    AL: "Albania",
    AM: "Armenia",
    AN: "Netherlands Antilles",
    AO: "Angola",
    AQ: "Antarctica",
    AR: "Argentina",
    AS: "American Samoa",
    AT: "Austria",
    AU: "Australia",
    AW: "Aruba",
    AX: "Åland Islands",
    AZ: "Azerbaijan",
    BA: "Bosnia and Herzegovina",
    BB: "Barbados",
    BD: "Bangladesh",
    BE: "Belgium",
    BF: "Burkina Faso",
    BG: "Bulgaria",
    BH: "Bahrain",
    BI: "Burundi",
    BJ: "Benin",
    BL: "Saint Barthélemy",
    BM: "Bermuda",
    BN: "Brunei",
    BO: "Bolivia",
    BQ: "British Antarctic Territory",
    BR: "Brazil",
    BS: "Bahamas",
    BT: "Bhutan",
    BV: "Bouvet Island",
    BW: "Botswana",
    BY: "Belarus",
    BZ: "Belize",
    CA: "Canada",
    CC: "Cocos [Keeling] Islands",
    CD: "Congo - Kinshasa",
    CF: "Central African Republic",
    CG: "Congo - Brazzaville",
    CH: "Switzerland",
    CI: "Côte d’Ivoire",
    CK: "Cook Islands",
    CL: "Chile",
    CM: "Cameroon",
    CN: "China",
    CO: "Colombia",
    CR: "Costa Rica",
    CS: "Serbia and Montenegro",
    CT: "Canton and Enderbury Islands",
    CU: "Cuba",
    CV: "Cape Verde",
    CX: "Christmas Island",
    CY: "Cyprus",
    CZ: "Czech Republic",
    DD: "East Germany",
    DE: "Germany",
    DJ: "Djibouti",
    DK: "Denmark",
    DM: "Dominica",
    DO: "Dominican Republic",
    DZ: "Algeria",
    EC: "Ecuador",
    EE: "Estonia",
    EG: "Egypt",
    EH: "Western Sahara",
    ER: "Eritrea",
    ES: "Spain",
    ET: "Ethiopia",
    FI: "Finland",
    FJ: "Fiji",
    FK: "Falkland Islands",
    FM: "Micronesia",
    FO: "Faroe Islands",
    FQ: "French Southern and Antarctic Territories",
    FR: "France",
    FX: "Metropolitan France",
    GA: "Gabon",
    GB: "United Kingdom",
    GD: "Grenada",
    GE: "Georgia",
    GF: "French Guiana",
    GG: "Guernsey",
    GH: "Ghana",
    GI: "Gibraltar",
    GL: "Greenland",
    GM: "Gambia",
    GN: "Guinea",
    GP: "Guadeloupe",
    GQ: "Equatorial Guinea",
    GR: "Greece",
    GS: "South Georgia and the South Sandwich Islands",
    GT: "Guatemala",
    GU: "Guam",
    GW: "Guinea-Bissau",
    GY: "Guyana",
    HK: "Hong Kong SAR China",
    HM: "Heard Island and McDonald Islands",
    HN: "Honduras",
    HR: "Croatia",
    HT: "Haiti",
    HU: "Hungary",
    ID: "Indonesia",
    IE: "Ireland",
    IL: "Israel",
    IM: "Isle of Man",
    IN: "India",
    IO: "British Indian Ocean Territory",
    IQ: "Iraq",
    IR: "Iran",
    IS: "Iceland",
    IT: "Italy",
    JE: "Jersey",
    JM: "Jamaica",
    JO: "Jordan",
    JP: "Japan",
    JT: "Johnston Island",
    KE: "Kenya",
    KG: "Kyrgyzstan",
    KH: "Cambodia",
    KI: "Kiribati",
    KM: "Comoros",
    KN: "Saint Kitts and Nevis",
    KP: "North Korea",
    KR: "South Korea",
    KW: "Kuwait",
    KY: "Cayman Islands",
    KZ: "Kazakhstan",
    LA: "Laos",
    LB: "Lebanon",
    LC: "Saint Lucia",
    LI: "Liechtenstein",
    LK: "Sri Lanka",
    LR: "Liberia",
    LS: "Lesotho",
    LT: "Lithuania",
    LU: "Luxembourg",
    LV: "Latvia",
    LY: "Libya",
    MA: "Morocco",
    MC: "Monaco",
    MD: "Moldova",
    ME: "Montenegro",
    MF: "Saint Martin",
    MG: "Madagascar",
    MH: "Marshall Islands",
    MI: "Midway Islands",
    MK: "Macedonia",
    ML: "Mali",
    MM: "Myanmar [Burma]",
    MN: "Mongolia",
    MO: "Macau SAR China",
    MP: "Northern Mariana Islands",
    MQ: "Martinique",
    MR: "Mauritania",
    MS: "Montserrat",
    MT: "Malta",
    MU: "Mauritius",
    MV: "Maldives",
    MW: "Malawi",
    MX: "Mexico",
    MY: "Malaysia",
    MZ: "Mozambique",
    NA: "Namibia",
    NC: "New Caledonia",
    NE: "Niger",
    NF: "Norfolk Island",
    NG: "Nigeria",
    NI: "Nicaragua",
    NL: "Netherlands",
    NO: "Norway",
    NP: "Nepal",
    NQ: "Dronning Maud Land",
    NR: "Nauru",
    NT: "Neutral Zone",
    NU: "Niue",
    NZ: "New Zealand",
    OM: "Oman",
    PA: "Panama",
    PC: "Pacific Islands Trust Territory",
    PE: "Peru",
    PF: "French Polynesia",
    PG: "Papua New Guinea",
    PH: "Philippines",
    PK: "Pakistan",
    PL: "Poland",
    PM: "Saint Pierre and Miquelon",
    PN: "Pitcairn Islands",
    PR: "Puerto Rico",
    PS: "Palestinian Territories",
    PT: "Portugal",
    PU: "U.S. Miscellaneous Pacific Islands",
    PW: "Palau",
    PY: "Paraguay",
    PZ: "Panama Canal Zone",
    QA: "Qatar",
    RE: "Réunion",
    RO: "Romania",
    RS: "Serbia",
    RU: "Russia",
    RW: "Rwanda",
    SA: "Saudi Arabia",
    SB: "Solomon Islands",
    SC: "Seychelles",
    SD: "Sudan",
    SE: "Sweden",
    SG: "Singapore",
    SH: "Saint Helena",
    SI: "Slovenia",
    SJ: "Svalbard and Jan Mayen",
    SK: "Slovakia",
    SL: "Sierra Leone",
    SM: "San Marino",
    SN: "Senegal",
    SO: "Somalia",
    SR: "Suriname",
    ST: "São Tomé and Príncipe",
    SU: "Union of Soviet Socialist Republics",
    SV: "El Salvador",
    SY: "Syria",
    SZ: "Swaziland",
    TC: "Turks and Caicos Islands",
    TD: "Chad",
    TF: "French Southern Territories",
    TG: "Togo",
    TH: "Thailand",
    TJ: "Tajikistan",
    TK: "Tokelau",
    TL: "Timor-Leste",
    TM: "Turkmenistan",
    TN: "Tunisia",
    TO: "Tonga",
    TR: "Turkey",
    TT: "Trinidad and Tobago",
    TV: "Tuvalu",
    TW: "Taiwan",
    TZ: "Tanzania",
    UA: "Ukraine",
    UG: "Uganda",
    UM: "U.S. Minor Outlying Islands",
    US: "United States",
    UY: "Uruguay",
    UZ: "Uzbekistan",
    VA: "Vatican City",
    VC: "Saint Vincent and the Grenadines",
    VD: "North Vietnam",
    VE: "Venezuela",
    VG: "British Virgin Islands",
    VI: "U.S. Virgin Islands",
    VN: "Vietnam",
    VU: "Vanuatu",
    WF: "Wallis and Futuna",
    WK: "Wake Island",
    WS: "Samoa",
    YD: "People's Democratic Republic of Yemen",
    YE: "Yemen",
    YT: "Mayotte",
    ZA: "South Africa",
    ZM: "Zambia",
    ZW: "Zimbabwe",
    ZZ: "Unknown or Invalid Region",
};
