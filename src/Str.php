<?php
/**
 * Random Class
 */
class Str
{
  /*
  * Strip Slashes
  * @param array or string
  */
  public static function strip_slashes($str){
    if(!is_array($str)){
      return stripslashes($str);
    }
    foreach($str as $key => $values){
      $str[$key] = stripslashes($values);
    }
    return $str;
  }
  /*
  * Strip Quotes
  * @param array or string
  */
  public static function strip_quotes($str){
    if(!is_array($str)){
      return str_replace(['"',"'"],'',$str);
    }
    foreach ($str as $key => $value) {
      $str[$key] = str_replace(['"',"'"],'',$value);
    }
    return $str;
  }
  /*
  * Type Of Random
  * - alnum = Alphanumeric
  * - alpha = Alphabet
  * - numeric
  * - md5 ($length always 32 character)
  * - hex ($length must be even)
  */
  public static function random($length = 16,$type='alnum')
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
            while(($len = strlen($string))< $length){
              $string .= $data[rand(0,strlen($data)-1)];
            }
          break;
        case 'numeric':
            $data = "01234567890";
            while (($len = strlen($string))< $length) {
              $string .= $data[rand(0,9)];
            }
          break;
        case 'md5':
          return md5(uniqid(mt_rand()));
          break;
        case 'hex':
          if(($length%2) != 0 ){
            $string = "Length must be even";
          }
          else {
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
}
