<?php

try {
    require __DIR__ . '/../vendor/autoload.php';

    $app = require_once __DIR__ . '/../bootstrap/app.php';

    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

    $request = Illuminate\Http\Request::create('/health', 'GET');

    $response = $kernel->handle($request);

    echo "STATUS: " . $response->getStatusCode() . "<br><br>";

    if ($response->getStatusCode() >= 500) {
        echo "Laravel returned an error.<br><br>";

        echo "APP_ENV: " . htmlspecialchars((string) env('APP_ENV')) . "<br>";
        echo "APP_DEBUG: " . (env('APP_DEBUG') ? 'true' : 'false') . "<br>";
        echo "DB_CONNECTION: " . htmlspecialchars((string) env('DB_CONNECTION')) . "<br>";
        echo "SESSION_DRIVER: " . htmlspecialchars((string) env('SESSION_DRIVER')) . "<br>";
        echo "SESSION_CONNECTION: " . htmlspecialchars((string) env('SESSION_CONNECTION')) . "<br><br>";

        echo "Response:<br>";
        echo htmlspecialchars($response->getContent());
    } else {
        echo htmlspecialchars($response->getContent());
    }

    $kernel->terminate($request, $response);

} catch (Throwable $e) {

    http_response_code(500);

    echo "<h2>EXCEPTION</h2>";

    echo "<strong>Message:</strong><br>";
    echo htmlspecialchars($e->getMessage());

    echo "<br><br><strong>File:</strong><br>";
    echo htmlspecialchars($e->getFile());

    echo "<br><br><strong>Line:</strong><br>";
    echo $e->getLine();

    echo "<br><br><strong>Trace:</strong><br>";
    echo nl2br(htmlspecialchars($e->getTraceAsString()));
}