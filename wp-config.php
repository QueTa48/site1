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
define( 'DB_NAME', 'site' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'admin' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'qwe123qwe' );

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
define( 'AUTH_KEY',         'cAJd )KBH,xZR],TRrG?^cEsPSt^p$aEt1iTG`VIUU_9T`)xW Rhyn(>0h6-yoJu' );
define( 'SECURE_AUTH_KEY',  'po}7REGkqmW3<^W;UI.iy>>T#;OHU=@s<S#^ %;U`fh73sy|kKSuQABcG/Yxagbi' );
define( 'LOGGED_IN_KEY',    '7Mnyk/S.2N{2U|MeP4^&j4niX@aD|:/$~_[IYMy72Bf_`n<R/MIqOcrwMyo`-33o' );
define( 'NONCE_KEY',        '(ilKZ#e?0e2XF06igiDG&ouPkTAiIZ$QtuZ4i[+0vtasTMwbSS3uQ@:?r}FnD_^a' );
define( 'AUTH_SALT',        'S)P[=_ 86`|W@&x~0b6nvk>X}Fw7!89h?%V+T|=J$:6Pwg_7^^[zBqrt%{c*4`tr' );
define( 'SECURE_AUTH_SALT', '.&D%i`N+%v_n28f$vg5m_#]Y6ytUc^UN!n`-fX(D{KI?Tx0a;C^+;S}<;hoHz.I(' );
define( 'LOGGED_IN_SALT',   'lN0FD=!,9?i8f@hg:X*=Dnj5FV6.1qQf}PQ9!%hujvOvCL~%-)!(xF+ 4NK.TJh_' );
define( 'NONCE_SALT',       '2Lqke]6:VsB`1UtFGiI_;-kOiZS&%bIdgJ?ApHg^CzVYx2R6ou@c+&{VlL;)[{zT' );

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
