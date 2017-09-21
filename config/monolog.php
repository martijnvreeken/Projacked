<?php
use \Monolog\Logger;
return [
    'active' => env('SLACK_LOG_ENABLED', false),
    'webhook' => env('SLACK_WEBHOOK_URL'),
    'channel' => env('SLACK_CHANNEL', '#general'),
    'username' => env('SLACK_BOTNAME', 'Projacked bot'),
    'useAttachment' => true,
    'iconEmoji' => env('SLACK_EMOJI', null),
    'level' => env('SLACK_MIN_LEVEL', Logger::WARNING)
];