<?php
/**
 * Created by IntelliJ IDEA.
 * User: Andrey
 * Date: 23.05.2015
 * Time: 22:18
 */
include_once('ApplicationConfig.php');
include_once('ImageWithTextFactory.php');

class Facade {
    public function outputLevelUpImage($level) {

        if(!is_numeric($level) || $level > ApplicationConfig::MAX_LEVEL || $level < 0) {
            header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
            header("Status: 404 Not Found");
            $_SERVER['REDIRECT_STATUS'] = 404;
            echo "<h1>404 Not Found</h1>";
            echo "The page that you have requested could not be found.";
            die();
        }

        $level = (int)$level;
        $level = (string)$level;

        $imageGenerator = ImageWithTextFactory::createLevelUpGenerator($level);
        $imageGenerator->outputImage();
    }
}