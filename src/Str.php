<?php

namespace Helpers;

/**
 * String Class
 */
class Str
{
    /**
     * The cache of snake-cased words.
     *
     * @var array
     */
    public static $snakeCache = [];

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
        if ( ! is_array($str)) {
            return stripslashes($str);
        }
        foreach ($str as $key => $values) {
            $str[$key] = stripslashes($values);
        }

        return $str;
    }

    /**
     * Strip Quotes
     * @param  array|string $str
     * @return mixed
     */
    public static function strip_quotes($str)
    {
        if ( ! is_array($str)) {
            return str_replace(['"', "'"], '', $str);
        }
        foreach ($str as $key => $value) {
            $str[$key] = str_replace(['"', "'"], '', $value);
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
                while (($len = strlen($string)) < $length) {
                    $string .= $data[rand(0, strlen($data) - 1)];
                }
                break;
            case 'numeric':
                $data = "01234567890";
                while (($len = strlen($string)) < $length) {
                    $string .= $data[rand(0, 9)];
                }
                break;
            case 'md5':
                return md5(uniqid(mt_rand()));
                break;
            case 'hex':
                if (($length % 2) != 0) {
                    $string = "Length must be even";
                } else {
                    $bytes = random_bytes($length / 2);
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
        return substr((string)$haystack, 0, strlen($needle)) === (string)$needle;
    }

    /**
     * Reverse case
     * @param $str
     * @return array|string
     */
    public static function reverse_case($str)
    {
        if ( ! is_array($str)) {
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
        if ( ! is_array($str)) {
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
        if ( ! is_array($str)) {
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
        if ( ! is_string($str)) {
            return false;
        }

        return strpos($str, $key) !== false;
    }

    /**
     * camelize string
     * eg. this_is_my_string => ThisIsMyString
     * @param  string $str
     * @param  string $encoding
     * @return string
     */
    public static function camelize($str, $encoding = 'UTF-8')
    {
        $str = str_replace(array ('_', '-'), ' ', trim(strtolower($str)));
        $str = mb_convert_case($str, MB_CASE_TITLE, $encoding);

        return preg_replace('!\s+!', '', $str);
    }

    /**
     * Search an array for keys that start or end with string provided
     * USAGE:
     * array_key_start_end_with(['bob' => 'bobtail cat'], 'cat', true, 'starts_with');
     * @param  array   $array
     * @param  string  $string
     * @param  boolean $returnKeys
     * @param  string  $direction (expects starts_with or ends_with)
     * @return array
     */
    public static function array_key_start_end_with(
        array $array,
        string $string,
        bool $returnKeys = true,
        string $direction
    ): array {
        $newArray = [];
        foreach ($array as $key => $value) {
            if ($direction($key, $string)) {
                if (is_string($value)) {
                    $value = trim($value);
                    $value = empty(trim($value, '"')) ? null : $value;
                }
                if ($returnKeys) {
                    array_push($newArray, $key);
                } else {
                    $newArray[$key] = $value; // Maintain the key value relationship
                }
            }
        }

        return $newArray;
    }

    /**
     * Search an array for keys that starts_with string
     * USAGE:
     * array_keys_start_with(['bob' => 'bobtail cat'], 'cat', true);
     * @param  array   $array
     * @param  string  $string
     * @param  boolean $returnKeys
     * @return array
     */
    public static function array_keys_start_with(array $array, string $string, bool $returnKeys = true): array
    {
        return array_key_start_end_with($array, $string, $returnKeys, 'starts_with');
    }

    /**
     * Search an array for keys that ends_with string
     * USAGE:
     * array_keys_end_with(['bob' => 'bobtail cat'], 'bobtail', true);
     * @param  array   $array
     * @param  string  $string
     * @param  boolean $returnKeys
     * @return array
     */
    public static function array_keys_end_with(array $array, string $string, bool $returnKeys = true): array
    {
        return array_key_start_end_with($array, $string, $returnKeys, 'ends_with');
    }

    /**
     * Determine if two arrays are identical with the same
     * index values ignoring key ordering
     * @param array $array1
     * @param array $array2
     * @return bool
     */
    public static function arrays_match($array1, $array2)
    {
        if (count(array_diff_assoc($array1, $array2))) {
            return false;
        }

        foreach ($array1 as $k => $v) {
            if ($v !== $array2[$k]) {
                return false;
            }
        }

        return true;
    }

    /**
     * Convert the given string to upper-case.
     * @param  string $value
     * @return string
     */
    public static function upper_case($value)
    {
        return mb_strtoupper($value, 'UTF-8');
    }

    /**
     * Convert the given string to lower-case.
     *
     * @param  string  $value
     * @return string
     */
    public static function lower_case($value)
    {
        return mb_strtolower($value, 'UTF-8');
    }

    /**
     * Convert a string to snake case.
     *
     * @param  string  $value
     * @param  string  $delimiter
     * @return string
     */
    public static function snake_case($value, $delimiter = '_')
    {
        $key = $value;

        if (isset(static::$snakeCache[$key][$delimiter])) {
            return static::$snakeCache[$key][$delimiter];
        }

        if (! ctype_lower($value)) {
            $value = preg_replace('/\s+/u', '', ucwords($value));

            $value = static::lower_case(preg_replace('/(.)(?=[A-Z])/u', '$1'.$delimiter, $value));
        }

        return static::$snakeCache[$key][$delimiter] = $value;
    }
}
