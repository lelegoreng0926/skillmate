<?php

try {
    require __DIR__ . '/../vendor/autoload.php';

    $app = require_once __DIR__ . '/../bootstrap/app.php';

    echo "Laravel bootstrap works!";
} catch (Throwable $e) {
    http_response_code(500);

    echo "Laravel bootstrap error<br><br>";
    echo htmlspecialchars($e->getMessage());
}