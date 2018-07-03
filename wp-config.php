<?php
/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file viene utilizzato, durante l’installazione, dallo script
 * di creazione di wp-config.php. Non è necessario utilizzarlo solo via
 * web, è anche possibile copiare questo file in «wp-config.php» e
 * riempire i valori corretti.
 *
 * Questo file definisce le seguenti configurazioni:
 *
 * * Impostazioni MySQL
 * * Prefisso Tabella
 * * Chiavi Segrete
 * * ABSPATH
 *
 * È possibile trovare ultetriori informazioni visitando la pagina del Codex:
 *
 * @link https://codex.wordpress.org/it:Modificare_wp-config.php
 *
 * È possibile ottenere le impostazioni per MySQL dal proprio fornitore di hosting.
 *
 * @package WordPress
 */

// ** Impostazioni MySQL - È possibile ottenere queste informazioni dal proprio fornitore di hosting ** //
/** Il nome del database di WordPress */
define('DB_NAME', 'bec');

/** Nome utente del database MySQL */
define('DB_USER', 'root');

/** Password del database MySQL */
define('DB_PASSWORD', '');

/** Hostname MySQL  */
define('DB_HOST', 'localhost');

/** Charset del Database da utilizzare nella creazione delle tabelle. */
define('DB_CHARSET', 'utf8mb4');

/** Il tipo di Collazione del Database. Da non modificare se non si ha idea di cosa sia. */
define('DB_COLLATE', '');

/**#@+
 * Chiavi Univoche di Autenticazione e di Salatura.
 *
 * Modificarle con frasi univoche differenti!
 * È possibile generare tali chiavi utilizzando {@link https://api.wordpress.org/secret-key/1.1/salt/ servizio di chiavi-segrete di WordPress.org}
 * È possibile cambiare queste chiavi in qualsiasi momento, per invalidare tuttii cookie esistenti. Ciò forzerà tutti gli utenti ad effettuare nuovamente il login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '7G{Z$Pkh_GM2Fg]n8Qi-_O*Q=.g&3G(f?F:=U7AMNRY; _`]f`eBUq-Py!q}{wa`');
define('SECURE_AUTH_KEY',  '(Yy[c@=w&&TP}Y[:JB73}yi.e<+9K28b~*h?S2K}?YX zsekL+-S}ul+fa5}SK[e');
define('LOGGED_IN_KEY',    'm7p2gFbi>XThA!$pifVe6q/}SeN&WkSR<lU:HWnq@S*.>G2L^S#Yuzf.R}&Tj/QS');
define('NONCE_KEY',        '4YB.kRxKDK!{Obsiw-ACX[E*JshR|VyUSq6P0F^N|ION0m&HH)oYUsc~@;2]nN.5');
define('AUTH_SALT',        'U~^Dlm.I{XC.vMQqd=wd`7=R}%V>j8(R-N+@;G3_}PZ>W?9bv>a<I#4}>(*>EC`#');
define('SECURE_AUTH_SALT', 'xBf#:. 6,Z~AWt5=F/GwE@j2K3G+N62;1@RxEF%y>Jp.Knv,+)C4X$ugH71dY1Lt');
define('LOGGED_IN_SALT',   '@u2j@D{S+B`~uDNv~_3i0{eZa17~jH<2[8DtB1X:vQ>@`I~b1*I!/4=O!6K%}R2x');
define('NONCE_SALT',       '$P0[y(k>tVX@?_c~7aStczUuGn<#-UQtr+X>Ejt<_wVt%.ReD*%1|z 5:I;&rM?M');

/**#@-*/

/**
 * Prefisso Tabella del Database WordPress.
 *
 * È possibile avere installazioni multiple su di un unico database
 * fornendo a ciascuna installazione un prefisso univoco.
 * Solo numeri, lettere e sottolineatura!
 */
$table_prefix  = 'wp_';

/**
 * Per gli sviluppatori: modalità di debug di WordPress.
 *
 * Modificare questa voce a TRUE per abilitare la visualizzazione degli avvisi
 * durante lo sviluppo.
 * È fortemente raccomandato agli svilupaptori di temi e plugin di utilizare
 * WP_DEBUG all’interno dei loro ambienti di sviluppo.
 */
define('WP_DEBUG', false);

/* Finito, interrompere le modifiche! Buon blogging. */

/** Path assoluto alla directory di WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Imposta le variabili di WordPress ed include i file. */
require_once(ABSPATH . 'wp-settings.php');