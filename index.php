<?php
if ($_SERVER['REQUEST_URI'] !== '/index/index.php') {
    header('Location: /index/index.php', true, 302);
    exit;
}
