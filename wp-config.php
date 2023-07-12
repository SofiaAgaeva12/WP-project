<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wordpress' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'u(vyNB9%>Zi6D4Sqz -0heD-y5kPAiQyiq+:)ZA]fxP|m>P!/EKXa#EHnh89|(LG' );
define( 'SECURE_AUTH_KEY',  '%C{ ,_&*>7 C-xQB0WNU#bk2UB5D~8RDlLZM`QgB~FPi#w3,0,pPHkN}v3m!`Tw;' );
define( 'LOGGED_IN_KEY',    '7;ab_nBd^_?,P5mBcy9btxb{Vb5![I9)73lePoin(*{MH>i0}f0T}7yNFK}S*bl_' );
define( 'NONCE_KEY',        '5`E/.ZE3nQ[Y=V(:NY|tc/1Gq]d]c-36NploCY1t!`]@R6x>y?D_ds;94B<dz+YJ' );
define( 'AUTH_SALT',        'y1JNj[Q~U6:L81JWd;!Wbs!<&q[(|`x u?Gx>!Zt(QR4$d,Hwy>{LktH2DqH_flQ' );
define( 'SECURE_AUTH_SALT', '6`jMJgL%EZcNZOKP(<a&gQK3?@^ye+Q{f7WqKXc+MD]adnQ]W#^6donN{LY|(K1f' );
define( 'LOGGED_IN_SALT',   '5Vp{.@-KyBS3_r?W[(}$PD/pl,,~aB)~RfVL@{Eg#`Iy]4Jv9?J^VRne`9.k/H]b' );
define( 'NONCE_SALT',       'm>cXYHl.B WpA{1S0IOAoYGLzXX/H7W-, f|:e-J,B_Z!~.^,rRVWihCt)wv]%%7' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

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

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
