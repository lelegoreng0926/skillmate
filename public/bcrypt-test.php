<?php

header('Content-Type: text/plain');

echo "PHP: " . PHP_VERSION . PHP_EOL;
echo "CRYPT_BLOWFISH: " . (defined('CRYPT_BLOWFISH') ? CRYPT_BLOWFISH : 'NOT DEFINED') . PHP_EOL;
echo "PASSWORD_BCRYPT: " . PASSWORD_BCRYPT . PHP_EOL;
echo "CRYPT: " . (defined('CRYPT') ? CRYPT : 'NOT DEFINED') . PHP_EOL;

try {
    $hash = password_hash('test123', PASSWORD_BCRYPT);

    echo "HASH: " . ($hash !== false ? 'OK' : 'FAILED') . PHP_EOL;
    echo "VERIFY: " . (password_verify('test123', $hash) ? 'OK' : 'FAILED') . PHP_EOL;
} catch (Throwable $e) {
    echo "ERROR: " . $e->getMessage() . PHP_EOL;
}