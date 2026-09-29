<?php
require_once(__DIR__ . '/../vendor/autoload.php');

use TWApp\Router;
use TWApp\Controller\Admin\StatsController;

$r = new Router();
$r->get('/api/admin/stats', function() { StatsController::index(); });

$r->dispatch();
