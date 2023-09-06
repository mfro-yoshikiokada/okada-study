<?php


// サブシステムのクラス
class Amplifier
{
    public function on()
    {
        echo "Amplifier is on." . PHP_EOL;
    }

    public function setVolume($volume)
    {
        echo "Setting volume to $volume." . PHP_EOL;
    }
}

class CDPlayer
{
    public function play()
    {
        echo "Playing CD." . PHP_EOL;
    }
}

class Speakers
{
    public function turnOn()
    {
        echo "Speakers are on." . PHP_EOL;
    }
}

// ファサードクラス
class MusicPlayerFacade
{
    private $amplifier;
    private $cdPlayer;
    private $speakers;

    public function __construct()
    {
        $this->amplifier = new Amplifier();
        $this->cdPlayer = new CDPlayer();
        $this->speakers = new Speakers();
    }

    public function playMusic()
    {
        $this->amplifier->on();
        $this->amplifier->setVolume(10);
        $this->cdPlayer->play();
        $this->speakers->turnOn();
    }
}

// クライアントコード
$musicPlayer = new MusicPlayerFacade();
$musicPlayer->playMusic();
