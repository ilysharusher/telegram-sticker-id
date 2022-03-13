<?php

require_once __DIR__ . '/vendor/autoload.php';

use Telegram\Bot\Api;

$telegram = new Api('5136673433:AAHwU9f45DYrmPGey_ILujW_JIz6WbFeUtU');
$update = $telegram->getWebhookUpdates();

$users_id = $update['message']['chat']['id'];
$users_sticker = $update['message']['sticker']['thumb']['file_id'];

if (!empty($users_id)) {
    $telegram->sendMessage([
        'chat_id' => $users_id,
        'text' => "Yours ID🔽",
    ]); sleep(1);
    $telegram->sendMessage([
        'chat_id' => $users_id,
        'text' => $users_sticker,
    ]);

} else {
    $telegram->sendMessage([
        'chat_id' => $users_id,
        'text' => "Send please only sticker😑",
    ]);
}