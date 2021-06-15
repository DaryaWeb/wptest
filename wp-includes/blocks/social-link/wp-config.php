<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', 'D:\OpenServer\domains\wordpress\wp-content\plugins\wp-super-cache/' );
define( 'DB_NAME', 'id17052410_wordpress' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'id17052410_user' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'N|\3CC%8{+_Q_Gl*' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Y}>{}|T*KMG|o$O&SdCFl.G=t&!5A4_q9P6csIZqKSuOc;T7^.:ku>dG9+wh)pT;' );
define( 'SECURE_AUTH_KEY',  '@^WWa<`{y_{hR*qC3I4w[h>vItLJX*,h_s1jL.R*^~M/z Y*:i>,-Jp9l+:urwHT' );
define( 'LOGGED_IN_KEY',    'K1hyHTvnr{+ze DJrOBE@B3Ay;F!J?}i+bGcmRvI+.vi~NN/Vbo&~1hL KHfF?J^' );
define( 'NONCE_KEY',        '(6ERjgZENE.<?iU$^xF/Z&0oPVDJC#zuN/CzW|PIXrzSHuUWR8b61Xy`%#l_9w/q' );
define( 'AUTH_SALT',        '{8{mo1+KmB3*ZFDN$:a`[3CY GaE@:H{zC#$dIsr|}zs71!)_j|9M[k2pKB2{Ss<' );
define( 'SECURE_AUTH_SALT', 'iF;ve6gW_&mYsy};M@QXU}3;-QNu/=u;vP_pX50bc[*^n)>]P1/uPEoFamsKu;:.' );
define( 'LOGGED_IN_SALT',   'N@e<oR|AF:]}l/=RY9W=+4R4R/&[f~27iKy4lp/$XZG gGMV/iB2&@nCD-R2Up_U' );
define( 'NONCE_SALT',       'rX9]_4z[0O. 2~I-t%2wVWb}t<7L+2F5$!pF0<Q<fMp!<;.<[?SV(K+nS sdr|HW' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'w18p_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
