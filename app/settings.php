<?php
declare(strict_types=1);

use App\Application\Settings\Settings;
use App\Application\Settings\SettingsInterface;
use DI\ContainerBuilder;
use Monolog\Logger;

return function (ContainerBuilder $containerBuilder) {

    // Global Settings Object
    $containerBuilder->addDefinitions([
        SettingsInterface::class => function () {
            return new Settings([
                'displayErrorDetails' => true, // Should be set to false in production
                'logError'            => false,
                'logErrorDetails'     => false,
                'logger' => [
                    'name' => 'slim-app',
                    'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
                    'level' => Logger::DEBUG,
                ],
                'database' => [
                    'host' => getenv('MYSQL_HOST') ?: '127.0.0.1',
                    'port' => getenv('MYSQL_PORT') ?: '3306',
                    'database' => getenv('MYSQL_DBNAME') ?: 'cloud_dev_exam',
                    'user' => getenv('MYSQL_USER') ?: 'cloud_dev_exam',
                    'password' => getenv('MYSQL_PASSWORD') ?: 'cloud_dev_exam',
                ],
            ]);
        }
    ]);
};
