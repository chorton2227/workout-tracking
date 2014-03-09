<?php namespace Chorton2227\Gravatar;

use Config;

class Gravatar {

    /**
     * Get a Gravatar URL for a specified email address.
     *
     * @param string $email The email address
     * @param string $size Size in pixels, defaults to 80px [ 1 - 2048 ]
     * @return String containing a URL
     * @source http://gravatar.com/site/implement/images/php/
     */
    public static function src($email, $size = null)
    {
        // Size not provided, use default size in config
        if ($size == null)
        {
            $size = Config::get('gravatar.size');
        }

        // Config settings
        $default = Config::get('gravatar.default');
        $rating = Config::get('gravatar.rating');
        
        $url = 'http://www.gravatar.com/avatar/';
        $url .= md5(strtolower(trim($email)));
        $url .= "?s=$size&d=$default&r=$rating";
        return $url;
    }

    /**
     * Get a complete image tag for a specified email address.
     *
     * @param string $email The email address
     * @param string $size Size in pixels, defaults to 80px [ 1 - 2048 ]
     * @param array $atts Optional, additional key/value attributes to include in the IMG tag
     * @return String containing a complete image tag
     * @source http://gravatar.com/site/implement/images/php/
     */
    public static function image($email, $size = null, $atts = array())
    {
        $url = self::src($email, $size);
        $url = '<img src="' . $url . '"';
        foreach ($atts as $key => $val)
        {
            $url .= ' ' . $key . '="' . $val . '"';
        }
        $url .= ' />';

        return $url;
    }

}