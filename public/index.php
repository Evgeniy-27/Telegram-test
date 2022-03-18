<?php
require 'vendor/autoload.php';
require 'TelegramNotifier.php';

//use GuzzleHttp\Client;

$data = file_get_contents('php://input');
$data = json_decode($data, true);

file_put_contents(__DIR__ . '/message.txt', print_r($data, true));
//$client1 = new Client([
//
//    'base_uri' => 'https://api.telegram.org/bot5142971524:AAECrokQ12_xVT59fwlJRShOMaLyk0nLM4A/',
//    'timeout' => 2.0,
//]);
//$response = $client1->request('POST', "getUpdates?offset=-1");
//
//
//$body = $response->getBody();
//$json = json_decode($body, true);
//$result = $json['result']['0'];

$result = $data['result'];
$text = $result["message"]["text"]; //Текст сообщения
$chat_id = $result["message"]["chat"]["id"]; //Уникальный идентификатор пользователя
$name = $result["message"]["from"]["first_name"]; //Юзернейм пользователя
$keyboard = [["Последние статьи"], ["Картинка"], ["Гифка"]]; //Клавиатура
$first_name = $result['message']['from']['first_name'];
$last_name = $result['message']['from']['last_name'];

if ($text) {
    if ($text == "/start") {
        $reply = "Добро пожаловать в бота.
 Информация с помощью:
 /help";
        TelegramNotifier::notify($reply, $chat_id);
    } elseif ($text == "/help") {
        $reply = "Привет, $first_name $last_name, вот команды, что я понимаю:
 /help - список команд
 /about - о нас";
        TelegramNotifier::notify($reply, $chat_id);
    } elseif ($text == '/about') {
        $reply = "Я пример самого простого бота для телеграм, написанного на простом PHP.";
        TelegramNotifier::notify($reply, $chat_id);
    } else {
        $reply = 'Я не распознаю текстовые сообщения, вот команды, что я понимаю:
 /help - список команд
 /about - о нас';
        TelegramNotifier::notify($reply, $chat_id);
    }
}


var_dump($text) . PHP_EOL;
var_dump($chat_id) . PHP_EOL;
var_dump($name) . PHP_EOL;

