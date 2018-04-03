<?php
/**
 * Created by IntelliJ IDEA.
 * User: Andrey
 * Date: 23.05.2015
 * Time: 22:21
 */

abstract class ImageWithTextGenerator {

    // Config vars
    protected $bgImageName;
    protected $symbolPaddingGeneral;
    protected $startY;
    protected $startX;
    //
    private $text;

    function __construct($text)
    {
        $this->text = $text;
        $this->initializeParams();
    }

    abstract protected function initializeParams();
    abstract protected function getSymbolImageName($symbol);

    public function outputImage() {

        $imgPng = imageCreateFromPng($this->bgImageName);
        imageAlphaBlending($imgPng, true);
        imageSaveAlpha($imgPng, true);

        $symbols = array();
        $width = 0;
        $lastIndex = strlen($this->text) - 1;
        $levelSize = strlen($this->text);
        for($i = 0; $i < strlen($this->text); $i++) {
            $symbol = $this->text[$i];
            $symbolPng = imageCreateFromPng($this->getSymbolImageName($symbol));
            $symbols[$i] = $symbolPng;
            $width += imagesx($symbolPng);
            if($levelSize > 1) {
                switch($i) {
                    case $lastIndex: break;
                    default:
                        $width += $this->symbolPaddingGeneral;
                }
            }
        }

        $this->startX -= $width/2;

        for($j = 0; $j < count($symbols); $j++) {
            $symbolPng = $symbols[$j];
            imagecopy($imgPng, $symbolPng, $this->startX, $this->startY, 0, 0, imagesx($symbolPng), imagesy($symbolPng));
            $this->startX += imagesx($symbolPng) + $this->symbolPaddingGeneral;
        }

        /* Output image to browser */
        header("Content-type: image/png");
        imagePng($imgPng);
    }

}