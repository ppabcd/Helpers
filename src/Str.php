<?php
namespace Helpers;
/**
 * String Class
 */
class Str
{
    /**
     * Alternator
     */
    public static function alternator()
    {
        static $i;
        if (func_num_args() === 0) {
            $i = 0;
            return '';
        }
        $args = func_get_args();
        return $args[($i++ % count($args))];
    }

    /**
     * Strip Slashes
     * @param array|string $str
     * @return mixed
     */
    public static function strip_slashes($str)
    {
        if (!is_array($str)) {
            return stripslashes($str);
        }
        foreach ($str as $key => $values) {
            $str[$key] = stripslashes($values);
        }
        return $str;
    }

    /**
     * Strip Quotes
     * @param  array|string  $str
     * @return mixed
     */
    public static function strip_quotes($str)
    {
        if (!is_array($str)) {
            return str_replace(['"',"'"], '', $str);
        }
        foreach ($str as $key => $value) {
            $str[$key] = str_replace(['"',"'"], '', $value);
        }
        return $str;
    }

    /**
     * Type Of Random
     * - alnum = Alphanumeric
     * - alpha = Alphabet
     * - numeric
     * - md5 ($length always 32 character)
     * - hex ($length must be even)
     *
     * @param int    $length
     * @param string $type
     * @return string
     */
    public static function random($length = 16, $type = 'alnum')
    {
        $string = '';
        switch ($type) {
            case 'alnum':
                while (($len = strlen($string)) < $length) {
                    $size = $length - $len;
                    $bytes = random_bytes($size);
                    $string .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
                }
                break;
            case 'alpha':
                $data = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                while (($len = strlen($string))< $length) {
                    $string .= $data[rand(0, strlen($data)-1)];
                }
                break;
            case 'numeric':
                $data = "01234567890";
                while (($len = strlen($string))< $length) {
                    $string .= $data[rand(0, 9)];
                }
                break;
            case 'md5':
                return md5(uniqid(mt_rand()));
            break;
            case 'hex':
                if (($length%2) != 0) {
                    $string = "Length must be even";
                } else {
                    $bytes = random_bytes($length/2);
                    $string = bin2hex($bytes);
                }
                break;
            case 'binary':
                $string = random_bytes($length);
                break;
            default:
                $string = 'Your random type not found';
                break;
        }
        return $string;
    }

    /**
     * @param string $needle
     * @param string $haystack
     * @return bool
     */
    public static function startWith($needle, $haystack)
    {
        return substr((string)$haystack, 0, strlen($needle)) === (string) $needle;
    }

    /**
     * Reverse case
     * @param $str
     * @return array|string
     */
    public static function reverse_case($str)
    {
        if (!is_array($str)) {
            return mb_strtolower($str) ^ mb_strtoupper($str) ^ $str;;
        }
        foreach ($str as $key => $value) {
            $str[$key] = mb_strtolower($value) ^ mb_strtoupper($value) ^ $value;
        }
        return $str;
    }
     /**
     * @param $str
     * @return array|string
     */
    public static function title_case($str)
    {
        if (!is_array($str)) {
            return ucwords(strtolower($str));
        }
        foreach ($str as $key => $value) {
            $str[$key] = ucwords(strtolower($value));
        }
        return $str;
    }
    /**
     * @param $str
     * @param $limit
     * @return array|bool|string
     */
    public static function limit($str, $limit)
    {
        if (!is_array($str)) {
            return substr($str, 0, $limit);
        }
        foreach ($str as $key => $value) {
            $str[$key] = substr($value, 0, $limit);
        }
        return $str;
    }

    /**
     * @param $str
     * @param $key
     * @return bool
     */
    public static function contains($str, $key)
    {
        if (!is_string($str)) {
            return false;
        }
        return strpos($str, $key) !== false;
    }
}
