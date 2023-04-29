<?php
interface MediaPlayer
{
    function play($type, $name);
}
interface SuperMediaPlayer
{
    function playOgg($name);
    function playMP4($name);
}

class OggPlayer implements SuperMediaPlayer
{
    function playOgg($name){
        echo "Playing OGG $name\n";
    }
    function playMP4($name){}
}
class Mp4Player implements SuperMediaPlayer
{
    function playOgg($name){}
    function playMP4($name){
        echo "Playing MP4 $name\n";
    }
}

class MediaAdapter implements MediaPlayer
{
    private $superMediaPlayer;
    function __construct($type){
        switch($type){
            case "OGG": $this->superMediaPlayer = new OggPlayer; break;
            case "MP4": $this->superMediaPlayer = new Mp4Player; break;
        }
    }
    function play($type, $name){
        switch($type){
            case "OGG": $this->superMediaPlayer->playOgg($name); break;
            case "MP4": $this->superMediaPlayer->playMP4($name); break;
        }
    }
}

class AudioPlayer implements MediaPlayer
{
    private $mediaAdapter;
    function play($type, $name){
        switch($type){
            case "WAV":
                echo "Playing WAV $name\n";
                break;
            case "MP3":
                echo "Playing MP3 $name\n";
                break;
            case "OGG":
            case "MP4":
                $this->mediaAdapter = new MediaAdapter($type);
                $this->mediaAdapter->play($type, $name);
        }
    }
}

$player = new AudioPlayer;
$player->play("WAV", "Song1");
$player->play("MP3", "Song2");
$player->play("OGG", "Song3");
$player->play("MP4", "Song4");