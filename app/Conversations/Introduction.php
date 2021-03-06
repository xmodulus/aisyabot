<?php

namespace App\Conversations;

use Mpociot\BotMan\Answer;
use Mpociot\BotMan\Conversation;
use Mpociot\BotMan\Question;

class Introduction extends Conversation
{

    protected $name;

    protected $intro;
    /**
     * First question
     */
    public function askName()
    {
        $question = Question::create('What is your name?')
            ->fallback('Unable to ask question')
            ->callbackId('ask_name');

        return $this->ask($question, function (Answer $answer) {
            $this->name = $answer->getText();
            $this->askIntro();
        });
    }
    public function askIntro(){
        $question = Question::create('Hi '.$this->name.', nice to meet you! Tell me about yourself.')
            ->fallback('Unable to ask question')
            ->callbackId('ask_intro');

        return $this->ask($question, function (Answer $answer){
            $this->say('I see, I will remember you!');
        });
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askName();
    }

}