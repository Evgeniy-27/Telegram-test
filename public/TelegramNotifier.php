<?php


use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class TelegramNotifier

{

    public static function notify($text, $chat_id)

    {

        $client = new Client();

        try {

            $client->post('https://api.telegram.org/bot5142971524:AAECrokQ12_xVT59fwlJRShOMaLyk0nLM4A/sendMessage', [

                RequestOptions::JSON => [

                    'chat_id' => $chat_id,

                    'text' => $text,

                ]

            ]);

        } catch (\Exception $e) {

            var_dump($e->getMessage());

        }

    }

}
