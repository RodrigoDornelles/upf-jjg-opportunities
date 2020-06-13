<?php
namespace common\models;

use powerkernel\flagiconcss\Flag;

use Yii;
/**
 * Local form
 */
class Local extends \yii\base\Model
{
    const LIST_COUNTRYS = ['ad', 'cw', 'ht', 'mr', 'sl', 'ae', 'cx', 'hu', 'ms', 'sm', 'af', 'cy', 'id', 'mt', 'sn', 'ag', 'cz', 'ie', 'mu', 'so', 'ai', 'de', 'il', 'mv', 'sr', 'al', 'dj', 'im', 'mw', 'ss', 'am', 'dk', 'in', 'mx', 'st', 'ao', 'dm', 'io', 'my', 'sv', 'aq', 'do', 'iq', 'mz', 'sx', 'ar', 'dz', 'ir', 'na', 'sy', 'as', 'ec', 'is', 'nc', 'sz', 'at', 'ee', 'it', 'ne', 'tc', 'au', 'eg', 'je', 'nf', 'td', 'aw', 'eh', 'jm', 'ng', 'tf', 'ax', 'er', 'jo', 'ni', 'tg', 'az', 'es-ca', '	jp', 'nl', 'th', 'ba', 'es', 'ke', 'no', 'tj', 'bb', 'et', 'kg', 'np', 'tk', 'bd', 'eu', 'kh', 'nr', 'tl', 'be', 'fi', 'ki', 'nu', 'tm', 'bf', 'fj', 'km', 'nz', 'tn', 'bg', 'fk', 'kn', 'om', 'to', 'bh', 'fm', 'kp', 'pa', 'tr', 'bi', 'fo', 'kr', 'pe', 'tt', 'bj', 'fr', 'kw', 'pf', 'tv', 'bl', 'ga', 'ky', 'pg', 'tw', 'bm', 'gb-eng', '	kz', 'ph', 'tz', 'bn', 'gb-nir', '	la', 'pk', 'ua', 'bo', 'gb-sct', '	lb', 'pl', 'ug', 'bq', 'gb-wls', '	lc', 'pm', 'um', 'br', 'gb', 'li', 'pn', 'un', 'bs', 'gd', 'lk', 'pr', 'us', 'bt', 'ge', 'lr', 'ps', 'uy', 'bv', 'gf', 'ls', 'pt', 'uz', 'bw', 'gg', 'lt', 'pw', 'va', 'by', 'gh', 'lu', 'py', 'vc', 'bz', 'gi', 'lv', 'qa', 've', 'ca', 'gl', 'ly', 're', 'vg', 'cc', 'gm', 'ma', 'ro', 'vi', 'cd', 'gn', 'mc', 'rs', 'vn', 'cf', 'gp', 'md', 'ru', 'vu', 'cg', 'gq', 'me', 'rw', 'wf', 'ch', 'gr', 'mf', 'sa', 'ws', 'ci', 'gs', 'mg', 'sb', 'xk', 'ck', 'gt', 'mh', 'sc', 'ye', 'cl', 'gu', 'mk', 'sd', 'yt', 'cm', 'gw', 'ml', 'se', 'za', 'cn', 'gy', 'mm', 'sg', 'zm', 'co', 'hk', 'mn', 'sh', 'zw', 'cr', 'hm', 'mo', 'si', 'cu', 'hn', 'mp', 'sj', 'cv', 'hr', 'mq', 'sk'];

    /**
     * List All Contrys with Flags
     *
     * @return array
     */
    public static function getDropdownListCountrys()
    {
        $list = array();

        foreach(self::LIST_COUNTRYS as $country){
            $list[$country] = strtr("{flag} {country}",[
                '{flag}' => Flag::widget(['country' => $country]),
                '{country}' => $country
            ]);
        }

        return $list;
    }
}