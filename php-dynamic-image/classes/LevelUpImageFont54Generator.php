<?php
/**
 * Created by IntelliJ IDEA.
 * User: Andrey
 * Date: 23.05.2015
 * Time: 22:23
 */
include_once('ImageWithTextGenerator.php');
class LevelUpImageFont54Generator extends ImageWithTextGenerator {
    protected function initializeParams() {
        $this->bgImageName = 'background.png';
        $this->symbolPaddingGeneral = -11;
        $this->startY = 119;
        $this->startX = 103;
    }

    protected function getSymbolImageName($symbol){
        return 'font/'.$symbol.'.png';
    }
}

