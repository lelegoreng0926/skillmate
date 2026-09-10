<?php

try {
    require __DIR__ . '/../vendor/autoload.php';

    $app = require_once __DIR__ . '/../bootstrap/app.php';

    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

    $request = Illuminate\Http\Request::create('/health', 'GET');

    $response = $kernel->handle($request);

    echo "Laravel HTTP kernel works!<br><br>";
    echo "Status: " . $response->getStatusCode() . "<br>";
    echo "Response: " . htmlspecialchars($response->getContent());

    $kernel->terminate($request, $response);

} catch (Throwable $e) {
    http_response_code(500);

    echo "Laravel HTTP error<br><br>";
    echo "<strong>Message:</strong> " . htmlspecialchars($e->getMessage()) . "<br><br>";
    echo "<strong>File:</strong> " . htmlspecialchars($e->getFile()) . "<br>";
    echo "<strong>Line:</strong> " . $e->getLine();
}