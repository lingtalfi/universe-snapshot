<?php


namespace Http4All\Header;


class CountryHelper
{


    /**
     * An array of
     *      browser lang (supposedly iso639-1) => country ISO 3166-1 alpha2
     *
     *
     * To know where a language was spoken, I used mainly this page:
     * https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes
     *
     *
     * Note: when a language was spoken in many countries, like arabic for instance,
     * I chose arbitrary (bad).
     * For instance, for arabic I chose Algeria.
     * So, be aware that this implementation is just a fallback solution to a better algorithm.
     * However, I believe in most cases this array return relevant results, despite of
     * what I just said.
     *
     *
     */
    public static $lang2Country = [
        'aa' => 'ET',
        'ab' => 'RU',
        'ae' => 'IR',
        'af' => 'ZA',
        'ak' => 'GH',
        'am' => 'ET',
        'an' => 'ES',
        'ar' => 'DZ',
        'as' => 'IN',
        'av' => 'RU',
        'ay' => 'BO',
        'az' => 'AZ',
        'ba' => 'RU',
        'be' => 'BY',
        'bg' => 'BG',
        'bh' => 'IN',
        'bi' => 'VU',
        'bm' => 'ML',
        'bn' => 'BD',
        'bo' => 'CN',
        'br' => 'FR',
        'bs' => 'BA',
        'ca' => 'AD',
        'ce' => 'RU',
        'ch' => 'GU',
        'co' => 'FR',
        'cr' => 'CA',
        'cs' => 'CZ',
        'cu' => 'BG',
        'cv' => 'RU',
        'cy' => 'GB',
        'da' => 'DK',
        'de' => 'DE',
        'dv' => 'MV',
        'dz' => 'BT',
        'ee' => 'GH',
        'el' => 'GR',
        'en' => 'GB',
//        'eo' => 'epo', // constructed language
        'es' => 'ES',
        'et' => 'EE',
        'eu' => 'ES',
        'fa' => 'IR',
        'ff' => 'NE',
        'fi' => 'FI',
        'fj' => 'FJ',
        'fo' => 'FO',
        'fr' => 'FR',
        'fy' => 'NL',
        'ga' => 'IE',
        'gd' => 'GB',
        'gl' => 'ES',
        'gn' => 'PY',
        'gu' => 'IN',
        'gv' => 'GB',
        'ha' => 'NE',
        'he' => 'IL',
        'hi' => 'IN',
        'ho' => 'PG',
        'hr' => 'HR',
        'ht' => 'HT',
        'hu' => 'HU',
        'hy' => 'AM',
        'hz' => 'NA',
//        'ia' => 'ina', // constructed language
        'id' => 'ID',
//        'ie' => 'ile', // constructed language
        'ig' => 'NE',
        'ii' => 'CN',
        'ik' => 'CA',
//        'io' => 'ido', // constructed language
        'is' => 'IS',
        'it' => 'IT',
        'iu' => 'CA',
        'ja' => 'JP',
        'jv' => 'ID',
        'ka' => 'GE',
        'kg' => 'CG',
        'ki' => 'KE',
        'kj' => 'AO',
        'kk' => 'KZ',
        'kl' => 'GL',
        'km' => 'KH',
        'kn' => 'IN',
        'ko' => 'KP',
        'kr' => 'NG',
        'ks' => 'IN',
        'ku' => 'IQ',
        'kv' => 'RU',
        'kw' => 'GB',
        'ky' => 'KG',
        'la' => 'IT',
        'lb' => 'LU',
        'lg' => 'UG',
        'li' => 'NL',
        'ln' => 'CD',
        'lo' => 'LA',
        'lt' => 'LT',
        'lu' => 'CD',
        'lv' => 'LV',
        'mg' => 'MG',
        'mh' => 'MH',
        'mi' => 'NZ',
        'mk' => 'MK',
        'ml' => 'IN',
        'mn' => 'MN',
        'mr' => 'IN',
        'ms' => 'BN',
        'mt' => 'MT',
        'my' => 'MM',
        'na' => 'NR',
        'nb' => 'NO',
        'nd' => 'ZW',
        'ne' => 'NP',
        'ng' => 'NA',
        'nl' => 'NL',
        'nn' => 'NO',
        'no' => 'NO',
        'nr' => 'ZA',
        'nv' => 'US',
        'ny' => 'MW',
        'oc' => 'ES',
        'oj' => 'CA',
        'om' => 'ET',
        'or' => 'IN',
        'os' => 'RU',
        'pa' => 'PK',
        'pi' => 'IN',
        'pl' => 'PL',
        'ps' => 'AF',
        'pt' => 'PT',
        'qu' => 'PE',
        'rm' => 'CH',
        'rn' => 'BI',
        'ro' => 'RO',
        'ru' => 'RU',
        'rw' => 'RW',
        'sa' => 'IN',
        'sc' => 'IT',
        'sd' => 'PK',
        'se' => 'NO',
        'sg' => 'CF',
        'si' => 'LK',
        'sk' => 'SK',
        'sl' => 'SI',
        'sm' => 'WS',
        'sn' => 'ZW',
        'so' => 'SO',
        'sq' => 'AL',
        'sr' => 'CS',
        'ss' => 'SZ',
        'st' => 'ZA',
        'su' => 'ID',
        'sv' => 'SE',
        'sw' => 'TZ', // oops
        'ta' => 'IN',
        'te' => 'IN',
        'tg' => 'TJ',
        'th' => 'TH',
        'ti' => 'ER',
        'tk' => 'TM',
        'tl' => 'PH',
        'tn' => 'BW',
        'to' => 'TO',
        'tr' => 'TR',
        'ts' => 'ZA',
        'tt' => 'RU',
        'tw' => 'GH',
        'ty' => 'PF',
        'ug' => 'CN',
        'uk' => 'UA',
        'ur' => 'PK',
        'uz' => 'UZ',
        've' => 'VE',
        'vi' => 'VN',
//        'vo' => 'vol', // constructed language
        'wa' => 'BE',
        'wo' => 'SN',
        'xh' => 'ZA',
        'yi' => 'IL',
        'yo' => 'NG',
        'za' => 'CN',
        'zh' => 'CN',

        'zu' => 'ZA',
    ];

}