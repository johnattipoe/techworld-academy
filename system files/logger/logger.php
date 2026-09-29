<?php
// Logger wrapper - use Monolog if available, otherwise simple file logger
use Psr\Log\LoggerInterface;

if (file_exists(__DIR__ . '/../../vendor/autoload.php')) {
    require_once(__DIR__ . '/../../vendor/autoload.php');
}

if (class_exists('Monolog\Logger')) {
    class ProjectLogger implements LoggerInterface {
        private $logger;
        public function __construct($projectRoot = __DIR__ . '/..') {
            $logDir = rtrim($projectRoot, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'logs';
            if (!is_dir($logDir)) @mkdir($logDir, 0755, true);
            $this->logger = new Monolog\Logger('project');
            $this->logger->pushHandler(new Monolog\Handler\StreamHandler($logDir . DIRECTORY_SEPARATOR . date('Y-m-d') . '.log', Monolog\Logger::DEBUG));
        }
        public function emergency($message, array $context = array()) { $this->logger->emergency($message, $context); }
        public function alert($message, array $context = array()) { $this->logger->alert($message, $context); }
        public function critical($message, array $context = array()) { $this->logger->critical($message, $context); }
        public function error($message, array $context = array()) { $this->logger->error($message, $context); }
        public function warning($message, array $context = array()) { $this->logger->warning($message, $context); }
        public function notice($message, array $context = array()) { $this->logger->notice($message, $context); }
        public function info($message, array $context = array()) { $this->logger->info($message, $context); }
        public function debug($message, array $context = array()) { $this->logger->debug($message, $context); }
        public function log($level, $message, array $context = array()) { $this->logger->log($level, $message, $context); }
    }
} else {
    class ProjectLogger {
        private $logDir;
        public function __construct($projectRoot = __DIR__ . '/..') {
            $this->logDir = rtrim($projectRoot, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'logs';
            if (!is_dir($this->logDir)) @mkdir($this->logDir, 0755, true);
        }
        public function log($level, $message, $context = []) {
            $file = $this->logDir . DIRECTORY_SEPARATOR . date('Y-m-d') . '.log';
            $entry = sprintf("%s [%s] %s %s\n", date('c'), strtoupper($level), $message, json_encode($context));
            file_put_contents($file, $entry, FILE_APPEND | LOCK_EX);
        }
        // Convenience methods
        public function info($m,$c=[]) { $this->log('info',$m,$c); }
        public function error($m,$c=[]) { $this->log('error',$m,$c); }
    }
}
