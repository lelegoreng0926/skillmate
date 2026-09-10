<?php

try {
    require __DIR__ . '/../vendor/autoload.php';

    $app = require __DIR__ . '/../bootstrap/app.php';

    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

    $kernel->bootstrap();

    echo "Laravel bootstrap: OK<br><br>";

    echo "DB driver: " . htmlspecialchars((string) config('database.default')) . "<br>";
    echo "DB host: " . htmlspecialchars((string) config('database.connections.mysql.host')) . "<br>";
    echo "DB port: " . htmlspecialchars((string) config('database.connections.mysql.port')) . "<br>";
    echo "DB database: " . htmlspecialchars((string) config('database.connections.mysql.database')) . "<br><br>";

    $pdo = $app->make('db')->connection()->getPdo();

    echo "<strong>DATABASE CONNECTION: OK</strong><br>";
    echo "MySQL version: " .
        htmlspecialchars($pdo->getAttribute(PDO::ATTR_SERVER_VERSION));

} catch (Throwable $e) {

    http_response_code(500);

    echo "<h2>DATABASE ERROR</h2>";

    echo "<strong>Message:</strong><br>";
    echo htmlspecialchars($e->getMessage());

    echo "<br><br><strong>File:</strong><br>";
    echo htmlspecialchars($e->getFile());

    echo "<br><br><strong>Line:</strong><br>";
    echo $e->getLine();

    echo "<br><br><strong>Trace:</strong><br>";
    echo nl2br(htmlspecialchars($e->getTraceAsString()));
}