<?php
// Redis-backed rate limiter. Requires phpredis extension and a REDIS_URL env var like redis://localhost:6379
function rate_limiter_redis_allow($key, $limit = 10, $window = 60) {
    $url = getenv('REDIS_URL') ?: 'tcp://127.0.0.1:6379';
    try {
        $redis = new Redis();
        $parts = parse_url($url);
        $host = $parts['host'] ?? '127.0.0.1';
        $port = $parts['port'] ?? 6379;
        $redis->connect($host, $port);
        if (!empty($parts['pass'])) $redis->auth($parts['pass']);
        $rkey = 'rl:' . $key;
        $now = time();
        $redis->zAdd($rkey, $now, $now . '_' . bin2hex(random_bytes(4)));
        $redis->zRemRangeByScore($rkey, 0, $now - $window);
        $count = $redis->zCard($rkey);
        $redis->expire($rkey, $window + 5);
        return ($count <= $limit);
    } catch (Throwable $e) {
        error_log('Redis rate limiter error: ' . $e->getMessage());
        return true; // fall back to allow
    }
}
