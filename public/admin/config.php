<?php
// HTTP
define('HTTP_SERVER', 'https://case3d.com.br/admin/');
define('HTTP_CATALOG', 'https://case3d.com.br/');

// HTTPS
define('HTTPS_SERVER', 'https://case3d.com.br/admin/');
define('HTTPS_CATALOG', 'https://case3d.com.br/');

// DIR
define('DIR_APPLICATION', '/srv/httpd/case3d.com.br/public/admin/');
define('DIR_SYSTEM', '/srv/httpd/case3d.com.br/public/system/');
define('DIR_DATABASE', '/srv/httpd/case3d.com.br/public/system/database/');
define('DIR_LANGUAGE', '/srv/httpd/case3d.com.br/public/admin/language/');
define('DIR_TEMPLATE', '/srv/httpd/case3d.com.br/public/admin/view/template/');
define('DIR_CONFIG', '/srv/httpd/case3d.com.br/public/system/config/');
define('DIR_IMAGE', '/srv/httpd/case3d.com.br/public/image/');
define('DIR_CACHE', '/srv/httpd/case3d.com.br/public/system/cache/');
define('DIR_DOWNLOAD', '/srv/httpd/case3d.com.br/public/download/');
define('DIR_LOGS', '/srv/httpd/case3d.com.br/public/system/logs/');
define('DIR_CATALOG', '/srv/httpd/case3d.com.br/public/catalog/');


switch ($_SERVER['SERVER_ADDR'])
{
    //Ambiente Local
    case '127.0.0.1':
		// DB
		define('DB_DRIVER', 'mysql');
		define('DB_HOSTNAME', 'localhost');
		define('DB_USERNAME', 'root');
		define('DB_PASSWORD', 'root');
		define('DB_DATABASE', 'case3d');
		define('DB_PREFIX', 'oc_');
		break;

	default:
		// DB
		define('DB_DRIVER', 'mysql');
		define('DB_HOSTNAME', 'localhost');
		define('DB_USERNAME', 'case3d');
		define('DB_PASSWORD', 'c3d12qw12qwa');
		define('DB_DATABASE', 'case3d');
		define('DB_PREFIX', 'oc_');
		break;
}
?>
