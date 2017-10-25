<?php
/**
 * Development Class
 */
class Development
{
    static $start;
    public static function timer()
    {
        if (is_null(self::$start))
        {
            self::$start = microtime(true);
        }
        else
        {
            $diff = round((microtime(true) - self::$start), 4);
            self::$start = null;
            return $diff;
        }
    }
}
 
