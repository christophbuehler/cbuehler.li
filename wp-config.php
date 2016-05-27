<?php
/**
 * Custom WordPress configurations on "wp-config.php" file.
 *
 * This file has the following configurations: MySQL settings, Table Prefix, Secret Keys, WordPress Language, ABSPATH and more.
 * For more information visit {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php} Codex page.
 * Created using {@link http://generatewp.com/wp-config/ wp-config.php File Generator} on GenerateWP.com.
 *
 * @package WordPress
 * @generator GenerateWP.com
 */


/* MySQL settings */
define( 'DB_NAME',     'norizonf_cbuehler' );
define( 'DB_USER',     'norizonf_cbuehle' );
define( 'DB_PASSWORD', 'wy?8PY+5euA%5a' );
define( 'DB_HOST',     'localhost' );
define( 'DB_CHARSET',  'utf8' );


/* MySQL database table prefix. */
$table_prefix = 'wp_';


/* Authentication Unique Keys and Salts. */
/* https://api.wordpress.org/secret-key/1.1/salt/ */
define( 'AUTH_KEY',         'taU5N3?`Fm9D;ZFuYXjXf6>LYB>KEu(H8!>H+5HExKHa/-W3T$kJ/U3jhMe??2 `' );
define( 'SECURE_AUTH_KEY',  'xnG~e5:}-0>sp& 9fGDKzS$`h;STZV5+v8Z&6W<[BDqxv-MKjVE-P@-|j`;#&]L4' );
define( 'LOGGED_IN_KEY',    'VXrKXrBB-}uP%h-u|>+IS_Ek tnenM,fv~D4+0ut$`I6*+{+@k)A^1>W{yv}jZ:8' );
define( 'NONCE_KEY',        '&4-iXHxeD,`Af2Mwyq<L+BR:-4Mz$m-/k|DI]PMS.$PM&._`T(1^fjuj6lA2M=!/' );
define( 'AUTH_SALT',        '5dB8>s5-jg-,7oOF|Oa  BnK^-pCw6dQ %}EPCgx,_[v+*j0I@c1HT1t1j;gDR,/' );
define( 'SECURE_AUTH_SALT', 'O/9T:hYde<`*|*T l5K;S^K.dT$arm+-@0z@D+c<n.+{UgTMm$rqI&6!+XT{6fTs' );
define( 'LOGGED_IN_SALT',   ')&9 D2=AYjy8d}PLrJ7>-&657{nV$: (u7.ak]lIn%Z+BQA**J7]VE2XYc?`%8q`' );
define( 'NONCE_SALT',       'U^!L!-|.gtM{cs:T&*>Acu(VeKG-$mRdil|fa|lxAU3HMrWVlGknsT*q.C34vo}1' );


/* WordPress Localized Language. */
define( 'WPLANG', '' );


/* Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/* Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');