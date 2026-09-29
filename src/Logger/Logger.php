<?php
namespace TWApp;

class Logger
{
    protected static $logger = null;

    public static function get()
    {
        if (self::$logger !== null) return self::$logger;

        if (class_exists('\Monolog\\Logger')) {
            $monolog = new \Monolog\Logger('techworld');
            $path = __DIR__ . '/../logs/app.log';
            $handler = new \Monolog\Handler\StreamHandler($path, \Monolog\Logger::DEBUG);
            $monolog->pushHandler($handler);
            self::$logger = $monolog;
            return self::$logger;
        }

        // Simple fallback logger
        self::$logger = new class {
            public function info($msg, $ctx = []) { error_log('[info] '.$msg); }
            public function error($msg, $ctx = []) { error_log('[error] '.$msg); }
            public function debug($msg, $ctx = []) { error_log('[debug] '.$msg); }
        };

        return self::$logger;
    }
}
