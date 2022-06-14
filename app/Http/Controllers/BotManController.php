<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function ($botman, $message) {

            if ($message == 'hi') {
                $this->askName($botman);
            }elseif($message == 'where are you from ?'){
                $botman->reply("I'm form Bangladesh");
            } elseif ($message == 'Thanks' OR $message == 'Thank you' OR $message == 'thanks a lot') {
                $botman->reply("Welcome");
            } elseif ($message == 'what is your age ?') {
                $botman->reply("I'm 33");
            }elseif($message == 'Good Night'){
                $botman->reply("Good Night :) ");
            }  elseif($message == 'Good by'){
                $botman->reply("Good by ");
            } else {
                $botman->reply("write 'hi' for testing...");
            }
        });

        $botman->listen();
    }

    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function (Answer $answer) {

            $name = $answer->getText();

            $this->say('Nice to meet you ' . $name);
        });
    }
}