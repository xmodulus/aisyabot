<?php
use App\Http\Controllers\BotManController;
use App\Conversations\Introduction;
use Mpociot\BotMan\BotMan;

// Don't use the Facade in here to support the RTM API too :)
$botman = resolve('botman');

$botman->hears('test', function($bot){
    $bot->reply('hello!');
});
$botman->hears('Start conversation', BotManController::class.'@startConversation');

$botman->hears('/intro', BotManController::class.'@introConversation');