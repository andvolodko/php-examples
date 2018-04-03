<?php
/**
 * Created by IntelliJ IDEA.
 * User: Andrey
 * Date: 23.05.2015
 * Time: 22:24
 */
include_once('ImageWithTextGenerator.php');
class LevelUpImageFont76Generator extends ImageWithTextGenerator {
    protected function initializeParams() {
        $this->bgImageName = 'background.png';
        $this->symbolPaddingGeneral = -15;
        $this->startY = 111;
        $this->startX = 103;
    }

    protected function getSymbolImageName($symbol){
        return 'font/'.$symbol.'_big.png';
    }
}