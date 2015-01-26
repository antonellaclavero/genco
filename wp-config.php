<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'genco_nueva');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'A0I3EKD2Psq3D2)|9kaz2v04-TK:f$Sb2Y:/pfqUe>/_oI4EUf-^B2vhI|R3|/FJ');
define('SECURE_AUTH_KEY', '.=Wj(aq|A?-gg.ad{:NYtdl4h(mrBjJ|/2,cr0QL]J<*;:B%#b<q7f`p#93b;j. ');
define('LOGGED_IN_KEY', 'FGJx}tWV]e1%-}0&.1^:XGbxEOZ)fB3yZCJfIH7R2<i.huPcLm-h7*:YmRk6$/mQ');
define('NONCE_KEY', 'wS0j#ieWAG)dkBWC>Jt!JE|tdhyW,jRB(uW.fE#*hi(n~,2E=.#rwQI-d[pMMx^Y');
define('AUTH_SALT', 'O5ixY0*U??kUOMA.+E3@SEWDujxr7Xh~{VNxWE9Yl+c]V+dXbVHlNz$TwgtaD`-?');
define('SECURE_AUTH_SALT', '-~9Vu{xZl/q.gqp!Pvx%G_zG5@_[i*]_1d}~|sP97!xHGA|NcTb}XST?OJlK#@%!');
define('LOGGED_IN_SALT', 'U8)#<fa6!NSudz%ltX_}mY>3$F]p/AtRdoqf!FxWa=G.-RbGNRBp.A@doyGALr1s');
define('NONCE_SALT', 'KFRBbm[]fG{Ch v+pM!pWuRC!G`YrZ$_O+9u0]T5[.l!.7!nTO+@ <>HqFc(qjGP');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

