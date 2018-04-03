<?php
/**
 * Created by IntelliJ IDEA.
 * User: Andrey
 * Date: 23.05.2015
 * Time: 22:27
 */
include_once('LevelUpImageFont54Generator.php');
include_once('LevelUpImageFont76Generator.php');

class ImageWithTextFactory {
    static function createLevelUpGenerator($level) {
        if($level > ApplicationConfig::FONT_76_MAX_LEVEL) return new LevelUpImageFont54Generator($level);
        else return new LevelUpImageFont76Generator($level);
    }
}