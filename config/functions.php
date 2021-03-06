<?php

// Connect to the database
function my_connect()
{
    global $link;

    $link = mysqli_connect('localhost', 'root', 'root', 'my_blog_project');
    if (!$link) {
        die('Erreur de connexion ('.mysqli_connect_errno().') '.mysqli_connect_error());
    }
}

// General query
function my_query($query)
{
    global $link;

    $result = mysqli_query($link, $query);

    if (!$result) {
        die('Erreur lors de l\'éxecution de la requête ('.mysqli_errno($link).') '.mysqli_error($link));
    }

    return $result;
}

// Fetch one element from database
function my_fetch_one($query)
{
    $result = my_query($query);
    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);

    return $data;
}

// Fetch many elements from database
function my_fetch_all($query)
{
    $result = my_query($query);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $data;
}

// Escape string for queries
function my_escape($data)
{
    global $link;

    return mysqli_escape_string($link, $data);
}

// Slugify a text
function my_slug($text)
{
    $table = array(
        'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
        'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
        'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
        'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
        'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
        'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y',  'þ'=>'b',
        'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r', '&'=>'-and-', '('=>'', ')'=>'', '!'=>'', '?'=>'', '-'=>'',
        ','=>'',  ';'=>'',  ':'=>'',  '='=>''
    );
    $text = strtr($text, $table);
    $text = preg_replace('~[^\\pL\d]+~u', '_', $text);
    $text = trim($text, '_');
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = strtolower($text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    return $text;
}

/**
 * Get either a Gravatar URL or complete image tag for a specified email address.
 *
 * @param string $email The email address
 * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
 * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
 * @param bool $img True to return a complete IMG tag False for just the URL
 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
 * @return String containing either just a URL or a complete image tag
 * @source https://gravatar.com/site/implement/images/php/
 */
function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
    $url = 'https://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}