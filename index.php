<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
/*
require_once('geoip.inc');

$gi = geoip_open('GeoIPv6.dat', GEOIP_MEMORY_CACHE);
$country = geoip_country_code_by_addr($gi, $_SERVER['REMOTE_ADDR']);
geoip_close($gi);

$my_countries = array('us', 'ca', 'gb', 'fr', 'de', 'nl');
if (in_array(strtolower($country), $my_countries))
{
header('Location: http://www.infiniaretail.com');
#exit;
}
else
{
//echo 1;exit;
header('Location: http://www.infiniaretail.com/de/');
exit;
}
*/

define('WP_USE_THEMES', true);
/*
require_once('geoip.inc');

$gi = geoip_open('GeoIPv6.dat', GEOIP_MEMORY_CACHE);
$country = geoip_country_code_by_addr($gi, $_SERVER['REMOTE_ADDR']);
geoip_close($gi);

$my_countries = array('us', 'ca', 'gb', 'fr', 'de', 'nl');
if (in_array(strtolower($country), $my_countries))
{
#header('Location: http://www.infiniaretail.com');
#exit;
}
else
{
//echo 1;exit;
#header('Location: http://www.infiniaretail.com/de/');
#exit;
}
*/

/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/wp-blog-header.php' );
