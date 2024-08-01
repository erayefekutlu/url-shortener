<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'urls');
define('BASE_URL', 'http://localhost/r10/url/');
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

/* Create Table:

CREATE TABLE `urls` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `code` VARCHAR(255) NOT NULL,
    `long_url` TEXT NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `code` (`code`)
);

*/
