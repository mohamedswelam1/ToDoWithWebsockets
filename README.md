
# ToDo List with Websockets

CRUD Todo list with user tasks and status of every task We need to preview the todo list with WEBSOCKET

# Prerequisites
Laravel 9 mySQL 8.0.27 PHP 8.1.

## Installation
composer require beyondcode/laravel-websockets
php artisan vendor:publish --provider="BeyondCode\LaravelWebSockets\WebSocketsServiceProvider" --tag="migrations"
php artisan migrate
php artisan vendor:publish --provider="BeyondCode\LaravelWebSockets\WebSocketsServiceProvider" --tag="config"
composer require pusher/pusher-php-server   
php artisan serve
php artisan websockets:serve
## Environment Variables

To run this project, you will need to add the following environment variables to your .env file

BROADCAST_DRIVER=pusher
PUSHER_APP_ID=livepost
PUSHER_APP_KEY=livepost_key
PUSHER_APP_SECRET=livepost_secret
QUEUE_CONNECTION=sync

in broadcasting.php connection=> pusher =>options
'options' => [
                'cluster'=>env('PUSHER_APP_CLUSTER'),
                'useTLS' => false,
                'encrypted' => false,
                'host' => '127.0.0.1',
                'port'=>6001,
                'scheme' => 'http',
            ],
