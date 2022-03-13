<?php

require_once __DIR__ . '/vendor/autoload.php';

use Telegram\Bot\Api;

$telegram = new Api('5136673433:AAHwU9f45DYrmPGey_ILujW_JIz6WbFeUtU');
$update = $telegram->getWebhookUpdates();

$users_id = $update['message']['chat']['id'];
$users_text = $update['message']['text'];
$users_sticker = $update['message']['sticker']['file_id'];

if (isset($users_sticker)) {
    $telegram->sendMessage([
        'chat_id' => $users_id,
        'text' => "Your ID🔽",
    ]);
    sleep(1);
    $telegram->sendMessage([
        'chat_id' => $users_id,
        'text' => $users_sticker,
    ]);

} elseif ($users_text == '/info') {
    $telegram->sendMessage([
        'chat_id' => $users_id,
        'text' => "Just sent me any sticker, no more😉" . PHP_EOL . PHP_EOL . 
    "This bot made with love by @ilysharusherrr" . PHP_EOL . 
    "I hope this one will be useful for you❤️"
    ]);
} else {
    $telegram->sendMessage([
        'chat_id' => $users_id,
        'text' => "Send please only sticker😑",
    ]);
}
