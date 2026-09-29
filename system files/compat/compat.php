<?php
// Backwards compatible procedural wrappers to new TWApp services
require_once(__DIR__ . '/../vendor/autoload.php');

use TWApp\Auth;
use TWApp\Config;
use TWApp\Database;
use TWApp\Logger;
use TWApp\Mailer;

function tw_config($key, $default = null) { return Config::get($key, $default); }
function tw_db() { return Database::getConnection(); }
function tw_logger() { return Logger::get(); }
function tw_require_login() { return Auth::requireLogin(); }
function tw_is_logged_in() { return Auth::isLoggedIn(); }
function tw_send_mail($opts) { return Mailer::send($opts); }
